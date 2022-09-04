<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Api_model extends CI_Model
{

	// constructor
	function __construct()
	{
		parent::__construct();
		/*cache control*/
		$this->load->library('pagination');
		$this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
		$this->output->set_header('Pragma: no-cache');
	}
   
	// get the top courses
	public function topcourses_get($top_course_id = "")
	{
		if ($top_course_id != "") {
			$this->db->where('id', $top_course_id);
		}
		$this->db->where('is_top_course', 1);
		$this->db->where('status', 'active');
		$top_courses = $this->db->get('course')->result_array();
		// This block of codes return the required data of courses
		$result = array();
		$result = $this->course_data($top_courses);
		return $result;
	}
	
	// get the top 10 courses
	public function toptencourses_get($top_course_id = "")
	{
		if ($top_course_id != "") {
			$this->db->where('id', $top_course_id);
		}
		$this->db->where('is_top_course', 1);
		$this->db->where('status', 'active');
		$this->db->order_by('id' , 'desc');
		$this->db->limit(10);
		$top_courses = $this->db->get('course')->result_array();
		// This block of codes return the required data of courses
		$result = array();
		$result = $this->course_data($top_courses);
		return $result;
	}
	
	// get the top 10 courses
	public function featuredinstructor_get($featured_instructor_id = "", $limit= 5, $offset=0)
	{
		if ($featured_instructor_id != "") {
			$this->db->where('id', $featured_instructor_id);
		}
		$this->db->where('is_instructor', 1);
		$this->db->where('is_featured_instructor', 1);
		$this->db->where('status', 1);
	    $this->db->order_by('id' , 'desc');
		$this->db->limit($limit, $offset);
// 		uploads/user_image/
		$result = $this->db->get('users')->result_array();
		$featured_instructor = [];
		if(!empty($result)){
    		foreach($result as $instructor) {
    		    $instructor['image'] = $this->user_model->get_user_image_url($instructor['id']);
    		    array_push($featured_instructor,$instructor);
    		}
		
	    }
		return $featured_instructor;
	}
	
	public function get_quiz_details($quiz_id){
	   $this->db->where('quiz_id',$quiz_id);
	   return $this->db->get('question')->result_array();
	   
	}
	
	public function get_course_certificate($user_id,$course_id){
	    $this->db->where('student_id', $user_id);
		$this->db->where('course_id', $course_id);
// 		uploads/user_image/
		$result = $this->db->get('certificates')->result_array();
		
		$certificates = [];
		if(!empty($result)){
    		foreach($result as $certificate) {
    		    $certificates['shareable_url'] = $this->user_model->get_student_certificate($certificate['id']);
    		    array_push($featured_instructor,$instructor);
    		}
		
	    }
		return $certificates;
	}
	// get the top 10 courses
	public function topfivecourses_get($top_course_id = "")
	{
		if ($top_course_id != "") {
			$this->db->where('id', $top_course_id);
		}
		$this->db->where('is_top_course', 1);
		$this->db->where('status', 'active');
		$this->db->limit(5);
		$top_courses = $this->db->get('course')->result_array();
		// This block of codes return the required data of courses
		$result = array();
		$result = $this->course_data($top_courses);
		return $result;
	}
	
		// get the top courses
	public function courseswisestudent_get($user_id = "")
	{
		$userdata = array();
        $user_details = $this->user_model->get_all_user($user_id)->row_array();
        // $query = $this->db->get_where('cart', $user_details);
 
        // Retrieve cart data from the session
        // $data['cartItems'] = $this->db->get_where('cart');
		$this->db->where('user_id', $user_id);
		$top_courses = $this->db->get('users')->result_array();
        //  $cartitems = Cart::where('user_id', Auth::id())->get();
    	$userdata['status'] = $top_courses;
		return $userdata;
		
       

	}
	
	//choose payment gateway
    public function payment_post()
    {
        if ($this->session->userdata('user_login') != 1)
            redirect('login', 'refresh');

        $page_data['total_price_of_checking_out'] = $this->session->userdata('total_price_of_checking_out');
        $page_data['page_title'] = site_phrase("payment_gateway");
       return $page_data;
    }

	// Get parent categories
	public function categories_get($category_id)
	{
		if ($category_id != "") {
			$this->db->where('id', $category_id);
		}
		//$this->db->where('parent', 0);
		$categories = $this->db->get('category')->result_array();
		foreach ($categories as $key => $category) {
			$categories[$key]['thumbnail'] = $this->get_image('category_thumbnail', $category['thumbnail']);
			$categories[$key]['number_of_courses'] = $this->crud_model->get_category_wise_courses($category['id'])->num_rows();
		}
		return $categories;
	}
	
	// Get parent categories
	public function topcategories_get($category_id)
	{
		if ($category_id != "") {
			$this->db->where('id', $category_id);
		}
		//$this->db->where('parent', 0);
		$this->db->where('featured',1);
		$categories = $this->db->get('category')->result_array();
		foreach ($categories as $key => $category) {
			$categories[$key]['thumbnail'] = $this->get_image('category_thumbnail', $category['thumbnail']);
			$categories[$key]['number_of_courses'] = $this->crud_model->get_category_wise_courses($category['id'])->num_rows();
		}
		return $categories;
	}
	
	// Get parent categories
	public function result_get($category_id)
	{
		if ($category_id != "") {
			$this->db->where('id', $category_id);
		}
	
		$categories = $this->db->get('quiz_answers')->result_array();
		
		return $categories;
	}
	// Get all categories
	public function all_categories()
	{
		$all_categories = $this->db->get('category')->result_array();
		foreach ($all_categories as $key => $category) {
			$all_categories[$key]['thumbnail'] = $this->get_image('category_thumbnail', $category['thumbnail']);
			$all_categories[$key]['number_of_courses'] = $this->crud_model->get_category_wise_courses($category['id'])->num_rows();
		}
		return $all_categories;
	}

	// Get category wise courses
	public function category_wise_course_get($category_id,$deviceType="web", $limit=10, $offset=0)
	{
		$category_details = $this->crud_model->get_category_details_by_id($category_id)->row_array();
        
		if ($category_details['parent'] > 0) {
			$this->db->where('sub_category_id', $category_id);
		} else {
			$this->db->where('category_id', $category_id);
		}
		$this->db->where('status', 'active');
		if($deviceType == 'app'){
		    $this->db->limit(5);
		}
		$this->db->limit($limit, $offset);
		$courses = $this->db->get('course')->result_array();
		
		// This block of codes return the required data of courses
		$result = array();
		$result = $this->course_data($courses);
		return $result;
	}

	// Filter courses
	function filter_course()
	{
		$selected_category = $_GET['selected_category'];
		$selected_price = $_GET['selected_price'];
		$selected_level = $_GET['selected_level'];
		$selected_language = $_GET['selected_language'];
		$selected_rating = $_GET['selected_rating'];
		$selected_search_string = ltrim(rtrim($_GET['selected_search_string']));

		$course_ids = array();

		if ($selected_search_string != "" && $selected_search_string != "null") {
			$this->db->like('title', $selected_search_string);
		}
		if ($selected_category != "all") {
			$category_details = $this->crud_model->get_category_details_by_id($selected_category)->row_array();

			if ($category_details['parent'] > 0) {
				$this->db->where('sub_category_id', $selected_category);
			} else {
				$this->db->where('category_id', $selected_category);
			}
		}

		if ($selected_price != "all") {
			if ($selected_price == "paid") {
				$this->db->where('is_free_course', null);
			} elseif ($selected_price == "free") {
				$this->db->where('is_free_course', 1);
			}
		}

		if ($selected_level != "all") {
			$this->db->where('level', $selected_level);
		}

		if ($selected_language != "all") {
			$this->db->where('language', $selected_language);
		}

		$this->db->where('status', 'active');
		$courses = $this->db->get('course')->result_array();

		foreach ($courses as $course) {
			if ($selected_rating != "all") {
				$total_rating =  $this->crud_model->get_ratings('course', $course['id'], true)->row()->rating;
				$number_of_ratings = $this->crud_model->get_ratings('course', $course['id'])->num_rows();
				if ($number_of_ratings > 0) {
					$average_ceil_rating = ceil($total_rating / $number_of_ratings);
					if ($average_ceil_rating == $selected_rating) {
						array_push($course_ids, $course['id']);
					}
				}
			} else {
				array_push($course_ids, $course['id']);
			}
		}

		if (count($course_ids) > 0) {
			$this->db->where_in('id', $course_ids);
			$courses = $this->db->get('course')->result_array();
		} else {
			return array();
		}

		// This block of codes return the required data of courses
		$result = array();
		$result = $this->course_data($courses);
		return $result;
	}

	public function courses_by_search_string_get($search_string)
	{
		$this->db->like('title', $search_string);
		$this->db->where('status', 'active');
		$courses = $this->db->get('course')->result_array();
		return $this->course_data($courses);
	}
	//search course
	public function course_get($search_string)
	{
		$this->db->like('title', $search_string);
		$this->db->where('status', 'active');
		$courses = $this->db->get('course')->result_array();
		return $this->course_data($courses);
	}
		//update course
	public function updatecourse_post($course_id = "")
	{
	    $response = array();
	
			if (isset($_POST['title']) && html_escape($this->input->post('title')) != "") {
				$data['title'] = html_escape($this->input->post('title'));
			} else {
				$response['status'] = 'failed';
				$response['error_reason'] = get_phrase('title_can_not_be_empty');
				return $response;
			}
			if (isset($_POST['short_description']) && html_escape($this->input->post('short_description')) != "") {
				$data['short_description'] = html_escape($this->input->post('short_description'));
			} else {
				$response['status'] = 'failed';
				$response['error_reason'] = get_phrase('short_description_can_not_be_empty');
				return $response;
			}
			if (isset($_POST['description']) && html_escape($this->input->post('description')) != "") {
				$data['description'] = html_escape($this->input->post('description'));
			} else {
				$response['status'] = 'failed';
				$response['error_reason'] = get_phrase('description_can_not_be_empty');
				return $response;
			}
		
			if (isset($_POST['language']) && html_escape($this->input->post('language')) != "") {
				$data['language'] = html_escape($this->input->post('language'));
			} else {
				$response['status'] = 'failed';
				$response['error_reason'] = get_phrase('language_can_not_be_empty');
				return $response;
			}
			if (isset($_POST['is_free_course']) && html_escape($this->input->post('is_free_course')) != "") {
				$data['is_free_course'] = html_escape($this->input->post('is_free_course'));
			} else {
				$response['status'] = 'failed';
				$response['error_reason'] = get_phrase('is_free_course_can_not_be_empty');
				return $response;
			}
			if (isset($_POST['price']) && html_escape($this->input->post('price')) != "") {
				$data['price'] = html_escape($this->input->post('price'));
			} else {
				$response['status'] = 'failed';
				$response['error_reason'] = get_phrase('price_can_not_be_empty');
				return $response;
			}
		    if (isset($_POST['discounted_price']) && html_escape($this->input->post('discounted_price')) != "") {
				$data['discounted_price'] = html_escape($this->input->post('discounted_price'));
			} else {
				$response['status'] = 'failed';
				$response['error_reason'] = get_phrase('discounted_price_can_not_be_empty');
				return $response;
			}
			if (isset($_POST['level']) && html_escape($this->input->post('level')) != "") {
				$data['level'] = html_escape($this->input->post('level'));
			} else {
				$response['status'] = 'failed';
				$response['error_reason'] = get_phrase('level_can_not_be_empty');
				return $response;
			}
		    if (isset($_POST['video_url']) && html_escape($this->input->post('video_url')) != "") {
				$data['video_url'] = html_escape($this->input->post('video_url'));
			} else {
				$response['status'] = 'failed';
				$response['error_reason'] = get_phrase('video_url_can_not_be_empty');
				return $response;
			}
	
	        if (isset($_POST['meta_description']) && html_escape($this->input->post('meta_description')) != "") {
				$data['meta_description'] = html_escape($this->input->post('meta_description'));
			} else {
				$response['status'] = 'failed';
				$response['error_reason'] = get_phrase('meta_description_can_not_be_empty');
				return $response;
			}
			if (isset($_POST['meta_keywords']) && html_escape($this->input->post('meta_keywords')) != "") {
				$data['meta_keywords'] = html_escape($this->input->post('meta_keywords'));
			} else {
				$response['status'] = 'failed';
				$response['error_reason'] = get_phrase('meta_keywords_can_not_be_empty');
				return $response;
			}
			
	
        $data['discount_flag'] = $_POST['discount_flag'];
        $data['is_admin'] = 1;
   
    
        
        // Upload different number of images according to activated theme. Data is taking from the config.json file
            $course_media_files = themeConfiguration(get_frontend_settings('theme'), 'course_media_files');
            foreach ($course_media_files as $course_media => $size) {
                if ($_FILES[$course_media]['name'] != "") {
                    move_uploaded_file($_FILES[$course_media]['tmp_name'], 'uploads/thumbnails/course_thumbnails/' . $course_media . '_' . get_frontend_settings('theme') . '_' . $course_id . '.jpg');
            }
        }

        
		
			$this->db->where('id', $course_id);
			$this->db->update('course', $data);
			$response['status'] = 'success';
			$response['error_reason'] = get_phrase('succesffully_update_profile');
		
		    return $response;
	    
	    
    }
    //create course
	public function createcourse_post()
	{
	    $response = array();
	
			if (isset($_POST['title']) && html_escape($this->input->post('title')) != "") {
				$data['title'] = html_escape($this->input->post('title'));
			} else {
				$response['status'] = 'failed';
				$response['error_reason'] = get_phrase('title_can_not_be_empty');
				return $response;
			}
			if (isset($_POST['short_description']) && html_escape($this->input->post('short_description')) != "") {
				$data['short_description'] = html_escape($this->input->post('short_description'));
			} else {
				$response['status'] = 'failed';
				$response['error_reason'] = get_phrase('short_description_can_not_be_empty');
				return $response;
			}
			if (isset($_POST['description']) && html_escape($this->input->post('description')) != "") {
				$data['description'] = html_escape($this->input->post('description'));
			} else {
				$response['status'] = 'failed';
				$response['error_reason'] = get_phrase('description_can_not_be_empty');
				return $response;
			}
		
			if (isset($_POST['language']) && html_escape($this->input->post('language')) != "") {
				$data['language'] = html_escape($this->input->post('language'));
			} else {
				$response['status'] = 'failed';
				$response['error_reason'] = get_phrase('language_can_not_be_empty');
				return $response;
			}
			if (isset($_POST['is_free_course']) && html_escape($this->input->post('is_free_course')) != "") {
				$data['is_free_course'] = html_escape($this->input->post('is_free_course'));
			} else {
				$response['status'] = 'failed';
				$response['error_reason'] = get_phrase('is_free_course_can_not_be_empty');
				return $response;
			}
			if (isset($_POST['price']) && html_escape($this->input->post('price')) != "") {
				$data['price'] = html_escape($this->input->post('price'));
			} else {
				$response['status'] = 'failed';
				$response['error_reason'] = get_phrase('price_can_not_be_empty');
				return $response;
			}
		    if (isset($_POST['discounted_price']) && html_escape($this->input->post('discounted_price')) != "") {
				$data['discounted_price'] = html_escape($this->input->post('discounted_price'));
			} else {
				$response['status'] = 'failed';
				$response['error_reason'] = get_phrase('discounted_price_can_not_be_empty');
				return $response;
			}
			if (isset($_POST['level']) && html_escape($this->input->post('level')) != "") {
				$data['level'] = html_escape($this->input->post('level'));
			} else {
				$response['status'] = 'failed';
				$response['error_reason'] = get_phrase('level_can_not_be_empty');
				return $response;
			}
		    if (isset($_POST['video_url']) && html_escape($this->input->post('video_url')) != "") {
				$data['video_url'] = html_escape($this->input->post('video_url'));
			} else {
				$response['status'] = 'failed';
				$response['error_reason'] = get_phrase('video_url_can_not_be_empty');
				return $response;
			}
	
	        if (isset($_POST['meta_description']) && html_escape($this->input->post('meta_description')) != "") {
				$data['meta_description'] = html_escape($this->input->post('meta_description'));
			} else {
				$response['status'] = 'failed';
				$response['error_reason'] = get_phrase('meta_description_can_not_be_empty');
				return $response;
			}
			if (isset($_POST['meta_keywords']) && html_escape($this->input->post('meta_keywords')) != "") {
				$data['meta_keywords'] = html_escape($this->input->post('meta_keywords'));
			} else {
				$response['status'] = 'failed';
				$response['error_reason'] = get_phrase('meta_keywords_can_not_be_empty');
				return $response;
			}
			
	
        $data['discount_flag'] = $_POST['discount_flag'];
        $data['is_admin'] = 1;
   
    
        
        // Upload different number of images according to activated theme. Data is taking from the config.json file
            $course_media_files = themeConfiguration(get_frontend_settings('theme'), 'course_media_files');
            foreach ($course_media_files as $course_media => $size) {
                if ($_FILES[$course_media]['name'] != "") {
                    move_uploaded_file($_FILES[$course_media]['tmp_name'], 'uploads/thumbnails/course_thumbnails/' . $course_media . '_' . get_frontend_settings('theme') . '_' . $course_id . '.jpg');
            }
        }

        
		
			
			$this->db->insert('course', $data);
			$response['status'] = 'success';
			$response['error_reason'] = get_phrase('succesffully_save_profile');
		
		    return $response;
	    
	    
    }
    
    //create course
	public function addinstructor_post()
	{
	    $response = array();

		$data['first_name'] = $_POST['first_name'];
		$data['last_name'] = $_POST['last_name'];
	    $data['email'] = $_POST['email'];
	    $data['password'] = sha1($_POST['password']);
	    $verification_code = rand(100000, 999999);
	    $data['verification_code'] = $verification_code;

	    if (get_settings('instructor_email_verification') == 'enable') {
            $data['status'] = 0;
        }else {
            $data['status'] = 1;
        }

        $data['wishlist'] = json_encode(array());
        $data['watch_history'] = json_encode(array());
        $data['date_added'] = strtotime(date("Y-m-d H:i:s"));
        $social_links = array(
            'facebook' => "",
            'twitter'  => "",
            'linkedin' => ""
        );
        $data['social_links'] = json_encode($social_links);
        $data['role_id']  = 2;
        $data['is_instructor']  = 1;

         // Add paypal keys
        $paypal_info = array();
        $paypal['production_client_id'] = "";
        array_push($paypal_info, $paypal);
        $data['paypal_keys'] = json_encode($paypal_info);
        // Add Stripe keys
        $stripe_info = array();
        $stripe_keys = array(
            'public_live_key' => "",
            'secret_live_key' => ""
        );
        array_push($stripe_info, $stripe_keys);
        $data['stripe_keys'] = json_encode($stripe_info);

        $validity = $this->user_model->check_duplication('on_create', $data['email']);
        if($validity === 'unverified_user' || $validity == true) {
        	if($validity === true){
                $this->db->insert('users', $data);
		        if($this->db->insert_id() > 0){
		          $response['message'] = get_phrase('add_successful');
		          $response['email_verification'] = get_settings('instructor_email_verification');
		          $response['status'] = 200;
		          $response['validity'] = true;
		        }else{
		          $response['message'] = get_phrase('instructor_added_successfully');
		          $response['email_verification'] = get_settings('instructor_email_verification');
		          $response['status'] = 200;
		          $response['validity'] = true;
		        }
            } else{
            	$response['message'] = get_phrase('registration_failed');
            	$response['email_verification'] = get_settings('instructor_email_verification');
		        $response['status'] = 403;
		        $response['validity'] = false;
            } 
            if (get_settings('student_email_verification') == 'enable') {
            	 if($validity === 'unverified_user'){
            	 	$credentials = array('email' => $_POST['email'], 'status' => 0);
	    			$query = $this->db->get_where('users', $credentials);
	    			$this->email_model->send_email_verification_mail($data['email'], $query->row('verification_code'));
                    $response['message'] = get_phrase('the_person_already_instructor').'. '.get_phrase('please_check_inbox_to_verify_your_email_address');
                    $response['email_verification'] = get_settings('instructor_email_verification');
                }else{
                	$this->email_model->send_email_verification_mail($data['email'], $verification_code);
                     $response['message'] = get_phrase('add_successful').'. '.get_phrase('please_check_inbox_to_verify_your_email_address');
                     $response['email_verification'] = get_settings('instructor_email_verification');
                }
            } else {
            	$response['message'] = get_phrase('registration_successful');
            	$response['email_verification'] = get_settings('instructor_email_verification');
            }
        } else {
        	$response['message'] = get_phrase('this_email_userdata_already_exists');
        	$response['email_verification'] = get_settings('instructor_email_verification');
	        $response['status'] = 403;
	        $response['validity'] = false;
        }
	    return $response;
	    
	    
    }
    
    public function offline_payment_approve($user_id = "")
	{
	    $userdata = array();
        $user_details = $this->user_model->get_all_user($user_id)->row_array();
     
		$this->db->order_by('id', 'ASC');
		$this->db->where('status', 1);
		$top_courses = $this->db->get('offline_payment')->result_array();

		return $top_courses;
	}
	
   
    public function get_courses_by_wishlists($course_id = "")
    {  
             
        // $course_details = $this->get_course_by_id($course_id)->row_array();
        
        $courses = $this->getcourse($course_id);
        
    //   return $courses;
        if (sizeof($courses) > 0) {
            
            // return $courses;
            $this->db->where_in('id', $courses);
            return $this->db->get('course')->result_array();
    
        } else {
            return array();
        }
        
    }
    public function get_courses_by_student($course_id = "")
    {  
             
        // $course_details = $this->get_course_by_id($course_id)->row_array();
        
        $courses = $this->getcourse($course_id);
        
    //   return $courses;
        if (sizeof($courses) > 0) {
            
            // return $courses;
            $this->db->where_in('id', $courses);
            return $this->db->get('users')->result_array();
    
        } else {
            return array();
        }
        
    }
    
    public function getcourse($course_id = "")
    {   
    //   $userdata = array();
    // $user_details = $this->user_model->get_all_user($user_id)->row_array();
    
    // $user_details = $this->user_model->get_user($user_id)->row_array();
    // return json_decode($user_details['wishlist']);
    
    $userdata = array();
    $course_details = $this->user_model->get_all_course($course_id)->row_array();
   
    $this->db->select('user_id');
	$this->db->where('id', $course_id);
	$history = $this->db->get('course')->result_array();
    $userdata['status'] = $history;
	
	return ($course_details['user_id']);
    }
    
    public function getWishList($user_id = "")
    {   
        //   $userdata = array();
        // $user_details = $this->user_model->get_all_user($user_id)->row_array();
        
        // $user_details = $this->user_model->get_user($user_id)->row_array();
        // return json_decode($user_details['wishlist']);
        
        
         $userdata = array();
        $user_details = $this->user_model->get_user($user_id)->row_array();
        
		$this->db->where('id', $user_id);
		$history = $this->db->get('users')->result_array();

    	$userdata['status'] = $history;
		return json_decode($user_details['wishlist']);
	    
    }
    
    public function getwishlists($user_id = "")
	{
		$response = array();
		$validity = $this->user_model->check_duplication( $user_id);
		if ($user_id) {
		
			if (isset($_POST['wishlist']) && json_encode(array($this->input->post('wishlist'))) != "") {
				$data['wishlist'] = json_encode(array($this->input->post('wishlist')));
			} else {
				$response['status'] = 'failed';
				$response['error_reason'] = get_phrase('please_select_at_least_one_course');
				return $response;
			}

		
			$this->db->where('id', $user_id);
			$this->db->update('users', $data);
			$response = $this->userdata_get($user_id);
			$response['status'] = 'success';
			$response['error_reason'] = get_phrase('course_added_to_wishlist');
		} else {
			$response['status'] = 'failed';
			$response['error_reason'] = get_phrase('course_duplication');
		}
		return $response;
	}
	
    public function addTocart_post()
    {
         	$response = array();

            $data['user_id'] = $_POST['user_id'];
            $data['course_id'] = $_POST['course_id'];
            $data['qty'] = $_POST['qty'];
            $data['total_price'] =  $_POST['total_price'];;
            $total_price =  $data['total_price'] * $data['qty'];
            // return $total_price;
            $data['total_price'] = $total_price;
           
           
        
   
          $this->db->insert('cart', $data);
          $response['message'] = get_phrase('course_added_to_cart');
          return $response; 
    }
    
        public function contact_us()
        {
         	$response = array();
        
            
            if (html_escape($this->input->post('name')) != "") {
				$data['name'] = html_escape($this->input->post('name'));
			} else {
				$response['status'] = 'failed';
				$response['error_reason'] = get_phrase('name_can_not_be_empty');
				return $response;
			}
			if (html_escape($this->input->post('email')) != "") {
				$data['email'] = html_escape($this->input->post('email'));
			} else {
				$response['status'] = 'failed';
				$response['error_reason'] = get_phrase('email_can_not_be_empty');
				return $response;
			}
			if (html_escape($this->input->post('phone')) != "") {
				$data['phone'] = html_escape($this->input->post('phone'));
			} else {
				$response['status'] = 'failed';
				$response['error_reason'] = get_phrase('phone_can_not_be_empty');
				return $response;
			}
			if (html_escape($this->input->post('message')) != "") {
				$data['message'] = html_escape($this->input->post('message'));
			} else {
				$response['status'] = 'failed';
				$response['error_reason'] = get_phrase('message_can_not_be_empty');
				return $response;
			}
			
    
          $this->db->insert('contact_us', $data);
          $response['message'] = get_phrase('application_sent_successfully');
          return $response; 
        }
    
    public function carts_get($user_id = "")
	{
	    $userdata = array();
        $user_details = $this->user_model->get_all_user($user_id)->row_array();
        // $query = $this->db->get_where('cart', $user_details);
 
        // Retrieve cart data from the session
        // $data['cartItems'] = $this->db->get_where('cart');
		$this->db->where('user_id', $user_id);
		$top_courses = $this->db->get('cart')->result_array();
        //  $cartitems = Cart::where('user_id', Auth::id())->get();
    	$userdata['status'] = $top_courses;
		return $userdata;
	}
	public function purchasehistory($user_id = "", $limit=100, $offset = 0)
	{
	    $this->db->select('offline_payment.*,course.title, course.short_description, course.description');
        $this->db->from('offline_payment')
        ->join('course', 'course.id = offline_payment.course_id')
        ->join('users', 'users.id = offline_payment.user_id')
        ->where('offline_payment.user_id',$user_id)
        ->limit($limit, $offset);
        return $this->db->get()->result_array();
	}


	// Return require course data
	public function course_data($courses = array())
	{
		foreach ($courses as $key => $course) {
			$courses[$key]['requirements'] = json_decode($course['requirements']);
			$courses[$key]['outcomes'] = json_decode($course['outcomes']);
			$courses[$key]['thumbnail'] = $this->get_image('course_thumbnail', $course['id']);
			if ($course['is_free_course'] == 1) {
				$courses[$key]['price'] = get_phrase('free');
			} else {
				if ($course['discount_flag'] == 1) {
					$courses[$key]['price'] = currency($course['discounted_price']);
				} else {
					$courses[$key]['price'] = currency($course['price']);
				}
			}
			$total_rating =  $this->crud_model->get_ratings('course', $course['id'], true)->row()->rating;
			$number_of_ratings = $this->crud_model->get_ratings('course', $course['id'])->num_rows();
			if ($number_of_ratings > 0) {
				$courses[$key]['rating'] = ceil($total_rating / $number_of_ratings);
			} else {
				$courses[$key]['rating'] = 0;
			}
			$courses[$key]['number_of_ratings'] = $number_of_ratings;
			$instructor_details = $this->user_model->get_all_user($course['user_id'])->row_array();
			$courses[$key]['instructor_name'] = $instructor_details['first_name'] . ' ' . $instructor_details['last_name'];
			$courses[$key]['total_enrollment'] = $this->crud_model->enrol_history($course['id'])->num_rows();
			$courses[$key]['shareable_link'] = site_url('home/program/' . slugify($course['title']) . '/' . $course['id']);
		}

		return $courses;
	}
	// Get all the language of system
	public function languages_get()
	{
		$language_files = array();
		$all_files = $this->crud_model->get_list_of_language_files();
		$counter = 0;
		foreach ($all_files as $file) {
			$info = pathinfo($file);
			if (isset($info['extension']) && strtolower($info['extension']) == 'json') {
				$inner_array = array();
				$file_name = explode('.json', $info['basename']);
				$inner_array = array(
					'id' => $counter++,
					'value' => $file_name[0],
					'displayedValue' => ucfirst($file_name[0])
				);

				array_push($language_files, $inner_array);
			}
		}
		return $language_files;
	}

	// Get image for course, categories or user image
	public function get_image($type, $identifier)
	{ // type is the flag to realize whether it is course, category or user image. For course, user image Identifier is id but for category Identifier is image name
		if ($type == 'user_image') {
			// code...
		} elseif ($type == 'course_thumbnail') {
			$course_media_placeholders = themeConfiguration(get_frontend_settings('theme'), 'course_media_placeholders');
			if (file_exists('uploads/thumbnails/course_thumbnails/course_thumbnail_' . get_frontend_settings('theme') . '_' . $identifier . '.jpg')) {
				return base_url() . 'uploads/thumbnails/course_thumbnails/course_thumbnail_' . get_frontend_settings('theme') . '_' . $identifier . '.jpg';
			} else {
				return base_url() . $course_media_placeholders['course_thumbnail_placeholder'];
			}
		} elseif ($type == 'category_thumbnail') {
			if (file_exists('uploads/thumbnails/category_thumbnails/' . $identifier) && $identifier != "") {
				return base_url() . 'uploads/thumbnails/category_thumbnails/' . $identifier;
			} else {
				return base_url() . 'uploads/thumbnails/category_thumbnails/category-thumbnail.png';
			}
		}
	}

	public function system_settings_get_older()
	{
		$query = $this->db->get('settings')->result_array();
		$system_settings_data = array();
		foreach ($query as $row) {
			if ($row['key'] == 'paypal' || $row['key'] == 'stripe_keys') {
				$system_settings_data[$row['key']] = json_decode($row['value'], true);
			} else {
				$system_settings_data[$row['key']] = $row['value'];
			}
		}
		$system_settings_data['thumbnail'] = base_url() . 'uploads/system/'.get_frontend_settings('dark_logo');
		return $system_settings_data;
	}
	
    public function logout_post(){
      //delete all session
      session_destroy();
      $this->output->set_output(json_encode(array('status'=>true,'msg'=>'log Out successfully')));
    }
	public function system_settings_get()
	{
		$query = $this->db->get('settings')->result_array();
		$system_settings_data = array();
		foreach ($query as $row) {
			if (
				$row['key'] == "language" ||
				$row['key'] == "system_name" ||
				$row['key'] == "system_title" ||
				$row['key'] == "system_email" ||
				$row['key'] == "address" ||
				$row['key'] == "phone" ||
				$row['key'] == "slogan" ||
				$row['key'] == "version" ||
				$row['key'] == "youtube_api_key" ||
				$row['key'] == "vimeo_api_key"
			) {

				$system_settings_data[$row['key']] = $row['value'];
			}
		}
		$system_settings_data['thumbnail'] = base_url() . 'uploads/system/'.get_frontend_settings('dark_logo');
		$system_settings_data['favicon'] = base_url() . 'uploads/system/'.get_frontend_settings('favicon');
		return $system_settings_data;
	}

	// Login mechanism
	public function login_get()
	{
		$userdata = array();
		$credential = array('email' => $_POST['email'], 'password' => sha1($_POST['password']), 'status' => 1);
		$query = $this->db->get_where('users', $credential);
		if ($query->num_rows() > 0) {
			$row = $query->row_array();
			$userdata['user_id'] = $row['id'];
			$userdata['first_name'] = $row['first_name'];
			$userdata['last_name'] = $row['last_name'];
			$userdata['email'] = $row['email'];
			$userdata['role'] = strtolower(get_user_role('user_role', $row['id']));
			$userdata['validity'] = 1;
			
		} else {
			$userdata['validity'] = 0;
		}
		$query2 = $this->api_model->my_courses_get($userdata['user_id']);
		$arr =[];
		$count = 0;
		if(!empty($query2)){
		    foreach($query2 as $key => $result){
		        if(course_progress($result['id'],$userdata['user_id'])  == 100){
		            $count++;
		            
		        }
		    }
		}
		$userdata['course_completed'] = $count;
		$userdata['learned_hours'] = $this->calculate_learned_hours_by_user_id($userdata['user_id']);
		return $userdata;
	}
	
	public function calculate_learned_hours_by_user_id($user_id){
	    $user_details = $this->user_model->get_all_user($user_id)->row_array();

        // this array will contain all the completed lessons from different different courses by a user
        $completed_lessons_ids = array();

        $completed_lessons_ids_for_single_course = array();

        // this variable will contain number of completed lessons for a certain course. Like for this one the course_id
        $lesson_completed = 0;

        // User's watch history
        $watch_history_array = json_decode($user_details['watch_history'], true);
        // desired course's lessons
        $lessons_for_that_course = $this->crud_model->get_lessons('course', $course_id);
        // total number of lessons for that course
        $total_number_of_lessons = $lessons_for_that_course->num_rows();
        // arranging completed lesson ids
        for ($i = 0; $i < count($watch_history_array); $i++) {
            $watch_history_for_each_lesson = $watch_history_array[$i];
            if ($watch_history_for_each_lesson['progress'] == 1) {
                $credential = array('id' => $watch_history_for_each_lesson['lesson_id']);
		        $r = $this->db->get_where('lesson', $credential)->row_array();
		        if(!empty($r) && !empty($r['duration'])){
		            array_push($completed_lessons_ids, $r['duration']);
		        }
            }
        }
        $actualHours = array(0=>0);
        foreach ($completed_lessons_ids as $duration){
            $time = explode(':',$duration);
            $hours = $time[0];
            $mins = $time[1];
            $seconds = $time[2];
            if(!empty($hours)){
                $hours = $hours*60*60;
            }
            if(!empty($hours)){
                $mins = $mins*60;
            }
            $totalSeconds = $hours+$mins+$seconds;
            $totalHours = $totalSeconds/60/60;
            array_push($actualHours,$totalHours);
        }
        return round(array_sum($actualHours));
	}
	
	// about us
	public function aboutus_post()
	{
		$userdata = array();
	
	
	    $data['value'] = $_POST['about_us'];
        $this->db->where('key', 'about_us');
        if($this->db->update('frontend_settings',$data))
        {
            $userdata['validity'] = $data;
            $userdata['status'] ="Successfully update";
        }
        
		else{
		    
		    $userdata['validity'] = 0;
		    $userdata['status'] ="something went wrong";
		}
	
		
	
		return $userdata;
	}
    
    public function about_get()
	{
		$aboutus = $this->db->where('key','about_us')->get('frontend_settings')->result_array();
		return $aboutus;
	}
	
	public function privacy_get()
	{
		$privacy = $this->db->where('key','privacy_policy')->get('frontend_settings')->result_array();
		return $privacy;
	}
	
	public function terms_get()
	{
		$terms = $this->db->where('key','terms_and_condition')->get('frontend_settings')->result_array();
		return $terms;
	}
    
    public function refund_get()
	{
		$refund = $this->db->where('key','refund_policy')->get('frontend_settings')->result_array();
		return $refund;
	}
	
	public function removewishlist_post($user_id = "")
    { 
        $response = array();
        $user_details = $this->user_model->get_user($user_id)->row_array();
        
             $data['wishlist'] = json_encode(array());
           $this->db->where('id', $user_id);
            $this->db->update('users',$data);
             $response['status'] = 'Course remove from wishlist';
           
     
        return $response;
    }
    
// 	public function removewishlist_post($course_id = "")
// 	{

// 		 if ($this->session->userdata('user_login') == 1) {
//             $wishlists = array();
//             $user_details = $this->user_model->get_user($this->session->userdata('user_id'))->row_array();
//             // $wishlists = json_decode($user_details['wishlist']);
//             $wishlists['wishlist'] = json_encode($user_details(array()));
//             if (in_array($course_id, $wishlists)) {
//                 return true;
//             } else {
//                 return false;
//             }
//         } else {
//             return false;
//         }
// 	}
	 // SHOW PAYPAL CHECKOUT PAGE
    public function paypalcheckout_post($payment_request = "only_for_mobile")
    {
        $response = array();
          if (isset($_GET['auth_token']) && !empty($_GET['auth_token'])) {
              $auth_token = $_GET['auth_token'];
        
        $user_details = $this->user_model->get_all_user($user_id)->row_array();
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
    
	// Signup mechanism
	public function signup_post()
	{   
	    
		$response = array();

		$data['first_name'] = $_POST['first_name'];
		$data['last_name'] = $_POST['last_name'];
	    $data['email'] = $_POST['email'];
	    $data['password'] = sha1($_POST['password']);
	    $verification_code = rand(100000, 999999);
	    $data['verification_code'] = $verification_code;

	    if (get_settings('student_email_verification') == 'enable') {
            $data['status'] = 0;
        }else {
            $data['status'] = 1;
        }

        $data['wishlist'] = json_encode(array());
        $data['watch_history'] = json_encode(array());
        $data['date_added'] = strtotime(date("Y-m-d H:i:s"));
        $social_links = array(
            'facebook' => "",
            'twitter'  => "",
            'linkedin' => ""
        );
        $data['social_links'] = json_encode($social_links);
        $data['role_id']  = 2;

         // Add paypal keys
        $paypal_info = array();
        $paypal['production_client_id'] = "";
        array_push($paypal_info, $paypal);
        $data['paypal_keys'] = json_encode($paypal_info);
        // Add Stripe keys
        $stripe_info = array();
        $stripe_keys = array(
            'public_live_key' => "",
            'secret_live_key' => ""
        );
        array_push($stripe_info, $stripe_keys);
        $data['stripe_keys'] = json_encode($stripe_info);

        $validity = $this->user_model->check_duplication('on_create', $data['email']);
        if($validity === 'unverified_user' || $validity == true) {
        	if($validity === true){
                $this->db->insert('users', $data);
		        if($this->db->insert_id() > 0){
		          $response['message'] = get_phrase('registration_successful');
		          $response['email_verification'] = get_settings('student_email_verification');
		          $response['status'] = 200;
		          $response['validity'] = true;
		        }else{
		          $response['message'] = get_phrase('registration_updated_successfully');
		          $response['email_verification'] = get_settings('student_email_verification');
		          $response['status'] = 200;
		          $response['validity'] = true;
		        }
            } else{
            	$response['message'] = get_phrase('registration_failed');
            	$response['email_verification'] = get_settings('student_email_verification');
		        $response['status'] = 403;
		        $response['validity'] = false;
            } 
            if (get_settings('student_email_verification') == 'enable') {
            	 if($validity === 'unverified_user'){
            	 	$credentials = array('email' => $_POST['email'], 'status' => 0);
	    			$query = $this->db->get_where('users', $credentials);
	    			$this->email_model->send_email_verification_mail($data['email'], $query->row('verification_code'));
                    $response['message'] = get_phrase('you_have_already_signed_up').'. '.get_phrase('please_check_your_inbox_to_verify_your_email_address');
                    $response['email_verification'] = get_settings('student_email_verification');
                }else{
                	$this->email_model->send_email_verification_mail($data['email'], $verification_code);
                     $response['message'] = get_phrase('registration_successful').'. '.get_phrase('please_check_your_inbox_to_verify_your_email_address');
                     $response['email_verification'] = get_settings('student_email_verification');
                }
            } else {
            	$response['message'] = get_phrase('registration_successful');
            	$response['email_verification'] = get_settings('student_email_verification');
            }
        } else {
        	$response['message'] = get_phrase('this_email_userdata_already_exists');
        	$response['email_verification'] = get_settings('student_email_verification');
	        $response['status'] = 403;
	        $response['validity'] = false;
        }
	    return $response;
	}
	// Signup organization
	public function signups_post()
	{   
	    
		$response = array();

		$data['first_name'] = $_POST['first_name'];
		$data['last_name'] = $_POST['last_name'];
	    $data['email'] = $_POST['email'];
	    $data['password'] = sha1($_POST['password']);
	    $data['username'] = $_POST['username'];
	    $verification_code = rand(100000, 999999);
	    $data['verification_code'] = $verification_code;

	    if (get_settings('student_email_verification') == 'enable') {
            $data['status'] = 0;
        }else {
            $data['status'] = 1;
        }

        $data['wishlist'] = json_encode(array());
        $data['watch_history'] = json_encode(array());
        $data['date_added'] = strtotime(date("Y-m-d H:i:s"));
        $social_links = array(
            'facebook' => "",
            'twitter'  => "",
            'linkedin' => ""
        );
        $data['social_links'] = json_encode($social_links);
        $data['role_id']  = 2;
        $data['is_organization']  = 1;

         // Add paypal keys
        $paypal_info = array();
        $paypal['production_client_id'] = "";
        array_push($paypal_info, $paypal);
        $data['paypal_keys'] = json_encode($paypal_info);
        // Add Stripe keys
        $stripe_info = array();
        $stripe_keys = array(
            'public_live_key' => "",
            'secret_live_key' => ""
        );
        array_push($stripe_info, $stripe_keys);
        $data['stripe_keys'] = json_encode($stripe_info);

        $validity = $this->user_model->check_duplication('on_create', $data['email']);
        if($validity === 'unverified_user' || $validity == true) {
        	if($validity === true){
                $this->db->insert('users', $data);
		        if($this->db->insert_id() > 0){
		          $response['message'] = get_phrase('registration_successful');
		          $response['email_verification'] = get_settings('student_email_verification');
		          $response['status'] = 200;
		          $response['validity'] = true;
		        }else{
		          $response['message'] = get_phrase('registration_updated_successfully');
		          $response['email_verification'] = get_settings('student_email_verification');
		          $response['status'] = 200;
		          $response['validity'] = true;
		        }
            } else{
            	$response['message'] = get_phrase('registration_failed');
            	$response['email_verification'] = get_settings('student_email_verification');
		        $response['status'] = 403;
		        $response['validity'] = false;
            } 
            if (get_settings('student_email_verification') == 'enable') {
            	 if($validity === 'unverified_user'){
            	 	$credentials = array('email' => $_POST['email'], 'status' => 0);
	    			$query = $this->db->get_where('users', $credentials);
	    			$this->email_model->send_email_verification_mail($data['email'], $query->row('verification_code'));
                    $response['message'] = get_phrase('you_have_already_signed_up').'. '.get_phrase('please_check_your_inbox_to_verify_your_email_address');
                    $response['email_verification'] = get_settings('student_email_verification');
                }else{
                	$this->email_model->send_email_verification_mail($data['email'], $verification_code);
                     $response['message'] = get_phrase('registration_successful').'. '.get_phrase('please_check_your_inbox_to_verify_your_email_address');
                     $response['email_verification'] = get_settings('student_email_verification');
                }
            } else {
            	$response['message'] = get_phrase('registration_successful');
            	$response['email_verification'] = get_settings('student_email_verification');
            }
        } else {
        	$response['message'] = get_phrase('this_email_userdata_already_exists');
        	$response['email_verification'] = get_settings('student_email_verification');
	        $response['status'] = 403;
	        $response['validity'] = false;
        }
	    return $response;
	}
	
	 function send_new_private_message()
    { 
        
        $message    = $_POST['message'];
        $timestamp  = strtotime(date("Y-m-d H:i:s"));
        $receiver   = $_POST['receiver'];
        $sender     = $_POST['user_id'];
       
        //check if the thread between those 2 users exists, if not create new thread
        $num1 = $this->db->get_where('message_thread', array('sender' => $sender, 'receiver' => $receiver))->num_rows();
        $num2 = $this->db->get_where('message_thread', array('sender' => $receiver, 'receiver' => $sender))->num_rows();
        if ($num1 == 0 && $num2 == 0) {
            $message_thread_code                        = substr(md5(rand(100000000, 20000000000)), 0, 15);
            $data_message_thread['message_thread_code'] = $message_thread_code;
            $data_message_thread['sender']              = $sender;
            $data_message_thread['receiver']            = $receiver;
            $this->db->insert('message_thread', $data_message_thread);
        }
        if ($num1 > 0)
            $message_thread_code = $this->db->get_where('message_thread', array('sender' => $sender, 'receiver' => $receiver))->row()->message_thread_code;
        if ($num2 > 0)
            $message_thread_code = $this->db->get_where('message_thread', array('sender' => $receiver, 'receiver' => $sender))->row()->message_thread_code;


        $data_message['message_thread_code']    = $message_thread_code;
        $data_message['message']                = $message;
        $data_message['sender']                 = $sender;
        $data_message['timestamp']              = $timestamp;
        $this->db->insert('message', $data_message);

        return $message_thread_code;
    }
	
	function send_reply_message($message_thread_code)
    {
        $message    = html_escape($this->input->post('message'));
        $timestamp  = strtotime(date("Y-m-d H:i:s"));
        $sender     = $this->session->userdata('user_id');

        $data_message['message_thread_code']    = $message_thread_code;
        $data_message['message']                = $message;
        $data_message['sender']                 = $sender;
        $data_message['timestamp']              = $timestamp;
        $this->db->insert('message', $data_message);
    }
	
	// Signup teacher
	public function signup1_post()
	{   
	    
		$response = array();

		$data['first_name'] = $_POST['first_name'];
		$data['last_name'] = $_POST['last_name'];
	    $data['email'] = $_POST['email'];
	    $data['password'] = sha1($_POST['password']);
	    $data['username'] = $_POST['username'];
	    $verification_code = rand(100000, 999999);
	    $data['verification_code'] = $verification_code;

	    if (get_settings('student_email_verification') == 'enable') {
            $data['status'] = 0;
        }else {
            $data['status'] = 1;
        }

        $data['wishlist'] = json_encode(array());
        $data['watch_history'] = json_encode(array());
        $data['date_added'] = strtotime(date("Y-m-d H:i:s"));
        $social_links = array(
            'facebook' => "",
            'twitter'  => "",
            'linkedin' => ""
        );
        $data['social_links'] = json_encode($social_links);
        $data['role_id']  = 2;
        $data['is_instructor']  = 1;

         // Add paypal keys
        $paypal_info = array();
        $paypal['production_client_id'] = "";
        array_push($paypal_info, $paypal);
        $data['paypal_keys'] = json_encode($paypal_info);
        // Add Stripe keys
        $stripe_info = array();
        $stripe_keys = array(
            'public_live_key' => "",
            'secret_live_key' => ""
        );
        array_push($stripe_info, $stripe_keys);
        $data['stripe_keys'] = json_encode($stripe_info);

        $validity = $this->user_model->check_duplication('on_create', $data['email']);
        if($validity === 'unverified_user' || $validity == true) {
        	if($validity === true){
                $this->db->insert('users', $data);
		        if($this->db->insert_id() > 0){
		          $response['message'] = get_phrase('registration_successful');
		          $response['email_verification'] = get_settings('student_email_verification');
		          $response['status'] = 200;
		          $response['validity'] = true;
		        }else{
		          $response['message'] = get_phrase('registration_updated_successfully');
		          $response['email_verification'] = get_settings('student_email_verification');
		          $response['status'] = 200;
		          $response['validity'] = true;
		        }
            } else{
            	$response['message'] = get_phrase('registration_failed');
            	$response['email_verification'] = get_settings('student_email_verification');
		        $response['status'] = 403;
		        $response['validity'] = false;
            } 
            if (get_settings('student_email_verification') == 'enable') {
            	 if($validity === 'unverified_user'){
            	 	$credentials = array('email' => $_POST['email'], 'status' => 0);
	    			$query = $this->db->get_where('users', $credentials);
	    			$this->email_model->send_email_verification_mail($data['email'], $query->row('verification_code'));
                    $response['message'] = get_phrase('you_have_already_signed_up').'. '.get_phrase('please_check_your_inbox_to_verify_your_email_address');
                    $response['email_verification'] = get_settings('student_email_verification');
                }else{
                	$this->email_model->send_email_verification_mail($data['email'], $verification_code);
                     $response['message'] = get_phrase('registration_successful').'. '.get_phrase('please_check_your_inbox_to_verify_your_email_address');
                     $response['email_verification'] = get_settings('student_email_verification');
                }
            } else {
            	$response['message'] = get_phrase('registration_successful');
            	$response['email_verification'] = get_settings('student_email_verification');
            }
        } else {
        	$response['message'] = get_phrase('this_email_userdata_already_exists');
        	$response['email_verification'] = get_settings('student_email_verification');
	        $response['status'] = 403;
	        $response['validity'] = false;
        }
	    return $response;
	}
	
	public function forgot_post()
	    {   
	       //return 1;
	    
        $forgot = array();
 
          $email = $this->input->post('email');
        //resetting user password here
        $new_password = substr(md5(rand(100000000, 20000000000)), 0, 7);

        // Checking credential for admin
        $query = $this->db->get_where('users', array('email' => $email));
        if ($query->num_rows() > 0) {
            $this->db->where('email', $email);
            $this->db->update('users', array('password' => sha1($new_password)));
            // send new password to user email
            $this->email_model->password_reset_email($new_password, $email);
            $forgot['message'] = get_phrase('new_password_successfully_has_been_send_to_your_inbox');
              $forgot['status'] = 200;
              $forgot['validity'] = true;
        
        }
        else{
              $forgot['message'] = get_phrase('access_denide');
              $forgot['status'] = 200;
              $forgot['validity'] = true;
        }
        return $forgot;
	    }

	// Email verify
	public function verify_email_address_post(){
	    $response = array();
	    $credentials = array('email' => $_POST['email'], 'verification_code' => $_POST['verification_code'], 'status' => 0);
	    $query = $this->db->get_where('users', $credentials);
	    if($query->num_rows() > 0){
	      $this->db->where('id', $query->row('id'));
	      $this->db->update('users', array('status' => 1));

	      $response['message'] = get_phrase('email_verification_successfully');
	      $response['status'] = 200;
	      $response['validity'] = true;
	    }else{
	      $response['message'] = get_phrase('verification_code_not_matched');
	      $response['status'] = 403;
	      $response['validity'] = false;
	    }

	    return $response;
  	}

  	// Resend Verification Code
	public function resend_verification_code_post(){
	    $response = array();
	    $check['email'] = $_POST['email'];
	    $credentials = array('email' => $_POST['email'], 'status' => 0);
	    $query = $this->db->get_where('users', $credentials);
	    if($query->num_rows() > 0) {
	    	$this->email_model->send_email_verification_mail($check['email'], $query->row('verification_code'));
	    	$response['message'] = get_phrase('please_check_your_inbox_to_verify_your_email_address');
	      	$response['status'] = 200;
	      	$response['validity'] = true;
	    } else{
	    	$response['message'] = get_phrase('verification_code_not_send');
	    	$response['status'] = 403;
	    	$response['validity'] = false;
	    }

	    return $response;
  	}

	// My Courses
	public function my_courses_get($user_id = "")
	{
		$my_courses = array();
		$my_courses_ids = $this->user_model->my_courses($user_id)->result_array();
		foreach ($my_courses_ids as $my_courses_id) {
			$course_details = $this->crud_model->get_course_by_id($my_courses_id['course_id'])->row_array();
			array_push($my_courses, $course_details);
		}
		$my_courses = $this->course_data($my_courses);
		foreach ($my_courses as $key => $my_course) {
			if (isset($my_course['id']) && $my_course['id'] > 0) {
				$my_courses[$key]['completion'] = round(course_progress($my_course['id'], $user_id));
				$my_courses[$key]['total_number_of_lessons'] = $this->crud_model->get_lessons('course', $my_course['id'])->num_rows();
				$my_courses[$key]['total_number_of_completed_lessons'] = $this->get_completed_number_of_lesson($user_id, 'course', $my_course['id']);
			}
		}
		return $my_courses;
	}

	// My Wishlists
	public function my_wishlist_get($user_id = "")
	{
		$wishlists = $this->crud_model->getWishLists($user_id);
		if (sizeof($wishlists) > 0) {
			$this->db->where_in('id', $wishlists);
			$courses = $this->db->get('course')->result_array();
			return $this->course_data($courses);
		} else {
			return array();
		}
	}

	// Remove from wishlist
	public function togglewishlistitems_get($user_id = "")
	{
		$status = "";
		$course_id = $_GET['course_id'];
		$wishlists = array();
		$user_details = $this->user_model->get_user($user_id)->row_array();
		$wishlists = json_decode($user_details['wishlist']);
		if (in_array($course_id, $wishlists)) {
			$container = array();
			foreach ($wishlists as $key) {
				if ($key != $course_id) {
					array_push($container, $key);
				}
			}
			$wishlists = $container;
			$status = "removed";
		} else {
			array_push($wishlists, $course_id);
			$status = "added";
		}
		$updater['wishlist'] = json_encode($wishlists);
		$this->db->where('id', $user_id);
		$this->db->update('users', $updater);
		$this->my_wishlist_get($user_id);
		return $status;
	}

	//get all sections
	public function sections_get($course_id = "", $user_id = "")
	{
		$lesson_counter_starts = 0;
		$lesson_counter_ends   = 0;
		$sections = $this->crud_model->get_section('course', $course_id)->result_array();
		foreach ($sections as $key => $section) {
			$sections[$key]['lessons'] = $this->section_wise_lessons($section['id'], $user_id);
			
			$sections[$key]['total_duration'] = str_replace(' ' . get_phrase('hours'), "", $this->crud_model->get_total_duration_of_lesson_by_section_id($section['id']));
			if ($key == 0) {
				$lesson_counter_starts = 1;
				$lesson_counter_ends = count($sections[$key]['lessons']);
			} else {
				$lesson_counter_starts = $lesson_counter_ends + 1;
				$lesson_counter_ends = $lesson_counter_starts + count($sections[$key]['lessons']);
			}
			$sections[$key]['lesson_counter_starts'] = $lesson_counter_starts;
			$sections[$key]['lesson_counter_ends'] = $lesson_counter_ends;
			if ($user_id > 0) {
				$sections[$key]['completed_lesson_number'] = $this->get_completed_number_of_lesson($user_id, 'section', $section['id']);
			} else {
				$sections[$key]['completed_lesson_number'] = 0;
			}
		}
		$response = $this->add_user_validity($sections);
		return $response;
	}
	
    public function get_courses($category_id = "", $sub_category_id = "", $instructor_id = 0)
    {
        if ($category_id > 0 && $sub_category_id > 0 && $instructor_id > 0) {

            $multi_instructor_course_ids = $this->multi_instructor_course_ids_for_an_instructor($instructor_id);
            $this->db->where('category_id', $category_id);
            $this->db->where('sub_category_id', $sub_category_id);
            $this->db->where('user_id', $instructor_id);

            if ($multi_instructor_course_ids && count($multi_instructor_course_ids)) {
                $this->db->or_where_in('id', $multi_instructor_course_ids);
            }

            return $this->db->get('course');
        } elseif ($category_id > 0 && $sub_category_id > 0 && $instructor_id == 0) {
            return $this->db->get_where('course', array('category_id' => $category_id, 'sub_category_id' => $sub_category_id));
        } else {
            return $this->db->get('course');
        }
    }
    
    public function ticket_get($user_id = "")
	{
	    $this->db->where('user_id', $user_id);
		$tickets = $this->db->get('tickets')->result_array();
		return $tickets;
	}
    function add_support_ticket(){
        $response = array();
       
        
        	if (html_escape($this->input->post('title')) != "") {
				 $data['title'] = html_escape($this->input->post('title'));
			} else {
				$response['status'] = 'failed';
				$response['error_reason'] = get_phrase('title_can_not_be_empty');
				return $response;
			}
			if (html_escape($this->input->post('code')) != "") {
				 $data['code'] = html_escape($this->input->post('code'));
			} else {
				$response['status'] = 'failed';
				$response['error_reason'] = get_phrase('code_can_not_be_empty');
				return $response;
			}
			if (html_escape($this->input->post('category_id')) != "") {
				 $data['category_id'] = html_escape($this->input->post('category_id'));
			} else {
				$response['status'] = 'failed';
				$response['error_reason'] = get_phrase('category_can_not_be_empty');
				return $response;
			}
			if (html_escape($this->input->post('user_id')) != "") {
				 $data['user_id'] = html_escape($this->input->post('user_id'));
			} else {
				$response['status'] = 'failed';
				$response['error_reason'] = get_phrase('userid_can_not_be_empty');
				return $response;
			}
			if (html_escape($this->input->post('priority')) != "") {
				 $data['priority'] = html_escape($this->input->post('priority'));
			} else {
				$response['status'] = 'failed';
				$response['error_reason'] = get_phrase('priority_must_be(high_low_or_medium)');
				return $response;
			}
			
       
        
        $data['status'] = 'opened';
 
        $data['date'] = strtotime(date('d M Y'));
        
        $this->db->insert('tickets', $data);
            
        $data1['code'] = $data['code'];
        $data1['user_id'] = $data['user_id'];
        if (html_escape($this->input->post('description')) != "") {
				  $data1['description'] = $this->input->post('description');
		} else {
			$response['status'] = 'failed';
			$response['error_reason'] = get_phrase('description_can_not_be_empty');
			return $response;
		}
       
        $data1['date'] = $data['date'];
        $ext = pathinfo($_FILES['support_file']['name'], PATHINFO_EXTENSION);
        $data1['file_name'] = rand(500000, 1000000).'.'.$ext;
    
        $this->db->insert('ticket_description', $data1);
        move_uploaded_file($_FILES['support_file']['tmp_name'], 'uploads/support_files/' . $data1['file_name']);
        
        $response['status'] = 'success';
        $response['ticket'] = $data;
        $response['ticket_description'] = $data1;
        return $response;
    }
    public function report(){
        // return $this->session->userdata('user_id');
        $data['user_id'] = $_POST['user_id'];
        $data['object_id'] = $_POST['course_id'];
        $data['object_type'] = "course";
        $data['reason'] = $_POST['reason'];
        return $this->db->insert('reports', $data);
    }
    public function flagteacher(){
        
        $data['user_id'] = $_POST['user_id'];
        $data['object_id'] = $_POST['teacher_id'];
        $data['object_type'] = "flag_teacher";
        $data['reason'] = $_POST['reason'];
        return $this->db->insert('reports', $data);
    }
    public function flagstudent(){
        
        $data['user_id'] = $_POST['user_id'];
        $data['object_id'] = $_POST['student_id'];
        $data['object_type'] = "flag_student";
        $data['reason'] = $_POST['reason'];
        return $this->db->insert('reports', $data);
    }
    
    public function flagorganization(){
        
        $data['user_id'] = $_POST['user_id'];
        $data['object_id'] = $_POST['organization_id'];
        $data['object_type'] = "flag_organization";
        $data['reason'] = $_POST['reason'];
        return $this->db->insert('reports', $data);
    }
    
   public function get_report($course_id, $user_id){
        $this->db->where('object_id', $course_id);
        $this->db->where('user_id', $user_id);
        return $this->db->get('reports')->row_array();

    }
    
     public function teacher_flag($teacher_id, $user_id){
        $this->db->where('object_id', $teacher_id);
        $this->db->where('user_id', $user_id);
        return $this->db->get('reports')->row_array();

    }
    
    public function get_warnings($read_status = ""){
        $user_id = $this->session->userdata('user_id');
        $this->db->where('user_id', $user_id); 
        if($read_status == 1){
            $this->db->where('read_status', null);
        }
        $warnings = $this->db->get('warnings')->result_array();
        return $warnings;
    }
    
    // GET APPROVED APPLICATIONS
    public function get_approved_applications()
    {
         $this->db->where('status', 1);
       $applications = $this->db->get('applications')->result_array();

        return $applications;
    }
    // GET PENDING APPLICATIONS
    public function get_pending_applications()
    {
         $this->db->where('status', 0);
       $applications = $this->db->get('applications')->result_array();

        return $applications;
    }
    
     public function post_instructor_application()
    { 
        $response = array();
       
            
            $data['user_id'] = $this->input->post('id');
            $data['address'] = $this->input->post('address');
            $data['phone'] = $this->input->post('phone');
            // $data['is_instructor'] = 1;
            $data['message'] = $this->input->post('message');
            if (isset($_FILES['document']) && $_FILES['document']['name'] != "") {
                if (!file_exists('uploads/document')) {
                    mkdir('uploads/document', 0777, true);
                }
                $accepted_ext = array('doc', 'docs', 'pdf', 'txt', 'png', 'jpg', 'jpeg');
                $path = $_FILES['document']['name'];
                $ext = pathinfo($path, PATHINFO_EXTENSION);
                if (in_array(strtolower($ext), $accepted_ext)) {
                    $document_custom_name = random(15) . '.' . $ext;
                    $data['document'] = $document_custom_name;
                    move_uploaded_file($_FILES['document']['tmp_name'], 'uploads/document/' . $document_custom_name);
                } else {
                    $response ['status'] = 'Invalid File'; 
                }
            }
            $this->db->insert('applications', $data);
            
            $is_instructor['is_instructor'] = 1;                
             $this->db->where('id',$this->input->post('id'));
             $this->db->update('users', $is_instructor);
            $response ['status'] = get_phrase('application_submitted_successfully'); 
       
    }
    
    public function post_organization_application()
    { 
        $response = array();
       
            
            $data['user_id'] = $this->input->post('id');
            $data['address'] = $this->input->post('address');
            $data['phone'] = $this->input->post('phone');
            // $data['is_instructor'] = 1;
            $data['message'] = $this->input->post('message');
            if (isset($_FILES['document']) && $_FILES['document']['name'] != "") {
                if (!file_exists('uploads/document')) {
                    mkdir('uploads/document', 0777, true);
                }
                $accepted_ext = array('doc', 'docs', 'pdf', 'txt', 'png', 'jpg', 'jpeg');
                $path = $_FILES['document']['name'];
                $ext = pathinfo($path, PATHINFO_EXTENSION);
                if (in_array(strtolower($ext), $accepted_ext)) {
                    $document_custom_name = random(15) . '.' . $ext;
                    $data['document'] = $document_custom_name;
                    move_uploaded_file($_FILES['document']['tmp_name'], 'uploads/document/' . $document_custom_name);
                } else {
                    $response ['status'] = 'Invalid File'; 
                }
            }
            $this->db->insert('applications', $data);
            
            $is_organization['is_organization'] = 1;                
             $this->db->where('id',$this->input->post('id'));
             $this->db->update('users', $is_organization);
            $response ['status'] = get_phrase('application_submitted_successfully'); 
            return $response;
       
    }
	public function section_wise_lessons($section_id = "", $user_id = "")
	{
		$response = array();
		$lessons = $this->crud_model->get_lessons('section', $section_id)->result_array();
		foreach ($lessons as $key => $lesson) {
			$response[$key]['id'] = $lesson['id'];
			$response[$key]['title'] = $lesson['title'];
			$response[$key]['duration'] = readable_time_for_humans($lesson['duration_for_mobile_application']);
			$response[$key]['course_id'] = $lesson['course_id'];
			$response[$key]['section_id'] = $lesson['section_id'];
			$response[$key]['video_type'] = ($lesson['video_type_for_mobile_application'] == "" ? "" : $lesson['video_type_for_mobile_application']);
			$response[$key]['video_url'] = ($lesson['video_url_for_mobile_application'] == "" ? "" : $lesson['video_url_for_mobile_application']);;
			$response[$key]['video_url_web'] = $lesson['video_url'];
			$response[$key]['video_type_web'] = $lesson['video_type'];
			$response[$key]['lesson_type'] = $lesson['lesson_type'];
			$response[$key]['attachment'] = $lesson['attachment'];
			$response[$key]['attachment_url'] = base_url() . 'uploads/lesson_files/' . $lesson['attachment'];
			$response[$key]['attachment_type'] = $lesson['attachment_type'];
			$response[$key]['summary'] = $lesson['summary'];
			if ($user_id > 0) {
				$response[$key]['is_completed'] = lesson_progress($lesson['id'], $user_id);
			} else {
				$response[$key]['is_completed'] = 0;
			}
			
			if($response[$key]['lesson_type'] == 'quiz'){
			    $response[$key]['quizes'] = $this->get_quiz_details($lesson['id']);
			}
		}
		$response = $this->add_user_validity($response);
		return $response;
	}

	public function add_user_validity($responses = array())
	{
		foreach ($responses as $key => $response) {
			$responses[$key]['user_validity'] = true;
		}
		return $responses;
	}

	public function get_completed_number_of_lesson($user_id = "", $type = "", $id = "")
	{
		$counter = 0;
		if ($type == 'section') {
			$lessons = $this->crud_model->get_lessons('section', $id)->result_array();
		} else {
			$lessons = $this->crud_model->get_lessons('course', $id)->result_array();
		}
		foreach ($lessons as $key => $lesson) {
			if (lesson_progress($lesson['id'], $user_id)) {
				$counter = $counter + 1;
			}
		}
		return $counter;
	}

	public function lesson_details_get($user_id = "", $lession_id = "")
	{
		$lesson_details = $this->crud_model->get_lessons('lesson', $lession_id)->result_array();
		foreach ($lesson_details as $key => $lesson_detail) {
			$lesson_details[$key]['duration'] = readable_time_for_humans($lesson_detail['duration']);
		}
		return $this->add_user_validity($lesson_details);
	}

	// Get course details by id
	public function course_details_by_id_get($user_id = "", $course_id = "")
	{
		$course_details = $this->crud_model->get_course_by_id($course_id)->result_array();
		$response = $this->course_data($course_details);
		foreach ($response as $key => $resp) {
			$response[$key]['sections'] = $this->sections_get($course_id);
			$response[$key]['is_wishlisted'] = $this->is_added_to_wishlist($user_id, $course_id);
			$response[$key]['is_purchased'] = $this->is_purchased($user_id, $course_id);
			$response[$key]['includes'] = array(
				$this->crud_model->get_total_duration_of_lesson_by_course_id($course_id) . ' ' . get_phrase('on_demand_videos'),
				$this->crud_model->get_lessons('course', $course_id)->num_rows() . ' ' . get_phrase('lessons'),
				get_phrase('high_quality_videos'),
				get_phrase('life_time_access'),
			);
		}
		return $response;
	}
    // public function getWishLists($user_id = "")
    // {
        
        
            
    //         $data['wishlist'] = $_POST['wishlist'];
           
           
        
   
    //       $this->db->insert('users', $data);
    //       $response['message'] = get_phrase('course_added_to_wishlists');
    //       return $data; 
    // }
	public function is_added_to_wishlist($user_id = 0, $course_id = "")
	{
		if ($user_id > 0) {
			$wishlists = array();
			$user_details = $this->user_model->get_all_user($user_id)->row_array();
			$wishlists = json_decode($user_details['wishlist']);
			if (in_array($course_id, $wishlists)) {
				return true;
			} else {
				return false;
			}
		} else {
			return false;
		}
	}

	public function is_purchased($user_id = 0, $course_id = "")
	{
		// 0 represents Not purchased, 1 represents Purchased, 2 represents Pending
		if ($user_id > 0) {
			$check_purchased_course = $this->db->get_where('enrol', array('user_id' => $user_id, 'course_id' => $course_id))->num_rows();
			if ($check_purchased_course > 0) {
				return 1;
			} else {
				if (addon_status('offline_payment')) {
					$this->load->model('addons/Offline_payment_model', 'offline_payment_model');
					$response = $this->offline_payment_model->get_course_status($user_id, $course_id);
					if ($response) {
						return $response == "approved" ? 1 : 2; // 2 represents Pending status
					}
				}
				return 0;
			}
		} else {
			return 0;
		}
	}

	// This function returns a single object of course by its id
	public function course_object_by_id_get()
	{
		$course_id = $_GET['course_id'];
		$course = $this->crud_model->get_course_by_id($course_id)->row_array();
		$course['requirements'] = json_decode($course['requirements']);
		$course['outcomes'] = json_decode($course['outcomes']);
		$course['thumbnail'] = $this->get_image('course_thumbnail', $course['id']);
		if ($course['is_free_course'] == 1) {
			$course['price'] = get_phrase('free');
		} else {
			if ($course['discount_flag'] == 1) {
				$course['price'] = currency($course['discounted_price']);
			} else {
				$course['price'] = currency($course['price']);
			}
		}
		$total_rating =  $this->crud_model->get_ratings('course', $course['id'], true)->row()->rating;
		$number_of_ratings = $this->crud_model->get_ratings('course', $course['id'])->num_rows();
		if ($number_of_ratings > 0) {
			$course['rating'] = ceil($total_rating / $number_of_ratings);
		} else {
			$course['rating'] = 0;
		}
		$course['number_of_ratings'] = $number_of_ratings;
		$instructor_details = $this->user_model->get_all_user($course['user_id'])->row_array();
		$course['instructor_name'] = $instructor_details['first_name'] . ' ' . $instructor_details['last_name'];
		$course['total_enrollment'] = $this->crud_model->enrol_history($course['id'])->num_rows();
		$course['shareable_link'] = site_url('home/program/' . slugify($course['title']) . '/' . $course['id']);
		return $course;
	}

	// save lesson completion status
	// code of mark this lesson as completed
	function save_course_progress_get($user_id = "")
	{
		$lesson_id = $_GET['lesson_id'];
		$progress = $_GET['progress'];
		$user_details  = $this->user_model->get_all_user($user_id)->row_array();
		$watch_history = $user_details['watch_history'];
		$watch_history_array = array();
		if ($watch_history == '') {
			array_push($watch_history_array, array('lesson_id' => $lesson_id, 'progress' => $progress));
		} else {
			$founder = false;
			$watch_history_array = json_decode($watch_history, true);
			for ($i = 0; $i < count($watch_history_array); $i++) {
				$watch_history_for_each_lesson = $watch_history_array[$i];
				if ($watch_history_for_each_lesson['lesson_id'] == $lesson_id) {
					$watch_history_for_each_lesson['progress'] = $progress;
					$watch_history_array[$i]['progress'] = $progress;
					$founder = true;
				}
			}
			if (!$founder) {
				array_push($watch_history_array, array('lesson_id' => $lesson_id, 'progress' => $progress));
			}
		}
		$data['watch_history'] = json_encode($watch_history_array);
		$this->db->where('id', $user_id);
		$this->db->update('users', $data);

		// CHECK IF THE USER IS ELIGIBLE FOR CERTIFICATE
		if (addon_status('certificate')) {
			$this->load->model('addons/Certificate_model', 'certificate_model');
			$this->certificate_model->check_certificate_eligibility("lesson", $lesson_id, $user_id);
		}

		$lesson_details = $this->crud_model->get_lessons('lesson', $lesson_id)->row_array();
		return $this->course_completion_data($lesson_details['course_id'], $user_id);
	}

	private function course_completion_data($course_id = "", $user_id = "")
	{
		$response = array();
		$course = $this->crud_model->get_course_by_id($course_id)->row_array();
		$response['course_id'] = $course['id'];
		$response['number_of_lessons'] = $this->crud_model->get_lessons('course', $course_id)->num_rows();
		$response['number_of_completed_lessons'] = $this->get_completed_number_of_lesson($user_id, 'course', $course_id);
		$response['course_progress'] = round(course_progress($course_id, $user_id));
		return $response;
	}

    	public function userdata_get($user_id = "")
	{
		$user_details = $this->user_model->get_all_user($user_id)->row_array();
		$response['id'] = $user_details['id'];
		$response['first_name'] = $user_details['first_name'];
		$response['last_name'] = $user_details['last_name'];
		$response['email'] = $user_details['email'];
		$social_links = json_decode($user_details['social_links'], true);
		$response['facebook'] = $social_links['facebook'];
		$response['twitter'] = $social_links['twitter'];
		$response['linkedin'] = $social_links['linkedin'];
		$response['biography'] = $user_details['biography'];
		$response['image'] = $this->user_model->get_user_image_url($user_details['id']);
		return $response;
	}
	
	public function rate($data)
    {
        $rating = $this->db->get_where('rating', array('user_id' => $data['user_id'], 'ratable_id' => $data['ratable_id'], 'ratable_type' => $data['ratable_type']));
        if ($rating->num_rows() == 0) {
            $this->db->insert('rating', $data);
            
            $lastInsertedId = $this->db->insert_id();
            $rating = $this->db->get_where('rating',array('id'=>$lastInsertedId))->row();
        } else {
            $checker = array('user_id' => $data['user_id'], 'ratable_id' => $data['ratable_id'], 'ratable_type' => $data['ratable_type']);
            $this->db->where($checker);
            $this->db->update('rating', $data);
            $rating = $rating->row();
        }
        return $rating;
    }

	public function teacherprofile_get()
	{
		$this->db->where('is_instructor', '1');
		$top_courses = $this->db->get('users')->result_array();
		return $top_courses;
	}
	
	public function organization_get()
	{
		$this->db->where('is_organization', '1');
		$top_courses = $this->db->get('users')->result_array();
		return $top_courses;
	}

	public function updateuserdata_post($user_id = "")
	{
		$response = array();
		$validity = $this->user_model->check_duplication( $user_id);
		if ($user_id) {
			if (html_escape($this->input->post('first_name')) != "") {
				$data['first_name'] = html_escape($this->input->post('first_name'));
			} else {
				$response['status'] = 'failed';
				$response['error_reason'] = get_phrase('first_name_can_not_be_empty');
				return $response;
			}
			if (html_escape($this->input->post('last_name')) != "") {
				$data['last_name'] = html_escape($this->input->post('last_name'));
			} else {
				$response['status'] = 'failed';
				$response['error_reason'] = get_phrase('last_name_can_not_be_empty');
				return $response;
			}
			if (isset($_POST['email']) && html_escape($this->input->post('email')) != "") {
				$data['email'] = html_escape($this->input->post('email'));
			} else {
				$response['status'] = 'failed';
				$response['error_reason'] = get_phrase('email_can_not_be_empty');
				return $response;
			}

			$social_link['facebook'] = html_escape($this->input->post('facebook_link'));
			$social_link['twitter'] = html_escape($this->input->post('twitter_link'));
			$social_link['linkedin'] = html_escape($this->input->post('linkedin_link'));
			$data['social_links'] = json_encode($social_link);
			$data['biography'] = $this->input->post('biography');
			$this->db->where('id', $user_id);
			$this->db->update('users', $data);
			$response = $this->userdata_get($user_id);
			$response['status'] = 'success';
			$response['error_reason'] = get_phrase('succesffully_update_profile');
		} else {
			$response['status'] = 'failed';
			$response['error_reason'] = get_phrase('email_duplication');
		}
		return $response;
	}
	
	public function changemail_post($user_id = "")
	{
		$response = array();
		$validity = $this->user_model->check_duplication( $user_id);
		if ($user_id) {
		
			if (isset($_POST['email']) && html_escape($this->input->post('email')) != "") {
				$data['email'] = html_escape($this->input->post('email'));
			} else {
				$response['status'] = 'failed';
				$response['error_reason'] = get_phrase('email_can_not_be_empty');
				return $response;
			}

		
			$this->db->where('id', $user_id);
			$this->db->update('users', $data);
			$response = $this->userdata_get($user_id);
			$response['status'] = 'success';
			$response['error_reason'] = get_phrase('succesffully_update_profile');
		} else {
			$response['status'] = 'failed';
			$response['error_reason'] = get_phrase('email_duplication');
		}
		return $response;
	}

	public function updatepassword_post($user_id = "")
	{
	   // return 1;
		$response = array();
		if (!empty($_POST['current_password']) && !empty($_POST['new_password']) && !empty($_POST['confirm_password'])) {
			 $user_details = $this->user_model->get_user('user_id')->row_array();
		    
			$current_password = $this->input->post('current_password');
			$new_password = $this->input->post('new_password');
			$confirm_password = $this->input->post('confirm_password');
			$password = array('password' => sha1($_POST['current_password']), 'status' => 1);
			
	        if($password){
	            $data['password'] = sha1($new_password);
				// return $data['password'];
				$this->db->where('id', $user_id);
				$this->db->update('users', $data);
				$response['status'] = "Your password has been updated";
	        }
	        else{
	            $response['status'] = 'failed';
				$response['error_reason'] = get_phrase('password_doesn_not_match');
				return $response;
	        }
				
				
	
		} else {
			$response['status'] = 'failed';
				$response['error_reason'] = get_phrase('password_can_not_be_empty');
				return $response;
			
		}

		return $response;
	}
	
		public function changepassword_post($user_id = "")
	{
	   // return 1;
		$response = array();
		if (!empty($_POST['current_password']) && !empty($_POST['new_password']) && !empty($_POST['confirm_password'])) {
			 $user_details = $this->user_model->get_user('user_id')->row_array();
		    
			$current_password = $this->input->post('current_password');
			$new_password = $this->input->post('new_password');
			$confirm_password = $this->input->post('confirm_password');
			$password = array('password' => sha1($_POST['current_password']), 'status' => 1);
			
	        if($password){
	            $data['password'] = sha1($new_password);
				// return $data['password'];
				$this->db->where('id', $user_id);
				$this->db->update('users', $data);
				$response['status'] = "Your password has been updated";
	        }
	        else{
	            $response['status'] = 'failed';
				$response['error_reason'] = get_phrase('password_doesn_not_match');
				return $response;
	        }
				
				
	
		} else {
			$response['status'] = 'failed';
				$response['error_reason'] = get_phrase('password_can_not_be_empty');
				return $response;
			
		}

		return $response;
	}
	public function forgot_password()
    {   
        echo 1;
        $response = array();
        if ($this->session->userdata('admin_login')) {
            redirect(site_url('admin'), 'refresh');
        } elseif ($this->session->userdata('user_login')) {
            redirect(site_url('user'), 'refresh');
        }
        
        return $response;
    }
    public function index_get()
    {
        echo 'this is restful api';
        
    }
	public function certificate_addon_get($user_id = "", $course_id = "")
	{
		$response = array();
		if (addon_status('certificate')) {
			$response['addon_status'] = 'success';

			$this->load->model('addons/Certificate_model', 'certificate_model');
			$course_progress = course_progress($course_id, $user_id);
			if ($course_progress == 100) {
				$checker = array(
					'course_id' => $course_id,
					'student_id' => $user_id
				);
				$previous_data = $this->db->get_where('certificates', $checker);
				if ($previous_data->num_rows() == 0) {

					$certificate_identifier = substr(sha1($user_id . '-' . $course_id . '-' . date('d-M-Y')), 0, 10);
					$certificate_link = base_url('uploads/certificates/' . $certificate_identifier . '.jpg');
					$insert_data = array(
						'course_id' => $course_id,
						'student_id' => $user_id,
						'shareable_url' => $certificate_identifier . '.jpg'
					);
					$this->db->insert('certificates', $insert_data);
					$this->certificate_model->create_certificate($user_id, $course_id, $certificate_identifier);
					$this->email_model->notify_on_certificate_generate($user_id, $course_id);
					$certificate_link = base_url('uploads/certificates/' . $certificate_identifier . '.jpg');
				} else {
					$previous_data = $previous_data->row_array();
					$certificate_link = base_url('uploads/certificates/' . $previous_data['shareable_url']);
				}

				$response['is_completed'] = 1;
				$response['certificate_shareable_url'] = $certificate_link;
			} else {
				$response['is_completed'] = 0;
				$response['certificate_shareable_url'] = "";
			}
		} else {
			$response['addon_status'] = 'failed';
			$response['is_completed'] = 0;
			$response['certificate_shareable_url'] = "";
		}

		return $response;
	}
}
