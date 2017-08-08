<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Mail\Invite;
use App\Mail\Invited;
use App\Mail\Ads;
use Illuminate\Support\Facades\Mail;

use Carbon\Carbon;

class DashboardController extends Controller
{
	public function index()
    {
    	if(Auth::check())
		{
			//count invited
			$count_invites = \App\Invite::where('user_id', Auth::user()->id)->count();

			//pasang iklan
			$friends = \App\User::where('referrer_olx_id', Auth::user()->olx_id)->get();
			$count_ads_success = 0;

			foreach($friends as $friend)
			{
				if($friend->ads !== null)
				{
					if($friend->ads->is_active == 1 && $friend->ads->is_verified == 1)
					{
						$count_ads_success++;
					}
				}
			}

			// $count_ads_success = 3;

			//jumlah voucher yang bisa ditukar
			$count_voucher = (int) floor($count_ads_success/3);

			//kebutuhan tambahan teman pasang iklan
			$count_remaining = 3 - (int) floor($count_ads_success%3);

			//invited list
			$invites = \App\Invite::where('user_olx_id', Auth::user()->olx_id)->orderBy('created_at', 'desc')->simplePaginate(3);

			//redeem [pending, verified]
			$redeem = \App\Redeem::where('status', 0)->orWhere('status', 1)->count();

			$count_voucher = $count_voucher - (int) $redeem;

    		return view('web.dashboard.index', compact('count_invites', 'count_ads_success', 'count_voucher', 'count_remaining', 'invites'));
		}

    	return redirect('/');
    }

    public function ads()
    {
    	if(Auth::check())
		{
			$ads = \App\Ad::whereUser_id(Auth::user()->id)->first();

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

			return view('web.dashboard.ads', compact('ads', 'terujuk'));
		}

		return redirect('/');
	}

    public function invite(Request $request)
    {
    	if(Auth::check())
    	{
	    	$this->validate($request, [
	            'name.*'    	=> 'required|string|max:191',
	            'email.*'		=> 'required|email|max:191|unique:invites,email',
	            'phone.*'   	=> 'required|numeric|digits_between:5,13|unique:invites,phone',
	        ], [
	        	'name.*.required' => 'Bidang isian nama harus diisi.',
	        	'name.*.string' => 'Bidang isian nama harus berupa string.',
	        	'name.*.max' => 'Bidang isian nama maksimal 191 karakter.',

	        	'email.*.required' => 'Bidang isian email harus diisi',
	        	'email.*.email' => 'Bidang isian email harus menggunakan format yang valid.',
	        	'email.*.max' => 'Bidang isian email maksimal 191 karakter.',
	        	'email.*.invites' => 'Bidang isian email sudah pernah digunakan.',

	        	'phone.*.required' => 'Bidang isian telepon harus diisi.',
	        	'phone.*.numeric' => 'Bidang isian telepon harus berupa angka.',
	        	'phone.*.digits_between' => 'Bidang isian telepon minimal 5 angka, maksimal 13 angka.',
	        	'phone.*.unique' => 'Bidang isian telepon sudah pernah digunakan.',
	        ]);

	        $name = $request->input('name');
	        $email = $request->input('email');
	        $phone = $request->input('phone');

	        if(count($email) !== count(array_unique($email)))
	        {
	        	return response()->json([
		            'st' => 'failed',
		            'msg' => 'Tidak bisa mengajak teman dengan email yang sama.'
		        ]);
	        }

	        if(count($phone) !== count(array_unique($phone)))
	        {
	        	return response()->json([
		            'st' => 'failed',
		            'msg' => 'Tidak bisa mengajak teman dengan telepon yang sama.'
		        ]);
	        }

	        $x = 0;

	        foreach($request->input('name') as $key => $value)
	        {
	        	$data = new \App\Invite;

		        $data->user_id = Auth::user()->id;
		        $data->user_olx_id = Auth::user()->olx_id;
		        $data->name = $value;
		        $data->email = $email[$key];
		        $data->phone = $phone[$key];
		        $data->trackid = md5($email[$key]);

		        $data->save();

		        /* SEND EMAIL */
		        $datas = [
		        	'name' => (Auth::user()->name) ? Auth::user()->name : Auth::user()->get_email_name(Auth::user()->email),
		        	'url' => url('register/?ref='.Auth::user()->olx_id.'&trackid='.md5($email[$key]))
		        ];

		        Mail::to($email[$key])->send(new Invited($datas));
		        /*------------*/

		        $x++;
	        }

	        /* SEND EMAIL */
	        $with = [
	        	'x' => $x
	        ];

	        Mail::to(Auth::user()->email)->send(new Invite($with));
	        /*------------*/

	        return response()->json([
	            'st' => 'success',
	            'msg' => 'Undang '.$x.' Teman berhasil.',
	            'modal' => '#modalNotif-ajakteman-success'
	        ]);
	    }

	    return response()->json([
            'st' => 'failed',
            'msg' => 'Anda harus login terlebih dahulu.'
        ]);
    }

    public function redeem(Request $request)
    {
    	if(Auth::check())
    	{
    		$this->validate($request, [
	            'name'    	=> 'required|string|max:191',
	            'address'	=> 'required',
	            'phone'   	=> 'required|numeric|digits_between:5,13',
	            'image'		=> 'required|image|mimes:jpeg,jpg,png|max:6144',
	        ]);

	        //pasang iklan
			$friends = \App\User::where('referrer_olx_id', Auth::user()->olx_id)->get();
			$count_ads_success = 0;

			foreach($friends as $friend)
			{
				if($friend->ads !== null)
				{
					if($friend->ads->is_active == 1 && $friend->ads->is_verified == 1)
					{
						$count_ads_success++;
					}
				}
			}

			// $count_ads_success = 3;

			//jumlah voucher yang bisa ditukar
			$count_voucher = (int) floor($count_ads_success/3);

			//redeem [pending, verified]
			$redeem = \App\Redeem::where('status', 0)->orWhere('status', 1)->count();

			$count_voucher = $count_voucher - (int) $redeem;

			if($count_voucher > 0)
			{
				//---
		        $image = Auth::user()->id.'-'.time().'.'.$request->image->getClientOriginalExtension();

		        $destinationPath = public_path('/images/uploads/');
		        $img = \Image::make($request->image->getRealPath());
		        $img->resize(null, 650, function ($constraint)
		        {
		            $constraint->aspectRatio();
		        })->save($destinationPath.'/'.$image);
		        //---

				$data = new \App\Redeem;

				$data->user_id = Auth::user()->id;
				$data->user_olx_id = Auth::user()->olx_id;
				$data->name = $request->name;
				$data->address = $request->address;
				$data->phone = $request->phone;
				$data->image = $image;

				$data->save();

				return response()->json([
		            'st' => 'success',
		            'msg' => 'Tukar voucher berhasil.',
		            'modal' => '#modalNotif-redeem-success'
		        ]);
			}

			return response()->json([
	            'st' => 'failed',
	            'msg' => 'Tidak ada voucher yang dapat ditukar.'
	        ]);
    	}

    	return response()->json([
            'st' => 'failed',
            'msg' => 'Anda harus login terlebih dahulu.'
        ]);
    }

    public function reminder(Request $request)
    {
    	if(Auth::check())
    	{
    		$action = $request->action;
    		$invite_id = $request->id;

    		$reminder = \App\Reminder::where('user_id', Auth::user()->id)->where('invite_id', $invite_id)->where('action', $action)->whereDate('created_at', Carbon::today())->first();

    		if($reminder == null)
    		{
    			if($action == 'register')
    			{
    				$invite = \App\Invite::find($invite_id);

    				if($invite)
    				{
	    				/* SEND EMAIL */
				        $datas = [
				        	'name' => (Auth::user()->name) ? Auth::user()->name : Auth::user()->get_email_name(Auth::user()->email),
				        	'url' => url('register/?ref='.Auth::user()->olx_id.'&trackid='.$invite->trackid)
				        ];

				        Mail::to($invite->email)->send(new Invited($datas));
				        /*------------*/

				        $data = new \App\Reminder;

				        $data->user_id = Auth::user()->id;
				        $data->invite_id = $invite_id;
				        $data->action = $action;

				        $data->save();

				        return response()->json([
				            'st' => 'success',
				            'msg' => 'Email pengingat sudah dikirimkan.'
				        ]);
				    }

				    return response()->json([
			            'st' => 'failed',
			            'msg' => 'Data rujukan tidak ditemukan.'
			        ]);
    			}
    			else if($action == 'postads')
    			{
    				$invite = \App\Invite::find($invite_id);

    				if($invite)
    				{
	    				/* SEND EMAIL */
	    				$datas = [
				        	'name' => $invite->name,
				        ];

				        Mail::to($invite->email)->send(new Ads($datas));
	    				/*------------*/

	    				$data = new \App\Reminder;

				        $data->user_id = Auth::user()->id;
				        $data->invite_id = $invite_id;
				        $data->action = $action;

				        $data->save();

				        return response()->json([
				            'st' => 'success',
				            'msg' => 'Email pengingat sudah dikirimkan.'
				        ]);
				    }

				    return response()->json([
			            'st' => 'failed',
			            'msg' => 'Data rujukan tidak ditemukan.'
			        ]);
				}
				else
				{
					return response()->json([
			            'st' => 'failed',
			            'msg' => 'Data aksi tidak ditemukan.'
			        ]);
				}
    		}

    		return response()->json([
	            'st' => 'failed',
	            'msg' => 'Anda sudah mengirimkan email pengingat hari ini.'
	        ]);
    	}

    	return response()->json([
            'st' => 'failed',
            'msg' => 'Anda harus login terlebih dahulu.'
        ]);
    }
}
