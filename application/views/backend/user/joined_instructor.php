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
                <h4 class="mb-3 header-title"><?php echo 'Joined Instructor List'; ?></h4>
                <div class="table-responsive-sm mt-4">
                    <table id="basic-datatable" class="table table-striped table-centered mb-0">
                        <thead>
                            <tr>
                                <th>#</th>
                              
                                <th><?php echo 'Instructor'; ?></th>
                                <th><?php echo get_phrase('status'); ?></th>
                                <th><?php echo get_phrase('actions'); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($joined_list as $key => $row) : ?>
                                <tr>
                                    <td><?php echo $key + 1; ?></td>
                                    <td>
                                        <?php echo $row['teacher_name']; ?>
                                    </td>
                                    <td>
                                        <?php 
                                                if( $row['status'] == 1 &&  $row['quit_status'] == null){ ?>
                                                    
                                                    <div class="badge badge-pill badge-success">Joined</div>
                                                <?php  } else if($row['status'] == 0 &&  $row['quit_status'] != 1){ ?>    
                                                    <div class="badge badge-pill badge-warning">join Request</div>
                                                <?php  } else if($row['status'] == 1 &&  $row['quit_status'] == 0){ ?>    
                                                    <div class="badge badge-pill badge-warning">Quit Request</div>
                                                <?php } else if($row['status'] != 1 &&  $row['quit_status'] == 1){ ?>    
                                                    <div class="badge badge-pill badge-danger">Quitted</div>
                                                <?php }  ?>
                                        
                                    </td>
                                    <td>
                                        <div class="dropright dropright">
                                            <button type="button" class="btn btn-sm btn-outline-primary btn-rounded btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="mdi mdi-dots-vertical"></i>
                                            </button>
                                           
                                            <ul class="dropdown-menu">
                                                <?php 
                                                if( $row['status'] == 1 &&  $row['quit_status'] == null){ ?>
                                                    <li><a class="dropdown-item action-btn quit-btn" data-action="quit" data-id="<?php echo $row['id'] ?>">Quit</a></li>
                                                <?php  } else if($row['status'] == 0 &&  $row['quit_status'] != 1){ ?>    
                                                    <li><a class="dropdown-item action-btn accept-btn" data-action="accept"  data-id="<?php echo $row['id'] ?>">Accept</a></li>
                                                    <li><a class="dropdown-item action-btn reject-btn" data-action="reject" data-id="<?php echo $row['id'] ?>">Reject Join Reject</a></li>
                                                <?php  } else if($row['status'] == 1 &&  $row['quit_status'] == 0){ ?>    
                                                    <li><a class="dropdown-item action-btn quit-btn" data-action="quit" data-id="<?php echo $row['id'] ?>">Quit</a></li>
                                                    <li><a class="dropdown-item action-btn quit-reject-btn" data-action="quit-reject" data-id="<?php echo $row['id'] ?>">Reject Quit Request</a></li>
                                                <?php } else if($row['status'] == 1 &&  $row['quit_status'] == 2){ ?>    
                                                    <li><a class="dropdown-item action-btn accept-btn" data-action="accept"  data-id="<?php echo $row['id'] ?>">Accept</a></li>
                                                    <li><a class="dropdown-item action-btn reject-btn" data-action="reject" data-id="<?php echo $row['id'] ?>">Reject Join Reject</a></li>
                                                <?php }  ?>
                                               
                                               
                                                
                                                
                                                
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


