@extends('layouts.admin')
@section('title', ' اختيار الدليفريا ')
@section('content')
<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-2">
                <h3 class="content-header-title"> الدليفريا </h3>
                <div class="row breadcrumbs-top">
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">الرئيسية</a>
                            </li>
                            <li class="breadcrumb-item active"> الدليفريا
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-body">
            <!-- DOM - jQuery events table -->
            <section id="dom">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">جميع لغات الموقع </h4>
                                <a class="heading-elements-toggle"><i
                                        class="la la-ellipsis-v font-medium-3"></i></a>
                                <div class="heading-elements">
                                    <ul class="list-inline mb-0">
                                        <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                        <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                        <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                        <li><a data-action="close"><i class="ft-x"></i></a></li>
                                    </ul>
                                </div>
                            </div>

                            @include('admin.includes.alerts.success')
                            @include('admin.includes.alerts.errors')

                            <div class="card-content collapse show">
                                <div class="card-body card-dashboard">                                           
                                    
                                    <table
                                            class="table display nowrap table-striped table-bordered scroll-horizontal">
                                            <thead class="">
                                            <tr>
                                                <th>الاسم </th>
                                                <th> اللوجو</th>
                                                <th> تحديد الدليفري</th>

                                                <th>الاجرات</th>
                                            </tr>
                                            </thead>
                                            <tbody>
    
                                                @isset($deliveries)
                                
                                                @foreach ($deliveries as $item => $delivery)
                                                    
                                                
                                                    <tr>
                                                        
                                                        <td>{{$delivery->username}}</td>
                                                        <td><img style="width: 150px; height: 100px;" src="{{$delivery->photo}}"></td>
                                                        
                                                        <td>{{$delivery->getExpire()}}</td>
                                                        
                
                                                        <td>
                                                            <div class="btn-group" role="group"
                                                                    aria-label="Basic example">
                                                                    
                                                                                    
                                                            <button type="button" 
                                                                    class="btn btn-outline-success btn-min-width box-shadow-3 mr-1 mb-1"
                                                                    data-toggle="modal"
                                                                    data-target="#expire{{ $delivery -> id }}">
                                                                @if($delivery-> expire == 0)
                                                                    لم يتم الاختيار
                                                                @else
                                                                    تم الاختيار    
                                                                @endif
                                                            </button>
    
    
                                                            </div>
                                                        </td>
                                                    </tr>

                                                    <!-- expiretion_modal_class -->
                                                    <div class="modal fade" id="expire{{ $delivery ->id }}" tabindex="-1" role="dialog"
                                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">

                                                                    <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                                                        id="exampleModalLabel">
                                                                        اختار الدليفري
                                                                    </h5>
                                                                    
                                                                    <button type="button" class="close" data-dismiss="modal"
                                                                        aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                
                                                                </div>
                                                                
                                                                <div class="modal-body">
                                                                
                                                                    <form action="{{ route('admin.deliveryOrder',$delivery) }}" method="post">
                                                                        @csrf
                                                                        <input type="hidden" name="time" class="form-control" value="15">
                                                                        <input type="hidden" name ='delivery_id' value="{{$delivery->id}}">
                                                                        <div class="col-12 ">
                                                                            <div class="form-group">
                                                                                <label for="projectinput1"> اختر الاوردر </label>

                                                                               <select name='order_id' id="order_id" class=" order_id select2 form-control">
                                                                                 @isset($orders)
                                                                                 <option> من فضلك أختر الاوردر </option>
                                                                                  @foreach($orders as $order)
                                                                                   <option value="{{$order->id}}" id="order" data-route="{{route('getcustomer',$order->customer_id)}}">{{$order->id}}</option>
                                                                                  @endforeach
                                                                                 @endisset   
                                                                               </select>

                                                                                @error("order_id")
                                                                                <span class="text-danger"> {{$message}}</span>
                                                                                @enderror
                                                                            </div>
                                                                        </div>
                                                                       
                                                                      
                                                                        <div class="col-12 ">
                                                                            <div class="form-group">
                                                                                <label for="projectinput1"> اخترالمكان </label>
                                                                                <input type="text" name="address" class="form-control">
                                                                                @error("address")
                                                                                <span class="text-danger"> {{$message}}</span>
                                                                                @enderror
                                                                            </div>
                                                                        </div>

                                                                
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-secondary"
                                                                                data-dismiss="modal">اغلاق</button>
                                                                            <button type="submit"
                                                                                class="btn btn-success">حفظ</button>
                                                                        </div>
                                                                    </form>
                                                                
                                                                    <div class="col-12 ">
                                                                            <div class="form-group">
                                                                                <label for="projectinput1"> اختر العميل </label>
                                                                               <select name='customer_id' class="select2 form-control">
                                                                                 <option> من فضلك أختر العميل </option>
                                                                                 
                                                                               </select>
                                                                                @error("customer_id")
                                                                                <span class="text-danger"> {{$message}}</span>
                                                                                @enderror
                                                                            </div>
                                                                        </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- expiretion_modal_class -->
                       
                                                    @endforeach
                                                
                                        @endisset
    
    
                                            </tbody>
                                    </table>
                                    <div class="justify-content-center d-flex">
    
                                    </div>
                                </div>
                            </div>
                                       
                        </div>
                    </div>
                </div>
                    
            </section>
        </div>
    </div>
</div>
@endsection

@section('script')
 <script>
    $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
            }
    });

    $("body").on('change keyup', '#order_id', function(e){
                e.preventDefault();
                var order_id = $(this).val(),
                url = $("#order").data('route');
               alert(url);
            if (order_id) {
                $.ajax({
                    type: "GET",
                    data:order_id,
                    url: url,
                    dataType:'json',
                    success: function(data) {
                        $("select[name='customer_id'").html('');
                        $("select[name='customer_id'").html(data.options);
                    }
                });
            }
            
                    
                                
                
            });
 </script>   
@endsection