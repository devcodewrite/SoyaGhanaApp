<!DOCTYPE html>

<html lang="en">
<!--begin::Head-->
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />

<head>
    <?php $this->load->view('templates/head_global_items'); ?>

    <!--begin::Vendor Stylesheets(used for this page only)-->
    <link href="<?= base_url() ?>assets/plugins/custom/datatables/datatables.bundle.css" rel="stylesheet" type="text/css" />
    <!--end::Vendor Stylesheets-->
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
                    <div class="d-flex flex-column flex-column-fluid mb-5">
                        <!--begin::Toolbar-->
                        <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
                            <!--begin::Toolbar container-->
                            <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
                                <!--begin::Page title-->
                                <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                                    <!--begin::Title-->
                                    <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">System Settings</h1>
                                    <!--end::Title-->
                                    <!--begin::Breadcrumb-->
                                    <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                                        <!--begin::Item-->
                                        <li class="breadcrumb-item text-muted">
                                            <a href="<?= site_url('settings') ?>" class="text-muted text-hover-primary">Settings</a>
                                        </li>
                                        <!--end::Item-->
                                        <!--begin::Item-->
                                        <li class="breadcrumb-item">
                                            <span class="bullet bg-gray-400 w-5px h-2px"></span>
                                        </li>
                                        <!--end::Item-->
                                        <!--begin::Item-->
                                        <li class="breadcrumb-item text-muted">System</li>
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
                                <!--begin::Card-->

                                <div class="card mb-5">
                                    <div class="card-body">
                                        <h4><b>Organization Information</b></h4>
                                        <div class="table-responsive">
                                            <table class="table table-striped text-nowrap">
                                                <tbody>
                                                    <tr>
                                                        <th style="width: 100px;">Organization Name:</th>
                                                        <td><a href="#" id="organizationname" data-type="text" data-name="organization_name" data-pk="1"><?= $this->setting->getValue('organization_name'); ?></a></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Organization Logo Url:</th>
                                                        <td><a href="#" id="organizationlogo" data-type="url" data-name="organization_logo_url" data-pk="1"><?= $this->setting->getValue('organization_logo_url'); ?></a></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Organization Location:</th>
                                                        <td><a href="#" id="organizationlocation" data-type="text" data-name="organization_location" data-pk="1"><?= $this->setting->getValue('organization_location'); ?></a></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Organization Email:</th>
                                                        <td><a href="#" id="organizationemail" data-type="email" data-name="organization_email" data-pk="1"><?= $this->setting->getValue('organization_email'); ?></a></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Organization Tel:</th>
                                                        <td><a href="#" id="organizationtel" data-type="tel" data-name="organization_tel" data-pk="1"><?= $this->setting->getValue('organization_tel'); ?></a></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Organization Mobile:</th>
                                                        <td><a href="#" id="organizationmobile" data-type="tel" data-name="organization_phone" data-pk="1"><?= $this->setting->getValue('organization_phone'); ?></a></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="card accordion-wizard">
                                            <div class="card-header">
                                                <h3 class="card-title">Sms Credits Purchase</h3>
                                            </div>
                                            <div class="card-body">
                                                <form id="payment-form">
                                                    <div class="row">
                                                        <div class="d-flex flex-column col-md-4 mb-7 fv-row">
                                                            <!--begin::Label-->
                                                            <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                                                                <span class="required">Amount</span>
                                                                <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Specify your amount"></i>
                                                            </label>
                                                            <!--end::Label-->
                                                            <input onkeyup="$('#units').val(Math.round(this.value/<?= $this->config->item('sms_amount_per_unit'); ?>))" id="amount" type="number" class="form-control form-control-solid" placeholder="Your amount" name="amount" step=".10" required />
                                                        </div>
                                                        <div class="d-flex flex-column col-md-4 mb-7 fv-row">
                                                            <!--begin::Label-->
                                                            <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                                                                <span class="required">Units</span>
                                                                <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Sms units"></i>
                                                            </label>
                                                            <!--end::Label-->
                                                            <input id="units" type="number" name="quantity" class="form-control form-control-solid" required readonly />
                                                        </div>
                                                        <div class="d-flex flex-column col-md-4 mb-7 fv-row">
                                                            <!--begin::Label-->
                                                            <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                                                                <span class="required">Email</span>
                                                                <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Your email for the records"></i>
                                                            </label>
                                                            <!--end::Label-->
                                                            <input id="email" type="email" name="email" class="form-control form-control-solid" required value="<?=$this->setting->getValue('organization_email'); ?>" />
                                                        </div>
                                                    </div>
                                                  
                                            </div>
                                            <div class="card-footer d-flex justify-content-end py-6 px-9">
													<button id="discard" class="btn btn-light btn-active-light-primary me-2">Discard</button>
													<button class="btn btn-primary px-6">Pay with Paystack</button>
												</div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 col-lg-12">
                                        <div class="card">
                                            <div class="card-header">
                                                <h3 class="card-title">Sms Credit Payments Table</h3>
                                            </div>
                                            <div class="card-body">
                                                <div class="table-responsive">
                                                    <table id="dt-smscredits" class="table table-striped table-bordered text-nowrap w-100">
                                                        <thead>
                                                            <tr>
                                                                <th class="wd-2p">#TREF</th>
                                                                <th class="wd-10p">Amount</th>
                                                                <th class="wd-10p">Units</th>
                                                                <th class="wd-10p">Status</th>
                                                                <th class="wd-10p">Created At</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php foreach ($this->smscredit->getAll() as $credit) {
                                                                $label = [
                                                                    'pending' => 'label-warning',
                                                                    'approved' => 'label-success',
                                                                    'cancelled' => 'label-danger'
                                                                ];
                                                            ?>
                                                                <tr>
                                                                    <td><?= $credit->ref; ?></td>
                                                                    <td><?= $credit->amount; ?></td>
                                                                    <td><?= $credit->quantity; ?></td>
                                                                    <td><span class="label <?= $label[$credit->status]; ?>"><?= $credit->status; ?></span></td>
                                                                    <td><?= $credit->created_at; ?></td>
                                                                </tr>
                                                            <?php } ?>
                                                        </tbody>

                                                    </table>
                                                </div>
                                            </div>
                                            <!-- TABLE WRAPPER -->
                                        </div>
                                        <!-- SECTION WRAPPER -->
                                    </div>
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
    <script src="<?= base_url() ?>assets/plugins/custom/datatables/datatables.bundle.js"></script>
    <!--end::Vendors Javascript-->
    <!--begin::Custom Javascript(used for this page only)-->
    <script src="<?= base_url() ?>assets/js/widgets.bundle.js"></script>
    <script src="<?= base_url() ?>assets/js/custom/widgets.js"></script>
    <script src="<?= base_url(); ?>assets/js/bootstrap-editable.min.js"></script>
    <script src="https://js.paystack.co/v1/inline.js"></script>
    <script>
        $(function() {
            $('#discard').click(function(e){
                e.preventDefault();

                $('#payment-form')[0].reset();
            });
            $('#dt-smscredits').DataTable();
        })
        const paymentForm = document.getElementById('payment-form');
        paymentForm.addEventListener("submit", payWithPaystack, false);

        function payWithPaystack(e) {
            e.preventDefault();
            let handler = PaystackPop.setup({
                key: "<?= $this->config->item('cw_paystack_public_key') ?>",
                email: document.getElementById("email").value,
                amount: document.getElementById("amount").value * 100,
                ref: Math.floor((100000 + Math.random() * 900000) + 1),
                currency: '<?= $this->config->item('paystack_currency'); ?>',
                onClose: function() {

                },
                callback: function(response) {
                    $.ajax({
                        url: "<?= site_url('sms/confirm-payment/') ?>" + response.reference,
                        dateType: 'json',
                        success: function(data, status) {
                            if (data.status === true) {
                                $('#payment-form').trigger("reset");
                                swal({
                                    title: "Success Message",
                                    text: data.message,
                                    type: 'success',
                                    confirmButtonText: "Ok, got it!",
                                    customClass: {
                                        confirmButton: "btn fw-bold btn-light-primary",
                                    },
                                }).then(function() {
                                    window.location.reload();
                                });
                            } else {
                                swal.fire({
                                    text: data.message,
                                    icon: "error",
                                    buttonsStyling: false,
                                    confirmButtonText: "Ok, got it!",
                                    customClass: {
                                        confirmButton: "btn fw-bold btn-light-primary",
                                    },
                                });
                            }
                        },
                    })

                }
            });

            handler.openIframe();
        }
    </script>
    <script>
        $(function() {
            $.fn.editable.defaults.mode = 'inline';
            $('#organizationname').editable({
                url: '<?= site_url(uri_string()) ?>',
                title: 'Enter organization name'
            });

            $('#organizationlogo').editable({
                url: '<?= site_url(uri_string()) ?>',
                title: 'Enter logo url'
            });

            $('#organizationlocation').editable({
                url: '<?= site_url(uri_string()) ?>',
                title: "Enter organization's location"
            });

            $('#organizationemail').editable({
                url: '<?= site_url(uri_string()) ?>',
                title: "Enter organization's email address"
            });

            $('#organizationtel').editable({
                url: '<?= site_url(uri_string()) ?>',
                title: "Enter organization's telphone"
            });

            $('#organizationmobile').editable({
                url: '<?= site_url(uri_string()) ?>',
                title: "Enter organization's mobile number"
            });
            $('#printdateformat').editable({
                url: '<?= site_url(uri_string()) ?>',
                title: "Set date format"
            });

            $('#printtimeformat').editable({
                url: '<?= site_url(uri_string()) ?>',
                title: "Set time format"
            });

            $('#enableonlinepay').editable({
                url: '<?= site_url(uri_string()) ?>',
                title: "Set value",
                source: [{
                        id: 'yes',
                        text: 'YES'
                    },
                    {
                        id: 'no',
                        text: 'NO'
                    },
                ],
                select2: {
                    multiple: false
                }
            });
            $('#enablesms').editable({
                url: '<?= site_url(uri_string()) ?>',
                title: "Set value",
                source: [{
                        id: 'yes',
                        text: 'YES'
                    },
                    {
                        id: 'no',
                        text: 'NO'
                    },
                ],
                select2: {
                    multiple: false
                },
            });
        });
    </script>
    <!--end::Custom Javascript-->
    <!--end::Javascript-->
</body>
<!--end::Body-->

</html>