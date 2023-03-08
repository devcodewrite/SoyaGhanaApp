"use strict";

// Class definition
var KTAccountSettingsProfileDetails = function () {
    // Private variables
    var form;
    var submitButton;
    var validation;

    // Private functions
    var initValidation = function () {
        // Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/
        validation = FormValidation.formValidation(
            form,
            {
                fields: {
                    name: {
                        validators: {
                            notEmpty: {
                                message: 'Name is required'
                            }
                        }
                    },
                    bio: {
                        validators: {
                            notEmpty: {
                                message: 'Biography is required'
                            }
                        }
                    },
                    phone: {
                        validators: {
                            notEmpty: {
                                message: 'Contact phone number is required'
                            }
                        }
                    },
                },
                plugins: {
                    trigger: new FormValidation.plugins.Trigger(),
                    submitButton: new FormValidation.plugins.SubmitButton(),
                    //defaultSubmit: new FormValidation.plugins.DefaultSubmit(), // Uncomment this line to enable normal button submit after form validation
                    bootstrap: new FormValidation.plugins.Bootstrap5({
                        rowSelector: '.fv-row',
                        eleInvalidClass: '',
                        eleValidClass: ''
                    })
                }
            }
        );

        // Select2 validation integration
        $(form.querySelector('[name="country"]')).on('change', function() {
            // Revalidate the color field when an option is chosen
            validation.revalidateField('country');
        });

        $(form.querySelector('[name="language"]')).on('change', function() {
            // Revalidate the color field when an option is chosen
            validation.revalidateField('language');
        });

        $(form.querySelector('[name="timezone"]')).on('change', function() {
            // Revalidate the color field when an option is chosen
            validation.revalidateField('timezone');
        });
    }

    var handleForm = function () {
        submitButton.addEventListener('click', function (e) {
            e.preventDefault();

            validation.validate().then(function (status) {
                if (status == 'Valid') {
                    // Show loading indication
                    submitButton.setAttribute("data-kt-indicator", "on");
                    // Disable button to avoid multiple click
                    submitButton.disabled = true;

                    let formData = new FormData(form);

			$.ajax({
				url: $(form).attr("action"),
				type: "POST",
				data: formData,
				enctype: "multipart/form-data",
				dataType: "json",
				contentType: false,
				processData: false,
				success: function (d, s) {
					// Remove loading indication
					submitButton.removeAttribute("data-kt-indicator");
					// Enable button
					submitButton.disabled = false;

					if (d.status === true) {
						 swal.fire({
                        text: "Thank you! You've updated your basic info",
                        icon: "success",
                        buttonsStyling: false,
                        confirmButtonText: "Ok, got it!",
                        customClass: {
                            confirmButton: "btn fw-bold btn-light-primary"
                        }
                    });
                    submitButton.disabled = false;
                    // Hide loading indication
                    submitButton.removeAttribute("data-kt-indicator");
					} else {
						Swal.fire({
							text: d.message,
							icon: "error",
							buttonsStyling: false,
							confirmButtonText: "Ok, got it!",
							customClass: {
								confirmButton: "btn btn-light",
							},
						}).then(function () {
                            submitButton.disabled = false;
                            // Hide loading indication
                            submitButton.removeAttribute("data-kt-indicator");
						});
					}
				},
				error: function (s) {
					submitButton.removeAttribute("data-kt-indicator");
					// Enable button
					submitButton.disabled = false;
					Swal.fire({
						text: "Sorry, we have server error! Please try agian!",
						icon: "error",
						buttonsStyling: false,
						confirmButtonText: "Ok, got it!",
						customClass: {
							confirmButton: "btn btn-light",
						},
					}).then(function () {
                        submitButton.disabled = false;
                        // Hide loading indication
                        submitButton.removeAttribute("data-kt-indicator");
					});
				},
			});

                } else {
                    swal.fire({
                        text: "Sorry, looks like there are some errors detected, please try again.",
                        icon: "error",
                        buttonsStyling: false,
                        confirmButtonText: "Ok, got it!",
                        customClass: {
                            confirmButton: "btn fw-bold btn-light-primary"
                        }
                    });
                }
            });
        });
    }

    // Public methods
    return {
        init: function () {
            form = document.getElementById('kt_account_profile_details_form');
            
            if (!form) {
                return;
            }

            submitButton = form.querySelector('#kt_account_profile_details_submit');

            initValidation();
            handleForm();
        }
    }
}();

// On document ready
KTUtil.onDOMContentLoaded(function() {
    KTAccountSettingsProfileDetails.init();
});
