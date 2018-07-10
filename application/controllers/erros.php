<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Erros extends CI_Controller {
    
    public function erro_404() { 
		$this->session_verifier();

		$this->output->set_status_header('404'); 
		$this->load->view('page_404');//loading in custom error view
	 } 
	 
	 public function erro_403() { 
		$this->session_verifier();

		$this->output->set_status_header('404'); 
		$this->load->view('page_403');//loading in custom error view
	 }
	 
	 public function erro_500() { 
		$this->session_verifier();

		$this->output->set_status_header('404'); 
		$this->load->view('page_500');//loading in custom error view
 	}

	public function session_verifier() {
		if($this->session->userdata('usuario_logado')==false) {
			redirect('login');
		}
	}
}
