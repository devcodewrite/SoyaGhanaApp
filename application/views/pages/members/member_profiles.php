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
							<h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0"><?=$group->name; ?></h1>
							<!--end::Title-->
							<!--begin::Breadcrumb-->
							<ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
								<!--begin::Item-->
								<li class="breadcrumb-item text-muted">
									<a href="<?= site_url('membership') ?>" class="text-muted text-hover-primary">Members</a>
								</li>
								<!--end::Item-->
								<!--begin::Item-->
								<li class="breadcrumb-item">
									<span class="bullet bg-gray-400 w-5px h-2px"></span>
								</li>
								<!--end::Item-->
								<!--begin::Item-->
								<li class="breadcrumb-item text-muted">Membership Lists</li>
								<!--end::Item-->


							</ul>
							<!--end::Breadcrumb-->
						</div>
						<!--end::Page title-->
						<!--begin::Actions-->
						<div class="d-flex align-items-center gap-2 gap-lg-3">
							<!--begin::Primary button-->
							<a href="../catalogs/add" class="btn btn-sm fw-bold btn-warning"><i class="fa fa-bullhorn" style="color:#fff;font-size:18px;"></i> Post Advert</a>
							<a href="https://web.facebook.com/soyavaluechainghana" class="btn btn-sm fw-bold btn-primary" target="_blank"><i class="fa fa-facebook" style="color:#fff;font-size:18px;"></i> Facebook Post</a>
							<a href="https://www.youtube.com/channel/UCxz_wWq4dWR0OLKuzjrKfvA" target="_blank" class="btn btn-sm fw-bold btn-danger"><i class="fa fa-youtube-play" style="color:#fff;font-size:18px;"></i> YouTube Videos</a>

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
								<div class="card card-flush card-p-0 bg-transparent border-1 border-black">
									<!--begin::Body-->
									<div class="card-body">
										<!--begin::Nav-->
										<div style="max-width: 100% !important; overflow:scroll;" class="mb-3">
										<ul style="height:auto; width:max-content;" class="nav nav-pills d-block nav-pills-custom gap-3 mb-6">
											<!--begin::Item-->
											<?php foreach ($groups as $row) {
												$gm = array_filter($row->members, function ($item) {
													return $item->verified === 'yes';
												});
											?>
												<li class="nav-item d-inline-block me-0" data-bs-toggle="tooltip" data-bs-placement="bottom" title="<?= $row->name; ?>">
													<!--begin::Nav link-->
													<a class="nav-link nav-link-border-solid btn btn-outline btn-flex btn-active-color-primary flex-column flex-stack pt-9 pb-7 page-bg 
                                                <?= $row->id === $sid ? 'show active' : ''; ?>" href="<?= site_url("membership/members?" . ($query ? "query=$query&" : '') . "group={$row->id}"); ?>" style="width: 138px;height: 180px">
														<!--begin::Icon-->
														<div class="nav-icon mb-3">
															<!--begin::Food icon-->
															<img src="<?= $row->avatar; ?>" style="width:100px; max-height: 80px;" alt="<?= $row->name; ?>" />
															<!--end::Food icon-->
														</div>
														<!--end::Icon-->
														<!--begin::Info-->
														<div class="">
															<span class="text-gray-800 fw-bold fs-5 d-block text-truncate"  style="max-width: 120px;"><?= $row->name; ?></span>
															<span class="text-gray-400 fw-semibold fs-7"><?= sizeof($gm) ?> Members</span>
														</div>
														<!--end::Info-->
													</a>
													<!--end::Nav link-->
												</li>
											<?php } ?>
											<!--end::Item-->

										</ul>
										<!--end::Nav-->
										</div>
										<!--begin::Tab Content-->
										<div class="tab-content">
											<!--begin::Tap pane-->
											<div class="tab-pane fade show active" id="kt_pos_food_content_1">
												<!--begin::Wrapper-->
												<div class="d-flex flex-wrap d-grid gap-2 gap-xxl-5">
													<!--begin::Card-->
													<div class="row">
													<?php foreach ($members as $row) {
														$row = $this->member->getOne($row->id);?>
														<div class="col-md-3 g-3 col-6">
    														<div class="card card-flush flex-row-fixed p-5 pb-5 w-100 w-xxl-250px mw-xxl-230px shadow-primary" style="height:350px;background:#F5F8FA;border:4px solid #E4E6EF;width:100%;">
    															<!--begin::Body-->
    															
    															    <div class="card-body text-center d-">
    																<!--begin::Food img-->
    																<a href="<?= site_url('members/view/' . $row->id); ?>" target="_blank" class="d-inline-block" style="height:200px; overflow:hidden;">
    																	<img src="<?= $this->member->urlToAvatar($row->thumb_photo_url); ?>"  class="rounded-3 mb-4 h-100 w-100 w-xxl-200px h-xxl-190px" alt="" style="object-fit: cover;"/>
    																</a>
    																<!--end::Food img-->
    																<!--begin::Info-->
    																<div class="mb-2">
    																	<!--begin::Title-->
    																	<div class="text-center">
    									<?php if($row->type ==='personal'){ ?>									<span class="fw-bold text-gray-800 cursor-pointer text-hover-primary fs-3 fs-xl-1"><?= $row->name; ?></span>
    									<?php } else { ?>
    									<span class="fw-bold text-gray-800 cursor-pointer text-hover-primary fs-3 fs-xl-1"><?= $row->company; ?></span>
    									<?php } ?>
    									<span class="text-gray-400 fw-semibold d-block fs-6 mt-n1">
    																			<?php $district = $this->locale->getOne($row->locale_id)->district;
    																			echo $district ? "$district->name $district->category" : ''; ?>
    																		</span>
    																		<span class="text-gray-400 fw-semibold d-block fs-6 mt-n1">
    																			<?php $region = $this->region->getOne($district->region_id);
    																			echo $region ? $region->name : ''; ?>
    																		</span>
    																	</div>
    																	<!--end::Title-->
    																</div>
    																<!--end::Info-->
    																<!--begin::Total-->
    																<span class="text-success fw-bold" style="font-size:18px;"><?= $row->locale->name; ?></span>
    																<!--end::Total-->
    															</div>
															</div>
															<!--end::Body-->
														</div>
													<?php } ?>
													</div>
													<!--end::Card-->
												</div>
												<!--end::Wrapper-->
											</div>
											<!--end::Tap pane-->

										</div>
										<!--end::Tab Content-->
									</div>
									<!--end: Card Body-->
									<!--<begin::Footer-->
									<div class="card-footer mt-5">
										<?= $this->pagination->create_links(); ?>
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