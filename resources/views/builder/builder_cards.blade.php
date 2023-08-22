@extends('layouts.estate')
@section('content')
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
                <div class="step-bar px-sm-5">
                    <ul class="d-flex step-list">
                        <li class="position-relative step-item step-done"><span class="d-block">1</span></li>
                        <li class="position-relative step-item step-done"><span class="d-block">2</span></li>
                        <li class="position-relative step-item"><span class="d-block">3</span></li>
                    </ul>
                </div>

                <div class="step-content box-style">
                    <h3 class="dark-font text-center step-title">Cards</h3>
                    <div class="row">
                    @foreach($data['saved_card'] as $savedcard)
                    <div>
                    <label class="card-thumbnail">
                        <a href="{{route('frontuser.builder-card.edit',['id'=>$savedcard->id])}}"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                        <img src="{{ asset('storage/' . $savedcard->card->thumbnail) }}" alt="Card Thumbnail">
                        <span>
                            @php
                            echo strtoupper($savedcard->city->name);
                            @endphp
                        </span>
                    </label>
                    </div>
                    @endforeach
                    </div>
                    
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
                    @if(count($data['saved_card']) <5 ) 
                    <form action="{{ route('frontuser.card.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="state_id">State</label>
                            <select name="state_id" id="state_id" class="form-control" required>
                                <option value="">--Select--</option>
                                @foreach($data['states'] as $state)
                                <option value="{{ $state['id'] }}">{{ $state['name'] }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="city_id">City</label>
                            <select name="city_id" id="city_id" class="form-control" required>
                                <!-- Populate the cities based on selected state -->
                            </select>
                        </div>

                        <div class="form-group">
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#cardSelectionModal">Select Card</button>
                            <label for="card_id">Card</label>
                            <input type="hidden" name="card_id" id="selectedCardId">
                            <div id="selectedCardInfo" class="card-thumbnail"></div>
                        </div>

                        <button type="submit" class="btn btn-primary">Save</button>
                       
                        </form>
                        @endif
                        <a href="{{route('frontuser.cards.projects')}}" class="btn btn-primary">Skip/Next</a>
                </div>




            </div>
        </div>
    </div>
</section>
<div class="modal fade" id="cardSelectionModal" tabindex="-1" role="dialog" aria-labelledby="cardSelectionModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="cardSelectionModalLabel">Select a Card</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card-thumbnails">
                    @foreach ($data['all_cards'] as $card)
                    <label class="card-thumbnail">
                        <img src="{{ asset('storage/' . $card->thumbnail) }}" alt="Card Thumbnail">
                        <input type="radio" name="selected_card" value="{{ $card->id }}">
                    </label>
                    @endforeach
                </div>
            </div>
            <div class="modal-footer">
                <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button> -->
                <button type="button" class="btn btn-primary" id="selectCardBtn" disabled data-dismiss="modal">Select</button>
               
            </div>
        </div>
    </div>
</div>


@endsection
@section('scripts')
<script src="{{ url('estate/js/jquery-validation/jquery.validate.min.js')}}"></script>
<script src="{{ url('estate/js/jquery-validation/additional-methods.min.js')}}"></script>
<script>
    $(document).ready(function() {
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