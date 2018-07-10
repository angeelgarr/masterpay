<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Equipamento extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
    
     
    public function index()
	{
		$this->session_verifier();
        
        $this->db->select('*');
        $data['equipamentos'] =  $this->db->get('tab_equipamento')->result();
        
		$this->load->view('includes/header');
		$this->load->view('includes/side_menu');
		$this->load->view('includes/top_menu');
		
        $this->load->view('admin/equipamento',$data);
        
        $this->load->view('includes/footer');
    }
    
    public function incluir() {

		$this->session_verifier();
		$modelo = explode("-", $this->input->post('modelo'));
        $equipamento['model'] = $modelo[0];
        $equipamento['model_manufacturer'] = $modelo[1];
        $equipamento['model_name'] = $modelo[2];
        $equipamento['model_type'] = 'POS';
        $equipamento['serial_number'] = $this->input->post('serie');
        $equipamento['status'] = false;
        
        if($this->db->insert('tab_equipamento',$equipamento)){
            $this->session->set_flashdata('alerta','Equipamento cadastrado com sucesso!');
            
            $this->db->select('*');
            $data['equipamentos'] =  $this->db->get('tab_equipamento')->result();

			redirect('equipamento',$data);
		} else {
			$this->session->set_flashdata('alerta','Ocorreu um erro ao tentar cadastrar esse equipamento!');
			redirect('equipamento');
		}
	}

	public function session_verifier() {
		if($this->session->userdata('usuario_logado')==false) {
			redirect('login');
		}
	}
}
