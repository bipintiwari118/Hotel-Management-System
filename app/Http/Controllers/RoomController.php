<?php

namespace App\Http\Controllers;
use App\Models\RoomType;
use App\Models\Room;

use Illuminate\Http\Request;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data= Room::all();
        return view('room.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roomtype=RoomType::all();
        return view('room.create',compact('roomtype'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data=new Room;
        $data->title= $request->title;
        $data->room_type_id= $request->room_type_id;
        $data->save();
        return redirect('admin/room/create')->with('success',"Data has been added.");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data= Room::find($id);
        return view('room.show',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $roomtype=RoomType::all();
        $data= Room::find($id);
        return view('room.edit',compact('data','roomtype'));

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
        $data= Room::find($id);
        $data->title= $request->title;
        $data->room_type_id= $request->room_type_id;
        $data->save();
        return redirect('admin/room')->with('success',"Data has been Updated.");

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data=Room::where('id',$id);
        $data->delete();
        return redirect('admin/room')->with('delete',"Data has been Deleted.");
    }
}
