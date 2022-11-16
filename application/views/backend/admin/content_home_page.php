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
                <h4 class="mb-3 header-title"><?php echo get_phrase('Section 2'); ?></h4>
                <?php $section_2 = $this->crud_model->get_content_settings('home', 'section-2'); ?>
                <form class="required-form" action="<?php echo site_url('admin/content_settings/home/section-2'); ?>" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="title"><?php echo get_phrase('title'); ?><span class="required">*</span></label>
                        <input type="text" name="title" id="title" class="form-control" value="<?php echo $section_2['title']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="sub_title"><?php echo get_phrase('sub_title') ?><span class="required">*</span></label>
                        <input type="text" name="sub_title" id="sub_title" class="form-control" value="<?php echo $section_2['sub_title']; ?>" required>
                    </div>

                    <div class="form-group">
                        <label for="description_1"><?php echo get_phrase('description_1'); ?></label>
                        <textarea name="description_1" id="description_1" class="form-control" rows="5"><?php echo $section_2['description_1']; ?></textarea>
                    </div>

                    <div class="form-group">
                        <label for="description_2"><?php echo get_phrase('description_2'); ?></label>
                        <textarea name="description_2" id="description_2" class="form-control" rows="5"><?php echo $section_2['description_2']; ?></textarea>
                    </div>

                    <div class="form-group">
                        <label for="button_text"><?php echo get_phrase('button_text'); ?></label>
                        <input type="text" name="button_text" id="button_text" class="form-control" value="<?php echo $section_2['button_text']; ?>">
                    </div>

                    <div class="form-group">
                        <label for="button_link"><?php echo get_phrase('button_link'); ?></label>
                        <input type="url" name="button_link" id="button_link" class="form-control" value="<?php echo $section_2['button_link']; ?>">
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
                <h4 class="mb-3 header-title"><?php echo get_phrase('Section 3'); ?></h4>
                <?php $section_3 = $this->crud_model->get_content_settings('home', 'section-3'); ?>
                <form class="required-form" action="<?php echo site_url('admin/content_settings/home/section-3'); ?>" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="title"><?php echo get_phrase('title'); ?><span class="required">*</span></label>
                        <input type="text" name="title" id="title" class="form-control" value="<?php echo $section_3['title']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="sub_title"><?php echo get_phrase('sub_title') ?><span class="required">*</span></label>
                        <input type="text" name="sub_title" id="sub_title" class="form-control" value="<?php echo $section_3['sub_title']; ?>" required>
                    </div>

                    <div class="form-group">
                        <label for="description_1"><?php echo get_phrase('description_1'); ?></label>
                        <textarea name="description_1" id="description_1" class="form-control" rows="5"><?php echo $section_3['description_1']; ?></textarea>
                    </div>



                    <div class="form-group col-xl-4">
                        <h4 class="mb-3 header-title"><?php echo get_phrase('section_image'); ?></h4>
                        <div class="row justify-content-center">
                            <div class="form-group mb-2">
                                <div class="wrapper-image-preview">
                                    <div class="box" style="width: 250px;">
                                        <div class="js--image-preview" style="background-image: url(<?php echo base_url('uploads/system/' . $section_3['image']); ?>); background-color: #F5F5F5;"></div>
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


<div class="row justify-content-center">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <h4 class="mb-3 header-title"><?php echo get_phrase('Section 4'); ?></h4>
                <?php $section_4 = $this->crud_model->get_content_settings('home', 'section-4'); ?>
                <form class="required-form" action="<?php echo site_url('admin/content_settings/home/section-4'); ?>" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="title"><?php echo get_phrase('title'); ?><span class="required">*</span></label>
                        <input type="text" name="title" id="title" class="form-control" value="<?php echo $section_4['title']; ?>" required>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-md-4">
                            <button type="submit" class="btn btn-primary btn-block"><?php echo get_phrase('update_section'); ?></button>
                        </div>
                    </div>

                </form>
                <hr>

                <div class="row justify-content-center">
                    <div class="col-xl-6 col-lg-4">
                        <div class="card" style="background-color: bisque;">
                            <div class="card-body">
                                <div class="col-md-12">
                                    <?php $sub_section_1 = $this->crud_model->get_sub_content_settings('sub_section_1'); ?>
                                    <h3 class="font-size-lg text-dark font-weight-bold mb-6">Sub Section 1:</h3>
                                    <form class="required-form" action="<?php echo site_url('admin/content_settings/home/section-4'); ?>" method="post" enctype="multipart/form-data">
                                        <input type="hidden" name="sub_section" value="sub_section_1">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="sub_section_title"><?php echo get_phrase('title'); ?><span class="required">*</span></label>
                                                <input type="text" name="sub_section_title" id="title" class="form-control"  value="<?php echo $sub_section_1['sub_section_title']; ?>" required>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="sub_section_sub_title"><?php echo get_phrase('sub_title'); ?><span class="required">*</span></label>
                                                <input type="text" name="sub_section_sub_title" id="sub_section_sub_title" class="form-control" value="<?php echo $sub_section_1['sub_section_sub_title']; ?>"  required>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" id="sub_section_image" name="sub_section_image" accept="image/*" onchange="changeTitleOfImageUploader(this)">
                                                    <label class="custom-file-label" for="sub_section_image"><?php echo get_phrase('choose_image'); ?></label>
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-primary btn-block"><?php echo get_phrase('update_section'); ?></button>
                                            </div>
                                        </div>
                                    </form>


                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-6 col-lg-4">
                        <div class="card" style="background-color: bisque;">
                            <div class="card-body">
                                <div class="col-md-12">
                                    <?php $sub_section_2 = $this->crud_model->get_sub_content_settings('sub_section_2'); ?>
                                    <h3 class="font-size-lg text-dark font-weight-bold mb-6">Sub Section 2:</h3>
                                    <form class="required-form" action="<?php echo site_url('admin/content_settings/home/section-4'); ?>" method="post" enctype="multipart/form-data">
                                        <input type="hidden" name="sub_section" value="sub_section_2">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="sub_section_title"><?php echo get_phrase('title'); ?><span class="required">*</span></label>
                                                <input type="text" name="sub_section_title" id="title" class="form-control" value="<?php echo $sub_section_2['sub_section_title']; ?>"  required>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="sub_section_sub_title"><?php echo get_phrase('sub_title'); ?><span class="required">*</span></label>
                                                <input type="text" name="sub_section_sub_title" id="sub_section_sub_title" class="form-control"  value="<?php echo $sub_section_2['sub_section_sub_title']; ?>" required>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" id="sub_section_image" name="sub_section_image" accept="image/*" onchange="changeTitleOfImageUploader(this)">
                                                    <label class="custom-file-label" for="sub_section_image"><?php echo get_phrase('choose_image'); ?></label>
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-primary btn-block"><?php echo get_phrase('update_section'); ?></button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="col-xl-6 col-lg-4">
                        <div class="card" style="background-color: bisque;">
                            <div class="card-body">
                                <div class="col-md-12">
                                    <?php $sub_section_3 = $this->crud_model->get_sub_content_settings('sub_section_3'); ?>
                                    <h3 class="font-size-lg text-dark font-weight-bold mb-6">Sub Section 3:</h3>
                                    <form class="required-form" action="<?php echo site_url('admin/content_settings/home/section-4'); ?>" method="post" enctype="multipart/form-data">
                                        <input type="hidden" name="sub_section" value="sub_section_3">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="sub_section_title"><?php echo get_phrase('title'); ?><span class="required">*</span></label>
                                                <input type="text" name="sub_section_title" id="title" class="form-control"  value="<?php echo $sub_section_3['sub_section_title']; ?>" required>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="sub_section_sub_title"><?php echo get_phrase('sub_title'); ?><span class="required">*</span></label>
                                                <input type="text" name="sub_section_sub_title" id="sub_section_sub_title" class="form-control" value="<?php echo $sub_section_3['sub_section_sub_title']; ?>"  required>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" id="sub_section_image" name="sub_section_image" accept="image/*" onchange="changeTitleOfImageUploader(this)">
                                                    <label class="custom-file-label" for="sub_section_image"><?php echo get_phrase('choose_image'); ?></label>
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-primary btn-block"><?php echo get_phrase('update_section'); ?></button>
                                            </div>
                                        </div>
                                    </form>


                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-6 col-lg-4">
                        <div class="card" style="background-color: bisque;">
                            <div class="card-body">
                                <div class="col-md-12">
                                    <?php $sub_section_4 = $this->crud_model->get_sub_content_settings('sub_section_4'); ?>
                                    <h3 class="font-size-lg text-dark font-weight-bold mb-6">Sub Section 4:</h3>
                                    <form class="required-form" action="<?php echo site_url('admin/content_settings/home/section-4'); ?>" method="post" enctype="multipart/form-data">
                                        <input type="hidden" name="sub_section" value="sub_section_4">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="sub_section_title"><?php echo get_phrase('title'); ?><span class="required">*</span></label>
                                                <input type="text" name="sub_section_title" id="title" class="form-control" value="<?php echo $sub_section_4['sub_section_title']; ?>"  required>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="sub_section_sub_title"><?php echo get_phrase('sub_title'); ?><span class="required">*</span></label>
                                                <input type="text" name="sub_section_sub_title" id="sub_section_sub_title" class="form-control"  value="<?php echo $sub_section_4['sub_section_sub_title']; ?>" required>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" id="sub_section_image" name="sub_section_image" accept="image/*" onchange="changeTitleOfImageUploader(this)">
                                                    <label class="custom-file-label" for="sub_section_image"><?php echo get_phrase('choose_image'); ?></label>
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-primary btn-block"><?php echo get_phrase('update_section'); ?></button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
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
                <h4 class="mb-3 header-title"><?php echo get_phrase('Section 5'); ?></h4>
                <?php $section_5 = $this->crud_model->get_content_settings('home', 'section-5'); ?>
                <form class="required-form" action="<?php echo site_url('admin/content_settings/home/section-5'); ?>" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="title"><?php echo get_phrase('title'); ?><span class="required">*</span></label>
                        <input type="text" name="title" id="title" class="form-control" value="<?php echo $section_5['title']; ?>" required>
                    </div>

                    <div class="form-group">
                        <label for="description_1"><?php echo get_phrase('description_1'); ?></label>
                        <textarea name="description_1" id="description_1" class="form-control" rows="5"><?php echo $section_5['description_1']; ?></textarea>
                    </div>

                    <div class="form-group">
                        <label for="button_text"><?php echo get_phrase('button_text'); ?></label>
                        <input type="text" name="button_text" id="button_text" class="form-control" value="<?php echo $section_5['button_text']; ?>">
                    </div>

                    <div class="form-group">
                        <label for="button_link"><?php echo get_phrase('button_link'); ?></label>
                        <input type="url" name="button_link" id="button_link" class="form-control" value="<?php echo $section_5['button_link']; ?>">
                    </div>

                    <div class="form-group col-xl-4">
                        <h4 class="mb-3 header-title"><?php echo get_phrase('section_image'); ?></h4>
                        <div class="row justify-content-center">
                            <div class="form-group mb-2">
                                <div class="wrapper-image-preview">
                                    <div class="box" style="width: 250px;">
                                        <div class="js--image-preview" style="background-image: url(<?php echo base_url('uploads/system/' . $section_5['image']); ?>); background-color: #F5F5F5;"></div>
                                        <div class="upload-options">
                                            <label for="image-sec-5" class="btn"> <i class="mdi mdi-camera"></i> <?php echo get_phrase('section_image'); ?> </label>
                                            <input id="image-sec-5" style="visibility:hidden;" type="file" class="image-upload" name="image" accept="image/*">
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


