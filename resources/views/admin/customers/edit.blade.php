@extends('layouts.admin')
@section('title', 'تعديل عميل ')
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
                            <li class="breadcrumb-item"><a href=""> العملاء  </a>
                            </li>
                            <li class="breadcrumb-item active">تعديل عميل 
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
                                <h4 class="card-title" id="basic-layout-form"> تعديل عميل </h4>
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
                                    <form class="form" action="{{route('admin.customers.update',$customer->id)}}"
                                          method="POST"
                                          enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden"  value="{{$customer->latitude}}" id="latitude" name="latitude">
                                        <input type="hidden" value="{{$customer->longitude}}" id="longitude"  name="longitude">
                                        <input type="hidden" name="id" value="{{$customer->id}}">
                                        <div class="form-group">
                                          <div class="text-center">
                                             <img src="{{$customer->logo}}"
                                                  class="rounded-circle height-150" alt="صورة العميل" >
                                          </div>
                                        </div> 


                                        <div class="form-group">
                                            <label> صوره العميل </label>
                                            <label id="projectinput7" class="file center-block">
                                                <input type="file" id="file" name="logo" value="{{$customer->logo}}">
                                                <span class="file-custom"></span>
                                            </label>
                                         
                                            @error('logo')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>

                                        <div class="form-body">

                                            <h4 class="form-section"><i class="ft-home"></i> بيانات العميل </h4>

                                           
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="projectinput1"> اسم العميل </label>
                                                                <input type="text"  id="name"
                                                                       class="form-control"
                                                                       placeholder="  "
                                                                       name="name"
                                                                       value="{{$customer->name}}">
                                                                @error("name")
                                                                <span class="text-danger"> {{$message}}</span>
                                                                @enderror
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="projectinput1"> البريد الالكتروني  </label>
                                                                <input type="text"  id="email"
                                                                       class="form-control"
                                                                       placeholder="  "
                                                                       name="email"
                                                                       value="{{$customer->email}}">
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
                                                                   placeholder="كلمة المرور يجب ان يكون 8 حرف او رقم  " 
                                                                   name="password"  value="" autocomplete="new-password">

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
                                                                   placeholder="رقم الهاتف يجب ان يكون 11 رقم  " 
                                                                   name="mobile" value="{{$customer->mobile}}" 
                                                                    maxlength="11" title="رقم الهاتف يجب ان يكون 11 رقم">

                                                            @error("mobile")
                                                            <span class="text-danger"> {{$message}}</span>
                                                            @enderror
                                                         </div>
                                                        </div>

                                                        <div class="col-md-6 ">
                                                            <div class="form-group">
                                                            <label for="projectinput1"> 2 رقم الهاتف </label>
                                                            <input type="text" id="phone"
                                                                   class="form-control"
                                                                   placeholder="رقم الهاتف يجب ان يكون 11 رقم  " name="phone" 
                                                                   value="{{$customer->phone}}"
                                                                    maxlength="11" title="رقم الهاتف يجب ان يكون 11 رقم">

                                                            @error("phone")
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
                                                                      @if($customer->active == 1) checked @endif/>
                                                                <label for="switcheryColor4"
                                                                       class="card-title ml-1">الحالة </label>

                                                                @error("active")
                                                                <span class="text-danger"> </span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        
                                                       

                                                    </div>

                                                    <div class="row">
                                                    <div class="col-md-6 ">
                                                        <div class="form-group">
                                                            <label for="projectinput1"> العنوان  </label>
                                                            <input type="text" id="pac-input"
                                                                   class="form-control"
                                                                   placeholder="  " name="address"
                                                                   value="{{$customer -> address}}"
                                                            >

                                                            @error("address")
                                                            <span class="text-danger"> {{$message}}</span>
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

