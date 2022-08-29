<?php $section_1 = $this->crud_model->get_content_settings('organizations', 'section-3'); ?>
<style>
section.org-first-fold, section.arc-first-fold {
    background-image: url(<?php echo base_url('uploads/system/' . $section_1['image']); ?>);
    min-height: 500px !important;
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
<?php $section = $this->crud_model->get_content_settings('organizations', 'section-1'); ?>
<section class="org-second-fold">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-12">
                <div class="fold-title mb-5">
                <h2 class="text-uppercase fw-bold clr-black text-center"><?php //echo $section['title']; ?></h2>
                    <p class="text-left"><?php echo $section['description_1']; ?></p>
                </div>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-lg-12">
                <div class="fold-gallery">

                    
                    <?php $organizations = $this->crud_model->get_organizations_front(); ?>
                   <?php foreach($organizations as $organization): ?>
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
<?php $section = $this->crud_model->get_content_settings('organizations', 'section-2'); ?>
<section class="org-third-fold">
    <div class="border-heading">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <div class="fold-title mb-0">
                        <h2 class="text-uppercase fw-bold clr-black text-center"><?php echo $section['title']; ?></h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row align-items-center mt-5">
            <div class="col-lg-6 p-0">
                <div class="fold-content">
                    <p><?php echo $section['description_1']; ?></p>
                </div>
            </div>
            <div class="col-lg-6 p-0">
                <div class="fold-thumbnail" style="margin: 30px;">
                    <img class="img-fluid" src="<?php echo base_url('uploads/system/' . $section['image']); ?>" alt="">
                </div>
            </div>
        </div>
    </div>
</section>