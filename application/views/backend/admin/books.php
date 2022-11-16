<div class="row ">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <h4 class="page-title"> <i class="mdi mdi-apple-keyboard-command title_icon"></i> <?php echo $page_title; ?>
                    <a href="<?php echo site_url('admin/book_form/add_book_form'); ?>" class="btn btn-outline-primary btn-rounded alignToTitle"><i class="mdi mdi-plus"></i><?php echo get_phrase('Add book'); ?></a>
                </h4>
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>

<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <h4 class="mb-3 header-title"><?php echo get_phrase('Books'); ?></h4>
                <div class="table-responsive-sm mt-4">
                    <table id="basic-datatable" class="table table-striped table-centered mb-0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th><?php echo get_phrase('banner'); ?></th>
                                <th><?php echo get_phrase('file'); ?></th>
                                <th><?php echo get_phrase('name'); ?></th>
                                <th><?php echo get_phrase('slug'); ?></th>
                                <th><?php echo get_phrase('status'); ?></th>
                                <th><?php echo get_phrase('actions'); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php

                            foreach ($books->result_array() as $key => $book) :
                            ?>
                                <tr>
                                    <td><?php echo $key + 1; ?></td>
                                    <td>
                                        <img src="<?php echo base_url('uploads/thumbnails/category_thumbnails/' . $book['banner']); ?>" alt="" height="50" width="50" class="img-fluid rounded-circle img-thumbnail">
                                    </td>
                                    <td>
                                        <a target="_blank" href="<?php echo base_url('uploads/thumbnails/category_thumbnails/' . $book['file']); ?>" alt="" height="50" width="50" class="btn btn-primary">Click here</a>
                                    </td>
                                    <td><?php echo $book['name']; ?></td>
                                    <td><?php echo $book['slug']; ?></td>
                                    <td><span class="badge badge-<?php echo $book['status'] == 'enable' ? 'success' : 'danger'; ?>-lighten"><?php echo get_phrase($book['status']) ?></span></td>
                                    <td>
                                        <div class="dropright dropright">
                                            <button type="button" class="btn btn-sm btn-outline-primary btn-rounded btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="mdi mdi-dots-vertical"></i>
                                            </button>
                                            <ul class="dropdown-menu">
                                                <li><a class="dropdown-item" href="#"><?php echo get_phrase('view_details'); ?></a></li>
                                                <li><a class="dropdown-item" href="<?php echo site_url('admin/book_form/edit_book_form/' . $book['id']) ?>"><?php echo get_phrase('edit'); ?></a></li>
                                                <li><a class="dropdown-item" href="#" onclick="confirm_modal('<?php echo site_url('admin/books/delete/' . $book['id']); ?>');"><?php echo get_phrase('delete'); ?></a></li>
                                                <?php
                                                if($book['status'] == 'enable'):
                                                ?>
                                                <li><a class="dropdown-item" href="<?php echo site_url('admin/books/status/'. $book['id']) ?>"><?php echo get_phrase('disable'); ?></a></li>
                                                <?php else: ?>
                                                    <li><a class="dropdown-item" href="<?php echo site_url('admin/books/status/'. $book['id']) ?>"><?php echo get_phrase('enable'); ?></a></li>
                                                <?php endif; ?>
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