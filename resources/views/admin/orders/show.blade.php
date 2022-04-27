@extends('layouts.admin')
@section('title', 'عرض البيانات')
@section('content')

    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('dashboard')}}">الرئيسية </a>
                                </li>
                                <li class="breadcrumb-item"><a href="{{route('admin.orders')}}"> العرض </a>
                                </li>
                                <li class="breadcrumb-item active">عرض العرض
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <!-- Basic form layout section start -->
                <section id="basic-form-layouts">
                    <div class="row match-height">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title" id="basic-layout-form">  العرض </h4>
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
                                        class="table display nowrap table-striped table-bordered ">
                                        <thead>
                                        <tr>
                                            <th>  #</th>
                                            <th>  صور المنتج</th>
                                            <th>  اسم المنتج</th>
                                            <th>  سعر المنتج</th>
                                            <th>  كمية المنتج</th>
                                            <th> المبلغ</th>
                                            
                                            <th>الإجراءات</th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                            @isset($order)
                                                   
                                            @foreach($order->products as $index=>$product)
                                                <tr>
                                                    <td>{{$index+1}} </td>
                                                    <td> <img style="width: 100px; height: 75px;" src="{{$product->photo}}"></td>
                                                    <td>{{$product->name}} </td>
                                                    <td>{{$product->price}} </td>
                                                    <td>{{$product->pivot->quantity}} </td>
                                                    
                                                    <td>{{number_format($product->price * $product->pivot->quantity, 2)}} </td>
                                                   
                                                
                                                    <td>
                                                        <div class="btn-group" role="group"
                                                             aria-label="Basic example">
                                                             
                                                            <a href="{{route('admin.orders.delete', $order->id)}}"
                                                                class="btn btn-outline-danger btn-min-width box-shadow-3 mr-1 mb-1">حذف</a>
                                                             
                                                                <a href="{{route('admin.orders')}}"
                                                                class="btn btn-outline-success btn-min-width box-shadow-3 mr-1 mb-1">رجوع</a>
                                                           

                                                        </div>
                                                    </td>
                                                </tr>
                                            
                                                          
                                        @endforeach
                                       <h1> اسم العميل :{{$order->customer->name}}</h1>
                                       <h1> المكان :{{$order->address}}</h1>
                                       <h1> الاجمالي :{{$order->total_price}}</h1>
                                       
                                       @endisset

                                        </tbody>
                                    </table>
                                    
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- // Basic form layout section end -->
            </div>
        </div>
    </div>

@endsection
