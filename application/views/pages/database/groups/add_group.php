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
                                    <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">Edit/View Group</h1>
                                    <!--end::Title-->
                                    <!--begin::Breadcrumb-->
                                    <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                                        <!--begin::Item-->
                                        <li class="breadcrumb-item text-muted">
                                            <a href="<?=site_url('membership') ?>" class="text-muted text-hover-primary">Database</a>
                                        </li>
                                        <!--end::Item-->
                                        <!--begin::Item-->
                                        <li class="breadcrumb-item">
                                            <span class="bullet bg-gray-400 w-5px h-2px"></span>
                                        </li>
                                        <!--end::Item-->
                                        <!--begin::Item-->
                                        <li class="breadcrumb-item text-muted">Group</li>
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
									<form id="kt_ecommerce_add_category_form" class="form d-flex flex-column flex-lg-row mb-5" 
										data-kt-redirect="<?=isset($group)?site_url('database/edit-group/'.$group->id):'add-group' ?>">
										<?php if(isset($group)){ ?>
										<input type="hidden" name="id" value="<?=isset($group)?$group->id:'' ?>">
										<?php } ?>
										<!--begin::Aside column-->
										<div class="d-flex flex-column gap-7 gap-lg-10 w-100 w-lg-300px mb-7 me-lg-10">
											<!--begin::Thumbnail settings-->
											<div class="card card-flush py-4">
												<!--begin::Card header-->
												<div class="card-header">
													<!--begin::Card title-->
													<div class="card-title">
														<h2>Thumbnail</h2>
													</div>
													<!--end::Card title-->
												</div>
												<!--end::Card header-->
												<!--begin::Card body-->
												
													<div class="card-body text-center pt-0">
													<!--begin::Image input-->
													<!--begin::Image input placeholder-->
													<style>.image-input-placeholder { background-image: url('<?=isset($group)?($group->avatar?$group->avatar:base_url("assets/media/svg/files/blank-image.svg")):base_url("assets/media/svg/files/blank-image.svg") ?>'); }
													 [data-theme="dark"] .image-input-placeholder { background-image: url('<?=isset($group)?($group->avatar?$group->avatar:base_url("assets/media/svg/files/blank-image-dark.svg")):base_url("assets/media/svg/files/blank-image-dark.svg") ?>'); }</style>
													<!--end::Image input placeholder-->
													<!--begin::Image input-->
													<div class="image-input image-input-empty image-input-outline image-input-placeholder mb-3" data-kt-image-input="true">
														<!--begin::Preview existing avatar-->
														<div class="image-input-wrapper w-150px h-150px"></div>
														<!--end::Preview existing avatar-->
														<!--begin::Label-->
														<label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Change avatar">
															<!--begin::Icon-->
															<i class="bi bi-pencil-fill fs-7"></i>
															<!--end::Icon-->
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
													<div class="text-muted fs-7">Set the group thumbnail image. Only *.png, *.jpg and *.jpeg image files are accepted</div>
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
														<div class="rounded-circle bg-success w-15px h-15px" id="kt_ecommerce_add_category_status"></div>
													</div>
													<!--begin::Card toolbar-->
												</div>
												<!--end::Card header-->
												<!--begin::Card body-->
												<div class="card-body pt-0">
													<!--begin::Select2-->
													<select class="form-select mb-2" data-control="select2" data-hide-search="true" data-placeholder="Select an option" id="kt_ecommerce_add_category_status_select" name="status">
														<option></option>
														<option value="published" <?=isset($group)?($group->status==='published'?'selected':''):'selected'; ?>>Published</option>
														<option value="unpublished" <?=isset($group)?($group->status==='unpublished'?'selected':''):''; ?>>Unpublished</option>
													</select>
													<!--end::Select2-->
													<!--begin::Description-->
													<div class="text-muted fs-7">Set the group status.</div>
													<!--end::Description-->
													<!--begin::Datepicker-->
													<div class="d-none mt-10">
														<label for="kt_ecommerce_add_category_status_datepicker" class="form-label">Select publishing date and time</label>
														<input class="form-control" id="kt_ecommerce_add_category_status_datepicker" placeholder="Pick date & time" />
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
													<!--begin::Input group-->
													<div class="mb-10 fv-row">
														<!--begin::Label-->
														<label class="required form-label">Group Name</label>
														<!--end::Label-->
														<!--begin::Input-->
														<input type="text" name="name" class="form-control mb-2" placeholder="Group name" value="<?=isset($group)?$group->name:''; ?>" />
														<!--end::Input-->
														<!--begin::Description-->
														<div class="text-muted fs-7">A group name is required and recommended to be unique.</div>
														<!--end::Description-->
													</div>
													<!--end::Input group-->

													<!--begin::Input group-->
													<div class="mb-10 fv-row">
														<!--begin::Label-->
														<label class="required form-label">Group Code</label>
														<!--end::Label-->
														<!--begin::Input-->
														<input type="text" name="code" class="form-control mb-2" placeholder="Group code" value="<?=isset($group)?$group->code:''; ?>" />
														<!--end::Input-->
														<!--begin::Description-->
														<div class="text-muted fs-7">A group code is required and recommended to be unique.</div>
														<!--end::Description-->
													</div>
													<!--end::Input group-->

													<!--begin::Input group-->
													<div>
														<!--begin::Label-->
														<label class="form-label">Description</label>
														<!--end::Label-->
														<!--begin::Editor-->
														<div id="kt_ecommerce_add_category_description" name="description" class="min-h-200px mb-2">
														<?=isset($group)?$group->description:''; ?>
														</div>
														<!--end::Editor-->
														<!--begin::Description-->
														<div class="text-muted fs-7">Set a description to the group for better visibility.</div>
														<!--end::Description-->
													</div>
													<!--end::Input group-->
												</div>
												<!--end::Card header-->
											</div>
											<!--end::General options-->
											<!--begin::Meta options-->
											<div class="card card-flush py-4">
												<!--begin::Card header-->
												<div class="card-header">
													<div class="card-title">
														<h2>Meta Options</h2>
													</div>
												</div>
												<!--end::Card header-->
												<!--begin::Card body-->
												<div class="card-body pt-0">
													<!--begin::Input group-->
													<div class="mb-10">
														<!--begin::Label-->
														<label class="form-label">Meta Tag Title</label>
														<!--end::Label-->
														<!--begin::Input-->
														<input type="text" class="form-control mb-2" name="meta_title" placeholder="Meta tag name" />
														<!--end::Input-->
														<!--begin::Description-->
														<div class="text-muted fs-7">Set a meta tag title. Recommended to be simple and precise keywords.</div>
														<!--end::Description-->
													</div>
													<!--end::Input group-->
													<!--begin::Input group-->
													<div class="mb-10">
														<!--begin::Label-->
														<label class="form-label">Meta Tag Description</label>
														<!--end::Label-->
														<!--begin::Editor-->
														<div id="kt_ecommerce_add_category_meta_description" name="meta_description" class="min-h-100px mb-2"></div>
														<!--end::Editor-->
														<!--begin::Description-->
														<div class="text-muted fs-7">Set a meta tag description to the group for increased SEO ranking.</div>
														<!--end::Description-->
													</div>
													<!--end::Input group-->
													<!--begin::Input group-->
													<div>
														<!--begin::Label-->
														<label class="form-label">Meta Tag Keywords</label>
														<!--end::Label-->
														<!--begin::Editor-->
														<input id="kt_ecommerce_add_category_meta_keywords" name="kt_ecommerce_add_category_meta_keywords" class="form-control mb-2" />
														<!--end::Editor-->
														<!--begin::Description-->
														<div class="text-muted fs-7">Set a list of keywords that the group is related to. Separate the keywords by adding a comma 
														<code>,</code>between each keyword.</div>
														<!--end::Description-->
													</div>
													<!--end::Input group-->
												</div>
												<!--end::Card header-->
											</div>
											<!--end::Meta options-->
											
											<div class="d-flex justify-content-end">
												<!--begin::Button-->
												<a href="../add-group" id="kt_ecommerce_add_product_cancel" class="btn btn-light me-5">Cancel</a>
												<!--end::Button-->
												<!--begin::Button-->
												<button type="submit" id="kt_ecommerce_add_category_submit" class="btn btn-primary">
													<span class="indicator-label">Save Changes</span>
													<span class="indicator-progress">Please wait... 
													<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
												</button>
												<!--end::Button-->
											</div>
										</div>
										<!--end::Main column-->
									</form>
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
		<script src="<?=base_url(); ?>assets/js/custom/apps/ecommerce/catalog/save-category.js"></script>
		<script src="<?=base_url(); ?>assets/js/widgets.bundle.js"></script>
		<script src="<?=base_url(); ?>assets/js/custom/widgets.js"></script>>
		<!--end::Custom Javascript-->
    <!--end::Javascript-->
</body>
<!--end::Body-->

</html>