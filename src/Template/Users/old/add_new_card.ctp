<script src="https://js.stripe.com/v3/"></script>

<?= $this->Form->create('', ['id' => "payment-form", 'style' => "padding-top: 125px;"]); ?>
<h1 class="heading-eli"><span>Billing Information <a href="#" onclick="history.back()">Close</a></span></h1>
<div id="payment-element">
    Elements will create form elements here 
</div>
<button id="submit" class="btn btn-info">Submit</button>
<div id="error-message"> 
</div>
<?= $this->Form->end(); ?>

<script>

    // GET SETUP Intent

//    const stripe = Stripe('pk_test_51JY90jITPrbxGSMcuo8bhxqQhCbSvHghLQaYIxtqVSe9u2xxm80SDtIVQ9acsLTW4WyPJX5G0nIMxaLXwtXbsN0N00vkBYmYDU');
    const stripe = Stripe('pk_live_51JY90jITPrbxGSMc2biBXo0DoiP6kSUOwvQQix5RmbPTlEIeJSPL3inlSdqhoJ4dh5oV5FJHpcuCMTuk3V2Hymqa00sVontf8A');
    const options = {
        clientSecret: '<?= $client_secret; ?>',
        // Fully customizable with appearance API.
//        appearance: {},
    };

// Set up Stripe.js and Elements to use in checkout form, passing the client secret obtained in step 2
    const elements = stripe.elements(options);

// Create and mount the Payment Element
    const paymentElement = elements.create('payment');
    paymentElement.mount('#payment-element');


    const form = document.getElementById('payment-form');

    form.addEventListener('submit', async (event) => {
        event.preventDefault();

        const {error} = await stripe.confirmSetup({
            //`Elements` instance that was used to create the Payment Element
            elements,
            confirmParams: {
                return_url: '<?= HTTP_ROOT; ?>card_status/<?= $token_key; ?>/',
            }
        });

        if (error) {
            // This point will only be reached if there is an immediate error when
            // confirming the payment. Show error to your customer (for example, payment
            // details incomplete)
            const messageContainer = document.querySelector('#error-message');
            messageContainer.textContent = error.message;
        } else {
            // Your customer will be redirected to your `return_url`. For some payment
            // methods like iDEAL, your customer will be redirected to an intermediate
            // site first to authorize the payment, then redirected to the `return_url`.
        }
    });

</script>