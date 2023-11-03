const reffral_status = text => {
    if (text === undefined) {
        jQuery('#reffral_dependent').css('display','none');
    } else {
        jQuery('#reffral_dependent').css('display','block');
    }
};
