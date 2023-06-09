@extends('layouts.dashboard')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header"> 
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12 dflx">
                    <h1 class="m-0">Create New Property</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="add_pprty space">
        <div class="container-fluid">
            <form action="{{ route("frontuser.property.store") }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-12">
                        <div class="wht_box">
                            <h4 class="mb-3">Add Basic Property Information</h4>
                            <div class="row">
                                <div class="col-lg-12 col-md-12">
                                    <div class="form-group">
                                        <label for="property-name" class="text-heading">Property Name</label>
                                        <input id="name-input" name="name" class="form-control" required>
                                        @if($errors->has('name'))
                                        <em class="invalid-feedback">
                                            {{ $errors->first('name') }}
                                        </em>
                                        @endif
                                        <p class="helper-block">
                                            {{ trans('cruds.user.fields.email_helper') }}
                                        </p>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12">
                                    <div class="form-group">
                                        <label for="property-loc" class="text-heading">Property Address</label>
                                        <input type="text" id="address-input" name="address" class="form-control map-input" required>
                                        @if($errors->has('address'))
                                        <em class="invalid-feedback">
                                            {{ $errors->first('address') }}
                                        </em>
                                        @endif
                                        <p class="helper-block">
                                            {{ trans('cruds.user.fields.email_helper') }}
                                        </p>
                                    </div>
                                    <div hidden class="form-group {{ $errors->has('lat') ? 'has-error' : '' }}">
                                        <input type="hidden" id="address-latitude" name="lat" class="form-control" value="">
                                    </div>
                                    <div hidden class="form-group {{ $errors->has('lng') ? 'has-error' : '' }}">
                                        <input type="hidden" id="address-longitude" name="lng" class="form-control" value="">
                                    </div>
                                    <div id="address-map-container" style="width:100%;height:400px; ">
                                        <div style="width: 100%; height: 100%" id="address-map"></div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group {{ $errors->has('location') ? 'has-error' : '' }}">
                                        <label for="location">Location*</label>
                                        <input type="text" id="location" name="location" class="form-control map-input" required>
                                        @if($errors->has('location'))
                                        <em class="invalid-feedback">
                                            {{ $errors->first('location') }}
                                        </em>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group mb-0">
                                        <label for="property-descr" class="text-heading">{{ trans('cruds.property.fields.description') }}</label>
                                        <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
                                        @if($errors->has('description'))
                                        <em class="invalid-feedback">
                                            {{ $errors->first('description') }}
                                        </em>
                                        @endif
                                        <p class="helper-block">
                                            {{ trans('cruds.property.fields.description_helper') }}
                                        </p>
                                    </div>
                                </div>

                                <!-- <div class="col-md-12">
                                    <div class="form-group mb-0">
                                        <label for="property-descr" class="text-heading">{{trans('cruds.property.fields.note') }}</label>
                                        <textarea id="notes" name="notes" class="form-control" rows="3" required></textarea>
                                        @if($errors->has('notes'))
                                        <em class="invalid-feedback">
                                            {{ $errors->first('notes') }}
                                        </em>
                                        @endif
                                        <p class="helper-block">
                                            {{ trans('cruds.property.fields.note_helper') }}
                                        </p>
                                    </div>
                                </div> -->
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12 mt-4">
                        <div class="wht_box">
                            <h4 class="mb-3">Select Property Type/Price</h4>
                            <div class="row">
                                <div class="col-lg-12">
                                <div class="form-inline col-6">
                                <input type="radio" id="rent" name="type" value="rent" required>
                                <label for="male">Rent</label><br>
                                <input type="radio" id="sale" name="type" value="sale" required>
                                <label for="female">Sale</label><br>
                                </div>
                                </div>
                                <div class="col-lg-4 col-md-6">
                                    <div class="form-group">
                                        <label for="price" class="text-heading">Price</label>
                                        <input type="number" id="price" name="price" min="1" class="form-control" required>
                                        @if($errors->has('price'))
                                        <em class="invalid-feedback">
                                            {{ $errors->first('price') }}
                                        </em>
                                        @endif
                                        <p class="helper-block">
                                            {{ trans('cruds.property.fields.price_helper') }}
                                        </p>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6">
                                    <div class="form-group">
                                        <label for="size" class="text-heading">Size</label>
                                        <input type="text" id="size" name="size" class="form-control only-numbers" required>
                                        @if($errors->has('size'))
                                        <em class="invalid-feedback">
                                            {{ $errors->first('size') }}
                                        </em>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6">
                                    <div class="form-group">
                                        <label for="length" class="text-heading">Length</label>
                                        <input type="text" id="length" name="length" class="form-control only-numbers" required>
                                        @if($errors->has('length'))
                                        <em class="invalid-feedback">
                                            {{ $errors->first('length') }}
                                        </em>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6">
                                    <div class="form-group">
                                        <label for="width" class="text-heading">Width</label>
                                        <input type="text" id="width" name="width" class="form-control only-numbers" required>
                                        @if($errors->has('width'))
                                        <em class="invalid-feedback">
                                            {{ $errors->first('width') }}
                                        </em>
                                        @endif
                                    </div>
                                </div>

                               
                                <div class="col-lg-4 col-md-6">
                                    <div class="form-group">
                                        <label for="property_category" class="text-heading">Property Category</label>
                                       
                                        <select id="property_category" name="property_category" class="form-control select2" required>
                                            <option value="residential">Residential</option>
                                            <option value="commercial">Commercial</option>                    
                                        </select>
                                        @if($errors->has('property_category'))
                                        <em class="invalid-feedback">
                                            {{ $errors->first('property_category') }}
                                        </em>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6">
                                    <div class="form-group">
                                        <label for="pfeature" class="text-heading">Property Feature</label>
                                        <input type="text" id="pfeature" name="property_feature" class="form-control" required>
                                        @if($errors->has('property_feature'))
                                        <em class="invalid-feedback">
                                            {{ $errors->first('property_feature') }}
                                        </em>
                                        @endif
                                    </div>
                                </div>
                                
                                <div class="col-lg-4 col-md-6">
                                    <div class="form-group">
                                        <label for="govt_tax" class="text-heading">Govt Tax Include</label>
                                        <select name="govt_tax_include" class="form-control select2" id="govt_tax">
                                            <option value="1">Included</option>
                                            <option value="0">Not Included</option>
                                        </select>
                                        @if($errors->has('govt_tax_include'))
                                        <em class="invalid-feedback">
                                            {{ $errors->first('govt_tax_include') }}
                                        </em>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6">
                                    <div class="form-group">
                                        <label for="extra_notes" class="text-heading">Extra Notes</label>
                                        <input type="text" id="extra_notes" name="extra_notes" class="form-control" required>
                                        @if($errors->has('extra_notes'))
                                        <em class="invalid-feedback">
                                            {{ $errors->first('extra_notes') }}
                                        </em>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6">
                                    <div class="form-group">
                                        <label for="type" class="col-12 pl-0">Furnished</label>
                                        <select name="furnished" class="form-control select2" id="type" required>
                                            <option value="furnished">Furnished</option>
                                            <option value="unfurnished">Un Furnished</option>
                                            <option value="semi_furnished">Semi Furnished</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6">
                                    <div class="form-group">
                                        <label for="type" class="col-12 pl-0">Vastu</label>
                                        <select name="vastu" id="vastu" class="form-control select2" required>
                                            @foreach($data['vastu'] as $vast)
                                            <option value="{{ $vast['id'] }}">{{ $vast['name'] }}</option>
                                            @endforeach
                                        </select>
                                        @if($errors->has('vastu'))
                                        <em class="invalid-feedback">
                                            {{ $errors->first('vastu') }}
                                        </em>
                                        @endif
                                        <p class="helper-block">
                                            {{ trans('cruds.property.fields.vastu_helper') }}
                                        </p>
                                    </div>
                                </div>
                                <div id="property-type-commercial" class="col-lg-4 col-md-6 d-none">
                                    <div class="form-group">
                                        <label for="property_type_commercial" class="col-12 pl-0">Property Type*</label>
                                        <select name="property_type" id="property_type_commercial" class="form-control select2" required>
                                            @foreach($data['property_type_commercial'] as $propert)
                                            <option value="{{ $propert['id'] }}">{{ $propert['name'] }}</option>
                                            @endforeach
                                        </select>
                                        @if($errors->has('property_type'))
                                        <em class="invalid-feedback">
                                            {{ $errors->first('property_type') }}
                                        </em>
                                        @endif
                                        <p class="helper-block">
                                            {{ trans('cruds.property.fields.vastu_helper') }}
                                        </p>
                                    </div>
                                </div>
                                <div id="property-type-residential" class="col-lg-4 col-md-6 d-none">
                                    <div class="form-group">
                                        <label for="property_type_residential" class="col-12 pl-0">Property Type*</label>
                                        <select name="property_type" id="property_type_residential" class="form-control select2" required>
                                            @foreach($data['property_type_residential'] as $propert)
                                            <option value="{{ $propert['id'] }}">{{ $propert['name'] }}</option>
                                            @endforeach
                                        </select>
                                        @if($errors->has('property_type'))
                                        <em class="invalid-feedback">
                                            {{ $errors->first('property_type') }}
                                        </em>
                                        @endif
                                        <p class="helper-block">
                                            {{ trans('cruds.property.fields.vastu_helper') }}
                                        </p>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="col-md-12 mt-4">
                        <div class="wht_box">
                            <h4 class="mb-3">General Amenities</h4>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="add_amenties">
                                        <select name="amenities[]" id="amenities" class="form-control select2" multiple="multiple" required>
                                            @foreach($data['amenity'] as $amenities)
                                            <option value="{{ $amenities['id'] }}">{{ $amenities['name'] }}</option>
                                            @endforeach
                                        </select>
                                        @if($errors->has('amenities'))
                                        <em class="invalid-feedback">
                                            {{ $errors->first('amenities') }}
                                        </em>
                                        @endif
                                        <p class="helper-block">
                                            {{ trans('cruds.property.fields.amenities_helper') }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12 mt-4">
                        <div class="wht_box">
                            <h4 class="mb-3">Pefrences</h4>
                            <div class="row">
                                <select name="additional[]" id="additional" class="form-control select2" multiple="multiple" required>
                                    @foreach($data['preferences'] as $preference)
                                    <option value="{{ $preference['id'] }}">{{ $preference['name'] }}</option>
                                    @endforeach
                                </select>
                                @if($errors->has('additional'))
                                <em class="invalid-feedback">
                                    {{ $errors->first('additional') }}
                                </em>
                                @endif
                                <p class="helper-block">
                                    {{ trans('cruds.property.fields.preferences_helper') }}
                                </p>
                            </div>
                        </div>

                        <div class="col-lg-12 text-right mt-4 mb-5">
                            <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
                        </div>
                    </div>

                </div>
            </form>
        </div>
    </section>
</div>
@endsection
@section('scripts')
@parent

<!-- <script src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAPS_API_KEY') }}&libraries=places&callback=initialize" async defer></script> -->

<script type="text/javascript" async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCxCC1NFlOCM9k9pI4paC8vhJytSY4t054&libraries=places&callback=initMap"></script>
        <script type="text/javascript">
            function initMap() {
              
                var map = new google.maps.Map(document.getElementById('address-map'), {
                    zoom: 10,
                  center:{lat: 20.5937, lng: 78.9629},
                    
                });

                var searchBox = new google.maps.places.SearchBox(document.getElementById('address-input'));
  //  map.controls[google.maps.ControlPosition.TOP_CENTER].push(document.getElementById('location'));
  
        var markersArray = [];

          google.maps.event.addListener(searchBox, 'places_changed', function() {
              searchBox.set('address-map', null);


                var places = searchBox.getPlaces();
                console.log(places)

                

                var bounds = new google.maps.LatLngBounds();
                var i, place;
                for (i = 0; place = places[i]; i++) {
                  (function(place) {

                    $('#address-latitude').val(place.geometry.location.lat())
                    $('#address-longitude').val(place.geometry.location.lng())

                    // var marker = new google.maps.Marker({

                    //   position: place.geometry.location
                    // });
                    // marker.bindTo('map', searchBox, 'map');
                    // google.maps.event.addListener(marker, 'map_changed', function() {
                    //   if (!this.getMap()) {
                    //     this.unbindAll();
                    //   }
                    // });
                    bounds.extend(place.geometry.location);


                  }(place));

                }


                map.fitBounds(bounds);
                searchBox.set('address-map', map);
                map.setZoom(Math.min(map.getZoom(),12));

              });

              google.maps.event.addListener(map, "click", function (e) {

                //lat and lng is available in e object                
                var latLng = e.latLng;
                console.log(latLng)                

                $('#address-latitude').val(latLng.lat())
                $('#address-longitude').val(latLng.lng())

                var marker=new google.maps.Marker({
                    position:latLng,
                    //icon:'images/pin.png',
                    //url: 'http://www.google.com/',
                    animation:google.maps.Animation.DROP
                });
                marker.setMap(map);
                clearOverlays();
                markersArray.push(marker);


                });

                function clearOverlays() {
                for (var i = 0; i < markersArray.length; i++ ) {
                markersArray[i].setMap(null);
                    }
                } 

            }

            
            

        </script>

<script src="/js/mapInput.js"></script>
<script>
    $('input[type=radio][name=type]').change(function() {
        if (this.value == 'rent') {
            console.log('Logic for entring rent duration (create and show input div)');
        } else if (this.value == 'sale') {
            console.log('Logic for removing rent duration (If created remove rent div)');
        }
    });

    $('#length').keyup(function() {        
        var width = $('#width').val();
        var length = $(this).val();
        var size = parseInt(width) * parseInt(length);
        $('#size').val(size);
    });

    $('#width').keyup(function() {        
        var width = $(this).val();
        var length = $('#length').val();
        var size = parseInt(width) * parseInt(length);
        $('#size').val(size);
    });

    $('#property_category').change(function() {   
        showPropertyType();        
    });
    showPropertyType();    
    function showPropertyType(){
        var val = $('#property_category').val();
        if(val == "commercial") {
            $('#property-type-commercial').removeClass('d-none')
            $('#property-type-residential').addClass('d-none')
        }
        if(val == "residential") {
            $('#property-type-residential').removeClass('d-none')
            $('#property-type-commercial').addClass('d-none')
        }
    }

    $('body').on('keydown','.only-numbers',function(e){
        allow_numbers_only(e)
    })

    function allow_numbers_only(e){
        if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
            // Allow: Ctrl+A
            (e.keyCode == 65 && e.ctrlKey === true) ||
            // Allow: Ctrl+C
            (e.keyCode == 67 && e.ctrlKey === true) ||
            // Allow: Ctrl+X
            (e.keyCode == 88 && e.ctrlKey === true) ||
            // Allow: home, end, left, right
            (e.keyCode >= 35 && e.keyCode <= 39)) {
            // let it happen, don't do anything
            return;
        }
        if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
            e.preventDefault();
        }
    }
</script>
@endsection