"use strict";

// Class definition
var KTUsersViewRole = function () {
    // Shared variables
    var datatable;
    var table;

    // Init add schedule modal
    var initViewRole = () => {
        // Set date data order
        const tableRows = table.querySelectorAll('tbody tr');

        tableRows.forEach(row => {
            const dateRow = row.querySelectorAll('td');
            const realDate = moment(dateRow[3].innerHTML, "DD MMM YYYY, LT").format(); // select date from 5th column in table
            dateRow[3].setAttribute('data-order', realDate);
        });

         // Init datatable --- more info on datatables: https://datatables.net/manual/
         datatable = $(table).DataTable({
            ajax: {
				url: "../../datatable-json/users",
				data: function (d) {
                    let seg = location.href.split('/');
                    d.role_id = seg[seg.length-1];
                },
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
                    data: 'id'
                },
				{
					data: null,
					render: function (data, type, row) {
						let d = "";
						if (type === "display") {
							if (data.thumb_photo_url) {
								img_url = data.thumb_photo_url;
								d +=
									'<div class="symbol symbol-circle symbol-50px overflow-hidden me-3">' +
									'<a href="../../users/view/' +
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
								'<a href="../../users/view/' +
								data.id +
								'" class="text-gray-800 text-hover-primary mb-1">' +
								data.name +
								"</a>" +
								'<span class="text-gray-600 fs-7">' +
								data.phone +
								"</span></div>";

							return d;
						}
						return data.name + "," + data.email;
					},
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
								'<a href="#" class="btn btn-sm btn-light btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions ' +
								'<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">' +
								'<div class="menu-item px-3"><a href="../../users/view/' +
								data +
								'" class="menu-link px-3">View</a></div>' +
								'<div class="menu-item px-3"><a href="#" class="menu-link px-3" data-kt-customer-table-filter="delete_row">Delete</a>' +
								"</div></div>";
						}
						return d;
					},
				},
			],
            "info": false,
            'order': [],
            "pageLength": 5,
            "lengthChange": false,
            'columnDefs': [
                { orderable: false, targets: 0 }, // Disable ordering on column 0 (checkbox)
                { orderable: false, targets: 4 }, // Disable ordering on column 4 (actions)
            ]
        });        
    }

    // Search Datatable --- official docs reference: https://datatables.net/reference/api/search()
    var handleSearchDatatable = () => {
        const filterSearch = document.querySelector('[data-kt-roles-table-filter="search"]');
        filterSearch.addEventListener('keyup', function (e) {
            datatable.search(e.target.value).draw();
        });
    }

    // Delete user
    var handleDeleteRows = () => {
        // Select all delete buttons
        const deleteButtons = table.querySelectorAll('[data-kt-roles-table-filter="delete_row"]');

        deleteButtons.forEach(d => {
            // Delete button on click
            d.addEventListener('click', function (e) {
                e.preventDefault();

                // Select parent row
                const parent = e.target.closest('tr');

                // Get customer name
                const userName = parent.querySelectorAll('td')[1].innerText;

                // SweetAlert2 pop up --- official docs reference: https://sweetalert2.github.io/
                Swal.fire({
                    text: "Are you sure you want to delete " + userName + "?",
                    icon: "warning",
                    showCancelButton: true,
                    buttonsStyling: false,
                    confirmButtonText: "Yes, delete!",
                    cancelButtonText: "No, cancel",
                    customClass: {
                        confirmButton: "btn fw-bold btn-danger",
                        cancelButton: "btn fw-bold btn-active-light-primary"
                    }
                }).then(function (result) {
                    if (result.value) {
                        Swal.fire({
                            text: "You have deleted " + userName + "!.",
                            icon: "success",
                            buttonsStyling: false,
                            confirmButtonText: "Ok, got it!",
                            customClass: {
                                confirmButton: "btn fw-bold btn-primary",
                            }
                        }).then(function () {
                            // Remove current row
                            datatable.row($(parent)).remove().draw();
                        });
                    } else if (result.dismiss === 'cancel') {
                        Swal.fire({
                            text: customerName + " was not deleted.",
                            icon: "error",
                            buttonsStyling: false,
                            confirmButtonText: "Ok, got it!",
                            customClass: {
                                confirmButton: "btn fw-bold btn-primary",
                            }
                        });
                    }
                });
            })
        });
    }

    // Init toggle toolbar
    var initToggleToolbar = () => {
        // Toggle selected action toolbar
        // Select all checkboxes
        const checkboxes = table.querySelectorAll('[type="checkbox"]');

        // Select elements
        const deleteSelected = document.querySelector('[data-kt-view-roles-table-select="delete_selected"]');

        // Toggle delete selected toolbar
        checkboxes.forEach(c => {
            // Checkbox on click event
            c.addEventListener('click', function () {
                setTimeout(function () {
                    toggleToolbars();
                }, 50);
            });
        });

        // Deleted selected rows
        deleteSelected.addEventListener('click', function () {
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
                    cancelButton: "btn fw-bold btn-active-light-primary"
                }
            }).then(function (result) {
                if (result.value) {
                    Swal.fire({
                        text: "You have deleted all selected customers!.",
                        icon: "success",
                        buttonsStyling: false,
                        confirmButtonText: "Ok, got it!",
                        customClass: {
                            confirmButton: "btn fw-bold btn-primary",
                        }
                    }).then(function () {
                        // Remove all selected customers
                        checkboxes.forEach(c => {
                            if (c.checked) {
                                datatable.row($(c.closest('tbody tr'))).remove().draw();
                            }
                        });

                        // Remove header checked box
                        const headerCheckbox = table.querySelectorAll('[type="checkbox"]')[0];
                        headerCheckbox.checked = false;
                    }).then(function(){
                        toggleToolbars(); // Detect checked checkboxes
                        initToggleToolbar(); // Re-init toolbar to recalculate checkboxes
                    });
                } else if (result.dismiss === 'cancel') {
                    Swal.fire({
                        text: "Selected customers was not deleted.",
                        icon: "error",
                        buttonsStyling: false,
                        confirmButtonText: "Ok, got it!",
                        customClass: {
                            confirmButton: "btn fw-bold btn-primary",
                        }
                    });
                }
            });
        });
    }

    // Toggle toolbars
    const toggleToolbars = () => {
        // Define variables
        const toolbarBase = document.querySelector('[data-kt-view-roles-table-toolbar="base"]');
        const toolbarSelected = document.querySelector('[data-kt-view-roles-table-toolbar="selected"]');
        const selectedCount = document.querySelector('[data-kt-view-roles-table-select="selected_count"]');

        // Select refreshed checkbox DOM elements 
        const allCheckboxes = table.querySelectorAll('tbody [type="checkbox"]');

        // Detect checkboxes state & count
        let checkedState = false;
        let count = 0;

        // Count checked boxes
        allCheckboxes.forEach(c => {
            if (c.checked) {
                checkedState = true;
                count++;
            }
        });

        // Toggle toolbars
        if (checkedState) {
            selectedCount.innerHTML = count;
            toolbarBase.classList.add('d-none');
            toolbarSelected.classList.remove('d-none');
        } else {
            toolbarBase.classList.remove('d-none');
            toolbarSelected.classList.add('d-none');
        }
    }

    return {
        // Public functions
        init: function () {
            table = document.querySelector('#kt_roles_view_table');
            
            if (!table) {
                return;
            }

            initViewRole();
            handleSearchDatatable();
            handleDeleteRows();
            initToggleToolbar();
        }
    };
}();

// On document ready
KTUtil.onDOMContentLoaded(function () {
    KTUsersViewRole.init();
});