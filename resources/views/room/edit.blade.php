@extends('layout')
@section('content')
    <div class="container-fluid">

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Room
                    <a href="{{ url('admin/room') }}" class="float-right btn btn-success btn-sm" >View All</a>
                </h6>
            </div>
            <div class="card-body">
                @if(Session::has('success'))
                <p class="text-success">{{ session('success') }}</p>
                @endif
                <div class="table-responsive">
                    <form action="{{ url('admin/room/'.$data->id) }}" method="post">
                        @csrf
                        @method('PUT')
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

                        <tr>
                            <th>Title</th>
                            <td><input value="{{ $data->title }}" type="text" name="title" id="" class='form-control'></td>
                        </tr>
                        <tr>
                            <th>Room Type</th>
                            <td><select name="room_type_id" id="" class="form-control">
                                <option value="0">---select---</option>
                                @foreach($roomtype as $value)
                                <option @if ($data->room_type_id== $value->id)
                                    selected
                                @endif value="{{ $value->id }}">{{ $value->title }}</option>
                                @endforeach
                            </select></td>
                        </tr>

                        <tr>

                            <td colspan="2"><input type="submit" value="update" class="btn btn-info"></td>
                        </tr>

                    </table>
                </form>
                </div>
            </div>
        </div>

    </div>
@endsection
