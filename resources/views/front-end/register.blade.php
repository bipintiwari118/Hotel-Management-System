@extends('front-end.frontlayout')
@section('front-content')
    <div class="container mt-4">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h3 class="m-0 font-weight-bold text-primary">Register
                </h3>
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
                    <form action="{{route('customer.register') }}" method="post" >
                        @csrf
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <tr>
                            <th>Full Name <span class="text-danger">*</span>
                            </th>
                            <td><input type="text" name="full_name" id="" class="form-control" required></td>
                        </tr>
                        <tr>
                            <th>Email <span class="text-danger">*</span></th>
                            <td><input type="email" name="email" id="" class='form-control' required></td>
                        </tr>
                        <tr>
                            <th>Password <span class="text-danger">*</span></th>
                            <td><input type="password" name="password" id="" class='form-control' required></td>
                        </tr>
                        <tr>
                            <th>Address <span class="text-danger">*</span></th>
                            <td><input type="text" name="address" id="" class='form-control' required></td>
                        </tr>
                        <tr>
                            <th>Mobile <span class="text-danger">*</span></th>
                            <td><input type="text" name="mobile" id="" class='form-control' required></td>
                        </tr>

                        <tr>
                            <td colspan="2"><input type="submit" value="Register" class="btn btn-primary"></td>
                        </tr>

                    </table>
                </form>
                <div class="text-center">
                    <a class="small" href="login.html">Already have an account? Login!</a>
                </div>
                </div>
            </div>
        </div>
    </div>

    </div>
@endsection
