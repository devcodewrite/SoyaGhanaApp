"use strict";

var KTUsersList = function () {
    // Define shared variables
    var table = document.getElementById('kt_table_users');
    var datatable;
    var toolbarBase;
    var toolbarSelected;
    var selectedCount;

    // Private functions
    var initUserTable = function () {
        // Set date data order
        const tableRows = table.querySelectorAll('tbody tr');
      
        tableRows.forEach(row => {
            

            const dateRow = row.querySelectorAll('td');
            dateRow[1].addClass('d-flex align-items-center');
            // Set real date for joined column
            const joinedDate = moment(dateRow[5].innerHTML, "DD MMM YYYY, LT").format(); // select date from 5th column in table
            dateRow[5].setAttribute('data-order', joinedDate);
        });

        // Init datatable --- more info on datatables: https://datatables.net/manual/
        datatable = $(table).DataTable({
            ajax: {
				url: "datatable-json/users",
				data: function (d) {},
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
									'<a href="users/view/' +
									data.id +
									'"><div class="symbol-label">' +
									'<img src="' +
									img_url +
									'" alt="' +
									(data.name?data.name:'') +
									'" class="w-100" />' +
									"</div></a></div>";
							}else {
                                d += '<div class="symbol symbol-circle symbol-50px overflow-hidden me-3">'+
                                    '<a href="users/view/' +data.id +'">'+
                                    '<div class="symbol-label fs-3 bg-light-danger text-danger">'+
                                    (data.name?data.name.toUpperCase()[0]:'')+'</div></a></div>';
                            }
							d +=
								'<div class="d-flex flex-column">' +
								'<a href="users/view/' +
								data.id +
								'" class="text-gray-800 text-hover-primary mb-1">' +
								(data.name?data.name:'') +
								"</a>" +
								'<span class="text-gray-600 fs-7">' +
								(data.email?data.email:'') +
								"</span></div></div>";

							return d;
						}
						return data.name + "," + data.email;
					},
				},
				{
					data: "role",
					render: function (data, type, row) {
						return data.title;
					},
				},
                {
                    data: 'last_login',
                    render: function(data, type, row){
                       let lastlogin =  moment(data, "YYYY-MM-DD HH:mm:ssZ").tz('Africa/Accra').fromNow(); 
                        return data?lastlogin:'Never';
                    }
                },
				{
					data: "enable_two_factor_auth",
					render: function (data, type, row) {
						return data==='yes'?'<div class="badge badge-light-success fw-bold">Enabled</div>':'';
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
                            '<a href="#" class="btn btn-sm btn-light btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions </a>' +
                            '<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">' +
                            '<div class="menu-item px-3"><a href="users/view/' +data +'" class="menu-link px-3">View</a></div>' +
                            '<div class="menu-item px-3"><a href="#" class="menu-link px-3" data-kt-customer-table-filter="delete_row">Delete</a>' +
                            "</div></div>";
						}
						return d;
					},
				},
			],
            initComplete: function(){
         
            },
            "info": false,
            'order': [],
            "pageLength": 10,
            "lengthChange": false,
            'columnDefs': [
                { orderable: false, targets: 0 }, // Disable ordering on column 0 (checkbox)
                { orderable: false, targets: 6 }, // Disable ordering on column 6 (actions)                
            ]
        });

        // Re-init functions on every table re-draw -- more info: https://datatables.net/reference/event/draw
        datatable.on('draw', function () {
            initToggleToolbar();
            handleDeleteRows();
            toggleToolbars();
            KTMenu.init();
        });
    }

    // Search Datatable --- official docs reference: https://datatables.net/reference/api/search()
    var handleSearchDatatable = () => {
        const filterSearch = document.querySelector('[data-kt-user-table-filter="search"]');
        filterSearch.addEventListener('keyup', function (e) {
            datatable.search(e.target.value).draw();
        });
    }

    // Filter Datatable
    var handleFilterDatatable = () => {
        // Select filter options
        const filterForm = document.querySelector('[data-kt-user-table-filter="form"]');
        const filterButton = filterForm.querySelector('[data-kt-user-table-filter="filter"]');
        const selectOptions = filterForm.querySelectorAll('select');

        // Filter datatable on submit
        filterButton.addEventListener('click', function () {
            var filterString = '';

            // Get filter values
            selectOptions.forEach((item, index) => {
                if (item.value && item.value !== '') {
                    if (index !== 0) {
                        filterString += ' ';
                    }

                    // Build filter value options
                    filterString += item.value;
                }
            });

            // Filter datatable --- official docs reference: https://datatables.net/reference/api/search()
            datatable.search(filterString).draw();
        });
    }

    // Reset Filter
    var handleResetForm = () => {
        // Select reset button
        const resetButton = document.querySelector('[data-kt-user-table-filter="reset"]');

        // Reset datatable
        resetButton.addEventListener('click', function () {
            // Select filter options
            const filterForm = document.querySelector('[data-kt-user-table-filter="form"]');
            const selectOptions = filterForm.querySelectorAll('select');

            // Reset select2 values -- more info: https://select2.org/programmatic-control/add-select-clear-items
            selectOptions.forEach(select => {
                $(select).val('').trigger('change');
            });

            // Reset datatable --- official docs reference: https://datatables.net/reference/api/search()
            datatable.search('').draw();
        });
    }


    // Delete subscirption
    var handleDeleteRows = () => {
        // Select all delete buttons
        const deleteButtons = table.querySelectorAll('[data-kt-users-table-filter="delete_row"]');

        deleteButtons.forEach(d => {
            // Delete button on click
            d.addEventListener('click', function (e) {
                e.preventDefault();

                // Select parent row
                const parent = e.target.closest('tr');

                // Get user name
                const userName = parent.querySelectorAll('td')[1].querySelectorAll('a')[1].innerText;

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
                        }).then(function () {
                            // Detect checked checkboxes
                            toggleToolbars();
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
        toolbarBase = document.querySelector('[data-kt-user-table-toolbar="base"]');
        toolbarSelected = document.querySelector('[data-kt-user-table-toolbar="selected"]');
        selectedCount = document.querySelector('[data-kt-user-table-select="selected_count"]');
        const deleteSelected = document.querySelector('[data-kt-user-table-select="delete_selected"]');

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
                    }).then(function () {
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
            if (!table) {
                return;
            }

            initUserTable();
            initToggleToolbar();
            handleSearchDatatable();
            handleResetForm();
            handleDeleteRows();
            handleFilterDatatable();

        }
    }
}();

// On document ready
KTUtil.onDOMContentLoaded(function () {
    KTUsersList.init();
});