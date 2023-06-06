@extends('layouts.estate')
@section('content')
<main>
  <div class="breadcrum">
    <div class="container">
      <h1 class="breadcrumTittle">Property List</h1>
    </div>
  </div>
  <section class="prop_list_view space">
    <div class="container">
      <div class="row">
        <div class="col-lg-8">
          <div class="row">
            <div class="col-12">
              <div class="properties-ordering-wrapper">
                <div class="results-count">
                  Showing
                  <span class="first">{{$data['property']->firstItem()}}</span> – <span class="last">{{$data['property']->lastItem()}}</span>
                </div>
                <div class="properties-ordering">
                  <!--<form class="properties-ordering" method="get" action="https://www.demoapus-wp1.com/homeo/properties-list/">
                     <div class="label">Sort by:</div>
                       <select name="filter-orderby" class="orderby select2-hidden-accessible" data-placeholder="Sort by" tabindex="-1" aria-hidden="true">
                              <option value="menu_order" selected="selected">Default</option>
                              <option value="newest">Newest</option>
                              <option value="oldest">Oldest</option>
                              <option value="price-lowest">Lowest Price</option>
                              <option value="price-highest">Highest Price</option>
                              <option value="random">Random</option>
                        </select>
                      </form>-->
                </div>
              </div>
            </div>
            @foreach($data['property'] as $property)
            <div class="col-md-6 col-12">
              <div class="list_view">
                <div class="img-area">
                  <div class="imgInner">
                    @if(isset($property->images[0]))
                    <a href="{{ route('property.detail', [$property->slug] ) }}"> <img src="{{$property->images[0]['url']}}" alt="image"></a>
                    @endif
                    @auth
                    @if($property->likes_count > 0)
                    <a class="likeBtn" data-propertyid="{{$property->id}}"><i class="fas fa-heart"></i> </a>
                    @endif
                    @if($property->likes_count == 0)
                    <a class="likeBtn" data-propertyid="{{$property->id}}"><i class="far fa-heart"></i> </a>
                    @endif
                    @endauth
                  </div>
                  <div class="overlay">
                    <div class="over-text">
                      <p class="propertyArea">{{$property->property_type->type_data->name}}</p>

                      <h4 class="BuildingName">
                        <a href="{{ route('property.detail', [$property->slug] ) }}">{{$property->name}}</a>
                      </h4>
                      <div class="location">
                        <i class="fas fa-map-marker-alt mr-2"> </i> <a class="locationArea" title="{{$property->address}}">{{\Illuminate\Support\Str::limit($property->address, 35, $end='...')}}</a>
                      </div>
                    </div>

                    <div class="catFooter">
                      <p class="flatPrice">₹ <span>{{$property->property_details->price}}</span></p>
                      <a href="{{ route('property.detail', [$property->slug] ) }}" class="cm-btn">{{$property->type}}</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            @endforeach
            <div class="col-12">
              {{ $data['property']->appends($params)->links() }}
            </div>
          </div>
        </div>

        <div class="col-lg-4">
          <div class="wht_box">
            <div class="filter_prop">
              <h3>Advanced Search</h3>
              <form method="GET">
              <div class="form-group">
                <input type="location" class="form-control map-input" id="address-input" aria-describedby="" placeholder="Enter Location.." name="location" style="margin-bottom: 15px;" />
                <input type="hidden" name="address_latitude" id="address-latitude" value="0" />
                <input type="hidden" name="address_longitude" id="address-longitude" value="0" />
              </div>
              <!-- <div class="form-group">
                  <label for="roles">Property Type</label>
                  <select name="property_type" class="custom-select mb-3">
                    <option value="">Property Type</option>
                    @foreach($data['property_types'] as $property_type)
                    <option value="{{$property_type->id}}">{{$property_type->name}}</option>
                    @endforeach
                  </select>
                </div> -->
                <div class="form-group">
                  <label for="roles">Property By</label>
                  <select name="property_by" class="form-control" >
                    @foreach($data['userroles'] as $userrole)
                    <option value="{{$userrole}}">{{$userrole}}</option>
                    @endforeach
                  </select>
                </div>
                <!-- <div class="form-group">
                  <select name="furnished" class="custom-select mb-3">
                    <option value="">Furnished Status</option>
                    <option value="furnished">Furnished</option>
                    <option value="semi_furnished">Semi furnished</option>
                    <option value="unfurnished">Un-furnished</option>
                  </select>
                </div> -->
                <!-- <div class="form-group">
                  <select name="bedroom" class="custom-select mb-3">
                    <option value="">Bed Room</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                  </select>
                </div> -->
                <!-- <div class="form-group">
                  <p>Distance</p>   
                  <div class="range-slider mb-3">
                    <input class="range-slider__range" type="range" value="3" min="0" max="10" step="1">
                    <span class="range-slider__value">0km</span>
                  </div> 
                </div> -->
                <!-- <div class="form-group">
                  <label for="roles">Additional Prefrences</label>
                  <select name="additional[]" class="custom-select mb-3" multiple="multiple">
                    @foreach($data['preferences'] as $preferences)
                    <option value="{{$preferences->id}}">{{$preferences->name}}</option>
                    @endforeach

                  </select>
                </div>
                <div class="form-group">
                  <select name="vastu" class="custom-select mb-3">
                    <option value="">Vastu Architecture</option>
                    @foreach($data['vastu'] as $vastu)
                    <option value="{{$vastu->id}}">{{$vastu->name}}</option>
                    @endforeach
                  </select>
                </div>
                <div class="form-group">
                  <label for="roles">Amenities</label>
                  <select name="amenities[]" class="custom-select mb-3 form-control select2" multiple="multiple">
                    @foreach($data['amenity'] as $amenity)
                    <option value="{{$amenity->id}}">{{$amenity->name}}</option>
                    @endforeach
                  </select>
                </div> -->
                   
                <div class="form-group">
                  <p>Price</p>
                  <div class="range-slider mb-3">
                    <!-- <input class="range-slider__range" type="range" name="price" min="1000" max="2000000" step="500" id="filter_price">
                    <span class="range-slider__value" id="pricerange">1000</span> -->
                     <section class="mainsection-list">
                <div>
            <div class="d-flex mainhead">
              <p class="Bheading cpoint"><i class="fa-solid fa-indian-rupee-sign redc"></i> Budget <i class="fa-solid fa-angle-down"></i></p>
            </div>

            <div class="">
                <div class="section2 ml-80 cpoint">
                    <div class="sec2cont d-flex dnone">
                        <div class="minprice dnone minprice1">
                            <!-- <input type="number" class="imputval disnone dnone" placeholder="Enter Min Price">
                            <p class="selhed disnone dnone" style="margin-left: 50px;">Or select from <i class="fa-solid fa-hand-point-down redc"></i></p> -->
                            <select name="" id="" class="textSearch select1 dnone" >
                                <option value="Min Price">Min Price</option>
                                <option value="&#8377 2.6 Cr">&#8377 5 Lac</option>
                                <option value="&#8377 3 Cr">&#8377 10 Lac</option>
                                <option value="&#8377 3.5 Cr">&#8377 20 Lac</option>
                                <option value="&#8377 4 Cr">&#8377 30 Lac</option>
                                <option value="&#8377 4.5 Cr">&#8377 40 Lac</option>
                                <option value="&#8377 5 Cr">&#8377 50 Lac</option>
                                <option value="&#8377 10 Cr">&#8377 60 Lac</option>
                                <option value="&#8377 10 Cr">&#8377 70 Lac</option>
                                <option value="&#8377 10 Cr">&#8377 80 Lac</option>
                                <option value="&#8377 10 Cr">&#8377 90 Lac</option>
                                <option value="&#8377 10 Cr">&#8377 1 Cr</option>
                                <option value="&#8377 10 Cr">&#8377 2 Cr</option>
                                <option value="&#8377 2.6 Cr">&#8377 2.5 Cr</option>
                                <option value="&#8377 3.0 Cr">&#8377 3 Cr</option>
                                <option value="&#8377 3.5 Cr">&#8377 3.5 Cr</option>
                                <option value="&#8377 4.0 Cr">&#8377 4 Cr</option>
                                <option value="&#8377 4.5 Cr">&#8377 4.5 Cr</option>
                                <option value="&#8377 5.0 Cr">&#8377 5 Cr</option>
                                <option value="&#8377 5.0 Cr">&#8377 6 Cr</option>
                                <option value="&#8377 5.0 Cr">&#8377 7 Cr</option>
                                <option value="&#8377 5.0 Cr">&#8377 8 Cr</option>
                               
                                
                            </select>
                        </div>
                        <div class="minprice dnone minprice2">
                            <!-- <input type="number" class="imputval disnone dnone" placeholder="Enter Max Price">
                            <p class="selhed disnone dnone">Dropdown-Menu  </p> -->
                            <select name="" id="" class="textSearch select2 dnone">
                                <option value="Min Price">Max Price</option>
                                <option value="&#8377 2.6 Cr">&#8377 5 Lac</option>
                                <option value="&#8377 3 Cr">&#8377 10 Lac</option>
                                <option value="&#8377 3.5 Cr">&#8377 20 Lac</option>
                                <option value="&#8377 4 Cr">&#8377 30 Lac</option>
                                <option value="&#8377 4.5 Cr">&#8377 40 Lac</option>
                                <option value="&#8377 5 Cr">&#8377 50 Lac</option>
                                <option value="&#8377 10 Cr">&#8377 60 Lac</option>
                                <option value="&#8377 10 Cr">&#8377 70 Lac</option>
                                <option value="&#8377 10 Cr">&#8377 80 Lac</option>
                                <option value="&#8377 10 Cr">&#8377 90 Lac</option>
                                <option value="&#8377 10 Cr">&#8377 1 Cr</option>
                                <option value="&#8377 10 Cr">&#8377 2 Cr</option>
                                <option value="&#8377 2.6 Cr">&#8377 2.5 Cr</option>
                                <option value="&#8377 3.0 Cr">&#8377 3 Cr</option>
                                <option value="&#8377 3.5 Cr">&#8377 3.5 Cr</option>
                                <option value="&#8377 4.0 Cr">&#8377 4 Cr</option>
                                <option value="&#8377 4.5 Cr">&#8377 4.5 Cr</option>
                                <option value="&#8377 5.0 Cr">&#8377 5 Cr</option>
                                <option value="&#8377 5.0 Cr">&#8377 6 Cr</option>
                                <option value="&#8377 5.0 Cr">&#8377 7 Cr</option>
                                <option value="&#8377 5.0 Cr">&#8377 8 Cr</option>                                
                            </select>
                    </div>
                </div>
            </div>
        </div>
    </section>
                  </div>

                  
                </div>
                <button class="cm-btn w-100">Search</button>
              </form>
            </div>
          </div>

        
        </div>
      </div>
    </div>
  </section>
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
            <button class="cm-btn register-btn">Register Now</button>
          </div>
        </div>
      </div>
    </div>
  </section>
  @endsection
  @section('scripts')

  <script src="{{url('/js/mapInput.js')}}"></script>
  <script type="text/javascript" async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCxCC1NFlOCM9k9pI4paC8vhJytSY4t054&libraries=places&callback=initialize"></script>

  <script>

    $(document).ready(function() {
      $('#filter_price').change(function() {
        $('#pricerange').html($(this).val())
      })

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
    })
  </script>
  @endsection