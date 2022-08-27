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


                <form class="required-form" action="<?php echo site_url('admin/organizations/edit/' . $organization_id); ?>" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group row mb-3">
                                <label class="col-md-3 col-form-label" for="title"><?php echo get_phrase('title'); ?><span class="required">*</span></label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" value="<?php echo $organization['name'] ?>" id="name" name="name" required>
                                </div>
                            </div>
                            <div class="form-group row mb-3">
                                <label class="col-md-3 col-form-label" for="description"><?php echo get_phrase('description'); ?></label>
                                <div class="col-md-9">
                                    <textarea name="description" id="summernote-basic" class="form-control" required><?php echo $organization['description'] ?></textarea>
                                </div>
                            </div>

                            <div class="form-group row mb-3">
                                <label class="col-md-3 col-form-label" for="banner"><?php echo get_phrase('banner_photo'); ?><span class="required">*</span></label>
                                <div class="col-md-9">
                                    <div class="d-flex">
                                        <div class="">
                                            <img class="rounded-circle img-thumbnail" src="<?php echo base_url('uploads/thumbnails/category_thumbnails/' . $organization['banner']); ?>" alt="" style="height: 50px; width: 50px;">
                                        </div>
                                        <div class="flex-grow-1 mt-1 pl-3">
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" id="banner" name="banner" accept="image/*" onchange="changeTitleOfImageUploader(this)">
                                                    <label class="custom-file-label" for="banner"><?php echo get_phrase('choose_banner'); ?></label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row mb-3">
                                <label class="col-md-3 col-form-label" for="thumbnail"><?php echo get_phrase('logo'); ?><span class="required">*</span></label>

                                <div class="col-md-9">
                                    <div class="d-flex">
                                        <div class="">
                                            <img class="rounded-circle img-thumbnail" src="<?php echo base_url('uploads/thumbnails/category_thumbnails/' . $organization['logo']); ?>" alt="" style="height: 50px; width: 50px;">
                                        </div>
                                        <div class="flex-grow-1 mt-1 pl-3">
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" id="logo" name="logo" accept="image/*" onchange="changeTitleOfImageUploader(this)">
                                                    <label class="custom-file-label" for="banner"><?php echo get_phrase('choose_logo'); ?></label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="text-center">
                                <div class="mb-3">
                                    <button type="button" class="btn btn-primary" onclick="checkRequiredFields()" name="button">Save Changes</button>
                                </div>
                            </div>

                        </div> <!-- end col -->
                    </div> <!-- end row -->
                </form>

            </div> <!-- end card-body -->
        </div> <!-- end card-->
    </div>
</div>