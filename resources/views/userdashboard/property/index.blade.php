<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>EstateOn</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
        integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{ asset('userfront/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('userfront/css/Responsive.css') }}">
    <link rel="stylesheet" href="{{ asset('userfront/css/about.css') }}">
    <!-- <link rel="stylesheet" href="{{ asset('userfront/css/details.css') }}"> -->
    <link rel="stylesheet" href="{{ asset('userfront/css/image-uploader.css') }}">
    <link rel="stylesheet" href="{{ asset('userfront/css/propertylist.css') }}">
</head>

<body>
<header class="user-dashboard  mt-5">
        <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
            <div class="container">
                <a class="navbar-brand" href="#">
                    <img src="{{ asset('userfront/img/Estate On Logo.png') }}" height="25px" alt="logo-img">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0 dash">
                    <li class="nav-item dropdown ">
                        <a class="nav-link" href="{{ route('frontuser.home.index') }}" 
                                >
                                <img src="{{ asset('userfront/img/Icons/Dashboard.png') }}" alt="" class="img-fluid profile"
                                    width="30px">
                                Dashboard
                            </a>
                        </li>
                        <li class="nav-item dropdown ">
                        <a class="nav-link" href="{{ route("frontuser.property.create") }}" 
                                >
                                <img src="{{ asset('userfront/img/Icons/Dashboard.png') }}" alt="" class="img-fluid profile"
                                    width="30px">
                                Add Properties
                            </a>
                        </li>
                      
                        <li class="nav-item dropdown ">
                            <a class="nav-link dropdown-toggle" href="{{ route('frontuser.home.index') }}" id="navbarDropdown" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <!-- <img src="{{ asset('userfront/img/Icons/Dashboard.png') }}" alt="" class="img-fluid profile"
                                    width="30px"> -->
                                {{Auth::user()->name}}
                            </a>
                           
                            <ul class="dropdown-menu border-0 dash" aria-labelledby="navbarDropdown">
                                <!-- <li><a class="dropdown-item" href="{{ route('frontuser.property.index') }}"><img
                                            src="{{ asset('userfront/img/Icons/Account-Management.png') }}" alt=""
                                            class="img-fluid profile" width="30px">Properties</a></li> -->
                                <li><a class="dropdown-item" href="#"onclick="event.preventDefault(); document.getElementById('logoutform').submit();"><img src="{{ asset('userfront/img/Icons/Setting.png') }}" alt=""
                                            class="img-fluid profile" width="30px">Log Out</a></li>
                            </ul>
                            <form id="logoutform" action="{{ route('logout') }}" method="POST" style="display: none;">
            {{ csrf_field() }}
        </form>
                        </li>
                    </ul>
                </div>
            </div>
        </nav> 
    </header> 
    <section class="user-dashboard-page my-5">
        <div class="container">
            <ul class="nav justify-content-around user-profile">
                <li class="nav-item">
                    <a href="{{ route("frontuser.profile.show") }}" class="nav-link active" aria-current="page" href="#"><img
                            src="./assets/img/Icons/Profile.png" alt="" class="img-fluid profile"
                            width="30px">profile</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('frontuser.property.index') }}" class="nav-link" href="#"><img src="./assets/img/Icons/Properties.png"
                            alt="" class="img-fluid profile" width="30px">Properties</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"><img src="./assets/img/Icons/Leads.png" alt=""
                            class="img-fluid profile" width="30px">Leads</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('frontuser.handp.show') }}" class="nav-link "><img src="./assets/img/Icons/Help-&-Support.png" alt=""
                            class="img-fluid profile" width="30px">Help & Support</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('frontuser.faq.show') }}" class="nav-link"><img src="./assets/img/Icons/FAQ.png" alt=""
                            class="img-fluid profile" width="30px">FAQ</a>
                </li>
            </ul>

        </div>

    </section>



    <section class="user-design">
        <div class="line">
            <div class="line1">

            </div>
            <div class="line-text">
                <h3>Properties List</h3>
            </div>
            <div class="line1">

            </div>
        </div>

    </section>

  
    @foreach($properties as $property)
 <section class="rent-house  pt-5">
        <div class="container pt-5">

            
            <div class="row gx-5">
                <div class="col-md-12">
                    <div class="row d-flex align-items-center rent-box">
                        <div class="col-md-4 rent-img rent-img-1 p-0">
                            @php

                            $image = app\Images::where('property_id',$property->id)->where('featured',1)->first();
                                       @endphp
                            <img src="{{@$image['url'] }}" alt="">
                            <a href="#" class="btn house-btn">For  {{$property->type}}</a>
                        </div>
                        <div class="col-md-8 p-0">
                            <div class="row">
                                <div class="col-md-9">
                                @if($property->approved)
                                <a href="#" class="btn App-btn shadow-none ms-5 mb-4">Approved</a>                                 
                                    @else
                                    <a href="#" class="btn App-btn shadow-none ms-5 mb-4">Approved</a>
                                    @endif
                                    <!-- <a href="#" class="btn App-btn shadow-none ms-5 mb-4">Approved</a> -->
                                    <p class="ms-3 rent-p ps-4"><span> <img
                                                src="{{ asset('userfront/img/Icons/Location Details.png') }}" alt="">
                                        </span>{{$property->name}}
                                    </p>
                                    <p class="ms-3 rent-p ps-4"><span> <img
                                                src="{{ asset('userfront/img/Icons/Location Details.png') }}" alt="">
                                        </span> {{$property->address}}
                                    </p>
                                    <div class="proprty-price">
                                       
                                    </div>
                                  
                                </div>
                                <div class="col-md-3">
                                ₹ <span> @if(isset($property->property_details)) {{$property->property_details->price}} @endif</span>
                                </div>
                            </div>
                            <hr>
                            <div class="row p-4 text-center">
                                <div class="col-md-3 text-right">
                                    <a href="{{ route('frontuser.property.show', $property->id) }}" class="btn rent-btn shadow-none">View</a>
                                </div>
                                <div class="col-md-3 text-right">
                                    <a href="{{ route('frontuser.property.edit', $property->id) }}" class="btn rent-btn shadow-none">Modify</a>
                                </div>
                                <div class="col-md-3 text-right">
                                    <a href="{{ route('frontuser.property.image', $property->id) }}" class="btn rent-btn shadow-none">Images</a>
                                </div>
                                <div class="col-md-3 text-right">
                                    <a href="{{ route('frontuser.property.leads', $property->id) }}" class="btn rent-btn shadow-none">
                                       Leads</a>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
         
        </div>
    </section>
    @endforeach
    <section class="footer py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <a class="navbar-brand" href="#">
                        <img src="{{ asset('userfront/img/Estate On Logo.png') }}" alt="logo-img">
                    </a>

                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Similique suscipit ipsum ut dicta
                        necessitatibus
                        incidunt, voluptatum fuga quasi. Consectetur porro non molestiae ipsa </p>

                        <a class="btn  circle" href="https://www.facebook.com/eoninfra/" role="button"> <img
                            src="{{ asset('userfront/img/Icons/3225194_app_logo_popular_social_facebook_media.png') }}" alt=""></a>

                    <!-- Twitter -->
                    <a class="btn  circle" href="#" role="button"> <img
                            src="{{ asset('userfront/img/Icons/3225183_twitter_logo_popular_social_app_media.png') }}" alt=""></a>


                    <!-- Instagram -->
                    <a class="btn  circle" href="https://instagram.com/eoninfratech?utm_medium=copy_link" role="button"> <img
                            src="{{ asset('userfront/img/Icons/3225191_social_instagram_media_app_popular_logo.png') }}" alt=""></a>

                    <!-- Whatsapp -->
                    <a class="btn  circle" href="#" role="button"> <img
                            src="{{ asset('userfront/img/Icons/3146791_social_logo_chat_app_green_dialog_whatsapp.png') }}" alt=""></a>

                </div>
                <div class="col-md-2">
                    <h6>Company</h6>
                    <ul class="unordered">
                        <li class="list"><a href="#">About</a></li>
                        <li class="list"><a href="#">Premium</a></li>
                        <li class="list"><a href="#">Blog</a></li>
                        <li class="list"><a href="#">Affiliate Program</a></li>
                    </ul>
                </div>
                <div class="col-md-3">
                    <h6>Help and support</h6>
                    <ul class="unordered">
                        <li class="list"><a href="#">Contact Us</a></li>
                        <li class="list"><a href="#">Knowledge Center</a></li>
                        <li class="list"><a href="#">Premium Support</a></li>

                    </ul>
                </div>
                <div class="col-md-3">
                    <h6>Legal</h6>
                    <ul class="unordered">
                        <li class="list"><a href="#">Privacy Policy</a></li>
                        <li class="list"><a href="#">Terms and Conditions </a></li>
                        <li class="list second-last"><a href="#" class="footer-btn"><span><img
                                        src="{{ asset('userfront/img/Icons/Apple.png') }}" alt="" width="30px"></span>App Store</a></li>
                        <li class="list"><a href="#" class="footer-btn"><span><img
                                        src="{{ asset('userfront/img/Icons/play-store.png') }}" alt="" width="30px"></span>App Store</a>
                        </li>

                    </ul>

                </div>
            </div>
        </div>

    </section>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>
    <script src="{{ asset('userfront/js/main.js') }}"></script>
    <script src="{{ asset('userfront/js/image-uploader.js') }}"></script>

    <script>
        $('.input-images-1').imageUploader();

        </script>
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

</body>

</html>