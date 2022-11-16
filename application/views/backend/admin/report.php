<div class="row ">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <h4 class="page-title"> <i class="mdi mdi-apple-keyboard-command title_icon"></i> <?php echo $page_title; ?>
                    <a hidden href="<?php echo site_url('admin/instructor_form/add_instructor_form'); ?>" class="btn btn-outline-primary btn-rounded alignToTitle"><i class="mdi mdi-plus"></i><?php echo get_phrase('add_instructor'); ?></a>
                </h4>
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>

<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <h4 class="mb-3 header-title"><?php echo 'Reports'; ?></h4>
                <div class="table-responsive-sm mt-4">
                    <table id="basic-datatable" class="table table-striped table-centered mb-0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th><?php echo 'User'; ?></th>
                                <th><?php echo 'Role'; ?></th>
                                <th><?php echo 'Program'; ?></th>
                                <th><?php echo 'Reason'; ?></th>
                                <th><?php echo get_phrase('actions'); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($reports as $key => $report) : ?>
                                <tr>
                                    <td><?php echo $key + 1; ?></td>
                                    <td><?php echo $report['first_name'] . ' ' . $report['last_name']; ?></td>
                                    <td><?php if($report['is_instructor']) echo 'Instructor'; else echo 'Student'; ?></td>
                                    <td>
                                        <?php echo $report['course_name']; ?>
                                    </td>
                                    <td>
                                        <?php echo $report['reason']; ?>
                                    </td>
                                    <td>
                                        <div class="dropright dropright">
                                            <button type="button" class="btn btn-sm btn-outline-primary btn-rounded btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="mdi mdi-dots-vertical"></i>
                                            </button>
                                            <ul class="dropdown-menu">
                                                <li><a class="dropdown-item" href="<?php echo site_url('admin/report_actions/suspend/'. $report['user_id'] . '/' . $report['id'] ) ?>" >Suspend</a></li>
                                                <li><a class="dropdown-item warning-btn"  data-user-id="<?php echo $report['user_id'] ?>" data-id="<?php echo $report['id']?>">Warning</a></li>
                                                <li><a class="dropdown-item" href="<?php echo site_url('admin/report_actions/ban/'. $report['user_id'] . '/' . $report['id'] ) ?>" >Ban</a></li>
                                                <li><a class="dropdown-item" href="<?php echo site_url('admin/report_actions/terminate/'. $report['user_id'] . '/' . $report['id'] ) ?>" >Terminate Report</a></li>
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