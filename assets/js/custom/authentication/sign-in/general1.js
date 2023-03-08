"use strict";

// Class definition
var KTSigninGeneral = (function () {
	// Elements
	var form;
	var submitButton;
	var validator;

	// Handle form
	var handleForm = function (e) {
		// Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/
		validator = FormValidation.formValidation(form, {
			fields: {
				phone: {
					validators: {
					
						notEmpty: {
							message: "Phone number is required",
						},
					},
				},
				toc: {
					validators: {
						notEmpty: {
							message: "You must accept the terms and conditions",
						},
					},
				},
			},
			plugins: {
				trigger: new FormValidation.plugins.Trigger(),
				bootstrap: new FormValidation.plugins.Bootstrap5({
					rowSelector: ".fv-row",
					eleInvalidClass: "", // comment to enable invalid state icons
					eleValidClass: "", // comment to enable valid state icons
				}),
			},
		});

		// Handle form submit
		submitButton.addEventListener("click", function (e) {
			// Prevent button default action
			e.preventDefault();

			// Validate form
			validator.validate().then(function (status) {
				if (status == "Valid") {
                    // Show loading indication
                    submitButton.setAttribute("data-kt-indicator", "on");
                    // Disable button to avoid multiple click
                    submitButton.disabled = true;
                    form.submit();
				} else {
					// Show error popup. For more info check the plugin's official documentation: https://sweetalert2.github.io/
					Swal.fire({
						text: "Sorry, accept the terms to processed!",
						icon: "error",
						buttonsStyling: false,
						confirmButtonText: "Ok, got it!",
						customClass: {
							confirmButton: "btn btn-primary",
						},
					});
				}
			});
		});
	};

	// Public functions
	return {
		// Initialization
		init: function () {
			form = document.querySelector("#kt_sign_in_form");
			submitButton = document.querySelector("#kt_sign_in_submit");
			handleForm();
		},
	};
})();

// On document ready
KTUtil.onDOMContentLoaded(function () {
	KTSigninGeneral.init();

	//$(":input").inputmask();
});
