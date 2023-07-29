@extends('layouts.estate')
@section('content')
<section class="dashboard-section">
    <div class="container">
        <div class="dashboard-row d-flex flex-wrap">
            @include('partials.dashboardsidebar', ['user'=>$data['user'], 'propertycount'=>$data['p_count']])
            <div class="dashboard-content-col">
                <div class="dashboard-title-wrap d-lg-block d-none">
                    <h1 class="dark-font dashboard-title mb-4 ">Dashboard</h1>
                </div>
                <div class="refer-box side-refer-box text-center mb-5">
                    Refer To Your Friend
                </div>
                <div class="history-table-wrap box-style position-relative">
                @if(count($data['properties'])>0)
                    <div class="table-bottom-shadow table-pagination-main">
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
                        <table class="w-100 listed-properties-table" style="border-collapse: separate;">
                            <thead>
                                <tr>
                                    <th class="table-title">ID</th>
                                    <th class="table-title">Property Title</th>
                                    <th class="table-title">Status</th>
                                    <th class="table-title">Type</th>
                                    <th class="table-title">Overview</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($data['properties'] as $property)
                                <tr>
                                    <td colspan="5" class="py-2"></td>
                                </tr>
                                <tr>
                                    <td class="table-data">
                                        <div class="listed-properties-table-data">
                                            <p>{{$property->id ?? ''}}</p>
                                            <button type="button" class="table-contact-link red-fon toggleModel" data-propertyid="{{$property->id}}">Contact EstateOn
                                            </button>
                                        </div>
                                    </td>
                                    <td class="table-data">
                                        <div class="listed-properties-table-data">
                                            <p>{{$property->property_details->property_title ?? ''}}</p>
                                            <span class="leads-tag-style"><a href="{{route('frontuser.property.leads', ['slug'=>$property->slug])}}">Leads</a></span>
                                        </div>
                                    </td>
                                    <td class="table-data">
                                        <div class="listed-properties-table-data">
                                            <p>{{$property->approved == 1 ? 'Approved':'Unapproved'}}</p>
                                            @if(count($property->userSubscriptions)>0)
                                            <div class="plan_name">
                                                {{$property->userSubscriptions[0]->plan->planType->name}}-{{$property->userSubscriptions[0]->plan->name}}
                                            </div>
                                            @else
                                            <a href="{{route('frontuser.plans.list', ['slug'=>$property->slug]) }}" class="approved-link">Buy Plan</a>

                                            @endif

                                        </div>
                                    </td>
                                    <td class="table-data">Sell</td>
                                    <td class="table-data">
                                        <div class="listed-properties-table-data">
                                            <span class="d-inline-block px-2 py-1 table-sky-btn mb-1"><a href="{{ route('property.detail', [$property->slug] ) }}">View</a></span><br>
                                            <span class="d-inline-block px-2 py-1 table-sky-btn mb-1"><a href="{{route('frontuser.property.addimages',['slug'=>$property->slug])}}">Images</a></span><br>
                                            <span class="d-inline-block px-3 py-1 table-edit-btn"><a href="{{ route('frontuser.property.edit', $property->id) }}">Edit</a></span>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                {{ $data['properties']->links() }}
                            </tfoot>
                        </table>
                    </div>
                    @endif
@if(count($data['properties'])==0)
<div class="mx-auto no-property-img">
                                <a  href="{{route('frontuser.property.create')}}" class="contact-sub-btn add-property-btn btn btn-primary px-5 add-property ms-0">Add
                                    Property</a>
                            </div>
                            <img src="{{ url('estate/images/no-property.svg')}}" alt="no-property"
                                class="mx-auto no-property-img d-block" />
@endif

                </div>
            </div>
        </div>
    </div>





</section>

{{-- Modal --}}
<div class="modal fade" id="contactusmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Contact Us</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="contact-right-col">
                    <form action="{{route('frontuser.contacts.add')}}" method="POST" id="contact_form">
                        @csrf
                        <div class="form-group-row d-flex flex-wrap">
                            <div class="form-group-col px-1">
                                <label for="fname">Name*</label>
                                <input type="text" id="name" name="name" class="form-group-file" required />
                                <input type="hidden" id="property_id" name="property_id" class="form-group-file" required />
                            </div>
                            <div class="form-group-col px-1">
                                <label for="plan">Select a topic</label>
                                <select name="message_type" id="message_type" class="form-group-file" required>
                                    <option value="">--Select--</option>
                                    <option value="Payment related issues">Payment related issues</option>
                                    <option value="Property listing related Issues">Property listing related Issues</option>
                                    <option value="About premium plans">About premium plans</option>
                                    <option value="Talk to our Agent">Talk to our Agent</option>
                                    <option value="Other">Other</option>

                                </select>
                            </div>
                            <div class="form-group-col px-1">
                                <label for="email">Email</label>
                                <input type="email" id="email" name="email" class="form-group-file" required />
                            </div>
                            <div class="form-group-col px-1">
                                <label for="phone_no">Mobile Number*</label>
                                <input type="text" id="phone_no" name="phone" class="form-group-file" required />
                            </div>
                            <div class="form-group-col w-100 px-1">
                                <label for="phone_no">State*</label>
                                <select name="state_id" id="state_id" class="form-group-file" required>
                                    <option value="">--Select--</option>
                                    @foreach($data['states'] as $state)
                                    <option value="{{$state->id}}">{{$state->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group-row d-flex flex-wrap">
                            <div class="form-group-col px-1 w-100">
                                <label for="phone_no">Write Message*</label>
                                <textarea name="message" id="message" cols="30" rows="3" class="form-group-file text-popup-msg" required></textarea>
                            </div>
                        </div>
                        <div class="contact-bottom d-flex align-items-center justify-content-end flex-wrap">
                            <div class="contact-bottom d-flex align-items-center justify-content-center">
                                <div class="d-flex align-items-center" id="recaptcha-container"></div>
                            </div>
                            <button type="submit" class="contact-sub-btn btn btn-primary mt-2">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

@endsection
@section('scripts')
<script src="https://www.gstatic.com/firebasejs/6.0.2/firebase.js"></script>
<script>
    var isOTPVerified = false;
    var coderesult;
    var firebaseConfig = {
        apiKey: "AIzaSyCxCC1NFlOCM9k9pI4paC8vhJytSY4t054",
        authDomain: "estateon-e5287.firebaseapp.com",
        databaseURL: "https://estateon-e5287.firebaseio.com",
        projectId: "estateon-e5287",
        storageBucket: "estateon-e5287.appspot.com",
        messagingSenderId: "191717721261",
        appId: "1:191717721261:web:21f5dd3cdcc7985ecf7224",
        measurementId: "G-6RE4Q4XQHD"
    };

    firebase.initializeApp(firebaseConfig);

    window.onload = function() {
        render();
    };

    function render() {
        window.recaptchaVerifier = new firebase.auth.RecaptchaVerifier('recaptcha-container');
        recaptchaVerifier.render();
    }

    $('.toggleModel').click(function() {
        var propertyId = $(this).data('propertyid');
        console.log(propertyId);
        $("#property_id").val(propertyId);
        $('#contactusmodal').modal('show');
        // Use the propertyId value for further processing
    });
    // Add event listener to form submit
    $('#contact_form').submit(function(event) {
        event.preventDefault(); // Prevent the default form submission

        // Validate reCAPTCHA
        var response = grecaptcha.getResponse();
        if (response.length === 0) {
            // reCAPTCHA is not validated, display an error message or take appropriate action
            alert('Please complete the reCAPTCHA validation.');
            return;
        }

        // reCAPTCHA is validated, proceed with form submission
        $(this).unbind('submit').submit();
    });
</script>

@endsection