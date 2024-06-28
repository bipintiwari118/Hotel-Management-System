<?php

namespace App\Http\Controllers;
use App\Models\RoomType;
use App\Models\Roomtypeimage;
use Illuminate\Support\Facades\Storage;



use Illuminate\Http\Request;

class RoomTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data= RoomType::all();
        return view('roomtype.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('roomtype.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
     {
    //     dd($request->all());
        $validate= $request->validate([
            'title' => 'required',
            'price' => 'required',
            'detail' => 'required',

        ]);
        $data=new RoomType;
        $data->title= $validate['title'];
        $data->price= $validate['price'];
        $data->detail= $validate['detail'];
        $data->save();

        // dd($request->file('imgs'));
        $images=$request->file('imgs');
        foreach($images as $img){
            $imgPath=$img->store('cus_img','public');
            $imgData=new Roomtypeimage;
            $imgData->roomtype_id=$data->id;
            $imgData->img_src=$imgPath;
            $imgData->img_alt=$data->title;
            $imgData->save();

        }
        return redirect('admin/roomtype/create')->with('success',"Room Type  has been added.");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data= RoomType::find($id);
        return view('roomtype.show',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data= RoomType::find($id);
        return view('roomtype.edit',compact('data'));

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
        $data= RoomType::find($id);
        $data->title= $request->title;
        $data->price= $request->price;
        $data->detail= $request->detail;
        $data->save();
        return redirect('admin/roomtype')->with('success',"Room Type has been Updated.");

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data=RoomType::where('id',$id);
        $data->delete();
        return redirect('admin/roomtype')->with('delete',"Data has been Deleted.");
    }
}
