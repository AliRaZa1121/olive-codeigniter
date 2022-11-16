<?php $section_1 = $this->crud_model->get_content_settings('news', 'section-2'); ?>
<style>
section.org-first-fold, section.arc-first-fold {
    background-image: url(<?php echo base_url('uploads/system/' . $section_1['image']); ?>);
   /* min-height: 500px !important;*/
}
</style>
<section class="arc-first-fold">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="content">
                    <h1 class="text-uppercase fw-bold text-white"><?php //echo $page_title ?></h1>
                    <!-- <h4 class="text-white">Lorem ipsum dolor Lorem ipsum</h4> -->
                </div>
            </div>
        </div>
    </div>
</section>
<?php $section = $this->crud_model->get_content_settings('news', 'section-1'); ?>

<section class="org-second-fold">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-12">
                <div class="fold-title mb-5">
                    <h2 class="text-uppercase fw-bold clr-black text-left"><?php echo $section['title'] ?></h2>
                    <p class="text-left">
                        <?php echo $section['description_1'] ?>
                    </p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-8">
                <div class="row">
                    <?php foreach ($news as $new) : ?>

                        <div class="col-lg-6">
                            <div class="article-box">
                                <div class="article-box-image">
                                    <a href="<?php echo site_url('home/content/news/' . $new['slug']); ?>"><img class="img-fluid" src="<?php echo base_url('uploads/thumbnails/category_thumbnails/' . $new['thumbnail']); ?>" alt="">
                                    </a>
                                    <!-- <span class="article-box-category">category</span> -->
                                </div>
                                <div class="article-box-content">
                                <h4 class="article-box-title"><?php echo substr($new['name'], 0, 40); ?></h4>
                                    <p class="article-box-discription"> <?php echo html_entity_decode(substr($new['description'], 0, 100)); ?></p>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>

                </div>
            </div>
            <div class="col-lg-4">
                <div class="article-sidebar">
                    <div class="article-sidebar-title">
                        <a href="<?php echo site_url('home/events') ?>">
                            <h4>Events</h4>
                        </a>
                    </div>
                    <div class="article-sidebar-widget">
                        <?php if (count($events) > 0) : ?>
                            <div class="article-single-post">
                                <a href="<?php echo site_url('home/content/events/' . $events[0]['slug']); ?>">
                                    <div class="article-single-post-box">
                                        <img class="img-fluid" src="<?php echo base_url('uploads/thumbnails/category_thumbnails/' . $events[0]['thumbnail']); ?>" alt="">
                                        <div class="single-post-box-content">
                                            <h4 class="single-post-title"><?php echo substr($events[0]['name'], 0, 40); ?></h4>
                                            <!-- <span class="single-post-category">category</span> -->
                                        </div>
                                    </div>
                                </a>
                            </div>
                        <?php endif; ?>
                        <div class="article-sidebar-list">
                            <?php foreach ($events as $key => $event) : ?>
                                <?php if ($key  != 0) : ?>
                                    <div class="sidebar-list-wrap">
                                        <div class="sidebar-list-wrap-image">
                                            <a href="<?php echo site_url('home/content/events/' . $event['slug']); ?>"><img src="<?php echo base_url('uploads/thumbnails/category_thumbnails/' . $event['thumbnail']); ?>" alt="">
                                            </a>
                                        </div>
                                        <div class="sidebar-list-wrap-content">
                                            <h6 class="sidebar-list-wrap-title"><?php echo $event['name']; ?></h4>
                                            <p class="article-box-discription short-box"> <?php echo html_entity_decode(substr($event['description'], 0, 100)); ?></p>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            <?php endforeach; ?>

                        </div>

                    </div>
                </div>


                <div class="article-sidebar">
                    <div class="article-sidebar-title">
                        <a href="<?php echo site_url('home/articles') ?>">
                            <h4>Articles</h4>
                        </a>
                    </div>
                    <div class="article-sidebar-widget">
                        <?php if (count($articles) > 0) : ?>
                            <div class="article-single-post">
                                <a href="<?php echo site_url('home/content/articles/' . $articles[0]['slug']); ?>">

                                    <div class="article-single-post-box">
                                        <img class="img-fluid" src="<?php echo base_url('uploads/thumbnails/category_thumbnails/' . $articles[0]['thumbnail']); ?>" alt="">
                                        <div class="single-post-box-content">
                                            <h4 class="single-post-title"><?php echo $articles[0]['name']; ?></h4>
                                            <!-- <span class="single-post-category">category</span> -->
                                        </div>
                                    </div>
                                </a>
                            </div>
                        <?php endif; ?>
                        <div class="article-sidebar-list">
                            <?php foreach ($articles as $key => $article) : ?>
                                <?php if ($key  != 0) : ?>
                                    <div class="sidebar-list-wrap">
                                        <div class="sidebar-list-wrap-image">
                                            <a href="<?php echo site_url('home/content/articles/' . $article['slug']); ?>"><img src="<?php echo base_url('uploads/thumbnails/category_thumbnails/' . $article['thumbnail']); ?>" alt="">
                                            </a>
                                        </div>
                                        <div class="sidebar-list-wrap-content">
                                            <h6 class="sidebar-list-wrap-title"><?php echo $article['name']; ?></h4>
                                               <p class="article-box-discription short-box"> <?php echo html_entity_decode(substr($article['description'], 0, 100)); ?></p>
                                        </div>
                                    </div>
                                <?php endif; ?>

                            <?php endforeach; ?>

                        </div>

                    </div>
                </div>



            </div>


        </div>
    </div>
</section>