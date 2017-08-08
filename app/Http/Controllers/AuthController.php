<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
	public function login_perujuk()
	{
        //if logged in
		if(Auth::check())
		{
			return redirect('dashboard');
		}
        // dd(session('access_token'));

		return view('web.auth.login-perujuk');
	}

    public function login_terujuk()
    {
        //if logged in
        if(Auth::check())
        {
            return redirect('dashboard');
        }

        return view('web.auth.login-terujuk');
    }

    public function do_login(Request $request)
    {
        //if logged in
        if(Auth::check())
        {
            return response()->json([
                'st'    => 'failed',
                'msg'   => 'Anda sudah dalam keadaan login.'
            ]);
        }

        //validation
        $this->validate($request, [
            'email'     => 'required|email',
            'password'  => 'required|min:6',
        ]);

        //check login_from
        if($request->input('login_from') == 'terujuk')
        {
            //harus mendaftar dari ajakteman?
            if(\Config::get('ajakteman.must_registered_from_ajakteman'))
            {
                $count = \App\User::whereEmail($request->input('email'))->count();

                if($count == 0)
                {
                    return response()->json([
                        'st' => 'failed',
                        'msg' => 'Akun tidak terdaftar melalui OLX Ajak Teman.'
                    ]);
                }
            }
        }

        //get access token
        $oauth = \Olx::oauth('password', $request->input('email'), $request->input('password'));

        $oauth_response = $oauth->getData();

        if($oauth_response->st == "success")
        {
            $access_token = $oauth_response->msg->access_token;

            //get profile
            $profile = \Olx::profile($access_token);

            if($profile)
            {
                $is_verified = $profile['data']['is_verified'];

                if($is_verified)
                {
                    $user = \App\User::whereEmail($request->input('email'))->first();

                    //if user exist on DB
                    if($user)
                    {
                        //if name null
                        if($user->name == null)
                        {
                            //check default_person
                            if(array_key_exists('default_person', $profile['data']))
                            {
                                //update name
                                $user->name = $profile['data']['default_person'];

                                $user->save();
                            }
                        }

                        //if phone null
                        if($user->phone == null)
                        {
                            //check default_phone
                            if(array_key_exists('default_phone', $profile['data']))
                            {
                                //update phone
                                $user->phone = $profile['data']['default_phone'];

                                $user->save();
                            }
                        }

                        if(Auth::loginUsingId($user->id))
                        {
                            $request->session()->put('access_token', $access_token);

                            return response()->json([
                                'st' => 'success',
                                'msg' => 'Login berhasil.'
                            ]);
                        }

                        return response()->json([
                            'st' => 'failed',
                            'msg' => 'Login gagal.'
                        ]);
                    }

                    //check default_person
                    if(array_key_exists('default_person', $profile['data']))
                    {
                        $name = $profile['data']['default_person'];
                    }
                    else
                    {
                        $name = null;
                    }

                    //check default_phone
                    if(array_key_exists('default_phone', $profile['data']))
                    {
                        $phone = $profile['data']['default_phone'];
                    }
                    else
                    {
                        $phone = null;
                    }

                    //insert new User
                    $data = new \App\User;

                    $data->name = $name;
                    $data->email = $request->input('email');
                    $data->olx_id = $profile['data']['id'];
                    $data->phone = $phone;
                    $data->is_verified = $profile['data']['is_verified'];

                    $data->save();

                    if(Auth::loginUsingId($data->id))
                    {
                        return response()->json([
                            'st' => 'success',
                            'msg' => 'Login berhasil.'
                        ]);
                    }

                    return response()->json([
                        'st' => 'failed',
                        'msg' => 'Login gagal.'
                    ]);
                }

                return response()->json([
                    'st'    => 'failed',
                    'msg'   => 'Akun anda belum diverifikasi.'
                ]);
            }

            return response()->json([
                'st'    => 'failed',
                'msg'   => 'Akses token tidak valid.'
            ]);
        }

        return response()->json([
            'st'    => 'failed',
            'msg'   => 'Email dan password salah.'
        ]);
    }

	public function register()
	{
        //if logged in
		if(Auth::check())
		{
			return redirect('dashboard');
		}

        //track click from email
        if(app('request')->input('trackid'))
        {
    		$invite = \App\Invite::whereTrackid(app('request')->input('trackid'))->first();

            if($invite)
            {
                $track = \App\Track::where('invite_id', $invite->id)->first();

                if($track == null)
                {
                    $data = new \App\Track;

                    $data->invite_id = $invite->id;
                    $data->status = 1;

                    $data->save();
                }
            }
        }

		return view('web.auth.register');
	}

	public function do_register(Request $request)
    {
        //if logged in
        if(Auth::check())
        {
            return response()->json([
                'st' => 'failed',
                'msg' => 'Anda sudah dalam keadaan login.'
            ]);
        }

        $this->validate($request, [
            'email'     => 'required|email|max:191|unique:users',
            'password'   => 'required|min:8|confirmed',
        ]);

        //get access token
        $oauth = \Olx::oauth('partner');

        $oauth_response = $oauth->getData();

        if($oauth_response->st == "success")
        {
            $access_token = $oauth_response->msg->access_token;

            $register = \Olx::register($request->input('email'), $request->input('password'), $request->input('password_confirmation'), $access_token);

            if($register)
            {
                $user = \App\User::whereEmail($request->input('email'))->first();

                if($user)
                {
                    return response()->json([
                        'st' => 'failed',
                        'msg' => 'Akun sudah terdaftar sebelumnya.'
                    ]);
                }

                if($request->input('referrer_olx_id') == null) 
                {
                    $referrer_olx_id = 0;
                }
                else
                {
                    $referrer_olx_id = $request->input('referrer_olx_id');
                }

                //insert new User
                $data = new \App\User;

                $data->name = null;
                $data->email = $request->input('email');
                $data->olx_id = $register['data']['id'];
                $data->phone = null;
                $data->is_verified = false;
                $data->referrer_olx_id = $referrer_olx_id;

                $data->save();

                $user_id = $data->id;

                /*simpan data tracking pendaftaran*/
                if($request->input('trackid') != null) 
                {
                    $invite = \App\Invite::whereTrackid($request->input('trackid'))->first();

                    if($invite)
                    {
                        if(\Config::get('ajakteman.email_must_same_as_invited'))
                        {
                            if($request->input('email') == $invite->email)
                            {
                                $data = new \App\Track;

                                $data->invite_id = $invite->id;
                                $data->status = 2;

                                $data->save();

                                $user = \App\User::find($user_id);

                                $user->invite_id = $invite->id;

                                $user->save();
                            }
                        }
                        else
                        {
                            $data = new \App\Track;

                            $data->invite_id = $invite->id;
                            $data->status = 2;

                            $data->save();

                            $user = \App\User::find($user_id);

                            $user->invite_id = $invite->id;

                            $user->save();
                        }
                    }
                }
                else if($request->input('referrer_olx_id') != null)
                {
                    $invite = \App\invite::where('user_olx_id', $request->input('referrer_olx_id'))->where('email', $request->input('email'))->first();

                    if($invite)
                    {
                        $data = new \App\Track;

                        $data->invite_id = $invite->id;
                        $data->status = 2;

                        $data->save();

                        $user = \App\User::find($user_id);

                        $user->invite_id = $invite->id;

                        $user->save();
                    }
                }
                else
                {
                    $invite = \App\invite::where('email', $request->input('email'))->first();

                    if($invite)
                    {
                        $data = new \App\Track;

                        $data->invite_id = $invite->id;
                        $data->status = 2;

                        $data->save();

                        $user = \App\User::find($user_id);

                        $user->invite_id = $invite->id;

                        $user->save();
                    }
                }
                /*--------------------------------*/

                return response()->json([
                    'st'    => 'success',
                    'msg'   => $register['data']['message'],
                    'modal' => '#modalNotif-register-success'
                ]);
            }

            return response()->json([
                'st'    => 'failed',
                'msg'   => 'Email sudah terdaftar, silahkan login.'
            ]);
        }

        return response()->json([
            'st'    => 'failed',
            'msg'   => $oauth_response->msg->error_description
        ]);
    }
}
