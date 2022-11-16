<?php
defined('BASEPATH') or exit('No direct script access allowed');
require APPPATH . '/libraries/TokenHandler.php';
//include Rest Controller library
require (APPPATH . 'libraries/REST_Controller.php');


class Example extends REST_Controller {
    
    public function index()
    {
        echo 'this is restful api';
        
    }
}