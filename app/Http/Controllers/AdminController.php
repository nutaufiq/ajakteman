<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $count = \App\Admin::count();
        $admins = \App\Admin::orderBy('id', 'desc')->paginate(10);

        return view('webcontrol.admin.list', compact('count', 'admins'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('webcontrol.admin.add');
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
            'password' => 'required|string|min:6|confirmed',
            'level' => 'required|not_in:0',
            'is_active'   => 'required',
        ]);

        $name = $request->input('name');
        $email = $request->input('email');
        $password = $request->input('password');
        $level = $request->input('level');
        $is_active = $request->input('is_active');

        $data = new \App\Admin;

        $data->name = $name;
        $data->email = $email;
        $data->password = bcrypt($password);
        $data->level = $level;
        $data->is_active = $is_active;

        $data->save();

        return redirect('webcontrol/admin');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $admin = \App\Admin::find($id);

        return view('webcontrol.admin.edit', compact('admin'));
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
            'password' => 'sometimes|nullable|string|min:6|confirmed',
            'level' => 'required|not_in:0',
            'is_active'   => 'required',
        ]);

        $name = $request->input('name');
        if($request->input('password') !== null)
        {
            $password = $request->input('password');
        }
        $level = $request->input('level');
        $is_active = $request->input('is_active');

        $data = \App\Admin::find($id);

        $data->name = $name;
        if($request->input('password') !== null)
        {
            $data->password = bcrypt($password);
        }
        $data->level = $level;
        $data->is_active = $is_active;

        $data->save();

        return redirect('webcontrol/admin/'.$id.'/edit')->with('message', 'Admin Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = \App\Admin::find($id);

        $data->delete();

        return redirect('webcontrol/admin');
    }
}
