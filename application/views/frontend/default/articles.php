<?php $section_1 = $this->crud_model->get_content_settings('articles', 'section-2'); ?>
<style>
section.org-first-fold, section.arc-first-fold {
    background-image: url(<?php echo base_url('uploads/system/' . $section_1['image']); ?>);
   /* min-height: 500px !important;*/
}
.article-box:hover {
    cursor: pointer;
    box-shadow: 0 .5rem 1rem rgba(0,0,0, .15);
    transition: 0.5s;
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
<?php $section = $this->crud_model->get_content_settings('articles', 'section-1'); ?>

<section class="org-second-fold section">
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
                    <?php foreach ($articles as $article) : ?>
                        <div class="col-lg-6 d-flex align-items-stretch mb-4">
                            <div class="article-box bg-white h-100 w-100 rounded border mb-0">
                                <div class="article-box-image">
                                    <a href="<?php echo site_url('home/content/articles/' . $article['slug']); ?>">
                                        <img class="img-fluid" src="<?php echo base_url('uploads/thumbnails/category_thumbnails/' . $article['thumbnail']); ?>" alt="">
                                    </a>
                                    <!-- <span class="article-box-category">category</span> -->
                                </div>
                                <div class="article-box-content pt-5 pb-4 px-4">
                                    <h4 class="article-box-title fs-5 mb-3"><?php echo  substr($article['name'], 0, 40); ?></h4>
                                    <?php echo html_entity_decode(substr($article['description'], 0, 100)); ?>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="article-sidebar bg-white border rounded mb-4 shadow">
                    <div class="article-sidebar-title bg-orange p-3 mb-1 rounded-top">
                        <a href="<?php echo site_url('home/news') ?>">
                            <h4>News</h4>
                        </a>
                    </div>
                    <div class="article-sidebar-widget p-3">
                        <?php if (count($news) > 0) : ?>
                            <div class="article-single-post">
                                <a href="<?php echo site_url('home/content/news/' . $news[0]['slug']); ?>">
                                    <div class="article-single-post-box">
                                        <img class="img-fluid" src="<?php echo base_url('uploads/thumbnails/category_thumbnails/' . $news[0]['thumbnail']); ?>" alt="">
                                        <div class="single-post-box-content">
                                            <h4 class="single-post-title"><?php echo $news[0]['name']; ?></h4>
                                            <!-- <span class="single-post-category">category</span> -->
                                        </div>
                                    </div>
                                </a>
                            </div>
                        <?php endif; ?>
                        <div class="article-sidebar-list pb-0">
                            <?php foreach ($news as $key => $new) : ?>
                                <?php if ($key  != 0) : ?>
                                    <a href="<?php echo site_url('home/content/news/' . $new['slug']); ?>">
                                        <div class="sidebar-list-wrap flex-column flex-lg-row align-items-center">
                                            <div class="sidebar-list-wrap-image mb-4 mb-lg-0">
                                                <img src="<?php echo base_url('uploads/thumbnails/category_thumbnails/' . $new['thumbnail']); ?>" alt="">
                                            </div>
                                            <div class="sidebar-list-wrap-content mb-0">
                                                <h6 class="sidebar-list-wrap-title"><?php echo $new['name']; ?></h4>
                                                <?php echo html_entity_decode(substr($new['description'], 0, 100)); ?>
                                            </div>
                                        </div>
                                    </a>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>


                <div class="article-sidebar bg-white border rounded mb-4 shadow">
                    <div class="article-sidebar-title bg-orange p-3 mb-1 rounded-top">
                        <a href="<?php echo site_url('home/events') ?>">
                            <h4>Events</h4>
                        </a>
                    </div>
                    <div class="article-sidebar-widget p-3">
                        <?php if (count($events) > 0) : ?>
                            <div class="article-single-post">
                                <a href="<?php echo site_url('home/content/events/' . $events[0]['slug']); ?>">
                                    <div class="article-single-post-box">
                                        <img class="img-fluid" src="<?php echo base_url('uploads/thumbnails/category_thumbnails/' . $events[0]['thumbnail']); ?>" alt="">
                                        <div class="single-post-box-content">
                                            <h4 class="single-post-title"><?php echo $events[0]['name']; ?></h4>
                                            <!-- <span class="single-post-category">category</span> -->
                                        </div>
                                    </div>
                                </a>
                            </div>
                        <?php endif; ?>
                        <div class="article-sidebar-list pb-0">
                            <?php foreach ($events as $key => $event) : ?>
                                <?php if ($key  != 0) : ?>
                                    <a href="<?php echo site_url('home/content/events/' . $event['slug']); ?>">
                                        <div class="sidebar-list-wrap flex-column flex-lg-row align-items-center">
                                            <div class="sidebar-list-wrap-image mb-4 mb-lg-0">
                                                <img src="<?php echo base_url('uploads/thumbnails/category_thumbnails/' . $event['thumbnail']); ?>" alt="">
                                            </div>
                                            <div class="sidebar-list-wrap-content mb-0">
                                                <h6 class="sidebar-list-wrap-title"><?php echo $event['name']; ?></h4>
                                                <p class="article-box-discription short-box"> <?php echo html_entity_decode(substr($event['description'], 0, 100)); ?></p>
                                            </div>
                                        </div>
                                    </a>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>