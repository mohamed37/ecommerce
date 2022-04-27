@extends('layouts.admin')
@section('title', 'الطلبات')
@section('style')
   <style>
       #progress-status{
           width:50%;
           background-color:#ddd;
       }
       #myprogressBar{
           width:1%;
           height:35px;
           background-color:#4CAF50;
           text-align:center;
           line-height:32px;
           color:black;
       }
   </style>
@endsection
@section('content')
<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-2">
                <h3 class="content-header-title"> الطلبات </h3>
                <div class="row breadcrumbs-top">
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">الرئيسية</a>
                            </li>
                            <li class="breadcrumb-item active"> الطلبات
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-body">
            <!-- DOM - jQuery events table -->
            <section id="dom">
            @include('admin.includes.alerts.success')
            @include('admin.includes.alerts.errors')

                <div class="card-content collapse show">
                                   
                    <div class="card-body card-dashboard ">
                        <div class="row">
                         
                        </div>
                    <form  class="form" 
                            action="{{route('admin.order.store',$customer)}}"
                            method="POST"
                            enctype="multipart/form-data">
                            @csrf       
                                    
                                <div class="row">
                                @isset($branches)
                                    <div class="col-12 col-xl-4">
                                        @foreach($branches as $branch)        
                                            <div id="accordionCrypto" role="tablist" aria-multiselectable="true">
                                                
                                                <div class="card accordion collapse-icon accordion-icon-rotate">
                                                    
                                                    <a id="heading31" data-toggle="collapse" href="#toggel-{{$branch->id}}" aria-expanded="false" aria-controls="accordionBTC" class="card-header bg-danger p-2 bg-lighten-2 collapsed">
                                                        <div class="card-title lead white">{{$branch->name}}</div>
                                                        
                                                    </a>

                                                    <div id="toggel-{{$branch->id}}" role="tabpanel" data-parent="#accordionCrypto" aria-labelledby="heading31" class="collapse" aria-expanded="true" style="">
                                                        <div class="card-content">
                                                            <div class="card-body p-0">

                                                                <div class="media-list list-group">
                                                                @foreach($branch->products as $index => $product) 
                                                                    
                                                                    <div class="list-group-item list-group-item-action media p-1">
                                                                        <a class="media-link" href="#">
                                                                            <div class="media-left">
                                                                            <span class="badge badge badge-danger badge-pill float-left mr-2">{{$index+1}}</span>
                                                                            
                                                                            <img class="media-object img-xl mr-1" src="{{$product->photo}}" alt="{{$product->name}}">
                                                                            </div>

                                                                            <div class="media-body text-right">
                                                                            
                                                                                <p class="text-bold-600 m-0">{{$product->name}}</p>
                                                                                <p class="font-small-2 text-muted m-0 success">{{number_format($product->price, 2)}} EGP</p>
                                                                                <p class="font-small-2 text-muted m-0 text-bold-600">{!!$product->description!!}</p>
                                                                                <p class="text-bold-600 m-0">
                                                                                <a href="#"
                                                                                    id="product-{{$product->id}}" 
                                                                                    data-id="{{$product->id}}"
                                                                                    data-name='{{$product->name}}'
                                                                                    data-price="{{$product->price}}"
                                                                                    data-image='{{$product->photo}}'
                                                                                    class="btn btn-outline-light add-order">
                                                                                    <i class='la la-shopping-cart info font-large float-right'></i>
                                                                                </a>
                                                                                </p>
                                                                            </div>
                                                                        </a>
                                                                    </div>
                                                                @endforeach
                                                                
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>

                                            </div>
                                        @endforeach    
                                    </div>
                                @endisset
   

                                    <div class="col-12 col-xl-8">
                                        <div class="card">
                                            <div class="card-header">
                                                
                                                <h4 class="card-title">  
                                                    <span>جميع الطلبات </span>
                                                    <span class="badge badge badge-info badge-pill float-left mr-2 cart"></span>
                                                </h4>
                                                
                                                <a class="heading-elements-toggle"><i
                                                        class="la la-ellipsis-v font-medium-3"></i>
                                                </a>
                                                
                                                <div class="heading-elements">
                                                    <ul class="list-inline mb-0">
                                                        <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                                        <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                                        <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                                        <li><a data-action="close"><i class="ft-x"></i></a></li>
                                                    </ul>
                                                </div>

                                            </div>

                                            <div class="card-content">                
                                                <div class="table-responsive">

                                                    <table id="recent-orders" class="table table-hover table-xl mb-0">
                                                        <thead>
                                                            <tr>
                                                                <th class="border-top-0">الصورة</th>                                
                                                            
                                                                <th class="border-top-0">اسم المنتج </th>
                                                                <th class="border-top-0">الكمية</th>
                                                                <th class="border-top-0">السعر</th>
                                                                <th class="border-top-0">المبلغ</th>
                                                                <th class="border-top-0">الاجراءات</th>

                                                            </tr>
                                                        </thead>
                                                        
                                                        <tbody class="order-list">
                                                        
                                                            
                                                        
                                                        </tbody>
                                                    </table>

                                                </div>
                                            </div>
                                                
                                        </div>

                                
                                    </div>

                                </div>
                              
                                 <!-- Details -->
                                 <div class="row">
                                   @if(Session::has('products'))
                                   <div class="row mr-2 ml-2">
                                            <button type="text" class="btn btn-lg btn-block btn-outline-success mb-2"
                                                    id="type-error">
                                                    {{Session::get('address')}}
                                                    {{Session::get('total_price')}}
                                                    
                                                  
                                            </button>
                                    </div>
                                    @endif

                                </div>
                                <!-- End Details -->   
                                
                                <!-- Start Place Map -->   
                                <div class="row " id="place">

                                    <div class="col-lg-6 col-md-12">
                                        <div class="card" style="">
                                            <div class="card-header">
                                                <h4 class="card-title">تفاصيل الفاتورة</h4>
                                            </div>
                                            <div class="card-content">
                                                <div class="card-body">
                                                        <div class="price-detail">عدد  <span class="numbers float-right"> قطع</span></div>
                                                        <br>
                                                        <div class="price-detail">الدليفري <span class="man-delivery float-right"> EPG</span></div>
                                                        <br>
                                                        <div class="price-detail">الضريبة <span class="tax float-right">0.00</span></div>
                                                        <hr>
                                                        <div class="price-detail">الاجمالي <span class="total float-right"> 0.0EPG</span></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                      <div class="col-lg-6 col-md-12">
                                        <div class="card" style="">
                                            <div class="card-header">
                                                <h4 class="card-title">كوبون خصم</h4>
                                            </div>
                                            <div class="card-content">
                                                <div class="card-body">
                                                    <label class="text-muted">ادخل كود الكوبون</label>

                                                    <div id="progress-status">
                                                     <div id="myprogressBar"></div>
                                                    </div>
                                                    <input type="text" id='timer' placeholder="ادخل وقت تجهيز الطلب">
                                                    <button type="button" id="confirm" class="btn btn-info">قبول الكود</button>

                                                    <!-- <form action="#">
                                                        <div class="form-body">
                                                            <input type="text" class="form-control" placeholder="ادخل كود الكوبون هنا">
                                                        </div>
                                                        <div class="form-actions border-0 pb-0 text-right">
                                                            <button type="button" class="btn btn-info">قبول الكود</button>
                                                        </div>
                                                    </form> -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div> 

                                <!-- End Of Place Map -->
                                    <!-- Button confirm -->
                                <div class="row">
                                    <div class="col-12">
                                        <div class="card">
                                            <div class="card-content">

                                                <div class="card-body">


                                                    <div class="card" style="height: 542.734px;">
                                                    
                                                        <div class="card-header">

                                                            <h4 class="card-title">حدد منطقتك</h4>

                                                            <a class="heading-elements-toggle">
                                                            <i class="fa fa-ellipsis-v font-medium-3"></i></a>

                                                            <div class="heading-elements">
                                                                <ul class="list-inline mb-0">
                                                                    <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                                                </ul>
                                                            </div>
                                                            
                                                                
                                                                <div class="row">
                                                                  <div class="col-md-12 ">
                                                                    <div class="form-group">
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

                                                        </div>


                                                        <div class="card-content">
                                                            <div class="card-body">
                                                                <div class="card-text">
                                                                    <section class="cd-horizontal-timeline loaded">
                                                                    
                                                                        <div id="map" style="height: 400px;width: 100%;"></div>
                                                                    
                                                                    </section>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                    
                                                </div>


                                                    <div class="text-right">
                                                        <input type="hidden"  value="" id="latitude" name="latitude">
                                                        <input type="hidden" value="" id="longitude"  name="longitude">
                                                        

                                                        <button type="submit" class="confirm btn btn-info mr-2 disabled">تاكيد </button>
                                                        <!-- <a href="#place" class="btn btn-warning">حدد  مكانك</a> -->
                                                    </div>
                                                
                                                
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Button confirm -->
                           
                    </form>    

                                                                  
                    </div>
                </div>
                
            </section>
        </div>
    </div>
</div>
@endsection


@section('script')

 <script>

    $(document).ready(function(){
        /* ************************add PRoduct ***************************************/

        $(".add-order").on('click', function(e){
            e.preventDefault();
        
            var id = $(this).data('id'),
                name = $(this).data('name'),
                price =  parseFloat($(this).data('price')),
                image = $(this).data('image');
            
                $(this).removeClass('btn-outline-light').addClass('btn-outline-primary disabled');

           var html = `
           <tr >
                    <td>
                        <div class="product-img d-flex align-items-center">
                            <img class="img-fluid" 
                                 src="${image}" alt="${name}">
                        </div>
                    </td>
                    
                    <td>${name}</td>
                    <td class='cremental'>
                    
                        <div class=" input-group bootstrap-touchspin">
                            <input type="number"  
                                   name='products[${id}][quantity]'
                                   data-price="${price}" 
                                   class=" pro-quantity text-center count touchspin form-control" 
                                   min="1" value="1"  >         
                        </div>
                    </td>

                    <td class="price-product">${price.toLocaleString()}</td>
                    <td class="amount">${price.toLocaleString()}</td>

                    <td>
                        <div class="product-action">
                            <a href="#" class="remove-product" id=${id}><i class="ft-trash-2"></i></a>
                        </div>
                    </td>

                    </tr >
           `;
           $(".order-list").append(html);
             
           calculateTotal();
           getItems();

        });
        /* ************************add PRoduct ***************************************/

        $('body').on('click', '.disabled', function(e){
            e.preventDefault();
        });

        /* ************************DELETE PRoduct ***************************************/
        $('body').on('click', '.remove-product', function(e){
            e.preventDefault();

            var id = $(this).attr('id');
            $(this).closest('tr').remove();
            $('#product-' + id).removeClass('btn-outline-primary disabled').addClass('btn-outline-light');
            calculateTotal();
            getItems();
        });
        /* ************************DELETE PRoduct ***************************************/



       /* ************************Amount ***************************************/
       $('body').on('keyUp change', '.pro-quantity', function(e){
            e.preventDefault();

            var quantity = $(this).val(),
                
                unitPrice = $(this).data('price');
                
                
            var amount = parseFloat(quantity * unitPrice);

            $(this).closest('tr').find('.amount').html(amount.toLocaleString());

            
           
            calculateTotal();
            getItems();

        });
       
       /* ************************Amount ***************************************/

        function calculateTotal()
        {
            var price = 0;

            $('.order-list .amount').each(function(index){

                price += parseFloat($(this).html().replace(/,/g, ''));
            });

            
            $('.total').html(price.toLocaleString() + ' EPG');
           
           

            $('.man-delivery').html('20 EGP');

            if(price > 0)
            {
                $('.confirm').removeClass('disabled');
            }else{
                $('.confirm').addClass('disabled');
            }
        }

        function getItems()
        {
            var currentVal = 0;
                    $('.pro-quantity').each(function(index){
                        currentVal += parseInt($(this).val());
                        });
                    $('.numbers').html(currentVal);
                    $('.cart').html(currentVal);

                    
        }
    $('body').on('click', '#confirm',function(e){
            e.preventDefault();
            
            var element =document.getElementById("myprogressBar")
            , width = 1
            , timer = $('#timer').val()
            , identity = setInterval(scene, timer);
            function scene(){
                if(width >= 200)
                {
                    clearInterval(identity);
                }else{
                    width++;
                    element.style.width= width+ '%';
                }
            }
    }); 
    
    });
 </script>


@stop