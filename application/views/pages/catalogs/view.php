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
                            <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">Member Catalogs</h1>
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
                                <!--begin::Catalog-->
                               
                                <!--end::Catalog-->
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
    <script src="<?= base_url(); ?>assets/js/custom/apps/ecommerce/catalog/categories.js"></script>
    <script src="<?= base_url(); ?>assets/js/widgets.bundle.js"></script>
    <script src="<?= base_url(); ?>assets/js/custom/widgets.js"></script>
    <script src="<?= base_url(); ?>assets/js/custom/apps/chat/chat.js"></script>
    <script src="<?= base_url(); ?>assets/js/custom/utilities/modals/upgrade-plan.js"></script>
    <script src="<?= base_url(); ?>assets/js/custom/utilities/modals/create-app.js"></script>
    <script src="<?= base_url(); ?>assets/js/custom/utilities/modals/users-search.js"></script>
    <!--end::Custom Javascript-->
    <!--end::Javascript-->
</body>
<!--end::Body-->

</html>