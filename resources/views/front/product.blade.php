@include('front.includes.header')
<div class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__links">
                        <a href="route('main')"><i class="fa fa-home"></i> الرئيسية</a>
                        <a href="route('shop')"><i class="fa fa-user"></i>{{$product->branch->name}}</a>
                        <span>{{$product->name}}</span>
                    </div>
                </div>
            </div>
        </div>
</div>



<section class="product-details spad">
        <div class="container">
            <div class="row">
                <!-- Photos  -->
                <div class="col-lg-6">
                    <div class="product__details__pic">
                        <div class="product__details__pic__left product__thumb nice-scroll" tabindex="1" style="overflow-y: hidden; outline: none;">

                            <a class="pt active" href="#{{$product->id}}">
                                <img src="{{$product->photo}}" alt="{{$product->name}}">
                            </a>
                            <a class="pt" href="#product-2">
                                <img src="{{$product->photo}}" alt="{{$product->name}}">
                            </a>
                            <a class="pt" href="#product-3">
                                <img src="{{$product->photo}}" alt="{{$product->name}}">
                            </a>
                            <a class="pt" href="#product-4">
                                <img src="{{$product->photo}}" alt="{{$product->name}}">
                            </a>
                        </div>

                        <div class="product__details__slider__content">
                         <div class="product__details__pic__slider owl-carousel owl-loaded"> 

                           <div class="owl-stage-outer">
                            
                            <div class="owl-stage" style="transform: translate3d(0px, 0px, 0px); transition: all 0s ease 0s; width: 1652px;">
                             
                              <div class="owl-item active" >
                               <img data-hash="{{$product->id}}" class="product__big__img" src="{{$product->photo}}" style="max-width:none;"  alt="{{$product->name}}">
                              </div>

                              <div class="owl-item" >
                               <img data-hash="{{$product->id}}" class="product__big__img" src="{{$product->photo}}" style="max-width:none;"  alt="{{$product->name}}">
                              </div>

                              <div class="owl-item" >
                               <img data-hash="{{$product->id}}" class="product__big__img" src="{{$product->photo}}" style="max-width:none;"  alt="{{$product->name}}">
                              </div>

                              <div class="owl-item" >
                               <img data-hash="{{$product->id}}" class="product__big__img" src="{{$product->photo}}" style="max-width:none;"  alt="{{$product->name}}">
                              </div>

                            </div>

                           </div>

                            <div class="owl-nav">
                             <button type="button" role="presentation" class="owl-prev disabled"><i class="arrow_carrot-left"></i></button>
                             <button type="button" role="presentation" class="owl-next"><i class="arrow_carrot-right"></i></button>
                            </div>

                            <div class="owl-dots disabled"></div>

                         </div>
                        </div>
                    </div>    
                </div>
                <!-- End Photos -->

                <div class="col-lg-6">
                    <div class="product__details__text">
                        <h3>{{$product->name}} <span>{{$product->name}}</span></h3>
                        <div class="rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <span>( 138 reviews )</span>
                        </div>
                        <div class="product__details__price">EPG {{$product->price}}</div>
                        <p>{!! $product->description !!}.</p>

                        <div class="product__details__button">
                            <div class="quantity">
                                <span>Quantity:</span>
                                <div class="pro-qty"><span class="dec qtybtn">-</span>
                                    <input type="text" value="1">
                                <span class="inc qtybtn">+</span></div>
                            </div>
                            <a href="#" class="cart-btn"><span class="icon_bag_alt"></span> Add to cart</a>
                            <ul>
                                <li><a href="#"><span class="icon_heart_alt"></span></a></li>
                                <li><a href="#"><span class="icon_adjust-horiz"></span></a></li>
                            </ul>
                        </div>

                        <div class="product__details__widget">
                            <ul>
                                <li>
                                    <span>Availability:</span>
                                    <div class="stock__checkbox">
                                        <label for="stockin">
                                            In Stock
                                            <input type="checkbox" id="stockin">
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                </li>
                                <li>
                                    <span>Available color:</span>
                                    <div class="color__checkbox">
                                        <label for="red">
                                            <input type="radio" name="color__radio" id="red" checked="">
                                            <span class="checkmark"></span>
                                        </label>
                                        <label for="black">
                                            <input type="radio" name="color__radio" id="black">
                                            <span class="checkmark black-bg"></span>
                                        </label>
                                        <label for="grey">
                                            <input type="radio" name="color__radio" id="grey">
                                            <span class="checkmark grey-bg"></span>
                                        </label>
                                    </div>
                                </li>
                                <li>
                                    <span>Available size:</span>
                                    <div class="size__btn">
                                        <label for="xs-btn" class="active">
                                            <input type="radio" id="xs-btn">
                                            xs
                                        </label>
                                        <label for="s-btn">
                                            <input type="radio" id="s-btn">
                                            s
                                        </label>
                                        <label for="m-btn">
                                            <input type="radio" id="m-btn">
                                            m
                                        </label>
                                        <label for="l-btn">
                                            <input type="radio" id="l-btn">
                                            l
                                        </label>
                                    </div>
                                </li>
                                <li>
                                    <span>Promotions:</span>
                                    <p>Free shipping</p>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-lg-12">
                    <div class="product__details__tab">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#tabs-1" role="tab">Description</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#tabs-2" role="tab">Specification</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#tabs-3" role="tab">Reviews ( 2 )</a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="tabs-1" role="tabpanel">
                                <h6>Description</h6>
                                <p>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut loret fugit, sed
                                    quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt loret.
                                    Neque porro lorem quisquam est, qui dolorem ipsum quia dolor si. Nemo enim ipsam
                                    voluptatem quia voluptas sit aspernatur aut odit aut loret fugit, sed quia ipsu
                                    consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Nulla
                                consequat massa quis enim.</p>
                                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget
                                    dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes,
                                    nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium
                                quis, sem.</p>
                            </div>
                            <div class="tab-pane" id="tabs-2" role="tabpanel">
                                <h6>Specification</h6>
                                <p>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut loret fugit, sed
                                    quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt loret.
                                    Neque porro lorem quisquam est, qui dolorem ipsum quia dolor si. Nemo enim ipsam
                                    voluptatem quia voluptas sit aspernatur aut odit aut loret fugit, sed quia ipsu
                                    consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Nulla
                                consequat massa quis enim.</p>
                                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget
                                    dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes,
                                    nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium
                                quis, sem.</p>
                            </div>
                            <div class="tab-pane" id="tabs-3" role="tabpanel">
                                <h6>Reviews ( 2 )</h6>
                                <p>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut loret fugit, sed
                                    quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt loret.
                                    Neque porro lorem quisquam est, qui dolorem ipsum quia dolor si. Nemo enim ipsam
                                    voluptatem quia voluptas sit aspernatur aut odit aut loret fugit, sed quia ipsu
                                    consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Nulla
                                consequat massa quis enim.</p>
                                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget
                                    dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes,
                                    nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium
                                quis, sem.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="related__title">
                        <h5>منتجات اخري</h5>
                    </div>
                </div>
                @foreach($products as $b)
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="product__item">
                        <div class="product__item__pic set-bg" data-setbg="{{$b->photo}}" style="background-image: url(&quot;{{$b->photo}}&quot;);">
                            <div class="label new">New</div>
                            <ul class="product__hover">
                                <li><a href="{{$b->photo}}" class="image-popup"><span class="arrow_expand"></span></a></li>
                                <li><a href="#"><span class="icon_heart_alt"></span></a></li>
                                <li><a href="#"
                                        id="product-{{$b->id}}" 
                                        data-id="{{$b->id}}"
                                        data-name='{{$b->name}}'
                                        data-price="{{$b->price}}"
                                        data-image='{{$b->photo}}'
                                        class="btn btn-outline-light add-order">
                                        <span class="icon_bag_alt"></span>
                                    </a>
                                    </li>
                                
                            </ul>
                        </div>
                        <div class="product__item__text">
                            <h6><a href="#">Buttons tweed blazer</a></h6>
                            <div class="rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                            <div class="product__price">$ 59.0</div>
                        </div>
                    </div>
                </div>
               @endforeach
            </div>

        </div>
    </section>
@include('front.includes.footer')