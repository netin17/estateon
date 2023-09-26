@extends('layouts.admin')
@section('content')
<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.property.title') }}
    </div>
    <div class="card-body">
        <div class="mb-2">
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.property.fields.id') }}
                        </th>
                        <td>
                            {{ $data['property']->id }}
                        </td>
                    </tr>

                    <tr>
                        <th>
                            Name
                        </th>
                        <td>
                            {{ $data['property']->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Title
                        </th>
                        <td>
                            {{ $data['property']->property_details->property_title }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                        Project Status
                        </th>
                        <td>
                        @switch($data['property']->property_details->property_status)
												@case('ready_to_move')
												<h4>Ready to move</h4>
												@break
												@case('under_construction')
												<h4>Under Construction</h4>
												@break
												@endswitch
                        </td>
                    </tr>
                    <tr>
                        <th>
                        Project/Property Age
                        </th>
                        <td>
                        {{$data['property']->property_details->property_age ?? ''}}				
                        </td>
                    </tr>

                    <tr>
                        <th>
                            Type
                        </th>
                        <td>
                            {{ ucfirst($data['property']->type) }}
                        </td>
                    </tr>

                    <tr>
                        <th>
                            {{ trans('cruds.property.fields.description') }}
                        </th>
                        <td>
                            {!! $data['property']->description !!}
                        </td>
                    </tr>

                    <tr>
                        <th>
                            {{ trans('cruds.property.fields.address') }}
                        </th>
                        <td>
                            {{ $data['property']->address }}
                        </td>
                    </tr>

                    <tr>
                        <th>
                            Location
                        </th>
                        <td>
                            {{ $data['property']->location }}
                        </td>
                    </tr>

                    <tr>
                        <th>
                            Furnished
                        </th>
                        <td>
                            {{ ucfirst($data['property']->property_details['furnished']) }}
                        </td>
                    </tr>
{{--
                    <tr>
                        <th>
                            {{ trans('cruds.property.fields.featured') }}
                        </th>
                        <td>
                            {{ $data['property']->featured==1 ? 'true': 'false' }}
                        </td>
                    </tr>

                    <tr>
                        <th>
                            {{ trans('cruds.property.fields.hot') }}
                        </th>
                        <td>
                            {{ $data['property']->hot == 1 ? 'true': 'false' }}
                        </td>
                    </tr>
--}}
                    <tr>
                        <th>
                            {{ trans('cruds.property.fields.amenities') }}
                        </th>
                        <td>
                            @foreach($data['property']->amenities as $amenity)
                            <span class="badge badge-info">{{$amenity['amenity_data']['name'] ?? ''}}</span>
                            @endforeach
                        </td>
                    </tr>

                    <tr>
                        <th>
                            {{ trans('cruds.property.fields.vastu') }}
                        </th>
                        <td>
                            <span class="badge badge-info">{{ $data['property']->vastu['vastu_data']['name']  ?? ''}}</span>
                        </td>
                    </tr>

                    <tr>
                        <th>
                            {{ trans('cruds.property.fields.preferences') }}
                        </th>
                        <td>
                            @foreach($data['property']->preferences as $preference)
                            <span class="badge badge-info">{{ $preference['preferences_data']['name']  ?? ''}}</span>
                            @endforeach
                        </td>
                    </tr>

                    <tr>
                        <th>
                            {{ trans('cruds.property.fields.property_type') }}
                        </th>
                        <td>
                            {{ $data['property']->property_type['type_data']['name']  ?? '' }}
                        </td>
                    </tr>

                    <!-- <tr>
                        <th>
                            {{ trans('cruds.property.fields.bedroom') }}
                        </th>
                        <td>
                            {{ $data['property']['property_details']->bedroom }}
                        </td>
                    </tr>

                    <tr>
                        <th>
                            {{ trans('cruds.property.fields.bathroom') }}
                        </th>
                        <td>
                            {{ $data['property']['property_details']->bathroom }}
                        </td>
                    </tr>

                    <tr>
                        <th>
                            {{ trans('cruds.property.fields.balcony') }}
                        </th>
                        <td>
                            {{ $data['property']['property_details']->balcony }}
                        </td>
                    </tr>

                    <tr>
                        <th>
                            {{ trans('cruds.property.fields.kitchen') }}
                        </th>
                        <td>
                            {{ $data['property']['property_details']->kitchen }}
                        </td>
                    </tr>

                    <tr>
                        <th>
                            {{ trans('cruds.property.fields.living_room') }}
                        </th>
                        <td>
                            {{ $data['property']['property_details']->living_room == 1 ? 'true' :'false' }}
                        </td>
                    </tr> -->

                    <tr>
                        <th>
                            {{ trans('cruds.property.fields.furnished') }}
                        </th>
                        <td>
                            @switch($data['property']['property_details']->furnished)
                            @case('unfurnished')
                            <span> Un frinished</span>
                            @break

                            @case('furnished')
                            <span>Furnished</span>
                            @break
                            @case('semi_furnished')
                            <span>Semi Furnished</span>
                            @break
                            @endswitch
                        </td>
                    </tr>

                    <tr>
                        <th>
                            {{ trans('cruds.property.fields.price') }}
                        </th>
                        <td>
                            {{ $data['property']['property_details']->price }}
                        </td>
                    </tr>

                    <tr>
                        <th>
                            Carpet Area
                        </th>
                        <td>
                            {{ $data['property']['property_details']->carpet_area }}
                        </td>
                    </tr>

                    <tr>
                        <th>
                            Super Area
                        </th>
                        <td>
                            {{ $data['property']['property_details']->super_area }}
                        </td>
                    </tr>

                    <tr>
                        <th>
                            Build up Area
                        </th>
                        <td>
                            {{ $data['property']['property_details']->build_up_area }}
                        </td>
                    </tr>
                    
                    <tr>
                        <th>
                        Property Category
                        </th>
                        <td>
                        {{ $data['property']['property_details']->property_category }}
                        </td>
                    </tr>
                    {{--
                    <tr>
                        <th>
                        Property Feature
                        </th>
                        <td>
                        {{ $data['property']['property_details']->property_feature }}
                        </td>
                    </tr>
--}}
                    <tr>
                        <th>
                        Govt Tax Include
                        </th>
                        <td>
                        @if($data['property']['property_details']->govt_tax_include == 1)
                            Included                            
                        @elseif($data['property']['property_details']->govt_tax_include == 0)
                            Not included                            
                        @endif
                        </td>
                    </tr>

                    <tr>
                        <th>
                        Extra Notes
                        </th>
                        <td>
                        {{$data['property']['property_details']->extra_notes}}
                        </td>
                    </tr>

                    <tr>
                        <th>
                        User 
                        </th>
                        <td>
                        <a href="{{ route('admin.users.show', $data['property']->owner->id ?? '') }}">
                                {{ $data['property']->owner->name ?? '' }} ({{ $data['property']->owner->email ?? '' }})
                            </a>
                        </td>
                    </tr>

                    <tr>
                        <th>
                        Mobile Number
                        </th>
                        <td>
                        {{$data['property']['contact_number']}}
                        </td>
                    </tr>

                    <tr>
                        <th>
                            {{ trans('cruds.property.fields.likes') }}
                        </th>
                        <td>
                            {{ $data['property']->likes_count }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <a style="margin-top:20px;" class="btn btn-default" href="{{ url()->previous() }}">
                {{ trans('global.back_to_list') }}
            </a>
            <a style="margin-top:20px;" class="btn btn-info" href="{{ route('admin.property.edit', $data['property']->id) }}">
                                {{ trans('global.edit') }}
                            </a>
        </div>
    </div>
</div>
@endsection