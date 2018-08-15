<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Demonstrativo extends CI_Controller {

	public function __construct() {
        parent::__construct();
        
        $this->load->model('log_model');
    }

	
	public function index()
	{
		$this->session_verifier();

		$this->load->model('transacao_model');

		$data['demostrativo_transacoes'] 			= $this->transacao_model->demostrativo_transacoes();
		$data['lucro_antecipacao_socios'] 			= $this->transacao_model->lucro_antecipacao_socios();

		$usuario = $this->session->userdata('usuario_logado');

		$this->log_model->registrar_acao($usuario,
										'ADMINISTRATIVO/DEMONSTRATIVO ANTECIPAÇÃO',
										'SELECT',
									$usuario['estabelecimento_id']);

		$this->load->view('includes/header');
		$this->load->view('includes/side_menu');
		$this->load->view('includes/top_menu');
		$this->load->view('admin/demonstrativo', $data);
		$this->load->view('includes/footer');
	}

	public function session_verifier() {
		if($this->session->userdata('usuario_logado')==false) {
			redirect('login');
		}
	}
}
