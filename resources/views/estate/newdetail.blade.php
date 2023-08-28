@extends('layouts.estate')
@section('content')
<link rel="stylesheet" href="{{ url('estate/css/swiper-bundle.min.css')}}" />
<link rel="stylesheet" href="{{ url('estate/css/bootstrap-icons.css')}}">
<link rel="stylesheet" href="{{ url('estate/css/newcss/jquery.fancybox.min.css')}}" />
@php
    use Illuminate\Support\Str;
@endphp
<div class="details_main_banner">
	@if(isset($data['property']['images']) && count($data['property']['images'])> 0)
	<div class="details details-slider-main">
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
							<path d="M17.7233 15.1667C17.81 14.4517 17.875 13.7367 17.875 13.0001C17.875 12.2634 17.81 11.5484 17.7233 10.8334H21.385C21.5583 11.5267 21.6666 12.2526 21.6666 13.0001C21.6666 13.7476 21.5583 14.4734 21.385 15.1667M15.8058 21.1901C16.4558 19.9876 16.9541 18.6876 17.3008 17.3334H20.4966C19.4471 19.1407 17.7819 20.5097 15.8058 21.1901ZM15.535 15.1667H10.465C10.3566 14.4517 10.2916 13.7367 10.2916 13.0001C10.2916 12.2634 10.3566 11.5376 10.465 10.8334H15.535C15.6325 11.5376 15.7083 12.2634 15.7083 13.0001C15.7083 13.7367 15.6325 14.4517 15.535 15.1667ZM13 21.6234C12.1008 20.3234 11.375 18.8826 10.9308 17.3334H15.0691C14.625 18.8826 13.8991 20.3234 13 21.6234ZM8.66663 8.66675H5.50329C6.54205 6.85456 8.20599 5.48336 10.1833 4.81008C9.53329 6.01258 9.04579 7.31258 8.66663 8.66675ZM5.50329 17.3334H8.66663C9.04579 18.6876 9.53329 19.9876 10.1833 21.1901C8.21013 20.5094 6.54854 19.1401 5.50329 17.3334ZM4.61496 15.1667C4.44163 14.4734 4.33329 13.7476 4.33329 13.0001C4.33329 12.2526 4.44163 11.5267 4.61496 10.8334H8.27663C8.18996 11.5484 8.12496 12.2634 8.12496 13.0001C8.12496 13.7367 8.18996 14.4517 8.27663 15.1667M13 4.36591C13.8991 5.66591 14.625 7.11758 15.0691 8.66675H10.9308C11.375 7.11758 12.1008 5.66591 13 4.36591ZM20.4966 8.66675H17.3008C16.9617 7.32499 16.4597 6.0298 15.8058 4.81008C17.7991 5.49258 19.4566 6.86841 20.4966 8.66675ZM13 2.16675C7.00913 2.16675 2.16663 7.04175 2.16663 13.0001C2.16663 15.8733 3.30799 18.6288 5.33964 20.6604C6.3456 21.6664 7.53986 22.4643 8.85422 23.0088C10.1686 23.5532 11.5773 23.8334 13 23.8334C15.8731 23.8334 18.6286 22.692 20.6603 20.6604C22.6919 18.6288 23.8333 15.8733 23.8333 13.0001C23.8333 11.5774 23.5531 10.1687 23.0087 8.85434C22.4642 7.53998 21.6663 6.34573 20.6603 5.33976C19.6543 4.33379 18.4601 3.53581 17.1457 2.99139C15.8313 2.44696 14.4226 2.16675 13 2.16675Z" fill="white" />
						</svg>
						Virtual Tour
					</button>
					<a class="btn btn-danger get-direction" href="https://www.google.com/maps/dir/?api=1&destination={{$data['property']->lat}},{{$data['property']->lng}}" target="_blank" rel="noopener">
						<svg width="26" height="26" viewBox="0 0 26 26" fill="none" xmlns="http://www.w3.org/2000/svg">
							<g clip-path="url(#clip0_1_164)">
								<path d="M25.9417 1.11468C26.0008 0.967025 26.0153 0.805272 25.9834 0.649473C25.9514 0.493674 25.8744 0.350681 25.7619 0.23822C25.6495 0.12576 25.5065 0.0487777 25.3507 0.0168181C25.1949 -0.0151415 25.0331 -0.000673324 24.8855 0.058429L1.24662 9.5143H1.24499L0.510492 9.8068C0.371376 9.8623 0.250306 9.95516 0.160655 10.0751C0.0710037 10.1951 0.016261 10.3375 0.00247367 10.4867C-0.0113137 10.6358 0.0163908 10.7859 0.0825269 10.9203C0.148663 11.0546 0.250657 11.1681 0.377242 11.2482L1.04349 11.6707L1.04512 11.6739L9.16199 16.8382L14.3262 24.9551L14.3295 24.9583L14.752 25.6246C14.8323 25.7507 14.9459 25.8521 15.0801 25.9179C15.2144 25.9836 15.3642 26.011 15.5131 25.997C15.6619 25.9831 15.804 25.9283 15.9238 25.8388C16.0435 25.7493 16.1362 25.6285 16.1917 25.4897L25.9417 1.11468ZM22.9631 4.18593L10.7854 16.3637L10.436 15.8144C10.372 15.7136 10.2865 15.6282 10.1857 15.5642L9.63649 15.2148L21.8142 3.03705L23.7285 2.27168L22.9647 4.18593H22.9631Z" fill="white" />
							</g>
							<defs>
								<clipPath id="clip0_1_164">
									<rect width="26" height="26" fill="white" />
								</clipPath>
							</defs>
						</svg>
						Get Direction
</a>
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
						@if($data['property']->property_type)
						<div class="col-6 col-md-4 mb-3 mb-md-0">
							<p>Project category</p>
							<h4>{{ucfirst($data['property']['property_type']['type_data']['property_type']) ?? ''}}</h4>
						</div>

						<div class="col-6 col-md-4 mb-3 mb-md-0">
							<p>Project Type</p>
							<h4>{{ucfirst($data['property']['property_type']['type_data']['name']) ?? ''}}</h4>
						</div>
						@endif
						@if($data['property']->property_details && $data['property']['property_details']['property_status'] != '')
						<div class="col-6 col-md-4 mb-3 mb-md-0">
							<p>Project Status</p>
							@switch($data['property']['property_details']['property_status'])
												@case('ready_to_move')
												<h4>Ready to move</h4>
												@break
												@case('under_construction')
												<h4>Under Construction</h4>
												@break
												@endswitch
						</div>
						@endif
						@if($data['property']->property_details && $data['property']['property_details']['carpet_area'] != '')
						<div class="col-6 col-md-4 mb-3 mb-md-0">
							<p>Carpet Area</p>
							<h4>{{$data['property']['property_details']['carpet_area']}} sq.ft</h4>
						</div>
						@endif
					</div>
					<div class="divider-w"></div>
					<div class="row">
						@if($data['property']->property_details && $data['property']['property_details']['rera_number'] != '')
						<div class="col-6 col-md-4 mb-3 mb-md-0">
							<p>Rera Number</p>
							<h4>{{$data['property']['property_details']['rera_number']}}</h4>
						</div>
						@elseif($data['property']->property_details && $data['property']['property_details']['furnished'] != '')
						<div class="col-6 col-md-4 mb-3 mb-md-0">
							<p>Furnished Status</p>
							<h4>{{ucfirst($data['property']['property_details']['furnished'])}}</h4>
						</div>
						@endif
						<div class="col-6 col-md-4 mb-3 mb-md-0">
							<p>Price:</p>
							<h4>₹ {{number_form($data['property']['property_details']->price)}}</h4>
						</div>
						@if($data['property']->property_details && $data['property']['property_details']['numbers_of_floors'] != '')
						<div class="col-6 col-md-4 mb-3 mb-md-0">
							<p>Total Floors</p>
							<h4>{{$data['property']['property_details']['numbers_of_floors']}}</h4>
						</div>
						@elseif($data['property']->type)
						<div class="col-6 col-md-4 mb-3 mb-md-0">
							<p>Property For</p>
							<h4>{{ucfirst($data['property']->type)}}</h4>
						</div>
						@endif
					</div>
				</div>
			</div>
		</div>
	</div>
</div>


<div class="project_details_wrapper">
	<div class="container">
		<div class="row">
			<div class="col-12 col-md-3">
				<div class="best_deal_card_outer sticky-top">
					<div class="best_deal_card">
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
						<h4>Get Best Deal</h4>
						<h6>Contact us for {{$data['property']->name}}</h6>
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
								function CheckColors(val) {
									var element = document.getElementById('message');
									if (val == '' || val == 'others')
										element.style.display = 'block';
									else
										element.style.display = 'none';
								}
							</script>
							<div class="form-group mb-4">
								<select name="message" class="form-control" onchange='CheckColors(this.value);'>
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
					
					<div class="share-friend">
						<h4>Share to friend</h4>
						<ul class="social_media_left">
							<li>
								<!-- Facebook -->
								<a href="https://www.facebook.com/sharer/sharer.php?u={{ url()->current() }}" target="_blank" rel="noopener">
									<svg width="47" height="47" viewBox="0 0 47 47" fill="none" xmlns="http://www.w3.org/2000/svg">
									  <path d="M43.0833 23.5C43.0833 12.69 34.31 3.91663 23.5 3.91663C12.69 3.91663 3.91667 12.69 3.91667 23.5C3.91667 32.9783 10.6533 40.8704 19.5833 42.6916V29.375H15.6667V23.5H19.5833V18.6041C19.5833 14.8245 22.6579 11.75 26.4375 11.75H31.3333V17.625H27.4167C26.3396 17.625 25.4583 18.5062 25.4583 19.5833V23.5H31.3333V29.375H25.4583V42.9854C35.3479 42.0062 43.0833 33.6637 43.0833 23.5Z" fill="#C42128"/>
									</svg>
								</a>
							</li>
							<li>
								<!-- Twitter -->
								<a href="https://twitter.com/intent/tweet?url={{ url()->current() }}&text={{ urlencode($data['property']['slug']) }}" target="_blank" rel="noopener">
									<svg width="48" height="47" viewBox="0 0 48 47" fill="none" xmlns="http://www.w3.org/2000/svg">
									  <path d="M36.41 4.40625H43.026L28.572 20.5821L45.576 42.5938H32.26L21.832 29.2438L9.9 42.5938H3.28L18.74 25.2919L2.43 4.40625H16.08L25.506 16.6086L36.406 4.40625H36.41ZM34.088 38.7163H37.754L14.09 8.08008H10.156L34.088 38.7163Z" fill="#C42128"/>
									</svg>
								</a>
							</li>
							<li>
								<!-- Whatsapp -->
								<a href="https://api.whatsapp.com/send?text=Check out this link: {{ url()->current() }}" target="_blank" rel="noopener">
									<svg width="48" height="47" viewBox="0 0 48 47" fill="none" xmlns="http://www.w3.org/2000/svg">
									  <path d="M38.1 9.61537C36.2664 7.80181 34.0824 6.36389 31.6753 5.38547C29.2682 4.40705 26.6862 3.90773 24.08 3.91662C13.16 3.91662 4.26 12.6312 4.26 23.3237C4.26 26.7508 5.18 30.08 6.9 33.0175L4.1 43.0833L14.6 40.3808C17.5 41.9279 20.76 42.7504 24.08 42.7504C35 42.7504 43.9 34.0358 43.9 23.3433C43.9 18.1537 41.84 13.2775 38.1 9.61537ZM24.08 39.4604C21.12 39.4604 18.22 38.677 15.68 37.2083L15.08 36.8558L8.84 38.4616L10.5 32.5083L10.1 31.9012C8.45549 29.3299 7.58228 26.3576 7.58 23.3237C7.58 14.4329 14.98 7.18704 24.06 7.18704C28.46 7.18704 32.6 8.8712 35.7 11.9262C37.235 13.4223 38.4514 15.2018 39.2788 17.1617C40.1062 19.1215 40.5281 21.2226 40.52 23.3433C40.56 32.2341 33.16 39.4604 24.08 39.4604ZM33.12 27.397C32.62 27.162 30.18 25.987 29.74 25.8108C29.28 25.6541 28.96 25.5758 28.62 26.0458C28.28 26.5354 27.34 27.632 27.06 27.9454C26.78 28.2783 26.48 28.3175 25.98 28.0629C25.48 27.8279 23.88 27.2991 22 25.6541C20.52 24.3616 19.54 22.7754 19.24 22.2858C18.96 21.7962 19.2 21.5416 19.46 21.287C19.68 21.0716 19.96 20.7191 20.2 20.445C20.44 20.1708 20.54 19.9554 20.7 19.642C20.86 19.3091 20.78 19.035 20.66 18.8C20.54 18.565 19.54 16.1758 19.14 15.1966C18.74 14.2566 18.32 14.3741 18.02 14.3545H17.06C16.72 14.3545 16.2 14.472 15.74 14.9616C15.3 15.4512 14.02 16.6262 14.02 19.0154C14.02 21.4045 15.8 23.7154 16.04 24.0287C16.28 24.3616 19.54 29.2575 24.5 31.3529C25.68 31.862 26.6 32.1558 27.32 32.3712C28.5 32.7433 29.58 32.6845 30.44 32.567C31.4 32.43 33.38 31.392 33.78 30.2562C34.2 29.1204 34.2 28.1608 34.06 27.9454C33.92 27.73 33.62 27.632 33.12 27.397Z" fill="#C42128"/>
									</svg>
								</a>
							</li>
							<li>
								<!-- Instagram -->
								<a href="https://www.instagram.com/?url={{ url()->current() }}" target="_blank" rel="noopener">
									<svg width="48" height="47" viewBox="0 0 48 47" fill="none" xmlns="http://www.w3.org/2000/svg">
									  <path d="M15.6 3.91663H32.4C38.8 3.91663 44 9.00829 44 15.275V31.725C44 34.7374 42.7779 37.6264 40.6024 39.7565C38.427 41.8866 35.4765 43.0833 32.4 43.0833H15.6C9.2 43.0833 4 37.9916 4 31.725V15.275C4 12.2625 5.22214 9.37351 7.39756 7.24341C9.57298 5.1133 12.5235 3.91663 15.6 3.91663ZM15.2 7.83329C13.2904 7.83329 11.4591 8.57606 10.1088 9.89819C8.75857 11.2203 8 13.0135 8 14.8833V32.1166C8 36.0137 11.22 39.1666 15.2 39.1666H32.8C34.7096 39.1666 36.5409 38.4239 37.8912 37.1017C39.2414 35.7796 40 33.9864 40 32.1166V14.8833C40 10.9862 36.78 7.83329 32.8 7.83329H15.2ZM34.5 10.7708C35.163 10.7708 35.7989 11.0287 36.2678 11.4878C36.7366 11.9468 37 12.5695 37 13.2187C37 13.8679 36.7366 14.4906 36.2678 14.9496C35.7989 15.4087 35.163 15.6666 34.5 15.6666C33.837 15.6666 33.2011 15.4087 32.7322 14.9496C32.2634 14.4906 32 13.8679 32 13.2187C32 12.5695 32.2634 11.9468 32.7322 11.4878C33.2011 11.0287 33.837 10.7708 34.5 10.7708ZM24 13.7083C26.6522 13.7083 29.1957 14.7399 31.0711 16.5762C32.9464 18.4125 34 20.903 34 23.5C34 26.0969 32.9464 28.5874 31.0711 30.4237C29.1957 32.26 26.6522 33.2916 24 33.2916C21.3478 33.2916 18.8043 32.26 16.9289 30.4237C15.0536 28.5874 14 26.0969 14 23.5C14 20.903 15.0536 18.4125 16.9289 16.5762C18.8043 14.7399 21.3478 13.7083 24 13.7083ZM24 17.625C22.4087 17.625 20.8826 18.2439 19.7574 19.3457C18.6321 20.4475 18 21.9418 18 23.5C18 25.0581 18.6321 26.5524 19.7574 27.6542C20.8826 28.756 22.4087 29.375 24 29.375C25.5913 29.375 27.1174 28.756 28.2426 27.6542C29.3679 26.5524 30 25.0581 30 23.5C30 21.9418 29.3679 20.4475 28.2426 19.3457C27.1174 18.2439 25.5913 17.625 24 17.625Z" fill="#C42128"/>
									</svg>
								</a>
							</li>
							<li>
								<!-- LinkedIn -->
								<a href="https://www.linkedin.com/sharing/share-offsite/?url={{ url()->current() }}" target="_blank" rel="noopener">
									<svg width="47" height="47" viewBox="0 0 47 47" fill="none" xmlns="http://www.w3.org/2000/svg">
									  <path d="M13.5908 9.79167C13.5903 10.8304 13.1772 11.8265 12.4423 12.5606C11.7074 13.2948 10.711 13.7069 9.67222 13.7064C8.63345 13.7059 7.63744 13.2927 6.90329 12.5578C6.16914 11.8229 5.75699 10.8265 5.75751 9.78776C5.75803 8.74899 6.17117 7.75298 6.90606 7.01883C7.64094 6.28468 8.63737 5.87253 9.67613 5.87305C10.7149 5.87357 11.7109 6.28671 12.4451 7.0216C13.1792 7.75648 13.5914 8.75291 13.5908 9.79167ZM13.7083 16.6067H5.87501V41.125H13.7083V16.6067ZM26.085 16.6067H18.2908V41.125H26.0067V28.2588C26.0067 21.0913 35.3479 20.4254 35.3479 28.2588V41.125H43.0833V25.5954C43.0833 13.5125 29.2575 13.9629 26.0067 19.8967L26.085 16.6067Z" fill="#C42128"/>
									</svg>
								</a>
							</li>
						</ul>
					</div>
				</div>
			</div>
			<div class="col-12 col-md-9">
				<div class="project_details_con">
					<ul class="project_details_nav sticky-top">
						<li><a href="#description" class="active">Description</a></li>
						<li><a href="#location">Location</a></li>
						<li><a href="#amenities">Amenities</a></li>
						<li><a href="#specification">Specification</a></li>
						{{-- <li><a href="#transaction-history">Transaction History</a></li>
						<li><a href="#price-insights">Price Insights</a></li>
						<li><a href="#emi-calculator">EMI Calculator</a></li> --}}
					</ul>


					<section id="description" class="project_secrow description_box">
						<div class="project_secrow_header">
							<h4 class="project_details_con_title">Description</h4>
						</div>
						<div class="project_secrow_body">
							{!! $data['property']->description !!}
						</div>
					</section>

					<section id="location" class="project_secrow location_box">
						<div class="project_secrow_header">
							<h4 class="project_details_con_title">Location</h4>
						</div>
						<div class="project_secrow_body">
						<iframe src="https://maps.google.com/maps?q={{$data['property']->lat}},{{$data['property']->lng}}&hl=en&z=14&amp;output=embed" width="100%" height="320px" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
						</div>
					</section>

					<section id="amenities" class="project_secrow amenities_box">
						<div class="project_secrow_header">
							<h4 class="project_details_con_title">Amenities</h4>
						</div>
						@if(isset($data['property']['amenities']) && count($data['property']['amenities'])> 0)
						<div class="project_secrow_body">
							<ul>
								@foreach($data['property']['amenities'] as $amenity)
								<li>
									<span class="amenities_icon">
										@if($amenity->amenity_data->image)
										<img src="{{ asset('storage/' . $amenity->amenity_data->image) }}" alt="Existing Icon Image" style="max-width: 100px;">
										@else
										No icon.
										@endif
									</span>
									<h6>{{$amenity->amenity_data->name ?? ''}}</h6>
								</li>
								@endforeach
							</ul>
						</div>
						@endif
					</section>

					<section id="specification" class="project_secrow specification_box">
						<div class="project_secrow_header">
							<h4 class="project_details_con_title">Specification</h4>
						</div>
						<div class="project_secrow_body">
							<div class="row">
								@if($data['property']->property_details && $data['property']->property_details->property_category != '')
								<div class="col-6 col-md-4 mb-3 mb-md-4">
									<p>Property category</p>
									<h4>{{ucfirst($data['property']->property_details->property_category)}}</h4>
								</div>
								@endif
								@if($data['property']->property_details && $data['property']->property_details->numbers_of_floors != '')
								<div class="col-6 col-md-4 mb-3 mb-md-4">
									<p>Total Floor in Building</p>
									<h4>{{$data['property']->property_details->numbers_of_floors}}</h4>
								</div>
								@endif
								@if($data['property']->type)
								<div class="col-6 col-md-4 mb-3 mb-md-4">
									<p>Property For</p>
									<h4>{{ucfirst($data['property']->type)}}</h4>
								</div>
								@endif
								@if($data['property']->property_details && $data['property']->property_details->carpet_area != '')
								<div class="col-6 col-md-4 mb-3 mb-md-4">
									<p>Carpet Area</p>
									<h4>{{$data['property']->property_details->carpet_area}}</h4>
								</div>
								@endif
								@if($data['property']->property_details && $data['property']->property_details->carpet_area != '')
								<div class="col-6 col-md-4 mb-3 mb-md-4">
									<p>Super Area</p>
									<h4>{{$data['property']->property_details->super_area}}</h4>
								</div>
								@endif
								@if($data['property']->property_details && $data['property']->property_details->build_up_area != '')
								<div class="col-6 col-md-4 mb-3 mb-md-4">
									<p>Build-up Area</p>
									<h4>{{$data['property']->property_details->build_up_area}}</h4>
								</div>
								@endif
							</div>
						</div>
					</section>
					@if($data['otherproperties'] && count($data['otherproperties']->properties)>0)
					<section class="project_secrow specification_box">
						<div class="project_secrow_header">
							<h4 class="project_details_con_title">Other Properties by {{$data['otherproperties']->builder->company_name ?? 'same owner'}}</h4>
						</div>
						<div class="project_secrow_body">
							<div class="swiper swiper-container properties-slider">
								<div class="swiper-wrapper">
									@foreach($data['otherproperties']->properties as $otherproperty)
									
									<div class="swiper-slide">
										<div class="properties_box">
										<a href="{{ route('property.newdetail', [$otherproperty->slug] ) }}">
											
											<div class="properties_box_img">
											@if (count($otherproperty->images) > 0)
												<img src="{{ $otherproperty->images[0]->url }}">
												@if ($otherproperty->property_details->property_status)
												@switch($otherproperty->property_details->property_status)
												@case('ready_to_move')
												<span class="properties_img_tag">Ready to move</span>
												@break
												@case('under_construction')
												<span class="properties_img_tag">Under Construction</span>
												@break
												@endswitch
												@endif
											@endif
											</div>
											
										
											<div class="properties_box_body">
												<div class="property_title">{{ Str::limit($otherproperty->name, $limit = 10, $end = '...') }}</div>
												<div class="properties_box_items">
													<h5>Apartment</h5>
													<span class="properties_tag">{{ucfirst($otherproperty->type)}}</span>
												</div>
												<div class="properties_box_items">
													{{--<h6>Indore</h6>--}}

													<div class="properties_area">{{$otherproperty->property_details->carpet_area}} sq.ft</div>
												</div>
												<div class="properties_box_items">
													<ul>
													@foreach($otherproperty->amenities as $aminity)
														<li>{{ $aminity->amenity_data->name}}</li>
														@endforeach
													</ul>
													<div class="properties_price">₹ {{number_form($otherproperty->property_details->price)}}</div>
												</div>
											</div>
											</a>
										</div>
									</div>
							

									@endforeach
								</div>
								<div class="globle-btn-next properties-next"><i class="fa fa-angle-right" aria-hidden="true"></i></div>
								<div class="globle-btn-prev properties-prev"><i class="fa fa-angle-left" aria-hidden="true"></i></div>
							</div>
						</div>

					</section>
					@endif

					{{--<section id="transaction-history" class="project_secrow transaction_history_box">
						<div class="project_secrow_header">
							<h4 class="project_details_con_title">Transaction History</h4>
							<h6 class="project_details_con_subtitle">Data Source: Maharashtra Govt.</h6>
						</div>
						<div class="project_secrow_body">
							<div class="table-responsive transaction_table">
								<table class="table table-borderless">
								  <thead>
									<tr>
									  <th scope="col" class="text-center">
										<h4>Sold Price</h4>
										<span>Registry Date</span>
									  </th>
									  <th scope="col" class="text-center">
										<h4>Area</h4>
										<span>Flat & Floor No.</span>
									  </th>
									  <th scope="col" class="text-center">
										<h4>Price</h4>
										<span>Per Sq.ft(₹)</span>
									  </th>
									</tr>
								  </thead>
								  <tbody>
									<tr>
									  <td class="text-center">
										<h4>₹30L</h4>
										<span>Aug 2022</span>
									  </td>
									  <td class="text-center">
										<h4>513 Sq.ft</h4>
										<span>#603, Floor3</span>
									  </td>
									  <td class="text-center">
										<h4>₹5.85K</h4>
										<span>/Sq.ft</span>
									  </td>
									</tr>
									
									<tr>
									  <td class="text-center">
										<h4>₹30L</h4>
										<span>Aug 2022</span>
									  </td>
									  <td class="text-center">
										<h4>513 Sq.ft</h4>
										<span>#603, Floor3</span>
									  </td>
									  <td class="text-center">
										<h4>₹5.85K</h4>
										<span>/Sq.ft</span>
									  </td>
									</tr>
									
									<tr>
									  <td class="text-center">
										<h4>₹30L</h4>
										<span>Aug 2022</span>
									  </td>
									  <td class="text-center">
										<h4>513 Sq.ft</h4>
										<span>#603, Floor3</span>
									  </td>
									  <td class="text-center">
										<h4>₹5.85K</h4>
										<span>/Sq.ft</span>
									  </td>
									</tr>
									
									<tr>
									  <td class="text-center">
										<h4>₹30L</h4>
										<span>Aug 2022</span>
									  </td>
									  <td class="text-center">
										<h4>513 Sq.ft</h4>
										<span>#603, Floor3</span>
									  </td>
									  <td class="text-center">
										<h4>₹5.85K</h4>
										<span>/Sq.ft</span>
									  </td>
									</tr>
									
									<tr>
									  <td class="text-center">
										<h4>₹30L</h4>
										<span>Aug 2022</span>
									  </td>
									  <td class="text-center">
										<h4>513 Sq.ft</h4>
										<span>#603, Floor3</span>
									  </td>
									  <td class="text-center">
										<h4>₹5.85K</h4>
										<span>/Sq.ft</span>
									  </td>
									</tr>
									
									<tr>
									  <td class="text-center">
										<h4>₹30L</h4>
										<span>Aug 2022</span>
									  </td>
									  <td class="text-center">
										<h4>513 Sq.ft</h4>
										<span>#603, Floor3</span>
									  </td>
									  <td class="text-center">
										<h4>₹5.85K</h4>
										<span>/Sq.ft</span>
									  </td>
									</tr>
									
									<tr>
									  <td class="text-center">
										<h4>₹30L</h4>
										<span>Aug 2022</span>
									  </td>
									  <td class="text-center">
										<h4>513 Sq.ft</h4>
										<span>#603, Floor3</span>
									  </td>
									  <td class="text-center">
										<h4>₹5.85K</h4>
										<span>/Sq.ft</span>
									  </td>
									</tr>
									
									
									<tr>
									  <td class="text-center">
										<h4>₹30L</h4>
										<span>Aug 2022</span>
									  </td>
									  <td class="text-center">
										<h4>513 Sq.ft</h4>
										<span>#603, Floor3</span>
									  </td>
									  <td class="text-center">
										<h4>₹5.85K</h4>
										<span>/Sq.ft</span>
									  </td>
									</tr>
									
								  </tbody>
								</table>
							</div>
						</div>
					</section>
					<section id="price-insights" class="project_secrow price_insights_box">
						<div class="project_secrow_header">
							<h4 class="project_details_con_title">Price Insights</h4>
						</div>
						<div class="project_secrow_body">
							<p>Kedar Developer presents Kedar Sai Spring, a residential project in Kalyan West Thane.The project 
							offers spacious and ventilated Kedar Sai Spring Apartment. The project is under construction and the 
							possession date of the project is April 2023.</p>
							
							<p>The super area of 2 BHK starts from 352 sqft. The project is equipped with modern amenities such 
							as 24*7 Security, CCTV, Children Play Area, Fire Fighting System, Indoor Games, Landscaped Garden to 
							facilitate the needs of the residents. The project is RERA registered P51700009813.</p>
						</div>
					</section>
					<section id="emi-calculator" class="project_secrow emi_calculator_box">
						<div class="project_secrow_header">
							<h4 class="project_details_con_title">EMI Calculator</h4>
						</div>
						<div class="project_secrow_body">
							<p>Kedar Developer presents Kedar Sai Spring, a residential project in Kalyan West Thane.The project 
							offers spacious and ventilated Kedar Sai Spring Apartment. The project is under construction and the 
							possession date of the project is April 2023.</p>
							
							<p>The super area of 2 BHK starts from 352 sqft. The project is equipped with modern amenities such 
							as 24*7 Security, CCTV, Children Play Area, Fire Fighting System, Indoor Games, Landscaped Garden to 
							facilitate the needs of the residents. The project is RERA registered P51700009813.</p>
						</div>
					</section> --}}

				</div>
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

		var site_url = "{{url('/')}}";

		//hang on event of form with id=myform
		$("#contact_form").submit(function(e) {
			// Prevent default form submission
			e.preventDefault();

			var isValid = true;
			console.log(checkUserLoggedIn())
			if (checkUserLoggedIn() == 'true') {
				// User is logged in, proceed with form submission
				// Check form validity flag


				// Loop through each input, textarea, and select element within the form
				console.log($(this).find('input, textarea, select'))
				$(this).find('input, textarea, select').each(function() {
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
				} else {
					this.submit();
				}
			} else {
				window.location.href = "/signin";
			}

		});

		function checkUserLoggedIn() {
			// Use the Auth::check() method to check if the user is logged in
			return "{{ auth()->guard('frontuser')->check() ? 'true' : 'false' }}";
		}






		// navigation 

		$('body').on('click', '.project_details_nav a[href^="#"]', function(event) {
			event.preventDefault();
			var target_offset = $(this.hash).offset() ? $(this.hash).offset().top : 0;
			//change this number to create the additional off set        
			var customoffset = 75
			$('html, body').animate({
				scrollTop: target_offset - customoffset
			}, 500);
			// Remove the 'active' class from all links and add it to the clicked link
			$('.project_details_nav a').removeClass('active');
			$(this).addClass('active');
		});


		var sliderProperties = new Swiper('.properties-slider', {
			slidesPerView: 2.5,
			spaceBetween: 0,
			freeMode: true,
			navigation: {
				nextEl: '.properties-next',
				prevEl: '.properties-prev',
			},
		});

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