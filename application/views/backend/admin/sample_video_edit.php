<?php


		$sample_video = $this->crud_model->get_sample_video_by_id($sample_video_id)->row_array();
			
?>

<div class="row ">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <h4 class="page-title"> <i class="mdi mdi-apple-keyboard-command title_icon"></i> Sample Videos</h4>
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>

<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">

                <div class="row">
                    <div class="col-md-6">
                        <h4 class="header-title my-1">Edit Sample Video</h4>
						
                    </div>
                    <div class="col-md-6">
                        <a href="" class="alignToTitle btn btn-outline-secondary btn-rounded btn-sm my-1"> <i class=" mdi mdi-keyboard-backspace"></i> Sample Video List</a>
                    </div>
                </div>

                <div class="row">
                    <div class="col-xl-12">
                        <form class="required-form" action="<?php echo site_url('admin/sample_video_actions/edit'); ?>" method="post" enctype="multipart/form-data">
							<div class="from-group mb-4">
								<label for="course">Course<span class="required">*</span></label>
                                <select name="course_id" id="course" class="form-control select2">
									<option value=""> Select Course</option>
								
									<?php 
										foreach($courses->result_array() as $course){  ?>
											<option value="<?php echo $course['id']; ?>" <?php if($course['id'] == $sample_video['course_id']) echo "selected"; ?>> <?php echo $course['title']; ?></option>
											
									<?php	}
									?>



								</select>
								
							<div>

							<div class="from-group mb-4">
								<label for="title">Title<span class="required">*</span></label>
                                <input type="text" class="form-control" id="title" name="title" value="<?php echo $sample_video['title'] ?>" >
								
							<div>


							<div class="from-group mb-4">
								<label for="video">Video<span class="required">*</span></label>
								<input type="file" class="form-control dropify" id="video" name="video" >
								
							<div>

							<div class="from-group mb-4">
								<label for="image">image<span class="required">*</span></label>
                                <input type="file" class="form-control dropify" id="image" name="image" >
								
							<div>

							<div class="from-group mb-4">
								<button type="submit" class="btn btn-info" name="submit"> Submit</button>
								
							<div>
                    </form>
                </div>
            </div><!-- end row-->
        </div> <!-- end card-body-->
    </div> <!-- end card-->
</div>
</div>

<script>
	$(document).ready(function(){
		$('.select2').select2();
		$('.dropify').dropify();
	})
</script>

<style media="screen">
body {
  /* overflow-x: hidden; */
}
</style>
