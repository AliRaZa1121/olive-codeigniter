<?php

    //$param2 = answer id and $param3 = quiz id
    $answer_details = $this->crud_model->get_answer_by_id($param2)->row_array();
   
    
?>
<form action="<?php echo site_url('user/quiz_add_marks/'. $param2); ?>" method="post" id = 'mcq_form'>
    
    <div class="form-group">
        <label for="marks"><?php echo 'Marks'; ?></label>
        <input class="form-control" type="number" name="marks" id="marks" value="" required>
    </div>
    
    <div class="text-center">
        <button class = "btn btn-success" id = "submitButton" type="button" name="button" data-dismiss="modal"><?php echo get_phrase('submit'); ?></button>
    </div>
</form>
<script type="text/javascript">
function showOptions(number_of_options){
    $.ajax({
        type: "POST",
        url: "<?php echo site_url('user/manage_multiple_choices_options'); ?>",
        data: {number_of_options : number_of_options},
        success: function(response){
            jQuery('.options').remove();
            jQuery('#multiple_choice_question').after(response);
        }
    });
}

$('#submitButton').click( function(event) {
    $.ajax({
        url: '<?php echo site_url('user/quiz_add_marks/'. $param2); ?>',
        type: 'post',
        data: $('form#mcq_form').serialize(),
        success: function(response) {
            console.log(response);
            if (response == 1) {
                success_notify('<?php echo 'Scores added to the question'; ?>');
            }else {
                error_notify('<?php echo get_phrase('marks are required'); ?>');
            }
        }
    });
     location.reload();
});
</script>
