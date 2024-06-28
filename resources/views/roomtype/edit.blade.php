@extends('layout')
@section('content')
    <div class="container-fluid">

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">RoomTypes
                    <a href="{{ url('admin/roomtype') }}" class="float-right btn btn-success btn-sm" >View All</a>
                </h6>
            </div>
            <div class="card-body">
                @if(Session::has('success'))
                <p class="text-success">{{ session('success') }}</p>
                @endif
                <div class="table-responsive">
                    <form action="{{ url('admin/roomtype/'.$data->id) }}" method="post">
                        @csrf
                        @method('PUT')
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

                        <tr>
                            <th>Title</th>
                            <td><input value="{{ $data->title }}" type="text" name="title" id="" class='form-control'></td>
                        </tr>
                        <tr>
                            <th>Price</th>
                            <td><input value="{{ $data->price }}" type="number" name="price" id="" class='form-control'></td>
                        </tr>
                        <tr>
                            <th>Details</th>
                            <td><textarea  name="detail" id="" class="form-control">{{ $data->detail }}</textarea></td>
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
