@extends('layouts.admin')
@section('content')
<div class="container">
    <h1>Create Card</h1>
    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                    @endif
                    <div class="card">
    <div class="card-header">
        <h3>Builder Requests</h3>
    </div>
    <div class="card-body">
       
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover">
                <thead>
                    <tr>
                        <th>
                            {{ trans('cruds.property.fields.id') }}
                        </th>
                        <th>
                            Name
                        </th>
                        <th>
                            Posted By
                        </th>
                        <th>
                            contact Number
                        </th>
                        <th>
                            Registration Number
                        </th>
                        <th>
                            Status
                        </th>
                        
                        <th class="all_btn_selections">
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data['builders'] as $key => $builder)
                    <tr data-entry-id="{{ $builder->id }}">
                    <td>
                            {{ $builder->id ?? '' }}
                        </td>                        
                        <td>
                            {{ $builder->name ?? '' }}
                        </td>
                        <td>                            
                        <a href="{{ route('admin.users.show', $builder->user->id ?? '') }}">
                                {{ $builder->user->name ?? '' }}
                            </a>
                        </td>
                        <td>
                            {{ $builder->contact_number ?? '' }}
                        </td>
                        <td>
                            {{ $builder->registration_number ?? '' }}
                        </td>
                        <td>
                        @if($builder->status=='inactive')
                            <a class="btn btn-xs btn-success" href="{{ route('admin.builders.changestatus', [$builder->id, 'activate'] ) }}">
                                {{ trans('cruds.property.fields.active') }}
                            </a>
                            @endif
                            @if($builder->status=='active')
                            <a class="btn btn-xs btn-danger" href="{{ route('admin.builders.changestatus', [$builder->id, 'deactivate'] ) }}">
                                {{ trans('cruds.property.fields.deactivate') }}
                            </a>
                            @endif
                        </td>
                        <td> 
                           <a href="{{route('admin.builders.edit', ['id'=>$builder->id])}}" class="btn btn-xs btn-info">Edit</a>
                           {{--<a href="" class="btn btn-xs btn-info">Profile</a> --}}
                        </td>
                    </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="12" class="text-center pgntion">{{ $data['builders']->links() }}</td>
                    </tr>
                </tfoot>
            </table>
        </div>


    </div>
</div>
</div>
@endsection