
<div class="row ">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <h4 class="page-title"> <i class="mdi mdi-apple-keyboard-command title_icon"></i> Join Academy </h4>
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>

<div class="card">
    <div class="card-body">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <form action="<?php echo site_url('user/join_academy_request'); ?>" method="post">
    
    
    <div class="form-group">
        <label for="organization_id"><?php echo 'Organizations'; ?></label>
        <select class="form-control select2" data-toggle="select2" name="organization_id" id="organization_id" required>
            <option value=""> Select Organization</option>
           
           
            <?php var_dump($organizations); foreach ($organizations as $organization): ?>
                <option value="<?php echo $organization['id']; ?>"><?php echo $organization['first_name']. $organization['last_name']; ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    
    
    
    
   
    <div class="text-center">
        <button class = "btn btn-success" type="submit" name="button"><?php echo get_phrase('submit'); ?></button>
    </div>
</form>
            </div> <!-- end col -->
        </div> <!-- end row -->
    </div>
</div>



