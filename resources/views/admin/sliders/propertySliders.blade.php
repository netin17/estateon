@extends('layouts.admin')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h2>Sliders ({{$propertySlider->name}})</h2>

            <div class="filter-area in-flx">

                <div class="filter-item input-group input-group-sm">
                    <div class="fea">
                        <div class="srch-right">
                            <div class="input-group-append">
                                <input type="text" name="q" id="property-filter" class="form-control search_list" placeholder="Search Property (id, name)">
                                <ul id="property_autocomplete-results" class="autocomplete-results"></ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($selectedproperties as $slide)
                    <tr>
                        <td>{{ $slide->property->name }} | {{ $slide->property->id }}</td>
                        <td>
                            <button class="btn btn-sm btn-info remove-property" data-relationid="{{$slide->id}}">Remove</button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
@section('scripts')
@parent
<script>
    jQuery(document).ready(function() {
        $('#property-filter').on('input', function() {
            const query = $(this).val();

            if (query.length >= 2) {
                $.ajax({
                    url: "/admin/filterslides/{{$propertySlider->id}}", // Replace with your route
                    dataType: 'json',
                    data: {
                        query: query
                    },
                    success: function(data) {
                        const resultsList = $('#property_autocomplete-results');
                        resultsList.empty();

                        data.forEach(function(property) {
                            const listItem = $('<li>').text(`${property.name} | ${property.id}`).addClass('ssss-item');
                            resultsList.append(listItem);

                            listItem.on('click', function() {
                                const propertyId = property.id;
                                $.ajax({
                                    url: "/admin/addpropertytoslide/{{$propertySlider->id}}", // Replace with your route
                                    method: 'POST',
                                    headers: {
                                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                    },
                                    data: {
                                        property_id: propertyId
                                    },
                                    success: function(response) {
                                        // Handle success, maybe update UI or show a message
                                        location.reload();
                                    },
                                    error: function(xhr, textStatus, errorThrown) {
                                        // Handle error, show an error message or perform other actions
                                        alert('Error adding property: ' + xhr.responseJSON.error); // Show error message
                                    }
                                });
                            });
                        });
                    }
                });
            }
        });

        $('.remove-property').click(function() {
            const relationId = $(this).data('relationid');
            $.ajax({
                url: "/admin/deleteslider/"+relationId, // Replace with your route
                method: 'GET',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    // Handle success, maybe update UI or show a message
                    location.reload();
                },
                error: function(xhr, textStatus, errorThrown) {
                    // Handle error, show an error message or perform other actions
                    alert('Error adding property: ' + xhr.responseJSON.error); // Show error message
                }
            });
        })
    });
</script>
@endsection