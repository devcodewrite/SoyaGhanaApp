<!--begin::Aside-->
<div id="kt_aside" class="aside pb-5 pt-5 pt-lg-0" data-kt-drawer="true" data-kt-drawer-name="aside" data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="{default:'80px', '300px': '100px'}" data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_aside_mobile_toggle">
    <!--begin::Brand-->
    <div class="aside-logo py-8" id="kt_aside_logo">
        <!--begin::Logo-->
        <a href="<?= site_url('dashboard'); ?>" class="d-flex align-items-center">
            <img alt="Logo" src="<?= $this->setting->getValue('app_logo', base_url('assets/media/logos/nobg-logo.png')); ?>" class="h-45px logo" />
        </a>
        <!--end::Logo-->
    </div>
    <!--end::Brand-->
    <!--begin::Aside menu-->
    <div class="aside-menu flex-column-fluid" id="kt_aside_menu">
        <!--begin::Aside Menu-->
        <div class="hover-scroll-overlay-y my-2 my-lg-5 pe-lg-n1" id="kt_aside_menu_wrapper" data-kt-scroll="true" data-kt-scroll-height="auto" data-kt-scroll-dependencies="#kt_aside_logo, #kt_aside_footer" data-kt-scroll-wrappers="#kt_aside, #kt_aside_menu" data-kt-scroll-offset="5px">
            <!--begin::Menu-->
            <div class="menu menu-column menu-title-gray-700 menu-state-title-primary menu-state-icon-primary menu-state-bullet-primary menu-arrow-gray-500 fw-semibold" id="#kt_aside_menu" data-kt-menu="true">
               <?php if($this->auth->getRole()->title !== 'Member'){ ?>
                <!--begin:Menu item-->
                <div class="menu-item <?= uri_string() === 'dashboard' ? 'here' : ''; ?> py-2">
                    <!--begin:Menu link-->
                    <a href="<?= site_url('dashboard'); ?>" class="menu-link menu-center">
                        <span class="menu-icon me-0">
                            <i class="fonticon-house fs-1"></i>
                        </span>
                        <span class="menu-title">Dashboard</span>
                    </a>
                    <!--end:Menu link-->
                </div>
                <!--end:Menu item-->
                <?php }else{?>
 <!--begin:Menu item-->
 <div class="menu-item <?= uri_string() === 'dashboard' ? 'here' : ''; ?> py-2">
                    <!--begin:Menu link-->
                    <a href="<?= site_url('dashboard'); ?>" class="menu-link menu-center">
                        <span class="menu-icon me-0">
                            <i class="fonticon-house fs-1"></i>
                        </span>
                        <span class="menu-title">Emarket</span>
                    </a>
                    <!--end:Menu link-->
                </div>
                <!--end:Menu item-->

               <?php } ?>
                <!--begin:Menu item-->
                <div data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-placement="right-start" class="menu-item <?= $this->uri->segment(1) === 'membership' ? 'here' : ''; ?> py-2">
                    <!--begin:Menu link-->
                    <span class="menu-link menu-center">
                        <span class="menu-icon me-0">
                            <i class="fonticon-stats fs-1"></i>
                        </span>
                        <span class="menu-title">Membership</span>
                    </span>
                    <!--end:Menu link-->
                    <!--begin:Menu sub-->
                    <div class="menu-sub menu-sub-dropdown menu-sub-indention px-2 py-4 w-250px">
                        <!--begin:Menu item-->
                        <div class="menu-item">
                            <!--begin:Menu content-->
                            <div class="menu-content">
                                <span class="menu-section fs-5 fw-bolder ps-1 py-1">Membership</span>
                            </div>
                            <!--end:Menu content-->
                        </div>
                        <!--end:Menu item-->

                        <!--begin:Menu item-->
                        <div class="menu-item">
                            <!--begin:Menu link-->
                            <a class="menu-link" href="<?= site_url('membership/members'); ?>">
                                <span class="menu-icon">
                                    <i class="bi bi-people fs-3"></i>
                                </span>
                                <span class="menu-title">Members</span>
                            </a>
                            <!--end:Menu link-->
                        </div>
                        <!--end:Menu item-->

                        <!--begin:Menu item-->
                        <div class="menu-item <?= uri_string() === 'membership/registration' ? 'here' : ''; ?>">
                            <!--begin:Menu link-->
                            <a class="menu-link" href="<?= site_url('membership/registration'); ?>">
                                <span class="menu-icon">
                                    <i class="bi bi-person-plus fs-3"></i>
                                </span>
                                <span class="menu-title">Registration</span>
                            </a>
                            <!--end:Menu link-->
                        </div>
                        <!--end:Menu item-->
                    </div>
                    <!--end:Menu sub-->
                </div>
                <!--end:Menu item-->
                 <!--begin:Menu item-->
                 <div data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-placement="right-start" class="menu-item <?= $this->uri->segment(1) === 'catalogs' ? 'here' : ''; ?> py-2">
                    <!--begin:Menu link-->
                    <span class="menu-link menu-center">
                        <span class="menu-icon me-0">
                            <i class="fa fa-shopping-cart fs-1"></i>
                        </span>
                        <span class="menu-title">Catalogs</span>
                    </span>
                    <!--end:Menu link-->
                    <!--begin:Menu sub-->
                    <div class="menu-sub menu-sub-dropdown menu-sub-indention px-2 py-4 w-250px">
                        <!--begin:Menu item-->
                        <div class="menu-item">
                            <!--begin:Menu content-->
                            <div class="menu-content">
                                <span class="menu-section fs-5 fw-bolder ps-1 py-1">Catalogs</span>
                            </div>
                            <!--end:Menu content-->
                        </div>
                        <!--end:Menu item-->

                        <!--begin:Menu item-->
                        <div class="menu-item">
                            <!--begin:Menu link-->
                            <a class="menu-link" href="<?= site_url('catalogs/add'); ?>">
                                <span class="menu-icon">
                                    <i class="bi bi-cart fs-3"></i>
                                </span>
                                <span class="menu-title">New Catalog</span>
                            </a>
                            <!--end:Menu link-->
                        </div>
                        <!--end:Menu item-->

                        <!--begin:Menu item-->
                        <div class="menu-item <?= uri_string() === 'catalogs' ? 'here' : ''; ?>">
                            <!--begin:Menu link-->
                            <a class="menu-link" href="<?= site_url('catalogs'); ?>">
                                <span class="menu-icon">
                                    <i class="bi bi-table fs-3"></i>
                                </span>
                                <span class="menu-title">Lists</span>
                            </a>
                            <!--end:Menu link-->
                        </div>
                        <!--end:Menu item-->
                    </div>
                    <!--end:Menu sub-->
                </div>
                <!--end:Menu item-->
                <?php if($this->auth->getRole()->title === 'Administrator'){ ?>
                <!--begin:Menu item-->
                <div data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-placement="right-start" class="menu-item py-2">
                    <!--begin:Menu link-->
                    <span class="menu-link menu-center">
                        <span class="menu-icon me-0">
                            <i class="fonticon-layers fs-1"></i>
                        </span>
                        <span class="menu-title">Members</span>
                    </span>
                    <!--end:Menu link-->
                    <!--begin:Menu sub-->
                    <div class="menu-sub menu-sub-dropdown menu-sub-indention px-2 py-4 w-200px w-lg-225px">
                        <!--begin:Menu item-->
                        <div class="menu-item">
                            <!--begin:Menu content-->
                            <div class="menu-content">
                                <span class="menu-section fs-5 fw-bolder ps-1 py-1">Members</span>
                            </div>
                            <!--end:Menu content-->
                        </div>
                        <!--end:Menu item-->
                        <!--begin:Menu item-->
                        <div class="menu-item">
                            <!--begin:Menu link-->
                            <a class="menu-link" href="<?= site_url('members/add'); ?>">
                                <span class="menu-icon">
                                    <i class="bi bi-person-plus fs-3"></i>
                                </span>
                                <span class="menu-title">New Member</span>
                            </a>
                            <!--end:Menu link-->
                        </div>
                        <!--end:Menu item-->


                        <!--begin:Menu item-->
                        <div class="menu-item">
                            <!--begin:Menu link-->
                            <a class="menu-link" href="<?= site_url('members/requests'); ?>">
                                <span class="menu-icon">
                                    <i class="bi bi-cart-plus fs-3"></i>
                                </span>
                                <span class="menu-title">New Requests</span>
                            </a>
                            <!--end:Menu link-->
                        </div>
                        <!--end:Menu item-->

                        <!--begin:Menu item-->
                        <div class="menu-item">
                            <!--begin:Menu link-->
                            <a class="menu-link" href="<?= site_url('members'); ?>">
                                <span class="menu-icon">
                                    <i class="bi bi-people fs-3"></i>
                                </span>
                                <span class="menu-title">Member List</span>
                            </a>
                            <!--end:Menu link-->
                        </div>
                        <!--end:Menu item-->

                         <!--begin:Menu item-->
                         <div class="menu-item">
                            <!--begin:Menu link-->
                            <a class="menu-link" href="<?= site_url('members/e-market'); ?>">
                                <span class="menu-icon">
                                    <i class="bi bi-people fs-3"></i>
                                </span>
                                <span class="menu-title">E-Market</span>
                            </a>
                            <!--end:Menu link-->
                        </div>
                        <!--end:Menu item-->


                        <!--begin:Menu item-->
                        <div class="menu-item">
                            <!--begin:Menu link-->
                            <a class="menu-link" href="<?= site_url('report'); ?>">
                                <span class="menu-icon">
                                    <i class="bi bi-table fs-3"></i>
                                </span>
                                <span class="menu-title">Report</span>
                            </a>
                            <!--end:Menu link-->
                        </div>
                        <!--end:Menu item-->
                    </div>
                    <!--end:Menu sub-->
                </div>
                <!--end:Menu item-->
                <!--begin:Menu item-->
                <div data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-placement="right-start" class="menu-item py-2">
                    <!--begin:Menu link-->
                    <span class="menu-link menu-center">
                        <span class="menu-icon me-0">
                            <i class="fonticon-app-store fs-1"></i>
                        </span>
                        <span class="menu-title">Database</span>
                    </span>
                    <!--end:Menu link-->
                    <!--begin:Menu sub-->
                    <div class="menu-sub menu-sub-dropdown menu-sub-indention px-2 py-4 w-250px">
                        <!--begin:Menu item-->
                        <div class="menu-item">
                            <!--begin:Menu content-->
                            <div class="menu-content">
                                <span class="menu-section fs-5 fw-bolder ps-1 py-1">Database</span>
                            </div>
                            <!--end:Menu content-->
                        </div>
                        <!--end:Menu item-->

                        <!--begin:Menu item-->
                        <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                            <!--begin:Menu link-->
                            <span class="menu-link">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Member Groups</span>
                                <span class="menu-arrow"></span>
                            </span>
                            <!--end:Menu link-->
                            <!--begin:Menu sub-->
                            <div class="menu-sub menu-sub-accordion">

                                <!--begin:Menu item-->
                                <div class="menu-item">
                                    <!--begin:Menu link-->
                                    <a class="menu-link" href="<?= site_url('database/groups'); ?>">
                                        <span class="menu-bullet">
                                            <span class="bullet bullet-dot"></span>
                                        </span>
                                        <span class="menu-title">Groups</span>
                                    </a>
                                    <!--end:Menu link-->
                                </div>
                                <!--end:Menu item-->

                                <!--begin:Menu item-->
                                <div class="menu-item">
                                    <!--begin:Menu link-->
                                    <a class="menu-link" href="<?= site_url('database/add-group'); ?>">
                                        <span class="menu-bullet">
                                            <span class="bullet bullet-dot"></span>
                                        </span>
                                        <span class="menu-title">Add Group</span>
                                    </a>
                                    <!--end:Menu link-->
                                </div>
                                <!--end:Menu item-->

                            </div>
                            <!--end:Menu sub-->
                        </div>
                        <!--end:Menu item-->

                        <!--begin:Menu item-->
                        <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                            <!--begin:Menu link-->
                            <span class="menu-link">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Users</span>
                                <span class="menu-arrow"></span>
                            </span>
                            <!--end:Menu link-->
                            <!--begin:Menu sub-->
                            <div class="menu-sub menu-sub-accordion">

                                <!--begin:Menu item-->
                                <div class="menu-item">
                                    <!--begin:Menu link-->
                                    <a class="menu-link" href="<?= site_url('users'); ?>">
                                        <span class="menu-bullet">
                                            <span class="bullet bullet-dot"></span>
                                        </span>
                                        <span class="menu-title">Users</span>
                                    </a>
                                    <!--end:Menu link-->
                                </div>
                                <!--end:Menu item-->

                                <!--begin:Menu item-->
                                <div class="menu-item">
                                    <!--begin:Menu link-->
                                    <a class="menu-link" href="<?= site_url('users/add-user'); ?>">
                                        <span class="menu-bullet">
                                            <span class="bullet bullet-dot"></span>
                                        </span>
                                        <span class="menu-title">Add User</span>
                                    </a>
                                    <!--end:Menu link-->
                                </div>
                                <!--end:Menu item-->

                            </div>
                            <!--end:Menu sub-->
                        </div>
                        <!--end:Menu item-->


                        <!--begin:Menu item-->
                        <div class="menu-item">
                            <!--begin:Menu link-->
                            <a class="menu-link" href="<?= site_url('database/roles'); ?>">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">User Roles</span>
                            </a>
                            <!--end:Menu link-->
                        </div>
                        <!--end:Menu item-->

                         <!--begin:Menu item-->
                         <div class="menu-item">
                            <!--begin:Menu link-->
                            <a class="menu-link" href="<?= site_url('database/locales'); ?>">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Locales</span>
                            </a>
                            <!--end:Menu link-->
                        </div>
                        <!--end:Menu item-->
                    </div>
                    <!--end:Menu sub-->
                </div>
                <!--end:Menu item-->
                <!--begin:Menu item-->
                <div data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-placement="right-start" class="menu-item py-2">
                    <!--begin:Menu link-->
                    <span class="menu-link menu-center">
                        <span class="menu-icon me-0">
                            <i class="fonticon-setting fs-1"></i>
                        </span>
                        <span class="menu-title">Settings</span>
                    </span>
                    <!--end:Menu link-->
                    <!--begin:Menu sub-->
                    <div class="menu-sub menu-sub-dropdown px-2 py-4 w-200px w-lg-225px">
                        <!--begin:Menu item-->
                        <div class="menu-item">
                            <!--begin:Menu content-->
                            <div class="menu-content">
                                <span class="menu-section fs-5 fw-bolder ps-1 py-1">Settings</span>
                            </div>
                            <!--end:Menu content-->
                        </div>
                        <!--end:Menu item-->
                        <!--begin:Menu item-->
                        <div class="menu-item">
                            <!--begin:Menu link-->
                            <a class="menu-link" href="<?= site_url('settings/system'); ?>" title="Settings" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-dismiss="click" data-bs-placement="right">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">System Settings</span>
                            </a>
                            <!--end:Menu link-->
                        </div>
                        <!--end:Menu item-->

                    </div>
                    <!--end:Menu sub-->
                </div>
                <!--end:Menu item-->
                <?php } ?>
            </div>
            <!--end::Menu-->
        </div>
        <!--end::Aside Menu-->
    </div>
    <!--end::Aside menu-->
    <!--begin::Footer-->
    <div class="aside-footer flex-column-auto" id="kt_aside_footer">
        <!--begin::Menu-->
        <div class="d-flex justify-content-center">
            <button type="button" class="btn btm-sm btn-icon btn-custom btn-active-color-primary" data-kt-menu-trigger="click" data-kt-menu-overflow="true" data-kt-menu-placement="top-start" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-dismiss="click" title="Quick actions">
                <i class="fonticon-notification fs-1"></i>
            </button>
            <!--begin::Menu 2-->
            <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-semibold w-200px" data-kt-menu="true">
                <!--begin::Menu item-->
                <div class="menu-item px-3">
                    <div class="menu-content fs-6 text-dark fw-bold px-3 py-4">Quick Actions</div>
                </div>
                <!--end::Menu item-->
                <!--begin::Menu separator-->
                <div class="separator mb-3 opacity-75"></div>
                <!--end::Menu separator-->
                <!--begin::Menu item-->
                <div class="menu-item px-3">
                    <a href="<?= site_url('account/profile'); ?>" class="menu-link px-3">Account Profile</a>
                </div>
                <!--end::Menu item-->
                  <!--begin::Menu item-->
                  <div class="menu-item px-3">
                    <a href="<?= site_url('account/terms'); ?>" class="menu-link px-3">Terms of Use</a>
                </div>
                <!--end::Menu item-->
                <!--begin::Menu item-->
                <div class="menu-item px-3">
                    <a href="<?= site_url('logout'); ?>" class="menu-link px-3">Sign Out</a>
                </div>
                <!--end::Menu item-->

            </div>
            <!--end::Menu 2-->
        </div>
        <!--end::Menu-->
    </div>
    <!--end::Footer-->
</div>
<!--end::Aside-->