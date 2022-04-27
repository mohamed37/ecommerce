@extends('layouts.admin')
@section('title', 'تعديل دليفري جديد')
@section('content')

<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="">الرئيسية </a>
                            </li>
                            <li class="breadcrumb-item"><a href=""> دليفري  </a>
                            </li>
                            <li class="breadcrumb-item active">تعديل دليفري 
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-body">
            <!-- Basic form layout section start -->
            <section id="basic-form-layouts">
                <div class="row match-height">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title" id="basic-layout-form"> تعديل دليفري </h4>
                                <a class="heading-elements-toggle"><i
                                        class="la la-ellipsis-v font-medium-3"></i></a>
                                <div class="heading-elements">
                                    <ul class="list-inline mb-0">
                                        <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                        <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                        <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                        <li><a data-action="close"><i class="ft-x"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            @include('admin.includes.alerts.success')
                            @include('admin.includes.alerts.errors')
                            
                            <div class="card-content collapse show">
                                <div class="card-body">
                                    <form class="form" action="{{route('admin.delivery.update',$delivery->id)}}"
                                          method="POST"
                                          enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden"  value="{{$delivery->latitude}}" id="latitude" name="latitude">
                                        <input type="hidden" value="{{$delivery->longitude}}" id="longitude"  name="longitude">
                                        <input type="hidden" name="id" value="{{$delivery->id}}">
                                        <div class="form-group">
                                          <div class="text-center">
                                             <img src="{{$delivery->photo}}"
                                                  class="rounded-circle height-150" alt="صورة دليفري" >
                                          </div>
                                        </div> 


                                        <div class="form-group">
                                            <label> صوره دليفري </label>
                                            <label id="projectinput7" class="file center-block">
                                                <input type="file" id="file" name="photo" value="{{$delivery->photo}}">
                                                <span class="file-custom"></span>
                                            </label>
                                         
                                            @error('photo')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>

                                        <div class="form-body">

                                            <h4 class="form-section"><i class="ft-home"></i> بيانات الدليفريا </h4>

                                            
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="projectinput1"> اسم الاول </label>
                                                                <input type="text" 
                                                                       value="{{$delivery->firstname}}" id="firstname"
                                                                       class="form-control"
                                                                       placeholder="  "
                                                                       name="firstname">
                                                                @error("firstname")
                                                                <span class="text-danger"> {{$message}}</span>
                                                                @enderror
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="projectinput1"> اسم الاخير </label>
                                                                <input type="text" 
                                                                       value="{{$delivery->lastname}}" id="lastname"
                                                                       class="form-control"
                                                                       placeholder="  "
                                                                       name="lastname">
                                                                @error("lastname")
                                                                <span class="text-danger"> {{$message}}</span>
                                                                @enderror
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="projectinput1"> اسم  </label>
                                                                <input type="text" 
                                                                       value="{{$delivery->username}}" id="username"
                                                                       class="form-control"
                                                                       placeholder="  "
                                                                       name="username">
                                                                @error("username")
                                                                <span class="text-danger"> {{$message}}</span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="projectinput1"> العمر  </label>
                                                                <input type="number" 
                                                                       value="{{$delivery->age}}" id="age"
                                                                       class="form-control"
                                                                       placeholder="  "
                                                                       name="age">
                                                                @error("age")
                                                                <span class="text-danger"> {{$message}}</span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="projectinput1"> البريد الالكتروني  </label>
                                                                <input type="text" 
                                                                       value="{{$delivery->email}}" id="email"
                                                                       class="form-control"
                                                                       placeholder="  "
                                                                       name="email">
                                                                @error("email")
                                                                <span class="text-danger"> {{$message}}</span>
                                                                @enderror
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6 ">
                                                         <div class="form-group">
                                                            <label for="projectinput1"> كلمة المرور </label>
                                                            <input type="password" id="password"
                                                                   class="form-control"
                                                                   placeholder="كلمة المرور يجب ان يكون  حرف او رقم  " 
                                                                   name="password"   autocomplete="new-password">

                                                            @error("password")
                                                            <span class="text-danger"> {{$message}}</span>
                                                            @enderror
                                                         </div>
                                                        </div>
                                                        
                                                        <div class="col-md-6 ">
                                                         <div class="form-group">
                                                            <label for="projectinput1"> رقم الهاتف </label>
                                                            <input type="text" id="phone"
                                                                   class="form-control"
                                                                   value = "{{$delivery->phone}}"
                                                                   placeholder="رقم الهاتف يجب ان يكون 11 رقم  " name="phone"  maxlength="11" title="رقم الهاتف يجب ان يكون 11 رقم">

                                                            @error("phone")
                                                            <span class="text-danger"> {{$message}}</span>
                                                            @enderror
                                                         </div>
                                                        </div>

                                                        <div class="col-md-6 ">
                                                         <div class="form-group">
                                                            <label for="projectinput1"> رقم البطاقة </label>
                                                            <input type="text" id="card_number"
                                                                   class="form-control"
                                                                   value="{{$delivery->card_number}}"
                                                                   placeholder="رقم البطاقة يجب ان يكون 14 رقم  " name="card_number"  maxlength="14" title="رقم البطاقة يجب ان يكون 14 رقم">

                                                            @error("card_number")
                                                            <span class="text-danger"> {{$message}}</span>
                                                            @enderror
                                                         </div>
                                                        </div>
                                                    </div>
                                              
                                        </div>
                                        <div class="row">
                                         <div class="col-md-12 ">
                                            <div class="form-group">
                                                <label for="projectinput1"> العنوان  </label>
                                                <input type="text" id="pac-input"
                                                        class="form-control"
                                                        placeholder="  "
                                                        value="{{$delivery->address}}"
                                                        name="address">

                                                @error("address")
                                                <span class="text-danger"> {{$message}}</span>
                                                @enderror
                                            </div>
                                         </div>
                                        </div>
                                        
                                        <div id="map" style="height: 500px;width: 1000px;"></div>

                                       

                                        <div class="form-actions">
                                            <button type="button" class="btn btn-warning mr-1"
                                                    onclick="history.back();">
                                                <i class="ft-x"></i> تراجع
                                            </button>
                                            <button type="submit" class="btn btn-primary">
                                                <i class="la la-check-square-o"></i> تحديث
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- // Basic form layout section end -->
        </div>
    </div>
</div>


@endsection


@section('script')

<script>

$("#pac-input").focusin(function() {
    $(this).val('');
});


// This example adds a search box to a map, using the Google Place Autocomplete
// feature. People can enter geographical searches. The search box will return a
// pick list containing a mix of places and predicted search terms.

// This example requires the Places library. Include the libraries=places
// parameter when you first load the API. For example:
// <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">

function initAutocomplete() {

    var pos = {lat:   {{ $delivery->latitude }} ,  lng: {{ $delivery->longitude }} };

    map = new google.maps.Map(document.getElementById('map'), {
        zoom: 15,
        center: pos
    });


    infoWindow = new google.maps.InfoWindow;
    geocoder = new google.maps.Geocoder();

    marker = new google.maps.Marker({
        position: pos,
        map: map,
        title: '{{ $delivery->name }}'

    });


    infoWindow.setContent('{{ $delivery->name }}');
    infoWindow.open(map, marker);



    // move pin and current location
    infoWindow = new google.maps.InfoWindow;
    geocoder = new google.maps.Geocoder();

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
