@extends('layouts.admin')
@section('content')
<div style="margin-bottom: 10px;" class="row">
    <div class="col-lg-12">
        <a class="btn btn-success" href="{{route('admin.subscription.plancreate')}}">
            {{ trans('global.add') }} {{ trans('cruds.subscription.fields.plan') }}
        </a>
    </div>
</div>
<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover">
                <thead>
                    <tr>
                        <th>
                            {{ trans('cruds.subscription.fields.name') }}
                        </th>
                
                        <th>
                            Status
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($plan_types as $key => $type)
                    <tr data-entry-id="{{ $type->id }}">
                        <td>
                            {{ $type->name ?? '' }}
                        </td>
                        <td>
                            {{ $type->status ?? '' }}
                        </td>
                        <td>
                            <div class="">
                                <a class="btn btn-lg btn-primary" href="{{route('admin.subscription.index', $type->id) }}">
                                    Subscripton Plans
                                </a>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection