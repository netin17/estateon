@extends('layouts.estate')
@section('content')
@include('partials.dashboardsidebar', ['user'=>$data['user'], 'propertycount'=>$data['p_count']])
<div class="dashboard-content-col">
                        <div class="dashboard-title-wrap d-lg-block d-none">
                            <h1 class="dark-font dashboard-title mb-4 ">Dashboard</h1>
                        </div>
                        <div class="refer-box side-refer-box text-center mb-5">
                            Refer To Your Friend
                        </div>
                        <div class="step-bar px-sm-5">
                            <ul class="d-flex step-list"> 
                                <li class="position-relative step-item step-done"><span class="d-block">1</span></li>
                                <li class="position-relative step-item"><span class="d-block">2</span></li>
                                <li class="position-relative step-item"><span class="d-block">3</span></li>
                                <li class="position-relative step-item"><span class="d-block">4</span></li>
                                <li class="position-relative step-item"><span class="d-block">5</span></li>
                                <li class="position-relative step-item"><span class="d-block">6</span></li>
                            </ul>
                        </div>
                        <div class="step-content box-style">
                            <h3 class="dark-font text-center step-title">Add Basic Property Information</h3>
                            <form action="" class="dashboard-profile-form mt-5">
                                <div class="profile-form-group d-flex align-items-center mb-4">
                                    <label for="name" class="d-block fw-bold">I want</label>
                                    <div class="mt-2 mt-md-0">
                                        <button type="button" class="btn btn-danger rent-btn me-2">Rent</button>
                                        <button type="button" class="btn btn-outline-danger sell-btn">Sell</button>
                                    </div>
                                </div>
                                <div class="profile-form-group d-flex align-items-center mb-4">
                                    <label for="category" class="d-block">Properties Category</label>
                                    <select name="" id="category" class="d-block profile-form-fild" required>
                                        <option value="residential">Residential</option>
                                        <option value="one">One</option>
                                        <option value="two">Two</option>
                                    </select>
                                </div>
                                <div class="profile-form-group d-flex align-items-center mb-4">
                                    <label for="type" class="d-block">Properties Type </label>
                                    <select name="" id="type" class="d-block profile-form-fild" required>
                                        <option value="Villas">Villas</option>
                                        <option value="one">One</option>
                                        <option value="two">Two</option>
                                    </select>
                                </div>
                                <div class="profile-form-group d-flex align-items-center mb-4">
                                    <label for="vastu" class="d-block">Properties Vastu </label>
                                    <select name="" id="vastu" class="d-block profile-form-fild" required>
                                        <option value="North Facing">North Facing</option>
                                        <option value="one">One</option>
                                        <option value="two">Two</option>
                                    </select>
                                </div>
                                <div class="profile-form-group d-flex align-items-center mb-4">
                                    <label for="title" class="d-block">Properties Title</label>
                                    <input type="text" id="title" placeholder="" class="d-block profile-form-fild" required />
                                </div>
                                <div class="profile-form-group d-flex align-items-center mb-4">
                                    <label for="banner-image" class="d-block">Banner Image <span class="d-block red-font" style="font-size: 12px;">(jpeg or png. only)</span></label>
                                    <input type="file" id="banner-image" placeholder="" class="d-block profile-form-fild" required />
                                </div>
                                <div class="profile-form-group pt-lg-3">
                                    <button type="submit" class="contact-sub-btn btn btn-primary ms-auto mt-5">Next</button>
                                </div>
                            </form>
                        </div>
                    </div>


@endsection