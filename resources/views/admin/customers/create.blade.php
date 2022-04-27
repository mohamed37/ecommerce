@extends('layouts.admin')
@section('title', 'اضافة عميل جديد')

@section('style')
{{-- Map Style --}}
<link href='https://api.tiles.mapbox.com/mapbox-gl-js/v0.51.0/mapbox-gl.css' rel='stylesheet' />
<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
{{-- End MAp Style --}}
<style>
    body { margin:0; padding:0; }
    #map {
  height:100rem;
  min-height: 100%;
  min-width: 100%;
  display: block; }
  .fill
{
  min-height: 100%;
  height: 100%;
  width: 100%;
  min-width: 100%;
}
 </style>
<!-- CSS Files -->

@endsection

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
                            <li class="breadcrumb-item"><a href=""> العملاء  </a>
                            </li>
                            <li class="breadcrumb-item active">إضافة عميل 
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
                                <h4 class="card-title" id="basic-layout-form"> إضافة عميل </h4>
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
                                    <form class="form" action="{{route('admin.customers.store')}}"
                                          method="POST"
                                          enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group">
                                            <label> صوره العميل </label>
                                            <label id="projectinput7" class="file center-block">
                                                <input type="file" id="file" name="logo" onchange="readURL(this);" />
                                                <img id="blah" src="{{asset('assets/images/avatar.jpg')}}" alt="صوره العميل">
                                                <span class="file-custom"></span>
                                            </label>
                                            @error('logo')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>

                                        <div class="form-body">

                                            <h4 class="form-section"><i class="ft-home"></i> بيانات العملاء </h4>

                                         
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="projectinput1"> اسم العميل </label>
                                                                <input type="text" value="" id="name"
                                                                       class="form-control"
                                                                       placeholder="  "
                                                                       name="name">
                                                                @error("name")
                                                                <span class="text-danger"> {{$message}}</span>
                                                                @enderror
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="projectinput1"> البريد الالكتروني  </label>
                                                                <input type="text" value="" id="email"
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
                                                            <input type="text" id="mobile"
                                                                   class="form-control"
                                                                   placeholder="رقم الهاتف يجب ان يكون 11 رقم  " name="mobile"  maxlength="11" title="رقم الهاتف يجب ان يكون 11 رقم">

                                                            @error("mobile")
                                                            <span class="text-danger"> {{$message}}</span>
                                                            @enderror
                                                         </div>
                                                        </div>

                                                        <div class="col-md-6 ">
                                                            <div class="form-group">
                                                            <label for="projectinput1"> 2 رقم الهاتف </label>
                                                            <input type="text" id="phone"
                                                                   class="form-control"
                                                                   placeholder="رقم الهاتف يجب ان يكون 11 رقم  " name="phone"  maxlength="11" title="رقم الهاتف يجب ان يكون 11 رقم">

                                                            @error("phone")
                                                            <span class="text-danger"> {{$message}}</span>
                                                            @enderror
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="col-md-6 ">
                                                            <div class="form-group">
                                                                <label for="projectinput1"> العنوان  </label>
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
                                                    
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group mt-1">
                                                                <input type="checkbox" value="1"
                                                                       name="active"
                                                                       id="switcheryColor4"
                                                                       class="switchery" data-color="success"
                                                                       checked/>
                                                                <label for="switcheryColor4"
                                                                       class="card-title ml-1">الحالة </label>

                                                                @error("active")
                                                                <span class="text-danger"> </span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                              
                                        </div>

                                     
    
                                       

                                        <div class="form-actions">
                                            <button type="button" class="btn btn-warning mr-1"
                                                    onclick="history.back();">
                                                <i class="ft-x"></i> تراجع
                                            </button>
                                            <button type="submit" class="btn btn-primary">
                                                <i class="la la-check-square-o"></i> حفظ
                                            </button>
                                        </div>

                                       {{--  <div id="map" style="border:1px solid black; border-radius:4px; height:50vh;width:100%"> --}}                          

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
{{-- 
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

    
    </script> --}}
   
@endsection