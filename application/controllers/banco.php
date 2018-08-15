<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Banco extends CI_Controller {

    public function __construct() {
        parent::__construct();
        
        $this->load->model('log_model');
    }

    public function incluir() {

		$this->session_verifier();
		$banco 					= explode("-", $this->input->post('banco'));
        $dados['codigo'] 		= $banco[0];
        $dados['descricao'] 	= $banco[1];
        $dados['agencia'] 		= $this->input->post('agencia');
        $dados['conta'] 		= $this->input->post('conta');
		$dados['data_inclusao'] = date('Y-m-d H:i:s');
		$dados['tipo_conta']	= $this->input->post('tipo');
        $dados['estabelecimento_id'] = $this->input->post('estabelecimento');

		if($this->db->insert('tab_banco',$dados)){
            $this->session->set_flashdata('alerta','Banco cadastrado com sucesso!');
			redirect('menu/bancos');
		} else {
			$this->session->set_flashdata('alerta','Ocorreu um erro ao tentar cadastrar esse banco!');
			redirect('menu/bancos');
		}
	}

    public function view() {
//        $this->output->enable_profiler(TRUE);
        $this->session_verifier();
        $id = $this->input->get("id");
        $this->load->model("banco_model", "banco");
        $banco = $this->banco->buscaPorId($id);

        $usuario = $this->session->userdata('usuario_logado');

        $dados = array(
            "banco" => $banco,
            "id_estabelecimento" => $id
        );

        $this->log_model->registrar_acao($usuario,
										'ESTABELECIMENTO/CONSULTAR/DETALHAR/ABA BANCO',
										'SELECT',
                                    $id);
                                    
        $this->load->view('admin/estabelecimento_banco', $dados);
    }

    public function edit() {
        $this->session_verifier();
        $id = $this->input->get("id");

        $usuario = $this->session->userdata('usuario_logado');
        $this->log_model->registrar_acao($usuario,
										'ESTABELECIMENTO/CONSULTAR/DETALHAR/EDITAR BANCO',
										'INSERT/UPDATE',
									$id);

        $this->load->model("banco_model", "banco");
        $this->banco->atualizarPorId($id);
    }

	public function session_verifier() {
		if($this->session->userdata('usuario_logado')==false) {
			redirect('login');
		}
	}
}
