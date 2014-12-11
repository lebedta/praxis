jQuery(document).ready(function(){
//mailchimp form
    jQuery('#mailchimp-signup-subscribe-block-subscribe-to-newsletter-form').validate({
        rules: {
            'mergevars[EMAIL]': {
                required: true,
                email: true
            },
            'mergevars[FNAME]': {
                required: true
            },
            'mergevars[LNAME]': {
                required: true
            }
        }
    });
// login form
    jQuery('#user-login').validate({
        rules: {
            name: {
                required: true
            },
            pass: {
                required: true
            }
        }
    });
//  forgot password form
    jQuery('#user-pass').validate({
        rules: {
            name: {
                required: true
            }
        }
    });

//    EMS registration form
    jQuery('#doctor-register-form').validate({
        rules: {
            title: {
                required: true
            },
            first_name: {
                required: true
            },
            last_name: {
                required: true
            },
            address: {
                required: true
            },
            zip: {
                required: true
            },
            phone: {
                required: true
            },
            email: {
                required: true,
                email: true
            }
        }
    });

//    Add service form
    jQuery('#ems-service-form').validate({
        rules: {
            start: {
                required: true
            },
            end: {
                required: true
            }
        }
    });
});