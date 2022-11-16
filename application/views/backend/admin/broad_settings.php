<?php

$mysqli = new mysqli("localhost","root","","edutrainia_web");
$sql = "SELECT * FROM category WHERE parent != '0' ORDER BY id";
$result = $mysqli->query($sql);

// // Fetch all
//$result->fetch_all(MYSQLI_ASSOC);

// // Free result set
// $result -> free_result();

// ?>

<div class="row ">


    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <h4 class="page-title"> <i class="mdi mdi-apple-keyboard-command title_icon"></i>
                    <?php echo $page_title; ?>
                    <a href="<?php echo site_url('admin/coupon_form/add_coupon_form'); ?>"
                        class="btn btn-outline-primary btn-rounded alignToTitle"><i
                            class="mdi mdi-plus"></i><?php echo get_phrase('add_new_coupon'); ?></a>
                </h4>
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>

<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <h4 class="mb-3 header-title"><?php echo get_phrase('featured'); ?></h4>
                <div class="table-responsive-sm mt-4">
                    <table id="basic-datatable" class="table table-striped table-centered mb-0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th><?php echo get_phrase('name'); ?></th>

                                <th><?php echo get_phrase('actions'); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($result as $key => $coupon) : ?>
                            <tr>
                                <td><?php echo $key + 1; ?></td>
                                <td><strong><?php echo $coupon['name']; ?></strong></td>
                                <td>
                                    <div class="custom-control custom-switch">
                                        <input type="checkbox" class="custom-control-input" data-id="<?php echo $coupon['id']; ?>" id="customSwitches<?php echo $key + 1; ?>"  data-toggle="modal" data-target="#exampleModalCenter">
                                        <label class="custom-control-label" for="customSwitches<?php echo $key + 1; ?>"></label>
                                    </div>
                                </td>

                                <!-- <td>
                                        <div class="dropright dropright">
                                            <button type="button" class="btn btn-sm btn-outline-primary btn-rounded btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="mdi mdi-dots-vertical"></i>
                                            </button>
                                            <ul class="dropdown-menu">
                                                <li><a class="dropdown-item" href="<?php echo site_url('admin/coupon_form/edit_coupon_form/' . $coupon['id']) ?>"><?php echo get_phrase('edit'); ?></a></li>
                                                <li><a class="dropdown-item" href="#" onclick="confirm_modal('<?php echo site_url('admin/coupons/delete/' . $coupon['id']); ?>');"><?php echo get_phrase('delete'); ?></a></li>
                                            </ul>
                                        </div>
                                    </td> -->
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>


<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"></h4>
      </div>
      <div class="modal-body">
        

      <form action="">
     
      <div class="form-group">
         <label for="">Heading</label>
         <input type="text" name="heading"  placeholder="Heading" class="form-control">
      </div>

      <div class="form-group">
          <label for="">Content</label>
          <textarea class="form-control" name="content" id="" cols="30" rows="10" placeholder="content"></textarea>
      </div>

     

      <!-- <textarea name="" id="" cols="30" rows="10" placeholder="">    </textarea> -->

      </form>



      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>


<script>
    $('input[type="checkbox"]').on('change', function(e){
   if(e.target.checked){
     $('#myModal').modal();

    //  $.ajax({
    //     url: "featured_update.php",
    //     type: "post",
    //     data: {parent: "", p2: "value2"},
    //     success: function (response) {
          
    //         // alert(response);
    //        // You will get response from your PHP page (what you echo or print)
    //     },
    //     error: function(jqXHR, textStatus, errorThrown) {
    //        console.log(textStatus, errorThrown);
    //     }
    // });



   }


  




});
</script>
