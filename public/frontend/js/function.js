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

function stripe_payment() {
    var stripe = Stripe('pk_test_51JIrpKSEf4LguLAhzQzDp4Ip68Uzs9XgPMDBu659kmy67lSD90DaT82Osa3upIn4dRDUXgu9CzwfHjd4F8Otw4CD00ze2kGJcP');
    var elements = stripe.elements({
        clientSecret: 'sk_test_51JIrpKSEf4LguLAhFSUv3dgziS6KzJ1bDvOdr0ftU1W3I5pmtktzpk7lqYjenK3Y9QqXjg1jFD2UZjdLpFgHuyrM00JMhbecVp',
    });

    var card = elements.create('expressCheckout');
    card.mount('#card-element');

    card.addEventListener('change', function(event) {
        var displayError = document.getElementById('card-errors');
        if (event.error) {
            displayError.textContent = event.error.message;
        } else {
            displayError.textContent = '';
        }
    });
    // let stripe = Stripe('pk_test_51JIrpKSEf4LguLAhzQzDp4Ip68Uzs9XgPMDBu659kmy67lSD90DaT82Osa3upIn4dRDUXgu9CzwfHjd4F8Otw4CD00ze2kGJcP');
    // let elements = stripe.elements({
    //     clientSecret: 'sk_test_51JIrpKSEf4LguLAhFSUv3dgziS6KzJ1bDvOdr0ftU1W3I5pmtktzpk7lqYjenK3Y9QqXjg1jFD2UZjdLpFgHuyrM00JMhbecVp',
    // });
    // let expressCheckoutElement = elements.create('expressCheckout');
    // expressCheckoutElement.mount('#card-element');
    // let stripe_key = jQuery('#stripe_key').val();
    // let stripe = new Stripe('pk_test_51JIrpKSEf4LguLAhzQzDp4Ip68Uzs9XgPMDBu659kmy67lSD90DaT82Osa3upIn4dRDUXgu9CzwfHjd4F8Otw4CD00ze2kGJcP');
    // var elements = stripe.elements();
    // var cardElement = elements.create('expressCheckout');
    //  console.log(stripe)

}

// }
