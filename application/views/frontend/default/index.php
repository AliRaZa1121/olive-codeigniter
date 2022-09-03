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
	<!-- site fonts -->
	<link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400;500;600&family=Open+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">
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

	<!--Social sharing content-->
	<?php if($page_name == "course_page"): ?>
		<meta property="og:title" content="<?php echo $title['title']; ?>" />
		<meta property="og:image" content="<?php echo $this->crud_model->get_course_thumbnail_url($course_id); ?>">
	<?php else: ?>
		<meta property="og:title" content="<?php echo $page_title; ?>" />
		<meta property="og:image" content="<?= base_url("uploads/system/".get_frontend_settings('banner_image')); ?>">
	<?php endif; ?>
	<meta property="og:url" content="<?php echo current_url(); ?>" />
	<meta property="og:description" content="<?php echo get_settings('website_description'); ?>">
	<meta property="og:type" content="Learning management system" />
	<!--Social sharing content-->

	<link name="favicon" type="image/x-icon" href="<?php echo base_url('uploads/system/'.get_frontend_settings('favicon')); ?>" rel="shortcut icon" />
	<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css" integrity="sha512-yHknP1/AwR+yx26cB1y0cjvQUMvEa2PFzt1c9LlS4pRQ5NOTZFWbhBig+X9G9eYW/8m0/4OXNx8pxJ6z57x0dw==" crossorigin="anonymous" referrerpolicy="no-referrer" /> -->
	<?php include 'includes_top.php';?>
	
<style>
/*section.org-first-fold, section.arc-first-fold {
 section.org-first-fold { 
    padding: 100px 0;
    background-image: url(<?php echo base_url('uploads/olive-images/fold-image4.png'); ?>);
    background-position: center;;;
    background-repeat: no-repeat;;;;
    background-size: cover;;;;
}
*/
</style>

</head>

<body class="gray-bg">
	<?php
	if($this->session->userdata('app_url')):
		include "go_back_to_mobile_app.php";
	endif;

	if ($this->session->userdata('user_login') || $this->session->userdata('admin_login')) {
		include 'logged_in_header.php';
	}else {
		include 'logged_out_header.php';
	}

	if(get_frontend_settings('cookie_status') == 'active'):
    	include 'eu-cookie.php';
  	endif;
  	
  	if($page_name === null){
  		include $path;
  	}else{ 
		include $page_name.'.php';
	}
	include 'footer.php';
	include 'includes_bottom.php';
	include 'modal.php';
	include 'common_scripts.php';
	?>
	
</body>
</html>
