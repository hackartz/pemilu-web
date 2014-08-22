<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {
    public function __construct() {
        parent::__construct();
        if ($this->session->userdata('is_login') != true){
            redirect(base_url());
        }
    }

    public function index() {
        $this->load->view('v_admin');
    }

    public function logout(){
        $this->session->sess_destroy();
        redirect(base_url());
    }

    //    ------------ pemilih ---------------
    public function list_pemilih() {
        $this->db->select('*');
        $this->db->from('pemilih');
        $q = $this->db->get();
        if(!empty($q)) {
            if($q->num_rows() > 0) {
                //var_dump($q);
                $data['pemilih'] = $q;
            }
        }
        $this->load->view('v_list_pemilih',$data);
    }

    public function tambah_pemilih() {
        $u_number = 0;
        $u_number = mt_rand(100000, 999999);
        $data['no_pemilih'] = $u_number;
        $this->load->view('v_tambah_pemilih',$data);
    }

    public function save_pemilih() {
        $nopil = $this->input->post('nopil');
        $data = array(
            'no_pemilih' => $nopil,
            'sudah_pilih' => 0
        );
        if($this->db->insert('pemilih',$data)) {
            redirect(base_url().'admin/list_pemilih');
        }
    }

    public function edit_pemilih() {
        $this->load->view('v_edit_pemilih');
    }

    public function hapus_pemilih($nopil) {
        $this->db->where('no_pemilih',$nopil);
        if($this->db->delete('pemilih')) {
            redirect(base_url().'admin/list_pemilih');
        }
    }

    //    ------------ partai ---------------
    public function list_partai() {
        $this->db->select('*');
        $this->db->from('partai');
        $q = $this->db->get();
        if(!empty($q)) {
            if($q->num_rows() > 0) {
                //var_dump($q);
                $data['partai'] = $q;
            }
        }
        $this->load->view('v_list_partai',$data);
    }

    public function tambah_partai() {
        $this->load->view('v_tambah_partai');
    }

    public function edit_partai() {
        $this->load->view('v_edit_partai');
    }

    public function save_partai() {
        $data_foto = $this->upload_image(realpath(APPPATH . '../img/partai'),'logo');
        $nampar = $this->input->post('nampar');
        $data = array(
            'nama_partai' => $nampar,
            'img' => 'http://testingkpu.com/img/partai/'.$data_foto['file_name']
        );
        if($this->db->insert('partai',$data)) {
            redirect(base_url().'admin/list_partai');
        }

    }

    public function tes() {
        //echo realpath(APPPATH . '../img/partai');
        $url = "http://testingkpu.com/img/partai/img2.png";
        $pieces = explode("/", $url);
        echo $pieces[5];
    }

    public function upload_image($upload_path,$name) {
        $konfigurasi = array(
            'allowed_types' =>'jpg|jpeg|png',
            'upload_path' => $upload_path,
            'overwrite' => false,
            'remove_spaces' => true,
            'encrypt_name' => true
        );

        $this->load->library('upload', $konfigurasi);
        $this->upload->do_upload($name);
        $datafile = $this->upload->data();

        return $datafile;
    }

    private function delete_image_file($path,$image) {
        if(file_exists($path."/".$image)) {
            unlink($path."/".$image);
        }
    }

    public function hapus_partai($id) {
        $this->db->where('id',$id);
        $query = $this->db->get('partai');
        if ($query->num_rows() == 1) {
            $row = $query->row();
        }
        $img = $row->img;
        $pieces = explode("/", $img);
        //echo $pieces[5];
        $this->delete_image_file(realpath(APPPATH . '../img/partai'),$pieces[5]);
        $this->db->where('id',$id);
        if($this->db->delete('partai')) {
            redirect(base_url().'admin/list_partai');
        }
    }

    //    ------------ anggota ---------------
    public function list_anggota() {
        $this->db->select('anggota.id as id,foto,nama_anggota,nama_partai,suara');
        $this->db->from('anggota');
        $this->db->join('partai','anggota.id_partai=partai.id','left');
        $q = $this->db->get();
        if(!empty($q)) {
            if($q->num_rows() > 0) {
                //var_dump($q);
                $data['anggota'] = $q;
            }
        }
        $this->load->view('v_list_anggota',$data);
    }

    public function tambah_anggota() {
        $this->db->select('id,nama_partai');
        $this->db->from('partai');
        $q = $this->db->get();
        if(!empty($q)) {
            if($q->num_rows() > 0) {
                //var_dump($q);
                $data['partai'] = $q;
            }
        }
        $this->load->view('v_tambah_anggota',$data);
    }

    public function edit_anggota() {
        $this->load->view('v_edit_anggota');
    }

    public function save_anggota() {
        $data_foto = $this->upload_image(realpath(APPPATH . '../img/foto'),'foto');
        $namang = $this->input->post('namang');
        $partai = $this->input->post('partai');
        if(empty($data_foto['file_name'])) {
            $foto = "people-default.png";
        } else {
            $foto = $data_foto['file_name'];
        }
        $data = array(
            'nama_anggota' => $namang,
            'foto' => 'http://testingkpu.com/img/foto/'.$foto,
            'id_partai' => $partai
        );
        if($this->db->insert('anggota',$data)) {
            redirect(base_url().'admin/list_anggota');
        }
    }

    public function hapus_anggota($id) {
        $this->db->where('id',$id);
        $query = $this->db->get('anggota');
        if ($query->num_rows() == 1) {
            $row = $query->row();
        }
        $img = $row->foto;
        $pieces = explode("/", $img);
        //echo $pieces[5];
        if ($pieces[5] != 'people-default.png') {
            $this->delete_image_file(realpath(APPPATH . '../img/foto'),$pieces[5]);
        }
        $this->db->where('id',$id);
        if($this->db->delete('anggota')) {
            redirect(base_url().'admin/list_anggota');
        }
    }

}