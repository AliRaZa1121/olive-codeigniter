<section class="menu-area bg-white">
  <div class="container-xl">
    <nav class="navbar navbar-expand-lg bg-white justify-content-between">
      <div class="d-block d-lg-none">
        <ul class="mobile-header-buttons">
          <li><a class="mobile-nav-trigger" href="#mobile-primary-nav">Menu<span></span></a></li>
          <!--<li><a class="mobile-search-trigger" href="#mobile-search">Search<span></span></a></li>-->
        </ul>
      </div>
      <div>
        <a href="<?php echo site_url(''); ?>" class="navbar-brand" href="#"><img src="<?php echo base_url('uploads/system/' . get_frontend_settings('dark_logo')); ?>" alt="" height="35"></a>
      </div>
      <div class="d-flex w-lg-100">
        <?php include 'menu.php'; ?>

        <!-- <form class="inline-form" action="<?php echo site_url('home/search'); ?>" method="get">
        <div class="input-group search-box mobile-search" style="width: 443px; margin: 0px;">
          <input type="text" name = 'query' class="form-control" placeholder="<?php echo site_phrase('search_for_courses'); ?>">
          <div class="input-group-append">
            <button class="btn" type="submit"><i class="fas fa-search"></i></button>
          </div>
        </div>
      </form> -->




        <?php if ($this->session->userdata('admin_login')) : ?>
          <div class="instructor-box menu-icon-box ms-auto">
            <div class="icon">
              <a href="<?php echo site_url('admin'); ?>" style="border: 1px solid transparent; margin: 0px; font-size: 14px; width: max-content; border-radius: 5px; max-height: 40px; line-height: 40px; padding: 0px 10px;"><?php echo site_phrase('administrator'); ?></a>
            </div>
          </div>
        <?php endif; ?>

        <div class="cart-box menu-icon-box ms-auto" id="cart_items">
          <?php //include 'cart_items.php'; 
          ?>
        </div>
        <div class=" btn-group menu-icon-box">
          <div class="icon">
            <!-- <a href="<?php echo site_url('home/organization_sign_up'); ?>" style="border: 1px solid transparent; margin: 0px; font-size: 14px; width: max-content; border-radius: 5px; max-height: 40px; line-height: 40px; padding: 0px 10px;"><?php echo site_phrase('create_an_organization'); ?></a> -->
            <!-- <a href="<?php echo site_url('home/coach_sign_up'); ?>"  style="border: 1px solid transparent; margin: 0px; font-size: 14px; width: max-content; border-radius: 5px; max-height: 40px; line-height: 40px; padding: 0px 10px;"><?php echo site_phrase('become_a_teacher'); ?></a> -->
          </div>
        </div>

        <span class="signin-box-move-desktop-helper"></span>
        <div class="sign-in-box btn-group">

          <!-- <a href="<?php echo site_url('home/login'); ?>" class="btn btn-sign-in"><?php echo site_phrase('login'); ?></a> -->

          <!--<a href="<?php echo site_url('home/login'); ?>" class="btn btn-sign-up"><?php echo site_phrase('login'); ?></a-->
          <!-- <button type="button" class="btn btn-sign-up" id="SSModal3">
            Login
          </button> -->

          <button type="button" class="btn btn-sign-up">
            <a style="color:#FFF" href="<?php echo site_url('home/coach_loft'); ?>"> Login</a>
          </button>

        </div>
        <!--  sign-in-box end -->
      </div>
    </nav>
  </div>
</section>

<!-- SS Modal 1 Starts From Here  -->
<div class="page-wrapper bg-gra-02 align-items-center flex-wrap SSModalWrapper3" style="display:none;">
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
        <form method="POST">
          <div class="contact-form-box">
            <div class="row">
              <div class="col-sm-8 col-lg-7 mx-auto">
                <div class="contact-title">
                  <h2 class="mb-2">Get In Touch</h2>
                  <p>We are here for you! how can we help you?</p>
                </div>
                <div class="contact-form">

                  <div class="form-group">
                    <input class="form-control" type="text" placeholder="Name" name="name" required="">
                  </div>
                  <div class="form-group">
                    <input class="form-control" type="tel" placeholder="Phone Number" name="phone" required="">
                  </div>
                  <div class="form-group">
                    <input class="form-control" type="email" placeholder="Email" name="email" required="">
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