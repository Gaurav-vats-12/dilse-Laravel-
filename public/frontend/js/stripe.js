const stripePayment_Form = StripekEY => {
    localStorage.clear();
    let stripe = Stripe(StripekEY);
    let elements = stripe.elements();
    let style = {
        base: {
            iconColor: '#666EE8',
            color: '#31325F',
            lineHeight: '40px',
            fontWeight: 300,
            fontFamily: 'Helvetica Neue',
            fontSize: '15px',

            '::placeholder': {
                color: '#00000',
            },
        },
    };
    let cardNumberElement = elements.create('cardNumber', {
        showIcon: true,
        placeholder: 'Card Number',
        hidePostalCode: true,
        theme: 'stripe',
        style: style
    });


    cardNumberElement.mount('#card-number-element');

    let cardExpiryElement = elements.create('cardExpiry', {
        style: style
    });
    cardExpiryElement.mount('#card-expiry-element');

    let cardCvcElement = elements.create('cardCvc', {
        style: style
    });
    cardCvcElement.mount('#card-cvc-element');

    function setOutcome(result) {
        let successElement = document.querySelector('.success');
        let errorElement = document.querySelector('.error');
        successElement.classList.remove('visible');
        errorElement.classList.remove('visible');
        if (result.token) {
        } else if (result.error) {
            errorElement.classList.add('visible');
              errorElement.textContent = result.error.message;
        }
    }

    let cardBrandToPfClass = {
        'visa': 'pf-visa',
        'mastercard': 'pf-mastercard',
        'amex': 'pf-american-express',
        'discover': 'pf-discover',
        'diners': 'pf-diners',
        'jcb': 'pf-jcb',
        'unknown': 'pf-credit-card',
    }

    const setBrandIcon = brand => {
        let brandIconElement = document.getElementById('brand-icon');
        let pfClass = 'pf-credit-card';
        if (brand in cardBrandToPfClass) {
            pfClass = cardBrandToPfClass[brand];
        }
        for (var i = brandIconElement.classList.length - 1; i >= 0; i--) {
            brandIconElement.classList.remove(brandIconElement.classList[i]);
        }
        brandIconElement.classList.add('pf');
        brandIconElement.classList.add(pfClass);
    };

    cardNumberElement.on('change', function(event) {
        // Switch brand logo
        if (event.brand) {
            setBrandIcon(event.brand);
        }
        setOutcome(event);
    });
    jQuery(document).on("submit","#stripe_form",async function(e) {
        stripe.createToken(cardNumberElement).then(function (result) {
            if (result.error) {
              let errorElement = document.querySelector('.error');
              errorElement.classList.add('visible');
              errorElement.textContent = result.error.message;
              console.error(result.error.message);
            } else {
                jQuery(`.spinner-border`).removeClass(`d-none`);
                jQuery(`.theme_btn`).attr(`disabled`, true);
                jQuery(`.btn-txt`).text(`Processing ...`);
                const hiddenInput = document.createElement('input');
                hiddenInput.setAttribute(`type`, `hidden`);
                hiddenInput.setAttribute(`name`, `stripeToken`);
                hiddenInput.setAttribute(`id`, `stripeToken`);
                hiddenInput.setAttribute('value', result.token.id);
                document.getElementById(`stripe_form`).appendChild(hiddenInput);
                document.getElementById(`stripe_form`).submit();
              console.log(`Card is valid:`, result.token);
                 //
            }
          })
    });

};
const payment_intergation = () => {
    jQuery(`.payment_form`).validate({
        rules: {
            billing_full_name: {
                required: true,
                maxlength: 50,
            }, billing_phone: {
                required: true,
            }, billing_email: {
                required: true,
                email: true,
            }, billing_address_1: {
                required: true,
                maxlength: 200,
            }, billing_city: {
                required: true,
                maxlength: 100,
            }, billing_postcode: {
                required: true,
            }
        },
        messages: {
            billing_full_name: {
                required: "Please Enter the Billing Full Name",
                maxlength: "Billing Full Name must be max 50 letter"
            }, billing_phone: {
                required: "Please Enter the Billing Phone Number",
            }, billing_email: {
                required: "Please Enter the Billing Email Address",
                maxlength: "Billing Email Address Must be Email address"
            }, billing_address_1: {
                required: "Please Enter the Billing Address",
                maxlength: `Billing Phone Number must be max 200 letter`
            }, billing_city: {
                required: "Please Enter the Billing City",
                maxlength: "Billing Phone Number must be max 100 letter"
            }, billing_postcode: {
                required: "Please Enter the Billing Pin Code",
            }
        },
        submitHandler: async function (form, event) {
            event.preventDefault();
            if(jQuery('#order_type').val() ==='delivery'){
                if(jQuery('#shipping_charge').val()){
                    if (jQuery('input[name="payment_method"]:checked').val() ==='Pay On Online (Stripe)') {
                        return false;
                    }else{
                        jQuery(".spinner-border").removeClass(`d-none`);
                        jQuery(".theme_btn").attr(`disabled`, true);
                        jQuery(".btn-txt").text(`Processing ...`);
                        event.preventDefault();
                         document.getElementById(`payment-form`).submit();
                    }

                }else{
                    NotyfMessage(`Please Choose Delivery Charges`, `error`);
                }
            }else{
                if (jQuery('input[name="payment_method"]:checked').val() ==='Pay On Online (Stripe)') {
                    return false;
                }else{
                    jQuery(`.spinner-border`).removeClass(`d-none`);
                    jQuery(`.theme_btn`).attr(`disabled`, true);
                    jQuery(`.btn-txt`).text(`Processing ...`);
                    event.preventDefault();
                     document.getElementById(`payment-form`).submit();
                }
            }
        }
    });
};
