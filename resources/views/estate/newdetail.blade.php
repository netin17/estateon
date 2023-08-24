@extends('layouts.estate')
@section('content')
<link rel="stylesheet" href="{{ url('estate/css/swiper-bundle.min.css')}}"/>
<link rel="stylesheet" href="{{ url('estate/css/bootstrap-icons.css')}}">
<link rel="stylesheet" href="{{ url('estate/css/newcss/jquery.fancybox.min.css')}}" />
<div class="details_main_banner">
@if(isset($data['property']['images']) && count($data['property']['images'])> 0)
	<div class="details">
		<div class="wrapper">
			<div class="swiper-slide"><img src="{{$data['property']['images'][0]['url']}}" alt=""></div>
		</div>
		<!-- <div class="swiper-button-next"></div>
		<div class="swiper-button-prev"></div> -->
	</div>
	@endif
	<div class="details_main_box">
		<div class="container">
			<div class="row">
				<div class="col-12 col-md-6">
					<button class="btn btn-danger virtual-tour">
						<svg width="26" height="26" viewBox="0 0 26 26" fill="none" xmlns="http://www.w3.org/2000/svg">
						  <path d="M17.7233 15.1667C17.81 14.4517 17.875 13.7367 17.875 13.0001C17.875 12.2634 17.81 11.5484 17.7233 10.8334H21.385C21.5583 11.5267 21.6666 12.2526 21.6666 13.0001C21.6666 13.7476 21.5583 14.4734 21.385 15.1667M15.8058 21.1901C16.4558 19.9876 16.9541 18.6876 17.3008 17.3334H20.4966C19.4471 19.1407 17.7819 20.5097 15.8058 21.1901ZM15.535 15.1667H10.465C10.3566 14.4517 10.2916 13.7367 10.2916 13.0001C10.2916 12.2634 10.3566 11.5376 10.465 10.8334H15.535C15.6325 11.5376 15.7083 12.2634 15.7083 13.0001C15.7083 13.7367 15.6325 14.4517 15.535 15.1667ZM13 21.6234C12.1008 20.3234 11.375 18.8826 10.9308 17.3334H15.0691C14.625 18.8826 13.8991 20.3234 13 21.6234ZM8.66663 8.66675H5.50329C6.54205 6.85456 8.20599 5.48336 10.1833 4.81008C9.53329 6.01258 9.04579 7.31258 8.66663 8.66675ZM5.50329 17.3334H8.66663C9.04579 18.6876 9.53329 19.9876 10.1833 21.1901C8.21013 20.5094 6.54854 19.1401 5.50329 17.3334ZM4.61496 15.1667C4.44163 14.4734 4.33329 13.7476 4.33329 13.0001C4.33329 12.2526 4.44163 11.5267 4.61496 10.8334H8.27663C8.18996 11.5484 8.12496 12.2634 8.12496 13.0001C8.12496 13.7367 8.18996 14.4517 8.27663 15.1667M13 4.36591C13.8991 5.66591 14.625 7.11758 15.0691 8.66675H10.9308C11.375 7.11758 12.1008 5.66591 13 4.36591ZM20.4966 8.66675H17.3008C16.9617 7.32499 16.4597 6.0298 15.8058 4.81008C17.7991 5.49258 19.4566 6.86841 20.4966 8.66675ZM13 2.16675C7.00913 2.16675 2.16663 7.04175 2.16663 13.0001C2.16663 15.8733 3.30799 18.6288 5.33964 20.6604C6.3456 21.6664 7.53986 22.4643 8.85422 23.0088C10.1686 23.5532 11.5773 23.8334 13 23.8334C15.8731 23.8334 18.6286 22.692 20.6603 20.6604C22.6919 18.6288 23.8333 15.8733 23.8333 13.0001C23.8333 11.5774 23.5531 10.1687 23.0087 8.85434C22.4642 7.53998 21.6663 6.34573 20.6603 5.33976C19.6543 4.33379 18.4601 3.53581 17.1457 2.99139C15.8313 2.44696 14.4226 2.16675 13 2.16675Z" fill="white"/>
						</svg>
						Virtual Tour
					</button>
					<button class="btn btn-danger get-direction">
						<svg width="26" height="26" viewBox="0 0 26 26" fill="none" xmlns="http://www.w3.org/2000/svg">
						  <g clip-path="url(#clip0_1_164)">
							<path d="M25.9417 1.11468C26.0008 0.967025 26.0153 0.805272 25.9834 0.649473C25.9514 0.493674 25.8744 0.350681 25.7619 0.23822C25.6495 0.12576 25.5065 0.0487777 25.3507 0.0168181C25.1949 -0.0151415 25.0331 -0.000673324 24.8855 0.058429L1.24662 9.5143H1.24499L0.510492 9.8068C0.371376 9.8623 0.250306 9.95516 0.160655 10.0751C0.0710037 10.1951 0.016261 10.3375 0.00247367 10.4867C-0.0113137 10.6358 0.0163908 10.7859 0.0825269 10.9203C0.148663 11.0546 0.250657 11.1681 0.377242 11.2482L1.04349 11.6707L1.04512 11.6739L9.16199 16.8382L14.3262 24.9551L14.3295 24.9583L14.752 25.6246C14.8323 25.7507 14.9459 25.8521 15.0801 25.9179C15.2144 25.9836 15.3642 26.011 15.5131 25.997C15.6619 25.9831 15.804 25.9283 15.9238 25.8388C16.0435 25.7493 16.1362 25.6285 16.1917 25.4897L25.9417 1.11468ZM22.9631 4.18593L10.7854 16.3637L10.436 15.8144C10.372 15.7136 10.2865 15.6282 10.1857 15.5642L9.63649 15.2148L21.8142 3.03705L23.7285 2.27168L22.9647 4.18593H22.9631Z" fill="white"/>
						  </g>
						  <defs>
							<clipPath id="clip0_1_164">
							  <rect width="26" height="26" fill="white"/>
							</clipPath>
						  </defs>
						</svg>
						Get Direction
					</button>
				</div>
				@if(isset($data['property']['images']) && count($data['property']['images'])> 0)
				<div class="col-12 col-md-6">
					<div class="slider-thumbnail-outer">
						<div class="swiper-container slider-thumbnail">
							<div class="swiper-wrapper">
							@foreach($data['property']['images'] as $image)
								<div class="swiper-slide"> <a href="{{$image->url}}" data-fancybox="gallery"><img src="{{$image->url}}" alt=""></a></div>
							@endforeach
							</div>
						</div>
						<div class="globle-btn-next thumbnail-next"><i class="fa fa-angle-right" aria-hidden="true"></i></div>
						<div class="globle-btn-prev thumbnail-prev"><i class="fa fa-angle-left" aria-hidden="true"></i></div>
					</div>
				</div>
				@endif
			</div>
		</div>
	</div>
</div>

<div class="project_details_card sticky-top">
	<div class="container">
		<div class="row">
			<div class="col-12 col-md-10 m-auto">
				<div class="project_details_card_box">
					<div class="row">
						<div class="col-6 col-md-4 mb-3 mb-md-0">
							<p>Project Type</p>
							<h4>Apartment</h4>
						</div>
						<div class="col-6 col-md-4 mb-3 mb-md-0">
							<p>Project Status</p>
							<h4>Under Construcation</h4>
						</div>
						<div class="col-6 col-md-4 mb-3 mb-md-0">
							<p>Carpet Area</p>
							<h4>1200 sq.ft</h4>
						</div>
					</div>
					<div class="divider-w"></div>
					<div class="row">
						<div class="col-6 col-md-4 mb-3 mb-md-0">
							<p>Rera Number</p>
							<h4>P51700009813</h4>
						</div>
						<div class="col-6 col-md-4 mb-3 mb-md-0">
							<p>Price:</p>
							<h4>₹5,847 / sq.ft</h4>
						</div>
						<div class="col-6 col-md-4 mb-3 mb-md-0"> 
							<p>Total Floors</p>
							<h4>10</h4>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>


<div class="project_details_wrapper">
	<div class="container">
		<div class="row">
			<div class="col-12 col-md-4">
				<div class="best_deal_card">
					<h4>Get Best Deal</h4>
					<h6>Contact us for kedar sai spring</h6>
					
					<form>
					  <div class="form-group">
						<label>Name</label>
						<input type="text" class="form-control" placeholder="Robot Brics">
					  </div>
					  
					  <div class="form-group">
						<label>Email Address</label>
						<input type="email" class="form-control" placeholder="RobotBrics@gmail.com">
					  </div>
					  
					  <div class="form-group">
						<label>Mobile Number</label>
						<input type="text" class="form-control" placeholder="+91">
					  </div>
					  
					  <div class="form-group">
						<label>Select your message</label>
						<textarea class="form-control" rows="3" placeholder="Write......."></textarea>
					  </div>
					  
					  <button type="submit" class="btn btn-danger submit-btn w-100">Submit</button>

					</form>
				</div>
			</div>
			<div class="col-12 col-md-8">
				<div class="project_details_con">asdsa</div>
			</div>
		</div>
	</div>
</div>



@endsection
@section('scripts')
<script src="{{ url('estate/js/jquery.fancybox.min.js')}}"></script>
<script src="{{ url('estate/js/swiper-bundle.min.js')}}"></script>
<script>
	$(document).ready(function() {
    $.fancybox.defaults.animationEffect = "none";
  	$.fancybox.defaults.transitionEffect = "none";
	  $('[data-fancybox="gallery"]').fancybox();

	var sliderThumbnail = new Swiper('.slider-thumbnail', {
	  slidesPerView: 4,
	  spaceBetween: 23,
	  freeMode: true,
	  watchSlidesVisibility: true,
	  watchSlidesProgress: true,
	  slideToClickedSlide: true,
	  navigation: {
		nextEl: '.thumbnail-next',
		prevEl: '.thumbnail-prev',
	  },
	});

	var slider = new Swiper('.details-slider-main', {
	  navigation: {
		nextEl: '.swiper-button-next',
		prevEl: '.swiper-button-prev',
	  },
	  thumbs: {
		swiper: sliderThumbnail
	  }
	});
})
</script>
@endsection