


<!-- Footer Section Begin -->
<footer class="footer">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-6 col-sm-7">
                <div class="footer__about">
                    <div class="footer__logo">
                        <a href="./index.html"></a>
                    </div>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
                    cilisis.</p>
                    <div class="footer__payment">
                        <a href="#"><img src="{{asset('assets/front/img/payment/payment-1.png')}}" alt=""></a>
                        <a href="#"><img src="{{asset('assets/front/img/payment/payment-2.png')}}" alt=""></a>
                        <a href="#"><img src="{{asset('assets/front/img/payment/payment-3.png')}}" alt=""></a>
                        <a href="#"><img src="{{asset('assets/front/img/payment/payment-4.png')}}" alt=""></a>
                        <a href="#"><img src="{{asset('assets/front/img/payment/payment-5.png')}}" alt=""></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-md-3 col-sm-5">
                <div class="footer__widget">
                    <h6>Quick links</h6>
                    <ul>
                        <li><a href="#">About</a></li>
                        <li><a href="#">Blogs</a></li>
                        <li><a href="#">Contact</a></li>
                        <li><a href="#">FAQ</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-2 col-md-3 col-sm-4">
                <div class="footer__widget">
                    <h6>Account</h6>
                    <ul>
                        <li><a href="#">My Account</a></li>
                        <li><a href="#">Orders Tracking</a></li>
                        <li><a href="#">Checkout</a></li>
                        <li><a href="#">Wishlist</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-4 col-md-8 col-sm-8">
                <div class="footer__newslatter">
                    <h6>NEWSLETTER</h6>
                    <form action="#">
                        <input type="text" placeholder="Email">
                        <button type="submit" class="site-btn">Subscribe</button>
                    </form>
                    <div class="footer__social">
                        <a href="#"><i class="fa fa-facebook"></i></a>
                        <a href="#"><i class="fa fa-twitter"></i></a>
                        <a href="#"><i class="fa fa-youtube-play"></i></a>
                        <a href="#"><i class="fa fa-instagram"></i></a>
                        <a href="#"><i class="fa fa-pinterest"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                <div class="footer__copyright__text">
                    <p>Copyright &copy; <script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart" aria-hidden="true"></i> by <a href="#" target="_blank">Mohamed Mustafa</a></p>
                </div>
                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            </div>
        </div>
    </div>
</footer>
<!-- Footer Section End -->

<!-- Search Begin -->
<div class="search-model">
    <div class="h-100 d-flex align-items-center justify-content-center">
        <div class="search-close-switch">+</div>
        <form class="search-model-form">
            <input type="text" id="search-input" placeholder="Search here.....">
        </form>
    </div>
</div>
<!-- Search End -->


<!-- Js Plugins -->
<script src='https://api.tiles.mapbox.com/mapbox-gl-js/v0.51.0/mapbox-gl.js'></script>
<script src="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v4.7.2/mapbox-gl-geocoder.min.js"></script>

<script src="{{asset('assets/front/js/jquery-3.3.1.min.js')}}"></script>
<script src="{{asset('assets/front/js/bootstrap.min.js')}}"></script>
<script src="{{asset('assets/front/js/jquery.magnific-popup.min.js')}}"></script>
<script src="{{asset('assets/front/js/jquery-ui.min.js')}}"></script>
<script src="{{asset('assets/front/js/mixitup.min.js')}}"></script>
<script src="{{asset('assets/front/js/jquery.countdown.min.js')}}"></script>
<script src="{{asset('assets/front/js/jquery.slicknav.js')}}"></script>
<script src="{{asset('assets/front/js/owl.carousel.min.js')}}"></script>
<script src="{{asset('assets/front/js/jquery.nicescroll.min.js')}}"></script>
<script src="{{asset('assets/front/js/main.js')}}"></script>
{{-- Image Preview --}}
<script src="{{asset('assets/js/image-preview.js')}}"></script>
{{-- End Image Preview --}}
@yield('script')
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
                    <td class="cart__product__item">
                        <img src="${image}" style="width:20%" alt="${name}">
                        <div class="cart__product__item__title">
                            <h6>${name}</h6>
                        </div>

                    
                    </td>

                    <td class="cart__price price-product">${price.toLocaleString()}</td>
                    
                    <td class="cart__total amount">${price.toLocaleString()}</td>
                    
                    <td class='cremental'>
                    
                        <div class=" input-group bootstrap-touchspin">
                        
                        <input type="number"  
                                name='products[${id}][quantity]'
                                data-price="${price}" 
                                class=" pro-quantity text-center count touchspin form-control" 
                                min="1" value="1"  >         
                        </div>
                    </td>


                    <td>
                        <div class="product-action">
                            <a href="#" class=" remove-product" id=${id}><i class="icon_close"></i></a>
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
        var price = 20;

        $('.order-list .amount').each(function(index){

            price += parseFloat($(this).html().replace(/,/g, ''));
        });

        
        $('.total').html(price.toLocaleString() +" " + ' EPG');
       
       

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

                 /***cart shop */   
                $('body .tip').html(currentVal);  
                
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

    /* LocalStorage show in CartShopping */
   /*  $('body').on('click', '.cart', function(e){
          
        var id = $('.add-order').data('id');
       
         window.localStorage.getItem('orders-'+id);

        var html = JSON.parse(localStorage.getItem('orders-'+id));
       $('.order-list').append(html);


    }); */


   
 
 });
</script>
</body>

</html>