<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Terminal extends CI_Controller {

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
        $data['terminal'] =  $this->db->get('tab_terminal')->result();
		
		$this->db->select('*');
		$this->db->where('status',false);
		$data['equipamentos'] = $this->db->get('tab_equipamento')->result();

		$this->db->select('comercial_name,merchant');
		$data['estabelecimento'] =  $this->db->get('tab_estabelecimento')->result();

		$this->load->view('includes/header');
		$this->load->view('includes/side_menu');
		$this->load->view('includes/top_menu');
		
        $this->load->view('admin/terminal',$data);
        
        $this->load->view('includes/footer');
    }
    
    public function incluir() {

		$this->session_verifier();
		
        $terminal['merchant'] = $this->input->post('merchant');
		$terminal['serial_number'] = $this->input->post('equipamento');
		$terminal['comunication_profile'] = $this->input->post('profile');
		$terminal['sincronizado'] = false;
		$terminal['status'] = false;
		
        if($this->db->insert('tab_terminal',$terminal)){
            $this->session->set_flashdata('alerta','Terminal cadastrado com sucesso!');
            
            $this->db->select('*');
            $data['terminal'] =  $this->db->get('tab_terminal')->result();

			redirect('terminal',$data);
		} else {
			$this->session->set_flashdata('alerta','Ocorreu um erro ao tentar cadastrar esse terminal!');
			redirect('terminal');
		}
	}

	public function session_verifier() {
		if($this->session->userdata('usuario_logado')==false) {
			redirect('login');
		}
	}

	public function nextLogicoNumber($merchant) {
		
		return $maxId;

	}
}
