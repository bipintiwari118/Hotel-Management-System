@extends('layout')
    @section('content')
    <div class="container-fluid">

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">RoomTypes
                    <a href="{{ url('admin/roomtype/create') }}" class="float-right btn btn-success btn-sm" >Add New</a>
                </h6>
            </div>
            <div class="card-body">
                @if(Session::has('success'))
                <p class="text-success">{{ session('success') }}</p>
                @endif
                @if(Session::has('delete'))
                <p class="text-danger">{{ session('delete') }}</p>
                @endif
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Title</th>
                                <th>Price</th>
                                <th>Action</th>

                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>#</th>
                                <th>Title</th>
                                <th>Price</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @if($data)
                            @foreach ($data as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->title }}</td>
                                <td>{{ $item->price }}</td>
                                <td>
                                    <a href="{{ url('admin/roomtype/'.$item->id) }}" type="button" class="btn btn-success"><i class="fa fa-eye"></i></a>
                                    <a href="{{ url('admin/roomtype/'.$item->id.'/edit') }}"  type="button" class="btn btn-info"><i class="fa fa-edit"></i></a>
                                    <a onclick="return confirm('Are you sure to delete this data?')" href="{{ url('admin/roomtype/'.$item->id.'/delete') }}" type="button" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                            @endforeach
                            @endif

                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->

 <!-- Page level plugins -->
 @section('scripts')

 <link href="{{ asset('vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
 <script src="{{ asset('vendor/datatables/jquery.dataTables.min.js') }}"></script>
 <script src="{{ asset('vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

 <!-- Page level custom scripts -->
 <script src="{{ asset('js/demo/datatables-demo.js') }}"></script>
 @endsection

    @endsection
