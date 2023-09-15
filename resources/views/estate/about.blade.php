@extends('layouts.estate')
@section('title', 'About Us | EstateOn') 
@section('metaDescription', 'Explore More Features and Real Estate Solutions on EstateOn. Get to Know More About Our Top Builders in India. Our Top Properties Help You to Fulfill Your Dream. Register Now.') 
@section('content')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css"/>

<section class="about-banner">
	<div class="container">
		<div class="row">
			<div class="col-12 col-md-4">
				<div class="about-divider"></div>
				<h1>About Our <span>EstateOn</span></h1>
			</div>
		</div>

	</div>
</section>

<section class="our-story-sec py-3 py-md-5">
	<div class="container">
		<h2 class="title">Our Story</h2>
		<div class="row">
			<div class="col-12 col-md-6">
				<div class="our-story-image">
				<img src="{{ url('estate/images/our-story.svg')}}" alt="property for sale" class="mx-auto no-property-img d-block" />
				</div>
			</div>
			<div class="col-12 col-md-6">
				<div class="our-story-con">
					<h5>Our story starts with the name</h5>
					<h3>EstateOn</h3>
					<p>The founder serving the industry science 2008, having experience 13+ year and counting 
					in various city across India starting from Indore,and got chance to work in Mumbai, 
					Ahmadabad Jaipur Nagpur Raipur Bhopal etc. Founded company in 2019 with the vision of 
					to provide best and value for money property options with all legal and transparent way 
					to organize a proper system with corporate culture in real estate service industry. To 
					solve all the major problem people are facing during real estate buying selling and lease 
					process lack of transparency proper guidance and communication with actual facts. We have 
					vision to provide all A to Z facilities like buying selling lease all under one roof</p>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="selling-property py-3 py-md-5">
	<div class="container">
		<div class="row d-flex align-items-center">
			<div class="col-12 col-md-5">
				<div class="selling-property-img">
					<img src="{{ url('estate/images/selling-property.png')}}" alt="apartments for sale" class="mx-auto no-property-img d-block" />
				</div>
			</div>
			<div class="col-12 col-md-7">
				<div class="selling-property-con">
					<h3>Buying & Selling Property In An Easy Way</h3>
					<h6>Distinctively re-engineer revolutionary meta-services and premium At vero eos et 
					accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum 
					deleniti atque corrupti quos dolores et quas molestias excepturi.</h6>
					
					<ul class="selling-item-list">
						<li>
							<span>	
								<svg width="104" height="104" viewBox="0 0 104 104" fill="none" xmlns="http://www.w3.org/2000/svg">
								  <path d="M60.7273 78.0861V60.6024C60.7273 59.8295 60.4208 59.0884 59.8752 58.5419C59.3297 57.9954 58.5897 57.6884 57.8182 57.6884H46.1818C45.4103 57.6884 44.6703 57.9954 44.1248 58.5419C43.5792 59.0884 43.2727 59.8295 43.2727 60.6024V78.0861C43.2727 78.8589 42.9662 79.6001 42.4207 80.1465C41.8751 80.693 41.1352 81 40.3636 81H22.9091C22.1376 81 21.3976 80.693 20.8521 80.1465C20.3065 79.6001 20 78.8589 20 78.0861V44.3935C20.0065 43.9903 20.0935 43.5924 20.2559 43.2233C20.4183 42.8542 20.6527 42.5214 20.9455 42.2445L50.0364 15.764C50.5726 15.2725 51.2732 15 52 15C52.7268 15 53.4274 15.2725 53.9636 15.764L83.0545 42.2445C83.3473 42.5214 83.5817 42.8542 83.7441 43.2233C83.9065 43.5924 83.9935 43.9903 84 44.3935V78.0861C84 78.8589 83.6935 79.6001 83.148 80.1465C82.6024 80.693 81.8624 81 81.0909 81H63.6364C62.8648 81 62.1249 80.693 61.5793 80.1465C61.0338 79.6001 60.7273 78.8589 60.7273 78.0861Z" stroke="url(#paint0_linear_67_2951)" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
								  <defs>
									<linearGradient id="paint0_linear_67_2951" x1="52" y1="15" x2="52" y2="81" gradientUnits="userSpaceOnUse">
									  <stop stop-color="#C42128"/>
									  <stop offset="1" stop-color="#C42128" stop-opacity="0.24"/>
									</linearGradient>
								  </defs>
								</svg>
							</span>
							<div class="selling-item-con">
								<h5>Our Vision</h5>
								<p>Distinctively re-engineer revolutionary meta-services and premium At vero 
								eos et accusamus et iusto odio dignissimos ducimus qui blanditiis</p>
							</div>
						</li>
						<li>
							<span>
								<svg width="104" height="104" viewBox="0 0 104 104" fill="none" xmlns="http://www.w3.org/2000/svg">
								  <path d="M58.5 87.75V16.25C58.5 15.388 58.1576 14.5614 57.5481 13.9519C56.9386 13.3424 56.112 13 55.25 13H16.25C15.388 13 14.5614 13.3424 13.9519 13.9519C13.3424 14.5614 13 15.388 13 16.25V87.75" stroke="url(#paint0_linear_67_2957)" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
								  <path d="M91 87.75V42.25C91 41.388 90.6576 40.5614 90.0481 39.9519C89.4386 39.3424 88.612 39 87.75 39H58.5" stroke="url(#paint1_linear_67_2957)" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
								  <path d="M26 29.25H39" stroke="url(#paint2_linear_67_2957)" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
								  <path d="M32.5 55.25H45.5" stroke="url(#paint3_linear_67_2957)" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
								  <path d="M26 71.5H39" stroke="url(#paint4_linear_67_2957)" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
								  <path d="M71.5 71.5H78" stroke="url(#paint5_linear_67_2957)" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
								  <path d="M71.5 55.25H78" stroke="url(#paint6_linear_67_2957)" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
								  <defs>
									<linearGradient id="paint0_linear_67_2957" x1="35.75" y1="13" x2="35.75" y2="87.75" gradientUnits="userSpaceOnUse">
									  <stop stop-color="#C42128"/>
									  <stop offset="1" stop-color="#C42128" stop-opacity="0.24"/>
									</linearGradient>
									<linearGradient id="paint1_linear_67_2957" x1="74.75" y1="39" x2="74.75" y2="87.75" gradientUnits="userSpaceOnUse">
									  <stop stop-color="#C42128"/>
									  <stop offset="1" stop-color="#C42128" stop-opacity="0.24"/>
									</linearGradient>
									<linearGradient id="paint2_linear_67_2957" x1="32.5" y1="29.25" x2="32.5" y2="30.25" gradientUnits="userSpaceOnUse">
									  <stop stop-color="#C42128"/>
									  <stop offset="1" stop-color="#C42128" stop-opacity="0.24"/>
									</linearGradient>
									<linearGradient id="paint3_linear_67_2957" x1="39" y1="55.25" x2="39" y2="56.25" gradientUnits="userSpaceOnUse">
									  <stop stop-color="#C42128"/>
									  <stop offset="1" stop-color="#C42128" stop-opacity="0.24"/>
									</linearGradient>
									<linearGradient id="paint4_linear_67_2957" x1="32.5" y1="71.5" x2="32.5" y2="72.5" gradientUnits="userSpaceOnUse">
									  <stop stop-color="#C42128"/>
									  <stop offset="1" stop-color="#C42128" stop-opacity="0.24"/>
									</linearGradient>
									<linearGradient id="paint5_linear_67_2957" x1="74.75" y1="71.5" x2="74.75" y2="72.5" gradientUnits="userSpaceOnUse">
									  <stop stop-color="#C42128"/>
									  <stop offset="1" stop-color="#C42128" stop-opacity="0.24"/>
									</linearGradient>
									<linearGradient id="paint6_linear_67_2957" x1="74.75" y1="55.25" x2="74.75" y2="56.25" gradientUnits="userSpaceOnUse">
									  <stop stop-color="#C42128"/>
									  <stop offset="1" stop-color="#C42128" stop-opacity="0.24"/>
									</linearGradient>
								  </defs>
								</svg>
							</span>
							<div class="selling-item-con">
								<h5>Our Mission</h5>
								<p>Distinctively re-engineer revolutionary meta-services and premium At vero eos 
								et accusamus et iusto odio dignissimos ducimus qui blanditiis</p>
							</div>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="our-experience py-3 py-md-5">
	<div class="container">
		<div class="row">
			<div class="col-12 col-md-4">
				<div class="our-experience-img mb-3">
					<img src="{{ url('estate/images/our-experience1.jpg')}}" alt="rental apartments for rent" class="mx-auto no-property-img d-block" />
				</div>
				<div class="our-experience-img">
					<img src="{{ url('estate/images/our-experience2.jpg')}}" alt="studio apartments for rent" class="mx-auto no-property-img d-block" />
				</div>
			</div>
			<div class="col-12 col-md-4">
				<div class="our-experience-con">
					<h3>Our Experience</h3>
					<p>The founder serving the industry science 2008, having experience 13+ year and counting in 
					various city across India starting from Indore, and got chance to work in Mumbai, Ahmadabad 
					Jaipur Nagpur Raipur Bhopal etc. </p>

					<p>Founded company in 2019 with the vision of to provide best and value for money property 
					options with all legal and transparent way to organize a proper system with corporate culture 
					in real estate service industry. 
					To solve all the major problem people are facing during real estate buying selling and lease 
					process lack of transparency proper guidance and communication with actual facts. </p>

					<p>We have vision to provide all A to Z facilities like buying selling lease all under one roof</p>
				</div>
			</div>
			<div class="col-12 col-md-4">
				<div class="our-experience-img">
					<img src="{{ url('estate/images/our-experience3.jpg')}}" alt="no-property" class="mx-auto no-property-img d-block" />
				</div>
				<h4>EstateOn</h4>
			</div>
		</div>
	</div>
</section>

<section class="our-team py-3 py-md-5">
	<div class="container">
		<h3 class="text-center">Our Property Team</h3>
		<div class="row">
			<div class="col-12 col-md-3 mb-3">
				<div class="our-team-box">
					<div class="our-team-img">
						<img src="{{ url('estate/images/jacob-jones.png')}}" alt="no-property" class="mx-auto no-property-img d-block" />
					</div>
					<div class="our-team-con">
						<h5>Jacob Jones</h5>
						<h6>Land Seller</h6>
						<div class="social-media">
							<a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
							<a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
							<a href="#"><i class="fa fa-facebook-square" aria-hidden="true"></i></a>
						</div>
					</div>
				</div>
			</div>
			
			<div class="col-12 col-md-3 mb-3">
				<div class="our-team-box">
					<div class="our-team-img">
						<img src="{{ url('estate/images/esther-howard.png')}}" alt="no-property" class="mx-auto no-property-img d-block" />
					</div>
					<div class="our-team-con">
						<h5>Esther Howard</h5>
						<h6>Land Seller</h6>
						<div class="social-media">
							<a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
							<a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
							<a href="#"><i class="fa fa-facebook-square" aria-hidden="true"></i></a>
						</div>
					</div>
				</div>
			</div>
			
			<div class="col-12 col-md-3 mb-3">
				<div class="our-team-box">
					<div class="our-team-img">
						<img src="{{ url('estate/images/ronald-richards.png')}}" alt="no-property" class="mx-auto no-property-img d-block" />
					</div>
					<div class="our-team-con">
						<h5>Ronald Richards</h5>
						<h6>Land Seller</h6>
						<div class="social-media">
							<a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
							<a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
							<a href="#"><i class="fa fa-facebook-square" aria-hidden="true"></i></a>
						</div>
					</div>
				</div>
			</div>
			
			<div class="col-12 col-md-3 mb-3">
				<div class="our-team-box">
					<div class="our-team-img">
						<img src="{{ url('estate/images/jerome-bell.png')}}" alt="no-property" class="mx-auto no-property-img d-block" />
					</div>
					<div class="our-team-con">
						<h5>Jerome Bell</h5>
						<h6>Land Seller</h6>
						<div class="social-media">
							<a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
							<a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
							<a href="#"><i class="fa fa-facebook-square" aria-hidden="true"></i></a>
						</div>
					</div>
				</div>
			</div>
			
		</div>
	</div>
</section>

<section class="builders-goals">
	<div class="container">
		<div class="row">
			<div class="col-12 col-md-5">
				<div class="builders-goals-img">
					<img src="{{ url('estate/images/builders-goals.jpg')}}" alt="top builders in india" class="mx-auto no-property-img d-block" />
				</div>
			</div>
			<div class="col-12 col-md-7">
				<div class="builders-goals-con">
					<h3>Builders Goals</h3>
					<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum 
					is simply dummy text of the printing and typesetting industry.Lorem Ipsum is simply dummy 
					text of the printing and typesetting industry. Ipsum is simply dummy text of the printing 
					and typesetting industry.</p>
					<ul>
						<li>
							<svg width="10" height="10" viewBox="0 0 10 10" fill="none" xmlns="http://www.w3.org/2000/svg">
							  <path d="M5 0L6.35045 3.64955L10 5L6.35045 6.35045L5 10L3.64955 6.35045L0 5L3.64955 3.64955L5 0Z" fill="#D5BB1A"/>
							</svg> 
							Lorem Ipsum is simply dummy text of the printing
						</li>
						<li>
							<svg width="10" height="10" viewBox="0 0 10 10" fill="none" xmlns="http://www.w3.org/2000/svg">
							  <path d="M5 0L6.35045 3.64955L10 5L6.35045 6.35045L5 10L3.64955 6.35045L0 5L3.64955 3.64955L5 0Z" fill="#D5BB1A"/>
							</svg> 
							Lorem Ipsum is simply dummy text of the printing
						</li>
						<li>
							<svg width="10" height="10" viewBox="0 0 10 10" fill="none" xmlns="http://www.w3.org/2000/svg">
							  <path d="M5 0L6.35045 3.64955L10 5L6.35045 6.35045L5 10L3.64955 6.35045L0 5L3.64955 3.64955L5 0Z" fill="#D5BB1A"/>
							</svg> 
							Lorem Ipsum is simply dummy text of the printing
						</li>
						<li>
							<svg width="10" height="10" viewBox="0 0 10 10" fill="none" xmlns="http://www.w3.org/2000/svg">
							  <path d="M5 0L6.35045 3.64955L10 5L6.35045 6.35045L5 10L3.64955 6.35045L0 5L3.64955 3.64955L5 0Z" fill="#D5BB1A"/>
							</svg> 
							Lorem Ipsum is simply dummy text of the printing
						</li>
						<li>
							<svg width="10" height="10" viewBox="0 0 10 10" fill="none" xmlns="http://www.w3.org/2000/svg">
							  <path d="M5 0L6.35045 3.64955L10 5L6.35045 6.35045L5 10L3.64955 6.35045L0 5L3.64955 3.64955L5 0Z" fill="#D5BB1A"/>
							</svg> 
							Lorem Ipsum is simply dummy text of the printing
						</li>
					</ul>
					<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum is 
					simply dummy text of the printing and typesetting industry.Lore</p>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="agents-professionals pt-3 pt-md-5">
	<div class="container">
		<div class="row">
			<div class="col-12 col-md-6">
				<div class="agents-professionals-con mb-3">
					<h3 class="title">Agents Professionals</h3>
					<ul>
						<li>
							<svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
							  <path d="M8 0L10.1607 5.83927L16 8L10.1607 10.1607L8 16L5.83927 10.1607L0 8L5.83927 5.83927L8 0Z" fill="#C42128"/>
							</svg>
							<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. 
							Lorem Ipsum is simply dummy text of the printing and typesetting industry.Lorem 
							Ipsum is simply dummy text of the printing and typesetting industry. Ipsum is 
							simply dummy text of the printing and typesetting industry.</p>
						</li>
						<li>
							<svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
							  <path d="M8 0L10.1607 5.83927L16 8L10.1607 10.1607L8 16L5.83927 10.1607L0 8L5.83927 5.83927L8 0Z" fill="#C42128"/>
							</svg>
							<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. 
							Lorem Ipsum is simply dummy text of the printing and typesetting industry.Lorem 
							Ipsum is simply dummy text of the printing and typesetting industry. Ipsum is 
							simply dummy text of the printing and typesetting industry.</p>
						</li>
						<li>
							<svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
							  <path d="M8 0L10.1607 5.83927L16 8L10.1607 10.1607L8 16L5.83927 10.1607L0 8L5.83927 5.83927L8 0Z" fill="#C42128"/>
							</svg>
							<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. 
							Lorem Ipsum is simply dummy text of the printing and typesetting industry.Lorem 
							Ipsum is simply dummy text of the printing and typesetting industry. Ipsum is 
							simply dummy text of the printing and typesetting industry.</p>
						</li>
					</ul>
					<a href="#">Register Now</a>
				</div>
			</div>
			<div class="col-12 col-md-6">
				<div class="agents-professionals-img">
					<img src="{{ url('estate/images/agents-professionals2.svg')}}" alt="local real estate agents" class="mx-auto no-property-img d-block" />
				</div>
			</div>
		</div>
	</div>
</section>

<section class="owners-trust-sec py-3 py-md-5">
	<div class="container">
		<div class="d-flex align-items-center justify-content-center mb-4">
			<h2 class="title">Owners Trust</h2>
		</div>
		<div class="row">
			<div class="col-12 col-md-7">
				<div class="owners-trust-img">
					<img src="{{ url('estate/images/owners-trust.svg')}}" alt="house for rent by owner" class="mx-auto no-property-img d-block" />
				</div>
			</div>
			<div class="col-12 col-md-5">
				<div class="owners-trust-con">
					<h5>Heading 2</h5>
					<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum 
					is simply dummy text of the printing and typesetting industry.Lorem Ipsum is simply dummy 
					text of the printing and typesetting industry. Ipsum is simply dummy text of the printing 
					and typesetting industry.</p>
					
					<div class="text-right">
						<svg width="37" height="49" viewBox="0 0 37 49" fill="none" xmlns="http://www.w3.org/2000/svg">
						  <path d="M9.46527 20.4927L18.5624 24.9812L27.8915 20.9971L23.4029 30.0942L27.3871 39.4232L18.29 34.9347L8.96091 38.9189L13.4494 29.8218L9.46527 20.4927Z" fill="#E19093"/>
						  <path d="M21.7528 3.98264L25.796 5.97757L29.9423 4.2068L27.9474 8.25004L29.7182 12.3964L25.6749 10.4014L21.5286 12.1722L23.5235 8.12895L21.7528 3.98264Z" fill="#E19093"/>
						</svg>
					</div>
					
					<div class="row">
						<div class="col-12 col-md-6 mb-3">
							<div class="owners-trust-box mb-3 mb-md-4">
								<h2>Starter<span>1 Week</span></h2>
								<h3>Free Trail</h3>
							</div>
							
							<div class="owners-trust-box mb-3 mb-md-4">
								<h2>Prime<span>3 Months</span></h2>
								<h3>410/Property</h3>
							</div>
						</div>
						
						<div class="col-12 col-md-6 mt-0 mt-md-5">
							<div class="owners-trust-box mb-3 mb-md-4">
								<h2>Plus<span>1 Month</span></h2>
								<h3>159/Property</h3>
							</div>
							
							<div class="owners-trust-box mb-3 mb-md-4">
								<h2>Enterprise<span>6 Months</span></h2>
								<h3>800/Property</h3>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="customer-support-sec py-3 py-md-5">
	<div class="customer-support-img">
		<img src="{{ url('estate/images/customer-support-bg.svg')}}" alt="no-property" class="mx-auto no-property-img d-block" />
	</div>
	
	<div class="container">
		<div class="row">
			<div class="col-12 col-md-5">
				<h2>Our Customer Support</h2>
				<p>how our Customer Support is responsive qnd dedicated to delivering quality</p>
			</div>
		</div>
		<ul>
			<li>
				<span>
					<svg width="41" height="48" viewBox="0 0 41 48" fill="none" xmlns="http://www.w3.org/2000/svg">
					  <path d="M1.88488 32.733L20.1048 18.5969L38.3247 32.733C37.11 36.0419 35.3617 39.0266 33.0799 41.6871C30.798 44.3476 28.1483 46.4519 25.131 48V34.8691C25.131 34.1571 24.8897 33.5606 24.4072 33.0798C23.9247 32.599 23.3282 32.3577 22.6179 32.356H17.5917C16.8796 32.356 16.2824 32.5973 15.7999 33.0798C15.3173 33.5623 15.0769 34.1587 15.0786 34.8691V48C12.0629 46.4503 9.41326 44.346 7.1297 41.6871C4.84614 39.0283 3.09787 36.0436 1.88488 32.733ZM6.44373e-05 22.4921V10.6806C6.44373e-05 9.63351 0.304148 8.68105 0.912315 7.82325C1.52048 6.96544 2.30541 6.34723 3.26708 5.96859L18.3456 0.314136C18.932 0.104712 19.5184 0 20.1048 0C20.6912 0 21.2775 0.104712 21.8639 0.314136L36.9425 5.96859C37.9058 6.34555 38.6916 6.96377 39.2998 7.82325C39.9079 8.68272 40.2112 9.63518 40.2095 10.6806V22.4921C40.2095 23.3298 40.1676 24.1575 40.0838 24.9751C40.0001 25.7927 39.8954 26.6195 39.7697 27.4555L23.1833 14.6387C22.2618 13.9267 21.2357 13.5707 20.1048 13.5707C18.9739 13.5707 17.9477 13.9267 17.0262 14.6387L0.439855 27.4555C0.272316 26.6178 0.156714 25.791 0.0930492 24.9751C0.0293843 24.1592 -0.00161096 23.3315 6.44373e-05 22.4921Z" fill="#C42128"/>
					</svg>
				</span>
				<h4>Exclusive<br>Property</h4>
			</li>
			<li>
				<span>
					<svg width="44" height="44" viewBox="0 0 44 44" fill="none" xmlns="http://www.w3.org/2000/svg">
					  <path d="M2.00001 10C1.43334 10 0.958006 9.808 0.574007 9.424C0.190007 9.04 -0.00132641 8.56534 6.92042e-06 8V6C6.92042e-06 4.33334 0.58334 2.91667 1.75001 1.75001C2.91667 0.58334 4.33334 6.92042e-06 6 6.92042e-06H8C8.56667 6.92042e-06 9.042 0.192007 9.426 0.576007C9.81 0.960007 10.0013 1.43467 10 2.00001C10 2.56667 9.808 3.04201 9.424 3.42601C9.04 3.81001 8.56534 4.00134 8 4.00001H6C5.43334 4.00001 4.95801 4.19201 4.57401 4.57601C4.19001 4.96001 3.99867 5.43467 4.00001 6V8C4.00001 8.56667 3.80801 9.042 3.42401 9.426C3.04001 9.81 2.56534 10.0013 2.00001 10ZM6 44C4.33334 44 2.91667 43.4167 1.75001 42.25C0.58334 41.0833 6.92042e-06 39.6667 6.92042e-06 38V36C6.92042e-06 35.4333 0.192007 34.958 0.576007 34.574C0.960007 34.19 1.43467 33.9987 2.00001 34C2.56667 34 3.04201 34.192 3.42601 34.576C3.81001 34.96 4.00134 35.4347 4.00001 36V38C4.00001 38.5667 4.19201 39.042 4.57601 39.426C4.96001 39.81 5.43467 40.0013 6 40H8C8.56667 40 9.042 40.192 9.426 40.576C9.81 40.96 10.0013 41.4347 10 42C10 42.5667 9.808 43.042 9.424 43.426C9.04 43.81 8.56534 44.0013 8 44H6ZM36 44C35.4333 44 34.958 43.808 34.574 43.424C34.19 43.04 33.9987 42.5653 34 42C34 41.4333 34.192 40.958 34.576 40.574C34.96 40.19 35.4347 39.9987 36 40H38C38.5667 40 39.042 39.808 39.426 39.424C39.81 39.04 40.0013 38.5653 40 38V36C40 35.4333 40.192 34.958 40.576 34.574C40.96 34.19 41.4347 33.9987 42 34C42.5667 34 43.042 34.192 43.426 34.576C43.81 34.96 44.0013 35.4347 44 36V38C44 39.6667 43.4167 41.0833 42.25 42.25C41.0833 43.4167 39.6667 44 38 44H36ZM42 10C41.4333 10 40.958 9.808 40.574 9.424C40.19 9.04 39.9987 8.56534 40 8V6C40 5.43334 39.808 4.95801 39.424 4.57401C39.04 4.19001 38.5653 3.99867 38 4.00001H36C35.4333 4.00001 34.958 3.80801 34.574 3.42401C34.19 3.04001 33.9987 2.56534 34 2.00001C34 1.43334 34.192 0.958006 34.576 0.574007C34.96 0.190007 35.4347 -0.00132641 36 6.92042e-06H38C39.6667 6.92042e-06 41.0833 0.58334 42.25 1.75001C43.4167 2.91667 44 4.33334 44 6V8C44 8.56667 43.808 9.042 43.424 9.426C43.04 9.81 42.5653 10.0013 42 10ZM22 33.65L24 32.5V23.3L32 18.7V16.35L30 15.2L22 19.8L14 15.2L12 16.35V18.7L20 23.3V32.5L22 33.65ZM20 37.2L10 31.414C9.36667 31.046 8.87467 30.5513 8.524 29.93C8.17467 29.31 8 28.65 8 27.95V16.35C8 15.65 8.17534 14.99 8.526 14.37C8.87534 13.7487 9.36667 13.254 10 12.886L20 7.10001C20.6333 6.73334 21.3 6.55 22 6.55C22.7 6.55 23.3667 6.73334 24 7.10001L34 12.886C34.6333 13.254 35.1253 13.7487 35.476 14.37C35.8253 14.99 36 15.65 36 16.35V27.95C36 28.65 35.8247 29.31 35.474 29.93C35.1247 30.5513 34.6333 31.046 34 31.414L24 37.2C23.3667 37.5667 22.7 37.75 22 37.75C21.3 37.75 20.6333 37.5667 20 37.2Z" fill="#C42128"/>
					</svg>
				</span>
				<h4>Virtual Tour<br>& Site</h4>
			</li>
			<li>
				<span>
					<svg width="32" height="43" viewBox="0 0 32 43" fill="none" xmlns="http://www.w3.org/2000/svg">
					  <path d="M27.4848 7.07439C24.6772 2.43817 20.5397 0 15.5156 0C10.4915 0 6.35402 2.43817 3.54643 7.07439C1.25603 10.8425 0 15.9405 0 21.4263C0 26.9122 1.25603 32.0102 3.54643 35.7783C6.35402 40.4145 10.4915 42.8527 15.5156 42.8527C20.5397 42.8527 24.6772 40.4145 27.4848 35.7783C29.7752 32.0102 31.0312 26.9122 31.0312 21.4263C31.0312 15.9405 29.7752 10.8425 27.4848 7.07439ZM15.5156 38.4196C7.86864 38.4196 4.43304 29.8861 4.43304 21.4263C4.43304 12.9666 7.86864 4.43304 15.5156 4.43304C23.1626 4.43304 26.5982 12.9666 26.5982 21.4263C26.5982 29.8861 23.1626 38.4196 15.5156 38.4196Z" fill="#C42128"/>
					</svg>
				</span>
				<h4>0%<br>Brokerage</h4>
			</li>
			<li>
				<span>
					<svg width="45" height="45" viewBox="0 0 45 45" fill="none" xmlns="http://www.w3.org/2000/svg">
					  <path d="M36.1603 5.19214L34.3018 7.04989C39.1955 10.4459 42.407 16.1039 42.407 22.4984C42.407 28.8816 39.2068 34.5299 34.3288 37.9274L36.1873 39.7859C41.5235 35.8934 44.9998 29.5941 44.9998 22.4984C44.9998 15.3914 41.5123 9.08239 36.1603 5.19214Z" fill="#C42128"/>
					  <path d="M39.4917 22.4986C39.4917 16.9066 36.5847 11.9806 32.2009 9.15161L30.3154 11.0371C34.2507 13.3456 36.8982 17.6176 36.8982 22.4986C36.8982 27.3684 34.2642 31.6329 30.3469 33.9436L32.2294 35.8284C36.5974 32.9964 39.4917 28.0794 39.4917 22.4986Z" fill="#C42128"/>
					  <path d="M34.0958 22.4986C34.0958 18.3841 31.7108 14.8148 28.2503 13.1011L26.2793 15.0751C29.3228 16.1693 31.5045 19.0838 31.5045 22.4986C31.5045 25.9013 29.34 28.8076 26.3153 29.9131L28.2833 31.8811C31.7258 30.1606 34.0958 26.6026 34.0958 22.4986Z" fill="#C42128"/>
					  <path d="M28.125 22.5C28.125 19.9568 25.9215 17.8965 23.2043 17.8965V1.041C23.2043 0.46575 22.7055 0 22.0905 0C21.477 0 20.9783 0.46575 20.9783 1.041V1.56375C20.166 2.223 7.82325 13.3597 7.82325 13.3597H2.65875C1.19025 13.3597 0 14.472 0 15.846V29.1517C0 30.5265 1.19025 31.6388 2.65875 31.6388H7.824V31.6403C7.824 31.6403 15.0472 37.1632 20.979 43.419V43.9575C20.979 44.5327 21.4778 45 22.0912 45C22.7062 45 23.205 44.5327 23.205 43.9575V27.102C25.9222 27.102 28.125 25.041 28.125 22.5Z" fill="#C42128"/>
					</svg>
				</span>
				<h4>Constant<br>Communication</h4>
			</li>
			<li>
				<span>
					<svg width="32" height="49" viewBox="0 0 32 49" fill="none" xmlns="http://www.w3.org/2000/svg">
					  <path d="M8.90909 33.4091C8.27803 33.4091 7.74868 33.1953 7.32105 32.7676C6.89341 32.34 6.68034 31.8114 6.68182 31.1818V26.7273C7.31288 26.7273 7.84223 26.5135 8.26987 26.0858C8.6975 25.6582 8.91058 25.1296 8.90909 24.5C8.90909 23.8689 8.69527 23.3396 8.26764 22.912C7.84 22.4843 7.3114 22.2712 6.68182 22.2727V17.8182C6.68182 17.1871 6.89564 16.6578 7.32328 16.2301C7.75091 15.8025 8.27952 15.5894 8.90909 15.5909H22.2727C22.9038 15.5909 23.4331 15.8047 23.8608 16.2324C24.2884 16.66 24.5015 17.1886 24.5 17.8182V22.2727C23.8689 22.2727 23.3396 22.4865 22.912 22.9142C22.4843 23.3418 22.2712 23.8704 22.2727 24.5C22.2727 25.1311 22.4865 25.6604 22.9142 26.088C23.3418 26.5157 23.8704 26.7288 24.5 26.7273V31.1818C24.5 31.8129 24.2862 32.3422 23.8585 32.7699C23.4309 33.1975 22.9023 33.4106 22.2727 33.4091H8.90909ZM15.5909 30.0682C15.8879 30.0682 16.1477 29.9568 16.3705 29.7341C16.5932 29.5114 16.7045 29.2515 16.7045 28.9545C16.7045 28.6576 16.5932 28.3977 16.3705 28.175C16.1477 27.9523 15.8879 27.8409 15.5909 27.8409C15.2939 27.8409 15.0341 27.9523 14.8114 28.175C14.5886 28.3977 14.4773 28.6576 14.4773 28.9545C14.4773 29.2515 14.5886 29.5114 14.8114 29.7341C15.0341 29.9568 15.2939 30.0682 15.5909 30.0682ZM15.5909 25.6136C15.8879 25.6136 16.1477 25.5023 16.3705 25.2795C16.5932 25.0568 16.7045 24.797 16.7045 24.5C16.7045 24.203 16.5932 23.9432 16.3705 23.7205C16.1477 23.4977 15.8879 23.3864 15.5909 23.3864C15.2939 23.3864 15.0341 23.4977 14.8114 23.7205C14.5886 23.9432 14.4773 24.203 14.4773 24.5C14.4773 24.797 14.5886 25.0568 14.8114 25.2795C15.0341 25.5023 15.2939 25.6136 15.5909 25.6136ZM15.5909 21.1591C15.8879 21.1591 16.1477 21.0477 16.3705 20.825C16.5932 20.6023 16.7045 20.3424 16.7045 20.0455C16.7045 19.7485 16.5932 19.4886 16.3705 19.2659C16.1477 19.0432 15.8879 18.9318 15.5909 18.9318C15.2939 18.9318 15.0341 19.0432 14.8114 19.2659C14.5886 19.4886 14.4773 19.7485 14.4773 20.0455C14.4773 20.3424 14.5886 20.6023 14.8114 20.825C15.0341 21.0477 15.2939 21.1591 15.5909 21.1591ZM4.45455 49C3.22955 49 2.1805 48.5634 1.30741 47.6904C0.434322 46.8173 -0.00148107 45.769 3.78145e-06 44.5454V4.45455C3.78145e-06 3.22955 0.436549 2.1805 1.30964 1.30741C2.18273 0.434322 3.23103 -0.00148107 4.45455 3.78145e-06H26.7273C27.9523 3.78145e-06 29.0013 0.436549 29.8744 1.30964C30.7475 2.18273 31.1833 3.23103 31.1818 4.45455V44.5454C31.1818 45.7705 30.7453 46.8195 29.8722 47.6926C28.9991 48.5657 27.9508 49.0015 26.7273 49H4.45455ZM4.45455 37.8636H26.7273V11.1364H4.45455V37.8636Z" fill="#C42128"/>
					</svg>
				</span>
				<h4>Online<br>Booking</h4>
			</li>
		</ul>
	</div>
</section>


<section class="achievements-sec py-3 py-md-5">
	<div class="container">
		<div class="d-flex align-items-center justify-content-center mb-4">
			<h2 class="title">EstateOn Achievements</h2>
		</div>
		<div class="row position-relative">
			<div class="col-12 col-md-3 mb-3 mb-md-4">
				<div class="achievements-sec-img">
					
				</div>
			</div>
			<div class="col-12 col-md-3 mb-3 mb-md-4">
				<div class="achievements-sec-img">
					
				</div>
			</div>
			<div class="col-12 col-md-3 mb-3 mb-md-4">
				<div class="achievements-sec-img">
					
				</div>
			</div>
			<div class="col-12 col-md-3 mb-3 mb-md-4">
				<div class="achievements-sec-img">
					
				</div>
			</div>
			<div class="col-12 col-md-6 mb-3 mb-md-4">
				<div class="achievements-sec-img2">
					
				</div>
			</div>
			<div class="col-12 col-md-6 mb-3 mb-md-4">
				<div class="achievements-sec-img2">
					
				</div>
			</div>
			
			<div class="social-share-box">
				<div class="social-share">
					<h3>Follow Us</h3>
					<ul>
						<li>
							<!-- Facebook -->
							<a href="https://www.facebook.com/sharer/sharer.php?u=https://estateon.com/detail/1bhk-flat-for-rent-in-new-delhi-nr-janakpuri-west" target="_blank" rel="noopener">
								<svg width="47" height="47" viewBox="0 0 47 47" fill="none" xmlns="http://www.w3.org/2000/svg">
								  <path d="M43.0833 23.5C43.0833 12.69 34.31 3.91663 23.5 3.91663C12.69 3.91663 3.91667 12.69 3.91667 23.5C3.91667 32.9783 10.6533 40.8704 19.5833 42.6916V29.375H15.6667V23.5H19.5833V18.6041C19.5833 14.8245 22.6579 11.75 26.4375 11.75H31.3333V17.625H27.4167C26.3396 17.625 25.4583 18.5062 25.4583 19.5833V23.5H31.3333V29.375H25.4583V42.9854C35.3479 42.0062 43.0833 33.6637 43.0833 23.5Z" fill="#C42128"></path>
								</svg>
							</a>
						</li>
						<li>
							<!-- Twitter -->
							<a href="https://twitter.com/intent/tweet?url=https://estateon.com/detail/1bhk-flat-for-rent-in-new-delhi-nr-janakpuri-west&amp;text=1bhk-flat-for-rent-in-new-delhi-nr-janakpuri-west" target="_blank" rel="noopener">
								<svg width="48" height="47" viewBox="0 0 48 47" fill="none" xmlns="http://www.w3.org/2000/svg">
								  <path d="M36.41 4.40625H43.026L28.572 20.5821L45.576 42.5938H32.26L21.832 29.2438L9.9 42.5938H3.28L18.74 25.2919L2.43 4.40625H16.08L25.506 16.6086L36.406 4.40625H36.41ZM34.088 38.7163H37.754L14.09 8.08008H10.156L34.088 38.7163Z" fill="#C42128"></path>
								</svg>
							</a>
						</li>
						<li>
							<!-- Whatsapp -->
							<a href="https://api.whatsapp.com/send?text=Check out this link: https://estateon.com/detail/1bhk-flat-for-rent-in-new-delhi-nr-janakpuri-west" target="_blank" rel="noopener">
								<svg width="48" height="47" viewBox="0 0 48 47" fill="none" xmlns="http://www.w3.org/2000/svg">
								  <path d="M38.1 9.61537C36.2664 7.80181 34.0824 6.36389 31.6753 5.38547C29.2682 4.40705 26.6862 3.90773 24.08 3.91662C13.16 3.91662 4.26 12.6312 4.26 23.3237C4.26 26.7508 5.18 30.08 6.9 33.0175L4.1 43.0833L14.6 40.3808C17.5 41.9279 20.76 42.7504 24.08 42.7504C35 42.7504 43.9 34.0358 43.9 23.3433C43.9 18.1537 41.84 13.2775 38.1 9.61537ZM24.08 39.4604C21.12 39.4604 18.22 38.677 15.68 37.2083L15.08 36.8558L8.84 38.4616L10.5 32.5083L10.1 31.9012C8.45549 29.3299 7.58228 26.3576 7.58 23.3237C7.58 14.4329 14.98 7.18704 24.06 7.18704C28.46 7.18704 32.6 8.8712 35.7 11.9262C37.235 13.4223 38.4514 15.2018 39.2788 17.1617C40.1062 19.1215 40.5281 21.2226 40.52 23.3433C40.56 32.2341 33.16 39.4604 24.08 39.4604ZM33.12 27.397C32.62 27.162 30.18 25.987 29.74 25.8108C29.28 25.6541 28.96 25.5758 28.62 26.0458C28.28 26.5354 27.34 27.632 27.06 27.9454C26.78 28.2783 26.48 28.3175 25.98 28.0629C25.48 27.8279 23.88 27.2991 22 25.6541C20.52 24.3616 19.54 22.7754 19.24 22.2858C18.96 21.7962 19.2 21.5416 19.46 21.287C19.68 21.0716 19.96 20.7191 20.2 20.445C20.44 20.1708 20.54 19.9554 20.7 19.642C20.86 19.3091 20.78 19.035 20.66 18.8C20.54 18.565 19.54 16.1758 19.14 15.1966C18.74 14.2566 18.32 14.3741 18.02 14.3545H17.06C16.72 14.3545 16.2 14.472 15.74 14.9616C15.3 15.4512 14.02 16.6262 14.02 19.0154C14.02 21.4045 15.8 23.7154 16.04 24.0287C16.28 24.3616 19.54 29.2575 24.5 31.3529C25.68 31.862 26.6 32.1558 27.32 32.3712C28.5 32.7433 29.58 32.6845 30.44 32.567C31.4 32.43 33.38 31.392 33.78 30.2562C34.2 29.1204 34.2 28.1608 34.06 27.9454C33.92 27.73 33.62 27.632 33.12 27.397Z" fill="#C42128"></path>
								</svg>
							</a>
						</li>
						<li>
							<!-- Instagram -->
							<a href="https://www.instagram.com/?url=https://estateon.com/detail/1bhk-flat-for-rent-in-new-delhi-nr-janakpuri-west" target="_blank" rel="noopener">
								<svg width="48" height="47" viewBox="0 0 48 47" fill="none" xmlns="http://www.w3.org/2000/svg">
								  <path d="M15.6 3.91663H32.4C38.8 3.91663 44 9.00829 44 15.275V31.725C44 34.7374 42.7779 37.6264 40.6024 39.7565C38.427 41.8866 35.4765 43.0833 32.4 43.0833H15.6C9.2 43.0833 4 37.9916 4 31.725V15.275C4 12.2625 5.22214 9.37351 7.39756 7.24341C9.57298 5.1133 12.5235 3.91663 15.6 3.91663ZM15.2 7.83329C13.2904 7.83329 11.4591 8.57606 10.1088 9.89819C8.75857 11.2203 8 13.0135 8 14.8833V32.1166C8 36.0137 11.22 39.1666 15.2 39.1666H32.8C34.7096 39.1666 36.5409 38.4239 37.8912 37.1017C39.2414 35.7796 40 33.9864 40 32.1166V14.8833C40 10.9862 36.78 7.83329 32.8 7.83329H15.2ZM34.5 10.7708C35.163 10.7708 35.7989 11.0287 36.2678 11.4878C36.7366 11.9468 37 12.5695 37 13.2187C37 13.8679 36.7366 14.4906 36.2678 14.9496C35.7989 15.4087 35.163 15.6666 34.5 15.6666C33.837 15.6666 33.2011 15.4087 32.7322 14.9496C32.2634 14.4906 32 13.8679 32 13.2187C32 12.5695 32.2634 11.9468 32.7322 11.4878C33.2011 11.0287 33.837 10.7708 34.5 10.7708ZM24 13.7083C26.6522 13.7083 29.1957 14.7399 31.0711 16.5762C32.9464 18.4125 34 20.903 34 23.5C34 26.0969 32.9464 28.5874 31.0711 30.4237C29.1957 32.26 26.6522 33.2916 24 33.2916C21.3478 33.2916 18.8043 32.26 16.9289 30.4237C15.0536 28.5874 14 26.0969 14 23.5C14 20.903 15.0536 18.4125 16.9289 16.5762C18.8043 14.7399 21.3478 13.7083 24 13.7083ZM24 17.625C22.4087 17.625 20.8826 18.2439 19.7574 19.3457C18.6321 20.4475 18 21.9418 18 23.5C18 25.0581 18.6321 26.5524 19.7574 27.6542C20.8826 28.756 22.4087 29.375 24 29.375C25.5913 29.375 27.1174 28.756 28.2426 27.6542C29.3679 26.5524 30 25.0581 30 23.5C30 21.9418 29.3679 20.4475 28.2426 19.3457C27.1174 18.2439 25.5913 17.625 24 17.625Z" fill="#C42128"></path>
								</svg>
							</a>
						</li>
						<li>
							<!-- LinkedIn -->
							<a href="https://www.linkedin.com/sharing/share-offsite/?url=https://estateon.com/detail/1bhk-flat-for-rent-in-new-delhi-nr-janakpuri-west" target="_blank" rel="noopener">
								<svg width="47" height="47" viewBox="0 0 47 47" fill="none" xmlns="http://www.w3.org/2000/svg">
								  <path d="M13.5908 9.79167C13.5903 10.8304 13.1772 11.8265 12.4423 12.5606C11.7074 13.2948 10.711 13.7069 9.67222 13.7064C8.63345 13.7059 7.63744 13.2927 6.90329 12.5578C6.16914 11.8229 5.75699 10.8265 5.75751 9.78776C5.75803 8.74899 6.17117 7.75298 6.90606 7.01883C7.64094 6.28468 8.63737 5.87253 9.67613 5.87305C10.7149 5.87357 11.7109 6.28671 12.4451 7.0216C13.1792 7.75648 13.5914 8.75291 13.5908 9.79167ZM13.7083 16.6067H5.87501V41.125H13.7083V16.6067ZM26.085 16.6067H18.2908V41.125H26.0067V28.2588C26.0067 21.0913 35.3479 20.4254 35.3479 28.2588V41.125H43.0833V25.5954C43.0833 13.5125 29.2575 13.9629 26.0067 19.8967L26.085 16.6067Z" fill="#C42128"></path>
								</svg>
							</a>
						</li>
					</ul>
				</div>
			</div>
			
		</div>
	</div>
</section>


<section class="our-blog-sec py-3 py-md-5">
	<div class="container">
		<div class="d-flex align-items-center justify-content-center mb-4">
			<h2 class="title">Blogs</h2>
		</div>
		
		<div class="swiper mySwiper">
		<div class="swiper-wrapper pb-4">
		@foreach($data['blogs'] as $blog)
		  <div class="swiper-slide">
			<div class="blog-box">
				<a href="{{ $blog->link }}" target="_blank" class="blog-box-img">
					<img src="{{ asset('storage/' . $blog->image) }}" alt="no-property" class="mx-auto no-property-img d-block" />
				</a>
				<div class="blog-box-con">
					<h4>{{$blog->title}}</h4>
					{!! $blog->description !!}
				</div>
			</div>
		  </div>
		  @endforeach
		  
		</div>
		<div class="swiper-pagination"></div>
	  </div>
		
	</div>
</section>



<script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
<script>
    var swiper = new Swiper(".mySwiper", {
      slidesPerView: 1,
      spaceBetween: 0,
      pagination: {
        el: ".swiper-pagination",
        clickable: true,
      },
      breakpoints: {
        640: {
          slidesPerView: 2,
          spaceBetween: 0,
        },
        768: {
          slidesPerView: 3,
          spaceBetween: 0,
        },
        1024: {
          slidesPerView: 3,
          spaceBetween: 0,
        },
      },
    });
  </script>

@endsection
@section('scripts')
<script>
  $(document).ready(function(){
    jQuery(".v_slides").slick({
        infinite: true,
        autoplay: true,
        dots: false,
        autoplaySpeed: 3000,
        slidesToShow: 4,
        slidesToScroll: 1,
        speed: 500,
        arrows: true,
        prevArrow:
          "<button type='button' class='slick-prev slide-btn'><i class='fas fa-chevron-left' aria-hidden='true'></i></button>",
        nextArrow:
          "<button type='button' class='slick-next slide-btn'><i class='fas fa-chevron-right' aria-hidden='true'></i></button>",
      });
  })
 </script>
@endsection