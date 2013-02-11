<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Login extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('ModelAkun');
    }

    public function index() {
        if ($this->session->userdata('username') == true)
            redirect('home');

        $this->load->view('login_page');
    }

}
