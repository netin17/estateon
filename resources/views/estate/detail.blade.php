@extends('layouts.estate')
@section('content')
@if(isset($data['property']['images']) && count($data['property']['images'])> 0)
<div class="s_outer">
    <div class="propty_silde">
    @foreach($data['property']['images'] as $image)
        <div class="full_img">
            <a>
                <div class="image-wraper"><img src="{{$image->url}}" /></div>
            </a>
        </div>
        @endforeach
    </div>
</div>
@endif
<section class="pprty_detail space">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="property-information d-md-flex align-items-center">
                    <div class="left-infor">
                        <div class="title-wrapper">
                            <h2 class="property-title">{{$data['property']->name ?? ''}}</h2>
                            @if($data['property']->featured==1)
                            <span class="featured-property">Featured</span>
                            @endif
                            @if($data['property']->hot==1)
                            <span class="featured-property">Hot</span>
                            @endif
                          
                        </div>
                        <div class="property-location">
                            <a>{{$data['property']->address}}</a>
                        </div>
                    </div>
                    <div class="property-action-detail ali-right">
                        <div class="property-price">
                            <span class="suffix">&#8377;</span>
                            <span class="price-text">{{number_form($data['property']['property_details']->price)}}</span>
                        </div>
                        <button class="btn-add-property-favorite fvrt-btn" data-original-title="Add Favorite">
                            <i class="far fa-heart"></i></button>

                             {{-- Share button --}}
                             {{-- <button id="shareButton" class="cm-btn" style="margin:2px 2px">Share</button> --}}



    <div class="social-sharing">
    <!-- Facebook -->
    <a href="https://www.facebook.com/sharer/sharer.php?u={{ url()->current() }}" target="_blank" rel="noopener">
        <i class="fa fa-facebook" aria-hidden="true"></i>
    </a>
    <!-- Twitter -->
    <a href="https://twitter.com/intent/tweet?url={{ url()->current() }}&text={{ urlencode($data['property']['slug']) }}" target="_blank" rel="noopener">
        <i class="fa fa-twitter" aria-hidden="true"></i>
    </a>
    <!-- LinkedIn -->
    <a href="https://www.linkedin.com/sharing/share-offsite/?url={{ url()->current() }}" target="_blank" rel="noopener">
        <i class="fa fa-linkedin" aria-hidden="true"></i>
    </a>
</div>
    <!-- Toast message container -->
    {{-- <div id="toastContainer"></div> --}}
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-8">
                        <div class="wht_box">
                            <h3>Overview</h3>
                            <p class="mb-3">
                        {!! $data['property']->description !!}
                            </p>
                            <p class="mb-3">
                            {{$data['property']->notes}}
                            </p>
                            </div>

                        <div class="wht_box mt-4">
                            <h3>Details</h3>
                            <div class="property-list">
                                <ul class="list">
                                    <li>
                                        <div class="text">Property ID:</div>
                                        <div class="value">PR{{$data['property']['property_details']->property_id}}</div>
                                    </li>
                                    @if($data['property']['property_details']->size > 1)
                                    <li>
                                        <div class="text">Lot Area:</div>
                                        <div class="value">{{$data['property']['property_details']->size}}</div>
                                    </li>
                                    @endif
                                    @if($data['property']['property_details']->size > 1)
                                    <li>
                                        <div class="text">Plot dimensions:</div>
                                        <div class="value">{{$data['property']['property_details']->length}}x{{$data['property']['property_details']->width}}</div>
                                    </li>
                                    @endif
                                    @if($data['property']['property_details']->bedroom > 0)
                                    <li>
                                        <div class="text">Beds:</div>
                                        <div class="value">{{$data['property']['property_details']->bedroom}}</div>
                                    </li>
                                    @endif
                                    @if($data['property']['property_details']->bathroom > 0)
                                    <li>
                                        <div class="text">Baths:</div>
                                        <div class="value">{{$data['property']['property_details']->bathroom}}</div>
                                    </li>
                                    @endif
                                    @if($data['property']['property_details']->price > 0)
                                    <li>
                                        <div class="text">Price:</div>
                                        <div class="value"><span class="suffix">₹</span> <span class="price-text">{{number_form($data['property']['property_details']->price)}}</span></div>
                                    </li>
                                    @endif
                                    <li>
                                        <div class="text">Property Status:</div>
                                        <div class="value"><a class="status-property-label">{{$data['property']['type']=='sale'? 'For Sale':'For Rent'}}</a></div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        @if(isset($data['property']['amenities']) && count($data['property']['amenities'])> 0)
                        <div class="wht_box mt-4">
                            <h3>Amenities</h3>
                            <div class="property-amenities">
                                <ul class="columns-gap list-check">
                                    @foreach($data['property']['amenities'] as $amenity)
                                    <li class="yes">{{$amenity->amenity_data->name ?? ''}}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        @endif
                        @if($data['property']->lat != "" && $data['property']->lng != "")
                        <div class="wht_box mt-4">
                            <div class="in_box title">
                                <h3>locations</h3>
                                <p><span class="location-icon"><img src="{{url('estate/images/location_blk.png')}}" alt="location-icon" /></span>{{$data['property']->address}}</p>
                            </div>
                            <div class="proprty-map-area">
                                <iframe src="https://maps.google.com/maps?q={{$data['property']->lat}},{{$data['property']->lng}}&hl=es&z=14&amp;output=embed" width="100%" height="315" allowfullscreen="" loading="lazy"></iframe>
                            </div>
                        </div>
                        @endif
                    </div>

                <div class="col-md-4">
                        <div class="wht_box">
                            <div class="contact_for_prp">
                            @if(count($errors) > 0 )
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <ul class="p-0 m-0" style="list-style: none;">
                                @foreach($errors->all() as $error)
                                <li>{{$error}}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                        @if(session('message'))
                        <div class="alert alert-success">
                            {{ session('message') }}
                        </div>
                        @endif
                                <h3>Contact Agent</h3>
                                <form action="{{route('frontuser.lead.create')}}" method="POST" id="contact_form">
                                @csrf
                                    <div class="form-group">
                                        <input type="name" name="name" id="name" class="form-control" placeholder="Name" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="email" name="email" id="email" class="form-control" placeholder="Email Address" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="phone" name="phone" id="phone" class="form-control" placeholder="Phone Number" required>
                                    </div>
                                     <script type="text/javascript">
                                        function CheckColors(val){
                                         var element=document.getElementById('message');
                                         if(val==''|| val=='others')
                                           element.style.display='block';
                                         else  
                                           element.style.display='none';
                                        }
                                    </script> 
                                    <div class="form-group mb-4">
                                        <select name="message" class="form-control" onchange='CheckColors(this.value);' >
                                            <option value="">Select your Message</option>
                                            <option value="Is this available">Is this available</option>
                                            <option value="I am Interested">I am Interested</option>
                                            <option value="Can we schedule a call">Can we schedule a call</option>
                                            <option value="Can we Visit this">Can we Visit this</option>
                                            <option value="Rates negotiables">Rates negotiables</option>
                                            <option value="others">Others</option>
                                        </select>
                                    </div>
                                    <div class="form-group mb-4">
                                        <textarea class="form-control" rows="4" id="message" placeholder="Message" name="othermessage" style='display:none;'></textarea>
                                    </div>
                                   
                                    <input type="hidden" name="property_id" value="{{$data['property']->id}}"> 
                                    <button class="cm-btn w-100" id="contact-agent-button">send message</button>
                                    <p class="message hide" style="margin-top: 10px"></p>
                                </form>
                            </div>
                        </div>
                    </div> 
                </div>
            </div>
        </div>
</section>
@endsection
@section('scripts')
<script>


    var site_url = "{{url('/')}}";

    //hang on event of form with id=myform
    $("#contact_form").submit(function (e) {
  // Prevent default form submission
  e.preventDefault();
  var isValid = true;
  console.log(checkUserLoggedIn())
  if (checkUserLoggedIn()) {
        // User is logged in, proceed with form submission
        // Check form validity flag
  

  // Loop through each input, textarea, and select element within the form
  console.log($(this).find('input, textarea, select'))
  $(this).find('input, textarea, select').each(function () {
    var name = $(this).attr('name');
    var value = $(this).val();

    // Reset field error class
    $(this).removeClass('field-error');

    // Perform specific validations based on field names
    if (name === 'message' && (value === 'others' || value === '')) {
      // Check if the "message" field is empty or has the value "others"
      if ($('#message').val().trim() === '') {
        isValid = false;
        $(this).addClass('field-error');
        $('#message').addClass('field-error');
      }
    } else if (name !== 'othermessage' && (value === '' || value === null)) {
      // Check if any other field (except "othermessage") is empty or null
      isValid = false;
      $(this).addClass('field-error');
    } else {
      if (name === 'othermessage' && ($('select[name="message"]').val() === 'others' || $('select[name="message"]').val() === '') && (value === '' || value === null)) {
        // Check if "othermessage" is empty when the "message" select has the value "others" or is empty
        isValid = false;
      }
    }
  });

  // Show appropriate message and prevent form submission if validation fails
  $(this).find('.message').removeClass('text-success').removeClass('text-danger').addClass('hide').html('');
 

  // If form validation is successful, submit the form
  // Note: The actual form submission is not present in the provided code. You may need to add it here.
  if (!isValid) {
    $(this).find('.message').removeClass('hide').addClass('text-danger').html('Please enter all fields');
    return false;
  }else{
    this.submit();
  }
    }else{
        window.location.href = "/signin";
    }
  
});
function checkUserLoggedIn() {
      // Use the Auth::check() method to check if the user is logged in
      return {{ auth()->guard('frontuser')->check() ? 'true' : 'false' }};
    }


  $(document).ready(function() {
jQuery(".propty_silde").slick({
  infinite: true,
  autoplay: true,
  dots: false,
  autoplaySpeed: 3000,
  slidesToShow: 1,
  slidesToScroll: 1,
  speed: 500,
  arrows: true,
  prevArrow:
    "<button type='button' class='slick-prev slide-btn'><i class='fas fa-chevron-left' aria-hidden='true'></i></button>",
  nextArrow:
    "<button type='button' class='slick-next slide-btn'><i class='fas fa-chevron-right' aria-hidden='true'></i></button>",
});

//Share button functionality
// document.getElementById('shareButton').addEventListener('click', function() {
//             // Create a new textarea element to hold the URL
//             var textarea = document.createElement('textarea');
//             textarea.value = window.location.href;

//             // Append the textarea to the DOM
//             document.body.appendChild(textarea);

//             // Copy the URL from the textarea
//             textarea.select();
//             document.execCommand('copy');

//             // Remove the textarea from the DOM
//             document.body.removeChild(textarea);

//             // Show the toast message
//             var toastContainer = document.getElementById('toastContainer');
//             var toastMessage = document.createElement('div');
//             toastMessage.className = 'share-toast';
//             toastMessage.innerText = 'Link copied!';
//             toastContainer.appendChild(toastMessage);

//             // Automatically remove the toast after a few seconds
//             setTimeout(function() {
//                 toastContainer.removeChild(toastMessage);
//             }, 3000);
//         });

        //!! share button functionality //
//record user visit to page//
if (checkUserLoggedIn()) {
    var propertyId = "{{$data['property']->id}}";
    console.log("propertyId", propertyId)
    $.ajax({
            url: '/frontuser/property/' + propertyId + '/visit',
            type: 'POST',
            headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
            success: function (response) {
                console.log(response.message);
            },
            error: function (error) {
                console.error(error.responseJSON.error);
            }
        });
}





  })
</script>
@endsection