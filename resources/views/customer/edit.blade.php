@extends('layout')
@section('content')
    <div class="container-fluid">

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Customer Update
                    <a href="{{ url('admin/customer') }}" class="float-right btn btn-success btn-sm" >View All</a>
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
                    <form action="{{ url('admin/customer/'.$data->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

                        <tr>
                            <th>Full Name <span class="text-danger">*</span>
                            </th>
                            <td><input type="text" name="full_name" id="" class="form-control" value="{{ $data->full_name }}" required></td>
                        </tr>
                        <tr>
                            <th>Email <span class="text-danger">*</span></th>
                            <td><input type="email" name="email" id="" class='form-control' value="{{ $data->email }}"  required></td>
                        </tr>

                        <tr>
                            <th>Address <span class="text-danger">*</span></th>
                            <td><input type="text" name="address" id="" class='form-control' value="{{ $data->address }}"  required></td>
                        </tr>
                        <tr>
                            <th>Mobile <span class="text-danger">*</span></th>
                            <td><input type="text" name="mobile" id="" class='form-control' value="{{ $data->mobile }}"  required></td>
                        </tr>
                        <tr>
                            <th>photo</th>
                            <td><input type="file" name="photo" id="" value=""/>
                                <input name="pre_photo" id="" value="{{$data->photo}}" type="hidden">
                                <img width="100" src="{{ Storage::url($data->photo) }}" alt="{{ $data->full_name }}">
                            </td>
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
