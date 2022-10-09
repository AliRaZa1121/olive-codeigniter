<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.css' />
<script src='https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.17.1/moment.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.js'></script>
<section class="main-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-2 p-0">
                <div class="left-sidebar-menu">
                    <?php include "profile_menus.php"; ?>
                </div>
            </div>
            <div class="col-lg-10 p-0">
                <div class="main-content">
                    <div class="row">
                        <div class="page-detail">
                            <div class="page-detail-title">
                                <h1 class="page-title print-hidden text-uppercase"><?php echo $page_title; ?></h1>
                            </div>
                            <div class="page-detail-filter">

                            </div>
                        </div>
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
                </div>
            </div>
        </div>
    </div>
</section>

<script type="text/javascript">
    var events = <?php echo json_encode($meetings_calendar) ?>;

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