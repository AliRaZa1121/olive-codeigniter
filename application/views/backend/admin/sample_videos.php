<div class="row ">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <h4 class="page-title"> <i class="mdi mdi-apple-keyboard-command title_icon"></i> Sample Videos
                    <a href="<?php echo site_url('admin/sample_video_form/add_sample_video'); ?>" class="btn btn-outline-primary btn-rounded alignToTitle"><i class="mdi mdi-plus"></i> Add New Sample Video</a>
                </h4>
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>
<div class="row">
    <div class="col-12">
        <div class="card widget-inline">
            <div class="card-body p-0">
                <div class="row no-gutters">
                    <div class="col-sm-6 col-xl-3">
                        <a href="<?php echo site_url('admin/sample_videos'); ?>" class="text-secondary">
                            <div class="card shadow-none m-0" hidden>
                                <div class="card-body text-center">
                                    <i class="dripicons-link text-muted" style="font-size: 24px;"></i>
                                    <h3><span><?php echo $status_wise_courses['active']->num_rows(); ?></span></h3>
                                    <p class="text-muted font-15 mb-0"><?php echo get_phrase('active_courses'); ?></p>
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="col-sm-6 col-xl-3"  hidden>
                        <a href="<?php echo site_url('admin/courses'); ?>" class="text-secondary">
                            <div class="card shadow-none m-0 border-left">
                                <div class="card-body text-center">
                                    <i class="dripicons-link-broken text-muted" style="font-size: 24px;"></i>
                                    <h3><span><?php echo $status_wise_courses['pending']->num_rows(); ?></span></h3>
                                    <p class="text-muted font-15 mb-0"><?php echo get_phrase('pending_courses'); ?></p>
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="col-sm-6 col-xl-3" hidden>
                        <a href="<?php echo site_url('admin/courses'); ?>" class="text-secondary">
                            <div class="card shadow-none m-0 border-left">
                                <div class="card-body text-center">
                                    <i class="dripicons-star text-muted" style="font-size: 24px;"></i>
                                    <h3><span><?php echo $this->crud_model->get_free_and_paid_courses('free')->num_rows(); ?></span></h3>
                                    <p class="text-muted font-15 mb-0"><?php echo get_phrase('free_courses'); ?></p>
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="col-sm-6 col-xl-3" hidden>
                        <a href="<?php echo site_url('admin/courses'); ?>" class="text-secondary">
                            <div class="card shadow-none m-0 border-left">
                                <div class="card-body text-center">
                                    <i class="dripicons-tags text-muted" style="font-size: 24px;"></i>
                                    <h3><span><?php echo $this->crud_model->get_free_and_paid_courses('paid')->num_rows(); ?></span></h3>
                                    <p class="text-muted font-15 mb-0"><?php echo get_phrase('paid_courses'); ?></p>
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
        <div class="card">
            <div class="card-body">
                <h4 class="mb-3 header-title">Sample Video List</h4>
                <form hidden class="row justify-content-center" action="<?php echo site_url('admin/sample_videos'); ?>" method="get">
                   

                    <!-- Course Status -->
                    <div class="col-xl-2" >
                        <div class="form-group">
                            <label for="status"><?php echo get_phrase('status'); ?></label>
                            <select class="form-control select2" data-toggle="select2" name="status" id='status'>
                                <option value="all" <?php if ($selected_status == 'all') echo 'selected'; ?>><?php echo get_phrase('all'); ?></option>
                                <option value="active" <?php if ($selected_status == 'active') echo 'selected'; ?>><?php echo get_phrase('active'); ?></option>
                                <option value="pending" <?php if ($selected_status == 'pending') echo 'selected'; ?>><?php echo get_phrase('pending'); ?></option>
                            </select>
                        </div>
                    </div>

                   

                   
                    <div class="col-xl-2">
                        <label for=".." class="text-white">..</label>
                        <button type="submit" class="btn btn-primary btn-block" name="button"><?php echo get_phrase('filter'); ?></button>
                    </div>
                </form>

                <div class="table-responsive-sm mt-4">
                    <?php if (count($sample_videos) > 0) : ?>
                        <table id="course-datatable" class="table table-striped dt-responsive nowrap" width="100%" data-page-length='25'>
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th><?php echo get_phrase('title'); ?></th>
                                    <th><?php echo get_phrase('course'); ?></th>
									<th><?php echo get_phrase('status'); ?></th>
                                    <th><?php echo get_phrase('actions'); ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($sample_videos as $key => $sample_video) :
                                   $course = $this->crud_model->get_course_by_id($sample_video['course_id'])->row_array();
                                ?>
                                    <tr>
                                        <td><?php echo ++$key; ?></td>
                                        <td>
                                            <strong><a href="<?php echo site_url('admin/course_form/course_edit/' . $course['id']); ?>"><?php echo ellipsis($course['title']); ?></a></strong><br>
                                        </td>
										<td>
                                           <?php echo $sample_video['title']; ?>
                                        </td>
                                        <td>
                                            <span class="badge badge-dark-lighten"><?php echo $course['title']; ?></span>
                                        </td>
                                      
                                        <td class="text-center">
                                            <?php if ($sample_video['status'] == 'pending') : ?>
                                                <i class="mdi mdi-circle" style="color: #FFC107; font-size: 19px;" data-toggle="tooltip" data-placement="top" title="" data-original-title="<?php echo get_phrase($sample_video['status']); ?>"></i>
                                            <?php elseif ($sample_video['status'] == 'active') : ?>
                                                <i class="mdi mdi-circle" style="color: #4CAF50; font-size: 19px;" data-toggle="tooltip" data-placement="top" title="" data-original-title="<?php echo get_phrase($sample_video['status']); ?>"></i>
                                            <?php endif; ?>
                                        </td>
                                     
                                        <td>
                                            <div class="dropright dropright">
                                                <button type="button" class="btn btn-sm btn-outline-primary btn-rounded btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="mdi mdi-dots-vertical"></i>
                                                </button>
                                                <ul class="dropdown-menu">
                                                    <li><a class="dropdown-item" href="<?php echo site_url('admin/sample_video_form/edit_sample_video/' . $sample_video['id']); ?>">Edit Sample VIdeo</a></li>
                                                    
                                                    <li>
                                                        <?php if ($sample_video['status'] == 'active') : ?>
                                                           
                                                                <a class="dropdown-item" href="#" onclick="confirm_modal('<?php echo site_url(); ?>admin/change_sample_video_status/pending/<?php echo $sample_video['id'] ?>');">
                                                                    <?php echo get_phrase('mark_as_pending'); ?>
                                                                </a>
                                                           
                                                        <?php else : ?>
                                                           
                                                                <a class="dropdown-item" href="#" onclick="confirm_modal('<?php echo site_url(); ?>admin/change_sample_video_status/active/<?php echo $sample_video['id'] ?>');">
                                                                    <?php echo get_phrase('mark_as_active'); ?>
                                                                </a>
                                                            
                                                        <?php endif; ?>
                                                    </li>
                                                    <li><a class="dropdown-item" href="#" onclick="confirm_modal('<?php echo site_url('admin/sample_video_actions/delete/' . $sample_video['id']); ?>');"><?php echo get_phrase('delete'); ?></a></li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    <?php endif; ?>
                    <?php if (count($sample_videos) == 0) : ?>
                        <div class="img-fluid w-100 text-center">
                            <img style="opacity: 1; width: 100px;" src="<?php echo base_url('assets/backend/images/file-search.svg'); ?>"><br>
                            <?php echo get_phrase('no_data_found'); ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>