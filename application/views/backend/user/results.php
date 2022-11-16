<div class="row ">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <h4 class="page-title"> <i class="mdi mdi-apple-keyboard-command title_icon"></i> <?php echo $page_title; ?></h4>
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>
<div class="card">
  <div class="card-body">
    <div class="table-responsive-sm mt-4">
       <table id="basic-datatable" class="table table-striped table-centered mb-0">
          <thead>
            <tr> 
              <th><?php echo get_phrase('result_id'); ?></th>
              <th><?php echo get_phrase('quiz'); ?></th>
              <th><?php echo get_phrase('answer'); ?></th>
              <th><?php echo get_phrase('marks'); ?></th>
             
            </tr>
          </thead>
          <tbody>
              <?php foreach ($results->result_array() as $key => $result): ?>
                <tr>
                  <td>1</td>
                  
                  <td>
                    <?php echo $this->customer_support_model->get_questions($result['question_id'])->row('title'); ?>
                  </td>
                  <td>
                    <?php echo $result['answer']?>
                  </td>
                  
                  <td><?php if($result['marks']){ echo $result['marks']; } else{   echo "No Marks";?>  <?php } ?></td>
                  
                </tr>
              <?php endforeach; ?>
          </tbody>
        </table>
      
    </div>
    
  </div>
</div>