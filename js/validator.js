// Wait for the DOM to be ready
(function ($) {
	if($("#searchform")) {
		// Initialize form validation on the registration form.
		$("#searchform").validate({
			// Specify validation rules
			rules: {
				// The key name on the left side is the name attribute
				// of an input field. Validation rules are defined
				// on the right side
				s: "required"
			},
			// Specify validation error messages
			messages: {
				s: "Suchbegriff?"
			},
			// Make sure the form is submitted to the destination defined
			// in the "action" attribute of the form when valid
			submitHandler: function (form) {
				$(form).ajaxSubmit();
			},
			errorPlacement: function (error, element) {
				element.attr("placeholder", error[0].outerText);
			}
		});
	}

	if($("form[name='filter-form']")) {
		// Initialize form validation on the registration form.
		$("form[name='filter-form']").validate({
			// Specify validation rules
			rules: {
				// The key name on the left side is the name attribute
				// of an input field. Validation rules are defined
				// on the right side
				filterSearch: "required",
				filterCategory: "required",
				filterZip: "required"
			},
			// Specify validation error messages
			messages: {
				filterSearch: "Bitte Suchbegriff eingeben",
				filterCategory: "Bitte Kategorie angeben",
				filterZip: "Bitte PLZ eingeben"
			},
			// Make sure the form is submitted to the destination defined
			// in the "action" attribute of the form when valid
			submitHandler: function (form) {
				$(form).ajaxSubmit();
			},
			errorPlacement: function (error, element) {
				element.attr("placeholder", error[0].outerText);
				element.parents("div.inner-form").toggleClass('ahashakeheartache', '');
			}
		});
	}

	if($("form[name='search-form']")) {
		// Initialize form validation on the registration form.
		$("form[name='search-form']").validate({
			// Specify validation rules
			rules: {
				// The key name on the left side is the name attribute
				// of an input field. Validation rules are defined
				// on the right side
				userPlace: "required",
				carBuildyear: "required",
				carKilometers: "required"
			},
			// Specify validation error messages
			messages: {
				userPlace: "PLZ / Ort ?",
				carBuildyear: "Baujahr ?",
				carKilometers: "Kilometerstand ?"
			},
			// Make sure the form is submitted to the destination defined
			// in the "action" attribute of the form when valid
			submitHandler: function (form) {
				$(form).ajaxSubmit();
			},
			errorPlacement: function (error, element) {
				element.attr("placeholder", error[0].outerText);
				element.parents("div.inner-form").toggleClass('ahashakeheartache', '');
			}
		});
	}

	if($("form[name='register-form']")) {
		$("form[name='register-form']").validate({
			// Specify validation rules
			rules: {
				// The key name on the left side is the name attribute
				// of an input field. Validation rules are defined
				// on the right side
				new_user_name: "required",
				new_user_email: "required",
				new_user_password: "required",
				re_pwd: "reequired"
			},
			// Specify validation error messages
			messages: {
				new_user_name: "Bitte Nutzernamen wählen",
				new_user_email: "Bitte gültige E-Mail angeben",
				new_user_password: "Bitte sicheres Passwort angeben",
				re_pwd: "Bitte sicheres Passwort wiederholen"
			},
			// Make sure the form is submitted to the destination defined
			// in the "action" attribute of the form when valid
			submitHandler: function (form) {
				$(form).ajaxSubmit();
			},
			errorPlacement: function (error, element) {
				element.attr("placeholder", error[0].outerText);
			}
		});
	}

	if($("form[name='login-form']")) {
		$("form[name='login-form']").validate({
			// Specify validation rules
			rules: {
				// The key name on the left side is the name attribute
				// of an input field. Validation rules are defined
				// on the right side
				new_user_email: "required",
				new_user_password: "required"
			},
			// Specify validation error messages
			messages: {
				new_user_email: "E-Mail ?",
				new_user_password: "Passwort *?"
			},
			// Make sure the form is submitted to the destination defined
			// in the "action" attribute of the form when valid
			submitHandler: function (form) {
				$(form).ajaxSubmit();
			},
			errorPlacement: function (error, element) {
				element.attr("placeholder", error[0].outerText);
			}
		});
	}
	
	if($("form[name='masterdata-form']")) {
		// Initialize form validation on the registration form.
		$("form[name='masterdata-form']").validate({
			// Specify validation rules
			rules: {
				// The key name on the left side is the name attribute
				// of an input field. Validation rules are defined
				// on the right side
				new_user_street_number: "required",
				new_user_zip_city: "required",
				new_user_phone: "required"
			},
			// Specify validation error messages
			messages: {
				new_user_street_number: "Strasse & Hausnummer ?",
				new_user_zip_city: "PLZ & Ort ?",
				new_user_phone: "Telefon / Mobil ?"
			},
			// Make sure the form is submitted to the destination defined
			// in the "action" attribute of the form when valid
			submitHandler: function (form) {
				$(form).ajaxSubmit();
			},
			errorPlacement: function (error, element) {
				element.attr("placeholder", error[0].outerText);
			}
		});
	}
    
})(jQuery);
