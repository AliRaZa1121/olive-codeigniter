<?php
    $instructor_list = $this->user_model->get_instructor_list()->result_array();
?>   
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
							 </div>
						</div>
						<div class="content-inner-box">
						    <div class="row">
						         <div class="col-lg-3">
						                <div class="message-sender-list-box">
                    <button class="btn compose-btn" type="button" id="NewMessage" onclick="NewMessage(event)"><i class="fas fa-solid fa-plus"></i><?php echo site_phrase('Start New Chat'); ?></button>
                    <ul class="message-sender-list">

                        <?php
                        $current_user = $this->session->userdata('user_id');
                        $this->db->where('sender', $current_user);
                        $this->db->or_where('receiver', $current_user);
                        $message_threads = $this->db->get('message_thread')->result_array();
                        foreach ($message_threads as $row):

                            // defining the user to show
                            if ($row['sender'] == $current_user)
                            $user_to_show_id = $row['receiver'];
                            if ($row['receiver'] == $current_user)
                            $user_to_show_id = $row['sender'];

                            $last_messages_details =  $this->crud_model->get_last_message_by_message_thread_code($row['message_thread_code'])->row_array();
                            ?>
                            <a href="<?php echo site_url('home/my_messages/read_message/'.$row['message_thread_code']); ?>">
                                <li>
                                    <div class="message-sender-wrap">
                                        <div class="message-sender-head clearfix">
                                            <div class="message-sender-info d-inline-block">
                                                <div class="sender-image d-inline-block">
                                                    <img src="<?php echo $this->user_model->get_user_image_url($user_to_show_id);?>" alt="" class="img-fluid">
                                                </div>
                                                <div class="message-sender-detail">
                                                <div class="sender-name d-inline-block">
                                                    <?php
                                                    $user_to_show_details = $this->user_model->get_all_user($user_to_show_id)->row_array();
                                                    echo $user_to_show_details['first_name'].' '.$user_to_show_details['last_name'];
                                                    ?>
                                                </div>
                                                       <div class="message-sender-body">
                                                            <?php echo $last_messages_details['message']; ?>
                                                        </div>
                                                </div>
                                             
                                            </div>
                                            <div class="message-time d-inline-block float-end"><?php echo date('D, d-M-Y', $last_messages_details['timestamp']); ?></div>
                                        </div>
                                     
                                    </div>
                                </li>
                            </a>
                        <?php endforeach; ?>
                    </ul>
                </div>	
						         </div>
								   <div class="col-lg-9">
								       			<div class="message-details-box" id = "toggle-1">
                    <?php include 'inner_messages.php'; ?>
                </div>
                <div class="message-details-box" id = "toggle-2" style="display: none;">
                    <div class="new-message-details"><div class="message-header">
                        <div class="sender-info">
                            <span class="d-inline-block">
                                <i class="far fa-user"></i>
                            </span>
                            <span class="d-inline-block"><?php echo site_phrase('new_message'); ?></span>
                        </div>
                    </div>
                    <form class="" action="<?php echo site_url('home/my_messages/send_new'); ?>" method="post">
                        <div class="message-body">
                            <div class="form-group">
                                <select class="form-control" name = "receiver">
                                    <?php foreach ($instructor_list as $instructor):
                                        if ($instructor['id'] == $this->session->userdata('user_id'))
                                            continue;
                                        ?>
                                        <option value="<?php echo $instructor['id']; ?>"><?php echo $instructor['first_name'].' '.$instructor['last_name']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <textarea name="message" class="form-control"></textarea>
                            </div>
                            <button type="submit" class="btn send-btn"><?php echo site_phrase('send'); ?></button>
                            <button type="button" class="btn cancel-btn" onclick = "CancelNewMessage(event)">Cancel</button>
                        </div>
                    </form>
                </div>
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
function NewMessage(e){

    e.preventDefault();
    $('#toggle-1').hide();
    $('#toggle-2').show();
    $('#NewMessage').removeAttr('onclick');
}

function CancelNewMessage(e){

    e.preventDefault();
    $('#toggle-2').hide();
    $('#toggle-1').show();

    $('#NewMessage').attr('onclick','NewMessage(event)');
}
</script>
