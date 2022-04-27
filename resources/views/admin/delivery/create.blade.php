@extends('layouts.admin')
@section('title', 'اضافة دليفري جديد')
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
                            <li class="breadcrumb-item"><a href=""> الدليفريا  </a>
                            </li>
                            <li class="breadcrumb-item active">إضافة دليفري 
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
                                <h4 class="card-title" id="basic-layout-form"> إضافة دليفري </h4>
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
                                    <form class="form" action="{{route('admin.delivery.store')}}"
                                          method="POST"
                                          enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group">
                                            <label> صوره الدليفري </label>
                                            <label id="projectinput7" class="file center-block">
                                                <input type="file" id="file" name="photo">
                                                <span class="file-custom"></span>
                                            </label>
                                            @error('photo')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>

                                        <div class="form-body">

                                            <h4 class="form-section"><i class="ft-home"></i> بيانات الدليفريا </h4>

                                            <input type="hidden"  value="" id="latitude" name="latitude">
                                            <input type="hidden" value="" id="longitude"  name="longitude">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="projectinput1"> اسم الاول </label>
                                                                <input type="text" value="" id="name"
                                                                       class="form-control"
                                                                       placeholder="  "
                                                                       name="firstname">
                                                                @error("firstname")
                                                                <span class="text-danger"> {{$message}}</span>
                                                                @enderror
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="projectinput1"> اسم الاخير </label>
                                                                <input type="text" value="" id="name"
                                                                       class="form-control"
                                                                       placeholder="  "
                                                                       name="lastname">
                                                                @error("lastname")
                                                                <span class="text-danger"> {{$message}}</span>
                                                                @enderror
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="projectinput1"> اسم الشهرة </label>
                                                                <input type="text" value="" id="name"
                                                                       class="form-control"
                                                                       placeholder="  "
                                                                       name="username">
                                                                @error("username")
                                                                <span class="text-danger"> {{$message}}</span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="projectinput1"> العمر  </label>
                                                                <input type="number" value="" id="name"
                                                                       class="form-control"
                                                                       placeholder="  "
                                                                       name="age">
                                                                @error("age")
                                                                <span class="text-danger"> {{$message}}</span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="projectinput1"> البريد الالكتروني  </label>
                                                                <input type="text" value="" id="email"
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
                                                                   name="password"   autocomplete="new-password">

                                                            @error("password")
                                                            <span class="text-danger"> {{$message}}</span>
                                                            @enderror
                                                         </div>
                                                        </div>
                                                        
                                                        <div class="col-md-6 ">
                                                         <div class="form-group">
                                                            <label for="projectinput1"> رقم الهاتف </label>
                                                            <input type="text" id="phone"
                                                                   class="form-control"
                                                                   placeholder="رقم الهاتف يجب ان يكون 11 رقم  " name="phone"  maxlength="11" title="رقم الهاتف يجب ان يكون 11 رقم">

                                                            @error("phone")
                                                            <span class="text-danger"> {{$message}}</span>
                                                            @enderror
                                                         </div>
                                                        </div>

                                                        <div class="col-md-6 ">
                                                         <div class="form-group">
                                                            <label for="projectinput1"> رقم البطاقة </label>
                                                            <input type="text" id="card_number"
                                                                   class="form-control"
                                                                   placeholder="رقم البطاقة يجب ان يكون 14 رقم  " name="card_number"  maxlength="14" title="رقم البطاقة يجب ان يكون 14 رقم">

                                                            @error("card_number")
                                                            <span class="text-danger"> {{$message}}</span>
                                                            @enderror
                                                         </div>
                                                        </div>
                                                    </div>
                                              
                                        </div>

                                        <div class="row">
                                         <div class="col-md-12 ">
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

