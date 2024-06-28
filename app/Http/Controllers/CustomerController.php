<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;

use Illuminate\Http\Request;
use App\Models\Customer;

class CustomerController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data= Customer::all();
        return view('customer.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('customer.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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
        $imgPath = $request->file('photo')->store('cus_img','public');

        $data=new Customer;
        $data->full_name = $validateData['full_name'];
        $data->email = $validateData['email'];
        $data->password = sha1($validateData['password']);
        $data->address = $validateData['address'];
        $data->mobile = $validateData['mobile'];
        $data->photo = $imgPath;
        $data->save();

        $ref=$request->ref;
        if($ref=='front'){
            return redirect()->route('register')->with('success',"Register Successfully, Please Login.");
        }
        return redirect('admin/customer/create')->with('success',"Customer has been added.");

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data= Customer::find($id);
        return view('customer.show',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data= Customer::find($id);
        return view('customer.edit',compact('data'));

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


        $validateData= $request->validate([
            'full_name' => 'required',
            'email' => 'required|email|unique:users,email',
            'address' => 'required',
            'mobile' => 'required',
        ]);
        if ($request->hasFile('photo')) {
            // Store the new photo and update the photo field
            $imgPath = $request->file('photo')->store('cus_img', 'public');
        }else{
            $imgPath=$request->pre_photo;
        }

        $data = Customer::find($id);
        $data->update([
            'full_name' => $validateData['full_name'],
            'email' => $validateData['email'],
            'address' => $validateData['address'],
            'mobile' => $validateData['mobile'],
            'photo'=>$imgPath,


        ]);


        return redirect('admin/customer')->with('success',"Data has been Updated.");

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data=Customer::where('id',$id);
        $data->delete();
        return redirect('admin/customer')->with('delete',"Data has been Deleted.");
    }


    // for frontend customer  register and login


}
