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
									<h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">User Profile</h1>
									<!--end::Title-->
									<!--begin::Breadcrumb-->
									<ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
										<!--begin::Item-->
										<li class="breadcrumb-item text-muted">
											<a href="<?= site_url('users'); ?>" class="text-muted text-hover-primary">Users</a>
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
															<img src="<?=$this->user->urlToAvatar($user->thumb_photo_url); ?>" alt="image" />
														</div>
														<!--end::Avatar-->
														<!--begin::Name-->
														<a href="#" class="fs-3 text-gray-800 text-hover-primary fw-bold mb-3"><?=$user->name; ?></a>
														<!--end::Name-->
														<!--begin::Position-->
														<div class="mb-9">
															<!--begin::Badge-->
															<div class="badge badge-lg badge-light-primary d-inline"><?=$user->role->title; ?></div>
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
														</span></div>
														<span data-bs-toggle="tooltip" data-bs-trigger="hover" title="Edit user details">
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
															<div class="text-gray-600">ID-<?=$user->id; ?></div>
															<!--begin::Details item-->
															<!--begin::Details item-->
															<div class="fw-bold mt-5">Email</div>
															<div class="text-gray-600">
																<a href="#" class="text-gray-600 text-hover-primary"><?=$user->email; ?></a>
															</div>
															<!--begin::Details item-->
															<!--begin::Details item-->
															<div class="fw-bold mt-5">Phone</div>
															<div class="text-gray-600"><?=$user->phone; ?></div>
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
																			<td><?=$user->email; ?></td>
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
																		</tr>
																		
																		<tr>
																			<td>Role</td>
																			<td><?=$user->role->title; ?></td>
																			<td class="text-end">
																				<button type="button" class="btn btn-icon btn-active-light-primary w-30px h-30px ms-auto" data-bs-toggle="modal" data-bs-target="#kt_modal_update_role">
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
																		</tr>
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
																<div class="fs-6 fw-semibold text-muted">Keep your account extra secure with a second authentication step.</div>
															</div>
															<!--end::Card title-->
															<!--begin::Card toolbar-->
															<div class="card-toolbar">
																<!--begin::Add-->
																<button type="button" class="btn btn-light-primary btn-sm" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
																<!--begin::Svg Icon | path: icons/duotune/technology/teh004.svg-->
																<span class="svg-icon svg-icon-3">
																	<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																		<path opacity="0.3" d="M21 10.7192H3C2.4 10.7192 2 11.1192 2 11.7192C2 12.3192 2.4 12.7192 3 12.7192H6V14.7192C6 18.0192 8.7 20.7192 12 20.7192C15.3 20.7192 18 18.0192 18 14.7192V12.7192H21C21.6 12.7192 22 12.3192 22 11.7192C22 11.1192 21.6 10.7192 21 10.7192Z" fill="currentColor" />
																		<path d="M11.6 21.9192C11.4 21.9192 11.2 21.8192 11 21.7192C10.6 21.4192 10.5 20.7191 10.8 20.3191C11.7 19.1191 12.3 17.8191 12.7 16.3191C12.8 15.8191 13.4 15.4192 13.9 15.6192C14.4 15.7192 14.8 16.3191 14.6 16.8191C14.2 18.5191 13.4 20.1192 12.4 21.5192C12.2 21.7192 11.9 21.9192 11.6 21.9192ZM8.7 19.7192C10.2 18.1192 11 15.9192 11 13.7192V8.71917C11 8.11917 11.4 7.71917 12 7.71917C12.6 7.71917 13 8.11917 13 8.71917V13.0192C13 13.6192 13.4 14.0192 14 14.0192C14.6 14.0192 15 13.6192 15 13.0192V8.71917C15 7.01917 13.7 5.71917 12 5.71917C10.3 5.71917 9 7.01917 9 8.71917V13.7192C9 15.4192 8.4 17.1191 7.2 18.3191C6.8 18.7191 6.9 19.3192 7.3 19.7192C7.5 19.9192 7.7 20.0192 8 20.0192C8.3 20.0192 8.5 19.9192 8.7 19.7192ZM6 16.7192C6.5 16.7192 7 16.2192 7 15.7192V8.71917C7 8.11917 7.1 7.51918 7.3 6.91918C7.5 6.41918 7.2 5.8192 6.7 5.6192C6.2 5.4192 5.59999 5.71917 5.39999 6.21917C5.09999 7.01917 5 7.81917 5 8.71917V15.7192V15.8191C5 16.3191 5.5 16.7192 6 16.7192ZM9 4.71917C9.5 4.31917 10.1 4.11918 10.7 3.91918C11.2 3.81918 11.5 3.21917 11.4 2.71917C11.3 2.21917 10.7 1.91916 10.2 2.01916C9.4 2.21916 8.59999 2.6192 7.89999 3.1192C7.49999 3.4192 7.4 4.11916 7.7 4.51916C7.9 4.81916 8.2 4.91918 8.5 4.91918C8.6 4.91918 8.8 4.81917 9 4.71917ZM18.2 18.9192C18.7 17.2192 19 15.5192 19 13.7192V8.71917C19 5.71917 17.1 3.1192 14.3 2.1192C13.8 1.9192 13.2 2.21917 13 2.71917C12.8 3.21917 13.1 3.81916 13.6 4.01916C15.6 4.71916 17 6.61917 17 8.71917V13.7192C17 15.3192 16.8 16.8191 16.3 18.3191C16.1 18.8191 16.4 19.4192 16.9 19.6192C17 19.6192 17.1 19.6192 17.2 19.6192C17.7 19.6192 18 19.3192 18.2 18.9192Z" fill="currentColor" />
																	</svg>
																</span>
																<!--end::Svg Icon-->Add Authentication Step</button>
																<!--begin::Menu-->
																<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-6 w-200px py-4" data-kt-menu="true">
																	<!--begin::Menu item-->
																	<div class="menu-item px-3">
																		<a href="#" class="menu-link px-3" data-bs-toggle="modal" data-bs-target="#kt_modal_add_auth_app">Use authenticator app</a>
																	</div>
																	<!--end::Menu item-->
																	<!--begin::Menu item-->
																	<div class="menu-item px-3">
																		<a href="#" class="menu-link px-3" data-bs-toggle="modal" data-bs-target="#kt_modal_add_one_time_password">Enable one-time password</a>
																	</div>
																	<!--end::Menu item-->
																</div>
																<!--end::Menu-->
																<!--end::Add-->
															</div>
															<!--end::Card toolbar-->
														</div>
														<!--end::Card header-->
														<!--begin::Card body-->
														<div class="card-body pb-5">
															<!--begin::Item-->
															<div class="d-flex flex-stack">
																<!--begin::Content-->
																<div class="d-flex flex-column">
																	<span>SMS</span>
																	<span class="text-muted fs-6">+<?=$user->phone; ?></span>
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
																	<!--begin::Button-->
																	<button type="button" class="btn btn-icon btn-active-light-primary w-30px h-30px ms-auto" id="kt_users_delete_two_step">
																		<!--begin::Svg Icon | path: icons/duotune/general/gen027.svg-->
																		<span class="svg-icon svg-icon-3">
																			<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																				<path d="M5 9C5 8.44772 5.44772 8 6 8H18C18.5523 8 19 8.44772 19 9V18C19 19.6569 17.6569 21 16 21H8C6.34315 21 5 19.6569 5 18V9Z" fill="currentColor" />
																				<path opacity="0.5" d="M5 5C5 4.44772 5.44772 4 6 4H18C18.5523 4 19 4.44772 19 5V5C19 5.55228 18.5523 6 18 6H6C5.44772 6 5 5.55228 5 5V5Z" fill="currentColor" />
																				<path opacity="0.5" d="M9 4C9 3.44772 9.44772 3 10 3H14C14.5523 3 15 3.44772 15 4V4H9V4Z" fill="currentColor" />
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
															<a href='#' class="me-1">generate a backup code</a>to sign in to your account.</div>
															<!--end::Disclaimer-->
														</div>
														<!--end::Card body-->

													</div>
													<!--end::Card-->
													<!--begin::Deactivate Account-->
								<div class="card d-none">
									<!--begin::Card header-->
									<div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse" data-bs-target="#kt_account_deactivate" aria-expanded="true" aria-controls="kt_account_deactivate">
										<div class="card-title m-0">
											<h3 class="fw-bold m-0">Deactivate Account</h3>
										</div>
									</div>
									<!--end::Card header-->
									<!--begin::Content-->
									<div id="kt_account_settings_deactivate" class="collapse show">
										<!--begin::Form-->
										<form id="kt_account_deactivate_form" class="form">
											<!--begin::Card body-->
											<div class="card-body border-top p-9">
												<!--begin::Notice-->
												<div class="notice d-flex bg-light-warning rounded border-warning border border-dashed mb-9 p-6">
													<!--begin::Icon-->
													<!--begin::Svg Icon | path: icons/duotune/general/gen044.svg-->
													<span class="svg-icon svg-icon-2tx svg-icon-warning me-4">
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
															<h4 class="text-gray-900 fw-bold">You Are Deactivating Your Account</h4>
															<div class="fs-6 text-gray-700">For extra security, this requires you to confirm your email or phone number.
																<br />
																<a class="fw-bold" href="#">Learn more</a>
															</div>
														</div>
														<!--end::Content-->
													</div>
													<!--end::Wrapper-->
												</div>
												<!--end::Notice-->
												<!--begin::Form input row-->
												<div class="form-check form-check-solid fv-row">
													<input name="deactivate" class="form-check-input" type="checkbox" value="" id="deactivate" />
													<label class="form-check-label fw-semibold ps-2 fs-6" for="deactivate">I confirm my account deactivation</label>
												</div>
												<!--end::Form input row-->
											</div>
											<!--end::Card body-->
											<!--begin::Card footer-->
											<div class="card-footer d-flex justify-content-end py-6 px-9">
												<button id="kt_account_deactivate_account_submit" type="submit" class="btn btn-danger fw-semibold">Deactivate Account</button>
											</div>
											<!--end::Card footer-->
										</form>
										<!--end::Form-->
									</div>
									<!--end::Content-->
								</div>
								<!--end::Deactivate Account-->
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
                                            <form class="form" action="<?=site_url('users/view') ?>" id="kt_modal_update_user_form">
												<input type="hidden" name="id" value="<?=$user->id; ?>">
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
															<input class="form-control form-control-solid" placeholder="" name="profile_email" value="smith@kpmg.com" />
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
									<!--begin::Modal - Update password-->
									<div class="modal fade" id="kt_modal_update_password" tabindex="-1" aria-hidden="true">
										<!--begin::Modal dialog-->
										<div class="modal-dialog modal-dialog-centered mw-650px">
											<!--begin::Modal content-->
											<div class="modal-content">
												<!--begin::Modal header-->
												<div class="modal-header">
													<!--begin::Modal title-->
													<h2 class="fw-bold">Update Password</h2>
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
													<form id="kt_modal_update_password_form" class="form" action="#">
														<!--begin::Input group=-->
														<div class="fv-row mb-10">
															<label class="required form-label fs-6 mb-2">Current Password</label>
															<input class="form-control form-control-lg form-control-solid" type="password" placeholder="" name="current_password" autocomplete="off" />
														</div>
														<!--end::Input group=-->
														<!--begin::Input group-->
														<div class="mb-10 fv-row" data-kt-password-meter="true">
															<!--begin::Wrapper-->
															<div class="mb-1">
																<!--begin::Label-->
																<label class="form-label fw-semibold fs-6 mb-2">New Password</label>
																<!--end::Label-->
																<!--begin::Input wrapper-->
																<div class="position-relative mb-3">
																	<input class="form-control form-control-lg form-control-solid" type="password" placeholder="" name="new_password" autocomplete="off" />
																	<span class="btn btn-sm btn-icon position-absolute translate-middle top-50 end-0 me-n2" data-kt-password-meter-control="visibility">
																		<i class="bi bi-eye-slash fs-2"></i>
																		<i class="bi bi-eye fs-2 d-none"></i>
																	</span>
																</div>
																<!--end::Input wrapper-->
																<!--begin::Meter-->
																<div class="d-flex align-items-center mb-3" data-kt-password-meter-control="highlight">
																	<div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
																	<div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
																	<div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
																	<div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px"></div>
																</div>
																<!--end::Meter-->
															</div>
															<!--end::Wrapper-->
															<!--begin::Hint-->
															<div class="text-muted">Use 8 or more characters with a mix of letters, numbers & symbols.</div>
															<!--end::Hint-->
														</div>
														<!--end::Input group=-->
														<!--begin::Input group=-->
														<div class="fv-row mb-10">
															<label class="form-label fw-semibold fs-6 mb-2">Confirm New Password</label>
															<input class="form-control form-control-lg form-control-solid" type="password" placeholder="" name="confirm_password" autocomplete="off" />
														</div>
														<!--end::Input group=-->
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
									<!--end::Modal - Update password-->
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
															<!--begin::Input row-->
															<div class="d-flex">
																<!--begin::Radio-->
																<div class="form-check form-check-custom form-check-solid">
																	<!--begin::Input-->
																	<input class="form-check-input me-3" name="user_role" type="radio" value="0" id="kt_modal_update_role_option_0" checked='checked' />
																	<!--end::Input-->
																	<!--begin::Label-->
																	<label class="form-check-label" for="kt_modal_update_role_option_0">
																		<div class="fw-bold text-gray-800">Administrator</div>
																		<div class="text-gray-600">Best for business owners and company administrators</div>
																	</label>
																	<!--end::Label-->
																</div>
																<!--end::Radio-->
															</div>
															<!--end::Input row-->
															<div class='separator separator-dashed my-5'></div>
															<!--begin::Input row-->
															<div class="d-flex">
																<!--begin::Radio-->
																<div class="form-check form-check-custom form-check-solid">
																	<!--begin::Input-->
																	<input class="form-check-input me-3" name="user_role" type="radio" value="1" id="kt_modal_update_role_option_1" />
																	<!--end::Input-->
																	<!--begin::Label-->
																	<label class="form-check-label" for="kt_modal_update_role_option_1">
																		<div class="fw-bold text-gray-800">Developer</div>
																		<div class="text-gray-600">Best for developers or people primarily using the API</div>
																	</label>
																	<!--end::Label-->
																</div>
																<!--end::Radio-->
															</div>
															<!--end::Input row-->
															<div class='separator separator-dashed my-5'></div>
															<!--begin::Input row-->
															<div class="d-flex">
																<!--begin::Radio-->
																<div class="form-check form-check-custom form-check-solid">
																	<!--begin::Input-->
																	<input class="form-check-input me-3" name="user_role" type="radio" value="2" id="kt_modal_update_role_option_2" />
																	<!--end::Input-->
																	<!--begin::Label-->
																	<label class="form-check-label" for="kt_modal_update_role_option_2">
																		<div class="fw-bold text-gray-800">Analyst</div>
																		<div class="text-gray-600">Best for people who need full access to analytics data, but don't need to update business settings</div>
																	</label>
																	<!--end::Label-->
																</div>
																<!--end::Radio-->
															</div>
															<!--end::Input row-->
															<div class='separator separator-dashed my-5'></div>
															<!--begin::Input row-->
															<div class="d-flex">
																<!--begin::Radio-->
																<div class="form-check form-check-custom form-check-solid">
																	<!--begin::Input-->
																	<input class="form-check-input me-3" name="user_role" type="radio" value="3" id="kt_modal_update_role_option_3" />
																	<!--end::Input-->
																	<!--begin::Label-->
																	<label class="form-check-label" for="kt_modal_update_role_option_3">
																		<div class="fw-bold text-gray-800">Support</div>
																		<div class="text-gray-600">Best for employees who regularly refund payments and respond to disputes</div>
																	</label>
																	<!--end::Label-->
																</div>
																<!--end::Radio-->
															</div>
															<!--end::Input row-->
															<div class='separator separator-dashed my-5'></div>
															<!--begin::Input row-->
															<div class="d-flex">
																<!--begin::Radio-->
																<div class="form-check form-check-custom form-check-solid">
																	<!--begin::Input-->
																	<input class="form-check-input me-3" name="user_role" type="radio" value="4" id="kt_modal_update_role_option_4" />
																	<!--end::Input-->
																	<!--begin::Label-->
																	<label class="form-check-label" for="kt_modal_update_role_option_4">
																		<div class="fw-bold text-gray-800">Trial</div>
																		<div class="text-gray-600">Best for people who need to preview content data, but don't need to make any updates</div>
																	</label>
																	<!--end::Label-->
																</div>
																<!--end::Radio-->
															</div>
															<!--end::Input row-->
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
		<script src="<?=base_url(); ?>assets/plugins/custom/datatables/datatables.bundle.js"></script>
		<!--end::Vendors Javascript-->
		<!--begin::Custom Javascript(used for this page only)-->
		<script src="<?=base_url(); ?>assets/js/custom/apps/user-management/users/view/view.js"></script>
		<script src="<?=base_url(); ?>assets/js/custom/apps/user-management/users/view/update-details.js"></script>
	<script src="<?= base_url(); ?>assets/js/custom/account/settings/deactivate-account.js"></script>
		<script src="<?=base_url(); ?>assets/js/custom/apps/user-management/users/view/update-email.js"></script>
		<script src="<?=base_url(); ?>assets/js/custom/apps/user-management/users/view/update-password.js"></script>
		<script src="<?=base_url(); ?>assets/js/custom/apps/user-management/users/view/update-role.js"></script>
		<script src="<?=base_url(); ?>assets/js/custom/apps/user-management/users/view/add-auth-app.js"></script>
		<script src="<?=base_url(); ?>assets/js/custom/apps/user-management/users/view/add-one-time-password.js"></script>
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