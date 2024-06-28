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
                @if ($errors->any())
                @foreach ($errors->all() as $error )
                <p class="text-danger">{{ $error }}</p>

                @endforeach

            @endif
                @if(Session::has('success'))
                <p class="text-success">{{ session('success') }}</p>
                @endif
                <div class="table-responsive">
                    <form action="{{ url('admin/roomtype') }}" method="post" enctype="multipart/form-data">
                        @csrf
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

                        <tr>
                            <th>Title</th>
                            <td><input type="text" name="title" id="" class='form-control'></td>
                        </tr>
                        <tr>
                            <th>Price</th>
                            <td><input type="number" name="price" id="" class='form-control'></td>
                        </tr>
                        <tr>
                            <th>Details</th>
                            <td><textarea name="detail" id="" class="form-control"></textarea></td>
                        </tr>
                        <tr>
                            <th>Gallery</th>
                            <td><input type="file" name="imgs[ ]" id="" multiple></td>
                        </tr>
                        <tr>

                            <td colspan="2"><input type="submit" value="submit" class="btn btn-primary"></td>
                        </tr>

                    </table>
                </form>
                </div>
            </div>
        </div>

    </div>
@endsection
