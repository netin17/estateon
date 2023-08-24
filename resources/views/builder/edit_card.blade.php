@extends('layouts.estate')
@section('content')
<link rel="stylesheet" href="{{ url('estate/summernote/summernote-bs4.css')}}">
<link rel="stylesheet" href="{{ url('estate/css/newcss/jquery.fancybox.min.css')}}" />
<section class="dashboard-section">
    <div class="container">
        <div class="dashboard-row d-flex flex-wrap">
            @include('partials.dashboardsidebar', ['user'=>$data['user'], 'propertycount'=>$data['p_count'], 'is_builder'=>$data['is_builder']])
            <div class="dashboard-content-col">
                <div class="dashboard-title-wrap d-lg-block d-none">
                    <h1 class="dark-font text-left dashboard-title mb-4 ">Dashboard</h1>
                </div>
                <div class="refer-box side-refer-box text-center mb-5">
                    Builder Dashboard
                </div>
                <div class="step-bar px-sm-5">
                    <ul class="d-flex step-list">
                        <li class="position-relative step-item step-done"><span class="d-block">1</span></li>
                        <li class="position-relative step-item step-done"><span class="d-block">2</span></li>
                        <li class="position-relative step-item"><span class="d-block">3</span></li>
                    </ul>
                </div>

                <div class="step-content box-style">
                    <h3 class="dark-font text-center step-title">Edit Card</h3>
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
                    <form action="{{ route('frontuser.card.update', $data['card_details']->id) }}" method="POST">
                        @csrf
                        @method('PUT') <!-- Add the HTTP method for update -->

                        <div class="form-group">
                            <label for="state_id">State</label>
                            <select name="state_id" id="state_id" class="form-control" required>
                                <option value="">--Select--</option>
                                @foreach($data['states'] as $state)
                                <option value="{{ $state['id'] }}" {{$data['card_details']->state_id==$state['id'] ? 'selected': ''}}>{{ $state['name'] }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="city_id">City</label>
                            <select name="city_id" id="city_id" class="form-control" required>
                                <option value="">--Select--</option>
                                @foreach($data['cities'] as $city)
                                <option value="{{ $city['id'] }}" {{$data['card_details']->city_id==$city['id'] ? 'selected': ''}}>{{ $city['name'] }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                        <button type="button" class="btn btn-danger main-btn w-100" data-toggle="modal" data-target="#cardSelectionModal">Select Template</button>
                           {{-- <label for="card_id">Card</label> --}}
                            <input type="hidden" name="card_id" value="{{$data['card_details']->card_id}}" id="selectedCardId">
                            <div id="selectedCardInfo" class="card-thumbnail">
                                Selected Card:
                                <img src="{{ asset('storage/' . $data['card_details']->card->thumbnail) }}" alt="Selected Card">
                            </div>
                        </div>

                        <button type="submit" class="btn btn-danger main-btn w-100">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="modal fade" id="cardSelectionModal" tabindex="-1" role="dialog" aria-labelledby="cardSelectionModalLabel">
    <div class="modal-dialog" role="document" style="max-width:662px;">
        <div class="modal-content">
            
            <div class="modal-body p-3 p-md-5">
                <div class="row">
                    @foreach ($data['all_cards'] as $card)
					<div class="col-6 col-md-4">
						<div class="card-thumb-box">
						<input type="radio" name="selected_card" value="{{ $card->id }}">
						<label>
							<img src="{{ asset('storage/' . $card->thumbnail) }}" alt="Card Thumbnail">
						</label>
						</div>
					</div>
                    @endforeach
                </div>
				<div class="modal-footer border-0 card-selection-action">
					<button type="button" class="btn btn-outline-secondary cancel-btn" data-dismiss="modal">Cancel</button>
					<button type="button" class="btn btn-danger select-btn" id="selectCardBtn" disabled data-dismiss="modal">Select</button>
				</div>
            </div>
            
        </div>
    </div>
</div>

@endsection
@section('scripts')
<script src="{{ url('estate/js/jquery-validation/jquery.validate.min.js')}}"></script>
<script src="{{ url('estate/js/jquery-validation/additional-methods.min.js')}}"></script>
<!-- <script src="{{ url('estate/js/jquery.fancybox.min.js')}}"></script>
<script src="{{ url('estate/summernote/summernote-bs4.min.js')}}"></script> -->
<script>
    $(document).ready(function() {

        // $('.textarea').summernote()
        //     $.fancybox.defaults.animationEffect = "none";
        //   $.fancybox.defaults.transitionEffect = "none";
        //     $('[data-fancybox="gallery"]').fancybox();

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
            const selectedCardImage = $(this).siblings('label').find('img').attr('src');
            $('#selectedCardInfo').html('Selected Card: <img src="' + selectedCardImage + '" alt="Selected Card">');
            $('#selectCardBtn').prop('disabled', false);
        });

        $('#cardSelectionModal').on('hidden.bs.modal', function() {
            $('#selectCardBtn').prop('disabled', true);
        });
    })
</script>
@endsection