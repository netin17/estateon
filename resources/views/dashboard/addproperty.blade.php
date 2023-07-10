@extends('layouts.estate')
@section('content')
<link rel="stylesheet" href="{{ url('estate/css/newcss/multi-form.css')}}" />
<link rel="stylesheet" href="{{ url('estate/css/newcss/jquery.fancybox.min.css')}}" />
<link rel="stylesheet" href="{{ url('estate/summernote/summernote-bs4.css')}}">
@include('partials.dashboardsidebar', ['user'=>$data['user'], 'propertycount'=>$data['p_count']])
<div class="dashboard-content-col">
    <div class="dashboard-title-wrap d-lg-block d-none">
        <h1 class="dark-font dashboard-title mb-4 ">Dashboard</h1>
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
            <div class="tab">
            <div class="profile-form-group d-flex align-items-center mb-4">
                                    <label for="name" class="d-block fw-bold">I want</label>
                                    <div class="row">
                            
                            <div class="col-md-4">

                            <input type="radio" id="rent" name="type" value="rent" required>
                                <label for="male">Rent</label>
                                
                            </div>
                            <div class="col-md-4">
                            <input type="radio" id="sale" name="type" value="sale" required>
                                <label for="female">Sale</label><br>
                            </div>
                            <div class="col-md-4"></div>
                        </div>
                                </div>
                                <div class="profile-form-group d-flex align-items-center mb-4">
                                    <label for="category" class="d-block">Properties Category</label>
                                    <select id="property_category" name="property_category" class="form-control select2" required>
                                            <option value="residential">Residential</option>
                                            <option value="commercial">Commercial</option>                    
                                        </select>
                                </div>
                                <div class="profile-form-group d-flex align-items-center mb-4">
                                    <label for="type" class="d-block">Properties Type </label>
                                    <select name="property_type" id="property_type_commercial" class="form-control select2" required>
                                            @foreach($data['property_type_commercial'] as $propert)
                                            <option value="{{ $propert['id'] }}">{{ $propert['name'] }}</option>
                                            @endforeach
                                        </select>
                                </div>
                                <div class="profile-form-group d-flex align-items-center mb-4">
                                    <label for="vastu" class="d-block">Properties Vastu </label>
                                    <select name="vastu" id="vastu" class="form-control select2" required>
                                            @foreach($data['vastu'] as $vast)
                                            <option value="{{ $vast['id'] }}">{{ $vast['name'] }}</option>
                                            @endforeach
                                        </select>
                                </div>
                                <div class="profile-form-group d-flex align-items-center mb-4">
                                    <label for="title" class="d-block">Properties Title</label>
                                    <input type="text" id="title" name="property_feature" placeholder="" class="d-block profile-form-fild" required />
                                </div>
                                <div class="profile-form-group d-flex align-items-center mb-4">
                                    <label for="banner-image" class="d-block">Banner Image <span class="d-block red-font" style="font-size: 12px;">(jpeg or png. only)</span></label>
                                    <input type="file" name="banner_image" id="banner-image" placeholder="" class="d-block profile-form-fild" required />
                                </div>
                             
            </div>
            <div class="tab">
            <h3 class="dark-font text-center step-title">Add Location</h3>
            <div class="col-md-6">
                                    <div class="map-section-wrap">
                                        <!--Google map-->
                        <div id="address-map-container" style="width:100%;height:400px; ">
                                        <div style="width: 100%; height: 100%" id="address-map"></div>
                                    </div>

                        <!--Google Maps-->
                                    </div>
                                    <div hidden class="form-group {{ $errors->has('lat') ? 'has-error' : '' }}">
                                        <input type="hidden" id="address-latitude" name="lat" class="form-control" value="">
                                    </div>
                                    <div hidden class="form-group {{ $errors->has('lng') ? 'has-error' : '' }}">
                                        <input type="hidden" id="address-longitude" name="lng" class="form-control" value="">
                                    </div>
                                </div>
            <div class="step-form-group mb-3">
                                            <label for="name" class="step-form-label">Property/ Project Name</label>
                                            <input type="text"id="name-input" name="name" placeholder="Name" class="step-form-field w-100 d-block" required />
                                        </div>
                                        <div class="step-form-group mb-3">
                                            <label for="address" class="step-form-label">Property Address (Ref. Google Map)</label>
                                            <input type="text" id="address-input" name="address" placeholder="Address" class="step-form-field w-100 d-block" required />
                                        </div>
                                        <div class="step-form-group mb-5">
                                            <label for="locality" class="step-form-label">Locality</label>
                                            <input type="text" id="locality" placeholder="Add Nearby Locality" class="step-form-field w-100 d-block" required />
                                        </div>
            </div>
            <div class="tab">
            <h3 class="dark-font text-center step-title">Price & Description</h3>
            <div class="step-form-group">
                                            <label for="Price" class="step-form-label">Price</label>
                                            <input type="number" id="price" name="price" min="1" placeholder="e.g. 100000"
                                                class="step-form-field w-100 d-block" required />
                                        </div>
                                        <div class="step-form-group mb-3 col-md-6">
                                            <label for="size" class="step-form-label">Size (sq. feet)</label>
                                            <input type="text" id="size" name="size" placeholder="250"
                                                class="step-form-field w-100 d-block" required />
                                        </div>
                                        <div class="step-form-group mb-3 col-md-6">
                                            <label for="length" class="step-form-label">Length (sq. feet)</label>
                                            <input type="text" id="length" name="length" placeholder="25"
                                                class="step-form-field w-100 d-block" required />
                                        </div>
                                        <div class="step-form-group mb-3 col-md-6">
                                            <label for="width" class="step-form-label">Width (sq. feet)</label>
                                            <input type="text" id="width" name="width" placeholder="203"
                                                class="step-form-field w-100 d-block" required />
                                        </div>
                                        <div class="step-form-group mb-3 col-12">
                                            <label for="Description" class="step-form-label">Description</label>
                                            <textarea id="description" name="description" cols="30" rows="5" class="textarea" placeholder="Write hear"></textarea>
                                        </div>
            </div>
            <div class="tab">
            <h3 class="dark-font text-center step-title">Amenities & Other Preferences</h3>
            <div class="row">
    <div class="col-md-3 col-6">
    @php $amenityCount = count($data['amenity']); @endphp
        @foreach($data['amenity'] as $index => $amenity)
            <div class="step-checkbox-group mb-lg-4 mb-3">
                <input class="form-check-input" name="amenities[]" type="checkbox" value="{{ $amenity['id'] }}" id="gridCheck">
                <label class="form-check-label" for="gridCheck">
                    {{ $amenity['name'] }}
                </label>
            </div>
            @if(($index + 1) % 7 == 0 && ($index + 1) < $amenityCount)
                </div>
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
                <input class="form-check-input" name="additional[]" type="checkbox" value="{{ $preference['id'] }}" id="gridCheck">
                <label class="form-check-label" for="gridCheck">
                    {{ $preference['name'] }}
                </label>
            </div>
            @if(($index + 1) % 7 == 0 && ($index + 1) < $preferenceCount)
                </div>
                <div class="col-md-3 col-6">
            @endif
        @endforeach
    </div>
</div>
    </div>
            <div class="tab">
            <h3 class="dark-font text-center step-title">Other information</h3>
            <div class="step-form-group mb-3 col-md-6">
                                            <label for="project-id" class="step-form-label">Project ID (RERA PUDA)</label>
                                            <input type="text" id="project-id" placeholder="HY174257"
                                                class="step-form-field w-100 d-block" required />
                                        </div>
                                        <div class="step-form-group mb-3 col-md-6">
                                            <label for="include" class="step-form-label">Govt Tax Include</label>
                                            <input type="text" id="include" placeholder="Include"
                                                class="step-form-field w-100 d-block" required />
                                        </div>
            </div>
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
            <div style="overflow:auto;">
                <div style="float:right; margin-top: 5px;">
                    <button type="button" class="previous">Previous</button>
                    <button type="button" class="next">Next</button>
                    <button type="button" class="submit">Submit</button>
                </div>
            </div>
          {{--  <!-- Circles which indicates the steps of the form: -->
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
@endsection
@section('scripts')
<script src="{{ url('estate/js/jquery-validation/jquery.validate.min.js')}}"></script>
<script src="{{ url('estate/js/multi-form.js')}}"></script>
<script src="{{ url('estate/js/jquery.fancybox.min.js')}}"></script>
<script src="{{ url('estate/summernote/summernote-bs4.min.js')}}"></script>
<script src="{{ url('/js/mapInput.js')}}"></script>
<script type="text/javascript" async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCxCC1NFlOCM9k9pI4paC8vhJytSY4t054&libraries=places&callback=initMap"></script>
<script type="text/javascript">
    $("#addProperty").multiStepForm({
        // defaultStep:0,
        beforeSubmit: function(form, submit) {
            console.log("called before submiting the form");
            console.log(form);
            console.log(submit);
        }
    }).navigateTo(0);

    $(function() {
        // Summernote
        $('.textarea').summernote()
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
    
    var images = []; // Array to store image data

  $('#imageInput').change(function(e) {
    var files = e.target.files;
    var imagePreviewContainer = $('#imagePreviewContainer');
    imagePreviewContainer.empty(); // Clear previous previews
    images = []; // Reset the array

    if (files) {
      for (var i = 0; i < files.length; i++) {
        var file = files[i];
        var reader = new FileReader();

        reader.onload = (function(file) {
          return function(e) {
            var img = $('<img>').addClass('preview-image').attr('src', e.target.result);
            img.appendTo(imagePreviewContainer);

            // Push the image data to the array
            images.push({
              src: e.target.result,
              type: 'image'
            });
          };
        })(file);

        reader.readAsDataURL(file);
      }
    }
  });
  // Initialize FancyBox on the images
  $('#imagePreviewContainer').on('click', '.preview-image', function() {
    var index = $(this).index();

    $.fancybox.open(images, {
      loop: true,
      autoFocus: false,
      buttons: ['close'],
      closeClickOutside: true,
      clickContent: false,
      onInit: function(instance) {
        instance.jumpTo(index); // Open FancyBox starting from the clicked image
      }
    });
  });
</script>
@endsection