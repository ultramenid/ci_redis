<?php
ob_start();
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	public function index() {
	require_once APPPATH . 'libraries/codeigniter-predis/src/Redis.php';
        // Using the default_server configuration
	echo base_url();
        $this->redis = new \CI_Predis\Redis();
         $data = [
            'title'=> 'Enter your name'
        ];
        
        $this->form_validation->set_rules('nama','Nama','required');
        if($this->form_validation->run()==false){
            $this->load->view('dashboard');
        }else{
	$this->load->helper('url');
            $this->redis->set('nama', $this->input->post('nama'));
            redirect('result');
        }

	}
}
