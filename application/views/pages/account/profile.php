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
									<h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">Account Profile</h1>
									<!--end::Title-->
									<!--begin::Breadcrumb-->
									<ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
										<!--begin::Item-->
										<li class="breadcrumb-item text-muted">
											<a href="<?= site_url('account/profile'); ?>" class="text-muted text-hover-primary">Users</a>
										</li>
										<!--end::Item-->
										<!--begin::Item-->
										<li class="breadcrumb-item">
											<span class="bullet bg-gray-400 w-5px h-2px"></span>
										</li>
										<!--end::Item-->
										<!--begin::Item-->
										<li class="breadcrumb-item text-muted">Account Profile</li>
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
                                <div class="d-flex flex-column flex-lg-row">
                                    <!--begin::Sidebar-->
                                    <div class="flex-column flex-lg-row-auto w-lg-250px w-xl-350px mb-10">
                                        <!--begin::Card-->
                                        <div class="card mb-5 mb-xl-8">
                                            <!--begin::Card body-->
                                            <div class="card-body">
                                                <!--begin::Summary-->
                                                <!--begin::User Info-->
                                                <div class="d-flex flex-center flex-column py-5">
                                                    <!--begin::Avatar-->
                                                    <div class="symbol symbol-100px symbol-circle mb-7">
                                                        <img src="<?= $this->user->urlToAvatar($user->thumb_photo_url); ?>" alt="image" />
                                                    </div>
                                                    <!--end::Avatar-->
                                                    <!--begin::Name-->
                                                    <a href="#" class="fs-3 text-gray-800 text-hover-primary fw-bold mb-3"><?= $user->name; ?></a>
                                                    <!--end::Name-->
                                                    <!--begin::Position-->
                                                    <div class="mb-9">
                                                        <!--begin::Badge-->
                                                        <div class="badge badge-lg badge-light-primary d-inline"><?= $user->role->title; ?></div>
                                                        <!--begin::Badge-->
                                                    </div>
                                                    <!--end::Position-->
                                                </div>
                                                <!--end::User Info-->
                                                <!--end::Summary-->
                                                <!--begin::Details toggle-->
                                                <div class="d-flex flex-stack fs-4 py-3">
                                                    <div class="fw-bold rotate collapsible" data-bs-toggle="collapse" href="#kt_user_view_details" role="button" aria-expanded="false" aria-controls="kt_user_view_details">Details
                                                        <span class="ms-2 rotate-180">
                                                            <!--begin::Svg Icon | path: icons/duotune/arrows/arr072.svg-->
                                                            <span class="svg-icon svg-icon-3">
                                                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <path d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z" fill="currentColor" />
                                                                </svg>
                                                            </span>
                                                            <!--end::Svg Icon-->
                                                        </span>
                                                    </div>
                                                    <span data-bs-toggle="tooltip" data-bs-trigger="hover" title="Edit customer details">
                                                        <a href="#" class="btn btn-sm btn-light-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_update_details">Edit</a>
                                                    </span>
                                                </div>
                                                <!--end::Details toggle-->
                                                <div class="separator"></div>
                                                <!--begin::Details content-->
                                                <div id="kt_user_view_details" class="collapse show">
                                                    <div class="pb-5 fs-6">
                                                        <!--begin::Details item-->
                                                        <div class="fw-bold mt-5">Account ID</div>
                                                        <div class="text-gray-600">ID-<?= $user->id; ?></div>
                                                        <!--begin::Details item-->
                                                        <!--begin::Details item-->
                                                        <div class="fw-bold mt-5">Email</div>
                                                        <div class="text-gray-600">
                                                            <a href="#" class="text-gray-600 text-hover-primary"><?= $user->email; ?></a>
                                                        </div>
                                                        <!--begin::Details item-->
                                                        <!--begin::Details item-->
                                                        <div class="fw-bold mt-5">Phone</div>
                                                        <div class="text-gray-600"><?= $user->phone; ?></div>
                                                        <!--begin::Details item-->
                                                        <!--begin::Details item-->
                                                        <div class="fw-bold mt-5">Language</div>
                                                        <div class="text-gray-600">English</div>
                                                        <!--begin::Details item-->
                                                    </div>
                                                </div>
                                                <!--end::Details content-->
                                            </div>
                                            <!--end::Card body-->
                                        </div>
                                        <!--end::Card-->

                                    </div>
                                    <!--end::Sidebar-->
                                    <!--begin::Content-->
                                    <div class="flex-lg-row-fluid ms-lg-15">
                                        <!--begin:::Tabs-->
                                        <ul class="nav nav-custom nav-tabs nav-line-tabs nav-line-tabs-2x border-0 fs-4 fw-semibold mb-8">

                                            <!--begin:::Tab item-->
                                            <li class="nav-item">
                                                <a class="nav-link text-active-primary pb-4" data-kt-countup-tabs="true" data-bs-toggle="tab" href="#kt_user_view_overview_security">Security</a>
                                            </li>
                                            <!--end:::Tab item-->
                                        </ul>
                                        <!--end:::Tabs-->
                                        <!--begin:::Tab content-->
                                        <div class="tab-content" id="myTabContent">
                                            <!--begin:::Tab pane-->
                                            <div class="tab-pane fade show active" id="kt_user_view_overview_security" role="tabpanel">
                                                <!--begin::Card-->
                                                <div class="card pt-4 mb-6 mb-xl-9">
                                                    <!--begin::Card header-->
                                                    <div class="card-header border-0">
                                                        <!--begin::Card title-->
                                                        <div class="card-title">
                                                            <h2>Profile</h2>
                                                        </div>
                                                        <!--end::Card title-->
                                                    </div>
                                                    <!--end::Card header-->
                                                    <!--begin::Card body-->
                                                    <div class="card-body pt-0 pb-5">
                                                        <!--begin::Table wrapper-->
                                                        <div class="table-responsive">
                                                            <!--begin::Table-->
                                                            <table class="table align-middle table-row-dashed gy-5" id="kt_table_users_login_session">
                                                                <!--begin::Table body-->
                                                                <tbody class="fs-6 fw-semibold text-gray-600">
                                                                    <tr>
                                                                        <td>Email</td>
                                                                        <td><?= $user->email; ?></td>
                                                                        <td class="text-end">
                                                                            <button type="button" class="btn btn-icon btn-active-light-primary w-30px h-30px ms-auto" data-bs-toggle="modal" data-bs-target="#kt_modal_update_email">
                                                                                <!--begin::Svg Icon | path: icons/duotune/art/art005.svg-->
                                                                                <span class="svg-icon svg-icon-3">
                                                                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                                        <path opacity="0.3" d="M21.4 8.35303L19.241 10.511L13.485 4.755L15.643 2.59595C16.0248 2.21423 16.5426 1.99988 17.0825 1.99988C17.6224 1.99988 18.1402 2.21423 18.522 2.59595L21.4 5.474C21.7817 5.85581 21.9962 6.37355 21.9962 6.91345C21.9962 7.45335 21.7817 7.97122 21.4 8.35303ZM3.68699 21.932L9.88699 19.865L4.13099 14.109L2.06399 20.309C1.98815 20.5354 1.97703 20.7787 2.03189 21.0111C2.08674 21.2436 2.2054 21.4561 2.37449 21.6248C2.54359 21.7934 2.75641 21.9115 2.989 21.9658C3.22158 22.0201 3.4647 22.0084 3.69099 21.932H3.68699Z" fill="currentColor" />
                                                                                        <path d="M5.574 21.3L3.692 21.928C3.46591 22.0032 3.22334 22.0141 2.99144 21.9594C2.75954 21.9046 2.54744 21.7864 2.3789 21.6179C2.21036 21.4495 2.09202 21.2375 2.03711 21.0056C1.9822 20.7737 1.99289 20.5312 2.06799 20.3051L2.696 18.422L5.574 21.3ZM4.13499 14.105L9.891 19.861L19.245 10.507L13.489 4.75098L4.13499 14.105Z" fill="currentColor" />
                                                                                    </svg>
                                                                                </span>
                                                                                <!--end::Svg Icon-->
                                                                            </button>
                                                                        </td>
                                                                  
                                                                </tbody>
                                                                <!--end::Table body-->
                                                            </table>
                                                            <!--end::Table-->
                                                        </div>
                                                        <!--end::Table wrapper-->
                                                    </div>
                                                    <!--end::Card body-->
                                                </div>
                                                <!--end::Card-->
                                                <!--begin::Card-->
                                                <div class="card pt-4 mb-6 mb-xl-9">
                                                    <!--begin::Card header-->
                                                    <div class="card-header border-0">
                                                        <!--begin::Card title-->
                                                        <div class="card-title flex-column">
                                                            <h2 class="mb-1">Two Step Authentication</h2>
                                                            <div class="fs-6 fw-semibold text-muted">Keep your account extra secure with two-step authentication.</div>
                                                        </div>
                                                        <!--end::Card title-->
                                                       
                                                    </div>
                                                    <!--end::Card header-->
                                                    <!--begin::Card body-->
                                                    <div class="card-body pb-5">
                                                        <!--begin::Item-->
                                                        <div class="d-flex flex-stack">
                                                            <!--begin::Content-->
                                                            <div class="d-flex flex-column">
                                                                <span>SMS</span>
                                                                <span class="text-muted fs-6">+<?= $user->phone; ?></span>
                                                            </div>
                                                            <!--end::Content-->
                                                            <!--begin::Action-->
                                                            <div class="d-flex justify-content-end align-items-center">
                                                                <!--begin::Button-->
                                                                <button type="button" class="btn btn-icon btn-active-light-primary w-30px h-30px ms-auto me-5" data-bs-toggle="modal" data-bs-target="#kt_modal_add_one_time_password">
                                                                    <!--begin::Svg Icon | path: icons/duotune/art/art005.svg-->
                                                                    <span class="svg-icon svg-icon-3">
                                                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                            <path opacity="0.3" d="M21.4 8.35303L19.241 10.511L13.485 4.755L15.643 2.59595C16.0248 2.21423 16.5426 1.99988 17.0825 1.99988C17.6224 1.99988 18.1402 2.21423 18.522 2.59595L21.4 5.474C21.7817 5.85581 21.9962 6.37355 21.9962 6.91345C21.9962 7.45335 21.7817 7.97122 21.4 8.35303ZM3.68699 21.932L9.88699 19.865L4.13099 14.109L2.06399 20.309C1.98815 20.5354 1.97703 20.7787 2.03189 21.0111C2.08674 21.2436 2.2054 21.4561 2.37449 21.6248C2.54359 21.7934 2.75641 21.9115 2.989 21.9658C3.22158 22.0201 3.4647 22.0084 3.69099 21.932H3.68699Z" fill="currentColor" />
                                                                            <path d="M5.574 21.3L3.692 21.928C3.46591 22.0032 3.22334 22.0141 2.99144 21.9594C2.75954 21.9046 2.54744 21.7864 2.3789 21.6179C2.21036 21.4495 2.09202 21.2375 2.03711 21.0056C1.9822 20.7737 1.99289 20.5312 2.06799 20.3051L2.696 18.422L5.574 21.3ZM4.13499 14.105L9.891 19.861L19.245 10.507L13.489 4.75098L4.13499 14.105Z" fill="currentColor" />
                                                                        </svg>
                                                                    </span>
                                                                    <!--end::Svg Icon-->
                                                                </button>
                                                                <!--end::Button-->
                                                              
                                                            </div>
                                                            <!--end::Action-->
                                                        </div>
                                                        <!--end::Item-->
                                                        <!--begin:Separator-->
                                                        <div class="separator separator-dashed my-5"></div>
                                                        <!--end:Separator-->
                                                        <!--begin::Disclaimer-->
                                                        <div class="text-gray-600">If you lose your mobile device or security key, you can
                                                            <a href='#' class="me-1">generate a backup code</a>to sign in to your account.
                                                        </div>
                                                        <!--end::Disclaimer-->
                                                    </div>
                                                    <!--end::Card body-->
                                                </div>
                                                <!--end::Card-->

                                            </div>
                                            <!--end:::Tab pane-->

                                        </div>
                                        <!--end:::Tab content-->
                                    </div>
                                    <!--end::Content-->
                                </div>
                                <!--end::Layout-->
                                <!--begin::Modals-->
                                <!--begin::Modal - Update user details-->
                                <div class="modal fade" id="kt_modal_update_details" tabindex="-1" aria-hidden="true">
                                    <!--begin::Modal dialog-->
                                    <div class="modal-dialog modal-dialog-centered mw-650px">
                                        <!--begin::Modal content-->
                                        <div class="modal-content">
                                            <!--begin::Form-->
                                            <form class="form" action="<?=site_url('account/profile') ?>" id="kt_modal_update_user_form">
                                                <!--begin::Modal header-->
                                                <div class="modal-header" id="kt_modal_update_user_header">
                                                    <!--begin::Modal title-->
                                                    <h2 class="fw-bold">Update User Details</h2>
                                                    <!--end::Modal title-->
                                                    <!--begin::Close-->
                                                    <div class="btn btn-icon btn-sm btn-active-icon-primary" data-kt-users-modal-action="close">
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
                                                <div class="modal-body py-10 px-lg-17">
                                                    <!--begin::Scroll-->
                                                    <div class="d-flex flex-column scroll-y me-n7 pe-7" id="kt_modal_update_user_scroll" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_update_user_header" data-kt-scroll-wrappers="#kt_modal_update_user_scroll" data-kt-scroll-offset="300px">
                                                        <!--begin::User toggle-->
                                                        <div class="fw-bolder fs-3 rotate collapsible mb-7" data-bs-toggle="collapse" href="#kt_modal_update_user_user_info" role="button" aria-expanded="false" aria-controls="kt_modal_update_user_user_info">User Information
                                                            <span class="ms-2 rotate-180">
                                                                <!--begin::Svg Icon | path: icons/duotune/arrows/arr072.svg-->
                                                                <span class="svg-icon svg-icon-3">
                                                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                        <path d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z" fill="currentColor" />
                                                                    </svg>
                                                                </span>
                                                                <!--end::Svg Icon-->
                                                            </span>
                                                        </div>
                                                        <!--end::User toggle-->
                                                        <!--begin::User form-->
                                                        <div id="kt_modal_update_user_user_info" class="collapse show">
                                                            <!--begin::Input group-->
                                                            <div class="mb-7 mw-5">
                                                                <!--begin::Label-->
                                                                <label class="fs-6 fw-semibold mb-2">
                                                                    <span>Update Avatar</span>
                                                                    <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="Allowed file types: png, jpg, jpeg."></i>
                                                                </label>
                                                                <!--end::Label-->
                                                                <!--begin::Image input wrapper-->
                                                                <div class="mt-1">
                                                                    <!--begin::Image placeholder-->
                                                                    <style>
                                                                        .image-input-placeholder {
                                                                            background-image: url('<?= base_url(); ?>assets/media/svg/files/blank-image.svg');
                                                                        }

                                                                        [data-theme="dark"] .image-input-placeholder {
                                                                            background-image: url('<?= base_url(); ?>assets/media/svg/files/blank-image-dark.svg');
                                                                        }
                                                                    </style>
                                                                    <!--end::Image placeholder-->
                                                                    <!--begin::Image input-->
                                                                    <div class="image-input image-input-outline image-input-placeholder" data-kt-image-input="true">
                                                                        <!--begin::Preview existing avatar-->
                                                                        <div class="image-input-wrapper w-125px h-125px" style="background-image: url('<?=$this->user->urlToAvatar($user->thumb_photo_url) ?>')"></div>
                                                                        <!--end::Preview existing avatar-->
                                                                        <!--begin::Edit-->
                                                                        <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Change avatar">
                                                                            <i class="bi bi-pencil-fill fs-7"></i>
                                                                            <!--begin::Inputs-->
                                                                            <input type="file" name="avatar" accept=".png, .jpg, .jpeg" />
                                                                            <input type="hidden" name="avatar_remove" />
                                                                            <!--end::Inputs-->
                                                                        </label>
                                                                        <!--end::Edit-->
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
                                                                </div>
                                                                <!--end::Image input wrapper-->
                                                            </div>
                                                            <!--end::Input group-->
                                                            <!--begin::Input group-->
                                                            <div class="fv-row mb-7">
                                                                <!--begin::Label-->
                                                                <label class="fs-6 fw-semibold mb-2">Name</label>
                                                                <!--end::Label-->
                                                                <!--begin::Input-->
                                                                <input type="text" class="form-control form-control-solid" placeholder="" name="name" value="<?=$user->name; ?>" />
                                                                <!--end::Input-->
                                                            </div>
                                                            <!--end::Input group-->
                                                            <!--begin::Input group-->
                                                            <div class="fv-row mb-7">
                                                                <!--begin::Label-->
                                                                <label class="fs-6 fw-semibold mb-2">
                                                                    <span>Email</span>
                                                                    <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="Email address must be active"></i>
                                                                </label>
                                                                <!--end::Label-->
                                                                <!--begin::Input-->
                                                                <input type="email" class="form-control form-control-solid" placeholder="" name="email" value="<?=$user->email; ?>" />
                                                                <!--end::Input-->
                                                            </div>
                                                            <!--end::Input group-->
                                                           

                                                        </div>
                                                        <!--end::User form-->
                                                       
                                                    </div>
                                                    <!--end::Scroll-->
                                                </div>
                                                <!--end::Modal body-->
                                                <!--begin::Modal footer-->
                                                <div class="modal-footer flex-center">
                                                    <!--begin::Button-->
                                                    <button type="reset" class="btn btn-light me-3" data-kt-users-modal-action="cancel">Discard</button>
                                                    <!--end::Button-->
                                                    <!--begin::Button-->
                                                    <button type="submit" class="btn btn-primary" data-kt-users-modal-action="submit">
                                                        <span class="indicator-label">Submit</span>
                                                        <span class="indicator-progress">Please wait...
                                                            <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                                    </button>
                                                    <!--end::Button-->
                                                </div>
                                                <!--end::Modal footer-->
                                            </form>
                                            <!--end::Form-->
                                        </div>
                                    </div>
                                </div>
                                <!--end::Modal - Update user details-->
                                <!--begin::Modal - Update email-->
                                <div class="modal fade" id="kt_modal_update_email" tabindex="-1" aria-hidden="true">
                                    <!--begin::Modal dialog-->
                                    <div class="modal-dialog modal-dialog-centered mw-650px">
                                        <!--begin::Modal content-->
                                        <div class="modal-content">
                                            <!--begin::Modal header-->
                                            <div class="modal-header">
                                                <!--begin::Modal title-->
                                                <h2 class="fw-bold">Update Email Address</h2>
                                                <!--end::Modal title-->
                                                <!--begin::Close-->
                                                <div class="btn btn-icon btn-sm btn-active-icon-primary" data-kt-users-modal-action="close">
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
                                            <div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
                                                <!--begin::Form-->
                                                <form id="kt_modal_update_email_form" class="form" action="#">
                                                    <!--begin::Notice-->
                                                    <!--begin::Notice-->
                                                    <div class="notice d-flex bg-light-primary rounded border-primary border border-dashed mb-9 p-6">
                                                        <!--begin::Icon-->
                                                        <!--begin::Svg Icon | path: icons/duotune/general/gen044.svg-->
                                                        <span class="svg-icon svg-icon-2tx svg-icon-primary me-4">
                                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="10" fill="currentColor" />
                                                                <rect x="11" y="14" width="7" height="2" rx="1" transform="rotate(-90 11 14)" fill="currentColor" />
                                                                <rect x="11" y="17" width="2" height="2" rx="1" transform="rotate(-90 11 17)" fill="currentColor" />
                                                            </svg>
                                                        </span>
                                                        <!--end::Svg Icon-->
                                                        <!--end::Icon-->
                                                        <!--begin::Wrapper-->
                                                        <div class="d-flex flex-stack flex-grow-1">
                                                            <!--begin::Content-->
                                                            <div class="fw-semibold">
                                                                <div class="fs-6 text-gray-700">Please note that a valid email address is required to complete the email verification.</div>
                                                            </div>
                                                            <!--end::Content-->
                                                        </div>
                                                        <!--end::Wrapper-->
                                                    </div>
                                                    <!--end::Notice-->
                                                    <!--end::Notice-->
                                                    <!--begin::Input group-->
                                                    <div class="fv-row mb-7">
                                                        <!--begin::Label-->
                                                        <label class="fs-6 fw-semibold form-label mb-2">
                                                            <span class="required">Email Address</span>
                                                        </label>
                                                        <!--end::Label-->
                                                        <!--begin::Input-->
                                                        <input class="form-control form-control-solid" placeholder="Enter email address" name="email" value="<?=$user->email; ?>" />
                                                        <!--end::Input-->
                                                    </div>
                                                    <!--end::Input group-->
                                                    <!--begin::Actions-->
                                                    <div class="text-center pt-15">
                                                        <button type="reset" class="btn btn-light me-3" data-kt-users-modal-action="cancel">Discard</button>
                                                        <button type="submit" class="btn btn-primary" data-kt-users-modal-action="submit">
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
                                <!--end::Modal - Update email-->
                            
                                <!--begin::Modal - Update role-->
                                <div class="modal fade" id="kt_modal_update_role" tabindex="-1" aria-hidden="true">
                                    <!--begin::Modal dialog-->
                                    <div class="modal-dialog modal-dialog-centered mw-650px">
                                        <!--begin::Modal content-->
                                        <div class="modal-content">
                                            <!--begin::Modal header-->
                                            <div class="modal-header">
                                                <!--begin::Modal title-->
                                                <h2 class="fw-bold">Update User Role</h2>
                                                <!--end::Modal title-->
                                                <!--begin::Close-->
                                                <div class="btn btn-icon btn-sm btn-active-icon-primary" data-kt-users-modal-action="close">
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
                                            <div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
                                                <!--begin::Form-->
                                                <form id="kt_modal_update_role_form" class="form" action="#">
                                                    <!--begin::Notice-->
                                                    <!--begin::Notice-->
                                                    <div class="notice d-flex bg-light-primary rounded border-primary border border-dashed mb-9 p-6">
                                                        <!--begin::Icon-->
                                                        <!--begin::Svg Icon | path: icons/duotune/general/gen044.svg-->
                                                        <span class="svg-icon svg-icon-2tx svg-icon-primary me-4">
                                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="10" fill="currentColor" />
                                                                <rect x="11" y="14" width="7" height="2" rx="1" transform="rotate(-90 11 14)" fill="currentColor" />
                                                                <rect x="11" y="17" width="2" height="2" rx="1" transform="rotate(-90 11 17)" fill="currentColor" />
                                                            </svg>
                                                        </span>
                                                        <!--end::Svg Icon-->
                                                        <!--end::Icon-->
                                                        <!--begin::Wrapper-->
                                                        <div class="d-flex flex-stack flex-grow-1">
                                                            <!--begin::Content-->
                                                            <div class="fw-semibold">
                                                                <div class="fs-6 text-gray-700">Please note that reducing a user role rank, that user will lose all priviledges that was assigned to the previous role.</div>
                                                            </div>
                                                            <!--end::Content-->
                                                        </div>
                                                        <!--end::Wrapper-->
                                                    </div>
                                                    <!--end::Notice-->
                                                    <!--end::Notice-->
                                                    <!--begin::Input group-->
                                                    <div class="fv-row mb-7">
                                                        <!--begin::Label-->
                                                        <label class="fs-6 fw-semibold form-label mb-5">
                                                            <span class="required">Select a user role</span>
                                                        </label>
                                                        <!--end::Label-->
                                                        <?php
                                                        $roles = $this->role->getAll();
                                                        foreach ($roles as $i => $row) { ?>
                                                            <!--begin::Input row-->
                                                            <div class="d-flex">
                                                                <!--begin::Radio-->
                                                                <div class="form-check form-check-custom form-check-solid">
                                                                    <!--begin::Input-->
                                                                    <input class="form-check-input me-3" name="id" type="radio" value="<?=$row->id; ?>" id="kt_modal_update_role_option_0" <?=$row->id===$user->role_id?'checked':'' ?> />
                                                                    <!--end::Input-->
                                                                    <!--begin::Label-->
                                                                    <label class="form-check-label" for="kt_modal_update_role_option_0">
                                                                        <div class="fw-bold text-gray-800"><?=$row->title; ?></div>
                                                                        <div class="text-gray-600"><?=$row->description; ?></div>
                                                                    </label>
                                                                    <!--end::Label-->
                                                                </div>
                                                                <!--end::Radio-->
                                                            </div>
                                                            <!--end::Input row-->
                                                            <?php if ($i < sizeof($roles) - 1) { ?>
                                                                <div class='separator separator-dashed my-5'></div>
                                                            <?php } ?>

                                                        <?php } ?>

                                                    </div>
                                                    <!--end::Input group-->
                                                    <!--begin::Actions-->
                                                    <div class="text-center pt-15">
                                                        <button type="reset" class="btn btn-light me-3" data-kt-users-modal-action="cancel">Discard</button>
                                                        <button type="submit" class="btn btn-primary" data-kt-users-modal-action="submit">
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

                                <div class="modal fade" id="kt_modal_add_one_time_password" tabindex="-1" aria-hidden="true">
										<!--begin::Modal dialog-->
										<div class="modal-dialog modal-dialog-centered mw-650px">
											<!--begin::Modal content-->
											<div class="modal-content">
												<!--begin::Modal header-->
												<div class="modal-header">
													<!--begin::Modal title-->
													<h2 class="fw-bold">Enable One Time Password</h2>
													<!--end::Modal title-->
													<!--begin::Close-->
													<div class="btn btn-icon btn-sm btn-active-icon-primary" data-kt-users-modal-action="close">
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
												<div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
													<!--begin::Form-->
													<form class="form" id="kt_modal_add_one_time_password_form" action="<?=site_url('update-phone'); ?>">
														<!--begin::Label-->
														<div class="fw-bold mb-9">Enter the new phone number to receive an SMS to when you log in.</div>
														<!--end::Label-->
														<!--begin::Input group-->
														<div class="fv-row mb-7">
															<!--begin::Label-->
															<label class="fs-6 fw-semibold form-label mb-2">
																<span class="required">Mobile number</span>
																<i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="A valid mobile number is required to receive the one-time password to validate your account login."></i>
															</label>
															<!--end::Label-->
															<!--begin::Input-->
															<input type="text" class="form-control form-control-solid" name="otp_mobile_number" placeholder="+6123 456 789" value="" />
															<!--end::Input-->
														</div>
														<!--end::Input group-->
														<!--begin::Actions-->
														<div class="text-center pt-15">
															<button type="reset" class="btn btn-light me-3" data-kt-users-modal-action="cancel">Cancel</button>
															<button type="submit" class="btn btn-primary" data-kt-users-modal-action="submit">
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
    <script src="<?= base_url(); ?>assets/js/custom/apps/user-management/users/view/view.js"></script>
    <script src="<?= base_url(); ?>assets/js/custom/apps/user-management/users/view/update-details.js"></script>
    <script src="<?= base_url(); ?>assets/js/custom/apps/user-management/users/view/update-email.js"></script>
    <script src="<?= base_url(); ?>assets/js/custom/apps/user-management/users/view/update-role.js"></script>
    <script src="<?= base_url(); ?>assets/js/custom/apps/user-management/users/view/add-one-time-password.js"></script>
    <script src="<?= base_url(); ?>assets/js/widgets.bundle.js"></script>
    <script src="<?= base_url(); ?>assets/js/custom/widgets.js"></script>
    <!--end::Custom Javascript-->
    <!--end::Javascript-->
</body>
<!--end::Body-->

</html>