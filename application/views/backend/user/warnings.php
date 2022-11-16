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
                <h4 class="mb-3 header-title"><?php echo 'Warnings'; ?></h4>
                <div class="table-responsive-sm mt-4">
                    <table id="basic-datatable" class="table table-striped table-centered mb-0">
                        <thead>
                            <tr>
                                <th>#</th>
                              
                                <th><?php echo 'Warning'; ?></th>
                                <th><?php echo get_phrase('actions'); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($warnings as $key => $warning) : ?>
                                <tr class="warning" data-id="<?php echo $warning['id'] ?>">
                                    <td><?php echo $key + 1; ?></td>
                                    <td>
                                        <?php echo $warning['warning']; ?>
                                    </td>
                                    <td>
                                        <div class="dropright dropright">
                                            <button type="button" class="btn btn-sm btn-outline-primary btn-rounded btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="mdi mdi-dots-vertical"></i>
                                            </button>
                                            <ul class="dropdown-menu">
                                               
                                                <li><a class="dropdown-item reply-btn"  data-id="<?php echo $warning['id'] ?>">Reply</a></li>
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
        <h5 class="modal-title" id="exampleModalLabel">Reply</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
     <form action="<?php echo site_url('user/warning_reply'); ?>" method="post" >
          <div class="modal-body">
             
            <div class="form-group">
                <label>Reply</label>
                <input name="id" type="hidden" value="">
                <textarea class="form-control" rows="5" name="reply"></textarea>
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
    $(document).on('click', '.reply-btn', function(){
        var id = $(this).attr('data-id');
        $('input[name="id"]').val(id);
        $('#exampleModal').modal('show');
    })
    
    $(document).on('click', '.warning', function(){
        var id = $(this).attr('data-id');
        var base_url = "<?php echo site_url() ?>";
        var url = base_url +'user/warning_status/'+ id;
        console.log(url)
        $.ajax({
            url: url,
            type: "get",
            success: function(data){
              
               if(!data){
                   $('.sticky-alert').hide();
               }
            }
        })
    })
</script>