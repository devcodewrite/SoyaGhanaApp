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
                        <?php $this->load->view('templates/toolbar'); ?>
                        <!--end::Toolbar-->
                        <!--begin::Content-->
                        <div id="kt_app_content" class="app-content flex-column-fluid">
                          <!--begin::Content container-->
								<div id="kt_app_content_container" class="app-container container-xxl">
									<!--begin::Row-->
									<div class="row row-cols-1 row-cols-md-2 row-cols-xl-3 g-5 g-xl-9 pad-5 mb-5">
										<?php foreach($this->role->getAll() as $row){ ?> 
									<!--begin::Col-->
										<div class="col-md-4">
											<!--begin::Card-->
											<div class="card card-flush h-md-100">
												<!--begin::Card header-->
												<div class="card-header">
													<!--begin::Card title-->
													<div class="card-title">
														<h2><?=$row->title; ?></h2>
													</div>
													<!--end::Card title-->
												</div>
												<!--end::Card header-->
												<!--begin::Card body-->
												<div class="card-body pt-1">
													<!--begin::Users-->
													<div class="fw-bold text-gray-600 mb-5">Total users with this role: <?=$this->user->getCount(['role_id'=>$row->id]) ?></div>
													<!--end::Users-->
													<!--begin::Permissions-->
													<div class="d-flex flex-column text-gray-600">
														<?php if($row->all_admin_perms == 1){ ?> 
															<div class="d-flex align-items-center py-2">
																<span class="bullet bg-primary me-3"></span>All Admin Controls
															</div>
														<?php } ?>
														<?php if($row->database_management){ ?> 
															<div class="d-flex align-items-center py-2">
																<span class="bullet bg-primary me-3"></span>
																<?php
																$perms = explode(',',$row->database_management);
																foreach($perms as $i => $perm){
																	echo ucfirst($perm);
																	if($i < sizeof($perms)-2) echo ', ';
																	else if($i < sizeof($perms)-1) echo ' and ';
																}
																?>
																Databases
															</div>
														<?php } ?>

														<?php if($row->user_management){ ?> 
															<div class="d-flex align-items-center py-2">
																<span class="bullet bg-primary me-3"></span>
																<?php
																$perms = explode(',',$row->user_management);
																foreach($perms as $i => $perm){
																	echo ucfirst($perm);
																	if($i < sizeof($perms)-2) echo ', ';
																	else if($i < sizeof($perms)-1) echo ' and ';
																}
																?>
																 Users
															</div>
														<?php } ?>

														<?php if($row->member_management){ ?> 
															<div class="d-flex align-items-center py-2">
																<span class="bullet bg-primary me-3"></span>
																<?php
																$perms = explode(',',$row->member_management);
																foreach($perms as $i => $perm){
																	echo ucfirst($perm);
																	if($i < sizeof($perms)-2) echo ', ';
																	else if($i < sizeof($perms)-1) echo ' and ';
																}
																?>
																 Members
															</div>
														<?php } ?>


														<?php if($row->membership_management){ ?> 
															<div class="d-flex align-items-center py-2">
																<span class="bullet bg-primary me-3"></span>
																<?php
																$perms = explode(',',$row->membership_management);
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
												<div class="card-footer flex-wrap pt-0">
													<a href="<?=site_url('database/view_role/'.$row->id); ?>" class="btn btn-light btn-active-primary my-1 me-2">View Role</a>
													<button type="button" class="btn btn-light btn-active-light-primary my-1" data-bs-toggle="modal" data-bs-target="#kt_modal_update_role">Edit Role</button>
												</div>
												<!--end::Card footer-->
											</div>
											<!--end::Card-->
										</div>
										<!--end::Col-->
										<?php } ?>
									
										<!--begin::Add new card-->
										<div class="ol-md-4">
											<!--begin::Card-->
											<div class="card h-md-100">
												<!--begin::Card body-->
												<div class="card-body d-flex flex-center">
													<!--begin::Button-->
													<button type="button" class="btn btn-clear d-flex flex-column flex-center" data-bs-toggle="modal" data-bs-target="#kt_modal_add_role">
														<!--begin::Illustration-->
														<img src="<?=base_url(); ?>assets/media/illustrations/sketchy-1/4.png" alt="" class="mw-100 mh-150px mb-7" />
														<!--end::Illustration-->
														<!--begin::Label-->
														<div class="fw-bold fs-3 text-gray-600 text-hover-primary">Add New Role</div>
														<!--end::Label-->
													</button>
													<!--begin::Button-->
												</div>
												<!--begin::Card body-->
											</div>
											<!--begin::Card-->
										</div>
										<!--begin::Add new card-->
									</div>
									<!--end::Row-->
									<!--begin::Modals-->
									<!--begin::Modal - Add role-->
									<div class="modal fade" id="kt_modal_add_role" tabindex="-1" aria-hidden="true">
										<!--begin::Modal dialog-->
										<div class="modal-dialog modal-dialog-centered mw-750px">
											<!--begin::Modal content-->
											<div class="modal-content">
												<!--begin::Modal header-->
												<div class="modal-header">
													<!--begin::Modal title-->
													<h2 class="fw-bold">Add a Role</h2>
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
												<div class="modal-body scroll-y mx-lg-5 my-7">
													<!--begin::Form-->
													<form id="kt_modal_add_role_form" class="form" action="#">
														<!--begin::Scroll-->
														<div class="d-flex flex-column scroll-y me-n7 pe-7" id="kt_modal_add_role_scroll" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_add_role_header" data-kt-scroll-wrappers="#kt_modal_add_role_scroll" data-kt-scroll-offset="300px">
															<!--begin::Input group-->
															<div class="fv-row mb-10">
																<!--begin::Label-->
																<label class="fs-5 fw-bold form-label mb-2">
																	<span class="required">Role name</span>
																</label>
																<!--end::Label-->
																<!--begin::Input-->
																<input class="form-control form-control-solid" placeholder="Enter a role name" name="role_name" />
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
																				<i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="Allows a full access to the system"></i></td>
																				<td>
																					<!--begin::Checkbox-->
																					<label class="form-check form-check-custom form-check-solid me-9">
																						<input class="form-check-input" type="checkbox" value="" id="kt_roles_select_all" />
																						<span class="form-check-label" for="kt_roles_select_all">Select all</span>
																					</label>
																					<!--end::Checkbox-->
																				</td>
																			</tr>
																			<!--end::Table row-->
																			<!--begin::Table row-->
																			<tr>
																				<!--begin::Label-->
																				<td class="text-gray-800">User Management</td>
																				<!--end::Label-->
																				<!--begin::Options-->
																				<td>
																					<!--begin::Wrapper-->
																					<div class="d-flex">
																						<!--begin::Checkbox-->
																						<label class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
																							<input class="form-check-input" type="checkbox" value="" name="user_management_read" />
																							<span class="form-check-label">Read</span>
																						</label>
																						<!--end::Checkbox-->
																						<!--begin::Checkbox-->
																						<label class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
																							<input class="form-check-input" type="checkbox" value="" name="user_management_write" />
																							<span class="form-check-label">Write</span>
																						</label>
																						<!--end::Checkbox-->
																						<!--begin::Checkbox-->
																						<label class="form-check form-check-sm form-check-custom form-check-solid">
																							<input class="form-check-input" type="checkbox" value="" name="user_management_create" />
																							<span class="form-check-label">Create</span>
																						</label>
																						<!--end::Checkbox-->
																					</div>
																					<!--end::Wrapper-->
																				</td>
																				<!--end::Options-->
																			</tr>
																			<!--end::Table row-->
																			<!--begin::Table row-->
																			<tr>
																				<!--begin::Label-->
																				<td class="text-gray-800">Content Management</td>
																				<!--end::Label-->
																				<!--begin::Options-->
																				<td>
																					<!--begin::Wrapper-->
																					<div class="d-flex">
																						<!--begin::Checkbox-->
																						<label class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
																							<input class="form-check-input" type="checkbox" value="" name="content_management_read" />
																							<span class="form-check-label">Read</span>
																						</label>
																						<!--end::Checkbox-->
																						<!--begin::Checkbox-->
																						<label class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
																							<input class="form-check-input" type="checkbox" value="" name="content_management_write" />
																							<span class="form-check-label">Write</span>
																						</label>
																						<!--end::Checkbox-->
																						<!--begin::Checkbox-->
																						<label class="form-check form-check-sm form-check-custom form-check-solid">
																							<input class="form-check-input" type="checkbox" value="" name="content_management_create" />
																							<span class="form-check-label">Create</span>
																						</label>
																						<!--end::Checkbox-->
																					</div>
																					<!--end::Wrapper-->
																				</td>
																				<!--end::Options-->
																			</tr>
																			<!--end::Table row-->
																			<!--begin::Table row-->
																			<tr>
																				<!--begin::Label-->
																				<td class="text-gray-800">Financial Management</td>
																				<!--end::Label-->
																				<!--begin::Options-->
																				<td>
																					<!--begin::Wrapper-->
																					<div class="d-flex">
																						<!--begin::Checkbox-->
																						<label class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
																							<input class="form-check-input" type="checkbox" value="" name="financial_management_read" />
																							<span class="form-check-label">Read</span>
																						</label>
																						<!--end::Checkbox-->
																						<!--begin::Checkbox-->
																						<label class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
																							<input class="form-check-input" type="checkbox" value="" name="financial_management_write" />
																							<span class="form-check-label">Write</span>
																						</label>
																						<!--end::Checkbox-->
																						<!--begin::Checkbox-->
																						<label class="form-check form-check-sm form-check-custom form-check-solid">
																							<input class="form-check-input" type="checkbox" value="" name="financial_management_create" />
																							<span class="form-check-label">Create</span>
																						</label>
																						<!--end::Checkbox-->
																					</div>
																					<!--end::Wrapper-->
																				</td>
																				<!--end::Options-->
																			</tr>
																			<!--end::Table row-->
																			<!--begin::Table row-->
																			<tr>
																				<!--begin::Label-->
																				<td class="text-gray-800">Reporting</td>
																				<!--end::Label-->
																				<!--begin::Options-->
																				<td>
																					<!--begin::Wrapper-->
																					<div class="d-flex">
																						<!--begin::Checkbox-->
																						<label class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
																							<input class="form-check-input" type="checkbox" value="" name="reporting_read" />
																							<span class="form-check-label">Read</span>
																						</label>
																						<!--end::Checkbox-->
																						<!--begin::Checkbox-->
																						<label class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
																							<input class="form-check-input" type="checkbox" value="" name="reporting_write" />
																							<span class="form-check-label">Write</span>
																						</label>
																						<!--end::Checkbox-->
																						<!--begin::Checkbox-->
																						<label class="form-check form-check-sm form-check-custom form-check-solid">
																							<input class="form-check-input" type="checkbox" value="" name="reporting_create" />
																							<span class="form-check-label">Create</span>
																						</label>
																						<!--end::Checkbox-->
																					</div>
																					<!--end::Wrapper-->
																				</td>
																				<!--end::Options-->
																			</tr>
																			<!--end::Table row-->
																			<!--begin::Table row-->
																			<tr>
																				<!--begin::Label-->
																				<td class="text-gray-800">Payroll</td>
																				<!--end::Label-->
																				<!--begin::Options-->
																				<td>
																					<!--begin::Wrapper-->
																					<div class="d-flex">
																						<!--begin::Checkbox-->
																						<label class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
																							<input class="form-check-input" type="checkbox" value="" name="payroll_read" />
																							<span class="form-check-label">Read</span>
																						</label>
																						<!--end::Checkbox-->
																						<!--begin::Checkbox-->
																						<label class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
																							<input class="form-check-input" type="checkbox" value="" name="payroll_write" />
																							<span class="form-check-label">Write</span>
																						</label>
																						<!--end::Checkbox-->
																						<!--begin::Checkbox-->
																						<label class="form-check form-check-sm form-check-custom form-check-solid">
																							<input class="form-check-input" type="checkbox" value="" name="payroll_create" />
																							<span class="form-check-label">Create</span>
																						</label>
																						<!--end::Checkbox-->
																					</div>
																					<!--end::Wrapper-->
																				</td>
																				<!--end::Options-->
																			</tr>
																			<!--end::Table row-->
																			<!--begin::Table row-->
																			<tr>
																				<!--begin::Label-->
																				<td class="text-gray-800">Disputes Management</td>
																				<!--end::Label-->
																				<!--begin::Options-->
																				<td>
																					<!--begin::Wrapper-->
																					<div class="d-flex">
																						<!--begin::Checkbox-->
																						<label class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
																							<input class="form-check-input" type="checkbox" value="" name="disputes_management_read" />
																							<span class="form-check-label">Read</span>
																						</label>
																						<!--end::Checkbox-->
																						<!--begin::Checkbox-->
																						<label class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
																							<input class="form-check-input" type="checkbox" value="" name="disputes_management_write" />
																							<span class="form-check-label">Write</span>
																						</label>
																						<!--end::Checkbox-->
																						<!--begin::Checkbox-->
																						<label class="form-check form-check-sm form-check-custom form-check-solid">
																							<input class="form-check-input" type="checkbox" value="" name="disputes_management_create" />
																							<span class="form-check-label">Create</span>
																						</label>
																						<!--end::Checkbox-->
																					</div>
																					<!--end::Wrapper-->
																				</td>
																				<!--end::Options-->
																			</tr>
																			<!--end::Table row-->
																			<!--begin::Table row-->
																			<tr>
																				<!--begin::Label-->
																				<td class="text-gray-800">API Controls</td>
																				<!--end::Label-->
																				<!--begin::Options-->
																				<td>
																					<!--begin::Wrapper-->
																					<div class="d-flex">
																						<!--begin::Checkbox-->
																						<label class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
																							<input class="form-check-input" type="checkbox" value="" name="api_controls_read" />
																							<span class="form-check-label">Read</span>
																						</label>
																						<!--end::Checkbox-->
																						<!--begin::Checkbox-->
																						<label class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
																							<input class="form-check-input" type="checkbox" value="" name="api_controls_write" />
																							<span class="form-check-label">Write</span>
																						</label>
																						<!--end::Checkbox-->
																						<!--begin::Checkbox-->
																						<label class="form-check form-check-sm form-check-custom form-check-solid">
																							<input class="form-check-input" type="checkbox" value="" name="api_controls_create" />
																							<span class="form-check-label">Create</span>
																						</label>
																						<!--end::Checkbox-->
																					</div>
																					<!--end::Wrapper-->
																				</td>
																				<!--end::Options-->
																			</tr>
																			<!--end::Table row-->
																			<!--begin::Table row-->
																			<tr>
																				<!--begin::Label-->
																				<td class="text-gray-800">Database Management</td>
																				<!--end::Label-->
																				<!--begin::Options-->
																				<td>
																					<!--begin::Wrapper-->
																					<div class="d-flex">
																						<!--begin::Checkbox-->
																						<label class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
																							<input class="form-check-input" type="checkbox" value="" name="database_management_read" />
																							<span class="form-check-label">Read</span>
																						</label>
																						<!--end::Checkbox-->
																						<!--begin::Checkbox-->
																						<label class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
																							<input class="form-check-input" type="checkbox" value="" name="database_management_write" />
																							<span class="form-check-label">Write</span>
																						</label>
																						<!--end::Checkbox-->
																						<!--begin::Checkbox-->
																						<label class="form-check form-check-sm form-check-custom form-check-solid">
																							<input class="form-check-input" type="checkbox" value="" name="database_management_create" />
																							<span class="form-check-label">Create</span>
																						</label>
																						<!--end::Checkbox-->
																					</div>
																					<!--end::Wrapper-->
																				</td>
																				<!--end::Options-->
																			</tr>
																			<!--end::Table row-->
																			<!--begin::Table row-->
																			<tr>
																				<!--begin::Label-->
																				<td class="text-gray-800">Repository Management</td>
																				<!--end::Label-->
																				<!--begin::Options-->
																				<td>
																					<!--begin::Wrapper-->
																					<div class="d-flex">
																						<!--begin::Checkbox-->
																						<label class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
																							<input class="form-check-input" type="checkbox" value="" name="repository_management_read" />
																							<span class="form-check-label">Read</span>
																						</label>
																						<!--end::Checkbox-->
																						<!--begin::Checkbox-->
																						<label class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
																							<input class="form-check-input" type="checkbox" value="" name="repository_management_write" />
																							<span class="form-check-label">Write</span>
																						</label>
																						<!--end::Checkbox-->
																						<!--begin::Checkbox-->
																						<label class="form-check form-check-sm form-check-custom form-check-solid">
																							<input class="form-check-input" type="checkbox" value="" name="repository_management_create" />
																							<span class="form-check-label">Create</span>
																						</label>
																						<!--end::Checkbox-->
																					</div>
																					<!--end::Wrapper-->
																				</td>
																				<!--end::Options-->
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
									<!--end::Modal - Add role-->
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
																<input class="form-control form-control-solid" placeholder="Enter a role name" name="role_name" value="Developer" />
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
																				<i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="Allows a full access to the system"></i></td>
																				<td>
																					<!--begin::Checkbox-->
																					<label class="form-check form-check-sm form-check-custom form-check-solid me-9">
																						<input class="form-check-input" type="checkbox" value="" id="kt_roles_select_all" />
																						<span class="form-check-label" for="kt_roles_select_all">Select all</span>
																					</label>
																					<!--end::Checkbox-->
																				</td>
																			</tr>
																			<!--end::Table row-->
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
																							<input class="form-check-input" type="checkbox" value="" name="user_management_read" />
																							<span class="form-check-label">Read</span>
																						</label>
																						<!--end::Checkbox-->
																						<!--begin::Checkbox-->
																						<label class="form-check form-check-custom form-check-solid me-5 me-lg-20">
																							<input class="form-check-input" type="checkbox" value="" name="user_management_write" />
																							<span class="form-check-label">Write</span>
																						</label>
																						<!--end::Checkbox-->
																						<!--begin::Checkbox-->
																						<label class="form-check form-check-custom form-check-solid">
																							<input class="form-check-input" type="checkbox" value="" name="user_management_create" />
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
																				<td class="text-gray-800">Content Management</td>
																				<!--end::Label-->
																				<!--begin::Input group-->
																				<td>
																					<!--begin::Wrapper-->
																					<div class="d-flex">
																						<!--begin::Checkbox-->
																						<label class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
																							<input class="form-check-input" type="checkbox" value="" name="content_management_read" />
																							<span class="form-check-label">Read</span>
																						</label>
																						<!--end::Checkbox-->
																						<!--begin::Checkbox-->
																						<label class="form-check form-check-custom form-check-solid me-5 me-lg-20">
																							<input class="form-check-input" type="checkbox" value="" name="content_management_write" />
																							<span class="form-check-label">Write</span>
																						</label>
																						<!--end::Checkbox-->
																						<!--begin::Checkbox-->
																						<label class="form-check form-check-custom form-check-solid">
																							<input class="form-check-input" type="checkbox" value="" name="content_management_create" />
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
																				<td class="text-gray-800">Financial Management</td>
																				<!--end::Label-->
																				<!--begin::Input group-->
																				<td>
																					<!--begin::Wrapper-->
																					<div class="d-flex">
																						<!--begin::Checkbox-->
																						<label class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
																							<input class="form-check-input" type="checkbox" value="" name="financial_management_read" />
																							<span class="form-check-label">Read</span>
																						</label>
																						<!--end::Checkbox-->
																						<!--begin::Checkbox-->
																						<label class="form-check form-check-custom form-check-solid me-5 me-lg-20">
																							<input class="form-check-input" type="checkbox" value="" name="financial_management_write" />
																							<span class="form-check-label">Write</span>
																						</label>
																						<!--end::Checkbox-->
																						<!--begin::Checkbox-->
																						<label class="form-check form-check-custom form-check-solid">
																							<input class="form-check-input" type="checkbox" value="" name="financial_management_create" />
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
																				<td class="text-gray-800">Reporting</td>
																				<!--end::Label-->
																				<!--begin::Input group-->
																				<td>
																					<!--begin::Wrapper-->
																					<div class="d-flex">
																						<!--begin::Checkbox-->
																						<label class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
																							<input class="form-check-input" type="checkbox" value="" name="reporting_read" />
																							<span class="form-check-label">Read</span>
																						</label>
																						<!--end::Checkbox-->
																						<!--begin::Checkbox-->
																						<label class="form-check form-check-custom form-check-solid me-5 me-lg-20">
																							<input class="form-check-input" type="checkbox" value="" name="reporting_write" />
																							<span class="form-check-label">Write</span>
																						</label>
																						<!--end::Checkbox-->
																						<!--begin::Checkbox-->
																						<label class="form-check form-check-custom form-check-solid">
																							<input class="form-check-input" type="checkbox" value="" name="reporting_create" />
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
																				<td class="text-gray-800">Payroll</td>
																				<!--end::Label-->
																				<!--begin::Input group-->
																				<td>
																					<!--begin::Wrapper-->
																					<div class="d-flex">
																						<!--begin::Checkbox-->
																						<label class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
																							<input class="form-check-input" type="checkbox" value="" name="payroll_read" />
																							<span class="form-check-label">Read</span>
																						</label>
																						<!--end::Checkbox-->
																						<!--begin::Checkbox-->
																						<label class="form-check form-check-custom form-check-solid me-5 me-lg-20">
																							<input class="form-check-input" type="checkbox" value="" name="payroll_write" />
																							<span class="form-check-label">Write</span>
																						</label>
																						<!--end::Checkbox-->
																						<!--begin::Checkbox-->
																						<label class="form-check form-check-custom form-check-solid">
																							<input class="form-check-input" type="checkbox" value="" name="payroll_create" />
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
																				<td class="text-gray-800">Disputes Management</td>
																				<!--end::Label-->
																				<!--begin::Input group-->
																				<td>
																					<!--begin::Wrapper-->
																					<div class="d-flex">
																						<!--begin::Checkbox-->
																						<label class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
																							<input class="form-check-input" type="checkbox" value="" name="disputes_management_read" />
																							<span class="form-check-label">Read</span>
																						</label>
																						<!--end::Checkbox-->
																						<!--begin::Checkbox-->
																						<label class="form-check form-check-custom form-check-solid me-5 me-lg-20">
																							<input class="form-check-input" type="checkbox" value="" name="disputes_management_write" />
																							<span class="form-check-label">Write</span>
																						</label>
																						<!--end::Checkbox-->
																						<!--begin::Checkbox-->
																						<label class="form-check form-check-custom form-check-solid">
																							<input class="form-check-input" type="checkbox" value="" name="disputes_management_create" />
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
																				<td class="text-gray-800">API Controls</td>
																				<!--end::Label-->
																				<!--begin::Input group-->
																				<td>
																					<!--begin::Wrapper-->
																					<div class="d-flex">
																						<!--begin::Checkbox-->
																						<label class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
																							<input class="form-check-input" type="checkbox" value="" name="api_controls_read" />
																							<span class="form-check-label">Read</span>
																						</label>
																						<!--end::Checkbox-->
																						<!--begin::Checkbox-->
																						<label class="form-check form-check-custom form-check-solid me-5 me-lg-20">
																							<input class="form-check-input" type="checkbox" value="" name="api_controls_write" />
																							<span class="form-check-label">Write</span>
																						</label>
																						<!--end::Checkbox-->
																						<!--begin::Checkbox-->
																						<label class="form-check form-check-custom form-check-solid">
																							<input class="form-check-input" type="checkbox" value="" name="api_controls_create" />
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
																							<input class="form-check-input" type="checkbox" value="" name="database_management_read" />
																							<span class="form-check-label">Read</span>
																						</label>
																						<!--end::Checkbox-->
																						<!--begin::Checkbox-->
																						<label class="form-check form-check-custom form-check-solid me-5 me-lg-20">
																							<input class="form-check-input" type="checkbox" value="" name="database_management_write" />
																							<span class="form-check-label">Write</span>
																						</label>
																						<!--end::Checkbox-->
																						<!--begin::Checkbox-->
																						<label class="form-check form-check-custom form-check-solid">
																							<input class="form-check-input" type="checkbox" value="" name="database_management_create" />
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
																				<td class="text-gray-800">Repository Management</td>
																				<!--end::Label-->
																				<!--begin::Input group-->
																				<td>
																					<!--begin::Wrapper-->
																					<div class="d-flex">
																						<!--begin::Checkbox-->
																						<label class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
																							<input class="form-check-input" type="checkbox" value="" name="repository_management_read" />
																							<span class="form-check-label">Read</span>
																						</label>
																						<!--end::Checkbox-->
																						<!--begin::Checkbox-->
																						<label class="form-check form-check-custom form-check-solid me-5 me-lg-20">
																							<input class="form-check-input" type="checkbox" value="" name="repository_management_write" />
																							<span class="form-check-label">Write</span>
																						</label>
																						<!--end::Checkbox-->
																						<!--begin::Checkbox-->
																						<label class="form-check form-check-custom form-check-solid">
																							<input class="form-check-input" type="checkbox" value="" name="repository_management_create" />
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
									<!--end::Modals-->
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
		<script src="<?=base_url(); ?>assets/plugins/custom/formrepeater/formrepeater.bundle.js"></script>
		<!--end::Vendors Javascript-->
		<!--begin::Custom Javascript(used for this page only)-->
		<script src="<?=base_url(); ?>assets/js/custom/apps/user-management/roles/list/add.js"></script>
		<script src="<?=base_url(); ?>assets/js/custom/apps/user-management/roles/list/update-role.js"></script>
		<script src="<?=base_url(); ?>assets/js/widgets.bundle.js"></script>
		<script src="<?=base_url(); ?>assets/js/custom/widgets.js"></script>
		<script src="<?=base_url(); ?>assets/js/custom/apps/chat/chat.js"></script>
		<script src="<?=base_url(); ?>assets/js/custom/utilities/modals/upgrade-plan.js"></script>
		<script src="<?=base_url(); ?>assets/js/custom/utilities/modals/create-app.js"></script>
		<script src="<?=base_url(); ?>assets/js/custom/utilities/modals/users-search.js"></script>
		<!--end::Custom Javascript-->
    <!--end::Javascript-->
</body>
<!--end::Body-->

</html>