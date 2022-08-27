<?php $social_links = json_decode($user_details['social_links'], true); ?>
<!--<link rel="stylesheet" href="<?php echo base_url() . 'assets/frontend/default/css/bootstrap.min.css'; ?>">-->

<!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css"  />-->

<link rel="stylesheet" href="https://www.jqueryscript.net/demo/jQuery-Plugin-For-Country-Selecter-with-Flags-flagstrap/dist/css/flags.css"  />

<style>

/*.btn-default.active,
.btn-default:active,
.open>.dropdown-toggle.btn-default {
	color: #333;
	background-color: #e6e6e6;
	border-color: #adadad
}

.dropdown-toggle::after {
    display: inline-block;
    margin-left: 39.255em;
    vertical-align: 0.255em;
    content: "";
    border-top: 0.3em solid;
    border-right: 0.3em solid transparent;
    border-bottom: 0;
    border-left: 0.3em solid transparent;
}



.btn, .btn-default ,.btn-md ,.dropdown-toggle{
    
    display: block;
    width: 100%;
    padding: 0.375rem 0.75rem;
    font-size: 1rem;
    font-weight: 400;
    line-height: 1.5;
    color: #212529;
    background-color: #fff;
    background-clip: padding-box;
    border: 1px solid #ced4da;
    -webkit-appearance: none;
    -moz-appearance: none;
    appearance: none;
    border-radius: 0.25rem;
    transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;
    
}

.btn, .btn-default ,.btn-md ,.dropdown-toggle , span{
    
 float: left;   
}




.btn-default.active.focus,
.btn-default.active:focus,
.btn-default.active:hover,
.btn-default:active.focus,
.btn-default:active:focus,
.btn-default:active:hover,
.open>.dropdown-toggle.btn-default.focus,
.open>.dropdown-toggle.btn-default:focus,
.open>.dropdown-toggle.btn-default:hover {
	color: #333;
	background-color: #d4d4d4;
	border-color: #8c8c8c
}

.btn-default.active,
.btn-default:active,
.open>.dropdown-toggle.btn-default {
	background-image: none
}

.btn-default.disabled,
.btn-default.disabled.active,
.btn-default.disabled.focus,
.btn-default.disabled:active,
.btn-default.disabled:focus,
.btn-default.disabled:hover,
.btn-default[disabled],
.btn-default[disabled].active,
.btn-default[disabled].focus,
.btn-default[disabled]:active,
.btn-default[disabled]:focus,
.btn-default[disabled]:hover,
fieldset[disabled] .btn-default,
fieldset[disabled] .btn-default.active,
fieldset[disabled] .btn-default.focus,
fieldset[disabled] .btn-default:active,
fieldset[disabled] .btn-default:focus,
fieldset[disabled] .btn-default:hover {
	background-color: #fff;
	border-color: #ccc
}

.btn-default .badge {
	color: #fff;
	background-color: #333
}

.btn-primary {
	color: #fff;
	background-color: #337ab7;
	border-color: #2e6da4
}

.btn-primary.focus,
.btn-primary:focus {
	color: #fff;
	background-color: #286090;
	border-color: #122b40
}

.btn-primary:hover {
	color: #fff;
	background-color: #286090;
	border-color: #204d74
}

.btn-primary.active,
.btn-primary:active,
.open>.dropdown-toggle.btn-primary {
	color: #fff;
	background-color: #286090;
	border-color: #204d74
}

.btn-primary.active.focus,
.btn-primary.active:focus,
.btn-primary.active:hover,
.btn-primary:active.focus,
.btn-primary:active:focus,
.btn-primary:active:hover,
.open>.dropdown-toggle.btn-primary.focus,
.open>.dropdown-toggle.btn-primary:focus,
.open>.dropdown-toggle.btn-primary:hover {
	color: #fff;
	background-color: #204d74;
	border-color: #122b40
}

.btn-primary.active,
.btn-primary:active,
.open>.dropdown-toggle.btn-primary {
	background-image: none
}

.btn-primary.disabled,
.btn-primary.disabled.active,
.btn-primary.disabled.focus,
.btn-primary.disabled:active,
.btn-primary.disabled:focus,
.btn-primary.disabled:hover,
.btn-primary[disabled],
.btn-primary[disabled].active,
.btn-primary[disabled].focus,
.btn-primary[disabled]:active,
.btn-primary[disabled]:focus,
.btn-primary[disabled]:hover,
fieldset[disabled] .btn-primary,
fieldset[disabled] .btn-primary.active,
fieldset[disabled] .btn-primary.focus,
fieldset[disabled] .btn-primary:active,
fieldset[disabled] .btn-primary:focus,
fieldset[disabled] .btn-primary:hover {
	background-color: #337ab7;
	border-color: #2e6da4
}

.btn-primary .badge {
	color: #337ab7;
	background-color: #fff
}

.btn-success {
	color: #fff;
	background-color: #5cb85c;
	border-color: #4cae4c
}

.btn-success.focus,
.btn-success:focus {
	color: #fff;
	background-color: #449d44;
	border-color: #255625
}

.btn-success:hover {
	color: #fff;
	background-color: #449d44;
	border-color: #398439
}

.btn-success.active,
.btn-success:active,
.open>.dropdown-toggle.btn-success {
	color: #fff;
	background-color: #449d44;
	border-color: #398439
}

.btn-success.active.focus,
.btn-success.active:focus,
.btn-success.active:hover,
.btn-success:active.focus,
.btn-success:active:focus,
.btn-success:active:hover,
.open>.dropdown-toggle.btn-success.focus,
.open>.dropdown-toggle.btn-success:focus,
.open>.dropdown-toggle.btn-success:hover {
	color: #fff;
	background-color: #398439;
	border-color: #255625
}

.btn-success.active,
.btn-success:active,
.open>.dropdown-toggle.btn-success {
	background-image: none
}

.btn-success.disabled,
.btn-success.disabled.active,
.btn-success.disabled.focus,
.btn-success.disabled:active,
.btn-success.disabled:focus,
.btn-success.disabled:hover,
.btn-success[disabled],
.btn-success[disabled].active,
.btn-success[disabled].focus,
.btn-success[disabled]:active,
.btn-success[disabled]:focus,
.btn-success[disabled]:hover,
fieldset[disabled] .btn-success,
fieldset[disabled] .btn-success.active,
fieldset[disabled] .btn-success.focus,
fieldset[disabled] .btn-success:active,
fieldset[disabled] .btn-success:focus,
fieldset[disabled] .btn-success:hover {
	background-color: #5cb85c;
	border-color: #4cae4c
}

.btn-success .badge {
	color: #5cb85c;
	background-color: #fff
}

.btn-info {
	color: #fff;
	background-color: #5bc0de;
	border-color: #46b8da
}

.btn-info.focus,
.btn-info:focus {
	color: #fff;
	background-color: #31b0d5;
	border-color: #1b6d85
}

.btn-info:hover {
	color: #fff;
	background-color: #31b0d5;
	border-color: #269abc
}

.btn-info.active,
.btn-info:active,
.open>.dropdown-toggle.btn-info {
	color: #fff;
	background-color: #31b0d5;
	border-color: #269abc
}

.btn-info.active.focus,
.btn-info.active:focus,
.btn-info.active:hover,
.btn-info:active.focus,
.btn-info:active:focus,
.btn-info:active:hover,
.open>.dropdown-toggle.btn-info.focus,
.open>.dropdown-toggle.btn-info:focus,
.open>.dropdown-toggle.btn-info:hover {
	color: #fff;
	background-color: #269abc;
	border-color: #1b6d85
}

.btn-info.active,
.btn-info:active,
.open>.dropdown-toggle.btn-info {
	background-image: none
}

.btn-info.disabled,
.btn-info.disabled.active,
.btn-info.disabled.focus,
.btn-info.disabled:active,
.btn-info.disabled:focus,
.btn-info.disabled:hover,
.btn-info[disabled],
.btn-info[disabled].active,
.btn-info[disabled].focus,
.btn-info[disabled]:active,
.btn-info[disabled]:focus,
.btn-info[disabled]:hover,
fieldset[disabled] .btn-info,
fieldset[disabled] .btn-info.active,
fieldset[disabled] .btn-info.focus,
fieldset[disabled] .btn-info:active,
fieldset[disabled] .btn-info:focus,
fieldset[disabled] .btn-info:hover {
	background-color: #5bc0de;
	border-color: #46b8da
}

.btn-info .badge {
	color: #5bc0de;
	background-color: #fff
}

.btn-warning {
	color: #fff;
	background-color: #f0ad4e;
	border-color: #eea236
}

.btn-warning.focus,
.btn-warning:focus {
	color: #fff;
	background-color: #ec971f;
	border-color: #985f0d
}

.btn-warning:hover {
	color: #fff;
	background-color: #ec971f;
	border-color: #d58512
}

.btn-warning.active,
.btn-warning:active,
.open>.dropdown-toggle.btn-warning {
	color: #fff;
	background-color: #ec971f;
	border-color: #d58512
}

.btn-warning.active.focus,
.btn-warning.active:focus,
.btn-warning.active:hover,
.btn-warning:active.focus,
.btn-warning:active:focus,
.btn-warning:active:hover,
.open>.dropdown-toggle.btn-warning.focus,
.open>.dropdown-toggle.btn-warning:focus,
.open>.dropdown-toggle.btn-warning:hover {
	color: #fff;
	background-color: #d58512;
	border-color: #985f0d
}

.btn-warning.active,
.btn-warning:active,
.open>.dropdown-toggle.btn-warning {
	background-image: none
}

.btn-warning.disabled,
.btn-warning.disabled.active,
.btn-warning.disabled.focus,
.btn-warning.disabled:active,
.btn-warning.disabled:focus,
.btn-warning.disabled:hover,
.btn-warning[disabled],
.btn-warning[disabled].active,
.btn-warning[disabled].focus,
.btn-warning[disabled]:active,
.btn-warning[disabled]:focus,
.btn-warning[disabled]:hover,
fieldset[disabled] .btn-warning,
fieldset[disabled] .btn-warning.active,
fieldset[disabled] .btn-warning.focus,
fieldset[disabled] .btn-warning:active,
fieldset[disabled] .btn-warning:focus,
fieldset[disabled] .btn-warning:hover {
	background-color: #f0ad4e;
	border-color: #eea236
}

.btn-warning .badge {
	color: #f0ad4e;
	background-color: #fff
}

.btn-danger {
	color: #fff;
	background-color: #d9534f;
	border-color: #d43f3a
}

.btn-danger.focus,
.btn-danger:focus {
	color: #fff;
	background-color: #c9302c;
	border-color: #761c19
}

.btn-danger:hover {
	color: #fff;
	background-color: #c9302c;
	border-color: #ac2925
}

.btn-danger.active,
.btn-danger:active,
.open>.dropdown-toggle.btn-danger {
	color: #fff;
	background-color: #c9302c;
	border-color: #ac2925
}

.btn-danger.active.focus,
.btn-danger.active:focus,
.btn-danger.active:hover,
.btn-danger:active.focus,
.btn-danger:active:focus,
.btn-danger:active:hover,
.open>.dropdown-toggle.btn-danger.focus,
.open>.dropdown-toggle.btn-danger:focus,
.open>.dropdown-toggle.btn-danger:hover {
	color: #fff;
	background-color: #ac2925;
	border-color: #761c19
}

.btn-danger.active,
.btn-danger:active,
.open>.dropdown-toggle.btn-danger {
	background-image: none
}

.dropdown,
.dropup {
	position: relative
}

.dropdown-toggle:focus {
	outline: 0
}

.dropdown-menu {
	position: absolute;
	top: 100%;
	left: 0;
	z-index: 1000;
	display: none;
	float: left;
	min-width: 160px;
	padding: 5px 0;
	margin: 2px 0 0;
	font-size: 14px;
	text-align: left;
	list-style: none;
	background-color: #fff;
	-webkit-background-clip: padding-box;
	background-clip: padding-box;
	border: 1px solid #ccc;
	border: 1px solid rgba(0, 0, 0, .15);
	border-radius: 4px;
	-webkit-box-shadow: 0 6px 12px rgba(0, 0, 0, .175);
	box-shadow: 0 6px 12px rgba(0, 0, 0, .175)
}

.dropdown-menu.pull-right {
	right: 0;
	left: auto
}

.dropdown-menu .divider {
	height: 1px;
	margin: 9px 0;
	overflow: hidden;
	background-color: #e5e5e5
}

.dropdown-menu>li>a {
	display: block;
	padding: 3px 20px;
	clear: both;
	font-weight: 400;
	line-height: 1.42857143;
	color: #333;
	white-space: nowrap
}

.dropdown-menu>li>a:focus,
.dropdown-menu>li>a:hover {
	color: #262626;
	text-decoration: none;
	background-color: #f5f5f5
}

.dropdown-menu>.active>a,
.dropdown-menu>.active>a:focus,
.dropdown-menu>.active>a:hover {
	color: #fff;
	text-decoration: none;
	background-color: #337ab7;
	outline: 0
}

.dropdown-menu>.disabled>a,
.dropdown-menu>.disabled>a:focus,
.dropdown-menu>.disabled>a:hover {
	color: #777
}

.dropdown-menu>.disabled>a:focus,
.dropdown-menu>.disabled>a:hover {
	text-decoration: none;
	cursor: not-allowed;
	background-color: transparent;
	background-image: none;
	filter: progid:DXImageTransform.Microsoft.gradient(enabled=false)
}

.open>.dropdown-menu {
	display: block
}

.open>a {
	outline: 0
}

.dropdown-menu-right {
	right: 0;
	left: auto
}

.dropdown-menu-left {
	right: auto;
	left: 0
}

.dropdown-header {
	display: block;
	padding: 3px 20px;
	font-size: 12px;
	line-height: 1.42857143;
	color: #777;
	white-space: nowrap
}

.dropdown-backdrop {
	position: fixed;
	top: 0;
	right: 0;
	bottom: 0;
	left: 0;
	z-index: 990
}

.pull-right>.dropdown-menu {
	right: 0;
	left: auto
}

.dropup .caret,
.navbar-fixed-bottom .dropdown .caret {
	content: "";
	border-top: 0;
	border-bottom: 4px dashed;
	border-bottom: 4px solid\9
}

.dropup .dropdown-menu,
.navbar-fixed-bottom .dropdown .dropdown-menu {
	top: auto;
	bottom: 100%;
	margin-bottom: 2px
}

@media (min-width:768px) {
	.navbar-right .dropdown-menu {
		right: 0;
		left: auto
	}

	.navbar-right .dropdown-menu-left {
		right: auto;
		left: 0
	}
}


*/

/*----------------------------------------------*/


 /*   .md-country-picker-item {
    position: relative;
    line-height: 20px;
    padding: 10px 0 10px 40px;
}

.md-country-picker-flag {
    position: absolute;
    left: 0;
    height: 20px;
}

.mbsc-scroller-wheel-item-2d .md-country-picker-item {
    transform: scale(1.1);
}*/
</style>

<section class="main-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-2 p-0">
                    <div class="left-sidebar-menu">
                         <div class="user-box">
                            <img src="<?php echo $this->user_model->get_user_image_url($this->session->userdata('user_id')); ?>" alt="" class="img-fluid">
                            <div class="name">
                                <div class="name"><?php echo $user_details['first_name'].' '.$user_details['last_name']; ?></div>
                            </div>
                        </div>
                        <?php include "profile_menus.php"; ?>
                    </div>
            </div>
            <div class="col-lg-10 p-0">
                    <div class="main-content">
                        <div class="row">
							 <div class="page-detail">
								<div class="page-detail-title">
                                    <h1 class="page-title print-hidden text-uppercase"><?php echo $page_title; ?></h1>
                                </div>
							 </div>
						</div>
					    								<div class="content-inner-box">
								<div class="row">
						                <div class="col-lg-2">
											<div class="user-dashboard-menu">
												<ul>
													<li class="active"><a href="<?php echo site_url('home/profile/user_profile'); ?>"><?php echo site_phrase('profile'); ?></a></li>
													<li><a href="<?php echo site_url('home/profile/user_credentials'); ?>"><?php echo site_phrase('account'); ?></a></li>
													<li><a href="<?php echo site_url('home/profile/user_photo'); ?>"><?php echo site_phrase('photo'); ?></a></li>
												</ul>
											</div> 
										</div> 	
										<div class="col-lg-10">
                                          <div class="user-dashboard-content">
                        <div class="content-title-box">
                            <div class="title"><?php echo site_phrase('profile'); ?></div>
                            <div class="subtitle"><?php echo site_phrase('add_information_about_yourself_to_share_on_your_profile'); ?>.</div>
                        </div>
                        <form action="<?php echo site_url('home/update_profile/update_basics'); ?>" method="post">
                            <div class="content-box">
                                <div class="basic-group">
                                    <div class="form-group">
                                        <label for="FristName"><?php echo site_phrase('full_name'); ?>:</label>
                                        <input type="text" class="form-control" name = "first_name" id="FristName" placeholder="<?php echo site_phrase('full_name'); ?>" value="<?php echo $user_details['first_name']; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="FristName"><?php echo site_phrase('username'); ?>:</label>
                                        <input type="text" class="form-control" name="username" placeholder="<?php echo site_phrase('username'); ?>" value="<?php echo $user_details['username']; ?>">
                                    </div>
                                    
                                     <div class="form-group">
                                         <label for="FristName"><?php echo site_phrase('address'); ?>:</label>
                                        <input type="text" class="form-control" name="address" placeholder="<?php echo site_phrase('address'); ?>" value="<?php echo $user_details['address']; ?>">
                                    </div>


                                    <?php if($user_details['is_instructor'] > 0): ?>
                                    
                                    <!--<div class="form-group">-->
                                    <!--    <label for="FristName"><?php echo site_phrase('country'); ?>:</label>-->
                                    <!--    <input type="text" class="form-control" name="country" placeholder="<?php echo site_phrase('country'); ?>" value="<?php echo $user_details['country']; ?>">-->
                                    <!--</div>-->
                                    
                                    <div class="form-group">
                                        <label>Select Country</label><br>
                                        <div id="basic" data-input-name="country" data-selected-country="<?php echo $user_details['country']; ?>">
                                            

                                        </div>
                                        
                                        
                                        <!--<div id="advanced"-->
                                            
                                        <!--     data-selected-country="CA"-->
                                            
                                        <!--     data-countries='{"SA": "SOUTH ASIA","CA": "Canada"}'-->
                                        <!--     >-->
                                        <!--</div>-->
                                    </div>
                                                                    
                                    
                                    <div class="form-group">
                                        <label for="FristName"><?php echo site_phrase('age'); ?>:</label>
                                        <input type="number" class="form-control" name="age" placeholder="<?php echo site_phrase('age'); ?>" value="<?php echo $user_details['age']; ?>">
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="FristName"><?php echo site_phrase('qualification'); ?>:</label>
                                        <input type="text" class="form-control" name="qualification" placeholder="<?php echo site_phrase('qualification'); ?>" value="<?php echo $user_details['qualification']; ?>">
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="FristName"><?php echo site_phrase('lisenses'); ?>:</label>
                                        <input type="text" class="form-control" name="lisenses" placeholder="<?php echo site_phrase('lisenses'); ?>" value="<?php echo $user_details['lisenses']; ?>">
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="FristName"><?php echo site_phrase('certification'); ?>:</label>
                                        <input type="text" class="form-control" name="certification" placeholder="<?php echo site_phrase('certification'); ?>" value="<?php echo $user_details['certification']; ?>">
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="FristName"><?php echo site_phrase('experience'); ?>:</label>
                                        <input type="text" class="form-control" name="experience" placeholder="<?php echo site_phrase('experience'); ?>" value="<?php echo $user_details['experience']; ?>">
                                    </div>
                                    
                                    
                                    
                                        <!--<div class="form-group">-->
                                        <!--    <label for="Biography"><?php echo site_phrase('title'); ?>:</label>-->
                                        <!--    <textarea class="form-control" name = "title" placeholder="<?php echo site_phrase('short_title_about_yourself'); ?>"><?php echo $user_details['title']; ?></textarea>-->
                                        <!--</div>-->

                                        <!--<div class="form-group">-->
                                        <!--    <label for="skills"><?php echo get_phrase('your_skills'); ?></label>-->
                                        <!--    <input type="text" class="form-control bootstrap-tag-input" id = "skills" name="skills" data-role="tagsinput" style="width: 100%;" value="<?php echo $user_details['skills'];  ?>"/>-->
                                        <!--    <small class="text-muted"><?php echo get_phrase('write_your_skill_and_click_the_enter_button'); ?></small>-->
                                        <!--</div>-->
                                        <!--<script type="text/javascript">-->
                                        <!--    $(function(){-->
                                        <!--        $(".bootstrap-tag-input").tagsinput('items');-->
                                        <!--    });-->
                                        <!--</script>-->
                                    <?php endif; ?>
                                    
                                    <div class="form-group">
                                        <label for="FristName"><?php echo site_phrase('postal_address'); ?>:</label>
                                        <input type="text" class="form-control" name="postal_address" placeholder="<?php echo site_phrase('postal_address'); ?>" value="<?php echo $user_details['postal_address']; ?>">
                                    </div>

                                    <!--<div class="form-group">-->
                                    <!--    <label for="Biography"><?php echo site_phrase('biography'); ?>:</label>-->
                                    <!--    <textarea class="form-control author-biography-editor" name = "biography" id="Biography"><?php echo $user_details['biography']; ?></textarea>-->
                                    <!--</div>-->
                                </div>
                                <!--<div class="link-group">-->
                                <!--    <div class="form-group">-->
                                <!--        <input type="text" class="form-control" maxlength="60" name = "twitter_link" placeholder="<?php echo site_phrase('twitter_link'); ?>" value="<?php echo $social_links['twitter']; ?>">-->
                                <!--        <small class="form-text text-muted"><?php echo site_phrase('add_your_twitter_link'); ?>.</small>-->
                                <!--    </div>-->
                                <!--    <div class="form-group">-->
                                <!--        <input type="text" class="form-control" maxlength="60" name = "facebook_link" placeholder="<?php echo site_phrase('facebook_link'); ?>" value="<?php echo $social_links['facebook']; ?>">-->
                                <!--        <small class="form-text text-muted"><?php echo site_phrase('add_your_facebook_link'); ?>.</small>-->
                                <!--    </div>-->
                                <!--    <div class="form-group">-->
                                <!--        <input type="text" class="form-control" maxlength="60" name = "linkedin_link" placeholder="<?php echo site_phrase('linkedin_link'); ?>" value="<?php echo $social_links['linkedin']; ?>">-->
                                <!--        <small class="form-text text-muted"><?php echo site_phrase('add_your_linkedin_link'); ?>.</small>-->
                                <!--    </div>-->
                                <!--</div>-->
                            </div>
                            <div class="content-update-box">
                                <button type="submit" class="btn"><?= site_phrase('save'); ?></button>
                            </div>
                        </form>
                    </div>
					 </div>
						        
						    </div>
						</div>
                    </div>
            </div>        
        </div>
    </div>
</section>





