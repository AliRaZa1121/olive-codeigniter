<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        // Your own constructor code
        $this->load->database();
        $this->load->library('session');
        // $this->load->library('stripe');
        /*cache control*/
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        $this->output->set_header('Pragma: no-cache');

        // CHECK CUSTOM SESSION DATA
        $this->session_data();
    }

    public function olive_login($param1 = null)
    {
        if ($param1 == null) {
            $page_data['page_name'] = 'coaching_loft';
            $page_data['page_title'] = site_phrase('coaching_loft');
            $this->load->view('frontend/' . get_frontend_settings('theme') . '/index', $page_data);
        } else {
            if ($this->crud_model->check_recaptcha() == false && get_frontend_settings('recaptcha_status') == true) {
                $this->session->set_flashdata('error_message', get_phrase('recaptcha_verification_failed'));
                redirect(site_url('home/login'), 'refresh');
            }
            $email = $this->input->post('email');
            $password = $this->input->post('password');
            $ch = curl_init();
            $hash = $email . ':' . $password;
            $base_string = base64_encode($hash); //for base64 encoding

            curl_setopt($ch, CURLOPT_URL, 'https://www.coachingloft.com/api/v1/users/auth-login?clapikey=2473ddb85b31c4cca79d655fa31ac4e84aaaaf96');
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
            $headers = array();
            $headers[] = 'Authorization: Basic ' . $base_string;
            $headers[] = 'Content-Type: application/json';
            $headers[] = 'Cookie: 2018cl_ci_session=tcVNpvwdIYlo%2BAoTxHPz5LZQb9fuaC7Wb6JUQLVTNDz5J0De4F8VNoyqrOhNdLs9SxwbF1RzcWoiPUts0asmS1TkqffVnFahCoCGRB3009Jo63s9NlZkuhrzVaai3%2BZaev%2BrHY%2BZjU10p4JPwvEQoayG6qoX4JTu2nE9ukWKD%2BpaWRPaMKdsoXkrrQsZJx0hYVcHDZ2Lz9ie2nxToj8seGKhYHItl5UCKGYlhxzgrltCpawxB2KkYDTBeoUOs0qbhDinCzivxnSZAKy8jCODp3bncpKYK5QWI7%2Fb0odAdI%2FQeJb6hkiqz1lKW%2BBPNQunVgwpBP%2BiZwJ8GdsAOYf9lg%3D%3D';
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
            $result = curl_exec($ch);
            if (curl_errno($ch)) {
                $this->session->set_flashdata('error_message', get_phrase('error_occurred'));
                redirect(site_url('home/olive_login'), 'refresh');
            }
            curl_close($ch);
            $result = json_decode($result, true);
            if ($result['status'] == 'failed') {
                $this->session->set_flashdata('error_message', get_phrase('invalid_credentials'));
                redirect(site_url('home/olive_login'), 'refresh');
            }
            $url = $result['data']['authorized_redirect_url'];
            redirect($url);
        }
    }

    public function index()
    {
        $this->home();
        //  $this->load->view('coming');
    }

    public function team()
    {
        $page_data['page_name'] = "team";
        $page_data['page_title'] = site_phrase('our_team');
        $this->load->view('frontend/' . get_frontend_settings('theme') . '/index', $page_data);
    }

    public function travel()
    {
        $page_data['page_name'] = "travel";
        $page_data['page_title'] = site_phrase('travel');
        // $this->load->view('coming');
        $this->load->view('frontend/' . get_frontend_settings('theme') . '/index', $page_data);
    }

    public function contact_us($action = null)
    {
        if ($action != null) {
            if ($this->crud_model->check_recaptcha() == false && get_frontend_settings('recaptcha_status') == true) {
                $this->session->set_flashdata('error_message', get_phrase('recaptcha_verification_failed'));
                redirect(site_url('home/contact_us'), 'refresh');
            }
            $system_email = get_settings('system_email');
            $this->email_model->send_email_contact_mail($system_email);
            $this->session->set_flashdata('info_message', get_phrase('thank_you_for_contacting_us'));
            redirect(site_url('home/contact_us'), 'refresh');
        }
        $page_data['page_name'] = "contact_us";
        $page_data['page_title'] = site_phrase('contact_us');
        $this->load->view('frontend/' . get_frontend_settings('theme') . '/index', $page_data);
    }

    public function organizations($slug = null)
    {
        if ($slug == null) {
            $page_data['page_name'] = "organizations";
            $page_data['page_title'] = site_phrase('organizations');
            $this->load->view('frontend/' . get_frontend_settings('theme') . '/index', $page_data);
        } else {
            $page_data['page_name'] = "organization_details";
            $page_data['page_title'] = site_phrase('organization_details');
            $page_data['organization'] = $this->crud_model->get_organization_single($slug);
            $this->load->view('frontend/' . get_frontend_settings('theme') . '/index', $page_data);
        }
    }

    public function books($slug = null)
    {
        if ($slug != null) {
            $page_data['page_name'] = "book_details";
            $page_data['page_title'] = site_phrase('book_details');
            $page_data['book'] = $this->crud_model->get_books_single($slug);
            $this->load->view('frontend/' . get_frontend_settings('theme') . '/index', $page_data);
        } else {
            $page_data['page_name'] = "books";
            $page_data['page_title'] = site_phrase('books');
            $this->load->view('frontend/' . get_frontend_settings('theme') . '/index', $page_data);
        }
    }

    public function articles()
    {
        $page_data['page_name'] = "articles";
        $page_data['page_title'] = site_phrase('articles');
        $page_data['articles'] = $this->user_model->get_articles()->result_array();
        $page_data['news'] = $this->user_model->get_news(4)->result_array();
        $page_data['events'] = $this->user_model->get_events(4)->result_array();
        $this->load->view('frontend/' . get_frontend_settings('theme') . '/index', $page_data);
    }

    public function events()
    {
        $page_data['page_name'] = "events";
        $page_data['page_title'] = site_phrase('events');
        $page_data['articles'] = $this->user_model->get_articles(4)->result_array();
        $page_data['news'] = $this->user_model->get_news(4)->result_array();
        $page_data['events'] = $this->user_model->get_events()->result_array();
        $this->load->view('frontend/' . get_frontend_settings('theme') . '/index', $page_data);
    }

    public function news()
    {
        $page_data['page_name'] = "news";
        $page_data['page_title'] = site_phrase('news');
        $page_data['articles'] = $this->user_model->get_articles(4)->result_array();
        $page_data['news'] = $this->user_model->get_news()->result_array();
        $page_data['events'] = $this->user_model->get_events(4)->result_array();
        $this->load->view('frontend/' . get_frontend_settings('theme') . '/index', $page_data);
    }

    /// content details
    public function content($type, $slug)
    {
        $page_data['page_name'] = "content_details";
        $page_data['page_title'] = site_phrase($type . '_details');
        $page_data['content'] = $this->user_model->content_details($type, $slug);
        $this->load->view('frontend/' . get_frontend_settings('theme') . '/index', $page_data);
    }

    public function results()
    {

        $page_data['page_name'] = 'results';
        $page_data['page_title'] = get_phrase('results');
        $page_data['results'] = $this->user_model->get_results()->result_array();
        $this->load->view('backend/admin/result', $page_data);
        return $page_data;
    }
    public function verification_code()
    {
        if (!$this->session->userdata('register_email')) {
            redirect(site_url('home/sign_up'), 'refresh');
        }
        $page_data['page_name'] = "verification_code";
        $page_data['page_title'] = site_phrase('verification_code');
        $this->load->view('frontend/' . get_frontend_settings('theme') . '/index', $page_data);
    }

    public function home()
    {
        $page_data['page_name'] = "home";
        $page_data['page_title'] = site_phrase('home');
        $this->load->view('frontend/' . get_frontend_settings('theme') . '/index', $page_data);
    }

    public function shopping_cart()
    {
        if (!$this->session->userdata('cart_items')) {
            $this->session->set_userdata('cart_items', array());
        }
        $page_data['applied_coupon'] = $this->session->userdata('applied_coupon');
        $page_data['page_name'] = "shopping_cart";
        $page_data['page_title'] = site_phrase('shopping_cart');
        $this->load->view('frontend/' . get_frontend_settings('theme') . '/index', $page_data);
    }

    public function courses()
    {
        if (!$this->session->userdata('layout')) {
            $this->session->set_userdata('layout', 'list');
        }
        $layout = $this->session->userdata('layout');
        $selected_type = "all";
        $selected_category_id = "all";
        $selected_price = "all";
        $selected_level = "all";
        $selected_language = "all";
        $selected_rating = "all";
        // Get the category ids
        if (isset($_GET['category']) && !empty($_GET['category'] && $_GET['category'] != "all")) {
            $selected_category_id = $this->crud_model->get_category_id($_GET['category']);
        }

        // Get the selected price
        if (isset($_GET['price']) && !empty($_GET['price'])) {
            $selected_price = $_GET['price'];
        }
        // Get the selected type
        if (isset($_GET['type']) && !empty($_GET['type'])) {
            $selected_type = $_GET['type'];
        }

        // Get the selected level
        if (isset($_GET['level']) && !empty($_GET['level'])) {
            $selected_level = $_GET['level'];
        }

        // Get the selected language
        if (isset($_GET['language']) && !empty($_GET['language'])) {
            $selected_language = $_GET['language'];
        }

        // Get the selected rating
        if (isset($_GET['rating']) && !empty($_GET['rating'])) {
            $selected_rating = $_GET['rating'];
        }

        if ($selected_type == 'all' && $selected_category_id == "all" && $selected_price == "all" && $selected_level == 'all' && $selected_language == 'all' && $selected_rating == 'all') {
            if (!addon_status('scorm_course')) {
                $this->db->where('course_type', 'general');
            }
            $this->db->where('status', 'active');
            $total_rows = $this->db->get('course')->num_rows();
            $config = array();
            $config = pagintaion($total_rows, 5);
            $this->pagination->initialize($config);
            $config['base_url'] = site_url('home/courses/');

            if (!addon_status('scorm_course')) {
                $this->db->where('course_type', 'general');
            }
            $this->db->where('status', 'active');
            $page_data['courses'] = $this->db->get('course', $config['per_page'], $this->uri->segment(3))->result_array();
            $page_data['total_result'] = $total_rows;
        } else {
            $courses = $this->crud_model->filter_course($selected_type, $selected_category_id, $selected_price, $selected_level, $selected_language, $selected_rating);
            $page_data['courses'] = $courses;
            $page_data['total_result'] = count($courses);
        }

        $page_data['page_name'] = "courses_page";
        $page_data['page_title'] = site_phrase('courses_/_consultancy_programs');
        $page_data['layout'] = $layout;
        $page_data['selected_type'] = $selected_type;
        $page_data['selected_category_id'] = $selected_category_id;
        $page_data['selected_price'] = $selected_price;
        $page_data['selected_level'] = $selected_level;
        $page_data['selected_language'] = $selected_language;
        $page_data['selected_rating'] = $selected_rating;
        $this->load->view('frontend/' . get_frontend_settings('theme') . '/index', $page_data);
    }

    public function all_programs()
    {
        if (!$this->session->userdata('layout')) {
            $this->session->set_userdata('layout', 'grid');
        }
        $layout = $this->session->userdata('layout');
        $selected_category_id = "all";
        $selected_price = "all";
        $selected_level = "all";
        $selected_language = "all";
        $selected_rating = "all";
        // Get the category ids
        if (isset($_GET['category']) && !empty($_GET['category'] && $_GET['category'] != "all")) {
            $selected_category_id = $this->crud_model->get_category_id($_GET['category']);
        }

        // Get the selected price
        if (isset($_GET['price']) && !empty($_GET['price'])) {
            $selected_price = $_GET['price'];
        }

        // Get the selected level
        if (isset($_GET['level']) && !empty($_GET['level'])) {
            $selected_level = $_GET['level'];
        }

        // Get the selected language
        if (isset($_GET['language']) && !empty($_GET['language'])) {
            $selected_language = $_GET['language'];
        }

        // Get the selected rating
        if (isset($_GET['rating']) && !empty($_GET['rating'])) {
            $selected_rating = $_GET['rating'];
        }

        if ($selected_category_id == "all" && $selected_price == "all" && $selected_price == "all" && $selected_level == 'all' && $selected_language == 'all' && $selected_rating == 'all') {
            if (!addon_status('scorm_course')) {
                $this->db->where('course_type', 'general');
            }
            $this->db->where('status', 'active');
            $total_rows = $this->db->get('course')->num_rows();
            $config = array();
            $config = pagintaion($total_rows, 5);
            $this->pagination->initialize($config);
            $config['base_url'] = site_url('home/all_programs/');

            if (!addon_status('scorm_course')) {
                $this->db->where('course_type', 'general');
            }
            $this->db->where('status', 'active');
            $page_data['courses'] = $this->db->get('course', $config['per_page'], $this->uri->segment(3))->result_array();
            $page_data['total_result'] = $total_rows;
        } else {
            $courses = $this->crud_model->filter_course(null, $selected_category_id, $selected_price, $selected_level, $selected_language, $selected_rating);
            $page_data['courses'] = $courses;
            $page_data['total_result'] = count($courses);
        }

        // $programs = $this->db->get('programs')->num_rows();
        // $config = array();
        // $config = pagintaion($programs, 3);
        // $config['base_url'] = site_url('home/all_programs/');
        // $page_data['programs'] = $programs;
        // $page_data['total_result'] = count($programs);
        // $this->pagination->initialize($config);

        $page_data['page_name'] = "courses_page";
        $page_data['page_title'] = site_phrase('programs');
        $page_data['layout'] = $layout;
        $page_data['selected_category_id'] = $selected_category_id;
        $page_data['selected_price'] = $selected_price;
        $page_data['selected_level'] = $selected_level;
        $page_data['selected_language'] = $selected_language;
        $page_data['selected_rating'] = $selected_rating;
        $this->load->view('frontend/' . get_frontend_settings('theme') . '/index', $page_data);
    }

    public function programs()
    {
        if (!$this->session->userdata('layout')) {
            $this->session->set_userdata('layout', 'list');
        }
        $layout = $this->session->userdata('layout');
        $selected_category_id = "all";
        $selected_price = "all";
        $selected_level = "all";
        $selected_language = "all";
        $selected_rating = "all";
        // Get the category ids
        if (isset($_GET['category']) && !empty($_GET['category'] && $_GET['category'] != "all")) {
            $selected_category_id = $this->crud_model->get_category_id($_GET['category']);
        }

        // Get the selected price
        if (isset($_GET['price']) && !empty($_GET['price'])) {
            $selected_price = $_GET['price'];
        }

        // Get the selected level
        if (isset($_GET['level']) && !empty($_GET['level'])) {
            $selected_level = $_GET['level'];
        }

        // Get the selected language
        if (isset($_GET['language']) && !empty($_GET['language'])) {
            $selected_language = $_GET['language'];
        }

        // Get the selected rating
        if (isset($_GET['rating']) && !empty($_GET['rating'])) {
            $selected_rating = $_GET['rating'];
        }

        if ($selected_category_id == "all" && $selected_price == "all" && $selected_price == "all" && $selected_level == 'all' && $selected_language == 'all' && $selected_rating == 'all') {
            if (!addon_status('scorm_course')) {
                $this->db->where('course_type', 'general');
            }
            $this->db->where('status', 'active');
            $total_rows = $this->db->get('programs')->num_rows();
            $config = array();
            $config = pagintaion($total_rows, 5);
            $this->pagination->initialize($config);
            $config['base_url'] = site_url('home/programs/');

            if (!addon_status('scorm_course')) {
                $this->db->where('course_type', 'general');
            }
            $this->db->where('status', 'active');
            $page_data['courses'] = $this->db->get('course', $config['per_page'], $this->uri->segment(3))->result_array();
            $page_data['total_result'] = $total_rows;
        } else {
            $courses = $this->crud_model->filter_course($selected_category_id, $selected_price, $selected_level, $selected_language, $selected_rating);
            $page_data['courses'] = $courses;
            $page_data['total_result'] = count($courses);
        }

        $programs = $this->db->get('programs')->num_rows();
        $config = array();
        $config = pagintaion($programs, 3);
        $config['base_url'] = site_url('home/programs/');

        $page_data['programs'] = $programs;
        $page_data['total_result'] = count($programs);

        $this->pagination->initialize($config);

        $page_data['page_name'] = "courses_page";
        $page_data['page_title'] = site_phrase('programs_/_consultancy_programs');
        $page_data['layout'] = $layout;
        $page_data['selected_category_id'] = $selected_category_id;
        $page_data['selected_price'] = $selected_price;
        $page_data['selected_level'] = $selected_level;
        $page_data['selected_language'] = $selected_language;
        $page_data['selected_rating'] = $selected_rating;
        $this->load->view('frontend/' . get_frontend_settings('theme') . '/index', $page_data);
    }

    public function set_layout_to_session()
    {
        $layout = $this->input->post('layout');
        $this->session->set_userdata('layout', $layout);
    }

    public function program($slug = "", $course_id = "")
    {
        $this->access_denied_courses($course_id);
        $page_data['course_id'] = $course_id;
        $page_data['page_name'] = "course_page";
        $page_data['page_title'] = site_phrase('program_details');
        $this->load->view('frontend/' . get_frontend_settings('theme') . '/index', $page_data);
    }

    public function programs_page($slug = "", $programs_id = "")
    {

        $this->access_denied_courses($programs_id);
        $page_data['programs_id'] = $programs_id;
        $page_data['page_name'] = "programs_page";
        $page_data['page_title'] = site_phrase('programs');
        $this->load->view('frontend/' . get_frontend_settings('theme') . '/index', $page_data);
    }

    public function instructor_page($instructor_id = "")
    {
        $page_data['page_name'] = "instructor_page";
        $page_data['page_title'] = site_phrase('coach_profile');
        $page_data['instructor_id'] = $instructor_id;
        $this->load->view('frontend/' . get_frontend_settings('theme') . '/index', $page_data);
    }

    public function my_courses()
    {
        if ($this->session->userdata('user_login') != true) {
            redirect(site_url('home'), 'refresh');
        }

        $page_data['page_name'] = "my_courses";
        $page_data['page_title'] = site_phrase("my_courses");
        $this->load->view('frontend/' . get_frontend_settings('theme') . '/index', $page_data);
    }

    public function my_programs()
    {
        if ($this->session->userdata('user_login') != true) {
            redirect(site_url('home'), 'refresh');
        }

        $page_data['page_name'] = "my_programs";
        $page_data['page_title'] = site_phrase("my_programs");
        $this->load->view('frontend/' . get_frontend_settings('theme') . '/index', $page_data);
    }

    public function my_messages($param1 = "", $param2 = "")
    {
        if ($this->session->userdata('user_login') != true) {
            redirect(site_url('home'), 'refresh');
        }
        if ($param1 == 'read_message') {
            $page_data['message_thread_code'] = $param2;
        } elseif ($param1 == 'send_new') {
            $message_thread_code = $this->crud_model->send_new_private_message();
            $this->session->set_flashdata('flash_message', site_phrase('message_sent'));
            redirect(site_url('home/my_messages/read_message/' . $message_thread_code), 'refresh');
        } elseif ($param1 == 'send_reply') {
            $this->crud_model->send_reply_message($param2); //$param2 = message_thread_code
            $this->session->set_flashdata('flash_message', site_phrase('message_sent'));
            redirect(site_url('home/my_messages/read_message/' . $param2), 'refresh');
        }
        $page_data['page_name'] = "my_messages";
        $page_data['page_title'] = site_phrase('my_messages');
        $this->load->view('frontend/' . get_frontend_settings('theme') . '/index', $page_data);
    }

    public function my_notifications()
    {
        $page_data['page_name'] = "my_notifications";
        $page_data['page_title'] = site_phrase('my_notifications');
        $this->load->view('frontend/' . get_frontend_settings('theme') . '/index', $page_data);
    }

    public function my_wishlist()
    {
        if (!$this->session->userdata('cart_items')) {
            $this->session->set_userdata('cart_items', array());
        }
        $my_courses = $this->crud_model->get_courses_by_wishlists();
        $my_programs = $this->crud_model->get_programs_by_wishlists();
        $page_data['my_courses'] = $my_courses;
        $page_data['my_programs'] = $my_programs;
        $page_data['page_name'] = "my_wishlist";
        $page_data['page_title'] = site_phrase('my_wishlist');
        $this->load->view('frontend/' . get_frontend_settings('theme') . '/index', $page_data);
    }

    public function purchase_history()
    {
        if ($this->session->userdata('user_login') != true) {
            redirect(site_url('home'), 'refresh');
        }

        $total_rows = $this->crud_model->purchase_history($this->session->userdata('user_id'))->num_rows();
        $config = array();
        $config = pagintaion($total_rows, 10);
        $config['base_url'] = site_url('home/purchase_history');
        $this->pagination->initialize($config);
        $page_data['per_page'] = $config['per_page'];

        if (addon_status('offline_payment') == 1) :
            $this->load->model('addons/offline_payment_model');
            $page_data['pending_offline_payment_history'] = $this->offline_payment_model->pending_offline_payment($this->session->userdata('user_id'))->result_array();
        endif;

        $page_data['page_name'] = "purchase_history";
        $page_data['page_title'] = site_phrase('purchase_history');
        $this->load->view('frontend/' . get_frontend_settings('theme') . '/index', $page_data);
    }

    public function profile($param1 = "")
    {
        if ($this->session->userdata('user_login') != true) {
            redirect(site_url('home'), 'refresh');
        }

        if ($param1 == 'user_profile') {
            $page_data['page_name'] = "user_profile";
            $page_data['page_title'] = site_phrase('user_profile');
        } elseif ($param1 == 'user_credentials') {
            $page_data['page_name'] = "user_credentials";
            $page_data['page_title'] = site_phrase('credentials');
        } elseif ($param1 == 'user_photo') {
            $page_data['page_name'] = "update_user_photo";
            $page_data['page_title'] = site_phrase('update_user_photo');
        }
        $page_data['user_details'] = $this->user_model->get_user($this->session->userdata('user_id'));
        $this->load->view('frontend/' . get_frontend_settings('theme') . '/index', $page_data);
    }

    public function update_profile($param1 = "")
    {
        if ($param1 == 'update_basics') {
            $this->user_model->edit_user($this->session->userdata('user_id'));
            redirect(site_url('home/profile/user_profile'), 'refresh');
        } elseif ($param1 == "update_credentials") {
            $this->user_model->update_account_settings($this->session->userdata('user_id'));
            redirect(site_url('home/profile/user_credentials'), 'refresh');
        } elseif ($param1 == "update_photo") {
            if (isset($_FILES['user_image']) && $_FILES['user_image']['name'] != "") {
                unlink('uploads/user_image/' . $this->db->get_where('users', array('id' => $this->session->userdata('user_id')))->row('image') . '.jpg');
                $data['image'] = md5(rand(10000, 10000000));
                $this->db->where('id', $this->session->userdata('user_id'));
                $this->db->update('users', $data);
                $this->user_model->upload_user_image($data['image']);
            }
            $this->session->set_flashdata('flash_message', site_phrase('updated_successfully'));
            redirect(site_url('home/profile/user_photo'), 'refresh');
        }
    }

    public function handleWishList($return_number = "")
    {
        if ($this->session->userdata('user_login') != 1) {
            echo false;
        } else {
            if (isset($_POST['course_id'])) {
                $course_id = $this->input->post('course_id');
                $this->crud_model->handleWishList($course_id);
            }
            if ($return_number == 'true') {
                echo sizeof($this->crud_model->getWishLists());
            } else {
                $this->load->view('frontend/' . get_frontend_settings('theme') . '/wishlist_items');
            }
        }
    }

    public function handleWishList_p($return_number = "")
    {
        if ($this->session->userdata('user_login') != 1) {
            echo false;
        } else {
            if (isset($_POST['programs_id'])) {
                $programs_id = $this->input->post('programs_id');
                $this->crud_model->handleWishList_p($programs_id);
            }
            if ($return_number == 'true') {
                echo sizeof($this->crud_model->getWishLists_p());
            } else {
                $this->load->view('frontend/' . get_frontend_settings('theme') . '/wishlist_items');
            }
        }
    }

    public function handleCartItems($return_number = "")
    {
        if (!$this->session->userdata('cart_items')) {
            $this->session->set_userdata('cart_items', array());
        }

        $course_id = $this->input->post('course_id');
        $previous_cart_items = $this->session->userdata('cart_items');
        if (in_array($course_id, $previous_cart_items)) {
            $key = array_search($course_id, $previous_cart_items);
            unset($previous_cart_items[$key]);
        } else {
            array_push($previous_cart_items, $course_id);
        }

        $this->session->set_userdata('cart_items', $previous_cart_items);
        if ($return_number == 'true') {
            echo sizeof($previous_cart_items);
        } else {
            $this->load->view('frontend/' . get_frontend_settings('theme') . '/cart_items');
        }
    }

    public function get_coupon_code_details($couponCode)
    {
        $response = array();
        $this->db->where('code', trim($couponCode));
        $result = $this->db->get('coupons');
        if ($result->num_rows() > 0) {
            $re = $result->row_array();
            if ($re['expiry_date'] >= time()) {
                $response['msg'] = 'valid';
                $this->session->set_userdata('applied_coupon', $re);
                $response['data'] = $re;
            } else {
                $response['msg'] = 'invalid';
            }
        } else {
            $response['msg'] = 'invalid';
        }
        echo json_encode($response);
    }

    public function handleCartItems_p($return_number = "")
    {
        if (!$this->session->userdata('cart_items')) {
            $this->session->set_userdata('cart_items', array());
        }

        $course_id = $this->input->post('programs_id');
        $previous_cart_items = $this->session->userdata('cart_items');
        if (in_array($course_id, $previous_cart_items)) {
            $key = array_search($course_id, $previous_cart_items);
            unset($previous_cart_items[$key]);
        } else {
            array_push($previous_cart_items, $course_id);
        }

        $this->session->set_userdata('cart_items', $previous_cart_items);
        if ($return_number == 'true') {
            echo sizeof($previous_cart_items);
        } else {
            $this->load->view('frontend/' . get_frontend_settings('theme') . '/cart_items');
        }
    }

    public function handleCartItemForBuyNowButton()
    {
        if (!$this->session->userdata('cart_items')) {
            $this->session->set_userdata('cart_items', array());
        }

        $course_id = $this->input->post('course_id');
        $previous_cart_items = $this->session->userdata('cart_items');
        if (!in_array($course_id, $previous_cart_items)) {
            array_push($previous_cart_items, $course_id);
        }
        $this->session->set_userdata('cart_items', $previous_cart_items);
        $this->load->view('frontend/' . get_frontend_settings('theme') . '/cart_items');
    }

    public function refreshWishList()
    {
        $this->load->view('frontend/' . get_frontend_settings('theme') . '/wishlist_items');
    }

    public function refreshShoppingCart()
    {
        $page_data['coupon_code'] = $this->input->post('couponCode');
        $page_data['applied_coupon'] = $this->session->userdata('applied_coupon');
        $this->load->view('frontend/' . get_frontend_settings('theme') . '/shopping_cart_inner_view', $page_data);
    }

    //this is only for elegant
    public function refreshShoppingCartItem()
    {
        $page_data['coupon_code'] = $this->input->post('couponCode');
        $page_data['applied_coupon'] = $this->session->userdata('applied_coupon');
        $this->load->view('frontend/' . get_frontend_settings('theme') . '/cart_items', $page_data);
    }

    public function isLoggedIn()
    {
        if ($this->session->userdata('user_login') == 1) {
            echo true;
        } else {
            if (isset($_GET['url_history']) && !empty($_GET['url_history'])) {
                $this->session->set_userdata('url_history', base64_decode($_GET['url_history']));
            }
            echo false;
        }
    }

    //choose payment gateway
    public function payment()
    {
        if ($this->session->userdata('user_login') != 1) {
            redirect('login', 'refresh');
        }
        if ($this->session->userdata('attempt_status') != 1) {
            $this->session->set_flashdata('error_message', get_phrase('your_account_verification_is_under_process') . '.');
            redirect('/', 'refresh');
        }
        $page_data['total_price_of_checking_out'] = $this->session->userdata('total_price_of_checking_out');
        $page_data['page_title'] = site_phrase("payment_gateway");
        $page_data['applied_coupon'] = $this->session->userdata('applied_coupon');
        $this->load->view('payment/index', $page_data);
    }

    // SHOW PAYPAL CHECKOUT PAGE
    public function paypal_checkout($payment_request = "only_for_mobile")
    {
        if ($this->session->userdata('user_login') != 1 && $payment_request != 'true') {
            redirect('home', 'refresh');
        }

        //checking price
        if ($this->session->userdata('total_price_of_checking_out') == $this->input->post('total_price_of_checking_out')) :
            $total_price_of_checking_out = $this->input->post('total_price_of_checking_out');
        else :
            $total_price_of_checking_out = $this->session->userdata('total_price_of_checking_out');
        endif;
        $page_data['payment_request'] = $payment_request;
        $page_data['user_details'] = $this->user_model->get_user($this->session->userdata('user_id'))->row_array();
        $page_data['amount_to_pay'] = $total_price_of_checking_out;
        $this->load->view('frontend/' . get_frontend_settings('theme') . '/paypal_checkout', $page_data);
    }

    // PAYPAL CHECKOUT ACTIONS
    public function paypal_payment($user_id = "", $amount_paid = "", $paymentID = "", $paymentToken = "", $payerID = "", $payment_request_mobile = "")
    {
        $paypal_keys = get_settings('paypal');
        $paypal = json_decode($paypal_keys);

        if ($paypal[0]->mode == 'sandbox') {
            $paypalClientID = $paypal[0]->sandbox_client_id;
            $paypalSecret = $paypal[0]->sandbox_secret_key;
        } else {
            $paypalClientID = $paypal[0]->production_client_id;
            $paypalSecret = $paypal[0]->production_secret_key;
        }

        //THIS IS HOW I CHECKED THE PAYPAL PAYMENT STATUS
        $status = $this->payment_model->paypal_payment($paymentID, $paymentToken, $payerID, $paypalClientID, $paypalSecret);
        if (!$status) {
            $this->session->set_flashdata('error_message', site_phrase('an_error_occurred_during_payment'));
            redirect('home/shopping_cart', 'refresh');
        }
        $this->crud_model->enrol_student($user_id);
        $this->crud_model->course_purchase($user_id, 'paypal', $amount_paid);
        $this->email_model->course_purchase_notification($user_id, 'paypal', $amount_paid);
        $this->session->set_flashdata('flash_message', site_phrase('payment_successfully_done'));
        if ($payment_request_mobile == 'true') :
            $course_id = $this->session->userdata('cart_items');
            redirect('home/payment_success_mobile/' . $course_id[0] . '/' . $user_id . '/paid', 'refresh');
        else :
            $this->session->set_userdata('cart_items', array());
            redirect('home/my_programs', 'refresh');
        endif;
    }

    // SHOW STRIPE CHECKOUT PAGE
    public function stripe_checkout($payment_request = "only_for_mobile")
    {
        if ($this->session->userdata('user_login') != 1 && $payment_request != 'true') {
            redirect('home', 'refresh');
        }

        //checking price
        $total_price_of_checking_out = $this->session->userdata('total_price_of_checking_out');
        $page_data['payment_request'] = $payment_request;
        $page_data['user_details'] = $this->user_model->get_user($this->session->userdata('user_id'))->row_array();
        $page_data['amount_to_pay'] = $total_price_of_checking_out;
        $this->load->view('payment/stripe/stripe_checkout', $page_data);
    }

    // STRIPE CHECKOUT ACTIONS
    public function stripe_payment($user_id = "", $payment_request_mobile = "", $session_id = "")
    {
        //THIS IS HOW I CHECKED THE STRIPE PAYMENT STATUS
        $response = $this->payment_model->stripe_payment($user_id, $session_id);

        if ($response['payment_status'] === 'succeeded') {
            // STUDENT ENROLMENT OPERATIONS AFTER A SUCCESSFUL PAYMENT
            $check_duplicate = $this->crud_model->check_duplicate_payment_for_stripe($response['transaction_id'], $session_id);
            if ($check_duplicate == false) :
                $this->crud_model->enrol_student($user_id);
                $this->crud_model->course_purchase($user_id, 'stripe', $response['paid_amount'], $response['transaction_id'], $session_id);
                $this->email_model->course_purchase_notification($user_id, 'stripe', $response['paid_amount']);
            else :
                //duplicate payment
                $this->session->set_flashdata('error_message', site_phrase('session_time_out'));
                redirect('home/shopping_cart', 'refresh');
            endif;

            if ($payment_request_mobile == 'true') :
                $course_id = $this->session->userdata('cart_items');
                $this->session->set_flashdata('flash_message', site_phrase('payment_successfully_done'));
                redirect('home/payment_success_mobile/' . $course_id[0] . '/' . $user_id . '/paid', 'refresh');
            else :
                $this->session->set_userdata('cart_items', array());
                $this->session->set_userdata('applied_coupon', null);
                $this->session->set_flashdata('flash_message', site_phrase('payment_successfully_done'));
                redirect('home/my_programs', 'refresh');
            endif;
        } else {
            if ($payment_request_mobile == 'true') :
                $course_id = $this->session->userdata('cart_items');
                $this->session->set_flashdata('flash_message', $response['status_msg']);
                redirect('home/payment_success_mobile/' . $course_id[0] . '/' . $user_id . '/error', 'refresh');
            else :
                $this->session->set_flashdata('error_message', $response['status_msg']);
                redirect('home/shopping_cart', 'refresh');
            endif;
        }
    }

    public function razorpay_checkout($payment_request = "only_for_mobile")
    {
        if ($this->session->userdata('user_login') != 1 && $payment_request != 'true') {
            redirect('home', 'refresh');
        }

        $total_price_of_checking_out = $this->session->userdata('total_price_of_checking_out');
        $page_data['payment_request'] = $payment_request;
        $page_data['user_details'] = $this->user_model->get_user($this->session->userdata('user_id'))->row_array();
        $page_data['amount_to_pay'] = $total_price_of_checking_out;
        $this->load->view('payment/razorpay/razorpay_checkout', $page_data);
    }

    // PAYPAL CHECKOUT ACTIONS
    public function razorpay_payment($payment_request_mobile = "")
    {

        $response = array();
        if (isset($_GET['user_id']) && !empty($_GET['user_id']) && isset($_GET['amount']) && !empty($_GET['amount'])) {

            $user_id = $_GET['user_id'];
            $amount = $_GET['amount'];
            $razorpay_order_id = $_GET['razorpay_order_id'];
            $payment_id = $_GET['payment_id'];
            $signature = $_GET['signature'];

            //THIS IS HOW I CHECKED THE PAYPAL PAYMENT STATUS
            $status = $this->payment_model->razorpay_payment($razorpay_order_id, $payment_id, $amount, $signature);

            if ($status == 1) {
                $payment_key['payment_id'] = $payment_id;
                $payment_key['razorpay_order_id'] = $razorpay_order_id;
                $payment_key['signature'] = $signature;
                $payment_key = json_encode($payment_key);

                $this->crud_model->enrol_student($user_id);
                $this->crud_model->course_purchase($user_id, 'razorpay', $amount, $payment_key);
                $this->email_model->course_purchase_notification($user_id, 'razorpay', $amount);
                $this->session->set_flashdata('flash_message', site_phrase('payment_successfully_done'));
                if ($payment_request_mobile == 'true') :
                    $course_id = $this->session->userdata('cart_items');
                    redirect('home/payment_success_mobile/' . $course_id[0] . '/' . $user_id . '/paid', 'refresh');
                else :
                    $this->session->set_userdata('cart_items', array());
                    redirect('home/my_programs', 'refresh');
                endif;
            } else {
                if ($payment_request_mobile == 'true') :
                    $course_id = $this->session->userdata('cart_items');
                    $this->session->set_flashdata('flash_message', $response['status_msg']);
                    redirect('home/payment_success_mobile/' . $course_id[0] . '/' . $user_id . '/error', 'refresh');
                else :
                    $this->session->set_flashdata('error_message', site_phrase('payment_failed') . '! ' . site_phrase('something_is_wrong'));
                    redirect('home/shopping_cart', 'refresh');
                endif;
            }
        } else {
            if ($payment_request_mobile == 'true') :
                $course_id = $this->session->userdata('cart_items');
                $this->session->set_flashdata('flash_message', $response['status_msg']);
                redirect('home/payment_success_mobile/' . $course_id[0] . '/' . $user_id . '/error', 'refresh');
            else :
                $this->session->set_flashdata('error_message', site_phrase('payment_failed') . '! ' . site_phrase('something_is_wrong'));
                redirect('home/shopping_cart', 'refresh');
            endif;
        }
    }

    public function lesson($slug = "", $course_id = "", $lesson_id = "")
    {
        if ($this->session->userdata('user_login') != 1) {
            if ($this->session->userdata('admin_login') != 1) {
                redirect('home', 'refresh');
            }
        }

        $course_details = $this->crud_model->get_course_by_id($course_id)->row_array();

        //this function saved current lesson id and return previous lesson id if $lesson_id param is empty
        $lesson_id = $this->crud_model->update_watch_history($course_id, $lesson_id);

        if ($course_details['course_type'] == 'general') {
            $sections = $this->crud_model->get_section('course', $course_id);
            if ($sections->num_rows() > 0) {
                $page_data['sections'] = $sections->result_array();
                if ($lesson_id == "") {
                    $default_section = $sections->row_array();
                    $page_data['section_id'] = $default_section['id'];
                    $lessons = $this->crud_model->get_lessons('section', $default_section['id']);
                    if ($lessons->num_rows() > 0) {
                        $default_lesson = $lessons->row_array();
                        $lesson_id = $default_lesson['id'];
                        $page_data['lesson_id'] = $default_lesson['id'];
                    }
                } else {
                    $page_data['lesson_id'] = $lesson_id;
                    $section_id = $this->db->get_where('lesson', array('id' => $lesson_id))->row()->section_id;
                    $page_data['section_id'] = $section_id;
                }
            } else {
                $page_data['sections'] = array();
            }
        } else if ($course_details['course_type'] == 'scorm') {
            $this->load->model('addons/scorm_model');
            $scorm_course_data = $this->scorm_model->get_scorm_curriculum_by_course_id($course_id);
            $page_data['scorm_curriculum'] = $scorm_course_data->row_array();
        }

        // Check if the lesson contained course is purchased by the user
        if (isset($page_data['lesson_id']) && $page_data['lesson_id'] > 0 && $course_details['course_type'] == 'general') {
            if ($this->session->userdata('role_id') != 1 && $course_details['user_id'] != $this->session->userdata('user_id')) {
                if (!is_purchased($course_id)) {
                    redirect(site_url('home/program/' . slugify($course_details['title']) . '/' . $course_details['id']), 'refresh');
                }
            }
        } else if ($course_details['course_type'] == 'scorm' && $scorm_course_data->num_rows() > 0) {
            if ($this->session->userdata('role_id') != 1 && $course_details['user_id'] != $this->session->userdata('user_id')) {
                if (!is_purchased($course_id)) {
                    redirect(site_url('home/program/' . slugify($course_details['title']) . '/' . $course_details['id']), 'refresh');
                }
            }
        } else {
            if (!is_purchased($course_id)) {
                redirect(site_url('home/program/' . slugify($course_details['title']) . '/' . $course_details['id']), 'refresh');
            }
        }

        $page_data['course_details'] = $course_details;
        $page_data['course_id'] = $course_id;
        $page_data['page_name'] = 'lessons';
        $page_data['page_title'] = $course_details['title'];
        $this->load->view('lessons/index', $page_data);
    }

    public function my_courses_by_category()
    {
        $category_id = $this->input->post('category_id');
        $course_details = $this->crud_model->get_my_courses_by_category_id($category_id)->result_array();
        $page_data['my_courses'] = $course_details;
        $this->load->view('frontend/' . get_frontend_settings('theme') . '/reload_my_courses', $page_data);
    }

    public function my_programs_by_category()
    {
        $category_id = $this->input->post('category_id');
        $course_details = $this->crud_model->get_my_courses_by_category_id($category_id)->result_array();
        $page_data['my_programs'] = $course_details;
        $this->load->view('frontend/' . get_frontend_settings('theme') . '/reload_my_programs', $page_data);
    }

    public function search($search_string = "")
    {
        if (isset($_GET['query']) && !empty($_GET['query'])) {
            $search_string = $_GET['query'];
            $page_data['courses'] = $this->crud_model->get_courses_by_search_string($search_string)->result_array();
            $page_data['total_result'] = count($page_data['courses']);
        } else {
            $this->session->set_flashdata('error_message', site_phrase('no_search_value_found'));
            redirect(site_url(), 'refresh');
        }

        if (!$this->session->userdata('layout')) {
            $this->session->set_userdata('layout', 'list');
        }

        $page_data['layout'] = $this->session->userdata('layout');
        $page_data['page_name'] = 'courses_page';
        $page_data['search_string'] = $search_string;
        $page_data['page_title'] = site_phrase('search_results');
        $this->load->view('frontend/' . get_frontend_settings('theme') . '/index', $page_data);
    }
    public function my_courses_by_search_string()
    {
        $search_string = $this->input->post('search_string');
        $course_details = $this->crud_model->get_my_courses_by_search_string($search_string)->result_array();
        $page_data['my_courses'] = $course_details;
        $this->load->view('frontend/' . get_frontend_settings('theme') . '/reload_my_courses', $page_data);
    }

    public function my_programs_by_search_string()
    {
        $search_string = $this->input->post('search_string');
        $course_details = $this->crud_model->get_my_courses_by_search_string($search_string)->result_array();
        $page_data['my_programs'] = $course_details;
        $this->load->view('frontend/' . get_frontend_settings('theme') . '/reload_my_programs', $page_data);
    }

    public function get_my_wishlists_by_search_string()
    {
        $search_string = $this->input->post('search_string');
        $course_details = $this->crud_model->get_courses_of_wishlists_by_search_string($search_string);
        $page_data['my_courses'] = $course_details;
        $this->load->view('frontend/' . get_frontend_settings('theme') . '/reload_my_wishlists', $page_data);
    }

    public function reload_my_wishlists()
    {
        $my_courses = $this->crud_model->get_courses_by_wishlists();
        $page_data['my_courses'] = $my_courses;
        $this->load->view('frontend/' . get_frontend_settings('theme') . '/reload_my_wishlists', $page_data);
    }

    public function get_course_details()
    {
        $course_id = $this->input->post('course_id');
        $course_details = $this->crud_model->get_course_by_id($course_id)->row_array();
        echo $course_details['title'];
    }
    public function get_programs_details()
    {
        $programs_id = $this->input->post('programs_id');
        $course_details = $this->crud_model->get_programs_by_id($programs_id)->row_array();
        echo $course_details['title'];
    }

    public function rate_course()
    {
        $data['review'] = $this->input->post('review');
        $data['ratable_id'] = $this->input->post('course_id');
        $data['ratable_type'] = 'course';
        $data['rating'] = $this->input->post('starRating');
        $data['date_added'] = strtotime(date('D, d-M-Y'));
        $data['user_id'] = $this->session->userdata('user_id');
        $this->crud_model->rate($data);
    }

    public function about_us()
    {
        $page_data['page_name'] = 'about_us';
        $page_data['page_title'] = site_phrase('about_us');
        $this->load->view('frontend/' . get_frontend_settings('theme') . '/index', $page_data);
    }

    public function terms_and_condition()
    {
        $page_data['page_name'] = 'terms_and_condition';
        $page_data['page_title'] = site_phrase('terms_and_condition');
        $this->load->view('frontend/' . get_frontend_settings('theme') . '/index', $page_data);
    }

    public function refund_policy()
    {
        $page_data['page_name'] = 'refund_policy';
        $page_data['page_title'] = site_phrase('refund_policy');
        $this->load->view('frontend/' . get_frontend_settings('theme') . '/index', $page_data);
    }

    public function privacy_policy()
    {
        $page_data['page_name'] = 'privacy_policy';
        $page_data['page_title'] = site_phrase('privacy_policy');
        $this->load->view('frontend/' . get_frontend_settings('theme') . '/index', $page_data);
    }
    public function cookie_policy()
    {
        $page_data['page_name'] = 'cookie_policy';
        $page_data['page_title'] = site_phrase('cookie_policy');
        $this->load->view('frontend/' . get_frontend_settings('theme') . '/index', $page_data);
    }

    // Version 1.1
    public function dashboard($param1 = "")
    {
        if ($this->session->userdata('user_login') != 1) {
            redirect('home', 'refresh');
        }

        if ($param1 == "") {
            $page_data['type'] = 'active';
        } else {
            $page_data['type'] = $param1;
        }

        $page_data['page_name'] = 'instructor_dashboard';
        $page_data['page_title'] = site_phrase('instructor_dashboard');
        $page_data['user_id'] = $this->session->userdata('user_id');
        $this->load->view('frontend/' . get_frontend_settings('theme') . '/index', $page_data);
    }

    public function create_course()
    {
        if ($this->session->userdata('user_login') != 1) {
            redirect('home', 'refresh');
        }

        $page_data['page_name'] = 'create_course';
        $page_data['page_title'] = site_phrase('create_course');
        $this->load->view('frontend/' . get_frontend_settings('theme') . '/index', $page_data);
    }

    public function edit_course($param1 = "", $param2 = "")
    {
        if ($this->session->userdata('user_login') != 1) {
            redirect('home', 'refresh');
        }

        if ($param2 == "") {
            $page_data['type'] = 'edit_course';
        } else {
            $page_data['type'] = $param2;
        }
        $page_data['page_name'] = 'manage_course_details';
        $page_data['course_id'] = $param1;
        $page_data['page_title'] = site_phrase('edit_course');
        $this->load->view('frontend/' . get_frontend_settings('theme') . '/index', $page_data);
    }
    public function quiz_analytics($param1 = "", $param2 = "")
    {
        if ($this->session->userdata('user_login') != 1) {
            redirect('home', 'refresh');
        }

        if ($param2 == "") {
            $page_data['type'] = 'quiz_analytics';
        } else {
            $page_data['type'] = $param2;
        }
        $page_data['page_name'] = 'quiz_analytics';
        $page_data['course_id'] = $param1;
        $page_data['page_title'] = site_phrase('quiz_analytics');
        $this->load->view('backend/' . get_frontend_settings('theme') . '/index', $page_data);
    }

    public function course_action($param1 = "", $param2 = "")
    {
        if ($this->session->userdata('user_login') != 1) {
            redirect('home', 'refresh');
        }

        if ($param1 == 'create') {
            if (isset($_POST['create_course'])) {
                $this->crud_model->add_course();
                redirect(site_url('home/create_course'), 'refresh');
            } else {
                $this->crud_model->add_course('save_to_draft');
                redirect(site_url('home/create_course'), 'refresh');
            }
        } elseif ($param1 == 'edit') {
            if (isset($_POST['publish'])) {
                $this->crud_model->update_course($param2, 'publish');
                redirect(site_url('home/dashboard'), 'refresh');
            } else {
                $this->crud_model->update_course($param2, 'save_to_draft');
                redirect(site_url('home/dashboard'), 'refresh');
            }
        }
    }

    public function sections($action = "", $course_id = "", $section_id = "")
    {
        if ($this->session->userdata('user_login') != 1) {
            redirect('home', 'refresh');
        }

        if ($action == "add") {
            $this->crud_model->add_section($course_id);
        } elseif ($action == "edit") {
            $this->crud_model->edit_section($section_id);
        } elseif ($action == "delete") {
            $this->crud_model->delete_section($course_id, $section_id);
            $this->session->set_flashdata('flash_message', site_phrase('section_deleted'));
            redirect(site_url("home/edit_course/$course_id/manage_section"), 'refresh');
        } elseif ($action == "serialize_section") {
            $container = array();
            $serialization = json_decode($this->input->post('updatedSerialization'));
            foreach ($serialization as $key) {
                array_push($container, $key->id);
            }
            $json = json_encode($container);
            $this->crud_model->serialize_section($course_id, $json);
        }
        $page_data['course_id'] = $course_id;
        $page_data['course_details'] = $this->crud_model->get_course_by_id($course_id)->row_array();
        return $this->load->view('frontend/' . get_frontend_settings('theme') . '/reload_section', $page_data);
    }

    public function manage_lessons($action = "", $course_id = "", $lesson_id = "")
    {
        if ($this->session->userdata('user_login') != 1) {
            redirect('home', 'refresh');
        }
        if ($action == 'add') {
            $this->crud_model->add_lesson();
            $this->session->set_flashdata('flash_message', site_phrase('lesson_added'));
        } elseif ($action == 'edit') {
            $this->crud_model->edit_lesson($lesson_id);
            $this->session->set_flashdata('flash_message', site_phrase('lesson_updated'));
        } elseif ($action == 'delete') {
            $this->crud_model->delete_lesson($lesson_id);
            $this->session->set_flashdata('flash_message', site_phrase('lesson_deleted'));
        }
        redirect('home/edit_course/' . $course_id . '/manage_lesson');
    }

    public function lesson_editing_form($lesson_id = "", $course_id = "")
    {
        if ($this->session->userdata('user_login') != 1) {
            redirect('home', 'refresh');
        }
        $page_data['type'] = 'manage_lesson';
        $page_data['course_id'] = $course_id;
        $page_data['lesson_id'] = $lesson_id;
        $page_data['page_name'] = 'lesson_edit';
        $page_data['page_title'] = site_phrase('update_lesson');
        $this->load->view('frontend/' . get_frontend_settings('theme') . '/index', $page_data);
    }

    public function download($filename = "")
    {
        $tmp = explode('.', $filename);
        $fileExtension = strtolower(end($tmp));
        $yourFile = base_url() . 'uploads/lesson_files/' . $filename;
        $file = @fopen($yourFile, "rb");

        header('Content-Description: File Transfer');
        header('Content-Type: text/plain');
        header('Content-Disposition: attachment; filename=' . $filename);
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize($yourFile));
        while (!feof($file)) {
            print(@fread($file, 1024 * 8));
            ob_flush();
            flush();
        }
    }

    // Version 1.3 codes
    public function get_enrolled_to_free_course($course_id)
    {
        if ($this->session->userdata('user_login') == 1) {
            $this->crud_model->enrol_to_free_course($course_id, $this->session->userdata('user_id'));
            redirect(site_url('home/my_programs'), 'refresh');
        } else {
            redirect(site_url('login'), 'refresh');
        }
    }
    public function get_enrolled_to_free_programs($course_id)
    {
        if ($this->session->userdata('user_login') == 1) {
            $this->crud_model->enrol_to_free_programs($course_id, $this->session->userdata('user_id'));
            redirect(site_url('home/my_programs'), 'refresh');
        } else {
            redirect(site_url('login'), 'refresh');
        }
    }

    // Version 1.4 codes
    public function login()
    {
        if ($this->session->userdata('admin_login')) {
            redirect(site_url('admin'), 'refresh');
        } elseif ($this->session->userdata('user_login')) {
            redirect(site_url('user'), 'refresh');
        }
        $page_data['page_name'] = 'login';
        $page_data['page_title'] = site_phrase('login');
        $this->load->view('frontend/' . get_frontend_settings('theme') . '/index', $page_data);
    }

    public function sign_up()
    {
        if ($this->session->userdata('admin_login')) {
            redirect(site_url('admin'), 'refresh');
        } elseif ($this->session->userdata('user_login')) {
            redirect(site_url('user'), 'refresh');
        }
        $page_data['page_name'] = 'sign_up';
        $page_data['page_title'] = site_phrase('sign_up');
        $this->load->view('frontend/' . get_frontend_settings('theme') . '/index', $page_data);
    }

    public function all_categories()
    {
        echo 1;
    }

    public function coach_sign_up()
    {
        if ($this->session->userdata('admin_login')) {
            redirect(site_url('admin'), 'refresh');
        } elseif ($this->session->userdata('user_login')) {
            redirect(site_url('user'), 'refresh');
        }
        $page_data['page_name'] = 'teacher_sign_up';
        $page_data['page_title'] = 'Become a Coach';
        $this->load->view('frontend/' . get_frontend_settings('theme') . '/index', $page_data);
    }

    public function organization_sign_up()
    {
        if ($this->session->userdata('admin_login')) {
            redirect(site_url('admin'), 'refresh');
        } elseif ($this->session->userdata('user_login')) {
            redirect(site_url('user'), 'refresh');
        }
        $page_data['page_name'] = 'organization_sign_up';
        $page_data['page_title'] = 'Become a Organization';
        $this->load->view('frontend/' . get_frontend_settings('theme') . '/index', $page_data);
    }

    public function forgot_password()
    {
        if ($this->session->userdata('admin_login')) {
            redirect(site_url('admin'), 'refresh');
        } elseif ($this->session->userdata('user_login')) {
            redirect(site_url('user'), 'refresh');
        }
        $page_data['page_name'] = 'forgot_password';
        $page_data['page_title'] = site_phrase('forgot_password');
        $this->load->view('frontend/' . get_frontend_settings('theme') . '/index', $page_data);
    }

    public function submit_quiz($from = "")
    {
        echo '<pre>';
        print_r($this->input->post());
        $submitted_quiz_info = array();
        $container = array();
        $quiz_id = $this->input->post('lesson_id');
        $quiz_questions = $this->crud_model->get_quiz_questions($quiz_id)->result_array();
        $total_correct_answers = 0;
        print_r($quiz_questions);
        exit;
        foreach ($quiz_questions as $quiz_question) {
            $submitted_answer_status = 0;
            $correct_answers = json_decode($quiz_question['correct_answers']);
            $submitted_answers = array();

            //submit answer
            $this->crud_model->submit_answer($quiz_question['id']);

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
                "correct_answers" => json_encode($correct_answers),
            );
            array_push($submitted_quiz_info, $container);
        }
        $page_data['submitted_quiz_info'] = $submitted_quiz_info;
        $page_data['total_correct_answers'] = $total_correct_answers;
        $page_data['total_questions'] = count($quiz_questions);
        if ($from == 'mobile') {
            $this->load->view('mobile/quiz_result', $page_data);
        } else {
            $this->load->view('lessons/quiz_result', $page_data);
        }
    }

    private function access_denied_courses($course_id)
    {
        $course_details = $this->crud_model->get_course_by_id($course_id)->row_array();
        if ($course_details['status'] == 'draft' && $course_details['user_id'] != $this->session->userdata('user_id')) {
            $this->session->set_flashdata('error_message', site_phrase('you_do_not_have_permission_to_access_this_course'));
            redirect(site_url('home'), 'refresh');
        } elseif ($course_details['status'] == 'pending') {
            if ($course_details['user_id'] != $this->session->userdata('user_id') && $this->session->userdata('role_id') != 1) {
                $this->session->set_flashdata('error_message', site_phrase('you_do_not_have_permission_to_access_this_course'));
                redirect(site_url('home'), 'refresh');
            }
        }
    }

    private function access_denied_programs($programs_id)
    {
        $course_details = $this->crud_model->get_programs_by_id($programs_id)->row_array();
        if ($course_details['status'] == 'draft' && $course_details['user_id'] != $this->session->userdata('user_id')) {
            $this->session->set_flashdata('error_message', site_phrase('you_do_not_have_permission_to_access_this_programs'));
            redirect(site_url('home'), 'refresh');
        } elseif ($course_details['status'] == 'pending') {
            if ($course_details['user_id'] != $this->session->userdata('user_id') && $this->session->userdata('role_id') != 1) {
                $this->session->set_flashdata('error_message', site_phrase('you_do_not_have_permission_to_access_this_programs'));
                redirect(site_url('home'), 'refresh');
            }
        }
    }

    public function invoice($purchase_history_id = '')
    {
        if ($this->session->userdata('user_login') != 1) {
            redirect('home', 'refresh');
        }
        $purchase_history = $this->crud_model->get_payment_details_by_id($purchase_history_id);
        if ($purchase_history['user_id'] != $this->session->userdata('user_id')) {
            redirect('home', 'refresh');
        }
        $page_data['payment_info'] = $purchase_history;
        $page_data['page_name'] = 'invoice';
        $page_data['page_title'] = 'invoice';
        $this->load->view('frontend/' . get_frontend_settings('theme') . '/index', $page_data);
    }

    /** COURSE COMPARE STARTS */
    public function compare()
    {
        $course_id_1 = (isset($_GET['course-id-1']) && !empty($_GET['course-id-1'])) ? $_GET['course-id-1'] : null;
        $course_id_2 = (isset($_GET['course-id-2']) && !empty($_GET['course-id-2'])) ? $_GET['course-id-2'] : null;
        $course_id_3 = (isset($_GET['course-id-3']) && !empty($_GET['course-id-3'])) ? $_GET['course-id-3'] : null;
        $page_data['type'] = $_GET['course_type'];
        $page_data['page_name'] = 'compare';
        $page_data['page_title'] = site_phrase('course_compare');
        // if ($page_data['type'] == 1) {
        //     $page_data['courses'] = $this->crud_model->get_courses()->result_array();
        // } else {
        //     $page_data['courses'] = $this->crud_model->get_programs()->result_array();
        // }
        $page_data['courses'] = $this->crud_model->get_courses()->result_array();

        $page_data['course_1_details'] = $course_id_1 ? $this->crud_model->get_course_by_id($course_id_1)->row_array() : array();
        $page_data['course_2_details'] = $course_id_2 ? $this->crud_model->get_course_by_id($course_id_2)->row_array() : array();
        $page_data['course_3_details'] = $course_id_3 ? $this->crud_model->get_course_by_id($course_id_3)->row_array() : array();
        $this->load->view('frontend/' . get_frontend_settings('theme') . '/index', $page_data);
    }
    /** COURSE COMPARE ENDS */

    public function page_not_found()
    {
        $page_data['page_name'] = '404';
        $page_data['page_title'] = site_phrase('404_page_not_found');
        $this->load->view('frontend/' . get_frontend_settings('theme') . '/index', $page_data);
    }

    // AJAX CALL FUNCTION FOR CHECKING COURSE PROGRESS
    public function check_course_progress($course_id)
    {
        echo course_progress($course_id);
    }

    // This is the function for rendering quiz web view for mobile
    public function quiz_mobile_web_view($lesson_id = "")
    {
        $data['lesson_details'] = $this->crud_model->get_lessons('lesson', $lesson_id)->row_array();
        $data['page_name'] = 'quiz';
        $this->load->view('mobile/index', $data);
    }

    // CHECK CUSTOM SESSION DATA
    public function session_data()
    {
        // SESSION DATA FOR CART
        if (!$this->session->userdata('cart_items')) {
            $this->session->set_userdata('cart_items', array());
        }

        // SESSION DATA FOR FRONTEND LANGUAGE
        if (!$this->session->userdata('language')) {
            $this->session->set_userdata('language', get_settings('language'));
        }
    }

    // SETTING FRONTEND LANGUAGE
    public function site_language()
    {
        $selected_language = $this->input->post('language');
        $this->session->set_userdata('language', $selected_language);
        echo true;
    }

    //FOR MOBILE
    public function course_purchase($auth_token = '', $course_id = '')
    {
        $this->load->model('jwt_model');
        if (empty($auth_token) || $auth_token == "null") {
            $page_data['cart_item'] = $course_id;
            $page_data['user_id'] = '';
            $page_data['is_login_now'] = 0;
            $page_data['enroll_type'] = null;
            $page_data['page_name'] = 'shopping_cart';
            $this->load->view('mobile/index', $page_data);
        } else {

            $logged_in_user_details = json_decode($this->jwt_model->token_data_get($auth_token), true);

            if ($logged_in_user_details['user_id'] > 0) {

                $credential = array('id' => $logged_in_user_details['user_id'], 'status' => 1, 'role_id' => 2);
                $query = $this->db->get_where('users', $credential);
                if ($query->num_rows() > 0) {
                    $row = $query->row();
                    $page_data['cart_item'] = $course_id;
                    $page_data['user_id'] = $row->id;
                    $page_data['is_login_now'] = 1;
                    $page_data['enroll_type'] = null;
                    $page_data['page_name'] = 'shopping_cart';

                    $cart_item = array($course_id);
                    $this->session->set_userdata('cart_items', $cart_item);
                    $this->session->set_userdata('user_login', '1');
                    $this->session->set_userdata('user_id', $row->id);
                    $this->session->set_userdata('role_id', $row->role_id);
                    $this->session->set_userdata('role', get_user_role('user_role', $row->id));
                    $this->session->set_userdata('name', $row->first_name . ' ' . $row->last_name);
                    $this->load->view('mobile/index', $page_data);
                }
            }
        }
    }

    //FOR MOBILE
    public function get_enrolled_to_free_course_mobile($course_id = "", $user_id = "", $get_request = "")
    {
        if ($get_request == "true") {
            $this->crud_model->enrol_to_free_course_mobile($course_id, $user_id);
        }
    }

    //FOR MOBILE
    public function payment_success_mobile($course_id = "", $user_id = "", $enroll_type = "")
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

            $this->load->view('mobile/index', $page_data);
        endif;
    }

    //FOR MOBILE
    public function payment_gateway_mobile($course_id = "", $user_id = "")
    {
        if ($course_id > 0 && $user_id > 0) :
            $page_data['page_name'] = 'payment_gateway';
            $this->load->view('mobile/index', $page_data);
        endif;
    }

    public function go_course_playing_page($course_id = "")
    {
        $this->db->where('user_id', $this->session->userdata('user_id'));
        $this->db->where('course_id', $course_id);
        $row = $this->db->get('enrol')->num_rows();

        if ($this->session->userdata('role_id') == 1 || $row > 0) {
            echo 1;
        } else {
            echo 0;
        }
    }

    public function go_programs_playing_page($programs_id = "")
    {
        $this->db->where('user_id', $this->session->userdata('user_id'));
        $this->db->where('programs_id', $programs_id);
        $row = $this->db->get('enrol')->num_rows();

        if ($this->session->userdata('role_id') == 1 || $row > 0) {
            echo 1;
        } else {
            echo 0;
        }
    }

    // https://edutrainia.com/user/programs_form/add_programs

    public function preview_free_lesson($lesson_id = "")
    {
        $page_data['lesson'] = $this->crud_model->get_free_lessons($lesson_id);
        $this->load->view('frontend/' . get_frontend_settings('theme') . '/preview_free_lesson', $page_data);
    }

    public function report()
    {
        $report = $this->crud_model->get_report($_POST['course_id'], $_POST['user_id']);
        if ($report) {

            $this->session->set_flashdata('error_message', 'You already reported');
            echo 0;
            //redirect(site_url('user/report'), 'refresh');
        } else {
            $this->crud_model->report();

            // $report_count =  $this->crud_model->get_report_count($_POST['course_id']);
            // if($report_count){
            //     $report_count = count($report_count);
            // }
            // else{
            //     $report_count = 0;
            // }

            echo 1;

            // $this->session->set_flashdata('flash_message','Reported Successfully' );
            // redirect(site_url('user/report'), 'refresh');

        }
    }

    public function get_programs()
    {
        // if ($this->session->userdata('user_login') != true) {
        //     redirect(site_url('login'), 'refresh');
        // }
        $courses = array();
        // Filter portion
        $filter_data['selected_category_id'] = $this->input->post('selected_category_id');
        $filter_data['selected_instructor_id'] = $this->input->post('selected_instructor_id');
        $filter_data['selected_price'] = $this->input->post('selected_price');
        $filter_data['selected_status'] = $this->input->post('selected_status');

        // Server side processing portion
        $columns = array(
            0 => '#',
            1 => 'title',
            2 => 'category',
            3 => 'lesson_and_section',
            4 => 'enrolled_student',
            5 => 'status',
            6 => 'price',
            7 => 'actions',
            8 => 'course_id',
        );

        // Coming from databale itself. Limit is the visible number of data
        $limit = html_escape($this->input->post('length'));
        $start = html_escape($this->input->post('start'));
        $order = "";
        $dir = $this->input->post('order')[0]['dir'];

        $totalData = $this->lazyload->count_all_programs($filter_data);
        $totalFiltered = $totalData;

        // This block of code is handling the search event of datatable
        if (empty($this->input->post('search')['value'])) {
            $courses = $this->lazyload->programs($limit, $start, $order, $dir, $filter_data);
        } else {
            $search = $this->input->post('search')['value'];
            $courses = $this->lazyload->programs_search($limit, $start, $search, $order, $dir, $filter_data);
            $totalFiltered = $this->lazyload->programs_search_count($search);
        }

        // Fetch the data and make it as JSON format and return it.
        $data = array();
        if (!empty($courses)) {
            foreach ($courses as $key => $row) {
                $instructor_details = $this->user_model->get_all_user($row->user_id)->row_array();
                $category_details = $this->crud_model->get_category_details_by_id($row->sub_category_id)->row_array();
                $sections = $this->crud_model->get_section_p('course', $row->id);
                $lessons = $this->crud_model->get_lessons_p('course', $row->id);
                $enroll_history = $this->crud_model->enrol_history_p($row->id);

                $status_badge = "badge-success-lighten";
                if ($row->status == 'pending') {
                    $status_badge = "badge-danger-lighten";
                } elseif ($row->status == 'draft') {
                    $status_badge = "badge-dark-lighten";
                }

                $price_badge = "badge-dark-lighten";
                $price = 0;
                if ($row->is_free_course == null) {
                    if ($row->discount_flag == 1) {
                        $price = currency($row->discounted_price);
                    } else {
                        $price = currency($row->price);
                    }
                } elseif ($row->is_free_course == 1) {
                    $price_badge = "badge-success-lighten";
                    $price = get_phrase('free');
                }

                $view_course_on_frontend_url = site_url('home/programs_page/' . rawurlencode(slugify($row->title)) . '/' . $row->id);
                $edit_this_course_url = site_url('user/programs_form/edit_programs/' . $row->id);
                $quiz_analytics = site_url('user/programs_form/quiz_analytics/' . $row->id);
                $section_and_lesson_url = site_url('user/programs_form/programs_edit/' . $row->id);

                if ($row->status == 'active' || $row->status == 'pending') {
                    $course_status_changing_action = "confirm_modal('" . site_url('user/programs_actions/draft/' . $row->id) . "')";
                    $course_status_changing_message = get_phrase('mark_as_drafted');
                } else {
                    $course_status_changing_action = "confirm_modal('" . site_url('user/programs_actions/publish/' . $row->id) . "')";
                    $course_status_changing_message = get_phrase('publish_this_programs');
                }

                $delete_course_url = "confirm_modal('" . site_url('user/programs_actions/delete/' . $row->id) . "')";
                $acitve_course_url = "confirm_modal('" . site_url('user/programs_actions/publish_admin/' . $row->id) . "')";
                if ($row->course_type != 'scorm') {
                    $section_and_lesson_menu = '<li><a class="dropdown-item" href="' . $section_and_lesson_url . '">' . get_phrase("section_and_lesson") . '</a></li>';
                } else {
                    $section_and_lesson_menu = "";
                }

                $action = '
                <div class="dropright dropright">
                <button type="button" class="btn btn-sm btn-outline-primary btn-rounded btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="mdi mdi-dots-vertical"></i>
                </button>
                <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="' . $view_course_on_frontend_url . '" target="_blank">' . get_phrase("view_programs_on_frontend") . '</a></li>
                <li><a class="dropdown-item" href="' . $edit_this_course_url . '">' . get_phrase("edit_this_programs") . '</a></li>
                <li><a class="dropdown-item" href="' . $quiz_analytics . '">' . get_phrase("quiz_analytics") . '</a></li>
                ' . $section_and_lesson_menu . '
                <li><a class="dropdown-item" href="javascript::" onclick="' . $course_status_changing_action . '">' . $course_status_changing_message . '</a></li>
                <li><a class="dropdown-item" href="javascript::" onclick="' . $delete_course_url . '">' . get_phrase("delete") . '</a></li>';

                if ($row->status == 'pending') {
                    $action .= '<li><a class="dropdown-item" href="javascript::" onclick="' . $acitve_course_url . '">Publish this program</a></li>';
                }

                $action .= '</ul></div>';

                $nestedData['#'] = $key + 1;

                $instructor_names = "";
                if ($row->multi_instructor) {
                    $instructors = $this->user_model->get_multi_instructor_details_with_csv($row->user_id);
                    foreach ($instructors as $counterForThis => $instructor) {
                        $instructor_names .= $instructor['first_name'] . ' ' . $instructor['last_name'];
                        $instructor_names .= $counterForThis + 1 == count($instructors) ? '' : ', ';
                    }
                } else {
                    $instructor_names = $instructor_details['first_name'] . ' ' . $instructor_details['last_name'];
                }

                $nestedData['title'] = '<strong><a href="' . site_url('user/programs_form/edit_programs/' . $row->id) . '">' . $row->title . '</a></strong><br>
                <small class="text-muted">' . get_phrase('instructor') . ': <b>' . $instructor_names . '</b></small>';

                $nestedData['category'] = '<span class="badge badge-dark-lighten">' . $category_details['name'] . '</span>';

                if ($row->course_type == 'scorm') {
                    $nestedData['lesson_and_section'] = '<span class="badge badge-info-lighten">' . get_phrase('scorm_course') . '</span>';
                } elseif ($row->course_type == 'general') {
                    $nestedData['lesson_and_section'] = '
                    <small class="text-muted"><b>' . get_phrase('total_section') . '</b>: ' . $sections->num_rows() . '</small><br>
                    <small class="text-muted"><b>' . get_phrase('total_lesson') . '</b>: ' . $lessons->num_rows() . '</small>';
                }

                $nestedData['enrolled_student'] = '<small class="text-muted"><b>' . get_phrase('total_enrolment') . '</b>: ' . $enroll_history->num_rows() . '</small>';

                $nestedData['status'] = '<span class="badge ' . $status_badge . '">' . get_phrase($row->status) . '</span>';

                $nestedData['price'] = '<span class="badge ' . $price_badge . '">' . $price . '</span>';

                $nestedData['actions'] = $action;

                $nestedData['course_id'] = $row->id;

                $data[] = $nestedData;
            }
        }

        $json_data = array(
            "draw" => intval($this->input->post('draw')),
            "recordsTotal" => intval($totalData),
            "recordsFiltered" => intval($totalFiltered),
            "data" => $data,
        );

        echo json_encode($json_data);
    }
}
