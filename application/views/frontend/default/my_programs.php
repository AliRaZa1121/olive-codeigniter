<?php

$my_courses = $this->user_model->my_programs()->result_array();
$categories = array();
foreach ($my_courses as $my_course) {
    $course_details = $this->crud_model->get_programs_by_id($my_course['programs_id'])->row_array();
    if (!in_array($course_details['category_id'], $categories)) {
        array_push($categories, $course_details['category_id']);
    }
}
?>
   <section class="main-wrapper">
       <div class="container-fluid">
           <div class="row">
				<div class="col-lg-2 p-0">
                    <div class="left-sidebar-menu">
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
								          <div class="page-detail-filter">
                                    <span class="text-uppercase">
                                            <?php echo site_phrase('filter_by'); ?>
                                        </span>
                                    <div class="my-course-filter-bar filter-box">
                                        
                                        
                                            <a class="btn btn-outline-secondary dropdown-toggle all-btn filter-btn" href="#" data-bs-toggle="dropdown">
                                                <?php echo site_phrase('categories'); ?>
                                            </a>
                                    
                                            <div class="dropdown-menu filter-dropdown">
                                                <?php foreach ($categories as $category):
                                                                    $category_details = $this->crud_model->get_categories($category)->row_array();
                                                                    ?>
                                                <a class="dropdown-item" href="#" id="<?php echo $category; ?>" onclick="getCoursesByCategoryId(this.id)">
                                                    <?php echo $category_details['name']; ?>
                                                </a>
                                                <?php endforeach; ?>
                                            </div>
                                    </div>
                                    <div class="my-course-search-bar">
                                        <form action="">
                                            <div class="input-group">
                                                <input type="text" class="form-control py-2" placeholder="<?php echo site_phrase('search_my_programs'); ?>"
                                                    onkeyup="getCoursesBySearchString(this.value)">
                                                <div class="input-group-append">
                                                    <button class="btn py-2" type="submit"><i class="fas fa-search"></i></button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                       <div class="btn-group">
                                            <a href="<?php echo site_url('home/my_programs'); ?>" class="btn reset-btn" disabled>
                                                <?php echo site_phrase('reset'); ?>
                                            </a>
                                        </div>
                                </div>
								
							 </div>	
						</div>
						  <div class="row" id = "my_courses_area">
            <?php foreach ($my_courses as $my_course):
                $course_details = $this->crud_model->get_programs_by_id($my_course['course_id'])->row_array();
                if(count($course_details) > 0):
                    $instructor_details = $this->user_model->get_all_user($course_details['user_id'])->row_array();?>
    
                    <div class="col-lg-4">
                        <div class="course-box-wrap">
                                <div class="course-box">
                                    <a href="<?php echo site_url('home/lesson/'.rawurlencode(slugify($course_details['title'])).'/'.$my_course['course_id']); ?>">
                                        <div class="course-image">
                                            <img src="<?php echo $this->crud_model->get_course_thumbnail_url($my_course['course_id']); ?>" alt="" class="img-fluid">
                                            <span class="play-btn"></span>
                                        </div>
                                    </a>
    
                                    <div class="" id = "course_info_view_<?php echo $my_course['course_id'];  ?>">
                                      <div class="course-details">
                                          <a href="<?php echo site_url('home/program/'.rawurlencode(slugify($course_details['title'])).'/'.$my_course['course_id']); ?>"><h5 class="title"><?php echo ellipsis($course_details['title']); ?></h5></a>
                                          <div class="progress" style="height: 5px;">
                                            <div class="progress-bar progress-bar-striped bg-danger" role="progressbar" style="width: <?php echo course_progress($my_course['course_id']); ?>%" aria-valuenow="<?php echo course_progress($my_course['course_id']); ?>" aria-valuemin="0" aria-valuemax="100"></div>
                                          </div>
                                          <small><?php echo ceil(course_progress($my_course['course_id'])); ?>% <?php echo site_phrase('completed'); ?></small>
                                          <div class="rating your-rating-box" style="position: unset; margin-top: -18px;">
    
                                              <?php
                                               $get_my_rating = $this->crud_model->get_user_specific_rating('course', $my_course['course_id']);
                                               for($i = 1; $i < 6; $i++):?>
                                               <?php if ($i <= $get_my_rating['rating']): ?>
                                                  <i class="fas fa-star filled"></i>
                                              <?php else: ?>
                                                  <i class="fas fa-star"></i>
                                               <?php endif; ?>
                                              <?php endfor; ?>
                                              <p class="your-rating-text">
                                                <a href="javascript::" id = "edit_rating_btn_<?php echo $course_details['id']; ?>" onclick="toggleRatingView('<?php echo $course_details['id']; ?>')" style="color: #2a303b"><?php echo site_phrase('edit_rating'); ?></a>
        		                                    <a href="javascript::" class="hidden" id = "cancel_rating_btn_<?php echo $course_details['id']; ?>" onclick="toggleRatingView('<?php echo $course_details['id']; ?>')" style="color: #2a303b"><?php echo site_phrase('cancel_rating'); ?></a>
                                              </p>
                                          </div>
                                      </div>
                                      <div class="row">
                                          <div class="col-md-12 px-4 py-2">
                                                <div class="btn-group">
                                                    <a href="<?php echo site_url('home/program/'.rawurlencode(slugify($course_details['title'])).'/'.$my_course['course_id']); ?>" class="theme-btn primary-btn btn radius-5"><?php echo site_phrase('program_detail'); ?></a>
                                                     <a href="<?php echo site_url('home/lesson/'.rawurlencode(slugify($course_details['title'])).'/'.$my_course['course_id']); ?>" class="theme-btn secondary-btn btn radius-5"><?php echo site_phrase('start_lesson'); ?></a>
                                                </div>
                                              
                                          </div>
                                      </div>
                                    </div>
    
                                    <div class="course-details" style="display: none; padding-bottom: 10px;" id = "course_rating_view_<?php echo $course_details['id']; ?>">
                                      <a href="<?php echo site_url('home/program/'.rawurlencode(slugify($course_details['title'])).'/'.$my_course['course_id']); ?>"><h5 class="title"><?php echo ellipsis($course_details['title']); ?></h5></a>
                                      <?php
                        								$user_specific_rating = $this->crud_model->get_user_specific_rating('course', $course_details['id']);
                        							?>
                        							<form class="javascript:;" action="" method="post">
                        								<div class="form-group select">
                        									<div class="styled-select">
                        										<select class="form-control" name="star_rating" id="star_rating_of_course_<?php echo $course_details['id']; ?>">
                        											<option value="1" <?php if ($user_specific_rating['rating'] == 1): ?>selected=""<?php endif; ?>>1 <?php echo site_phrase('out_of'); ?> 5</option>
                        											<option value="2" <?php if ($user_specific_rating['rating'] == 2): ?>selected=""<?php endif; ?>>2 <?php echo site_phrase('out_of'); ?> 5</option>
                        											<option value="3" <?php if ($user_specific_rating['rating'] == 3): ?>selected=""<?php endif; ?>>3 <?php echo site_phrase('out_of'); ?> 5</option>
                        											<option value="4" <?php if ($user_specific_rating['rating'] == 4): ?>selected=""<?php endif; ?>>4 <?php echo site_phrase('out_of'); ?> 5</option>
                        											<option value="5" <?php if ($user_specific_rating['rating'] == 5): ?>selected=""<?php endif; ?>>5 <?php echo site_phrase('out_of'); ?> 5</option>
                        										</select>
                        									</div>
                        								</div>
                        								<div class="form-group add_top_30">
                        									<textarea name="review" id ="review_of_a_course_<?php echo $course_details['id']; ?>" class="form-control" style="height:120px;" placeholder="<?php echo site_phrase('write_your_review_here'); ?>"><?php echo $user_specific_rating['review']; ?></textarea>
                        								</div>
                        								<button type="" class="btn red w-100 radius-10 mt-2" onclick="publishRating('<?php echo $course_details['id']; ?>')" name="button"><?php echo site_phrase('publish_rating'); ?></button>
                        								<a href="javascript::" class="btn red w-100 radius-10 mt-2" onclick="toggleRatingView('<?php echo $course_details['id']; ?>')" name="button"><?php echo site_phrase('cancel_rating'); ?></a>
                        							</form>
                                    </div>
                                </div>
                        </div>
                    </div>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>
					</div>
				 </div>	
		   </div>
	   </div>
   </section>   
		   