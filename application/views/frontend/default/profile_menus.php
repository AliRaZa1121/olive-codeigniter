<ul class="print-hidden">
  <li class="<?php if ($page_name == 'user_profile') echo 'active'; ?>"><a href="<?php echo site_url('home/profile/user_profile'); ?>"><i class="fas fa-user"></i> <?php echo site_phrase('profile'); ?></a></li>

  <!--<li class="<?php if ($page_name == 'my_courses') echo 'active'; ?>"><a href="<?php echo site_url('home/my_courses'); ?>"><i class="fas fa-book-open"></i> <?php echo site_phrase('My courses'); ?></a></li>-->

  <li class="<?php if ($page_name == 'my_programs') echo 'active'; ?>"><a href="<?php echo site_url('home/my_programs'); ?>"><i class="fa fa-certificate"></i> <?php echo site_phrase('My programs'); ?></a></li>

  <?php if (addon_status('course_bundle')) : ?>
    <li class="<?php if ($page_name == 'my_bundles' || $page_name == 'bundle_invoice') echo 'active'; ?>"><a href="<?php echo site_url('home/my_bundles'); ?>"><?php echo site_phrase('bundles'); ?></a></li>
  <?php endif; ?>

  <li class="<?php if ($page_name == 'my_wishlist') echo 'active'; ?>"><a href="<?php echo site_url('home/my_wishlist'); ?>"><i class="fas fa-heart"></i> <?php echo site_phrase('My wishlist'); ?></a></li>

  <li class="<?php if ($page_name == 'my_messages') echo 'active'; ?>"><a href="<?php echo site_url('home/my_messages'); ?>"><i class="fas fa-envelope"></i> <?php echo site_phrase('Chat Messages'); ?></a></li>

  <li class="<?php if ($page_name == 'purchase_history' || $page_name == 'invoice') echo 'active'; ?>"><a href="<?php echo site_url('home/purchase_history'); ?>"><i class="fas fa-shopping-cart"></i> <?php echo site_phrase('purchase_history'); ?></a></li>

  <li><a href="<?php echo site_url('addons/customer_support/user_tickets') ?>"><i class="fa fa-life-ring"></i>Support</a></li>

  <li class="<?php if ($page_name == 'meetings_calendar') echo 'active'; ?>"><a href="<?php echo site_url('home/meetings_calendar'); ?>"><i class="fa fa-calendar"></i> <?php echo site_phrase('Meetings_calendar'); ?></a></li>

  


</ul>