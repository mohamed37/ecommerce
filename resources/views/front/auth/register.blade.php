
@include('front.includes.header')
<div class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__links">
                        <a href="route('main')"><i class="fa fa-home"></i> الرئيسية</a>
                        <span>تسجيل عميل جديد</span>
                    </div>
                </div>
            </div>
        </div>
</div>
<section class="contect">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 col-md-12">
        <div class="text-center">    
         <h3>تسجيل دخول <strong> عميل جديد</strong></h3>
         <p class="mb-4">Lorem ipsum dolor sit amet elit. Sapiente sit aut eos consectetur adipisicing Lorem ipsum dolor sit amet elit.</p>
        </div>

           {{-- Form Register Customer --}}

            <form class="form" action="{{route('cfregister')}}" method="POST" enctype="multipart/form-data">
             @csrf

                <div class="form-group">
                    <label> صوره العميل </label>
                    <label id="projectinput7" class="file center-block">
                        
                        <input type="file" id="file" name="logo" onchange="readURL(this);" />
                        <img id="blah" src="{{asset('assets/images/avatar.jpg')}}" alt="صوره العميل">
                        <span class="file-custom"></span>
                    </label>
                    @error('logo')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>

                <div class="form-body">

                    <h4 class="form-section"><i class="ft-home"></i> بيانات العملاء </h4>

                    
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="projectinput1"> اسم العميل </label>
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
                                    <label for="projectinput1"> 2 رقم الهاتف </label>
                                    <input type="text" id="phone"
                                            class="form-control"
                                            placeholder="رقم الهاتف يجب ان يكون 11 رقم  " name="phone"  maxlength="11" title="رقم الهاتف يجب ان يكون 11 رقم">

                                    @error("phone")
                                    <span class="text-danger"> {{$message}}</span>
                                    @enderror
                                    </div>
                                </div>

                            </div>  
                            
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group mt-1">
                                        <input type="hidden" value="0"
                                                name="active"
                                                id="switcheryColor4"
                                                class="switchery" data-color="success"
                                                checked/>
                                        <label for="switcheryColor4"
                                                class="card-title ml-1"> </label>

                                        @error("active")
                                        <span class="text-danger"> </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        
                </div>

                <div class="form-actions">
                    <button type="submit" class="btn btn-primary">
                        <i class="la la-check-square-o"></i> تسجيل 
                    </button>
                </div>

                                    

            </form>
                                        
      </div>

    </div>

 </div>


</section>
    @include('front.includes.footer')