<div class="main-nav-wrap">
  <div class="mobile-overlay"></div>
  <style type="text/css">
        .menu-area .navbar li.text-nowrap>a span[class*= "fa"] {
            display: none;
        }
    @media only screen and (max-width: 992px) {
        .mobile-main-nav {
            padding: 30px 0 30px 20px;
        }
        .menu-area .navbar li.text-nowrap> a:hover,
        .menu-area .navbar li.text-nowrap> a:active,
        .menu-area .navbar li.text-nowrap> a:focus,
        .menu-area .navbar li.text-nowrap> .active {
            border-radius: 25px 0 0 25px;
        }
        .menu-area .navbar li.text-nowrap>a span[class*= "fa"] {
            color: var(--bs-orange);
            font-size: 14px;
            margin-right: 15px;
            display: inline-block;
        }
        .menu-area .navbar li.text-nowrap>a {
            padding: 10px 20px;
        }
    }
    @media only screen and (max-width: 767px) {
      .category.corner-triangle.top-left.pb-0.is-hidden {
        display: none !important;
      }
.menu-area .navbar li.text-nowrap>a {
        text-align: left;
    }
      .sub-category.is-hidden {
        display: none !important;
      }
    }
    
  </style>

  <ul class="mobile-main-nav">
    <div class="mobile-menu-helper-top"></div>

    <li class="text-nowrap fw-bold">
        
      <a class="<?php if ($page_name == 'home') echo 'active'; ?>" href="<?php echo site_url(); ?>">
        <span class="fa fa-home"></span>
        <span class="fw-500"><?php echo site_phrase('home'); ?></span>
      </a>
      <a class="<?php if ($page_name == 'about_us') echo 'active'; ?>" href="<?php echo site_url('home/about_us'); ?>" >
        <span class="fa fa-address-book"></span>
        <span class="fw-500"><?php echo site_phrase('about'); ?></span>
      </a>
      <a class="<?php if ($page_name == 'courses_page') echo 'active'; ?> d-none"  href="<?php echo site_url('home/all_programs'); ?>">
        <span class="fa fa-list-ul"></span>
        <span class="fw-500"><?php echo site_phrase('programs'); ?></span>
      </a>
      <a class="<?php if ($page_name == 'team') echo 'active'; ?> d-none"  href="<?php echo site_url('home/team'); ?>">
        <span class="fa fa-users"></span>
        <span class="fw-500"><?php echo site_phrase('team'); ?></span>
      </a>
      <a class="<?php if ($page_name == 'organizations') echo 'active'; ?> d-none"  href="<?php echo site_url('home/organizations'); ?>">
        <span class="fa fa-building"></span>
        <span class="fw-500"><?php echo site_phrase('organizations'); ?></span>
      </a>
      <a class="<?php if ($page_name == 'books') echo 'active'; ?> d-none"  href="<?php echo site_url('home/books'); ?>">
        <span class="fa fa-book"></span>
        <span class="fw-500"><?php echo site_phrase('books'); ?></span>
      </a>
      <a class="<?php if ($page_title == 'events') echo 'active'; ?> d-none"  href="<?php echo site_url('home/events'); ?>">
        <span class="fa fa-calendar"></span>
        <span class="fw-500"><?php echo site_phrase('events'); ?></span>
      </a>
      <a class="<?php if ($page_title == 'news') echo 'active'; ?> d-none"  href="<?php echo site_url('home/news'); ?>">
        <span class="fa fa-newspaper"></span>
        <span class="fw-500"><?php echo site_phrase('news'); ?></span>
      </a>
      <a class="<?php if ($page_title == 'Articles') echo 'active'; ?>"  href="<?php echo site_url('home/articles'); ?>">
        <span class="fa fa-code"></span>
        <span class="fw-500"><?php echo site_phrase('articles'); ?></span>
      </a>
      <a class="<?php if ($page_title == 'Contact us') echo 'active'; ?>"  href="<?php echo site_url('home/contact_us'); ?>">
        <span class="fas fa-phone fa-flip-horizontal"></span>
        <span class="fw-500"><?php echo site_phrase('contact'); ?></span>
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