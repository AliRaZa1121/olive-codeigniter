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
                                <li><a href="<?php echo site_url('home/profile/user_profile'); ?>"><?php echo site_phrase('profile'); ?></a></li>
                                <li><a href="<?php echo site_url('home/profile/user_credentials'); ?>"><?php echo site_phrase('account'); ?></a></li>
                                <li class="active"><a href="<?php echo site_url('home/profile/user_photo'); ?>"><?php echo site_phrase('photo'); ?></a></li>
                            </ul>
                        </div>
						        </div>
						        <div class="col-lg-10">
	                                     <div class="user-dashboard-content">
                        <div class="content-title-box">
                            <div class="title"><?php echo site_phrase('photo'); ?></div>
                            <div class="subtitle"><?php echo site_phrase('update_your_photo'); ?>.</div>
                        </div>
                        <form action="<?php echo site_url('home/update_profile/update_photo'); ?>" enctype="multipart/form-data" method="post">
                            <div class="content-box">
                                <div class="email-group">
                                    <div class="form-group file">
                                        <label for="user_image"><?php echo site_phrase('upload_image'); ?>:</label>
                                        <div class="fileupload-btn">
                                            <span>Choose File</span>
                                            <input type="file" class="form-control" name = "user_image" id="user_image">
                                         </div>    
                                    </div>
                                </div>
                            </div>
                            <div class="content-update-box">
                                <button type="submit" class="btn"><?php echo site_phrase('save'); ?></button>
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
