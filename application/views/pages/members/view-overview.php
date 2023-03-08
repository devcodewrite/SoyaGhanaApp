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
									<h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">Overview</h1>
									<!--end::Title-->
									<!--begin::Breadcrumb-->
									<ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
										<!--begin::Item-->
										<li class="breadcrumb-item text-muted">
											<a href="<?=site_url('members'); ?>" class="text-muted text-hover-primary">Members</a>
										</li>
										<!--end::Item-->
										<!--begin::Item-->
										<li class="breadcrumb-item">
											<span class="bullet bg-gray-400 w-5px h-2px"></span>
										</li>
										<!--end::Item-->
										<!--begin::Item-->
										<li class="breadcrumb-item text-muted">View</li>
										<!--end::Item-->
										<!--begin::Item-->
										<li class="breadcrumb-item">
											<span class="bullet bg-gray-400 w-5px h-2px"></span>
										</li>
										<!--end::Item-->
										<!--begin::Item-->
										<li class="breadcrumb-item text-muted">Overview</li>
										<!--end::Item-->
									</ul>
									<!--end::Breadcrumb-->
								</div>
								<!--end::Page title-->
								<!--begin::Actions-->
						<div class="d-flex align-items-center gap-2 gap-lg-3">
							<!--begin::Primary button-->
							<a href="../catalogs/add" class="btn btn-sm fw-bold btn-warning"><i class="fa fa-bullhorn" style="color:#fff;font-size:24px;"></i> Post Advert</a>
							<a href="https://web.facebook.com/soyavaluechainghana" class="btn btn-sm fw-bold btn-primary" target="_blank"><i class="fa fa-facebook" style="color:#fff;font-size:24px;"></i>Create Facebook Post</a>
							<a href="https://www.youtube.com/channel/UCxz_wWq4dWR0OLKuzjrKfvA" target="_blank" class="btn btn-sm fw-bold btn-danger"><i class="fa fa-youtube-play" style="color:#fff;font-size:24px;"></i> Watch YouTube Videos</a>

							<!--end::Primary button-->
						</div>
						<!--end::Actions-->
							</div>
							<!--end::Toolbar container-->
						</div>
						<!--end::Toolbar-->
						<!--begin::Content-->
						<div id="kt_app_content" class="app-content flex-column-fluid">
							<!--begin::Content container-->
							<div id="kt_app_content_container" class="app-container container-xxl">
								<!--begin::Navbar-->
								<?php $this->load->view('pages/members/navbar', ['page' => 'overview']); ?>
								<!--end::Navbar-->
								<!--begin::details View-->
								<div class="card mb-5 mb-xl-10" id="kt_profile_details_view">
									<!--begin::Card header-->
									<div class="card-header cursor-pointer">
										<!--begin::Card title-->
										<div class="card-title m-0">
											<h3 class="fw-bold m-0">Profile Details</h3>
										</div>
										<!--end::Card title-->
										<?php if ($member->id === $this->auth->getMembership()->id || $this->auth->getRole()->title === 'Administrator') { ?>
										<!--begin::Action-->
										<a href="?page=settings" class="btn btn-primary align-self-center">Edit Profile</a>
										<!--end::Action-->
										<?php } ?>
									</div>
									<!--begin::Card header-->
									<!--begin::Card body-->
									<div class="card-body p-9">
										<!--begin::Row-->
										<?php if ($member->id === $this->auth->getMembership()->id || $this->auth->getRole()->title === 'Administrator') { ?>
											<div class="row mb-7">
												<!--begin::Label-->
												<label class="col-lg-4 fw-semibold text-muted">Member ID</label>
												<!--end::Label-->
												<!--begin::Col-->
												<div class="col-lg-8">
													<span class="fw-bold fs-6 text-gray-800"><?= $member->memberId; ?></span>
												</div>
												<!--end::Col-->
											</div>
										<?php } ?>
										<!--end::Row-->
										<!--begin::Row-->
										<div class="row mb-7">
											<!--begin::Label-->
											<label class="col-lg-4 fw-semibold text-muted">Full Name</label>
											<!--end::Label-->
											<!--begin::Col-->
											<div class="col-lg-8">
												<span class="fw-bold fs-6 text-gray-800"><?= $member->name; ?></span>
											</div>
											<!--end::Col-->
										</div>
										<!--end::Row-->
										<!--begin::Input group-->
										<div class="row mb-7">
											<!--begin::Label-->
											<label class="col-lg-4 fw-semibold text-muted">Sex</label>
											<!--end::Label-->
											<!--begin::Col-->
											<div class="col-lg-8 fv-row">
												<span class="fw-semibold text-gray-800 fs-6"><?= $member->sex; ?></span>
											</div>
											<!--end::Col-->
										</div>
										<!--end::Input group-->
										<!--begin::Input group-->
										<div class="row mb-7">
											<!--begin::Label-->
											<label class="col-lg-4 fw-semibold text-muted">Contact Phone
												<i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="Phone number must be active"></i></label>
											<!--end::Label-->
											<!--begin::Col-->
											<div class="col-lg-8 d-flex align-items-center">
												<span class="fw-bold fs-6 text-gray-800 me-2"><?= $member->phone; ?></span>
												<span class="badge badge-success">Verified</span>
											</div>
											<!--end::Col-->
										</div>
										<!--end::Input group-->
										<!--begin::Input group-->
										<div class="row mb-7">
											<!--begin::Label-->
											<label class="col-lg-4 fw-semibold text-muted">Email</label>
											<!--end::Label-->
											<!--begin::Col-->
											<div class="col-lg-8 fv-row">
												<span class="fw-semibold text-gray-800 fs-6"><?= $member->email; ?></span>
											</div>
											<!--end::Col-->
										</div>
										<!--begin::Input group-->
										<div class="row mb-7">
											<!--begin::Label-->
											<label class="col-lg-4 fw-semibold text-muted">Biography</label>
											<!--end::Label-->
											<!--begin::Col-->
											<div class="col-lg-8 fv-row">
												<span class="fw-semibold text-gray-800 fs-6"><?= $member->bio; ?></span>
											</div>
											<!--end::Col-->
										</div>
										<!--begin::Input group-->

										<!--begin::Input group-->
										<div class="row mb-7">
											<!--begin::Label-->
											<label class="col-lg-4 fw-semibold text-muted">Current Address</label>
											<!--end::Label-->
											<!--begin::Col-->
											<div class="col-lg-8 fv-row">
												<span class="fw-semibold text-gray-800 fs-6"><?= $member->address; ?></span>
											</div>
											<!--end::Col-->
										</div>
										<!--begin::Input group-->

										<div class="row mb-7">
											<!--begin::Label-->
											<label class="col-lg-4 fw-semibold text-muted">Locations
												<i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="Location"></i></label>
											<!--end::Label-->
											<!--begin::Col-->
											<div class="col-lg-8">
												<span class="fw-bold fs-6 text-gray-800"><?= $member->locale?$member->locale->name:'' ?>,
													<?php
													$locale = $this->locale->getOne($member->locale_id);
													$district = $locale?$locale->district:null;
													echo $district ? trim($district->name)." ".trim($district->category): ''; ?></span>
													<span class="fw-bold fs-6 text-gray-800">	
													<?php	if($district){
													    $region = $this->region->getOne($district->region_id);
													    echo $region ? ", ".trim($region->name) : ''; 
													}
													?>
													</span>
											</div>
											<!--end::Col-->
										</div>
										<!--end::Input group-->
										<?php if($this->auth->getRole()->title==='Administrator'){ ?> 
										<div class="row mb-7">
											<!--begin::Label-->
											<label class="col-lg-4 fw-semibold text-muted">National ID
												<i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="National ID"></i></label>
											<!--end::Label-->
											<!--begin::Col-->
											<div class="col-lg-8">
												<span class="fw-bold fs-6 text-gray-800">
													<?= "<b>$member->id_card_type: </b> $member->national_id"; ?>
												</span>
											</div>
											<!--end::Col-->
										</div>
										<!--end::Input group-->
										<?php } ?>
										<!--begin::Input group-->
										<div class="row mb-10">
											<!--begin::Label-->
											<label class="col-lg-4 fw-semibold text-muted">Allow Changes</label>
											<!--begin::Label-->
											<!--begin::Label-->
											<div class="col-lg-8">
												<span class="fw-semibold fs-6 text-gray-800">Yes</span>
											</div>
											<!--begin::Label-->
										</div>
										<!--end::Input group-->
										<?php
											$socials = json_decode($member->socials, false);
										?>
										<!--begin::Input group-->
										<div class="row mb-7">
											<!--begin::Label-->
											<label class="col-lg-4 fw-semibold text-muted">Website</label>
											<!--end::Label-->
											<!--begin::Col-->
											<div class="col-lg-8 fv-row">
												<a href="<?= isset($socials->website)?$socials->website:''; ?>" class="fw-semibold text-gray-800 fs-6"><?= isset($socials->website)?$socials->website:''; ?></a>
											</div>
											<!--end::Col-->
										</div>
										<!--begin::Input group-->
										<div class="row mb-7">
											<!--begin::Label-->
											<label class="col-lg-4 fw-semibold text-muted">Facebook Link</label>
											<!--end::Label-->
											<!--begin::Col-->
											<div class="col-lg-8 fv-row">
												<a href="<?= isset($socials->facebook)?$socials->facebook:''; ?>" class="fw-semibold text-gray-800 fs-6"><?= isset($socials->facebook)?$socials->facebook:''; ?></a>
											</div>
											<!--end::Col-->
										</div>
										<!--begin::Input group-->

										<!--begin::Input group-->
										<div class="row mb-7">
											<!--begin::Label-->
											<label class="col-lg-4 fw-semibold text-muted">Twitter Link</label>
											<!--end::Label-->
											<!--begin::Col-->
											<div class="col-lg-8 fv-row">
												<a href="<?= isset($socials->twitter)?$socials->twitter:''; ?>" class="fw-semibold text-gray-800 fs-6"><?= isset($socials->twitter)?$socials->twitter:''; ?></a>
											</div>
											<!--end::Col-->
										</div>
										<!--begin::Input group-->

										<!--begin::Input group-->
										<div class="row mb-7">
											<!--begin::Label-->
											<label class="col-lg-4 fw-semibold text-muted">LinkedIn Link</label>
											<!--end::Label-->
											<!--begin::Col-->
											<div class="col-lg-8 fv-row">
												<a href="<?= isset($socials->linkedin)?$socials->linkedin:''; ?>" class="fw-semibold text-gray-800 fs-6"><?= isset($socials->linkedin)?$socials->linkedin:''; ?></a>
											</div>
											<!--end::Col-->
										</div>
										<!--begin::Input group-->
									</div>
									<!--end::Card body-->
								</div>
								<!--end::details View-->

								<!--begin::Row-->
								<div class="row gy-5 g-xl-10">
									<!--begin::Col-->
									<div class="<?=$this->auth->getRole()->title ==='Administrator' || $this->auth->getUserId() === $member->account->id?'col-xl-4':'col-xl-12'?>">
										<!--begin::List widget 5-->
										<div class="card card-flush h-xl-100">
											<!--begin::Header-->
											<div class="card-header pt-7">
												<!--begin::Title-->
												<h3 class="card-title align-items-start flex-column">
													<span class="card-label fw-bold text-dark">Groups</span>
												</h3>
												<!--end::Title-->
											</div>
											<!--end::Header-->
											<!--begin::Body-->
											<div class="card-body">
												<!--begin::Scroll-->
												<div class="hover-scroll-overlay-y pe-6 me-n6" style="height: 415px">
													<!--begin::Item-->
													<?php 
													
													foreach ($member->groups as $row) { ?>
														<div class="border border-dashed border-gray-300 rounded px-7 py-3 mb-6">
															<!--begin::Info-->
															<div class="d-flex flex-stack mb-3">
																<!--begin::Wrapper-->
																<div class="me-3">
																	<!--begin::Icon-->
																	<img src="<?= $row->avatar; ?>" class="w-50px ms-n1 me-1" alt="<?= $row->name; ?>" />
																	<!--end::Icon-->
																	<!--begin::Title-->
																	<?php if($this->auth->getRole()->title === 'Administrator'){ ?>
																	<a href="<?= base_url('database/edit-group/' . $row->id); ?>" class="text-gray-800 text-hover-primary fw-bold"><?= "$row->name ($row->code)"; ?></a>
																	<?php }else { ?>
																	<a href="<?= base_url('membership/members?group=' . $row->id); ?>" class="text-gray-800 text-hover-primary fw-bold"><?= "$row->name ($row->code)"; ?></a>
																	<?php } ?>
																	<!--end::Title-->
																</div>
																<!--end::Wrapper-->
															</div>
															<!--end::Info-->
															<!--begin::Customer-->
															<div class="d-flex flex-stack">
																<!--begin::Name-->
																<span class="text-gray-400 fw-bold"><?= $row->description; ?></span>
																<!--end::Name-->
															</div>
															<!--end::Customer-->
														</div>
													<?php } ?>
													<!--end::Item-->
												</div>
												<!--end::Scroll-->
											</div>
											<!--end::Body-->
										</div>
										<!--end::List widget 5-->
									</div>
									<!--end::Col-->
									<!--begin::Col-->
									<?php if($this->auth->getRole()->title ==='Administrator' || $this->auth->getUserId() === $member->account->id ){?> 
									<div class="col-xl-8">
										<!--begin::Table Widget 5-->
										<div class="card card-flush h-xl-100">
											<!--begin::Card header-->
											<div class="card-header pt-7">
												<!--begin::Title-->
												<h3 class="card-title align-items-start flex-column">
													<span class="card-label fw-bold text-dark">Refered Members</span>
													<span class="text-gray-400 mt-1 fw-semibold fs-6"><?= $this->member->getCount(['refererId' => $member->memberId]); ?> members</span>
												</h3>
												<!--end::Title-->
												<!--begin::Actions-->
												<div class="card-toolbar">
													<!--begin::Filters-->
													<div class="d-flex flex-stack flex-wrap gap-4">
														<!--begin::Destination-->
														<div class="d-flex align-items-center fw-bold">
															<!--begin::Label-->
															<div class="text-muted fs-7 me-2">Group</div>
															<!--end::Label-->
															<!--begin::Select-->
															<select class="form-select form-select-transparent text-dark fs-7 lh-1 fw-bold py-0 ps-3 w-auto" data-control="select2" data-hide-search="true" data-dropdown-css-class="w-150px" data-placeholder="Select an option">
																<option></option>
																<option value="Show All" selected="selected">Show All</option>
																<?php foreach ($member->groups as $row) { ?>
																	<option value="<?= $row->id; ?>"><?= $row->name; ?></option>
																<?php } ?>

															</select>
															<!--end::Select-->
														</div>
														<!--end::Destination-->
														<!--begin::Status-->
														<div class="d-flex align-items-center fw-bold">
															<!--begin::Label-->
															<div class="text-muted fs-7 me-2">Status</div>
															<!--end::Label-->
															<!--begin::Select-->
															<select class="form-select form-select-transparent text-dark fs-7 lh-1 fw-bold py-0 ps-3 w-auto" data-control="select2" data-hide-search="true" data-dropdown-css-class="w-150px" data-placeholder="Select an option" data-kt-table-widget-5="filter_status">
																<option></option>
																<option value="Show All" selected="selected">Show All</option>
																<option value="yes">Verified</option>
																<option value="no">Not Verified</option>
															</select>
															<!--end::Select-->
														</div>
														<!--end::Status-->
													</div>
													<!--begin::Filters-->
												</div>
												<!--end::Actions-->
											</div>
											<!--end::Card header-->
											<!--begin::Card body-->
											<div class="card-body" style="min-height: 300px !important;">
												<!--begin::Table-->
												<table class="table align-middle table-row-dashed fs-6 gy-3" id="kt_table_widget_5_table">
													<!--begin::Table head-->
													<thead>
														<!--begin::Table row-->
														<tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
															<th class="min-w-100px">Member</th>
															<th class="text-end pe-3 min-w-100px">Phone</th>
															<th class="text-end pe-3 min-w-150px">Date Added</th>
															<th class="text-end pe-3 min-w-100px">Group(s)</th>
															<th class="text-end pe-3 min-w-50px">Status</th>
															<th class="text-end pe-0 min-w-25px">Action</th>
														</tr>
														<!--end::Table row-->
													</thead>
													<!--end::Table head-->
													<!--begin::Table body-->
													<tbody class="fw-bold text-gray-600">
														<?php foreach ($rmembers as $row) {
															$groups = '';
															$status = [
																'yes' => 'Verified',
																'no' => 'Not Verified',
																'cancelled' => 'Cancelled'
															];
															$badge = [
																'yes' => 'badge-light-success',
																'no' => 'badge-light-warning',
																'cancelled' => 'badge-light-danger'
															];
															foreach ($row->groups as $i => $group) {
																$groups .= $group->name;

																if ($i < sizeof($row->groups) - 1)
																	$groups .= ",";
															}
														?>
															<tr>
																<!--begin::Item-->
																<td>
																	<a href="<?= base_url('members/view/' . $row->id); ?>" class="text-dark text-hover-primary"><?= $row->name; ?></a>
																</td>
																<!--end::Item-->
																<!--begin::Product ID-->
																<td class="text-end"><?= $row->phone; ?></td>
																<!--end::Product ID-->
																<!--begin::Date added-->
																<td class="text-end"><?= $row->created_at; ?></td>
																<!--end::Date added-->
																<!--begin::Price-->
																<td class="text-end"><?= $groups ?></td>
																<!--end::Price-->
																<!--begin::Status-->
																<td class="text-end">
																	<span class="badge py-3 px-4 fs-7 <?= $badge[$row->verified] ?>"><?= $status[$row->verified] ?></span>
																</td>
																<!--end::Status-->
																<!--begin::Qty-->
																<td class="text-end">
																	<a href="#" class="btn btn-sm btn-light btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions
																	</a>
																	<div class="menu menu-sub menu-sub-dropdown menu-colum menu-state-bg-light-primary fw-semibold fs-7 py-4" data-kt-menu="true">
																		<div class="menu-item px-3"><a href="<?=site_url('members/view/').$row->id ?>" class="menu-link px-3">View Details</a></div>
																		<?php if($row->verified === 'no'){ ?>
																			<div class="menu-item px-3"><span onclick="verifyMRequest(this,<?=$row->id ?>,<?=($this->auth->getRole()->title==='Member'?'\'membership\'':'\'members\''); ?>)" class="menu-link px-3">Verify</span></div>
																		<?php } else if($row->verified === 'yes'){ ?>
																			<div class="menu-item px-3"><span onclick="cancelMRequest(this,<?=$row->id ?>,<?=($this->auth->getRole()->title==='Member'?'\'membership\'':'\'members\''); ?>)" class="menu-link px-3">Cancelled</span></div>
																		<?php } ?>
																	</div>

																</td>
																<!--end::Qty-->
															</tr>
														<?php } ?>
													</tbody>
													<!--end::Table body-->
												</table>
												<!--end::Table-->
											</div>
											<!--end::Card body-->
										</div>
										<!--end::Table Widget 5-->
									</div>
									<?php } ?>
									<!--end::Col-->
								</div>
								<!--end::Row-->
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
	<script src="<?= base_url(); ?>assets/js/custom/pages/user-profile/general1.js"></script>
	<script src="<?= base_url(); ?>assets/js/widgets.bundle.js"></script>
	<script src="<?= base_url(); ?>assets/js/custom/widgets.js"></script>
	<!--end::Custom Javascript-->
	<!--end::Javascript-->
</body>
<!--end::Body-->

</html>