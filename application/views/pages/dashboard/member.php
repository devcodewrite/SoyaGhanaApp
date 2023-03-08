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
	<!--begin::Main-->
	<!--begin::Root-->
	<div class="d-flex flex-column flex-root">
		<!--begin::Page-->
		<div class="page d-flex flex-row flex-column-fluid">
			<?php $this->load->view('templates/aside'); ?>
			<!--begin::Wrapper-->
			<div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">
				<?php
				$this->load->view('templates/header');
				?>
				<!--begin::Toolbar-->
				<div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
					<!--begin::Toolbar container-->
					<div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
						<!--begin::Page title-->
						<div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
							<!--begin::Title-->
							<h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">Members Dashboard</h1>
							<!--end::Title-->
							<!--begin::Breadcrumb-->
							<ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
								<!--begin::Item-->
								<li class="breadcrumb-item text-muted">
									<a href="<?= site_url('dashboard') ?>" class="text-muted text-hover-primary">Dashboard</a>
								</li>
								<!--end::Item-->
							</ul>
							<!--end::Breadcrumb-->
						</div>
						<!--end::Page title-->
						<!--begin::Actions-->
						<div class="d-flex align-items-center gap-2 gap-lg-3">
							<!--begin::Primary button-->
							<a href="#" class="btn btn-sm fw-bold btn-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_create_app">Create Facebook Post</a>
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
						<!--begin::Layout-->
						<div class="d-flex flex-column flex-xl-row mb-5">
							<!--begin::Content-->
							<div class="d-flex flex-row-fluid me-xl-9 mb-10 mb-xl-0">
								<!--begin::Pos food-->
								<div class="card card-flush card-p-0 bg-transparent border-0">
									<!--begin::Body-->
									<div class="card-body">
										<!--begin::Wrapper-->
										<div class="d-flex flex-wrap d-grid gap-5 gap-xxl-9">
													<!--begin::Card-->
													<?php foreach ([] as $row) {
														$row = $this->member->getOne($row->id);
													?>
														<div class="card card-flush flex-row-fixed p-6 pb-5 mw-100">
															<!--begin::Body-->
															<div class="card-body text-center">

																<!--begin::Food img-->
																<a href="<?= site_url('members/view/' . $row->id); ?>" target="_blank">
																	<img src="<?= $this->member->urlToAvatar($row->thumb_photo_url); ?>" class="rounded-3 mb-4 w-150px h-150px w-xxl-200px h-xxl-200px" alt="" />
																</a>
																<!--end::Food img-->
																<!--begin::Info-->
																<div class="mb-2">
																	<!--begin::Title-->
																	<div class="text-center">
																	    	<?php if($row->type === 'personal')	{ ?>
																		<span class="fw-bold text-gray-800 cursor-pointer text-hover-primary fs-3 fs-xl-1"><?= $row->name; ?></span>
														
										<?php	}else { ?>		
																		<span class="fw-bold text-gray-800 cursor-pointer text-hover-primary fs-3 fs-xl-1"><?= $row->company; ?></span>
																		<?php } ?>
																		<span class="text-gray-400 fw-semibold d-block fs-6 mt-n1">
																			<?php $region = $this->locale->getOne($row->locale_id)->region;
																			echo $region ? $region->name : ''; ?>
																		</span>
																	</div>
																	<!--end::Title-->
																</div>
																<!--end::Info-->
																<!--begin::Total-->
																<span class="text-success text-end fw-bold fs-1"><?= $row->locale->name; ?></span>
																<!--end::Total-->
															</div>
															<!--end::Body-->
														</div>
													<?php } ?>
													<!--end::Card-->
												</div>
												<!--end::Wrapper-->
									</div>
									<!--end: Card Body-->
									<!--<begin::Footer-->
									<div class="card-footer mt-5">
									
									</div>
									<!--begin::Footer-->
								</div>
								<!--end::Pos food-->
							</div>
							<!--end::Content-->
						</div>
						<!--end::Layout-->
					</div>
					<!--end::Content container-->
				</div>
				<!--end::Content-->
				<?php $this->load->view('templates/footer'); ?>
			</div>
			<!--end::Wrapper-->
		</div>
		<!--end::Page-->
	</div>
	<!--end::Root-->

	<!--begin::Javascript-->
	<?php $this->load->view('templates/global_js'); ?>
	<!--begin::Custom Javascript(used for this page only)-->

	<!--end::Custom Javascript-->
	<!--end::Javascript-->
</body>
<!--end::Body-->

</html>