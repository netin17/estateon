@extends('layouts.estate')
@section('content')
<section class="find-prop">
  <img src="{{ url('estate/images/banner.jpg')}}" alt="property-front-view" class="full-img" />
  <div class="container">
    <div class="web-intro">
      <div class="intro-head">
        <p>LET US GUIDE YOUR HOME</p>
        <h1>Find Your Dream Home</h1>
      </div>
      <div class="prop-tabs">
        <form action='{{ route("property.list") }}' id="homeform" name="homeform" method="GET">
          <div class="select_term">
            <input type="radio" id="search_rent" name="type" value="rent" {{$data['category']=='R'? 'checked':''}}>
            <label for="search_rent">Rent</label>
            <input type="radio" id="search_sale" name="type" value="sale" {{$data['category']=='s'? 'checked':''}}>
            <label for="search_sale">Sale</label>
          </div>
          <div class="tab-pane">
            <div class="serch-flow">
              <div class="form-group loc-div">
                <input type="location" class="form-control map-input" id="address-input" aria-describedby="" placeholder="Enter Location.." name="location" required data-msg-required="Please enter a location." />
                <input type="hidden" name="address_latitude" id="address-latitude" value="0" />
                <input type="hidden" name="address_longitude" id="address-longitude" value="0" />
              </div>
              {{-- <div class="form-group prop-div">
                <select type="Property Type" class="form-control" id="property_type" name="property_type">
                  <option value="">Property Type</option>
                  @foreach($data['property_type'] as $property_type)
                  <option value="{{$property_type->id}}">{{$property_type->name}}</option>
                  @endforeach
                </select>
              </div> --}}

                 <section class="mainsection">
        <div>
            <div class="d-flex mainhead">
                <p class="heading cpoint"><i class="fa-solid fa-house redc"></i> Property Type <i class="fa-solid fa-angle-down"></i> </p>
                <hr>
                <p class="Bheading cpoint"><i class="fa-solid fa-indian-rupee-sign redc"></i> Budget <i class="fa-solid fa-angle-down"></i></p>
            </div>

            <div class="">
                <div class="section1">
                    <div class="innersec dnone cpoint">
                        <p class="heading1 cpoint">Residential <i class="fa-solid fa-angle-down redc santo"></i> </p>
                        <div class="innersec1 ">
                            <ul class="subproperty d-flex ">
                              @foreach($data['property_type'] as $property_type)
                              @if($property_type->property_type == "residential")
                                <li>
                                  <label class="checkbox-label">
                                  <input type="checkbox" name="residential[]" value="{{$property_type->id}}"> 
                                  {{$property_type->name}}
                                </label>
                                </li>
                                @endif
                                @endforeach
                            </ul>
                        </div>
                        <p class="heading2 cpoint">Commercial <i class="fa-solid fa-angle-down redc santo2"></i> </p>
                        <div class="innersec2 dnone">
                            <ul class="subproperty d-flex">
                              @foreach($data['property_type'] as $property_type)
                              @if($property_type->property_type == "commercial")
                              <li>
                                <label class="checkbox-label">
                                <input type="checkbox" name="commercial[]" value="{{$property_type->id}}"> {{$property_type->name}}
                              </label>
                              </li>
                              @endif
                              @endforeach
                            </ul>
                           
                        </div>
                        {{-- <p class="heading3 cpoint">Other Property Types <i class="fa-solid fa-angle-down redc santo3"></i>
                        </p>
                        <div class="innersec3 dnone">
                            <ul class="subproperty d-flex">
                                <li>Agricultural Land</li>
                                <li>Farm House</li>
                            </ul>
                        </div> --}}
                    </div>
                </div>
                <div class="section2 ml-80 cpoint">
                    <div class="sec2cont d-flex dnone">
                        
                        @switch($data['category'])
                        @case('R')
                        <div class="minprice dnone minprice1">
                            <select name="budgetMin" id="budgetMin" class="textSearch select1 dnone" >
                              <option value="">Min Price</option>
                              <option value="5000">&#8377 5000</option>
                              <option value="10000">&#8377 10000</option>
                              <option value="15000">&#8377 15000</option>
                              <option value="20000">&#8377 20000</option>
                              <option value="25000">&#8377 25000</option>
                              <option value="30000">&#8377 30000</option>
                              <option value="35000">&#8377 35000</option>
                              <option value="40000">&#8377 40000</option>
                              <option value="50000">&#8377 50000</option>
                              <option value="60000">&#8377 60000</option>
                              <option value="85000">&#8377 85000</option>
                              <option value="100000">&#8377 1 Lac</option>
                              <option value="150000">&#8377 1.5 Lac</option>
                              <option value="200000">&#8377 2 Lac</option>
                              <option value="400000">&#8377 4 Lac</option>
                              <option value="700000">&#8377 7 Lac</option>
                              <option value="1000000">&#8377 10 Lac</option> 
                          </select>
                      </div> 
                      <div class="minprice dnone minprice2">
                          <select name="maxBudjet" id="maxBudjet" class="textSearch select2 dnone">
                            <option value="">Max Price </option>
                              <option value="5000">&#8377 5000</option>
                              <option value="10000">&#8377 10000</option>
                              <option value="15000">&#8377 15000</option>
                              <option value="20000">&#8377 20000</option>
                              <option value="25000">&#8377 25000</option>
                              <option value="30000">&#8377 30000</option>
                              <option value="35000">&#8377 35000</option>
                              <option value="40000">&#8377 40000</option>
                              <option value="50000">&#8377 50000</option>
                              <option value="60000">&#8377 60000</option>
                              <option value="85000">&#8377 85000</option>
                              <option value="100000">&#8377 1 Lac</option>
                              <option value="150000">&#8377 1.5 Lac</option>
                              <option value="200000">&#8377 2 Lac</option>
                              <option value="400000">&#8377 4 Lac</option>
                              <option value="700000">&#8377 7 Lac</option>
                              <option value="1000000">&#8377 10 Lac</option>                               
                        </select>
                </div>
                            @break
                        @case('s')
                        <div class="minprice dnone minprice1">
                          <select name="budgetMin" id="budgetMin" class="textSearch select1 dnone" >
                            <option value="">Min Price</option>
                            <option value="500000">&#8377; 5 Lac</option>
                            <option value="1000000">&#8377;10 Lac</option>
                            <option value="2000000">&#8377;20 Lac</option>
                            <option value="3000000">&#8377;30 Lac</option>
                            <option value="4000000">&#8377;40 Lac</option>
                            <option value="5000000">&#8377;50 Lac</option>
                            <option value="6000000">&#8377;60 Lac</option>
                            <option value="7000000">&#8377;70 Lac</option>
                            <option value="8000000">&#8377;80 Lac</option>
                            <option value="9000000">&#8377;90 Lac</option>
                            <option value="10000000">&#8377;1 Cr</option>
                            <option value="12000000">&#8377;1.2 Cr</option>
                            <option value="14000000">&#8377;1.4 Cr</option>
                            <option value="16000000">&#8377;1.6 Cr</option>
                            <option value="18000000">&#8377;1.8 Cr</option>
                            <option value="20000000">&#8377;2 Cr</option>
                            <option value="23000000">&#8377;2.3 Cr</option> 
                            <option value="26000000">&#8377;2.6 Cr</option> 
                            <option value="30000000">&#8377;3 Cr</option> 
                            <option value="35000000">&#8377;3.5 Cr</option> 
                            <option value="40000000">&#8377;4 Cr</option> 
                            <option value="45000000">&#8377;4.5 Cr</option> 
                            <option value="50000000">&#8377;5 Cr</option> 
                            <option value="100000000">&#8377;10 Cr</option> 
                            <option value="200000000">&#8377;20 Cr</option> 
                        </select>
                    </div> 
                    <div class="minprice dnone minprice2">
                        <select name="maxBudjet" id="maxBudjet" class="textSearch select2 dnone">
                          <option value="">Max Price </option>
                          <option value="500000">&#8377; 5 Lac</option>
                          <option value="1000000">&#8377;10 Lac</option>
                          <option value="2000000">&#8377;20 Lac</option>
                          <option value="3000000">&#8377;30 Lac</option>
                          <option value="4000000">&#8377;40 Lac</option>
                          <option value="5000000">&#8377;50 Lac</option>
                          <option value="6000000">&#8377;60 Lac</option>
                          <option value="7000000">&#8377;70 Lac</option>
                          <option value="8000000">&#8377;80 Lac</option>
                          <option value="9000000">&#8377;90 Lac</option>
                          <option value="10000000">&#8377;1 Cr</option>
                          <option value="12000000">&#8377;1.2 Cr</option>
                          <option value="14000000">&#8377;1.4 Cr</option>
                          <option value="16000000">&#8377;1.6 Cr</option>
                          <option value="18000000">&#8377;1.8 Cr</option>
                          <option value="20000000">&#8377;2 Cr</option>
                          <option value="23000000">&#8377;2.3 Cr</option> 
                          <option value="26000000">&#8377;2.6 Cr</option> 
                          <option value="30000000">&#8377;3 Cr</option> 
                          <option value="35000000">&#8377;3.5 Cr</option> 
                          <option value="40000000">&#8377;4 Cr</option> 
                          <option value="45000000">&#8377;4.5 Cr</option> 
                          <option value="50000000">&#8377;5 Cr</option> 
                          <option value="100000000">&#8377;10 Cr</option> 
                          <option value="200000000">&#8377;20 Cr</option>                               
                      </select>
              </div>
                            @break
                    @endswitch
                       
                </div>
            </div>
        </div>
    </section>







               <div class="find">
                <button class="cm-btn" type="submit">Find Property</button>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>

</section>

<section class="video_sec space">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="head_title">
          <h3 class="corner">Hot Properties</h3>
        </div>
        <ul class="v_slide">
          @foreach($data['hot_featured']['hot'] as $hotp)
          <li class="v-inner">
            <div class="img-area">
              <div class="imgInner">
                @if(isset($hotp->images[0]))
                <a href="{{ route('property.detail', [$hotp->slug] ) }}"> <img src="{{$hotp->images[0]['url']}}" alt="image"></a>
                @endif
                @auth('frontuser')
                @if($hotp->likes_count > 0)
                <a class="likeBtn" data-propertyid="{{$hotp->id}}"><i class="fas fa-heart"></i> </a>
                @endif
                @if($hotp->likes_count == 0)
                <a class="likeBtn" data-propertyid="{{$hotp->id}}"><i class="far fa-heart"></i> </a>
                @endif
                @endauth

              </div>
              <div class="overlay">
                <div class="over-text">
                  <p class="propertyArea">{{$hotp->property_type->type_data->name}}</p>

                  <h4 class="BuildingName">
                    <a href="{{ route('property.detail', [$hotp->slug] ) }}">
                     
                      {{\Illuminate\Support\Str::limit($hotp->name, 35, $end='...')}}</a>
                  </h4>
                  <div class="location">
                    <i class="fas fa-map-marker-alt mr-2"> </i> <a class="locationArea" title="{{$hotp->address}}">{{\Illuminate\Support\Str::limit($hotp->address, 35, $end='...')}}</a>
                  </div>
                </div>
                <span class="divider"></span>
                <div class="catFooter">
                  <a href="{{ route('property.detail', [$hotp->slug] ) }}" class="flatPrice">₹ <span>{{number_form($hotp->property_details->price)}}</span></a>
                  <a class="cm-btn mb-2" href="#">{{$hotp->type}}</a>
                </div>
              </div>
            </div>
          </li>
          @endforeach
        </ul>
      </div>
    </div>
  </div>
</section>
<!-- featured property -->
<!-- <section class="video_sec space featured">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="head_title">
          <h3 class="corner">Featured Properties</h3>
        </div>
        <ul class="v_slide">
          @foreach($data['hot_featured']['featured'] as $featuredp)
          <li class="v-inner">
            <div class="img-area">
              <div class="imgInner">
                @if(isset($featuredp->images[0]))
                <a href="{{ route('property.detail', [$featuredp->slug] ) }}"> <img src="{{$featuredp->images[0]['url']}}" alt="image"></a>
                @endif
                @auth
                @if($featuredp->likes_count > 0)
                <a class="likeBtn" data-propertyid="{{$featuredp->id}}"><i class="fas fa-heart"></i> </a>
                @endif
                @if($featuredp->likes_count == 0)
                <a class="likeBtn" data-propertyid="{{$featuredp->id}}"><i class="far fa-heart"></i> </a>
                @endif
                @endauth
              </div>
              <div class="overlay">
                <div class="over-text">
                  <p class="propertyArea">{{$featuredp->property_type->type_data->name}}</p>

                  <h4 class="BuildingName">
                    <a href="{{ route('property.detail', [$featuredp->slug] ) }}">{{$featuredp->name}}</a>
                  </h4>
                  <div class="location">
                    <i class="fas fa-map-marker-alt mr-2"> </i> <a class="locationArea" title="{{$featuredp->address}}">{{\Illuminate\Support\Str::limit($featuredp->address, 35, $end='...')}}</a>
                  </div>
                </div>
                <span class="divider"></span>
                <div class="catFooter">
                  <a href="{{ route('property.detail', [$featuredp->slug] ) }}" class="flatPrice">₹ <span>{{$featuredp->property_details->price}}</span></a>
                  <a class="cm-btn mb-2" href="#">{{$featuredp->type}}</a>
                </div>
              </div>
            </div>
          </li>
          @endforeach
        </ul>
      </div>
    </div>
  </div>
</section>
 -->

<section class="section full-height over-hide px-4 px-sm-0">
 
    <div class="container">
      <div class="row full-height justify-content-center">
        <div class="col-lg-12 col-xl-10 align-self-center padding-tb">
             <div class="head_title">
              <h3 class="corner">Featured Properties</h3>
            </div>
          <div class="section mx-auto text-center slider-height-padding">
                  <input class="checkbox frst" type="radio" id="slide-1" name="slider" checked/>
                  <label for="slide-1"></label>
                  <input class="checkbox scnd" type="radio" name="slider" id="slider-2"/>
                  <label for="slider-2"></label>
                  <input class="checkbox thrd" type="radio" name="slider" id="slider-3"/>
                  <label for="slider-3"></label>
                  <input class="checkbox foth" type="radio" name="slider" id="slider-4"/>
                  <label for="slider-4"></label>
           
            <ul class="slider-custom">
              <li>
                <span></span>
                </li>
              <li>
                <span></span>
                </li>
              <li>
                <span></span>
                </li>
              <li>
                <span></span>
                </li>
              </ul>

            </div>
          </div>
          </div>
      </div>
 
</section>

<!-- app info section -->
<Section class="space app">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-md-6">
        <div class="appImageSec">
          <img src="{{ url('estate/images/estateonapp.png')}}" alt="images" class="img-fluide">
        </div>
      </div>
      <div class="col-md-6">
        <div class="app text">
          <div class="head_title">
            <h3 class="corner">Download <span>Estate On </span> App</h3>
          </div>
          <div class="appBtns">
            <ul class="p-0">
              <a><i class="fas fa-heart mr-2"></i>Mark Favourite</a>
              <a><i class="fas fa-bell mr-2"></i>Property Alert</a>
              <a class="mt-4"><i class="fas fa-link mr-2"></i>Instant Connect</a>
            </ul>
          </div>
          <div class="appStore mt-4">
            <ul class="p-0">
              <a href="https://play.google.com/store/apps/details?id=com.wadhim.estateon"><img src="{{ url('estate/images/google.png')}}" alt="icon"></a>
              <a href=""><img src="{{ url('estate/images/Appstore.png')}}" alt=""></a>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</Section>
<section class="space updates">
  <div class="container">
    <div class="head_title">
      <h3 class="corner text-center">We have the most listings and constant updates.<br>
        So you’ll never miss out.</h3>
    </div>
    <div class="row">
      <div class="col-md-4">
        <div class="media">
          <img class="mr-3" src="{{ url('estate/images/updateicon.png')}}" alt="Generic placeholder image">
          <div class="media-body">
            <h5 class="mt-0">Buy a new home </h5>
            <p class="description"> Lorem ipsum dolor sit amet,
              consectetur adipiscing elit, sed do</p>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="media">
          <img class="mr-3" src="{{ url('estate/images/updateicon1.png')}}" alt="Generic placeholder image">
          <div class="media-body">
            <h5 class="mt-0">Sell a home </h5>
            <p class="description"> Lorem ipsum dolor sit amet,
              consectetur adipiscing elit, sed do</p>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="media">
          <img class="mr-3" src="{{ url('estate/images/updateicon2.png')}}" alt="Generic placeholder image">
          <div class="media-body">
            <h5 class="mt-0">Rent a home </h5>
            <p class="description"> Lorem ipsum dolor sit amet,
              consectetur adipiscing elit, sed do</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!--  constant updates  -->
<!-- testimonials -->
<section class="space clientFeeds">
  <div class="container">
    <div class="head_title">
      <h3 class="corner text-center">Our Happy Customers</h3>
    </div>
    <div class="">
      <ul class="p-0 testimonials v_testimonials">
        

        
        @foreach($data['testimonials'] as $testimonial)
          @if($testimonial->publish == 1)
            <li class="v-inner">
              <div class="clientImage">
                <img src="{{$testimonial->image}}" alt="img">
                <p class="commas"><i class="fa fa-quote-left" aria-hidden="true"></i></p>
              </div>
              <div class="clientext">
                <p class="clientNAme">
                  {{ucfirst($testimonial->customer_name)}}
                </p>
                <p class="desgination">{{ucfirst($testimonial->customer_designation)}}</p>
                <p class="feedback">{{$testimonial->testimonial}}</p>
              </div>
            </li>
          @endif
        @endforeach

          
        
        <!-- <li class="v-inner">
          <div class="clientImage">
            <img src="{{ url('estate/images/client.png')}}" alt="img">
            <p class="commas"><i class="fa fa-quote-left" aria-hidden="true"></i></p>
          </div>
          <div class="clientext">
            <p class="clientNAme">
              Shibani
            </p>
            <p class="desgination">Builder</p>
            <p class="feedback">Lorem ipsum dolor sit amet It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker.</p>
          </div>
        </li>
        <li class="v-inner">
          <div class="clientImage">
            <img src="{{ url('estate/images/client.png')}}" alt="img">
            <p class="commas"><i class="fa fa-quote-left" aria-hidden="true"></i></p>
          </div>
          <div class="clientext">
            <p class="clientNAme">
              Shibani
            </p>
            <p class="desgination">Builder</p>
            <p class="feedback">More recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum. Ad, necessitatibus eveniet unde beatae magnam temporibus ipsum </p>
          </div>
        </li>
        <li class="v-inner">
          <div class="clientImage">
            <img src="{{ url('estate/images/client.png')}}" alt="img">
            <p class="commas"><i class="fa fa-quote-left" aria-hidden="true"></i></p>
          </div>
          <div class="clientext">
            <p class="clientNAme">
              Shibani
            </p>
            <p class="desgination">Builder</p>
            <p class="feedback">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ad, necessitatibus eveniet unde beatae magnam temporibus ipsum </p>
          </div>
        </li> -->
      </ul>
    </div>
  </div>
</section>
<!-- testimonials -->
<!-- newsletter -->
<section class="newsltter space ">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-md-6">
        <div class="newsletterText">
          <h2 class="newsheading">Become a real Estate Agent</h2>
          <p>We only work with the best companies around the globe</p>
        </div>
      </div>
      <div class="col-md-6">
        <div class="subcibeBtn">
          <button class="cm-btn register-btn">Register</button>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection
@section('scripts')
<script src="{{url('/js/mapInput.js')}}"></script>
<script src="{{url('/js/homepage.js')}}"></script>
<!-- <script async src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAPS_API_KEY') }}&libraries=places&callback=initialize"> -->

<script type="text/javascript" async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCxCC1NFlOCM9k9pI4paC8vhJytSY4t054&libraries=places&callback=initialize"></script>
</script>

<script>
  $(document).ready(function() {
    $(window).scroll(function() {
      if ($(window).scrollTop() >= 1) {
        $("header").addClass("fixed-header");
        $(".header-top").slideUp();
      } else {
        $("header").removeClass("fixed-header");
        $(" .header-top").slideDown();
      }
    });
    jQuery(".v_slide").slick({
      infinite: true,
      autoplay: true,
      dots: false,
      autoplaySpeed: 3000,
      slidesToShow: 3,
      slidesToScroll: 1,
      speed: 500,
      arrows: true,
      prevArrow: "<button type='button' class='slick-prev slide-btn'><i class='fas fa-chevron-left' aria-hidden='true'></i></button>",
      nextArrow: "<button type='button' class='slick-next slide-btn'><i class='fas fa-chevron-right' aria-hidden='true'></i></button>",
      responsive: [{
          breakpoint: 1200,
          settings: {
            slidesToShow: 3,
            slidesToScroll: 1
          }
        },
        {
          breakpoint: 1025,
          settings: {
            slidesToShow: 2,
            slidesToScroll: 1
          }
        },
        {
          breakpoint: 667,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1
          }
        },

      ]
    });
    jQuery(".v_testimonials").slick({
      infinite: false,
      autoplay: false,
      dots: true,
      autoplaySpeed: 5,
      slidesToShow: 1,
      slidesToScroll: 1,
      speed: 500,
      arrows: false,
    });

    function topFunction() {
      $("html, body").animate({
        scrollTop: $("#top").offset().top
      }, 1500);
    }
    $(".navbar-toggler").click(function() {
      $(".navbar-toggler-icon").toggleClass("toggle");
    });
    jQuery(".srch-press").click(function() {
      jQuery(".srch-icon").toggleClass("open");
      event.stopPropagation();
    });
    $(".collapse.show").each(function() {
      $(this)
        .prev(".card-header")
        .find(".fa")
        .addClass("fa-minus")
        .removeClass("fa-plus");
    });

    // Toggle plus minus icon on show hide of collapse element
    $(".collapse")
      .on("show.bs.collapse", function() {
        $(this)
          .prev(".card-header")
          .find(".fa")
          .removeClass("fa-plus")
          .addClass("fa-minus");
      })
      .on("hide.bs.collapse", function() {
        $(this)
          .prev(".card-header")
          .find(".fa")
          .removeClass("fa-minus")
          .addClass("fa-plus");
      });
    $(window).scroll(function() {
      if ($(this).scrollTop() > 100) {
        $(".scrollToTop").fadeIn();
      } else {
        $(".scrollToTop").fadeOut();
      }
    });

    //Click event to scroll to top
    $(".scrollToTop").click(function() {
      $("html, body").animate({
        scrollTop: 0
      }, 800);
      return false;
    });
    $('.likeBtn').click(function() {
      let propertyid = $(this).data('propertyid');
      let postdata = {
        _token: "{{csrf_token()}}",
        property_id: propertyid
      }
      $.ajax({
        type: 'POST',
        url: "{{route('propertylike')}}",
        data: postdata,
        success: function(response) {
          console.log(response)
          if (response.status == true) {
            window.location.reload();
          }
        }
      })
    })
    $("#homeform").submit(function(e) {
      
      let error=false;
      let addlat=$("#address-latitude").val();
      let addlng=$("#address-longitude").val();
      let ptype=$("#property_type").val();
      if(addlat==0){
        error=true
      }
      if(addlng==0){
        error=true
      }
      if(ptype==""){
        error=true
      }
      if(error==true){
        e.preventDefault();
        return false;
      }
    });
  });
</script>
@endsection