<?php
defined('BASEPATH') or exit('No direct script access allowed');
require APPPATH . '/libraries/TokenHandler.php';
//include Rest Controller library
require (APPPATH . 'libraries/REST_Controller.php');


class Example extends REST_Controller {
      /**
     * Get All Data from this method.
     *
     * @return Response
    */
    public function __construct() {
       parent::__construct();
       $this->load->database();
    }
       
    /**
     * Get All Data from this method.
     *
     * @return Response
    */
    
    public function index()
    {
        echo 'this is restful api';
        
    }
}