

    <div id="card-element">
        <!-- A Stripe Element will be inserted here. -->
    </div>
{{--    <button id="submit-payment">Submit Payment</button>--}}
{{--<script src="https://js.stripe.com/v3/"></script>--}}
{{--<script>--}}
{{--    const stripe = Stripe('pk_test_51Ng3mqJhLKjdolzELxiiUuoQAeIh37PT6KR6QFkiSVF7thLp85BG0oN0t4INLtwW0X0ggOC1dZE2uUq8FEE1t2a200WqliAM32');--}}
{{--    const elements = stripe.elements();--}}
{{--    const cardElement = elements.create('card');--}}
{{--    cardElement.mount('#card-element');--}}
{{--    const form = document.getElementById('card-payment-form');--}}
{{--    form.addEventListener('submit', async (event) => {--}}
{{--        event.preventDefault();--}}
{{--        const { token, error } = await stripe.createToken(cardElement);--}}
{{--        if (error) {--}}
{{--            // Handle error--}}
{{--        } else {--}}
{{--            // Append token to the form and submit--}}
{{--            const hiddenInput = document.createElement('input');--}}
{{--            hiddenInput.setAttribute('type', 'hidden');--}}
{{--            hiddenInput.setAttribute('name', 'stripeToken');--}}
{{--            hiddenInput.setAttribute('value', token.id);--}}
{{--            form.appendChild(hiddenInput);--}}
{{--            form.submit();--}}
{{--        }--}}
{{--    });--}}
{{--</script>--}}
