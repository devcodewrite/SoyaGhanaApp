<!DOCTYPE html>

<html lang="en">
<!--begin::Head-->
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />

<head>
    <?php $this->load->view('templates/head_global_items'); ?>

    <!--begin::Vendor Stylesheets(used for this page only)-->
    <link href="<?= base_url() ?>assets/plugins/custom/datatables/datatables.bundle.css" rel="stylesheet" type="text/css" />
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
                    <div class="d-flex flex-column flex-column-fluid mb-5">
                         <!--begin::Toolbar-->
                         <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
                            <!--begin::Toolbar container-->
                            <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
                                <!--begin::Page title-->
                                <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                                    <!--begin::Title-->
                                    <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">Membership Requests</h1>
                                    <!--end::Title-->
                                    <!--begin::Breadcrumb-->
                                    <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                                        <!--begin::Item-->
                                        <li class="breadcrumb-item text-muted">
                                            <a href="<?=site_url('members/requests') ?>" class="text-muted text-hover-primary">Members</a>
                                        </li>
                                        <!--end::Item-->
                                        <!--begin::Item-->
                                        <li class="breadcrumb-item">
                                            <span class="bullet bg-gray-400 w-5px h-2px"></span>
                                        </li>
                                        <!--end::Item-->
                                        <!--begin::Item-->
                                        <li class="breadcrumb-item text-muted">Requests</li>
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
                                <!--begin::Card-->
                                <div class="card mb-5">
                                    <!--begin::Card header-->
                                    <div class="card-header border-0 pt-6">
                                        <!--begin::Card title-->
                                        <div class="card-title">
                                            <!--begin::Search-->
                                            <div class="d-flex align-items-center position-relative my-1">
                                                <!--begin::Svg Icon | path: icons/duotune/general/gen021.svg-->
                                                <span class="svg-icon svg-icon-1 position-absolute ms-6">
                                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1" transform="rotate(45 17.0365 15.1223)" fill="currentColor" />
                                                        <path d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z" fill="currentColor" />
                                                    </svg>
                                                </span>
                                                <!--end::Svg Icon-->
                                                <input type="text" data-kt-customer-table-filter="search" class="form-control form-control-solid w-250px ps-15" placeholder="Search Members" />
                                            </div>
                                            <!--end::Search-->
                                        </div>
                                        <!--begin::Card title-->
                                        <!--begin::Card toolbar-->
                                        <div class="card-toolbar">
                                            <!--begin::Toolbar-->
                                            <div class="d-flex justify-content-end" data-kt-customer-table-toolbar="base">
                                                <!--begin::Filter-->
                                                <button type="button" class="btn btn-light-primary me-3" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                                                    <!--begin::Svg Icon | path: icons/duotune/general/gen031.svg-->
                                                    <span class="svg-icon svg-icon-2">
                                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M19.0759 3H4.72777C3.95892 3 3.47768 3.83148 3.86067 4.49814L8.56967 12.6949C9.17923 13.7559 9.5 14.9582 9.5 16.1819V19.5072C9.5 20.2189 10.2223 20.7028 10.8805 20.432L13.8805 19.1977C14.2553 19.0435 14.5 18.6783 14.5 18.273V13.8372C14.5 12.8089 14.8171 11.8056 15.408 10.964L19.8943 4.57465C20.3596 3.912 19.8856 3 19.0759 3Z" fill="currentColor" />
                                                        </svg>
                                                    </span>
                                                    <!--end::Svg Icon-->Hide Columns
                                                </button>
                                                <!--begin::Menu 1-->
                                                <div class="menu menu-sub menu-sub-dropdown w-300px w-md-325px" data-kt-menu="true" id="kt-toolbar-filter">
                                                    <!--begin::Header-->
                                                    <div class="px-7 py-5">
                                                        <div class="fs-4 text-dark fw-bold">Hide Columns</div>
                                                    </div>
                                                    <!--end::Header-->
                                                    <!--begin::Separator-->
                                                    <div class="separator border-gray-200"></div>
                                                    <!--end::Separator-->
                                                    <!--begin::Content-->
                                                    <div class="menu-hide-column px-7 py-5">
                                                        <div class="form-check form-check-custom form-check-solid mb-5">
                                                            <input class="form-check-input" type="checkbox" value="2" checked />
                                                            <label class="form-check-label" for="">
                                                                Sex
                                                            </label>
                                                        </div>
                                                        <div class="form-check form-check-custom form-check-solid mb-5">
                                                            <input class="form-check-input" type="checkbox" value="3" />
                                                            <label class="form-check-label" for="">
                                                                Phone
                                                            </label>
                                                        </div>
                                                        <div class="form-check form-check-custom form-check-solid mb-5">
                                                            <input class="form-check-input" type="checkbox" value="4" />
                                                            <label class="form-check-label" for="">
                                                                Groups
                                                            </label>
                                                        </div>
                                                        <div class="form-check form-check-custom form-check-solid mb-5">
                                                            <input class="form-check-input" type="checkbox" value="5" checked />
                                                            <label class="form-check-label" for="">
                                                                Porfolio Type
                                                            </label>
                                                        </div>
                                                        <div class="form-check form-check-custom form-check-solid mb-5">
                                                            <input class="form-check-input" type="checkbox" value="6" />
                                                            <label class="form-check-label" for="">
                                                                Company
                                                            </label>
                                                        </div>

                                                        <div class="form-check form-check-custom form-check-solid mb-5">
                                                            <input class="form-check-input" type="checkbox" value="7" />
                                                            <label class="form-check-label" for="">
                                                                Locale
                                                            </label>
                                                        </div>
                                                        <div class="form-check form-check-custom form-check-solid mb-5">
                                                            <input class="form-check-input" type="checkbox" value="8" checked />
                                                            <label class="form-check-label" for="">
                                                                Socials
                                                            </label>
                                                        </div>
                                                        <div class="form-check form-check-custom form-check-solid mb-5">
                                                            <input class="form-check-input" type="checkbox" value="9" checked />
                                                            <label class="form-check-label" for="">
                                                                National ID
                                                            </label>
                                                        </div>
                                                        <div class="form-check form-check-custom form-check-solid mb-5">
                                                            <input class="form-check-input" type="checkbox" value="10" checked />
                                                            <label class="form-check-label" for="">
                                                                Email
                                                            </label>
                                                        </div>
                                                        <div class="form-check form-check-custom form-check-solid mb-5">
                                                            <input class="form-check-input" type="checkbox" value="11" />
                                                            <label class="form-check-label" for="">
                                                                Date Joined
                                                            </label>
                                                        </div>
                                                    </div>

                                                    <!--end::Content-->
                                                </div>
                                                <!--end::Menu 1-->
                                                <!--end::Filter-->
                                            </div>
                                            <!--end::Card toolbar-->

                                            <!--begin::Card toolbar-->
                                            <div class="card-toolbar">
                                                <!--begin::Toolbar-->
                                                <div class="d-flex justify-content-end" data-kt-customer-table-toolbar="base">
                                                   
                                                    <!--begin::Export-->
                                                    <button type="button" class="btn btn-light-primary me-3" data-bs-toggle="modal" data-bs-target="#kt_customers_export_modal">
                                                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr078.svg-->
                                                        <span class="svg-icon svg-icon-2">
                                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <rect opacity="0.3" x="12.75" y="4.25" width="12" height="2" rx="1" transform="rotate(90 12.75 4.25)" fill="currentColor" />
                                                                <path d="M12.0573 6.11875L13.5203 7.87435C13.9121 8.34457 14.6232 8.37683 15.056 7.94401C15.4457 7.5543 15.4641 6.92836 15.0979 6.51643L12.4974 3.59084C12.0996 3.14332 11.4004 3.14332 11.0026 3.59084L8.40206 6.51643C8.0359 6.92836 8.0543 7.5543 8.44401 7.94401C8.87683 8.37683 9.58785 8.34458 9.9797 7.87435L11.4427 6.11875C11.6026 5.92684 11.8974 5.92684 12.0573 6.11875Z" fill="currentColor" />
                                                                <path opacity="0.3" d="M18.75 8.25H17.75C17.1977 8.25 16.75 8.69772 16.75 9.25C16.75 9.80228 17.1977 10.25 17.75 10.25C18.3023 10.25 18.75 10.6977 18.75 11.25V18.25C18.75 18.8023 18.3023 19.25 17.75 19.25H5.75C5.19772 19.25 4.75 18.8023 4.75 18.25V11.25C4.75 10.6977 5.19771 10.25 5.75 10.25C6.30229 10.25 6.75 9.80228 6.75 9.25C6.75 8.69772 6.30229 8.25 5.75 8.25H4.75C3.64543 8.25 2.75 9.14543 2.75 10.25V19.25C2.75 20.3546 3.64543 21.25 4.75 21.25H18.75C19.8546 21.25 20.75 20.3546 20.75 19.25V10.25C20.75 9.14543 19.8546 8.25 18.75 8.25Z" fill="currentColor" />
                                                            </svg>
                                                        </span>
                                                        <!--end::Svg Icon-->Export
                                                    </button>
                                                    <!--end::Export-->
                                                    <!--begin::Add customer-->
                                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_add_customer">Add Member</button>
                                                    <!--end::Add customer-->
                                                </div>
                                                <!--end::Toolbar-->
                                                <!--begin::Group actions-->
                                                <div class="d-flex justify-content-end align-items-center d-none" data-kt-customer-table-toolbar="selected">
                                                    <div class="fw-bold me-5">
                                                        <span class="me-2" data-kt-customer-table-select="selected_count"></span>Selected
                                                    </div>
                                                    <button type="button" class="btn btn-danger" data-kt-customer-table-select="delete_selected">Delete Selected</button>
                                                </div>
                                                <!--end::Group actions-->
                                            </div>
                                            <!--end::Card toolbar-->
                                        </div>
                                        <!--end::Card header-->
                                        <!--begin::Card body-->
                                        <div class="card-body pt-0 table-responsive">
                                            <!--begin::Table-->
                                            <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_customers_table">
                                                <!--begin::Table head-->
                                                <thead>
                                                    <!--begin::Table row-->
                                                    <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                                                        <th class="w-10px pe-2">
                                                            <div class="form-check form-check-sm form-check-custom form-check-solid me-3">
                                                                <input class="form-check-input" type="checkbox" data-kt-check="true" data-kt-check-target="#kt_customers_table .form-check-input" value="1" />
                                                            </div>
                                                        </th>
                                                        <th class="min-w-125px">Member</th>
                                                        <th class="min-w-125px">Sex</th>
                                                        <th class="min-w-125px">Phone</th>
                                                        <th class="min-w-125px">Groups</th>
                                                        <th class="min-w-125px">Portifolio Type</th>
                                                        <th class="min-w-125px">Company</th>
                                                        <th class="min-w-125px">Locale</th>
                                                        <th class="min-w-125px">Socials</th>
                                                        <th class="min-w-125px">National ID</th>
                                                        <th class="min-w-125px">Email</th>
                                                        <th class="min-w-125px">Joined Date</th>
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
                                    <!--end::Card-->
                                    <!--begin::Modals-->
                                    <!--begin::Modal - Members - Add-->
                                    <div class="modal fade" id="kt_modal_add_customer" tabindex="-1" aria-hidden="true">
                                        <!--begin::Modal dialog-->
                                        <div class="modal-dialog modal-dialog-centered mw-650px">
                                            <!--begin::Modal content-->
                                            <div class="modal-content">
                                                <!--begin::Form-->
                                                <form class="form" action="#" id="kt_modal_add_customer_form" data-kt-redirect="list.html">
                                                    <!--begin::Modal header-->
                                                    <div class="modal-header" id="kt_modal_add_customer_header">
                                                        <!--begin::Modal title-->
                                                        <h2 class="fw-bold">Add a Member</h2>
                                                        <!--end::Modal title-->
                                                        <!--begin::Close-->
                                                        <div id="kt_modal_add_customer_close" class="btn btn-icon btn-sm btn-active-icon-primary">
                                                            <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                                                            <span class="svg-icon svg-icon-1">
                                                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="currentColor" />
                                                                    <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="currentColor" />
                                                                </svg>
                                                            </span>
                                                            <!--end::Svg Icon-->
                                                        </div>
                                                        <!--end::Close-->
                                                    </div>
                                                    <!--end::Modal header-->
                                                    <!--begin::Modal body-->
                                                    <div class="modal-body py-10 px-lg-17">
                                                        <!--begin::Scroll-->
                                                        <div class="scroll-y me-n7 pe-7" id="kt_modal_add_customer_scroll" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_add_customer_header" data-kt-scroll-wrappers="#kt_modal_add_customer_scroll" data-kt-scroll-offset="300px">
                                                            <!--begin::Input group-->
                                                            <div class="fv-row mb-7">
                                                                <!--begin::Label-->
                                                                <label class="required fs-6 fw-semibold mb-2">Name</label>
                                                                <!--end::Label-->
                                                                <!--begin::Input-->
                                                                <input type="text" class="form-control form-control-solid" placeholder="" name="name" value="Sean Bean" />
                                                                <!--end::Input-->
                                                            </div>
                                                            <!--end::Input group-->
                                                            <!--begin::Input group-->
                                                            <div class="fv-row mb-7">
                                                                <!--begin::Label-->
                                                                <label class="fs-6 fw-semibold mb-2">
                                                                    <span class="required">Email</span>
                                                                    <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="Email address must be active"></i>
                                                                </label>
                                                                <!--end::Label-->
                                                                <!--begin::Input-->
                                                                <input type="email" class="form-control form-control-solid" placeholder="" name="email" value="sean@dellito.com" />
                                                                <!--end::Input-->
                                                            </div>
                                                            <!--end::Input group-->
                                                            <!--begin::Input group-->
                                                            <div class="fv-row mb-15">
                                                                <!--begin::Label-->
                                                                <label class="fs-6 fw-semibold mb-2">Description</label>
                                                                <!--end::Label-->
                                                                <!--begin::Input-->
                                                                <input type="text" class="form-control form-control-solid" placeholder="" name="description" />
                                                                <!--end::Input-->
                                                            </div>
                                                            <!--end::Input group-->
                                                            <!--begin::Billing toggle-->
                                                            <div class="fw-bold fs-3 rotate collapsible mb-7" data-bs-toggle="collapse" href="#kt_modal_add_customer_billing_info" role="button" aria-expanded="false" aria-controls="kt_customer_view_details">Shipping Information
                                                                <span class="ms-2 rotate-180">
                                                                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr072.svg-->
                                                                    <span class="svg-icon svg-icon-3">
                                                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                            <path d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z" fill="currentColor" />
                                                                        </svg>
                                                                    </span>
                                                                    <!--end::Svg Icon-->
                                                                </span>
                                                            </div>
                                                            <!--end::Billing toggle-->
                                                           
                                                        </div>
                                                        <!--end::Scroll-->
                                                    </div>
                                                    <!--end::Modal body-->
                                                    <!--begin::Modal footer-->
                                                    <div class="modal-footer flex-center">
                                                        <!--begin::Button-->
                                                        <button type="reset" id="kt_modal_add_customer_cancel" class="btn btn-light me-3">Discard</button>
                                                        <!--end::Button-->
                                                        <!--begin::Button-->
                                                        <button type="submit" id="kt_modal_add_customer_submit" class="btn btn-primary">
                                                            <span class="indicator-label">Submit</span>
                                                            <span class="indicator-progress">Please wait...
                                                                <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                                        </button>
                                                        <!--end::Button-->
                                                    </div>
                                                    <!--end::Modal footer-->
                                                </form>
                                                <!--end::Form-->
                                            </div>
                                        </div>
                                    </div>
                                    <!--end::Modal - Members - Add-->
                                    <!--begin::Modal - Adjust Balance-->
                                    <div class="modal fade" id="kt_customers_export_modal" tabindex="-1" aria-hidden="true">
                                        <!--begin::Modal dialog-->
                                        <div class="modal-dialog modal-dialog-centered mw-650px">
                                            <!--begin::Modal content-->
                                            <div class="modal-content">
                                                <!--begin::Modal header-->
                                                <div class="modal-header">
                                                    <!--begin::Modal title-->
                                                    <h2 class="fw-bold">Export Members</h2>
                                                    <!--end::Modal title-->
                                                    <!--begin::Close-->
                                                    <div id="kt_customers_export_close" class="btn btn-icon btn-sm btn-active-icon-primary">
                                                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                                                        <span class="svg-icon svg-icon-1">
                                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="currentColor" />
                                                                <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="currentColor" />
                                                            </svg>
                                                        </span>
                                                        <!--end::Svg Icon-->
                                                    </div>
                                                    <!--end::Close-->
                                                </div>
                                                <!--end::Modal header-->
                                                <!--begin::Modal body-->
                                                <div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
                                                    <!--begin::Form-->
                                                    <form id="kt_customers_export_form" class="form" action="#">
                                                        <!--begin::Input group-->
                                                        <div class="fv-row mb-10">
                                                            <!--begin::Label-->
                                                            <label class="fs-5 fw-semibold form-label mb-5">Select Export Format:</label>
                                                            <!--end::Label-->
                                                            <!--begin::Input-->
                                                            <select data-control="select2" data-placeholder="Select a format" data-hide-search="true" name="format" class="form-select form-select-solid">
                                                                <option value="excell">Excel</option>
                                                                <option value="pdf">PDF</option>
                                                                <option value="cvs">CVS</option>
                                                                <option value="zip">ZIP</option>
                                                            </select>
                                                            <!--end::Input-->
                                                        </div>
                                                        <!--end::Input group-->
                                                        <!--begin::Input group-->
                                                        <div class="fv-row mb-10">
                                                            <!--begin::Label-->
                                                            <label class="fs-5 fw-semibold form-label mb-5">Select Date Range:</label>
                                                            <!--end::Label-->
                                                            <!--begin::Input-->
                                                            <input class="form-control form-control-solid" placeholder="Pick a date" name="date" />
                                                            <!--end::Input-->
                                                        </div>
                                                        <!--end::Input group-->
                                                        <!--begin::Row-->
                                                        <div class="row fv-row mb-15">
                                                            <!--begin::Label-->
                                                            <label class="fs-5 fw-semibold form-label mb-5">Payment Type:</label>
                                                            <!--end::Label-->
                                                            <!--begin::Radio group-->
                                                            <div class="d-flex flex-column">
                                                                <!--begin::Radio button-->
                                                                <label class="form-check form-check-custom form-check-sm form-check-solid mb-3">
                                                                    <input class="form-check-input" type="checkbox" value="1" checked="checked" name="payment_type" />
                                                                    <span class="form-check-label text-gray-600 fw-semibold">All</span>
                                                                </label>
                                                                <!--end::Radio button-->
                                                                <!--begin::Radio button-->
                                                                <label class="form-check form-check-custom form-check-sm form-check-solid mb-3">
                                                                    <input class="form-check-input" type="checkbox" value="2" checked="checked" name="payment_type" />
                                                                    <span class="form-check-label text-gray-600 fw-semibold">Visa</span>
                                                                </label>
                                                                <!--end::Radio button-->
                                                                <!--begin::Radio button-->
                                                                <label class="form-check form-check-custom form-check-sm form-check-solid mb-3">
                                                                    <input class="form-check-input" type="checkbox" value="3" name="payment_type" />
                                                                    <span class="form-check-label text-gray-600 fw-semibold">Mastercard</span>
                                                                </label>
                                                                <!--end::Radio button-->
                                                                <!--begin::Radio button-->
                                                                <label class="form-check form-check-custom form-check-sm form-check-solid">
                                                                    <input class="form-check-input" type="checkbox" value="4" name="payment_type" />
                                                                    <span class="form-check-label text-gray-600 fw-semibold">American Express</span>
                                                                </label>
                                                                <!--end::Radio button-->
                                                            </div>
                                                            <!--end::Input group-->
                                                        </div>
                                                        <!--end::Row-->
                                                        <!--begin::Actions-->
                                                        <div class="text-center">
                                                            <button type="reset" id="kt_customers_export_cancel" class="btn btn-light me-3">Discard</button>
                                                            <button type="submit" id="kt_customers_export_submit" class="btn btn-primary">
                                                                <span class="indicator-label">Submit</span>
                                                                <span class="indicator-progress">Please wait...
                                                                    <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                                            </button>
                                                        </div>
                                                        <!--end::Actions-->
                                                    </form>
                                                    <!--end::Form-->
                                                </div>
                                                <!--end::Modal body-->
                                            </div>
                                            <!--end::Modal content-->
                                        </div>
                                        <!--end::Modal dialog-->
                                    </div>
                                    <!--end::Modal - New Card-->
                                    <!--end::Modals-->
                                </div>
                                <!--end::Content container-->
                            </div>
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
    <script src="<?= base_url() ?>assets/plugins/custom/datatables/datatables.bundle.js"></script>
    <!--end::Vendors Javascript-->
    <!--begin::Custom Javascript(used for this page only)-->
    <script src="<?= base_url() ?>assets/js/custom/apps/registrations/list/export.js"></script>
    <script src="<?= base_url() ?>assets/js/custom/apps/registrations/list/list.js"></script>
    <script src="<?= base_url() ?>assets/js/custom/apps/registrations/add.js"></script>
    <script src="<?= base_url() ?>assets/js/widgets.bundle.js"></script>
    <script src="<?= base_url() ?>assets/js/custom/widgets.js"></script>
    <!--end::Custom Javascript-->
    <!--end::Javascript-->
</body>
<!--end::Body-->

</html>