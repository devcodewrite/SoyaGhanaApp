"use strict";

// Class Definition
var KTSigninTwoSteps = (function () {
	// Elements
	var form;
	var submitButton;

	// Handle form
	var handleForm = function (e) {
		// Handle form submit
		submitButton.addEventListener("click", function (e) {
			e.preventDefault();
			var validated = true,otp = '';
			var input1 = form.querySelector("[name=code_1]");
            var input2 = form.querySelector("[name=code_2]");
            var input3 = form.querySelector("[name=code_3]");
            var input4 = form.querySelector("[name=code_4]");
            var phone = form.querySelector("[name=phone]").value;
            var inputs = [input1, input2, input3, input4];

			inputs.map(function (input) {
                otp += input.value;
				if (input.value === "" || input.value.length === 0) {
					validated = false;
				}
			});

            //console.log(otp);
            
			if (validated === true) {
				// Show loading indication
				submitButton.setAttribute("data-kt-indicator", "on");
				// Disable button to avoid multiple click
				submitButton.disabled = true;
				var formUrl = form.getAttribute("data-kt-redirect-url");
				var  redirectUrl = form.getAttribute(
					"data-kt-success-redirect-url"
				);
				if (redirectUrl) {
					$.ajax({
						url: formUrl,
						type: "POST",
						data: {
							'otp': otp,
							'phone':phone,
						},
						dataType: "json",
						success: function (d, s) {
							if (d.status === true) {
                                window.location = redirectUrl;
							} else {
								swal
									.fire({
										text: "Please enter valid securtiy code and try again.",
										icon: "error",
										buttonsStyling: false,
										confirmButtonText: "Ok, got it!",
										customClass: {
											confirmButton: "btn fw-bold btn-light-primary",
										},
									})
									.then(function () {
                                        submitButton.disabled = false;
                                        // Hide loading indication
                                        submitButton.removeAttribute("data-kt-indicator");
										inputs.map(function (input) {
											input.value = "";
										});
										KTUtil.scrollTop();
									});
							}
						},
						error: function (s) {
							swal
								.fire({
									text: "Please enter valid securtiy code and try again.",
									icon: "error",
									buttonsStyling: false,
									confirmButtonText: "Ok, got it!",
									customClass: {
										confirmButton: "btn fw-bold btn-light-primary",
									},
								})
								.then(function () {
                                    submitButton.disabled = false;
									// Hide loading indication
									submitButton.removeAttribute("data-kt-indicator");
									inputs.map(function (input) {
										input.value = "";
									});
									KTUtil.scrollTop();
								});
						},
					});
				}
			} else {
				swal
					.fire({
						text: "Please enter valid securtiy code and try again.",
						icon: "error",
						buttonsStyling: false,
						confirmButtonText: "Ok, got it!",
						customClass: {
							confirmButton: "btn fw-bold btn-light-primary",
						},
					})
					.then(function () {
                        submitButton.disabled = false;
						// Hide loading indication
						submitButton.removeAttribute("data-kt-indicator");
						KTUtil.scrollTop();
					});
			}
		});
	};

var handlePaste = function (e) {
  var clipboardData, pastedData;
  // Stop data actually being pasted into div
  e.stopPropagation();
  e.preventDefault();
  
  // Get pasted data via clipboard API
  clipboardData = e.clipboardData || window.clipboardData;
  pastedData = clipboardData.getData('Text');

  // Do whatever with pasteddata
  	var input1 = form.querySelector("[name=code_1]");
	var input2 = form.querySelector("[name=code_2]");
	var input3 = form.querySelector("[name=code_3]");
	var input4 = form.querySelector("[name=code_4]");
	
	input1.value = pastedData[0];
	input2.value = pastedData[1];
	input3.value = pastedData[2];
	input4.value = pastedData[3];
	
	submitButton.click();
}

	var handleType = function () {
		var input1 = form.querySelector("[name=code_1]");
		var input2 = form.querySelector("[name=code_2]");
		var input3 = form.querySelector("[name=code_3]");
		var input4 = form.querySelector("[name=code_4]");
		input1.addEventListener("paste",handlePaste);
		input2.addEventListener("paste",handlePaste);
		input3.addEventListener("paste",handlePaste);
		input3.addEventListener("paste",handlePaste);
		
		input1.focus();

		input1.addEventListener("keyup", function () {
			if (this.value.length === 1) {
				input2.focus();
			}
		});

		input2.addEventListener("keyup", function () {
			if (this.value.length === 1) {
				input3.focus();
			}
		});

		input3.addEventListener("keyup", function () {
			if (this.value.length === 1) {
				input4.focus();
			}
		});

		input4.addEventListener("keyup", function () {
			if (this.value.length === 1) {
				input4.blur();
			}
		});
	};

	// Public functions
	return {
		// Initialization
		init: function () {
			form = document.querySelector("#kt_sing_in_two_steps_form");
			submitButton = document.querySelector("#kt_sing_in_two_steps_submit");

			handleForm();
			handleType();
		},
	};
})();

// On document ready
KTUtil.onDOMContentLoaded(function () {
	KTSigninTwoSteps.init();
	let countd = 60;
	$("#resend").hide();
	var counter = setInterval(function () {
		$("#resend-count-down").html("Resend in " + countd);
		if (countd <= 0) {
			clearInterval(counter);
			var formUrl = form.getAttribute("data-kt-redirect-url");
			var phone = form.querySelector("[name=phone]");
			var otp = form.querySelector("[name=otp]");
			$("#resend-count-down").html('<a href="'+formUrl+'?phone='+phone+'&otp='+otp+'"> Resend</a>');
			$("#resend").show(100);
		}
		countd = countd - 1;
	}, 1000);
});
