@extends('layouts.estate')
@section('content')
<section class="dashboard-section">
    <div class="container">
        <div class="dashboard-row d-flex flex-wrap">
            @include('partials.dashboardsidebar', ['user'=>$data['user'], 'propertycount'=>$data['p_count']])
            <div class="dashboard-content-col">
                
                <div class="other-fav-property-content box-style">
                                <div class="row">
                                    @foreach($data['wishlist'] as $wishlist)
                                    <div class="col-md-6 mb-3">
                                        <div class="property-item transition">
                                            <div class="property-item-img position-relative mb-3">
                                                <img src="{{$wishlist->property->images[0]->url ?? ''}}" alt="property-item"
                                                    class="property-image" />
                                                    <span class="property-label d-inline-block">Under construction</span>
                                                <span class="d-flex align-items-center justify-content-center like-icon">
                                                <i class="far fa-heart" style="color:#fff;"></i>
                                                </span>
                                            </div>
                                            <div class="property-content">
                                                <div class="d-flex align-items-center">
                                                    <div style="flex: 1;" class="property-title-content">
                                                        <h5 class="property-name red-font mb-1">{{$wishlist->property->property_details->property_title ?? ''}}</h5>
                                                        <p class="project-name">{{$wishlist->property->name ?? ''}}</p>
                                                    </div>
                                                    <!-- <div class="property-label-content ms-auto">
                                                        <span class="property-name-label red-font d-inline-block">Only 4 units left</span>
                                                    </div> -->
                                                </div>
                                                <div class="d-flex align-items-center mt-1" style="font-size: 16px;">
                                                    <p style="color: #5E5E5E;">{{$wishlist->property->location ?? ''}}</p>
                                                    <p class="ml-auto" style="color: #A4A4A4;">{{$wishlist->property->property_details->length ?? ''}} - {{$wishlist->property->property_details->width ?? ''}} sq.ft</p>
                                                </div>
                                                <div class="d-flex align-items-center" style="font-size: 16px;">
                                                    <div class="d-flex">
                                                        <span class="d-inline-block bhk-style">{{$wishlist->property->property_details->property_category ?? ''}}</span>
                                                    </div>
                                                    <p style="font-size: 16px;" class="red-font ml-auto">₹{{number_form($wishlist->property->property_details->price ?? 0)}}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                    <div>
                                          {{$data['wishlist']->links()}}
                                          </div>
            </div>
        </div>
    </div>
</section>
@endsection
