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
							<!--begin::Content container-->
							<div id="kt_app_content_container" class="app-container container-xxl">
								<!--begin::Form-->
								<form id="kt_ecommerce_add_product_form" class="form d-flex flex-column flex-lg-row" data-kt-redirect="<?=isset($catalog)?site_url('catalogs/edit/'.$catalog->id):'add' ?>">
								<?php if(isset($catalog)){ ?>
										<input type="hidden" name="id" value="<?=isset($catalog)?$catalog->id:'' ?>">
										<?php } ?>
								<!--begin::Aside column-->
									<div class="d-flex flex-column gap-7 gap-lg-10 w-100 w-lg-300px mb-7 me-lg-10">
										<!--begin::Thumbnail settings-->
										<div class="card card-flush py-4">
											<!--begin::Card header-->
											<div class="card-header">
												<!--begin::Card title-->
												<div class="card-title">
													<h2>Post Image</h2>
												</div>
												<!--end::Card title-->
											</div>
											<!--end::Card header-->
											<!--begin::Card body-->
											<div class="card-body text-center pt-0">
												<!--begin::Image input placeholder-->
												<style>.image-input-placeholder { background-image: url('<?=isset($catalog)?($catalog->avatar?$catalog->avatar:base_url("assets/media/svg/files/blank-image.svg")):base_url("assets/media/svg/files/blank-image.svg") ?>'); }
													 [data-theme="dark"] .image-input-placeholder { background-image: url('<?=isset($catalog)?($catalog->avatar?$catalog->avatar:base_url("assets/media/svg/files/blank-image-dark.svg")):base_url("assets/media/svg/files/blank-image-dark.svg") ?>'); }</style>
													<!--end::Image input placeholder-->
												<!--begin::Image input-->
												<div class="image-input image-input-empty image-input-outline image-input-placeholder mb-3" data-kt-image-input="true">
													<!--begin::Preview existing avatar-->
													<div class="image-input-wrapper w-150px h-150px"></div>
													<!--end::Preview existing avatar-->
													<!--begin::Label-->
													<label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Change avatar">
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
												<!--begin::Description-->
												<div class="text-muted fs-7">Set the post thumbnail image. Only *.png, *.jpg and *.jpeg image files are accepted</div>
												<!--end::Description-->
											</div>
											<!--end::Card body-->
										</div>
										<!--end::Thumbnail settings-->
										<!--begin::Status-->
										<div class="card card-flush py-4">
											<!--begin::Card header-->
											<div class="card-header">
												<!--begin::Card title-->
												<div class="card-title">
													<h2>Status</h2>
												</div>
												<!--end::Card title-->
												<!--begin::Card toolbar-->
												<div class="card-toolbar">
													<div class="rounded-circle bg-success w-15px h-15px" id="kt_ecommerce_add_product_status"></div>
												</div>
												<!--begin::Card toolbar-->
											</div>
											<!--end::Card header-->
											<!--begin::Card body-->
											<div class="card-body pt-0">
												<!--begin::Select2-->
												<select class="form-select mb-2" name="status" data-control="select2" data-hide-search="true" data-placeholder="Select an option" id="kt_ecommerce_add_product_status_select">
													<option></option>
													<option value="published" <?=isset($catalog)?($catalog->status==='published'?'selected':''):'selected'; ?>>Published</option>
													<option value="inactive" <?=isset($catalog)?($catalog->status==='inactive'?'selected':''):''; ?>>Inactive</option>
													<option value="draft" <?=isset($catalog)?($catalog->status==='draft'?'selected':''):''; ?>>Draft</option>
												
												</select>
												<!--end::Select2-->
												<!--begin::Description-->
												<div class="text-muted fs-7">Set the product status.</div>
												<!--end::Description-->
												<!--begin::Datepicker-->
												<div class="d-none mt-10">
													<label for="kt_ecommerce_add_product_status_datepicker" class="form-label">Select publishing date and time</label>
													<input class="form-control" id="kt_ecommerce_add_product_status_datepicker" placeholder="Pick date & time" />
												</div>
												<!--end::Datepicker-->
											</div>
											<!--end::Card body-->
										</div>
										<!--end::Status-->
									</div>
									<!--end::Aside column-->
									<!--begin::Main column-->
									<div class="d-flex flex-column flex-row-fluid gap-7 gap-lg-10">
										<!--begin:::Tabs-->
										<ul class="nav nav-custom nav-tabs nav-line-tabs nav-line-tabs-2x border-0 fs-4 fw-semibold mb-n2">
											<!--begin:::Tab item-->
											<li class="nav-item">
												<a class="nav-link text-active-primary pb-4 active" data-bs-toggle="tab" href="#kt_ecommerce_add_product_general">General</a>
											</li>
											<!--end:::Tab item-->
											<!--begin:::Tab item-->
											<li class="nav-item">
												<a class="nav-link text-active-primary pb-4" data-bs-toggle="tab" href="#kt_ecommerce_add_product_advanced">Advanced</a>
											</li>
											<!--end:::Tab item-->
											<!--begin:::Tab item-->
											<li class="nav-item d-none">
												<a class="nav-link text-active-primary pb-4" data-bs-toggle="tab" href="#kt_ecommerce_add_product_reviews">Reviews</a>
											</li>
											<!--end:::Tab item-->
										</ul>
										<!--end:::Tabs-->
										<!--begin::Tab content-->
										<div class="tab-content">
											<!--begin::Tab pane-->
											<div class="tab-pane fade show active" id="kt_ecommerce_add_product_general" role="tab-panel">
												<div class="d-flex flex-column gap-7 gap-lg-10">
													<!--begin::General options-->
													<div class="card card-flush py-4">
														<!--begin::Card header-->
														<div class="card-header">
															<div class="card-title">
																<h2>General</h2>
															</div>
														</div>
														<!--end::Card header-->
														<!--begin::Card body-->
														<div class="card-body pt-0">
															<!--begin::Input catalog-->
															<div class="mb-10 fv-row">
																<!--begin::Label-->
																<label class="required form-label">Post Title</label>
																<!--end::Label-->
																<!--begin::Input-->
																<input type="text" name="item" class="form-control mb-2" placeholder="Post Title" value="<?=isset($catalog)?$catalog->item:'' ?>" />
																<!--end::Input-->
																<!--begin::Description-->
																<div class="text-muted fs-7">A post title is required and recommended to be unique.</div>
																<!--end::Description-->
															</div>
															<!--end::Input catalog-->
															<!--begin::Input catalog-->
															<div>
																<!--begin::Label-->
																<label class="form-label">Description</label>
																<!--end::Label-->
																<!--begin::Editor-->
																<div id="kt_ecommerce_add_product_description" name="description" class="min-h-200px mb-2"><?=isset($catalog)?$catalog->description:'' ?></div>
																<!--end::Editor-->
																<!--begin::Description-->
																<div class="text-muted fs-7">Set post description for better visibility.</div>
																<!--end::Description-->
															</div>
															<!--end::Input catalog-->
														</div>
														<!--end::Card header-->
													</div>
													<!--end::General options-->
													<!--begin::Media-->
													<div class="card card-flush py-4">
														<!--begin::Card header-->
														<div class="card-header">
															<div class="card-title">
																<h2>Media</h2>
															</div>
														</div>
														<!--end::Card header-->
														<!--begin::Card body-->
														<div class="card-body pt-0">
															<!--begin::Input catalog-->
															<div class="fv-row mb-2">
																<!--begin::Dropzone-->
																<div class="dropzone" id="kt_ecommerce_add_product_media">
																	<!--begin::Message-->
																	<div class="dz-message needsclick">
																		<!--begin::Icon-->
																		<i class="bi bi-file-earmark-arrow-up text-primary fs-3x"></i>
																		<!--end::Icon-->
																		<!--begin::Info-->
																		<div class="ms-4">
																			<h3 class="fs-5 fw-bold text-gray-900 mb-1">Drop files here or click to upload.</h3>
																			<span class="fs-7 fw-semibold text-gray-400">Upload up to 10 files</span>
																		</div>
																		<!--end::Info-->
																	</div>
																</div>
																<!--end::Dropzone-->
															</div>
															<!--end::Input catalog-->
															<!--begin::Description-->
															<div class="text-muted fs-7">Set the product media gallery.</div>
															<!--end::Description-->
														</div>
														<!--end::Card header-->
													</div>
													<!--end::Media-->
													<!--begin::Pricing-->
													<div class="card card-flush py-4">
														<!--begin::Card header-->
														<div class="card-header">
															<div class="card-title">
																<h2>Pricing</h2>
															</div>
														</div>
														<!--end::Card header-->
														<!--begin::Card body-->
														<div class="card-body pt-0">
															<!--begin::Input catalog-->
															<div class="mb-10 fv-row">
																<!--begin::Label-->
																<label class="required form-label">Base Price</label>
																<!--end::Label-->
																<!--begin::Input-->
																<input type="text" name="price" class="form-control mb-2" placeholder="Product price" value="<?=isset($catalog)?$catalog->price:'' ?>" />
																<!--end::Input-->
																<!--begin::Description-->
																<div class="text-muted fs-7">Set the product price.</div>
																<!--end::Description-->
															</div>
															<!--end::Input catalog-->
															<!--begin::Input catalog-->
															<div class="fv-row mb-10">
																<!--begin::Label-->
																<label class="fs-6 fw-semibold mb-2">Discount Type
																	<i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Select a discount type that will be applied to this product"></i></label>
																<!--End::Label-->
																<!--begin::Row-->
																<div class="row row-cols-1 row-cols-md-3 row-cols-lg-1 row-cols-xl-3 g-9" data-kt-buttons="true" data-kt-buttons-target="[data-kt-button='true']">
																	<!--begin::Col-->
																	<div class="col">
																		<!--begin::Option-->
																		<label class="btn btn-outline btn-outline-dashed btn-active-light-primary d-flex text-start p-6" data-kt-button="true">
																			<!--begin::Radio-->
																			<span class="form-check form-check-custom form-check-solid form-check-sm align-items-start mt-1">
																				<input class="form-check-input" type="radio" name="discount_option" value="1" />
																			</span>
																			<!--end::Radio-->
																			<!--begin::Info-->
																			<span class="ms-5">
																				<span class="fs-4 fw-bold text-gray-800 d-block">No Discount</span>
																			</span>
																			<!--end::Info-->
																		</label>
																		<!--end::Option-->
																	</div>
																	<!--end::Col-->
																	<!--begin::Col-->
																	<div class="col">
																		<!--begin::Option-->
																		<label class="btn btn-outline btn-outline-dashed btn-active-light-primary active d-flex text-start p-6" data-kt-button="true">
																			<!--begin::Radio-->
																			<span class="form-check form-check-custom form-check-solid form-check-sm align-items-start mt-1">
																				<input class="form-check-input" type="radio" name="discount_option" value="2" checked="checked" />
																			</span>
																			<!--end::Radio-->
																			<!--begin::Info-->
																			<span class="ms-5">
																				<span class="fs-4 fw-bold text-gray-800 d-block">Percentage %</span>
																			</span>
																			<!--end::Info-->
																		</label>
																		<!--end::Option-->
																	</div>
																	<!--end::Col-->
																	<!--begin::Col-->
																	<div class="col">
																		<!--begin::Option-->
																		<label class="btn btn-outline btn-outline-dashed btn-active-light-primary d-flex text-start p-6" data-kt-button="true">
																			<!--begin::Radio-->
																			<span class="form-check form-check-custom form-check-solid form-check-sm align-items-start mt-1">
																				<input class="form-check-input" type="radio" name="discount_option" value="3" />
																			</span>
																			<!--end::Radio-->
																			<!--begin::Info-->
																			<span class="ms-5">
																				<span class="fs-4 fw-bold text-gray-800 d-block">Fixed Price</span>
																			</span>
																			<!--end::Info-->
																		</label>
																		<!--end::Option-->
																	</div>
																	<!--end::Col-->
																</div>
																<!--end::Row-->
															</div>
															<!--end::Input catalog-->
															<!--begin::Input catalog-->
															<div class="mb-10 fv-row" id="kt_ecommerce_add_product_discount_percentage">
																<!--begin::Label-->
																<label class="form-label">Set Discount Percentage</label>
																<!--end::Label-->
																<!--begin::Slider-->
																<div class="d-flex flex-column text-center mb-5">
																	<div class="d-flex align-items-start justify-content-center mb-7">
																		<span class="fw-bold fs-3x" id="kt_ecommerce_add_product_discount_label">0</span>
																		<span class="fw-bold fs-4 mt-1 ms-2">%</span>
																	</div>
																	<div id="kt_ecommerce_add_product_discount_slider" class="noUi-sm"></div>
																</div>
																<!--end::Slider-->
																<!--begin::Description-->
																<div class="text-muted fs-7">Set a percentage discount to be applied on this product.</div>
																<!--end::Description-->
															</div>
															<!--end::Input catalog-->
															<!--begin::Input catalog-->
															<div class="d-none mb-10 fv-row" id="kt_ecommerce_add_product_discount_fixed">
																<!--begin::Label-->
																<label class="form-label">Fixed Discounted Price</label>
																<!--end::Label-->
																<!--begin::Input-->
																<input type="text" name="dicsounted_price" class="form-control mb-2" placeholder="Discounted price" value="<?=isset($catalog)?$catalog->dicsounted_price:'' ?>" />
																<!--end::Input-->
																<!--begin::Description-->
																<div class="text-muted fs-7">Set the discounted product price. The product will be reduced at the determined fixed price</div>
																<!--end::Description-->
															</div>
															<!--end::Input catalog-->
														</div>
														<!--end::Card header-->
													</div>
													<!--end::Pricing-->
												</div>
											</div>
											<!--end::Tab pane-->
											<!--begin::Tab pane-->
											<div class="tab-pane fade" id="kt_ecommerce_add_product_advanced" role="tab-panel">
												<div class="d-flex flex-column gap-7 gap-lg-10">
													<!--begin::Inventory-->
													<div class="card card-flush py-4">
														<!--begin::Card header-->
														<div class="card-header">
															<div class="card-title">
																<h2>Inventory</h2>
															</div>
														</div>
														<!--end::Card header-->
														<!--begin::Card body-->
														<div class="card-body pt-0">
															<!--begin::Input catalog-->
															<div class="mb-10 fv-row">
																<!--begin::Label-->
																<label class="required form-label">SKU</label>
																<!--end::Label-->
																<!--begin::Input-->
																<input type="text" name="sku" class="form-control mb-2" placeholder="SKU Number" value="<?=isset($catalog)?$catalog->sku:random_int(100000,999999) ?>" />
																<!--end::Input-->
																<!--begin::Description-->
																<div class="text-muted fs-7">Enter the product SKU.</div>
																<!--end::Description-->
															</div>
															<!--end::Input catalog-->
															<!--begin::Input catalog-->
															<div class="mb-10 fv-row">
																<!--begin::Label-->
																<label class="required form-label">Quantity</label>
																<!--end::Label-->
																<!--begin::Input-->
																<div class="d-flex gap-3">
																	<input type="number" name="quantity" class="form-control mb-2" placeholder="In sock" value="<?=isset($catalog)?$catalog->quantity:'' ?>" />
																</div>
																<!--end::Input-->
																<!--begin::Description-->
																<div class="text-muted fs-7">Enter the product quantity.</div>
																<!--end::Description-->
															</div>
															<!--end::Input catalog-->
														</div>
														<!--end::Card header-->
													</div>
													<!--end::Inventory-->
													<!--begin::Variations-->
													<div class="card card-flush py-4">
														<!--begin::Card header-->
														<div class="card-header">
															<div class="card-title">
																<h2>Variations</h2>
															</div>
														</div>
														<!--end::Card header-->
														<!--begin::Card body-->
														<div class="card-body pt-0">
															<!--begin::Input catalog-->
															<div class="" data-kt-ecommerce-catalog-add-product="auto-options">
																<!--begin::Label-->
																<label class="form-label">Add Product Variations</label>
																<!--end::Label-->
																<!--begin::Repeater-->
																<div id="kt_ecommerce_add_product_options">
																	<!--begin::Form catalog-->
																	<div class="form-catalog">
																		<div data-repeater-list="kt_ecommerce_add_product_options" class="d-flex flex-column gap-3">
																			<div data-repeater-item="" class="form-catalog d-flex flex-wrap align-items-center gap-5">
																				<!--begin::Select2-->
																				<div class="w-100 w-md-200px">
																					<select class="form-select" name="product_option" data-placeholder="Select a variation" data-kt-ecommerce-catalog-add-product="product_option">
																						<option></option>
																						<option value="color" <?=isset($catalog)?($catalog->product_option==='color'?'selected':''):'' ?>>Color</option>
																						<option value="size" <?=isset($catalog)?($catalog->product_option==='size'?'selected':''):'' ?>>Size</option>
																						<option value="material" <?=isset($catalog)?($catalog->product_option==='material'?'selected':''):'' ?>>Material</option>
																						<option value="style" <?=isset($catalog)?($catalog->product_option==='style'?'selected':''):'' ?>>Style</option>
																					</select>
																				</div>
																				<!--end::Select2-->
																				<!--begin::Input-->
																				<input type="text" class="form-control mw-100 w-200px" name="product_option_value" placeholder="Variation" />
																				<!--end::Input-->
																				<button type="button" data-repeater-delete="" class="btn btn-sm btn-icon btn-light-danger">
																					<!--begin::Svg Icon | path: icons/duotune/arrows/arr088.svg-->
																					<span class="svg-icon svg-icon-1">
																						<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																							<rect opacity="0.5" x="7.05025" y="15.5356" width="12" height="2" rx="1" transform="rotate(-45 7.05025 15.5356)" fill="currentColor" />
																							<rect x="8.46447" y="7.05029" width="12" height="2" rx="1" transform="rotate(45 8.46447 7.05029)" fill="currentColor" />
																						</svg>
																					</span>
																					<!--end::Svg Icon-->
																				</button>
																			</div>
																		</div>
																	</div>
																	<!--end::Form catalog-->
																	<!--begin::Form catalog-->
																	<div class="form-catalog mt-5">
																		<button type="button" data-repeater-create="" class="btn btn-sm btn-light-primary">
																			<!--begin::Svg Icon | path: icons/duotune/arrows/arr087.svg-->
																			<span class="svg-icon svg-icon-2">
																				<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																					<rect opacity="0.5" x="11" y="18" width="12" height="2" rx="1" transform="rotate(-90 11 18)" fill="currentColor" />
																					<rect x="6" y="11" width="12" height="2" rx="1" fill="currentColor" />
																				</svg>
																			</span>
																			<!--end::Svg Icon-->Add another variation
																		</button>
																	</div>
																	<!--end::Form catalog-->
																</div>
																<!--end::Repeater-->
															</div>
															<!--end::Input catalog-->
														</div>
														<!--end::Card header-->
													</div>
													<!--end::Variations-->
												</div>
											</div>
											<!--end::Tab pane-->
											<!--begin::Tab pane-->
											<div class="tab-pane fade d-none" id="kt_ecommerce_add_product_reviews" role="tab-panel">
												<div class="d-flex flex-column gap-7 gap-lg-10">
													<!--begin::Reviews-->
													<div class="card card-flush py-4">
														<!--begin::Card header-->
														<div class="card-header">
															<!--begin::Card title-->
															<div class="card-title">
																<h2>Customer Reviews</h2>
															</div>
															<!--end::Card title-->
															<!--begin::Card toolbar-->
															<div class="card-toolbar">
																<!--begin::Rating label-->
																<span class="fw-bold me-5">Overall Rating:</span>
																<!--end::Rating label-->
																<!--begin::Overall rating-->
																<div class="rating">
																	<div class="rating-label checked">
																		<!--begin::Svg Icon | path: icons/duotune/general/gen029.svg-->
																		<span class="svg-icon svg-icon-2">
																			<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																				<path d="M11.1359 4.48359C11.5216 3.82132 12.4784 3.82132 12.8641 4.48359L15.011 8.16962C15.1523 8.41222 15.3891 8.58425 15.6635 8.64367L19.8326 9.54646C20.5816 9.70867 20.8773 10.6186 20.3666 11.1901L17.5244 14.371C17.3374 14.5803 17.2469 14.8587 17.2752 15.138L17.7049 19.382C17.7821 20.1445 17.0081 20.7069 16.3067 20.3978L12.4032 18.6777C12.1463 18.5645 11.8537 18.5645 11.5968 18.6777L7.69326 20.3978C6.99192 20.7069 6.21789 20.1445 6.2951 19.382L6.7248 15.138C6.75308 14.8587 6.66264 14.5803 6.47558 14.371L3.63339 11.1901C3.12273 10.6186 3.41838 9.70867 4.16744 9.54646L8.3365 8.64367C8.61089 8.58425 8.84767 8.41222 8.98897 8.16962L11.1359 4.48359Z" fill="currentColor" />
																			</svg>
																		</span>
																		<!--end::Svg Icon-->
																	</div>
																	<div class="rating-label checked">
																		<!--begin::Svg Icon | path: icons/duotune/general/gen029.svg-->
																		<span class="svg-icon svg-icon-2">
																			<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																				<path d="M11.1359 4.48359C11.5216 3.82132 12.4784 3.82132 12.8641 4.48359L15.011 8.16962C15.1523 8.41222 15.3891 8.58425 15.6635 8.64367L19.8326 9.54646C20.5816 9.70867 20.8773 10.6186 20.3666 11.1901L17.5244 14.371C17.3374 14.5803 17.2469 14.8587 17.2752 15.138L17.7049 19.382C17.7821 20.1445 17.0081 20.7069 16.3067 20.3978L12.4032 18.6777C12.1463 18.5645 11.8537 18.5645 11.5968 18.6777L7.69326 20.3978C6.99192 20.7069 6.21789 20.1445 6.2951 19.382L6.7248 15.138C6.75308 14.8587 6.66264 14.5803 6.47558 14.371L3.63339 11.1901C3.12273 10.6186 3.41838 9.70867 4.16744 9.54646L8.3365 8.64367C8.61089 8.58425 8.84767 8.41222 8.98897 8.16962L11.1359 4.48359Z" fill="currentColor" />
																			</svg>
																		</span>
																		<!--end::Svg Icon-->
																	</div>
																	<div class="rating-label checked">
																		<!--begin::Svg Icon | path: icons/duotune/general/gen029.svg-->
																		<span class="svg-icon svg-icon-2">
																			<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																				<path d="M11.1359 4.48359C11.5216 3.82132 12.4784 3.82132 12.8641 4.48359L15.011 8.16962C15.1523 8.41222 15.3891 8.58425 15.6635 8.64367L19.8326 9.54646C20.5816 9.70867 20.8773 10.6186 20.3666 11.1901L17.5244 14.371C17.3374 14.5803 17.2469 14.8587 17.2752 15.138L17.7049 19.382C17.7821 20.1445 17.0081 20.7069 16.3067 20.3978L12.4032 18.6777C12.1463 18.5645 11.8537 18.5645 11.5968 18.6777L7.69326 20.3978C6.99192 20.7069 6.21789 20.1445 6.2951 19.382L6.7248 15.138C6.75308 14.8587 6.66264 14.5803 6.47558 14.371L3.63339 11.1901C3.12273 10.6186 3.41838 9.70867 4.16744 9.54646L8.3365 8.64367C8.61089 8.58425 8.84767 8.41222 8.98897 8.16962L11.1359 4.48359Z" fill="currentColor" />
																			</svg>
																		</span>
																		<!--end::Svg Icon-->
																	</div>
																	<div class="rating-label checked">
																		<!--begin::Svg Icon | path: icons/duotune/general/gen029.svg-->
																		<span class="svg-icon svg-icon-2">
																			<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																				<path d="M11.1359 4.48359C11.5216 3.82132 12.4784 3.82132 12.8641 4.48359L15.011 8.16962C15.1523 8.41222 15.3891 8.58425 15.6635 8.64367L19.8326 9.54646C20.5816 9.70867 20.8773 10.6186 20.3666 11.1901L17.5244 14.371C17.3374 14.5803 17.2469 14.8587 17.2752 15.138L17.7049 19.382C17.7821 20.1445 17.0081 20.7069 16.3067 20.3978L12.4032 18.6777C12.1463 18.5645 11.8537 18.5645 11.5968 18.6777L7.69326 20.3978C6.99192 20.7069 6.21789 20.1445 6.2951 19.382L6.7248 15.138C6.75308 14.8587 6.66264 14.5803 6.47558 14.371L3.63339 11.1901C3.12273 10.6186 3.41838 9.70867 4.16744 9.54646L8.3365 8.64367C8.61089 8.58425 8.84767 8.41222 8.98897 8.16962L11.1359 4.48359Z" fill="currentColor" />
																			</svg>
																		</span>
																		<!--end::Svg Icon-->
																	</div>
																	<div class="rating-label">
																		<!--begin::Svg Icon | path: icons/duotune/general/gen029.svg-->
																		<span class="svg-icon svg-icon-2">
																			<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																				<path d="M11.1359 4.48359C11.5216 3.82132 12.4784 3.82132 12.8641 4.48359L15.011 8.16962C15.1523 8.41222 15.3891 8.58425 15.6635 8.64367L19.8326 9.54646C20.5816 9.70867 20.8773 10.6186 20.3666 11.1901L17.5244 14.371C17.3374 14.5803 17.2469 14.8587 17.2752 15.138L17.7049 19.382C17.7821 20.1445 17.0081 20.7069 16.3067 20.3978L12.4032 18.6777C12.1463 18.5645 11.8537 18.5645 11.5968 18.6777L7.69326 20.3978C6.99192 20.7069 6.21789 20.1445 6.2951 19.382L6.7248 15.138C6.75308 14.8587 6.66264 14.5803 6.47558 14.371L3.63339 11.1901C3.12273 10.6186 3.41838 9.70867 4.16744 9.54646L8.3365 8.64367C8.61089 8.58425 8.84767 8.41222 8.98897 8.16962L11.1359 4.48359Z" fill="currentColor" />
																			</svg>
																		</span>
																		<!--end::Svg Icon-->
																	</div>
																</div>
																<!--end::Overall rating-->
															</div>
															<!--end::Card toolbar-->
														</div>
														<!--end::Card header-->
														<!--begin::Card body-->
														<div class="card-body pt-0">
															<!--begin::Table-->
															<table class="table table-row-dashed fs-6 gy-5 my-0" id="kt_ecommerce_add_product_reviews">
																<!--begin::Table head-->
																<thead>
																	<tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
																		<th class="w-10px pe-2">
																			<div class="form-check form-check-sm form-check-custom form-check-solid me-3">
																				<input class="form-check-input" type="checkbox" data-kt-check="true" data-kt-check-target="#kt_ecommerce_add_product_reviews .form-check-input" value="1" />
																			</div>
																		</th>
																		<th class="min-w-125px">Rating</th>
																		<th class="min-w-175px">Customer</th>
																		<th class="min-w-175px">Comment</th>
																		<th class="min-w-100px text-end fs-7">Date</th>
																	</tr>
																</thead>
																<!--end::Table head-->
																<!--begin::Table body-->
																<tbody>
																	<tr>
																		<td>
																			<!--begin::Checkbox-->
																			<div class="form-check form-check-sm form-check-custom form-check-solid mt-1">
																				<input class="form-check-input" type="checkbox" value="1" />
																			</div>
																			<!--end::Checkbox-->
																		</td>
																		<td data-order="rating-5">
																			<!--begin::Rating-->
																			<div class="rating">
																				<div class="rating-label checked">
																					<!--begin::Svg Icon | path: icons/duotune/general/gen029.svg-->
																					<span class="svg-icon svg-icon-2">
																						<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																							<path d="M11.1359 4.48359C11.5216 3.82132 12.4784 3.82132 12.8641 4.48359L15.011 8.16962C15.1523 8.41222 15.3891 8.58425 15.6635 8.64367L19.8326 9.54646C20.5816 9.70867 20.8773 10.6186 20.3666 11.1901L17.5244 14.371C17.3374 14.5803 17.2469 14.8587 17.2752 15.138L17.7049 19.382C17.7821 20.1445 17.0081 20.7069 16.3067 20.3978L12.4032 18.6777C12.1463 18.5645 11.8537 18.5645 11.5968 18.6777L7.69326 20.3978C6.99192 20.7069 6.21789 20.1445 6.2951 19.382L6.7248 15.138C6.75308 14.8587 6.66264 14.5803 6.47558 14.371L3.63339 11.1901C3.12273 10.6186 3.41838 9.70867 4.16744 9.54646L8.3365 8.64367C8.61089 8.58425 8.84767 8.41222 8.98897 8.16962L11.1359 4.48359Z" fill="currentColor" />
																						</svg>
																					</span>
																					<!--end::Svg Icon-->
																				</div>
																				<div class="rating-label checked">
																					<!--begin::Svg Icon | path: icons/duotune/general/gen029.svg-->
																					<span class="svg-icon svg-icon-2">
																						<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																							<path d="M11.1359 4.48359C11.5216 3.82132 12.4784 3.82132 12.8641 4.48359L15.011 8.16962C15.1523 8.41222 15.3891 8.58425 15.6635 8.64367L19.8326 9.54646C20.5816 9.70867 20.8773 10.6186 20.3666 11.1901L17.5244 14.371C17.3374 14.5803 17.2469 14.8587 17.2752 15.138L17.7049 19.382C17.7821 20.1445 17.0081 20.7069 16.3067 20.3978L12.4032 18.6777C12.1463 18.5645 11.8537 18.5645 11.5968 18.6777L7.69326 20.3978C6.99192 20.7069 6.21789 20.1445 6.2951 19.382L6.7248 15.138C6.75308 14.8587 6.66264 14.5803 6.47558 14.371L3.63339 11.1901C3.12273 10.6186 3.41838 9.70867 4.16744 9.54646L8.3365 8.64367C8.61089 8.58425 8.84767 8.41222 8.98897 8.16962L11.1359 4.48359Z" fill="currentColor" />
																						</svg>
																					</span>
																					<!--end::Svg Icon-->
																				</div>
																				<div class="rating-label checked">
																					<!--begin::Svg Icon | path: icons/duotune/general/gen029.svg-->
																					<span class="svg-icon svg-icon-2">
																						<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																							<path d="M11.1359 4.48359C11.5216 3.82132 12.4784 3.82132 12.8641 4.48359L15.011 8.16962C15.1523 8.41222 15.3891 8.58425 15.6635 8.64367L19.8326 9.54646C20.5816 9.70867 20.8773 10.6186 20.3666 11.1901L17.5244 14.371C17.3374 14.5803 17.2469 14.8587 17.2752 15.138L17.7049 19.382C17.7821 20.1445 17.0081 20.7069 16.3067 20.3978L12.4032 18.6777C12.1463 18.5645 11.8537 18.5645 11.5968 18.6777L7.69326 20.3978C6.99192 20.7069 6.21789 20.1445 6.2951 19.382L6.7248 15.138C6.75308 14.8587 6.66264 14.5803 6.47558 14.371L3.63339 11.1901C3.12273 10.6186 3.41838 9.70867 4.16744 9.54646L8.3365 8.64367C8.61089 8.58425 8.84767 8.41222 8.98897 8.16962L11.1359 4.48359Z" fill="currentColor" />
																						</svg>
																					</span>
																					<!--end::Svg Icon-->
																				</div>
																				<div class="rating-label checked">
																					<!--begin::Svg Icon | path: icons/duotune/general/gen029.svg-->
																					<span class="svg-icon svg-icon-2">
																						<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																							<path d="M11.1359 4.48359C11.5216 3.82132 12.4784 3.82132 12.8641 4.48359L15.011 8.16962C15.1523 8.41222 15.3891 8.58425 15.6635 8.64367L19.8326 9.54646C20.5816 9.70867 20.8773 10.6186 20.3666 11.1901L17.5244 14.371C17.3374 14.5803 17.2469 14.8587 17.2752 15.138L17.7049 19.382C17.7821 20.1445 17.0081 20.7069 16.3067 20.3978L12.4032 18.6777C12.1463 18.5645 11.8537 18.5645 11.5968 18.6777L7.69326 20.3978C6.99192 20.7069 6.21789 20.1445 6.2951 19.382L6.7248 15.138C6.75308 14.8587 6.66264 14.5803 6.47558 14.371L3.63339 11.1901C3.12273 10.6186 3.41838 9.70867 4.16744 9.54646L8.3365 8.64367C8.61089 8.58425 8.84767 8.41222 8.98897 8.16962L11.1359 4.48359Z" fill="currentColor" />
																						</svg>
																					</span>
																					<!--end::Svg Icon-->
																				</div>
																				<div class="rating-label checked">
																					<!--begin::Svg Icon | path: icons/duotune/general/gen029.svg-->
																					<span class="svg-icon svg-icon-2">
																						<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																							<path d="M11.1359 4.48359C11.5216 3.82132 12.4784 3.82132 12.8641 4.48359L15.011 8.16962C15.1523 8.41222 15.3891 8.58425 15.6635 8.64367L19.8326 9.54646C20.5816 9.70867 20.8773 10.6186 20.3666 11.1901L17.5244 14.371C17.3374 14.5803 17.2469 14.8587 17.2752 15.138L17.7049 19.382C17.7821 20.1445 17.0081 20.7069 16.3067 20.3978L12.4032 18.6777C12.1463 18.5645 11.8537 18.5645 11.5968 18.6777L7.69326 20.3978C6.99192 20.7069 6.21789 20.1445 6.2951 19.382L6.7248 15.138C6.75308 14.8587 6.66264 14.5803 6.47558 14.371L3.63339 11.1901C3.12273 10.6186 3.41838 9.70867 4.16744 9.54646L8.3365 8.64367C8.61089 8.58425 8.84767 8.41222 8.98897 8.16962L11.1359 4.48359Z" fill="currentColor" />
																						</svg>
																					</span>
																					<!--end::Svg Icon-->
																				</div>
																			</div>
																			<!--end::Rating-->
																		</td>
																		<td>
																			<a href="../../inbox/reply.html" class="d-flex text-dark text-gray-800 text-hover-primary">
																				<!--begin::Avatar-->
																				<div class="symbol symbol-circle symbol-25px me-3">
																					<div class="symbol-label bg-light-danger">
																						<span class="text-danger">M</span>
																					</div>
																				</div>
																				<!--end::Avatar-->
																				<!--begin::Name-->
																				<span class="fw-bold">Melody Macy</span>
																				<!--end::Name-->
																			</a>
																		</td>
																		<td class="text-gray-600 fw-bold">I like this design</td>
																		<td class="text-end">
																			<span class="fw-semibold text-muted">Today</span>
																		</td>
																	</tr>
																	<tr>
																		<td>
																			<!--begin::Checkbox-->
																			<div class="form-check form-check-sm form-check-custom form-check-solid mt-1">
																				<input class="form-check-input" type="checkbox" value="1" />
																			</div>
																			<!--end::Checkbox-->
																		</td>
																		<td data-order="rating-5">
																			<!--begin::Rating-->
																			<div class="rating">
																				<div class="rating-label checked">
																					<!--begin::Svg Icon | path: icons/duotune/general/gen029.svg-->
																					<span class="svg-icon svg-icon-2">
																						<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																							<path d="M11.1359 4.48359C11.5216 3.82132 12.4784 3.82132 12.8641 4.48359L15.011 8.16962C15.1523 8.41222 15.3891 8.58425 15.6635 8.64367L19.8326 9.54646C20.5816 9.70867 20.8773 10.6186 20.3666 11.1901L17.5244 14.371C17.3374 14.5803 17.2469 14.8587 17.2752 15.138L17.7049 19.382C17.7821 20.1445 17.0081 20.7069 16.3067 20.3978L12.4032 18.6777C12.1463 18.5645 11.8537 18.5645 11.5968 18.6777L7.69326 20.3978C6.99192 20.7069 6.21789 20.1445 6.2951 19.382L6.7248 15.138C6.75308 14.8587 6.66264 14.5803 6.47558 14.371L3.63339 11.1901C3.12273 10.6186 3.41838 9.70867 4.16744 9.54646L8.3365 8.64367C8.61089 8.58425 8.84767 8.41222 8.98897 8.16962L11.1359 4.48359Z" fill="currentColor" />
																						</svg>
																					</span>
																					<!--end::Svg Icon-->
																				</div>
																				<div class="rating-label checked">
																					<!--begin::Svg Icon | path: icons/duotune/general/gen029.svg-->
																					<span class="svg-icon svg-icon-2">
																						<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																							<path d="M11.1359 4.48359C11.5216 3.82132 12.4784 3.82132 12.8641 4.48359L15.011 8.16962C15.1523 8.41222 15.3891 8.58425 15.6635 8.64367L19.8326 9.54646C20.5816 9.70867 20.8773 10.6186 20.3666 11.1901L17.5244 14.371C17.3374 14.5803 17.2469 14.8587 17.2752 15.138L17.7049 19.382C17.7821 20.1445 17.0081 20.7069 16.3067 20.3978L12.4032 18.6777C12.1463 18.5645 11.8537 18.5645 11.5968 18.6777L7.69326 20.3978C6.99192 20.7069 6.21789 20.1445 6.2951 19.382L6.7248 15.138C6.75308 14.8587 6.66264 14.5803 6.47558 14.371L3.63339 11.1901C3.12273 10.6186 3.41838 9.70867 4.16744 9.54646L8.3365 8.64367C8.61089 8.58425 8.84767 8.41222 8.98897 8.16962L11.1359 4.48359Z" fill="currentColor" />
																						</svg>
																					</span>
																					<!--end::Svg Icon-->
																				</div>
																				<div class="rating-label checked">
																					<!--begin::Svg Icon | path: icons/duotune/general/gen029.svg-->
																					<span class="svg-icon svg-icon-2">
																						<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																							<path d="M11.1359 4.48359C11.5216 3.82132 12.4784 3.82132 12.8641 4.48359L15.011 8.16962C15.1523 8.41222 15.3891 8.58425 15.6635 8.64367L19.8326 9.54646C20.5816 9.70867 20.8773 10.6186 20.3666 11.1901L17.5244 14.371C17.3374 14.5803 17.2469 14.8587 17.2752 15.138L17.7049 19.382C17.7821 20.1445 17.0081 20.7069 16.3067 20.3978L12.4032 18.6777C12.1463 18.5645 11.8537 18.5645 11.5968 18.6777L7.69326 20.3978C6.99192 20.7069 6.21789 20.1445 6.2951 19.382L6.7248 15.138C6.75308 14.8587 6.66264 14.5803 6.47558 14.371L3.63339 11.1901C3.12273 10.6186 3.41838 9.70867 4.16744 9.54646L8.3365 8.64367C8.61089 8.58425 8.84767 8.41222 8.98897 8.16962L11.1359 4.48359Z" fill="currentColor" />
																						</svg>
																					</span>
																					<!--end::Svg Icon-->
																				</div>
																				<div class="rating-label checked">
																					<!--begin::Svg Icon | path: icons/duotune/general/gen029.svg-->
																					<span class="svg-icon svg-icon-2">
																						<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																							<path d="M11.1359 4.48359C11.5216 3.82132 12.4784 3.82132 12.8641 4.48359L15.011 8.16962C15.1523 8.41222 15.3891 8.58425 15.6635 8.64367L19.8326 9.54646C20.5816 9.70867 20.8773 10.6186 20.3666 11.1901L17.5244 14.371C17.3374 14.5803 17.2469 14.8587 17.2752 15.138L17.7049 19.382C17.7821 20.1445 17.0081 20.7069 16.3067 20.3978L12.4032 18.6777C12.1463 18.5645 11.8537 18.5645 11.5968 18.6777L7.69326 20.3978C6.99192 20.7069 6.21789 20.1445 6.2951 19.382L6.7248 15.138C6.75308 14.8587 6.66264 14.5803 6.47558 14.371L3.63339 11.1901C3.12273 10.6186 3.41838 9.70867 4.16744 9.54646L8.3365 8.64367C8.61089 8.58425 8.84767 8.41222 8.98897 8.16962L11.1359 4.48359Z" fill="currentColor" />
																						</svg>
																					</span>
																					<!--end::Svg Icon-->
																				</div>
																				<div class="rating-label checked">
																					<!--begin::Svg Icon | path: icons/duotune/general/gen029.svg-->
																					<span class="svg-icon svg-icon-2">
																						<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																							<path d="M11.1359 4.48359C11.5216 3.82132 12.4784 3.82132 12.8641 4.48359L15.011 8.16962C15.1523 8.41222 15.3891 8.58425 15.6635 8.64367L19.8326 9.54646C20.5816 9.70867 20.8773 10.6186 20.3666 11.1901L17.5244 14.371C17.3374 14.5803 17.2469 14.8587 17.2752 15.138L17.7049 19.382C17.7821 20.1445 17.0081 20.7069 16.3067 20.3978L12.4032 18.6777C12.1463 18.5645 11.8537 18.5645 11.5968 18.6777L7.69326 20.3978C6.99192 20.7069 6.21789 20.1445 6.2951 19.382L6.7248 15.138C6.75308 14.8587 6.66264 14.5803 6.47558 14.371L3.63339 11.1901C3.12273 10.6186 3.41838 9.70867 4.16744 9.54646L8.3365 8.64367C8.61089 8.58425 8.84767 8.41222 8.98897 8.16962L11.1359 4.48359Z" fill="currentColor" />
																						</svg>
																					</span>
																					<!--end::Svg Icon-->
																				</div>
																			</div>
																			<!--end::Rating-->
																		</td>
																		<td>
																			<a href="../../inbox/reply.html" class="d-flex text-dark text-gray-800 text-hover-primary">
																				<!--begin::Avatar-->
																				<div class="symbol symbol-circle symbol-25px me-3">
																					<span class="symbol-label" style="background-image:url(<?= base_url() ?>assets/media/avatars/300-1.jpg)"></span>
																				</div>
																				<!--end::Avatar-->
																				<!--begin::Name-->
																				<span class="fw-bold">Max Smith</span>
																				<!--end::Name-->
																			</a>
																		</td>
																		<td class="text-gray-600 fw-bold">Good product for outdoors or indoors</td>
																		<td class="text-end">
																			<span class="fw-semibold text-muted">day ago</span>
																		</td>
																	</tr>
																	<tr>
																		<td>
																			<!--begin::Checkbox-->
																			<div class="form-check form-check-sm form-check-custom form-check-solid mt-1">
																				<input class="form-check-input" type="checkbox" value="1" />
																			</div>
																			<!--end::Checkbox-->
																		</td>
																		<td data-order="rating-4">
																			<!--begin::Rating-->
																			<div class="rating">
																				<div class="rating-label checked">
																					<!--begin::Svg Icon | path: icons/duotune/general/gen029.svg-->
																					<span class="svg-icon svg-icon-2">
																						<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																							<path d="M11.1359 4.48359C11.5216 3.82132 12.4784 3.82132 12.8641 4.48359L15.011 8.16962C15.1523 8.41222 15.3891 8.58425 15.6635 8.64367L19.8326 9.54646C20.5816 9.70867 20.8773 10.6186 20.3666 11.1901L17.5244 14.371C17.3374 14.5803 17.2469 14.8587 17.2752 15.138L17.7049 19.382C17.7821 20.1445 17.0081 20.7069 16.3067 20.3978L12.4032 18.6777C12.1463 18.5645 11.8537 18.5645 11.5968 18.6777L7.69326 20.3978C6.99192 20.7069 6.21789 20.1445 6.2951 19.382L6.7248 15.138C6.75308 14.8587 6.66264 14.5803 6.47558 14.371L3.63339 11.1901C3.12273 10.6186 3.41838 9.70867 4.16744 9.54646L8.3365 8.64367C8.61089 8.58425 8.84767 8.41222 8.98897 8.16962L11.1359 4.48359Z" fill="currentColor" />
																						</svg>
																					</span>
																					<!--end::Svg Icon-->
																				</div>
																				<div class="rating-label checked">
																					<!--begin::Svg Icon | path: icons/duotune/general/gen029.svg-->
																					<span class="svg-icon svg-icon-2">
																						<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																							<path d="M11.1359 4.48359C11.5216 3.82132 12.4784 3.82132 12.8641 4.48359L15.011 8.16962C15.1523 8.41222 15.3891 8.58425 15.6635 8.64367L19.8326 9.54646C20.5816 9.70867 20.8773 10.6186 20.3666 11.1901L17.5244 14.371C17.3374 14.5803 17.2469 14.8587 17.2752 15.138L17.7049 19.382C17.7821 20.1445 17.0081 20.7069 16.3067 20.3978L12.4032 18.6777C12.1463 18.5645 11.8537 18.5645 11.5968 18.6777L7.69326 20.3978C6.99192 20.7069 6.21789 20.1445 6.2951 19.382L6.7248 15.138C6.75308 14.8587 6.66264 14.5803 6.47558 14.371L3.63339 11.1901C3.12273 10.6186 3.41838 9.70867 4.16744 9.54646L8.3365 8.64367C8.61089 8.58425 8.84767 8.41222 8.98897 8.16962L11.1359 4.48359Z" fill="currentColor" />
																						</svg>
																					</span>
																					<!--end::Svg Icon-->
																				</div>
																				<div class="rating-label checked">
																					<!--begin::Svg Icon | path: icons/duotune/general/gen029.svg-->
																					<span class="svg-icon svg-icon-2">
																						<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																							<path d="M11.1359 4.48359C11.5216 3.82132 12.4784 3.82132 12.8641 4.48359L15.011 8.16962C15.1523 8.41222 15.3891 8.58425 15.6635 8.64367L19.8326 9.54646C20.5816 9.70867 20.8773 10.6186 20.3666 11.1901L17.5244 14.371C17.3374 14.5803 17.2469 14.8587 17.2752 15.138L17.7049 19.382C17.7821 20.1445 17.0081 20.7069 16.3067 20.3978L12.4032 18.6777C12.1463 18.5645 11.8537 18.5645 11.5968 18.6777L7.69326 20.3978C6.99192 20.7069 6.21789 20.1445 6.2951 19.382L6.7248 15.138C6.75308 14.8587 6.66264 14.5803 6.47558 14.371L3.63339 11.1901C3.12273 10.6186 3.41838 9.70867 4.16744 9.54646L8.3365 8.64367C8.61089 8.58425 8.84767 8.41222 8.98897 8.16962L11.1359 4.48359Z" fill="currentColor" />
																						</svg>
																					</span>
																					<!--end::Svg Icon-->
																				</div>
																				<div class="rating-label checked">
																					<!--begin::Svg Icon | path: icons/duotune/general/gen029.svg-->
																					<span class="svg-icon svg-icon-2">
																						<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																							<path d="M11.1359 4.48359C11.5216 3.82132 12.4784 3.82132 12.8641 4.48359L15.011 8.16962C15.1523 8.41222 15.3891 8.58425 15.6635 8.64367L19.8326 9.54646C20.5816 9.70867 20.8773 10.6186 20.3666 11.1901L17.5244 14.371C17.3374 14.5803 17.2469 14.8587 17.2752 15.138L17.7049 19.382C17.7821 20.1445 17.0081 20.7069 16.3067 20.3978L12.4032 18.6777C12.1463 18.5645 11.8537 18.5645 11.5968 18.6777L7.69326 20.3978C6.99192 20.7069 6.21789 20.1445 6.2951 19.382L6.7248 15.138C6.75308 14.8587 6.66264 14.5803 6.47558 14.371L3.63339 11.1901C3.12273 10.6186 3.41838 9.70867 4.16744 9.54646L8.3365 8.64367C8.61089 8.58425 8.84767 8.41222 8.98897 8.16962L11.1359 4.48359Z" fill="currentColor" />
																						</svg>
																					</span>
																					<!--end::Svg Icon-->
																				</div>
																				<div class="rating-label">
																					<!--begin::Svg Icon | path: icons/duotune/general/gen029.svg-->
																					<span class="svg-icon svg-icon-2">
																						<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																							<path d="M11.1359 4.48359C11.5216 3.82132 12.4784 3.82132 12.8641 4.48359L15.011 8.16962C15.1523 8.41222 15.3891 8.58425 15.6635 8.64367L19.8326 9.54646C20.5816 9.70867 20.8773 10.6186 20.3666 11.1901L17.5244 14.371C17.3374 14.5803 17.2469 14.8587 17.2752 15.138L17.7049 19.382C17.7821 20.1445 17.0081 20.7069 16.3067 20.3978L12.4032 18.6777C12.1463 18.5645 11.8537 18.5645 11.5968 18.6777L7.69326 20.3978C6.99192 20.7069 6.21789 20.1445 6.2951 19.382L6.7248 15.138C6.75308 14.8587 6.66264 14.5803 6.47558 14.371L3.63339 11.1901C3.12273 10.6186 3.41838 9.70867 4.16744 9.54646L8.3365 8.64367C8.61089 8.58425 8.84767 8.41222 8.98897 8.16962L11.1359 4.48359Z" fill="currentColor" />
																						</svg>
																					</span>
																					<!--end::Svg Icon-->
																				</div>
																			</div>
																			<!--end::Rating-->
																		</td>
																		<td>
																			<a href="../../inbox/reply.html" class="d-flex text-dark text-gray-800 text-hover-primary">
																				<!--begin::Avatar-->
																				<div class="symbol symbol-circle symbol-25px me-3">
																					<span class="symbol-label" style="background-image:url(<?= base_url() ?>assets/media/avatars/300-5.jpg)"></span>
																				</div>
																				<!--end::Avatar-->
																				<!--begin::Name-->
																				<span class="fw-bold">Sean Bean</span>
																				<!--end::Name-->
																			</a>
																		</td>
																		<td class="text-gray-600 fw-bold">Awesome quality with great materials used, but could be more comfortable</td>
																		<td class="text-end">
																			<span class="fw-semibold text-muted">11:20 PM</span>
																		</td>
																	</tr>
																	<tr>
																		<td>
																			<!--begin::Checkbox-->
																			<div class="form-check form-check-sm form-check-custom form-check-solid mt-1">
																				<input class="form-check-input" type="checkbox" value="1" />
																			</div>
																			<!--end::Checkbox-->
																		</td>
																		<td data-order="rating-5">
																			<!--begin::Rating-->
																			<div class="rating">
																				<div class="rating-label checked">
																					<!--begin::Svg Icon | path: icons/duotune/general/gen029.svg-->
																					<span class="svg-icon svg-icon-2">
																						<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																							<path d="M11.1359 4.48359C11.5216 3.82132 12.4784 3.82132 12.8641 4.48359L15.011 8.16962C15.1523 8.41222 15.3891 8.58425 15.6635 8.64367L19.8326 9.54646C20.5816 9.70867 20.8773 10.6186 20.3666 11.1901L17.5244 14.371C17.3374 14.5803 17.2469 14.8587 17.2752 15.138L17.7049 19.382C17.7821 20.1445 17.0081 20.7069 16.3067 20.3978L12.4032 18.6777C12.1463 18.5645 11.8537 18.5645 11.5968 18.6777L7.69326 20.3978C6.99192 20.7069 6.21789 20.1445 6.2951 19.382L6.7248 15.138C6.75308 14.8587 6.66264 14.5803 6.47558 14.371L3.63339 11.1901C3.12273 10.6186 3.41838 9.70867 4.16744 9.54646L8.3365 8.64367C8.61089 8.58425 8.84767 8.41222 8.98897 8.16962L11.1359 4.48359Z" fill="currentColor" />
																						</svg>
																					</span>
																					<!--end::Svg Icon-->
																				</div>
																				<div class="rating-label checked">
																					<!--begin::Svg Icon | path: icons/duotune/general/gen029.svg-->
																					<span class="svg-icon svg-icon-2">
																						<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																							<path d="M11.1359 4.48359C11.5216 3.82132 12.4784 3.82132 12.8641 4.48359L15.011 8.16962C15.1523 8.41222 15.3891 8.58425 15.6635 8.64367L19.8326 9.54646C20.5816 9.70867 20.8773 10.6186 20.3666 11.1901L17.5244 14.371C17.3374 14.5803 17.2469 14.8587 17.2752 15.138L17.7049 19.382C17.7821 20.1445 17.0081 20.7069 16.3067 20.3978L12.4032 18.6777C12.1463 18.5645 11.8537 18.5645 11.5968 18.6777L7.69326 20.3978C6.99192 20.7069 6.21789 20.1445 6.2951 19.382L6.7248 15.138C6.75308 14.8587 6.66264 14.5803 6.47558 14.371L3.63339 11.1901C3.12273 10.6186 3.41838 9.70867 4.16744 9.54646L8.3365 8.64367C8.61089 8.58425 8.84767 8.41222 8.98897 8.16962L11.1359 4.48359Z" fill="currentColor" />
																						</svg>
																					</span>
																					<!--end::Svg Icon-->
																				</div>
																				<div class="rating-label checked">
																					<!--begin::Svg Icon | path: icons/duotune/general/gen029.svg-->
																					<span class="svg-icon svg-icon-2">
																						<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																							<path d="M11.1359 4.48359C11.5216 3.82132 12.4784 3.82132 12.8641 4.48359L15.011 8.16962C15.1523 8.41222 15.3891 8.58425 15.6635 8.64367L19.8326 9.54646C20.5816 9.70867 20.8773 10.6186 20.3666 11.1901L17.5244 14.371C17.3374 14.5803 17.2469 14.8587 17.2752 15.138L17.7049 19.382C17.7821 20.1445 17.0081 20.7069 16.3067 20.3978L12.4032 18.6777C12.1463 18.5645 11.8537 18.5645 11.5968 18.6777L7.69326 20.3978C6.99192 20.7069 6.21789 20.1445 6.2951 19.382L6.7248 15.138C6.75308 14.8587 6.66264 14.5803 6.47558 14.371L3.63339 11.1901C3.12273 10.6186 3.41838 9.70867 4.16744 9.54646L8.3365 8.64367C8.61089 8.58425 8.84767 8.41222 8.98897 8.16962L11.1359 4.48359Z" fill="currentColor" />
																						</svg>
																					</span>
																					<!--end::Svg Icon-->
																				</div>
																				<div class="rating-label checked">
																					<!--begin::Svg Icon | path: icons/duotune/general/gen029.svg-->
																					<span class="svg-icon svg-icon-2">
																						<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																							<path d="M11.1359 4.48359C11.5216 3.82132 12.4784 3.82132 12.8641 4.48359L15.011 8.16962C15.1523 8.41222 15.3891 8.58425 15.6635 8.64367L19.8326 9.54646C20.5816 9.70867 20.8773 10.6186 20.3666 11.1901L17.5244 14.371C17.3374 14.5803 17.2469 14.8587 17.2752 15.138L17.7049 19.382C17.7821 20.1445 17.0081 20.7069 16.3067 20.3978L12.4032 18.6777C12.1463 18.5645 11.8537 18.5645 11.5968 18.6777L7.69326 20.3978C6.99192 20.7069 6.21789 20.1445 6.2951 19.382L6.7248 15.138C6.75308 14.8587 6.66264 14.5803 6.47558 14.371L3.63339 11.1901C3.12273 10.6186 3.41838 9.70867 4.16744 9.54646L8.3365 8.64367C8.61089 8.58425 8.84767 8.41222 8.98897 8.16962L11.1359 4.48359Z" fill="currentColor" />
																						</svg>
																					</span>
																					<!--end::Svg Icon-->
																				</div>
																				<div class="rating-label checked">
																					<!--begin::Svg Icon | path: icons/duotune/general/gen029.svg-->
																					<span class="svg-icon svg-icon-2">
																						<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																							<path d="M11.1359 4.48359C11.5216 3.82132 12.4784 3.82132 12.8641 4.48359L15.011 8.16962C15.1523 8.41222 15.3891 8.58425 15.6635 8.64367L19.8326 9.54646C20.5816 9.70867 20.8773 10.6186 20.3666 11.1901L17.5244 14.371C17.3374 14.5803 17.2469 14.8587 17.2752 15.138L17.7049 19.382C17.7821 20.1445 17.0081 20.7069 16.3067 20.3978L12.4032 18.6777C12.1463 18.5645 11.8537 18.5645 11.5968 18.6777L7.69326 20.3978C6.99192 20.7069 6.21789 20.1445 6.2951 19.382L6.7248 15.138C6.75308 14.8587 6.66264 14.5803 6.47558 14.371L3.63339 11.1901C3.12273 10.6186 3.41838 9.70867 4.16744 9.54646L8.3365 8.64367C8.61089 8.58425 8.84767 8.41222 8.98897 8.16962L11.1359 4.48359Z" fill="currentColor" />
																						</svg>
																					</span>
																					<!--end::Svg Icon-->
																				</div>
																			</div>
																			<!--end::Rating-->
																		</td>
																		<td>
																			<a href="../../inbox/reply.html" class="d-flex text-dark text-gray-800 text-hover-primary">
																				<!--begin::Avatar-->
																				<div class="symbol symbol-circle symbol-25px me-3">
																					<span class="symbol-label" style="background-image:url(<?= base_url() ?>assets/media/avatars/300-25.jpg)"></span>
																				</div>
																				<!--end::Avatar-->
																				<!--begin::Name-->
																				<span class="fw-bold">Brian Cox</span>
																				<!--end::Name-->
																			</a>
																		</td>
																		<td class="text-gray-600 fw-bold">This is the best product I've ever used.</td>
																		<td class="text-end">
																			<span class="fw-semibold text-muted">2 days ago</span>
																		</td>
																	</tr>
																	<tr>
																		<td>
																			<!--begin::Checkbox-->
																			<div class="form-check form-check-sm form-check-custom form-check-solid mt-1">
																				<input class="form-check-input" type="checkbox" value="1" />
																			</div>
																			<!--end::Checkbox-->
																		</td>
																		<td data-order="rating-3">
																			<!--begin::Rating-->
																			<div class="rating">
																				<div class="rating-label checked">
																					<!--begin::Svg Icon | path: icons/duotune/general/gen029.svg-->
																					<span class="svg-icon svg-icon-2">
																						<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																							<path d="M11.1359 4.48359C11.5216 3.82132 12.4784 3.82132 12.8641 4.48359L15.011 8.16962C15.1523 8.41222 15.3891 8.58425 15.6635 8.64367L19.8326 9.54646C20.5816 9.70867 20.8773 10.6186 20.3666 11.1901L17.5244 14.371C17.3374 14.5803 17.2469 14.8587 17.2752 15.138L17.7049 19.382C17.7821 20.1445 17.0081 20.7069 16.3067 20.3978L12.4032 18.6777C12.1463 18.5645 11.8537 18.5645 11.5968 18.6777L7.69326 20.3978C6.99192 20.7069 6.21789 20.1445 6.2951 19.382L6.7248 15.138C6.75308 14.8587 6.66264 14.5803 6.47558 14.371L3.63339 11.1901C3.12273 10.6186 3.41838 9.70867 4.16744 9.54646L8.3365 8.64367C8.61089 8.58425 8.84767 8.41222 8.98897 8.16962L11.1359 4.48359Z" fill="currentColor" />
																						</svg>
																					</span>
																					<!--end::Svg Icon-->
																				</div>
																				<div class="rating-label checked">
																					<!--begin::Svg Icon | path: icons/duotune/general/gen029.svg-->
																					<span class="svg-icon svg-icon-2">
																						<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																							<path d="M11.1359 4.48359C11.5216 3.82132 12.4784 3.82132 12.8641 4.48359L15.011 8.16962C15.1523 8.41222 15.3891 8.58425 15.6635 8.64367L19.8326 9.54646C20.5816 9.70867 20.8773 10.6186 20.3666 11.1901L17.5244 14.371C17.3374 14.5803 17.2469 14.8587 17.2752 15.138L17.7049 19.382C17.7821 20.1445 17.0081 20.7069 16.3067 20.3978L12.4032 18.6777C12.1463 18.5645 11.8537 18.5645 11.5968 18.6777L7.69326 20.3978C6.99192 20.7069 6.21789 20.1445 6.2951 19.382L6.7248 15.138C6.75308 14.8587 6.66264 14.5803 6.47558 14.371L3.63339 11.1901C3.12273 10.6186 3.41838 9.70867 4.16744 9.54646L8.3365 8.64367C8.61089 8.58425 8.84767 8.41222 8.98897 8.16962L11.1359 4.48359Z" fill="currentColor" />
																						</svg>
																					</span>
																					<!--end::Svg Icon-->
																				</div>
																				<div class="rating-label checked">
																					<!--begin::Svg Icon | path: icons/duotune/general/gen029.svg-->
																					<span class="svg-icon svg-icon-2">
																						<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																							<path d="M11.1359 4.48359C11.5216 3.82132 12.4784 3.82132 12.8641 4.48359L15.011 8.16962C15.1523 8.41222 15.3891 8.58425 15.6635 8.64367L19.8326 9.54646C20.5816 9.70867 20.8773 10.6186 20.3666 11.1901L17.5244 14.371C17.3374 14.5803 17.2469 14.8587 17.2752 15.138L17.7049 19.382C17.7821 20.1445 17.0081 20.7069 16.3067 20.3978L12.4032 18.6777C12.1463 18.5645 11.8537 18.5645 11.5968 18.6777L7.69326 20.3978C6.99192 20.7069 6.21789 20.1445 6.2951 19.382L6.7248 15.138C6.75308 14.8587 6.66264 14.5803 6.47558 14.371L3.63339 11.1901C3.12273 10.6186 3.41838 9.70867 4.16744 9.54646L8.3365 8.64367C8.61089 8.58425 8.84767 8.41222 8.98897 8.16962L11.1359 4.48359Z" fill="currentColor" />
																						</svg>
																					</span>
																					<!--end::Svg Icon-->
																				</div>
																				<div class="rating-label">
																					<!--begin::Svg Icon | path: icons/duotune/general/gen029.svg-->
																					<span class="svg-icon svg-icon-2">
																						<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																							<path d="M11.1359 4.48359C11.5216 3.82132 12.4784 3.82132 12.8641 4.48359L15.011 8.16962C15.1523 8.41222 15.3891 8.58425 15.6635 8.64367L19.8326 9.54646C20.5816 9.70867 20.8773 10.6186 20.3666 11.1901L17.5244 14.371C17.3374 14.5803 17.2469 14.8587 17.2752 15.138L17.7049 19.382C17.7821 20.1445 17.0081 20.7069 16.3067 20.3978L12.4032 18.6777C12.1463 18.5645 11.8537 18.5645 11.5968 18.6777L7.69326 20.3978C6.99192 20.7069 6.21789 20.1445 6.2951 19.382L6.7248 15.138C6.75308 14.8587 6.66264 14.5803 6.47558 14.371L3.63339 11.1901C3.12273 10.6186 3.41838 9.70867 4.16744 9.54646L8.3365 8.64367C8.61089 8.58425 8.84767 8.41222 8.98897 8.16962L11.1359 4.48359Z" fill="currentColor" />
																						</svg>
																					</span>
																					<!--end::Svg Icon-->
																				</div>
																				<div class="rating-label">
																					<!--begin::Svg Icon | path: icons/duotune/general/gen029.svg-->
																					<span class="svg-icon svg-icon-2">
																						<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																							<path d="M11.1359 4.48359C11.5216 3.82132 12.4784 3.82132 12.8641 4.48359L15.011 8.16962C15.1523 8.41222 15.3891 8.58425 15.6635 8.64367L19.8326 9.54646C20.5816 9.70867 20.8773 10.6186 20.3666 11.1901L17.5244 14.371C17.3374 14.5803 17.2469 14.8587 17.2752 15.138L17.7049 19.382C17.7821 20.1445 17.0081 20.7069 16.3067 20.3978L12.4032 18.6777C12.1463 18.5645 11.8537 18.5645 11.5968 18.6777L7.69326 20.3978C6.99192 20.7069 6.21789 20.1445 6.2951 19.382L6.7248 15.138C6.75308 14.8587 6.66264 14.5803 6.47558 14.371L3.63339 11.1901C3.12273 10.6186 3.41838 9.70867 4.16744 9.54646L8.3365 8.64367C8.61089 8.58425 8.84767 8.41222 8.98897 8.16962L11.1359 4.48359Z" fill="currentColor" />
																						</svg>
																					</span>
																					<!--end::Svg Icon-->
																				</div>
																			</div>
																			<!--end::Rating-->
																		</td>
																		<td>
																			<a href="../../inbox/reply.html" class="d-flex text-dark text-gray-800 text-hover-primary">
																				<!--begin::Avatar-->
																				<div class="symbol symbol-circle symbol-25px me-3">
																					<div class="symbol-label bg-light-warning">
																						<span class="text-warning">C</span>
																					</div>
																				</div>
																				<!--end::Avatar-->
																				<!--begin::Name-->
																				<span class="fw-bold">Mikaela Collins</span>
																				<!--end::Name-->
																			</a>
																		</td>
																		<td class="text-gray-600 fw-bold">I thought it was just average, I prefer other brands</td>
																		<td class="text-end">
																			<span class="fw-semibold text-muted">July 25</span>
																		</td>
																	</tr>
																	<tr>
																		<td>
																			<!--begin::Checkbox-->
																			<div class="form-check form-check-sm form-check-custom form-check-solid mt-1">
																				<input class="form-check-input" type="checkbox" value="1" />
																			</div>
																			<!--end::Checkbox-->
																		</td>
																		<td data-order="rating-5">
																			<!--begin::Rating-->
																			<div class="rating">
																				<div class="rating-label checked">
																					<!--begin::Svg Icon | path: icons/duotune/general/gen029.svg-->
																					<span class="svg-icon svg-icon-2">
																						<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																							<path d="M11.1359 4.48359C11.5216 3.82132 12.4784 3.82132 12.8641 4.48359L15.011 8.16962C15.1523 8.41222 15.3891 8.58425 15.6635 8.64367L19.8326 9.54646C20.5816 9.70867 20.8773 10.6186 20.3666 11.1901L17.5244 14.371C17.3374 14.5803 17.2469 14.8587 17.2752 15.138L17.7049 19.382C17.7821 20.1445 17.0081 20.7069 16.3067 20.3978L12.4032 18.6777C12.1463 18.5645 11.8537 18.5645 11.5968 18.6777L7.69326 20.3978C6.99192 20.7069 6.21789 20.1445 6.2951 19.382L6.7248 15.138C6.75308 14.8587 6.66264 14.5803 6.47558 14.371L3.63339 11.1901C3.12273 10.6186 3.41838 9.70867 4.16744 9.54646L8.3365 8.64367C8.61089 8.58425 8.84767 8.41222 8.98897 8.16962L11.1359 4.48359Z" fill="currentColor" />
																						</svg>
																					</span>
																					<!--end::Svg Icon-->
																				</div>
																				<div class="rating-label checked">
																					<!--begin::Svg Icon | path: icons/duotune/general/gen029.svg-->
																					<span class="svg-icon svg-icon-2">
																						<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																							<path d="M11.1359 4.48359C11.5216 3.82132 12.4784 3.82132 12.8641 4.48359L15.011 8.16962C15.1523 8.41222 15.3891 8.58425 15.6635 8.64367L19.8326 9.54646C20.5816 9.70867 20.8773 10.6186 20.3666 11.1901L17.5244 14.371C17.3374 14.5803 17.2469 14.8587 17.2752 15.138L17.7049 19.382C17.7821 20.1445 17.0081 20.7069 16.3067 20.3978L12.4032 18.6777C12.1463 18.5645 11.8537 18.5645 11.5968 18.6777L7.69326 20.3978C6.99192 20.7069 6.21789 20.1445 6.2951 19.382L6.7248 15.138C6.75308 14.8587 6.66264 14.5803 6.47558 14.371L3.63339 11.1901C3.12273 10.6186 3.41838 9.70867 4.16744 9.54646L8.3365 8.64367C8.61089 8.58425 8.84767 8.41222 8.98897 8.16962L11.1359 4.48359Z" fill="currentColor" />
																						</svg>
																					</span>
																					<!--end::Svg Icon-->
																				</div>
																				<div class="rating-label checked">
																					<!--begin::Svg Icon | path: icons/duotune/general/gen029.svg-->
																					<span class="svg-icon svg-icon-2">
																						<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																							<path d="M11.1359 4.48359C11.5216 3.82132 12.4784 3.82132 12.8641 4.48359L15.011 8.16962C15.1523 8.41222 15.3891 8.58425 15.6635 8.64367L19.8326 9.54646C20.5816 9.70867 20.8773 10.6186 20.3666 11.1901L17.5244 14.371C17.3374 14.5803 17.2469 14.8587 17.2752 15.138L17.7049 19.382C17.7821 20.1445 17.0081 20.7069 16.3067 20.3978L12.4032 18.6777C12.1463 18.5645 11.8537 18.5645 11.5968 18.6777L7.69326 20.3978C6.99192 20.7069 6.21789 20.1445 6.2951 19.382L6.7248 15.138C6.75308 14.8587 6.66264 14.5803 6.47558 14.371L3.63339 11.1901C3.12273 10.6186 3.41838 9.70867 4.16744 9.54646L8.3365 8.64367C8.61089 8.58425 8.84767 8.41222 8.98897 8.16962L11.1359 4.48359Z" fill="currentColor" />
																						</svg>
																					</span>
																					<!--end::Svg Icon-->
																				</div>
																				<div class="rating-label checked">
																					<!--begin::Svg Icon | path: icons/duotune/general/gen029.svg-->
																					<span class="svg-icon svg-icon-2">
																						<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																							<path d="M11.1359 4.48359C11.5216 3.82132 12.4784 3.82132 12.8641 4.48359L15.011 8.16962C15.1523 8.41222 15.3891 8.58425 15.6635 8.64367L19.8326 9.54646C20.5816 9.70867 20.8773 10.6186 20.3666 11.1901L17.5244 14.371C17.3374 14.5803 17.2469 14.8587 17.2752 15.138L17.7049 19.382C17.7821 20.1445 17.0081 20.7069 16.3067 20.3978L12.4032 18.6777C12.1463 18.5645 11.8537 18.5645 11.5968 18.6777L7.69326 20.3978C6.99192 20.7069 6.21789 20.1445 6.2951 19.382L6.7248 15.138C6.75308 14.8587 6.66264 14.5803 6.47558 14.371L3.63339 11.1901C3.12273 10.6186 3.41838 9.70867 4.16744 9.54646L8.3365 8.64367C8.61089 8.58425 8.84767 8.41222 8.98897 8.16962L11.1359 4.48359Z" fill="currentColor" />
																						</svg>
																					</span>
																					<!--end::Svg Icon-->
																				</div>
																				<div class="rating-label checked">
																					<!--begin::Svg Icon | path: icons/duotune/general/gen029.svg-->
																					<span class="svg-icon svg-icon-2">
																						<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																							<path d="M11.1359 4.48359C11.5216 3.82132 12.4784 3.82132 12.8641 4.48359L15.011 8.16962C15.1523 8.41222 15.3891 8.58425 15.6635 8.64367L19.8326 9.54646C20.5816 9.70867 20.8773 10.6186 20.3666 11.1901L17.5244 14.371C17.3374 14.5803 17.2469 14.8587 17.2752 15.138L17.7049 19.382C17.7821 20.1445 17.0081 20.7069 16.3067 20.3978L12.4032 18.6777C12.1463 18.5645 11.8537 18.5645 11.5968 18.6777L7.69326 20.3978C6.99192 20.7069 6.21789 20.1445 6.2951 19.382L6.7248 15.138C6.75308 14.8587 6.66264 14.5803 6.47558 14.371L3.63339 11.1901C3.12273 10.6186 3.41838 9.70867 4.16744 9.54646L8.3365 8.64367C8.61089 8.58425 8.84767 8.41222 8.98897 8.16962L11.1359 4.48359Z" fill="currentColor" />
																						</svg>
																					</span>
																					<!--end::Svg Icon-->
																				</div>
																			</div>
																			<!--end::Rating-->
																		</td>
																		<td>
																			<a href="../../inbox/reply.html" class="d-flex text-dark text-gray-800 text-hover-primary">
																				<!--begin::Avatar-->
																				<div class="symbol symbol-circle symbol-25px me-3">
																					<span class="symbol-label" style="background-image:url(<?= base_url() ?>assets/media/avatars/300-9.jpg)"></span>
																				</div>
																				<!--end::Avatar-->
																				<!--begin::Name-->
																				<span class="fw-bold">Francis Mitcham</span>
																				<!--end::Name-->
																			</a>
																		</td>
																		<td class="text-gray-600 fw-bold">Beautifully crafted. Worth every penny.</td>
																		<td class="text-end">
																			<span class="fw-semibold text-muted">July 24</span>
																		</td>
																	</tr>
																	<tr>
																		<td>
																			<!--begin::Checkbox-->
																			<div class="form-check form-check-sm form-check-custom form-check-solid mt-1">
																				<input class="form-check-input" type="checkbox" value="1" />
																			</div>
																			<!--end::Checkbox-->
																		</td>
																		<td data-order="rating-4">
																			<!--begin::Rating-->
																			<div class="rating">
																				<div class="rating-label checked">
																					<!--begin::Svg Icon | path: icons/duotune/general/gen029.svg-->
																					<span class="svg-icon svg-icon-2">
																						<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																							<path d="M11.1359 4.48359C11.5216 3.82132 12.4784 3.82132 12.8641 4.48359L15.011 8.16962C15.1523 8.41222 15.3891 8.58425 15.6635 8.64367L19.8326 9.54646C20.5816 9.70867 20.8773 10.6186 20.3666 11.1901L17.5244 14.371C17.3374 14.5803 17.2469 14.8587 17.2752 15.138L17.7049 19.382C17.7821 20.1445 17.0081 20.7069 16.3067 20.3978L12.4032 18.6777C12.1463 18.5645 11.8537 18.5645 11.5968 18.6777L7.69326 20.3978C6.99192 20.7069 6.21789 20.1445 6.2951 19.382L6.7248 15.138C6.75308 14.8587 6.66264 14.5803 6.47558 14.371L3.63339 11.1901C3.12273 10.6186 3.41838 9.70867 4.16744 9.54646L8.3365 8.64367C8.61089 8.58425 8.84767 8.41222 8.98897 8.16962L11.1359 4.48359Z" fill="currentColor" />
																						</svg>
																					</span>
																					<!--end::Svg Icon-->
																				</div>
																				<div class="rating-label checked">
																					<!--begin::Svg Icon | path: icons/duotune/general/gen029.svg-->
																					<span class="svg-icon svg-icon-2">
																						<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																							<path d="M11.1359 4.48359C11.5216 3.82132 12.4784 3.82132 12.8641 4.48359L15.011 8.16962C15.1523 8.41222 15.3891 8.58425 15.6635 8.64367L19.8326 9.54646C20.5816 9.70867 20.8773 10.6186 20.3666 11.1901L17.5244 14.371C17.3374 14.5803 17.2469 14.8587 17.2752 15.138L17.7049 19.382C17.7821 20.1445 17.0081 20.7069 16.3067 20.3978L12.4032 18.6777C12.1463 18.5645 11.8537 18.5645 11.5968 18.6777L7.69326 20.3978C6.99192 20.7069 6.21789 20.1445 6.2951 19.382L6.7248 15.138C6.75308 14.8587 6.66264 14.5803 6.47558 14.371L3.63339 11.1901C3.12273 10.6186 3.41838 9.70867 4.16744 9.54646L8.3365 8.64367C8.61089 8.58425 8.84767 8.41222 8.98897 8.16962L11.1359 4.48359Z" fill="currentColor" />
																						</svg>
																					</span>
																					<!--end::Svg Icon-->
																				</div>
																				<div class="rating-label checked">
																					<!--begin::Svg Icon | path: icons/duotune/general/gen029.svg-->
																					<span class="svg-icon svg-icon-2">
																						<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																							<path d="M11.1359 4.48359C11.5216 3.82132 12.4784 3.82132 12.8641 4.48359L15.011 8.16962C15.1523 8.41222 15.3891 8.58425 15.6635 8.64367L19.8326 9.54646C20.5816 9.70867 20.8773 10.6186 20.3666 11.1901L17.5244 14.371C17.3374 14.5803 17.2469 14.8587 17.2752 15.138L17.7049 19.382C17.7821 20.1445 17.0081 20.7069 16.3067 20.3978L12.4032 18.6777C12.1463 18.5645 11.8537 18.5645 11.5968 18.6777L7.69326 20.3978C6.99192 20.7069 6.21789 20.1445 6.2951 19.382L6.7248 15.138C6.75308 14.8587 6.66264 14.5803 6.47558 14.371L3.63339 11.1901C3.12273 10.6186 3.41838 9.70867 4.16744 9.54646L8.3365 8.64367C8.61089 8.58425 8.84767 8.41222 8.98897 8.16962L11.1359 4.48359Z" fill="currentColor" />
																						</svg>
																					</span>
																					<!--end::Svg Icon-->
																				</div>
																				<div class="rating-label checked">
																					<!--begin::Svg Icon | path: icons/duotune/general/gen029.svg-->
																					<span class="svg-icon svg-icon-2">
																						<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																							<path d="M11.1359 4.48359C11.5216 3.82132 12.4784 3.82132 12.8641 4.48359L15.011 8.16962C15.1523 8.41222 15.3891 8.58425 15.6635 8.64367L19.8326 9.54646C20.5816 9.70867 20.8773 10.6186 20.3666 11.1901L17.5244 14.371C17.3374 14.5803 17.2469 14.8587 17.2752 15.138L17.7049 19.382C17.7821 20.1445 17.0081 20.7069 16.3067 20.3978L12.4032 18.6777C12.1463 18.5645 11.8537 18.5645 11.5968 18.6777L7.69326 20.3978C6.99192 20.7069 6.21789 20.1445 6.2951 19.382L6.7248 15.138C6.75308 14.8587 6.66264 14.5803 6.47558 14.371L3.63339 11.1901C3.12273 10.6186 3.41838 9.70867 4.16744 9.54646L8.3365 8.64367C8.61089 8.58425 8.84767 8.41222 8.98897 8.16962L11.1359 4.48359Z" fill="currentColor" />
																						</svg>
																					</span>
																					<!--end::Svg Icon-->
																				</div>
																				<div class="rating-label">
																					<!--begin::Svg Icon | path: icons/duotune/general/gen029.svg-->
																					<span class="svg-icon svg-icon-2">
																						<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																							<path d="M11.1359 4.48359C11.5216 3.82132 12.4784 3.82132 12.8641 4.48359L15.011 8.16962C15.1523 8.41222 15.3891 8.58425 15.6635 8.64367L19.8326 9.54646C20.5816 9.70867 20.8773 10.6186 20.3666 11.1901L17.5244 14.371C17.3374 14.5803 17.2469 14.8587 17.2752 15.138L17.7049 19.382C17.7821 20.1445 17.0081 20.7069 16.3067 20.3978L12.4032 18.6777C12.1463 18.5645 11.8537 18.5645 11.5968 18.6777L7.69326 20.3978C6.99192 20.7069 6.21789 20.1445 6.2951 19.382L6.7248 15.138C6.75308 14.8587 6.66264 14.5803 6.47558 14.371L3.63339 11.1901C3.12273 10.6186 3.41838 9.70867 4.16744 9.54646L8.3365 8.64367C8.61089 8.58425 8.84767 8.41222 8.98897 8.16962L11.1359 4.48359Z" fill="currentColor" />
																						</svg>
																					</span>
																					<!--end::Svg Icon-->
																				</div>
																			</div>
																			<!--end::Rating-->
																		</td>
																		<td>
																			<a href="../../inbox/reply.html" class="d-flex text-dark text-gray-800 text-hover-primary">
																				<!--begin::Avatar-->
																				<div class="symbol symbol-circle symbol-25px me-3">
																					<div class="symbol-label bg-light-danger">
																						<span class="text-danger">O</span>
																					</div>
																				</div>
																				<!--end::Avatar-->
																				<!--begin::Name-->
																				<span class="fw-bold">Olivia Wild</span>
																				<!--end::Name-->
																			</a>
																		</td>
																		<td class="text-gray-600 fw-bold">Awesome value for money. Shipping could be faster tho.</td>
																		<td class="text-end">
																			<span class="fw-semibold text-muted">July 13</span>
																		</td>
																	</tr>
																	<tr>
																		<td>
																			<!--begin::Checkbox-->
																			<div class="form-check form-check-sm form-check-custom form-check-solid mt-1">
																				<input class="form-check-input" type="checkbox" value="1" />
																			</div>
																			<!--end::Checkbox-->
																		</td>
																		<td data-order="rating-5">
																			<!--begin::Rating-->
																			<div class="rating">
																				<div class="rating-label checked">
																					<!--begin::Svg Icon | path: icons/duotune/general/gen029.svg-->
																					<span class="svg-icon svg-icon-2">
																						<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																							<path d="M11.1359 4.48359C11.5216 3.82132 12.4784 3.82132 12.8641 4.48359L15.011 8.16962C15.1523 8.41222 15.3891 8.58425 15.6635 8.64367L19.8326 9.54646C20.5816 9.70867 20.8773 10.6186 20.3666 11.1901L17.5244 14.371C17.3374 14.5803 17.2469 14.8587 17.2752 15.138L17.7049 19.382C17.7821 20.1445 17.0081 20.7069 16.3067 20.3978L12.4032 18.6777C12.1463 18.5645 11.8537 18.5645 11.5968 18.6777L7.69326 20.3978C6.99192 20.7069 6.21789 20.1445 6.2951 19.382L6.7248 15.138C6.75308 14.8587 6.66264 14.5803 6.47558 14.371L3.63339 11.1901C3.12273 10.6186 3.41838 9.70867 4.16744 9.54646L8.3365 8.64367C8.61089 8.58425 8.84767 8.41222 8.98897 8.16962L11.1359 4.48359Z" fill="currentColor" />
																						</svg>
																					</span>
																					<!--end::Svg Icon-->
																				</div>
																				<div class="rating-label checked">
																					<!--begin::Svg Icon | path: icons/duotune/general/gen029.svg-->
																					<span class="svg-icon svg-icon-2">
																						<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																							<path d="M11.1359 4.48359C11.5216 3.82132 12.4784 3.82132 12.8641 4.48359L15.011 8.16962C15.1523 8.41222 15.3891 8.58425 15.6635 8.64367L19.8326 9.54646C20.5816 9.70867 20.8773 10.6186 20.3666 11.1901L17.5244 14.371C17.3374 14.5803 17.2469 14.8587 17.2752 15.138L17.7049 19.382C17.7821 20.1445 17.0081 20.7069 16.3067 20.3978L12.4032 18.6777C12.1463 18.5645 11.8537 18.5645 11.5968 18.6777L7.69326 20.3978C6.99192 20.7069 6.21789 20.1445 6.2951 19.382L6.7248 15.138C6.75308 14.8587 6.66264 14.5803 6.47558 14.371L3.63339 11.1901C3.12273 10.6186 3.41838 9.70867 4.16744 9.54646L8.3365 8.64367C8.61089 8.58425 8.84767 8.41222 8.98897 8.16962L11.1359 4.48359Z" fill="currentColor" />
																						</svg>
																					</span>
																					<!--end::Svg Icon-->
																				</div>
																				<div class="rating-label checked">
																					<!--begin::Svg Icon | path: icons/duotune/general/gen029.svg-->
																					<span class="svg-icon svg-icon-2">
																						<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																							<path d="M11.1359 4.48359C11.5216 3.82132 12.4784 3.82132 12.8641 4.48359L15.011 8.16962C15.1523 8.41222 15.3891 8.58425 15.6635 8.64367L19.8326 9.54646C20.5816 9.70867 20.8773 10.6186 20.3666 11.1901L17.5244 14.371C17.3374 14.5803 17.2469 14.8587 17.2752 15.138L17.7049 19.382C17.7821 20.1445 17.0081 20.7069 16.3067 20.3978L12.4032 18.6777C12.1463 18.5645 11.8537 18.5645 11.5968 18.6777L7.69326 20.3978C6.99192 20.7069 6.21789 20.1445 6.2951 19.382L6.7248 15.138C6.75308 14.8587 6.66264 14.5803 6.47558 14.371L3.63339 11.1901C3.12273 10.6186 3.41838 9.70867 4.16744 9.54646L8.3365 8.64367C8.61089 8.58425 8.84767 8.41222 8.98897 8.16962L11.1359 4.48359Z" fill="currentColor" />
																						</svg>
																					</span>
																					<!--end::Svg Icon-->
																				</div>
																				<div class="rating-label checked">
																					<!--begin::Svg Icon | path: icons/duotune/general/gen029.svg-->
																					<span class="svg-icon svg-icon-2">
																						<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																							<path d="M11.1359 4.48359C11.5216 3.82132 12.4784 3.82132 12.8641 4.48359L15.011 8.16962C15.1523 8.41222 15.3891 8.58425 15.6635 8.64367L19.8326 9.54646C20.5816 9.70867 20.8773 10.6186 20.3666 11.1901L17.5244 14.371C17.3374 14.5803 17.2469 14.8587 17.2752 15.138L17.7049 19.382C17.7821 20.1445 17.0081 20.7069 16.3067 20.3978L12.4032 18.6777C12.1463 18.5645 11.8537 18.5645 11.5968 18.6777L7.69326 20.3978C6.99192 20.7069 6.21789 20.1445 6.2951 19.382L6.7248 15.138C6.75308 14.8587 6.66264 14.5803 6.47558 14.371L3.63339 11.1901C3.12273 10.6186 3.41838 9.70867 4.16744 9.54646L8.3365 8.64367C8.61089 8.58425 8.84767 8.41222 8.98897 8.16962L11.1359 4.48359Z" fill="currentColor" />
																						</svg>
																					</span>
																					<!--end::Svg Icon-->
																				</div>
																				<div class="rating-label checked">
																					<!--begin::Svg Icon | path: icons/duotune/general/gen029.svg-->
																					<span class="svg-icon svg-icon-2">
																						<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																							<path d="M11.1359 4.48359C11.5216 3.82132 12.4784 3.82132 12.8641 4.48359L15.011 8.16962C15.1523 8.41222 15.3891 8.58425 15.6635 8.64367L19.8326 9.54646C20.5816 9.70867 20.8773 10.6186 20.3666 11.1901L17.5244 14.371C17.3374 14.5803 17.2469 14.8587 17.2752 15.138L17.7049 19.382C17.7821 20.1445 17.0081 20.7069 16.3067 20.3978L12.4032 18.6777C12.1463 18.5645 11.8537 18.5645 11.5968 18.6777L7.69326 20.3978C6.99192 20.7069 6.21789 20.1445 6.2951 19.382L6.7248 15.138C6.75308 14.8587 6.66264 14.5803 6.47558 14.371L3.63339 11.1901C3.12273 10.6186 3.41838 9.70867 4.16744 9.54646L8.3365 8.64367C8.61089 8.58425 8.84767 8.41222 8.98897 8.16962L11.1359 4.48359Z" fill="currentColor" />
																						</svg>
																					</span>
																					<!--end::Svg Icon-->
																				</div>
																			</div>
																			<!--end::Rating-->
																		</td>
																		<td>
																			<a href="../../inbox/reply.html" class="d-flex text-dark text-gray-800 text-hover-primary">
																				<!--begin::Avatar-->
																				<div class="symbol symbol-circle symbol-25px me-3">
																					<div class="symbol-label bg-light-primary">
																						<span class="text-primary">N</span>
																					</div>
																				</div>
																				<!--end::Avatar-->
																				<!--begin::Name-->
																				<span class="fw-bold">Neil Owen</span>
																				<!--end::Name-->
																			</a>
																		</td>
																		<td class="text-gray-600 fw-bold">Excellent quality, I got it for my son's birthday and he loved it!</td>
																		<td class="text-end">
																			<span class="fw-semibold text-muted">May 25</span>
																		</td>
																	</tr>
																	<tr>
																		<td>
																			<!--begin::Checkbox-->
																			<div class="form-check form-check-sm form-check-custom form-check-solid mt-1">
																				<input class="form-check-input" type="checkbox" value="1" />
																			</div>
																			<!--end::Checkbox-->
																		</td>
																		<td data-order="rating-5">
																			<!--begin::Rating-->
																			<div class="rating">
																				<div class="rating-label checked">
																					<!--begin::Svg Icon | path: icons/duotune/general/gen029.svg-->
																					<span class="svg-icon svg-icon-2">
																						<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																							<path d="M11.1359 4.48359C11.5216 3.82132 12.4784 3.82132 12.8641 4.48359L15.011 8.16962C15.1523 8.41222 15.3891 8.58425 15.6635 8.64367L19.8326 9.54646C20.5816 9.70867 20.8773 10.6186 20.3666 11.1901L17.5244 14.371C17.3374 14.5803 17.2469 14.8587 17.2752 15.138L17.7049 19.382C17.7821 20.1445 17.0081 20.7069 16.3067 20.3978L12.4032 18.6777C12.1463 18.5645 11.8537 18.5645 11.5968 18.6777L7.69326 20.3978C6.99192 20.7069 6.21789 20.1445 6.2951 19.382L6.7248 15.138C6.75308 14.8587 6.66264 14.5803 6.47558 14.371L3.63339 11.1901C3.12273 10.6186 3.41838 9.70867 4.16744 9.54646L8.3365 8.64367C8.61089 8.58425 8.84767 8.41222 8.98897 8.16962L11.1359 4.48359Z" fill="currentColor" />
																						</svg>
																					</span>
																					<!--end::Svg Icon-->
																				</div>
																				<div class="rating-label checked">
																					<!--begin::Svg Icon | path: icons/duotune/general/gen029.svg-->
																					<span class="svg-icon svg-icon-2">
																						<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																							<path d="M11.1359 4.48359C11.5216 3.82132 12.4784 3.82132 12.8641 4.48359L15.011 8.16962C15.1523 8.41222 15.3891 8.58425 15.6635 8.64367L19.8326 9.54646C20.5816 9.70867 20.8773 10.6186 20.3666 11.1901L17.5244 14.371C17.3374 14.5803 17.2469 14.8587 17.2752 15.138L17.7049 19.382C17.7821 20.1445 17.0081 20.7069 16.3067 20.3978L12.4032 18.6777C12.1463 18.5645 11.8537 18.5645 11.5968 18.6777L7.69326 20.3978C6.99192 20.7069 6.21789 20.1445 6.2951 19.382L6.7248 15.138C6.75308 14.8587 6.66264 14.5803 6.47558 14.371L3.63339 11.1901C3.12273 10.6186 3.41838 9.70867 4.16744 9.54646L8.3365 8.64367C8.61089 8.58425 8.84767 8.41222 8.98897 8.16962L11.1359 4.48359Z" fill="currentColor" />
																						</svg>
																					</span>
																					<!--end::Svg Icon-->
																				</div>
																				<div class="rating-label checked">
																					<!--begin::Svg Icon | path: icons/duotune/general/gen029.svg-->
																					<span class="svg-icon svg-icon-2">
																						<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																							<path d="M11.1359 4.48359C11.5216 3.82132 12.4784 3.82132 12.8641 4.48359L15.011 8.16962C15.1523 8.41222 15.3891 8.58425 15.6635 8.64367L19.8326 9.54646C20.5816 9.70867 20.8773 10.6186 20.3666 11.1901L17.5244 14.371C17.3374 14.5803 17.2469 14.8587 17.2752 15.138L17.7049 19.382C17.7821 20.1445 17.0081 20.7069 16.3067 20.3978L12.4032 18.6777C12.1463 18.5645 11.8537 18.5645 11.5968 18.6777L7.69326 20.3978C6.99192 20.7069 6.21789 20.1445 6.2951 19.382L6.7248 15.138C6.75308 14.8587 6.66264 14.5803 6.47558 14.371L3.63339 11.1901C3.12273 10.6186 3.41838 9.70867 4.16744 9.54646L8.3365 8.64367C8.61089 8.58425 8.84767 8.41222 8.98897 8.16962L11.1359 4.48359Z" fill="currentColor" />
																						</svg>
																					</span>
																					<!--end::Svg Icon-->
																				</div>
																				<div class="rating-label checked">
																					<!--begin::Svg Icon | path: icons/duotune/general/gen029.svg-->
																					<span class="svg-icon svg-icon-2">
																						<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																							<path d="M11.1359 4.48359C11.5216 3.82132 12.4784 3.82132 12.8641 4.48359L15.011 8.16962C15.1523 8.41222 15.3891 8.58425 15.6635 8.64367L19.8326 9.54646C20.5816 9.70867 20.8773 10.6186 20.3666 11.1901L17.5244 14.371C17.3374 14.5803 17.2469 14.8587 17.2752 15.138L17.7049 19.382C17.7821 20.1445 17.0081 20.7069 16.3067 20.3978L12.4032 18.6777C12.1463 18.5645 11.8537 18.5645 11.5968 18.6777L7.69326 20.3978C6.99192 20.7069 6.21789 20.1445 6.2951 19.382L6.7248 15.138C6.75308 14.8587 6.66264 14.5803 6.47558 14.371L3.63339 11.1901C3.12273 10.6186 3.41838 9.70867 4.16744 9.54646L8.3365 8.64367C8.61089 8.58425 8.84767 8.41222 8.98897 8.16962L11.1359 4.48359Z" fill="currentColor" />
																						</svg>
																					</span>
																					<!--end::Svg Icon-->
																				</div>
																				<div class="rating-label checked">
																					<!--begin::Svg Icon | path: icons/duotune/general/gen029.svg-->
																					<span class="svg-icon svg-icon-2">
																						<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																							<path d="M11.1359 4.48359C11.5216 3.82132 12.4784 3.82132 12.8641 4.48359L15.011 8.16962C15.1523 8.41222 15.3891 8.58425 15.6635 8.64367L19.8326 9.54646C20.5816 9.70867 20.8773 10.6186 20.3666 11.1901L17.5244 14.371C17.3374 14.5803 17.2469 14.8587 17.2752 15.138L17.7049 19.382C17.7821 20.1445 17.0081 20.7069 16.3067 20.3978L12.4032 18.6777C12.1463 18.5645 11.8537 18.5645 11.5968 18.6777L7.69326 20.3978C6.99192 20.7069 6.21789 20.1445 6.2951 19.382L6.7248 15.138C6.75308 14.8587 6.66264 14.5803 6.47558 14.371L3.63339 11.1901C3.12273 10.6186 3.41838 9.70867 4.16744 9.54646L8.3365 8.64367C8.61089 8.58425 8.84767 8.41222 8.98897 8.16962L11.1359 4.48359Z" fill="currentColor" />
																						</svg>
																					</span>
																					<!--end::Svg Icon-->
																				</div>
																			</div>
																			<!--end::Rating-->
																		</td>
																		<td>
																			<a href="../../inbox/reply.html" class="d-flex text-dark text-gray-800 text-hover-primary">
																				<!--begin::Avatar-->
																				<div class="symbol symbol-circle symbol-25px me-3">
																					<span class="symbol-label" style="background-image:url(<?= base_url() ?>assets/media/avatars/300-23.jpg)"></span>
																				</div>
																				<!--end::Avatar-->
																				<!--begin::Name-->
																				<span class="fw-bold">Dan Wilson</span>
																				<!--end::Name-->
																			</a>
																		</td>
																		<td class="text-gray-600 fw-bold">I got this for Christmas last year, and it's still the best product I've ever used!</td>
																		<td class="text-end">
																			<span class="fw-semibold text-muted">April 15</span>
																		</td>
																	</tr>
																	<tr>
																		<td>
																			<!--begin::Checkbox-->
																			<div class="form-check form-check-sm form-check-custom form-check-solid mt-1">
																				<input class="form-check-input" type="checkbox" value="1" />
																			</div>
																			<!--end::Checkbox-->
																		</td>
																		<td data-order="rating-5">
																			<!--begin::Rating-->
																			<div class="rating">
																				<div class="rating-label checked">
																					<!--begin::Svg Icon | path: icons/duotune/general/gen029.svg-->
																					<span class="svg-icon svg-icon-2">
																						<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																							<path d="M11.1359 4.48359C11.5216 3.82132 12.4784 3.82132 12.8641 4.48359L15.011 8.16962C15.1523 8.41222 15.3891 8.58425 15.6635 8.64367L19.8326 9.54646C20.5816 9.70867 20.8773 10.6186 20.3666 11.1901L17.5244 14.371C17.3374 14.5803 17.2469 14.8587 17.2752 15.138L17.7049 19.382C17.7821 20.1445 17.0081 20.7069 16.3067 20.3978L12.4032 18.6777C12.1463 18.5645 11.8537 18.5645 11.5968 18.6777L7.69326 20.3978C6.99192 20.7069 6.21789 20.1445 6.2951 19.382L6.7248 15.138C6.75308 14.8587 6.66264 14.5803 6.47558 14.371L3.63339 11.1901C3.12273 10.6186 3.41838 9.70867 4.16744 9.54646L8.3365 8.64367C8.61089 8.58425 8.84767 8.41222 8.98897 8.16962L11.1359 4.48359Z" fill="currentColor" />
																						</svg>
																					</span>
																					<!--end::Svg Icon-->
																				</div>
																				<div class="rating-label checked">
																					<!--begin::Svg Icon | path: icons/duotune/general/gen029.svg-->
																					<span class="svg-icon svg-icon-2">
																						<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																							<path d="M11.1359 4.48359C11.5216 3.82132 12.4784 3.82132 12.8641 4.48359L15.011 8.16962C15.1523 8.41222 15.3891 8.58425 15.6635 8.64367L19.8326 9.54646C20.5816 9.70867 20.8773 10.6186 20.3666 11.1901L17.5244 14.371C17.3374 14.5803 17.2469 14.8587 17.2752 15.138L17.7049 19.382C17.7821 20.1445 17.0081 20.7069 16.3067 20.3978L12.4032 18.6777C12.1463 18.5645 11.8537 18.5645 11.5968 18.6777L7.69326 20.3978C6.99192 20.7069 6.21789 20.1445 6.2951 19.382L6.7248 15.138C6.75308 14.8587 6.66264 14.5803 6.47558 14.371L3.63339 11.1901C3.12273 10.6186 3.41838 9.70867 4.16744 9.54646L8.3365 8.64367C8.61089 8.58425 8.84767 8.41222 8.98897 8.16962L11.1359 4.48359Z" fill="currentColor" />
																						</svg>
																					</span>
																					<!--end::Svg Icon-->
																				</div>
																				<div class="rating-label checked">
																					<!--begin::Svg Icon | path: icons/duotune/general/gen029.svg-->
																					<span class="svg-icon svg-icon-2">
																						<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																							<path d="M11.1359 4.48359C11.5216 3.82132 12.4784 3.82132 12.8641 4.48359L15.011 8.16962C15.1523 8.41222 15.3891 8.58425 15.6635 8.64367L19.8326 9.54646C20.5816 9.70867 20.8773 10.6186 20.3666 11.1901L17.5244 14.371C17.3374 14.5803 17.2469 14.8587 17.2752 15.138L17.7049 19.382C17.7821 20.1445 17.0081 20.7069 16.3067 20.3978L12.4032 18.6777C12.1463 18.5645 11.8537 18.5645 11.5968 18.6777L7.69326 20.3978C6.99192 20.7069 6.21789 20.1445 6.2951 19.382L6.7248 15.138C6.75308 14.8587 6.66264 14.5803 6.47558 14.371L3.63339 11.1901C3.12273 10.6186 3.41838 9.70867 4.16744 9.54646L8.3365 8.64367C8.61089 8.58425 8.84767 8.41222 8.98897 8.16962L11.1359 4.48359Z" fill="currentColor" />
																						</svg>
																					</span>
																					<!--end::Svg Icon-->
																				</div>
																				<div class="rating-label checked">
																					<!--begin::Svg Icon | path: icons/duotune/general/gen029.svg-->
																					<span class="svg-icon svg-icon-2">
																						<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																							<path d="M11.1359 4.48359C11.5216 3.82132 12.4784 3.82132 12.8641 4.48359L15.011 8.16962C15.1523 8.41222 15.3891 8.58425 15.6635 8.64367L19.8326 9.54646C20.5816 9.70867 20.8773 10.6186 20.3666 11.1901L17.5244 14.371C17.3374 14.5803 17.2469 14.8587 17.2752 15.138L17.7049 19.382C17.7821 20.1445 17.0081 20.7069 16.3067 20.3978L12.4032 18.6777C12.1463 18.5645 11.8537 18.5645 11.5968 18.6777L7.69326 20.3978C6.99192 20.7069 6.21789 20.1445 6.2951 19.382L6.7248 15.138C6.75308 14.8587 6.66264 14.5803 6.47558 14.371L3.63339 11.1901C3.12273 10.6186 3.41838 9.70867 4.16744 9.54646L8.3365 8.64367C8.61089 8.58425 8.84767 8.41222 8.98897 8.16962L11.1359 4.48359Z" fill="currentColor" />
																						</svg>
																					</span>
																					<!--end::Svg Icon-->
																				</div>
																				<div class="rating-label checked">
																					<!--begin::Svg Icon | path: icons/duotune/general/gen029.svg-->
																					<span class="svg-icon svg-icon-2">
																						<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																							<path d="M11.1359 4.48359C11.5216 3.82132 12.4784 3.82132 12.8641 4.48359L15.011 8.16962C15.1523 8.41222 15.3891 8.58425 15.6635 8.64367L19.8326 9.54646C20.5816 9.70867 20.8773 10.6186 20.3666 11.1901L17.5244 14.371C17.3374 14.5803 17.2469 14.8587 17.2752 15.138L17.7049 19.382C17.7821 20.1445 17.0081 20.7069 16.3067 20.3978L12.4032 18.6777C12.1463 18.5645 11.8537 18.5645 11.5968 18.6777L7.69326 20.3978C6.99192 20.7069 6.21789 20.1445 6.2951 19.382L6.7248 15.138C6.75308 14.8587 6.66264 14.5803 6.47558 14.371L3.63339 11.1901C3.12273 10.6186 3.41838 9.70867 4.16744 9.54646L8.3365 8.64367C8.61089 8.58425 8.84767 8.41222 8.98897 8.16962L11.1359 4.48359Z" fill="currentColor" />
																						</svg>
																					</span>
																					<!--end::Svg Icon-->
																				</div>
																			</div>
																			<!--end::Rating-->
																		</td>
																		<td>
																			<a href="../../inbox/reply.html" class="d-flex text-dark text-gray-800 text-hover-primary">
																				<!--begin::Avatar-->
																				<div class="symbol symbol-circle symbol-25px me-3">
																					<div class="symbol-label bg-light-danger">
																						<span class="text-danger">E</span>
																					</div>
																				</div>
																				<!--end::Avatar-->
																				<!--begin::Name-->
																				<span class="fw-bold">Emma Bold</span>
																				<!--end::Name-->
																			</a>
																		</td>
																		<td class="text-gray-600 fw-bold">Was skeptical at first, but after using it for 3 months, I'm hooked! Will definately buy another!</td>
																		<td class="text-end">
																			<span class="fw-semibold text-muted">April 3</span>
																		</td>
																	</tr>
																	<tr>
																		<td>
																			<!--begin::Checkbox-->
																			<div class="form-check form-check-sm form-check-custom form-check-solid mt-1">
																				<input class="form-check-input" type="checkbox" value="1" />
																			</div>
																			<!--end::Checkbox-->
																		</td>
																		<td data-order="rating-4">
																			<!--begin::Rating-->
																			<div class="rating">
																				<div class="rating-label checked">
																					<!--begin::Svg Icon | path: icons/duotune/general/gen029.svg-->
																					<span class="svg-icon svg-icon-2">
																						<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																							<path d="M11.1359 4.48359C11.5216 3.82132 12.4784 3.82132 12.8641 4.48359L15.011 8.16962C15.1523 8.41222 15.3891 8.58425 15.6635 8.64367L19.8326 9.54646C20.5816 9.70867 20.8773 10.6186 20.3666 11.1901L17.5244 14.371C17.3374 14.5803 17.2469 14.8587 17.2752 15.138L17.7049 19.382C17.7821 20.1445 17.0081 20.7069 16.3067 20.3978L12.4032 18.6777C12.1463 18.5645 11.8537 18.5645 11.5968 18.6777L7.69326 20.3978C6.99192 20.7069 6.21789 20.1445 6.2951 19.382L6.7248 15.138C6.75308 14.8587 6.66264 14.5803 6.47558 14.371L3.63339 11.1901C3.12273 10.6186 3.41838 9.70867 4.16744 9.54646L8.3365 8.64367C8.61089 8.58425 8.84767 8.41222 8.98897 8.16962L11.1359 4.48359Z" fill="currentColor" />
																						</svg>
																					</span>
																					<!--end::Svg Icon-->
																				</div>
																				<div class="rating-label checked">
																					<!--begin::Svg Icon | path: icons/duotune/general/gen029.svg-->
																					<span class="svg-icon svg-icon-2">
																						<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																							<path d="M11.1359 4.48359C11.5216 3.82132 12.4784 3.82132 12.8641 4.48359L15.011 8.16962C15.1523 8.41222 15.3891 8.58425 15.6635 8.64367L19.8326 9.54646C20.5816 9.70867 20.8773 10.6186 20.3666 11.1901L17.5244 14.371C17.3374 14.5803 17.2469 14.8587 17.2752 15.138L17.7049 19.382C17.7821 20.1445 17.0081 20.7069 16.3067 20.3978L12.4032 18.6777C12.1463 18.5645 11.8537 18.5645 11.5968 18.6777L7.69326 20.3978C6.99192 20.7069 6.21789 20.1445 6.2951 19.382L6.7248 15.138C6.75308 14.8587 6.66264 14.5803 6.47558 14.371L3.63339 11.1901C3.12273 10.6186 3.41838 9.70867 4.16744 9.54646L8.3365 8.64367C8.61089 8.58425 8.84767 8.41222 8.98897 8.16962L11.1359 4.48359Z" fill="currentColor" />
																						</svg>
																					</span>
																					<!--end::Svg Icon-->
																				</div>
																				<div class="rating-label checked">
																					<!--begin::Svg Icon | path: icons/duotune/general/gen029.svg-->
																					<span class="svg-icon svg-icon-2">
																						<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																							<path d="M11.1359 4.48359C11.5216 3.82132 12.4784 3.82132 12.8641 4.48359L15.011 8.16962C15.1523 8.41222 15.3891 8.58425 15.6635 8.64367L19.8326 9.54646C20.5816 9.70867 20.8773 10.6186 20.3666 11.1901L17.5244 14.371C17.3374 14.5803 17.2469 14.8587 17.2752 15.138L17.7049 19.382C17.7821 20.1445 17.0081 20.7069 16.3067 20.3978L12.4032 18.6777C12.1463 18.5645 11.8537 18.5645 11.5968 18.6777L7.69326 20.3978C6.99192 20.7069 6.21789 20.1445 6.2951 19.382L6.7248 15.138C6.75308 14.8587 6.66264 14.5803 6.47558 14.371L3.63339 11.1901C3.12273 10.6186 3.41838 9.70867 4.16744 9.54646L8.3365 8.64367C8.61089 8.58425 8.84767 8.41222 8.98897 8.16962L11.1359 4.48359Z" fill="currentColor" />
																						</svg>
																					</span>
																					<!--end::Svg Icon-->
																				</div>
																				<div class="rating-label checked">
																					<!--begin::Svg Icon | path: icons/duotune/general/gen029.svg-->
																					<span class="svg-icon svg-icon-2">
																						<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																							<path d="M11.1359 4.48359C11.5216 3.82132 12.4784 3.82132 12.8641 4.48359L15.011 8.16962C15.1523 8.41222 15.3891 8.58425 15.6635 8.64367L19.8326 9.54646C20.5816 9.70867 20.8773 10.6186 20.3666 11.1901L17.5244 14.371C17.3374 14.5803 17.2469 14.8587 17.2752 15.138L17.7049 19.382C17.7821 20.1445 17.0081 20.7069 16.3067 20.3978L12.4032 18.6777C12.1463 18.5645 11.8537 18.5645 11.5968 18.6777L7.69326 20.3978C6.99192 20.7069 6.21789 20.1445 6.2951 19.382L6.7248 15.138C6.75308 14.8587 6.66264 14.5803 6.47558 14.371L3.63339 11.1901C3.12273 10.6186 3.41838 9.70867 4.16744 9.54646L8.3365 8.64367C8.61089 8.58425 8.84767 8.41222 8.98897 8.16962L11.1359 4.48359Z" fill="currentColor" />
																						</svg>
																					</span>
																					<!--end::Svg Icon-->
																				</div>
																				<div class="rating-label">
																					<!--begin::Svg Icon | path: icons/duotune/general/gen029.svg-->
																					<span class="svg-icon svg-icon-2">
																						<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																							<path d="M11.1359 4.48359C11.5216 3.82132 12.4784 3.82132 12.8641 4.48359L15.011 8.16962C15.1523 8.41222 15.3891 8.58425 15.6635 8.64367L19.8326 9.54646C20.5816 9.70867 20.8773 10.6186 20.3666 11.1901L17.5244 14.371C17.3374 14.5803 17.2469 14.8587 17.2752 15.138L17.7049 19.382C17.7821 20.1445 17.0081 20.7069 16.3067 20.3978L12.4032 18.6777C12.1463 18.5645 11.8537 18.5645 11.5968 18.6777L7.69326 20.3978C6.99192 20.7069 6.21789 20.1445 6.2951 19.382L6.7248 15.138C6.75308 14.8587 6.66264 14.5803 6.47558 14.371L3.63339 11.1901C3.12273 10.6186 3.41838 9.70867 4.16744 9.54646L8.3365 8.64367C8.61089 8.58425 8.84767 8.41222 8.98897 8.16962L11.1359 4.48359Z" fill="currentColor" />
																						</svg>
																					</span>
																					<!--end::Svg Icon-->
																				</div>
																			</div>
																			<!--end::Rating-->
																		</td>
																		<td>
																			<a href="../../inbox/reply.html" class="d-flex text-dark text-gray-800 text-hover-primary">
																				<!--begin::Avatar-->
																				<div class="symbol symbol-circle symbol-25px me-3">
																					<span class="symbol-label" style="background-image:url(<?= base_url() ?>assets/media/avatars/300-12.jpg)"></span>
																				</div>
																				<!--end::Avatar-->
																				<!--begin::Name-->
																				<span class="fw-bold">Ana Crown</span>
																				<!--end::Name-->
																			</a>
																		</td>
																		<td class="text-gray-600 fw-bold">Great product, too bad I missed out on the sale.</td>
																		<td class="text-end">
																			<span class="fw-semibold text-muted">March 17</span>
																		</td>
																	</tr>
																	<tr>
																		<td>
																			<!--begin::Checkbox-->
																			<div class="form-check form-check-sm form-check-custom form-check-solid mt-1">
																				<input class="form-check-input" type="checkbox" value="1" />
																			</div>
																			<!--end::Checkbox-->
																		</td>
																		<td data-order="rating-5">
																			<!--begin::Rating-->
																			<div class="rating">
																				<div class="rating-label checked">
																					<!--begin::Svg Icon | path: icons/duotune/general/gen029.svg-->
																					<span class="svg-icon svg-icon-2">
																						<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																							<path d="M11.1359 4.48359C11.5216 3.82132 12.4784 3.82132 12.8641 4.48359L15.011 8.16962C15.1523 8.41222 15.3891 8.58425 15.6635 8.64367L19.8326 9.54646C20.5816 9.70867 20.8773 10.6186 20.3666 11.1901L17.5244 14.371C17.3374 14.5803 17.2469 14.8587 17.2752 15.138L17.7049 19.382C17.7821 20.1445 17.0081 20.7069 16.3067 20.3978L12.4032 18.6777C12.1463 18.5645 11.8537 18.5645 11.5968 18.6777L7.69326 20.3978C6.99192 20.7069 6.21789 20.1445 6.2951 19.382L6.7248 15.138C6.75308 14.8587 6.66264 14.5803 6.47558 14.371L3.63339 11.1901C3.12273 10.6186 3.41838 9.70867 4.16744 9.54646L8.3365 8.64367C8.61089 8.58425 8.84767 8.41222 8.98897 8.16962L11.1359 4.48359Z" fill="currentColor" />
																						</svg>
																					</span>
																					<!--end::Svg Icon-->
																				</div>
																				<div class="rating-label checked">
																					<!--begin::Svg Icon | path: icons/duotune/general/gen029.svg-->
																					<span class="svg-icon svg-icon-2">
																						<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																							<path d="M11.1359 4.48359C11.5216 3.82132 12.4784 3.82132 12.8641 4.48359L15.011 8.16962C15.1523 8.41222 15.3891 8.58425 15.6635 8.64367L19.8326 9.54646C20.5816 9.70867 20.8773 10.6186 20.3666 11.1901L17.5244 14.371C17.3374 14.5803 17.2469 14.8587 17.2752 15.138L17.7049 19.382C17.7821 20.1445 17.0081 20.7069 16.3067 20.3978L12.4032 18.6777C12.1463 18.5645 11.8537 18.5645 11.5968 18.6777L7.69326 20.3978C6.99192 20.7069 6.21789 20.1445 6.2951 19.382L6.7248 15.138C6.75308 14.8587 6.66264 14.5803 6.47558 14.371L3.63339 11.1901C3.12273 10.6186 3.41838 9.70867 4.16744 9.54646L8.3365 8.64367C8.61089 8.58425 8.84767 8.41222 8.98897 8.16962L11.1359 4.48359Z" fill="currentColor" />
																						</svg>
																					</span>
																					<!--end::Svg Icon-->
																				</div>
																				<div class="rating-label checked">
																					<!--begin::Svg Icon | path: icons/duotune/general/gen029.svg-->
																					<span class="svg-icon svg-icon-2">
																						<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																							<path d="M11.1359 4.48359C11.5216 3.82132 12.4784 3.82132 12.8641 4.48359L15.011 8.16962C15.1523 8.41222 15.3891 8.58425 15.6635 8.64367L19.8326 9.54646C20.5816 9.70867 20.8773 10.6186 20.3666 11.1901L17.5244 14.371C17.3374 14.5803 17.2469 14.8587 17.2752 15.138L17.7049 19.382C17.7821 20.1445 17.0081 20.7069 16.3067 20.3978L12.4032 18.6777C12.1463 18.5645 11.8537 18.5645 11.5968 18.6777L7.69326 20.3978C6.99192 20.7069 6.21789 20.1445 6.2951 19.382L6.7248 15.138C6.75308 14.8587 6.66264 14.5803 6.47558 14.371L3.63339 11.1901C3.12273 10.6186 3.41838 9.70867 4.16744 9.54646L8.3365 8.64367C8.61089 8.58425 8.84767 8.41222 8.98897 8.16962L11.1359 4.48359Z" fill="currentColor" />
																						</svg>
																					</span>
																					<!--end::Svg Icon-->
																				</div>
																				<div class="rating-label checked">
																					<!--begin::Svg Icon | path: icons/duotune/general/gen029.svg-->
																					<span class="svg-icon svg-icon-2">
																						<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																							<path d="M11.1359 4.48359C11.5216 3.82132 12.4784 3.82132 12.8641 4.48359L15.011 8.16962C15.1523 8.41222 15.3891 8.58425 15.6635 8.64367L19.8326 9.54646C20.5816 9.70867 20.8773 10.6186 20.3666 11.1901L17.5244 14.371C17.3374 14.5803 17.2469 14.8587 17.2752 15.138L17.7049 19.382C17.7821 20.1445 17.0081 20.7069 16.3067 20.3978L12.4032 18.6777C12.1463 18.5645 11.8537 18.5645 11.5968 18.6777L7.69326 20.3978C6.99192 20.7069 6.21789 20.1445 6.2951 19.382L6.7248 15.138C6.75308 14.8587 6.66264 14.5803 6.47558 14.371L3.63339 11.1901C3.12273 10.6186 3.41838 9.70867 4.16744 9.54646L8.3365 8.64367C8.61089 8.58425 8.84767 8.41222 8.98897 8.16962L11.1359 4.48359Z" fill="currentColor" />
																						</svg>
																					</span>
																					<!--end::Svg Icon-->
																				</div>
																				<div class="rating-label checked">
																					<!--begin::Svg Icon | path: icons/duotune/general/gen029.svg-->
																					<span class="svg-icon svg-icon-2">
																						<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																							<path d="M11.1359 4.48359C11.5216 3.82132 12.4784 3.82132 12.8641 4.48359L15.011 8.16962C15.1523 8.41222 15.3891 8.58425 15.6635 8.64367L19.8326 9.54646C20.5816 9.70867 20.8773 10.6186 20.3666 11.1901L17.5244 14.371C17.3374 14.5803 17.2469 14.8587 17.2752 15.138L17.7049 19.382C17.7821 20.1445 17.0081 20.7069 16.3067 20.3978L12.4032 18.6777C12.1463 18.5645 11.8537 18.5645 11.5968 18.6777L7.69326 20.3978C6.99192 20.7069 6.21789 20.1445 6.2951 19.382L6.7248 15.138C6.75308 14.8587 6.66264 14.5803 6.47558 14.371L3.63339 11.1901C3.12273 10.6186 3.41838 9.70867 4.16744 9.54646L8.3365 8.64367C8.61089 8.58425 8.84767 8.41222 8.98897 8.16962L11.1359 4.48359Z" fill="currentColor" />
																						</svg>
																					</span>
																					<!--end::Svg Icon-->
																				</div>
																			</div>
																			<!--end::Rating-->
																		</td>
																		<td>
																			<a href="../../inbox/reply.html" class="d-flex text-dark text-gray-800 text-hover-primary">
																				<!--begin::Avatar-->
																				<div class="symbol symbol-circle symbol-25px me-3">
																					<div class="symbol-label bg-light-info">
																						<span class="text-info">A</span>
																					</div>
																				</div>
																				<!--end::Avatar-->
																				<!--begin::Name-->
																				<span class="fw-bold">Robert Doe</span>
																				<!--end::Name-->
																			</a>
																		</td>
																		<td class="text-gray-600 fw-bold">Got this on sale! Best decision ever!</td>
																		<td class="text-end">
																			<span class="fw-semibold text-muted">March 12</span>
																		</td>
																	</tr>
																	<tr>
																		<td>
																			<!--begin::Checkbox-->
																			<div class="form-check form-check-sm form-check-custom form-check-solid mt-1">
																				<input class="form-check-input" type="checkbox" value="1" />
																			</div>
																			<!--end::Checkbox-->
																		</td>
																		<td data-order="rating-5">
																			<!--begin::Rating-->
																			<div class="rating">
																				<div class="rating-label checked">
																					<!--begin::Svg Icon | path: icons/duotune/general/gen029.svg-->
																					<span class="svg-icon svg-icon-2">
																						<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																							<path d="M11.1359 4.48359C11.5216 3.82132 12.4784 3.82132 12.8641 4.48359L15.011 8.16962C15.1523 8.41222 15.3891 8.58425 15.6635 8.64367L19.8326 9.54646C20.5816 9.70867 20.8773 10.6186 20.3666 11.1901L17.5244 14.371C17.3374 14.5803 17.2469 14.8587 17.2752 15.138L17.7049 19.382C17.7821 20.1445 17.0081 20.7069 16.3067 20.3978L12.4032 18.6777C12.1463 18.5645 11.8537 18.5645 11.5968 18.6777L7.69326 20.3978C6.99192 20.7069 6.21789 20.1445 6.2951 19.382L6.7248 15.138C6.75308 14.8587 6.66264 14.5803 6.47558 14.371L3.63339 11.1901C3.12273 10.6186 3.41838 9.70867 4.16744 9.54646L8.3365 8.64367C8.61089 8.58425 8.84767 8.41222 8.98897 8.16962L11.1359 4.48359Z" fill="currentColor" />
																						</svg>
																					</span>
																					<!--end::Svg Icon-->
																				</div>
																				<div class="rating-label checked">
																					<!--begin::Svg Icon | path: icons/duotune/general/gen029.svg-->
																					<span class="svg-icon svg-icon-2">
																						<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																							<path d="M11.1359 4.48359C11.5216 3.82132 12.4784 3.82132 12.8641 4.48359L15.011 8.16962C15.1523 8.41222 15.3891 8.58425 15.6635 8.64367L19.8326 9.54646C20.5816 9.70867 20.8773 10.6186 20.3666 11.1901L17.5244 14.371C17.3374 14.5803 17.2469 14.8587 17.2752 15.138L17.7049 19.382C17.7821 20.1445 17.0081 20.7069 16.3067 20.3978L12.4032 18.6777C12.1463 18.5645 11.8537 18.5645 11.5968 18.6777L7.69326 20.3978C6.99192 20.7069 6.21789 20.1445 6.2951 19.382L6.7248 15.138C6.75308 14.8587 6.66264 14.5803 6.47558 14.371L3.63339 11.1901C3.12273 10.6186 3.41838 9.70867 4.16744 9.54646L8.3365 8.64367C8.61089 8.58425 8.84767 8.41222 8.98897 8.16962L11.1359 4.48359Z" fill="currentColor" />
																						</svg>
																					</span>
																					<!--end::Svg Icon-->
																				</div>
																				<div class="rating-label checked">
																					<!--begin::Svg Icon | path: icons/duotune/general/gen029.svg-->
																					<span class="svg-icon svg-icon-2">
																						<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																							<path d="M11.1359 4.48359C11.5216 3.82132 12.4784 3.82132 12.8641 4.48359L15.011 8.16962C15.1523 8.41222 15.3891 8.58425 15.6635 8.64367L19.8326 9.54646C20.5816 9.70867 20.8773 10.6186 20.3666 11.1901L17.5244 14.371C17.3374 14.5803 17.2469 14.8587 17.2752 15.138L17.7049 19.382C17.7821 20.1445 17.0081 20.7069 16.3067 20.3978L12.4032 18.6777C12.1463 18.5645 11.8537 18.5645 11.5968 18.6777L7.69326 20.3978C6.99192 20.7069 6.21789 20.1445 6.2951 19.382L6.7248 15.138C6.75308 14.8587 6.66264 14.5803 6.47558 14.371L3.63339 11.1901C3.12273 10.6186 3.41838 9.70867 4.16744 9.54646L8.3365 8.64367C8.61089 8.58425 8.84767 8.41222 8.98897 8.16962L11.1359 4.48359Z" fill="currentColor" />
																						</svg>
																					</span>
																					<!--end::Svg Icon-->
																				</div>
																				<div class="rating-label checked">
																					<!--begin::Svg Icon | path: icons/duotune/general/gen029.svg-->
																					<span class="svg-icon svg-icon-2">
																						<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																							<path d="M11.1359 4.48359C11.5216 3.82132 12.4784 3.82132 12.8641 4.48359L15.011 8.16962C15.1523 8.41222 15.3891 8.58425 15.6635 8.64367L19.8326 9.54646C20.5816 9.70867 20.8773 10.6186 20.3666 11.1901L17.5244 14.371C17.3374 14.5803 17.2469 14.8587 17.2752 15.138L17.7049 19.382C17.7821 20.1445 17.0081 20.7069 16.3067 20.3978L12.4032 18.6777C12.1463 18.5645 11.8537 18.5645 11.5968 18.6777L7.69326 20.3978C6.99192 20.7069 6.21789 20.1445 6.2951 19.382L6.7248 15.138C6.75308 14.8587 6.66264 14.5803 6.47558 14.371L3.63339 11.1901C3.12273 10.6186 3.41838 9.70867 4.16744 9.54646L8.3365 8.64367C8.61089 8.58425 8.84767 8.41222 8.98897 8.16962L11.1359 4.48359Z" fill="currentColor" />
																						</svg>
																					</span>
																					<!--end::Svg Icon-->
																				</div>
																				<div class="rating-label checked">
																					<!--begin::Svg Icon | path: icons/duotune/general/gen029.svg-->
																					<span class="svg-icon svg-icon-2">
																						<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																							<path d="M11.1359 4.48359C11.5216 3.82132 12.4784 3.82132 12.8641 4.48359L15.011 8.16962C15.1523 8.41222 15.3891 8.58425 15.6635 8.64367L19.8326 9.54646C20.5816 9.70867 20.8773 10.6186 20.3666 11.1901L17.5244 14.371C17.3374 14.5803 17.2469 14.8587 17.2752 15.138L17.7049 19.382C17.7821 20.1445 17.0081 20.7069 16.3067 20.3978L12.4032 18.6777C12.1463 18.5645 11.8537 18.5645 11.5968 18.6777L7.69326 20.3978C6.99192 20.7069 6.21789 20.1445 6.2951 19.382L6.7248 15.138C6.75308 14.8587 6.66264 14.5803 6.47558 14.371L3.63339 11.1901C3.12273 10.6186 3.41838 9.70867 4.16744 9.54646L8.3365 8.64367C8.61089 8.58425 8.84767 8.41222 8.98897 8.16962L11.1359 4.48359Z" fill="currentColor" />
																						</svg>
																					</span>
																					<!--end::Svg Icon-->
																				</div>
																			</div>
																			<!--end::Rating-->
																		</td>
																		<td>
																			<a href="../../inbox/reply.html" class="d-flex text-dark text-gray-800 text-hover-primary">
																				<!--begin::Avatar-->
																				<div class="symbol symbol-circle symbol-25px me-3">
																					<span class="symbol-label" style="background-image:url(<?= base_url() ?>assets/media/avatars/300-13.jpg)"></span>
																				</div>
																				<!--end::Avatar-->
																				<!--begin::Name-->
																				<span class="fw-bold">John Miller</span>
																				<!--end::Name-->
																			</a>
																		</td>
																		<td class="text-gray-600 fw-bold">Firesale is on! Buy now! Totally worth it!</td>
																		<td class="text-end">
																			<span class="fw-semibold text-muted">March 11</span>
																		</td>
																	</tr>
																</tbody>
																<!--end::Table body-->
															</table>
															<!--end::Table-->
														</div>
														<!--end::Card body-->
													</div>
													<!--end::Reviews-->
												</div>
											</div>
											<!--end::Tab pane-->
										</div>
										<!--end::Tab content-->
										<div class="d-flex justify-content-end">
											<!--begin::Button-->
											<a href="catalogs/add" id="kt_ecommerce_add_product_cancel" class="btn btn-light me-5">Cancel</a>
											<!--end::Button-->
											<!--begin::Button-->
											<button type="submit" id="kt_ecommerce_add_product_submit" class="btn btn-primary">
												<span class="indicator-label">Save Changes</span>
												<span class="indicator-progress">Please wait...
													<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
											</button>
											<!--end::Button-->
										</div>
									</div>
									<!--end::Main column-->
								</form>
								<!--end::Form-->
							</div>
							<!--end::Content container-->
						</div>
						<!--end::Toolbar-->
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
	<script src="<?= base_url() ?>assets/plugins/custom/formrepeater/formrepeater.bundle.js"></script>
	<!--end::Vendors Javascript-->
	<!--begin::Custom Javascript(used for this page only)-->
	<script src="<?= base_url() ?>assets/js/custom/apps/ecommerce/catalog/save-product.js"></script>
	<script src="<?= base_url() ?>assets/js/widgets.bundle.js"></script>
	<script src="<?= base_url() ?>assets/js/custom/widgets.js"></script>
	<!--end::Custom Javascript-->
	<!--end::Javascript-->
</body>
<!--end::Body-->

</html>