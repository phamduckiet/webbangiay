<?php

namespace App\Http\Controllers;

use App\Http\Requests\Admin\loginRequest;
use App\Http\Requests\Admin\RegisterRequest;
use App\Models\admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function view()
    {
        return view('admin.register');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function post(RegisterRequest $request)
    {
        $data = $request->all();
        $data['password'] = bcrypt($data['password']);
        admin::create($data);
        return response()->json(['data' => true]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function viewlogin()
    {
        return view('admin.login');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function postlogin(loginRequest $request)
    {
        $data = $request->only('username', 'password');
        $admin = Auth::guard('admin')->attempt($data);
        if($admin){
                toastr()->success('Bạn đã nhập hệ thống thành công!');
                return redirect('admin/create-category');
        } else {
            toastr()->error('Bạn đã nhập sai tài khoản hoặc mật khẩu!');
            return redirect()->back();

        }


    }
    public function logout(){
        Session::flush();
        Auth::logout();
        return redirect('admin/login');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function edit(admin $admin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, admin $admin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function destroy(admin $admin)
    {
        //
    }
}
