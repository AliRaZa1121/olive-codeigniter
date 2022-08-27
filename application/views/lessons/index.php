
<!DOCTYPE html>
<html lang="en">
<head>

	<?php if ($page_name == 'course_page'):
		$title = $this->crud_model->get_course_by_id($course_id)->row_array()?>
		<title><?php echo $title['title'].' | '.get_settings('system_name'); ?></title>
	<?php else: ?>
		<title><?php echo ucwords($page_title).' | '.get_settings('system_name'); ?></title>
	<?php endif; ?>


	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta name="author" content="<?php echo get_settings('author') ?>" />

	<?php
	$seo_pages = array('course_page');
	if (in_array($page_name, $seo_pages)):
	$course_details = $this->crud_model->get_course_by_id($course_id)->row_array();?>
		<meta name="keywords" content="<?php echo $course_details['meta_keywords']; ?>"/>
		<meta name="description" content="<?php echo $course_details['meta_description']; ?>" />
	<?php else: ?>
		<meta name="keywords" content="<?php echo get_settings('website_keywords'); ?>"/>
		<meta name="description" content="<?php echo get_settings('website_description'); ?>" />
	<?php endif; ?>

	<link name="favicon" type="image/x-icon" href="<?php echo base_url('uploads/system/'.get_frontend_settings('favicon')); ?>" rel="shortcut icon" />
	<?php include 'includes_top.php';?>
</head>
<style>
    @media (min-width: 576px)
    .modal-dialog {
        max-width: 1000px !important;
    }
</style>
<body class="gray-bg">
	<?php
	include 'lessons.php';
	include 'includes_bottom.php';
	include 'common_scripts.php';

	if(get_frontend_settings('cookie_status') == 'active'):
    	include 'eu-cookie.php';
  	endif;
	?>
	
	<div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog" style="max-width: 1000px !important">
        
          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
            </div>
            <div class="modal-body">
                <iframe class="attiframe" src="" style="width:600px; height:500px;" frameborder="0"></iframe>
            </div>
            <div class="modal-footer">
              <button type="button" onclick="closeModal()" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
          </div>
          
        </div>
      </div>
  
</div>

</body>
</html>
<script>
    function openattachementModal(selector){
        var src = $(selector).attr('content');
        console.log('src',$(this));
        $('.attiframe').attr('src',src);
        $('#myModal').modal('show');
    }
    
    function closeModal(){
        $('#myModal').modal('hide');
    }
</script>
