<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {
    public function __construct() {
        parent::__construct();
        if ($this->session->userdata('is_login') == true){
            redirect(base_url().'admin');
        }
        $this->load->model('m_login');
    }

    public function index() {
        $this->load->view('v_login');
    }

    public function act_login() {

        if($this->m_login->can_login()) {
            redirect(base_url().'admin');
        } else {
            redirect(base_url());
        }
    }
}