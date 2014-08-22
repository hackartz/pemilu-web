<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_login extends CI_Model {

    public function can_login(){
        $username = $this->input->post('username',true);
        $password = $this->input->post('pass',true);

        $this->db->where('username',$username);
        $this->db->where('password',md5($password));
        $query = $this->db->get('admin');

        if ($query->num_rows() == 1) {
            $row = $query->row();
            $data = array(
                'username' => $row->username,
                'is_login' => true

            );
            $this->session->set_userdata($data);
            return true;
        } else {
            return false;
        }
    }
}