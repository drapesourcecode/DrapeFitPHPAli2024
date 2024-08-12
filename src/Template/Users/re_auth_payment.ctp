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

    if ($page == "apiStylefitPayment") {
        $fail_url = HTTP_ROOT . "api/StylefitPayment/" . $payment_dil->user_id;
        $success_url = HTTP_ROOT . "api/stylefitPaymentReAuth/" . $id;
    }
    if ($page == "apiCustomerOrderReview") {
        $user_id = $payment_dil->user_id;
        $kid_id = $payment_dil->kid_id;
        if ($payment_dil->profile_type == 3) {
            $profile_type = "KIDS";
        }
        if ($payment_dil->profile_type == 2) {
            $profile_type = "WOMEN";
        }
        if ($payment_dil->profile_type == 1) {
            $profile_type = "MEN";
        }

        $fail_url = HTTP_ROOT . "api/apiCustomerOrderReview/?user_id=" . $user_id . "&kid_id=" . $kid_id . "&profile=" . $profile_type;
        $success_url = HTTP_ROOT . "api/apiCustomerOrderReviewReAuth/" . $id;
    }
    ?>
    <script>

        // Initialize Stripe.js using your publishable key
        const stripe = Stripe('pk_live_51JY90jITPrbxGSMc2biBXo0DoiP6kSUOwvQQix5RmbPTlEIeJSPL3inlSdqhoJ4dh5oV5FJHpcuCMTuk3V2Hymqa00sVontf8A');

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