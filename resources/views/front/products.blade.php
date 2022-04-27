@include('front.includes.header')

@if(Session::has('cart'))
    @foreach ($cart['ids'] as $id)
                                        
    @php
     $product[$loop->index] = \App\Models\Products::findOrFail($id);
    @endphp
    
    @endforeach
@endif

<div class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__links">
                        <a href="route('main')"><i class="fa fa-home"></i> الرئيسية</a>
                        <span>{{$branch->name}}</span>
                    </div>
                </div>
            </div>
        </div>
</div>

<section class="shop spad">
    
    <div class="section-title">
        <h1 class="text-center">جميع المنتجات </h1>
    </div>
    <div class="container-fluid ">
        <div class="row">

            {{-- Cart Shop --}}
        <div class="col-lg-3 col-md-3"> 
            <div class="sidebar__filter">
                <div class="section-title">
                    <h4>سلة المشتريات</h4>
                </div>
               
                <div class="shop__cart__table">
                    <form  class="form" action="{{route('order.cart.store', Auth::guard('customer')->user()->id)}}" method="post" enctype="multipart/form-data">
                        @csrf      
                        <table>
                            <thead>
                                <tr>
                                    
                                    <th>المنتج</th>
                                    <th>السعر</th>
                                    <th>الملبغ</th>
                                    <th>الكمية</th>

                                    <th></th>
                                </tr>
                            </thead>
                        
                            <tbody class="order-list"> 
                              
                            </tbody>
                            <label>حدد منطقتك</label>
                            <input type="text" name="address" class="form-control">
                            @error('address')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </table>
                        <button type="submit" class="confirm btn btn-info mr-2 disabled">تاكيد </button>
                       
                    </form> 
                    
                </div>
                    
            </div>
        </div>

        {{-- products --}}
        <div class="col-lg-6 col-md-6">
            <div class="row">
                @foreach($products as $product)
                <div class="col-lg-4 col-md-6">
                    <div class="product__item">
                        <div class="product__item__pic set-bg" data-setbg="{{$product->photo}}" style="background-image: url(&quot;{{$product->photo}}&quot;);">
                            <div class="label new">New</div>
                            <ul class="product__hover">
                                <li><a href="{{$product->photo}}" class="image-popup"><span class="arrow_expand"></span></a></li>
                                <li>
                                    <a href="#"
                                    id="product-{{$product->id}}" 
                                    data-id="{{$product->id}}"
                                    data-name='{{$product->name}}'
                                    data-price="{{$product->price}}"
                                    data-image='{{$product->photo}}'
                                    class="btn btn-outline-light add-order">
                                    <span class="icon_bag_alt"></span>
                                    </a>

                                   
                                </li>
                            </ul>
                        </div>
                        <div class="product__item__text">
                            <h6><a href="#">{!! $product->description !!}</a></h6>
    
                            <div class="rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                            
                            <div class="product__price">EPG {{$product->price}}</div>
                        </div>
                    </div>
                </div>
                @endforeach 
            </div>
        </div>    
            
         <!-- Details Cart -->
        <div class="col-lg-3">
            <div class="cart__total__procced">
                <h4 >تفاصيل الفاتورة</h4>
             <ul >
                <li class="price-detail">عدد  <span class="numbers float-right"> قطع</span></li>
                <br>
                <li class="price-detail">الدليفري <span class="man-delivery float-right"> 20 EPG</span></li>
                <br>
                <li class="price-detail">الضريبة <span class="tax float-right">0.00</span></li>
                <hr>
                <li class="price-detail">الاجمالي <span class="total float-right">0.0EPG</span></li>
             </ul>

            </div>

        </div>
        
 
      
    </div>

</section>

@include('front.includes.footer')
  