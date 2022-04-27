<!-- Product Section Begin -->
<section class="product spad">
    <div class="container">
        <div class="row">

            <div class="col-lg-12 col-md-12">
                <div class="text-center section-title">
                    <h4 > الاقسام الرئيسية</h4>
                </div>
            </div>
           
        </div>
        
        <div class="row property__gallery">
            @foreach(App\Models\SubCategory::selection()->active()->get() as $category)

            <div class="col-lg-4 col-md-4 col-sm-6 mix women">

                <div class="product__item">
                    <div class="product__item__pic set-bg" data-setbg="{{asset($category->photo)}}">
                    </div>
                    <div class="product__item__text">
                        <h2><a href="{{route('category', $category->id)}}">{{$category->name}}</a></h2>
                       
                       
                    </div>
                </div>

            </div>
            @endforeach
            
        </div>
    </div>
</section>
<!-- Product Section End -->