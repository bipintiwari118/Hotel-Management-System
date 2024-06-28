<?php

namespace App\Http\Controllers;
use App\Models\RoomType;
use App\Models\Customer;
use App\Models\Roomtypeimage;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $roomtypes=RoomType::all();
        $roomtypeimages=Roomtypeimage::all();
        return view('front-end.home',compact('roomtypes','roomtypeimages'));
    }

    public function register(){
        return view('front-end.register');
    }
    public function store(Request $request)
    {

            // Proceed with using $imagePath

        $validateData= $request->validate([
            'full_name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required',
            'address' => 'required',
            'mobile' => 'required',
        ]);


        $data=new Customer;
        $data->full_name = $validateData['full_name'];
        $data->email = $validateData['email'];
        $data->password = sha1($validateData['password']);
        $data->address = $validateData['address'];
        $data->mobile = $validateData['mobile'];
        $data->save();

         return redirect()->route('register')->with('success',"Register Successfully, Please Login.");


    }

    public function login(){
        return view('front-end.login');
    }
    public function checkLogin(Request $request){
        $request=$request->validate([
            'email' => 'required|email|unique:users,email',
            'password'=>'required'
        ]);
        $email=$request['email'];
        $pwd=sha1($request['password']);
       $customer= Customer::where(['email'=>$email,'password'=>$pwd])->count();
    if($customer>0){
        $customer= Customer::where(['email'=>$email,'password'=>$pwd])->get();
        session(['customer'=>$customer]);
        return redirect('/')->with('success','You are successfully Login');

    }else{
        return redirect()->route('login')->with('error','Invalid Email and Password');
    }

    }
    public function logout(Request $request){
        $request->session()->forget('customer');
        return redirect('/');

    }



}
