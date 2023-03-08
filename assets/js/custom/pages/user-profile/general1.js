"use strict";

var verifyMRequest, cancelMRequest;
// Class definition
var KTProfileGeneral = (function () {
	// init variables
	var showMoreButton;
	var shareButton;
	var showMoreCards;
	var followBtn;
	var profileNav;
	var pageToolbar;

	var handleShare = function () {
		if (!shareButton) {
			return;
		}
		shareButton.addEventListener("click", function (e) {
			// share link
			if (navigator.share) {
				navigator
					.share({
						title: shareButton.getAttribute('title'),
						text: shareButton.getAttribute('message'),
						url: shareButton.getAttribute('url'),
					})
					.then(() => console.log("Successful share"))
					.catch((error) => console.log("Error sharing", error));
			} else {
				console.log("Share not supported on this browser, do it the old way.");
			}
		});
	};
	// Private functions
	var handleShowMore = function () {
		if (!showMoreButton) {
			return;
		}

		// Show more click
		showMoreButton.addEventListener("click", function (e) {
			showMoreButton.setAttribute("data-kt-indicator", "on");

			// Disable button to avoid multiple click
			showMoreButton.disabled = true;

			setTimeout(function () {
				// Hide loading indication
				showMoreButton.removeAttribute("data-kt-indicator");

				// Enable button
				showMoreButton.disabled = false;

				// Hide button
				showMoreButton.classList.add("d-none");

				// Show card
				showMoreCards.classList.remove("d-none");

				// Scroll to card
				KTUtil.scrollTo(showMoreCards, 200);
			}, 2000);
		});
	};

	// Follow button
	var handleUFollow = function () {
		if (!followBtn) {
			return;
		}

		followBtn.addEventListener("click", function (e) {
			// Prevent default action
			e.preventDefault();

			// Show indicator
			followBtn.setAttribute("data-kt-indicator", "on");

			// Disable button to avoid multiple click
			followBtn.disabled = true;

			// Check button state
			if (followBtn.classList.contains("btn-success")) {
				setTimeout(function () {
					followBtn.removeAttribute("data-kt-indicator");
					followBtn.classList.remove("btn-success");
					followBtn.classList.add("btn-light");
					followBtn.querySelector(".svg-icon").classList.add("d-none");
					followBtn.querySelector(".indicator-label").innerHTML = "Follow";
					followBtn.disabled = false;
				}, 1500);
			} else {
				setTimeout(function () {
					followBtn.removeAttribute("data-kt-indicator");
					followBtn.classList.add("btn-success");
					followBtn.classList.remove("btn-light");
					followBtn.querySelector(".svg-icon").classList.remove("d-none");
					followBtn.querySelector(".indicator-label").innerHTML = "Following";
					followBtn.disabled = false;
				}, 1000);
			}
		});
	};

	var handleFollowers = function () {
		KTUtil.on(
			document.body,
			'[data-kt-follow-btn="true"]',
			"click",
			function (e) {
				e.preventDefault();

				var el = this;
				var label = el.querySelector(".indicator-label");
				var following = el.querySelector(".following");
				var follow = el.querySelector(".follow");

				el.setAttribute("data-kt-indicator", "on");
				el.disabled = true;
				follow.classList.add("d-none");
				following.classList.add("d-none");

				setTimeout(function () {
					el.removeAttribute("data-kt-indicator");
					el.disabled = false;

					if (el.classList.contains("btn-light-primary")) {
						// following
						el.classList.remove("btn-light-primary");
						el.classList.add("btn-light");

						follow.classList.remove("d-none");

						label.innerHTML = "Follow";
					} else {
						// follow
						el.classList.add("btn-light-primary");
						el.classList.remove("btn-light");

						following.classList.remove("d-none");

						label.innerHTML = "Following";
					}
				}, 2000);
			}
		);
	};

	var handlePageScroll = function () {
		if (
			profileNav &&
			profileNav.getAttribute("data-kt-sticky") &&
			KTUtil.isBreakpointUp("lg")
		) {
			if (localStorage.getItem("nav-initialized") === "1") {
				window.scroll({
					top: parseInt(
						profileNav.getAttribute("data-kt-page-scroll-position")
					),
					behavior: "smooth",
				});
			}

			localStorage.setItem("nav-initialized", "1");
		}
	};

	verifyMRequest = (e, id, loc) => {
		let customerName = "";
		// Select parent row
		const parent = e.closest("tr");
		// Get customer name
		if (parent !== null)
			customerName = parent.querySelectorAll("td")[0].innerText;
		else customerName = $("#navbar-mname").html();

		Swal.fire({
			text: "Are you sure you want to verify " + customerName + "'s record ?",
			icon: "warning",
			buttonsStyling: false,
			showCancelButton: true,
			confirmButtonText: "Yes, verify!",
			cancelButtonText: "No, cancel",
			customClass: {
				confirmButton: "btn fw-bold btn-primary",
				cancelButton: "btn fw-bold btn-active-light-primary",
			},
		}).then(function (result) {
			if (result.isConfirmed) {
				$.ajax({
					url: "../../"+loc+"/requests",
					type: "POST",
					data: { id: id, action: "verify" },
					dataType: "json",
					success: function (d, s) {
						if (d.status === true) {
							Swal.fire({
								text: d.message,
								icon: "success",
								buttonsStyling: false,
								confirmButtonText: "Ok, got it!",
								customClass: {
									confirmButton: "btn btn-primary",
								},
							}).then(function (result) {
								if (result.isConfirmed) {
									// Select parent row
									location.reload();
								}
							});
						} else {
							Swal.fire({
								text: d.message,
								icon: "error",
								buttonsStyling: false,
								confirmButtonText: "Ok, got it!",
								customClass: {
									confirmButton: "btn btn-light",
								},
							});
						}
					},
					error: function (s) {
						Swal.fire({
							text: "Sorry, we have server error! Please try agian!",
							icon: "error",
							buttonsStyling: false,
							confirmButtonText: "Ok, got it!",
							customClass: {
								confirmButton: "btn btn-light",
							},
						});
					},
				});
			}
		});
	};

	cancelMRequest = (e, id, loc) => {
		let customerName = "";
		// Select parent row
		const parent = e.closest("tr");
		// Get customer name
		if (parent !== null)
			customerName = parent.querySelectorAll("td")[0].innerText;
		else customerName = $("#navbar-mname").html();

		Swal.fire({
			text: "Are you sure you want to cancel " + customerName + "'s record ?",
			icon: "warning",
			input: "text",
			inputPlaceholder: "Your reason (max length: 100)",
			inputAttributes: {
				maxlength: 100,
			},
			buttonsStyling: false,
			showCancelButton: true,
			confirmButtonText: "Yes, cancel!",
			cancelButtonText: "No, don't cancel",
			customClass: {
				confirmButton: "btn fw-bold btn-primary",
				cancelButton: "btn fw-bold btn-active-light-primary",
			},
		}).then(function (result) {
			if (result.isConfirmed) {
				$.ajax({
					url: "../../"+loc+"/requests",
					type: "POST",
					data: { id: id, reason: result.value, action: "cancel" },
					dataType: "json",
					success: function (d, s) {
						if (d.status === true) {
							Swal.fire({
								text: d.message,
								icon: "success",
								buttonsStyling: false,
								confirmButtonText: "Ok, got it!",
								customClass: {
									confirmButton: "btn btn-primary",
								},
							}).then(function (result) {
								if (result.isConfirmed) {
									// Select parent row
									location.reload();
								}
							});
						} else {
							Swal.fire({
								text: d.message,
								icon: "error",
								buttonsStyling: false,
								confirmButtonText: "Ok, got it!",
								customClass: {
									confirmButton: "btn btn-light",
								},
							});
						}
					},
					error: function (s) {
						Swal.fire({
							text: "Sorry, we have server error! Please try agian!",
							icon: "error",
							buttonsStyling: false,
							confirmButtonText: "Ok, got it!",
							customClass: {
								confirmButton: "btn btn-light",
							},
						});
					},
				});
			}
		});
	};

	// Public methods
	return {
		init: function () {
			showMoreButton = document.querySelector("#kt_followers_show_more_button");
			shareButton = document.querySelector("#cw_share_button");
			showMoreCards = document.querySelector("#kt_followers_show_more_cards");
			followBtn = document.querySelector("#kt_user_follow_button");
			profileNav = document.querySelector("#kt_user_profile_nav");

			handleShowMore();
			handleUFollow();
			handleFollowers();
			handlePageScroll();
			handleShare();
		},
	};
})();

// On document ready
KTUtil.onDOMContentLoaded(function () {
	KTProfileGeneral.init();
});
