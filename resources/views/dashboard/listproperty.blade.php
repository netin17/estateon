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
                        <div class="history-table-wrap box-style">
                            <div class="table-bottom-shadow position-relative">
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
                                                    <a href="/" class="table-contact-link red-font">Contact EstateOn</a>
                                                </div>
                                            </td>
                                            <td class="table-data">
                                                <div class="listed-properties-table-data">
                                                    <p>{{$property->property_details->property_title ?? ''}}</p>
                                                    <span class="leads-tag-style">Leads</span>
                                                </div>
                                            </td>
                                            <td class="table-data">
                                                <div class="listed-properties-table-data">
                                                    <p>{{$property->approved == 1 ? 'Approved':'Unapproved'}}</p>
                                                    <a href="{{route('frontuser.plans.list', ['slug'=>$property->slug]) }}" class="approved-link">Buy Plan</a>
                                                </div>
                                            </td>
                                            <td class="table-data">Sell</td>
                                            <td class="table-data">
                                                <div class="listed-properties-table-data">
                                                    <span
                                                        class="d-inline-block px-2 py-1 table-sky-btn mb-1">View</span><br>
                                                    <span
                                                        class="d-inline-block px-2 py-1 table-sky-btn mb-1">Images</span><br>
                                                    <span class="d-inline-block px-3 py-1 table-edit-btn">Edit</span>
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
                        </div>
                    </div>



@endsection