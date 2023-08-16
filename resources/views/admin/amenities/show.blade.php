@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.amenity.title') }}
    </div>

    <div class="card-body">
        <div class="mb-2">
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.amenity.fields.id') }}
                        </th>
                        <td>
                            {{ $amenity->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.amenity.fields.name') }}
                        </th>
                        <td>
                            {{ $amenity->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Image
                        </th>
                        <td>
                        @if ($amenity->image)
                <img src="{{ asset('storage/' . $amenity->image) }}" alt="Existing Icon Image" style="max-width: 100px;">
            @else
                No icon image available.
            @endif
                        </td>
                    </tr>
                </tbody>
            </table>
            <a style="margin-top:20px;" class="btn btn-default" href="{{ url()->previous() }}">
                {{ trans('global.back_to_list') }}
            </a>
        </div>

        <nav class="mb-3">
            <div class="nav nav-tabs">

            </div>
        </nav>
        <div class="tab-content">

        </div>
    </div>
</div>
@endsection