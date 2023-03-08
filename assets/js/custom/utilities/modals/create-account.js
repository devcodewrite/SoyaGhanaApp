"use strict";

// Class definition
var KTCreateAccount = (function () {
	// Elements
	var modal;
	var modalEl;

	var stepper;
	var form;
	var formSubmitButton;
	var formContinueButton;

	// Variables
	var stepperObj;
	var validations = [];

	// Private Functions
	var initStepper = function () {
		// Initialize Stepper
		stepperObj = new KTStepper(stepper);

		// Stepper change event
		stepperObj.on("kt.stepper.changed", function (stepper) {
			if (stepperObj.getCurrentStepIndex() === 4) {
				formSubmitButton.classList.remove("d-none");
				formSubmitButton.classList.add("d-inline-block");
				formContinueButton.classList.add("d-none");
			} else if (stepperObj.getCurrentStepIndex() === 5) {
				formSubmitButton.classList.add("d-none");
				formContinueButton.classList.add("d-none");
			} else {
				formSubmitButton.classList.remove("d-inline-block");
				formSubmitButton.classList.remove("d-none");
				formContinueButton.classList.remove("d-none");
			}
		});

		// Validation before going to next page
		stepperObj.on("kt.stepper.next", function (stepper) {
			console.log("step " + stepper.getCurrentStepIndex());

			// Validate form before change stepper step
			var validator = validations[stepper.getCurrentStepIndex() - 1]; // get validator for currnt step

			if (validator) {
				validator.validate().then(function (status) {
					//	console.log('validated!');

					if (status == "Valid") {
						if (
							stepper.getCurrentStepIndex() == 2 &&
							$("#business").hasClass("hidden")
						) {
							stepper.goNext();
							stepper.goNext();
							KTUtil.scrollTop();
							return;
						}
						stepper.goNext();

						KTUtil.scrollTop();
					} else {
						Swal.fire({
							text: "Sorry, looks like there are some errors detected, please try again.",
							icon: "error",
							buttonsStyling: false,
							confirmButtonText: "Ok, got it!",
							customClass: {
								confirmButton: "btn btn-light",
							},
						}).then(function () {
							KTUtil.scrollTop();
						});
					}
				});
			} else {
				stepper.goNext();

				KTUtil.scrollTop();
			}
		});

		// Prev event
		stepperObj.on("kt.stepper.previous", function (stepper) {
			//console.log(stepper.getCurrentStepIndex());
			$('#view-profile').addClass('hidden');

			if (
				stepper.getCurrentStepIndex() == 4 &&
				$("#business").hasClass("hidden")
			) {
				stepper.goPrevious();
				stepper.goPrevious();
				KTUtil.scrollTop();
				return;
			}
			stepper.goPrevious();
			KTUtil.scrollTop();
		});
	};

	var handleForm = function () {
		formSubmitButton.addEventListener("click", function (e) {
			// Validate form before change stepper step
			var validator = validations[3]; // get validator for last form

			validator.validate().then(function (status) {
				console.log("validated!");

				if (status == "Valid") {
					// Prevent default button action
					e.preventDefault();
					// Disable button to avoid multiple click
					formSubmitButton.disabled = true;
					// Show loading indication
					formSubmitButton.setAttribute("data-kt-indicator", "on");
					let formData = new FormData(form);

					$.ajax({
						url: $(form).attr('action'),
						type: "POST",
						data: formData,
						enctype: 'multipart/form-data',
						dataType: "json",
						contentType: false,
						processData: false,
						success: function (d, s) {
							if (d.status === true) {
								// Hide loading indication
								formSubmitButton.removeAttribute("data-kt-indicator");
								// Enable button
								formSubmitButton.disabled = false;
								stepperObj.goNext();
								let link = $('#ref-link').attr('href')+d.data.referer.id;
								$('#ref-link').attr('href',link);
								$('#ref-link').html(d.data.referer.name +  "(" +d.data.refererId+ ")");

								let link2 = $('#memb-link').attr('href')+d.data.id;
								$('#memb-link').attr('href',link2);

								$('#view-profile').removeClass('hidden');

							} else {
								formSubmitButton.removeAttribute("data-kt-indicator");
								// Enable button
								formSubmitButton.disabled = false;
								Swal.fire({
									text: d.message,
									icon: "error",
									buttonsStyling: false,
									confirmButtonText: "Ok, got it!",
									customClass: {
										confirmButton: "btn btn-light",
									},
								}).then(function () {
									KTUtil.scrollTop();
								});
							}
						},
						error: function (s) {
							formSubmitButton.removeAttribute("data-kt-indicator");
								// Enable button
								formSubmitButton.disabled = false;

							Swal.fire({
								text: "Sorry, your form couldn't be proccessed! Please try agian!",
								icon: "error",
								buttonsStyling: false,
								confirmButtonText: "Ok, got it!",
								customClass: {
									confirmButton: "btn btn-light",
								},
							}).then(function () {
								KTUtil.scrollTop();
							});
						},
					});
				} else {
					KTUtil.scrollTop();
				}
			});
		});

		// ID card type. For more info, plase visit the official plugin site: https://select2.org/
		$(form.querySelector('[name="id_card_type"]')).on("change", function () {
			// Revalidate the field when an option is chosen
			validations[3].revalidateField("id_card_type");
		});

		// Expiry year. For more info, plase visit the official plugin site: https://select2.org/
		$(form.querySelector('[name="business_type"]')).on("change", function () {
			// Revalidate the field when an option is chosen
			validations[2].revalidateField("business_type");
		});
	};

	var initValidation = function () {
		// Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/
		// Step 1
		validations.push(
			FormValidation.formValidation(form, {
				fields: {
					type: {
						validators: {
							notEmpty: {
								message: "Account type is required",
							},
						},
					},
				},
				plugins: {
					trigger: new FormValidation.plugins.Trigger(),
					bootstrap: new FormValidation.plugins.Bootstrap5({
						rowSelector: ".fv-row",
						eleInvalidClass: "",
						eleValidClass: "",
					}),
				},
			})
		);

		// Step 2
		validations.push(
			FormValidation.formValidation(form, {
				fields: {
					refererId: {
						validators: {
							notEmpty: {
								message: "Referer Member ID is required",
							},
							stringLength: {
								min: 14,
								max: 14,
								message: "Member ID must contain 14 characters only",
							},
							regexp: {
								regexp: /^[a-zA-Z]{3}\-[0-9]{10}$/,
								message: "The value is not a valid member ID",
							},
						},
					},
					avatar: {
						validators: {
							notEmpty: {
								message: "Passport Photo is required",
							},
						},
					},
					name: {
						validators: {
							notEmpty: {
								message: "Full name is required",
							},
						},
					},
					phone: {
						validators: {
							notEmpty: {
								message: "Phone number is required",
							},
						},
					},
					sex: {
						validators: {
							notEmpty: {
								message: "Sex is required",
							},
						},
					},
					email: {
						validators: {
							emailAddress: {
								message: "The value is not a valid email address",
							},
						},
					},
					"group_ids[]": {
						validators: {
							notEmpty: {
								message: "Select at least one Group",
							},
						},
					},
					bio: {
						validators: {
							notEmpty: {
								message: "Biography is required",
							},
						},
					},
				},
				plugins: {
					trigger: new FormValidation.plugins.Trigger(),
					// Bootstrap Framework Integration
					bootstrap: new FormValidation.plugins.Bootstrap5({
						rowSelector: ".fv-row",
						eleInvalidClass: "",
						eleValidClass: "",
					}),
				},
			})
		);

		// Step 3
		validations.push(
			FormValidation.formValidation(form, {
				fields: {
					company_size: {
						validators: {
							notEmpty: {
								message: "Company size is required",
							},
						},
					},
					company: {
						validators: {
							notEmpty: {
								message: "Busines name is required",
							},
						},
					},
					business_descriptor: {
						validators: {
							notEmpty: {
								message: "Busines descriptor is required",
							},
						},
					},
					business_type: {
						validators: {
							notEmpty: {
								message: "Busines type is required",
							},
						},
					},
					business_email: {
						validators: {
							notEmpty: {
								message: "Busines email is required",
							},
							emailAddress: {
								message: "The value is not a valid email address",
							},
						},
					},
					business_contact: {
						validators: {
							notEmpty: {
								message: "Business tel or mobile is required",
							},
						},
					},
				},
				plugins: {
					trigger: new FormValidation.plugins.Trigger(),
					// Bootstrap Framework Integration
					bootstrap: new FormValidation.plugins.Bootstrap5({
						rowSelector: ".fv-row",
						eleInvalidClass: "",
						eleValidClass: "",
					}),
				},
			})
		);

		// Step 4
		validations.push(
			FormValidation.formValidation(form, {
				fields: {
					address: {
						validators: {
							notEmpty: {
								message: "Address is required",
							},
						},
					},
					location: {
						validators: {
							notEmpty: {
								message: "Location is required",
							},
						},
					},
					id_card_type: {
						validators: {
							notEmpty: {
								message: "ID card type is required",
							},
						},
					},
					national_id: {
						validators: {
							notEmpty: {
								message: "National ID is required",
							},
						},
					},
				},

				plugins: {
					trigger: new FormValidation.plugins.Trigger(),
					// Bootstrap Framework Integration
					bootstrap: new FormValidation.plugins.Bootstrap5({
						rowSelector: ".fv-row",
						eleInvalidClass: "",
						eleValidClass: "",
					}),
				},
			})
		);
	};

	return {
		// Public Functions
		init: function () {
			// Elements
			modalEl = document.querySelector("#kt_modal_create_account");

			if (modalEl) {
				modal = new bootstrap.Modal(modalEl);
			}

			stepper = document.querySelector("#kt_create_account_stepper");

			if (!stepper) {
				return;
			}

			form = stepper.querySelector("#kt_create_account_form");
			formSubmitButton = stepper.querySelector(
				'[data-kt-stepper-action="submit"]'
			);
			formContinueButton = stepper.querySelector(
				'[data-kt-stepper-action="next"]'
			);

			initStepper();
			initValidation();
			handleForm();
		},
	};
})();

// On document ready
KTUtil.onDOMContentLoaded(function () {
	KTCreateAccount.init();
});
