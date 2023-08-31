@extends('layouts.admin')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h2>Slider Details</h2>
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">{{ $slider->name }}</h5>

                    <a href="{{route('admin.property.slides', ['propertySliderId'=>$slider->id])}}">Slider Properties</a>
                </div>
            </div>
            <a href="{{ route('admin.sliders.index') }}" class="btn btn-secondary mt-3">Back to Sliders</a>
        </div>
    </div>
</div>
@endsection
@section('scripts')
@parent



@endsection