@extends('layouts.estate')
@section('content')
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/css/select2.min.css" rel="stylesheet" />
<section class="dashboard-section">
    <div class="container">
        <div class="dashboard-row d-flex flex-wrap">
            @include('partials.dashboardsidebar', ['user'=>$data['user'], 'propertycount'=>$data['p_count'], 'is_builder'=>$data['is_builder']])
            <div class="dashboard-content-col">
                <div class="dashboard-title-wrap d-lg-block d-none">
                    <h1 class="dark-font text-left dashboard-title mb-4 ">Dashboard</h1>
                </div>
                <div class="refer-box side-refer-box text-center mb-5">
                    Refer To Your Friend
                </div>
                
                <div class="step-content box-style">
                    <h3 class="dark-font text-center step-title">Add Details</h3>
					<div class="step-bar px-sm-5">
						<ul class="d-flex step-list">
							<li class="position-relative step-item step-done"><span class="d-block">1</span></li>
							<li class="position-relative step-item step-done"><span class="d-block">2</span></li>
							<li class="position-relative step-item step-done"><span class="d-block">3</span></li>
						</ul>
					</div>
                    <form method="post" action="{{ route('frontuser.save.cardsproperty') }}">
						
                        @csrf
						<div class="add-details-box">
							@php
							$projects_available=0;
							@endphp
							@foreach($data['saved_card'] as $cards)

							<div class="more-project"> More Project by <span class="company-name">{{$data['builder']->details->company_name}} in</span> <span class="city-name">{{$cards->city->name}}</span></div>
							@if(count($cards->city->projects)>0)
							<div class="form-group w-100">
								<label for="roles">Select Properties for slider
									<span class="btn btn-info btn-xs select-all">{{ trans('global.select_all') }}</span>
									<span class="btn btn-info btn-xs deselect-all">{{ trans('global.deselect_all') }}</span></label>
								<select name="project[{{$cards->id}}][{{$cards->city->id}}][]" id="project[{{$cards->id}}][{{$cards->city->id}}][]" class="form-control select2" multiple="multiple" required>
									@foreach($cards->city->projects as $project)
									@php
									$projects_available=$projects_available+1;
									@endphp
									<option value="{{$project->property->id }}" @if(in_array($project->property->id, $data['selectedPropertyIds'])) selected @endif>{{$project->property->name.' |  '. $project->property->id }}</option>
									@endforeach
								</select>

							</div>
							@else
							<div>You Don't have any project for this location, <a href="{{route('frontuser.property.create')}}">Add Project/Property to get start</a> </div>
							@endif
							@endforeach
							@if($projects_available>0)
						</div>
						<div class="d-flex justify-content-end mt-4">
							<button type="submit" class="btn btn-primary submit-btn">Save</button>
						</div>

                        @endif
                    </form>
                </div>


            </div>
        </div>
    </div>
</section>
@endsection
@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/js/select2.full.min.js"></script>
<script>
    $(document).ready(function() {

        $('.select2').select2()

        $('.select-all').click(function() {
            let $select2 = $(this).parent().siblings('.select2')
            $select2.find('option').prop('selected', 'selected')
            $select2.trigger('change')
        })
        $('.deselect-all').click(function() {
            let $select2 = $(this).parent().siblings('.select2')
            $select2.find('option').prop('selected', '')
            $select2.trigger('change')
        })




        $('#state_id').on('change', function() {
            var stateId = $(this).val();
            $.ajax({
                url: '/cities/' + stateId,
                type: 'GET',
                success: function(response) {
                    var citySelect = $('#city_id');
                    citySelect.empty();
                    $.each(response, function(index, city) {
                        citySelect.append($('<option>', {
                            value: city.id,
                            text: city.name
                        }));
                    });
                },
                error: function(error) {
                    console.error(error);
                }
            });
        });

        $('input[name="selected_card"]').change(function() {
            const selectedCardId = $(this).val();
            $('#selectedCardId').val(selectedCardId);
            $('#selectedCardInfo').html('Selected Card: <img src="' + $(this).siblings('img').attr('src') + '" alt="Selected Card">');
            $('#selectCardBtn').prop('disabled', false);
        });

        $('#cardSelectionModal').on('hidden.bs.modal', function() {
            $('#selectCardBtn').prop('disabled', true);
        });
    })
</script>
@endsection