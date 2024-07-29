<div class="container">
    <div style="padding-top:100px;">
        <h1>Please Complete Your Authentication to make the payment.</h1>
        <script src="https://js.stripe.com/v3/"></script>
    </div>
    <div id="message"></div> 
    <?php
    if ($page == "payment") {
        $fail_url = HTTP_ROOT . "welcome/payment";
        $success_url = HTTP_ROOT . "users/processStyleFitReAuth/" . $id;
    }
    if ($page == "customer-order-review") {
        $fail_url = HTTP_ROOT . "customer-order-review";
        $success_url = HTTP_ROOT . "users/processOrderReAuth/" . $id;
    }
    if ($page == "cronjobparent") {
        $fail_url = HTTP_ROOT . "";
        $success_url = HTTP_ROOT . "users/cronjobparentStylfitReAuth/" . $id;
    }
    if ($page == "cronjobkid") {
        $fail_url = HTTP_ROOT . "";
        $success_url = HTTP_ROOT . "users/cronjobkidStylfitReAuth/" . $id;
    }
    ?>
    <script>

        // Initialize Stripe.js using your publishable key
        const stripe = Stripe('pk_test_51JY90jITPrbxGSMcuo8bhxqQhCbSvHghLQaYIxtqVSe9u2xxm80SDtIVQ9acsLTW4WyPJX5G0nIMxaLXwtXbsN0N00vkBYmYDU');

        // Retrieve the "setup_intent_client_secret" query parameter appended to
        // your return_url by Stripe.js

        //setup_intent_client_secret
        const client_secret = '<?= $required_data['client_secret']; ?>';
        const last_payment_error_payment_method_id = '<?= $required_data['payment_method']; ?>';


        stripe.confirmCardPayment(client_secret, {
            payment_method: last_payment_error_payment_method_id
        }).then(function (result) {
            if (result.error) {
                // Show error to your customer
                console.log(result.error.message);
                alert(result.error.message);
                window.location.href = '<?= $fail_url; ?>';
            } else {
                if (result.paymentIntent.status === 'succeeded') {
                    // The payment is complete!
                    window.location.href = '<?= $success_url; ?>';
//                    alert('succeeded');
                }
            }
        });

    </script>
</div>