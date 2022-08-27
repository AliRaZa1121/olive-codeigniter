<?php
    $system_name = $this->db->get_where('settings' , array('key'=>'system_name'))->row()->value;
    $system_title = $this->db->get_where('settings' , array('key'=>'system_title'))->row()->value;
    $user_details = $this->user_model->get_all_user($this->session->userdata('user_id'))->row_array();
    $text_align     = $this->db->get_where('settings', array('key' => 'text_align'))->row()->value;
    $logged_in_user_role = strtolower($this->session->userdata('role'));
?>
<!DOCTYPE html>
<html>
<head>
    <title><?php echo get_phrase($page_title); ?> | <?php echo $system_title; ?></title>
    <!-- all the meta tags -->
    <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta content="" name="description" />
    <meta content="" name="author" />

    <!-- all the css files -->
   <link rel="shortcut icon" href="<?php echo base_url('uploads/system/').get_frontend_settings('favicon');?>">
<!-- third party css -->
<link href="<?php echo base_url('assets/backend/css/vendor/jquery-jvectormap-1.2.2.css');?>" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url('assets/backend/css/vendor/dataTables.bootstrap4.css');?>" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url('assets/backend/css/vendor/responsive.bootstrap4.css');?>" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url('assets/backend/css/vendor/buttons.bootstrap4.css');?>" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url('assets/backend/css/vendor/select.bootstrap4.css');?>" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url('assets/backend/css/vendor/summernote-bs4.css') ?>" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url('assets/backend/css/vendor/fullcalendar.min.css'); ?>" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url('assets/backend/css/vendor/dropzone.css'); ?>" rel="stylesheet" type="text/css" />
<!-- third party css end -->
<!-- App css -->
<!--<link href="<?php echo base_url('assets/backend/css/app.min.css') ?>" rel="stylesheet" type="text/css" />-->
<link href="<?php echo base_url('assets/backend/css/app.css') ?>" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url('assets/backend/css/icons.min.css'); ?>" rel="stylesheet" type="text/css" />

<link href="<?php echo base_url('assets/backend/css/main.css') ?>" rel="stylesheet" type="text/css" />

<!-- font awesome 5 -->
<link href="<?php echo base_url('assets/backend/css/fontawesome-all.min.css') ?>" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url('assets/backend/css/font-awesome-icon-picker/fontawesome-iconpicker.min.css') ?>" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.css">

<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> -->
<script src="<?php echo base_url('assets/backend/js/jquery-3.3.1.min.js'); ?>" charset="utf-8"></script>
<script src="<?php echo site_url('assets/backend/js/onDomChange.js');?>"></script>


<style>
    .sticky-alert{
            position: fixed;
            top: 72px;
            width: 73.2%;
            z-index: 30;
            box-shadow: 2px 4px 10px rgba(0,0,0, .1);
            transition: all .3s ease;
             left: 216px; 
            /* margin-bottom: 0 !important; */
    }
    
    .warning-alert{
            margin-bottom: 0;
            background: #ff2536;
            color: #fff;
            border: 1px solid #ff2536;
    }
</style>
 
</head>
<body data-layout="detached">
    <!-- HEADER -->
    <!-- Topbar Start -->
<div class="navbar-custom topnav-navbar topnav-navbar-dark">
    <div class="container-fluid">
        <!-- LOGO -->
        <a href="<?php echo site_url($this->session->userdata('role')); ?>" class="topnav-logo" style = "min-width: unset;">
            <span class="topnav-logo-lg">
                <img src="<?php echo base_url('uploads/system/'.get_frontend_settings('light_logo'));?>" alt="" height="40">
            </span>
            <span class="topnav-logo-sm">
                <img src="<?php echo base_url('uploads/system/'.get_frontend_settings('small_logo'));?>" alt="" height="40">
            </span>
        </a>

        <ul class="list-unstyled topbar-right-menu float-right mb-0">
            <li class="dropdown notification-list topbar-dropdown">
                <a class="nav-link dropdown-toggle arrow-none" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                    <span class="align-middle"><?php echo ucwords($this->session->userdata('language')); ?></span> <i class="mdi mdi-chevron-down"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-right dropdown-menu-animated topbar-dropdown-menu" x-placement="bottom-end" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(-59px, 72px, 0px);">

                    <?php $languages = $this->crud_model->get_all_languages();
                    foreach ($languages as $language): ?>
                        <?php if (trim($language) != "" && $this->session->userdata('language') != strtolower($language)): ?>
                            <a href="javascript:void(0);" onclick="switch_language('<?php echo strtolower($language); ?>')" class="dropdown-item notify-item">
                                <span class="align-middle"><?php echo ucwords($language);?></span>
                            </a>
                        <?php endif; ?>
                    <?php endforeach; ?>
                    <!-- item-->

                </div>
            </li>
            <?php if($this->session->userdata('is_instructor') == 1 || $this->session->userdata('admin_login') == 1): ?>
                <li class="dropdown notification-list">
                    <a class="nav-link dropdown-toggle arrow-none" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                        <i class="dripicons-view-apps noti-icon"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-animated dropdown-lg p-0 mt-5 border-top-0" x-placement="bottom-end" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(-278px, 70px, 0px);">

                        <div class="rounded-top py-3 border-bottom bg-primary">
                            <h4 class="text-center text-white"><?php echo get_phrase('quick_actions') ?></h4>
                        </div>

                        <div class="row row-paddingless" style="padding-left: 15px; padding-right: 15px;">
                            <!--begin:Item-->
                            <?php if ($this->session->userdata('is_instructor') == 1 && !$this->session->userdata('admin_login')  || has_permission('course')) : ?>
                                <div class="col-6 p-0 border-bottom border-right">
                                    <a href="#" class="d-block text-center py-3 bg-hover-light" onclick="showAjaxModal('<?= site_url($logged_in_user_role.'/course_form/add_course_shortcut'); ?>', '<?= get_phrase('create_course'); ?>')">
                                        <i class="dripicons-archive text-20"></i>
                                        <span class="w-100 d-block text-muted"><?= get_phrase('add_course'); ?></span>
                                    </a>
                                </div>

                                <div class="col-6 p-0 border-bottom">
                                    <a href="#" class="d-block text-center py-3 bg-hover-light" onclick="showAjaxModal('<?php echo site_url('modal/popup/lesson_types/add_shortcut_lesson'); ?>', '<?php echo get_phrase('add_new_lesson'); ?>')">
                                        <i class="dripicons-media-next text-20"></i>
                                        <span class="d-block text-muted"><?= get_phrase('add_lesson'); ?></span>
                                    </a>
                                </div>
                            <?php endif; ?>

                            <?php if($this->session->userdata('admin_login') && has_permission('student')): ?>
                                <div class="col-6 p-0 border-right">
                                    <a href="#" class="d-block text-center py-3 bg-hover-light" onclick="showAjaxModal('<?php echo site_url('modal/popup/shortcut_add_student'); ?>', '<?php echo get_phrase('add_student'); ?>')">
                                        <i class="dripicons-user text-20"></i>
                                        <span class="w-100 d-block text-muted"><?= get_phrase('add_student'); ?></span>
                                    </a>
                                </div>
                            <?php endif; ?>

                            <?php if($this->session->userdata('admin_login') && has_permission('enrolment')): ?>
                                <div class="col-6 p-0">
                                    <a href="#" class="d-block text-center py-3 bg-hover-light" onclick="showAjaxModal('<?php echo site_url('modal/popup/shortcut_enrol_student'); ?>', '<?php echo get_phrase('enrol_a_student'); ?>')">
                                        <i class="dripicons-network-3 text-20"></i>
                                        <span class="d-block text-muted"><?= get_phrase('enrol_student'); ?></span>
                                    </a>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </li>
            <?php endif; ?>
            <li class="dropdown notification-list">
                <a class="nav-link dropdown-toggle nav-user arrow-none mr-0" data-toggle="dropdown" id="topbar-userdrop"
                href="#" role="button" aria-haspopup="true" aria-expanded="false">
                <span class="account-user-avatar">
                    <img src="<?php echo $this->user_model->get_user_image_url($this->session->userdata('user_id')); ?>" alt="user-image" class="rounded-circle">
                </span>
                <span  style="color: #fff;">
                    <?php
                    $logged_in_user_details = $this->user_model->get_all_user($this->session->userdata('user_id'))->row_array();;
                    ?>
                    <span class="account-user-name"><?php echo $logged_in_user_details['first_name'].' '.$logged_in_user_details['last_name'];?></span>
                    <span class="account-position"><?php echo strtolower($this->session->userdata('role')) == 'user' ? get_phrase('instructor') : get_phrase('admin'); ?></span>
                </span>
            </a>
            <div class="dropdown-menu dropdown-menu-right dropdown-menu-animated topbar-dropdown-menu profile-dropdown"
            aria-labelledby="topbar-userdrop">
            <!-- item-->
            <div class=" dropdown-header noti-title">
                <h6 class="text-overflow m-0"><?php echo get_phrase('welcome'); ?> !</h6>
            </div>

            <!-- Account -->
            <a href="<?php echo site_url(strtolower($this->session->userdata('role')).'/manage_profile'); ?>" class="dropdown-item notify-item">
                <i class="mdi mdi-account-circle mr-1"></i>
                <span><?php echo get_phrase('my_account'); ?></span>
            </a>

            <?php if (strtolower($this->session->userdata('role')) == 'admin'): ?>
                <!-- settings-->
                <a href="<?php echo site_url('admin/system_settings'); ?>" class="dropdown-item notify-item">
                    <i class="mdi mdi-settings mr-1"></i>
                    <span><?php echo get_phrase('settings'); ?></span>
                </a>

            <?php endif; ?>

            <!-- Logout-->
            <a href="<?php echo site_url('login/logout'); ?>" class="dropdown-item notify-item">
                <i class="mdi mdi-logout mr-1"></i>
                <span><?php echo get_phrase('logout'); ?></span>
            </a>

        </div>
    </li>
</ul>

<a class="button-menu-mobile disable-btn">
    <div class="lines">
        <span></span>
        <span></span>
        <span></span>
    </div>
</a>
<div class="visit_website">
    <h4 style="color: #fff; float: left;" class="d-none d-md-inline-block"> <?php echo $this->db->get_where('settings' , array('key'=>'system_name'))->row()->value; ?></h4>
    <a href="<?php echo site_url('home'); ?>" target="" class="btn btn-outline-light ml-3 d-none d-md-inline-block"><?php echo get_phrase('visit_website'); ?></a>
</div>
</div>
</div>
<!-- end Topbar -->
    <div class="container-fluid">
        <div class="wrapper">
            <!-- BEGIN CONTENT -->
            
             
            <!-- SIDEBAR -->
            <?php include $logged_in_user_role.'/'.'navigation.php' ?>
          
            <!-- PAGE CONTAINER-->
            <div class="content-page">
                <div class="content">
                    <!-- BEGIN PlACE PAGE CONTENT HERE -->
                    <?php
                        $warnings = $this->crud_model->get_warnings(1);
                   
                        if($warnings){ ?>
                          <a href="<?php echo site_url('user/warnings') ?>" class="sticky-alert">
                             <div class="alert alert-danger warning-alert">
                                You have new warnings
                             </div>          
                          </a>  
                    <?php    }
                    ?>
                     
                    <?php include  $logged_in_user_role.'/'. $page_name .'.php' ?>
                    <!-- END PLACE PAGE CONTENT HERE -->
                </div>
            </div>
            <!-- END CONTENT -->
        </div>
    </div>
    <!-- all the js files -->
    <!-- bundle -->
<script src="<?php echo base_url('assets/backend/js/app.min.js'); ?>"></script>
<!-- third party js -->
<script src="<?php echo base_url('assets/backend/js/vendor/Chart.bundle.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/backend/js/vendor/jquery-jvectormap-1.2.2.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/backend/js/vendor/jquery-jvectormap-world-mill-en.js'); ?>"></script>
<script src="<?php echo base_url('assets/backend/js/vendor/jquery.dataTables.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/backend/js/vendor/dataTables.bootstrap4.js'); ?>"></script>
<script src="<?php echo base_url('assets/backend/js/vendor/dataTables.responsive.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/backend/js/vendor/responsive.bootstrap4.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/backend/js/vendor/dataTables.buttons.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/backend/js/vendor/buttons.bootstrap4.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/backend/js/vendor/buttons.html5.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/backend/js/vendor/buttons.flash.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/backend/js/vendor/buttons.print.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/backend/js/vendor/dataTables.keyTable.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/backend/js/vendor/dataTables.select.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/backend/js/vendor/summernote-bs4.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/backend/js/vendor/fullcalendar.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/backend/js/pages/demo.summernote.js'); ?>"></script>
<script src="<?php echo base_url('assets/backend/js/vendor/dropzone.js'); ?>"></script>
<script src="<?php echo base_url('assets/backend/js/pages/datatable-initializer.js'); ?>"></script>
<script src="<?php echo base_url('assets/backend/js/font-awesome-icon-picker/fontawesome-iconpicker.min.js'); ?>" charset="utf-8"></script>
<script src="<?php echo base_url('assets/backend/js/vendor/bootstrap-tagsinput.min.js');?>" charset="utf-8"></script>
<script src="<?php echo base_url('assets/backend/js/bootstrap-tagsinput.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/backend/js/vendor/dropzone.min.js');?>" charset="utf-8"></script>
<script src="<?php echo base_url('assets/backend/js/ui/component.fileupload.js');?>" charset="utf-8"></script>
<script src="<?php echo base_url('assets/backend/js/pages/demo.form-wizard.js'); ?>"></script>
<!-- dragula js-->
<script src="<?php echo base_url('assets/backend/js/vendor/dragula.min.js'); ?>"></script>
<!-- component js -->
<script src="<?php echo base_url('assets/backend/js/ui/component.dragula.js'); ?>"></script>

<script src="<?php echo site_url('assets/backend/js/custom.js');?>"></script>

<!-- Dashboard chart's data is coming from this file -->
<?php include "$logged_in_user_role/dashboard-chart.php"; ?>

<script type="text/javascript">
  $(document).ready(function() {
    $(function() {
       $('.icon-picker').iconpicker();
     });
  });
</script>

<!-- Toastr and alert notifications scripts -->
<script type="text/javascript">
function notify(message) {
  $.NotificationApp.send("<?php echo get_phrase('heads_up'); ?>!", message ,"top-right","rgba(0,0,0,0.2)","info");
}

function success_notify(message) {
  $.NotificationApp.send("<?php echo get_phrase('congratulations'); ?>!", message ,"top-right","rgba(0,0,0,0.2)","success");
}

function error_notify(message) {
  $.NotificationApp.send("<?php echo get_phrase('oh_snap'); ?>!", message ,"top-right","rgba(0,0,0,0.2)","error");
}

function error_required_field() {
  $.NotificationApp.send("<?php echo get_phrase('oh_snap'); ?>!", "<?php echo get_phrase('please_fill_all_the_required_fields'); ?>" ,"top-right","rgba(0,0,0,0.2)","error");
}
</script>

<?php if ($this->session->flashdata('info_message') != ""):?>
<script type="text/javascript">
  $.NotificationApp.send("<?php echo get_phrase('success'); ?>!", '<?php echo $this->session->flashdata("info_message");?>' ,"top-right","rgba(0,0,0,0.2)","info");
</script>
<?php endif;?>

<?php if ($this->session->flashdata('error_message') != ""):?>
<script type="text/javascript">
  $.NotificationApp.send("<?php echo get_phrase('oh_snap'); ?>!", '<?php echo $this->session->flashdata("error_message");?>' ,"top-right","rgba(0,0,0,0.2)","error");
</script>
<?php endif;?>

<?php if ($this->session->flashdata('flash_message') != ""):?>
<script type="text/javascript">
  $.NotificationApp.send("<?php echo get_phrase('congratulations'); ?>!", '<?php echo $this->session->flashdata("flash_message");?>' ,"top-right","rgba(0,0,0,0.2)","success");
</script>
<?php endif;?>

   <script type="text/javascript">
function showAjaxModal(url, header)
{
    // SHOWING AJAX PRELOADER IMAGE
    jQuery('#scrollable-modal .modal-body').html('<div style="text-align:center;"><img src="<?php echo base_url().'assets/global/bg-pattern-light.svg'; ?>" /></div>');
    jQuery('#scrollable-modal .modal-title').html('...');
    // LOADING THE AJAX MODAL
    jQuery('#scrollable-modal').modal('show', {backdrop: 'true'});

    // SHOW AJAX RESPONSE ON REQUEST SUCCESS
    $.ajax({
        url: url,
        success: function(response)
        {
            jQuery('#scrollable-modal .modal-body').html(response);
            jQuery('#scrollable-modal .modal-title').html(header);
        }
    });
}
function showLargeModal(url, header)
{
    // SHOWING AJAX PRELOADER IMAGE
    jQuery('#large-modal .modal-body').html('<div style="text-align:center;margin-top:200px;"><img src="<?php echo base_url().'assets/global/bg-pattern-light.svg'; ?>" height = "50px" /></div>');
    jQuery('#large-modal .modal-title').html('...');
    // LOADING THE AJAX MODAL
    jQuery('#large-modal').modal('show', {backdrop: 'true'});

    // SHOW AJAX RESPONSE ON REQUEST SUCCESS
    $.ajax({
        url: url,
        success: function(response)
        {
            jQuery('#large-modal .modal-body').html(response);
            jQuery('#large-modal .modal-title').html(header);
        }
    });
}
</script>

<!-- (Large Modal)-->
<div class="modal fade" id="large-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myLargeModalLabel">Large modal</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                ...
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>

<!-- Scrollable modal -->
<div class="modal fade" id="scrollable-modal" tabindex="-1" role="dialog" aria-labelledby="scrollableModalTitle" aria-hidden="true">
<div class="modal-dialog modal-dialog-scrollable" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="scrollableModalTitle">Modal title</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body ml-2 mr-2">

        </div>
        <div class="modal-footer">
            <button class="btn btn-secondary" data-dismiss="modal"><?php echo get_phrase("close"); ?></button>
        </div>
    </div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
</div>

<script type="text/javascript">
function confirm_modal(delete_url)
{
    jQuery('#alert-modal').modal('show', {backdrop: 'static'});
    document.getElementById('update_link').setAttribute('href' , delete_url);
}
</script>

<!-- Info Alert Modal -->
<div id="alert-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-body p-4">
                <div class="text-center">
                    <i class="dripicons-information h1 text-info"></i>
                    <h4 class="mt-2"><?php echo get_phrase("heads_up"); ?>!</h4>
                    <p class="mt-3"><?php echo get_phrase("are_you_sure"); ?>?</p>
                    <button type="button" class="btn btn-info my-2" data-dismiss="modal"><?php echo get_phrase("cancel"); ?></button>
                    <a href="#" id="update_link" class="btn btn-danger my-2"><?php echo get_phrase("continue"); ?></a>
                </div>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<script type="text/javascript">

function ajax_confirm_modal(delete_url, elem_id)
{
    jQuery('#ajax-alert-modal').modal('show', {backdrop: 'static'});
    $("#appent_link_a").bind( "click", function() {
      delete_by_ajax_calling(delete_url, elem_id);
    });
}

function delete_by_ajax_calling(delete_url, elem_id){
    $.ajax({
        url: delete_url,
        success: function(response){
            var response = JSON.parse(response);
            if(response.status == 'success'){
                $('#'+elem_id).fadeOut(600);
                $.NotificationApp.send("<?php echo get_phrase('success'); ?>!", response.message ,"top-right","rgba(0,0,0,0.2)","success");
            }else{
                $.NotificationApp.send("<?php echo get_phrase('oh_snap'); ?>!", response.message ,"top-right","rgba(0,0,0,0.2)","error");
            }
        }
    });
}
</script>

<!-- Info Alert Modal -->
<div id="ajax-alert-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-body p-4">
                <div class="text-center" id="appent_link">
                    <i class="dripicons-information h1 text-info"></i>
                    <h4 class="mt-2"><?php echo get_phrase("heads_up"); ?>!</h4>
                    <p class="mt-3"><?php echo get_phrase("are_you_sure"); ?>?</p>
                    <button type="button" class="btn btn-info my-2" data-dismiss="modal"><?php echo get_phrase("cancel"); ?></button>
                    <a id="appent_link_a" href="javascript:;" class="btn btn-danger my-2" data-dismiss="modal"><?php echo get_phrase("continue"); ?></a>
                </div>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
  <script type="text/javascript">
  function togglePriceFields(elem) {
    if($("#"+elem).is(':checked')){
      $('.paid-course-stuffs').slideUp();
    }else
      $('.paid-course-stuffs').slideDown();
    }
</script>

<?php if ($page_name == 'courses-server-side'): ?>
  <script type="text/javascript">
  jQuery(document).ready(function($) {
        $.fn.dataTable.ext.errMode = 'throw';
        $('#course-datatable-server-side').DataTable({
            "processing": true,
            "serverSide": true,
            "ajax":{
                "url": "<?php echo site_url(strtolower($this->session->userdata('role')).'/get_courses') ?>",
                "dataType": "json",
                "type": "POST",
                "data" : {selected_category_id : '<?php echo $selected_category_id; ?>',
                          selected_status : '<?php echo $selected_status ?>',
                          selected_instructor_id : '<?php echo $selected_instructor_id ?>',
                          selected_price : '<?php echo $selected_price ?>'}
            },
            "columns": [
                { "data": "#" },
                { "data": "title" },
                { "data": "category" },
                { "data": "lesson_and_section" },
                { "data": "enrolled_student" },
                { "data": "status" },
                { "data": "price" },
               { "data": "actions" },
            ],
            "columnDefs": [{
                targets: "_all",
                orderable: false
             }]
        });
    });
  </script>
<?php endif; ?>

<script type="text/javascript">
  function switch_language(language) {
      $.ajax({
          url: '<?php echo site_url('home/site_language'); ?>',
          type: 'post',
          data: {language : language},
          success: function(response) {
              setTimeout(function(){ location.reload(); }, 500);
          }
      });
  }
  
  $(document).ready(function(){
       var scrollTop = $(window).scrollTop();
          if($(window).scrollTop() >= 72){
              $('.sticky-alert').css('top', '0')
          }
          else{
              $('.sticky-alert').css('top', '72px')
          }
      $(window).on('scroll', function(){
          var scrollTop = $(window).scrollTop();
          if($(window).scrollTop() >= 72){
              $('.sticky-alert').css('top', '0')
          }
          else{
              $('.sticky-alert').css('top', '72px')
          }
      })
  })
</script>
</body>
</html>
