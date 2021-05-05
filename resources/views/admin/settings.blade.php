@extends('user.layout.layout')

@section('title')
Settings <small>(All changes on this page occur live)</small>
@endsection

@section('content')
<div class="row">
    <!-- <div class="col-sm-12 col-md-6">

    </div> -->
    <div class="col-sm-12 col-md-6">
        @livewire('activation-price', ['amount' => $settings->activation_price])
    </div>
    <div class="col-sm-12 col-md-6">
        @livewire('top-level-price', ['amount' => $settings->top_level_price])
    </div>
</div>
@endsection

@section('js')

@endsection