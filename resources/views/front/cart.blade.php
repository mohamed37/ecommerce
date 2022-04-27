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
                        <span>كارت الشراء</span>
                    </div>
                </div>
            </div>
        </div>
</div>

 <section class="shop-cart spad">
    <div class="container">
        <form  class="form" action="{{route('order.cart.store',Auth::guard('customer')->user()->id )}}" method="post" enctype="multipart/form-data">
            @csrf   

            <div class="row">
                <div class="col-lg-12">
                    <div class="shop__cart__table">
                        <table>
                            <thead>
                                <tr>
                                    <th>المنتج</th>
                                    <th>السعر</th>
                                    <th>الكمية</th>
                                    <th>الملبغ</th>
                                    <th></th>
                                </tr>
                            </thead>
                           
                            <tbody class="order-list"> 
                                @if(Session::has('cart'))
                                    @foreach ($cart['products'] as $c)
                                        <tr>
                                            <td> {{$product[$loop->index]->name}}
                                                <img src="{{asset($product[$loop->index]->photo)}}" style='width:100px; height:80px;'>
                                                        
                                            </td>
                                            <td>  {{$product[$loop->index]->price}}</td>
                                        
                                            <td>
                                                <input type="number"  
                                                        name='products[]'
                                                        data-price="{{$product[$loop->index]->price}}" 
                                                        class=" pro-quantity text-center count  form-control" 
                                                        min="1" value="{{$c}}" 
                                                        style="width: auto;" >  
                                            </td>
                                            <td class="cart__total amount">
                                               {{$product[$loop->index]->price}}
                                            </td>
                                        </tr>
                                    @endforeach

                                @else
                                 <h1>لا يوجد مشتريات</h1>
                                @endif 
                            </tbody>

                        </table>
                    </div>
                </div>

                
                
            </div>

          

           
            <div class="row">

                <div class="col-lg-12">
                    <div class="cart__total__procced">
                        <h4 >حدد مكانك</h4>
                        <div id="map" style="border:1px solid black; border-radius:4px; height:50vh;width:100%">   
                         <input type="hidden" name="latitude"  id="latitude">
                         <input type="hidden" name="longitude"  id="longitude">                        

                    </div>
                    <br>
                    <div class="discount__content">
                        <button type="submit"  id="show" class="site-btn ">تأكيد الشراء </button>
                      
                    </div>
                </div>
                <br>
                <!-- Details Cart -->
                <div class="col-lg-4">
                    <div class="cart__total__procced">
                        <h4 >تفاصيل الفاتورة</h4>
                     <ul >
                        <li class="price-detail">عدد  <span class="numbers float-right"> قطع</span></li>
                        <br>
                        <li class="price-detail">الدليفري <span class="man-delivery float-right"> EPG</span></li>
                        <br>
                        <li class="price-detail">الضريبة <span class="tax float-right">0.00</span></li>
                        <hr>
                        <li class="price-detail">الاجمالي <span class="total float-right">0.0EPG</span></li>
                     </ul>

                    </div>

                </div>
            </div>
            <!-- End Details Cart -->
        </form>
            
        </div>
 </section>

 @section('script')
 <script>

    var lastUpdate = Date.now();
    var dt = 0;


    mapboxgl.accessToken = 'pk.eyJ1IjoibW9oYW1lZGVsbWVsZWVoIiwiYSI6ImNreXd2dDh6dTBjbGEybm14NTlhajl5YW4ifQ.x1h23fSGMyTjxvKpuC791w';
    mapboxgl.setRTLTextPlugin(
        'https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-rtl-text/v0.2.3/mapbox-gl-rtl-text.js',
        null,
        true // Lazy load the plugin
    );
    var map = new mapboxgl.Map({
        container: 'map',
        style: {
            version: 8,
            sources: {
                osm: {
                    type: 'raster',
                    tiles: ["https://tile.openstreetmap.org/{z}/{x}/{y}.png"],
                    tileSize: 256,
                    attribution: 'Map tiles by <a target="_top" rel="noopener" href="https://tile.openstreetmap.org/">OpenStreetMap tile servers</a>, under the <a target="_top" rel="noopener" href="https://operations.osmfoundation.org/policies/tiles/">tile usage policy</a>. Data by <a target="_top" rel="noopener" href="http://openstreetmap.org">OpenStreetMap</a>'
                }
            },
            layers: [{
                id: 'osm',
                type: 'raster',
                source: 'osm',
            }],
        },
        center: [31.233334, 30.033333],
        zoom:6,
        ////maxBounds: bounds,
        //pitch:20,
        attributionControl: true,
        logoView: false,
        hash: true
    });



    //fly


    function Flying(lng, lat, zoom) {

        map.flyTo({
            center: [lng, lat],
            zoom: zoom,
            essential: true // this animation is considered essential with respect to prefers-reduced-motion
        });
    }

    // Add the control to the map.
    map.addControl(
        new MapboxGeocoder({
            accessToken: mapboxgl.accessToken,
            mapboxgl: mapboxgl
        })
    );

    var hoveredStateId = null;
    //var rotate =true;
    //function rotateCamera(timestamp,angle) {
    //	if (rotate) {
    //// clamp the rotation between 0 -360 degrees
    //// Divide timestamp by 100 to slow rotation to ~10 degrees / sec
    //map.rotateTo((timestamp / 100) % 360, { duration: 0 });
    //// Request the next frame of the animation.
    //requestAnimationFrame(rotateCamera);
    //}
    //}

    map.on('load', function () {
        //rotateCamera(1);


        map.on('click', function (e) {
            //document.getElementById('info').innerHTML =
            //    // e.point is the x, y coordinates of the mousemove event relative
            //    // to the top-left corner of the map

            //    // e.lngLat is the longitude, latitude geographical position of the event
            //    JSON.stringify(e.lngLat.wrap());

    
            var data = e.lngLat.wrap();

            $("#latitude").val(data.lng);
            $("#longitude").val(data.lat);
        });


        map.setLayoutProperty('country-label', 'text-field', [
            'get',
            `name_${arabic}`
        ]);

    });


</script>
 @endsection
@include('front.includes.footer')    