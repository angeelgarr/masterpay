<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Proprietario extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        
        $this->load->model('log_model');
    }

    public function view() {
//        $this->output->enable_profiler(TRUE);
        $this->session_verifier();
        $id = $this->input->get("id");
        $this->load->model("proprietario_model", "proprietario");
        $proprietario = $this->proprietario->buscaPorId($id);

        $this->load->model("usuario_model", "usuario");
        $usuario_cadastrado = $this->usuario->buscaPorEmail($proprietario["email"]);

        $this->load->model("estabelecimentos_model", "estabelecimento");
        $estabelecimento = $this->estabelecimento->buscaPorIdProprietario($id);

        $usuario = $this->session->userdata('usuario_logado');
        $this->log_model->registrar_acao($usuario,
            'ESTABELECIMENTO/CONSULTAR/DETALHAR/ABA PROPRIETARIO',
            'SELECT',
            $usuario['estabelecimento_id']);

        $dados = array(
            "proprietario" => $proprietario,
            "usuario_cadastrado" => $usuario_cadastrado,
            "estabelecimento" => $estabelecimento
        );

        $this->load->view('admin/estabelecimento_proprietario', $dados);
    }

    public function edit() {
        $this->session_verifier();
        $id = $this->input->get("id");
        
        $usuario = $this->session->userdata('usuario_logado');
        $this->log_model->registrar_acao($usuario,
										'ESTABELECIMENTO/CONSULTAR/DETALHAR/EDITAR PROPRIETARIO',
										'UPDATE',
                                    $id);
                                    
        $this->load->model("proprietario_model", "proprietario");
        $this->proprietario->atualizarPorId($id);
    }

	public function session_verifier() {
		if($this->session->userdata('usuario_logado')==false) {
			redirect('login');
		}
	}

    public function novo_usuario()
    {
        $this->output->enable_profiler(TRUE);
        $this->session_verifier();

        $this->load->model('usuario_model', 'usuario');

        var_dump($this->input->post());
        var_dump($this->input->get());
        echo "Nome: " + $this->input->post("nome");
        echo "Nome: " + $this->input->get("nome");

        $this->usuario->cadastrarUsuario("1");

//        if($this->usuario->buscaPorEmail($this->input->post("email"))){
//            $this->session->set_flashdata('alerta', 'Já existe usuário cadastrado com este email!');
//            redirect('usuario/novo');
//        } else {
//            $senhatemp = $this->gerar_senha_temp();
//            if ($this->usuario->cadastrarUsuario($senhatemp)) {
//                $this->enviar_email($this->input->post("nome"), $this->input->post("email"), $senhatemp);
//                $this->session->set_flashdata('sucesso', 'Usuário cadastrado com sucesso!');
//
//                redirect('usuario');
//            } else {
//                $this->session->set_flashdata('alerta', 'Ocorreu um erro ao tentar cadastrar usário!');
//                redirect('usuario');
//            }
//        }
    }
}
