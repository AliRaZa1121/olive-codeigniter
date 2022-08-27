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
    <title>Quiz Results</title>
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
<link href="<?php echo base_url('assets/backend/css/app.min.css') ?>" rel="stylesheet" type="text/css" />
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
            
<?php
$status_wise_courses = $this->crud_model->get_status_wise_courses();
?>
<style>
    body{
        background-color:white !important;
    }
    .leftbar-user{
        background: url(../images/waves.) no-repeat !important;
    }
</style>
<!-- ========== Left Sidebar Start ========== -->
<div class="left-side-menu left-side-menu-detached">
	<div class="leftbar-user">
		<a href="javascript: void(0);">
			<!--<img src="<?php echo $this->user_model->get_user_image_url($this->session->userdata('user_id')); ?>" alt="user-image" height="42" class="rounded-circle shadow-sm">-->
			<?php
			$admin_details = $this->user_model->get_all_user($this->session->userdata('user_id'))->row_array();
			?>
			<span class="leftbar-user-name"><?php echo $admin_details['first_name'] . ' ' . $admin_details['last_name']; ?></span>
		</a>
	</div>

	<!--- Sidemenu -->
	<ul class="metismenu side-nav side-nav-light">

		<li class="side-nav-title side-nav-item"><?php echo get_phrase('navigation'); ?></li>
		<?php if ($this->session->userdata('is_instructor') || $this->session->userdata('is_organization')) : ?>
			<li class="side-nav-item">
				<a href="<?php echo site_url('user/dashboard'); ?>" class="side-nav-link <?php if ($page_name == 'dashboard') echo 'active'; ?>">
					<i class="dripicons-view-apps"></i>
					<span><?php echo get_phrase('dashboard'); ?></span>
				</a>
			</li>
			
			<li class="side-nav-item">
				<a href="<?php echo site_url('user/courses'); ?>" class="side-nav-link <?php if ($page_name == 'courses' || $page_name == 'course_add' || $page_name == 'course_edit') echo 'active'; ?>">
					<i class="dripicons-archive"></i>
					<span><?php echo get_phrase('course_manager'); ?></span>
				</a>
			</li>
			<li class="side-nav-item">
				<a href="<?php echo site_url('user/programs'); ?>" class="side-nav-link <?php if ($page_name == 'courses' || $page_name == 'course_add' || $page_name == 'course_edit') echo 'active'; ?>">
					<i class="dripicons-archive"></i>
					<span><?php echo get_phrase('consultancy_programs'); ?></span>
				</a>
			</li>
			<li class="side-nav-item">
				<a href="<?php echo site_url('user/sales_report'); ?>" class="side-nav-link <?php if ($page_name == 'report' || $page_name == 'invoice') echo 'active'; ?>">
					<i class="dripicons-to-do"></i>
					<span><?php echo get_phrase('sales_report'); ?></span>
				</a>
			</li>
			<li class="side-nav-item">
				<a href="<?php echo site_url('user/payout_report'); ?>" class="side-nav-link <?php if ($page_name == 'payout_report' || $page_name == 'invoice') echo 'active'; ?>">
					<i class="dripicons-shopping-bag"></i>
					<span><?php echo get_phrase('payout_report'); ?></span>
				</a>
			</li>
			<li class="side-nav-item">
				<a href="<?php echo site_url('user/payout_settings'); ?>" class="side-nav-link <?php if ($page_name == 'payment_settings') echo 'active'; ?>">
					<i class="dripicons-gear"></i>
					<span><?php echo get_phrase('payout_settings'); ?></span>
				</a>
			</li>
		
			
		<?php else : ?>
		
			<li class="side-nav-item">
				<a href="<?php echo site_url('user/become_an_instructor'); ?>" class="side-nav-link <?php if ($page_name == 'become_an_instructor') echo 'active'; ?>">
					<i class="dripicons-archive"></i>
					<span><?php echo get_phrase('become_an_instructor'); ?></span>
					
				</a>
			</li>
		<?php endif; ?>
		
		
		
		<?php if($this->session->userdata('is_instructor')): ?>
		
		    <li class="side-nav-item">
				<a href="javascript: void(0);" class="side-nav-link <?php if ($page_name == 'join_academy' || $page_name == 'requested_academy_list' || $page_name == 'joined_academy_list') echo 'active'; ?>">
					<i class="dripicons-gear"></i>
					<span><?php echo get_phrase('Academy'); ?></span>
					<span class="menu-arrow"></span>
				</a>
				<ul class="side-nav-second-level" aria-expanded="false">
					<li class="<?php if ($page_name == 'join_academy') echo 'active'; ?>">
						<a href="<?php echo site_url('user/join_academy'); ?>"><?php echo get_phrase('Join Academy'); ?></a>
					</li>
					<li class="<?php if ($page_name == 'requested_academy_list') echo 'active'; ?>">
						<a href="<?php echo site_url('user/requested_academy_list'); ?>"><?php echo get_phrase('Requested Academy List'); ?></a>
					</li>
					<li class="<?php if ($page_name == 'joined_academy_list') echo 'active'; ?>">
						<a href="<?php echo site_url('user/joined_academy_list'); ?>"><?php echo get_phrase('Joined Academy List'); ?></a>
					</li>
				</ul>
			</li>
		<?php endif; ?>
		
		<?php if($this->session->userdata('is_organization')): ?>
		
		    <li class="side-nav-item">
				<a href="javascript: void(0);" class="side-nav-link <?php if ($page_name == 'joined_instructor' ) echo 'active'; ?>">
					<i class="dripicons-gear"></i>
					<span><?php echo get_phrase('Instructor'); ?></span>
					<span class="menu-arrow"></span>
				</a>
				<ul class="side-nav-second-level" aria-expanded="false">
					<li class="<?php if ($page_name == 'joined_instructor') echo 'active'; ?>">
						<a href="<?php echo site_url('user/joined_instructor'); ?>"><?php echo get_phrase('Joined Instructor'); ?></a>
					</li>
				
				
				</ul>
			</li>
		<?php endif; ?>
		<li class="side-nav-item">
			<a href="<?php echo site_url('home/my_messages'); ?>" class="side-nav-link">
				<i class="dripicons-mail"></i>
				<span><?php echo get_phrase('message'); ?></span>
			</a>
		</li>
        	<li class="side-nav-item">
				<a href="<?php echo site_url('addons/customer_support/results'); ?>" class="side-nav-link <?php if ($page_name == 'results') echo 'active'; ?>">
					<i class="dripicons-document-new"></i>
					<span><?php echo get_phrase('results'); ?></span>
				</a>
			</li>
		<?php if (addon_status('customer_support')) : ?>
			<li class="side-nav-item <?php if ($page_name == 'tickets' || $page_name == 'create_ticket') : ?> active <?php endif; ?>">
				<a href="javascript: void(0);" class="side-nav-link">
					<i class="dripicons-help"></i>
					<span> <?php echo get_phrase('support'); ?> </span>
					<span class="menu-arrow"></span>
				</a>
				<ul class="side-nav-second-level" aria-expanded="false">
					<li class="<?php if ($page_name == 'tickets') echo 'active'; ?>">
						<a href="<?php echo site_url('addons/customer_support/user_tickets'); ?>"><?php echo get_phrase('ticket_list'); ?></a>
					</li>
					<li class="<?php if ($page_name == 'create_ticket') echo 'active'; ?>">
						<a href="<?php echo site_url('addons/customer_support/create_support_ticket'); ?>"><?php echo get_phrase('create_ticket'); ?></a>
					</li>
				</ul>
			</li>
		<?php endif; ?>
		
		<li class="side-nav-item">
			<a href="<?php echo site_url(strtolower($this->session->userdata('role')) . '/report'); ?>" class="side-nav-link">
				<i class="dripicons-flag"></i>
				<span>Report <?php if($this->session->userdata('is_instructor')) echo 'Student'; else 'Instructor'; ?> </span>
			</a>
		</li>
		
		<li class="side-nav-item">
			<a href="<?php echo site_url(strtolower($this->session->userdata('role')) . '/warnings'); ?>" class="side-nav-link">
				<i class="dripicons-warning"></i>
				<span>Warnings</span>
				<span class="badge badge-danger-lighten badge-pill float-right"><?php echo $this->crud_model->get_warning_count(); ?></span>
				
			</a>
		</li>

		<li class="side-nav-item">
			<a href="<?php echo site_url(strtolower($this->session->userdata('role')) . '/manage_profile'); ?>" class="side-nav-link">
				<i class="dripicons-user"></i>
				<span><?php echo get_phrase('manage_profile'); ?></span>
			</a>
		</li>
	</ul>
</div>
          
            <!-- PAGE CONTAINER-->
            <div class="content-page">
                <div class="content">
                   <?php
// $param2 is Quiz id
$quiz_details = $this->crud_model->get_lessons('lesson', $param2)->row_array();
$questions = $this->crud_model->get_quiz_questions($param2)->result_array();
$students = $this->user_model->get_student_quizes()->result_array();

?> 
<?php if (count($quiz_details)): ?>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row" data-containers='["question-list"]'>
                        <div class="col-md-12">
                            <div class="bg-dragula p-2 p-lg-4">
                                <h5 class="mt-0"><?php echo get_phrase('answers_of').': '.$quiz_details['title']; ?>
                                   <form class="row justify-content mt-2" action="<?php echo site_url('modal/popup/quiz_search/'.$quiz_details['id']); ?>"method="get">
                                        <!-- Course Categories -->
                                         <!-- Course Students -->
                                        <?php $students = $this->user_model->get_student_quizes()->result_array(); ?>
                                         <!-- Course Instructors -->
                                        <div class="col-xl-3">
                                            <div class="form-group">
                                                <label for="student_id"><?php echo get_phrase('Students'); ?></label>
                                                <select class="form-control select2" data-toggle="select2" name="student_id" id=''>
                                                    <option disabled selected>Select Students</option>
                                                    <?php foreach ($students as $student) : ?>
                                                        <option value="<?php echo $student['id']; ?>" <?php if ($selected_student_id == $student['id']) echo 'selected'; ?>><?php echo $student['first_name'] . ' ' . $student['last_name']; ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                               
                                            </div>
                                        </div>
                                    <div class="col-sm-3">
                                        <label for=".." class="text-white">..</label>
                                     <button type="submit" class="btn btn-primary btn-block"><?php echo get_phrase('filter'); ?></button>
                                    </div>
                                </form>
                                </h5>
                                
                                
                                <div id="question-list" class="py-2">
                                    <?php foreach ($questions as $question): ?>
                                    <?php if (count($question) > 0) : ?>
                                        <!-- Item -->
                                        <div class="card mb-0 mt-2 draggable-item on-hover-action" id = "<?php echo $question['id']; ?>">
                                            <div class="card-body">
                                                <div class="media">
                                             
                                                        <h5 class="mb-1 mt-0"><?php echo $question['title']; ?>
                                                            <span id = "<?php echo 'widgets-of-'.$question['id']; ?>" class="widgets-of-quiz-question" hidden>
                                                                <a href="javascript::" class="alignToTitle float-right ml-1 text-secondary" onclick="deleteQuizQuestionAndReloadModal('<?php echo $param2; ?>', '<?php echo $question['id']; ?>')" data-dismiss="modal"><i class="dripicons-cross"></i></a>
                                                                <a href="javascript::" class="alignToTitle float-right text-secondary" onclick="showAjaxModal('<?php echo site_url('modal/popup/question_edit/'.$question['id'].'/'.$param2); ?>', '<?php echo get_phrase('update_quiz_question'); ?>')" data-dismiss="modal"><i class="dripicons-document-edit"></i></a>
                                                            </span>
                                                        </h5>
                                                            <p class="A">Answers</p>   
                                                           
                                                       
                                                         
                                               
                                                </div> <!-- end media -->
                                            </div> <!-- end card-body -->
                                        </div> <!-- end col -->
                                                    <?php $answers = $this->crud_model->get_quiz_answers($question['id'])->result_array(); 
                                                           if(!empty($answers)) ?> 
                                                                    <div class="table-responsive-sm mt-4">
                                                                          <table class="table table-striped dt-responsive nowrap" width="100%" data-page-length='25'>
                                                                            <thead>
                                                                                <tr>
                                                                                    <th>Submited Answer</th>
                                                                                    <th>Correct Answer</th>
                                                                                    <th>User</th>
                                                                                    <th>Marks</th>
                                                                                </tr>
                                                                            </thead>
                                                                            <tbody>
                                                                                  <?php  
                                                                                  foreach($answers as  $ans):
                                                                                  $submited_answers = [] ; $corrected_answer =[]; $i=0;$j=0;$k=1;
                                                                               
                                                                                      foreach(json_decode($question['options']) as $y => $option):
                                                                                          
                                                                                     foreach(json_decode($ans['answer']) as $x => $answer):
                                                                                        
                                                                                                 if($answer == $k): 
                                                                                                      $submited_answers[$i]  = $option;
                                                                                                      $i++;
                                                                                                 endif;
                                                                                        endforeach;
                                                                                        foreach(json_decode($question['correct_answers']) as $z => $c_answer):
                                                                                           
                                                                                                
                                                                                                 if($c_answer == $k):
                                                                                                    $corrected_answer[$j] = $option;
                                                                                                    $j++;
                                                                                                 endif; ?> 
                                                                                                  <?php         
                                                                                            
                                                                                        endforeach;
                                                                                        $k++;
                                                                                    endforeach; ?>
                                                                                    
                                                                                
                                                                               
                                                                               
                                                                                  <?php if($submited_answers == $corrected_answer): ?>
                                                                                        <tr>
                                                                                        <td><?php echo implode(',' , $submited_answers ) ?> </td>
                                                                                        <td><?php echo implode(',' , $corrected_answer ) ?> </td>
                                                                                        <td><?php  $user = $this->user_model->get_user($ans['user_id'])->row_array(); echo $user['first_name']; ?> </td>
                                                                                        <td> <?php if($ans['marks']){ echo $ans['marks']; } else{   ?><a href="javascript::" class="  text-secondary" onclick="showAjaxModal('<?php echo site_url('modal/popup/add_quiz_marks/'.$ans['id'].'/' . $param2); ?>', '<?php echo get_phrase('add_quiz_marks'); ?>')" data-dismiss="modal"><i class="dripicons-document-edit"></i></a>  <?php } ?></td>
                                                                                    
                                                                                    </tr>
                                                                                    
                                                                                    <?php else:?>
                                                                                     <tr >
                                                                                        <td ><span class="badge badge-danger-lighten" style="font-size: 13px;"><?php echo implode(',' , $submited_answers ) ?></span> </td>
                                                                                        <td><?php echo implode(',' , $corrected_answer ) ?> </td>
                                                                                        <td><?php  $user = $this->user_model->get_user($ans['user_id'])->row_array(); echo $user['first_name']; ?> </td>
                                                                                        <td> <?php if($ans['marks']){ echo $ans['marks']; } else{   ?><a href="javascript::" class="  text-secondary" onclick="showAjaxModal('<?php echo site_url('modal/popup/add_quiz_marks/'.$ans['id'].'/' . $param2); ?>', '<?php echo get_phrase('add_quiz_marks'); ?>')" data-dismiss="modal"><i class="dripicons-document-edit"></i></a>  <?php } ?></td>
                                                                                    
                                                                                    </tr>
                                                                                   <?php endif;?>
                                                                                 
                                                                                   
                                                                                 
                                                                                   
                                                                                <?php  endforeach; ?>
                                                                              
                                                                            </tbody>
                                                                        </table>
                                                                        
                                                                    </div>
                                    <?php endif; ?>
                                        <!-- item -->
                                     <?php if (count($answers) == 0) : ?>
                                        <div class="img-fluid w-100 text-center">
                                            <img style="opacity: 1; width: 100px;" src="<?php echo base_url('assets/backend/images/file-search.svg'); ?>"><br>
                                            <?php echo get_phrase('no_data_found'); ?>
                                        </div>
                                    <?php endif; ?>
                                    <?php endforeach; ?>
                                </div> <!-- end company-list-1-->
                            </div> <!-- end div.bg-light-->
                        </div> <!-- end col -->
                    </div> <!-- end row -->
                </div> <!-- end card-body -->
            </div> <!-- end card -->
        </div> <!-- end col -->
    </div>
<?php endif; ?>
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

<!-- Init Dragula -->
<script type="text/javascript">
! function(r) {
    "use strict";
    var a = function() {
        this.$body = r("body")
    };
    a.prototype.init = function() {
        r('[data-plugin="dragula"]').each(function() {
            var a = r(this).data("containers"),
            t = [];
            if (a)
            for (var n = 0; n < a.length; n++) t.push(r("#" + a[n])[0]);
            else t = [r(this)[0]];
            var i = r(this).data("handleclass");
            i ? dragula(t, {
              
            }) : dragula(t)
        })
    }, r.Dragula = new a, r.Dragula.Constructor = a
}(window.jQuery),
function(a) {
    "use strict";
    window.jQuery.Dragula.init()
}();
</script>

<script type="text/javascript">
jQuery(document).ready(function() {
    $('.widgets-of-quiz-question').hide();
});



function deleteQuizQuestionAndReloadModal(quizID, questionID) {
    var deletionURL = '<?php echo site_url(); ?>'+'user/quiz_questions/'+quizID+'/delete/'+questionID;
    var reloadURL = '<?php echo site_url(); ?>'+'modal/popup/quiz_questions/'+quizID;
    confirm_modal(deletionURL);
}

function sort() {
    var containerArray = ['question-list'];
    var itemArray = [];
    var itemJSON;
    for(var i = 0; i < containerArray.length; i++) {
        $('#'+containerArray[i]).each(function () {
            $(this).find('.draggable-item').each(function() {
                //console.log(this.id);
                itemArray.push(this.id);
            });
        });
    }

    itemJSON = JSON.stringify(itemArray);
    $.ajax({
        url: '<?php echo site_url('user/ajax_sort_question/');?>',
        type : 'POST',
        data : {itemJSON : itemJSON},
        success: function(response)
        {
            success_notify('<?php echo get_phrase('questions_have_been_sorted'); ?>');
            setTimeout(
                function()
                {
                    location.reload();
                }, 1000);
            }
        });
    }
    onDomChange(function(){
        $('#question-sort-btn').show();
    });
</script>

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
