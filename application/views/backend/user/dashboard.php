<?php
$instructor_id = $this->session->userdata('user_id');
$number_of_courses = $this->crud_model->get_instructor_wise_courses($instructor_id)->num_rows();
$number_of_enrolment_result = $this->crud_model->instructor_wise_enrolment($instructor_id);
if ($number_of_enrolment_result) {
    $number_of_enrolment = $number_of_enrolment_result->num_rows();
} else {
    $number_of_enrolment = 0;
}
$total_pending_amount = $this->crud_model->get_total_pending_amount($instructor_id);
$requested_withdrawal_amount = $this->crud_model->get_requested_withdrawal_amount($instructor_id);
$zoom_meetings = $this->crud_model->get_zoom_meetings($instructor_id);
?>
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.css' />
<script src='https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.17.1/moment.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.js'></script>


<div class="row">
    <div class="col-xl-12">
        <div class="card dashboad-title-header">
            <div class="card-body">
                <h4 class="page-title"> <i class="mdi mdi-apple-keyboard-command title_icon"></i> <?php echo get_phrase('dashboard'); ?></h4>
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>

<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">

                <?php if ($this->session->userdata('is_instructor')) : ?>
                    <h4 class="header-title mb-4"><?php echo get_phrase('coach_revenue'); ?></h4>
                <?php else : ?>
                    <h4 class="header-title mb-4"><?php echo 'Organization Revenue'; ?></h4>
                <?php endif; ?>
                <div class="mt-3 chartjs-chart" style="height: 320px;">
                    <canvas id="task-area-chart"></canvas>
                </div>
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>

<div class="row">
    <div class="col-12">
        <div class="card icon-card widget-inline">
            <div class="card-body p-0">
                <div class="row no-gutters">
                    <div class="col-sm-6 col-xl-3">
                        <a href="<?php echo site_url('user/programs'); ?>" class="text-secondary">
                            <div class="card shadow-none m-0">
                                <div class="card-body text-center">
                                    <i class="dripicons-archive text-muted" style="font-size: 24px;"></i>
                                    <h3><span><?php echo $number_of_courses; ?></span></h3>
                                    <p class="text-muted font-15 mb-0"><?php echo get_phrase('number_of_programs'); ?></p>
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="col-sm-6 col-xl-3">
                        <div class="card shadow-none m-0">
                            <div class="card-body text-center border-left">
                                <i class="dripicons-user-group text-muted" style="font-size: 24px;"></i>
                                <h3><span><?php echo $number_of_enrolment; ?></span></h3>
                                <p class="text-muted font-15 mb-0"><?php echo get_phrase('number_of_enrolment'); ?></p>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-xl-3">
                        <a href="<?php echo site_url('user/payout_report'); ?>" class="text-secondary">
                            <div class="card shadow-none m-0">
                                <div class="card-body text-center border-left">
                                    <i class="dripicons-inbox text-muted" style="font-size: 24px;"></i>
                                    <h3><span><?php echo $total_pending_amount > 0 ? currency($total_pending_amount) : currency_code_and_symbol() . '' . $total_pending_amount; ?></span></h3>
                                    <p class="text-muted font-15 mb-0"><?php echo get_phrase('pending_balance'); ?></p>
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="col-sm-6 col-xl-3">
                        <a href="<?php echo site_url('user/payout_report'); ?>" class="text-secondary">
                            <div class="card shadow-none m-0">
                                <div class="card-body text-center border-left">
                                    <i class="dripicons-pin text-muted" style="font-size: 24px;"></i>
                                    <h3><span><?php echo $requested_withdrawal_amount > 0 ? currency($requested_withdrawal_amount) : currency_code_and_symbol() . '' . $requested_withdrawal_amount; ?></span></h3>
                                    <p class="text-muted font-15 mb-0"><?php echo get_phrase('requested_withdrawal_amount'); ?></p>
                                </div>
                            </div>
                        </a>
                    </div>

                </div> <!-- end row -->
            </div>
        </div> <!-- end card-box-->
    </div> <!-- end col-->
</div>

<div class="row">
    <div class="col-xl-12">
        <div class="card card-custom">
            <div class="card-header">
                <div class="card-title">
                    <h3 class="card-label">
                        Zoom Meetings
                    </h3>
                </div>
            </div>
            <div class="card-body">
                <div id="calendar"></div>
            </div>
        </div>
    </div>
</div>


<div class="row">
    <div class="col-xl-12">
        <div class="card overview-card">
            <div class="card-body">
                <h4 class="header-title mb-4"><?php echo get_phrase('active_programs'); ?></h4>
                <div class="my-4 chartjs-chart" style="height: 202px;">
                    <canvas id="project-status-chart"></canvas>
                </div>
                <div class="row text-center mt-2 py-2">
                    <div class="col-6">
                        <i class="mdi mdi-trending-up text-success mt-3 h3"></i>
                        <h3 class="font-weight-normal">
                            <span><?php echo $this->crud_model->get_status_wise_courses_for_instructor('active')->num_rows(); ?></span>
                        </h3>
                        <p class="text-muted mb-0"><?php echo get_phrase('active_programs'); ?></p>
                    </div>
                    <div class="col-6">
                        <i class="mdi mdi-trending-down text-warning mt-3 h3"></i>
                        <h3 class="font-weight-normal">
                            <span><?php echo $this->crud_model->get_status_wise_courses_for_instructor('pending')->num_rows(); ?></span>
                        </h3>
                        <p class="text-muted mb-0"> <?php echo get_phrase('pending_programs'); ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<script type="text/javascript">
    var events = <?php echo json_encode($zoom_meetings) ?>;

    var date = new Date()
    var d = date.getDate(),
        m = date.getMonth(),
        y = date.getFullYear()

    $('#calendar').fullCalendar({
        header: {
            left: 'prev,next today',
            center: 'title',
            right: 'month,agendaWeek,agendaDay'
        },
        buttonText: {
            today: 'today',
            month: 'month',
            week: 'week',
            day: 'day'
        },
        events: events
    })
</script>