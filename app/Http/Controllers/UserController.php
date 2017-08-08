<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Auth\Authenticatable;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $count = \App\User::count();
        $users = \App\User::orderBy('id', 'desc')->paginate(10);

        return view('webcontrol.user.list', compact('count', 'users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('webcontrol.user.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'email'     => 'required|email|unique:users,email',
            'phone'   => 'required|numeric|digits_between:5,13',
            'olx_id'   => 'required|numeric|digits_between:1,20',
            'referrer_olx_id'   => 'required|numeric|digits_between:1,20',
            'invite_id'   => 'required|numeric|digits_between:1,20',
            'is_verified'   => 'required',
        ]);

        $name = $request->input('name');
        $email = $request->input('email');
        $phone = $request->input('phone');
        $olx_id = $request->input('olx_id');
        $referrer_olx_id = $request->input('referrer_olx_id');
        $invite_id = $request->input('invite_id');
        $is_verified = $request->input('is_verified');

        $data = new \App\User;

        $data->name = $name;
        $data->email = $email;
        $data->phone = $phone;
        $data->olx_id = $olx_id;
        $data->referrer_olx_id = $referrer_olx_id;
        $data->invite_id = $invite_id;
        $data->is_verified = $is_verified;

        $data->save();

        return redirect('webcontrol/user');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = \App\User::find($id);

        return view('webcontrol.user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'phone'   => 'required|numeric|digits_between:5,13',
            'olx_id'   => 'required|numeric|digits_between:1,20',
            'referrer_olx_id'   => 'required|numeric|digits_between:1,20',
            'invite_id'   => 'required|numeric|digits_between:1,20',
            'is_verified'   => 'required',
        ]);

        $name = $request->input('name');
        $phone = $request->input('phone');
        $olx_id = $request->input('olx_id');
        $referrer_olx_id = $request->input('referrer_olx_id');
        $invite_id = $request->input('invite_id');
        $is_verified = $request->input('is_verified');

        $data = \App\User::find($id);

        $data->name = $name;
        $data->phone = $phone;
        $data->olx_id = $olx_id;
        $data->referrer_olx_id = $referrer_olx_id;
        $data->invite_id = $invite_id;
        $data->is_verified = $is_verified;

        $data->save();

        return redirect('webcontrol/user/'.$id.'/edit')->with('message', 'User Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = \App\User::find($id);

        $data->delete();

        return redirect('webcontrol/user');
    }

    public function login()
    {
        if (Auth::guard('admin')->check())
        {
            return redirect('webcontrol/user');
        }

        return view('webcontrol.login.login');
    }

    public function do_login(Request $request)
    {
        $this->validate($request, [
            'email'     => 'required|email',
            'password'  => 'required|min:6'
        ]);

        $email = $request->input('email');
        $password = $request->input('password');

        if (Auth::guard('admin')->attempt(['email' => $email, 'password' => $password, 'is_active' => 1])) 
        {
            return redirect('webcontrol/user');
        }

        return redirect('webcontrol')->with('message', 'Wrong email or password.');
    }

    public function logout()
    {
        if(Auth::guard('admin')->check())
        {
            Auth::guard('admin')->logout();

            return redirect('webcontrol');
        }

        return redirect('webcontrol/user');
    }
}
