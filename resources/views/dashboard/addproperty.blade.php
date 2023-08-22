@extends('layouts.estate')
@section('content')
<link rel="stylesheet" href="{{ url('estate/css/newcss/multi-form.css')}}" />
<link rel="stylesheet" href="{{ url('estate/summernote/summernote-bs4.css')}}">
<section class="dashboard-section">
    <div class="container">
        <div class="dashboard-row d-flex flex-wrap">
            @include('partials.dashboardsidebar', ['user'=>$data['user'], 'propertycount'=>$data['p_count'], 'is_builder'=>$data['is_builder']])
            <div class="dashboard-content-col">
                <div class="dashboard-title-wrap d-lg-block d-none">
                    <h1 class="dark-font text-left dashboard-title mb-4 ">Dashboard</h1>
                </div>
                <div class="refer-box side-refer-box text-center mb-5">
                    Refer To Your Friend
                </div>
                <div class="step-bar px-sm-5">
                    <ul class="d-flex step-list">
                        <li class="position-relative step-item"><span class="d-block">1</span></li>
                        <li class="position-relative step-item"><span class="d-block">2</span></li>
                        <li class="position-relative step-item"><span class="d-block">3</span></li>
                        <li class="position-relative step-item"><span class="d-block">4</span></li>
                        <li class="position-relative step-item"><span class="d-block">5</span></li>
                        <li class="position-relative step-item"><span class="d-block">6</span></li>
                    </ul>
                </div>
                <div class="step-content box-style">
                    <h3 class="dark-font text-center step-title">Add Basic Property Information</h3>
                    <form action="{{ route('frontuser.property.store') }}" method="POST" enctype="multipart/form-data" class="dashboard-profile-form mt-5" id="addProperty">
                        @csrf
                        <div class="tab" style="max-width: 585px; margin: 0 auto;">
                            <div class="profile-form-group d-flex align-items-center mb-4">
                                <label for="name" class="d-block fw-bold">I want</label>
                                <div class="row">
                                    <div class="col-4 rent-sell-button position-relative">

                                        <input type="radio" id="rent" name="type" value="rent" checked required>
                                        <label for="rent" class="position-relative rent-button">Rent</label>

                                    </div>
                                    <div class="col-4 rent-sell-button position-relative">
                                        <input type="radio" id="sale" name="type" value="sale" required>
                                        <label for="sale" class="position-relative sell-button">Sale</label><br>
                                    </div>
                                    <div class="col-md-4"></div>
                                </div>
                            </div>
                            <div class="profile-form-group d-flex align-items-center mb-4">
                                <label for="name" class="d-block fw-bold">Are You*</label>
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
                            <div class="profile-form-group d-flex align-items-center mb-4">
                                <label for="category" class="d-block">Properties Category</label>
                                <select id="property_category" name="property_category" class="d-block profile-form-fild form-control select2 m-0" required>
                                    <option value="residential">Residential</option>
                                    <option value="commercial">Commercial</option>
                                </select>
                            </div>
                            {{-- <div class="profile-form-group d-flex align-items-center mb-4">
                                <label for="type" class="d-block">Properties Type </label>
                                <select name="property_type" id="property_type_commercial" class="form-control d-block profile-form-fild select2 m-0" required>
                                    @foreach($data['property_type_commercial'] as $propert)
                                    <option value="{{ $propert['id'] }}">{{ $propert['name'] }}</option>
                            @endforeach
                            </select>
                        </div> --}}
                        <div class="profile-form-group d-flex align-items-center mb-4">
                            <label for="type" class="d-block">Properties Type</label>
                            <select name="property_type" id="property_type_commercial" class="form-control d-block profile-form-fild select2 m-0" required>
                                {{-- Options will be dynamically updated based on the selected property_category --}}
                            </select>
                        </div>
                        <div class="profile-form-group d-flex align-items-center mb-4">
                            <label for="vastu" class="d-block">Properties Vastu </label>
                            <select name="vastu" id="vastu" class="form-control d-block profile-form-fild select2 m-0" required>
                                @foreach($data['vastu'] as $vast)
                                <option value="{{ $vast['id'] }}">{{ $vast['name'] }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="profile-form-group d-flex align-items-center mb-4">
                            <label for="title" class="d-block">Property Title</label>
                            <input type="text" id="title" name="property_title" placeholder="" class="form-control d-block profile-form-fild" required />
                        </div>
                        <div class="profile-form-group d-flex align-items-center mb-4">
                            <label for="banner-image" class="d-block">Banner Image <span class="d-block red-font" style="font-size: 12px;">(jpeg or png. only)</span></label>
                            <input type="file" name="banner_image" id="banner-image" placeholder="" class="d-block form-control profile-form-fild" required />
                        </div>
                </div>
                <div class="tab">
                    <h3 class="dark-font text-center step-title">Add Location</h3>
                    <div class="row mt-5">
                        <div class="col-md-6">
                            <div class="map-section-wrap">
                                <!--Google map-->
                                <div id="address-map-container" style="width:100%;height:400px; ">
                                    <div style="width: 100%; height: 100%" id="address-map"></div>
                                </div>

                                <!--Google Maps-->
                            </div>
                           
                        </div>
                        <div class="col-md-6">
                            <div class="step-form-group mb-3">
                                <label for="name" class="step-form-label">Property/ Project Name</label>
                                <input type="text" id="name-input" name="name" placeholder="Name" class="step-form-field w-100 d-block" required />
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

                            <div class="step-form-group mb-3">
                                <label for="address" class="step-form-label">Property Address (Ref. Google Map)</label>
                                <input type="text" id="address-input" name="address" placeholder="Address" class="step-form-field w-100 d-block" required />
                                <input type="text" id="address-latitude" name="lat" class="visually-hidden" autocomplete="new-address"/>
                            <input type="text" id="address-longitude" name="lng" class="visually-hidden" autocomplete="hhh-address"/>
                            </div>
                            <div class="step-form-group mb-5">
                                <label for="locality" class="step-form-label">Locality</label>
                                <input type="text" id="locality" placeholder="Add Nearby Locality" name="locality" class="step-form-field w-100 d-block" required />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab">
                    <h3 class="dark-font text-center step-title">Price & Description</h3>
                    <div class="row mt-4">
                        <div class="step-form-group mb-3 col-md-6">
                            <label for="Price" class="step-form-label">Price</label>
                            <input type="number" id="price" name="price" min="1" placeholder="e.g. 100000" class="step-form-field w-100 d-block" required />
                        </div>
                        <div class="step-form-group mb-3 col-md-6">
                            <label for="size" class="step-form-label">Carpet Area* (sq. feet)</label>
                            <input type="text" id="carpet_area" name="carpet_area" placeholder="250" class="only-numbers step-form-field w-100 d-block" required/>
                        </div>
                        <div class="step-form-group mb-3 col-md-6">
                            <label for="length" class="step-form-label">Super Area (sq. feet)</label>
                            <input type="text" id="super_area" name="super_area" placeholder="25" class="only-numbers step-form-field w-100 d-block" />
                        </div>
                        <div class="step-form-group mb-3 col-md-6">
                            <label for="width" class="step-form-label">Build-in area (sq. feet)</label>
                            <input type="text" id="build_up_area" name="build_up_area" placeholder="203" class="only-numbers step-form-field w-100 d-block" />
                        </div>
                        <div class="step-form-group mb-3 col-12">
                            <label for="Description" class="step-form-label">Description</label>
                            <textarea id="description" name="description" cols="30" rows="5" class="textarea" placeholder="Write here" required></textarea>
                        </div>
                    </div>
                </div>
                <div class="tab">
                    <h3 class="dark-font text-center step-title">Amenities & Other Preferences</h3>
                    <div class="row">
                        <div class="col-md-3 col-6">
                            @php $amenityCount = count($data['amenity']); @endphp
                            @foreach($data['amenity'] as $index => $amenity)
                            <div class="step-checkbox-group mb-lg-4 mb-3">
                                <input class="form-check-input" name="amenities[]" type="checkbox" value="{{ $amenity['id'] }}" id="{{ $amenity['id'] }}">
                                <label class="form-check-label" for="{{ $amenity['id'] }}">
                                    {{ $amenity['name'] }}
                                </label>
                            </div>
                            @if(($index + 1) % 7 == 0 && ($index + 1) < $amenityCount) </div>
                                <div class="col-md-3 col-6">
                                    @endif
                                    @endforeach
                                </div>
                        </div>

                        <div class="row">
                            <div class="col-md-3 col-6">
                                @php $preferenceCount = count($data['preferences']); @endphp
                                @foreach($data['preferences'] as $index => $preference)
                                <div class="step-checkbox-group mb-lg-4 mb-3">
                                    <input class="form-check-input" name="additional[]" type="checkbox" value="{{ $preference['id'] }}" id="checkbox{{ $preference['id'] }}">
                                    <label class="form-check-label" for="checkbox{{ $preference['id'] }}">
                                        {{ $preference['name'] }}
                                    </label>
                                </div>
                                @if(($index + 1) % 7 == 0 && ($index + 1) < $preferenceCount) </div>
                                    <div class="col-md-3 col-6">
                                        @endif
                                        @endforeach
                                    </div>
                            </div>
                        </div>
                        <div class="tab">
                            <h3 class="dark-font text-center step-title">Other information</h3>
                            <div class="row mt-4">
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
                                <div class="step-form-group mb-3 col-md-6">
                                    <label for="include" class="step-form-label">Govt Tax Include</label>
                                    <select name="govt_tax_include" class="form-control select2 step-form-field step-form-field-other-info w-100 d-block m-0" id="govt_tax">
                                        <option value="1">Included</option>
                                        <option value="0">Not Included</option>
                                    </select>
                                </div>
                                <div class="step-form-group col-md-6 mb-3">
                                    <label for="extra_notes" class="text-heading step-form-label">Extra Notes</label>
                                    <input type="text" id="extra_notes" name="extra_notes" class="form-control m-0 step-form-field step-form-field-other-info w-100 d-block">

                                </div>
                                <div class="step-form-group col-md-6 mb-3">
                                    <label for="type" class="step-form-label">Furnished</label>
                                    <select name="furnished" class="form-control select2 step-form-field step-form-field-other-info w-100 d-block m-0" id="type">
                                        <option value="">--Select--</option>
                                        <option value="furnished">Furnished</option>
                                        <option value="unfurnished">Un Furnished</option>
                                        <option value="semi_furnished">Semi Furnished</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        {{--
            <div class="tab">
            <h3 class="dark-font text-center step-title">Add Images (jpeg or png. only)</h3>
            <div class="row">
    <div class="col-md-12">
      <div class="row">
        <div class="col-md-12">
          <div class="input-field col-md-12">
            <h6 class="head-txt">Add minimum 5 photos</h6>
            <input type="file" class="form-control" name="image[]" id="imageInput" multiple />
          </div>
        </div>
      </div>
    </div>
  </div>
  <div id="imagePreviewContainer" class="row"></div>
            </div>
            --}}
                        <div style="overflow:auto;">
                            <div class="d-flex justify-content-end mt-5 controal-btns">
                                <button type="button" class="previous px-5 step-back-btn d-block transition me-2">Previous</button>
                                <button type="button" class="next contact-sub-btn btn btn-primary m-0">Next</button>
                                <button type="button" class="submit px-5 contact-sub-btn btn btn-primary m-0">Submit</button>
                            </div>
                        </div>
                        {{-- <!-- Circles which indicates the steps of the form: -->
            <div style="text-align:center;margin-top:40px;">
                <span class="step">1</span>
                <span class="step">2</span>
                <span class="step">3</span>
                <span class="step">4</span>
                <span class="step">5</span>
                <span class="step">6</span>
            </div>
            --}}
                        </form>

                    </div>
                </div>
            </div>
        </div>
</section>
@endsection
@section('scripts')
<script src="{{ url('estate/js/jquery-validation/jquery.validate.min.js')}}"></script>
<script src="{{ url('estate/js/jquery-validation/additional-methods.min.js')}}"></script>
<script src="{{ url('estate/js/multi-form.js')}}"></script>
<script src="{{ url('estate/summernote/summernote-bs4.min.js')}}"></script>
<script src="{{ url('/js/mapInput.js')}}"></script>
<script type="text/javascript" async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCxCC1NFlOCM9k9pI4paC8vhJytSY4t054&libraries=places&callback=initMap"></script>
<script type="text/javascript">
    //     jQuery.validator.setDefaults({
    //   // This will ignore all hidden elements alongside `contenteditable` elements
    //   // that have no `name` attribute
    //   ignore: ":hidden, [contenteditable='true']:not([description])"
    // });

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
            lat:"required",
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
            lat: "Please Select address from dropdown list by google",
            name: "Enter name for your property",
            address: "Select Address",
            locality: 'Select nearby locality',
            price: 'Enter price for your property'
        }
    }
    //     if ($.validator.methods.summernoteRequired) {
    //   // The summernoteRequired method is added
    //   console.log('summernoteRequired method is added');
    // } else {
    //   // The summernoteRequired method is not added
    //   console.log('summernoteRequired method is not added');
    // }



    var multiStepForm = $("#addProperty").multiStepForm({
        // defaultStep:0,
        beforeSubmit: function(form, submit) {
            console.log("called before submiting the form");
        },
        validations: val
    }).navigateTo(0);
    console.log(multiStepForm.getCurrentStepIndex())
    $(function() {
        // Summernote
        $('.textarea').summernote()
    })

    function initMap() {

        var map = new google.maps.Map(document.getElementById('address-map'), {
            zoom: 10,
            center: {
                lat: 20.5937,
                lng: 78.9629
            },

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
            map.setZoom(Math.min(map.getZoom(), 12));

        });

        google.maps.event.addListener(map, "click", function(e) {

            //lat and lng is available in e object                
            var latLng = e.latLng;
            console.log(latLng)

            $('#address-latitude').val(latLng.lat())
            $('#address-longitude').val(latLng.lng())

            var marker = new google.maps.Marker({
                position: latLng,
                //icon:'images/pin.png',
                //url: 'http://www.google.com/',
                animation: google.maps.Animation.DROP
            });
            marker.setMap(map);
            clearOverlays();
            markersArray.push(marker);


        });

        function clearOverlays() {
            for (var i = 0; i < markersArray.length; i++) {
                markersArray[i].setMap(null);
            }
        }

    }
    $('input[type=radio][name=type]').change(function() {
        if (this.value == 'rent') {
            console.log('Logic for entring rent duration (create and show input div)');
        } else if (this.value == 'sale') {
            console.log('Logic for removing rent duration (If created remove rent div)');
        }
    });

    // $('#length').keyup(function() {
    //     var width = $('#width').val();
    //     var length = $(this).val();
    //     var size = parseInt(width) * parseInt(length);
    //     $('#size').val(size);
    // });

    // $('#width').keyup(function() {
    //     var width = $(this).val();
    //     var length = $('#length').val();
    //     var size = parseInt(width) * parseInt(length);
    //     $('#size').val(size);
    // });

    // $('#property_category').change(function() {
    //     showPropertyType();
    // });
    // showPropertyType();

    // function showPropertyType() {
    //     var val = $('#property_category').val();
    //     if (val == "commercial") {
    //         $('#property-type-commercial').removeClass('d-none')
    //         $('#property-type-residential').addClass('d-none')
    //     }
    //     if (val == "residential") {
    //         $('#property-type-residential').removeClass('d-none')
    //         $('#property-type-commercial').addClass('d-none')
    //     }
    // }


    var propertyTypes = {
        residential: @json($data['property_type_residential']),
        commercial: @json($data['property_type_commercial'])
    };

    function updatePropertyTypes() {
        var selectedCategory = $('#property_category').val();
        var propertyTypeSelect = $('#property_type_commercial');
        var propertyTypeOptions = propertyTypes[selectedCategory];

        // Clear existing options
        propertyTypeSelect.empty();

        // Add new options based on the selected property_category
        $.each(propertyTypeOptions, function(index, propertyType) {
            propertyTypeSelect.append($('<option>', {
                value: propertyType.id,
                text: propertyType.name
            }));
        });
    }

    // Initial update based on the default selected property_category
    updatePropertyTypes();


    //number only function
    function allow_numbers_only(event) {
        // Allow: backspace, delete, tab, escape, enter, and .
        if ($.inArray(event.keyCode, [46, 8, 9, 27, 13, 110]) !== -1 ||
            // Allow: Ctrl+A, Command+A
            (event.keyCode === 65 && (event.ctrlKey === true || event.metaKey === true)) ||
            // Allow: home, end, left, right, down, up
            (event.keyCode >= 35 && event.keyCode <= 40)) {
            // Let it happen, don't do anything
            return;
        }

        // Ensure that it is a number or decimal point and stop the keypress
        if ((event.shiftKey || (event.keyCode < 48 || event.keyCode > 57)) &&
            (event.keyCode < 96 || event.keyCode > 105) &&
            (event.keyCode !== 190 && event.keyCode !== 110)) {
            event.preventDefault();
        }
    }
    // Event listener for property_category change
    $('#property_category').change(function() {
        updatePropertyTypes();
    });
    $('body').on('keydown', '.only-numbers', function(e) {
        allow_numbers_only(e)
    })
    $(document).ready(function () {
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
    });
</script>
@endsection