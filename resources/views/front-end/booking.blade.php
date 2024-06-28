@extends('front-end.frontlayout')
@section('front-content')
    <div class="container mt-4">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h3 class="m-0 font-weight-bold text-primary">Booking
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
                    <form action="{{ url('admin/booking') }}" method="post">
                        @csrf
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <tr>
                            <th>CheckIn Date</th>
                            <td><input type="date" name="checkin" id="" class="form-control checkin-date"></td>
                        </tr>
                        <tr>
                            <th>CheckOut Date</th>
                            <td><input type="date" name="checkout" id="" class="form-control "></td>
                        </tr>
                        <tr>
                            <th>Avaliable Rooms</th>
                            <td>
                                <select name="room_id" id="" class="form-control room-list"></select>
                            </td>
                        </tr>
                        <tr>
                            <th>Total Adults</th>
                            <td><input type="text" name="totals_adult" id="" class="form-control"></td>
                        </tr>
                        <tr>
                            <th>Total Children</th>
                            <td><input type="text" name="totals_Children" id="" class="form-control"></td>
                        </tr>
                        <tr>
                            <input type="hidden" name="customer_id" value="{{ session('customer')[0]->id }}">
                            <input type="hidden" name="ref" value="front">

                            <td colspan="2"><input type="submit" value="submit" class="btn btn-primary"></td>
                        </tr>

                    </table>
                </form>
                </div>
            </div>
        </div>

    </div>
@section('scripts')


    <script>
        $(document).ready(function(){
       $('.checkin-date').on('blur',function(){
           let checkinDate=$(this).val();
           $.ajax({
               url:'{{ url('admin/booking') }}/avaliable-rooms/'+checkinDate,
               type:'get',
               dataType:'json',
               beforeSend:function(){
                   $('.room-list').html('<option>---Loading--</option>');
               },
               success:function(response){
                  var _html='';
                   $.each(response.data,function(index,value){
                       _html+='<option value="'+value.id+'">'+value.title+'</option>'
                   });
                   $('.room-list').html(_html);


               }
           });
       });
   });

   </script>
@endsection


@endsection
