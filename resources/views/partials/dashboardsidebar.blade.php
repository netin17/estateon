<div class="sidebar-col">
                        <div class="sidebar-top-wrap">
                            <div class="sidebar-top box-style text-center mb-lg-4">
                                <div class="user-data-box text-center mb-lg-4 mb-3">
                                    @if($data['is_builder'])
                                    <img src="{{ url('estate/images/builder_cap.png')}}" alt="bilder-cap">  
                                    @endif
                                    <h5 class="user-name dark-font mb-md-2 mb-1">{{$user->name}}</h5>
                                    <p class="verified dark-font d-flex align-items-center justify-content-center mb-0">
                                        Verified
                                        <svg class="ms-1" width="24" height="24" viewBox="0 0 24 24" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M10.243 16.3139L6 12.0699L7.414 10.6559L10.243 13.4839L15.899 7.8269L17.314 9.2419L10.243 16.3119V16.3139Z"
                                                fill="#8591FF" />
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M1 12C1 5.925 5.925 1 12 1C18.075 1 23 5.925 23 12C23 18.075 18.075 23 12 23C5.925 23 1 18.075 1 12ZM12 21C10.8181 21 9.64778 20.7672 8.55585 20.3149C7.46392 19.8626 6.47177 19.1997 5.63604 18.364C4.80031 17.5282 4.13738 16.5361 3.68508 15.4442C3.23279 14.3522 3 13.1819 3 12C3 10.8181 3.23279 9.64778 3.68508 8.55585C4.13738 7.46392 4.80031 6.47177 5.63604 5.63604C6.47177 4.80031 7.46392 4.13738 8.55585 3.68508C9.64778 3.23279 10.8181 3 12 3C14.3869 3 16.6761 3.94821 18.364 5.63604C20.0518 7.32387 21 9.61305 21 12C21 14.3869 20.0518 16.6761 18.364 18.364C16.6761 20.0518 14.3869 21 12 21Z"
                                                fill="#8591FF" />
                                        </svg>
                                    </p>
                                </div>
                                <p class="properties-total mb-0">Total Properties </p>
                                <p class="properties-total-num mb-0 red-font">{{$propertycount}}</p>
                            </div>
                            <div class="refer-box top-refer-box text-center mb-5 ">
                                Refer To Your <br> Friend
                            </div>
                        </div>
                        <div class="sidebar-link-box box-style">
                            <ul class="sidebar-link-list py-lg-5 mt-lg-4">
                                <li><a class="sidebar-link transition {{ request()->is('frontuser/change_password') || request()->is('frontuser/change_password/*') ? 'sidebar-link-active' : '' }}" href="{{route('frontuser.frontuser.change_password')}}">Profile</a></li>
                                <li><a class="sidebar-link transition {{ request()->is('frontuser/transactionhistory') || request()->is('frontuser/transactionhistory/*') ? 'sidebar-link-active' : '' }}" href="{{route('frontuser.transactionhistory.get')}}">Transactions
                                        History</a></li>
                                <li><a class="sidebar-link transition {{ request()->is('frontuser/property') || request()->is('frontuser/property/index') ? 'sidebar-link-active' : '' }}" href="{{route('frontuser.property.index')}}">Listed
                                        Properties</a></li>
                                <li><a class="sidebar-link transition {{ request()->is('frontuser/property/create') || request()->is('frontuser/property/create') ? 'sidebar-link-active' : '' }}" href="{{route('frontuser.property.create')}}">Add Property</a></li>
                                <li><a class="sidebar-link transition  {{ request()->is('frontuser/properties/visitors') || request()->is('frontuser/properties/visitors') ? 'sidebar-link-active' : '' }}" href="{{route('frontuser.property.visitors')}}">Properties Visitors</a></li>
                                <li><a class="sidebar-link transition {{ request()->is('frontuser/wishlist') || request()->is('frontuser/wishlist') ? 'sidebar-link-active' : '' }}" href="{{route('frontuser.user.wishlist')}}">Other Fav. Property</a></li>
                                <li><a class="sidebar-link transition {{ request()->is('create/builder') || request()->is('create/builder') ? 'sidebar-link-active' : '' }}" href="{{route('frontuser.builder.create')}}">Builder Profile</a></li>
                           
                                @if($data['is_builder'])
                                <li><a class="sidebar-link transition {{ request()->is('contact/support') || request()->is('contact/support') ? 'sidebar-link-active' : '' }}" href="{{route('frontuser.builders.contact_suppoert')}}">Contact to Support</a></li>
                                    @endif
                            </ul>
                        </div>
                    </div>