<meta name="viewport" content= "width=device-width, user-scalable=no">
<meta property="og:title" content="<?php if(isset($post_data->item)){echo $post_data->item;}?>" />
<meta property="og:description" content="<?php if(isset($post_data->description)){echo $post_data->description;}?>" />
<title><?php if(isset($post_data->item)){echo $post_data->item;}else{echo $this->setting->getValue('app_name', 'Soya App');}?></title>
<meta name="description" content="<?php if(isset($post_data->description)){echo $post_data->description;}?>" />
<meta name="keywords" content="soya value chain association of ghana" />
<link rel="shortcut icon" href="<?php if(isset($avatar)){echo "$avatar";}else{echo $this->setting->getValue('app_logo', base_url('assets/media/logos/nobg-logo.png'));};?>" />
<!--begin::Fonts(mandatory for all pages)-->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700" />
<!--end::Fonts-->

<!--begin::Global Stylesheets Bundle(mandatory for all pages)-->
<link href="<?= base_url(); ?>assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
<link href="<?= base_url(); ?>assets/css/style.bundle.css" rel="stylesheet" type="text/css" />
<!--end::Global Stylesheets Bundle-->
  
<style>
	.hidden{
		display: none !important;
	}
</style>
