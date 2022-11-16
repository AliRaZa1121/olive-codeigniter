<section class="course-header-area">
    <div class="container">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="course-breadcrumb">
                    <ul>
                        <?php
                        echo $book['name'];
                        ?>
                    </ul>
                </div>
                <div class="course-header-wrap">
                    <h1 class="title"><?php echo $book['name']; ?></h1>

                    <div class="created-row">
                        <span class="created-by">
                            <?php echo site_phrase('created_by'); ?>
                            <a class="text-14px fw-600 text-decoration-none" href="javascript:void(0)">Admin</a>
                        </span>
                        <br>
                        <span class="last-updated-date d-inline-block mt-2"><i class="fas fa-exclamation-circle"></i><?php echo site_phrase('last_updated') . ' ' . date('D, d-M-Y', $book['last_modified']); ?></span>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="detail-image">
                    <img class="img-fluid" src="<?php echo base_url('uploads/thumbnails/category_thumbnails/' . $book['banner']); ?>">
                </div>
            </div>
        </div>
    </div>
</section>

<section class="course-content-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 order-last order-lg-first radius-10 mt-4 bg-white p-30-40">

                <div class="description-box view-more-parent course-border">
                    <div class="view-more" onclick="viewMore(this,'hide')">+ <?php echo site_phrase('view_more'); ?></div>
                    <div class="description-title"></div>
                    <div class="description-content-wrap">
                        <div class="description-content">
                            <?php echo html_entity_decode($book['description']) ?>
                        </div>
                    </div>
                </div>
<div class="text-center mt-5">
                        <a target="blank" href="<?php echo base_url('uploads/thumbnails/category_thumbnails/' . $book['file']); ?>" class="site-btn btn-lg">Read Book<i class=" fas fa-solid fa-arrow-right"></i></a>
                        </div>
            </div>

        </div>
    </div>
</section>





<style media="screen">
    .embed-responsive-16by9::before {
        padding-top: 0px;
    }

    .btn.btn-add-wishlist.active {
        color: #fff !important;
        background-color: #ef682c !important;
        border-color: #ef682c !important;
    }

    .course-sidebar-text-box .buy-btns .btn-add-wishlist:hover,
    .course-sidebar-text-box .buy-btns .btn-add-wishlist:focus {
        background-color: #ef682c !important;
        border-color: #ef682c !important;
    }
</style>
<link rel="stylesheet" href="sweetalert2.min.css">
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script type="text/javascript">
    function handleCartItems(elem) {
        url1 = '<?php echo site_url('home/handleCartItems'); ?>';
        url2 = '<?php echo site_url('home/refreshWishList'); ?>';
        $.ajax({
            url: url1,
            type: 'POST',
            data: {
                course_id: elem.id
            },
            success: function(response) {
                $('#cart_items').html(response);
                if ($(elem).hasClass('addedToCart')) {
                    Swal.fire({
                        title: 'Success!',
                        text: 'Item Removed From Cart',
                        icon: 'success',
                    })
                    $(elem).removeClass('addedToCart')
                    $(elem).text("<?php echo site_phrase('add_to_cart'); ?>");
                } else {
                    Swal.fire({
                        title: 'Success!',
                        text: 'Item Added To Cart',
                        icon: 'success',
                    })
                    $(elem).addClass('addedToCart')
                    $(elem).text("<?php echo site_phrase('added_to_cart'); ?>");
                }
                $.ajax({
                    url: url2,
                    type: 'POST',
                    success: function(response) {
                        $('#wishlist_items').html(response);
                    }
                });
            }
        });
    }

    function handleEnrolledButton() {
        $.ajax({
            url: '<?php echo site_url('home/isLoggedIn?url_history=' . base64_encode(current_url())); ?>',
            success: function(response) {
                if (!response) {
                    window.location.replace("<?php echo site_url('login'); ?>");
                }
            }
        });
    }

    function handleAddToWishlist(elem) {



        $.ajax({
            url: '<?php echo site_url('home/isLoggedIn?url_history=' . base64_encode(current_url())); ?>',
            success: function(response) {
                if (!response) {
                    window.location.replace("<?php echo site_url('login'); ?>");
                } else {
                    $.ajax({
                        url: '<?php echo site_url('home/handleWishList'); ?>',
                        type: 'POST',
                        data: {
                            course_id: elem.id
                        },
                        success: function(response) {

                            if ($(elem).hasClass('active')) {
                                Swal.fire({
                                    title: 'Success!',
                                    text: 'Item Removed From Wishlist',
                                    icon: 'success',
                                })
                                $(elem).removeClass('active');
                                $(elem).text("<?php echo site_phrase('add_to_wishlist'); ?>");
                            } else {
                                Swal.fire({
                                    title: 'Success!',
                                    text: 'Item Added To Wishlist',
                                    icon: 'success',
                                })
                                $(elem).addClass('active');
                                $(elem).text("<?php echo site_phrase('added_to_wishlist'); ?>");
                            }
                            $('#wishlist_items').html(response);
                        }
                    });
                }
            }
        });
    }

    function pausePreview() {
        player.pause();
    }

    $('.course-compare').click(function(e) {
        e.preventDefault()
        var redirect_to = $(this).attr('redirect_to');
        window.location.replace(redirect_to);
    });

    function go_course_playing_page(course_id, lesson_id) {
        var course_playing_url = "<?php echo site_url('home/lesson/' . slugify($course_details['title'])); ?>/" + course_id + '/' + lesson_id;

        $.ajax({
            url: '<?php echo site_url('home/go_course_playing_page/'); ?>' + course_id,
            type: 'POST',
            success: function(response) {
                if (response == 1) {
                    window.location.replace(course_playing_url);
                }
            }
        });
    }

    $(document).ready(function() {
        $(document).on('click', '.sample-video-outer-box', function() {
            var src = $(this).find('.sample-video-url').text();
            <?php if (strtolower(strtolower($provider)) == 'youtube') { ?>
                var video_url = "<?php echo base_url() ?>" + "/" + src + "?origin=https://plyr.io&amp;iv_load_policy=3&amp;modestbranding=1&amp;playsinline=1&amp;showinfo=0&amp;rel=0&amp;enablejsapi=1";
                $('#sample_video').attr('src', video_url);
            <?php } elseif (strtolower($provider) == 'vimeo') { ?>
                var video_url = "https://player.vimeo.com/video/" + src + "?loop=false&amp;byline=false&amp;portrait=false&amp;title=false&amp;speed=true&amp;transparent=0&amp;gesture=media";
                $('#sample_video').attr('src', video_url);
            <?php } else { ?>
                var video_url = "<?php echo base_url() ?>" + "/" + src;
                console.log($(this).find('.sample-video-box').find('.sample-video-img').attr('src'));



                $('#player').siblings('.plyr__poster').attr('style', 'background-image: url("' + $(this).find('.sample-video-box').find('.sample-video-img').attr('src') + '")');


                $('#player').html(' <source  src="' + src + '">');
            <?php } ?>

        })

        $(document).on('click', '.btn-report', function() {


            var form = $('#report-form')
            $.ajax({
                url: form.attr('action'),
                type: 'post',

                data: form.serialize(),
                success: function(data) {

                    if (data == 0) {
                        toastr.error('You Alreafy reported');
                        $('textarea[name="reason"]').val('')
                        $('#exampleModal').modal('hide')
                    } else {
                        toastr.success('Reported Successfully');
                        $('report-count').text(data.report_count);
                        $('textarea[name="reason"]').val('')
                        $('#exampleModal').modal('hide')
                    }
                }
            })
        })
    })
</script>