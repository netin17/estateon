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
                <h3>Help&Support</h3>
            </div>
            <div class="line1">

            </div>
        </div>

    </section>




    <section class="contact-sec py-5">
        <div class="container cont-bg">
            <div class="col-md-12 pt-5 ps-5">
                <h1 class="text-white">Contact Us</h1>
                <p class="text-white">Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique dolorum sit in.
                </p>
            </div>
            <div class="row cont-icon pt-3 ps-5">
                <div class="col-md-4">
                    <a class="con-txt text-white"><i class="fa-solid fa-location-dot"></i>
                        Sector 117, TDI Airport Road Mohali India 160055</a>
                </div>
                <div class="col-md-4">
                    <a class="con-txt text-white" href="tel:+6494461709"> <i class="fa-solid fa-location-dot"></i>
                        91+ 123456789</a>
                </div>
                <div class="col-md-4">
                    <a class="con-txt text-white" href="mailto:EstateOn@gmail"><i class="fa-solid fa-location-dot"></i>
                        EstateOn@gmail</a>
                </div>
            </div>
            <div class="col-md-12">
                <div class="row py-3 px-5">
                    <div class="col-md-12 p-4">
                        <!--Google map-->
                        <div id="map-container-google-1" class="z-depth-1-half map-container"
                            style="width: 100%; height: auto">
                            <iframe src="https://maps.google.com/maps?q=manhatan&t=&z=13&ie=UTF8&iwloc=&output=embed"
                                frameborder="0" style="border:0" allowfullscreen></iframe>
                        </div>

                        <!--Google Maps-->
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <ul class="unordered d-flex justify-content-between align-items-center list-unstyled">
                        <li class="list second-last list-s"><a href="#" class="footer-btn map-btn"><span><img
                                        src="./assets/img/Icons/Apple.png" alt="" width="30px"></span>App Store</a></li>
                        <li class="list"><a href="#" class="footer-btn map-btn"><span><img
                                        src="./assets/img/Icons/play-store.png" alt="" width="30px"></span>App Store</a>
                        </li>

                    </ul>

                </div>
                <div class="col-md-8 text-end">
                    <a class="btn  circle" href="#!" role="button"> <img
                            src="./assets/img/Icons/3146791_social_logo_chat_app_green_dialog_whatsapp.png" alt=""></a>

                    <!-- Twitter -->
                    <a class="btn  circle" href="#!" role="button"> <img
                            src="./assets/img/Icons/3225183_twitter_logo_popular_social_app_media.png" alt=""></a>


                    <!-- Instagram -->
                    <a class="btn  circle" href="#!" role="button"> <img
                            src="./assets/img/Icons/3225191_social_instagram_media_app_popular_logo.png" alt=""></a>

                    <!-- Whatsapp -->
                    <a class="btn  circle" href="#!" role="button"> <img
                            src="./assets/img/Icons/3225194_app_logo_popular_social_facebook_media.png" alt=""></a>

                </div>
            </div>
        </div>

    </section>



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
    <script src="{{ asset('userfront//OwlCarousel/owl.carousel.min.js') }}"></script>
    <!-- <script src="assets/js/main.js"></script> -->
    <script src="{{ asset('userfront/assets/js/demoad.js') }}"></script>
</body>

</html>