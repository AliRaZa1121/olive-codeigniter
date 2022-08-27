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
                <?php $section = $this->crud_model->get_content_settings('organizations', 'section-1'); ?>
                <form class="required-form" action="<?php echo site_url('admin/content_settings/organizations/section-1'); ?>" method="post" enctype="multipart/form-data">
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


<div class="row justify-content-center">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <h4 class="mb-3 header-title"><?php echo get_phrase('Section 2'); ?></h4>
                <?php $section = $this->crud_model->get_content_settings('organizations', 'section-2'); ?>
                <form class="required-form" action="<?php echo site_url('admin/content_settings/organizations/section-2'); ?>" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="title"><?php echo get_phrase('title'); ?><span class="required">*</span></label>
                        <input type="text" name="title" id="title" class="form-control" value="<?php echo $section['title']; ?>" required>
                    </div>

                    <div class="form-group">
                        <label for="description_1"><?php echo get_phrase('description'); ?></label>
                        <textarea name="description_1" id="description_1" class="form-control" rows="5"><?php echo $section['description_1']; ?></textarea>
                    </div>


                    <div class="form-group col-xl-4">
                        <h4 class="mb-3 header-title"><?php echo get_phrase('section_image'); ?></h4>
                        <div class="row justify-content-center">
                            <div class="form-group mb-2">
                                <div class="wrapper-image-preview">
                                    <div class="box" style="width: 250px;">
                                        <div class="js--image-preview" style="background-image: url(<?php echo base_url('uploads/system/' . $section['image']); ?>); background-color: #F5F5F5;"></div>
                                        <div class="upload-options">
                                            <label for="image-sec-3" class="btn"> <i class="mdi mdi-camera"></i> <?php echo get_phrase('section_image'); ?> </label>
                                            <input id="image-sec-3" style="visibility:hidden;" type="file" class="image-upload" name="image" accept="image/*">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
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




