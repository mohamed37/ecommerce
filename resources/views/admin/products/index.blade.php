@extends('layouts.admin')
@section('title', ' المنتجات ')
@section('content')
<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-2">
                <h3 class="content-header-title"> المنتجات </h3>
                <div class="row breadcrumbs-top">
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="">الرئيسية</a>
                            </li>
                            <li class="breadcrumb-item active"> المنتجات
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
                                <h4 class="card-title">جميع المنتجات </h4>
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
                                        class="table display nowrap table-striped table-bordered table-responsive">
                                        <thead>
                                        <tr>
                                            <th> # </th>
                                            <th> الاسم</th>
                                            <th>اسم الفرع</th>
                                            <th>الصورة</th>
                                            <th>المبلغ</th>
                                            <th>الوصف</th>
                                            <th>الحالة</th>
                                            <th>الإجراءات</th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                            @isset($products)
                                               @foreach ($products as $index=> $product)
                                                   
                                       
                                                <tr>
                                                <td>{{$index+1}}</td>
                                                    <td>{{$product->name}} </td>
                                                    <td>{{$product->branch->name}} </td>
                                                    <td><img style="width: 150px; height: 100px;" src="{{$product->photo}}"></td>
                                                    <td>{{$product->price}}</td>
                                                    <td>{!!$product->description!!}</td>
                                                    <td id='active'>{{$product->getActive()}}</td>
                                                    <td>
                                                        <div class="btn-group" role="group"
                                                             aria-label="Basic example">
                                                            <a href="{{route('admin.products.edit',$product->id)}}"
                                                               class="btn btn-outline-primary btn-min-width box-shadow-3 mr-1 mb-1">تعديل</a>
                                                               
                                                            <a href="{{route('admin.products.delete',$product->id)}}"
                                                                class="btn btn-outline-danger btn-min-width box-shadow-3 mr-1 mb-1">حذف</a>
                                                             
                                                            <a data-route="{{route('admin.products.status',$product->id)}}"
                                                                class="btn btn-outline-warning btn-min-width box-shadow-3 mr-1 mb-1"
                                                                id="status">
                                                             @if($product->active == 0)
                                                                 تفعيل
                                                             @else
                                                                 الغاء تفعيل
                                                             @endif  
                                                            </a>

                                                        </div>
                                                    </td>
                                                </tr>
                                            
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

    /* $('#status').on('click', function(e){
        e.preventDefault();
        var route = $(this).data('route'),
        active = $('#active').attr('id');
       

            $.ajax({
            type:"POST",
            url:route,
            data:active,
            dataType:'application/json',
            success:function(data){
               alert(data);
            },
            error:function(xhr,status,error){
               
            }
        });

    }); */

</script>
@stop
