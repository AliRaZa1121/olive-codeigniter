<section class="menu-area bg-white">
  <div class="container-xl">
    <nav class="navbar navbar-expand-lg bg-white">

      <ul class="mobile-header-buttons">
        <li><a class="mobile-nav-trigger" href="#mobile-primary-nav">Menu<span></span></a></li>
        <li><a class="mobile-search-trigger" href="#mobile-search">Search<span></span></a></li>
      </ul>

      <a href="<?php echo site_url(''); ?>" class="navbar-brand" href="#"><img src="<?php echo base_url('uploads/system/'.get_frontend_settings('dark_logo')); ?>" alt="" height="35"></a>

      <?php include 'menu.php'; ?>

      <!-- <form class="inline-form" action="<?php echo site_url('home/search'); ?>" method="get">
        <div class="input-group search-box mobile-search" style="width: 443px; margin: 0px;">
          <input type="text" name = 'query' class="form-control" placeholder="<?php echo site_phrase('search_for_courses'); ?>">
          <div class="input-group-append">
            <button class="btn" type="submit"><i class="fas fa-search"></i></button>
          </div>
        </div>
      </form> -->
      
      
      

      <?php if ($this->session->userdata('admin_login')): ?>
        <div class="instructor-box menu-icon-box ms-auto">
          <div class="icon">
            <a href="<?php echo site_url('admin'); ?>" style="border: 1px solid transparent; margin: 0px; font-size: 14px; width: max-content; border-radius: 5px; max-height: 40px; line-height: 40px; padding: 0px 10px;"><?php echo site_phrase('administrator'); ?></a>
          </div>
        </div>
      <?php endif; ?>

      <div class="cart-box menu-icon-box ms-auto" id = "cart_items">
        <?php //include 'cart_items.php'; ?>
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

        <a href="<?php echo site_url('home/login'); ?>" class="btn btn-sign-up"><?php echo site_phrase('login'); ?></a>

      </div> 
      <!--  sign-in-box end -->
    </nav>
  </div>
</section>
