@include('front.includes.header')
<div class="breadcrumb-option">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb__links">
                    <a href="{{route('main')}}"><i class="fa fa-home"></i> الرئيسية</a>
                    <span>{{$category->name}}</span>
                </div>
            </div>
        </div>
    </div>
</div>
<section class="content">

    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 p-2">
                
                <div class="categories__item categories__large__item set-bg"
                     data-setbg="{{$category->photo}}">
                </div>     

                 @foreach ($category->subcategories as $cat)
                  
                  <div class="product__item">
                    <div class="product__item__pic set-bg" data-setbg="{{$cat->photo}}" style="background-image: url(&quot;img/shop/shop-1.jpg&quot;);">   
                    </div>
                            
                    <h1>{{$cat->name}}</h1>
                    <p>Sitamet, consectetur adipiscing elit, sed do eiusmod tempor incidid-unt labore
                    edolore magna aliquapendisse ultrices gravida.</p>
                    <a href="#">Shop now</a>
                  </div>
                  

                  @endforeach
                

            </div>
        </div>
    </div>

</section>

@include('front.includes.footer')