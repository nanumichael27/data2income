@extends('user.layout.layout')

@section('title', 'Make Payment')

@section('content')
<script src="https://checkout.flutterwave.com/v3.js"></script>
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
                You will need to activate your account with a one time payment of N500 before you can perform any task on your account.
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

@section('js')
<script>
    Transaction = {
        tx_ref: null,
        amount: null,
        initiateTransaction: function(amount) {
            this.amount = 500;
            this.generateRefrence();
            return this.tx_ref;
        },
        generateRefrence: function() {
            let amount = this.amount;
            $.ajax({
                type: 'POST',
                url: "{{route('createtransaction')}}",
                data: [{
                    name: 'amount',
                    value: amount
                }],
                success: (data) => {
                    Transaction.tx_ref = data;
                    makePayment();
                }
            })
            return Transaction.tx_ref;
        },
        verify: function(data) {
            data = JSON.stringify(data);
            console.log(data);
            $.ajax({
                type: 'POST',
                url: "{{route('verifytransaction')}}",
                data: [{
                    name: 'transaction',
                    value: data
                }],
                success: (data) => {
                    if (data == "success") {
                        swal("Good job!", "Transaction has be successfully processed", "success");
                        setTimeout(() => {
                            window.location = "{{route('dashboard')}}"
                        }, 2000);
                    } else {
                        swal("Something went wrong!", data, 'error').then(() => {
                            window.location = "{{route('dashboard')}}";
                        });
                    }
                }
            });
        }
    }

    function makePayment() {

        let amount = "500";
        let email = "{{Auth()->user()->email}}";
        let phone = "{{Auth()->user()->phone}}";
        let name = "{{Auth()->user()->name}}";
        let userId = "{{Auth()->user()->id}}";


        FlutterwaveCheckout({
            public_key: "FLWPUBK_TEST-27a5bc7111804b3ff216a3ac266176b7-X",
            tx_ref: Transaction.tx_ref,
            amount: amount,
            currency: "NGN",
            country: "NG",
            payment_options: "card, banktransfer, ussd",
            redirect_url: // specified redirect URL
                "",
            meta: {
                consumer_id: userId,
                consumer_mac: "92a3-912ba-1192a",
                amount: amount,
            },
            customer: {
                email: email,
                phone_number: phone,
                name: name,
            },
            callback: function(data) {
                console.log(data);
                Transaction.verify(data);
            },
            onclose: function() {
                // close modal
            },
            customizations: {
                title: "Activate Your account",
                description: "For activation of data2income account",
                logo: "https://stakescrypto.com/asset/images/logo-gold.png",
            },
        });

    }
</script>
@endsection