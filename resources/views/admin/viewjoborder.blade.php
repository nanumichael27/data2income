@extends('user.layout.layout')

@section('title', 'Job Order')

@section('content')
<div class="row">
    <div class="col-12">
       @livewire('job-order', ['jobOrder' => $jobOrder])
    </div>

</div>

@endsection


@section('js')

@endsection