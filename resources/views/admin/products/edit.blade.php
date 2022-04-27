@extends('layouts.admin')
@section('title', 'تعديل البيانات')
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
                                <li class="breadcrumb-item"><a href="{{route('admin.products')}}"> المنتجات </a>
                                </li>
                                <li class="breadcrumb-item active">تعديل المنتج
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
                                    <h4 class="card-title" id="basic-layout-form"> إضافة منتج </h4>
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
                                        <form class="form" action="{{route('admin.products.update',$product -> id)}}" method="POST"
                                              enctype="multipart/form-data">
                                            @csrf

                                            <input type="hidden" name="id" value="{{$product->id}}">
                                        <div class="form-group">
                                          <div class="text-center">
                                             <img src="{{$product->photo}}"
                                                  class="rounded-circle height-150" alt="صورة المنتج" >
                                          </div>
                                        </div>       
                                            <div class="form-group">
                                                <label> صوره المنتج </label>
                                                <label id="projectinput7" class="file center-block">
                                                    <input type="file" id="file" name="photo">
                                                    <span class="file-custom"></span>
                                                </label>
                                                @error('photo')
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>

                                            <div class="form-body">
                                                <h4 class="form-section"><i class="ft-home"></i> بيانات  المنتجات </h4>

                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="projectinput1"> اسم المنتج </label>
                                                            <input type="text" value="{{$product->name}}" id="name"
                                                                   class="form-control"
                                                                   name="name">
                                                            @error('name')
                                                            <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="projectinput1"> المبلغ </label>
                                                            <input type="text" value="{{$product->price}}" id="name"
                                                                   class="form-control"
                                                                 
                                                                   name="price">
                                                            @error('price')
                                                            <span class="text-danger">{{$message}} </span>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="col-md-4">
                                                     <div class="form-group">
                                                            <label for="projectinput1"> اختر اسم الفرع </label>
                                                        <select name='branch_id' id="branch_id" class="select2 form-control">
                                                            @isset($branches)
                                                             @foreach($branches as $index=>$branch)
                                                            <option value="{{$branch->id}}" 
                                                                {{$product->branch_id == $branch->id ? 'selected' : ' '}}>
                                                                {{$branch->name}}
                                                            </option>
                                                            @endforeach
                                                            @endisset   
                                                            
                                                        </select>
                                                            @error("branch_id")
                                                            <span class="text-danger"> {{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                  

                                                    <div class="col-md-12">
                                                     <div class="form-group">
                                                            <label for="projectinput1"> الوصف </label>
                                                                   <textarea name="description"  id="description" class="form-control ckeditor">
                                                                   {!!$product->description!!}
                                                                   </textarea>
                                                            @error('description')
                                                            <span class="text-danger">{{$message}} </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                            

                                                </div>



                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group mt-1">
                                                            <input type="checkbox"  value="{{$product->active}}" name="active"
                                                                   id="switcheryColor4"
                                                                   class="switchery" data-color="success"
                                                                   checked/>
                                                            <label for="switcheryColor4"
                                                                   class="card-title ml-1">الحالة </label>

                                                            @error('active')
                                                            <span class="text-danger">{{$message}}</span>
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
                                                    <i class="la la-check-square-o"></i>  تحديث
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
  <script src="//cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
@stop