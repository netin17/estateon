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
                @if(count($data['visitors'])>0)
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
                                    <th class="table-title">Property ID</th>
                                    <th class="table-title">Property Title</th>
                                    <th class="table-title">Visiter's Phone</th>
                                    <th class="table-title">Time</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($data['visitors'] as $visiter)
                                @php
                                $time = \Carbon\Carbon::parse($visiter->visited_at);
                                @endphp
                                <tr>
                                    <td colspan="5" class="py-2"></td>
                                </tr>
                                <tr>
                                    <td class="table-data">
                                        <div class="listed-properties-table-data">
                                            <p>{{$visiter->property->id ?? ''}}</p>
                                        </div>
                                    </td>
                                    <td class="table-data">
                                        <div class="listed-properties-table-data">
                                            <p>{{$visiter->property->name ?? ''}}</p>
                                        </div>
                                    </td>
                                    <td class="table-data">
                                        <div class="listed-properties-table-data">
                                        {{$visiter->user->phone ?? ''}}

                                        </div>
                                    </td>
                                    <td class="table-data">{{ optional($time)->format('d-m-Y h:i A') }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                {{ $data['visitors']->links() }}
                            </tfoot>
                        </table>
                    </div>
                    @endif
@if(count($data['visitors'])==0)
                            <img src="{{ url('estate/images/no-property.svg')}}" alt="no-property"
                                class="mx-auto no-property-img d-block" />
@endif

                </div>
            </div>
        </div>
    </div>

@endsection
@section('scripts')
<script>
</script>

@endsection