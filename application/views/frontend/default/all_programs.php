<?php
isset($layout) ? "" : $layout = "list";
isset($selected_category_id) ? "" : $selected_category_id = "all";
isset($selected_level) ? "" : $selected_level = "all";
isset($selected_language) ? "" : $selected_language = "all";
isset($selected_rating) ? "" : $selected_rating = "all";
isset($selected_price) ? "" : $selected_price = "all";
isset($selected_course) ? "" : $selected_course = "course";
// echo $selected_category_id.'-'.$selected_level.'-'.$selected_language.'-'.$selected_rating.'-'.$selected_price;
$number_of_visible_categories = 10;
if (isset($sub_category_id)) {
    $sub_category_details = $this->crud_model->get_category_details_by_id($sub_category_id)->row_array();
    $category_details     = $this->crud_model->get_categories($sub_category_details['parent'])->row_array();
    $category_name        = $category_details['name'];
    $sub_category_name    = $sub_category_details['name'];
}
?>

<section class="category-header-area" style="background-image: url('<?php echo base_url('uploads/system/course_page_banner.png'); ?>');">
    <div class="image-placeholder-1"></div>
    <div class="container-lg breadcrumb-container">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item display-6 fw-bold">
                <a href="<?php echo site_url('home/courses'); ?>">
                    <?php echo site_phrase('all_courses'); ?>
                </a>
            </li>
            <li class="breadcrumb-item active text-light display-6 fw-bold">
                <?php
                if ($selected_category_id == "all") {
                    echo site_phrase('all_category');
                } else {
                    $category_details = $this->crud_model->get_category_details_by_id($selected_category_id)->row_array();
                    echo $category_details['name'];
                }
                ?>
            </li>
          </ol>
        </nav>
    </div>
</section>

<div class="container-fluid py-5">
    <div class="container details">
            <h2>Business Courses</h2>
            
            <div class="category-item">
                <ul class="ul-ui nav nav-tabs">
                
    
                    <li><a class="nav-link active" id="nav-new-tab" href="#nav-new" data-bs-toggle="tab" role="tab" aria-controls="nav-new" aria-selected="false">New</a></li>
                    <li><a class="nav-link" id="nav-popular-tab" href="#nav-popular" data-bs-toggle="tab" role="tab" aria-controls="nav-popular" aria-selected="false">Most Popular</a></li>
                   
                </ul>
                
            </div>
        </div>
    <div class="container border-padding mb-4">
        <section class="course-carousel-area">
            <div class="container-lg">
                <div class="row" style="align-items: stretch">
                    <div class="col">
                        
                        <!-- page loader -->
                        <div class="animated-loader"><div class="spinner-border text-secondary" role="status"></div></div>
                        
                        <div class="tab-content" id="nav-tabContent">
                           <div class="tab-pane fade show active" id="nav-new" role="tabpanel" aria-labelledby="nav-new-tab" style="width: 100%">
                              <div class="course-carousel shown-after-loading" style="display: none;">
                            <?php
                            $latest_courses = $this->crud_model->get_latest_10_course($category_details['id']);
                            foreach ($latest_courses as $latest_course) : ?>
                                <?php
                                    $lessons = $this->crud_model->get_lessons('course', $latest_course['category_id']);
                                    $course_duration = $this->crud_model->get_total_duration_of_lesson_by_course_id($latest_course['id']);
                                ?>
                                <div class="course-box-wrap">
                                    <a onclick="return check_action(this);" href="<?php echo site_url('home/course/' . rawurlencode(slugify($latest_course['title'])) . '/' . $latest_course['id']); ?>" class="has-popover">
                                        <div class="course-box">
                                            <div class="course-image course-img">
                                                <img src="<?php echo $this->crud_model->get_course_thumbnail_url($latest_course['id']); ?>" alt="" class="img-fluid">
                                            </div>
                                            <div class="course-details">
                                                <h5 class="title"><?php echo $latest_course['title']; ?></h5>
                                                <div class="rating">
                                                    <?php
                                                    $total_rating =  $this->crud_model->get_ratings('course', $latest_course['id'], true)->row()->rating;
                                                    $number_of_ratings = $this->crud_model->get_ratings('course', $latest_course['id'])->num_rows();
                                                    if ($number_of_ratings > 0) {
                                                        $average_ceil_rating = ceil($total_rating / $number_of_ratings);
                                                    } else {
                                                        $average_ceil_rating = 0;
                                                    }
        
                                                    for ($i = 1; $i < 6; $i++) : ?>
                                                        <?php if ($i <= $average_ceil_rating) : ?>
                                                            <i class="fas fa-star filled"></i>
                                                        <?php else : ?>
                                                            <i class="fas fa-star"></i>
                                                        <?php endif; ?>
                                                    <?php endfor; ?>
                                                    <div class="d-inline-block">
                                                        <span class="text-dark ms-1 text-15px">(<?php echo $average_ceil_rating; ?>)</span>
                                                        <span class="text-dark text-12px text-muted ms-2">(<?php echo $number_of_ratings.' '.site_phrase('reviews'); ?>)</span>
                                                    </div>
                                                </div>
                                                <div class="d-flex text-dark">
                                                    <div class="">
                                                        <i class="far fa-clock text-14px"></i>
                                                        <span class="text-muted text-12px"><?php echo $course_duration; ?></span>
                                                    </div>
                                                    <div class="ms-3">
                                                        <i class="far fa-list-alt text-14px"></i>
                                                        <span class="text-muted text-12px"><?php echo $lessons->num_rows().' '.site_phrase('lectures'); ?></span>
                                                    </div>
                                                </div>
        
                                                <div class="row mt-3">
                                                    <div class="col-6">
                                                        <span class="badge badge-sub-warning text-11px"><?php echo site_phrase($latest_course['level']); ?></span>
                                                    </div>
                                                    <div class="col-6 text-end">
                                                        <button class="brn-compare-sm" onclick="return check_action(this, '<?php echo site_url('home/compare?course-1=' . rawurlencode(slugify($latest_course['title'])) . '&&course-id-1=' . $latest_course['id']); ?>');"><i class="fas fa-balance-scale"></i> <?php echo site_phrase('compare'); ?></button>
                                                    </div>
                                                </div>
        
                                                <hr class="divider-1">
        
                                                <div class="d-block">
                                                    <div class="floating-user d-inline-block">
                                                        <?php if ($latest_course['multi_instructor']):
                                                            $instructor_details = $this->user_model->get_multi_instructor_details_with_csv($latest_course['user_id']);
                                                            $margin = 0;
                                                            foreach ($instructor_details as $key => $instructor_detail) { ?>
                                                                <img style="margin-left: <?php echo $margin; ?>px;" class="position-absolute" src="<?php echo $this->user_model->get_user_image_url($instructor_detail['id']); ?>" width="30px" data-bs-toggle="tooltip" data-bs-placement="top" title="<?php echo $instructor_detail['first_name'].' '.$instructor_detail['last_name']; ?>" onclick="return check_action(this,'<?php echo site_url('home/instructor_page/'.$instructor_detail['id']); ?>');">
                                                                <?php $margin = $margin+17; ?>
                                                            <?php } ?>
                                                        <?php else: ?>
                                                            <?php $user_details = $this->user_model->get_all_user($latest_course['user_id'])->row_array(); ?>
                                                            <img src="<?php echo $this->user_model->get_user_image_url($user_details['id']); ?>" width="30px" data-bs-toggle="tooltip" data-bs-placement="top" title="<?php echo $user_details['first_name'].' '.$user_details['last_name']; ?>"  onclick="return check_action(this,'<?php echo site_url('home/instructor_page/'.$user_details['id']); ?>');">
                                                        <?php endif; ?>
                                                    </div>
        
        
        
                                                    <?php if ($latest_course['is_free_course'] == 1) : ?>
                                                        <p class="price text-right d-inline-block float-end"><?php echo site_phrase('free'); ?></p>
                                                    <?php else : ?>
                                                        <?php if ($latest_course['discount_flag'] == 1) : ?>
                                                            <p class="price text-right d-inline-block float-end"><small><?php echo currency($latest_course['price']); ?></small><?php echo currency($latest_course['discounted_price']); ?></p>
                                                        <?php else : ?>
                                                            <p class="price text-right d-inline-block float-end"><?php echo currency($latest_course['price']); ?></p>
                                                        <?php endif; ?>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
        
                                    <div class="webui-popover-content">
                                        <div class="course-popover-content">
                                            <?php if ($latest_course['last_modified'] == "") : ?>
                                                <div class="last-updated fw-500"><?php echo site_phrase('last_updated') . ' ' . date('D, d-M-Y', $latest_course['date_added']); ?></div>
                                            <?php else : ?>
                                                <div class="last-updated"><?php echo site_phrase('last_updated') . ' ' . date('D, d-M-Y', $latest_course['last_modified']); ?></div>
                                            <?php endif; ?>
        
                                            <div class="course-title">
                                                <a class="text-decoration-none text-15px" href="<?php echo site_url('home/course/' . rawurlencode(slugify($latest_course['title'])) . '/' . $latest_course['id']); ?>"><?php echo $latest_course['title']; ?></a>
                                            </div>
                                            <div class="course-meta">
                                                <?php if ($latest_course['course_type'] == 'general') : ?>
                                                    <span class=""><i class="fas fa-play-circle"></i>
                                                        <?php echo $this->crud_model->get_lessons('course', $latest_course['id'])->num_rows() . ' ' . site_phrase('lessons'); ?>
                                                    </span>
                                                    <span class=""><i class="far fa-clock"></i>
                                                        <?php echo $course_duration; ?>
                                                    </span>
                                                <?php elseif ($latest_course['course_type'] == 'scorm') : ?>
                                                    <span class="badge bg-light"><?= site_phrase('scorm_course'); ?></span>
                                                <?php endif; ?>
                                                <span class=""><i class="fas fa-closed-captioning"></i><?php echo ucfirst($latest_course['language']); ?></span>
                                            </div>
                                            <div class="course-subtitle"><?php echo $latest_course['short_description']; ?></div>
                                            <div class="what-will-learn">
                                                <ul>
                                                    <?php
                                                    $outcomes = json_decode($latest_course['outcomes']);
                                                    foreach ($outcomes as $outcome) : ?>
                                                        <li><?php echo $outcome; ?></li>
                                                    <?php endforeach; ?>
                                                </ul>
                                            </div>
                                            <div class="popover-btns">
                                                <?php if (is_purchased($latest_course['id'])) : ?>
                                                    <div class="purchased">
                                                        <a href="<?php echo site_url('home/my_programs'); ?>"><?php echo site_phrase('already_purchased'); ?></a>
                                                    </div>
                                                <?php else : ?>
                                                    <?php if ($latest_course['is_free_course'] == 1) :
                                                        if ($this->session->userdata('user_login') != 1) {
                                                            $url = "#";
                                                        } else {
                                                            $url = site_url('home/get_enrolled_to_free_course/' . $latest_course['id']);
                                                        } ?>
                                                        <a href="<?php echo $url; ?>" class="btn green radius-10" onclick="handleEnrolledButton()"><?php echo site_phrase('get_enrolled'); ?></a>
                                                    <?php else : ?>
                                                        <button type="button" class="btn red add-to-cart-btn <?php if (in_array($latest_course['id'], $cart_items)) echo 'addedToCart'; ?> big-cart-button-<?php echo $latest_course['id']; ?>" id="<?php echo $latest_course['id']; ?>" onclick="handleCartItems(this)">
                                                            <?php
                                                            if (in_array($latest_course['id'], $cart_items))
                                                                echo site_phrase('added_to_cart');
                                                            else
                                                                echo site_phrase('add_to_cart');
                                                            ?>
                                                        </button>
                                                    <?php endif; ?>
                                                    <button type="button" class="wishlist-btn <?php if ($this->crud_model->is_added_to_wishlist($latest_course['id'])) echo 'active'; ?>" title="Add to wishlist" onclick="handleWishList(this)" id="<?php echo $latest_course['id']; ?>"><i class="fas fa-heart"></i></button>
                                                <?php endif; ?>
        
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                             
                     </div>
                           <!-- tab2 -->
                           <div class="tab-pane fade active" id="nav-popular" class="nav-popular" role="tabpanel" aria-labelledby="nav-popular-tab" style="width: 100%">
                              <div class="course-carousel shown-after-loading" style="display: none;">
                            <?php
                            // $conn = mysqli_connect('localhost', 'edutrainia_stagging', 'edutrainia_stagging', 'edutrainia_stagging');
                            // $category_id = $category_details['id'];
                            // $query = "SELECT course.* FROM course JOIN payment ON course.id = payment.course_id  WHERE category_id = ". $category_id;     
                            // $result = mysqli_query($conn, $query);
                            // $popular_courses = mysqli_fetch_all($result,MYSQLI_ASSOC);
                          
                            $popular_courses =  $this->crud_model->popular_courses($category_id);
                            if ($popular_courses) {
                               
                                foreach ($popular_courses as $latest_course) : ?>
                                    <?php
                                        $lessons = $this->crud_model->get_lessons('course', $latest_course['id']);
                                       
                                        $course_duration = $this->crud_model->get_total_duration_of_lesson_by_course_id($latest_course['id']);
                                        
                                        
                                    ?>
                                  
                                    <div class="course-box-wrap">
                                        <a onclick="return check_action(this);" href="<?php echo site_url('home/course/' . rawurlencode(slugify($latest_course['title'])) . '/' . $latest_course['id']); ?>" class="has-popover">
                                            <div class="course-box">
                                                <div class="course-image course-img">
                                                    <img src="<?php echo $this->crud_model->get_course_thumbnail_url($latest_course['id']); ?>" alt="" class="img-fluid">
                                                </div>
                                                <div class="course-details">
                                                    <h5 class="title"><?php echo $latest_course['title']; ?></h5>
                                                    <div class="rating">
                                                        <?php
                                                        $total_rating =  $this->crud_model->get_ratings('course', $latest_course['id'], true)->row()->rating;
                                                        $number_of_ratings = $this->crud_model->get_ratings('course', $latest_course['id'])->num_rows();
                                                        if ($number_of_ratings > 0) {
                                                            $average_ceil_rating = ceil($total_rating / $number_of_ratings);
                                                        } else {
                                                            $average_ceil_rating = 0;
                                                        }
                                                        
                                                        for ($i = 1; $i < 6; $i++) : ?>
                                                            <?php if ($i <= $average_ceil_rating) : ?>
                                                                <i class="fas fa-star filled"></i>
                                                            <?php else : ?>
                                                                <i class="fas fa-star"></i>
                                                            <?php endif; ?>
                                                        <?php endfor; ?>
                                                        <div class="d-inline-block">
                                                            <span class="text-dark ms-1 text-15px">(<?php echo $average_ceil_rating; ?>)</span>
                                                            <span class="text-dark text-12px text-muted ms-2">(<?php echo $number_of_ratings.' '.site_phrase('reviews'); ?>)</span>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="d-flex text-dark">
                                                        <div class="">
                                                            <i class="far fa-clock text-14px"></i>
                                                            <span class="text-muted text-12px"><?php echo $course_duration; ?></span>
                                                        </div>
                                                        <div class="ms-3">
                                                            <i class="far fa-list-alt text-14px"></i>
                                                            <span class="text-muted text-12px"><?php echo $lessons->num_rows().' '.site_phrase('lectures'); ?></span>
                                                        </div>
                                                    </div>
            
                                                    <div class="row mt-3">
                                                        <div class="col-6">
                                                            <span class="badge badge-sub-warning text-11px"><?php echo site_phrase($latest_course['level']); ?></span>
                                                        </div>
                                                        <div class="col-6 text-end">
                                                            <button class="brn-compare-sm" onclick="return check_action(this, '<?php echo site_url('home/compare?course-1=' . rawurlencode(slugify($latest_course['title'])) . '&&course-id-1=' . $latest_course['id']); ?>');"><i class="fas fa-balance-scale"></i> <?php echo site_phrase('compare'); ?></button>
                                                        </div>
                                                    </div>
            
                                                    <hr class="divider-1">
            
                                                    <div class="d-block">
                                                        <div class="floating-user d-inline-block">
                                                            <?php if ($latest_course['multi_instructor']):
                                                                $instructor_details = $this->user_model->get_multi_instructor_details_with_csv($latest_course['user_id']);
                                                                $margin = 0;
                                                                foreach ($instructor_details as $key => $instructor_detail) { ?>
                                                                    <img style="margin-left: <?php echo $margin; ?>px;" class="position-absolute" src="<?php echo $this->user_model->get_user_image_url($instructor_detail['id']); ?>" width="30px" data-bs-toggle="tooltip" data-bs-placement="top" title="<?php echo $instructor_detail['first_name'].' '.$instructor_detail['last_name']; ?>" onclick="return check_action(this,'<?php echo site_url('home/instructor_page/'.$instructor_detail['id']); ?>');">
                                                                    <?php $margin = $margin+17; ?>
                                                                <?php } ?>
                                                            <?php else: ?>
                                                                <?php $user_details = $this->user_model->get_all_user($latest_course['user_id'])->row_array(); ?>
                                                                <img src="<?php echo $this->user_model->get_user_image_url($user_details['id']); ?>" width="30px" data-bs-toggle="tooltip" data-bs-placement="top" title="<?php echo $user_details['first_name'].' '.$user_details['last_name']; ?>"  onclick="return check_action(this,'<?php echo site_url('home/instructor_page/'.$user_details['id']); ?>');">
                                                            <?php endif; ?>
                                                        </div>
            
            
            
                                                        <?php if ($latest_course['is_free_course'] == 1) : ?>
                                                            <p class="price text-right d-inline-block float-end"><?php echo site_phrase('free'); ?></p>
                                                        <?php else : ?>
                                                            <?php if ($latest_course['discount_flag'] == 1) : ?>
                                                                <p class="price text-right d-inline-block float-end"><small><?php echo currency($latest_course['price']); ?></small><?php echo currency($latest_course['discounted_price']); ?></p>
                                                            <?php else : ?>
                                                                <p class="price text-right d-inline-block float-end"><?php echo currency($latest_course['price']); ?></p>
                                                            <?php endif; ?>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
            
                                        <div class="webui-popover-content">
                                            <div class="course-popover-content">
                                                <?php if ($latest_course['last_modified'] == "") : ?>
                                                    <div class="last-updated fw-500"><?php echo site_phrase('last_updated') . ' ' . date('D, d-M-Y', $latest_course['date_added']); ?></div>
                                                <?php else : ?>
                                                    <div class="last-updated"><?php echo site_phrase('last_updated') . ' ' . date('D, d-M-Y', $latest_course['last_modified']); ?></div>
                                                <?php endif; ?>
            
                                                <div class="course-title">
                                                    <a class="text-decoration-none text-15px" href="<?php echo site_url('home/course/' . rawurlencode(slugify($latest_course['title'])) . '/' . $latest_course['id']); ?>"><?php echo $latest_course['title']; ?></a>
                                                </div>
                                                <div class="course-meta">
                                                    <?php if ($latest_course['course_type'] == 'general') : ?>
                                                        <span class=""><i class="fas fa-play-circle"></i>
                                                            <?php echo $this->crud_model->get_lessons('course', $latest_course['id'])->num_rows() . ' ' . site_phrase('lessons'); ?>
                                                        </span>
                                                        <span class=""><i class="far fa-clock"></i>
                                                            <?php echo $course_duration; ?>
                                                        </span>
                                                    <?php elseif ($latest_course['course_type'] == 'scorm') : ?>
                                                        <span class="badge bg-light"><?= site_phrase('scorm_course'); ?></span>
                                                    <?php endif; ?>
                                                    <span class=""><i class="fas fa-closed-captioning"></i><?php echo ucfirst($latest_course['language']); ?></span>
                                                </div>
                                                <div class="course-subtitle"><?php echo $latest_course['short_description']; ?></div>
                                                <div class="what-will-learn">
                                                    <ul>
                                                        <?php
                                                        $outcomes = json_decode($latest_course['outcomes']);
                                                        foreach ($outcomes as $outcome) : ?>
                                                            <li><?php echo $outcome; ?></li>
                                                        <?php endforeach; ?>
                                                    </ul>
                                                </div>
                                                <div class="popover-btns">
                                                    <?php if (is_purchased($latest_course['id'])) : ?>
                                                        <div class="purchased">
                                                            <a href="<?php echo site_url('home/my_programs'); ?>"><?php echo site_phrase('already_purchased'); ?></a>
                                                        </div>
                                                    <?php else : ?>
                                                        <?php if ($latest_course['is_free_course'] == 1) :
                                                            if ($this->session->userdata('user_login') != 1) {
                                                                $url = "#";
                                                            } else {
                                                                $url = site_url('home/get_enrolled_to_free_course/' . $latest_course['id']);
                                                            } ?>
                                                            <a href="<?php echo $url; ?>" class="btn green radius-10" onclick="handleEnrolledButton()"><?php echo site_phrase('get_enrolled'); ?></a>
                                                        <?php else : ?>
                                                            <button type="button" class="btn red add-to-cart-btn <?php if (in_array($latest_course['id'], $cart_items)) echo 'addedToCart'; ?> big-cart-button-<?php echo $latest_course['id']; ?>" id="<?php echo $latest_course['id']; ?>" onclick="handleCartItems(this)">
                                                                <?php
                                                                if (in_array($latest_course['id'], $cart_items))
                                                                    echo site_phrase('added_to_cart');
                                                                else
                                                                    echo site_phrase('add_to_cart');
                                                                ?>
                                                            </button>
                                                        <?php endif; ?>
                                                        <button type="button" class="wishlist-btn <?php if ($this->crud_model->is_added_to_wishlist($latest_course['id'])) echo 'active'; ?>" title="Add to wishlist" onclick="handleWishList(this)" id="<?php echo $latest_course['id']; ?>"><i class="fas fa-heart"></i></button>
                                                    <?php endif; ?>
            
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach;  } ?>
                           
                          
                                </div>
                        </div>
                        </div>
                </div>
            </div>
            </div>
        </section>
    </div>
</div>

</div>



<section class="category-course-list-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 filter-area">
                <div class="card border-0 radius-10 c-shadow">
                    <div id="collapseFilter" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                        <div class="card-body p-0">
                             <div class="filter_type px-4">
                                <div class="form-group">
                                    <h5 class="fw-700 mb-3"><?php echo site_phrase('types'); ?></h5>
                                    <ul>
                                        <li>
                                            <div class="">
                                                <input type="radio" id="types_all" name="types" class="types custom-radio" value="all" onclick="filter(this)" <?php if ($selected_course == 'all') echo 'checked'; ?>>
                                                <label for="types_all"><?php echo site_phrase('all'); ?></label>
                                            </div>
                                            <div class="">
                                                <input type="radio" id="types_courses" name="types" class="types custom-radio" value="courses" onclick="filter(this)" <?php if ($selected_course == 'courses') echo 'checked'; ?>>
                                                <label for="types_courses"><?php echo site_phrase('courses'); ?></label>
                                            </div>
                                            <div class="">
                                                <input type="radio" id="types_consultancy_programs" name="types" class="types custom-radio" value="consultancy_programs" onclick="filter(this)" <?php if ($selected_course == 'consultancy_programs') echo 'checked'; ?>>
                                                <label for="types_consultancy_programs"><?php echo site_phrase('consultancy_programs'); ?></label>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="filter_type px-4 pt-4">
                                <h5 class="fw-700 mb-4"><?php echo site_phrase('categories'); ?></h5>
                                <ul>
                                    <li class="">
                                        <div class="text-15px fw-700">
                                            <input type="radio" id="category_all" name="sub_category" class="categories custom-radio" value="all" onclick="filter(this)" <?php if ($selected_category_id == 'all') echo 'checked'; ?>>
                                            <label for="category_all"><?php echo site_phrase('all_category'); ?></label>
                                            <span class="float-end">(<?php echo $this->crud_model->get_active_course()->num_rows(); ?>)</span>
                                        </div>
                                    </li>
                                    <?php
                                    $counter = 1;
                                    $total_number_of_categories = $this->db->get('category')->num_rows();
                                    $categories = $this->crud_model->get_categories()->result_array();
                                    foreach ($categories as $category) : 
                                        if ($category['id'] == $category_details['id']) { ?>
                                      <li class="mt-3">
                                            <div class="text-15px fw-700 <?php if ($counter > $number_of_visible_categories) : ?> hidden-categories hidden <?php endif; ?>">
                                                <input type="radio" id="category-<?php echo $category['id']; ?>" name="sub_category" class="categories custom-radio" value="<?php echo $category['slug']; ?>" onclick="filter(this)" <?php if ($selected_category_id == $category['id']) echo 'checked'; ?>>
                                                <label for="category-<?php echo $category['id']; ?>"><?php echo $category['name']; ?></label>
                                                <span class="float-end">(<?php echo $this->crud_model->get_active_course_by_category_id($category['id'], 'category_id')->num_rows(); ?>)</span>
                                            </div>
                                        </li>
                                        <?php foreach ($this->crud_model->get_sub_categories($category['id']) as $sub_category) :
                                            $counter++; ?>
                                            <li class="ms-3">
                                                <div class="<?php if ($counter > $number_of_visible_categories) : ?> hidden-categories hidden <?php endif; ?>">
                                                    <input type="radio" id="sub_category-<?php echo $sub_category['id']; ?>" name="sub_category" class="categories custom-radio" value="<?php echo $sub_category['slug']; ?>" onclick="filter(this)" <?php if ($selected_category_id == $sub_category['id']) echo 'checked'; ?>>
                                                    <label for="sub_category-<?php echo $sub_category['id']; ?>"><?php echo $sub_category['name']; ?></label>
                                                    <span class="float-end">(<?php echo $this->crud_model->get_active_course_by_category_id($sub_category['id'], 'sub_category_id')->num_rows(); ?>)</span>
                                                </div>
                                            </li>
                                        <?php endforeach; ?>
                                       <?php }
                                    ?>

                       
                                    <?php endforeach; ?>
                                </ul>
                                <a hidden href="javascript:;" class="text-13px fw-500" id="city-toggle-btn" onclick="showToggle(this, 'hidden-categories')"><?php echo $total_number_of_categories > $number_of_visible_categories ? site_phrase('show_more') : ""; ?></a>
                            </div>
                            <hr>
                            <div class="filter_type px-4">
                                <div class="form-group">
                                    <h5 class="fw-700 mb-3"><?php echo site_phrase('price'); ?></h5>
                                    <ul>
                                        <li>
                                            <div class="">
                                                <input type="radio" id="price_all" name="price" class="prices custom-radio" value="all" onclick="filter(this)" <?php if ($selected_price == 'all') echo 'checked'; ?>>
                                                <label for="price_all"><?php echo site_phrase('all'); ?></label>
                                            </div>
                                            <div class="">
                                                <input type="radio" id="price_free" name="price" class="prices custom-radio" value="free" onclick="filter(this)" <?php if ($selected_price == 'free') echo 'checked'; ?>>
                                                <label for="price_free"><?php echo site_phrase('free'); ?></label>
                                            </div>
                                            <div class="">
                                                <input type="radio" id="price_paid" name="price" class="prices custom-radio" value="paid" onclick="filter(this)" <?php if ($selected_price == 'paid') echo 'checked'; ?>>
                                                <label for="price_paid"><?php echo site_phrase('paid'); ?></label>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <hr>
                            <div class="filter_type px-4">
                                <h5 class="fw-700 mb-3"><?php echo site_phrase('level_/_list'); ?></h5>
                                <ul>
                                    <li>
                                        <div class="">
                                            <input type="radio" id="all" name="level" class="level custom-radio" value="all" onclick="filter(this)" <?php if ($selected_level == 'all') echo 'checked'; ?>>
                                            <label for="all"><?php echo site_phrase('all'); ?></label>
                                        </div>
                                        <div class="">
                                            <input type="radio" id="beginner" name="level" class="level custom-radio" value="beginner" onclick="filter(this)" <?php if ($selected_level == 'beginner') echo 'checked'; ?>>
                                            <label for="beginner"><?php echo site_phrase('beginner'); ?></label>
                                        </div>
                                        <div class="">
                                            <input type="radio" id="advanced" name="level" class="level custom-radio" value="advanced" onclick="filter(this)" <?php if ($selected_level == 'advanced') echo 'checked'; ?>>
                                            <label for="advanced"><?php echo site_phrase('advanced'); ?></label>
                                        </div>
                                        <div class="">
                                            <input type="radio" id="intermediate" name="level" class="level custom-radio" value="intermediate" onclick="filter(this)" <?php if ($selected_level == 'intermediate') echo 'checked'; ?>>
                                            <label for="intermediate"><?php echo site_phrase('intermediate'); ?></label>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <hr>
                            <div class="filter_type px-4">
                                <h5 class="fw-700 mb-3"><?php echo site_phrase('language'); ?></h5>
                                <ul>
                                    <li>
                                        <div class="">
                                            <input type="radio" id="all_language" name="language" class="languages custom-radio" value="<?php echo 'all'; ?>" onclick="filter(this)" <?php if ($selected_language == "all") echo 'checked'; ?>>
                                            <label for="<?php echo 'all_language'; ?>"><?php echo site_phrase('all'); ?></label>
                                        </div>
                                    </li>
                                    <?php
                                    $languages = $this->crud_model->get_all_languages();
                                    foreach ($languages as $language) : ?>
                                        <li>
                                            <div class="">
                                                <input type="radio" id="language_<?php echo $language; ?>" name="language" class="languages custom-radio" value="<?php echo $language; ?>" onclick="filter(this)" <?php if ($selected_language == $language) echo 'checked'; ?>>
                                                <label for="language_<?php echo $language; ?>"><?php echo ucfirst($language); ?></label>
                                            </div>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                            <hr>
                            <div class="filter_type px-4">
                                <h5 class="fw-700 mb-3"><?php echo site_phrase('ratings'); ?></h5>
                                <ul>
                                    <li>
                                        <div class="">
                                            <input type="radio" id="all_rating" name="rating" class="ratings custom-radio" value="<?php echo 'all'; ?>" onclick="filter(this)" <?php if ($selected_rating == "all") echo 'checked'; ?>>
                                            <label for="all_rating"><?php echo site_phrase('all'); ?></label>
                                        </div>
                                    </li>
                                    <?php for ($i = 1; $i <= 5; $i++) : ?>
                                        <li>
                                            <div class="">
                                                <input type="radio" id="rating_<?php echo $i; ?>" name="rating" class="ratings custom-radio" value="<?php echo $i; ?>" onclick="filter(this)" <?php if ($selected_rating == $i) echo 'checked'; ?>>
                                                <label for="rating_<?php echo $i; ?>">
                                                    <?php for ($j = 1; $j <= $i; $j++) : ?>
                                                        <i class="fas fa-star" style="color: #f4c150;"></i>
                                                    <?php endfor; ?>
                                                    <?php for ($j = $i; $j < 5; $j++) : ?>
                                                        <i class="far fa-star" style="color: #dedfe0;"></i>
                                                    <?php endfor; ?>
                                                </label>
                                            </div>
                                        </li>
                                    <?php endfor; ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-9">
                <div class="row category-filter-box mx-0 c-shadow" >
                    <div class="col-md-6">
                        <button class="btn py-1 px-2 mx-2 <?php if($this->session->userdata('layout') == 'grid'){echo 'btn-danger';}else{echo 'btn-light'; } ?>" onclick="toggleLayout('grid')"><i class="fas fa-th-large"></i></button>
                        <button class="btn py-1 px-2 mx-2 <?php if($this->session->userdata('layout') == 'list'){echo 'btn-danger';}else{echo 'btn-light'; } ?>" onclick="toggleLayout('list')"><i class="fas fa-list"></i></button>
                        <span class="text-12px fw-700 text-muted"><?php echo site_phrase('showing').' '.count($courses).' '.site_phrase('of').' '.$total_result.' '.site_phrase('results'); ?></span>
                    </div>
                    <div class="col-md-6 text-end filter-sort-by">
                        <!-- <span><?php echo site_phrase('sort_by'); ?> : </span>
                        <div class="dropdown d-inline-block">
                            <button class="btn bg-background dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                Newest
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton1">
                                <li><a class="dropdown-item text-12px fw-500" href="#">Action</a></li>
                                <li><a class="dropdown-item text-12px fw-500" href="#">Another action</a></li>
                            </ul>
                        </div> -->
                    </div>
                </div>
                <div class="category-course-list">
                    <?php include 'category_wise_course_' . $layout . '_layout.php'; ?>
                    <?php if (count($courses) == 0) : ?>
                        <?php echo site_phrase('no_result_found'); ?>
                    <?php endif; ?>
                </div>
                <nav>
                    <?php if ($selected_category_id == "all" && $selected_price == 0 && $selected_level == 'all' && $selected_language == 'all' && $selected_rating == 'all') {
                        echo $this->pagination->create_links();
                    } ?>
                </nav>
                 <!-- <nav>
                    <?php if ($selected_category_id == "all" && $selected_price == 0 && $selected_level == 'all' && $selected_language == 'all' && $selected_rating == 'all') {
                        echo $this->pagination->create_links();
                    } ?>
                </nav> -->
                
                 <div class="category-course-list">
                    <?php include 'category_wise_programs_' . $layout . '_layout.php'; ?>
                    <?php if (count($programs) == 0) : ?>
                        <?php echo site_phrase('no_result_found'); ?>
                    <?php endif; ?>
                </div>
                <nav>
                    <?php if ($selected_category_id == "all" && $selected_price == 0 && $selected_level == 'all' && $selected_language == 'all' && $selected_rating == 'all') {
                        echo $this->pagination->create_links();
                    } ?>
                </nav>
                 <nav>
                    <?php if ($selected_category_id == "all" && $selected_price == 0 && $selected_level == 'all' && $selected_language == 'all' && $selected_rating == 'all') {
                        echo $this->pagination->create_links();
                    } ?>
                </nav>
                
            </div>
        </div>
    </div>
</section>


<script type="text/javascript">

// document.getElementById("nav-new-tab").onclick = function(event) {
// // alert('nav new');
//     // openTab(event, 'nav-new');
//     $(".nav-new").trigger("click");
// }

// document.getElementById("nav-popular-tab").onclick = function(event) {
// //   alert('nav popular');
//     $(".nav-popular").trigger("click");
// }

// $("#nav-popular-tab").slider({
//     range: false,
//   opacity: 1; width: 1578px; transform: translate3d(3px, 1px, 2px);
//     slide: function(event, ui) {
//         doSomething(ui.value);
//     }
// });
    function filter(param) {
        var url = get_url();
        window.location.replace(url);
        //console.log(url);
    }

    function toggleLayout(layout) {
        $.ajax({
            type: 'POST',
            url: '<?php echo site_url('home/set_layout_to_session'); ?>',
            data: {
                layout: layout
            },
            success: function(response) {
                location.reload();
            }
        });
    }
        function get_url() {
        var urlPrefix = '<?php echo site_url('home/courses?'); ?>'
        var urlSuffix = "";
        var slectedCategory = "";
        var selectedPrice = "";
        var selectedLevel = "";
        var selectedLanguage = "";
        var selectedRating = "";

        // Get selected category
        $('.categories:checked').each(function() {
            slectedCategory = $(this).attr('value');
        });

        // Get selected price
        $('.prices:checked').each(function() {
            selectedPrice = $(this).attr('value');
        });

        // Get selected difficulty Level
        $('.level:checked').each(function() {
            selectedLevel = $(this).attr('value');
        });

        // Get selected difficulty Level
        $('.languages:checked').each(function() {
            selectedLanguage = $(this).attr('value');
        });

        // Get selected rating
        $('.ratings:checked').each(function() {
            selectedRating = $(this).attr('value');
        });

        urlSuffix = "category=" + slectedCategory + "&&price=" + selectedPrice + "&&level=" + selectedLevel + "&&language=" + selectedLanguage + "&&rating=" + selectedRating;
        var url = urlPrefix + urlSuffix;
        return url;
    }

    

    function showToggle(elem, selector) {
        $('.' + selector).slideToggle(20);
        if ($(elem).text() === "<?php echo site_phrase('show_more'); ?>") {
            $(elem).text('<?php echo site_phrase('show_less'); ?>');
        } else {
            $(elem).text('<?php echo site_phrase('show_more'); ?>');
        }
    }
    $(document).ready(function(){
    

    $('.course-compare').click(function(e) {
        e.preventDefault()
        var redirect_to = $(this).attr('redirect_to');
        window.location.replace(redirect_to);
    });

    if (!/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
            if ($(window).width() >= 840) {
                $('a.has-popover').webuiPopover({
                    trigger: 'hover',
                    animation: 'pop',
                    placement: 'horizontal',
                    delay: {
                        show: 500,
                        hide: null
                    },
                    width: 330
                });
            } else {
                $('a.has-popover').webuiPopover({
                    trigger: 'hover',
                    animation: 'pop',
                    placement: 'vertical',
                    delay: {
                        show: 100,
                        hide: null
                    },
                    width: 335
                });
            }
        }
  
            $(".course-carousel").slick({
                dots: false,
                infinite: false,
                speed: 300,
                slidesToShow: 4,
                slidesToScroll: 4,
                swipe: false,
                touchMove: false,
                responsive: [
                    { breakpoint: 840, settings: { slidesToShow: 3, slidesToScroll: 3, }, },
                    { breakpoint: 620, settings: { slidesToShow: 2, slidesToScroll: 2, }, },
                    { breakpoint: 480, settings: { slidesToShow: 1, slidesToScroll: 1, }, },
                ],
            });
        
    })
  
</script>