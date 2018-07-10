<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Taxa extends CI_Controller {
    
    public function index() {
		$id = $this->input->post('estabelecimento');
		$this->db->select('*');
		$dados['estabelecimentos'] = $this->db->get('tab_estabelecimento')->result();
		
		$this->db->select('*');
		if($id == null) {
			$this->db->where('estabelecimento_id', 3);
			$id = 3;
		} else {
			$this->db->where('estabelecimento_id', $id);
		}
		$this->db->limit(4,0);
		$dados['taxas'] = $this->db->get('tab_estabelecimento_parametro')->result();
	
		$this->load->view('includes/header');
		$this->load->view('includes/side_menu');
		$this->load->view('includes/top_menu');
		
        $this->load->view('admin/editar_taxas',$dados);
        
        $this->load->view('includes/footer');
	}

	public function session_verifier() {
		if($this->session->userdata('usuario_logado')==false) {
			redirect('login');
		}
	}
}
