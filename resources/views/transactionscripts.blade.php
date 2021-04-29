<script src="https://checkout.flutterwave.com/v3.js"></script>
<script>
    Transaction = {
        tx_ref: null,
        amount: null,
        initiateTransaction: function(amount) {
            this.amount = "{{$settings->activation_price}}";
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
                    value: amount,
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

        let amount = "{{$settings->activation_price}}";
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
                title: "{{$transactionTitle}}",
                description: "{{$transactionDescription}}",
                logo: "https://stakescrypto.com/asset/images/logo-gold.png",
            },
        });

    }
</script>