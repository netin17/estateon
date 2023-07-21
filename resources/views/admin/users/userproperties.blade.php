@extends('layouts.admin')
@section('content')
<div class="card">
    <div class="card-header in-flx">
        <h3>User Property List(<a href="{{ route('admin.users.show', $user->id) }}">
                                    {{$user->name}}- {{$user->email}}
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
                          Property Title
                        </th>
                        <th>
                           Status
                        </th>
                        <th>
                        Active Plan
                        </th>
                        <th>
                            Subscription Start date
                        </th>
                        <th>
                        Subscription End date
                        </th>
                        
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($properties as $key => $property)
                    @php
                  
                        $timestart = isset($property->userSubscriptions[0]->start_at) ? \Carbon\Carbon::parse($property->userSubscriptions[0]->start_at) : null;
                        $timeend = isset($property->userSubscriptions[0]->end_at) ? \Carbon\Carbon::parse($property->userSubscriptions[0]->end_at) : null;
                    
                                
                                @endphp
                        <tr data-entry-id="{{ $property->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $property->id ?? '' }}
                            </td>
                            <td>
                                {{ $property->name ?? '' }}
                            </td>
                            <td>
                                {{ $property->property_details->property_title ?? '' }}
                            </td>
                            <td>
                            @if($property->approved == 0)
                                <span class="badge badge-danger">Unapproved</span>
                            @else
                                <span class="badge badge-success">Approved</span>
                            @endif

                            -

                            @if($property->status == 0)
                                <span class="badge badge-danger">Deactivated</span>
                            @else
                                <span class="badge badge-success">Activated</span>
                            @endif
                            </td>
                            <td>
                            @if(count($property->userSubscriptions)>0)
                                                    <div class="plan_name">
                                                    {{$property->userSubscriptions[0]->plan->planType->name}}-{{$property->userSubscriptions[0]->plan->name}}
                                                    </div>
                                                    @endif
                            </td>
                            <td>
                            {{ optional($timestart)->format('d-m-Y') }}
                            </td>
                            <td>
                            {{ optional($timeend)->format('d-m-Y') }}
                            </td>
                           
                            <td>
                            <div class="activation_button">
                            <a class="btn btn-xs btn-primary" href="{{ route('admin.property.show', $property->id) }}">
                                {{ trans('global.view') }}
                            </a>

                            <a class="btn btn-xs btn-primary" href="{{ route('admin.property.leads', $property->id) }}">
                                Leads
                            </a>

                            <a class="btn btn-xs btn-info" href="{{ route('admin.property.edit', $property->id) }}">
                                {{ trans('global.edit') }}
                            </a>
                            </div>
                            <div>
                            <a class="btn btn-xs btn-info" href="{{ route('admin.property.image', $property->id) }}">
                                {{ trans('cruds.property.fields.image') }}
                            </a>
                            <a class="btn btn-xs btn-info" href="{{ route('admin.property.conversastion', $property->id) }}">
                                {{ trans('cruds.property.fields.queries') }}
                            </a>
                            </div> <div>
                            @if($property->approved==0)
                            <a class="btn btn-xs btn-success" href="{{ route('admin.property.changestatus', [$property->id, 'approve'] ) }}">
                                {{ trans('cruds.property.fields.approve') }}
                            </a>
                            @endif
                            @if($property->approved==0)
                            <form action="{{ route('admin.property.destroy', $property->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                <input type="hidden" name="_method" value="DELETE">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input type="submit" class="btn btn-xs btn-danger" value="{{  trans('cruds.property.fields.reject') }}">
                            </form>
                            @endif
                            </div>
                            @if($property->status==0)
                            <a class="btn btn-xs btn-success" href="{{ route('admin.property.changestatus', [$property->id, 'activate'] ) }}">
                                {{ trans('cruds.property.fields.active') }}
                            </a>
                            @endif
                            @if($property->status==1)
                            <a class="btn btn-xs btn-danger" href="{{ route('admin.property.changestatus', [$property->id, 'deactivate'] ) }}">
                                {{ trans('cruds.property.fields.deactivate') }}
                            </a>
                            @endif
                            <form action="{{ route('admin.property.destroy', $property->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                <input type="hidden" name="_method" value="DELETE">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                            </form>
                            </td>
                        </tr>
                    @endforeach
                    <tfoot>
                    <tr>
                        <td colspan="12" class="text-center pgntion">{{ $properties->appends($filter)->links() }}</td>
                    </tr>
                </tfoot>
                </tbody>
            </table>
        </div>


    </div>
</div>


@endsection