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
							<h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">Administrator Dashboard</h1>
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
							<a href="../catalogs/add" class="btn btn-sm fw-bold btn-warning"><i class="fa fa-bullhorn" style="color:#fff;font-size:18px;"></i> Post Advert</a>
							<a href="https://web.facebook.com/soyavaluechainghana" class="btn btn-sm fw-bold btn-primary" target="_blank"><i class="fa fa-facebook" style="color:#fff;font-size:18px;"></i>Create Facebook Post</a>
							<a href="https://www.youtube.com/channel/UCxz_wWq4dWR0OLKuzjrKfvA" target="_blank" class="btn btn-sm fw-bold btn-danger"><i class="fa fa-youtube-play" style="color:#fff;font-size:18px;"></i> Watch YouTube Videos</a>

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
					<div id="kt_content_container" class="container-xxl">
						<!--begin::Row-->
						<div class="row g-5 g-xl-8">
							<div class="col-xl-3">
								<!--begin::Statistics Widget 5-->
								<a href="#" class="card bg-danger hoverable card-xl-stretch mb-xl-8">
									<!--begin::Body-->
									<div class="card-body">
										<h1 class="text-white"><?= $this->member->getCount(['verified' => 'yes']) ?></h1>
										<div class="text-white fw-bold fs-2 mb-2 mt-5">Members</div>
										<div class="fw-semibold text-white">Total members verified</div>
									</div>
									<!--end::Body-->
								</a>
								<!--end::Statistics Widget 5-->
							</div>
							<div class="col-xl-3">
								<!--begin::Statistics Widget 5-->
								<a href="#" class="card bg-primary hoverable card-xl-stretch mb-xl-8">
									<!--begin::Body-->
									<div class="card-body">
										<h1 class="text-white"><?= $this->member->getCount(['verified' => 'no']) ?></h1>
										<div class="text-white fw-bold fs-2 mb-2 mt-5">Unverified Members</div>
										<div class="fw-semibold text-white">Total members unverified</div>
									</div>
									<!--end::Body-->
								</a>
								<!--end::Statistics Widget 5-->
							</div>
							<div class="col-xl-3">
								<!--begin::Statistics Widget 5-->
								<a href="#" class="card bg-success hoverable card-xl-stretch mb-5 mb-xl-8">
									<!--begin::Body-->
									<div class="card-body">
										<h1 class="text-white"><?= $this->group->getCount() ?></h1>
										<div class="text-white fw-bold fs-2 mb-2 mt-5">Groups</div>
										<div class="fw-semibold text-white">Total groups</div>
									</div>
									<!--end::Body-->
								</a>
								<!--end::Statistics Widget 5-->
							</div>
							<div class="col-xl-3">
								<!--begin::Statistics Widget 5-->
								<a href="#" class="card bg-warning hoverable card-xl-stretch mb-5 mb-xl-8">
									<!--begin::Body-->
									<div class="card-body">
										<h1 class="text-white"><?= $this->catalog->getCount() ?></h1>
										<div class="text-white fw-bold fs-2 mb-2 mt-5">Catalogs</div>
										<div class="fw-semibold text-white">Total catalogs</div>
									</div>
									<!--end::Body-->
								</a>
								<!--end::Statistics Widget 5-->
							</div>

							<div class="col-xl-3">
								<!--begin::Statistics Widget 5-->
								<a href="#" class="card bg-info hoverable card-xl-stretch mb-5 mb-xl-8">
									<!--begin::Body-->
									<div class="card-body">
										<h1 class="text-white"><?= $this->setting->getValue('sms_units', 0) ?></h1>
										<div class="text-white fw-bold fs-2 mb-2 mt-5">Sms Units</div>
										<div class="fw-semibold text-white">Total sms balance</div>
									</div>
									<!--end::Body-->
								</a>
								<!--end::Statistics Widget 5-->
							</div>
						</div>
						<!--end::Row-->

						<!--begin::Row-->
						<div class="row g-5 g-xl-10 mb-5">
							<!--begin::Tables Widget 10-->
							<div class="col-md-12">
								<div class="card">
									<!--begin::Header-->
									<div class="card-header border-0 bg-info">
										<h3 class="card-title align-items-start flex-column">
											<span class="card-label fw-bold fs-3 mb-1 text-white">Group Statistics</span>
										</h3>

									</div>
									<!--end::Header-->
									<!--begin::Body-->
									<div class="card-body pt-3 table-responsive">
										<table class="table align-middle table-row-dashed" id="kt_ecommerce_category_table">
											<!--begin::Table head-->
											<thead>
												<!--begin::Table row-->
												<tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
													<th class="min-w-250px">Group</th>
													<th class="min-w-150px">Total Members</th>
													<th class="min-w-150px">Verified Members</th>
												</tr>
												<!--end::Table row-->
											</thead>
											<!--end::Table head-->
											<!--begin::Table body-->
											<tbody class="fw-semibold text-gray-600">
												<!--begin::Table row-->
												<?php foreach ($this->group->getAll() as $row) {
												?>
													<tr>
														<!--begin::Group=-->
														<td>
															<div class="d-flex">
																<!--begin::Thumbnail-->
																<a href="<?= site_url('database/edit-group/' . $row->id); ?>" class="symbol symbol-50px">
																	<span class="symbol-label" style="background-image:url(<?= $row->avatar ? $row->avatar : ''; ?>)"></span>
																</a>
																<!--end::Thumbnail-->
																<div class="ms-5">
																	<!--begin::Title-->
																	<a href="<?= site_url('database/edit-group/' . $row->id); ?>" class="text-gray-800 text-hover-primary fs-5 fw-bold mb-1" data-kt-ecommerce-category-filter="category_name"><?= $row->name; ?></a>
																	<!--end::Title-->
																	<!--begin::Description-->
																	<div class="text-muted fs-7 fw-bold">Code: <?= $row->code; ?></div>
																	<!--end::Description-->
																</div>
															</div>
														</td>
														<!--end::Group=-->
														<td>
															<?= count($row->members) ?>
														</td>
														<td><?= count(array_filter($row->members, function ($member) {
																return $member->verified === 'yes';
															})) ?></td>
													</tr>
												<?php } ?>
												<!--end::Table row-->
											</tbody>
											<!--end::Table body-->
										</table>
									</div>
									<!--begin::Body-->
								</div>

							</div>
							<!--end::Tables Widget 10-->

							<!--begin::Tables Widget 10-->
							<div class="col-md-12">
								<div class="card card-flush mb-5">
									<!--begin::Card header-->

									<div class="card-header align-items-center py-5 gap-2 gap-md-5 bg-info">
										<!--begin::Card title-->
										<h1 class="col-md-12 fw-bold fs-3 mb-1 text-white">Top 50 Catalogs</h1>
										<div class="card-title">
											<!--begin::Search-->
											<div class="d-flex align-items-center position-relative my-1">
												<!--begin::Svg Icon | path: icons/duotune/general/gen021.svg-->
												<span class="svg-icon svg-icon-1 position-absolute ms-4">
													<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
														<rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1" transform="rotate(45 17.0365 15.1223)" fill="currentColor" />
														<path d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z" fill="currentColor" />
													</svg>
												</span>
												<!--end::Svg Icon-->
												<input type="text" data-kt-ecommerce-product-filter="search" class="form-control form-control-solid w-250px ps-14" placeholder="Search Product" />
											</div>
											<!--end::Search-->
										</div>
										<!--end::Card title-->
										<!--begin::Card toolbar-->
										<div class="card-toolbar flex-row-fluid justify-content-end gap-5">
											<div class="w-100 mw-150px">
												<!--begin::Select2-->
												<select class="form-select form-select-solid" data-control="select2" data-hide-search="true" data-placeholder="Status" data-kt-ecommerce-product-filter="status">
													<option></option>
													<option value="all">All</option>
													<option value="published">Published</option>
													<option value="inactive">Inactive</option>
												</select>
												<!--end::Select2-->
											</div>
											<!--begin::Add product-->
											<a href="catalogs/add" class="btn btn-primary">Add Product</a>
											<!--end::Add product-->
										</div>
										<!--end::Card toolbar-->
									</div>
									<!--end::Card header-->
									<!--begin::Card body-->
									<div class="card-body pt-0">
										<!--begin::Table-->
										<table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_ecommerce_products_table">
											<!--begin::Table head-->
											<thead>
												<!--begin::Table row-->
												<tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
													<th class="w-10px pe-2">
														<div class="form-check form-check-sm form-check-custom form-check-solid me-3">
															<input class="form-check-input" type="checkbox" data-kt-check="true" data-kt-check-target="#kt_ecommerce_products_table .form-check-input" value="1" />
														</div>
													</th>
													<th class="min-w-200px">Product</th>
													<th class="text-end min-w-100px">SKU</th>
													<th class="text-end min-w-70px">Qty</th>
													<th class="text-end min-w-100px">Price</th>
													<th class="text-end min-w-100px">Status</th>
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
							</div>
							<!--end::Tables Widget 10-->
						</div>
						<!--end::Row-->
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
	<!--begin::Vendors Javascript(used for this page only)-->
	<script src="<?= base_url(); ?>assets/plugins/custom/datatables/datatables.bundle.js"></script>
	<!--end::Vendors Javascript-->
	<!--begin::Custom Javascript(used for this page only)-->
	<script src="<?= base_url(); ?>assets/js/custom/apps/ecommerce/catalog/top-50-products.js"></script>
	<script src="<?= base_url(); ?>assets/js/widgets.bundle.js"></script>
	<script src="<?= base_url(); ?>assets/js/custom/widgets.js"></script>
	<!--end::Custom Javascript-->
	<!--end::Javascript-->
</body>
<!--end::Body-->

</html>