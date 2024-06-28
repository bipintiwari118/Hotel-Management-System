@extends('layout')
@section('content')
    <div class="container-fluid">

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Customer
                    <a href="{{ url('admin/customer') }}" class="float-right btn btn-success btn-sm" >View All</a>
                </h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">

                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

                        <tr>
                            <th>Full Name</th>
                            <td>{{ $data->full_name }}</td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td>{{ $data->email}}</td>
                        </tr>
                        <tr>
                            <th>Photo</th>
                            <td>
                                <img width="100" src="{{ Storage::url($data->photo) }}" alt="{{ $data->full_name }}"></td>
                        </tr>
                        <tr>
                            <th>Mobile</th>
                            <td>{{ $data->mobile}}</td>
                        </tr>
                        <tr>
                            <th>Address</th>
                            <td>{{ $data->address}}</td>
                        </tr>




                    </table>
                </form>
                </div>
            </div>
        </div>

    </div>
@endsection
