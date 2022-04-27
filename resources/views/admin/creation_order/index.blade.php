@extends('layouts.admin')
@section('title', 'الطلبات')
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
                                                                            <p class="font-small-2 text-muted m-0 success">{{$product->price}} EGP</p>
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
                            <div class="row">
                                 <div class="col-lg-6 col-md-12">
                                    <div class="card" style="">
                                        <div class="card-header">
                                            <h4 class="card-title">تفاصيل الفاتورة</h4>
                                        </div>
                                        <div class="card-content">
                                         <div class="card-body">
                                                <div class="price-detail">عدد  <span class="numbers float-right"> items</span></div>
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
                                                <form action="#">
                                                    <div class="form-body">
                                                        <input type="text" class="form-control" placeholder="ادخل كود الكوبون هنا">
                                                    </div>
                                                    <div class="form-actions border-0 pb-0 text-right">
                                                        <button type="button" class="btn btn-info">قبول الكود</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                                  
                            <form action="#">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="card">
                                            <div class="card-content">
                                                <div class="card-body">
                                                    <div class="text-right">
                                                        <input type="hidden"  value="" id="latitude" name="latitude">
                                                        <input type="hidden" value="" id="longitude"  name="longitude">
                                                        <input type="text" value="1"id="customer" name="customer_id">
                                                        <input type="text" value="" id="amount" name="amount">
                                                        <input type="text" value=""id="orderID" name="order_id">
                                                        <input type="text" value=""id="proID" name="product_id">
                                                        <input type="text" value=""id="total" name="total">


                                                    
                                                        <button type="button" class="confirm btn btn-info mr-2 disabled">تاكيد </button>
                                                        <a href="#place" class="btn btn-warning">حدد  مكانك</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                           
                                   
                               <div class="row match-height" id="place">
                                <div class="col-xl-12 col-lg-12">
                                    <div class="card" style="height: 542.734px;">
                                        <div class="card-header">
                                            <h4 class="card-title">حدد منطقتك</h4>
                                            <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                                            <div class="heading-elements">
                                                <ul class="list-inline mb-0">
                                                    <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                                </ul>
                                            </div>
                                            
                                            <div class="row">
                                                        <div class="col-md-6 ">
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
                               </div> 

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
                                   name='quantities[]'
                                   data-price="${price}" 
                                   class=" pro-quantity text-center count touchspin form-control" 
                                   min="1" value="1"  >
                          
                            
                        </div>
                    </td>

                    <td class="price-product">${price}</td>
                    <td class="amount">${price}</td>

                    <td>
                        <div class="product-action">
                            <a href="#" class="remove-product" id=${id}><i class="ft-trash-2"></i></a>
                        </div>
                    </td>

                    </tr >
           `;
           $(".order-list").append(html);
             //in database
             $('#proID').val(id);
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

            $(this).closest('tr').find('.amount').html(amount);

            //in database
            $('#amount').val(amount);
           
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

            
            $('.total').html(price + ' EPG');
            //in database
            $('#total').val(price);

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
                    $('input[name="quantities[]"').each(function(index){
                        currentVal += parseInt($(this).val());
                        });
                    $('.numbers').html(currentVal);

                    
        }
    });
 </script>

<script>



    $("#pac-input").focusin(function() {
        $(this).val('');
    });

    $('#latitude').val('');
    $('#longitude').val('');


    // This example adds a search box to a map, using the Google Place Autocomplete
    // feature. People can enter geographical searches. The search box will return a
    // pick list containing a mix of places and predicted search terms.

    // This example requires the Places library. Include the libraries=places
    // parameter when you first load the API. For example:
    // <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">

    function initAutocomplete() {
        var map = new google.maps.Map(document.getElementById('map'), {
            center: {lat: 24.740691, lng: 46.6528521 },
            zoom: 13,
            mapTypeId: 'roadmap'
        });

        // move pin and current location
        infoWindow = new google.maps.InfoWindow;
        geocoder = new google.maps.Geocoder();
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(function(position) {
                var pos = {
                    lat: position.coords.latitude,
                    lng: position.coords.longitude
                };
                map.setCenter(pos);
                var marker = new google.maps.Marker({
                    position: new google.maps.LatLng(pos),
                    map: map,
                    title: 'موقعك الحالي'
                });
                markers.push(marker);
                marker.addListener('click', function() {
                    geocodeLatLng(geocoder, map, infoWindow,marker);
                });
                // to get current position address on load
                google.maps.event.trigger(marker, 'click');
            }, function() {
                handleLocationError(true, infoWindow, map.getCenter());
            });
        } else {
            // Browser doesn't support Geolocation
            console.log('dsdsdsdsddsd');
            handleLocationError(false, infoWindow, map.getCenter());
        }

        var geocoder = new google.maps.Geocoder();
        google.maps.event.addListener(map, 'click', function(event) {
            SelectedLatLng = event.latLng;
            geocoder.geocode({
                'latLng': event.latLng
            }, function(results, status) {
                if (status == google.maps.GeocoderStatus.OK) {
                    if (results[0]) {
                        deleteMarkers();
                        addMarkerRunTime(event.latLng);
                        SelectedLocation = results[0].formatted_address;
                        console.log( results[0].formatted_address);
                        splitLatLng(String(event.latLng));
                        $("#pac-input").val(results[0].formatted_address);
                    }
                }
            });
        });
        function geocodeLatLng(geocoder, map, infowindow,markerCurrent) {
            var latlng = {lat: markerCurrent.position.lat(), lng: markerCurrent.position.lng()};
            /* $('#branch-latLng').val("("+markerCurrent.position.lat() +","+markerCurrent.position.lng()+")");*/
            $('#latitude').val(markerCurrent.position.lat());
            $('#longitude').val(markerCurrent.position.lng());

            geocoder.geocode({'location': latlng}, function(results, status) {
                if (status === 'OK') {
                    if (results[0]) {
                        map.setZoom(8);
                        var marker = new google.maps.Marker({
                            position: latlng,
                            map: map
                        });
                        markers.push(marker);
                        infowindow.setContent(results[0].formatted_address);
                        SelectedLocation = results[0].formatted_address;
                        $("#pac-input").val(results[0].formatted_address);

                        infowindow.open(map, marker);
                    } else {
                        window.alert('No results found');
                    }
                } else {
                    window.alert('Geocoder failed due to: ' + status);
                }
            });
            SelectedLatLng =(markerCurrent.position.lat(),markerCurrent.position.lng());
        }
        function addMarkerRunTime(location) {
            var marker = new google.maps.Marker({
                position: location,
                map: map
            });
            markers.push(marker);
        }
        function setMapOnAll(map) {
            for (var i = 0; i < markers.length; i++) {
                markers[i].setMap(map);
            }
        }
        function clearMarkers() {
            setMapOnAll(null);
        }
        function deleteMarkers() {
            clearMarkers();
            markers = [];
        }

        // Create the search box and link it to the UI element.
        var input = document.getElementById('pac-input');
        $("#pac-input").val("أبحث هنا ");
        var searchBox = new google.maps.places.SearchBox(input);
        map.controls[google.maps.ControlPosition.TOP_RIGHT].push(input);

        // Bias the SearchBox results towards current map's viewport.
        map.addListener('bounds_changed', function() {
            searchBox.setBounds(map.getBounds());
        });

        var markers = [];
        // Listen for the event fired when the user selects a prediction and retrieve
        // more details for that place.
        searchBox.addListener('places_changed', function() {
            var places = searchBox.getPlaces();

            if (places.length == 0) {
                return;
            }

            // Clear out the old markers.
            markers.forEach(function(marker) {
                marker.setMap(null);
            });
            markers = [];

            // For each place, get the icon, name and location.
            var bounds = new google.maps.LatLngBounds();
            places.forEach(function(place) {
                if (!place.geometry) {
                    console.log("Returned place contains no geometry");
                    return;
                }
                var icon = {
                    url: place.icon,
                    size: new google.maps.Size(100, 100),
                    origin: new google.maps.Point(0, 0),
                    anchor: new google.maps.Point(17, 34),
                    scaledSize: new google.maps.Size(25, 25)
                };

                // Create a marker for each place.
                markers.push(new google.maps.Marker({
                    map: map,
                    icon: icon,
                    title: place.name,
                    position: place.geometry.location
                }));


                $('#latitude').val(place.geometry.location.lat());
                $('#longitude').val(place.geometry.location.lng());

                if (place.geometry.viewport) {
                    // Only geocodes have viewport.
                    bounds.union(place.geometry.viewport);
                } else {
                    bounds.extend(place.geometry.location);
                }
            });
            map.fitBounds(bounds);
        });
    }
    function handleLocationError(browserHasGeolocation, infoWindow, pos) {
        infoWindow.setPosition(pos);
        infoWindow.setContent(browserHasGeolocation ?
            'Error: The Geolocation service failed.' :
            'Error: Your browser doesn\'t support geolocation.');
        infoWindow.open(map);
    }
    function splitLatLng(latLng){
        var newString = latLng.substring(0, latLng.length-1);
        var newString2 = newString.substring(1);
        var trainindIdArray = newString2.split(',');
        var lat = trainindIdArray[0];
        var Lng  = trainindIdArray[1];

        $("#latitude").val(lat);
        $("#longitude").val(Lng);
    }





</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDKZAuxH9xTzD2DLY2nKSPKrgRi2_y0ejs&libraries=places&callback=initAutocomplete&language=ar&region=EG
 async defer"></script>
@stop