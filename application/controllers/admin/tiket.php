<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class tiket extends CI_Controller {


    public function index()
    {
        $data['data']=$this->db->get_where('admin',['email'=>
		$this->session->userdata('email')])->row_array();
		//nama
    $this->load->model('admin/admin_model');
		$data['konten']='admin/tiket';
    $data['tiket'] = $this->admin_model->get_tiket();
		$this->load->view('template_admin',$data);
    }
}

/* End of file tiket.php */
