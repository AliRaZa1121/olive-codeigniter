<style>
    .nav-link .active {
        color: red;
    }
</style>
<section class="home-banner-area" id="home-banner-area" style="background-image: url('<?= base_url("uploads/system/" . get_frontend_settings('banner_image')); ?>'); background-position: right; background-repeat: no-repeat; padding: 100px 0 75px; background-size: auto 100%; color: #fff;">
    <div class="cropped-home-banner"></div>
    <div class="container-xl">
        <div class="row">
            <div class="col position-relative">
                <div class="home-banner-wrap">
                    <h2 class="fw-bold"><?php echo site_phrase(get_frontend_settings('banner_title')); ?></h2>
                    <p><?php echo site_phrase(get_frontend_settings('banner_sub_title')); ?></p>
                </div>
            </div>
        </div>
    </div>
    <?php
    $banner_size = getimagesize("uploads/system/" . get_frontend_settings('banner_image'));
    $banner_ratio = $banner_size[0] / $banner_size[1];
    ?>
    <script type="text/javascript">
        var border_bottom = $('.home-banner-wrap').height() + 242;
        $('.cropped-home-banner').css('border-bottom', border_bottom + 'px solid #f1f7f8');

        mRight = Number("<?php echo $banner_ratio; ?>") * $('.home-banner-area').outerHeight();
        $('.cropped-home-banner').css('right', (mRight - 65) + 'px');
    </script>
</section>




<section class="home-fact-area">
    <div class="container-lg">
        <div class="row">
            <?php $courses = $this->crud_model->get_courses(); ?>
            <div class="col-md-4 d-flex">
                <div class="home-fact-box mr-md-auto mr-auto">
                    <i class="fas fa-bullseye float-start"></i>
                    <div class="text-box">
                        <h4><?php
                            $status_wise_courses = $this->crud_model->get_status_wise_courses();
                            $number_of_courses = $status_wise_courses['active']->num_rows();
                            echo $number_of_courses . ' ' . site_phrase('online_courses'); ?></h4>
                        <!--<p><?php echo site_phrase('explore_a_variety_of_fresh_topics'); ?></p>-->
                        <p><?php echo site_phrase('Courses_are_always_available_online'); ?></p>

                    </div>
                </div>
            </div>

            <div class="col-md-4 d-flex">
                <div class="home-fact-box mr-md-auto mr-auto">
                    <i class="fa fa-check float-start"></i>
                    <div class="text-box">
                        <!--<h4><?php echo site_phrase('expert_instruction'); ?></h4>-->
                        <h4><?php echo site_phrase('Secure_Payments'); ?></h4>

                        <!--<p><?php echo site_phrase('find_the_right_course_for_you'); ?></p>-->
                        <p><?php echo site_phrase('Encrypted_&_secure_trnasactions'); ?></p>

                    </div>
                </div>
            </div>

            <div class="col-md-4 d-flex">
                <div class="home-fact-box mr-md-auto mr-auto">
                    <i class="fa fa-clock float-start"></i>
                    <div class="text-box">
                        <!--<h4><?php echo site_phrase('lifetime_access'); ?></h4>-->
                        <h4><?php echo site_phrase('Different_Bundles'); ?></h4>

                        <!--<p><?php echo site_phrase('learn_on_your_schedule'); ?></p>-->
                        <p><?php echo site_phrase('Get_the_variety_of_access_durations'); ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>



<div class="container-fluid">





    <section class="mb-5">
        <div class="container-lg">
            <h3 class="course-carousel-title my-4"><?php echo site_phrase('top_categories'); ?></h3>
            <div class="row justify-content-center">

                <?php $top_10_categories = $this->crud_model->get_top_categories(12, 'sub_category_id'); ?>
                <?php foreach ($top_10_categories as $top_10_category) : ?>
                    <?php $category_details = $this->crud_model->get_category_details_by_id($top_10_category['sub_category_id'])->row_array(); ?>
                    <div class="col-md-6 col-lg-4 col-xl-3 mb-3">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="category-icon">
                                    <!--<i class="<?php echo $category_details['font_awesome_class']; ?>"></i>-->
                                    <img class="img-fluid" src="https://image.shutterstock.com/image-vector/modern-usb-typec-connector-icon-260nw-1388950349.jpg" alt="loko" />
                                </div>
                            </div>
                        </div>
                        <a href="<?php echo site_url('home/courses?category=' . $category_details['slug']); ?>" class="top-categories round-shadow">

                            <div class="category-title">
                                <?php echo $category_details['name']; ?>
                                <p><?php echo $top_10_category['course_number'] . ' ' . site_phrase('courses'); ?></p>
                            </div>
                        </a>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
    <!---->






    <script type="text/javascript">
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

        });
    </script>