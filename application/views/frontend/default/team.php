<?php $section_1 = $this->crud_model->get_content_settings('team', 'section-2'); ?>
<style>
section.org-first-fold, section.arc-first-fold {
    background-image: url(<?php echo base_url('uploads/system/' . $section_1['image']); ?>);
    /*min-height: 500px !important;*/
}
</style>


<section class="org-first-fold">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="content">
                    <h1 class="text-uppercase fw-bold clr-yellow"><?php //echo $page_title; ?></h1>
                    <!-- <h4 class="text-white">Lorem ipsum dolor Lorem ipsum</h4>
                    <p class="text-white mb-1">lorem ipsum</p>
                    <p class="text-white mb-1">Lorem ipsum dolor Lorem ipsum</p>
                    <p class="text-white mb-1">Lorem ipsum dolor sit amet, consectetur adipiscing elit</p> -->
                </div>
            </div>
        </div>
    </div>
</section>
<?php $section = $this->crud_model->get_content_settings('team', 'section-1'); ?>
<section class="org-second-fold">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-12">
                <div class="fold-title mb-5">
                    <h2 class="text-uppercase fw-bold clr-black text-center"><?php echo $section['title']; ?></h2>
                    <p class="text-left"><?php echo $section['description_1']; ?></p>
                </div>
            </div>
        </div>
        <div class="row mt-3">
                <?php $instructors = $this->user_model->get_instructor()->result_array(); ?>
                <?php foreach ($instructors as $key => $user) : ?>
                  <div class="col-xl-3 col-lg-4 col-md-6">
					<div class="team">
                    <a href="<?php echo site_url('home/instructor_page/'.$user['id'])?>">
							<div class="team-image">
								<img class="img-fluid" src="<?php echo $this->user_model->get_user_image_url($user['id']); ?>" alt="">
							</div>
							<div class="team-content">
								<div class="top-content">
									<h5 class="team-name"><?php echo $user['first_name'] . ' ' . $user['last_name']; ?></h5>
									<p class="team-discription"> <?php echo html_entity_decode(substr($user['biography'], 0, 200)); ?></p>
                                    <a class="team-btn" href="<?php echo site_url('home/instructor_page/'.$user['id'])?>">View Profile</a> 
								</div>
								<!--<div class="bottom-content">
									<h6 class="team-designation">Coach</h6>
									<p class="team-organization">Olive</p>
								</div>-->
							</div>
					</div>
                    </a>
				
                </div>
                <?php endforeach; ?>

        </div>
    </div>
</section>
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