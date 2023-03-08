"use strict";

// Class definition
var KTCustomersList = (function () {
	// Define shared variables
	var datatable;
	var filterMonth;
	var filterPayment;
	var table;

	// Private functions
	var initCustomerList = function () {
		// Init datatable --- more info on datatables: https://datatables.net/manual/
		datatable = $(table).DataTable({
			ajax: {
				url: "datatable-json/members",
				data: function (d) {},
			},
			initComplete:function(){
			
			},
			columns: [
				{
					data: "id",
					render: function (data, type, row) {
						return (
							'<div class="form-check form-check-sm form-check-custom form-check-solid">' +
							'<input class="form-check-input" type="checkbox" value="1" /></div>'
						);
					},
				},
				{
					data: null,
					render: function (data, type, row) {
						let d = '<div class="d-flex flex-row">';
						if (type === "display") {
							if (data.thumb_photo_url) {
								let img_url = data.thumb_photo_url;
								d +=
									'<div class="symbol symbol-circle symbol-50px overflow-hidden me-3">' +
									'<a href="members/view/' +
									data.id +
									'"><div class="symbol-label">' +
									'<img src="' +
									img_url +
									'" alt="' +
									data.name +
									'" class="w-100" />' +
									"</div></a></div>";
							}
							d +=
								'<div class="d-flex flex-column">' +
								'<a href="members/view/' +
								data.id +
								'" class="text-gray-800 text-hover-primary mb-1">' +
								data.name +
								"</a>" +
								'<span class="text-gray-600 fs-7">' +
								data.memberId +
								"</span></div> </div>";

							return d;
						}
						return data.name + "," + data.memberId;
					},
				},
                {
                    data: 'sex'
                },
				{
					data: "phone",
					render: function (data, type, row) {
						return data;
					},
				},

				{
					data: "groups",
					render: function (data, type, row) {
						let d = "";
						data.forEach(function (item, i) {
							d += item.name;
							d += i < data.length - 1 ? "," : "";
						});
						return d;
					},
				},
                {
                    data: 'type',
                    render: function(data, type, row){
                        return data.toUpperCase();;
                    }
                },
				{
					data: "company",
				},
				{
					data: "locale",
					render: function (data, type, row) {
						return data.name;
					},
				},
                {
					data: "socials",
                    render: function (data, type, row) {
						let socials = JSON.parse(data);
                        let d = '';
                        if(socials){
							if(socials.website) d +=  'Website: '+ socials.website;
							if(socials.facebook) d +=  'Facebook: '+ socials.facebook;
							if(socials.twitter) d +=  'Twitter: '+ socials.twitter;
							if(socials.linkedin) d +=  'LinkedIn: '+ socials.linkedin;
                        }
                        return d;
					},
				},
                {
					data: null,
					render: function (data, type, row) {
						return '<b>'+data.id_card_type + '</b>: '+ data.national_id;
                       
					},
				},
                {
					data: "socials",
				},
				{
					data: "created_at",
					render: function (data, type, row) {
						return moment(data).format("DD MMM YYYY");
					},
				},
				{
					data: "id",
					render: function (data, type, row) {
						let d = "";
						if (type === "display") {
							d =
								'<a href="#" class="btn btn-sm btn-light btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions </a>' +
								'<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">' +
								'<div class="menu-item px-3"><a href="members/view/' +
								data +
								'" class="menu-link px-3">View</a></div>' +
								'<div class="menu-item px-3"><a href="members/edit/' +
								data +
								'" class="menu-link px-3">Edit</a></div>' +
								'<div class="menu-item px-3"><a href="#" class="menu-link px-3" data-kt-customer-table-filter="delete_row">Delete</a>' +
								"</div></div>";
						}
						return d;
					},
				},
			],
			info: false,
			order: [],
			columnDefs: [
				{ orderable: false, targets: 0 }, // Disable ordering on column 0 (checkbox)
				{ orderable: false, targets: 7 }, // Disable ordering on column 6 (actions)
                { target: 2, visible: false, },
                { target: 5, visible: false, },
                { target: 8, visible: false, },
                { target: 9, visible: false, },
                { target: 10, visible: false, },
    
			],
		});

		// Re-init functions on every table re-draw -- more info: https://datatables.net/reference/event/draw
		datatable.on("draw", function () {
			initToggleToolbar();
			handleDeleteRows();
			toggleToolbars();
			KTMenu.init();
		});
	};

	// Search Datatable --- official docs reference: https://datatables.net/reference/api/search()
	var handleSearchDatatable = () => {
		const filterSearch = document.querySelector(
			'[data-kt-customer-table-filter="search"]'
		);
		filterSearch.addEventListener("keyup", function (e) {
			datatable.search(e.target.value).draw();
		});
	};

	// Filter Datatable
	var handleFilterDatatable = () => {
		// Select filter options
		const filterColumn = document.querySelectorAll(".menu-hide-column input");
		filterMonth = $('[data-kt-customer-table-filter="month"]');
		filterPayment = document.querySelectorAll(
			'[data-kt-customer-table-filter="payment_type"] [name="payment_type"]'
		);
		const filterButton = document.querySelector(
			'[data-kt-customer-table-filter="filter"]'
		);

		filterColumn.forEach((ch) => {
			ch.addEventListener("change", function () {
				// Get the column API object
				var column = datatable.column($(this).val());

				// Toggle the visibility
				column.visible(!column.visible());
			});
		});

		// Filter datatable on submit
		filterButton.addEventListener("click", function () {
			// Get filter values
			const monthValue = filterMonth.val();
			let paymentValue = "";

			// Get payment value
			filterPayment.forEach((r) => {
				if (r.checked) {
					paymentValue = r.value;
				}

				// Reset payment value if "All" is selected
				if (paymentValue === "all") {
					paymentValue = "";
				}
			});

			// Build filter string from filter options
			const filterString = monthValue + " " + paymentValue;

			// Filter datatable --- official docs reference: https://datatables.net/reference/api/search()
			datatable.search(filterString).draw();
		});
	};

	// Delete customer
	var handleDeleteRows = () => {
		// Select all delete buttons
		const deleteButtons = table.querySelectorAll(
			'[data-kt-customer-table-filter="delete_row"]'
		);

		deleteButtons.forEach((d) => {
			// Delete button on click
			d.addEventListener("click", function (e) {
				e.preventDefault();

				// Select parent row
				const parent = e.target.closest("tr");

				// Get customer name
				const customerName = parent.querySelectorAll("td")[1].innerText;

				// SweetAlert2 pop up --- official docs reference: https://sweetalert2.github.io/
				Swal.fire({
					text: "Are you sure you want to delete " + customerName + "?",
					icon: "warning",
					showCancelButton: true,
					buttonsStyling: false,
					confirmButtonText: "Yes, delete!",
					cancelButtonText: "No, cancel",
					customClass: {
						confirmButton: "btn fw-bold btn-danger",
						cancelButton: "btn fw-bold btn-active-light-primary",
					},
				}).then(function (result) {
					if (result.value) {
						Swal.fire({
							text: "You have deleted " + customerName + "!.",
							icon: "success",
							buttonsStyling: false,
							confirmButtonText: "Ok, got it!",
							customClass: {
								confirmButton: "btn fw-bold btn-primary",
							},
						}).then(function () {
							// Remove current row
							datatable.row($(parent)).remove().draw();
						});
					} else if (result.dismiss === "cancel") {
						Swal.fire({
							text: customerName + " was not deleted.",
							icon: "error",
							buttonsStyling: false,
							confirmButtonText: "Ok, got it!",
							customClass: {
								confirmButton: "btn fw-bold btn-primary",
							},
						});
					}
				});
			});
		});
	};

	// Reset Filter
	var handleResetForm = () => {
		// Select reset button
		const resetButton = document.querySelector(
			'[data-kt-customer-table-filter="reset"]'
		);

		// Reset datatable
		resetButton.addEventListener("click", function () {
			// Reset month
			filterMonth.val(null).trigger("change");

			// Reset payment type
			filterPayment[0].checked = true;

			// Reset datatable --- official docs reference: https://datatables.net/reference/api/search()
			datatable.search("").draw();
		});
	};

	// Init toggle toolbar
	var initToggleToolbar = () => {
		// Toggle selected action toolbar
		// Select all checkboxes
		const checkboxes = table.querySelectorAll('[type="checkbox"]');

		// Select elements
		const deleteSelected = document.querySelector(
			'[data-kt-customer-table-select="delete_selected"]'
		);

		// Toggle delete selected toolbar
		checkboxes.forEach((c) => {
			// Checkbox on click event
			c.addEventListener("click", function () {
				setTimeout(function () {
					toggleToolbars();
				}, 50);
			});
		});

		// Deleted selected rows
		deleteSelected.addEventListener("click", function () {
			// SweetAlert2 pop up --- official docs reference: https://sweetalert2.github.io/
			Swal.fire({
				text: "Are you sure you want to delete selected customers?",
				icon: "warning",
				showCancelButton: true,
				buttonsStyling: false,
				confirmButtonText: "Yes, delete!",
				cancelButtonText: "No, cancel",
				customClass: {
					confirmButton: "btn fw-bold btn-danger",
					cancelButton: "btn fw-bold btn-active-light-primary",
				},
			}).then(function (result) {
				if (result.value) {
					Swal.fire({
						text: "You have deleted all selected customers!.",
						icon: "success",
						buttonsStyling: false,
						confirmButtonText: "Ok, got it!",
						customClass: {
							confirmButton: "btn fw-bold btn-primary",
						},
					}).then(function () {
						// Remove all selected customers
						checkboxes.forEach((c) => {
							if (c.checked) {
								datatable
									.row($(c.closest("tbody tr")))
									.remove()
									.draw();
							}
						});

						// Remove header checked box
						const headerCheckbox =
							table.querySelectorAll('[type="checkbox"]')[0];
						headerCheckbox.checked = false;
					});
				} else if (result.dismiss === "cancel") {
					Swal.fire({
						text: "Selected customers was not deleted.",
						icon: "error",
						buttonsStyling: false,
						confirmButtonText: "Ok, got it!",
						customClass: {
							confirmButton: "btn fw-bold btn-primary",
						},
					});
				}
			});
		});
	};

	// Toggle toolbars
	const toggleToolbars = () => {
		// Define variables
		const toolbarBase = document.querySelector(
			'[data-kt-customer-table-toolbar="base"]'
		);
		const toolbarSelected = document.querySelector(
			'[data-kt-customer-table-toolbar="selected"]'
		);
		const selectedCount = document.querySelector(
			'[data-kt-customer-table-select="selected_count"]'
		);

		// Select refreshed checkbox DOM elements
		const allCheckboxes = table.querySelectorAll('tbody [type="checkbox"]');

		// Detect checkboxes state & count
		let checkedState = false;
		let count = 0;

		// Count checked boxes
		allCheckboxes.forEach((c) => {
			if (c.checked) {
				checkedState = true;
				count++;
			}
		});

		// Toggle toolbars
		if (checkedState) {
			selectedCount.innerHTML = count;
			toolbarBase.classList.add("d-none");
			toolbarSelected.classList.remove("d-none");
		} else {
			toolbarBase.classList.remove("d-none");
			toolbarSelected.classList.add("d-none");
		}
	};

	// Public methods
	return {
		init: function () {
			table = document.querySelector("#kt_customers_table");

			if (!table) {
				return;
			}

			initCustomerList();
			initToggleToolbar();
			handleSearchDatatable();
			handleFilterDatatable();
			handleDeleteRows();
			handleResetForm();
		},
	};
})();

// On document ready
KTUtil.onDOMContentLoaded(function () {
	KTCustomersList.init();
});
