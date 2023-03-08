"use strict";

// Class definition
var KTAppEcommerceProducts = function () {
    // Shared variables
    var table;
    var datatable;

    // Private functions
    var initDatatable = function () {
        // Init datatable --- more info on datatables: https://datatables.net/manual/
        datatable = $(table).DataTable({
            ajax: {
				url: "datatable-json/catalogs",
				data: function (d) {
                    d.order = 'views';
                    d.limit = 50;
                },
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
						let d = '';
						if (type === "display") {
								let img_url = data.avatar;

                                d  += '<div class="d-flex align-items-center">'+
                                '<a href="catalogs/edit" class="symbol symbol-50px">' +
                                '<span class="symbol-label" style="background-image:url('+img_url+');"></span>' +
                                '</a><div class="ms-5">' +
                                '<a href="catalogs/edit/'+data.id+'" class="text-gray-800 text-hover-primary fs-5 fw-bold" data-kt-ecommerce-product-filter="product_name">'+
                                data.item+'</a></div></div>';

							return d;
						}
						return data.item;
					},
				},
                {
                    data: "sku",
                    render: function(data, type, row){
                        if(type === 'display'){
                            return '<span class="fw-bold">'+data+'</span>';
                        }
                        return data;
                    }
                },
				{
					data: "quantity",
					render: function (data, type, row) {
						return data;
					},
				},

				{
					data: "price",
				},
                {
                    data: 'status',
                    render: function(data, type, row){
                        return data;
                    }
                },
				{
					data: "id",
					render: function (data, type, row) {
						let d = "";
						if (type === "display") {
							d =
								'<a href="#" class="btn btn-sm btn-light btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions </a>' +
								'<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">' +
								'<div class="menu-item px-3"><a href="catalogs/view/' +
								data +
								'" class="menu-link px-3">View</a></div>' +
								'<div class="menu-item px-3"><a href="catalogs/edit/' +
								data +
								'" class="menu-link px-3">Edit</a></div>' +
								'<div class="menu-item px-3"><a href="#" class="menu-link px-3" data-kt-ecommerce-product-filter="delete_row">Delete</a>' +
								"</div></div>";
						}
						return d;
					},
				},
			],
            "info": false,
            'order': [],
            'pageLength': 25,
            'columnDefs': [
                { render: DataTable.render.number(',', '.', 2), targets: 4},
                { orderable: false, targets: 0 }, // Disable ordering on column 0 (checkbox)
                { orderable: false, targets: 6 }, // Disable ordering on column 7 (actions)
            ]
        });

        // Re-init functions on datatable re-draws
        datatable.on('draw', function () {
            handleDeleteRows();
            KTMenu.init();
        });
    }

    // Search Datatable --- official docs reference: https://datatables.net/reference/api/search()
    var handleSearchDatatable = () => {
        const filterSearch = document.querySelector('[data-kt-ecommerce-product-filter="search"]');
        filterSearch.addEventListener('keyup', function (e) {
            datatable.search(e.target.value).draw();
        });
    }

    // Handle status filter dropdown
    var handleStatusFilter = () => {
        const filterStatus = document.querySelector('[data-kt-ecommerce-product-filter="status"]');
        $(filterStatus).on('change', e => {
            let value = e.target.value;
            if(value === 'all'){
                value = '';
            }
            datatable.column(5).search(value).draw();
        });
    }

    // Delete cateogry
    var handleDeleteRows = () => {
        // Select all delete buttons
        const deleteButtons = table.querySelectorAll('[data-kt-ecommerce-product-filter="delete_row"]');

        deleteButtons.forEach(d => {
            // Delete button on click
            d.addEventListener('click', function (e) {
                e.preventDefault();

                // Select parent row
                const parent = e.target.closest('tr');

                // Get category name
                const productName = parent.querySelector('[data-kt-ecommerce-product-filter="product_name"]').innerText;

                // SweetAlert2 pop up --- official docs reference: https://sweetalert2.github.io/
                Swal.fire({
                    text: "Are you sure you want to delete " + productName + "?",
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
                            text: "You have deleted " + productName + "!.",
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
                            text: productName + " was not deleted.",
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


    // Public methods
    return {
        init: function () {
            table = document.querySelector('#kt_ecommerce_products_table');

            if (!table) {
                return;
            }

            initDatatable();
            handleSearchDatatable();
            handleStatusFilter();
            handleDeleteRows();
        }
    };
}();

// On document ready
KTUtil.onDOMContentLoaded(function () {
    KTAppEcommerceProducts.init();
});
