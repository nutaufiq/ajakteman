<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Contracts\Filesystem\Filesystem;

use Carbon\Carbon;

class AdsController extends Controller
{
    public function index()
    {
    	if(Auth::check())
		{
			//cek terujuk
            if(Auth::user()->referrer_olx_id > 0)
            {
                $terujuk = true;
            }
            else
            {
                if(\Config::get('ajakteman.anyone_can_post_advert'))
                {
                    $terujuk = true;
                }
                else
                {
                    $terujuk = false;
                }
            }

            if($terujuk)
            {
                $ads = \App\Ad::whereUser_id(Auth::user()->id)->first();

                if($ads)
                {
                    return redirect('dashboard/pasang-iklan');
                }

                return view('web.ads.index');
            }

            return redirect('dashboard/pasang-iklan');
		}

		return redirect('login');
    }

    public function upload(Request $request)
    {
        if($request->ajax())
        {
        	$rules['image'] = 'bail|image|mimes:jpeg,png,jpg|max:6144';

        	$this->validate($request, $rules);

        	$image = $request->file('image');

            $imageFileName = Auth::user()->olx_id.'-'.time().'.'.$image->getClientOriginalExtension();

            $imageFilePath = public_path('images/uploads/' . $imageFileName);

            //resize
            $img = \Image::make($image);

            $img->resize(null, 650, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            })->save($imageFilePath);

            $uploadedImage = public_path('images/uploads/' . $imageFileName);
            //

            $temporary_key = $request->input('temporary_key');

            if($temporary_key == null)
            {
                $upload = \Olx::uploadImage(session('access_token'), $uploadedImage, $image->getMimeType(), $imageFileName);

                \File::delete('images/uploads/' . $imageFileName);
            }
            else
            {
                $upload = \Olx::uploadImage(session('access_token'), $uploadedImage, $image->getMimeType(), $imageFileName, $temporary_key);

                \File::delete('images/uploads/' . $imageFileName);
            }

            // return $upload;

            if($upload)
            {
                return response()->json([
                    'st' => 'success',
                    'msg' => $upload,
                    'temporary_key' => $upload['data']['temporary_key'],
                    'slot' => $upload['data']['slot'],
                ]);
            }

            return response()->json([
                'st' => 'failed',
                'msg' => 'Image gagal diupload.',
            ]);
        }

        return "Not ajax request";
    }

    public function delete(Request $request)
    {
        if($request->ajax())
        {
            $delete = \Olx::deleteImage(session('access_token'), $request->temporary_key, $request->slot);

            if($delete)
            {
                return response()->json([
                    'st' => 'success',
                    'msg' => 'Image berhasil dihapus.',
                    'res' => $delete
                ]);
            }

            return response()->json([
                'st' => 'failed',
                'msg' => 'Image gagal dihapus.',
            ]);
        }

        return "Not ajax request";
    }

    public function category($id)
    {
    	if($id == 0)
    	{
    		$categories = '<ul class="category-list">
        			<li><a href="#" class="category" data-id="86">Mobil</a></li>
              		<li><a href="#" class="category" data-id="87">Motor</a></li>
              		<li><a href="#" class="category" data-id="88">Properti</a></li>
             		<li><a href="#" class="category" data-id="98">Keperluan Pribadi</a></li>
              		<li><a href="#" class="category" data-id="92">Elektronik & Gadget</a></li>
              		<li><a href="#" class="category" data-id="94">Hobi & Olahraga</a></li>
              		<li><a href="#" class="category" data-id="89">Rumah Tangga</a></li>
              		<li><a href="#" class="category" data-id="96">Perlengkapan Bayi & Anak</a></li>
              		<li><a href="#" class="category" data-id="90">Kantor & Industri</a></li>
              		<li><a href="#" class="category" data-id="97">Jasa & Lowongan Kerja</a></li>
        			</ul>';
        	return response()->json([
			        'st' => 'success',
			        'name' => 'Pilih Kategori',
			        'html' => $categories,
			    ]);
    	}

    	$category = \Olx::category(session('access_token'), $id);

        if($category)
        {
        	$data = $category->getData();

        	if(count($data->children) > 0)
        	{
        		$categories = '<ul class="category-list">';
        		foreach($data->children as $cid)
        		{
        			$category2 = \Olx::category(session('access_token'), $cid);

        			$data2 = $category2->getData();

        			$categories .= '<li><a href="#" class="category" data-id="'.$cid.'">'.$data2->name.'</a></li>';
        		}
        		$categories .= '</ul>';

        		return response()->json([
    			        'st' => 'success',
    			        'name' => $data->name,
    			        'parent' => $data->parent,
    			        'html' => $categories,
    			        'res' => $data->res
    			    ]);
        	}

        	return response()->json([
    	        'st' => 'done',
    	        'name' => $data->name,
    	        'parent' => $data->parent,
    	        'id' => $data->id,
    	        'res' => $data->res
    	    ]);
        }

        return response()->json([
            'st' => 'failed',
            'msg' => 'Gagal mendapatkan kategori.',
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->input('data');

        //validation
        $rules = array();

        foreach($data as $key => $value)
        {
            if($key == 'title') $rules['data.'.$key] = 'bail|required|min:15|max:70';
            if($key == 'category_id') $rules['data.'.$key] = 'required';
            if($key == 'description') $rules['data.'.$key] = 'bail|sometimes|nullable|regex:/^[\r\na-zA-Z0-9 .\,\-\(\)\:\&\%]+$/i|min:20|max:4096';
            if($key == 'phone') $rules['data.'.$key] = 'bail|sometimes|nullable|numeric|digits_between:5,14';

            if($key == 'photos_group_key') $rules['data.'.$key] = "required";
            if($key == 'location') $rules['data.'.$key] = "required";
            if($key == 'region_id') 
            {
                    $rules['data.'.$key] = 'bail|sometimes|required';
                    $rules['data.location'] = "bail|sometimes|nullable";
            }
            if($key == 'subregion_id') $rules['data.'.$key] = 'bail|sometimes|required';
            if($key == 'photos_group_key') $rules['data.'.$key] = "required";
        }

        if($data['category_id'] != "" || $data['category_id'] != null)
        {
            $category_id = $data['category_id'];

            $category = \Olx::category(session('access_token'), $category_id);

            if($category)
            {
                $categories = $category->getData();

                $parameters = $categories->res->data->parameters;

                $rule = array();

                foreach($parameters as $row)
                {
                    $rule = array();

                    $code = $row->code;
                    $required = $row->required;
                    $data_type = $row->data_type;

                    if($required) 
                    {
                        $rule[] = 'required';
                    }
                    else
                    {
                        $rule[] = 'nullable';
                    }
                    if($data_type == 'float') $rule[] = 'integer';
                    if($data_type == 'both') $rule[] = 'integer';

                    $string_rule = implode("|", $rule);

                    $rules['data.params.'.$code] = $string_rule;

                    unset($rule);
                }
            }
        }

        $this->validate($request, $rules);
        //----------

        foreach($data as $key => $value)
        {
            $post['title'] = $data['title'];
            $post['category_id'] = (int)$data['category_id'];
            $post['description'] = $data['description'];

            $post['phone'] = $data['phone'];
            if(array_key_exists('whatsapp', $data)) $post['whatsapp'] = (int)$data['whatsapp'];
            else $post['whatsapp'] = 0;

            $post['coordinates']['latitude'] = $data['coordinates']['latitude'];
            $post['coordinates']['longitude'] = $data['coordinates']['longitude'];

            $post['region_id'] = (int)$data['region_id'];
            $post['city_id'] = (int)$data['subregion_id'];

            foreach($data['params'] as $k => $v)
            {
                if($k == "price")
                {
                    $price = array();
                    if(array_key_exists('arranged', $data['params'])) $price[] = $data['params']['arranged'];
                    else $price[] = "price";

                    $price[] = $data['params']['price'];

                    $post['params']['price'] = $price;
                }
                else if($k == "p_facility")
                {
                    foreach ($data['params'][$k] as $i => $j) 
                    {  
                       $arr[] = $j;
                    }
                    $post['params']['p_facility'] = $arr;

                    unset($arr);
                }
                else if($k == "arranged")
                {

                }
                else
                {
                    $post['params'][$k] = (is_numeric($v)) ? (int)$v : $v;
                }
            }
        }

        $post = json_encode($post);

        $ads = \Olx::ads(session('access_token'), $post);

        $ads_response = $ads->getData();

        if($ads_response->st == "success")
        {
            $store = new \App\Ad;

            $store->user_id = Auth::user()->id;
            $store->user_olx_id = Auth::user()->olx_id;
            $store->ads_olx_id = $ads_response->msg->data->id;

            $store->save();

            /*simpan data tracking pasang iklan*/
            $invite_id = Auth::user()->invite_id;

            if($invite_id > 0)
            {
                $track = new \App\Track;

                $track->invite_id = $invite_id;
                $track->status = 3;

                $track->save();
            }
            /*---------------------------------*/

            return response()->json([
                'st' => 'success',
                'msg' => 'Pasang iklan berhasil',
                'modal' => '#modalNotif-advert-success'
            ]);
        }

        return response()->json([
            'st' => 'failed',
            'msg' => $ads,
        ]);
    }

    public function download()
    {
        $ads = \App\Ad::where('is_active', 0)->orWhere('is_verified', 0)->get();

        $date_time = Carbon::now();

        \Excel::create('OLX_Ajakteman_Ads_'.$date_time, function($excel) use($ads) {

            $excel->sheet('Ads', function($sheet) use($ads) {

                $sheet->loadView('table.excel.ads')->with('ads', $ads);

            });

        })->export('xls');
    }

    public function lists()
    {
        $count = \App\Ad::count();
        $ads = \App\Ad::orderBy('id', 'desc')->paginate(10);

        return view('webcontrol.ads.list', compact('count', 'ads'));
    }

    public function edit($id)
    {
        $ads = \App\Ad::find($id);

        return view('webcontrol.ads.edit', compact('ads'));
    }

    public function update(Request $request, $id)
    {
        $ads = \App\Ad::find($id);

        $this->validate($request, [
            'is_active'   => 'required',
            'is_verified'   => 'required',
        ]);

        $is_active = $request->input('is_active');
        $is_verified = $request->input('is_verified');

        if($is_active == 0 && $is_verified == 1)
        {
            return redirect('webcontrol/ads/'.$id.'/edit')->with('error', 'Iklan tidak bisa diverifikasi jika iklan belum aktif!');
        }

        $data = \App\Ad::find($id);

        $data->is_active = $is_active;
        $data->is_verified = $is_verified;

        $data->save();

        //tracking
        if($is_active == 1)
        {
            $invite_id = $ads->user->invite_id;

            if($invite_id > 0)
            {
                $count = \App\Track::where('invite_id', $invite_id)->where('status', 5)->count();

                if($count == 0)
                {
                    $track = new \App\Track;

                    $track->invite_id = $invite_id;
                    $track->status = 4;

                    $track->save();
                }
            }
        }

        if($is_verified == 1)
        {
            $invite_id = $ads->user->invite_id;

            if($invite_id > 0)
            {
                $count = \App\Track::where('invite_id', $invite_id)->where('status', 5)->count();

                if($count == 0)
                {
                    $track = new \App\Track;

                    $track->invite_id = $invite_id;
                    $track->status = 5;

                    $track->save();
                }
            }
        }
        //--------

        return redirect('webcontrol/ads/'.$id.'/edit')->with('message', 'Ads Updated!');
    }
}