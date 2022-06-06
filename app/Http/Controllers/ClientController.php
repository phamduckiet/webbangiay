<?php

namespace App\Http\Controllers;

use App\Http\Requests\Client\Loginrequest as ClientLoginrequest;
use App\Models\category;
use App\Models\Client;
use App\Models\product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;



class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexclient()
    {
        $data = category::all();
        return view('client.page.index', compact('data'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function register(ClientLoginrequest $request)
    {
        $dataMail = $request->all();
        $dataMail['password'] = bcrypt($request->password);
        $dataMail['matkhau'] = ($request->password);
        User::create($dataMail);
    }
    public function Login(ClientLoginrequest $request)
    {
        $data = $request->only('email', 'password');
        if(Auth::attempt($data)){
            $taiKhoan = Auth::user();
            if($taiKhoan['type'] == 0){
                return response()->json(['status' => 2, 'message' => 'Đăng nhập thành công !']);
            } else {
                return response()->json(['status' => 1, 'message' => 'Tài khoản của bạn đã bị khóa vì đăng nhập facebook không chính xác !']);
            }
        } else {
            return response()->json(['status' => 0, 'message' => 'Tài khoản sai hoặc không tồn tại vui lòng kiểm tra lại hoặc tạo thành viên mới !']);
        }


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function shopCate($id)
    {
        $data = category::find($id);
        $product = product::where('category_id', $id)->get();
        if($product){
            return view('client.page.shopCate', compact('product'));
        } else {
            toastr()->error("Product is not exits");
            return back();
        }
    }
    public function logout(){
        Session::flush();
        Auth::logout();
        return redirect('/client');
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function show(Client $client)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function edit(Client $client)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Client $client)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function destroy(Client $client)
    {
        //
    }
}
