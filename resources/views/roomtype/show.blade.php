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
                <div class="table-responsive">

                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

                        <tr>
                            <th>Title</th>
                            <td>{{ $data->title }}</td>
                        </tr>
                        <tr>
                            <th>Price</th>
                            <td>{{ $data->price }}</td>
                        </tr>
                        <tr>
                            <th>Details</th>
                            <td>{{ $data->detail }}</td>
                        </tr>


                    </table>
                </form>
                </div>
            </div>
        </div>

    </div>
@endsection
