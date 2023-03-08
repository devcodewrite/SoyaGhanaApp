<?php
defined('BASEPATH') OR exit('No direct script access allowed');
function time_elapsed_string($datetime, $full = false) {
        $now = new DateTime;
        $ago = new DateTime($datetime);
        $diff = $now->diff($ago);
        $diff->w = floor($diff->d / 7);
        $diff->d -= $diff->w * 7;
        $string = array(
            'y' => 'year',
            'm' => 'month',
            'w' => 'week',
            'd' => 'day',
            'h' => 'hour',
            'i' => 'minute',
            's' => 'second',
        );
        foreach ($string as $k => &$v) {
            if ($diff->$k) {
                $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
            } else {
                unset($string[$k]);
            }
        }
        if (!$full) $string = array_slice($string, 0, 1);
        return $string ? implode(', ', $string) . ' ago' : 'just now';
}
?>
<!DOCTYPE html>

<html lang="en">
<!--begin::Head-->
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
				<?php 
				if ($this->agent->is_mobile()){$height='height:auto;max-height:300px;';$font='font-size:12px;';$font1='font-size:12px;';}else{$height='height:auto;max-height:800px;';$font1='font-size:14px;';$font='font-size:14px;';}
				?>
				<div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6"></div>
				<!--begin::Content-->
				<div id="kt_app_content" class="app-content flex-column-fluid">
					<!--begin::Content container-->
					<div id="kt_content_container" class="container-xxl">
					    <div class="row gap-0 mb-5">
					        <div class="col-12 col-md-8">
					            <div class='card card-h-50 shadow-primary' style='height:auto; background:#FFF;'>
					                
					               <image src="<?=$post_data->avatar;?>" style='<?=$height;?> object-fit: cover;width:100%;'>
					                
					                <div class="row mt-2 px-4">
					                    <div class="col-md-1"></div>
					                    <div class="col-md-5 col-12">
					                        <span style="<?=$font;?>font-family:verdana;"><b><?=$post_data->item;?></b></span>
					                    </div>
					                    <div class='col-md-2 col-4'><span class='text-muted' style='<?=$font1;?>'><?=$post_data->views;?> views</span></div>
					                    <div class='col-md-1 col-4'><i class='fa fa-thumbs-up' style='<?=$font1;?> background:blue;color:#fff;border-radius:50px;padding:3px;'></i> <span class='text-muted' style='<?=$font1;?>'><?=$post_data->likes;?></span></div>
                                        <div class='col-md-2 col-4'><span class='text-muted' style='<?=$font1;?>'><?=$post_data->shares;?> shares</span></div>
					                    <div class="col-md-1"></div>
					                    <div class="offset-col-md-1 "><hr></div>
					                </div>
					                <div class="row mt-2 mb-2 px-4" >
					                    <div class="col-md-1"></div>
					                    <div class="col-md-1 col-2">
					                        <image src="<?=$post_data->thumb_photo_url;?>" style='object-fit: cover;border-radius:50px;' class="w-100">
					                    </div>
					                    <div class="col-md-3 col-3"><span style="<?=$font1;?>"><b><?=$post_data->name;?></b></span></div>
					                    <div class="col-md-4 col-4"><span style="<?=$font1;?> text-align:center;"><i class='fa fa-map-marker' style="font-size:20px;color:red"></i> <?=$post_data->locale_name.' '.$post_data->district_name.' '.$post_data->district_category?><br> <?=$post_data->region_name;?></span></div>
					                    <div class="col-md-3 col-3"><span style="<?=$font1;?>"><i class='fa fa-phone' style="font-size:20px;color:green"></i> <?=$post_data->phone;?></span></div>
					                    <div class="offset-col-md-1"><hr style="margin-bottom:1px;"></div>
					                     
					                </div>
					                <div class="row mb-2 px-4" >
					                    <div class="col-md-1"></div>
					                    <div class="col-md-11 col-12"><span class="text-muted" style="<?=$font;?>"><?=$post_data->description;?></span></div>
					                    
					                </div>
					                <div class="row mb-2 px-4" >
					                    <div class="offset-col-md-1"><hr style="margin-bottom:1px;"></div>
					                    <div class="col-md-1"></div>
					                    <div class="col-md-4 col-5"><span style="<?=$font;?>"><?=time_elapsed_string($post_data->created_at);?> <i class="fa fa-globe" style="<?=$font;?>color:green;"></i></span></div>
					                    <div class='col-md-3 col-3' style='<?=$font1;?>'><i class='fa fa-thumbs-up' style='<?=$font1;?>'></i> <b>Like</b></div>
                                        <div class='col-md-4 col-4' style='<?=$font1;?>'><a href="javascript:void(0)" onclick="sharepost()" style="color:#000;"><i class='fa fa-share-alt' style='<?=$font1;?>'></i> <b>Share</b></a></div>
					                </div>

					           </div>
					        </div>
					        <div class="col-12 col-md-4">
					            <div class='card card-h-50 shadow-primary' style='height:auto; background:#FFF;'>
					            <div id="">
        					    </div>
        					   <div id="load-msg"></div>

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

async function sharepost() {
          const response = await fetch('<?=$post_data->avatar;?>',{
              mode: 'no-cors'
         });
         
          const blob = await response.blob();
          console.log("blob: "+blob);
          const filesArray = [
            new File(
              [blob],
              '<?=$post_data->avatar;?>',
              {
                type: "image/jpeg",
                lastModified: new Date().getTime()
              }
           )
          ];
          console.log(filesArray[0]);
          const shareData = {
            files: filesArray,
            title: '<?=$post_data->item;?>',
            text: "<?=$post_data->description;?>",
            url: "<?=base_url().$_SERVER['REQUEST_URI'];?>",
          };
          navigator.share(shareData);
    }
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
    ajaxUrl: '../datatable-json/$post_data',
    loadingMsg: '<div class="alert alert-warning p-1 text-center mt-10"><i class="fa fa-fw fa-spin fa-spinner"></i>Please Wait...!</div>',
    loadingSpeed: 10
});

$(document).ready(function(){
    $('#like_btn').click(function(){
        document.getElementById("like_btn").disabled = true;
        var channel_user_id=$('#channel_user_id').val();
       $.ajax({
           type: "POST",
           url: "subscribe",
           data: {
               search: channel_user_id
           },
           success: function(html) {
               //Assigning result to "display" div in "search.php" file.
               console.log('working');
              if(html==="not_logged_in"){
                  console.log('not logged in');
                  let text;
                    if (confirm("Do you want to Login to Subscribe?") == true) {
                      window.location.assign('login');
                    } else {
                        document.getElementById("like_btn").disabled = false;
                    }
              }else if(html==="success"){
                    document.getElementById("like_btn").disabled = false;
                    const unlike_btn2 = document.getElementById('unlike_btn2');
                    unlike_btn2.style.display = 'block';
                    const like_btn = document.getElementById('like_btn');
                    like_btn.style.display = 'none';
              
              }else{
                   alert(html);
              }
           }
   });
    });
    $('#like_btn2').click(function(){
        document.getElementById("like_btn2").disabled = true;
        var channel_user_id=$('#channel_user_id').val();
       $.ajax({
           type: "POST",
           url: "subscribe",
           data: {
               search: channel_user_id
           },
           success: function(html) {
               //Assigning result to "display" div in "search.php" file.
               console.log('working');
              if(html==="not_logged_in"){
                  console.log('not logged in');
                  let text;
                    if (confirm("Do you want to Login to Subscribe?") == true) {
                      window.location.assign('login');
                    } else {
                        document.getElementById("like_btn2").disabled = false;
                    }
              }else if(html==="success"){
                  document.getElementById("like_btn2").disabled = false;
                    const unlike_btn2 = document.getElementById('unlike_btn2');
                    unlike_btn2.style.display = 'block';
                    const like_btn2 = document.getElementById('like_btn2');
                    like_btn2.style.display = 'none';
              
              }else{
                   alert(html);
              }
           }
   });
    });
    $('#unlike_btn').click(function(){
        document.getElementById("unlike_btn").disabled = true;
        var channel_user_id=$('#channel_user_id').val();
        $.ajax({
       type: "POST",
       url: "unsubscribe",
       data: {
           search: channel_user_id
       },
       
       success: function(html) {
           //Assigning result to "display" div in "search.php" file.
           console.log('working');
          if(html==="not_logged_in"){
              console.log('not logged in');
              let text;
                if (confirm("Do you want to Login to Subscribe?") == true) {
                  window.location.assign('login');
                } else {
                    document.getElementById("unlike_btn").disabled = false;
                }
          }else if(html==="success"){
              document.getElementById("unlike_btn").disabled = false;
                const like_btn2 = document.getElementById('like_btn2');
                like_btn2.style.display = 'block';
                const unlike_btn = document.getElementById('unlike_btn');
                unlike_btn.style.display = 'none';
          
          }else{
              alert(html);
          }
       }
   });
   });
   $('#unlike_btn2').click(function(){
        var channel_user_id=$('#channel_user_id').val();
        document.getElementById("unlike_btn2").disabled = true;
        $.ajax({
       
       type: "POST",
       
       url: "unsubscribe",
       
       data: {
           search: channel_user_id
       },
       
       success: function(html) {
           //Assigning result to "display" div in "search.php" file.
           console.log('working');
          if(html==="not_logged_in"){
              console.log('not logged in');
              let text;
                if (confirm("Do you want to Login to Subscribe?") == true) {
                  window.location.assign('login');
                } else {
                }
          }else if(html==="success"){
                const like_btn2 = document.getElementById('like_btn2');
                like_btn2.style.display = 'block';
                const unlike_btn2 = document.getElementById('unlike_btn2');
                unlike_btn2.style.display = 'none';
                document.getElementById("unlike_btn2").disabled = false;
          
          }else{
             alert(html);
               
          }
       }
   });
   });
    $('#default_btn').click(function(){
       if (confirm("Do you want to Login to Follow this User?") == true) {
          window.location.assign('login');
        } 
        else {}
   });
});


</script>
</body>
<!--end::Body-->

</html>