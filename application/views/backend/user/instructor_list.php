<div class="row ">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <h4 class="page-title"> <i class="mdi mdi-apple-keyboard-command title_icon"></i> <?php echo $page_title; ?>
                    <!--<a hidden href="<?php echo site_url('admin/instructor_form/add_instructor_form'); ?>" class="btn btn-outline-primary btn-rounded alignToTitle"><i class="mdi mdi-plus"></i><?php echo get_phrase('add_instructor'); ?></a>-->
                </h4>
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>

<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <h4 class="mb-3 header-title"><?php echo 'Instructor List'; ?></h4>
                <div class="table-responsive-sm mt-4">
                    <table id="basic-datatable" class="table table-striped table-centered mb-0">
                        <thead>
                            <tr>
                                <th>#</th>
                              
                                <th><?php echo 'Instructor'; ?></th>
                                <th><?php echo 'Email' ?></th>
                                <th><?php echo get_phrase('actions'); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($instructor_list as $key => $row) : ?>
                                <tr>
                                    <td><?php echo $key + 1; ?></td>
                                    <td>
                                        <?php echo $row['first_name']??''.' '.$row['last_name']??''; ?>
                                    </td>
                                    <td>
                                        <?php echo $row['email']; ?>
                                    </td>
                                 
                                    <td>
                                        <div class="dropright dropright">
                                            <button type="button" class="btn btn-sm btn-outline-primary btn-rounded btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="mdi mdi-dots-vertical"></i>
                                            </button>
                                           
                                            <ul class="dropdown-menu">
                                                <li><a class="dropdown-item action-btn accept-btn" href="<?php echo site_url('user/register_instructor/'. $row['id']); ?>" >Register as Instructor</a></li>
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


<script>
     $(document).on('click', '.action-btn', function(){
        var id = $(this).attr('data-id');
        var action = $(this).attr('data-action');
        var base_url = "<?php echo site_url() ?>";
        var url = base_url +'user/change_academy_status/'+ id+ '/' + action;
        console.log(url)
        $.ajax({
            url: url,
            type: "get",
            success: function(data){
              console.log(data)
              if(data = "Status Change Successfully"){
                  if(action == "accept"){
                      $('.badge').addClass('badge-success').removeClass('badge-danger badge-warning').html('Joined');
                  }
                  else if(action == "quit"){
                       $('.badge').addClass('badge-danger').removeClass('badge-success badge-warning').html('Rejected');
                  }
                  else{
                       $('.badge').addClass('badge-warning').removeClass('badge-success badge-danger').html('Requested');
                  }
              }
            }
        })
        
      
    })
</script>


