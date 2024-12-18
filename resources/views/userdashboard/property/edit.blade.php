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
                {{-- <li class="nav-item">
                    <a href="{{ route('frontuser.handp.show') }}" class="nav-link "><img src="./assets/img/Icons/Help-&-Support.png" alt=""
                            class="img-fluid profile" width="30px">Help & Support</a>
                </li> 
                <li class="nav-item">
                    <a href="{{ route('frontuser.faq.show') }}" class="nav-link"><img src="./assets/img/Icons/FAQ.png" alt=""
                            class="img-fluid profile" width="30px">FAQ</a>
                </li>--}}
            </ul>

        </div>

    </section>



    <section class="user-design">
        <div class="line">
            <div class="line1">

            </div>
            <div class="line-text">
                <h4>Update Property</h4>
            </div>
            <div class="line1">

            </div>
        </div>

    </section>

    <section class="add_pprty space">
        <div class="container">
            <form action="{{ route("frontuser.property.update", [$data['property']->id]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-12">
                        <div class="wht_box">
                            <!-- <h4 class="mb-3">Add Basic Property Information</h4> -->
                            <div class="row">
                                <div class="col-lg-12 col-md-12">
                                    <div class="form-group">
                                        <label for="property-name" class="text-heading">Property Name</label>
                                        <input id="name-input" name="name" class="form-control" value="{{$data['property']->name}}" required>
                                        @if($errors->has('name'))
                                        <em class="invalid-feedback">
                                            {{ $errors->first('name') }}
                                        </em>
                                        @endif
                                        <p class="helper-block">
                                            {{ trans('cruds.user.fields.email_helper') }}
                                        </p>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12">
                                    <div class="form-group">
                                        <label for="property-loc" class="text-heading">Property Location</label>
                                        <input type="text" id="address-input" name="address" class="form-control map-input" value="{{$data['property']->address}}" required>
                                        @if($errors->has('address'))
                                        <em class="invalid-feedback">
                                            {{ $errors->first('address') }}
                                        </em>
                                        @endif
                                        <p class="helper-block">
                                            {{ trans('cruds.user.fields.email_helper') }}
                                        </p>
                                    </div>
                                    <div hidden class="form-group {{ $errors->has('lat') ? 'has-error' : '' }}">
                                        <input type="hidden" id="address-latitude" name="lat" class="form-control" value="{{$data['property']->lat}}">
                                    </div>
                                    <div hidden class="form-group {{ $errors->has('lng') ? 'has-error' : '' }}">
                                        <input type="hidden" id="address-longitude" name="lng" class="form-control" value="{{$data['property']->lng}}">
                                    </div>
                                    <div id="address-map-container" style="width:100%;height:400px; ">
                                        <div style="width: 100%; height: 100%" id="address-map"></div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group {{ $errors->has('location') ? 'has-error' : '' }}">
                                        <label for="location">Location*</label>
                                        <input type="text" id="location" name="location" class="form-control map-input" value="{{$data['property']->location}}" required>
                                        @if($errors->has('location'))
                                        <em class="invalid-feedback">
                                            {{ $errors->first('location') }}
                                        </em>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group mb-0">
                                        <label for="property-descr" class="text-heading">{{ trans('cruds.property.fields.description') }}</label>
                                        <textarea class="form-control" id="description" name="description" rows="3" required>{{$data['property']->description}}</textarea>
                                        @if($errors->has('description'))
                                        <em class="invalid-feedback">
                                            {{ $errors->first('description') }}
                                        </em>
                                        @endif
                                        <p class="helper-block">
                                            {{ trans('cruds.property.fields.description_helper') }}
                                        </p>
                                    </div>
                                </div>

                                <!-- <div class="col-md-12">
                                    <div class="form-group mb-0">
                                        <label for="property-descr" class="text-heading">{{trans('cruds.property.fields.note') }}</label>
                                        <textarea id="notes" name="notes" class="form-control" rows="3" required></textarea>
                                        @if($errors->has('notes'))
                                        <em class="invalid-feedback">
                                            {{ $errors->first('notes') }}
                                        </em>
                                        @endif
                                        <p class="helper-block">
                                            {{ trans('cruds.property.fields.note_helper') }}
                                        </p>
                                    </div>
                                </div> -->
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12 mt-4">
                        <div class="wht_box">
                            <h4 class="mb-3">Select Property Type/Price</h4>
                            <div class="row">
                                <div class="col-lg-12">
                                <div class="form-inline col-6">
                                <input type="radio" id="rent" name="type" value="rent" {{$data['property']->type=='rent'? 'checked':''}} required>
                                <label for="male">Rent</label><br>
                                <input type="radio" id="sale" name="type" value="sale" {{$data['property']->type=='sale'? 'checked':''}} required>
                                <label for="female">Sale</label><br>
                                </div>
                                </div>
                                <div class="col-lg-4 col-md-6">
                                    <div class="form-group">
                                        <label for="price" class="text-heading">Price</label>
                                        <input type="number" id="price" name="price" min="1" class="form-control" value="{{$data['property']->property_details['price']}}" required>
                                        @if($errors->has('price'))
                                        <em class="invalid-feedback">
                                            {{ $errors->first('price') }}
                                        </em>
                                        @endif
                                        <p class="helper-block">
                                            {{ trans('cruds.property.fields.price_helper') }}
                                        </p>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6">
                                    <div class="form-group">
                                        <label for="size" class="text-heading">Size</label>
                                        <input type="text" id="size" name="size" class="form-control only-numbers" value="{{$data['property']->property_details['size']}}" required>
                                        @if($errors->has('size'))
                                        <em class="invalid-feedback">
                                            {{ $errors->first('size') }}
                                        </em>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6">
                                    <div class="form-group">
                                        <label for="length" class="text-heading">Length</label>
                                        <input type="text" id="length" name="length" class="form-control only-numbers" value="{{$data['property']->property_details['length']}}" required>
                                        @if($errors->has('length'))
                                        <em class="invalid-feedback">
                                            {{ $errors->first('length') }}
                                        </em>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6">
                                    <div class="form-group">
                                        <label for="width" class="text-heading">Width</label>
                                        <input type="text" id="width" name="width" class="form-control only-numbers" value="{{$data['property']->property_details['width']}}" required>
                                        @if($errors->has('width'))
                                        <em class="invalid-feedback">
                                            {{ $errors->first('width') }}
                                        </em>
                                        @endif
                                    </div>
                                </div>

                                <!-- <div class="col-lg-4 col-md-6">
                                    <div class="form-group">
                                        <label for="bedroom" class="text-heading">Bedroom</label>
                                        <input type="number" id="bedroom" name="bedroom" min="1" class="form-control">
                                        @if($errors->has('bedroom'))
                                        <em class="invalid-feedback">
                                            {{ $errors->first('bedroom') }}
                                        </em>
                                        @endif
                                        <p class="helper-block">
                                            {{ trans('cruds.property.fields.bedroom_helper') }}
                                        </p>
                                    </div>
                                </div> -->
                                <!-- <div class="col-lg-4 col-md-6">
                                    <div class="form-group">
                                        <label for="Bathroom" class="text-heading">Bathroom</label>
                                        <input type="number" id="bathroom" name="bathroom" min="1" class="form-control">
                                        @if($errors->has('bathroom'))
                                        <em class="invalid-feedback">
                                            {{ $errors->first('bathroom') }}
                                        </em>
                                        @endif
                                        <p class="helper-block">
                                            {{ trans('cruds.property.fields.bathroom_helper') }}
                                        </p>
                                    </div>
                                </div> -->
                                <!-- <div class="col-lg-4 col-md-6">
                                    <div class="form-group">
                                        <label for="Balcony" class="text-heading">Balcony</label>
                                        <input type="number" id="balcony" name="balcony" min="1" class="form-control">
                                        @if($errors->has('balcony'))
                                        <em class="invalid-feedback">
                                            {{ $errors->first('balcony') }}
                                        </em>
                                        @endif
                                        <p class="helper-block">
                                            {{ trans('cruds.property.fields.balcony_helper') }}
                                        </p>
                                    </div>
                                </div> -->
                                <!-- <div class="col-lg-4 col-md-6">
                                    <div class="form-group">
                                        <label for="Kitchen" class="text-heading">Kitchen</label>
                                        <input type="number" id="kitchen" name="kitchen" min="1" class="form-control">
                                        @if($errors->has('kitchen'))
                                        <em class="invalid-feedback">
                                            {{ $errors->first('kitchen') }}
                                        </em>
                                        @endif
                                        <p class="helper-block">
                                            {{ trans('cruds.property.fields.kitchen_helper') }}
                                        </p>
                                    </div>
                                </div> -->
                                <div class="col-lg-4 col-md-6">
                                    <div class="form-group">
                                        <label for="pcategory" class="text-heading">Property Category</label>
                                        <!-- <input type="text" id="pcategory" name="property_category" class="form-control" value="{{$data['property']->property_details['property_category']}}" required> -->
                                        <select id="property_category" name="property_category" class="form-control select2" required>
                                            <option value="residential" {{$data['property']->property_details['property_category']=='residential' ? 'selected':''}}>Residential</option>
                                            <option value="commercial" {{$data['property']->property_details['property_category']=='commercial' ? 'selected':''}}>Commercial</option>                    
                                        </select>
                                        @if($errors->has('property_category'))
                                        <em class="invalid-feedback">
                                            {{ $errors->first('property_category') }}
                                        </em>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6">
                                    <div class="form-group">
                                        <label for="pfeature" class="text-heading">Property Feature</label>
                                        <input type="text" id="pfeature" name="property_feature" class="form-control" value="{{$data['property']->property_details['property_feature']}}" required>
                                        @if($errors->has('property_feature'))
                                        <em class="invalid-feedback">
                                            {{ $errors->first('property_feature') }}
                                        </em>
                                        @endif
                                    </div>
                                </div>                                
                                <div class="col-lg-4 col-md-6">
                                    <div class="form-group">
                                        <label for="govt_tax" class="text-heading">Govt Tax Include</label>
                                        <select name="govt_tax_include" class="form-control select2" id="govt_tax">
                                            <option value="1" {{$data['property']->property_details['govt_tax_include']=='1'? 'selected':''}}>Included</option>
                                            <option value="0" {{$data['property']->property_details['govt_tax_include']=='0'? 'selected':''}}>Not Included</option>
                                        </select>
                                        @if($errors->has('govt_tax_include'))
                                        <em class="invalid-feedback">
                                            {{ $errors->first('govt_tax_include') }}
                                        </em>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6">
                                    <div class="form-group">
                                        <label for="extra_notes" class="text-heading">Extra Notes</label>
                                        <input type="text" id="extra_notes" name="extra_notes" value="{{$data['property']->property_details['extra_notes']}}" class="form-control">
                                        @if($errors->has('extra_notes'))
                                        <em class="invalid-feedback">
                                            {{ $errors->first('extra_notes') }}
                                        </em>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6">
                                    <div class="form-group">
                                        <label for="type" class="col-12 pl-0">Furnished</label>
                                        <select name="furnished" class="form-control select2" id="type" required>
                                            <option value="furnished" {{$data['property']->property_details['furnished'] == "furnished"? 'selected': ''}}>Furnished</option>
                                            <option value="unfurnished" {{$data['property']->property_details['furnished'] == "unfurnished"? 'selected': ''}} >Un Furnished</option>
                                            <option value="semi_furnished" {{$data['property']->property_details['furnished'] == "semi_furnished"? 'selected': ''}} >Semi Furnished</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6">
                                    <div class="form-group">
                                        <label for="type" class="col-12 pl-0">Vastu</label>
                                        <select name="vastu" id="vastu" class="form-control select2" required>
                                            @foreach($data['vastu'] as $vast)
                                            <option value="{{ $vast['id'] }}" {{$data['property']->vastu['vastu_id']==$vast['id']? 'selected': ''}}>{{ $vast['name'] }}</option>
                                            @endforeach
                                        </select>
                                        @if($errors->has('vastu'))
                                        <em class="invalid-feedback">
                                            {{ $errors->first('vastu') }}
                                        </em>
                                        @endif
                                        <p class="helper-block">
                                            {{ trans('cruds.property.fields.vastu_helper') }}
                                        </p>
                                    </div>
                                </div>
                                

                                <div id="property-type-residential" class="col-lg-4 col-md-6 d-none">
                                    <div class="form-group">
                                        <label for="property_type_residential" class="col-12 pl-0">Property Type*</label>
                                        <select name="property_type" id="property_type_residential" class="form-control select2" required>
                                            @foreach($data['property_type_residential'] as $propert)
                                            <option value="{{ $propert['id'] }}" {{$data['property']->property_type['type_id']==$propert['id']? 'selected': ''}}>{{ $propert['name'] }}</option>
                                            @endforeach
                                        </select>
                                        @if($errors->has('property_type'))
                                        <em class="invalid-feedback">
                                            {{ $errors->first('property_type') }}
                                        </em>
                                        @endif
                                        <p class="helper-block">
                                            {{ trans('cruds.property.fields.vastu_helper') }}
                                        </p>
                                    </div>
                                </div>

                                <div id="property-type-commercial" class="col-lg-4 col-md-6 d-none">
                                    <div class="form-group">
                                        <label for="property_type_commercial" class="col-12 pl-0">Property Type*</label>
                                        <select name="property_type" id="property_type_commercial" class="form-control select2" required>
                                            @foreach($data['property_type_commercial'] as $propert)
                                            <option value="{{ $propert['id'] }}" {{$data['property']->property_type['type_id']==$propert['id']? 'selected': ''}}>{{ $propert['name'] }}</option>
                                            @endforeach
                                        </select>
                                        @if($errors->has('property_type'))
                                        <em class="invalid-feedback">
                                            {{ $errors->first('property_type') }}
                                        </em>
                                        @endif
                                        <p class="helper-block">
                                            {{ trans('cruds.property.fields.vastu_helper') }}
                                        </p>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="col-md-12 mt-4">
                        <div class="wht_box">
                            <h4 class="mb-3">General Amenities</h4>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="add_amenties">
                                        <select name="amenities[]" id="amenities" class="form-control select2" multiple="multiple" required>
                                            @foreach($data['amenity'] as $amenities)
                                            <option value="{{ $amenities['id'] }}" {{$data['property']->amenities->pluck('amenity_id')->contains($amenities['id']) ? 'selected' : ''}}>{{ $amenities['name'] }}</option>
                                            @endforeach
                                        </select>
                                        @if($errors->has('amenities'))
                                        <em class="invalid-feedback">
                                            {{ $errors->first('amenities') }}
                                        </em>
                                        @endif
                                        <p class="helper-block">
                                            {{ trans('cruds.property.fields.amenities_helper') }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12 mt-4">
                        <div class="wht_box">
                            <h4 class="mb-3">Pefrences</h4>
                            <div class="row">
                                <select name="additional[]" id="additional" class="form-control select2" multiple="multiple" required>
                                    @foreach($data['preferences'] as $preference)
                                    <option value="{{ $preference['id'] }}" {{$data['property']->preferences->pluck('preference_id')->contains($preference['id']) ? 'selected' : ''}}>{{ $preference['name'] }}</option>
                                    @endforeach
                                </select>
                                @if($errors->has('additional'))
                                <em class="invalid-feedback">
                                    {{ $errors->first('additional') }}
                                </em>
                                @endif
                                <p class="helper-block">
                                    {{ trans('cruds.property.fields.preferences_helper') }}
                                </p>
                            </div>
                        </div>

                        <div class="col-lg-12 text-right mt-4 mb-5">
                            <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
                        </div>
                    </div>

                </div>
            </form>
        </div>
    </section>
</div>
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
    <script src="{{ asset('userfront/js/image-uploader.js') }}"></script>

    <script>
        $('.input-images-1').imageUploader();

        </script>
        <script type="text/javascript" async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCxCC1NFlOCM9k9pI4paC8vhJytSY4t054&libraries=places&callback=initMap"></script>
        <script type="text/javascript">
            function initMap() {
              
                var map = new google.maps.Map(document.getElementById('address-map'), {
                    zoom: 10,
                  center:{lat: 20.5937, lng: 78.9629},
                    
                });

                var searchBox = new google.maps.places.SearchBox(document.getElementById('address-input'));
  //  map.controls[google.maps.ControlPosition.TOP_CENTER].push(document.getElementById('location'));
  
        var markersArray = [];

          google.maps.event.addListener(searchBox, 'places_changed', function() {
              searchBox.set('address-map', null);


                var places = searchBox.getPlaces();
                console.log(places)

                

                var bounds = new google.maps.LatLngBounds();
                var i, place;
                for (i = 0; place = places[i]; i++) {
                  (function(place) {

                    $('#address-latitude').val(place.geometry.location.lat())
                    $('#address-longitude').val(place.geometry.location.lng())

                    // var marker = new google.maps.Marker({

                    //   position: place.geometry.location
                    // });
                    // marker.bindTo('map', searchBox, 'map');
                    // google.maps.event.addListener(marker, 'map_changed', function() {
                    //   if (!this.getMap()) {
                    //     this.unbindAll();
                    //   }
                    // });
                    bounds.extend(place.geometry.location);


                  }(place));

                }


                map.fitBounds(bounds);
                searchBox.set('address-map', map);
                map.setZoom(Math.min(map.getZoom(),12));

              });

              google.maps.event.addListener(map, "click", function (e) {

                //lat and lng is available in e object                
                var latLng = e.latLng;
                console.log(latLng)                

                $('#address-latitude').val(latLng.lat())
                $('#address-longitude').val(latLng.lng())

                var marker=new google.maps.Marker({
                    position:latLng,
                    //icon:'images/pin.png',
                    //url: 'http://www.google.com/',
                    animation:google.maps.Animation.DROP
                });
                marker.setMap(map);
                clearOverlays();
                markersArray.push(marker);


                });

                function clearOverlays() {
                for (var i = 0; i < markersArray.length; i++ ) {
                markersArray[i].setMap(null);
                    }
                } 

            }

            
            

        </script>

<script src="/js/mapInput.js"></script>
<script>
    $('input[type=radio][name=type]').change(function() {
        if (this.value == 'rent') {
            console.log('Logic for entring rent duration (create and show input div)');
        } else if (this.value == 'sale') {
            console.log('Logic for removing rent duration (If created remove rent div)');
        }
    });

    $('#length').keyup(function() {        
        var width = $('#width').val();
        var length = $(this).val();
        var size = parseInt(width) * parseInt(length);
        $('#size').val(size);
    });

    $('#width').keyup(function() {        
        var width = $(this).val();
        var length = $('#length').val();
        var size = parseInt(width) * parseInt(length);
        $('#size').val(size);
    });

    $('#property_category').change(function() {   
        showPropertyType();        
    });
    showPropertyType();    
    function showPropertyType(){
        var val = $('#property_category').val();
        if(val == "commercial") {
            $('#property-type-commercial').removeClass('d-none')
            $('#property-type-residential').addClass('d-none')
        }
        if(val == "residential") {
            $('#property-type-residential').removeClass('d-none')
            $('#property-type-commercial').addClass('d-none')
        }
    }

    $('body').on('keydown','.only-numbers',function(e){
        allow_numbers_only(e)
    })

    function allow_numbers_only(e){
        if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
            // Allow: Ctrl+A
            (e.keyCode == 65 && e.ctrlKey === true) ||
            // Allow: Ctrl+C
            (e.keyCode == 67 && e.ctrlKey === true) ||
            // Allow: Ctrl+X
            (e.keyCode == 88 && e.ctrlKey === true) ||
            // Allow: home, end, left, right
            (e.keyCode >= 35 && e.keyCode <= 39)) {
            // let it happen, don't do anything
            return;
        }
        if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
            e.preventDefault();
        }
    }
        
</script>

</body>

</html>