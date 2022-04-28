jQuery(document).ready(function ($) {
    // Display form from link inside a popup
	$('#pop_login, #pop_signup').on('click', function (e) {
        formToFadeOut = $('form#register-form');
        formtoFadeIn = $('form#login-form');
        if ($(this).attr('id') == 'pop_signup') {
            formToFadeOut = $('form#login');
            formtoFadeIn = $('form#register');
        }
        formToFadeOut.fadeOut(500, function () {
            formtoFadeIn.fadeIn();
        })
        return false;
    });
	// Close popup
    $(document).on('click', '.login_overlay, .close', function () {
		$('form#login-form, form#register-form').fadeOut(500, function () {
            $('.login_overlay').remove();
        });
        return false;
    });

    // Show the login/signup popup on click
    $('#show_login, #show_signup').on('click', function (e) {
        $('body').prepend('<div class="login_overlay"></div>');
        if ($(this).attr('id') == 'show_login') 
			$('form#login-form').fadeIn(500);
        else 
			$('form#register-form').fadeIn(500);
        e.preventDefault();
    });

	// Perform AJAX login/register on form submit
	$('form#loginform, form#register').on('submit', function (e) {
        if (!$(this).valid()) return false;
        $('p.status', this).show().text(ajax_auth_object.loadingmessage);
		action = 'ajaxlogin';
		username = 	$('form#login-form #username').val();
		password = $('form#login-form #password').val();
		email = '';
		security = $('form#login-form #security').val();
		if ($(this).attr('id') == 'register') {
			action = 'ajaxregister';
			username = $('#signonname').val();
			password = $('#signonpassword').val();
        	email = $('#email').val();
        	security = $('#signonsecurity').val();	
		}  
		ctrl = $(this);
		$.ajax({
            type: 'POST',
            dataType: 'json',
            url: ajax_auth_object.ajaxurl,
            data: {
                'action': action,
                'username': username,
                'password': password,
				'email': email,
                'security': security
            },
            success: function (data) {
				$('p.status', ctrl).text(data.message);
				if (data.loggedin == true) {
                    document.location.href = ajax_auth_object.redirecturl;
                }
            }
        });
        e.preventDefault();
    });
	
	// Client side form validation
    if (jQuery("#register-form").length) 
		jQuery("#register-form").validate(
		{ 
			rules:{
			password2:{ equalTo:'#signonpassword' 
			}	
		}}
		);
    else if (jQuery("#login-form").length) 
		jQuery("#login-form").validate();
});