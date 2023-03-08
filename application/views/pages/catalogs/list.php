<!DOCTYPE html>

<html lang="en">
<!--begin::Head-->
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />

<head>
    <?php $this->load->view('templates/head_global_items'); ?>

    <!--begin::Vendor Stylesheets(used for this page only)-->
    <link href="<?= base_url(); ?>assets/plugins/custom/datatables/datatables.bundle.css" rel="stylesheet" type="text/css" />
    <!--end::Vendor Stylesheets-->
</head>
<!--end::Head-->
<!--begin::Body-->

<body id="kt_body" class="header-fixed header-tablet-and-mobile-fixed aside-enabled aside-fixed">
    <?php
    $this->load->view('templates/theme_mode');
    $this->load->view('templates/google_tags');
    ?>
    <!--begin::App-->
    <div class="d-flex flex-column flex-root app-root" id="kt_app_root">
        <!--begin::Page-->
        <div class="app-page flex-column flex-column-fluid" id="kt_app_page">
            <?php $this->load->view('templates/header'); ?>
            <!--begin::Wrapper-->
            <div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">
                <!--begin::Sidebar-->
                <?php $this->load->view('templates/aside'); ?>
                <!--end::Sidebar-->
                <!--begin::Main-->
                <div class="app-main flex-column flex-row-fluid" id="kt_app_main">
                    <!--begin::Content wrapper-->
                    <div class="d-flex flex-column flex-column-fluid">
                        <!--begin::Toolbar-->
                <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
                    <!--begin::Toolbar container-->
                    <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
                        <!--begin::Page title-->
                        <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                            <!--begin::Title-->
                            <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">Catalogs</h1>
                            <!--end::Title-->
                            <!--begin::Breadcrumb-->
                            <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                                <!--begin::Item-->
                                <li class="breadcrumb-item text-muted">
                                    <a href="<?= site_url('catalogs') ?>" class="text-muted text-hover-primary">Catalogs</a>
                                </li>
                                <!--end::Item-->
                            </ul>
                            <!--end::Breadcrumb-->
                        </div>
                        <!--end::Page title-->
                       
                    </div>
                    <!--end::Toolbar container-->
                </div>
                <!--end::Toolbar-->
                        <!--begin::Content-->
                        <div id="kt_app_content" class="app-content flex-column-fluid">
                            <!--begin::Content container-->
                            <div id="kt_app_content_container" class="app-container container-xxl">
									<!--begin::Products-->
									<div class="card card-flush mb-5">
										<!--begin::Card header-->
										<div class="card-header align-items-center py-5 gap-2 gap-md-5">
											<!--begin::Card title-->
											<div class="card-title">
												<!--begin::Search-->
												<div class="d-flex align-items-center position-relative my-1">
													<!--begin::Svg Icon | path: icons/duotune/general/gen021.svg-->
													<span class="svg-icon svg-icon-1 position-absolute ms-4">
														<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
															<rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1" transform="rotate(45 17.0365 15.1223)" fill="currentColor" />
															<path d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z" fill="currentColor" />
														</svg>
													</span>
													<!--end::Svg Icon-->
													<input type="text" data-kt-ecommerce-product-filter="search" class="form-control form-control-solid w-250px ps-14" placeholder="Search Product" />
												</div>
												<!--end::Search-->
											</div>
											<!--end::Card title-->
											<!--begin::Card toolbar-->
											<div class="card-toolbar flex-row-fluid justify-content-end gap-5">
												<div class="w-100 mw-150px">
													<!--begin::Select2-->
													<select class="form-select form-select-solid" data-control="select2" data-hide-search="true" data-placeholder="Status" data-kt-ecommerce-product-filter="status">
														<option></option>
														<option value="all">All</option>
														<option value="published">Published</option>
														<option value="inactive">Inactive</option>
													</select>
													<!--end::Select2-->
												</div>
												<!--begin::Add product-->
												<a href="catalogs/add" class="btn btn-primary">Add Product</a>
												<!--end::Add product-->
											</div>
											<!--end::Card toolbar-->
										</div>
										<!--end::Card header-->
										<!--begin::Card body-->
										<div class="card-body pt-0">
											<!--begin::Table-->
											<table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_ecommerce_products_table">
												<!--begin::Table head-->
												<thead>
													<!--begin::Table row-->
													<tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
														<th class="w-10px pe-2">
															<div class="form-check form-check-sm form-check-custom form-check-solid me-3">
																<input class="form-check-input" type="checkbox" data-kt-check="true" data-kt-check-target="#kt_ecommerce_products_table .form-check-input" value="1" />
															</div>
														</th>
														<th class="min-w-200px">Product</th>
														<th class="text-end min-w-100px">SKU</th>
														<th class="text-end min-w-70px">Qty</th>
														<th class="text-end min-w-100px">Price</th>
														<th class="text-end min-w-100px">Status</th>
														<th class="text-end min-w-70px">Actions</th>
													</tr>
													<!--end::Table row-->
												</thead>
												<!--end::Table head-->
											</table>
											<!--end::Table-->
										</div>
										<!--end::Card body-->
									</div>
									<!--end::Products-->
								</div>
                            <!--end::Content container-->
                        </div>
                        <!--end::Content-->

                    </div>
                    <!--end::Content wrapper-->

                    <!--begin::Footer-->
                    <?php $this->load->view('templates/footer'); ?>
                    <!--end::Footer-->
                </div>
                <!--end:::Main-->
            </div>
            <!--end::Wrapper-->
        </div>
        <!--end::Page-->
    </div>
    <!--end::Root-->

    <!--begin::Javascript-->
    <?php $this->load->view('templates/global_js'); ?>
    <!--begin::Vendors Javascript(used for this page only)-->
    <script src="<?= base_url(); ?>assets/plugins/custom/datatables/datatables.bundle.js"></script>
    <!--end::Vendors Javascript-->
    <!--begin::Custom Javascript(used for this page only)-->
    <script src="<?= base_url(); ?>assets/js/custom/apps/ecommerce/catalog/products.js"></script>
    <script src="<?= base_url(); ?>assets/js/widgets.bundle.js"></script>
    <script src="<?= base_url(); ?>assets/js/custom/widgets.js"></script>
    <!--end::Custom Javascript-->
    <!--end::Javascript-->
</body>
<!--end::Body-->

</html>