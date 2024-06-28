<?php

namespace App\Http\Controllers;
use App\Models\Admin;
use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Cookie;

class AdminController extends Controller
{
    public function login(){
        $username = Cookie::get('adminuser');
        $password = Cookie::get('adminpwd');
        return view('login',compact('username', 'password'));

    }
    public function checkLogin(Request $request){
        $request=$request->validate([
            'username'=>'required',
            'password'=>'required'
        ]);
        $admin=Admin::where(['username'=>$request['username'],'password'=>sha1($request['password'])])->count();
        if($admin>0){
            $adminData=Admin::where(['username'=>$request['username'],'password'=>sha1($request['password'])])->get();
            session(['adminData'=>$adminData]);
            return redirect('admin');

            if($request->has('rememberMe')){
                Cookie::queue('adminuser',$request->username,1440);
                Cookie::queue('adminpwd',$request->password,1440);
            }


        }else{
            return redirect('admin/login')->with('msg','Invalid Username and Password');
        }


    }
    public function logout(Request $request)
    {
    session()->forget('adminData');
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('admin/login')->with('logout','Successfully logout.');
    }

    public function dashboard(){
        $bookings=Booking::selectRaw('count(id) as total_bookings,checkin_date')->groupBy('checkin_date')->get();
        $labels=[];
        $data=[];
        foreach($bookings as $booking){
            $labels[]=$booking['checkin_date'];
            $data[]=$booking['total_bookings'];
        }
        return view('dashboard',compact('bookings','labels','data'));
    }
}
