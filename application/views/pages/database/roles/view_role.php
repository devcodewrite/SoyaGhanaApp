<!DOCTYPE html>

<html lang="en">
<!--begin::Head-->
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />

<head>
    <!--begin::Vendor Stylesheets(used for this page only)-->
		<link href="<?=base_url()?>assets/plugins/custom/datatables/datatables.bundle.css" rel="stylesheet" type="text/css" />
		<!--end::Vendor Stylesheets-->
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
                        <?php $this->load->view('templates/toolbar'); ?>
                        <!--end::Toolbar-->
                        <!--begin::Content-->
                        <div id="kt_app_content" class="app-content flex-column-fluid">
                            <!--begin::Content container-->
                            <div id="kt_app_content_container" class="app-container container-xxl">
                                <!--begin::Layout-->
                                <div class="d-flex flex-column flex-lg-row">
                                    <!--begin::Sidebar-->
                                    <div class="flex-column flex-lg-row-auto w-100 w-lg-200px w-xl-300px mb-10">
                                        <!--begin::Card-->
                                        <div class="card card-flush">
                                            <!--begin::Card header-->
                                            <div class="card-header">
                                                <!--begin::Card title-->
                                                <div class="card-title">
                                                    <h2 class="mb-0"><?=$role->title; ?></h2>
                                                </div>
                                                <!--end::Card title-->
                                            </div>
                                            <!--end::Card header-->
                                            <!--begin::Card body-->
                                            <div class="card-body pt-0">
                                                <!--begin::Permissions-->
                                                <div class="d-flex flex-column text-gray-600">
                                                <?php if($role->all_admin_perms == 1){ ?> 
															<div class="d-flex align-items-center py-2">
																<span class="bullet bg-primary me-3"></span>All Admin Controls
															</div>
														<?php } ?>
														<?php if($role->database_management){ ?> 
															<div class="d-flex align-items-center py-2">
																<span class="bullet bg-primary me-3"></span>
																<?php
																$perms = explode(',',$role->database_management);
																foreach($perms as $i => $perm){
																	echo ucfirst($perm);
																	if($i < sizeof($perms)-2) echo ', ';
																	else if($i < sizeof($perms)-1) echo ' and ';
																}
																?>
																Databases
															</div>
														<?php } ?>

														<?php if($role->user_management){ ?> 
															<div class="d-flex align-items-center py-2">
																<span class="bullet bg-primary me-3"></span>
																<?php
																$perms = explode(',',$role->user_management);
																foreach($perms as $i => $perm){
																	echo ucfirst($perm);
																	if($i < sizeof($perms)-2) echo ', ';
																	else if($i < sizeof($perms)-1) echo ' and ';
																}
																?>
																 Users
															</div>
														<?php } ?>

														<?php if($role->member_management){ ?> 
															<div class="d-flex align-items-center py-2">
																<span class="bullet bg-primary me-3"></span>
																<?php
																$perms = explode(',',$role->member_management);
																foreach($perms as $i => $perm){
																	echo ucfirst($perm);
																	if($i < sizeof($perms)-2) echo ', ';
																	else if($i < sizeof($perms)-1) echo ' and ';
																}
																?>
																 Members
															</div>
														<?php } ?>


														<?php if($role->membership_management){ ?> 
															<div class="d-flex align-items-center py-2">
																<span class="bullet bg-primary me-3"></span>
																<?php
																$perms = explode(',',$role->membership_management);
																foreach($perms as $i => $perm){
																	echo ucfirst($perm);
																	if($i < sizeof($perms)-2) echo ', ';
																	else if($i < sizeof($perms)-1) echo ' and ';
																}
																?>
																 Membership
															</div>
														<?php } ?>
                                                </div>
                                                <!--end::Permissions-->
                                            </div>
                                            <!--end::Card body-->
                                            <!--begin::Card footer-->
                                            <div class="card-footer pt-0">
                                                <button type="button" class="btn btn-light btn-active-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_update_role">Edit Role</button>
                                            </div>
                                            <!--end::Card footer-->
                                        </div>
                                        <!--end::Card-->
                                        <!--begin::Modal-->
                                        <!--begin::Modal - Update role-->
                                        <div class="modal fade" id="kt_modal_update_role" tabindex="-1" aria-hidden="true">
                                            <!--begin::Modal dialog-->
                                            <div class="modal-dialog modal-dialog-centered mw-750px">
                                                <!--begin::Modal content-->
                                                <div class="modal-content">
                                                    <!--begin::Modal header-->
                                                    <div class="modal-header">
                                                        <!--begin::Modal title-->
                                                        <h2 class="fw-bold">Update Role</h2>
                                                        <!--end::Modal title-->
                                                        <!--begin::Close-->
                                                        <div class="btn btn-icon btn-sm btn-active-icon-primary" data-kt-roles-modal-action="close">
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
                                                    <div class="modal-body scroll-y mx-5 my-7">
                                                        <!--begin::Form-->
                                                        <form id="kt_modal_update_role_form" class="form" action="#">
                                                            <!--begin::Scroll-->
                                                            <div class="d-flex flex-column scroll-y me-n7 pe-7" id="kt_modal_update_role_scroll" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_update_role_header" data-kt-scroll-wrappers="#kt_modal_update_role_scroll" data-kt-scroll-offset="300px">
                                                                <!--begin::Input group-->
                                                                <div class="fv-row mb-10">
                                                                    <!--begin::Label-->
                                                                    <label class="fs-5 fw-bold form-label mb-2">
                                                                        <span class="required">Role name</span>
                                                                    </label>
                                                                    <!--end::Label-->
                                                                    <!--begin::Input-->
                                                                    <input class="form-control form-control-solid" placeholder="Enter a role name" name="title" value="<?=$role->title; ?>" />
                                                                    <!--end::Input-->
                                                                </div>
                                                                <!--end::Input group-->
                                                                <!--begin::Permissions-->
                                                                <div class="fv-row">
                                                                    <!--begin::Label-->
                                                                    <label class="fs-5 fw-bold form-label mb-2">Role Permissions</label>
                                                                    <!--end::Label-->
                                                                    <!--begin::Table wrapper-->
                                                                    <div class="table-responsive">
                                                                        <!--begin::Table-->
                                                                        <table class="table align-middle table-row-dashed fs-6 gy-5">
                                                                            <!--begin::Table body-->
                                                                            <tbody class="text-gray-600 fw-semibold">
                                                                                <!--begin::Table row-->
                                                                                <tr>
                                                                                    <td class="text-gray-800">Administrator Access
                                                                                        <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="Allows a full access to the system"></i>
                                                                                    </td>
                                                                                    <td>
                                                                                        <!--begin::Checkbox-->
                                                                                        <label class="form-check form-check-sm form-check-custom form-check-solid me-9">
                                                                                            <input class="form-check-input" type="checkbox" value="" id="kt_roles_select_all" <?=$role->all_admin_perms==1?'checked':'' ?> />
                                                                                            <span class="form-check-label" for="kt_roles_select_all">Select all</span>
                                                                                        </label>
                                                                                        <!--end::Checkbox-->
                                                                                    </td>
                                                                                </tr>
                                                                                <!--end::Table row-->
                                                                                <?php 
                                                                                    $userPerms = $memberPerms = $membershipPerms = $databasePerms = ['create','read', 'write'];
                                                                                    if($role->all_admin_perms != 1){
                                                                                        $userPerms = explode(',', $role->user_management);
                                                                                        $memberPerms = explode(',', $role->member_management);
                                                                                        $membershipPerms = explode(',', $role->membership_management);
                                                                                        $databasePerms = explode(',', $role->database_management);
                                                                                    }
                                                                                ?>
                                                                                <!--begin::Table row-->
                                                                                <tr>
                                                                                    <!--begin::Label-->
                                                                                    <td class="text-gray-800">User Management</td>
                                                                                    <!--end::Label-->
                                                                                    <!--begin::Input group-->
                                                                                    <td>
                                                                                        <!--begin::Wrapper-->
                                                                                        <div class="d-flex">
                                                                                            <!--begin::Checkbox-->
                                                                                            <label class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
                                                                                                <input class="form-check-input" type="checkbox" value="read" name="user_management[]" <?=in_array('read', $userPerms)?'checked':'' ?> />
                                                                                                <span class="form-check-label">Read</span>
                                                                                            </label>
                                                                                            <!--end::Checkbox-->
                                                                                            <!--begin::Checkbox-->
                                                                                            <label class="form-check form-check-custom form-check-solid me-5 me-lg-20">
                                                                                                <input class="form-check-input" type="checkbox" value="write" name="user_management[]" <?=in_array('write', $userPerms)?'checked':'' ?>/>
                                                                                                <span class="form-check-label">Write</span>
                                                                                            </label>
                                                                                            <!--end::Checkbox-->
                                                                                            <!--begin::Checkbox-->
                                                                                            <label class="form-check form-check-custom form-check-solid">
                                                                                                <input class="form-check-input" type="checkbox" value="create" name="user_management[]" <?=in_array('create', $userPerms)?'checked':'' ?>/>
                                                                                                <span class="form-check-label">Create</span>
                                                                                            </label>
                                                                                            <!--end::Checkbox-->
                                                                                        </div>
                                                                                        <!--end::Wrapper-->
                                                                                    </td>
                                                                                    <!--end::Input group-->
                                                                                </tr>
                                                                                <!--end::Table row-->
                                                                                <!--begin::Table row-->
                                                                                <tr>
                                                                                    <!--begin::Label-->
                                                                                    <td class="text-gray-800">Member Management</td>
                                                                                    <!--end::Label-->
                                                                                    <!--begin::Input group-->
                                                                                    <td>
                                                                                        <!--begin::Wrapper-->
                                                                                        <div class="d-flex">
                                                                                            <!--begin::Checkbox-->
                                                                                            <label class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
                                                                                                <input class="form-check-input" type="checkbox" value="read" name="member_management[]" <?=in_array('read', $memberPerms)?'checked':'' ?>/>
                                                                                                <span class="form-check-label">Read</span>
                                                                                            </label>
                                                                                            <!--end::Checkbox-->
                                                                                            <!--begin::Checkbox-->
                                                                                            <label class="form-check form-check-custom form-check-solid me-5 me-lg-20">
                                                                                                <input class="form-check-input" type="checkbox" value="write" name="member_management[]" <?=in_array('write', $memberPerms)?'checked':'' ?>/>
                                                                                                <span class="form-check-label">Write</span>
                                                                                            </label>
                                                                                            <!--end::Checkbox-->
                                                                                            <!--begin::Checkbox-->
                                                                                            <label class="form-check form-check-custom form-check-solid">
                                                                                                <input class="form-check-input" type="checkbox" value="create" name="member_management[]" <?=in_array('create', $memberPerms)?'checked':'' ?>/>
                                                                                                <span class="form-check-label">Create</span>
                                                                                            </label>
                                                                                            <!--end::Checkbox-->
                                                                                        </div>
                                                                                        <!--end::Wrapper-->
                                                                                    </td>
                                                                                    <!--end::Input group-->
                                                                                </tr>
                                                                                <!--end::Table row-->
                                                                              
                                                                                <!--begin::Table row-->
                                                                                <tr>
                                                                                    <!--begin::Label-->
                                                                                    <td class="text-gray-800">Membership Management</td>
                                                                                    <!--end::Label-->
                                                                                    <!--begin::Input group-->
                                                                                    <td>
                                                                                        <!--begin::Wrapper-->
                                                                                        <div class="d-flex">
                                                                                            <!--begin::Checkbox-->
                                                                                            <label class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
                                                                                                <input class="form-check-input" type="checkbox" value="read" name="membership_management[]" <?=in_array('read', $membershipPerms)?'checked':'' ?>/>
                                                                                                <span class="form-check-label">Read</span>
                                                                                            </label>
                                                                                            <!--end::Checkbox-->
                                                                                            <!--begin::Checkbox-->
                                                                                            <label class="form-check form-check-custom form-check-solid me-5 me-lg-20">
                                                                                                <input class="form-check-input" type="checkbox" value="write" name="membership_management[]" <?=in_array('write', $membershipPerms)?'checked':'' ?>/>
                                                                                                <span class="form-check-label">Write</span>
                                                                                            </label>
                                                                                            <!--end::Checkbox-->
                                                                                            <!--begin::Checkbox-->
                                                                                            <label class="form-check form-check-custom form-check-solid">
                                                                                                <input class="form-check-input" type="checkbox" value="create" name="membership_management[]" <?=in_array('create', $membershipPerms)?'checked':'' ?>/>
                                                                                                <span class="form-check-label">Create</span>
                                                                                            </label>
                                                                                            <!--end::Checkbox-->
                                                                                        </div>
                                                                                        <!--end::Wrapper-->
                                                                                    </td>
                                                                                    <!--end::Input group-->
                                                                                </tr>
                                                                                <!--end::Table row-->
                                                                               
                                                                                <!--begin::Table row-->
                                                                                <tr>
                                                                                    <!--begin::Label-->
                                                                                    <td class="text-gray-800">Database Management</td>
                                                                                    <!--end::Label-->
                                                                                    <!--begin::Input group-->
                                                                                    <td>
                                                                                        <!--begin::Wrapper-->
                                                                                        <div class="d-flex">
                                                                                            <!--begin::Checkbox-->
                                                                                            <label class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
                                                                                                <input class="form-check-input" type="checkbox" value="read" name="database_management[]" <?=in_array('read', $databasePerms)?'checked':'' ?>/>
                                                                                                <span class="form-check-label">Read</span>
                                                                                            </label>
                                                                                            <!--end::Checkbox-->
                                                                                            <!--begin::Checkbox-->
                                                                                            <label class="form-check form-check-custom form-check-solid me-5 me-lg-20">
                                                                                                <input class="form-check-input" type="checkbox" value="write" name="database_management[]" <?=in_array('write', $databasePerms)?'checked':'' ?>/>
                                                                                                <span class="form-check-label">Write</span>
                                                                                            </label>
                                                                                            <!--end::Checkbox-->
                                                                                            <!--begin::Checkbox-->
                                                                                            <label class="form-check form-check-custom form-check-solid">
                                                                                                <input class="form-check-input" type="checkbox" value="create" name="database_management[]" <?=in_array('create', $databasePerms)?'checked':'' ?>/>
                                                                                                <span class="form-check-label">Create</span>
                                                                                            </label>
                                                                                            <!--end::Checkbox-->
                                                                                        </div>
                                                                                        <!--end::Wrapper-->
                                                                                    </td>
                                                                                    <!--end::Input group-->
                                                                                </tr>
                                                                                <!--end::Table row-->
                                                                               
                                                                            </tbody>
                                                                            <!--end::Table body-->
                                                                        </table>
                                                                        <!--end::Table-->
                                                                    </div>
                                                                    <!--end::Table wrapper-->
                                                                </div>
                                                                <!--end::Permissions-->
                                                            </div>
                                                            <!--end::Scroll-->
                                                            <!--begin::Actions-->
                                                            <div class="text-center pt-15">
                                                                <button type="reset" class="btn btn-light me-3" data-kt-roles-modal-action="cancel">Discard</button>
                                                                <button type="submit" class="btn btn-primary" data-kt-roles-modal-action="submit">
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
                                        <!--end::Modal - Update role-->
                                        <!--end::Modal-->
                                    </div>
                                    <!--end::Sidebar-->
                                    <!--begin::Content-->
                                    <div class="flex-lg-row-fluid ms-lg-10">
                                        <!--begin::Card-->
                                        <div class="card card-flush mb-6 mb-xl-9">
                                            <!--begin::Card header-->
                                            <div class="card-header pt-5">
                                                <!--begin::Card title-->
                                                <div class="card-title">
                                                    <h2 class="d-flex align-items-center">Users Assigned
                                                        <span class="text-gray-600 fs-6 ms-1">(<?=$this->user->getCount(['role_id' => $role->id]) ?>)</span>
                                                    </h2>
                                                </div>
                                                <!--end::Card title-->
                                                <!--begin::Card toolbar-->
                                                <div class="card-toolbar">
                                                    <!--begin::Search-->
                                                    <div class="d-flex align-items-center position-relative my-1" data-kt-view-roles-table-toolbar="base">
                                                        <!--begin::Svg Icon | path: icons/duotune/general/gen021.svg-->
                                                        <span class="svg-icon svg-icon-1 position-absolute ms-6">
                                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1" transform="rotate(45 17.0365 15.1223)" fill="currentColor" />
                                                                <path d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z" fill="currentColor" />
                                                            </svg>
                                                        </span>
                                                        <!--end::Svg Icon-->
                                                        <input type="text" data-kt-roles-table-filter="search" class="form-control form-control-solid w-250px ps-15" placeholder="Search Users" />
                                                    </div>
                                                    <!--end::Search-->
                                                    <!--begin::Group actions-->
                                                    <div class="d-flex justify-content-end align-items-center d-none" data-kt-view-roles-table-toolbar="selected">
                                                        <div class="fw-bold me-5">
                                                            <span class="me-2" data-kt-view-roles-table-select="selected_count"></span>Selected
                                                        </div>
                                                        <button type="button" class="btn btn-danger" data-kt-view-roles-table-select="delete_selected">Delete Selected</button>
                                                    </div>
                                                    <!--end::Group actions-->
                                                </div>
                                                <!--end::Card toolbar-->
                                            </div>
                                            <!--end::Card header-->
                                            <!--begin::Card body-->
                                            <div class="card-body pt-0">
                                                <!--begin::Table-->
                                                <table class="table align-middle table-row-dashed fs-6 gy-5 mb-0" id="kt_roles_view_table">
                                                    <!--begin::Table head-->
                                                    <thead>
                                                        <!--begin::Table row-->
                                                        <tr class="text-start text-muted fw-bold fs-7 text-uppercase gs-0">
                                                            <th class="w-10px pe-2">
                                                                <div class="form-check form-check-sm form-check-custom form-check-solid me-3">
                                                                    <input class="form-check-input" type="checkbox" data-kt-check="true" data-kt-check-target="#kt_roles_view_table .form-check-input" value="1" />
                                                                </div>
                                                            </th>
                                                            <th class="min-w-50px">ID</th>
                                                            <th class="min-w-150px">User</th>
                                                            <th class="min-w-125px">Joined Date</th>
                                                            <th class="text-end min-w-100px">Actions</th>
                                                        </tr>
                                                        <!--end::Table row-->
                                                    </thead>
                                                    <!--end::Table head-->
                                                    <!--begin::Table body-->
                                                   
                                                    <!--end::Table body-->
                                                </table>
                                                <!--end::Table-->
                                            </div>
                                            <!--end::Card body-->
                                        </div>
                                        <!--end::Card-->
                                    </div>
                                    <!--end::Content-->
                                </div>
                                <!--end::Layout-->
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
    <script src="<?= base_url(); ?>assets/plugins/custom/formrepeater/formrepeater.bundle.js"></script>
    <!--begin::Vendors Javascript(used for this page only)-->
		<script src="<?=base_url()?>assets/plugins/custom/datatables/datatables.bundle.js"></script>
		<!--end::Vendors Javascript-->
		<!--begin::Custom Javascript(used for this page only)-->
		<script src="<?=base_url()?>assets/js/custom/apps/user-management/roles/view/view.js"></script>
		<script src="<?=base_url()?>assets/js/custom/apps/user-management/roles/view/update-role.js"></script>
		<script src="<?=base_url()?>assets/js/widgets.bundle.js"></script>
		<script src="<?=base_url()?>assets/js/custom/widgets.js"></script>
		<script src="<?=base_url()?>assets/js/custom/utilities/modals/create-app.js"></script>
		<script src="<?=base_url()?>assets/js/custom/utilities/modals/users-search.js"></script>
		<!--end::Custom Javascript-->
    <!--end::Javascript-->
</body>
<!--end::Body-->

</html>