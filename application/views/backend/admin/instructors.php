<div class="row ">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <h4 class="page-title"> <i class="mdi mdi-apple-keyboard-command title_icon"></i> <?php echo $page_title; ?>
                    <a href="<?php echo site_url('admin/instructor_form/add_instructor_form'); ?>" class="btn btn-outline-primary btn-rounded alignToTitle"><i class="mdi mdi-plus"></i><?php echo get_phrase('add_Coach'); ?></a>
                </h4>
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>

<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <h4 class="mb-3 header-title"><?php echo get_phrase('coaches'); ?></h4>
                <div class="table-responsive-sm mt-4">
                    <table id="basic-datatable" class="table table-striped table-centered mb-0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th><?php echo get_phrase('photo'); ?></th>
                                <th><?php echo get_phrase('name'); ?></th>
                                <th><?php echo get_phrase('email'); ?></th>
                                <th><?php echo get_phrase('number_of_active_programs'); ?></th>
                                <th><?php echo get_phrase('actions'); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($instructors as $key => $user) : ?>
                                <tr>
                                    <td><?php echo $key + 1; ?></td>
                                    <td>
                                        <img src="<?php echo $this->user_model->get_user_image_url($user['id']); ?>" alt="" height="50" width="50" class="img-fluid rounded-circle img-thumbnail">
                                    </td>
                                    <td><?php echo $user['first_name'] . ' ' . $user['last_name']; ?></td>
                                    <td><?php echo $user['email']; ?></td>
                                    <td>
                                        <?php echo $this->user_model->get_number_of_active_courses_of_instructor($user['id']) . ' ' . strtolower(get_phrase('active_programs')); ?>
                                    </td>
                                    <td>
                                        <div class="dropright dropright">
                                            <button type="button" class="btn btn-sm btn-outline-primary btn-rounded btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="mdi mdi-dots-vertical"></i>
                                            </button>
                                            <ul class="dropdown-menu">
                                                <li><a class="dropdown-item" href="<?php echo site_url('admin/courses?category_id=all&status=all&instructor_id=' . $user['id'] . '&price=all') ?>"><?php echo get_phrase('view_programs'); ?></a></li>
                                                <li><a class="dropdown-item" href="<?php echo site_url('admin/instructor_form/edit_instructor_form/' . $user['id']) ?>"><?php echo get_phrase('edit'); ?></a></li>
                                                <li><a class="dropdown-item" href="#" onclick="confirm_modal('<?php echo site_url('admin/instructors/delete/' . $user['id']); ?>');"><?php echo get_phrase('delete'); ?></a></li>
                                                <li><a class="dropdown-item" href="#" onclick="confirm_modal('<?php echo site_url('admin/instructors/suspend/' . $user['id']); ?>');"> <?php if($user['status'] == 2) echo 'Active'; else echo 'Suspend'; ?></a></li>
                                                <li><a class="dropdown-item warning-btn"  data-user-id="<?php echo $user['id'] ?>" data-id="<?php echo $user['id']?>">Warning</a></li>
                                                <li><a class="dropdown-item" href="<?php echo site_url('admin/report_actions/ban/'. $user['id'] . '/' . $user['id'] ) ?>" >Ban</a></li>
                                                <?php if($user['is_featured_instructor']){ ?>
                                                    <li><a class="dropdown-item" href="<?php echo site_url('admin/report_actions/remove_from_featured/'. $user['id']) ?>" >Remove From Featured</a></li>
                                                <?php } else{  ?>
                                                    <li><a class="dropdown-item" href="<?php echo site_url('admin/report_actions/add_to_featured/'. $user['id']) ?>" >Add To Featured Instructor</a></li>
                                                <?php } ?>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>

<!-- Warning Model -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Wraning</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
     <form action="<?php echo site_url('admin/report_actions/warning'); ?>" method="post" >
          <div class="modal-body">
             
            <div class="form-group">
                <label>Warning</label>
                <input name="user_id" type="hidden" value="">
                 <input name="id" type="hidden" value="">
                <textarea class="form-control" rows="5" name="warning"></textarea>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Submit</button>
          </div>
    </form>
    </div>
  </div>
</div>
<script>
    $(document).on('click', '.warning-btn', function(){
        var user_id = $(this).attr('data-user-id');
        var id = $(this).attr('data-id');
        $('input[name="user_id"]').val(user_id);
        $('input[name="id"]').val(id);
        $('#exampleModal').modal('show');
    })
</script>