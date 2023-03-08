<?php
defined('BASEPATH') OR exit('No direct script access allowed');

?>
<!DOCTYPE html>

<html lang="en">

<head>
	<?php $this->load->view('templates/head_global_items'); ?>
<style>
.containerdiv {width:80px;height:120px; } 
.cornerimage { position: absolute; } 
</style>
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

					</div>
					<!--end::Toolbar container-->
				</div>
				<!--end::Toolbar-->
				<!--begin::Content-->
				<?php
                if ($this->agent->is_mobile()){$plus="margin-top:105px;margin-left:30px;";$create_post="height:130px;";$width="width:100px;"; $name="margin-top:160px;";$round_post="width:100px;height:200px;";$size='px-0;';$font_size='font-size:12px;';$css="display:flex;height:140px;width:100%;overflow:auto;";$sider="height:130px;display:flex;margin-bottom:10px;position:relative;overflow:auto;";}else{
                    $plus="margin-top:150px;margin-left:40px;";$create_post="height:180px;";$width="width:130px;";$name="margin-top:190px;";$round_post="width:130px;height:230px;";$sider="";$font_size='font-size:14px;';$size='';$css="height:550px; background:#FFF;position:-webkit-sticky; position:fixed; width:260px;overflow:auto;";}
                ?>
				<div id="kt_app_content" class="app-content flex-column-fluid">
					<!--begin::Content container-->
					<div id="kt_content_container" class="container-xxl <?=$size;?>" >
					    <div class="row gap-0 mb-5">
					       
					        <div class="col-md-3 col-12 shadow-4-strong">
					            <div class='card shadow-primary mb-5 ' style='<?=$css?>'>
					                <div style="<?=$sider?>">
    					                <?php $all_groups=$this->member->all_groups1();
    					                   foreach($all_groups as $all_group){$id=$all_group['id'];?>
    					                    <a href="<?=base_url();?>membership/members?goroup=<?=$id;?>">
    					                    <div class="m-2 p-2 shadow-4-strong" style="background:#fff;border:1px solid #F0F2F5;border-radius:10px;color:#000; height:auto;max-height:300px;" >
    					                        <img src="<?=$all_group['avatar'];?>" class="rounded-circle shadow-4-strong" style="border:1px solid #F0F2F5;width:50px;object-fit: cover;height:50px;"/>
    					                         <span style="text-align:center;"><?=$all_group['name'];?></span>
    					                    </div>
    					                </a>
    					                        
    					                   <?php }?>
    					                </div>
					               </div>
					        </div>
					       <div class="col-12 col-md-6">
					           <?php $results_data=$this->member->post5(); 
					                    if(!empty($results_data)){?>
					           <div style="display:flex;margin-bottom:10px;position:relative;overflow:auto;">
					               <a href="<?=base_url().'catalogs/add';?>">
    					                   <div style="margin-right:10px;background:#fff;<?=$round_post;?>border-radius:20px;text-align:center;" class="shadow">
            					                <span class="shadow" style="<?=$plus;?>background:blue;border:6px solid #fff;position:absolute;z-index:2;display:block;border-radius:50px;font-size:16px;"><b><i class="fa fa-plus" style="font-size:16px;padding:10px;color:#fff;"></i></b></span>
            					                <img class="imgA1" src="<?=$this->user->urlToAvatar($this->auth->getAvatar());?>" style="object-fit: cover;border-radius:15px 15px 0px 0px;<?=$create_post.''.$width;?>margin-bottom:20px;">
            					                <span style="font-size:14px;">Create Post</span>
        					                </div>
    					                </a>
					                <?php
					                foreach($results_data as $result_data){?>
					                    <a href="<?=base_url().'post-item?post_id='.$result_data['id'];?>">
    					                   <div style="margin-right:10px;background:#fff;<?=$round_post;?>border-radius:20px;text-align:center;" class="shadow-primary rounded">
            					                <img  class="shadow" src="<?=$result_data['thumb_photo_url'];?>" style="margin:15px;border:3px solid blue;position:absolute;z-index:2;display:block;object-fit: cover;border-radius:50px;width:45px;height:45px;">
            					                 <span style="position:absolute;z-index:2;display:block;<?=$name;?>color:#fff;<?=$width;?>"><b><?=$result_data['name'];?></b></span>
            					                <img class="imgA1" src="<?=$result_data['avatar'];?>" style="object-fit: cover;border-radius:10px;<?=$round_post;?>">
            					               
        					                </div>
    					                </a>
					                <?php } ?>
					           </div>
					           <?php }?>
					           
					            <div class='card card-h-50 shadow-primary mb-5' style='height:auto; background:#FFF;'>
					                <div class="row p-4" >
					                    <div class="col-md-2 col-2">
					                        <img alt="Logo" class="" src="<?=$this->user->urlToAvatar($this->auth->getAvatar()) ?>" style="width:50px;border-radius:50px;border:1px solid #F0F2F5;"/>
					                    </div>
					                    
        					            <div class="col-md-10 col-10 " style="">
                                             <a href="<?=base_url().'catalogs/add';?>" class="btn text-muted btn-block w-100" style="background:#F0F2F5;border-radius:20px;font-family:courier;<?=$font_size;?> text-align:left;">What's on your mind, <?=$this->auth->getUserName()?$this->auth->getUserName():'<a href="#">Set Name</a>'; ?>?</a>
        					            </div>
        					            
        					            <?php
                                            if ($this->agent->is_mobile()){}else{?>
                                            <div class="offset-col-1"><hr></div>
                                            <div class="col-12 col-md-11" style="" >
                                             <a href="<?=base_url().'catalogs/add';?>" class="text-muted" style="<?=$font_size;?>;float:right;">Sell or provide a service <i class='fa fa-image' style="color:red;<?=$font_size;?>"></i></a>
        					            </div><?php } ?>
					                </div>
					                
					           </div>
					           <div id="get-list-view"></div>
        					   <div id="load-msg"></div>
					        </div>
					        <div class="col-md-3 col-12 shadow-4-strong">
					            <div class='card shadow-primary mb-5 ' style='<?=$css?>'>
					                <div style="<?=$sider?>">
					                <?php $all_groups2=$this->member->all_groups2();
					                   foreach($all_groups2 as $all_group2){$id=$all_group2['id'];?>
					                    <a href="<?=base_url();?>membership/members?goroup=<?=$id;?>">
					                        <div class="m-2 p-2 shadow-4-strong" style="background:#fff;border:1px solid #F0F2F5;border-radius:10px;color:#000;" >
    					                        <img src="<?=$all_group2['avatar'];?>" class="rounded-circle shadow-4-strong" style="border:1px solid #F0F2F5;width:50px;object-fit: cover;height:50px;"/>
    					                         <span style="text-align:center;"><?=$all_group2['name'];?></span>
					                        </div>
					                    </a>
					                    
					               
					                        
					                   <?php }?>
					                </div>
					           </div>
					            
					        </div>
					        
					        </div>
					    
					</div>
					<!--end::Content container-->
				</div>
				<!--end::Content-->
				<?php //$this->load->view('templates/footer'); ?>
			</div>
			<!--end::Wrapper-->
		</div>
		<!--end::Page-->
	</div>
	<!--end::Root-->

	<!--begin::Javascript-->
	<?php $this->load->view('templates/global_js'); ?>
	<!--begin::Custom Javascript(used for this page only)-->

	<!--end::Custom Javascript-->
	<!--end::Javascript-->
	
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
<script>
    (function($){
	$.fn.loadScrollData = function(start,options) {
		
		action	=	"inactive";
		
		var settings	=	$.extend({
			limit			:	16, //Default limit to get data
			listingId		:	'', //Pass ID or Class where you want to append your data
			loadMsgId		:	'', //Loading message id
			ajaxUrl			:	'', //Ajax file path to get data
			loadingMsg		:	'<div style:"text-align:center;">Please Wait...!</div>' //Loading message
		},options);
		
		$.ajax({
			method	:	"POST",
			data	:	{'getData':'ok','limit':settings.limit,'start':start},
			url		:	settings.ajaxUrl,
			success	:	function(data){
				$(settings.listingId).append(data);
				if(data == ''){
					$(settings.loadMsgId).html('');
					action = 'active';
				}else{
					$(settings.loadMsgId).html(settings.loadingMsg);
					action = "inactive";
				}
			}
		});
	
		if(action == 'inactive'){
			action = 'active';
		}
		
		$(window).scroll(function(){
			if($(window).scrollTop() + $(window).height() > $(settings.listingId).height() && action == 'inactive'){
				action  	=   'active';
				start	  	=   parseInt(start)+parseInt(settings.limit);
				setTimeout(function(){
					$.fn.loadScrollData(start,options);
				},1000);
			}
		});
					
	};
}(jQuery));
$(document).loadScrollData(0, {
    limit: 16,
    listingId: "#get-list-view",
    loadMsgId: '#load-msg',
    ajaxUrl: '../datatable-json/post_data',
    loadingMsg: '<div class="d-flex justify-content-center mt-10"> <div class="spinner-border" role="status"> <span class="sr-only">Loading...</span> </div></div>',
    loadingSpeed: 10
});
</script>
</body>
<!--end::Body-->

</html>