<?php
$course_details = $this->crud_model->get_course_by_id($course_id)->row_array();
?>
<div class="row ">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <h4 class="page-title"> <i class="mdi mdi-apple-keyboard-command title_icon"></i> <?php echo get_phrase('quiz_analytics') . ': ' . $course_details['title']; ?></h4>
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
                        <h4 class="header-title my-1"><?php echo get_phrase('course_manager'); ?></h4>
                    </div>
                    
                </div>

                <div class="row">
                    <div class="col-xl-12">
                        <form class="required-form" action="<?php echo site_url('user/course_actions/edit/' . $course_id); ?>" method="post" enctype="multipart/form-data">
                            <div id="basicwizard">
                                <ul class="nav nav-pills nav-justified form-wizard-header">
                                    <li class="nav-item">
                                        <a href="#curriculum" data-toggle="tab" class="nav-link rounded-0 pt-2 pb-2">
                                            <i class="mdi mdi-account-circle"></i>
                                            <span class="d-none d-sm-inline"><?php echo get_phrase('all_lessons'); ?></span>
                                        </a>
                                    </li>
                                    
                                    <li class="w-100 bg-white pb-3">
                                        <!--ajax page loader-->
                                        <div class="ajax_loader w-100">
                                            <div class="ajax_loaderBar"></div>
                                        </div>
                                        <!--end ajax page loader-->
                                    </li>
                                </ul>

                                <div class="tab-content b-0 mb-0">

                                    <div class="tab-pane" id="curriculum">
                                        <?php
                                        if ($course_details['course_type'] == 'general') :
                                            include 'quiz_curriculam.php';
                                        elseif ($course_details['course_type'] == 'scorm' && addon_status('scorm_course') == true) :
                                            include 'scorm_curriculum.php';
                                        elseif ($course_details['course_type'] == 'scorm' && addon_status('scorm_course') != true) :
                                        ?>
                                            <div class="row justify-content-center">
                                                <div class="col-md-6">
                                                    <div class="alert alert-warning" role="alert">
                                                        <h4 class="alert-heading"><?= get_phrase('heads_up'); ?>!</h4>
                                                        <p><?= get_phrase('currently_the_scorm_course_addon_is_deactivate'); ?>. <?= get_phrase('please_activate_the_scorm_course_addon_to_use_it'); ?>.</p>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endif; ?>
                                    </div>

                                    

                                </div> <!-- tab-content -->
                            </div> <!-- end #progressbarwizard-->
                        </form>
                    </div>
                </div><!-- end row-->
            </div> <!-- end card-body-->
        </div> <!-- end card-->
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        initSummerNote(['#description']);
        togglePriceFields('is_free_course');
    });
</script>

<script type="text/javascript">
    var blank_outcome = jQuery('#blank_outcome_field').html();
    var blank_requirement = jQuery('#blank_requirement_field').html();
    jQuery(document).ready(function() {
        jQuery('#blank_outcome_field').hide();
        jQuery('#blank_requirement_field').hide();
        calculateDiscountPercentage($('#discounted_price').val());
    });

    function appendOutcome() {
        jQuery('#outcomes_area').append(blank_outcome);
    }

    function removeOutcome(outcomeElem) {
        jQuery(outcomeElem).parent().parent().remove();
    }

    function appendRequirement() {
        jQuery('#requirement_area').append(blank_requirement);
    }

    function removeRequirement(requirementElem) {
        jQuery(requirementElem).parent().parent().remove();
    }

    function ajax_get_sub_category(category_id) {
        console.log(category_id);
        $.ajax({
            url: '<?php echo site_url('user/ajax_get_sub_category/'); ?>' + category_id,
            success: function(response) {
                jQuery('#sub_category_id').html(response);
            }
        });
    }

    function priceChecked(elem) {
        if (jQuery('#discountCheckbox').is(':checked')) {

            jQuery('#discountCheckbox').prop("checked", false);
        } else {

            jQuery('#discountCheckbox').prop("checked", true);
        }
    }

    function topCourseChecked(elem) {
        if (jQuery('#isTopCourseCheckbox').is(':checked')) {

            jQuery('#isTopCourseCheckbox').prop("checked", false);
        } else {

            jQuery('#isTopCourseCheckbox').prop("checked", true);
        }
    }

    function isFreeCourseChecked(elem) {

        if (jQuery('#' + elem.id).is(':checked')) {
            $('#price').prop('required', false);
        } else {
            $('#price').prop('required', true);
        }
    }

    function calculateDiscountPercentage(discounted_price) {
        if (discounted_price > 0) {
            var actualPrice = jQuery('#price').val();
            if (actualPrice > 0) {
                var reducedPrice = actualPrice - discounted_price;
                var discountedPercentage = (reducedPrice / actualPrice) * 100;
                if (discountedPercentage > 0) {
                    jQuery('#discounted_percentage').text(discountedPercentage.toFixed(2) + "%");

                } else {
                    jQuery('#discounted_percentage').text('<?php echo '0%'; ?>');
                }
            }
        }
    }

    $('.on-hover-action').mouseenter(function() {
        var id = this.id;
        $('#widgets-of-' + id).show();
    });
    $('.on-hover-action').mouseleave(function() {
        var id = this.id;
        $('#widgets-of-' + id).hide();
    });
</script>