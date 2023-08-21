var url = window.location.pathname;

var ajaxResult = null;
async   function Ajax_response(url,method,values,beforetask, success,callback){
    jQuery.ajaxSetup({headers: { 'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')  } });
    return await jQuery.ajax({
        type: method,
        url: url,
        data: values,
        beforeSend: function(msg){
        },
        success: function(msg){
            callback  },
        error: function(_request, status, _error) {
        }
    });
}

$("input").keypress(function(e) {
    var input_val=   $(this).val();
    var name=   $(this).attr('name');
    if(!input_val){  jQuery(`#${name}-error`).html('');  }
});

var Toast = Swal.mixin({
    toast: true,
    position: 'bottom-end',
    showConfirmButton: false,
    showCloseButton: true,
    timer: 10000
});

jQuery("#phone").on("keypress keyup blur",function (event) {
    jQuery(this).val($(this).val().replace(/[^0-9\.]/g,''));
    if ((event.which != 46 || $(this).val().indexOf('.') != -1) && (event.which < 48 || event.which > 57)) {
        event.preventDefault();
    }
});





function animate(obj, initVal, lastVal, duration) {
    let startTime = null;

    //get the current timestamp and assign it to the currentTime variable
    let currentTime = Date.now();

    //pass the current timestamp to the step function
    const step = (currentTime ) => {

        //if the start time is null, assign the current time to startTime
        if (!startTime) {
            startTime = currentTime ;
        }

        //calculate the value to be used in calculating the number to be displayed
        const progress = Math.min((currentTime - startTime)/ duration, 1);

        //calculate what to be displayed using the value gotten above
        obj.innerHTML = Math.floor(progress * (lastVal - initVal) + initVal) + '+';

        //checking to make sure the counter does not exceed the last value (lastVal)
        if (progress < 1) {
            window.requestAnimationFrame(step);
        } else {
            window.cancelAnimationFrame(window.requestAnimationFrame(step));
        }
    };
//start animating
    window.requestAnimationFrame(step);
}


if(url.indexOf("/about-us") > -1){
    const counters = document.querySelectorAll('.counter');
    const speed = 2000;
    counters.forEach((counter) => {
        const updateCount = () => {
            const target = parseInt(counter.getAttribute('data-value'));
            const count = parseInt(counter.innerText);
            const increment = Math.trunc(target / speed);

            if (count < target) {
                counter.innerText = `${count + increment}+`;
                setTimeout(updateCount, 1);
            } else {
                counter.innerText = `${target}+`;
            }
        };
        updateCount();
    });
    let text1 = document.getElementById('counter1');
    animate(text1, 0, 200, 7000);
}


jQuery(window).scroll(function() {
    var scroll = $(window).scrollTop();
    //>=, not <=
    if (scroll >= 550) {
        //clearHeader, not clearheader - caps H
        $(".home_slider_btn").addClass("active");
    }else if(scroll < 550){
        $(".home_slider_btn").removeClass("active");
    }
});


jQuery('.image-popup-vertical-fit').magnificPopup({

    type: 'image',
    mainClass: 'mfp-with-zoom',
    gallery:{
        enabled:true
    },
    zoom: {
        enabled: true,

        duration: 300, // duration of the effect, in milliseconds
        easing: 'ease-in-out', // CSS transition easing function

        opener: function(openerElement) {

            return openerElement.is('img') ? openerElement : openerElement.find('img');
        }
    }

});



async function state_dependency_country_list(ajax_post, url) {
    const response = await Ajax_response(url, "POST", ajax_post, '');
    jQuery(`#billing_state`).empty().html(response);
}

function stripe_payment_intergation() {
    let stripe = Stripe('pk_test_51Ng3mqJhLKjdolzELxiiUuoQAeIh37PT6KR6QFkiSVF7thLp85BG0oN0t4INLtwW0X0ggOC1dZE2uUq8FEE1t2a200WqliAM32');
    var elements = stripe.elements();

    var style = {
      base: {
        iconColor: '#666EE8',
        color: '#31325F',
        lineHeight: '40px',
        fontWeight: 300,
        fontFamily: 'Helvetica Neue',
        fontSize: '15px',
    
        '::placeholder': {
          color: '#CFD7E0',
        },
      },
    };

    var cardNumberElement = elements.create('cardNumber', {
        style: style
      });
      cardNumberElement.mount('#card-number-element');
      
      var cardExpiryElement = elements.create('cardExpiry', {
        style: style
      });
      cardExpiryElement.mount('#card-expiry-element');
      
      var cardCvcElement = elements.create('cardCvc', {
        style: style
      });
      cardCvcElement.mount('#card-cvc-element');

      function setOutcome(result) {
        var successElement = document.querySelector('.success');
        var errorElement = document.querySelector('.error');
        successElement.classList.remove('visible');
        errorElement.classList.remove('visible');
      
        if (result.token) {
          // In this example, we're simply displaying the token
          successElement.querySelector('.token').textContent = result.token.id;
          successElement.classList.add('visible');
      
          // In a real integration, you'd submit the form with the token to your backend server
          //var form = document.querySelector('form');
          //form.querySelector('input[name="token"]').setAttribute('value', result.token.id);
          //form.submit();
        } else if (result.error) {
          errorElement.textContent = result.error.message;
          errorElement.classList.add('visible');
        }
      }
      
      var cardBrandToPfClass = {
          'visa': 'pf-visa',
        'mastercard': 'pf-mastercard',
        'amex': 'pf-american-express',
        'discover': 'pf-discover',
        'diners': 'pf-diners',
        'jcb': 'pf-jcb',
        'unknown': 'pf-credit-card',
      }
      
      function setBrandIcon(brand) {
          var brandIconElement = document.getElementById('brand-icon');
        var pfClass = 'pf-credit-card';
        if (brand in cardBrandToPfClass) {
            pfClass = cardBrandToPfClass[brand];
        }
        for (var i = brandIconElement.classList.length - 1; i >= 0; i--) {
            brandIconElement.classList.remove(brandIconElement.classList[i]);
        }
        brandIconElement.classList.add('pf');
        brandIconElement.classList.add(pfClass);
      }
      
      cardNumberElement.on('change', function(event) {
          // Switch brand logo
          if (event.brand) {
            setBrandIcon(event.brand);
        }
      
          setOutcome(event);
      });

    //let cardElement = elements.create('card');

    //var cardElement = elements.create('card');
    //cardElement.mount('#card-element');
    const form = document.getElementById('payment-form');  
    document.querySelector('form').addEventListener('submit', async function(e) {
        e.preventDefault();
        var options = {
          address_zip: document.getElementById('postal-code').value,
        };
        const {token, error} = await stripe.createToken(cardNumberElement, options);


        if (error) {
        } else {
            setOutcome(token);
            const hiddenInput = document.createElement('input');
            hiddenInput.setAttribute('type', 'hidden');
            hiddenInput.setAttribute('name', 'stripeToken');
            hiddenInput.setAttribute('value', token.id);
            form.appendChild(hiddenInput);
            form.submit();
        }
      });

    /*const form = document.getElementById('payment-form');
    jQuery(document).on("submit", ".stripe_form", async function (event) {
        event.preventDefault();
        const {token, error} = await stripe.createToken(cardElement);
        if (error) {
        } else {
            const hiddenInput = document.createElement('input');
            hiddenInput.setAttribute('type', 'hidden');
            hiddenInput.setAttribute('name', 'stripeToken');
            hiddenInput.setAttribute('value', token.id);
            form.appendChild(hiddenInput);
            form.submit();
        }
    });*/

}

