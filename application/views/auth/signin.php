<!DOCTYPE html>

<html lang="en">
<!--begin::Head-->
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<meta name="viewport" content= "width=device-width, user-scalable=no">

<head>
    <?php $this->load->view('templates/head_global_items'); ?>
</head>
<!--end::Head-->
<!--begin::Body-->

<body id="kt_body" class="app-blank app-blank">
    <?php
    $this->load->view('templates/theme_mode');
    $this->load->view('templates/google_tags');
    ?>
    <!--begin::Root-->
    <div class="d-flex flex-column flex-root" id="kt_app_root">
        <!--begin::Authentication - Sign-up -->
        <div class="d-flex flex-column flex-lg-row flex-column-fluid">
            <!--begin::Body-->
            <div class="d-flex flex-column flex-lg-row-fluid w-lg-50 p-10 order-2 order-lg-1">
                <!--begin::Form-->
                <div class="d-flex flex-center flex-column flex-lg-row-fluid">
                    <!--begin::Wrapper-->
                    <div class="w-lg-500px p-10">
                        <!--begin::Form-->
                        <form class="form w-100" novalidate="novalidate" id="kt_sign_in_form" action="<?=site_url('sign-in'); ?>" method="POST">
                            <!--begin::Heading-->
                            <div class="text-center mb-11">
                                <!--begin::Title-->
                                <h1 class="text-dark fw-bolder mb-3">Sign In</h1>
                                <!--end::Title-->
                                <!--begin::Subtitle-->
                                <div class="text-gray-500 fw-semibold fs-6">Into <?= $this->setting->getValue('organization_name', 'Your Organization or Association'); ?></div>
                                <!--end::Subtitle=-->
                            </div>
                            <!--begin::Heading-->
                            <!--begin::Separator-->
                            <div class="separator separator-content my-14">
                                <span class="w-125px text-gray-500 fw-semibold fs-7">With Two Step Auth</span>
                            </div>
                            <!--end::Separator-->
                            <!--begin::Input group-->
                            <div class="fv-row mb-8">
                                <!--begin::Wrapper-->
                                <div class="mb-1">
                                    <!--begin::Input wrapper-->
                                    <div class="position-relative mb-3">
                                        <label for="phone" class="mb-1">Phone Number</label>
                                        <input class="form-control bg-transparent" type="tel"  placeholder="Phone number"  name="phone" autocomplete="off" />
                                        
                                    </div>
                                    <!--end::Input wrapper-->
                                </div>
                                <!--end::Wrapper-->
                            </div>
                            <!--begin::Accept-->
                            <div class="fv-row mb-8">
                                <label class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" name="toc" value="1" />
                                    <span class="form-check-label fw-semibold text-gray-700 fs-base ms-1">I Accept the
                                        <a href="#" class="ms-1 link-primary">Terms</a></span>
                                </label>
                            </div>
                            <!--end::Accept-->
                            <!--begin::Submit button-->
                            <div class="d-grid mb-10">
                                <button type="submit" id="kt_sign_in_submit" class="btn btn-primary">
                                    <!--begin::Indicator label-->
                                    <span class="indicator-label">Sign in</span>
                                    <!--end::Indicator label-->
                                    <!--begin::Indicator progress-->
                                    <span class="indicator-progress">Please wait...
                                        <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                    <!--end::Indicator progress-->
                                </button>
                            </div>
                            <div class="buttons" style="text-align:center;"> <a href="https://veren.codewrite.org/assets/soyaghana.apk" class="btn btn-info btn-lg" data-wow-duration="2s" data-wow-delay="0.2s" style="visibility: visible; animation-duration: 2s; animation-delay: 0.2s; animation-name: fadeInLeft;"><i class="fa fa-android fa-2x"></i> Download Soya App<br> <small>Android version 1.0</small></a></div>
                            
                            <!--end::Submit button-->
                          
                        </form>
                        <!--end::Form-->
                    </div>
                    <!--end::Wrapper-->
                </div>
                <!--end::Form-->
                <!--begin::Footer-->
                <div class="d-flex flex-center flex-wrap px-5">
                    <!--begin::Links-->
                    <div class="d-flex fw-semibold text-primary fs-base">
                        <a href="https://veren.codewrite.org/terms" class="px-5" target="_blank">Terms</a>
                        <a href="https://codewrite.com/contact-us" class="px-5" target="_blank">Contact Us</a>
                    </div>
                    <!--end::Links-->
                </div>
                <!--end::Footer-->
            </div>
            <!--end::Body-->
            <!--begin::Aside-->
            <div class="d-flex flex-lg-row-fluid w-lg-50 bgi-size-cover bgi-position-center order-1 order-lg-2" style="background-image: url(<?= base_url(); ?>assets/media/misc/auth-bg.png)">
                <!--begin::Content-->
                <div class="d-flex flex-column flex-center py-7 py-lg-15 px-5 px-md-15 w-100">
                    <!--begin::Logo-->
                    <a href="https://codewrite.org" class="mb-0 mb-lg-12">
                        <img alt="Logo" src="<?= base_url(); ?>assets/media/logos/logo.png" class="h-60px h-lg-75px" />
                    </a>
                    <!--end::Logo-->
                    
                    <!--begin::Title-->
                    <h3 class="d-none d-lg-block text-white fs-2qx fw-bolder text-center mb-7">Welcome To Association Digitalisation System!</h3>
                    <!--end::Title-->

                </div>
                <!--end::Content-->
            </div>
            <!--end::Aside-->
        </div>
        <!--end::Authentication - Sign-up-->
    </div>
    <!--end::Root-->

    <!--begin::Javascript-->
    <?php $this->load->view('templates/global_js'); ?>
    <!--begin::Custom Javascript(used for this page only)-->
    <script src="<?= base_url(); ?>assets/js/custom/authentication/sign-in/general1.js"></script>
    <!--end::Custom Javascript-->
    <!--end::Javascript-->
</body>
<!--end::Body-->

</html>