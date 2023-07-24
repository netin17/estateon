@extends('layouts.admin')
@section('content')
<link rel="stylesheet" href="{{ url('estate/summernote/summernote-bs4.css')}}">
<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.property.title_singular') }}
    </div>
    <div class="card-body">
        <form action="{{ route('admin.property.update', [$data['property']->id]) }}" method="POST" id="edit-property" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="type">Name</label>
                <input type="text" id="property_name" name="name" value="{{$data['property']->name}}" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="type">Property Type</label>
                <select name="type" id="type">
                    <option value="rent" {{$data['property']->type=='rent'? 'selected':''}}>Rent</option>
                    <option value="sale" {{$data['property']->type=='sale'? 'selected':''}}>Sale</option>
                </select>
            </div>
            <div class="form-group d-flex align-items-center mb-4">
                                <label for="title" class="d-block">Property Title</label>
                                <input type="text" id="title" name="property_title" placeholder="" value="{{ $data['property']->property_details->property_title ?? ''}}" class="form-control d-block profile-form-fild" required />
                            </div>
            <div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
                <label for="name">{{ trans('cruds.property.fields.description') }}*</label>
                <textarea id="description" name="description" class="form-control textarea" required>{{$data['property']->description}}</textarea>
                @if($errors->has('description'))
                <em class="invalid-feedback">
                    {{ $errors->first('description') }}
                </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.property.fields.description_helper') }}
                </p>
            </div>

            <div class="form-group {{ $errors->has('address') ? 'has-error' : '' }}">
                <label for="address">{{ trans('cruds.property.fields.address') }}*</label>
                <input type="text" id="address-input" name="address" value="{{$data['property']->address}}" class="form-control map-input" required>
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
                <input type="hidden" id="address-latitude" name="lat" class="form-control" value="{{$data['property']->lat}}">
            </div>
            <div hidden class="form-group {{ $errors->has('lng') ? 'has-error' : '' }}">
                <input type="hidden" id="address-longitude" name="lng" class="form-control" value="{{$data['property']->lng}}">
            </div>
            <div id="address-map-container" style="width:100%;height:400px; ">
                <div style="width: 100%; height: 100%" id="address-map"></div>
            </div>
            
            <div class="form-group {{ $errors->has('location') ? 'has-error' : '' }}">
                <label for="location">Location*</label>
                <input type="text" id="location" name="location" class="form-control map-input" value="{{$data['property']->location}}" required>
                @if($errors->has('location'))
                <em class="invalid-feedback">
                    {{ $errors->first('location') }}
                </em>
                @endif
            </div>
            <div class="step-form-group mb-5">
                                        <label for="locality" class="step-form-label">Locality</label>
                                        <input type="text" id="locality" placeholder="Add Nearby Locality" name="locality" value="{{$data['property']->property_details->locality ?? ''}}" class="step-form-field w-100 d-block" required />
                                    </div>
            <div class="profile-form-group d-flex align-items-center mb-4">
                                <label for="banner-image" class="d-block">Banner Image <span class="d-block red-font" style="font-size: 12px;">(jpeg or png. only)</span></label>
                                <input type="file" name="banner_image" id="banner-image" placeholder="" class="d-block form-control profile-form-fild" />
                                <div class="image-grid property-doc-col"><a href="{{$data['property']->images[0]->url ?? ''}}" data-fancybox="gallery"><img src="{{$data['property']->images[0]->url ?? ''}}" class="property-doc-img"></a></div>
                            </div>
                                
           <div class="form-group">
                <label for="type">Furnished
                <select name="furnished" id="type" class="form-control select2">
                    <option value="furnished" {{$data['property']->property_details['furnished'] == "furnished"? 'selected': ''}}>Furnished</option>
                    <option value="unfurnished" {{$data['property']->property_details['furnished'] == "unfurnished"? 'selected': ''}} >Un Furnished</option>
                    <option value="semi_furnished" {{$data['property']->property_details['furnished'] == "semi_furnished"? 'selected': ''}} >Semi Furnished</option>
                </select>
            </div>
            <div class="form-group {{ $errors->has('vastu') ? 'has-error' : '' }}">
                <label for="vastu">{{ trans('cruds.property.fields.vastu') }}*
                    <select name="vastu" id="vastu" class="form-control select2" required>
                        @foreach($data['vastu'] as $vast)
                        <option value="{{ $vast['id'] }}" {{$data['property']->vastu['vastu_id']==$vast['id']? 'selected': ''}}>{{ $vast['name'] }}</option>
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
            
            <div class="form-group">
                <label for="pcategory" class="text-heading">Property Category
                <!-- <input type="text" id="pcategory" name="property_category" class="form-control" value="{{$data['property']->property_details['property_category']}}" required> -->
                <select id="property_category" name="property_category" class="form-control select2" required>
                    <option value="residential" {{$data['property']->property_details['property_category']=='residential' ? 'selected':''}}>Residential</option>
                    <option value="commercial" {{$data['property']->property_details['property_category']=='commercial' ? 'selected':''}}>Commercial</option>                    
                </select>
                @if($errors->has('property_category'))
                <em class="invalid-feedback">
                    {{ $errors->first('property_category') }}
                </em>
                @endif
            </div>
            
            <div id="property-type-commercial" class="form-group d-none  {{ $errors->has('property_type') ? 'has-error' : '' }}">
                <label for="property_type_commercial">{{ trans('cruds.property.fields.property_type') }}*
                    <select name="property_type_commercial" id="property_type_commercial" class="form-control select2" required>
                        @foreach($data['property_type_commercial'] as $propert)
                        <option value="{{ $propert['id'] }}" {{ $propert['id'] == $data['property']['property_type']['type_id'] ? 'selected' : '' }}>{{ $propert['name'] }} </option>
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
                <label for="property_type_residential">{{ trans('cruds.property.fields.property_type') }}*
                    <select name="property_type_residential" id="property_type_residential" class="form-control select2" required>
                        @foreach($data['property_type_residential'] as $propert)
                        <option value="{{ $propert['id'] }}" {{ $propert['id'] == $data['property']['property_type']['type_id'] ? 'selected' : '' }}>{{ $propert['name'] }}</option>
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
                <select name="amenities[]" id="amenities" class="form-control select2" multiple="multiple">
                    @foreach($data['amenity'] as $amenities)
                    <option value="{{ $amenities['id'] }}" {{$data['property']->amenities->pluck('amenity_id')->contains($amenities['id']) ? 'selected' : ''}}>{{ $amenities['name'] }}</option>
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
                <select name="additional[]" id="additional" class="form-control select2" multiple="multiple">
                    @foreach($data['preferences'] as $preference)
                    <option value="{{ $preference['id'] }}" {{$data['property']->preferences->pluck('preference_id')->contains($preference['id']) ? 'selected' : ''}}>{{ $preference['name'] }}</option>
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
                <label for="price">{{ trans('cruds.property.fields.price') }}*</label>
                <input type="number" id="price" name="price" min="1" value="{{$data['property']->property_details['price']}}" class="form-control" required>
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
                <label for="size">Size*</label>
                <input type="text" id="size" name="size" value="{{$data['property']->property_details['size']}}" class="form-control only-numbers" required>
                @if($errors->has('size'))
                <em class="invalid-feedback">
                    {{ $errors->first('size') }}
                </em>
                @endif
            </div>
            <div class="form-group {{ $errors->has('length') ? 'has-error' : '' }}">
                <label for="length">Length*</label>
                <input type="text" id="length" name="length" value="{{$data['property']->property_details['length']}}" class="form-control only-numbers" required>
                @if($errors->has('length'))
                <em class="invalid-feedback">
                    {{ $errors->first('length') }}
                </em>
                @endif
            </div>
            <div class="form-group {{ $errors->has('width') ? 'has-error' : '' }}">
                <label for="width">Width*</label>
                <input type="text" id="width" name="width" value="{{$data['property']->property_details['width']}}" class="form-control only-numbers" required>
                @if($errors->has('width'))
                <em class="invalid-feedback">
                    {{ $errors->first('width') }}
                </em>
                @endif
            </div>
            
            <div class="form-group {{ $errors->has('property_feature') ? 'has-error' : '' }}">
                <label for="property_feature">Property Feature*</label>
                <input type="text" id="property_feature" name="property_feature" value="{{$data['property']->property_details['property_feature']}}" class="form-control" required>
                @if($errors->has('property_feature'))
                <em class="invalid-feedback">
                    {{ $errors->first('property_feature') }}
                </em>
                @endif
            </div>             
            <div class="form-group {{ $errors->has('govt_tax_include') ? 'has-error' : '' }}">
                <label for="govt_tax">Govt Tax Include*</label>
                <select name="govt_tax_include" class="form-control select21s" id="govt_tax">
                    <option value="1" {{$data['property']->property_details['govt_tax_include']=='1'? 'selected':''}}>Included</option>
                    <option value="0" {{$data['property']->property_details['govt_tax_include']=='0'? 'selected':''}}>Not Included</option>
                </select>
                @if($errors->has('govt_tax_include'))
                <em class="invalid-feedback">
                    {{ $errors->first('govt_tax_include') }}
                </em>
                @endif
            </div>
            <div class="form-group {{ $errors->has('extra_notes') ? 'has-error' : '' }}">
                <label for="govt_tax">Extra Notes</label>
                <input type="text" id="govt_tax" name="extra_notes" value="{{$data['property']->property_details['extra_notes']}}" class="form-control">
                @if($errors->has('extra_notes'))
                <em class="invalid-feedback">
                    {{ $errors->first('extra_notes') }}
                </em>
                @endif
            </div>
            <div class="form-group">
                <label for="living_room">{{ trans('cruds.property.fields.featured') }}</label>
                <input type="checkbox" name="featured" value="true" {{$data['property']->featured==1?'checked':'' }}>
            </div>
            <div class="form-group">
                <label for="living_room">{{ trans('cruds.property.fields.hot') }}</label>
                <input type="checkbox" name="hot" value="true" {{$data['property']->hot==1?'checked':'' }}>
            </div>


            <div>
                <h5>User Details</h5><h6>( If posted by Admin, Please add User Id 1 )</h6>
            </div>
            
            <div class="form-group">
                <label for="type">User Id</label>
                <input type="text" id="user_id" name="user_id" value="{{$data['property']->user_id}}" class="form-control" required>
            </div>
            <div class="form-group mb-3 col-md-6">
                                            <label for="project-id" class="step-form-label">Project ID (RERA PUDA)</label>
                                            <input type="text" id="project-id" placeholder="HY174257" name="rera_number" value="{{$data['property']->property_details->rera_number ?? ''}}" class="step-form-field step-form-field-other-info w-100 d-block" />
                                        </div>
           {{-- <div class="form-group">
                <label for="type">Mobile Number</label>
                <input type="text" id="contact_number" name="contact_number" value="{{$data['property']->contact_number}}" class="form-control" required>
            </div>
            --}}
            <div>
                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
            </div>
        </form>


    </div>
</div>
@endsection
@section('scripts')
@parent
<script src="/js/mapInput.js"></script>
<!-- <script src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAPS_API_KEY') }}&libraries=places&callback=initialize" async defer></script> -->

<script src="{{ url('estate/summernote/summernote-bs4.min.js')}}"></script>
<script src="{{ url('estate/js/jquery-validation/jquery.validate.min.js')}}"></script>
<script src="{{ url('estate/js/jquery-validation/additional-methods.min.js')}}"></script>
<script type="text/javascript" async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCxCC1NFlOCM9k9pI4paC8vhJytSY4t054&libraries=places&callback=initMap"></script>



        <script type="text/javascript">

        var latVal = parseFloat({{$data['property']->lat}});
        var lngVal = parseFloat({{$data['property']->lng}});
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
                extension: "jpg|jpeg|png"
            },
            name: 'required',
            address: 'required',
            locality: 'required',
            price: 'required',
            description: {
                summernoteRequired: true
            }
        },
        messages: {
            type: "Please select an option",
            property_category: "Please Select an option",
            property_type: "Please Select an option",
            vastu: "Please Select an option",
            property_title: "Enter title for your property",
            banner_image: {
                extension: "Only JPG, JPEG, or PNG files are allowed"
            },
            name: "Enter name for your property",
            address: "Select Address",
            locality: 'Select nearby locality',
            price: 'Enter price for your property',
            description: {
                summernoteRequired: 'Please enter a description.'
            }
        }
    }
    $("#edit-property").validate(val)
  })
            function initMap() {
              
                var map = new google.maps.Map(document.getElementById('address-map'), {
                    zoom: 10,
                  //center:{lat: 20.5937, lng: 78.9629},
                  center:{lat: latVal, lng: lngVal},
                    
                });

                var markersArray = [];

                var searchBox = new google.maps.places.SearchBox(document.getElementById('address-input'));
  //  map.controls[google.maps.ControlPosition.TOP_CENTER].push(document.getElementById('location'));
  
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

              var myLatlng = new google.maps.LatLng(parseFloat(latVal),parseFloat(lngVal));

              var marker=new google.maps.Marker({
                  position:myLatlng,
                  //icon:'images/pin.png',
                  //url: 'http://www.google.com/',
                  animation:google.maps.Animation.DROP
              });
              marker.setMap(map);
              markersArray.push(marker);


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


            // google.maps.event.addListener(map, "click", function (e) {

            //     //lat and lng is available in e object
            //     // console.log(e)
            //     // console.log(e.latLng.lat())
            //     // console.log(e.latLng.lng())
            //     var latLng = e.latLng;
            //     //alert(latLng)
            //     //$('body').find('#location').val(latLng)
            //     $('body').find('#address-latitude').val(e.latLng.lat())
            //     $('body').find('#address-longitude').val(e.latLng.lng())


            // });

        </script>

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