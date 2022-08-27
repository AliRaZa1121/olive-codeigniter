<div class="row ">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <h4 class="page-title"> <i class="mdi mdi-apple-keyboard-command title_icon"></i> <?php echo get_phrase('organization_settings'); ?></h4>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-xl-6">
        <div class="card">
            <div class="card-body">
                <h4 class="mb-3 header-title"><?php echo get_phrase('public_organization_settings');?></h4>

                <form action="<?php echo site_url('admin/organization_settings/update'); ?>" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label><?php echo get_phrase('allow_public_organization'); ?></label>
                        <select class="form-control select2" data-toggle="select2" name="allow_organization" required>
                            <option value="1" <?php if(get_settings('allow_organization') == 1) echo 'selected'; ?>><?php echo get_phrase('yes'); ?></option>
                            <option value="0" <?php if(get_settings('allow_organization') == 0) echo 'selected'; ?>><?php echo get_phrase('no'); ?></option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="organization_application_note"><?php echo get_phrase('organization_application_note'); ?></label>
                        <div class="form-group">
                            <textarea class="form-control" name="organization_application_note" rows="8" cols="80"><?php echo get_settings('organization_application_note'); ?></textarea>
                        </div>
                    </div>

                    <div class="row justify-content-center">
                        <div class="col-md-7">
                            <button type="submit" class="btn btn-primary btn-block"><?php echo get_phrase('update_settings'); ?></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="col-xl-6">
        <div class="card">
            <div class="card-body">
                <h4 class="mb-3 header-title"><?php echo get_phrase('organization_commission_settings');?></h4>

                <form action="<?php echo site_url('admin/organization_settings/update'); ?>" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="organization_revenue"><?php echo get_phrase('organization_revenue_percentage'); ?></label>
                        <div class="input-group">
                            <input type="number" name = "organization_revenue" id = "organization_revenue" class="form-control" onkeyup="calculateAdminRevenue(this.value)" min="0" max="100" value="<?php echo get_settings('organization_revenue'); ?>">
                            <div class="input-group-append">
                                <span class="input-group-text"><i class="mdi mdi-percent"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="admin_revenue"><?php echo get_phrase('admin_revenue_percentage'); ?></label>
                        <div class="input-group">
                            <input type="number" name = "admin_revenue" id = "admin_revenue" class="form-control" value="0" disabled style="background: none; cursor: default;">
                            <div class="input-group-append">
                                <span class="input-group-text"><i class="mdi mdi-percent"></i></span>
                            </div>
                        </div>
                    </div>

                    <div class="row justify-content-center">
                        <div class="col-md-7">
                            <button type="submit" class="btn btn-primary btn-block"><?php echo get_phrase('update_settings'); ?></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        var organization_revenue = $('#organization_revenue').val();
        calculateAdminRevenue(organization_revenue);
    });
    function calculateAdminRevenue(organization_revenue) {
        if(organization_revenue <= 100){
            var admin_revenue = 100 - organization_revenue;
            $('#admin_revenue').val(admin_revenue);
        }else {
            $('#admin_revenue').val(0);
        }
    }
</script>
