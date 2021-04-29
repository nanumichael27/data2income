@extends('user.layout.layout')

@section('title', 'Make Payment')

@section('content')

<div class="row">

    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Activate Account</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                        <i class="fas fa-minus"></i></button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                        <i class="fas fa-times"></i></button>
                </div>
            </div>
            <div class="card-body">
                You will need to activate your account with a one time payment of N{{$settings->activation_price}} before you can perform any task on your account.
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <button type="button" class="btn btn-block btn-primary btn-flat btn-rounded" onClick="Transaction.initiateTransaction();">Click here to make Payment</button>
            </div>
            <!-- /.card-footer-->
        </div>
        <!-- /.card -->
    </div>

</div>
@endsection

@php
$transactionTitle = "Activate Account";
$transactionDescription = "For activation of data2income account";
@endphp
@include('transactionscripts')
@section('js')

@endsection