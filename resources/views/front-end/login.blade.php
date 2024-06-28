@extends('front-end.frontlayout')
@section('front-content')
<div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

        <div class="col-xl-10 col-lg-12 col-md-9">

            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">

                        <div class="col-lg-6">
                            <div class="p-5">
                                <div class="text-center">
                                    @if (Session::has('success'))
                                    <p class="text-success">{{ session('success') }}</p>
                                @endif
                                    @if (Session::has('msg'))
                                        <p class="text-danger">{{ session('msg') }}</p>
                                    @endif
                                    @if (Session::has('error'))
                                    <p class="text-danger">{{ session('error') }}</p>
                                @endif
                                    @if (Session::has('logout'))
                                        <p class="text-success">{{ session('logout') }}</p>
                                    @endif
                                    @if ($errors->any())
                                    @foreach ($errors->all() as $error)
                                        <p class="text-danger">{{ $error }}</p>
                                    @endforeach
                                @endif
                                    <h1 class="h4 text-gray-900 mb-4">Login</h1>
                                </div>
                                <form class="" method="post" action="{{ route('customer.login') }}">
                                    @csrf
                                    <div class="form-group mt-4">
                                        <input value=""  name="email" class="form-control form-control-user" id="username"
                                            aria-describedby="emailHelp" placeholder="Enter email..."
                                            type="text">
                                    </div>
                                    <div class="form-group mt-4">
                                        <input value="" type="password" class="form-control form-control-user" id="Password"
                                            placeholder="Password" name="password">
                                    </div>

                                    <input class="btn btn-primary btn-user btn-block mt-4" value="Login" type="submit">

                                </form>

                            </div>

                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

</div>

<!-- Bootstrap core JavaScript-->
<script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

<!-- Core plugin JavaScript-->
<script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>

<!-- Custom scripts for all pages-->
<script src="{{ asset('js/sb-admin-2.min.js') }}"></script>

@endsection
