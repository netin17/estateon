@extends('layouts.estate')
@section('content')
<section class="dashboard-section">
    <div class="container">
    <div class="dashboard-row dashboard-row-propertyleads d-flex">
@include('partials.dashboardsidebar', ['user'=>$data['user'], 'propertycount'=>$data['p_count']])
<div class="dashboard-content-col">
                        <div class="dashboard-title-wrap d-lg-block d-none">
                            <h1 class="dark-font dashboard-title mb-4 ">Dashboard</h1>
                        </div>
                        <div class="refer-box side-refer-box text-center mb-5">
                            Refer To Your Friend
                        </div>
                        <div class="history-table-wrap box-style position-relative">
                            <div class="table-bottom-shadow">
                                <table class="w-100 history-table">
                                    <thead>
                                        <tr>
                                            <th class="table-title">ID</th>
                                            <th class="table-title">Property Title</th>
                                            <th class="table-title">Guest Name</th>
                                            <th class="table-title">Email</th>
                                            <th class="table-title">Contact No</th>
                                            <th class="table-title">Plan</th>
                                            <th class="table-title">Message</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach( $data['leads'] as $lead)
                                        <tr>
                                            <td class="table-data py-md-4 py-3">{{$lead->id}}</td>
                                            <td class="table-data py-md-4 py-3">{{$lead->property->property_details->property_title ?? ''}}</td>
                                            <td class="table-data py-md-4 py-3">{{$lead->name}}</td>
                                            <td class="table-data py-md-4 py-3">{{$lead->email}}</td>
                                            <td class="table-data py-md-4 py-3">{{$lead->phone}}</td>
                                            <td class="table-data py-md-4 py-3">{{$lead->subplan->planType->name ?? ''}}-{{$lead->subplan->name ?? ''}}</td>
                                            <td class="table-data py-md-4 py-3">{{$lead->message}}</td>
                                        </tr>
                                        @endforeach
                                       
                                    </tbody>
                                    <tfoot>
                                        {{$data['leads']->links()}}
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
    </div>
    </div>
</section>