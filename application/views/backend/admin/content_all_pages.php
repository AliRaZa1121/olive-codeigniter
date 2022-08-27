<div class="row ">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <h4 class="page-title"> <i class="mdi mdi-apple-keyboard-command title_icon"></i> <?php echo $page_title; ?>
                </h4>
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>

<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <h4 class="mb-3 header-title"><?php echo get_phrase('all_pages'); ?></h4>
                <div class="table-responsive-sm mt-4">
                    <table id="basic-datatable" class="table table-striped table-centered mb-0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th><?php echo get_phrase('page_name'); ?></th>
                                <th><?php echo get_phrase('actions'); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php

                            foreach ($all_pages_list->result_array() as $key => $page) :
                            ?>
                                <tr>
                                    <td><?php echo $key + 1; ?></td>
                                    <td><?php echo strtoupper($page['page_name']); ?></td>
                                    <td>
                                    <a href="<?php echo base_url('admin/content_settings/' . $page['page_name']); ?>" alt="" height="50" width="50" class="btn btn-primary">Sections</a> 
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
            <form action="<?php echo site_url('admin/report_actions/warning'); ?>" method="post">
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
    $(document).on('click', '.warning-btn', function() {
        var user_id = $(this).attr('data-user-id');
        var id = $(this).attr('data-id');
        $('input[name="user_id"]').val(user_id);
        $('input[name="id"]').val(id);
        $('#exampleModal').modal('show');
    })
</script>