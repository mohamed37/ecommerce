@extends('layouts.admin')
@section('title', 'التجار')
@section('content')
<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-2">
                <h3 class="content-header-title"> التجار </h3>
                <div class="row breadcrumbs-top">
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">الرئيسية</a>
                            </li>
                            <li class="breadcrumb-item active"> التجار
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
                                <h4 class="card-title">جميع التجار </h4>
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
                                    <div class="row">
                                        <!-- Search Ajax -->
                                        <div class="search-input col-sm-6">  
                                            <input type="text" value="{{ request()->search }}" 
                                                    name="search" class="form-control" data-url="{{ route('search')}}" 
                                                    placeholder="ابحث هنا..">
                                        </div>
                                        <!-- End Search Ajax -->
                                        <br>
                                        <br>
                                        <!-- orderBy Ajax -->
                                        <div class="col-sm-6">
                                            <div class="dropdown  ">
                                                    <button class="btn btn-warning dropdown-toggle" data-toggle="dropdown"
                                                            aria-haspopup="true" aria-expanded="false">
                                                            ترتيب
                                                    </button>
                                                
                                                    <div class="dropdown-menu">
                                                        
                                                            <a class="dorpdown-item" href="{{route('admin.vendors',['sort' =>'desc'])}}">   
                                                                تصاعدي
                                                            </a>
                                                        
                                                        <div class="dropdown-divider"></div>
                                                            <a class="dorpdown-item" href="{{route('admin.vendors',['sort' =>'asc'])}}"> 
                                                                تنزلي
                                                            </a>
                                                        
                                                </div>
                                            </div>
                                            
                                        </div>
                                           <!-- End orderBy Ajax -->

                                        <br>
                                        <br>

                                        <!-- paginate Ajax -->
                                        <div class="col-sm-6">
                                            <div class="dropdown  ">
                                                <button class="btn btn-warning dropdown-toggle" data-toggle="dropdown"
                                                        aria-haspopup="true" aria-expanded="false">
                                                        paginate
                                                </button>
                                            
                                                <div class="dropdown-menu">
                                                        <a class="dorpdown-item" href="{{route('admin.vendors',['number' =>5])}}">   
                                                            5
                                                        </a>
                                                        <div class="dropdown-divider"></div>
                                                        <a class="dorpdown-item" href="{{route('admin.vendors',['number' =>10])}}"> 
                                                            10
                                                        </a>
                                                  
                                                        <div class="dropdown-divider"></div>
                                                        <a class="dorpdown-item" href="{{route('admin.vendors',['number' =>25])}}"> 
                                                            25
                                                        </a>
                                                  
                                                        <div class="dropdown-divider"></div>
                                                        <a class="dorpdown-item" href="{{route('admin.vendors',['number' =>50])}}"> 
                                                            50
                                                        </a>
                                                  
                                                </div>
                                            </div>                                    
                                        </div>
                                         <!-- End paginate Ajax -->
                                        

                                         <!-- Fillter Ajax -->
                                         <div class="col-sm-6">
                                            <div class="dropdown  ">
                                                <button class="btn btn-warning dropdown-toggle" data-toggle="dropdown"
                                                        aria-haspopup="true" aria-expanded="false">
                                                        Fillter
                                                </button>
                                            
                                                <div class="dropdown-menu">
                                                    @foreach(App\Models\MainCategory::get() as $category)
                                                        <a class="dorpdown-item" 
                                                        href="{{route('admin.vendors',['fillter' =>$category->id])}}">   
                                                            {{$category->name}}
                                                        </a>
                                                    @endforeach    
                                                </div>
                                           </div>
                                         <!-- End Fillter Ajax -->
                                    </div>

                                       <br>
                                       <br>
                                       <br>
                                    <table
                                        class="table display nowrap table-responsive table-striped table-bordered scroll-horizontal">
                                        <thead >
                                        <tr>
                                            <th>#</th>
                                            <th>الاسم </th>
                                            <th> اللوجو</th>
                                            <th>الهاتف</th>
                                            <th>القسم الرئيسي</th>
                                            <th>الحالة</th>
                                            <th>الاجرات</th>
                                        </tr>
                                        </thead>
                                        <tbody class="cont-data">

                                        @forelse ($vendors as $index=> $vendor)
                                        <tr>
                                            <td>{{$index+1}}</td>
                                            
                                            <td>{{$vendor -> name}}</td>
                                            <td><img style="width: 150px; height: 100px;" src="{{$vendor->logo}}"></td>
                                            <td>{{$vendor -> mobile}}</td>
                                            <td>{{$vendor->category->name}} </td>
                                            <td>{{$vendor->getActive()}}</td>
    
                                            <td>
                                                <div class="btn-group" role="group"
                                                     aria-label="Basic example">
                                                    <a href="{{route('admin.vendors.edit',$vendor -> id)}}"
                                                       class="btn btn-outline-primary btn-min-width box-shadow-3 mr-1 mb-1">تعديل</a>


                                                    <a href="{{route('admin.vendors.delete',$vendor -> id)}}"
                                                       class="btn btn-outline-danger btn-min-width box-shadow-3 mr-1 mb-1">حذف</a>


                                                    <a href="{{route('admin.vendors.status',$vendor->id)}}"
                                                       class="btn btn-outline-warning btn-min-width box-shadow-3 mr-1 mb-1">
                                                        @if($vendor -> active == 0)
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

@section('script')
 <script>
 //******************Get Search  By Ajax****************** */
       
    $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
                }
    });

           // AJAX SEARCH 
            $('input[name=search]').keyup(function() {
                var value = $(this).val(),
                    url    = $(this).data('url');

                   
                $.ajax({
                url:url,
                method:"get",
                dataType:'json',
                data: {search:value},
                success: function(response)
                    {
                    console.log(response);
                   $('tbody').html('');
                    $('tbody').html(response);
                    
                    },
                error: function (error,status,jqXHR) { 
                    $('.cont-data').html(error);
                                                    }
                }); 
            }); 
    
    
        /************************************* */

    </script> 
@endsection
