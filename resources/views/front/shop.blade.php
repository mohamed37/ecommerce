@include('front.includes.header')
<div class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__links">
                        <a href="{{route('main')}}"><i class="fa fa-home"></i> الرئيسية</a>
                        <span>محل</span>
                    </div>
                </div>
            </div>
        </div>
</div>

<section class="shop spad">
    
    <div class="section-title">
        <h1 class="text-center">جميع الفروع </h1>
    </div>
    <div class="container">
        <div class="row">
           
            @foreach($branches as $branch)
            <div class="col-lg-4 col-md-4">
               <a href="{{route('products', $branch->id)}}" >
                 
                <div class="card" style="width: 18rem;">
                    <img class="card-img-top" src="{{asset($branch->photo)}}" alt="{{$branch->name}}" style="max-width: 100%;">
                    <div class="card-body">
                        <h3 class="card-text">{{$branch->name}}</h3>
                    </div>
                </div>
               </a>           
            </div>
            @endforeach 
           
           
        </div>
    </div>

</section>

@include('front.includes.footer')