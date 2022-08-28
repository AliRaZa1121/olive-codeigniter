<?php $section_1 = $this->crud_model->get_content_settings('books', 'section-3'); ?>
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
                    <!-- <h4 class="text-white">Lorem ipsum dolor Lorem ipsum</h4> -->
                </div>
            </div>
        </div>
    </div>
</section>
<?php $section = $this->crud_model->get_content_settings('books', 'section-1'); ?>

<section class="org-second-fold">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-12">
                <div class="fold-title mb-5">
                    <p class="text-left">
                        <?php echo $section['sub_title']; ?>
                    </p>
                    <h2 class="text-uppercase fw-bold clr-black text-left"><?php echo $section['title']; ?></h2>
                    <p class="text-left">
                        <?php echo $section['description_1']; ?>
                    </p>
                </div>
            </div>
        </div>
        <div class="border-heading">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-12">
                        <div class="fold-title mb-0">
                            <h2 class="text-uppercase fw-bold clr-black text-center">Collections</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-5">
                    <?php $books = $this->crud_model->get_books_front(); ?>
                    <?php foreach ($books as $book) : ?>
                                    <div class="col-lg-3">
                        <div class="book-box">
                            <div class="book-box-image">
                                <a href="<?php echo base_url('/home/books/' . $book['slug']); ?>">
                                    <img class="img-fluid" src="<?php echo base_url('uploads/thumbnails/category_thumbnails/' . $book['banner']); ?>" alt="">
                                </a>
                            </div>
                            <div class="book-box-caption">
                                <h3 class="book-title"><?php echo $book['name']; ?></h3>
                                <p class="book-discription"> <?php echo html_entity_decode(substr($book['description'], 0, 400)); ?></p>
                                <!--<a class="book-btn" href="<?php echo base_url('uploads/thumbnails/category_thumbnails/' . $book['file']); ?>">Read More</a>-->
                                <a class="book-btn" href="<?php echo base_url('/home/books/' . $book['slug']); ?>">Read more</a>
                            </div>
                        </div>
                        
                    </div>
                    <?php endforeach; ?>


        </div>
    </div>
</section>


<?php $section = $this->crud_model->get_content_settings('books', 'section-2'); ?>
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