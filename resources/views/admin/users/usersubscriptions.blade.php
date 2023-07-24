@extends('layouts.admin')
@section('content')
<div class="card">
    <div class="card-header in-flx">
        <h3>User Subscription List(<a href="{{ route('admin.users.show', $data['user']->id) }}">
                                    {{$data['user']->name}}- {{$data['user']->email}}
                                </a>)</h3>
        <div class="card-tools srch-right">
            <form action="{{ route('admin.users.index') }}">
                <div class="input-group input-group-md">
                    <input type="text" name="q" class="form-control float-right search_list" placeholder="Search" value="{{ request()->get('q') }}">
                    <div class="input-group-append">
                        <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                           ID
                        </th>
                        <th>
                           Property Name
                        </th>
                        <th>
                           Plan Name
                        </th>
                        <th>
                            Subscription Start date
                        </th>
                        <th>
                            Subscription End date
                        </th>
                        <th>
                            Txn Id
                        </th>
                        <th>
                            Amount
                        </th>
                        <th>
                            Subscription Date
                        </th>
                        <th>
                           Status
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data['subscriptions'] as $key => $subscription)
                    @php
                  
                        $timestart = isset($subscription->start_at) ? \Carbon\Carbon::parse($subscription->start_at) : null;
                        $timeend = isset($subscription->end_at) ? \Carbon\Carbon::parse($subscription->end_at) : null;
                        $subscription_date = isset($subscription->created_at) ? \Carbon\Carbon::parse($subscription->created_at) : null;

                                
                                @endphp
                        <tr data-entry-id="{{ $subscription->id }}">
                            <td>

                            </td>
                            <td>
                            {{ $subscription->id }}
                            </td>
                            <td>
                            <a  href="{{ route('admin.property.show', $subscription->property->id) }}">
                                {{ $subscription->property->name }}
                            </a>
                            </td>
                            <td class="table-data">{{ $subscription->plan->planType->name ?? '' }}-{{ $subscription->plan->name ?? '' }}</td>
                            <td>
                            {{ optional($timestart)->format('d-m-Y') }}
                            </td>
                            <td>
                            {{ optional($timeend)->format('d-m-Y') }}
                            </td>
                            <td>
                            {{ $subscription->payment->txnid }}
                            </td>
                            <td>
                            {{ $subscription->payment->amount }}
                            </td>
                            <td>
                            {{ optional($subscription_date)->format('d-m-Y') }}
                            </td>
                            <td>
                            {{ $subscription->status ==1 ? 'active' : inactive }}
                            </td>
                        </tr>
                    @endforeach
                    <tfoot>
                    <tr>
                        <td colspan="12" class="text-center pgntion">{{ $data['subscriptions']->links() }}</td>
                    </tr>
                </tfoot>
                </tbody>
            </table>
        </div>


    </div>
</div>



@endsection