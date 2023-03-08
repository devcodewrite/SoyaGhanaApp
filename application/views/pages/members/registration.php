<!DOCTYPE html>

<html lang="en">
<!--begin::Head-->
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />

<head>
    <?php $this->load->view('templates/head_global_items'); ?>
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
                                    <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">Membership Registration</h1>
                                    <!--end::Title-->
                                    <!--begin::Breadcrumb-->
                                    <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                                        <!--begin::Item-->
                                        <li class="breadcrumb-item text-muted">
                                            <a href="<?= site_url('membership') ?>" class="text-muted text-hover-primary">Membership</a>
                                        </li>
                                        <!--end::Item-->
                                        <!--begin::Item-->
                                        <li class="breadcrumb-item">
                                            <span class="bullet bg-gray-400 w-5px h-2px"></span>
                                        </li>
                                        <!--end::Item-->
                                        <!--begin::Item-->
                                        <li class="breadcrumb-item text-muted">Registration</li>
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
                                <div class="card mb-5 <?= ($this->auth->getMembership() && $this->auth->getRole()->title !== 'Administrator') ? 'd-none' : '' ?>">
                                    <!--begin::Card body-->
                                    <div class="card-body">
                                        <!--begin::Stepper-->
                                        <div class="stepper stepper-links d-flex flex-column pt-15" id="kt_create_account_stepper">
                                            <!--begin::Nav-->
                                            <div class="stepper-nav mb-5">
                                                <!--begin::Step 1-->
                                                <div class="stepper-item current" data-kt-stepper-element="nav">
                                                    <h3 class="stepper-title">Registration Type</h3>
                                                </div>
                                                <!--end::Step 1-->
                                                <!--begin::Step 2-->
                                                <div class="stepper-item" data-kt-stepper-element="nav">
                                                    <h3 class="stepper-title">Registration Info</h3>
                                                </div>
                                                <!--end::Step 2-->
                                                <!--begin::Step 3-->
                                                <div id="bus-step" class="stepper-item hidden" data-kt-stepper-element="nav">
                                                    <h3 class="stepper-title">Business Info</h3>
                                                </div>
                                                <!--end::Step 3-->
                                                <!--begin::Step 4-->
                                                <div class="stepper-item" data-kt-stepper-element="nav">
                                                    <h3 class="stepper-title">Other Details</h3>
                                                </div>
                                                <!--end::Step 4-->
                                                <!--begin::Step 5-->
                                                <div class="stepper-item" data-kt-stepper-element="nav">
                                                    <h3 class="stepper-title">Completed</h3>
                                                </div>
                                                <!--end::Step 5-->
                                            </div>
                                            <!--end::Nav-->
                                            <!--begin::Form-->
                                            <form class="mx-auto mw-600px w-100 pt-15 pb-10" novalidate="novalidate" id="kt_create_account_form" action="add" method="POST" enctype="multipart/form-data">
                                                <!--begin::Step 1-->
                                                <div class="current" data-kt-stepper-element="content">
                                                    <!--begin::Wrapper-->
                                                    <div class="w-100">
                                                        <!--begin::Heading-->
                                                        <div class="pb-10 pb-lg-15">
                                                            <!--begin::Title-->
                                                            <h2 class="fw-bold d-flex align-items-center text-dark">Choose Registration Type
                                                                <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Address is issued based on your selected account type"></i>
                                                            </h2>
                                                            <!--end::Title-->
                                                            <!--begin::Notice-->
                                                            <div class="text-muted fw-semibold fs-6">If you need more info, please check out
                                                                <a href="#" class="link-primary fw-bold">Help Page</a>.
                                                            </div>
                                                            <!--end::Notice-->
                                                        </div>
                                                        <!--end::Heading-->
                                                        <!--begin::Input group-->
                                                        <div class="fv-row">
                                                            <!--begin::Row-->
                                                            <div class="row">
                                                                <!--begin::Col-->
                                                                <div class="col-lg-6">
                                                                    <!--begin::Option-->
                                                                    <input type="radio" class="btn-check" onclick="$('#business,#bus-step').addClass('hidden')" name="type" value="personal" checked="checked" id="kt_create_account_form_account_type_personal" />
                                                                    <label class="btn btn-outline btn-outline-dashed btn-active-light-primary p-7 d-flex align-items-center mb-10" for="kt_create_account_form_account_type_personal">
                                                                        <!--begin::Svg Icon | path: icons/duotune/communication/com005.svg-->
                                                                        <span class="svg-icon svg-icon-3x me-5">
                                                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                                <path d="M20 14H18V10H20C20.6 10 21 10.4 21 11V13C21 13.6 20.6 14 20 14ZM21 19V17C21 16.4 20.6 16 20 16H18V20H20C20.6 20 21 19.6 21 19ZM21 7V5C21 4.4 20.6 4 20 4H18V8H20C20.6 8 21 7.6 21 7Z" fill="currentColor" />
                                                                                <path opacity="0.3" d="M17 22H3C2.4 22 2 21.6 2 21V3C2 2.4 2.4 2 3 2H17C17.6 2 18 2.4 18 3V21C18 21.6 17.6 22 17 22ZM10 7C8.9 7 8 7.9 8 9C8 10.1 8.9 11 10 11C11.1 11 12 10.1 12 9C12 7.9 11.1 7 10 7ZM13.3 16C14 16 14.5 15.3 14.3 14.7C13.7 13.2 12 12 10.1 12C8.10001 12 6.49999 13.1 5.89999 14.7C5.59999 15.3 6.19999 16 7.39999 16H13.3Z" fill="currentColor" />
                                                                            </svg>
                                                                        </span>
                                                                        <!--end::Svg Icon-->
                                                                        <!--begin::Info-->
                                                                        <span class="d-block fw-semibold text-start">
                                                                            <span class="text-dark fw-bold d-block fs-4 mb-2">Personal Registration</span>
                                                                            <span class="text-muted fw-semibold fs-6">If you need more info, please check it out</span>
                                                                        </span>
                                                                        <!--end::Info-->
                                                                    </label>
                                                                    <!--end::Option-->
                                                                </div>
                                                                <!--end::Col-->
                                                                <!--begin::Col-->
                                                                <div class="col-lg-6">
                                                                    <!--begin::Option-->
                                                                    <input type="radio" class="btn-check" onclick="$('#business,#bus-step').removeClass('hidden')" name="type" value="corporate" id="kt_create_account_form_account_type_corporate" />
                                                                    <label class="btn btn-outline btn-outline-dashed btn-active-light-primary p-7 d-flex align-items-center" for="kt_create_account_form_account_type_corporate">
                                                                        <!--begin::Svg Icon | path: icons/duotune/finance/fin006.svg-->
                                                                        <span class="svg-icon svg-icon-3x me-5">
                                                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                                <path opacity="0.3" d="M20 15H4C2.9 15 2 14.1 2 13V7C2 6.4 2.4 6 3 6H21C21.6 6 22 6.4 22 7V13C22 14.1 21.1 15 20 15ZM13 12H11C10.5 12 10 12.4 10 13V16C10 16.5 10.4 17 11 17H13C13.6 17 14 16.6 14 16V13C14 12.4 13.6 12 13 12Z" fill="currentColor" />
                                                                                <path d="M14 6V5H10V6H8V5C8 3.9 8.9 3 10 3H14C15.1 3 16 3.9 16 5V6H14ZM20 15H14V16C14 16.6 13.5 17 13 17H11C10.5 17 10 16.6 10 16V15H4C3.6 15 3.3 14.9 3 14.7V18C3 19.1 3.9 20 5 20H19C20.1 20 21 19.1 21 18V14.7C20.7 14.9 20.4 15 20 15Z" fill="currentColor" />
                                                                            </svg>
                                                                        </span>
                                                                        <!--end::Svg Icon-->
                                                                        <!--begin::Info-->
                                                                        <span class="d-block fw-semibold text-start">
                                                                            <span class="text-dark fw-bold d-block fs-4 mb-2">Corporate Registration</span>
                                                                            <span class="text-muted fw-semibold fs-6">Create corporate account to mane users</span>
                                                                        </span>
                                                                        <!--end::Info-->
                                                                    </label>
                                                                    <!--end::Option-->
                                                                </div>
                                                                <!--end::Col-->
                                                            </div>
                                                            <!--end::Row-->
                                                        </div>
                                                        <!--end::Input group-->
                                                    </div>
                                                    <!--end::Wrapper-->
                                                </div>
                                                <!--end::Step 1-->
                                                <!--begin::Step 2-->
                                                <div data-kt-stepper-element="content">
                                                    <!--begin::Wrapper-->
                                                    <div class="w-100">
                                                        <!--begin::Heading-->
                                                        <div class="pb-10 pb-lg-15">
                                                            <!--begin::Title-->
                                                            <h2 class="fw-bold text-dark">Registration Info</h2>
                                                            <!--end::Title-->
                                                            <!--begin::Notice-->
                                                            <div class="text-muted fw-semibold fs-6">If you need more info, please check out
                                                                <a href="#" class="link-primary fw-bold">Help Page</a>.
                                                            </div>
                                                            <!--end::Notice-->
                                                        </div>
                                                        <!--end::Heading-->
                                                        <!--end::Input group-->
                                                        <div class="mb-10 fv-row">
                                                            <!--begin::Label-->
                                                            <label class="form-label mb-3">Who do you know ?</label>
                                                            <!--end::Label-->
                                                            <!--begin::Input-->
                                                            <select id="memberid-select2-ajax" class="form-select form-select-solid" name="refererId">
                                                                <option></option>
                                                            </select>
                                                            <!--end::Input-->
                                                            <!--begin::Hint-->
                                                            <div class="form-text">Choose who will approve your registration form.</div>
                                                            <!--end::Hint-->
                                                        </div>
                                                        <!--end::Input group-->

                                                        <!--begin::Input group-->
                                                        <div class="mb-10 row fv-row">
                                                            <!--begin::Input group-->
                                                            <div class="col-md-4 text-center">
                                                                <!--begin::Label-->
                                                                <label class="fs-6 fw-semibold mb-2">
                                                                    <span>Passport Photo</span>
                                                                    <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="Allowed file types: png, jpg, jpeg."></i>
                                                                </label>
                                                                <!--end::Label-->
                                                                <!--begin::Image input wrapper-->
                                                                <div class="mt-1">
                                                                    <!--begin::Image placeholder-->
                                                                    <style>
                                                                        .image-input-placeholder {
                                                                            background-image: url('<?= base_url(); ?>assets/media/svg/files/blank-image.svg');
                                                                        }

                                                                        [data-theme="dark"] .image-input-placeholder {
                                                                            background-image: url('<?= base_url(); ?>assets/media/svg/files/blank-image-dark.svg');
                                                                        }
                                                                    </style>
                                                                    <!--end::Image placeholder-->
                                                                    <!--begin::Image input-->
                                                                    <div class="image-input image-input-empty image-input-outline image-input-placeholder mb-3" data-kt-image-input="true">
                                                                        <!--begin::Preview existing avatar-->
                                                                        <div class="image-input-wrapper w-190px h-190px" style="background-image: url('<?= base_url(); ?>assets/media/svg/files/blank-image.svg')"></div>
                                                                        <!--end::Preview existing avatar-->
                                                                        <!--begin::Edit-->
                                                                        <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Add Photo">
                                                                            <i class="bi bi-plus fs-2"></i>
                                                                            <!--begin::Inputs-->
                                                                            <input type="file" name="avatar" accept=".png, .jpg, .jpeg" />
                                                                            <input type="hidden" name="avatar_remove" />
                                                                            <!--end::Inputs-->
                                                                        </label>
                                                                        <!--end::Edit-->
                                                                        <!--begin::Cancel-->
                                                                        <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title="Cancel avatar">
                                                                            <i class="bi bi-x fs-2"></i>
                                                                        </span>
                                                                        <!--end::Cancel-->
                                                                        <!--begin::Remove-->
                                                                        <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="remove" data-bs-toggle="tooltip" title="Remove avatar">
                                                                            <i class="bi bi-x fs-2"></i>
                                                                        </span>
                                                                        <!--end::Remove-->
                                                                    </div>
                                                                    <!--end::Image input-->
                                                                </div>
                                                                <!--end::Image input wrapper-->
                                                            </div>
                                                            <div class="col-md-8">
                                                                <!--end::Input group-->
                                                                <div class="col-12">
                                                                    <!--begin::Label-->
                                                                    <label class="form-label mb-3">Your Name</label>
                                                                    <!--end::Label-->
                                                                    <!--begin::Input-->
                                                                    <input type="text" class="form-control form-control-lg form-control-solid" name="name" placeholder="Full name" value="" />
                                                                    <!--end::Input-->

                                                                    <!--begin::Hint-->
                                                                    <div class="form-text">Enter full name with title(s) if applicable.</div>
                                                                    <!--end::Hint-->
                                                                </div>
                                                                <div class="col-12">
                                                                    <!--begin::Label-->
                                                                    <label class="form-label mb-3">Sex</label>
                                                                    <!--end::Label-->
                                                                    <!--begin::Input-->
                                                                    <select name="sex" class="form-select form-select-solid" data-control="select2" data-hide-search="true" data-placeholder="Select your sex">
                                                                        <option></option>
                                                                        <option value="Male">Male</option>
                                                                        <option value="Female">Female</option>
                                                                    </select>
                                                                    <!--end::Input-->
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!--end::Input group-->
                                                        <!--begin::Input group-->
                                                        <div class="mb-10 row fv-row">
                                                            <div class="col-md-6">
                                                                <!--begin::Label-->
                                                                <label class="form-label mb-3">Contact</label>
                                                                <!--end::Label-->
                                                                <!--begin::Input-->
                                                                <input class="form-control form-control-lg form-control-solid" name="phone" placeholder="Your phone number" value="<?= $this->auth->getUser()->phone; ?>" <? $this->auth->getRole()->title === 'Administrator' ? '' : 'readonly' ?> />
                                                                <!--end::Input-->
                                                            </div>
                                                            <div class="col-md-6">
                                                                <!--begin::Label-->
                                                                <label class="form-label mb-3">Email</label>
                                                                <!--end::Label-->
                                                                <!--begin::Input-->
                                                                <input class="form-control form-control-lg form-control-solid" name="email" placeholder="Your email address" />
                                                                <!--end::Input-->
                                                            </div>
                                                        </div>
                                                        <!--end::Input group-->
                                                        <div class="mb-10 fv-row">
                                                            <!--begin::Label-->
                                                            <label class="form-label mb-3">Biography</label>
                                                            <!--end::Label-->
                                                            <!--begin::Input-->
                                                            <textarea rows="2" class="form-control form-control-lg form-control-solid" name="bio" placeholder="Briefly describe yourself here..."></textarea>
                                                            <!--end::Input-->
                                                            <!--begin::Hint-->
                                                            <div class="form-text">Briefly describe yourself.</div>
                                                            <!--end::Hint-->
                                                        </div>
                                                        <!--end::Input group-->

                                                        <!--begin::Input group-->
                                                        <div class="mb-0 fv-row">
                                                            <!--begin::Label-->
                                                            <label class="d-flex align-items-center form-label mb-5">Check your group(s)
                                                                <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Groups"></i></label>
                                                            <!--end::Label-->
                                                            <!--begin::Options-->
                                                            <div class="mb-0">
                                                                <!--begin:Option-->
                                                                <?php foreach ($this->group->getAll() as $row) { ?>
                                                                    <label class="d-flex flex-stack mb-5 cursor-pointer">
                                                                        <!--begin:Label-->
                                                                        <span class="d-flex align-items-center me-2">
                                                                            <!--begin::Icon-->
                                                                            <span class="symbol symbol-50px me-6">
                                                                                <span class="symbol-label">
                                                                                    <!--begin::Svg Icon | path: icons/duotune/finance/fin001.svg-->
                                                                                    <span class="symbol-label" style="background-image:url(<?= $row->avatar ? $row->avatar : ''; ?>)"></span>
                                                                                    <!--end::Svg Icon-->
                                                                                </span>
                                                                            </span>
                                                                            <!--end::Icon-->
                                                                            <!--begin::Description-->
                                                                            <span class="d-flex flex-column">
                                                                                <span class="fw-bold text-gray-800 text-hover-primary fs-5"><?= $row->name; ?></span>
                                                                                <span class="fs-6 fw-semibold text-muted">Registrating as part of <? $row->name; ?> group</span>
                                                                            </span>
                                                                            <!--end:Description-->
                                                                        </span>
                                                                        <!--end:Label-->
                                                                        <!--begin:Input-->
                                                                        <span class="form-check form-check-custom form-check-solid">
                                                                            <input class="form-check-input" type="checkbox" name="group_ids[]" value="<?= $row->id; ?>" />
                                                                        </span>
                                                                        <!--end:Input-->
                                                                    </label>
                                                                <?php } ?>
                                                                <!--end::Option-->


                                                            </div>
                                                            <!--end::Options-->
                                                        </div>
                                                        <!--end::Input group-->
                                                    </div>
                                                    <!--end::Wrapper-->
                                                </div>
                                                <!--end::Step 2-->
                                                <!--begin::Step 3-->
                                                <div id="business" data-kt-stepper-element="content" class="hidden">
                                                    <!--begin::Wrapper-->
                                                    <div class="w-100">
                                                        <!--begin::Heading-->
                                                        <div class="pb-10 pb-lg-12">
                                                            <!--begin::Title-->
                                                            <h2 class="fw-bold text-dark">Business Details</h2>
                                                            <!--end::Title-->
                                                            <!--begin::Notice-->
                                                            <div class="text-muted fw-semibold fs-6">If you need more info, please check out
                                                                <a href="#" class="link-primary fw-bold">Help Page</a>.
                                                            </div>
                                                            <!--end::Notice-->
                                                        </div>
                                                        <!--end::Heading-->
                                                        <!--begin::Input group-->
                                                        <div class="mb-10 fv-row">
                                                            <!--begin::Label-->
                                                            <label class="d-flex align-items-center form-label mb-3">Specify Company Size
                                                                <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Provide your team size to help us setup your billing"></i></label>
                                                            <!--end::Label-->
                                                            <!--begin::Row-->
                                                            <div class="row mb-2" data-kt-buttons="true">
                                                                <!--begin::Col-->
                                                                <div class="col">
                                                                    <!--begin::Option-->
                                                                    <label class="btn btn-outline btn-outline-dashed btn-active-light-primary w-100 p-4">
                                                                        <input type="radio" class="btn-check" name="company_size" value="1-1" />
                                                                        <span class="fw-bold fs-3">1-1</span>
                                                                    </label>
                                                                    <!--end::Option-->
                                                                </div>
                                                                <!--end::Col-->
                                                                <!--begin::Col-->
                                                                <div class="col">
                                                                    <!--begin::Option-->
                                                                    <label class="btn btn-outline btn-outline-dashed btn-active-light-primary w-100 p-4 active">
                                                                        <input type="radio" class="btn-check" name="company_size" checked="checked" value="2-10" />
                                                                        <span class="fw-bold fs-3">2-10</span>
                                                                    </label>
                                                                    <!--end::Option-->
                                                                </div>
                                                                <!--end::Col-->
                                                                <!--begin::Col-->
                                                                <div class="col">
                                                                    <!--begin::Option-->
                                                                    <label class="btn btn-outline btn-outline-dashed btn-active-light-primary w-100 p-4">
                                                                        <input type="radio" class="btn-check" name="company_size" value="10-50" />
                                                                        <span class="fw-bold fs-3">10-50</span>
                                                                    </label>
                                                                    <!--end::Option-->
                                                                </div>
                                                                <!--end::Col-->
                                                                <!--begin::Col-->
                                                                <div class="col">
                                                                    <!--begin::Option-->
                                                                    <label class="btn btn-outline btn-outline-dashed btn-active-light-primary w-100 p-4">
                                                                        <input type="radio" class="btn-check" name="company_size" value="50+" />
                                                                        <span class="fw-bold fs-3">50+</span>
                                                                    </label>
                                                                    <!--end::Option-->
                                                                </div>
                                                                <!--end::Col-->
                                                            </div>
                                                            <!--end::Row-->
                                                        </div>
                                                        <!--end::Input group-->
                                                        <!--begin::Input group-->
                                                        <div class="fv-row mb-10">
                                                            <!--begin::Label-->
                                                            <label class="form-label required">Business Name</label>
                                                            <!--end::Label-->
                                                            <!--begin::Input-->
                                                            <input name="company" class="form-control form-control-lg form-control-solid" placeholder="Enter business name" />
                                                            <!--end::Input-->
                                                        </div>
                                                        <!--end::Input group-->
                                                        <!--begin::Input group-->
                                                        <div class="fv-row mb-10">
                                                            <!--begin::Label-->
                                                            <label class="d-flex align-items-center form-label">
                                                                <span class="required">Shortened Descriptor</span>
                                                                <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="popover" data-bs-trigger="hover" data-bs-html="true" data-bs-content="&lt;div class='p-4 rounded bg-light'&gt; &lt;div class='d-flex flex-stack text-muted mb-4'&gt; &lt;i class='fas fa-university fs-3 me-3'&gt;&lt;/i&gt; &lt;div class='fw-bold'&gt;INCBANK **** 1245 STATEMENT&lt;/div&gt; &lt;/div&gt; &lt;div class='d-flex flex-stack fw-semibold text-gray-600'&gt; &lt;div&gt;Amount&lt;/div&gt; &lt;div&gt;Transaction&lt;/div&gt; &lt;/div&gt; &lt;div class='separator separator-dashed my-2'&gt;&lt;/div&gt; &lt;div class='d-flex flex-stack text-dark fw-bold mb-2'&gt; &lt;div&gt;USD345.00&lt;/div&gt; &lt;div&gt;KEENTHEMES*&lt;/div&gt; &lt;/div&gt; &lt;div class='d-flex flex-stack text-muted mb-2'&gt; &lt;div&gt;USD75.00&lt;/div&gt; &lt;div&gt;Hosting fee&lt;/div&gt; &lt;/div&gt; &lt;div class='d-flex flex-stack text-muted'&gt; &lt;div&gt;USD3,950.00&lt;/div&gt; &lt;div&gt;Payrol&lt;/div&gt; &lt;/div&gt; &lt;/div&gt;"></i>
                                                            </label>
                                                            <!--end::Label-->
                                                            <!--begin::Input-->
                                                            <input name="business_descriptor" class="form-control form-control-lg form-control-solid" placeholder="brief discriptor" />
                                                            <!--end::Input-->
                                                            <!--begin::Hint-->
                                                            <div class="form-text">Customers will see this shortened version of your statement descriptor</div>
                                                            <!--end::Hint-->
                                                        </div>
                                                        <!--end::Input group-->
                                                        <!--begin::Input group-->
                                                        <div class="fv-row mb-10">
                                                            <!--begin::Label-->
                                                            <label class="form-label required">Corporation Type</label>
                                                            <!--end::Label-->
                                                            <!--begin::Input-->
                                                            <select name="business_type" class="form-select form-select-lg form-select-solid" data-control="select2" data-placeholder="Select..." data-allow-clear="true" data-hide-search="true">
                                                                <option></option>
                                                                <option>Sole Proprietorship</option>
                                                                <option>Non-profit</option>
                                                                <option>Limited Liability (Ltd)</option>
                                                                <option>Public Limited Company (PLC)</option>
                                                                <option>Partnership</option>
                                                            </select>
                                                            <!--end::Input-->
                                                        </div>
                                                        <!--end::Input group-->
                                                        <!--begin::Input group-->
                                                        <div class="fv-row mb-10">
                                                            <!--end::Label-->
                                                            <label class="form-label">Business Description</label>
                                                            <!--end::Label-->
                                                            <!--begin::Input-->
                                                            <textarea name="business_description" class="form-control form-control-lg form-control-solid" rows="3"></textarea>
                                                            <!--end::Input-->
                                                        </div>
                                                        <!--end::Input group-->
                                                        <!--begin::Input group-->
                                                        <div class="fv-row mb-0">
                                                            <!--begin::Label-->
                                                            <label class="fs-6 fw-semibold form-label required">Contact Email</label>
                                                            <!--end::Label-->
                                                            <!--begin::Input-->
                                                            <input name="business_email" type="email" class="form-control form-control-lg form-control-solid" placeholder="corp@support.com" />
                                                            <!--end::Input-->
                                                        </div>
                                                        <!--end::Input group-->
                                                        <!--begin::Input group-->
                                                        <div class="fv-row mb-0">
                                                            <!--begin::Label-->
                                                            <label class="fs-6 fw-semibold form-label required">Contact Tel/Mobile</label>
                                                            <!--end::Label-->
                                                            <!--begin::Input-->
                                                            <input name="business_contact" type="tel" class="form-control form-control-lg form-control-solid" placeholder="+233213456789" />
                                                            <!--end::Input-->
                                                        </div>
                                                        <!--end::Input group-->
                                                    </div>
                                                    <!--end::Wrapper-->
                                                </div>
                                                <!--end::Step 3-->
                                                <!--begin::Step 4-->
                                                <div data-kt-stepper-element="content">
                                                    <!--begin::Wrapper-->
                                                    <div class="w-100">
                                                        <!--begin::Heading-->
                                                        <div class="pb-10 pb-lg-15">
                                                            <!--begin::Title-->
                                                            <h2 class="fw-bold text-dark">Address Details</h2>
                                                            <!--end::Title-->
                                                            <!--begin::Notice-->
                                                            <div class="text-muted fw-semibold fs-6">If you need more info, please check out
                                                                <a href="#" class="text-primary fw-bold">Help Page</a>.
                                                            </div>
                                                            <!--end::Notice-->
                                                        </div>
                                                        <!--end::Heading-->
                                                        <!--begin::Input group-->
                                                        <div class="d-flex flex-column mb-7 fv-row">
                                                            <!--begin::Label-->
                                                            <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                                                                <span class="required">Address</span>
                                                                <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Specify your current address"></i>
                                                            </label>
                                                            <!--end::Label-->
                                                            <input type="text" class="form-control form-control-solid" placeholder="" name="address" />
                                                        </div>
                                                        <!--end::Input group-->

                                                        <!--begin::Input group-->
                                                        <div class="row mb-10">
                                                            <!--begin::Col-->
                                                            <div class="col-md-12 fv-row">
                                                                <!--begin::Label-->
                                                                <label class="required fs-6 fw-semibold form-label mb-2">Location</label>
                                                                <!--end::Label-->
                                                                <!--begin::Row-->
                                                                <div class="row fv-row">
                                                                    <!--begin::Col-->
                                                                    <div class="col-12">
                                                                        <div class="d-flex flex-row mb-3">
                                                                            <select id="locale-select2-ajax" name="locale_id" class="form-select form-select-solid" data-placeholder="Search a City/Town">
                                                                                <option></option>
                                                                            </select>
                                                                            <div class="">
                                                                                <span style="cursor:pointer;" onclick="$('#new-town').toggleClass('d-none')" class="input-group-text" id="btn-add-atown">Add A Town/City</span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <!--end::Col-->
                                                                </div>
                                                                <div id="new-town" class="row fv-row d-none">
                                                                    <!--begin::Col-->
                                                                    <div class="col-md-6">
                                                                    <input type="text" class="form-control form-control-solid" placeholder="Name of town/city" name="locale_name" />
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <select id="district-select2-ajax" name="district_id" class="form-select form-select-solid" data-placeholder="Search a district">
                                                                            <option></option>
                                                                        </select>
                                                                    </div>
                                                                    <!--end::Col-->
                                                                </div>
                                                                <!--end::Row-->
                                                            </div>
                                                            <!--end::Col-->
                                                        </div>
                                                        <!--end::Input group-->

                                                        <!--begin::Heading-->
                                                        <div class="pb-10 pb-lg-15">
                                                            <!--begin::Title-->
                                                            <h2 class="fw-bold text-dark">Compliance Details</h2>
                                                            <!--end::Title-->
                                                            <!--begin::Notice-->
                                                            <div class="text-muted fw-semibold fs-6">If you need more info, please check out
                                                                <a href="#" class="text-primary fw-bold">Help Page</a>.
                                                            </div>
                                                            <!--end::Notice-->
                                                        </div>
                                                        <!--end::Heading-->

                                                        <!--begin::Input group-->
                                                        <div class="row mb-10">
                                                            <!--begin::Col-->
                                                            <div class="col-6 mt-0">
                                                                <!--begin::Label-->
                                                                <label class="required fs-6 fw-semibold form-label mb-2">ID Card Type</label>
                                                                <!--end::Label-->
                                                                <select name="id_card_type" class="form-select form-select-solid" data-control="select2" data-hide-search="true" data-placeholder="ID card type">
                                                                    <option></option>
                                                                    <option>Ghana Card</option>
                                                                    <option>Voter's ID</option>
                                                                    <option>Passport</option>
                                                                    <option>Driver's License</option>
                                                                    <option>NHIS Card</option>
                                                                </select>
                                                            </div>
                                                            <!--end::Col-->
                                                            <!--begin::Col-->
                                                            <div class="col-6">
                                                                <!--begin::Input group-->

                                                                <!--begin::Label-->
                                                                <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                                                                    <span class="required">ID Number</span>
                                                                    <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Enter the ID number"></i>
                                                                </label>
                                                                <!--end::Label-->
                                                                <input type="text" class="form-control form-control-solid" placeholder="" name="national_id" />

                                                                <!--end::Input group-->
                                                            </div>
                                                            <!--end::Col-->
                                                        </div>
                                                        <!--end::Row-->
                                                        <!--end::Input group-->

                                                        <!--begin::Heading-->
                                                        <div class="pb-10 pb-lg-15">
                                                            <!--begin::Title-->
                                                            <h2 class="fw-bold text-dark">Social Media Links</h2>
                                                            <!--end::Title-->
                                                            <!--begin::Notice-->
                                                            <div class="text-muted fw-semibold fs-6">If you need more info, please check out
                                                                <a href="#" class="text-primary fw-bold">Help Page</a>.
                                                            </div>
                                                            <!--end::Notice-->
                                                        </div>
                                                        <!--end::Heading-->

                                                        <!--begin::Input group-->
                                                        <div class="row mb-10">
                                                            <!--begin::Input group-->
                                                            <!--begin::Label-->
                                                            <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                                                                <span>Website</span>
                                                                <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Provide your website url"></i>
                                                            </label>
                                                            <!--end::Label-->
                                                            <!--begin::Input group-->
                                                            <div class="input-group mb-5">
                                                                <span class="input-group-text">
                                                                    <i class="bi bi-browser-chrome fs-1"></i>
                                                                </span>
                                                                <input type="text" class="form-control form-control-solid" placeholder="mywebsite.com" name="social_website" />
                                                                <!--end::Input group-->
                                                            </div>
                                                            <!--end::Input group-->

                                                        </div>
                                                        <!--end::Input group-->
                                                        <!--begin::Input group-->
                                                        <div class="row mb-10">
                                                            <!--begin::Input group-->
                                                            <!--begin::Label-->
                                                            <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                                                                <span>Facebook</span>
                                                                <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Provide your facebook link"></i>
                                                            </label>
                                                            <!--end::Label-->
                                                            <!--begin::Input group-->
                                                            <div class="input-group mb-5">
                                                                <span class="input-group-text">
                                                                    <i class="bi bi-facebook fs-1"></i>
                                                                </span>
                                                                <input type="text" class="form-control form-control-solid" placeholder="Your facebook link" name="social_facebook" />
                                                                <!--end::Input group-->
                                                            </div>
                                                            <!--end::Input group-->

                                                        </div>
                                                        <!--end::Input group-->
                                                        <!--begin::Input group-->
                                                        <div class="row mb-10">
                                                            <!--begin::Input group-->
                                                            <!--begin::Label-->
                                                            <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                                                                <span>Twitter</span>
                                                                <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Provide your twitter link"></i>
                                                            </label>
                                                            <!--end::Label-->
                                                            <!--begin::Input group-->
                                                            <div class="input-group mb-5">
                                                                <span class="input-group-text">
                                                                    <i class="bi bi-twitter fs-1"></i>
                                                                </span>
                                                                <input type="text" class="form-control form-control-solid" placeholder="Your twitter link" name="social_twitter" />
                                                                <!--end::Input group-->
                                                            </div>
                                                            <!--end::Input group-->

                                                        </div>
                                                        <!--end::Input group-->

                                                        <!--begin::Input group-->
                                                        <div class="row mb-10">
                                                            <!--begin::Input group-->
                                                            <!--begin::Label-->
                                                            <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                                                                <span>LinkedIn</span>
                                                                <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Provide your linkedin link"></i>
                                                            </label>
                                                            <!--end::Label-->
                                                            <!--begin::Input group-->
                                                            <div class="input-group mb-5">
                                                                <span class="input-group-text">
                                                                    <i class="bi bi-linkedin fs-1"></i>
                                                                </span>
                                                                <input type="text" class="form-control form-control-solid" placeholder="Your linkedin link" name="social_linkedin" />
                                                                <!--end::Input group-->
                                                            </div>
                                                            <!--end::Input group-->

                                                        </div>
                                                        <!--end::Input group-->
                                                    </div>
                                                    <!--end::Wrapper-->
                                                </div>
                                                <!--end::Step 4-->
                                                <!--begin::Step 5-->
                                                <div data-kt-stepper-element="content">
                                                    <!--begin::Wrapper-->
                                                    <div class="w-100">
                                                        <!--begin::Heading-->
                                                        <div class="pb-8 pb-lg-10">
                                                            <!--begin::Title-->
                                                            <h2 class="fw-bold text-dark">Your Are Done!</h2>
                                                            <!--end::Title-->

                                                        </div>
                                                        <!--end::Heading-->
                                                        <!--begin::Body-->
                                                        <div class="mb-0">
                                                            <!--begin::Text-->
                                                            <div class="fs-6 text-gray-600 mb-5">You have successfully registered as a member!</div>
                                                            <!--end::Text-->
                                                            <!--begin::Alert-->
                                                            <!--begin::Notice-->
                                                            <div class="notice d-flex bg-light-warning rounded border-warning border border-dashed p-6">
                                                                <!--begin::Icon-->
                                                                <!--begin::Svg Icon | path: icons/duotune/general/gen044.svg-->
                                                                <span class="svg-icon svg-icon-2tx svg-icon-warning me-4">
                                                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                        <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="10" fill="currentColor" />
                                                                        <rect x="11" y="14" width="7" height="2" rx="1" transform="rotate(-90 11 14)" fill="currentColor" />
                                                                        <rect x="11" y="17" width="2" height="2" rx="1" transform="rotate(-90 11 17)" fill="currentColor" />
                                                                    </svg>
                                                                </span>
                                                                <!--end::Svg Icon-->
                                                                <!--end::Icon-->
                                                                <!--begin::Wrapper-->
                                                                <div class="d-flex flex-stack flex-grow-1">
                                                                    <!--begin::Content-->
                                                                    <div class="fw-semibold">
                                                                        <h4 class="text-gray-900 fw-bold">We need your attention!</h4>
                                                                        <div class="fs-6 text-gray-700">You form will be approved by
                                                                            <a id="ref-link" href="<?= site_url('members/view/') ?>" target="_blank" class="fw-bold"></a>
                                                                        </div>
                                                                    </div>
                                                                    <!--end::Content-->
                                                                </div>
                                                                <!--end::Wrapper-->
                                                            </div>
                                                            <!--end::Notice-->
                                                            <!--end::Alert-->
                                                        </div>
                                                        <!--end::Body-->
                                                    </div>
                                                    <!--end::Wrapper-->
                                                </div>
                                                <!--end::Step 5-->
                                                <!--begin::Actions-->
                                                <div class="d-flex flex-stack pt-15">
                                                    <!--begin::Wrapper-->
                                                    <div class="mr-2">
                                                        <button type="button" class="btn btn-lg btn-light-primary me-3" data-kt-stepper-action="previous">
                                                            <!--begin::Svg Icon | path: icons/duotune/arrows/arr063.svg-->
                                                            <span class="svg-icon svg-icon-4 me-1">
                                                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <rect opacity="0.5" x="6" y="11" width="13" height="2" rx="1" fill="currentColor" />
                                                                    <path d="M8.56569 11.4343L12.75 7.25C13.1642 6.83579 13.1642 6.16421 12.75 5.75C12.3358 5.33579 11.6642 5.33579 11.25 5.75L5.70711 11.2929C5.31658 11.6834 5.31658 12.3166 5.70711 12.7071L11.25 18.25C11.6642 18.6642 12.3358 18.6642 12.75 18.25C13.1642 17.8358 13.1642 17.1642 12.75 16.75L8.56569 12.5657C8.25327 12.2533 8.25327 11.7467 8.56569 11.4343Z" fill="currentColor" />
                                                                </svg>
                                                            </span>
                                                            <!--end::Svg Icon-->Back
                                                        </button>
                                                    </div>

                                                    <div id="view-profile" class="float-right hidden">
                                                        <a id="memb-link" href="<?= site_url('members/view/') ?>" class="btn btn-lg btn-light-primary">
                                                            View My Profile
                                                        </a>
                                                    </div>
                                                    <!--end::Wrapper-->
                                                    <!--begin::Wrapper-->
                                                    <div>
                                                        <button type="button" class="btn btn-lg btn-primary me-3" data-kt-stepper-action="submit">
                                                            <span class="indicator-label">Submit
                                                                <!--begin::Svg Icon | path: icons/duotune/arrows/arr064.svg-->
                                                                <span class="svg-icon svg-icon-3 ms-2 me-0">
                                                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                        <rect opacity="0.5" x="18" y="13" width="13" height="2" rx="1" transform="rotate(-180 18 13)" fill="currentColor" />
                                                                        <path d="M15.4343 12.5657L11.25 16.75C10.8358 17.1642 10.8358 17.8358 11.25 18.25C11.6642 18.6642 12.3358 18.6642 12.75 18.25L18.2929 12.7071C18.6834 12.3166 18.6834 11.6834 18.2929 11.2929L12.75 5.75C12.3358 5.33579 11.6642 5.33579 11.25 5.75C10.8358 6.16421 10.8358 6.83579 11.25 7.25L15.4343 11.4343C15.7467 11.7467 15.7467 12.2533 15.4343 12.5657Z" fill="currentColor" />
                                                                    </svg>
                                                                </span>
                                                                <!--end::Svg Icon-->
                                                            </span>
                                                            <span class="indicator-progress">Please wait...
                                                                <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                                        </button>
                                                        <button type="button" class="btn btn-lg btn-primary" data-kt-stepper-action="next">Continue
                                                            <!--begin::Svg Icon | path: icons/duotune/arrows/arr064.svg-->
                                                            <span class="svg-icon svg-icon-4 ms-1 me-0">
                                                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <rect opacity="0.5" x="18" y="13" width="13" height="2" rx="1" transform="rotate(-180 18 13)" fill="currentColor" />
                                                                    <path d="M15.4343 12.5657L11.25 16.75C10.8358 17.1642 10.8358 17.8358 11.25 18.25C11.6642 18.6642 12.3358 18.6642 12.75 18.25L18.2929 12.7071C18.6834 12.3166 18.6834 11.6834 18.2929 11.2929L12.75 5.75C12.3358 5.33579 11.6642 5.33579 11.25 5.75C10.8358 6.16421 10.8358 6.83579 11.25 7.25L15.4343 11.4343C15.7467 11.7467 15.7467 12.2533 15.4343 12.5657Z" fill="currentColor" />
                                                                </svg>
                                                            </span>
                                                            <!--end::Svg Icon-->
                                                        </button>
                                                    </div>
                                                    <!--end::Wrapper-->
                                                </div>
                                                <!--end::Actions-->
                                            </form>
                                            <!--end::Form-->
                                        </div>
                                        <!--end::Stepper-->
                                    </div>
                                    <!--end::Card body-->
                                </div>
                                <!--end::Card-->
                                <!--begin::Card-->
                                <div class="card mb-5 <?= ($this->auth->getMembership() && $this->auth->getRole()->title !== 'Administrator') ? '' : 'd-none' ?>">
                                    <!--begin::Card body-->
                                    <div class="card-body p-0">
                                        <!--begin::Wrapper-->
                                        <div class="card-px text-center py-20 my-10">
                                            <!--begin::Title-->
                                            <h2 class="fs-2x fw-bold mb-10">Thank You <?= $this->auth->getMembership() ? $this->auth->getMembership()->name : ''; ?></h2>
                                            <!--end::Title-->
                                            <!--begin::Description-->
                                            <p class="text-gray-400 fs-4 fw-semibold mb-10">You have succefully completed your registration.</p>
                                            <!--end::Description-->
                                        </div>
                                        <!--end::Wrapper-->
                                        <!--begin::Illustration-->
                                        <div class="text-center px-4">
                                            <img class="mw-100 mh-300px" alt="" src="<?= base_url() ?>assets/media/illustrations/sketchy-1/2.png" />
                                        </div>
                                        <!--end::Illustration-->
                                    </div>
                                    <!--end::Card body-->
                                </div>
                                <!--end::Card-->
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
    <!--begin::Custom Javascript(used for this page only)-->
    <script src="<?= base_url(); ?>assets/js/custom/utilities/modals/create-account.js"></script>
    <script src="<?= base_url(); ?>assets/js/widgets.bundle.js"></script>
    <script src="<?= base_url(); ?>assets/js/custom/widgets.js"></script>
    <script src="<?= base_url(); ?>assets/js/custom/apps/chat/chat.js"></script>
    <script src="<?= base_url(); ?>assets/js/custom/utilities/modals/upgrade-plan.js"></script>
    <script src="<?= base_url(); ?>assets/js/custom/utilities/modals/create-app.js"></script>
    <script src="<?= base_url(); ?>assets/js/custom/utilities/modals/users-search.js"></script>
    <script>
        $(function(){
            $("#memberid-select2-ajax").select2({ 
                ajax: {
                    url: "<?=site_url('select2-json/members') ?>",
                    dataType: 'json',
                    },
                    enableFiltering: true,
                    placeholder: 'Enter an member id or name',
                    templateResult: formatResult,
            }); 
            
            $("#district-select2-ajax").select2({ 
                ajax: {
                    url: "<?=site_url('select2-json/districts') ?>",
                    dataType: 'json',
                    },
                    enableFiltering: true,
                    placeholder: 'Select your district',
            }); 
            
            $("#locale-select2-ajax").select2({ 
                ajax: {
                    url: "<?=site_url('select2-json/locales') ?>",
                    dataType: 'json',
                    },
                    enableFiltering: true,
                    placeholder: 'Select your city/town',
            }); 
        });
         
         function formatResult (data) {
             if (data.loading) { return data.text; }
             var $container = $( 
                 "<div class='select2-result-member d-flex align-items-center'> <div class='symbol symbol-25px'>" +
                    '<span class="symbol-label" style="background-image:url('+data.avatar+');"></span>' +
                  "</div>"
                  + "<div class='select2-result-title p-5'>" +data.text +"</div>" +
                "</div>" );
            return $container;
         }
    </script>
    <!--end::Custom Javascript-->
    <!--end::Javascript-->
</body>
<!--end::Body-->

</html>