@extends('layouts.admin')
@section('title', 'اضافة متجر جديد')
@section('content')

<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="">الرئيسية </a>
                            </li>
                            <li class="breadcrumb-item"><a href=""> التجار  </a>
                            </li>
                            <li class="breadcrumb-item active">إضافة تاجر 
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
                                <h4 class="card-title" id="basic-layout-form"> إضافة تاجر </h4>
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
                                <div class="card-body">
                                    <form class="form" action="{{route('admin.vendors.store')}}"
                                          method="POST"
                                          enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group">
                                            <label> صوره التاجر </label>
                                            <label id="projectinput7" class="file center-block">
                                                <input type="file" id="file" name="logo"  onchange="readURL(this);" />
                                                <img id="blah" src="{{asset('assets/images/avatar.jpg')}}" alt="صوره التاجر">
                                                <span class="file-custom"></span>
                                            </label>
                                            @error('logo')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>

                                        <div class="form-body">

                                            <h4 class="form-section"><i class="ft-home"></i> بيانات التاجر </h4>

                                            
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="projectinput1"> اسم التاجر </label>
                                                                <input type="text" value="" id="name"
                                                                       class="form-control"
                                                                       placeholder="  "
                                                                       name="name">
                                                                @error("name")
                                                                <span class="text-danger"> {{$message}}</span>
                                                                @enderror
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="projectinput1"> البريد الالكتروني  </label>
                                                                <input type="email" value="" id="email"
                                                                       class="form-control"
                                                                       placeholder="  "
                                                                       name="email">
                                                                @error("email")
                                                                <span class="text-danger"> {{$message}}</span>
                                                                @enderror
                                                            </div>
                                                        </div>


                                                     
                                                        <div class="col-md-6 ">
                                                         <div class="form-group">
                                                            <label for="projectinput1"> كلمة المرور </label>
                                                            <input type="password" id="password"
                                                                   class="form-control"
                                                                   placeholder="كلمة المرور يجب ان يكون  حرف او رقم  " 
                                                                   name="password" autocomplete="new-password">

                                                            @error("password")
                                                            <span class="text-danger"> {{$message}}</span>
                                                            @enderror
                                                         </div>
                                                        </div>

                                                        
                                                        <div class="col-md-6 ">
                                                         <div class="form-group">
                                                            <label for="projectinput1"> رقم الهاتف </label>
                                                            <input type="text" id="mobile"
                                                                   class="form-control"
                                                                   placeholder="رقم الهاتف يجب ان يكون 11 رقم  " name="mobile"  maxlength="11" title="رقم الهاتف يجب ان يكون 11 رقم">

                                                            @error("mobile")
                                                            <span class="text-danger"> {{$message}}</span>
                                                            @enderror
                                                         </div>
                                                        </div>


                                                        <div class="col-md-6 ">
                                                            <div class="form-group">
                                                                <label for="projectinput1"> اختر القسم </label>
                                                               <select name='category_id' id="category_id" class="select2 form-control">
                                                                 @isset($categories)
                                                                 <option> من فضلك أختر القسم </option>
                                                                  @foreach($categories as $category)
                                                                   <option value="{{$category->id}}" data-route="{{route('getsubcat',$category->id)}}">{{$category->name}}</option>
                                                                  @endforeach
                                                                 @endisset   
                                                               </select>
                                                                @error("category_id")
                                                                <span class="text-danger"> {{$message}}</span>
                                                                @enderror
                                                            </div>
                                                        </div>

                                                         <div class="col-md-6 ">
                                                            <div class="form-group">
                                                                <label for="projectinput1"> اختر القسم الفرعي </label>
                                                               <select name='subcat' id="subcat" class="select2 form-control">
                                                                 @isset($subcategories)
                                                                 <option> من فضلك أختر القسم الفرعي</option>
                                                              
                                                                 @endisset   
                                                                
                                                                 
                                                               </select>
                                                                @error("subcat")
                                                                <span class="text-danger"> {{$message}}</span>
                                                                @enderror
                                                            </div>
                                                        </div>  
                                                        
                                                        <div class="col-md-6 ">
                                                            <div class="form-group">
                                                                <label for="projectinput1"> العنوان  </label>
                                                                <input type="text" id="pac-input"
                                                                        class="form-control"
                                                                        placeholder="  "
                                                                        value=""
                                                                        name="address">
                
                                                                @error("address")
                                                                <span class="text-danger"> {{$message}}</span>
                                                                @enderror
                                                            </div>
                                                         </div>
                                                    </div>
                                                    
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group mt-1">
                                                                <input type="checkbox" value="1"
                                                                       name="active"
                                                                       id="switcheryColor4"
                                                                       class="switchery" data-color="success"
                                                                       checked/>
                                                                <label for="switcheryColor4"
                                                                       class="card-title ml-1">الحالة </label>

                                                                @error("active")
                                                                <span class="text-danger"> </span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                              
                                        </div>

                                     
                                        
                                       

                                    
                                        <div class="form-actions">
                                            <button type="button" class="btn btn-warning mr-1"
                                                    onclick="history.back();">
                                                <i class="ft-x"></i> تراجع
                                            </button>
                                            <button type="submit" class="btn btn-primary">
                                                <i class="la la-check-square-o"></i> حفظ
                                            </button>
                                        </div>
                                    </form>
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


@section('script')

    <script>


        //******************Get Subcategory Depentend MainCategory  By Ajax****************** */
       
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
                }
            });

            $("#category_id").on('keyUp change', function(e){
                e.preventDefault();
                var category_id = $(this).val(),
                url = $("option:selected").data('route');
                console.log(category_id);
            if (category_id) {
                $.ajax({
                    type: "GET",
                    data:category_id,
                    url: url,
                    dataType:'json',
                    success: function(data) {
                        $("select[name='subcat'").html('');
                        $("select[name='subcat'").html(data.options);
                    }
                });
            }
            
                    
                                
                
            });
    
    
        /************************************* */

    </script>
    
    @stop
