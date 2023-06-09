<div class="main-nav-wrap">
  <div class="mobile-overlay"></div>
  <style type="text/css">
    @media only screen and (max-width: 767px) {
      .category.corner-triangle.top-left.pb-0.is-hidden {
        display: none !important;
      }

      .sub-category.is-hidden {
        display: none !important;
      }
    }
  </style>

  <ul class="mobile-main-nav">
    <div class="mobile-menu-helper-top"></div>

    <li class="text-nowrap fw-bold">

      <a href="<?php echo site_url(); ?>">
        <span class="fw-500"><?php echo site_phrase('home'); ?></span>
      </a>


      <a href="<?php echo site_url('home/about_us'); ?>" >
        <span class="fw-500"><?php echo site_phrase('about'); ?></span>
      </a>

      <a href="<?php echo site_url('home/all_programs'); ?>">
        <span class="fw-500"><?php echo site_phrase('programs'); ?></span>
      </a>

      <a href="#">
        <span class="fw-500"><?php echo site_phrase('team'); ?></span>
      </a>

      <a href="<?php echo site_url('home/organizations'); ?>">
        <span class="fw-500"><?php echo site_phrase('organizations'); ?></span>
      </a>

      <a href="<?php echo site_url('home/books'); ?>">
        <span class="fw-500"><?php echo site_phrase('books'); ?></span>
      </a>

      <a href="<?php echo site_url('home/events'); ?>">
        <span class="fw-500"><?php echo site_phrase('events'); ?></span>
      </a>

      <a href="<?php echo site_url('home/news'); ?>">
        <span class="fw-500"><?php echo site_phrase('news'); ?></span>
      </a>

      <a href="<?php echo site_url('home/articles'); ?>">
        <span class="fw-500"><?php echo site_phrase('articles'); ?></span>
      </a>

  <!--  <ul class="category corner-triangle top-left is-hidden pb-0">
        <li class="go-back"><a href=""><i class="fas fa-angle-left"></i><?php echo site_phrase('menu'); ?></a></li>

       <?php
        $categories = $this->crud_model->get_categories()->result_array();
        foreach ($categories as $key => $category) : ?>
          <li class="has-children">
            <a href="javascript:;" class="py-2" onclick="redirect_to('<?php echo site_url('home/courses?category=' . $category['slug']); ?>')">
              <span class="icon"><i class="<?php echo $category['font_awesome_class']; ?>"></i></span>
              <span><?php echo $category['name']; ?></span>
              <span class="has-sub-category"><i class="fas fa-angle-right"></i></span>
            </a>
            <ul class="sub-category is-hidden">
              <li class="go-back-menu"><a href=""><i class="fas fa-angle-left"></i><?php echo site_phrase('menu'); ?></a></li>
              <li class="go-back"><a href="">
                  <i class="fas fa-angle-left"></i>
                  <span class="icon"><i class="<?php echo $category['font_awesome_class']; ?>"></i></span>
                  <?php echo $category['name']; ?>
                </a></li>
              <?php
              $sub_categories = $this->crud_model->get_sub_categories($category['id']);
              foreach ($sub_categories as $sub_category) : ?>
                <li><a href="<?php echo site_url('home/courses?category=' . $sub_category['slug']); ?>"><?php echo $sub_category['name']; ?></a></li>
              <?php endforeach; ?>
            </ul>
          </li>
        <?php endforeach; ?>
        <li class="all-category-devided mb-0 p-0">
          <a href="<?php echo site_url('home/courses'); ?>" class="py-3">
            <span class="icon"><i class="fa fa-align-justify"></i></span>
            <span><?php echo 'All Courses/Programs'; ?></span>
          </a>
        </li>

        <?php if (addon_status('course_bundle')) : ?>
          <li class="all-category-devided m-0 p-0">
            <a href="<?php echo site_url('course_bundles'); ?>" class="py-3">
              <span class="icon"><i class="fas fa-cubes"></i></span>
              <span><?php echo site_phrase('course_bundles'); ?></span>
            </a>
          </li>
        <?php endif; ?> 
      </ul> -->
  
    </li>

  <div class="mobile-menu-helper-bottom"></div>
  </ul>
</div>