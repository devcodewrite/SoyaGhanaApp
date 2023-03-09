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
       <!--begin::Authentication - Two-stes -->
			<div class="d-flex flex-column flex-lg-row flex-column-fluid">
				<!--begin::Body-->
				<div class="d-flex flex-column flex-lg-row-fluid w-lg-50 p-10 order-2 order-lg-1">
					<!--begin::Form-->
					<div class="d-flex flex-center flex-column flex-lg-row-fluid">
						<!--begin::Wrapper-->
						<div class="w-lg-500px p-10">
							<!--begin::Form-->
							<form class="form w-100 mb-13" novalidate="novalidate" 
                            data-kt-redirect-url="<?=site_url('verify-otp'); ?>" 
                            data-kt-success-redirect-url="<?=site_url('dashboard'); ?>" 
                            id="kt_sing_in_two_steps_form">
								<input type="hidden" name="phone" value="<?=$phone; ?>">
									<input type="hidden" name="otp" value="<?=$otp; ?>">
								<!--begin::Icon-->
								<div class="text-center mb-10">
									<img alt="Logo" class="mh-125px" src="<?=base_url(); ?>assets/media/svg/misc/smartphone-2.svg" />
								</div>
								<!--end::Icon-->
								<!--begin::Heading-->
								<div class="text-center mb-10">
									<!--begin::Title-->
									<h1 class="text-dark mb-3">Two Step Verification</h1>
									<!--end::Title-->
									<!--begin::Sub-title-->
									<div class="text-muted fw-semibold fs-5 mb-5">Enter the verification code we sent to</div>
									<!--end::Sub-title-->
									<!--begin::Mobile no-->
									<div class="fw-bold text-dark fs-3"><?=substr($phone,0,3); ?>******<?=substr($phone,-4); ?></div>
									<!--end::Mobile no-->
								</div>
								<!--end::Heading-->
								<!--begin::Section-->
								<div class="mb-10">
									<!--begin::Label-->
									<div class="fw-bold text-start text-dark fs-6 mb-1 ms-1">Type your 4 digit security code</div>
									<!--end::Label-->
									<!--begin::Input group-->
									<div class="d-flex flex-wrap flex-stack">
										<input type="text" name="code_1" data-inputmask="'mask': '9', 'placeholder': ''" maxlength="1" class="form-control bg-transparent h-60px w-60px fs-2qx text-center mx-1 my-2 otp_code" value="" />
										<input type="text" name="code_2" data-inputmask="'mask': '9', 'placeholder': ''" maxlength="1" class="form-control bg-transparent h-60px w-60px fs-2qx text-center mx-1 my-2 otp_code" value="" />
										<input type="text" name="code_3" data-inputmask="'mask': '9', 'placeholder': ''" maxlength="1" class="form-control bg-transparent h-60px w-60px fs-2qx text-center mx-1 my-2 otp_code" value="" />
										<input type="text" name="code_4" data-inputmask="'mask': '9', 'placeholder': ''" maxlength="1" class="form-control bg-transparent h-60px w-60px fs-2qx text-center mx-1 my-2 otp_code" value="" />
									</div>
									<!--begin::Input group-->
								</div>
								<!--end::Section-->
								<!--begin::Submit-->
								<div class="d-flex flex-center">
									<button type="button" id="kt_sing_in_two_steps_submit" class="btn btn-lg btn-primary fw-bold">
										<span class="indicator-label">Submit</span>
										<span class="indicator-progress">Please wait... 
										<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
									</button>
								</div>
								<!--end::Submit-->
							</form>
							<!--end::Form-->
							<!--begin::Notice-->
							<div class="text-center fw-semibold fs-5">
								<span class="text-muted me-1">Didn’t get the code ? <span id="resend-count-down"></span></span>
								<a id="resend" class="link-primary fs-5 me-1 hidden">Resend</a>
                            
							</div>
							<!--end::Notice-->
						</div>
						<!--end::Wrapper-->
					</div>
					<!--end::Form-->
					<!--begin::Footer-->
					<div class="d-flex flex-center flex-wrap px-5">
						<!--begin::Links-->
						<div class="d-flex fw-semibold text-primary fs-base">
							<a href="https://veren.codewrite.org/terms" class="px-5" target="_blank">Terms</a>
							<a href="https://codewrite.org/contact-us" class="px-5" target="_blank">Contact Us</a>
						</div>
						<!--end::Links-->
					</div>
					<!--end::Footer-->
				</div>
				<!--end::Body-->
				<!--begin::Aside-->
				<div class="d-flex flex-lg-row-fluid w-lg-50 bgi-size-cover bgi-position-center order-1 order-lg-2" style="background-image: url(<?=base_url(); ?>assets/media/misc/auth-bg.png)">
					<!--begin::Content-->
					<div class="d-flex flex-column flex-center py-7 py-lg-15 px-5 px-md-15 w-100">
						<!--begin::Logo-->
						<a href="https://codewrite.org" class="mb-0 mb-lg-12">
							<img alt="Logo" src="<?=base_url(); ?>assets/media/logos/logo.png" class="h-60px h-lg-75px" />
						</a>
						<!--end::Logo-->
						
						<!--begin::Title-->
						<h3 class="d-none d-lg-block text-white fs-2qx fw-bolder text-center mb-7">Membership Phone Number Verification!</h3>
						<!--end::Title-->
						
					</div>
					<!--end::Content-->
				</div>
				<!--end::Aside-->
			</div>
			<!--end::Authentication - Two-stes-->
    </div>
    <!--end::Root-->

    <!--begin::Javascript-->
    <?php $this->load->view('templates/global_js'); ?>
    <!--begin::Custom Javascript(used for this page only)-->
    <script src="<?= base_url(); ?>assets/js/custom/authentication/sign-in/two-steps.js?v=1"></script>
    <!--end::Custom Javascript-->
    <!--end::Javascript-->
</body>
<!--end::Body-->

</html>