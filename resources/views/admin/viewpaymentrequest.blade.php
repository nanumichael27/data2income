@extends('user.layout.layout')

@section('title', 'Payment Request')

@section('content')
<div class="row">
    <div class="col-12">
       @livewire('payment-request', ['request' => $request])
       
    </div>

</div>

@endsection


@section('js')

@endsection