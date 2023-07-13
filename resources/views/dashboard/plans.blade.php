@extends('layouts.estate')
@section('content')

<section class="hero-section position-relative">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-8 ">
                <div class="banner-content">
                    <h1 class="banner-title dark-font wow fadeInLeft">Become A Real Estate Professional</h1>
                    <p class="banner-text dark-font wow fadeInLeft" data-wow-delay="0.4s">There are many
                        variations of passages of Lorem
                        Ipsum available, but the majority have suffered
                        alteration in some form.</p>
                </div>
                <div class="banner-bottom-content ps-xl-5 ps-md-4">
                    <p class="dark-font">You must hire us for all real estate problems.</p>
                    <span class="d-block">-Estate On</span>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="work-section pb-md-5 pb-4">
    <div class="container">
        <h3 class="text-center section-title"><span class="d-inline-block pb-2 position-relative bottom-border-title">How it
                Works.</span></h3>
        <div class="row mt-4 pt-2">
            <div class="col-md-4 mb-md-0 mb-3">
                <div class="work-col-wrap px-xl-2">
                    <div class="work-item transition">
                        <div class="work-item-icon">
                            <img src="{{ url('estate/images/list-home.svg')}}" alt="list-home" class="w-100 d-block mx-auto">
                        </div>
                        <div class="work-item-content text-center">
                            <h5 class="mb-xl-3 mb-1 work-item-content-title">List Home</h5>
                            <p>Our properties are located at prime areas where by there won’t be problem with
                                transportation</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-md-0 mb-3">
                <div class="work-col-wrap px-xl-2">
                    <div class="work-item transition">
                        <div class="work-item-icon">
                            <img src="{{ url('estate/images/make-payment.svg')}}" alt="list-home" class="w-100 d-block mx-auto">
                        </div>
                        <div class="work-item-content text-center">
                            <h5 class="mb-xl-3 mb-1 work-item-content-title">Make Payment</h5>
                            <p>Our estates comes with good network,portable water , 24hrs light and round the
                                clock
                                security.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-md-0 mb-3">
                <div class="work-col-wrap px-xl-2">
                    <div class="work-item transition">
                        <div class="work-item-icon">
                            <img src="{{ url('estate/images/make-it-official.svg')}}" alt="list-home" class="w-100 d-block mx-auto">
                        </div>
                        <div class="work-item-content text-center">
                            <h5 class="mb-3mb-xl-3 mb-1 work-item-content-title">Make it Official</h5>
                            <p>We have been in business for over 32 years,for client outside the country you can
                                trust us to deliver well.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="planning-section py-lg-5 py-4 position-relative">
    <div class="large-container container">
        <h3 class="text-center section-title">Plan For Owners</h3>
        <p class="text-center col-lg-6 col-md-10 mx-auto">Lorem Ipsum is simply dummy text of the printing and
            typesetting
            industry.
            Lorem
            Ipsum has been the industry's standard</p>
        <div class="row mt-4 pt-1 justify-content-center">
            @foreach($data['plans'] as $index=>$plan)
            @if($plan->name=='Owner')
            @if(!empty($plan->subscriptonPlans))
            @foreach($plan->subscriptonPlans as $subIndex=>$sub_plan)
            <div class="col-lg-3 col-md-6 mb-lg-0 mb-4">
                <div class="plan-card transition">
                    <div class="plan-card-head text-center">
                        <h5 class="plan-card-title red-font mb-md-2 mb-1">{{$sub_plan->title}}</h5>
                        <p class="plan-card-text px-xl-3">{{$sub_plan->description}}</p>
                        <div class="mt-md-4 mt-3 mb-md-3 mb-2">
                            <h6 class="plan-property-title mb-1">{{$sub_plan->name}}</h6>
                            <p>{{$sub_plan->price==0 ? '1 Week' : $sub_plan->time_in_monthes . 'Months'}}</p>
                        </div>
                        <button type="button" class="get-started-btn btn btn-primary buy_now" data-index="{{$index}}-{{$subIndex}}">Get Started</button>
                    </div>
                    {!! $sub_plan->features !!}
                </div>
            </div>
            @endforeach
            @endif
            @endif
            @endforeach
        </div>
    </div>
</section>
<section class="pt-lg-3 pb-3">
    <div class="container">
        <a href="#contact_us" class="d-block customize-btn mx-auto text-center">Contact us to customize your
            plan</a>
    </div>
</section>
<section class="pb-5 mb-xl-3 video-section">
    <div class="container">
        <div class="row">
            <div class="col-md-6 pe-xl-5 mb-md-0 mb-4">
                <div class="video-content">
                    <span class="d-block mb-lg-3" style="color: #323232;">View your deram home</span>
                    <h3 class="section-title section-sm-title mb-md-4 mb-3">Explore Your Future Home With
                        Detailed
                        Videos</h3>
                    <p>There are many variations of passages of Lorem Ipsum available, but the majority have
                        suffered alteration in some form, by injected humour, or randomised words which don't
                        look even slightly believable.</p>
                    <ul class="video-content-list pt-xl-4 pt-3 mt-xl-1 ps-4 mb-lg-5 mb-4">
                        <li>Property detail view</li>
                        <li>Standard quality video</li>
                        <li>Everything in a nutshell</li>
                    </ul>
                    <a href="https://www.youtube.com/" class="d-flex transition align-items-center youtube-video-btn" target="_blank">
                        <img src="{{ url('estate/images/red-video-icon.svg')}}" alt="red-video-icon">
                        Watch Videos
                    </a>
                </div>
            </div>
            <div class="col-md-6">
                <div class="video-wrap position-relative">
                    <iframe width="420" height="315" src="https://www.youtube.com/embed/tgbNymZ7vqY">
                    </iframe>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="planning-section planning-agents-section py-lg-5 py-4 position-relative">
    <div class="large-container container">
        <h3 class="text-center section-title sky-font">Plan For Agents</h3>
        <p class="text-center col-lg-6 col-md-10 mx-auto">Lorem Ipsum is simply dummy text of the printing and
            typesetting
            industry.
            Lorem
            Ipsum has been the industry's standard</p>
        <div class="row mt-4 pt-1 justify-content-center">
            @foreach($data['plans'] as $index=>$plan)
            @if($plan->name=='Agent')
            @if(!empty($plan->subscriptonPlans))
            @foreach($plan->subscriptonPlans as $subIndex=>$sub_plan)
            <div class="col-lg-3 col-md-6 mb-lg-0 mb-4">
                <div class="plan-card transition">
                    <div class="plan-card-head text-center">
                        <h5 class="plan-card-title red-font mb-md-2 mb-1 sky-font">{{$sub_plan->title}}</h5>
                        <p class="plan-card-text px-xl-3">{!!$sub_plan->description!!}</p>
                        <div class="mt-md-4 mt-3 mb-md-3 mb-2">
                            <h6 class="plan-property-title mb-1">{{$sub_plan->name}}</h6>
                            <p>{{$sub_plan->price==0 ? '1 Week' : $sub_plan->time_in_monthes . 'Months'}}</p>
                        </div>
                        <button type="button" class="get-started-btn btn btn-primary buy_now" data-index="{{$index}}-{{$subIndex}}">Get Started</button>
                    </div>
                    {!! $sub_plan->features !!}
                </div>
            </div>
            @endforeach
            @endif
            @endif
            @endforeach
        </div>
    </div>
</section>
<section class="supports-section py-lg-5 py-4">
    <div class="large-container container">
        <div class="row">
            <div class="col-md-5 pe-xl-5">
                <h3 class="section-title mb-4">EstateOn Supports The Investors </h3>
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has
                    been the industry's standard dummy text ever since the 1500s, when an unknown printer took a
                    galley of type and scrambled it to make a type specimen book. It has survived not only five
                    centuries, but also the leap into electronic</p>
            </div>
            <div class="col-md-7 ps-lg-5 ps-md-4">
                <div class="row px-1 plant-main-row">
                    <div class="col-6 pt-4 pb-3 plant-col position-relative plant-row">
                        <div class="plant-icon" style="background-color: #FFE7E7;">
                            <img src="{{ url('estate/images/plant-1.svg')}}" alt="plant">
                        </div>
                        <p class="dark-font pt-3">Personal AssistancePersonal Assistance</p>
                    </div>
                    <div class="col-6 pt-4 pb-3 plant-col">
                        <div class="plant-icon" style="background-color: #E8FFE7;">
                            <img src="{{ url('estate/images/plant-2.svg')}}" alt="plant">
                        </div>
                        <p class="dark-font pt-3">Social media engagement & Get relevant leads</p>
                    </div>
                    <div class="col-6 pt-4 pb-3 plant-col">
                        <div class="plant-icon" style="background-color: #E7E9FF;">
                            <img src="{{ url('estate/images/plant-3.svg')}}" alt="plant">
                        </div>
                        <p class="dark-font pt-3">Graphic Conten tGraphic Content</p>
                    </div>
                    <div class="col-6 pt-4 pb-3 plant-col">
                        <div class="plant-icon" style="background-color: #FDFBC9;">
                            <img src="{{ url('estate/images/plant-4.svg')}}" alt="plant">
                        </div>
                        <p class="dark-font pt-3">EstateOn supports the investors the investors the investors
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="py-lg-5 py-4" id="contact_us">
    <div class="container">
        <h3 class="text-center section-title">Contact</h3>
        <p class="text-center col-lg-5 col-md-10 mx-auto">We love questions, feedbacks and we are always happy
            to help. Here is one way to contact us.</p>
        <div class="main-contact-row mt-5">
            <div class="row m-0">
                <div class="col-md-4 contact-left-col">
                    <div class="contact-us-content">
                        <h4>Contact Information</h4>
                        <p>Fill up the form and our Team will get back to you within 24 hours.</p>
                        <ul class="contact-us-link mt-5">
                            <li class="d-flex align-items-center">
                                <span class="d-flex me-2"><img src="{{ url('estate/images/gmail.svg')}}" alt=""></span>
                                <span class="d-flex">info@estateom.com</span>
                            </li>
                            <li class="d-flex align-items-center">
                                <span class="d-flex me-2"><img src="{{ url('estate/images/location.svg')}}" alt=""></span>
                                <span class="d-flex">Indore, Madhya Pradesh, India</span>
                            </li>
                            <li class="d-flex align-items-center">
                                <span class="d-flex me-2"><img src="{{ url('estate/images/light-fb.svg')}}" alt=""></span>
                                <span class="d-flex">+91 99262 66888</span>
                            </li>
                        </ul>
                        <ul class="d-flex contact-us-social-links">
                            <li><img src="{{ url('estate/images/light-instagram.svg')}}" alt=""></li>
                            <li><img src="{{ url('estate/images/light-in.svg')}}" alt=""></li>
                            <li><img src="{{ url('estate/images/light-fb.svg')}}" alt=""></li>
                            <li><img src="{{ url('estate/images/light-twitter.svg')}}" alt=""></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-8 contact-right-col">
                    <form action="">
                        <div class="form-group-row d-flex flex-wrap">
                            <div class="form-group-col">
                                <label for="fname">First Name*</label>
                                <input type="text" id="fname" class="form-group-file" required />
                            </div>
                            <div class="form-group-col">
                                <label for="plan">Select A Plan</label>
                                <select name="" id="plan" class="form-group-file" required>
                                    <option value="Owner1M">Owner 1M</option>
                                    <option value="one">one</option>
                                    <option value="two">two</option>
                                </select>
                            </div>
                            <div class="form-group-col">
                                <label for="email">Email</label>
                                <input type="email" id="email" class="form-group-file" required />
                            </div>
                            <div class="form-group-col">
                                <label for="phone_no">Mobile Number*</label>
                                <input type="number" id="phone_no" class="form-group-file" required />
                            </div>
                        </div>
                        <div class="form-group-row d-flex flex-wrap">
                            <div class="form-group-col w-100">
                                <label for="phone_no">Write Message*</label>
                                <textarea name="" id="" cols="30" rows="1" class="form-group-file" required></textarea>
                                <textarea name="" id="" cols="30" rows="1" class="form-group-file"></textarea>
                            </div>
                        </div>
                        <div class="contact-bottom d-flex align-items-center justify-content-end">
                            <div class="d-flex align-items-center">
                                <input type="checkbox">
                                <label class="d-block">I’m not a Robot</label>
                                <img src="{{ url('estate/images/istockphoto.png')}}" alt="istockphoto">
                            </div>
                            <button type="submit" class="contact-sub-btn btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="py-5">
    <div class="container">
        <h3 class="text-center section-title"><span class="d-inline-block pb-2 position-relative bottom-border-title">Frequently Asked
                Questions</span></h3>
        <div class="accordion site-accordion mt-5" id="accordionExample">
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingOne">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        Q.1. Why is Webflow the best nocode tool?
                    </button>
                </h2>
                <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        Quisque rutrum. Aenean imperdi. Etiam ultricies nisi vel augue. Curabitur ullamcorper
                        ultricies nisi. Nam eget dui. Etiam rhoncus. Maecenas tempus, tellus eget.
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingTwo">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        Q.2. Can I choose my meals?
                    </button>
                </h2>
                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        Quisque rutrum. Aenean imperdi. Etiam ultricies nisi vel augue. Curabitur ullamcorper
                        ultricies nisi. Nam eget dui. Etiam rhoncus. Maecenas tempus, tellus eget.
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingThree">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                        Q.3. Can I choose my meals?
                    </button>
                </h2>
                <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        Quisque rutrum. Aenean imperdi. Etiam ultricies nisi vel augue. Curabitur ullamcorper
                        ultricies nisi. Nam eget dui. Etiam rhoncus. Maecenas tempus, tellus eget.
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingThree">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse4" aria-expanded="false" aria-controls="collapse4">
                        Q.4. Can I choose my meals?
                    </button>
                </h2>
                <div id="collapse4" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        Quisque rutrum. Aenean imperdi. Etiam ultricies nisi vel augue. Curabitur ullamcorper
                        ultricies nisi. Nam eget dui. Etiam rhoncus. Maecenas tempus, tellus eget.
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingThree">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse5" aria-expanded="false" aria-controls="collapse5">
                        Q.5. Can I choose my meals?
                    </button>
                </h2>
                <div id="collapse5" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        Quisque rutrum. Aenean imperdi. Etiam ultricies nisi vel augue. Curabitur ullamcorper
                        ultricies nisi. Nam eget dui. Etiam rhoncus. Maecenas tempus, tellus eget.
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingThree">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse6" aria-expanded="false" aria-controls="collapse6">
                        Q.6. Can I choose my meals?
                    </button>
                </h2>
                <div id="collapse6" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        Quisque rutrum. Aenean imperdi. Etiam ultricies nisi vel augue. Curabitur ullamcorper
                        ultricies nisi. Nam eget dui. Etiam rhoncus. Maecenas tempus, tellus eget.
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="loader" class="loader">
  <div class="loader-inner"></div>
</div>
</section>

@endsection
@section('scripts')
<script src="{{ url('estate/js/wow.min.js')}}"></script>
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script>
        jQuery(document).ready(function () {
            var csrfToken = $('meta[name="csrf-token"]').attr('content');
            jQuery('.open-menu').click(function () {
                jQuery('.header-wrap').slideToggle();
                jQuery('.open-menu').toggleClass('close-menu');
                jQuery("body").toggleClass("body-overflow");
            });

            wow = new WOW({
                boxClass: 'wow',      // default
                animateClass: 'animated', // default
                offset: 0,          // default
                mobile: true,       // default
                live: true        // default
            })
            new WOW().init();



function savepayment(data){
    $.ajax({
          url: "{{ route('frontuser.userSubscription.save') }}",
          type: "POST",
          data: {
            planId: data.planId,
            propertyId: data.propertyId,
            txnid: data.txnid
          },
          headers: {
            'X-CSRF-TOKEN': csrfToken // Include the CSRF token in the request headers
          },
          success: function(response) {
            // Handle success response
           console.log(response)
            // Hide loader
            $('#loader').hide();
            window.location.href = "{{ route('frontuser.property.index') }}";
          },
          error: function(xhr, status, error) {
            // Handle error response
            console.error(xhr.responseText);
            // Hide loader
            $('#loader').hide();
          }
        });
}


            var plansData = @json($data['plans']);
    $('body').on('click', '.buy_now', function(e) {
        var indexes = $(this).data("index");
        var index = indexes.split("-");
        var planId = plansData[index[0]].subscripton_plans[index[1]].id;
        var price = plansData[index[0]].subscripton_plans[index[1]].price;
        var propertyId = "{{$data['property']->id}}";
        console.log(planId, price, propertyId);
   if(price==0){
    $('#loader').show();
      var data={
        planId: planId,
            propertyId: propertyId,
            txnid: null
      }
      savepayment(data)
   }else{
    var options = {
"key": "{{ env('RAZOR_KEY') }}",
"amount": (price*100), // 2000 paise = INR 20
"name": "EstateOn",
"description": "Payment",
"image": "{{ url('estate/images/logo.png')}}",
"handler": function (response){
    var data={
            planId: planId,
            propertyId: propertyId,
            txnid: response.razorpay_payment_id
      }
      savepayment(data)
// $.ajax({
// url: SITEURL + 'paysuccess',
// type: 'post',
// dataType: 'json',
// data: {
// razorpay_payment_id: response.razorpay_payment_id , 
// totalAmount : totalAmount ,product_id : product_id,
// }, 
// success: function (msg) {
// window.location.href = SITEURL + 'razor-thank-you';
// }
// });
},
"prefill": {
"contact": "{{$data['user']->phone}}",
"email":   "{{$data['user']->email}}",
},
"theme": {
"color": "#f05e59"
}
};
var rzp1 = new Razorpay(options);
rzp1.open();
e.preventDefault();
   }
  
    });

           

        });


    </script>
    @endsection