 <style>
     @media only screen and (max-width: 992px) {
         .home-fact-box i {
             font-size: 36px;
         }
     }

     @media only screen and (max-width: 768px) {
         .home-fact-box i {
             font-size: 28px;
         }
     }
 </style>
 <section class="home-banner-area">
     <div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="img-fluid" src="<?= base_url("uploads/system/" . get_frontend_settings('banner_image')); ?>" alt="">
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
<script>
    var myCarousel = document.querySelector('#myCarousel')
var carousel = new bootstrap.Carousel(myCarousel)
</script>
    <!--<div class="container-fluid">-->
    <!--    <div class="row align-items-center">-->
    <!--        <div class="col-lg-12 gx-0">-->
    <!--            <div class="banner-img">-->
    <!--                <img class="img-fluid" src="<?= base_url("uploads/system/" . get_frontend_settings('banner_image')); ?>" alt="">-->
    <!--            </div>-->
                <!--<div class="fold-content">
                    <h1 class="text-uppercase fw-bold clr-black"><?php echo site_phrase(get_frontend_settings('banner_title')); ?></h1>
                    <h4><?php echo site_phrase(get_frontend_settings('banner_sub_title')); ?></h4>
                    <p><?php echo site_phrase(get_frontend_settings('banner_sub_title')); ?></p>

                </div>-->
            <!--</div>-->
            <!--<div class="col-lg-6">
                <div class="fold-thumbnail">
                    <img class="img-fluid" src="<?= base_url("uploads/system/" . get_frontend_settings('banner_image')); ?>" alt="">
                </div>
            </div>-->
    <!--    </div>-->
    <!--</div>-->
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
             <div class="col-md-4 d-flex justify-content-center">
                 <div class="home-fact-box mr-md-auto mr-auto d-flex align-items-center">
                     <i class="fas fa-align-center float-start mt-0"></i>
                     <div class="text-box ps-4">
                         <h4><?php
                                $status_wise_courses = $this->crud_model->get_status_wise_courses();
                                $number_of_courses = $status_wise_courses['active']->num_rows();
                                //echo $number_of_courses . ' ' . site_phrase('Alignment'); 
                                echo site_phrase('Alignment'); ?></h4>
                         <!--<p><?php echo site_phrase('explore_a_variety_of_fresh_topics'); ?></p>-->
                         <!--<p><?php echo site_phrase('Programs_are_always_available_online'); ?></p>-->
                     </div>
                 </div>
             </div>
             <div class="col-md-4 d-flex justify-content-center">
                 <div class="home-fact-box mr-md-auto mr-auto d-flex align-items-center">
                     <i class="fa fa-question float-start mt-0"></i>
                     <div class="text-box ps-4">
                         <!--<h4><?php echo site_phrase('expert_instruction'); ?></h4>-->
                         <h4><?php echo site_phrase('Curiosity'); ?></h4>
                         <!--<p><?php echo site_phrase('find_the_right_course_for_you'); ?></p>-->
                         <!--<p><?php echo site_phrase('Encrypted_&_secure_trnasactions'); ?></p>-->
                     </div>
                 </div>
             </div>
             <div class="col-md-4 d-flex justify-content-center">
                 <div class="home-fact-box mr-md-auto mr-auto d-flex align-items-center">
                     <i class="fa fa-bahai float-start mt-0"></i>
                     <div class="text-box ps-4">
                         <!--<h4><?php echo site_phrase('lifetime_access'); ?></h4>-->
                         <h4><?php echo site_phrase('Impact'); ?></h4>
                         <!--<p><?php echo site_phrase('learn_on_your_schedule'); ?></p>-->
                         <!--<p><?php echo site_phrase('Get_the_variety_of_access_durations'); ?></p>-->
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
                         <a href="javascript:;" class="site-btn btn-lg" id="SSModal1">
                             <?php echo $section_2['button_text']; ?>
                             <i class=" fas fa-solid fa-arrow-right"></i>
                         </a>
                         <?php //echo $section_2['button_link']; 
                            ?>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </section>
 <section class="third-fold">
     <div class="container">
         <div class="row align-items-center justify-content-center">
             <?php $section_3 = $this->crud_model->get_content_settings('home', 'section-3'); ?>
             <div class="col-sm-4">
                 <div class="fold-thumbnail text-center px-5 px-sm-0 mx-5 mx-sm-0">
                     <img class="img-fluid" src="<?php echo base_url('uploads/system/' . $section_3['image']); ?>" alt="">
                 </div>
             </div>
             <div class="col-lg-8">
                 <div class="fold-content px-0">
                     <h2 class="text-uppercase fw-bold clr-orange"><?php echo $section_3['title']; ?></h2>
                     <h5><?php echo $section_3['sub_title']; ?></h5>
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
                     <img class="img-fluid" src="<?php echo base_url('uploads/system/' . $section_5['image']); ?>" alt="">
                 </div>
             </div>
             <div class="col-lg-6">
                 <div class="fold-content">
                     <h2 class="text-uppercase fw-bold clr-black"><?php echo $section_5['title']; ?></h2>
                     <p><?php echo $section_5['description_1']; ?></p>
                     <a href="javascript:;" class="site-btn btn-lg" id="SSModal2">
                         <?php echo $section_5['button_text']; ?>
                         <i class="fas fa-solid fa-book-open"></i>
                     </a>
                     <?php ///echo $section_5['button_link']; 
                        ?>
                 </div>
             </div>
         </div>
     </div>
 </section>
 <section class="fifth-fold d-none">
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
                         <a class="box" href="<?php echo site_url('home/organizations/' . $organization['slug']) ?>">
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
 <?php if (get_frontend_settings('recaptcha_status')) : ?>
     <script src="https://www.google.com/recaptcha/api.js" async defer></script>
 <?php endif; ?>

 <!-- SS Modal 1 Starts From Here  -->
 <div class="page-wrapper bg-gra-02 align-items-center flex-wrap SSModalWrapper1" style="display:none;">
     <img src="<?php echo base_url(); ?>/assets/frontend/default/img/logo-white.svg" class="position-absolute bottom-50">
     <div class="wrapper wrapper--w960 d-flex flex-row bg-white rounded position-relative">
         <a href="#" class="SSClose close position-absolute"><i class="fa fa-times"></i></a>
         <!--<div class="col-lg-4 d-none d-lg-flex p-4 bg-gra-01 p-5 d-flex flex-wrap">-->
         <!--  <div class="d-flex flex-column">-->
         <!--    <h6 class="mb-3">Lorem ipsum dolor.</h6>-->
         <!--    <h2 class="title mb-5">Consectetur adipisicing elit aspernatur ipsa.</h2>-->
         <!--    <div class="artwork">-->
         <!--      <img src="<?php echo base_url(); ?>/assets/frontend/default/img/fun-3d-cartoon-casual-character-removebg-preview.png" class="w-100" />-->
         <!--    </div>-->
         <!--  </div>-->
         <!--  <div class="foot-note align-self-end mt-auto">-->
         <!--    Some Text here-->
         <!--  </div>-->
         <!--</div>-->
         <div class="col-lg-5 d-none d-lg-flex p-4 bg-gra-01 p-5 d-flex flex-wrap position-relative" bis_skin_checked="1" style="background: url('<?php echo base_url(); ?>/assets/frontend/default/img/business-man.jpg');background-size: cover;background-position: top left -40px;">
         </div>
         <div class="bg-white d-flex w-100 py-5">
             <div class="card-body">

                 <div class="contact-form-box">
                     <div class="row">
                         <div class="col-sm-8 col-lg-7 mx-auto">
                             <div class="contact-title">
                                 <h2 class="mb-2">Get In Touch</h2>
                                 <p>We are here for you! how can we help you?</p>
                             </div>
                             <div class="contact-form">
                                 <form action="<?php echo site_url('home/contact_us/post'); ?>" method="post">
                                     <div class="form-group">
                                         <input class="form-control" type="text" placeholder="Name" name="name" required>
                                     </div>
                                     <div class="form-group">
                                         <input class="form-control" type="tel" placeholder="Phone Number" name="phone" required>
                                     </div>
                                     <div class="form-group">
                                         <input class="form-control" type="email" placeholder="Email" name="email" required>
                                     </div>
                                     <div class="form-group">
                                         <?php if (get_frontend_settings('recaptcha_status')) : ?>
                                             <div class="g-recaptcha" data-sitekey="<?php echo get_frontend_settings('recaptcha_sitekey'); ?>"></div>
                                         <?php endif; ?>
                                     </div>
                                     <button class="contact-btn" type="submit">Submit</button>
                             </div>
                         </div>
                     </div>
                 </div>
                 </form>
             </div>
         </div>
     </div>
 </div>
 <!-- SS Modal 2 Starts From Here  -->
 <div class="page-wrapper bg-gra-02 align-items-center flex-wrap SSModalWrapper2" style="display:none;">
     <img src="<?php echo base_url(); ?>/assets/frontend/default/img/logo-white.svg" class="position-absolute bottom-50">
     <div class="wrapper wrapper--w960 d-flex flex-row bg-white rounded position-relative">
         <a href="#" class="SSClose close position-absolute"><i class="fa fa-times"></i></a>
         <!--<div class="col-lg-4 d-none d-lg-flex p-4 bg-gra-01 p-5 d-flex flex-wrap">-->
         <!--  <div class="d-flex flex-column">-->
         <!--    <h6 class="mb-3">Lorem ipsum dolor.</h6>-->
         <!--    <h2 class="title mb-5">Consectetur adipisicing elit aspernatur ipsa.</h2>-->
         <!--    <div class="artwork">-->
         <!--      <img src="<?php echo base_url(); ?>/assets/frontend/default/img/fun-3d-cartoon-casual-character-removebg-preview.png" class="w-100" />-->
         <!--    </div>-->
         <!--  </div>-->
         <!--  <div class="foot-note align-self-end mt-auto">-->
         <!--    Some Text here-->
         <!--  </div>-->
         <!--</div>-->
         <div class="col-lg-5 d-none d-lg-flex p-4 bg-gra-01 p-5 d-flex flex-wrap position-relative" bis_skin_checked="1" style="background: url('<?php echo base_url(); ?>/assets/frontend/default/img/business-man.jpg');background-size: cover;background-position: top left -40px;">
         </div>
         <div class="bg-white d-flex w-100 py-5">
             <div class="card-body">
                 <form method="POST" action="<?php echo site_url('home/contact_us/post'); ?>">
                     <div class="contact-form-box">
                         <div class="row">
                             <div class="col-sm-8 col-lg-7 mx-auto">
                                 <div class="contact-title">
                                     <h2 class="mb-2">Get In Touch</h2>
                                     <p>We are here for you! how can we help you?</p>
                                 </div>
                                 <div class="contact-form">
                                     <form action="#" method="post">
                                         <div class="form-group">
                                             <input class="form-control" type="text" placeholder="Name" name="name" required>
                                         </div>
                                         <div class="form-group">
                                             <input class="form-control" type="tel" placeholder="Phone Number" name="phone" required>
                                         </div>
                                         <div class="form-group">
                                             <input class="form-control" type="email" placeholder="Email" name="email" required>
                                         </div>
                                         <div class="form-group">
                                             <?php if (get_frontend_settings('recaptcha_status')) : ?>
                                                 <div class="g-recaptcha" data-sitekey="<?php echo get_frontend_settings('recaptcha_sitekey'); ?>"></div>
                                             <?php endif; ?>
                                         </div>
                                         <button class="contact-btn" type="submit">Submit</button>
                                     </form>
                                 </div>
                             </div>
                         </div>
                     </div>
                 </form>
             </div>
         </div>
     </div>
 </div>
 <!-- SS Modal [x] here  -->
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


     // function ToggleSSModal(Trgr, Target){
     //     if($(Trgr).length){
     //       $(Trgr).on("click", function(){
     //           $(Target).show();
     //           $(Target).addClass("d-flex");
     //           $('body').css('overflow', 'hidden');
     //       });
     //     }
     // }


     $(document).ready(function() {

         // ToggleSSModal("#SSModal1", ".SSModalWrapper1");
         // ToggleSSModal("#SSModal2", ".SSModalWrapper2");
         // if($(".SSClose").length){
         //   $(".SSClose").on("click", function(){
         //       $(this).closest(".page-wrapper").hide();
         //       $(this).closest(".page-wrapper").removeClass("d-flex");
         //       $('body').css('overflow', 'auto');
         //   }); 
         // }

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