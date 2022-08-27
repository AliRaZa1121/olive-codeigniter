<?php
require APPPATH . '/libraries/TokenHandler.php';
//include Rest Controller library
require (APPPATH . 'libraries/REST_Controller.php');


class Api extends REST_Controller {

  protected $token;
  public function __construct()
  {
    parent::__construct();
    $this->load->database();
    $this->load->library('session');
    // creating object of TokenHandler class at first
    $this->tokenHandler = new TokenHandler();
    header('Content-Type: application/json');
  }
  
    public function checkout_post(){
  
		$total_amount =  $_POST['total_price'];
		$userdata = array();
        // $user_details = $this->user_model->get_all_user($user_id)->row_array();
         if (isset($_GET['auth_token']) && !empty($_GET['auth_token'])) {
            $auth_token = $_GET['auth_token'];
            $logged_in_user_details = json_decode($this->token_data_get($auth_token), true);
    		$curse_id = $_POST['course_id'];
    		$data['user_id'] = $logged_in_user_details['user_id'];
    		$data['amount'] = $total_amount;
    		$data['course_id'] = $curse_id;
    		$data['document_image'] = rand(6000, 10000000) . '.' . $file_extension;
    		$data['timestamp'] = strtotime(date('H:i'));
    		$data['status'] = 0;
    
    		$this->db->insert('offline_payment', $data);
    		move_uploaded_file($_FILES['payment_document']['tmp_name'], 'uploads/payment_document/' . $data['document_image']);
            $userdata['status'] = $data;
         }
         else{
             $userdata['status'] = 'something went wrong';
         }
		$this->set_response($userdata, REST_Controller::HTTP_OK);
	
    }
    public function mymessages_post()
     {  
         
         $userdata = array();
         $auth_token = $_GET['auth_token'];
         $logged_in_user_details = json_decode($this->token_data_get($auth_token), true);

            if ($logged_in_user_details['user_id'] > 0) {
                    $message_thread_code = $this->api_model->send_new_private_message();
                    $userdata['status'] = 'Message sent';
            }

         $this->set_response($userdata, REST_Controller::HTTP_OK);
     }
     
    
     
   public function approves_get() {
    $response = array();
    if (isset($_GET['auth_token']) && !empty($_GET['auth_token'])) {
      $auth_token = $_GET['auth_token'];
      $logged_in_user_details = json_decode($this->token_data_get($auth_token), true);
      $response = $this->api_model->offline_payment_approve($logged_in_user_details['user_id']);
      $response['status'] = $response;
    }else{
      $response['status'] = 'failed';
    }
    return $this->set_response($response, REST_Controller::HTTP_OK);
   }
     function becomeinstructor_post()
    {
       $userdata = array();
         $auth_token = $_GET['auth_token'];
         $logged_in_user_details = json_decode($this->token_data_get($auth_token), true);
        $user_details = json_decode($this->token_data_get($auth_token), true);
      
        // CHEKING IF A FORM HAS BEEN SUBMITTED FOR REGISTERING AN INSTRUCTOR
        if (isset($_POST) && !empty($_POST)) {
            $this->api_model->post_instructor_application();
        }

        // CHECK USER AVAILABILITY
        $user_detailss = $this->user_model->get_all_user($user_details['user_id']);
        if ($user_detailss->num_rows() > 0) {
            $page_data['$user_detailss'] = $user_detailss->row_array();
        } else {
            $userdata ['status'] = get_phrase('user_not_found'); 
        }
      $this->set_response($userdata, REST_Controller::HTTP_OK);
    }
    
    function becomeorganizer_post()
    {
       $userdata = array();
         $auth_token = $_GET['auth_token'];
         $logged_in_user_details = json_decode($this->token_data_get($auth_token), true);
        $user_details = json_decode($this->token_data_get($auth_token), true);
      
        // CHEKING IF A FORM HAS BEEN SUBMITTED FOR REGISTERING AN INSTRUCTOR
        if (isset($_POST) && !empty($_POST)) {
            $this->api_model->post_organization_application();
        }

        // CHECK USER AVAILABILITY
        $user_detailss = $this->user_model->get_all_user($user_details['user_id']);
        if ($user_detailss->num_rows() > 0) {
            $page_data['user_detailss'] = $user_detailss->row_array();
        } else {
            $userdata ['status'] = get_phrase('user_not_found'); 
        }
      $this->set_response($page_data, REST_Controller::HTTP_OK);
    }
    
   
  public function all_categories(){
      return 1;
    //   echo 5;
    //   exit;
    //  $categories = array();
    // $categories = $this->api_model->categories_all();
    // $this->set_response($categories, REST_Controller::HTTP_OK);
    
    $all_categories = array();
    $all_categories = $this->api_model->all_categories();
    $this->set_response($all_categories, REST_Controller::HTTP_OK);  
  }
    
  public function web_redirect_to_buy_course_get($auth_token = "", $course_id = "", $app_url = ""){
    $this->load->library('session');
    if($auth_token != "" && $course_id != "" && is_numeric($course_id)){
 
      //decode user auth token
      $user_details = json_decode($this->token_data_get($auth_token), true);
      $query = $this->user_model->get_all_user($user_details['user_id']);

      //user login
      if ($query->num_rows() > 0) {
          $row = $query->row();
          $this->session->set_userdata('user_id', $row->id);
          $this->session->set_userdata('role_id', $row->role_id);
          $this->session->set_userdata('role', get_user_role('user_role', $row->id));
          $this->session->set_userdata('name', $row->first_name . ' ' . $row->last_name);
          $this->session->set_userdata('is_instructor', $row->is_instructor);
          if ($row->role_id == 1) {
              $this->session->set_userdata('admin_login', '1');
          } else if ($row->role_id == 2) {
              $this->session->set_userdata('user_login', '1');
          }
          $this->session->set_userdata('app_url', $app_url.'://');
          $this->session->set_flashdata('flash_message', get_phrase('welcome') . ' ' . $row->first_name . ' ' . $row->last_name);


          //add item to cart
          if (!$this->session->userdata('cart_items')) {
            $this->session->set_userdata('cart_items', array());
          }
          $previous_cart_items = $this->session->userdata('cart_items');
          if (in_array($course_id, $previous_cart_items)) {
              $key = array_search($course_id, $previous_cart_items);
              unset($previous_cart_items[$key]);
          } else {
              array_push($previous_cart_items, $course_id);
          }

          $course_details = $this->crud_model->get_course_by_id($course_id)->row_array();
          if($course_details['discount_flag'] == 1){
            $price = $course_details['discounted_price'];
          }else{
            $price = $course_details['price'];
          }

          $this->session->set_userdata('total_price_of_checking_out', $price);
          $this->session->set_userdata('cart_items', $previous_cart_items);

          //redirect to payment page
          redirect(site_url('home/payment'), 'refresh');
      } else {
          $this->session->set_flashdata('error_message', get_phrase('invalid_auth_token'));
          redirect(site_url('home/login'), 'refresh');
      }
    }else{
      $this->session->set_flashdata('error_message', site_phrase('something_is_wrong'));
      redirect(site_url('home/login'), 'refresh');
    }
  }

  // Unprotected routes will be located here.
  
  // Fetch all the top courses
  public function topcourses_get($top_course_id = "") {
    $top_courses = array();
    $top_courses = $this->api_model->topcourses_get($top_course_id);
    $this->set_response($top_courses, REST_Controller::HTTP_OK);
  }
  public function appproveappplication_get() {
    $top_courses = array();
    $top_courses = $this->api_model->get_approved_applications($top_course_id);
    $this->set_response($top_courses, REST_Controller::HTTP_OK);
  }
  public function pendingappplication_get() {
    $top_courses = array();
    $top_courses = $this->api_model->get_pending_applications($top_course_id);
    $this->set_response($top_courses, REST_Controller::HTTP_OK);
  }
  
  // Fetch the top ten courses
   public function toptencourses_get($top_course_id = "") {
    $top_courses = array();
    $top_courses = $this->api_model->toptencourses_get($top_course_id);
    $this->set_response($top_courses, REST_Controller::HTTP_OK);
  }
   
      // Fetch feature instructor
    public function featuredinstructor_get($featured_instructor_id = "") {
        $featured_instructor = array();
        $limit = (isset($_GET['limit']) && !empty($_GET['limit']))?$_GET['limit']:5;
        $offset = (isset($_GET['offset']) && !empty($_GET['offset']))?$_GET['offset']:0;
        $featured_instructor = $this->api_model->featuredinstructor_get($featured_instructor_id, $limit, $offset);
        $this->set_response($featured_instructor, REST_Controller::HTTP_OK);
    } 
  
  // Fetch the top five courses
  public function topfivecourses_get($top_course_id = "") {
    $top_courses = array();
    $top_courses = $this->api_model->topfivecourses_get($top_course_id);
    $this->set_response($top_courses, REST_Controller::HTTP_OK);
  }
  
  public function ticket_post() {
    $top_courses = array();
    $top_courses = $this->api_model->add_support_ticket();
    $this->set_response($top_courses, REST_Controller::HTTP_OK);
  }
  
  public function courseswisestudent_get() {
    $top_courses = array();
    $top_courses = $this->api_model->courseswisestudent_get($top_course_id);
    $this->set_response($top_courses, REST_Controller::HTTP_OK);
  }
    
  public function warnings_get(){
        $page_data = array();
        
        $page_data['warnings'] = $this->crud_model->get_warnings();
      
        
       
      $this->set_response($page_data, REST_Controller::HTTP_OK);
    }
      
  public function app_logo_get(){
    $response = array();
    $response['banner_image'] = base_url('uploads/system/'.get_frontend_settings('banner_image'));
    $response['light_logo'] = base_url('uploads/system/'.get_frontend_settings('light_logo'));
    $response['dark_logo'] = base_url('uploads/system/'.get_frontend_settings('dark_logo'));
    $response['small_logo'] = base_url('uploads/system/'.get_frontend_settings('small_logo'));
    $response['favicon'] = base_url('uploads/system/'.get_frontend_settings('favicon'));

    $this->set_response($response, REST_Controller::HTTP_OK);
  }

  // Fetch all the categories
  public function categories_get($category_id = "") {
    // echo 2;
    // exit;
    $all_categories = array();
    $all_categories = $this->api_model->categories_get($category_id);
    $this->set_response($all_categories, REST_Controller::HTTP_OK);
  }
  
  // Fetch all the top categories
  public function topcategories_get($category_id = "") {

    $all_categories = array();
    $all_categories = $this->api_model->topcategories_get($category_id);
    $this->set_response($all_categories, REST_Controller::HTTP_OK);
  }

  // Fetch all the courses belong to a certain category
    public function category_wise_course_get() {
        $category_id = $_GET['category_id'];
        $device_type = $_GET['device_type'];
        $limit = (isset($_GET['limit']) && !empty($_GET['limit']))?$_GET['limit']:5;
        $offset = (isset($_GET['offset']) && !empty($_GET['offset']))?$_GET['offset']:0;
        $courses = $this->api_model->category_wise_course_get($category_id,$device_type,$limit,$offset);
        $this->set_response($courses, REST_Controller::HTTP_OK);
    }

  // Fetch all the courses belong to a certain category
  public function languages_get() {
    $languages = $this->api_model->languages_get();
    $this->set_response($languages, REST_Controller::HTTP_OK);
  }
 

  // Filter course
  public function filter_course_get() {
    $courses = $this->api_model->filter_course();
  
    $this->set_response($courses, REST_Controller::HTTP_OK);
  }

  // Filter course
  public function courses_by_search_string_get() {
    $search_string = $_GET['search_string'];
    $courses = $this->api_model->courses_by_search_string_get($search_string);
    $this->set_response($courses, REST_Controller::HTTP_OK);
  }
  // get system settings
  public function system_settings_get() {
    $system_settings_data = $this->api_model->system_settings_get();
    $this->set_response($system_settings_data, REST_Controller::HTTP_OK);
  }
   // course Api
  public function course_get() {
    $search_string = $_GET['search_string'];
    $courses = $this->api_model->course_get($search_string);
    $this->set_response($courses, REST_Controller::HTTP_OK);
  }
  
  public function updatecourse_post() {
  
    // $response = array();
 
    // $response = $this->api_model->updatecourse_post();
    // return $this->set_response($response, REST_Controller::HTTP_OK);
    
            $response = array();
            $course_id = $_GET['course_id'];
            $my_courses = $this->api_model->updatecourse_post($course_id);
            $response = $my_courses;
        
    
            return $this->set_response($response, REST_Controller::HTTP_OK);
  }
   public function course_post()
    {
            $response = array();
           
            $my_courses = $this->api_model->createcourse_post();
            $response = $my_courses;
        
    
            return $this->set_response($response, REST_Controller::HTTP_OK);
    }
  // My Courses API
   public function mycourses_get() {
    $response = array();
    $auth_token = $_GET['auth_token'];
    $logged_in_user_details = json_decode($this->token_data_get($auth_token), true);

    if ($logged_in_user_details['user_id'] > 0) {
      $response = $this->api_model->my_courses_get($logged_in_user_details['user_id']);
    }else{

    }
    return $this->set_response($response, REST_Controller::HTTP_OK);
  }
  
//   public function handleWishList_post($return_number = "")
//     {
//     //     $wishlist = array();
//     //   if (isset($_GET['auth_token']) && !empty($_GET['auth_token'])) {
//     //       $auth_token = $_GET['auth_token'];
//     //       $logged_in_user_details = json_decode($this->token_data_get($auth_token), true);
//     //       }else {
//     //         if (isset($_POST['course_id'])) {
//     //             $course_id = $this->input->post('course_id');
//     //             $this->crud_model->handleWishList($course_id);
//     //         }
//     //         if ($return_number == 'true') {
//     //             echo sizeof($this->api_model->getWishLists());
//     //         } else {
//     //             return $this->set_response($wishlist, REST_Controller::HTTP_OK);
//     //         }
            
            
//     //     }
        
//       $aboutus = array();
//       if (isset($_GET['auth_token']) && !empty($_GET['auth_token'])) {
//           $auth_token = $_GET['auth_token'];
//           $logged_in_user_details = json_decode($this->token_data_get($auth_token), true);
          
//          $aboutus = $this->api_model->getWishLists();
//          $aboutus['status'] = $aboutus;
//       }
//       else{
//             $aboutus['status'] = 'Something went wrong';
//       }
//     return $this->set_response($aboutus, REST_Controller::HTTP_OK);
//     }
    
   public function aboutus_post() {
    $aboutus = array();
    $aboutus = $this->api_model->aboutus_post();
    return $this->set_response($aboutus, REST_Controller::HTTP_OK);
  }
  
//   public function removewishlist_post() {
//     $aboutus = array();
//     $aboutus = $this->api_model->removewishlist_post();
//     return $this->set_response($aboutus, REST_Controller::HTTP_OK);
//   }

public function removewishlist_post()
    {
        $response = array();
        if (isset($_GET['auth_token']) && !empty($_GET['auth_token'])) {
          $auth_token = $_GET['auth_token'];
          $logged_in_user_details = json_decode($this->token_data_get($auth_token), true);
         
            $my_courses = $this->api_model->removewishlist_post($logged_in_user_details['user_id']);
            $page_data['my_courses'] = $my_courses;
        }
    else{
      $response['status'] = 'failed';
    }
            return $this->set_response($page_data, REST_Controller::HTTP_OK);

    }
  
  public function addTocart_post() {
    $aboutus = array();
    $aboutus = $this->api_model->addTocart_post();
    return $this->set_response($aboutus, REST_Controller::HTTP_OK);
  }
  
  public function contact_post() {
    $aboutus = array();
    $aboutus = $this->api_model->contact_us();
    return $this->set_response($aboutus, REST_Controller::HTTP_OK);
  }
  
   public function privacy_get() {
   $privacy = array();
    $privacy = $this->api_model->privacy_get();
   return $this->set_response($privacy, REST_Controller::HTTP_OK);
  }
  
  public function about_get() {
   $privacy = array();
    $privacy = $this->api_model->about_get();
   return $this->set_response($privacy, REST_Controller::HTTP_OK);
  }
  
  public function ticket_get() {
//   $tickets = array();
//     $tickets = $this->api_model->ticket_get();
//   return $this->set_response($tickets, REST_Controller::HTTP_OK);
    $response = array();
        if (isset($_GET['auth_token']) && !empty($_GET['auth_token'])) {
          $auth_token = $_GET['auth_token'];
          $logged_in_user_details = json_decode($this->token_data_get($auth_token), true);
          $response = $this->api_model->ticket_get($logged_in_user_details['user_id']);
          $response['status'] = $response;
        }else{
          $response['status'] = 'failed';
        }
        return $this->set_response($response, REST_Controller::HTTP_OK);
  }
  
  public function terms_get() {
   $aboutus = array();
    $aboutus = $this->api_model->terms_get();
   return $this->set_response($aboutus, REST_Controller::HTTP_OK);
  }
  
   public function refund_get() {
   $refund = array();
    $refund = $this->api_model->refund_get();
   return $this->set_response($refund, REST_Controller::HTTP_OK);
  }
  
  // Login Api
  public function login_get() {
    $userdata = $this->api_model->login_get();
    if ($userdata['validity'] == 1) {
      $userdata['token'] = $this->tokenHandler->GenerateToken($userdata);
    }
    return $this->set_response($userdata, REST_Controller::HTTP_OK);
  }
  public function logout_post(){
    $this->session->sess_destroy();
    redirect(base_url('auth'));
   }  
   
   public function addinstructor_post() {
   
    $response = array();
    $response = $this->api_model->addinstructor_post();
    return $this->set_response($response, REST_Controller::HTTP_OK);
  }
  // Signup Api
  public function signup_post() {
   
    $response = array();
    $response = $this->api_model->signup_post();
    return $this->set_response($response, REST_Controller::HTTP_OK);
  }
  //signin  
  public function signin_post() {
//   return $this->set_response($_POST['email'], REST_Controller::HTTP_OK);
      $userdata = $this->api_model->login_get();
        if ($userdata['validity'] == 1) {
          $userdata['token'] = $this->tokenHandler->GenerateToken($userdata);
        }
        return $this->set_response($userdata, REST_Controller::HTTP_OK);
  }
  // Signup Api organization
   public function signups_post() {
   
    $response = array();
    $response = $this->api_model->signups_post();
    return $this->set_response($response, REST_Controller::HTTP_OK);
  }
  // Signup Api teacher
  public function signup1_post() {
   
    $response = array();
    $response = $this->api_model->signup1_post();
    return $this->set_response($response, REST_Controller::HTTP_OK);
  }
  
  public function forgot_post() {
   
    $forgot = array();
    $forgot = $this->api_model->forgot_post();
   return $this->set_response($forgot, REST_Controller::HTTP_OK);
  }

  // Verify Email Api
  public function verify_email_address_post(){
    $response = array();
    $response = $this->api_model->verify_email_address_post();
    return $this->set_response($response, REST_Controller::HTTP_OK);
  }

  // Resend Verification Code Api
  public function resend_verification_code_post(){
    $response = array();
    $response = $this->api_model->resend_verification_code_post();
    return $this->set_response($response, REST_Controller::HTTP_OK);
  }

  public function course_object_by_id_get() {
    $course = $this->api_model->course_object_by_id_get();
    $this->set_response($course, REST_Controller::HTTP_OK);
  }
  //Protected APIs. This APIs will require Authorization.
  // My Courses API
  public function my_courses_get() {
    $response = array();
    $auth_token = $_GET['auth_token'];
    $logged_in_user_details = json_decode($this->token_data_get($auth_token), true);

    if ($logged_in_user_details['user_id'] > 0) {
      $response = $this->api_model->my_courses_get($logged_in_user_details['user_id']);
    }else{

    }
    return $this->set_response($response, REST_Controller::HTTP_OK);
  }

  // My Courses API
  public function my_wishlist_get() {
    $response = array();      
    $auth_token = $_GET['auth_token'];
    $logged_in_user_details = json_decode($this->token_data_get($auth_token), true);

    if ($logged_in_user_details['user_id'] > 0) {
      $response = $this->api_model->my_wishlist_get($logged_in_user_details['user_id']);
    }else{

    }
    return $this->set_response($response, REST_Controller::HTTP_OK);
  }



  // Get all the sections
  public function sections_get() {
    $response = array();
    $auth_token = $_GET['auth_token'];
    $course_id  = $_GET['course_id'];
    $logged_in_user_details = json_decode($this->token_data_get($auth_token), true);

    if ($logged_in_user_details['user_id'] > 0) {
      $response = $this->api_model->sections_get($course_id, $logged_in_user_details['user_id']);
    }else{
    }
    return $this->set_response($response, REST_Controller::HTTP_OK);
  }

  //Get all lessons, section wise.
  public function section_wise_lessons_get() {
    $response = array();
    $auth_token = $_GET['auth_token'];
    $section_id = $_GET['section_id'];
    $logged_in_user_details = json_decode($this->token_data_get($auth_token), true);
    if ($logged_in_user_details['user_id'] > 0) {
      $response = $this->api_model->section_wise_lessons($section_id, $logged_in_user_details['user_id']);
    }else{
    }
    return $this->set_response($response, REST_Controller::HTTP_OK);
  }

  // Remove from wishlist
  public function togglewishlistitems_get() {
    $auth_token = $_GET['auth_token'];
    $logged_in_user_details = json_decode($this->token_data_get($auth_token), true);
    if ($logged_in_user_details['user_id'] > 0) {
      $status = $this->api_model->toggle_wishlist_items_get($logged_in_user_details['user_id'], $logged_in_user_details['user_id']);
    }
    $response['status'] = $status;
    return $this->set_response($response, REST_Controller::HTTP_OK);
  }

  // Lesson Details
  public function lesson_details_get() {
    $response = array();
    $auth_token = $_GET['auth_token'];
    $lesson_id = $_GET['lesson_id'];

    $logged_in_user_details = json_decode($this->token_data_get($auth_token), true);
    if ($logged_in_user_details['user_id'] > 0) {
      $response = $this->api_model->lesson_details_get($logged_in_user_details['user_id'], $lesson_id);
    }else{

    }
    return $this->set_response($response, REST_Controller::HTTP_OK);
  }

  // Course Details
  public function course_details_by_id_get() {
    $response = array();
    $course_id = $_GET['course_id'];
    if (isset($_GET['auth_token']) && !empty($_GET['auth_token'])) {
      $auth_token = $_GET['auth_token'];
      $logged_in_user_details = json_decode($this->token_data_get($auth_token), true);
    }else{
      $logged_in_user_details['user_id'] = 0;
    }
    if ($logged_in_user_details['user_id'] > 0) {
      $response = $this->api_model->course_details_by_id_get($logged_in_user_details['user_id'], $course_id);
    }else{
      $response = $this->api_model->course_details_by_id_get(0, $course_id);
    }
    return $this->set_response($response, REST_Controller::HTTP_OK);
  }

    public function submit_quizV2_post() {
        print_r($this->input->post());
        exit;
        
        // if (!isset($_GET['auth_token']) || empty($_GET['auth_token'])) {
        //     $response['status'] = 'failed';
        //     $response['message'] = 'Invalid Token';
        //     return $this->set_response($response, REST_Controller::HTTP_OK);
        // }    
        // $logged_in_user_details = json_decode($this->token_data_get($auth_token), true);
      
        // if(empty($logged_in_user_details)){
        //     $response['status'] = 'failed';
        //     $response['message'] = 'Invalid Token';
        //     return $this->set_response($response, REST_Controller::HTTP_OK);
        // }
        $question_ids = json_decode($this->input->post('quiz_question'),true);
        $answers = json_decode($this->input->post('answers'),true);
        $lesson_id = $this->input->post('lesson_id');
        $user_id = $this->input->post('user_id');
        foreach($question_ids as $key => $id){
            $this->crud_model->submit_answer_api($id, $answers[$key], $lesson_id, $user_id);
        }
        $response['status'] = 'Succeed';
        $response['message'] = 'Success';
        return $this->set_response($response, REST_Controller::HTTP_OK);
      }
  // submit quiz view
  public function submit_quiz_post() {
    $submitted_quiz_info = array();
    $container = array();
    $quiz_id = $this->input->post('lesson_id');
    $quiz_questions = $this->crud_model->get_quiz_questions($quiz_id)->result_array();
    $total_correct_answers = 0;
    foreach ($quiz_questions as $quiz_question) {
      $submitted_answer_status = 0;
      $correct_answers = json_decode($quiz_question['correct_answers']);
      $submitted_answers = array();
      
      //submit answer
      $this->crud_model->submit_answer(  $quiz_question['id']);
      
      foreach ($this->input->post($quiz_question['id']) as $each_submission) {
        if (isset($each_submission)) {
          array_push($submitted_answers, $each_submission);
        }
      }
      sort($correct_answers);
      sort($submitted_answers);
      if ($correct_answers == $submitted_answers) {
        $submitted_answer_status = 1;
        $total_correct_answers++;
      }
      $container = array(
        "question_id" => $quiz_question['id'],
        'submitted_answer_status' => $submitted_answer_status,
        "submitted_answers" => json_encode($submitted_answers),
        "correct_answers"  => json_encode($correct_answers),
      );
      array_push($submitted_quiz_info, $container);
    }
    $page_data['submitted_quiz_info']   = $submitted_quiz_info;
    $page_data['total_correct_answers'] = $total_correct_answers;
    $page_data['total_questions'] = count($quiz_questions);
    $this->load->view('lessons/quiz_result', $page_data);
  }

  public function save_course_progress_get() {
    $response = array();
    if (isset($_GET['auth_token']) && !empty($_GET['auth_token'])) {
      $auth_token = $_GET['auth_token'];
      $logged_in_user_details = json_decode($this->token_data_get($auth_token), true);
      $response = $this->api_model->save_course_progress_get($logged_in_user_details['user_id']);
    }else{

    }
    return $this->set_response($response, REST_Controller::HTTP_OK);
  }

  //Upload user image
  public function uploaduserimage_post() {
        //   return 1;
    $response = array();
    if (isset($_GET['auth_token']) && !empty($_GET['auth_token'])) {
      $auth_token = $_GET['auth_token'];
     
      $logged_in_user_details = json_decode($this->token_data_get($auth_token), true);
      if ($logged_in_user_details['user_id'] > 0) {
         
        if (isset($_FILES['file']) && $_FILES['file']['name'] != "") {
          $user_image = $this->db->get_where('users', array('id' => $logged_in_user_details['user_id']))->row('image').'.jpg';
          if(file_exists('uploads/user_image/' . $user_image)){
            unlink('uploads/user_image/' . $user_image);
          }
          $data['image'] = md5(rand(10000, 10000000));
          $this->db->where('id', $logged_in_user_details['user_id']);
          $this->db->update('users', $data);
          move_uploaded_file($_FILES['file']['tmp_name'], 'uploads/user_image/'.$data['image'].'.jpg');
        }
        $response['status'] = 'success';
      }
    }else{
      $response['status'] = 'failed';
    }
    return $this->set_response($response, REST_Controller::HTTP_OK);
  }

  // update user data
  public function updateuserdata_post() {
    $response = array();
  
    if (isset($_GET['auth_token']) && !empty($_GET['auth_token'])) {
      $auth_token = $_GET['auth_token'];
      $logged_in_user_details = json_decode($this->token_data_get($auth_token), true);
      if ($logged_in_user_details['user_id'] > 0) {
        $response = $this->api_model->updateuserdata_post($logged_in_user_details['user_id']);
      }
    }else{
      $response['status'] = 'failed';
      $response['error_reason'] = get_phrase('unauthorized_login');
    }
    return $this->set_response($response, REST_Controller::HTTP_OK);
   
  }
  
  //change email
  public function handleWishList_post() {
    $response = array();
    if (isset($_GET['auth_token']) && !empty($_GET['auth_token'])) {
      $auth_token = $_GET['auth_token'];
      $logged_in_user_details = json_decode($this->token_data_get($auth_token), true);
      if ($logged_in_user_details['user_id'] > 0) {
        $response = $this->api_model->getwishlists($logged_in_user_details['user_id']);
      }
    }else{
      $response['status'] = 'failed';
      $response['error_reason'] = get_phrase('unauthorized_login');
    }
    return $this->set_response($response, REST_Controller::HTTP_OK);
   
  }
  public function changemail_post() {
    $response = array();
  
    if (isset($_GET['auth_token']) && !empty($_GET['auth_token'])) {
      $auth_token = $_GET['auth_token'];
      $logged_in_user_details = json_decode($this->token_data_get($auth_token), true);
      if ($logged_in_user_details['user_id'] > 0) {
        $response = $this->api_model->changemail_post($logged_in_user_details['user_id']);
      }
    }else{
      $response['status'] = 'failed';
      $response['error_reason'] = get_phrase('unauthorized_login');
    }
    return $this->set_response($response, REST_Controller::HTTP_OK);
   
  }

  // password reset
  public function updatepassword_post() {
    $response = array();
    if (isset($_GET['auth_token']) && !empty($_GET['auth_token'])) {
      $auth_token = $_GET['auth_token'];
      $logged_in_user_details = json_decode($this->token_data_get($auth_token), true);
      if ($logged_in_user_details['user_id'] > 0) {
        $response = $this->api_model->updatepassword_post($logged_in_user_details['user_id']);
      }
    }else{
      $response['status'] = 'failed';
    }
    return $this->set_response($response, REST_Controller::HTTP_OK);
    
  }
  
  //change password
  public function changepassword_post() {
    $response = array();
    if (isset($_GET['auth_token']) && !empty($_GET['auth_token'])) {
      $auth_token = $_GET['auth_token'];
      $logged_in_user_details = json_decode($this->token_data_get($auth_token), true);
      if ($logged_in_user_details['user_id'] > 0) {
        $response = $this->api_model->changepassword_post($logged_in_user_details['user_id']);
      }
    }else{
      $response['status'] = 'failed';
    }
    return $this->set_response($response, REST_Controller::HTTP_OK);
    
  }
  public function mywishlist_get()
    {
       
        $response = array();
        if (isset($_GET['auth_token']) && !empty($_GET['auth_token'])) {
          $auth_token = $_GET['auth_token'];
          $logged_in_user_details = json_decode($this->token_data_get($auth_token), true);
         
            $my_courses = $this->api_model->get_courses_by_wishlists($logged_in_user_details['user_id']);
            $page_data['my_courses'] = $my_courses;
        }
    else{
      $response['status'] = 'failed';
    }
            return $this->set_response($page_data, REST_Controller::HTTP_OK);

    }
    
    public function studentcourse_get()
    {
            $response = array();
            $course_id = $_GET['course_id'];
            $my_courses = $this->api_model->get_courses_by_student($course_id);
            $response = $my_courses;
        
    
            return $this->set_response($response, REST_Controller::HTTP_OK);

    }
 
    public function forgot_password() {
        return 1;
    }
    
   // Get user data
   public function carts_get() {
    $response = array();
    if (isset($_GET['auth_token']) && !empty($_GET['auth_token'])) {
      $auth_token = $_GET['auth_token'];
      $logged_in_user_details = json_decode($this->token_data_get($auth_token), true);
      $response = $this->api_model->carts_get($logged_in_user_details['user_id']);
      $response['status'] = $response;
    }else{
      $response['status'] = 'failed';
    }
    return $this->set_response($response, REST_Controller::HTTP_OK);
   }
  
    public function purchasehistoryV2_get() {
        $response = array();
        if (isset($_GET['auth_token']) && !empty($_GET['auth_token'])) {
            $auth_token = $_GET['auth_token'];
            $limit = (isset($_GET['limit']) && !empty($_GET['limit']))?$_GET['limit']:100;
            $offset = (isset($_GET['offset']) && !empty($_GET['offset']))?$_GET['offset']:0;
            $logged_in_user_details = json_decode($this->token_data_get($auth_token), true);
            $response['data'] = $this->api_model->purchasehistory($logged_in_user_details['user_id'],$limit,$offset);
        }else{
          $response['status'] = 'failed';
        }
        return $this->set_response($response, REST_Controller::HTTP_OK);
    }
    
     //FOR MOBILE
    public function paymentsuccess_get($course_id = "", $user_id = "", $enroll_type = "")
    {
        
        if ($course_id > 0 && $user_id > 0) :
            $page_data['cart_item'] = $course_id;
            $page_data['user_id'] = $user_id;
            $page_data['is_login_now'] = 1;
            $page_data['enroll_type'] = $enroll_type;
            $page_data['page_name'] = 'shopping_cart';

            $this->session->unset_userdata('user_id');
            $this->session->unset_userdata('role_id');
            $this->session->unset_userdata('role');
            $this->session->unset_userdata('name');
            $this->session->unset_userdata('user_login');
            $this->session->unset_userdata('cart_items');
            return $page_data;
            
        endif;
    }
    
    public function purchasehistory_get() {
    $response = array();
    if (isset($_GET['auth_token']) && !empty($_GET['auth_token'])) {
      $auth_token = $_GET['auth_token'];
      $logged_in_user_details = json_decode($this->token_data_get($auth_token), true);
      $response = $this->api_model->is_purchased($logged_in_user_details['user_id']);
      $response['status'] = $response;
    }else{
      $response['status'] = 'failed';
    }
    return $this->set_response($response, REST_Controller::HTTP_OK);
  }
  
   public function userdata_get() {
    $response = array();
    if (isset($_GET['auth_token']) && !empty($_GET['auth_token'])) {
      $auth_token = $_GET['auth_token'];
      $logged_in_user_details = json_decode($this->token_data_get($auth_token), true);
      $response = $this->api_model->userdata_get($logged_in_user_details['user_id']);
      $response['status'] = 'success';
    }else{
      $response['status'] = 'failed';
    }
    return $this->set_response($response, REST_Controller::HTTP_OK);
  }
  
  public function teacherprofile_get() {
      $response = array();
      $response = $this->api_model->teacherprofile_get();
      $response['status'] = 'success';
    
      return $this->set_response($response, REST_Controller::HTTP_OK);
  }
   function report_post(){
        
         $response = array();
            $report = $this->api_model->get_report($_POST['course_id'], $_POST['user_id'],$_POST['reason'] );
            if($report){
               
                 $response['status'] = 'you have already report';
            }
            else{
                $this->api_model->report();
                $response['status'] = 'success';
                return $this->set_response($response, REST_Controller::HTTP_OK);
            }
        
    }
    
    function flagteacher_post(){
        
         $response = array();
           
                $this->api_model->flagteacher();
                $response['status'] = 'success';
                return $this->set_response($response, REST_Controller::HTTP_OK);
    }
    function flagstudent_post(){
        
         $response = array();
           
                $this->api_model->flagstudent();
                $response['status'] = 'success';
                return $this->set_response($response, REST_Controller::HTTP_OK);
    }
    function flagorganization_post(){
        
         $response = array();
           
                $this->api_model->flagorganization();
                $response['status'] = 'success';
                return $this->set_response($response, REST_Controller::HTTP_OK);
    }
    
  public function ratecourse_post(){
      if(isset($_GET['auth_token']) || !empty($_GET['auth_token'])){
        $logged_in_user_details = json_decode($this->token_data_get($_GET['auth_token']), true);
        if(empty($logged_in_user_details)){
            $response['message'] = "Invalid Auth Token";
            $response['status'] = 'failed';
        }else{
           
            $response = array();
            $data['review'] = $_POST['review'];
            $data['ratable_id'] = $_POST['course_id'];
            $data['ratable_type'] = 'course';
            $data['rating'] = $_POST['star_rating'];
            $data['date_added'] = strtotime(date('D, d-M-Y'));
            $data['user_id'] = $logged_in_user_details['user_id'];
            $result = $this->api_model->rate($data);
            $response['status'] = 'success';
            $response['data'] = $result;
        }
      }else{
        $response['message'] = "Invalid Auth Token";
        $response['status'] = 'failed';
      }
      
      return $this->set_response($response, REST_Controller::HTTP_OK);
    }
    
  public function organization_get() {
      $response = array();
      $response = $this->api_model->organization_get();
      $response['status'] = 'success';
      return $this->set_response($response, REST_Controller::HTTP_OK);
  }
  
   	 // SHOW PAYPAL CHECKOUT PAGE
    public function paypalcheckout_post($payment_request = "only_for_mobile")
    {
        return 1;
        $response = array();
          if (isset($_GET['auth_token']) && !empty($_GET['auth_token'])) {
              $auth_token = $_GET['auth_token'];
        
        $user_details = $this->user_model->get_all_user($user_id)->row_array();
        // $query = $this->db->get_where('cart', $user_details);
 
        // Retrieve cart data from the session
        // $data['cartItems'] = $this->db->get_where('cart');
		$this->db->where('user_id', $user_id);
		$top_courses = $this->db->get('cart')->result_array();
        
        //checking price
        if ($this->session->userdata('total_price') == $this->input->post('total_price')) :
            $total_price_of_checking_out  = $this->input->post('total_price');
        else :
            $total_price_of_checking_out = $this->session->userdata('total_price');
        endif;
        $page_data['payment_request'] = $payment_request;
        $page_data['user_details']    = $this->user_model->get_user($this->session->userdata('user_id'))->row_array();
        $page_data['amount_to_pay']   = $total_price_of_checking_out;
        $response['status'] = 'success';
      }
      else{
          $response['status'] = 'failed';
      }
        return $page_data;
    }
  
   public function pay_post()
    {  
        return 00;
        $response = array();
          if (isset($_GET['auth_token']) && !empty($_GET['auth_token'])) {
              $auth_token = $_GET['auth_token'];
              $logged_in_user_details = json_decode($this->token_data_get($auth_token), true);
        
              $page_data['total_price_of_checking_out'] = $this->session->userdata('total_price_of_checking_out');
         
              $response['status'] = 'success';
          }
          else{
              $response['status'] = 'failed'; 
          }
        
        return $response;
    }

  // check whether certificate addon is installed and get certificate
  public function certificate_addon_get() {
    $response = array();
    if (isset($_GET['auth_token']) && !empty($_GET['auth_token'])) {
      $auth_token = $_GET['auth_token'];
      $logged_in_user_details = json_decode($this->token_data_get($auth_token), true);
      $user_id = $logged_in_user_details['user_id'];
      $course_id = $_GET['course_id'];

      $response = $this->api_model->certificate_addon_get($user_id, $course_id);
    }else{
      $response['status'] = 'failed';
    }
    return $this->set_response($response, REST_Controller::HTTP_OK);
  }
  /////////// Generating Token and put user data into  token ///////////

  //////// get data from token ////////////
  public function GetTokenData()
  {
    $received_Token = $this->input->request_headers('Authorization');
    if (isset($received_Token['Token'])) {
      try
      {
        $jwtData = $this->tokenHandler->DecodeToken($received_Token['Token']);
        return json_encode($jwtData);
      }
      catch (Exception $e)
      {
        http_response_code('401');
        echo json_encode(array( "status" => false, "message" => $e->getMessage()));
        exit;
      }
    }else{
      echo json_encode(array( "status" => false, "message" => "Invalid Token"));
    }
  }

  public function token_data_get($auth_token)
  {
    //$received_Token = $this->input->request_headers('Authorization');
    if (isset($auth_token)) {
      try
      {

        $jwtData = $this->tokenHandler->DecodeToken($auth_token);
        return json_encode($jwtData);
      }
      catch (Exception $e)
      {
        echo 'catch';
        http_response_code('401');
        echo json_encode(array( "status" => false, "message" => $e->getMessage()));
        exit;
      }
    }else{
      echo json_encode(array( "status" => false, "message" => "Invalid Token"));
    }
  }

  public function enroll_free_course_get(){
    if (isset($_GET['auth_token']) && !empty($_GET['auth_token'])) {
      $auth_token = $_GET['auth_token'];
      $course_id = $_GET['course_id'];
      $logged_in_user_details = json_decode($this->token_data_get($auth_token), true);
      
      $course_details = $this->crud_model->get_course_by_id($course_id)->row_array();
      if ($course_details['is_free_course'] == 1) {
          $data['course_id'] = $course_id;
          $data['user_id']   = $logged_in_user_details['user_id'];
          if ($this->db->get_where('enrol', $data)->num_rows() > 0) {
              $response['message'] = 'already_enrolled';
              $response['status'] = 'failed';
          } else {
              $data['date_added'] = strtotime(date('D, d-M-Y'));
              $this->db->insert('enrol', $data);
              $response['message'] = 'success';
              $response['status'] = 'success';
          }
      } else {
          $response['message'] = 'This course is not free';
          $response['status'] = 'failed';
      }

    }else{
      $response['message'] = 'Invalid auth token';
      $response['status'] = 'failed';
    }

    return $this->set_response($response, REST_Controller::HTTP_OK);
  }


  function addon_status_get(){
    if(addon_status($_GET['unique_identifier'])){
      $response['status'] = true;
    }else{
      $response['status'] = false;
    }

    $this->set_response($response, REST_Controller::HTTP_OK);
  }
  
  public function course_certificate_get(){
    if (isset($_GET['auth_token']) && !empty($_GET['auth_token'])) {
        if(empty($_GET['user_id']) || empty($_GET['course_id'])){
            $response['message'] = 'Invalid Parameters';
            $response['status'] = 'failed';
        }else{
            $response['message'] = 'Success';
            $response['status'] = 'succeed';
            $response['data'] = $this->api_model->get_course_certificate($_GET['user_id'],$_GET['course_id']);
        }
        $student_id = $_GET['user_id'];
        $course_id = $_GET['course_id'];
    
    }else{
      $response['message'] = 'Invalid auth token';
      $response['status'] = 'failed';
    }
    
    return $this->set_response($response, REST_Controller::HTTP_OK);
  }
  
  public function course_wise_lesson_get(){
      
      if(!empty($_GET['course_id'])){
        $lessons = [];
        $sections = $this->crud_model->get_section('course', $_GET['course_id'])->result_array();
        if(!empty($sections)){
            foreach($sections as $key => $section){
                $result = $this->crud_model->get_lessons('section', $section['id'])->result_array();
                if(!empty($result)){
                    $result[$key]['section_name'] = $section['title'];
                    array_push($lessons,$result);
                }
            }
            $response['message'] = 'Success';
            $response['status'] = 'succeed';
            $response['data'] = $lessons;
        }else{
            $response['message'] = 'Lessons Not Found';
            $response['status'] = 'failed';
        }
       
      }else{
        $response['message'] = 'Invalid Parameters';
        $response['status'] = 'failed';
      }
      return $this->set_response($response, REST_Controller::HTTP_OK);
      
  }
    public function quiz_details_by_lesson_id_get(){
        if(!empty($_GET['lesson_id'])){
            $quizes = $this->api_model->get_quiz_details($_GET['lesson_id']); 
            $response['message'] = 'Success';
            $response['status'] = 'succeed';
            $response['data'] = $quizes;
        }else{
            $response['message'] = 'Invalid Parameters';
            $response['status'] = 'failed';
        }
        return $this->set_response($response, REST_Controller::HTTP_OK);
    }
    public function course_by_id_get(){
          if(!empty($_GET['course_id']) || !isset($_GET['auth_token']) || !empty($_GET['auth_token'])){
              $course_details = $this->crud_model->get_course_by_id($_GET['course_id'])->row_array();
              $response['message'] = 'Success';
              $response['status'] = 'succeed';
              $response['data'] = $course_details;
          }else{
             $response['message'] = 'Invalid auth token or Parameters';
             $response['status'] = 'failed';
          }
          return $this->set_response($response, REST_Controller::HTTP_OK);
      } 
      
    public function wishlist_request_get(){
        if(!empty($_GET['course_id']) || !isset($_GET['auth_token']) || !empty($_GET['auth_token'])){
            $add_to_wishlist_flag = true;
            $course_id = $_GET['course_id'];
            $user_details = json_decode($this->token_data_get($_GET['auth_token']), true);
            $user = [];
            if(!empty($user_details)){
                $user = $this->user_model->get_user($user_details['user_id'])->row_array();
                $user_wishlist = json_decode($user['wishlist'],true);
                if(!empty($user_wishlist)){
                    foreach($user_wishlist as $item){
                        if($item == $course_id){
                            $add_to_wishlist_flag = false;
                            break;
                        }
                    }
                }
               
                if($add_to_wishlist_flag){
                    $this->add_to_wishlist($user, $course_id);
                    $response['message'] = 'Course Added To Wishlist';
                    $response['status'] = 'Succeed';
                }else{
                    $this->remove_from_wishlist($user,$course_id);
                    $response['message'] = 'Course Removed From Wishlist';
                    $response['status'] = 'Succeed';
                }
            }
        }else{
            $response['message'] = 'Invalid auth token or Parameters';
            $response['status'] = 'failed';
        }
        $this->set_response($response, REST_Controller::HTTP_OK);
        
    }
    
    public function add_to_wishlist($user, $course_id){
       
        
        if($user['wishlist'] == 'null'){
            $data['wishlist'] = json_encode(array($course_id));
        }else{
            $current_wishlist = json_decode($user['wishlist']);
            array_push($current_wishlist,$course_id);
            $data['wishlist'] = json_encode($current_wishlist);
        }
       
       
        $this->db->where('id', $user['id']);
        $this->db->update('users',$data);
        
    }
    
    public function remove_from_wishlist($user, $course_id){
        $wishlist = array();
        $current_wishlist = json_decode($user['wishlist']);
        foreach($current_wishlist as $item){
            if($item !== $course_id){
                array_push($wishlist,$item);
            }
        }
        $data['wishlist'] = json_encode($wishlist);
        $this->db->where('id', $user['id']);
        $this->db->update('users',$data);
    }
    
    public function teachers_details_by_course_id_get(){
        if(!empty($_GET['course_id'])){
            $instructors = [];
            $course_details = $this->crud_model->get_course_by_id($_GET['course_id'])->row_array();
            if(!empty($course_details)){
                $instructor_ids = explode(',',$course_details['user_id']);
                foreach($instructor_ids as $key => $id){
                    $instructor = $this->user_model->get_instructor($id)->row_array();
                    if(!empty($instructor)){
                        $instructor['image'] = $this->user_model->get_user_image_url($instructor['id']);
    		            array_push($instructors,$instructor);
                    }
                }
                $response['message'] = 'Success';
                $response['status'] = 'succeed';
                $response['data'] = $instructors;
            }
           
        }else{
            $response['message'] = 'Invalid Parameters';
            $response['status'] = 'failed';
        }
        return $this->set_response($response, REST_Controller::HTTP_OK);
    }
    function zoomliveclass_get(){
        $course_id = $_GET['course_id'];
        $auth_token = $_GET['auth_token'];
    
        $user_details = json_decode($this->token_data_get($auth_token), true);
        //check live class access ability | valid users
        $course_details = $this->crud_model->get_course_by_id($course_id)->row_array();
        if ($course_details['user_id'] != $user_details['user_id']) {
            $enrolled_history = $this->db->get_where('enrol' , array('user_id' => $user_details['user_id'], 'course_id' => $course_id))->num_rows();
            if ($enrolled_history > 0) {
              $access = true;
            }else {
              $access = false;
            }
        }else {
            $access = true;
    }

    if($access && $course_id > 0){
      $live_class = $this->db->get_where('live_class', array('course_id' => $course_id));
      if($live_class->num_rows() > 0){
        $response['zoom_live_class_details'] = $live_class->row_array();
      }else{
        $response['zoom_live_class_details'] = array();
      }
      $response['zoom_api_key'] = get_settings('zoom_api_key');
      $response['zoom_secret_key'] = get_settings('zoom_secret_key');
    }else{
      $response['zoom_live_class_details'] = array();
      $response['zoom_api_key'] = '';
      $response['zoom_secret_key'] = '';
    }
    $this->set_response($response, REST_Controller::HTTP_OK);
  }
  
  
}
