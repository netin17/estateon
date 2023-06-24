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
              @if(count($data['property'])>0)
              <div class="properties-ordering-wrapper">

                <div class="results-count">
                  Showing
                  <span class="first">{{$data['property']->firstItem()}}</span> – <span class="last">{{$data['property']->lastItem()}}</span>
                </div>
                <div class="properties-ordering">
                </div>
              </div>
              @endif
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
            @if(count($data['property'])==0)
            <div class="col-12 properties-ordering-wrapper">
              No Property Found
            </div>
            @endif
          </div>
        </div>

        <div class="col-lg-4">
          <div class="wht_box">
            <div class="filter_prop">
              <h3>Advanced Search</h3>
              <form method="GET">
              <div class="form-group">
  <select class="form-control mb-2" id="propertytype" name="type">
    <option value="rent" {{ request('type') == 'rent' ? 'selected' : '' }}>Rent</option>
    <option value="sale" {{ request('type') == 'sale' ? 'selected' : '' }}>Sale</option>
  </select>
</div>
                <div class="form-group">
                  <input type="location" class="form-control map-input" id="address-input" aria-describedby="" placeholder="Enter Location.." name="location" style="margin-bottom: 15px;" value="{{request()->location ?? request()->location }}" />
                  <input type="hidden" name="address_latitude" id="address-latitude" value="{{request()->address_latitude ? request()->address_latitude : 0 }}" />
                  <input type="hidden" name="address_longitude" id="address-longitude" value="{{request()->address_longitude ? request()->address_longitude : 0 }}" />
                </div>
                <div class="form-group">
                  <p class="heading cpoint"><i class="fa-solid fa-house redc"></i> Property Type <i class="fa-solid fa-angle-down"></i> </p>
                </div>
                <div class="section1">
                  <div class="innersec dnone cpoint">
                    <div class="d-flex justify-content-between align-items-center">
                      <p class="heading1 cpoint mb-0">Residential <i class="fa-solid fa-angle-down redc santo"></i></p>
                      <button type="button" class="close heading" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="innersec1 ">
                      <ul class="subproperty d-flex ">
                        @foreach($data['property_type'] as $property_type)
                        @if($property_type->property_type == "residential")
                        <li>
                          <label class="checkbox-label">
                            <input type="checkbox" name="residential[]" value="{{$property_type->id}}" {{ (in_array($property_type->id, request('residential', [])) ? 'checked' : '') }}>
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
                            <input type="checkbox" name="commercial[]" value="{{$property_type->id}}" {{ (in_array($property_type->id, request('commercial', [])) ? 'checked' : '') }}> {{$property_type->name}}
                          </label>
                        </li>
                        @endif
                        @endforeach
                      </ul>

                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <p class="Bheading cpoint"><i class="fa-solid fa-indian-rupee-sign redc"></i> Budget <i class="fa-solid fa-angle-down"></i></p>
                </div>
                <div class="cpoint">
                    <div class="d-flex dnone">
                        
                        @switch(request()->has('type'))
                        @case('rent')
                        <div class="minprice dnone">
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
                      <div class="minprice dnone">
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
                        @case('sale')
                        <div class="minprice dnone">
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
                    <div class="minprice dnone">
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
<div>
  <button class="cm-btn w-100">Search</button>
</div>
                
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
  <script src="{{url('/js/homepage.js')}}"></script>
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