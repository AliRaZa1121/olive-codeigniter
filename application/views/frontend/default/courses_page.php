<?php
isset($layout) ? "" : $layout = "list";
isset($selected_category_id) ? "" : $selected_category_id = "all";
isset($selected_level) ? "" : $selected_level = "all";
isset($selected_language) ? "" : $selected_language = "all";
isset($selected_rating) ? "" : $selected_rating = "all";
isset($selected_price) ? "" : $selected_price = "all";
isset($selected_type) ? "" : $selected_type = "all";
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

<style>
    section.org-first-fold,
    section.arc-first-fold {
        background-image: url(<?php echo base_url('uploads/olive-images/programs.jpg'); ?>);
        min-height: 475px !important;
    }
</style>
<section class="org-first-fold">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="content">
                    <h1 class="text-uppercase fw-bold clr-yellow d-none"><?php echo $page_title; ?></h1>
                    <!-- <h4 class="text-white">Lorem ipsum dolor Lorem ipsum</h4>
                    <p class="text-white mb-1">lorem ipsum</p>
                    <p class="text-white mb-1">Lorem ipsum dolor Lorem ipsum</p>
                    <p class="text-white mb-1">Lorem ipsum dolor sit amet, consectetur adipiscing elit</p> -->
                </div>
            </div>
        </div>
    </div>
</section>

<div class="container-fluid">
    <div class="container details">
        <h2 class="mt-5 mb-5">A broad section of professional programs</h2>
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

                        <div class="animated-loader">
                            <div class="spinner-border text-secondary" role="status"></div>
                        </div>

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
                                        <div class="">
                                        <a href="<?php echo site_url('home/program/' . rawurlencode(slugify($latest_course['title'])) . '/' . $latest_course['id']); ?>">
                                            <div class="program-box">
                                                <div class="program-box-image">
                                                    <img src="<?php echo $this->crud_model->get_course_thumbnail_url($latest_course['id']); ?>" alt="" class="img-fluid">
                                                </div>
                                                <div class="program-box-content">
                                                    <h5 class="program-title"><?php echo substr($latest_course['title'],0,45);  ?></h5>
                                                    <p class="program-discription"><?php echo substr($latest_course['short_description'],0,100); ?></p>
                                                    <a class="program-btn" href="<?php echo site_url('home/program/' . rawurlencode(slugify($latest_course['title'])) . '/' . $latest_course['id']); ?>">Read more</a>
                                                </div>
                                            </div>
                                        </a>
                                        </div>
                                    <?php endforeach; ?>

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
                                <h5 class="fw-700 mb-4"><?php echo site_phrase('categories'); ?></h5>
                                <ul>
                                    <li class="">
                                        <div class="text-15px fw-700">
                                            <input type="radio" id="category_all" name="sub_category" class="categories custom-radio" value="all" onclick="filter(this)" <?php if ($selected_category_id == 'all') echo 'checked'; ?>>
                                            <label for="category_all"><?php echo site_phrase('all_category'); ?></label>
                                            <span class="float-end">(<?php echo $this->crud_model->get_active_course()->num_rows(); ?>)</span>
                                        </div>
                                    </li>
                                    <!--<?php
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


                                    <?php endforeach; ?> -->


                                    <?php
                                    $counter = 1;
                                    $total_number_of_categories = $this->db->get('category')->num_rows();
                                    $categories = $this->crud_model->get_categories()->result_array();
                                    foreach ($categories as $category) :
                                        $programs_count =  $this->crud_model->get_active_course_by_category_id($category['id'], 'category_id')->num_rows();
                                        if ($programs_count > 0) { ?>
                                            <li class="mt-3">
                                                <div class="text-15px fw-700 <?php if ($counter > $number_of_visible_categories) : ?> hidden-categories hidden <?php endif; ?>">
                                                    <input type="radio" id="category-<?php echo $category['id']; ?>" name="sub_category" class="categories custom-radio" value="<?php echo $category['slug']; ?>" onclick="filter(this)" <?php if ($selected_category_id == $category['id']) echo 'checked'; ?>>
                                                    <label for="category-<?php echo $category['id']; ?>"><?php echo $category['name']; ?></label>
                                                    <span class="float-end">(<?php echo $programs_count ?>)</span>
                                                </div>
                                            </li>
                                        <?php } ?>
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

                            <!--  <div class="filter_type px-4">
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
                            </div>-->
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-9">
                <div class="row category-filter-box mx-0 c-shadow">
                    <div class="col-md-6">
                        <span class="text-12px fw-700 text-muted"><?php echo site_phrase('showing') . ' ' . count($courses) . ' ' . site_phrase('of') . ' ' . $total_result . ' ' . site_phrase('results'); ?></span>
                    </div>
                    <div class="col-md-6 text-end filter-sort-by">
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
        var urlPrefix = '<?php echo site_url('home/all_programs?'); ?>'
        var urlSuffix = "";
        var slectedCategory = "";
        var selectedPrice = "";
        var selectedType = "";
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
        // Get selected price
        $('.type:checked').each(function() {
            selectedType = $(this).attr('value');
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

        urlSuffix = "type=" + selectedType + "&&category=" + slectedCategory + "&&price=" + selectedPrice + "&&level=" + selectedLevel + "&&language=" + selectedLanguage + "&&rating=" + selectedRating;
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
    $(document).ready(function() {


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
            responsive: [{
                    breakpoint: 840,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 3,
                    },
                },
                {
                    breakpoint: 620,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 2,
                    },
                },
                {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1,
                    },
                },
            ],
        });

    })
</script>