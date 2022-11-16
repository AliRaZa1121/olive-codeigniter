
<div class="row ">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <h4 class="page-title"> <i class="mdi mdi-apple-keyboard-command title_icon"></i> Report <?php if($this->session->userdata('is_instructor')) echo 'Trainee'; else echo 'Coach'; ?></h4>
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>


<div class="card">
    <div class="card-body">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <form action="<?php echo site_url('user/report_submit'); ?>" method="post">
    
    
    <div class="form-group">
        <label for="course_id"><?php echo 'Programs'; ?></label>
        <select class="form-control select2" data-toggle="select2" name="course_id" id="course_id" required>
            <option value=""> Select Program</option>
           
            <?php foreach ($courses as $course): ?>
                <option value="<?php echo $course['id']; ?>"><?php echo $course['title']; ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    
    
    <div class="form-group">
        <label for="user_id"><?php if($this->session->userdata('is_instructor')) echo get_phrase('trainee'); else echo get_phrase('coach'); ?></label>
        <select class="form-control select2" data-toggle="select2" name="user_id" id="user_id" required>
                <option value=""> Select <?php if($this->session->userdata('is_instructor')) echo get_phrase('trainee'); else echo get_phrase('coach'); ?></option>
           
        </select>
    </div>
    
   <div class="form-group">
                <label>Reason</label>
                <textarea class="form-control" rows="5" name="reason"></textarea>
    </div>
    <div class="text-center">
        <button class = "btn btn-success" type="submit" name="button"><?php echo get_phrase('submit'); ?></button>
    </div>
</form>
            </div> <!-- end col -->
        </div> <!-- end row -->
    </div>
</div>





<script>
    $(document).ready(function(){
        $(document).on('change', '#course_id', function(){
            var course_id = $(this).val();
         
            console.log(course_id)
            var base_url = "<?php echo base_url() ?>";
            $.ajax({
                url: base_url + 'user/get_users_by_course_id/'+ course_id,
                type: "get",
                success: function(data){
                    console.log(data);
                   var data = JSON.parse(data);
                   
                   var first_option = "<?php if($this->session->userdata('is_instructor')) echo 'Student or Organization'; if($this->session->userdata('is_organization')) echo 'Student or Instructor';  else echo 'Teacher or Organization'; ?>";
                   var ele = '<option value=""> Select '+  first_option +' </option>';
                   $('#user_id').html(ele)
                   $.each(data, function(key, value){
                       var element = '<option value="'+ value.id +'"> '+ value.first_name +' </option>';
                       $('#user_id').append(element)
                   })
                }
            })
        })
    })
    
</script>
