@extends('front-end/frontlayout')
      {{-- navbar end --}}
@section('front-content')


      {{-- slider-start --}}
      <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="{{ asset('img/banner1.jpg') }}" class="d-block w-100" alt="...">
          </div>
          <div class="carousel-item">
            <img src="{{ asset('img/banner2.jpg') }}" class="d-block w-100" alt="...">
          </div>
          <div class="carousel-item">
            <img src="{{ asset('img\banner3.jpg') }}" class="d-block w-100" alt="...">
          </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>

      {{-- slider-end --}}

      {{-- services start--}}

      <div class="container mt-4">
        <h1 class="text-center border-bottom">Services</h1>
        <div class="row mt-4">
            <div class="col-md-4">
                <img src="{{ asset('img/service1.jpg') }}" class="img-thumbnail" alt="...">
            </div>
            <div class="col-md-8">
                <h3>service heading</h3>
                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Facere dolores adipisci, culpa nesciunt voluptatum, soluta atque cum ducimus impedit, optio unde laudantium rerum fuga minus! Reiciendis odio necessitatibus itaque quisquam.</p>
                <p><a href="" class="btn btn-sm btn-primary">Read More</a></p>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-md-4">
                <img src="{{ asset('img/service1.jpg') }}" class="img-thumbnail" alt="...">
            </div>
            <div class="col-md-8">
                <h3>service heading</h3>
                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Facere dolores adipisci, culpa nesciunt voluptatum, soluta atque cum ducimus impedit, optio unde laudantium rerum fuga minus! Reiciendis odio necessitatibus itaque quisquam.</p>
                <p><a href="" class="btn btn-sm btn-primary">Read More</a></p>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-md-4">
                <img src="{{ asset('img/service1.jpg') }}" class="img-thumbnail" alt="...">
            </div>
            <div class="col-md-8">
                <h3>service heading</h3>
                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Facere dolores adipisci, culpa nesciunt voluptatum, soluta atque cum ducimus impedit, optio unde laudantium rerum fuga minus! Reiciendis odio necessitatibus itaque quisquam.</p>
                <p><a href="" class="btn btn-sm btn-primary">Read More</a></p>
            </div>
        </div>
      </div>
      {{-- sservice end --}}

      {{-- Gallery section start --}}
      <div class="container mt-4">
        <h1 class="text-center border-bottom">Gallery</h1>
        <div class="row my-4">
            @foreach ($roomtypeimages as $roomtype )


            <div class="col-md-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="header">{{ $roomtype->roomtype->title }}</h5>

                         <img width="200" src="{{ Storage::url($roomtype->img_src) }}" alt="" srcset="">

                    </div>
                  </div>
            </div>
            @endforeach
        </div>
      </div>
        {{-- Gallery section End --}}
<
@endsection
