<?php
$sections = $this->crud_model->get_section('course', $course_id)->result_array();
?>
<div class="row justify-content-center">
    

    <div class="col-xl-8">
        <div class="row">
            <?php
            $lesson_counter = 0;
            $quiz_counter   = 0;
            foreach ($sections as $key => $section):?>
            <div class="col-xl-12">
                <div class="card bg-light text-seconday on-hover-action mb-5" id = "section-<?php echo $section['id']; ?>">
                    <div class="card-body">
                        <h5 class="card-title" class="mb-3" style="min-height: 45px;"><span class="font-weight-light"><?php echo get_phrase('section').' '.++$key; ?></span>: <?php echo $section['title']; ?>
                           
                        </h5>
                        <div class="clearfix"></div>
                        <?php
                        $lessons = $this->crud_model->get_lessons('section', $section['id'])->result_array();
                        foreach ($lessons as $index => $lesson):?>
                        <div class="col-md-12">
                            <!-- Portlet card -->
                            <div class="card text-secondary on-hover-action mb-2" id = "<?php echo 'lesson-'.$lesson['id']; ?>">
                                <div class="card-body thinner-card-body">
                                    <div class="card-widgets display-none" id = "widgets-of-lesson-<?php echo $lesson['id']; ?>">
                                        <?php if ($lesson['lesson_type'] == 'quiz'): ?>
                                       
                                            <a href='<?php echo site_url('modal/popup/quiz_results/' .$lesson['id']); ?>'><i class="mdi mdi-comment-question-outline"></i></a>
                                        <?php else: ?>
                                            <a href="javascript::" onclick="showAjaxModal('<?php echo site_url('modal/popup/lesson_edit/'.$lesson['id'].'/'.$course_id); ?>', '<?php echo get_phrase('update_lesson'); ?>')"><i class="mdi mdi-pencil-outline"></i></a>
                                        <?php endif; ?>
                                    </div>
                                    <h5 class="card-title mb-0">
                                        <span class="font-weight-light">
                                            <?php
                                            if ($lesson['lesson_type'] == 'quiz') {
                                                $quiz_counter++; // Keeps track of number of quiz
                                                $lesson_type = $lesson['lesson_type'];
                                            }else {
                                                $lesson_counter++; // Keeps track of number of lesson
                                                if ($lesson['attachment_type'] == 'txt' || $lesson['attachment_type'] == 'pdf' || $lesson['attachment_type'] == 'doc' || $lesson['attachment_type'] == 'img') {
                                                    $lesson_type = $lesson['attachment_type'];
                                                }else {
                                                    $lesson_type = 'video';
                                                }
                                            }
                                            ?>
                                            <img src="<?php echo base_url('assets/backend/lesson_icon/'.$lesson_type.'.png'); ?>" alt="" height = "16">
                                            <?php echo $lesson['lesson_type'] == 'quiz' ? get_phrase('quiz').' '.$quiz_counter : get_phrase('lesson').' '.$lesson_counter; ?>
                                        </span>: <?php echo $lesson['title']; ?>
                                    </h5>
                                </div>
                            </div> <!-- end card-->
                        </div>
                    <?php endforeach; ?>
                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div>
    <?php endforeach; ?>
</div>
</div>
</div>
