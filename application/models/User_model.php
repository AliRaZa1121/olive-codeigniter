<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        /*cache control*/
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        $this->output->set_header('Pragma: no-cache');
    }

    public function get_admin_details()
    {
        return $this->db->get_where('users', array('role_id' => 1));
    }

    public function get_user($user_id = 0)
    {
        if ($user_id > 0) {
            $this->db->where('id', $user_id);
        } else {
            $this->db->where('is_instructor', 0);
        }
        $this->db->where('role_id', 2);
        return $this->db->get('users');
    }

    public function get_all_user($user_id = 0)
    {
        if ($user_id > 0) {
            $this->db->where('id', $user_id);
        }
        return $this->db->get('users');
    }
    public function get_all_course($course_id = 0)
    {
        if ($course_id > 0) {
            $this->db->where('id', $course_id);
        }
        return $this->db->get('course');
    }

    public function add_user($is_instructor = false, $is_organization = false, $is_admin = false)
    {
        $validity = $this->check_duplication('on_create', $this->input->post('email'));
        if ($validity == false) {
            $this->session->set_flashdata('error_message', get_phrase('email_duplication'));
        } else {
            $data['first_name'] = html_escape($this->input->post('first_name'));
            $data['last_name'] = html_escape($this->input->post('last_name'));
            $data['email'] = html_escape($this->input->post('email'));
            $data['password'] = sha1(html_escape($this->input->post('password')));
            $social_link['facebook'] = html_escape($this->input->post('facebook_link'));
            $social_link['twitter'] = html_escape($this->input->post('twitter_link'));
            $social_link['linkedin'] = html_escape($this->input->post('linkedin_link'));
            $data['social_links'] = json_encode($social_link);
            $data['biography'] = $this->input->post('biography');

            if ($is_admin) {
                $data['role_id'] = 1;
                $data['is_instructor'] = 1;
            } else {
                $data['role_id'] = 2;
            }

            $data['date_added'] = strtotime(date("Y-m-d H:i:s"));
            $data['wishlist'] = json_encode(array());
            $data['watch_history'] = json_encode(array());
            $data['status'] = 1;
            $data['image'] = md5(rand(10000, 10000000));

            // Add paypal keys
            $paypal_info = array();
            $paypal['production_client_id'] = html_escape($this->input->post('paypal_client_id'));
            $paypal['production_secret_key'] = html_escape($this->input->post('paypal_secret_key'));
            array_push($paypal_info, $paypal);
            $data['paypal_keys'] = json_encode($paypal_info);

            // Add Stripe keys
            $stripe_info = array();
            $stripe_keys = array(
                'public_live_key' => html_escape($this->input->post('stripe_public_key')),
                'secret_live_key' => html_escape($this->input->post('stripe_secret_key')),
            );
            array_push($stripe_info, $stripe_keys);
            $data['stripe_keys'] = json_encode($stripe_info);

            if ($is_instructor) {
                $data['is_instructor'] = 1;
            }
            if ($is_organization) {
                $data['is_organization'] = 1;
            }

            $this->db->insert('users', $data);
            $user_id = $this->db->insert_id();

            // IF THIS IS A USER THEN INSERT BLANK VALUE IN PERMISSION TABLE AS WELL
            if ($is_admin) {
                $permission_data['admin_id'] = $user_id;
                $permission_data['permissions'] = json_encode(array());
                $this->db->insert('permissions', $permission_data);
            }

            $this->upload_user_image($data['image']);
            $this->session->set_flashdata('flash_message', get_phrase('user_added_successfully'));
        }
    }

    public function add_shortcut_user($is_instructor = false)
    {
        $validity = $this->check_duplication('on_create', $this->input->post('email'));
        if ($validity == false) {
            $response['status'] = 0;
            $response['message'] = get_phrase('this_email_already_exits') . '. ' . get_phrase('please_use_another_email');
            return json_encode($response);
        } else {
            $data['first_name'] = html_escape($this->input->post('first_name'));
            $data['last_name'] = html_escape($this->input->post('last_name'));
            $data['email'] = html_escape($this->input->post('email'));
            $data['password'] = sha1(html_escape($this->input->post('password')));
            $social_link['facebook'] = '';
            $social_link['twitter'] = '';
            $social_link['linkedin'] = '';
            $data['social_links'] = json_encode($social_link);
            $data['role_id'] = 2;
            $data['date_added'] = strtotime(date("Y-m-d H:i:s"));
            $data['wishlist'] = json_encode(array());
            $data['watch_history'] = json_encode(array());
            $data['status'] = 1;
            $data['image'] = md5(rand(10000, 10000000));

            // Add paypal keys
            $paypal_info = array();
            $paypal['production_client_id'] = '';
            $paypal['production_secret_key'] = '';
            array_push($paypal_info, $paypal);
            $data['paypal_keys'] = json_encode($paypal_info);

            // Add Stripe keys
            $stripe_info = array();
            $stripe_keys = array(
                'public_live_key' => '',
                'secret_live_key' => '',
            );
            array_push($stripe_info, $stripe_keys);
            $data['stripe_keys'] = json_encode($stripe_info);

            if ($is_instructor) {
                $data['is_instructor'] = 1;
            }
            // if ($is_organization) {
            //     $data['is_organization'] = 1;
            // }
            $this->db->insert('users', $data);

            $this->session->set_flashdata('flash_message', get_phrase('user_added_successfully'));
            $response['status'] = 1;
            return json_encode($response);
        }
    }

    public function check_duplication($action = "", $email = "", $user_id = "")
    {
        if ($email !== "") {
            $duplicate_email_check = $this->db->get_where('users', array('email' => $email));
        } else {
            return true;
        }
        if ($action == 'on_create') {
            if ($duplicate_email_check->num_rows() > 0) {
                if ($duplicate_email_check->row()->status == 1) {
                    return false;
                } else {
                    return 'unverified_user';
                }
            } else {
                return true;
            }
        } elseif ($action == 'on_update') {
            if ($duplicate_email_check->num_rows() > 0) {
                if ($duplicate_email_check->row()->id == $user_id) {
                    return true;
                } else {
                    return false;
                }
            } else {
                return true;
            }
        }
    }

    public function username_duplication($action = "", $username = "", $user_id = "")
    {
        $duplicate_email_check = $this->db->get_where('users', array('username' => $username));

        if ($action == 'on_create') {
            if ($duplicate_email_check->num_rows() > 0) {
                if ($duplicate_email_check->row()->status == 1) {
                    return false;
                } else {
                    return 'unverified_user';
                }
            } else {
                return true;
            }
        } elseif ($action == 'on_update') {
            if ($duplicate_email_check->num_rows() > 0) {
                if ($duplicate_email_check->row()->id == $user_id) {
                    return true;
                } else {
                    return false;
                }
            } else {
                return true;
            }
        }
    }

    public function edit_user($user_id = "")
    { // Admin does this editing
        $validity = $this->check_duplication('on_update', $this->input->post('email'), $user_id);
        if ($validity) {
            $data['first_name'] = html_escape($this->input->post('first_name'));
            $data['last_name'] = html_escape($this->input->post('last_name'));

            $data['phone'] = html_escape($this->input->post('phone'));
            // $data['gender']  = html_escape($this->input->post('gender'));
            $data['username'] = html_escape($this->input->post('username'));
            $data['address'] = html_escape($this->input->post('address'));
            $data['country'] = html_escape($this->input->post('country'));
            $data['age'] = html_escape($this->input->post('age'));
            $data['qualification'] = html_escape($this->input->post('qualification'));
            $data['lisenses'] = html_escape($this->input->post('lisenses'));
            $data['certification'] = html_escape($this->input->post('certification'));
            $data['experience'] = html_escape($this->input->post('experience'));
            $data['postal_address'] = html_escape($this->input->post('postal_address'));

            if (isset($_POST['email'])) {
                $data['email'] = html_escape($this->input->post('email'));
            }
            $social_link['facebook'] = html_escape($this->input->post('facebook_link'));
            $social_link['twitter'] = html_escape($this->input->post('twitter_link'));
            $social_link['linkedin'] = html_escape($this->input->post('linkedin_link'));
            $social_link['instagram'] = html_escape($this->input->post('instagram_link'));

            $data['social_links'] = json_encode($social_link);
            $data['biography'] = $this->input->post('biography');
            $data['title'] = html_escape($this->input->post('title'));
            $data['skills'] = html_escape($this->input->post('skills'));
            $data['last_modified'] = strtotime(date("Y-m-d H:i:s"));

            if (isset($_FILES['user_image']) && $_FILES['user_image']['name'] != "") {
                unlink('uploads/user_image/' . $this->db->get_where('users', array('id' => $user_id))->row('image') . '.jpg');
                $data['image'] = md5(rand(10000, 10000000));
                $this->upload_user_image($data['image']);
            }

            // Update paypal keys
            $paypal_info = array();
            $paypal['production_client_id'] = html_escape($this->input->post('paypal_client_id'));
            $paypal['production_secret_key'] = html_escape($this->input->post('paypal_secret_key'));
            array_push($paypal_info, $paypal);
            $data['paypal_keys'] = json_encode($paypal_info);
            // Update Stripe keys
            $stripe_info = array();
            $stripe_keys = array(
                'public_live_key' => html_escape($this->input->post('stripe_public_key')),
                'secret_live_key' => html_escape($this->input->post('stripe_secret_key')),
            );
            array_push($stripe_info, $stripe_keys);
            $data['stripe_keys'] = json_encode($stripe_info);

            $this->db->where('id', $user_id);
            $this->db->update('users', $data);
            $this->session->set_flashdata('flash_message', get_phrase('user_update_successfully'));
        } else {
            $this->session->set_flashdata('error_message', get_phrase('email_duplication'));
        }
    }
    public function delete_user($user_id = "")
    {
        $this->db->where('id', $user_id);
        $this->db->delete('users');
        $this->session->set_flashdata('flash_message', get_phrase('user_deleted_successfully'));
    }

    public function unlock_screen_by_password($password = "")
    {
        $password = sha1($password);
        return $this->db->get_where('users', array('id' => $this->session->userdata('user_id'), 'password' => $password))->num_rows();
    }

    public function register_user($data)
    {
        $this->db->insert('users', $data);
        return $this->db->insert_id();
    }

    public function register_user_update_code($data)
    {
        $update_code['verification_code'] = $data['verification_code'];
        $update_code['password'] = $data['password'];
        $this->db->where('email', $data['email']);
        $this->db->update('users', $update_code);
    }

    public function my_courses($user_id = "")
    {
        if ($user_id == "") {
            $user_id = $this->session->userdata('user_id');
        }
        return $this->db->get_where('enrol', array('user_id' => $user_id));
    }

    public function my_programs($user_id = "")
    {
        if ($user_id == "") {
            $user_id = $this->session->userdata('user_id');
        }
        return $this->db->get_where('enrol', array('user_id' => $user_id));
    }

    public function upload_user_image($image_code)
    {
        if (isset($_FILES['user_image']) && $_FILES['user_image']['name'] != "") {
            move_uploaded_file($_FILES['user_image']['tmp_name'], 'uploads/user_image/' . $image_code . '.jpg');
            $this->session->set_flashdata('flash_message', get_phrase('user_update_successfully'));
        }
    }

    public function update_account_settings($user_id)
    {
        $validity = $this->check_duplication('on_update', $this->input->post('email'), $user_id);
        if ($validity) {
            if (!empty($_POST['current_password']) && !empty($_POST['new_password']) && !empty($_POST['confirm_password'])) {
                $user_details = $this->get_user($user_id)->row_array();
                $current_password = $this->input->post('current_password');
                $new_password = $this->input->post('new_password');
                $confirm_password = $this->input->post('confirm_password');
                if ($user_details['password'] == sha1($current_password) && $new_password == $confirm_password) {
                    $data['password'] = sha1($new_password);
                } else {
                    $this->session->set_flashdata('error_message', get_phrase('mismatch_password'));
                    return;
                }
            }
            $data['email'] = html_escape($this->input->post('email'));
            $this->db->where('id', $user_id);
            $this->db->update('users', $data);
            $this->session->set_flashdata('flash_message', get_phrase('updated_successfully'));
        } else {
            $this->session->set_flashdata('error_message', get_phrase('email_duplication'));
        }
    }

    public function change_password($user_id)
    {
        $data = array();
        if (!empty($_POST['current_password']) && !empty($_POST['new_password']) && !empty($_POST['confirm_password'])) {
            $user_details = $this->get_all_user($user_id)->row_array();
            $current_password = $this->input->post('current_password');
            $new_password = $this->input->post('new_password');
            $confirm_password = $this->input->post('confirm_password');

            if ($user_details['password'] == sha1($current_password) && $new_password == $confirm_password) {
                $data['password'] = sha1($new_password);
            } else {
                $this->session->set_flashdata('error_message', get_phrase('mismatch_password'));
                return;
            }
        }

        $this->db->where('id', $user_id);
        $this->db->update('users', $data);
        $this->session->set_flashdata('flash_message', get_phrase('password_updated'));
    }

    // public function get_instructor($id = 0)
    // {
    //     if ($id > 0) {
    //         return $this->db->get_where('users', array('id' => $id, 'is_instructor' => 1));
    //     } else {
    //         return $this->db->get_where('users', array('is_instructor' => 1));
    //     }
    // }

    public function get_instructor($id = 0)
    {
        if ($id > 0) {
            return $this->db->get_where('users', array('id' => $id, 'role_id' => 2, 'is_instructor' => 1));
        } else {
            return $this->db->get_where('users', array('role_id' => 2, 'is_instructor' => 1));
        }
    }

    public function get_student_quizes()
    {
        $q_id = $this->uri->segment($this->uri->total_segments());

        $row = $this->db->where('quiz_id', $q_id)->get('question')->row_array();

        // $row = $this->db->where('question')->get('quiz_id' , $q_id)->row();

        $query1 = $this->db->where('question_id', $row['id'])->get('quiz_answers')->result_array();
        $student_id = array();
        $query_result = array();
        foreach ($query1 as $row1) {
            if (!in_array($row1['user_id'], $student_id) && $row1['user_id'] != "") {
                array_push($student_id, $row1['user_id']);
            }
        }
        if (count($student_id) > 0) {
            $this->db->where_in('id', $student_id);
            $query_result = $this->db->get('users');
        } else {
            $query_result = $this->get_admin_details();
        }

        return $query_result;
    }

    public function get_instructor_by_email($email = null)
    {
        return $this->db->get_where('users', array('email' => $email, 'is_instructor' => 1));
    }

    public function get_admins($id = 0)
    {
        if ($id > 0) {
            return $this->db->get_where('users', array('id' => $id, 'role_id' => 1));
        } else {
            return $this->db->get_where('users', array('role_id' => 1));
        }
    }

    public function quiz_results()
    {

        return $this->db->get('quiz_answers');
    }
    public function get_results()
    {
        return $this->db->get('quiz_answers');
    }

    public function get_number_of_active_courses_of_instructor($instructor_id)
    {
        $multi_instructor_course_ids = $this->crud_model->multi_instructor_course_ids_for_an_instructor($instructor_id);

        $this->db->where('user_id', $instructor_id);
        $this->db->where('status', 'active');
        if ($multi_instructor_course_ids && count($multi_instructor_course_ids)) {
            $this->db->or_where_in('id', $multi_instructor_course_ids);
        }
        $result = $this->db->get('course')->num_rows();

        return $result;
    }

    public function get_number_of_active_programs_of_instructor($instructor_id)
    {
        $multi_instructor_course_ids = $this->crud_model->multi_instructor_programs_ids_for_an_instructor($instructor_id);
        $this->db->where('user_id', $instructor_id);
        $this->db->where('type', 2);
        $this->db->where('status', 'active');
        if ($multi_instructor_course_ids && count($multi_instructor_course_ids)) {
            $this->db->or_where_in('id', $multi_instructor_course_ids);
        }

        $result = $this->db->get('course')->num_rows();
        return $result;
    }

    public function get_user_image_url($user_id)
    {
        $this->db->where('id', $user_id);
        $user = $this->db->get('users')->row_array();
        if (file_exists('uploads/user_image/' . $user['image'] . '.jpg')) {
            return base_url() . 'uploads/user_image/' . $user['image'] . '.jpg';
        } else {
            return base_url() . 'uploads/user_image/placeholder.png';
        }
    }

    public function get_student_certificate($certificate_id)
    {
        $certificate = $this->db->get_where('certificates', array('id' => $certificate_id))->row('shareable_url');
        if (file_exists('uploads/certificates/' . $certificate)) {
            return base_url() . 'uploads/certificates/' . $certificate;
        } else {
            return base_url() . 'uploads/user_image/placeholder.png';
        }
    }

    public function get_instructor_list()
    {
        $query1 = $this->db->get_where('course', array('status' => 'active'))->result_array();
        $instructor_ids = array();
        $query_result = array();
        foreach ($query1 as $row1) {
            if (!in_array($row1['user_id'], $instructor_ids) && $row1['user_id'] != "") {
                array_push($instructor_ids, $row1['user_id']);
            }
        }
        if (count($instructor_ids) > 0) {
            $this->db->where_in('id', $instructor_ids);
            $query_result = $this->db->get('users');
        } else {
            $query_result = $this->get_admin_details();
        }

        return $query_result;
    }

    public function get_student_list()
    {
        $query1 = $this->db->get_where('course', array('status' => 'active'))->result_array();
        $instructor_ids = array();
        $query_result = array();
        foreach ($query1 as $row1) {
            if (!in_array($row1['user_id'], $instructor_ids) && $row1['user_id'] != "") {
                array_push($instructor_ids, $row1['user_id']);
            }
        }
        if (count($instructor_ids) > 0) {
            $this->db->where_in('id', $instructor_ids);
            $query_result = $this->db->get('users');
        } else {
            $query_result = $this->get_admin_details();
        }

        return $query_result;
    }

    public function update_instructor_paypal_settings($user_id = '')
    {
        // Update paypal keys
        $paypal_info = array();
        $paypal['production_client_id'] = html_escape($this->input->post('paypal_client_id'));
        $paypal['production_secret_key'] = html_escape($this->input->post('paypal_secret_key'));
        array_push($paypal_info, $paypal);
        $data['paypal_keys'] = json_encode($paypal_info);
        $this->db->where('id', $user_id);
        $this->db->update('users', $data);
    }
    public function update_instructor_stripe_settings($user_id = '')
    {
        // Update Stripe keys
        $stripe_info = array();
        $stripe_keys = array(
            'public_live_key' => html_escape($this->input->post('stripe_public_key')),
            'secret_live_key' => html_escape($this->input->post('stripe_secret_key')),
        );
        array_push($stripe_info, $stripe_keys);
        $data['stripe_keys'] = json_encode($stripe_info);
        $this->db->where('id', $user_id);
        $this->db->update('users', $data);
    }

    // POST INSTRUCTOR APPLICATION FORM AND INSERT INTO DATABASE IF EVERYTHING IS OKAY
    public function post_instructor_application()
    {
        // FIRST GET THE USER DETAILS
        $user_details = $this->get_all_user($this->input->post('id'))->row_array();

        // CHECK IF THE PROVIDED ID AND EMAIL ARE COMING FROM VALID USER
        if ($user_details['email'] == $this->input->post('email')) {

            // GET PREVIOUS DATA FROM APPLICATION TABLE
            $previous_data = $this->get_applications($user_details['id'], 'user')->num_rows();
            // CHECK IF THE USER HAS SUBMITTED FORM BEFORE
            if ($previous_data > 0) {
                $this->session->set_flashdata('error_message', get_phrase('already_submitted'));
                redirect(site_url('user/become_an_instructor'), 'refresh');
            }

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
                    $this->session->set_flashdata('error_message', get_phrase('invalide_file'));
                    redirect(site_url('user/become_an_instructor'), 'refresh');
                }
            }
            $this->db->insert('applications', $data);

            $is_instructor['is_instructor'] = 1;
            $this->db->where('id', $this->input->post('id'));
            $this->db->update('users', $is_instructor);
            $this->session->set_flashdata('flash_message', get_phrase('application_submitted_successfully'));
            redirect(site_url('user/become_an_instructor'), 'refresh');
        } else {
            $this->session->set_flashdata('error_message', get_phrase('user_not_found'));
            redirect(site_url('user/become_an_instructor'), 'refresh');
        }
    }

    // GET INSTRUCTOR APPLICATIONS
    public function get_applications($id = "", $type = "")
    {
        if ($id > 0 && !empty($type)) {
            if ($type == 'user') {
                $applications = $this->db->get_where('applications', array('user_id' => $id));
                return $applications;
            } else {
                $applications = $this->db->get_where('applications', array('id' => $id));
                return $applications;
            }
        } else {
            $this->db->order_by("id", "DESC");
            $applications = $this->db->get_where('applications');
            return $applications;
        }
    }

    // GET APPROVED APPLICATIONS
    public function get_approved_applications()
    {
        $applications = $this->db->get_where('applications', array('status' => 1));
        return $applications;
    }

    // GET PENDING APPLICATIONS
    public function get_pending_applications()
    {
        $applications = $this->db->get_where('applications', array('status' => 0));
        return $applications;
    }

    //UPDATE STATUS OF INSTRUCTOR APPLICATION
    public function update_status_of_application($status, $application_id)
    {
        $application_details = $this->get_applications($application_id, 'application');
        if ($application_details->num_rows() > 0) {
            $application_details = $application_details->row_array();
            if ($status == 'approve') {
                $application_data['status'] = 1;
                $this->db->where('id', $application_id);
                $this->db->update('applications', $application_data);

                $instructor_data['is_instructor'] = 1;
                $this->db->where('id', $application_details['user_id']);
                $this->db->update('users', $instructor_data);

                $this->session->set_flashdata('flash_message', get_phrase('application_approved_successfully'));
                redirect(site_url('admin/instructor_application'), 'refresh');
            } else {
                $this->db->where('id', $application_id);
                $this->db->delete('applications');
                $this->session->set_flashdata('flash_message', get_phrase('application_deleted_successfully'));
                redirect(site_url('admin/instructor_application'), 'refresh');
            }
        } else {
            $this->session->set_flashdata('error_message', get_phrase('invalid_application'));
            redirect(site_url('admin/instructor_application'), 'refresh');
        }
    }

    // ASSIGN PERMISSION
    public function assign_permission()
    {
        $argument = html_escape($this->input->post('arg'));
        $argument = explode('-', $argument);
        $admin_id = $argument[0];
        $module = $argument[1];

        // CHECK IF IT IS A ROOT ADMIN
        if (is_root_admin($admin_id)) {
            return false;
        }

        $permission_data['admin_id'] = $admin_id;
        $previous_permissions = json_decode($this->get_admins_permission_json($permission_data['admin_id']), true);

        if (in_array($module, $previous_permissions)) {
            $new_permission = array();
            foreach ($previous_permissions as $permission) {
                if ($permission != $module) {
                    array_push($new_permission, $permission);
                }
            }
        } else {
            array_push($previous_permissions, $module);
            $new_permission = $previous_permissions;
        }

        $permission_data['permissions'] = json_encode($new_permission);

        $this->db->where('admin_id', $admin_id);
        $this->db->update('permissions', $permission_data);
        return true;
    }

    // GET ADMIN'S PERMISSION JSON
    public function get_admins_permission_json($admin_id)
    {
        $admins_permissions = $this->db->get_where('permissions', ['admin_id' => $admin_id])->row_array();
        return $admins_permissions['permissions'];
    }

    // GET MULTI INSTRUCTOR DETAILS WITH COURSE ID
    public function get_multi_instructor_details_with_csv($csv)
    {
        $instructor_ids = explode(',', $csv);
        $this->db->where_in('id', $instructor_ids);
        return $this->db->get('users')->result_array();
    }

    public function suspend_user($user_id = 0, $only = "")
    {
        if (!$only) {
            $user = $this->user_model->get_user($user_id)->row_array();

            $status = 0;
            if ($user['status'] == 2) {
                $status = 1;
            } else {
                $status = 2;
            }
        } else {
            $status = 2;
        }
        $data['status'] = $status;
        $this->db->where('id', $user_id);

        $this->db->update('users', $data);
        if ($status == 1) {
            $this->session->set_flashdata('flash_message', 'User Active Successfully');
        } else {
            $this->email_model->send_mail_on_suspension($user_id);
            $this->session->set_flashdata('flash_message', 'User Suspended Successfully');
        }
    }

    public function verified_user($user_id)
    {
        $user = $this->user_model->get_user($user_id)->row_array();
        $status = 1;
        $data['account_status'] = $status;
        $this->db->where('id', $user_id);
        $this->db->update('users', $data);
        $this->email_model->send_mail_on_account_verify($user_id);
        $this->session->set_flashdata('flash_message', 'User Active Successfully');
    }

    public function get_student($id = 0)
    {

        if ($id > 0) {
            return $this->db->get_where('users', array('id' => $id, 'is_instructor' => 0));
        } else {
            return $this->db->get_where('users', array('is_instructor' => 0, 'status' => 1));
        }
    }

    public function get_users_according_role($role = "", $course_id, $user_id = "")
    {

        $this->db->where('id', $course_id);
        $course = $this->db->get('course')->row_array();

        $user_ids = explode(',', $course['user_id']);

        $students = [];
        $instructors = [];
        $organizations = [];
        $users = [];

        if ($role == "instructor" || $role == "organization") {
            $this->db->where('course_id', $course_id);
            $student_ids = $this->db->get('enrol')->result_array();

            foreach ($student_ids as $id) {
                $this->db->where('id', $id['user_id']);
                $students[] = $this->db->get('users')->row_array();
            }
        }

        if (!empty($user_ids)) {
            foreach ($user_ids as $id) {
                $this->db->where('id', $id);
                $user = $this->db->get('users')->row_array();
                if ($role == "student" || $role == "organization") {
                    if ($user['is_instructor'] == 1) {
                        $instructors[] = $user;
                    }
                }
                if ($role == "student" || $role == "instructor") {
                    if ($user['is_organization'] == 1) {
                        $organizations[] = $user;
                    }
                }
            }
        }

        $users = array_merge($students, $instructors, $organizations);
        return $users;

        // if($role == 'intructor' ){
        //      return $this->db->get_where('users', array('is_instructor' => 0, 'is_organization' => '1', 'status' => 1));
        // }
        // else if($role == 'organization' ){
        //     return $this->db->get_where('users', array('is_instructor' => 1, 'is_organization' => '0', 'status' => 1));
        // }
        // else if($role == 'student' ){
        //     return $this->db->get_where('users', array('is_instructor' => 0, 'is_organization' => '0', 'status' => 1));
        // }

    }

    public function get_students_by_course_id($course_id, $user_id = "")
    {

        $this->db->where('id', $course_id);
        $course = $this->db->get('course')->row_array();

        $user_ids = explode(',', $course['user_id']);

        if (in_array($user_id, $user_ids)) {
            $this->db->where('course_id', $course_id);
            $student_ids = $this->db->get('enrol')->result_array();

            $users = [];
            foreach ($student_ids as $id) {
                $this->db->where('id', $id['user_id']);
                $users[] = $this->db->get('users')->row_array();
            }

            return $users;
        }
    }

    public function get_instructors_by_course_id($course_id, $user_id)
    {
        $this->db->where('id', $course_id);
        $course = $this->db->get('course')->row_array();

        $user_ids = explode(',', $course['user_id']);

        if (!empty($user_ids)) {
            foreach ($user_ids as $id) {
                $this->db->where('id', $id);
                $users[] = $this->db->get('users')->row_array();
            }

            return $users;
        }
    }

    public function get_organizations()
    {
        $this->db->where('is_organization', 1);
        return $this->db->get('users');
    }

    public function join_academy_request()
    {
        $data['teacher_id'] = $this->session->userdata('user_id');
        $data['academy_id'] = $_POST['organization_id'];
        $data['join_academy'] = 0;
        $this->db->where('academy_id', $_POST['organization_id']);
        $this->db->where('teacher_id', $this->session->userdata('user_id'));
        $result = $this->db->get('academy_teachers');
        if ($result->num_rows() == 0) {
            $this->db->insert('academy_teachers', $data);
            $this->session->set_flashdata('flash_message', 'Request submitted successfully');
        } else {
            $this->session->set_flashdata('error_message', 'You have already requested for this academy');
        }
    }

    public function register_instructor_in_academy($instructor_id)
    {
        $data['teacher_id'] = $instructor_id;
        $data['academy_id'] = $this->session->userdata('user_id');
        $data['join_academy'] = 0;
        $this->db->insert('academy_teachers', $data);
        $this->session->set_flashdata('flash_message', 'Request submitted successfully');
    }

    public function requested_academy_list()
    {
        $this->db->where('teacher_id', $this->session->userdata('user_id'));
        $this->db->where('join_academy', 0);
        $this->db->where('quit_academy', null);
        $organizations = $this->db->get('academy_teachers')->result_array();

        // return $organizations;

        $data = [];
        foreach ($organizations as $key => $organization) {
            $academy = $this->get_user($organization['academy_id'])->row_array();
            $data[$key]['id'] = $organization['id'];
            $data[$key]['organization_name'] = $academy['first_name'] . ' ' . $academy['last_name'];
            $data[$key]['status'] = 'requested';
        }

        return $data;
    }

    public function joined_academy_list()
    {
        $this->db->where('teacher_id', $this->session->userdata('user_id'));
        $this->db->where('join_academy', 1);
        $this->db->where('quit_academy', null);
        $organizations = $this->db->get('academy_teachers')->result_array();

        $data = [];
        foreach ($organizations as $key => $organization) {
            $academy = $this->get_user($organization['academy_id'])->row_array();
            $data[$key]['id'] = $organization['id'];
            $data[$key]['organization_name'] = $academy['first_name'] . ' ' . $academy['last_name'];
            $data[$key]['status'] = 'joined';
        }

        return $data;
    }

    public function quit_academy($id)
    {
        $data['quit_academy'] = 0;
        $this->db->where('id', $id);
        $this->db->update('academy_teachers', $data);
    }

    public function joined_instructor_list()
    {
        $this->db->where('academy_id', $this->session->userdata('user_id'));

        // $this->db->orWhere('quit_academy' ,"0");
        $instructors = $this->db->get('academy_teachers')->result_array();

        $data = [];
        foreach ($instructors as $key => $instructor) {
            $teacher = $this->get_user($instructor['teacher_id'])->row_array();
            $data[$key]['id'] = $instructor['id'];
            $data[$key]['teacher_name'] = $teacher['first_name'] . ' ' . $teacher['last_name'];

            $data[$key]['status'] = $instructor['join_academy'];
            $data[$key]['quit_status'] = $instructor['quit_academy'];
        }

        return $data;
    }

    public function instructor_list_for_organization()
    {
        $academyInstructors = $this->db->select('teacher_id')->where('academy_id', $this->session->userdata('user_id'))->get('academy_teachers')->result_array();
        $academyInstructor = [];
        if (!empty($academyInstructors)) {
            foreach ($academyInstructors as $instructor) {
                array_push($academyInstructor, $instructor['teacher_id']);
            }
        }
        $this->db->where('is_instructor', 1);
        $this->db->where('status', 1);
        $this->db->where_not_in('id', $academyInstructor);
        return $this->db->get('users')->result_array();
    }

    public function change_academy_status($id, $action)
    {
        $data = [];
        if ($action == "accept") {
            $data['join_academy'] = 1;
        }
        if ($action == "reject") {
            $data['join_academy'] = 2;
        }
        if ($action == "quit") {
            $data['join_academy'] = 0;
            $data['quit_academy'] = 1;
        }
        if ($action == "quit-reject") {
            $data['quit_academy'] = 2;
        }

        $this->db->where('id', $id);
        $this->db->update('academy_teachers', $data);
    }
    public function banned_user($user_id = 0, $only = "")
    {
        // if(!$only){
        // $user = $this->user_model->get_user($user_id)->row_array();

        // $status = 0;
        // if($user['status'] == 2){
        //      $status = 1;
        // }
        // else{
        //     $status = 2;
        // }

        // }
        // else{
        //     $status = 2;
        // }
        $status = 3;
        $data['status'] = $status;
        $this->db->where('id', $user_id);

        $this->db->update('users', $data);
        // if($status == 1){
        //     $this->session->set_flashdata('flash_message', 'User Active Successfully');
        // }
        // else{
        $this->email_model->send_mail_on_banned($user_id);
        $this->session->set_flashdata('flash_message', 'User Banned Successfully');
        // }

    }

    public function get_number_of_active_instructors_of_organization($organization_id)
    {

        $this->db->where('academy_id', $organization_id);

        $result = $this->db->get('academy_teachers')->num_rows();
        return $result;
    }

    public function add_to_feature($user_id)
    {
        if ($user_id > 0) {
            $data['is_featured_instructor'] = true;
            $this->db->where('id', $user_id);
            $this->db->update('users', $data);
        }
    }

    public function remove_from_feature($user_id)
    {
        if ($user_id > 0) {
            $data['is_featured_instructor'] = false;
            $this->db->where('id', $user_id);
            $this->db->update('users', $data);
        }
    }

    public function get_articles($limit = null)
    {
        $this->db->where('type', 'articles');
        if ($limit != "") {
            $this->db->limit($limit);
        }
        return $this->db->get('contents');
    }

    public function get_news($limit = null)
    {
        $this->db->where('type', 'news');
        if ($limit != "") {
            $this->db->limit($limit);
        }
        return $this->db->get('contents');
    }

    public function get_events($limit = null)
    {
        $this->db->where('type', 'events');
        if ($limit != "") {
            $this->db->limit($limit);
        }
        return $this->db->get('contents');
    }

    public function content_details($type, $slug)
    {
        $this->db->where('type', $type);
        $this->db->where('slug', $slug);
        return $this->db->get('contents')->row_array();
    }
}
