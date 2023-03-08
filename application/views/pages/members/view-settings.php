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
									<h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">Settings</h1>
									<!--end::Title-->
									<!--begin::Breadcrumb-->
									<ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
										<!--begin::Item-->
										<li class="breadcrumb-item text-muted">
											<a href="<?= site_url('members') ?>" class="text-muted text-hover-primary">Members</a>
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
										<li class="breadcrumb-item text-muted">Settings</li>
										<!--end::Item-->
									</ul>
									<!--end::Breadcrumb-->
								</div>
								<!--end::Page title-->
								<!--begin::Actions-->
						<div class="d-flex align-items-center gap-2 gap-lg-3">
							<!--begin::Primary button-->
							<a href="../catalogs/add" class="btn btn-sm fw-bold btn-warning"><i class="fa fa-bullhorn" style="color:#fff;font-size:18px;"></i> Post Advert</a>
							<a href="https://web.facebook.com/soyavaluechainghana" class="btn btn-sm fw-bold btn-primary" target="_blank"><i class="fa fa-facebook" style="color:#fff;font-size:18px;"></i>Create Facebook Post</a>
							<a href="https://www.youtube.com/channel/UCxz_wWq4dWR0OLKuzjrKfvA" target="_blank" class="btn btn-sm fw-bold btn-danger"><i class="fa fa-youtube-play" style="color:#fff;font-size:18px;"></i>YouTube Videos</a>

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
								<?php $this->load->view('pages/members/navbar', ['page' => 'settings']); ?>
								<!--end::Navbar-->
								<?php if ($member->id === $this->auth->getMembership()->id || $this->auth->getRole()->title === 'Administrator') { ?>
									<!--begin::Basic info-->
									<div class="card mb-5 mb-xl-10">
										<!--begin::Card header-->
										<div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse" data-bs-target="#kt_account_profile_details" aria-expanded="true" aria-controls="kt_account_profile_details">
											<!--begin::Card title-->
											<div class="card-title m-0">
												<h3 class="fw-bold m-0">Profile Details</h3>
											</div>
											<!--end::Card title-->
										</div>
										<!--begin::Card header-->
										<!--begin::Content-->
										<div id="kt_account_settings_profile_details" class="collapse show">
											<!--begin::Form-->
											<form id="kt_account_profile_details_form" class="form" action="<?= site_url(($this->auth->getRole()->title==='Member'?"membership/edit/" . $member->id:"membership/edit/" . $member->id)) ?>">
												<input type="hidden" name="id" value="<?=$member->id; ?>">
											<!--begin::Card body-->
												<div class="card-body border-top p-9">
													<!--begin::Input group-->
													<div class="row mb-6">
														<!--begin::Label-->
														<label class="col-lg-4 col-form-label fw-semibold fs-6">Passport Photo</label>
														<!--end::Label-->
														<!--begin::Col-->
														<div class="col-lg-8">
															<!--begin::Image input-->
															<div class="image-input image-input-outline" data-kt-image-input="true" style="background-image: url('<?= base_url(); ?>assets/media/svg/files/blank-image.svg')">
																<!--begin::Preview existing avatar-->
																<div class="image-input-wrapper w-125px h-125px" style="background-image: url('<?= $member->thumb_photo_url ? $member->thumb_photo_url : base_url() . 'assets/media/svg/files/blank-image.svg' ?>')"></div>
																<!--end::Preview existing avatar-->
																<!--begin::Label-->
																<label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Change Passport">
																	<i class="bi bi-pencil-fill fs-7"></i>
																	<!--begin::Inputs-->
																	<input type="file" name="avatar" accept=".png, .jpg, .jpeg" />
																	<input type="hidden" name="avatar_remove" />
																	<!--end::Inputs-->
																</label>
																<!--end::Label-->
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
															<!--begin::Hint-->
															<div class="form-text">Allowed file types: png, jpg, jpeg.</div>
															<!--end::Hint-->
														</div>
														<!--end::Col-->
													</div>
													<!--end::Input group-->
													<!--begin::Input group-->
													<div class="row mb-6">
														<!--begin::Label-->
														<label class="col-lg-4 col-form-label required fw-semibold fs-6">Full Name</label>
														<!--end::Label-->
														<!--begin::Col-->
														<div class="col-lg-8">
															<input type="text" name="name" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" placeholder="Full name" value="<?= $member->name; ?>" />
														</div>
														<!--end::Col-->
													</div>
													<!--end::Input group-->
													<!--begin::Input group-->
													<div class="row mb-6">
														<!--begin::Label-->
														<label class="col-lg-4 col-form-label fw-semibold fs-6">
															<span class="required">Sex</span>
															<i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="Select your sex"></i>
														</label>
														<!--end::Label-->
														<!--begin::Col-->
														<div class="col-lg-8 fv-row">
															<select name="sex" class="form-select form-select-solid" data-control="select2" data-hide-search="true" data-placeholder="Sex">
																<option></option>
																<option <?= $member->sex === 'Male' ? 'selected' : '' ?>>Male</option>
																<option <?= $member->sex === 'Female' ? 'selected' : '' ?>>Female</option>
															</select>
														</div>
														<!--end::Col-->
													</div>
													<!--end::Input group-->
													<!--begin::Input group-->
													<div class="row mb-6">
														<!--begin::Label-->
														<label class="col-lg-4 col-form-label required fw-semibold fs-6">Biography</label>
														<!--end::Label-->
														<!--begin::Col-->
														<div class="col-lg-8 fv-row">
															<!--begin::Input-->
															<textarea rows="2" class="form-control form-control-lg form-control-solid" name="bio" placeholder="Briefly describe yourself here..."><?= $member->bio ?></textarea>
															<!--end::Input-->
														</div>
														<!--end::Col-->
													</div>
													<!--end::Input group-->

													<!--begin::Input group-->
													<div class="row mb-6">
														<!--begin::Label-->
														<label class="col-lg-4 col-form-label fw-semibold fs-6">
															<span class="required">Group(s)</span>
															<i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="Choose all groups you belong to"></i>
														</label>
														<!--end::Label-->
														<!--begin::Col-->
														<div class="col-lg-8 fv-row">
															<select name="group_ids[]" class="form-select form-select-solid" data-control="select2" data-hide-search="true" data-placeholder="Groups" multiple>
																<option></option>
																<?php
																$groups = [];
																foreach ($member->groups as $group) {
																	array_push($groups, $group->id);
																}
																foreach ($this->group->getAll() as $row) { ?>
																	<option value="<?= $row->id ?>" <?= in_array($row->id, $groups) ? 'selected' : '' ?>><?= "$row->name ($row->code)"; ?></option>
																<?php  } ?>
															</select>
														</div>
														<!--end::Col-->
													</div>
													<!--end::Input group-->

													<!--begin::Input group-->
													<div class="row mb-0">
														<!--begin::Label-->
														<label class="col-lg-4 col-form-label fw-semibold fs-6">Allow Marketing</label>
														<!--begin::Label-->
														<!--begin::Label-->
														<div class="col-lg-8 d-flex align-items-center">
															<div class="form-check form-check-solid form-switch form-check-custom fv-row">
																<input class="form-check-input w-45px h-30px" type="checkbox" id="allowmarketing" checked="checked" />
																<label class="form-check-label" for="allowmarketing"></label>
															</div>
														</div>
														<!--begin::Label-->
													</div>
													<!--end::Input group-->
												</div>
												<!--end::Card body-->
												<!--begin::Actions-->
												<div class="card-footer d-flex justify-content-end py-6 px-9">
													<button type="reset" class="btn btn-light btn-active-light-primary me-2">Discard</button>
													<button type="submit" class="btn btn-primary" id="kt_account_profile_details_submit">Save Changes</button>
												</div>
												<!--end::Actions-->
											</form>
											<!--end::Form-->
										</div>
										<!--end::Content-->
									</div>
									<!--end::Basic info-->
									<?php if($member->type === 'corporate'){ ?>
										<!--begin::Basic info-->
									<div class="card mb-5 mb-xl-10">
										<!--begin::Card header-->
										<div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse" data-bs-target="#kt_account_profile_details" aria-expanded="true" aria-controls="kt_account_profile_details">
											<!--begin::Card title-->
											<div class="card-title m-0">
												<h3 class="fw-bold m-0">Business Details</h3>
											</div>
											<!--end::Card title-->
										</div>
										<!--begin::Card header-->
										<!--begin::Content-->
										<div id="kt_account_settings_business_details" class="collapse show">
											<!--begin::Form-->
											<form id="kt_account_business_details_form" class="form" action="<?= site_url(($this->auth->getRole()->title==='Member'?"membership/edit/" . $member->id:"membership/edit/" . $member->id)) ?>">
												<input type="hidden" name="id" value="<?=$member->id; ?>">
											<!--begin::Card body-->
												<div class="card-body border-top p-9">
													<!--begin::Input group-->
													<div class="row mb-6">
														<!--begin::Label-->
														<label class="col-lg-4 col-form-label required fw-semibold fs-6">Business Name</label>
														<!--end::Label-->
														<!--begin::Col-->
														<div class="col-lg-8">
															<input type="text" name="company" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" placeholder="Company or business name" value="<?= $member->company; ?>" />
														</div>
														<!--end::Col-->
													</div>
													<!--end::Input group-->
													<!--begin::Input group-->
													<div class="row mb-6">
														<!--begin::Label-->
														<label class="col-lg-4 col-form-label fw-semibold fs-6">
															<span class="required">Company Size</span>
															<i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="Select your company size"></i>
														</label>
														<!--end::Label-->
														<!--begin::Col-->
														<div class="col-lg-8 fv-row">
															<select name="company_size" class="form-select form-select-solid" data-control="select2" data-hide-search="true" data-placeholder="Company Size">
											<option <?=$member->company_size ==='1-1'?'selected':'' ?>>1-1</option>
												<option <?=$member->company_size ==='2-10'?'selected':'' ?>>2-10</option>
													<option <?=$member->company_size ==='10-50'?'selected':'' ?>>10-50</option>
														<option <?=$member->company_size ==='50+'?'selected':'' ?>>50+</option>
											
															
															</select>
														</div>
														<!--end::Col-->
													</div>
													<!--end::Input group-->
													<!--begin::Input group-->
													<div class="row mb-6">
														<!--begin::Label-->
														<label class="col-lg-4 col-form-label required fw-semibold fs-6">Business Descriptor</label>
														<!--end::Label-->
														<!--begin::Col-->
														<div class="col-lg-8 fv-row">
															<!--begin::Input-->
															<textarea rows="2" class="form-control form-control-lg form-control-solid" name="business_descriptor" placeholder="Briefly describe your business"><?= $member->business_descriptor ?></textarea>
															<!--end::Input-->
														</div>
														<!--end::Col-->
													</div>
													<!--end::Input group-->

													<!--begin::Input group-->
													<div class="row mb-6">
														<!--begin::Label-->
														<label class="col-lg-4 col-form-label fw-semibold fs-6">
															<span class="required">Business Type</span>
															<i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="Choose your legal business type"></i>
														</label>
														<!--end::Label-->
														<!--begin::Col-->
														<div class="col-lg-8 fv-row">
															<select name="business_type" class="form-select form-select-solid" data-control="select2" data-hide-search="true" data-placeholder="Business type">
											<option></option>
                                                                <option <?=$member->business_type ==='Sole Proprietorship'?'selected':'' ?>>Sole Proprietorship</option>
                                                                <option <?=$member->business_type ==='Non-profit'?'selected':'' ?>>Non-profit</option>
                                                                <option <?=$member->business_type ==='Limited Liability (Ltd)'?'selected':'' ?>>Limited Liability (Ltd)</option>
                                                                <option <?=$member->business_type ==='Public Limited Company (PLC)'?'selected':'' ?>>Public Limited Company (PLC)</option>
                                                                <option <?=$member->business_type ==='Partnership'?'selected':'' ?>>Partnership</option>
												
												</select>
														</div>
														<!--end::Col-->
													</div>
													<!--end::Input group-->
													<!--begin::Input group-->
													<div class="row mb-6">
														<!--begin::Label-->
														<label class="col-lg-4 col-form-label required fw-semibold fs-6">Business Email</label>
														<!--end::Label-->
														<!--begin::Col-->
														<div class="col-lg-8">
															<input type="text" name="business_email" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" placeholder="mybusiness@example.com" value="<?= $member->business_email; ?>" />
														</div>
														<!--end::Col-->
													</div>
													<!--begin::Input group-->
													<div class="row mb-6">
														<!--begin::Label-->
														<label class="col-lg-4 col-form-label required fw-semibold fs-6">Business Contact</label>
														<!--end::Label-->
														<!--begin::Col-->
														<div class="col-lg-8">
															<input type="text" name="business_contact" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" placeholder="Business contacts" value="<?= $member->business_contact; ?>" />
														</div>
														<!--end::Col-->
													</div>
												</div>
												<!--end::Card body-->
												<!--begin::Actions-->
												<div class="card-footer d-flex justify-content-end py-6 px-9">
													<button type="reset" class="btn btn-light btn-active-light-primary me-2">Discard</button>
													<button type="submit" class="btn btn-primary" id="kt_account_business_details_submit">Save Changes</button>
												</div>
												<!--end::Actions-->
											</form>
											<!--end::Form-->
										</div>
										<!--end::Content-->
									</div>
									<!--end::Basic info-->
									<?php } ?>
									<!--begin::Notifications-->
									<div class="card mb-5 mb-xl-10">
										<!--begin::Card header-->
										<div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse" data-bs-target="#kt_account_email_preferences" aria-expanded="true" aria-controls="kt_account_email_preferences">
											<div class="card-title m-0">
												<h3 class="fw-bold m-0">Other Details</h3>
											</div>
										</div>
										<!--begin::Card header-->
										<!--begin::Content-->
										<div id="kt_account_settings_email_preferences" class="collapse show">
											<!--begin::Form-->
											<form id="kt_account_profile_details_others_form" class="form" action="<?= site_url(($this->auth->getRole()->title==='Member'?"membership/edit/".$member->id:"members/edit/" . $member->id)) ?>">
											<input type="hidden" name="id" value="<?=$member->id; ?>">
											<!--begin::Card body-->
												<div class="card-body border-top px-9 py-9">
													<!--begin::Input group-->
													<div class="row mb-10">
														<!--begin::Col-->
														<div class="col-md-12 fv-row">
															<!--begin::Label-->
															<label class="required fs-6 fw-semibold form-label mb-2">City/Town</label>
															<!--end::Label-->
															<!--begin::Row-->
															<div class="row fv-row">
																<!--begin::Col-->
																<div class="col-12">
																	<select id="locale-select2-ajax" name="locale_id" class="form-select form-select-solid" data-placeholder="Search a City/Town">
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
													<!--begin::Option-->
													<div class="separator separator-dashed my-6"></div>
													<!--end::Option-->
													<!--begin::Input group-->
													<div class="d-flex flex-column mb-7 fv-row">
														<!--begin::Label-->
														<label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
															<span class="required">Address</span>
															<i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Specify your current address"></i>
														</label>
														<!--end::Label-->
														<input type="text" class="form-control form-control-solid" placeholder="Your current address" name="address" value="<?= $member->address ?>" />
													</div>
													<!--end::Input group-->
													<!--begin::Option-->
													<div class="separator separator-dashed my-6"></div>
													<!--end::Option-->

													<?php
													$socials = json_decode($member->socials, false);
													?>
													<!--begin::Input group-->
													<div class="row mb-5">
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
															<input type="text" class="form-control form-control-solid" placeholder="mywebsite.com" name="social_website" value="<?= isset($socials->website) ? $socials->website : '' ?>" />
															<!--end::Input group-->
														</div>
														<!--end::Input group-->

													</div>
													<!--end::Input group-->
													<!--begin::Option-->
													<div class="separator separator-dashed my-6"></div>
													<!--end::Option-->
													<!--begin::Input group-->
													<div class="row mb-5">
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
															<input type="text" class="form-control form-control-solid" placeholder="Your facebook link" name="social_facebook" value="<?= isset($socials->facebook) ? $socials->facebook : '' ?>" />
															<!--end::Input group-->
														</div>
														<!--end::Input group-->

													</div>
													<!--end::Input group-->
													<!--begin::Option-->
													<div class="separator separator-dashed my-6"></div>
													<!--end::Option-->
													<!--begin::Input group-->
													<div class="row mb-5">
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
															<input type="text" class="form-control form-control-solid" placeholder="Your twitter link" name="social_twitter" value="<?= isset($socials->twitter) ? $socials->twitter : '' ?>" />
															<!--end::Input group-->
														</div>
														<!--end::Input group-->

													</div>
													<!--end::Input group-->
													<!--begin::Option-->
													<div class="separator separator-dashed my-6"></div>
													<!--end::Option-->
													<!--begin::Input group-->
													<div class="row mb-5">
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
															<input type="text" class="form-control form-control-solid" placeholder="Your linkedin link" name="social_linkedin" value="<?= isset($socials->linkedin) ? $socials->linkedin : '' ?>" />
															<!--end::Input group-->
														</div>
														<!--end::Input group-->

													</div>

												</div>
												<!--end::Card body-->
												<!--begin::Card footer-->
												<div class="card-footer d-flex justify-content-end py-6 px-9">
													<button class="btn btn-light btn-active-light-primary me-2">Discard</button>
													<button class="btn btn-primary px-6" id="kt_account_profile_details_others_submit">Save Changes</button>
												</div>
												<!--end::Card footer-->
											</form>
											<!--end::Form-->
										</div>
										<!--end::Content-->
									</div>
									<!--end::Notifications-->

								<?php } ?>
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
	<script src="<?= base_url() ?>assets/js/custom/account/settings/profile-details.js"></script>
	<script src="<?= base_url() ?>assets/js/custom/account/settings/profile-details-others.js"></script>
	<script src="<?= base_url() ?>assets/js/custom/account/settings/business-details.js"></script>
	<script src="<?= base_url() ?>assets/js/custom/pages/user-profile/general1.js"></script>
	<script src="<?= base_url() ?>assets/js/widgets.bundle.js"></script>
	<script src="<?= base_url() ?>assets/js/custom/widgets.js"></script>
	<script>
	    $(function(){
	         $("#locale-select2-ajax").select2({ 
                ajax: {
                    url: "<?=site_url('select2-json/locales') ?>",
                    dataType: 'json',
                    },
                    enableFiltering: true,
                    placeholder: 'Select your city/town',
            }); 
	    });
	</script>
	<!--end::Custom Javascript-->
	<!--end::Javascript-->
</body>
<!--end::Body-->

</html>