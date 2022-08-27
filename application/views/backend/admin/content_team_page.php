<div class="row ">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <h4 class="page-title"> <i class="mdi mdi-apple-keyboard-command title_icon"></i> <?php echo get_phrase($page_title); ?></h4>
            </div>
        </div>
    </div>
</div>


<div class="row justify-content-center">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <h4 class="mb-3 header-title"><?php echo get_phrase('Section 1'); ?></h4>
                <?php $section = $this->crud_model->get_content_settings('team', 'section-1'); ?>
                <form class="required-form" action="<?php echo site_url('admin/content_settings/team/section-1'); ?>" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="title"><?php echo get_phrase('title'); ?><span class="required">*</span></label>
                        <input type="text" name="title" id="title" class="form-control" value="<?php echo $section['title']; ?>" required>
                    </div>

                    <div class="form-group">
                        <label for="description_1"><?php echo get_phrase('description'); ?></label>
                        <textarea name="description_1" id="description_1" class="form-control" rows="5"><?php echo $section['description_1']; ?></textarea>
                    </div>


                    <div class="row justify-content-center">
                        <div class="col-md-4">
                            <button type="submit" class="btn btn-primary btn-block"><?php echo get_phrase('update_section'); ?></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>







