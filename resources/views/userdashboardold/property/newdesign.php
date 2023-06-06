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
    <!-- <link rel="stylesheet" href="{{ asset('userfront/css/about.css') }}"> -->
    <!-- <link rel="stylesheet" href="{{ asset('userfront/css/details.css') }}"> -->
    <link rel="stylesheet" href="{{ asset('userfront/css/image-uploader.css') }}">




</head>

<body>
    <header class="header-wrapper">
        <nav class="navbar navbar-expand-lg navbar-light  mt-3">
            <div class="container">
                <a class="navbar-brand" href="#">
                    <img src="{{ asset('userfront/img/Estate On Logo.png')}}" alt="logo-img">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 menu-navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./propertylist.html">Properties</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Our Agents</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                More
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="#">Action</a></li>
                                <li><a class="dropdown-item" href="#">Another action</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="#">Something else here</a></li>
                            </ul>
                        </li>
                    </ul>
                    <ul class="navbar-nav">
                        <li class="nav-item text-center">
                            <a class="nav-link nav-btn" href="#">EstateOn Prime</a>
                        </li>
                        <li class="nav-item text-center">
                            <a class="nav-link nav-btn" href="#">{{auth::user()->name}}</a>
                        </li>
                    </ul>

                </div>
            </div>
        </nav>

        <div class="line">
            <div class="line1">

            </div>
            <div class="line-text">
                <h4>Sell/Rent Property</h4>
            </div>
            <div class="line-text-sty">

            </div>
        </div>

    </header>


    <section class="prop-inform py-5">
        <div class="container">
            <h3 class="prop-txt">Add Basic Property information <span class="prop-img"><img
                        src="{{ asset('userfront/img/Icons/Basic-Information.png') }}" alt=""></span>
            </h3>
            <form action="{{ route("frontuser.property.store") }}" method="POST" enctype="multipart/form-data">
                @csrf
            <div class="prop-box">
                <div class="row">
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-12">
                                <h6 class="head-txt">I Want </h6>
                            </div>
                        </div>
                        <div class="row">
                            
                            <div class="col-md-4">

                            <input type="radio" id="rent" name="type" value="rent" required>
                                <label for="male">Rent</label>
                                
                            </div>
                            <div class="col-md-4">
                            <input type="radio" id="sale" name="type" value="sale" required>
                                <label for="female">Sale</label><br>
                            </div>
                            <div class="col-md-4"></div>
                        </div>
                    </div>
                    <div class="col-md-6">

                    </div>
                </div>
                <form class="row  gx-6 gy-4  pt-5">

                    <div class="col-md-6">
                        <label for="inputState" class="form-label">Properties Category</label>
                        <select id="property_category" name="property_category" class="form-control select2" required>
                                            <option value="residential">Residential</option>
                                            <option value="commercial">Commercial</option>                    
                                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="inputState" class="form-label">Properties house</label>
                        <select id="inputState" class="form-select form-control-lg rounded-0">
                            <option selected>Guest house</option>
                            <option>...</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="inputState" class="form-label">Properties Feature</label>
                        <select id="inputState" class="form-select form-control-lg rounded-0">
                            <option selected>Text here</option>
                            <option>...</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="inputState" class="form-label">Properties Name or Title</label>
                        <select id="inputState" class="form-select form-control-lg rounded-0">
                            <option selected>Text here</option>
                            <option>...</option>
                        </select>
                    </div>
                </form>
            </div>

       
            </form>
</div>

    </section>

    <section class="prop-inform py-5">
        <div class="container">
            <h3 class="prop-txt">Add Basic Property information <span class="prop-img"><img
                        src="{{ asset('userfront/img/Icons/Location-Details.png') }}" alt=""></span>
            </h3>

            <div class="prop-box">
                <div class="row align-items-center">
                    <div class="col-md-6  ">
                        <div class="mb-3">
                            <label for="formGroupExampleInput" class="form-label">Properties Map Location</label>
                            <input type="text" class="form-control form-control-lg" id="formGroupExampleInput"
                                placeholder="Properties Map Location">
                        </div>
                        <div class="mb-3">
                            <label for="formGroupExampleInput2" class="form-label">Locality or landmark</label>
                            <input type="text" class="form-control form-control-lg" id="formGroupExampleInput2"
                                placeholder="">
                        </div>
                    </div>
                    <div class="col-md-6 d-flex justify-content-end">
                        <!--Google map-->
                        <div id="map-container-google-1" class="z-depth-1-half map-container"
                            style="width: 400px; height: 400px">
                            <iframe src="https://maps.google.com/maps?q=manhatan&t=&z=13&ie=UTF8&iwloc=&output=embed"
                                frameborder="0" style="border:0" allowfullscreen></iframe>
                        </div>

                        <!--Google Maps-->
                    </div>
                </div>
            </div>
        </div>

    </section>

    <section class="prop-inform py-5">
        <div class="container">
            <h3 class="prop-txt">Add Basic Property information <span class="prop-img"><img
                        src="{{ asset('userfront/img/Icons/Property-Profile.png') }}" alt=""></span>
            </h3>

            <div class="prop-box">
                <form class="row  gx-6 gy-4">
                    <div class="col-md-6 mb-3">
                        <label for="formGroupExampleInput" class="form-label">Example label</label>
                        <input type="text" class="form-control" id="formGroupExampleInput"
                            placeholder="Example input placeholder">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="formGroupExampleInput2" class="form-label">Another label</label>
                        <input type="text" class="form-control" id="formGroupExampleInput2"
                            placeholder="Another input placeholder">
                    </div>
                    <div class="col-md-6">
                        <label for="inputState" class="form-label">Properties Category</label>
                        <select id="inputState" class="form-select form-control-lg rounded-0">
                            <option selected>Residental</option>
                            <option>...</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="inputState" class="form-label">Properties house</label>
                        <select id="inputState" class="form-select form-control-lg rounded-0">
                            <option selected>Guest house</option>
                            <option>...</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="inputState" class="form-label">Properties Feature</label>
                        <select id="inputState" class="form-select form-control-lg rounded-0">
                            <option selected>Text here</option>
                            <option>...</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="inputState" class="form-label">Properties Name or Title</label>
                        <select id="inputState" class="form-select form-control-lg rounded-0">
                            <option selected>Text here</option>
                            <option>...</option>
                        </select>
                    </div>
                    <div class="col-md-12">
                        <h4>Ameneties & Other preferences</h4>
                    </div>
                    @foreach($data['amenity'] as $amenities)
                    <div class="col-md-4">
                        <div class="form-check">
                            <input class="form-check-input" name="amenities[]" type="checkbox" value="{{ $amenities['id'] }}" id="gridCheck">
                            <label class="form-check-label" for="gridCheck">
                            {{ $amenities['name'] }}
                            </label>
                        </div>
                    </div>
                    @endforeach
                    @foreach($data['preferences'] as $preference)
                    <div class="col-md-4">
                        <div class="form-check">
                            <input class="form-check-input"  name="additional[]" type="checkbox" value="{{ $preference['id'] }}" id="gridCheck">
                            <label class="form-check-label" for="gridCheck">
                            {{ $preference['name'] }}
                            </label>
                        </div>
                    </div>
                    @endforeach
                   
                </form>
            </div>
        </div>

    </section>


    <section class="prop-inform py-5">
        <div class="container">
            <h3 class="prop-txt">Add Basic Property information <span class="prop-img"><img
                        src="{{ asset('userfront/img/Icons/Image-Section.png') }}" alt=""></span>
            </h3>

            <div class="prop-box">
                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            <!-- <div class="col-md-12"> -->
                                <div class="input-field col-md-12">
                                <h6 class="head-txt">Add minimum 5 photos</h6>
                                    <div class="input-images-1" style="padding-top: .5rem;"></div>
                                </div>

                            <!-- </div> -->
                        </div>

                    </div>

                </div>

            </div>

    </section>


    <section class="prop-inform py-5">
        <div class="container">
            <h3 class="prop-txt">Add Basic Property information <span class="prop-img"><img
                        src="{{ asset('userfront/img/Icons/Pricing-&-Others.png') }}" alt=""></span>
            </h3>

            <div class="prop-box">
                <form class="row  gx-6 gy-4">
                    <div class="col-md-6 mb-3">
                        <label for="formGroupExampleInput" class="form-label">Example label</label>
                        <input type="text" class="form-control" id="formGroupExampleInput" placeholder="">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="formGroupExampleInput2" class="form-label">Another label</label>
                        <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="">
                    </div>
                    <div class="col-md-12 mb-3">
                        <div class="form-outline">
                            <label class="form-label" for="textAreaExample">Message</label>
                            <textarea class="form-control" id="textAreaExample1" rows="6"></textarea>
                        </div>

                    </div>

               
            </div>
        </div>

    </section>


    <section class="publish-sec">
        <div class="container text-center">
            <a href="#" class="btn publish-btn">Publish</a>
        </div>
    </section>
    </form>

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

                    <!-- Facebook -->
                    <a class="btn  circle" href="#!" role="button"> <img
                            src="{{ asset('userfront/img/Icons/3146791_social_logo_chat_app_green_dialog_whatsapp.png') }}" alt=""></a>

                    <!-- Twitter -->
                    <a class="btn  circle" href="#!" role="button"> <img
                            src="{{ asset('userfront/img/Icons/3225183_twitter_logo_popular_social_app_media.png') }}" alt=""></a>


                    <!-- Instagram -->
                    <a class="btn  circle" href="#!" role="button"> <img
                            src="{{ asset('userfront/img/Icons/3225191_social_instagram_media_app_popular_logo.png') }}" alt=""></a>

                    <!-- Whatsapp -->
                    <a class="btn  circle" href="#!" role="button"> <img
                            src="{{ asset('userfront/img/Icons/3225194_app_logo_popular_social_facebook_media.png') }}" alt=""></a>

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

</body>

</html>