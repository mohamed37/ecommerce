@extends('layouts.admin')
@section('title', ' اقسام الفرعية ')
@section('content')
<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-2">
                <h3 class="content-header-title"> الاقسام الفرعية </h3>
                <div class="row breadcrumbs-top">
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">الرئيسية</a>
                            </li>
                            <li class="breadcrumb-item active"> الاقسام الفرعية
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
                                <h4 class="card-title">جميع الاقسام الفرعية </h4>
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
                                    <table class="table display nowrap table-striped table-bordered scroll-horizontal">
                                        <thead class="text-success">
                                        <tr>
                                            <th>القسم الرئيسي</th>
                                            <th>القسم </th>
                                            <th>صوره القسم</th>
                                            <th>الحالة</th> 
                                            <th>الإجراءات</th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                        @forelse ($subcategories as $category)
                                        
                                            <tr>
                                                <td>
                                                    <a class="menu-item" href="{{route('admin.maincategories.show', $category->maincategory->id)}}">
                                                        {{$category->maincategory->name}}
                                                    </a>
                                                </td>
                                                <td>{{$category ->name}}</td>                
                                                <td> <img style="width: 150px; height: 100px;" src="{{$category->photo}}"></td>
                                                <td>{{$category -> getActive()}}</td>

                                                <td>
                                                    <div class="btn-group" role="group"
                                                            aria-label="Basic example">

                                                        

                                                        <a href="{{route('admin.sub_categories.delete',$category -> id)}}"
                                                            class="btn btn-outline-danger btn-min-width box-shadow-3 mr-1 mb-1">حذف</a>


                                                        <a href="{{route('admin.sub_categories.status',$category->id)}}"
                                                            class="btn btn-outline-warning btn-min-width box-shadow-3 mr-1 mb-1">
                                                            @if($category -> active == 0)
                                                                تفعيل
                                                                @else
                                                                الغاء تفعيل
                                                            @endif
                                                        </a>


                                                    </div>
                                                </td>

                                            </tr>
                                        @empty
                                        
                                        <div class="row mr-2 ml-2" >
                                            <button type="text" class="btn btn-lg btn-block btn-outline-danger mb-2"
                                                    id="type-error">لا توجد بيانات بهذا الجدول !
                                            </button>
                                        </div>
                                        
                                         @endforelse


                                        </tbody>
                                    </table>
                                    
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
