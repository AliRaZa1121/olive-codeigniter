<div class="row">
    <div class="col-lg-12">
        <div class="card text-white bg-quiz-result-info mb-3">
            <div class="card-body">
                <h5 class="card-title"><?php echo get_phrase('review_the_course_materials_to_expand_your_learning'); ?>.</h5>
                <p class="card-text"><?php echo get_phrase('you_got').' '.$total_correct_answers.' '.get_phrase('out_of').' '.$total_questions.' '.get_phrase('correct'); ?> .</p>
            </div>
        </div>
    </div>
</div>

<?php 
foreach ($submitted_quiz_info as $each):
    $question_details = $this->crud_model->get_quiz_question_by_id($each['question_id'])->row_array();
    $options = json_decode($question_details['options']);
    $correct_answers = json_decode($each['correct_answers']);
    $submitted_answers = json_decode($each['submitted_answers']);
    // var_dump($each);
?>
<div class="row mb-4">
    <div class="col-lg-12">
        <div class="card text-left card-with-no-color-no-border">
            <div class="card-body">
                <h6 class="card-title"><img src="<?php echo $each['submitted_answer_status'] == 1 ? base_url('assets/frontend/default/img/green-tick.png') : base_url('assets/frontend/default/img/red-cross.png'); ?>" alt="" height="15px;"> <?php echo $question_details['title']; ?></h6>
                <?php for ($i = 0; $i < count($correct_answers); $i++): ?>
                    <p class="card-text"> -
                        <?php echo $options[($correct_answers[$i] - 1)]; ?>
                        <img src="<?php echo base_url('assets/frontend/default/img/green-circle-tick.png'); ?>" alt="" height="15px;">
                    </p>
                <?php endfor; ?>
                <p class="card-text"> <strong><?php echo get_phrase("submitted_answers"); ?>: </strong> [
                    <?php
                    $submitted_answers_as_csv = "";
                    for ($i = 0; $i < count($submitted_answers); $i++){
                        $submitted_answers_as_csv .= $options[($submitted_answers[$i] - 1)].', ';
                    }
                    echo rtrim($submitted_answers_as_csv, ', ');
                    ?>
                    ]</p>
            </div>
        </div>
    </div>
</div>
<?php endforeach; ?>

<?php 

$this->db->where('course_id', 89);
// here we select every column of the table
$q = $this->db->get('lesson');
$data = $q->result_array();

// echo($data[0]['id']);

// $last_segment = $this->uri->segment($this->uri->total_segments());
// echo urldecode($last_segment);

?>

    
<div class="row mb-4">
   
    <div style="text-align:right">
       <?php
       
            $url= $_SERVER['HTTP_REFERER'];
            $arr =explode('/',$url);
            $id = $arr[7];
            $conn = mysqli_connect('localhost', 'edutrainia_stagging', 'edutrainia_stagging', 'edutrainia_stagging');
            $query = "SELECT id FROM lesson WHERE lesson_type = 'quiz' and id = (SELECT MIN(id) FROM lesson WHERE id > $id)";     
            $result = mysqli_query($conn, $query);
            $popular_courses = mysqli_fetch_all($result,MYSQLI_ASSOC);
            
            // $url= $_SERVER['HTTP_REFERER'];
            // $arr =explode('/',$url);
            // $id = $arr[7];
            // var_dump($id);
            // var_dump($popular_courses);
            // echo 'submitted_answers ' . (count($submitted_answers));
            // echo 'correct_answers '. (count($correct_answers));
          ?>
        
        <?php 
        
        $correct_quiz_count = 0;
        $total_quiz_count = 0;
        foreach ($submitted_quiz_info as $each){
            $question_details = $this->crud_model->get_quiz_question_by_id($each['question_id'])->row_array();
            $options = json_decode($question_details['options']);
            $correct_answers = json_decode($each['correct_answers']);
            $submitted_answers = json_decode($each['submitted_answers']);
            if($submitted_answers == $correct_answers){
                $correct_quiz_count++;
            }
            $total_quiz_count++;
            
        }
 ?> 
            <?php $_id = null;  
                    foreach($popular_courses as $latest_course => $latest_course) {
                        $_id =  $latest_course['id'];
                    } ?>


<?php

        if($correct_quiz_count == $total_quiz_count){?>
            <button type="button" name="button" class="btn btn-dark" id="continue" data-id="<?php echo $_id; ?>" style="color: #fff;">
                 <a href="javascript::" id = "<?php echo $_id; ?>"    style="color: #fff;">Continue</a>
            </button>
        <?php } else{ ?>        
            <button type="button" name="button" class="btn btn-secondary" style="color: #fff;">
                 <a href="javascript::" name="button" style="color: #fff;" onclick="location.reload();"><?php echo get_phrase("try_again"); ?></a>
            </button>
        <?php }  ?>        
        
        
        
            
       
            
        
         
       
    </div>
</div>


<script>
   
     
   

$(document).ready(function(){   

    $("#continue").click(function()
    {       
    var url = document.URL;
   var arr = url.split("/");
   var course_name =  arr[5];
   var course_id = arr[6];
   var lesson_id = arr[7];
   var less = $(this).attr('data-id');
   var a = lesson_id ++;
    var get_url =  "<?php echo site_url();?>home/lesson/"+course_name+'/'+course_id+'/'+less;
    // console.log(lesson_id);
    // console.log(less);
    // console.log(a);
    // console.log(course_id);
    // console.log(course_name);
    // console.log(get_url);
   
   
    
     $.ajax({
      type: "POST",
      url:"<?php echo site_url();?>home/lesson/"+course_name+'/'+course_id+'/'+less,
  
      dataType: "html",
      success:function(data){
         if(!less)
         {
          
               window.location.href = "<?php echo site_url();?>home/lesson/"+course_name+'/'+course_id+'/'+less;
         }
         else{
          window.location.href = "<?php echo site_url();?>/addons/customer_support/results";
         }
             
         },

    });
     return false;
 });
 });
 
</script>