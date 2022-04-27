
@include('front.includes.header')
<div class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__links">
                        <a href="route('main')"><i class="fa fa-home"></i> الرئيسية</a>
                        <span>تسجيل دخول</span>
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
         <h3>تسجيل دخول <strong> عميل</strong></h3>
         <p class="mb-4">Lorem ipsum dolor sit amet elit. Sapiente sit aut eos consectetur adipisicing Lorem ipsum dolor sit amet elit.</p>
        </div>
    
        <form action="{{route('signin')}}" method="post">
            @csrf
            <div class="form-group first">
                <label for="username">البريد الالكتروني</label>
                <input type="text" name="email" class="form-control" placeholder="your-email@gmail.com" >

                @error('email')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
        
            <div class="form-group last mb-3">
        
                <label for="password">كلمة المرور</label>
        
                <input type="password" name="password" class="form-control" placeholder="كلمة المرور" >
        
                @error('password')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
        
            <div class="d-flex mb-5 align-items-center">
        
                <label class="control control--checkbox mb-0"><span class="caption">Remember me</span>
        
                    <input type="checkbox" checked="">
        
                    <div class="control__indicator"></div>
        
                </label>
        
                <span class="ml-auto"><a href="#" class="forgot-pass">Forgot Password</a></span>
        
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