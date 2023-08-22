@extends('layouts.estate')
@section('content')
<section class="dashboard-section">
    <div class="container">
        <div class="dashboard-row d-flex flex-wrap">
            @include('partials.dashboardsidebar', ['user'=>$data['user'], 'propertycount'=>$data['p_count'], 'is_builder'=>$data['is_builder']])
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
                                    <th class="table-title">Plan</th>
                                    <th class="table-title">Date</th>
                                    <th class="table-title">Time</th>
                                    <th class="table-title">TxnId</th>
                                    <th class="table-title">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($data['transactions'] as $transaction)
                                @php
                                $time = \Carbon\Carbon::parse($transaction->start_at);
                                @endphp

                                <tr>
                                    <td class="table-data">{{ $transaction->plan->planType->name ?? '' }}-{{ $transaction->plan->name ?? '' }}</td>
                                    <td class="table-data">{{ optional($time)->format('d-m-Y') }}</td>
                                    <td class="table-data">{{ optional($time)->format('h:i A') }}</td>
                                    <td class="table-data">{{ $transaction->payment->txnid ?? '' }}</td>
                                    <td class="table-data"><span class="status-success px-2 py-1">Success</span></td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                {{ $data['transactions']->links() }}
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>