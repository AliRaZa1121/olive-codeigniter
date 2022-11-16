<?php
// $param2 is Quiz id
$quiz_details = $this->crud_model->get_lessons('lesson', $param2)->row_array();
$questions = $this->crud_model->get_quiz_questions($param2)->result_array();
?>
<?php if (count($quiz_details)): ?>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row" data-plugin="dragula" data-containers='["question-list"]'>
                        <div class="col-md-12">
                            <div class="bg-dragula p-2 p-lg-4">
                                <h5 class="mt-0"><?php echo 'answers_of'.': '.$quiz_details['title']; ?>
                                    <button type="button" class="btn btn-outline-primary btn-sm btn-rounded alignToTitle ml-1" id = "question-sort-btn" onclick="sort()" name="button"><?php echo get_phrase('update_sorting'); ?></button>
                                    <button type="button" class="btn btn-outline-primary btn-sm btn-rounded alignToTitle" onclick="showAjaxModal('<?php echo site_url('modal/popup/question_add/'.$param2) ?>', '<?php echo get_phrase('add_new_question'); ?>')" name="button" data-dismiss="modal"><?php echo get_phrase('add_new_question'); ?></button>
                                </h5>
                                <div id="question-list" class="py-2">
                                    <?php foreach ($questions as $question): ?>
                                        <!-- Item -->
                                        <div class="card mb-0 mt-2 draggable-item on-hover-action" id = "<?php echo $question['id']; ?>">
                                            <div class="card-body">
                                                <div class="media">
                                                    <div class="media-body">
                                                        <h5 class="mb-1 mt-0"><?php echo $question['title']; ?>
                                                            <span id = "<?php echo 'widgets-of-'.$question['id']; ?>" class="widgets-of-quiz-question" hidden>
                                                                <a href="javascript::" class="alignToTitle float-right ml-1 text-secondary" onclick="deleteQuizQuestionAndReloadModal('<?php echo $param2; ?>', '<?php echo $question['id']; ?>')" data-dismiss="modal"><i class="dripicons-cross"></i></a>
                                                                <a href="javascript::" class="alignToTitle float-right text-secondary" onclick="showAjaxModal('<?php echo site_url('modal/popup/question_edit/'.$question['id'].'/'.$param2); ?>', '<?php echo get_phrase('update_quiz_question'); ?>')" data-dismiss="modal"><i class="dripicons-document-edit"></i></a>
                                                            </span>
                                                        </h5>
                                                         
                                                            <p class="A">Answers</p>    
                                                    <?php $answers = $this->crud_model->get_quiz_answers($question['id'])->result_array(); 
                                                           if(!empty($answers)) ?> 
                                                                    <div class="table-responsive">
                                                                        <table class="table">
                                                                            <thead>
                                                                                <tr>
                                                                                    <th>Submited Answer</th>
                                                                                    <th>Correct Answer</th>
                                                                                    <th>User</th>
                                                                                    <th>Marks</th>
                                                                                </tr>
                                                                            </thead>
                                                                            <tbody>
                                                                                  <?php  
                                                                                  foreach($answers as  $ans):
                                                                                  $submited_answers = [] ; $corrected_answer =[]; $i=0;$j=0;$k=1;
                                                                               
                                                                                      foreach(json_decode($question['options']) as $y => $option):
                                                                                          
                                                                                     foreach(json_decode($ans['answer']) as $x => $answer):
                                                                                        
                                                                                                 if($answer == $k): 
                                                                                                      $submited_answers[$i]  = $option;
                                                                                                      $i++;
                                                                                                 endif;
                                                                                        endforeach;
                                                                                        foreach(json_decode($question['correct_answers']) as $z => $c_answer):
                                                                                           
                                                                                                
                                                                                                 if($c_answer == $k):
                                                                                                    $corrected_answer[$j] = $option;
                                                                                                    $j++;
                                                                                                 endif; ?> 
                                                                                                  <?php         
                                                                                            
                                                                                        endforeach;
                                                                                        $k++;
                                                                                    endforeach; ?>
                                                                                    
                                                                                    <tr>
                                                                                        <td><?php echo implode(',' , $submited_answers ) ?> </td>
                                                                                        <td><?php echo implode(',' , $corrected_answer ) ?> </td>
                                                                                        <td><?php  $user = $this->user_model->get_user($ans['user_id'])->row_array(); echo $user['first_name']; ?> </td>
                                                                                        <td> <?php if($ans['marks']){ echo $ans['marks']; } else{   ?><a href="javascript::" class="  text-secondary" onclick="showAjaxModal('<?php echo site_url('modal/popup/add_marks/'.$ans['id'].'/' . $param2); ?>', '<?php echo get_phrase('add_marks'); ?>')" data-dismiss="modal"><i class="dripicons-document-edit"></i></a>  <?php } ?></td>
                                                                                    
                                                                                    </tr>
                                                                                   
                                                                                <?php  endforeach; ?>
                                                                            </tbody>
                                                                        </table>
                                                                        
                                                                    </div>
                                                           
                                                       
                                                         
                                                    </div> <!-- end media-body -->
                                                </div> <!-- end media -->
                                            </div> <!-- end card-body -->
                                        </div> <!-- end col -->
                                        <!-- item -->
                                    <?php endforeach; ?>
                                </div> <!-- end company-list-1-->
                            </div> <!-- end div.bg-light-->
                        </div> <!-- end col -->
                    </div> <!-- end row -->
                </div> <!-- end card-body -->
            </div> <!-- end card -->
        </div> <!-- end col -->
    </div>
<?php endif; ?>

<!-- Init Dragula -->
<script type="text/javascript">
! function(r) {
    "use strict";
    var a = function() {
        this.$body = r("body")
    };
    a.prototype.init = function() {
        r('[data-plugin="dragula"]').each(function() {
            var a = r(this).data("containers"),
            t = [];
            if (a)
            for (var n = 0; n < a.length; n++) t.push(r("#" + a[n])[0]);
            else t = [r(this)[0]];
            var i = r(this).data("handleclass");
            i ? dragula(t, {
                moves: function(a, t, n) {
                    return n.classList.contains(i)
                }
            }) : dragula(t)
        })
    }, r.Dragula = new a, r.Dragula.Constructor = a
}(window.jQuery),
function(a) {
    "use strict";
    window.jQuery.Dragula.init()
}();
</script>

<script type="text/javascript">
jQuery(document).ready(function() {
    $('.widgets-of-quiz-question').hide();
});

$('.on-hover-action').mouseenter(function() {
    var id = this.id;
    $('#widgets-of-'+id).show();
});
$('.on-hover-action').mouseleave(function() {
    var id = this.id;
    $('#widgets-of-'+id).hide();
});

function deleteQuizQuestionAndReloadModal(quizID, questionID) {
    var deletionURL = '<?php echo site_url(); ?>'+'user/quiz_questions/'+quizID+'/delete/'+questionID;
    var reloadURL = '<?php echo site_url(); ?>'+'modal/popup/quiz_questions/'+quizID;
    confirm_modal(deletionURL);
}

function sort() {
    var containerArray = ['question-list'];
    var itemArray = [];
    var itemJSON;
    for(var i = 0; i < containerArray.length; i++) {
        $('#'+containerArray[i]).each(function () {
            $(this).find('.draggable-item').each(function() {
                //console.log(this.id);
                itemArray.push(this.id);
            });
        });
    }

    itemJSON = JSON.stringify(itemArray);
    $.ajax({
        url: '<?php echo site_url('user/ajax_sort_question/');?>',
        type : 'POST',
        data : {itemJSON : itemJSON},
        success: function(response)
        {
            success_notify('<?php echo get_phrase('questions_have_been_sorted'); ?>');
            setTimeout(
                function()
                {
                    location.reload();
                }, 1000);
            }
        });
    }
    onDomChange(function(){
        $('#question-sort-btn').show();
    });
</script>
