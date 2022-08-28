<?php
$course_details = $this->crud_model->get_course_by_id($programs_id)->row_array();
$instructor_details = $this->user_model->get_all_user($course_details['user_id'])->row_array();
?>
<section class="course-header-area">
  <div class="container">
    <div class="row align-items-end">
      <div class="col-lg-8">
        <div class="course-breadcrumb">
            <ul>
                <?php 
                    $category_hierarchy = $this->crud_model->category_hierarchy_p($course_details['sub_category_id']);
                    echo $category_hierarchy;
                ?>
            </ul>
        </div>
        <div class="course-header-wrap">
          <h1 class="title"><?php echo $course_details['title']; ?></h1>
          <p class="subtitle"><?php echo $course_details['short_description']; ?></p>
          <div class="rating-row">
            <span class="course-badge best-seller"><?php echo site_phrase($course_details['level']); ?></span>
            <?php
            $total_rating =  $this->crud_model->get_ratings('course', $course_details['id'], true)->row()->rating;
            $number_of_ratings = $this->crud_model->get_ratings('course', $course_details['id'])->num_rows();
            if ($number_of_ratings > 0) {
              $average_ceil_rating = ceil($total_rating / $number_of_ratings);
            } else {
              $average_ceil_rating = 0;
            }

            for ($i = 1; $i < 6; $i++) : ?>
              <?php if ($i <= $average_ceil_rating) : ?>
                <i class="fas fa-star filled" style="color: #f5c85b;"></i>
              <?php else : ?>
                <i class="fas fa-star"></i>
              <?php endif; ?>
            <?php endfor; ?>
            <span class="d-inline-block average-rating"><?php echo $average_ceil_rating; ?></span><span>(<?php echo $number_of_ratings . ' ' . site_phrase('ratings'); ?>)</span>
            <span class="enrolled-num">
              <?php
              $number_of_enrolments = $this->crud_model->enrol_history_p($course_details['id'])->num_rows();
              echo $number_of_enrolments . ' ' . site_phrase('students_enrolled');
              ?>
            </span>
            <!-- <span class="comment"><i class="fas fa-comment"></i><?php echo ucfirst($course_details['language']); ?></span> -->
          </div>
          <div class="created-row">
            <span class="created-by">
              <?php echo site_phrase('created_by'); ?>
              <?php if ($course_details['multi_instructor']) : ?>
                <?php $instructors = $this->user_model->get_multi_instructor_details_with_csv($course_details['user_id']); ?>
                <?php foreach ($instructors as $key => $instructor) : ?>
                  <a class="text-14px fw-600 text-decoration-none" href="<?php echo site_url('home/instructor_page/' . $instructor['id']); ?>"><?php echo $instructor['first_name'] . ' ' . $instructor['last_name']; ?></a>
                  <?php echo $key + 1 == count($instructors) ? '' : ', '; ?>
                <?php endforeach; ?>
              <?php else : ?>
                <a class="text-14px fw-600 text-decoration-none" href="<?php echo site_url('home/instructor_page/' . $course_details['user_id']); ?>"><?php echo $instructor_details['first_name'] . ' ' . $instructor_details['last_name']; ?></a>
              <?php endif; ?>
            </span>
            <br>
            <?php if ($course_details['last_modified'] > 0) : ?>
               <span class="last-updated-date d-inline-block mt-2"><i class="fas fa-exclamation-circle"></i><?php echo site_phrase('last_updated') . ' ' . date('D, d-M-Y', $course_details['last_modified']); ?></span>
            <?php else : ?>
               <span class="last-updated-date d-inline-block mt-3"><i class="fas fa-exclamation-circle"></i><?php echo site_phrase('last_updated') . ' ' . date('D, d-M-Y', $course_details['date_added']); ?></span>
            <?php endif; ?>
            <span class="comment"><i class="fas fa-globe"></i><?php echo ucfirst($course_details['language']); ?></span>
            <span  class="comment"><a role="button" data-bs-toggle="modal"  data-bs-target="#exampleModal"><i class="fas fa-flag"></i> <span id="report-count"></span> Report</a></span>
          </div>
        </div>
      </div>
      <div class="col-lg-4">

      </div>
    </div>
  </div>
</section>

<section class="course-content-area">
  <div class="container">
    <div class="row">
      <div class="col-lg-4 order-first order-lg-last">
        <div class="course-sidebar natural c-shadow">
          <?php if ($course_details['video_url'] != "") : ?>
            <div class="preview-video-box">
              <a data-bs-toggle="modal" data-bs-target="#CoursePreviewModal">
                <img src="<?php echo $this->crud_model->get_course_thumbnail_url($course_details['id']); ?>" alt="" class="w-100">
                <span class="preview-text"><?php echo site_phrase('preview_this_programs'); ?></span>
                <span class="play-btn"></span>
              </a>
            </div>
          <?php endif; ?>
          <div class="course-sidebar-text-box">
            <div class="price text-center">
              <?php if ($course_details['is_free_course'] == 1) : ?>
                <span class="current-price"><span class="current-price"><?php echo site_phrase('free'); ?></span></span>
              <?php else : ?>
                <?php if ($course_details['discount_flag'] == 1) : ?>
                  <span class="original-price"><?php echo currency($course_details['price']) ?></span>
                  <span class="current-price"><span class="current-price"><?php echo currency($course_details['discounted_price']); ?></span></span>
                  <input type="hidden" id="total_price_of_checking_out" value="<?php echo currency($course_details['discounted_price']); ?>">
                <?php else : ?>
                  <span class="current-price"><span class="current-price"><?php echo currency($course_details['price']); ?></span></span>
                  <input type="hidden" id="total_price_of_checking_out" value="<?php echo currency($course_details['price']); ?>">
                <?php endif; ?>
              <?php endif; ?>
            </div>

            <?php if (is_purchased($course_details['id'])) : ?>
              <div class="already_purchased">
                <a href="<?php echo site_url('home/my_programs'); ?>"><?php echo site_phrase('already_purchased'); ?></a>
              </div>
            <?php else : ?>

              <!-- WISHLIST BUTTON -->
              <div class="buy-btns">
                <button class="btn btn-add-wishlist <?php echo $this->crud_model->is_added_to_wishlist($course_details['id']) ? 'active' : ''; ?>" type="button" id="<?php echo $course_details['id']; ?>" onclick="handleAddToWishlist(this)">
                  <?php
                  if ($this->crud_model->is_added_to_wishlist($course_details['id'])) {
                    echo site_phrase('added_to_wishlist');
                  } else {
                    echo site_phrase('add_to_wishlist');
                  }
                  ?>
                </button>
              </div>

              <?php if ($course_details['is_free_course'] == 1) : ?>
                <div class="buy-btns">
                  <?php if ($this->session->userdata('user_login') != 1) : ?>
                    <a href="javascript:;" class="btn btn-buy-now" onclick="handleEnrolledButton()"><?php echo site_phrase('get_enrolled'); ?></a>
                  <?php else : ?>
                    <a href="<?php echo site_url('home/get_enrolled_to_free_course/' . $course_details['id']); ?>" class="btn btn-buy-now"><?php echo site_phrase('get_enrolled'); ?></a>
                  <?php endif; ?>
                </div>
              <?php else : ?>
                <div class="buy-btns">
                  <?php if (in_array($course_details['id'], $this->session->userdata('cart_items'))) : ?>
                    <button class="btn btn-buy-now active addedToCart" type="button" id="<?php echo $course_details['id']; ?>" onclick="handleCartItems(this)"><?php echo site_phrase('added_to_cart'); ?></button>
                  <?php else : ?>
                    <button class="btn btn-buy-now" type="button" id="<?php echo $course_details['id']; ?>" onclick="handleCartItems(this)"><?php echo site_phrase('add_to_cart'); ?></button>
                  <?php endif; ?>
                </div>
              <?php endif; ?>
            <?php endif; ?>


            <div class="includes">
              <!--<div class="title"><b><?php echo site_phrase('includes'); ?>:</b></div>-->
              <div class="title"><b><?php echo site_phrase('This consultancy programs includes'); ?>:</b></div>
              <ul>
                <?php if ($course_details['course_type'] == 'general') : ?>
                  <li><i class="far fa-file-video"></i>
                    <?php
                    echo $this->crud_model->get_total_duration_of_lesson_by_course_id($course_details['id']) . ' ' . site_phrase('on_demand_videos');
                    ?>
                  </li>
                  <li><i class="far fa-file"></i><?php echo $this->crud_model->get_lessons('course', $course_details['id'])->num_rows() . ' ' . site_phrase('lessons'); ?></li>
                  <li><i class="fas fa-mobile-alt"></i><?php echo site_phrase('access_on_mobile_and_tv'); ?></li>
                <?php elseif ($course_details['course_type'] == 'scorm') : ?>
                  <li><i class="far fa-file-video"></i><?php echo site_phrase('scorm_course'); ?></li>
                  <li><i class="fas fa-mobile-alt"></i><?php echo site_phrase('access_on_laptop_and_tv'); ?></li>
                <?php endif; ?>
                <li><i class="far fa-compass"></i><?php echo site_phrase('full_lifetime_access'); ?></li>
                <li class="text-center pt-3">
                  <a class="badge-sub-warning text-decoration-none fw-600 hover-shadow-1 d-inline-block" href="<?php echo site_url('home/compare?course-1=' . rawurlencode(slugify($course_details['title'])) . '&&course-id-1=' . $course_details['id']); ?>"><i class="fas fa-balance-scale"></i> <?php echo site_phrase('compare_this_Program_with_other'); ?></a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-8 order-last order-lg-first radius-10 mt-4 bg-white p-30-40">

        <div class="description-box view-more-parent course-border">
          <div class="view-more" onclick="viewMore(this,'hide')">+ <?php echo site_phrase('view_more'); ?></div>
          <div class="description-title"><?php echo site_phrase('Programs_overview'); ?></div>
          <div class="description-content-wrap">
            <div class="description-content">
              <?php echo $course_details['description']; ?>
            </div>
          </div>
        </div>

        <h4 class="py-3"><?php echo site_phrase('what_will_i_learn'); ?>?</h4>
        <div class="what-you-get-box">
          <ul class="what-you-get__items">
            <?php foreach (json_decode($course_details['outcomes']) as $outcome) : ?>
              <?php if ($outcome != "") : ?>
                <li><?php echo $outcome; ?></li>
              <?php endif; ?>
            <?php endforeach; ?>
          </ul>
        </div>

        <div class="requirements-box">
          <div class="requirements-title"><?php echo site_phrase('requirements'); ?></div>
          <div class="requirements-content">
            <ul class="requirements__list">
              <?php foreach (json_decode($course_details['requirements']) as $requirement) : ?>
                <?php if ($requirement != "") : ?>
                  <li><?php echo $requirement; ?></li>
                <?php endif; ?>
              <?php endforeach; ?>
            </ul>
          </div>
        </div>

        <?php if ($course_details['course_type'] == 'general') : ?>
          <div class="course-curriculum-box">
            <div class="course-curriculum-title clearfix mt-5 mb-3">
              <div class="title float-start"><?php echo site_phrase('curriculum_for_this_program'); ?></div>
              <div class="float-end mt-2">
                <span class="total-lectures">
                  <?php echo $this->crud_model->get_lessons_p('course', $course_details['id'])->num_rows() . ' ' . site_phrase('lessons'); ?>
                </span>
                <span class="total-time">
                  <?php
                  echo $this->crud_model->get_total_duration_of_lesson_by_programs_id($course_details['id']);
                  ?>
                </span>
              </div>
            </div>
            <div class="course-curriculum-accordion">
              <?php
              $sections = $this->crud_model->get_section_p('course', $programs_id)->result_array();
              $counter = 0;
              foreach ($sections as $key => $section) : ?>
                <div class="lecture-group-wrapper">

                  <?php
                    if($key == 0){
                      $style = 'border-radius: 10px 10px 0px 0px;';
                    }elseif($key+1 == count($sections)){
                      $style = 'border-radius: 0px 0px 10px 10px;';
                    }else{
                      $style = '';
                    }
                  ?>

                  <div class="lecture-group-title clearfix" style="<?= $style; ?>" data-bs-toggle="collapse" data-bs-target="#collapse<?php echo $section['id']; ?>" aria-expanded="<?php if ($counter == 0) echo 'true'; ?>">
                    <div class="title float-start">
                      <?php echo $section['title']; ?>
                    </div>
                    <div class="float-end">
                      <span class="total-lectures">
                        <?php echo $this->crud_model->get_lessons_p('section', $section['id'])->num_rows() . ' ' . site_phrase('lessons'); ?>
                      </span>
                      <span class="total-time">
                        <?php echo $this->crud_model->get_total_duration_of_lesson_by_section_id($section['id']); ?>
                      </span>
                    </div>
                  </div>

                  <div id="collapse<?php echo $section['id']; ?>" class="lecture-list collapse <?php if ($counter == 0) echo 'show'; ?>">
                    <ul>
                      <?php $lessons = $this->crud_model->get_lessons_p('section', $section['id'])->result_array();
                      foreach ($lessons as $lesson) : ?>
                        <li class="lecture has-preview text-14px ">
                          <span class="lecture-title <?php if($lesson['is_free'] == 1) echo 'text-primary'; ?>" onclick="go_course_playing_page('<?php echo $course_details['id']; ?>', '<?php echo $lesson['id']; ?>')"><?php echo $lesson['title']; ?></span>

                          <div class="lecture-info float-lg-end">
                            <?php if($lesson['is_free'] == 1): ?>
                                <span class="lecture-preview" onclick="lesson_preview('<?php echo site_url('home/preview_free_lesson/'.$lesson['id']); ?>', '<?php echo site_phrase('lesson').': '.$lesson['title']; ?>')">
                                  <i class="fas fa-eye"></i>
                                  <?php echo site_phrase('preview'); ?>
                                </span>
                            <?php endif; ?>

                            <span class="lecture-time ps-2">
                              <?php if($lesson['duration'] == "")echo'<span class="opacity-0">.</span>'; ?>
                              <?php echo $lesson['duration']; ?>
                            </span>
                          </div>
                        </li>
                      <?php endforeach; ?>
                    </ul>
                  </div>
                </div>
              <?php
                $counter++;
              endforeach; ?>
            </div>
          </div>
        <?php endif; ?>

        <div class="about-instructor-box">
          <div class="about-instructor-title">
            <?php echo site_phrase('about_instructor'); ?>
          </div>
          <?php if ($course_details['multi_instructor']) : ?>
            <?php $instructors = $this->user_model->get_multi_instructor_details_with_csv($course_details['user_id']); ?>
            <?php foreach ($instructors as $key => $instructor) : ?>
              <?php if($key > 0)echo "<hr>"; ?>

              <div class="row justify-content-center mb-3">
                <div class="col-md-4 top-instructor-img w-sm-100">
                  <a href="<?php echo site_url('home/instructor_page/'.$instructor['id']); ?>">
                    <img src="<?php echo $this->user_model->get_user_image_url($instructor['id']); ?>" width="100%">
                  </a>
                </div>
                <div class="col-md-8 top-instructor-details text-center text-md-start">
                    <h4 class="mb-1 fw-600 "><a class="text-decoration-none" href="<?php echo site_url('home/instructor_page/'.$instructor['id']); ?>"><?php echo $instructor['first_name'].' '.$instructor['last_name']; ?></a></h4>
                    <p class="fw-500 text-14px w-100 "><?php echo $instructor['title']; ?></p>
                    <div class="rating ">
                      <div class="d-inline-block">
                        <span class="text-dark fw-800 text-muted ms-1 text-13px"><?php echo $this->crud_model->get_instructor_wise_programs_ratings($instructor['id'], 'programs')->num_rows().' '.site_phrase('reviews'); ?></span>
                        |
                        <span class="text-dark fw-800 text-13px text-muted mx-1">
                            <?php $programs_ids = $this->crud_model->get_instructor_wise_programs($instructor['id'], 'simple_array');
                          $this->db->select('user_id');
                          $this->db->distinct();
                          $this->db->where_in('course_id', $programs_ids);
                          echo $this->db->get('enrol')->num_rows().' '.site_phrase('students'); ?>
                        </span>
                        |
                        <span class="text-dark fw-800 text-14px text-muted">
                            <?php echo $this->crud_model->get_instructor_wise_programs($instructor['id'])->num_rows().' '.site_phrase('consultancy_programs'); ?>
                        </span>
                   
                      </div>
                    </div>
                    <?php $skills = explode(',', $instructor['skills']); ?>
                    <?php foreach($skills as $skill): ?>
                      <span class="badge badge-sub-warning text-12px my-1 py-2"><?php echo $skill; ?></span>
                    <?php endforeach; ?>

                    
                    <div class="description ">
                      <?php echo ellipsis(strip_tags($instructor['biography']), 180); ?>
                    </div>
                </div>
              </div>
            <?php endforeach; ?>
          <?php else : ?>
            <div class="row justify-content-center">
                <div class="col-md-4 top-instructor-img w-sm-100">
                  <a href="<?php echo site_url('home/instructor_page/'.$instructor_details['id']); ?>">
                    <img src="<?php echo $this->user_model->get_user_image_url($instructor_details['id']); ?>" width="100%">
                  </a>
                </div>
                <div class="col-md-8 top-instructor-details text-center text-md-start">
                    <h4 class="mb-1 fw-600 v"><a class="text-decoration-none" href="<?php echo site_url('home/instructor_page/'.$instructor_details['id']); ?>"><?php echo $instructor_details['first_name'].' '.$instructor_details['last_name']; ?></a></h4>
                    <p class="fw-500 text-14px w-100"><?php echo $instructor_details['title']; ?></p>
                    <div class="rating">
                      <div class="d-inline-block">
                        <span class="text-dark fw-800 text-muted ms-1 text-13px"><?php echo $this->crud_model->get_instructor_wise_course_ratings($instructor_details['id'], 'course')->num_rows().' '.site_phrase('reviews'); ?></span>
                        |
                        <span class="text-dark fw-800 text-13px text-muted mx-1">
                            <?php $programs_ids = $this->crud_model->get_instructor_wise_courses($instructor_details['id'], 'simple_array');
                          $this->db->select('user_id');
                          $this->db->distinct();
                          $this->db->where_in('programs_id', $programs_ids);
                          echo $this->db->get('enrol')->num_rows().' '.site_phrase('students'); ?>
                        </span>
                        |
                        <span class="text-dark fw-800 text-14px text-muted">
                            <?php echo $this->crud_model->get_instructor_wise_programs($instructor_details['id'])->num_rows().' '.site_phrase('programs'); ?>
                        </span>
                          |
                        <span class="text-dark fw-800 text-14px text-muted">
                            <?php echo $this->crud_model->get_instructor_wise_courses($instructor_details['id'])->num_rows().' '.site_phrase('courses'); ?>
                        </span>
                      </div>
                    </div>
                    <?php $skills = explode(',', $instructor_details['skills']); ?>
                    <?php foreach($skills as $skill): ?>
                      <span class="badge badge-sub-warning text-12px my-1 py-2"><?php echo $skill; ?></span>
                    <?php endforeach; ?>

                    
                    <div class="description">
                      <?php echo ellipsis(strip_tags($instructor_details['biography']), 180); ?>
                    </div>
                </div>
            </div>
          <?php endif; ?>
        </div>
        <div class="compare-box view-more-parent">
          <div class="view-more" onclick="viewMore(this)">+ <?php echo site_phrase('view_more'); ?></div>
          <div class="compare-title"><?php echo site_phrase('other_related_Programs'); ?></div>
          <div class="compare-courses-wrap">
            <?php
            $this->db->limit(5);
            $other_realted_courses = $this->crud_model->get_programs($course_details['category_id'], $course_details['sub_category_id'])->result_array();
            foreach ($other_realted_courses as $other_realted_course) :
              if ($other_realted_course['id'] != $course_details['id'] && $other_realted_course['status'] == 'active') : ?>
                <div class="course-comparism-item-container this-course">
                  <div class="course-comparism-item clearfix">
                    <div class="item-image float-start  mt-4 mt-md-0">
                      <a href="<?php echo site_url('home/programs_page/' . slugify($other_realted_course['title']) . '/' . $other_realted_course['id']); ?>"><img src="<?php $this->crud_model->get_course_thumbnail_url($other_realted_course['id']); ?>" alt="" class="img-fluid"></a>
                      <div class="item-duration"><b><?php echo $this->crud_model->get_total_duration_of_lesson_by_programs_id($other_realted_course['id']); ?></b></div>
                    </div>
                    <div class="item-title float-start">
                      <div class="title"><a href="<?php echo site_url('home/programs_page/' . slugify($other_realted_course['title']) . '/' . $other_realted_course['id']); ?>"><?php echo $other_realted_course['title']; ?></a></div>
                      <?php if ($other_realted_course['last_modified'] > 0) : ?>
                        <div class="updated-time"><?php echo site_phrase('updated') . ' ' . date('D, d-M-Y', $other_realted_course['last_modified']); ?></div>
                      <?php else : ?>
                        <div class="updated-time"><?php echo site_phrase('updated') . ' ' . date('D, d-M-Y', $other_realted_course['date_added']); ?></div>
                      <?php endif; ?>
                    </div>
                    <div class="item-details float-start">
                      <span class="item-rating">
                        <i class="fas fa-star"></i>
                        <?php
                        $total_rating =  $this->crud_model->get_ratings('programs', $other_realted_course['id'], true)->row()->rating;
                        $number_of_ratings = $this->crud_model->get_ratings('programs', $other_realted_course['id'])->num_rows();
                        if ($number_of_ratings > 0) {
                          $average_ceil_rating = ceil($total_rating / $number_of_ratings);
                        } else {
                          $average_ceil_rating = 0;
                        }
                        ?>
                        <span class="d-inline-block average-rating"><?php echo $average_ceil_rating; ?></span>
                      </span>
                      <span class="enrolled-student">
                        <i class="far fa-user"></i>
                        <?php echo $this->crud_model->enrol_history_p($other_realted_course['id'])->num_rows(); ?>
                      </span>
                      <?php if ($other_realted_course['is_free_course'] == 1) : ?>
                        <span class="item-price mt-4 mt-md-0">
                          <span class="current-price"><?php echo site_phrase('free'); ?></span>
                        </span>
                      <?php else : ?>
                        <?php if ($other_realted_course['discount_flag'] == 1) : ?>
                          <span class="item-price mt-4 mt-md-0">
                            <span class="original-price"><?php echo currency($other_realted_course['price']); ?></span>
                            <span class="current-price"><?php echo currency($other_realted_course['discounted_price']); ?></span>
                          </span>
                        <?php else : ?>
                          <span class="item-price mt-4 mt-md-0">
                            <span class="current-price"><?php echo currency($other_realted_course['price']); ?></span>
                          </span>
                        <?php endif; ?>
                      <?php endif; ?>
                    </div>
                  </div>
                </div>
              <?php endif; ?>
            <?php endforeach; ?>
          </div>
        </div>
        <div class="student-feedback-box mt-5 pb-3">
          <div class="student-feedback-title">
            <?php echo site_phrase('student_feedback'); ?>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="average-rating ms-auto me-auto float-md-start mb-sm-4">
                <div class="num">
                  <?php
                  $total_rating =  $this->crud_model->get_ratings('programs', $course_details['id'], true)->row()->rating;
                  $number_of_ratings = $this->crud_model->get_ratings('programs', $course_details['id'])->num_rows();
                  if ($number_of_ratings > 0) {
                    $average_ceil_rating = ceil($total_rating / $number_of_ratings);
                  } else {
                    $average_ceil_rating = 0;
                  }
                  echo $average_ceil_rating;
                  ?>
                </div>
                <div class="rating">
                  <?php for ($i = 1; $i < 6; $i++) : ?>
                    <?php if ($i <= $average_ceil_rating) : ?>
                      <i class="fas fa-star filled" style="color: #f5c85b;"></i>
                    <?php else : ?>
                      <i class="fas fa-star" style="color: #abb0bb;"></i>
                    <?php endif; ?>
                  <?php endfor; ?>
                </div>
                <div class="title text-15px fw-700"><?php echo $number_of_ratings; ?> <?php echo site_phrase('reviews'); ?></div>
              </div>
              <div class="individual-rating">
                <ul>
                  <?php for ($i = 1; $i <= 5; $i++) : ?>
                    <li>
                      <div>
                        <span class="rating">
                          <?php for ($j = 1; $j <= (5 - $i); $j++) : ?>
                            <i class="fas fa-star"></i>
                          <?php endfor; ?>
                          <?php for ($j = 1; $j <= $i; $j++) : ?>
                            <i class="fas fa-star filled"></i>
                          <?php endfor; ?>

                        </span>
                      </div>
                      <div class="progress ms-2 mt-1">
                        <div class="progress-bar" style="width: <?php echo $this->crud_model->get_percentage_of_specific_rating($i, 'programs', $programs_id); ?>%"></div>
                      </div>
                      <span class="d-inline-block ps-2 text-15px fw-500">
                        (<?php echo $this->db->get_where('rating', array('ratable_type' => 'programs', 'ratable_id' => $programs_id, 'rating' => $i))->num_rows(); ?>)
                      </span>
                    </li>
                  <?php endfor; ?>
                </ul>
              </div>
            </div>
          </div>

          <div class="reviews mt-5">
            <h3><?php echo site_phrase('reviews'); ?></h3>
            <ul>
              <?php
              $ratings = $this->crud_model->get_ratings('programs', $programs_id)->result_array();
              foreach ($ratings as $rating) :
              ?>
                <li>
                  <div class="row">
                    <div class="col-auto">
                      <div class="reviewer-details clearfix">
                        <div class="reviewer-img">
                          <img src="<?php echo $this->user_model->get_user_image_url($rating['user_id']); ?>" alt="">
                        </div>
                      </div>
                    </div>
                    <div class="col-auto">
                      <div class="review-time">
                        <div class="reviewer-name fw-500">
                          <?php
                          $user_details = $this->user_model->get_user($rating['user_id'])->row_array();
                          echo $user_details['first_name'] . ' ' . $user_details['last_name'];
                          ?>
                        </div>
                        <!-- <div class="time text-11px text-muted">
                          <?php echo date('d/m/Y', $rating['date_added']); ?>
                        </div> -->
                      </div>
                      <div class="review-details">
                        <div class="rating">
                          <?php
                          for ($i = 1; $i < 6; $i++) : ?>
                            <?php if ($i <= $rating['rating']) : ?>
                              <i class="fas fa-star filled" style="color: #f5c85b;"></i>
                            <?php else : ?>
                              <i class="fas fa-star" style="color: #abb0bb;"></i>
                            <?php endif; ?>
                          <?php endfor; ?>
                        </div>
                        <div class="review-text text-13px">
                          <?php echo $rating['review']; ?>
                        </div>
                      </div>
                    </div>
                  </div>
                </li>
              <?php endforeach; ?>
            </ul>
          </div>
          
          
        </div>
        
        
        <!--<div class="shadow-lg p-3 mb-5 bg-white rounded text-center " role="button">Report Abuse</div>-->
      </div>
    </div>
  </div>
</section>

<!-- Modal -->
<?php if ($course_details['video_url'] != "") :
  $provider = "";
  $video_details = array();
  if ($course_details['course_overview_provider'] == "html5") {
    $provider = 'html5';
  } else {
    $video_details = $this->video_model->getVideoDetails($course_details['video_url']);
    $provider = $video_details['provider'];
  }
?>
  <div class="modal fade" id="CoursePreviewModal" data-bs-backdrop="static" tabindex="-1" role="dialog" aria-hidden="true" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content course-preview-modal">
        <div class="modal-header">
          <h5 class="modal-title"><span><?php echo site_phrase('course_preview') ?>:</span><?php echo $course_details['title']; ?></h5>
          <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>

          <!-- <button type="button" class="close" data-bs-dismiss="modal" onclick="pausePreview()">
            <span aria-hidden="true">&times;</span>
          </button> -->
        </div>
        <div class="modal-body">
          <div class="course-preview-video-wrap">
            <div class="embed-responsive embed-responsive-16by9">
              <?php if (strtolower(strtolower($provider)) == 'youtube') : ?>
                <!------------- PLYR.IO ------------>
                <link rel="stylesheet" href="<?php echo base_url(); ?>assets/global/plyr/plyr.css">

                <div class="plyr__video-embed" id="player">
                  <iframe id="sample_video" height="500" src="<?php echo $course_details['video_url']; ?>?origin=https://plyr.io&amp;iv_load_policy=3&amp;modestbranding=1&amp;playsinline=1&amp;showinfo=0&amp;rel=0&amp;enablejsapi=1" allowfullscreen allowtransparency allow="autoplay"></iframe>
                </div>

                
                <script src="<?php echo base_url(); ?>assets/global/plyr/plyr.js"></script>
                <script>
                  const player = new Plyr('#player');
                </script>
                <!------------- PLYR.IO ------------>
              <?php elseif (strtolower($provider) == 'vimeo') : ?>
                <!------------- PLYR.IO ------------>
                <link rel="stylesheet" href="<?php echo base_url(); ?>assets/global/plyr/plyr.css">
                <div class="plyr__video-embed" id="player">
                  <iframe id="sample_video" height="500" src="https://player.vimeo.com/video/<?php echo $video_details['video_id']; ?>?loop=false&amp;byline=false&amp;portrait=false&amp;title=false&amp;speed=true&amp;transparent=0&amp;gesture=media" allowfullscreen allowtransparency allow="autoplay"></iframe>
                </div>

                <script src="<?php echo base_url(); ?>assets/global/plyr/plyr.js"></script>
                <script>
                  const player = new Plyr('#player');
                </script>
                <!------------- PLYR.IO ------------>
              <?php else : ?>
                <!------------- PLYR.IO ------------>
                <link rel="stylesheet" href="<?php echo base_url(); ?>assets/global/plyr/plyr.css">
                <video poster="<?php echo $this->crud_model->get_course_thumbnail_url($course_details['id']); ?>" id="player" playsinline controls>
                  <?php if (get_video_extension($course_details['video_url']) == 'mp4') : ?>
                    <source  src="<?php echo $course_details['video_url']; ?>" type="video/mp4">
                  <?php elseif (get_video_extension($course_details['video_url']) == 'webm') : ?>
                    <source  src="<?php echo $course_details['video_url']; ?>" type="video/webm">
                  <?php else : ?>
                    <h4><?php site_phrase('video_url_is_not_supported'); ?></h4>
                  <?php endif; ?>
                </video>

                <style media="screen">
                  .plyr__video-wrapper {
                    height: 450px;
                  }
                </style>

                <script src="<?php echo base_url(); ?>assets/global/plyr/plyr.js"></script>
                <script>
                  const player = new Plyr('#player');
                </script>
                <!------------- PLYR.IO ------------>
              <?php endif; ?>
            </div>

            <div class="sample-videos">
                    <h6 class="sample-video-heading">Sample Videos:</h6>  
                   
                    <?php 
                      $sample_videos = $this->crud_model->get_sample_videos_by_programs_id($course_details['id'])->result_array();
                      
                      foreach ($sample_videos  as $key => $sample_video) { ?>
                        <button class="d-flex btn sample-video-outer-box">
                        <div class="sample-video-box">
                             <img alt="" width="60"  class="sample-video-img" src="<?php echo base_url() . $sample_video['img'] ; ?>" >
                           </div>
                           <div hidden class="sample-video-url"><?php echo base_url() . $sample_video['url'] ; ?></div>
                           <div class="sample-video-title"><?php echo $sample_video['title'] ?></div>
                         </button>
                   <?php  }
                   ?>
                </div>
          </div>
        </div>
      </div>
    </div>
  </div>
<?php endif; ?>
<!-- Modal -->

<!-- Report Modal --->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Report</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
     <form action="<?php echo site_url('home/report'); ?>" method="post" id="report-form">
          <div class="modal-body">
             <div class="form-group">
                <label for="user_id"><?php if($this->session->userdata('is_instructor')) echo 'students'; else echo 'teachers'; ?></label>
                
                <?php 
                
                 $conn = mysqli_connect('localhost','edutrainia_stagging','edutrainia_stagging','edutrainia_stagging');
                 $courssql = "SELECT * FROM `programs` WHERE id = $programs_id";
                 $course = $conn->query($courssql);
               
                 $user_ids = "";
                 foreach($course as $cours){
                   $user_ids = $cours['user_id'];
                 }
                 $sql = "SELECT * FROM `users` WHERE id IN (".$user_ids.")";
                 $users = $conn->query($sql);
                
                ?>
                
                
                <select class="form-control user_id"  name="user_id" id="user_id" required>
                   <option disabled>Select</option>
                  
                    <?php 
                        // $users =[];
                        // if($this->session->userdata('is_instructor')){
                        //     $users = $this->user_model->get_instructors_by_programs_id($course_detail['id']);
                        // }
                        // else{
                        //     $users = $this->user_model->get_students_by_programs_id($course_detail['id']);
                        // }
                        
                        // if(!empty($users))
                        // {
                            foreach($users as $user){  ?>
                                
                                <option value="<?php echo $user['id']  ?>"><?php echo $user['first_name'] ?></option>
                        <?php    }
                        // }
                   ?>
                </select>
            </div>
            <div class="form-group">
                <label>Reason</label>
                <input name="course_id" type="hidden" value="<?php echo $course_details['id'] ?>">
                <textarea class="form-control reason" rows="5" name="reason"></textarea>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary btn-report">Submit</button>
          </div>
    </form>
    </div>
  </div>
</div>

<!--End  Report Modal --->


<style media="screen">
  .embed-responsive-16by9::before {
    padding-top: 0px;
  }
</style>
<script type="text/javascript">
  function handleCartItems(elem) {
    url1 = '<?php echo site_url('home/handleCartItems'); ?>';
    url2 = '<?php echo site_url('home/refreshWishList'); ?>';
    $.ajax({
      url: url1,
      type: 'POST',
      data: {
        course_id: elem.id
      },
      success: function(response) {
        $('#cart_items').html(response);
        if ($(elem).hasClass('addedToCart')) {
          $(elem).removeClass('addedToCart')
          $(elem).text("<?php echo site_phrase('add_to_cart'); ?>");
        } else {
          $(elem).addClass('addedToCart')
          $(elem).text("<?php echo site_phrase('added_to_cart'); ?>");
        }
        $.ajax({
          url: url2,
          type: 'POST',
          success: function(response) {
            $('#wishlist_items').html(response);
          }
        });
      }
    });
  }

  function handleEnrolledButton() {
    $.ajax({
      url: '<?php echo site_url('home/isLoggedIn?url_history='.base64_encode(current_url())); ?>',
      success: function(response) {
        if (!response) {
          window.location.replace("<?php echo site_url('login'); ?>");
        }
      }
    });
  }

  function handleAddToWishlist(elem) {
      
    $.ajax({
      url: '<?php echo site_url('home/isLoggedIn?url_history='.base64_encode(current_url())); ?>',
      success: function(response) {
        if (!response) {
          window.location.replace("<?php echo site_url('login'); ?>");
        }else{
          $.ajax({
            url: '<?php echo site_url('home/handleWishList'); ?>',
            type: 'POST',
            data: {
              course_id: elem.id
            },
            success: function(response) {
              if ($(elem).hasClass('active')) {
                $(elem).removeClass('active');
                $(elem).text("<?php echo site_phrase('add_to_wishlist'); ?>");
              } else {
                $(elem).addClass('active');
                $(elem).text("<?php echo site_phrase('added_to_wishlist'); ?>");
              }
              $('#wishlist_items').html(response);
            }
          });
        }
      }
    });
  }

  function pausePreview() {
    player.pause();
  }

  $('.course-compare').click(function(e) {
    e.preventDefault()
    var redirect_to = $(this).attr('redirect_to');
    window.location.replace(redirect_to);
  });

  function go_course_playing_page(course_id, lesson_id){
    var course_playing_url = "<?php echo site_url('home/lesson_p/'.slugify($course_details['title'])); ?>/"+programs_id+'/'+lesson_id;

    $.ajax({
      url: '<?php echo site_url('home/go_programs_playing_page/'); ?>'+programs_id,
      type: 'POST',
      success: function(response) {
        if(response == 1){
          window.location.replace(course_playing_url);
        }
      }
    });
  }

  $(document).ready(function(){
    $(document).on('click', '.sample-video-outer-box', function(){
      var src= $(this).find('.sample-video-url').text();
      <?php if (strtolower(strtolower($provider)) == 'youtube') { ?>
      var video_url = "<?php echo base_url() ?>"+ "/"+src +"?origin=https://plyr.io&amp;iv_load_policy=3&amp;modestbranding=1&amp;playsinline=1&amp;showinfo=0&amp;rel=0&amp;enablejsapi=1";
      $('#sample_video').attr('src' , video_url);
      <?php } elseif  (strtolower($provider) == 'vimeo') {?>
      var video_url = "https://player.vimeo.com/video/"+ src +"?loop=false&amp;byline=false&amp;portrait=false&amp;title=false&amp;speed=true&amp;transparent=0&amp;gesture=media";
      $('#sample_video').attr('src' , video_url);
      <?php } else {?>
        var video_url = "<?php echo base_url() ?>"+ "/"+ src;
        console.log($(this).find('.sample-video-box').find('.sample-video-img').attr('src'));
       
     
      
        $('#player').siblings('.plyr__poster').attr('style' , 'background-image: url("'+$(this).find('.sample-video-box').find('.sample-video-img').attr('src')+'")');

     
        $('#player').html(' <source  src="'+src+'">');
      <?php }?>
      
    })
    
    $(document).on('click', '.btn-report', function(){
        
        
        var form = $('#report-form') 
        $.ajax({
            url: form.attr('action'),
            type: 'post',
            
            data: form.serialize(),
            success: function(data){
                
                if(data == 0 ){
                    toastr.error('You Alreafy reported');
                    $('textarea[name="reason"]').val('')
                    $('#exampleModal').modal('hide')
                }
                else{
                    toastr.success('Reported Successfully');
                    $('report-count').text(data.report_count);
                    $('textarea[name="reason"]').val('')
                    $('#exampleModal').modal('hide')
                }
            }
            // error: function(err) {
               
            //     //  var data = JSON.parse(err);
            //     toastr.error('You Alreafy reported');
            //     $('textarea[name="reason"]').val('')
            //     $('#exampleModal').modal('hide')
            // } 
        })
    })
  })
</script>