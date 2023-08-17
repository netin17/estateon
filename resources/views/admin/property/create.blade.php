@extends('layouts.admin')
@section('content')
<link rel="stylesheet" href="{{ url('estate/summernote/summernote-bs4.css')}}">
<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.property.title_singular') }}
    </div>
    <div class="card-body">
        <form action="{{route('admin.property.store')}}" method="POST" id="create-property" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <h5>Property For</h5>
                <input type="radio" id="rent" name="type" value="rent">
                <label for="rent">Rent</label><br>
                <input type="radio" id="sale" name="type" value="sale">
                <label for="sale">Sale</label><br>
            </div>
            <div class="form-group">
                <h5>User Type</h5>

                <div class="row">
                                    <div class="col-4 rent-sell-button position-relative">

                                        <input type="radio" id="agent" name="user_type" value="agent" required>
                                        <label for="agent" class="position-relative rent-button">Agent</label>

                                    </div>
                                    <div class="col-4 rent-sell-button position-relative">
                                        <input type="radio" id="owner" name="user_type" value="owner" required>
                                        <label for="owner" class="position-relative sell-button">Owner</label><br>
                                    </div>
                                    <div class="col-4 rent-sell-button position-relative">
                                        <input type="radio" id="builder" name="user_type" value="builder" required>
                                        <label for="builder" class="position-relative sell-button">Builder</label><br>
                                    </div>
                                    <div class="col-md-4"></div>
                                </div>
            </div>
            <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                <h5 for="name">{{ trans('cruds.property.fields.name') }}*</h5>
                <input type="text" id="name-input" name="name" class="form-control" required>
                @if($errors->has('name'))
                <em class="invalid-feedback">
                    {{ $errors->first('name') }}
                </em> 
                @endif
                <p class="helper-block">
                    {{ trans('cruds.user.fields.email_helper') }}
                </p>
            </div>
            <div class="form-group">
                                <h5 for="title" class="d-block">Property Title</h5>
                                <input type="text" id="title" name="property_title" placeholder="" class="form-control d-block profile-form-fild" required />
             </div>
          

            <div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
                <h5 for="name">{{ trans('cruds.property.fields.description') }}*</h5>
                <textarea id="description" name="description" class="form-control textarea" required></textarea>
                @if($errors->has('description'))
                <em class="invalid-feedback">
                    {{ $errors->first('description') }}
                </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.property.fields.description_helper') }}
                </p>
            </div>
            <div class="step-form-group mb-3">
                                <label for="name" class="step-form-label">State</label>
                                <select name="state_id" id="state_id" class="form-control d-block profile-form-fild select2 m-0" required>
                                <option value="">--Select--</option>
                                @foreach($data['states'] as $state)
                                    <option value="{{ $state['id'] }}">{{ $state['name'] }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="step-form-group mb-3">
                                <label for="name" class="step-form-label">City</label>
                                <select name="city_id" id="city_id" class="form-control d-block profile-form-field select2 m-0" required>
                                    <!-- Cities will be populated dynamically -->
                                </select>
                            </div>
            <div class="form-group {{ $errors->has('address') ? 'has-error' : '' }}">
                <h5 for="address">{{ trans('cruds.property.fields.address') }}*</h5>
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
                <input type="hidden" id="address-latitude" name="lat" class="form-control" value="25.957800">
            </div>
            <div hidden class="form-group {{ $errors->has('lng') ? 'has-error' : '' }}">
                <input type="hidden" id="address-longitude" name="lng" class="form-control" value="80.149803">
            </div>
            <div id="address-map-container" style="width:100%;height:400px; ">
                <div style="width: 100%; height: 100%" id="address-map"></div>
            </div>
            <div class="form-group {{ $errors->has('location') ? 'has-error' : '' }}">
                <h5 for="location">Location*</h5>
                <input type="text" id="location" name="location" class="form-control map-input" required>
                @if($errors->has('location'))
                <em class="invalid-feedback">
                    {{ $errors->first('location') }}
                </em>
                @endif
            </div>  
            <div class="form-group mb-5">
                                <label for="locality" class="step-form-label">Locality</label>
                                <input type="text" id="locality" placeholder="Add Nearby Locality" name="locality" class="step-form-field w-100 d-block" required />
                            </div>   
            <div class="form-group d-flex align-items-center mb-4">
                                <label for="banner-image" class="d-block">Banner Image <span class="d-block red-font" style="font-size: 12px;">(jpeg or png. only)</span></label>
                                <input type="file" name="banner_image" id="banner-image" placeholder="" class="d-block form-control profile-form-fild" required />
                            </div>
            <div class="form-group">
                <h5 for="type">Furnished</h5>
                <select name="furnished" id="type" class="form-control select2">
                    <option value="furnished">Furnished</option>
                    <option value="unfurnished">Un Furnished</option>
                    <option value="semi_furnished">Semi Furnished</option>
                </select>
            </div>
            <div class="form-group {{ $errors->has('vastu') ? 'has-error' : '' }}">
                <h5 for="vastu">{{ trans('cruds.property.fields.vastu') }}*</h5>
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
            <div class="form-group {{ $errors->has('property_category') ? 'has-error' : '' }}">
                <h5 for="property_category">Property Category*</h5>
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
            <div id="property-type-commercial" class="form-group d-none  {{ $errors->has('property_type') ? 'has-error' : '' }}">
                <h5 for="property_type_commercial">{{ trans('cruds.property.fields.property_type') }}*</h5>
                    <select name="property_type_commercial" id="property_type_commercial" class="form-control select2" required>
                        @foreach($data['property_type_commercial'] as $propert)
                        <option value="{{ $propert['id'] }}">{{ $propert['name'] }} {{ $propert['id']}}</option>
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
            <div id="property-type-residential" class="form-group d-none {{ $errors->has('property_type') ? 'has-error' : '' }}">
                <h5 for="property_type_residential">{{ trans('cruds.property.fields.property_type') }}*</h5>
                    <select name="property_type_residential" id="property_type_residential" class="form-control select2" required>
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
            
            <div class="form-group {{ $errors->has('amenities') ? 'has-error' : '' }}">
                <label for="roles">{{ trans('cruds.property.fields.amenities') }}*
                    <span class="btn btn-info btn-xs select-all">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all">{{ trans('global.deselect_all') }}</span></label>
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

            <div class="form-group {{ $errors->has('additional') ? 'has-error' : '' }}">
                <label for="roles">{{ trans('cruds.property.fields.preferences') }}*
                    <span class="btn btn-info btn-xs select-all">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all">{{ trans('global.deselect_all') }}</span></label>
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

            <div class="form-group {{ $errors->has('price') ? 'has-error' : '' }}">
                <h5 for="price">{{ trans('cruds.property.fields.price') }}*</h5>
                <input type="number" id="price" name="price" min="1" class="form-control only-numbers" required>
                @if($errors->has('price'))
                <em class="invalid-feedback">
                    {{ $errors->first('price') }}
                </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.property.fields.price_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('size') ? 'has-error' : '' }}">
                <label for="size">Carpet Area* (sq. feet)</label>
                <input type="text" id="carpet_area" name="carpet_area" placeholder="250" class="only-numbers form-control w-100 d-block" required/>
            </div>
            <div class="form-group {{ $errors->has('length') ? 'has-error' : '' }}">
            <label for="length" class="step-form-label">Super Area (sq. feet)</label>
                            <input type="text" id="super_area" name="super_area" placeholder="25" class="only-numbers form-control w-100 d-block" />
            </div>
            <div class="form-group {{ $errors->has('width') ? 'has-error' : '' }}">
            <label for="width" class="step-form-label">Build-in area (sq. feet)</label>
                            <input type="text" id="build_up_area" name="build_up_area" placeholder="203" class="only-numbers form-control w-100 d-block" />
            </div>
            
            <div class="form-group {{ $errors->has('property_feature') ? 'has-error' : '' }}">
                <label for="property_feature">Property Feature*</label>
                <input type="text" id="property_feature" name="property_feature" class="form-control" required>
                @if($errors->has('property_feature'))
                <em class="invalid-feedback">
                    {{ $errors->first('property_feature') }}
                </em>
                @endif
            </div>   
            <div class="step-form-group mb-3 col-md-6">
    <label for="property_status" class="step-form-label">Property Status</label>
    <div class="form-check">
        <input type="radio" class="form-check-input" name="property_status" value="ready_to_move" id="ready_to_move">
        <label class="form-check-label" for="ready_to_move">Ready to Move</label>
    </div>
    <div class="form-check">
        <input type="radio" class="form-check-input" name="property_status" value="under_construction" id="under_construction">
        <label class="form-check-label" for="under_construction">Under Construction</label>
    </div>


<div class="step-form-group mb-3 property-age-options" style="display: none;">
    <label for="property_age" class="step-form-label">Property Age</label>
    <div class="form-check">
        <input type="radio" class="form-check-input" name="property_age" value="0-5" id="age_0_5">
        <label class="form-check-label" for="age_0_5">0-5 years</label>
    </div>
    <div class="form-check">
        <input type="radio" class="form-check-input" name="property_age" value="6-10" id="age_6_10">
        <label class="form-check-label" for="age_6_10">6-10 years</label>
    </div>
    <div class="form-check">
        <input type="radio" class="form-check-input" name="property_age" value="11-15" id="age_11_15">
        <label class="form-check-label" for="age_11_15">11-15 years</label>
    </div>
    <div class="form-check">
        <input type="radio" class="form-check-input" name="property_age" value="15+" id="age_15+">
        <label class="form-check-label" for="age_15+">More Than 15</label>
    </div>
    <!-- Add more options here as needed -->
</div>

<div class="step-form-group mb-3 possession-options" style="display: none;">
    <label for="possession_by" class="step-form-label">Possession By</label>
    <!-- Use a loop or add options manually -->
   
    <!-- Add more options here as needed -->
</div>
</div>
                                <div class="step-form-group mb-3 col-md-6">
                                    <label for="project-id" class="step-form-label">Project ID (RERA PUDA)</label>
                                    <input type="text" id="project-id" placeholder="HY174257" name="rera_number" class="step-form-field step-form-field-other-info w-100 d-block" />
                                </div>          
            <div class="form-group {{ $errors->has('govt_tax_include') ? 'has-error' : '' }}">
                <label for="govt_tax">Govt Tax Include*</label>
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
            <div class="form-group {{ $errors->has('extra_notes') ? 'has-error' : '' }}">
                <label for="govt_tax">Extra Notes</label>
                <input type="text" id="govt_tax" name="extra_notes" class="form-control">
                @if($errors->has('extra_notes'))
                <em class="invalid-feedback">
                    {{ $errors->first('extra_notes') }}
                </em>
                @endif
            </div>


            <div class="form-group">
                <label for="living_room">{{ trans('cruds.property.fields.featured') }}</label>
                <input type="checkbox" name="featured" value="true">
            </div>
            <div class="form-group">
                <label for="living_room">{{ trans('cruds.property.fields.hot') }}</label>
                <input type="checkbox" name="hot" value="true">
            </div>

            <div>
                <h5>User Details</h5><h6>( If posted by Admin, Please add User Id 1 )</h6>
            </div>

            <div class="form-group {{ $errors->has('user_id') ? 'has-error' : '' }}">
                <label for="user_id">User Id*</label>
                <input type="number" id="user_id" name="user_id" class="form-control" required>
                @if($errors->has('user_id'))
                <em class="invalid-feedback">
                    {{ $errors->first('user_id') }}
                </em> 
                @endif
                <p class="helper-block">
                    {{ trans('cruds.user.fields.email_helper') }}
                </p>
            </div>
            {{-- <div class="form-group {{ $errors->has('contact_number') ? 'has-error' : '' }}">
                <label for="contact_number">Mobile Number*</label>
                <input type="text" id="contact_number" name="contact_number" class="form-control" required>
                @if($errors->has('contact_number'))
                <em class="invalid-feedback">
                    {{ $errors->first('contact_number') }}
                </em> 
                @endif
                <p class="helper-block">
                    {{ trans('cruds.user.fields.email_helper') }}
                </p>
            </div>

          <div class="form-group">
                <label for="posted">Posted By
                <select name="furnished" id="posted" name="posted" class="form-control select2">
                    <option value="Owner">Owner</option>
                    <option value="Broker">Broker</option>
                    <option value="Builder">Builder</option>
                    <option value="Agent">Agent</option>
                    <option value="Admin">Admin</option>
                </select>
            </div> --}}

            <div>
                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
            </div>
        </form>
    </div>
</div>
@endsection
@section('scripts')
@parent
<!-- <script src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAPS_API_KEY') }}&libraries=places&callback=initialize" async defer></script> -->
<script src="{{ url('estate/summernote/summernote-bs4.min.js')}}"></script>
<script src="{{ url('estate/js/jquery-validation/jquery.validate.min.js')}}"></script>
<script src="{{ url('estate/js/jquery-validation/additional-methods.min.js')}}"></script>
<script type="text/javascript" async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCxCC1NFlOCM9k9pI4paC8vhJytSY4t054&libraries=places&callback=initMap"></script>
        <script type="text/javascript">
               $(function () {


    // Summernote
    $('.textarea').summernote()
    $.validator.addMethod('summernoteRequired', function(value, element) {
        var summernoteValue = $(element).summernote('isEmpty');
        console.log(summernoteValue)
        return !summernoteValue;
    }, 'Please enter a value.');
    var val = {
        rules: {
            type: "required",
            property_category: "required",
            property_type: "required",
            vastu: "required",
            property_title: "required",
            banner_image: {
                required: true,
                extension: "jpg|jpeg|png"
            },
            description: {
                summernoteRequired: true
            },
            name: 'required',
            address: 'required',
            locality: 'required',
            price: 'required'
        },
        messages: {
            type: "Please select an option",
            property_category: "Please Select an option",
            property_type: "Please Select an option",
            vastu: "Please Select an option",
            property_title: "Enter title for your property",
            banner_image: {
                required: "Please select an image",
                extension: "Only JPG, JPEG, or PNG files are allowed"
            },
            description: {
                summernoteRequired: 'Please enter a description.'
            },
            name: "Enter name for your property",
            address: "Select Address",
            locality: 'Select nearby locality',
            price: 'Enter price for your property'
        },
    
    }
    $("#create-property").validate(val)



    $('#state_id').on('change', function () {
            var stateId = $(this).val();
            $.ajax({
                url: '/cities/' + stateId,
                type: 'GET',
                success: function (response) {
                    var citySelect = $('#city_id');
                    citySelect.empty();
                    $.each(response, function (index, city) {
                        citySelect.append($('<option>', {
                            value: city.id,
                            text: city.name
                        }));
                    });
                },
                error: function (error) {
                    console.error(error);
                }
            });
        });


        $('input[name="property_status"]').on('change', function () {
            var selectedStatus = $(this).val();
            
            if (selectedStatus === 'ready_to_move') {
                $('.property-age-options').show();
                $('.possession-options').hide();
            } else if (selectedStatus === 'under_construction') {
                $('.property-age-options').hide();
                $('.possession-options').show();
            }
        });

         // Get the current year
         var currentYear = new Date().getFullYear();
        
        // Generate possession years dynamically
        var possessionOptions = $('.possession-options');
        var possessionYears = 5; // Number of years in the future
        
        for (var i = 0; i <= possessionYears; i++) {
            var year = currentYear + i;
            var option = '<div class="form-check">' +
                            '<input type="radio" class="form-check-input" name="possesion_by" value="' + year + '" id="possession_' + year + '">' +
                            '<label class="form-check-label" for="possession_' + year + '">' + year + '</label>' +
                          '</div>';
            possessionOptions.append(option);
        }
  })
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

    
    // $('#rent').change(function() {   
    //     if(this.checked) {
    //         $('#property-type-residential').removeClass('d-none')
    //     }     
    // });

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