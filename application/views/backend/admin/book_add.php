<div class="row ">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <h4 class="page-title"> <i class="mdi mdi-apple-keyboard-command title_icon"></i> <?php echo $page_title; ?> </h4>
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>
<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">

                <h4 class="header-title mb-3"><?php echo get_phrase('organization_add_form'); ?></h4>

                <form class="required-form" action="<?php echo site_url('admin/books/add'); ?>" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group row mb-3">
                                <label class="col-md-3 col-form-label" for="title"><?php echo get_phrase('title'); ?><span class="required">*</span></label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" id="name" name="name" required>
                                </div>
                            </div>
                            <div class="form-group row mb-3">
                                <label class="col-md-3 col-form-label" for="description"><?php echo get_phrase('description'); ?></label>
                                <div class="col-md-9">
                                    <textarea name="description" id="summernote-basic" class="form-control" required></textarea>
                                </div>
                            </div>
                            
                            <div class="form-group row mb-3">
                                <label class="col-md-3 col-form-label" for="file"><?php echo get_phrase('Pdf_file'); ?><span class="required">*</span></label>
                                <div class="col-md-9">
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="file" name="file" required accept="application/pdf" onchange="changeTitleOfImageUploader(this)">
                                            <label class="custom-file-label" for="file"><?php echo get_phrase('choose_file'); ?></label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row mb-3">
                                <label class="col-md-3 col-form-label" for="banner"><?php echo get_phrase('banner_photo'); ?><span class="required">*</span></label>
                                <div class="col-md-9">
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="banner" name="banner" required accept="image/*" onchange="changeTitleOfImageUploader(this)">
                                            <label class="custom-file-label" for="image"><?php echo get_phrase('choose_image'); ?></label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="text-center">
                                <div class="mb-3">
                                    <button type="button" class="btn btn-primary" onclick="checkRequiredFields()" name="button">Submit</button>
                                </div>
                            </div>

                        </div> <!-- end col -->
                    </div> <!-- end row -->
                </form>

            </div> <!-- end card-body -->
        </div> <!-- end card-->
    </div>
</div>