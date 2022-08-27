 <section class="home-banner-area">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-lg-12 gx-0">
                <div class="banner-img">
                    <img class="img-fluid" src="<?= base_url("uploads/system/" . get_frontend_settings('banner_image')); ?>" alt="">
                </div>
                <!--<div class="fold-content">
                    <h1 class="text-uppercase fw-bold clr-black"><?php echo site_phrase(get_frontend_settings('banner_title')); ?></h1>
                    <h4><?php echo site_phrase(get_frontend_settings('banner_sub_title')); ?></h4>
                    <p><?php echo site_phrase(get_frontend_settings('banner_sub_title')); ?></p>

                </div>-->
            </div>
            <!--<div class="col-lg-6">
                <div class="fold-thumbnail">
                    <img class="img-fluid" src="<?= base_url("uploads/system/" . get_frontend_settings('banner_image')); ?>" alt="">
                </div>
            </div>-->
        </div>
    </div>
</section>
<!--<section class="home-banner-area" id="home-banner-area" style="background-image: url('<?= base_url("uploads/system/" . get_frontend_settings('banner_image')); ?>'); background-position: right; background-repeat: no-repeat; padding: 100px 0 75px; background-size: auto 100%; color: #fff;">
    <div class="cropped-home-banner" ></div>
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
        $('.cropped-home-banner').css('right', (mRight-65) + 'px');
    </script>
</section>-->
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
                            echo $number_of_courses . ' ' . site_phrase('professional_programs'); ?></h4>
                        <!--<p><?php echo site_phrase('explore_a_variety_of_fresh_topics'); ?></p>-->
                        <p><?php echo site_phrase('Programs_are_always_available_online'); ?></p>

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
<section class="second-fold">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
            <?php $section_2 = $this->crud_model->get_content_settings('home', 'section-2'); ?>
                <div class="fold-title text-center mb-5">
                    <h4><?php echo $section_2['title']; ?></h4>
                    <h2 class="text-uppercase fw-bold clr-orange"><?php echo $section_2['sub_title']; ?></h2>
                </div>
                <div class="fold-content">
                    <p class="text-center mb-5"><?php echo $section_2['description_1']; ?></p>
                    <p class="text-center mb-0"><?php echo $section_2['description_2']; ?></p>
                    <div class="text-center mt-5">
                        <a href="<?php echo $section_2['button_link']; ?>" class="site-btn btn-lg"><?php echo $section_2['button_text']; ?><i class=" fas fa-solid fa-arrow-right"></i></a>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>
<section class="third-fold">
    <div class="container">
        <div class="row align-items-center">
        <?php $section_3 = $this->crud_model->get_content_settings('home', 'section-3'); ?>
            <div class="col-lg-4">
                <div class="fold-thumbnail">
                    <img src="<?php echo base_url('uploads/system/' . $section_3['image']); ?>" alt="">
                </div>
            </div>
            <div class="col-lg-8">
                <div class="fold-content">
                    <h2 class="text-uppercase fw-bold clr-black"><?php echo $section_3['title']; ?></h2>
                    <h4><?php echo $section_3['sub_title']; ?></h4>
                    <p><?php echo $section_3['description_1']; ?></p>
                </div>
            </div>
        </div>


        <div class="row mt-5 mb-5">
            <div class="col-lg-12">
            <?php $section_4 = $this->crud_model->get_content_settings('home', 'section-4'); ?>
                <div class="fold-border-heading">
                    <h4><?php echo $section_4['title']; ?></h4>
                </div>
            </div>
        </div>
        <div class="row">
         <?php $sub_sections = $this->crud_model->get_sub_content_settings_array(); ?>
		<?php foreach ($sub_sections as $key => $sub_section) : ?>   
		<?php if ($key  < 4) : ?> 
            <div class="col-lg-3 col-md-6">
                <div class="fold-info-box">
                    <div class="icon">
                        <img src="<?php echo base_url('uploads/system/' . $sub_section['sub_section_image']); ?>" alt="">
                    </div>
                    <div class="content">
                    <h2><?php echo $sub_section['sub_section_title']; ?></h2>
                    <p><?php echo $sub_section['sub_section_sub_title']; ?></p>
                    </div>
                </div>
            </div>
            <?php endif; ?>
			<?php endforeach; ?>
            <!-- <div class="col-lg-3 col-md-6">
                <div class="fold-info-box">
                    <div class="icon">
                        <img src="<?= base_url("uploads/olive-images/fold-icon2.png") ?>" alt="">
                    </div>
                    <div class="content">
                        <h2>200+</h2>
                        <p>New Market Launches</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="fold-info-box">
                    <div class="icon">
                        <img src="<?= base_url("uploads/olive-images/fold-icon3.png") ?>" alt="">
                    </div>
                    <div class="content">
                        <h2>110+</h2>
                        <p>Mergers / Integration</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="fold-info-box">
                    <div class="icon">
                        <img src="<?= base_url("uploads/olive-images/fold-icon4.png") ?>" alt="">
                    </div>
                    <div class="content">
                        <h2>120+</h2>
                        <p>Direct Experience With Startup</p>
                    </div>
                </div>
            </div> -->
        </div>
    </div>
</section>
<section class="fourth-fold">
    <div class="container">
    <?php $section_5 = $this->crud_model->get_content_settings('home', 'section-5'); ?>

        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="fold-thumbnail">
                    <img class="img-fluid" src="<?= base_url("uploads/olive-images/train.jpeg") ?>" alt="">
                </div>
            </div>
            <div class="col-lg-6">
                <div class="fold-content">
                    <h2 class="text-uppercase fw-bold clr-black"><?php echo $section_5['title']; ?></h2>
                    <p><?php echo $section_5['description_1']; ?></p>
                    <a href="<?php echo $section_5['button_link']; ?>" class="site-btn btn-lg"><?php echo $section_5['button_text']; ?><i class="fas fa-solid fa-book-open"></i></a>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="fifth-fold">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="fold-title text-center mb-5">
                    <h2 class="text-uppercase fw-bold clr-black"><?php echo site_phrase('our_alliances'); ?></h2>
                    <p>Some of the pride clients of olive inc. since years with successful training programs based on one-on-one sessions.</p>
                </div>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-lg-12">
                <div class="fold-gallery">
                    <?php $organizations = $this->crud_model->get_organizations_front(4); ?>
                    <?php foreach ($organizations as $organization) : ?>
                        <a class="box" href="<?php echo site_url('home/organizations/'.$organization['slug'])?>">
                            <div class="box-img">
                                <img class="img-fluid" src="<?php echo base_url('uploads/thumbnails/category_thumbnails/' . $organization['logo']); ?>" alt="">
                            </div>
                            <div class="box-title"><?php echo $organization['name']; ?></div>
                        </a>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</section>

<!--<section class="mb-5">-->
<!--    <div class="container-lg">-->
<!--        <h3 class="course-carousel-title my-4"><?php echo site_phrase('top_categories'); ?></h3>-->
<!--        <div class="row justify-content-center">-->

<!--            <?php $top_10_categories = $this->crud_model->get_top_categories(12, 'sub_category_id'); ?>-->
<!--            <?php foreach ($top_10_categories as $top_10_category) : ?>-->
<!--                <?php $category_details = $this->crud_model->get_category_details_by_id($top_10_category['sub_category_id'])->row_array(); ?>-->
<!--                <div class="col-md-6 col-lg-4 col-xl-3 mb-3">-->
<!--                    <a href="<?php echo site_url('home/courses?category=' . $category_details['slug']); ?>" class="top-categories">-->
<!--                        <div class="category-icon">-->
<!--                            <i class="<?php echo $category_details['font_awesome_class']; ?>"></i>-->
<!--                        </div>-->
<!--                        <div class="category-title">-->
<!--                            <?php echo $category_details['name']; ?>-->
<!--                            <p><?php echo $top_10_category['course_number'] . ' ' . site_phrase('courses'); ?></p>-->
<!--                        </div>-->
<!--                    </a>-->
<!--                </div>-->
<!--            <?php endforeach; ?>-->
<!--        </div>-->
<!--    </div>-->
<!--</section>-->

<!-- show static carousel copy of udemy  -->

<!--<div class="container-fluid">-->




<!--<section class="mb-5">-->
<!--    <div class="container-lg">-->
<!--        <h3 class="course-carousel-title my-4"><?php echo site_phrase('top_categories'); ?></h3>-->
<!--        <div class="row justify-content-center">-->

<!--            <?php $top_10_categories = $this->crud_model->get_top_categories(12, 'sub_category_id'); ?>-->
<!--            <?php foreach ($top_10_categories as $top_10_category) : ?>-->
<!--                <?php $category_details = $this->crud_model->get_category_details_by_id($top_10_category['sub_category_id'])->row_array(); ?>-->
<!--                <div class="col-md-6 col-lg-4 col-xl-3 mb-3">-->
<!--                    <a href="<?php echo site_url('home/courses?category=' . $category_details['slug']); ?>" class="top-categories">-->
<!--                        <div class="category-icon">-->
<!--                            <i class="<?php echo $category_details['font_awesome_class']; ?>"></i>-->
<!--                        </div>-->
<!--                        <div class="category-title">-->
<!--                            <?php echo $category_details['name']; ?>-->
<!--                            <p><?php echo $top_10_category['course_number'] . ' ' . site_phrase('courses'); ?></p>-->
<!--                        </div>-->
<!--                    </a>-->
<!--                </div>-->
<!--            <?php endforeach; ?>-->
<!--        </div>-->
<!--    </div>-->
<!--</section>-->

<!---->
<!--<section class="mb-5">
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
<!-- <img class="img-fluid" src="https://image.shutterstock.com/image-vector/modern-usb-typec-connector-icon-260nw-1388950349.jpg" alt="loko"/>
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
</section> -->
<!---->






<script type="text/javascript">
    function handleWishList(elem) {

        $.ajax({
            url: '<?php echo site_url('home/handleWishList'); ?>',
            type: 'POST',
            data: {
                course_id: elem.id
            },
            success: function(response) {
                if (!response) {
                    window.location.replace("<?php echo site_url('login'); ?>");
                } else {
                    if ($(elem).hasClass('active')) {
                        $(elem).removeClass('active')
                    } else {
                        $(elem).addClass('active')
                    }
                    $('#wishlist_items').html(response);
                }
            }
        });
    }

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
                    $('.big-cart-button-' + elem.id).removeClass('addedToCart')
                    $('.big-cart-button-' + elem.id).text("<?php echo site_phrase('add_to_cart'); ?>");
                } else {
                    $('.big-cart-button-' + elem.id).addClass('addedToCart')
                    $('.big-cart-button-' + elem.id).text("<?php echo site_phrase('added_to_cart'); ?>");
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
            url: '<?php echo site_url('home/isLoggedIn'); ?>',
            success: function(response) {
                if (!response) {
                    window.location.replace("<?php echo site_url('login'); ?>");
                }
            }
        });
    }





    $(document).ready(function() {




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



        $(document).on('click', '.tab', function(e) {


            e.preventDefault()
            //  var id = $(this).attr('href');


            //  $(id).show();
            // $(window).trigger('resize')

            setTimeout(() => {
                $('.course-carousel').slick('unslick'); /* ONLY remove the classes and handlers added on initialize */
                $('.my-slide').remove();
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
                $(window).trigger('resize');
                e.click();
            }, 100);

        })

        if ($(".top-istructor-slick")[0]) {
            $(".top-istructor-slick").slick({
                dots: false
            });
        }


        setTimeout(function() {
            $('.animated-loader').hide();
            $('.course-carousel').show();
        }, 200)



        //         $( ".tab" ).click(function() {
        //   alert( "Handler for .click() called." );
        // });

        //     $.ajax({
        //     url : "https://example.com/rest/getData", // Url of backend (can be python, php, etc..)
        //     type: "POST", // data type (can be get, post, put, delete)
        //     data : formData, // data in json format
        //   	async : false, // enable or disable async (optional, but suggested as false if you need to populate data afterwards)
        //     success: function(response, textStatus, jqXHR) {
        //     	console.log(response);
        //     },
        //     error: function (jqXHR, textStatus, errorThrown) {
        // 		console.log(jqXHR);
        //       	console.log(textStatus);
        //       	console.log(errorThrown);
        //     }
        // });










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