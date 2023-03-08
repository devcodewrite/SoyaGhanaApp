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
									<h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">Business Details</h1>
									<!--end::Title-->
									<!--begin::Breadcrumb-->
									<ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
										<!--begin::Item-->
										<li class="breadcrumb-item text-muted">
											<a href="<?= site_url('members'); ?>" class="text-muted text-hover-primary">Members</a>
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
										<li class="breadcrumb-item text-muted">Business Details</li>
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
								<?php $this->load->view('pages/members/navbar', ['page' => 'business']); ?>
								<!--end::Navbar-->
								<?php if($member->type==='corporate'){ ?>
								<!--begin::details View-->
								<div class="card mb-5 mb-xl-10" id="kt_profile_details_view">
									<!--begin::Card header-->
									<div class="card-header cursor-pointer">
										<!--begin::Card title-->
										<div class="card-title m-0">
											<h3 class="fw-bold m-0">Business Details</h3>
										</div>
										<!--end::Card title-->
										<!--begin::Action-->
										<a href="?page=settings" class="btn btn-primary align-self-center">Edit Profile</a>
										<!--end::Action-->
									</div>
									<!--begin::Card header-->
									<!--begin::Card body-->
									<div class="card-body p-9">
										<!--begin::Input group-->
										<div class="row mb-7">
											<!--begin::Label-->
											<label class="col-lg-4 fw-semibold text-muted">Company</label>
											<!--end::Label-->
											<!--begin::Col-->
											<div class="col-lg-8 fv-row">
												<span class="fw-semibold text-gray-800 fs-6"><?= $member->company; ?></span>
											</div>
											<!--end::Col-->
										</div>

										<div class="row mb-7">
											<!--begin::Label-->
											<label class="col-lg-4 fw-semibold text-muted">Business Type</label>
											<!--end::Label-->
											<!--begin::Col-->
											<div class="col-lg-8 fv-row">
												<span class="fw-semibold text-gray-800 fs-6"><?= $member->business_type; ?></span>
											</div>
											<!--end::Col-->
										</div>

										<div class="row mb-7">
											<!--begin::Label-->
											<label class="col-lg-4 fw-semibold text-muted">Company Size</label>
											<!--end::Label-->
											<!--begin::Col-->
											<div class="col-lg-8 fv-row">
												<span class="fw-semibold text-gray-800 fs-6"><?= $member->company_size; ?> Employees</span>
											</div>
											<!--end::Col-->
										</div>
										<div class="row mb-7">
											<!--begin::Label-->
											<label class="col-lg-4 fw-semibold text-muted">Business Email</label>
											<!--end::Label-->
											<!--begin::Col-->
											<div class="col-lg-8 fv-row">
												<span class="fw-semibold text-gray-800 fs-6"><?= $member->business_email; ?></span>
											</div>
											<!--end::Col-->
										</div>

										<div class="row mb-7">
											<!--begin::Label-->
											<label class="col-lg-4 fw-semibold text-muted">Business Contact</label>
											<!--end::Label-->
											<!--begin::Col-->
											<div class="col-lg-8 fv-row">
												<span class="fw-semibold text-gray-800 fs-6"><?= $member->business_contact; ?></span>
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
												<span class="fw-bold fs-6 text-gray-800"><?= $member->locale->name ?>,
													<?php
													$region = $this->region->getOne($member->locale->region_id);
													if ($region)
														echo $region->name;
													?>
												</span>
											</div>
											<!--end::Col-->
										</div>
										<!--end::Input group-->
										<div class="row mb-7">
											<!--begin::Label-->
											<label class="col-lg-4 fw-semibold text-muted">Business Descriptor</label>
											<!--end::Label-->
											<!--begin::Col-->
											<div class="col-lg-8 fv-row">
												<span class="fw-semibold text-gray-800 fs-6"><?= $member->business_descriptor; ?></span>
											</div>
											<!--end::Col-->
										</div>
									</div>
									<!--end::Card body-->
								</div>
								<!--end::details View-->
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
	<script src="<?= base_url(); ?>assets/js/custom/pages/user-profile/general1.js"></script>
	<script src="<?= base_url(); ?>assets/js/widgets.bundle.js"></script>
	<script src="<?= base_url(); ?>assets/js/custom/widgets.js"></script>
	<!--end::Custom Javascript-->
	<!--end::Javascript-->
</body>
<!--end::Body-->

</html>