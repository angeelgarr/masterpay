<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Observacao extends CI_Controller {
    public function view() {
        $this->session_verifier();
        $id_estabelecimento = $this->input->get("id");
        $this->load->model('observacao_model', 'observacao');
        $observacoes = $this->observacao->buscaPorId($id_estabelecimento);

        $dados = array(
            "observacoes" => $observacoes,
            "estabelecimento_id" => $id_estabelecimento
        );

        $this->load->view('admin/estabelecimento_observacao', $dados);
    }

    public function add() {
        $this->session_verifier();
        $this->load->model("observacao_model", "observacao");
        $this->observacao->cadastrarObservacao();
    }

	public function session_verifier() {
		if($this->session->userdata('usuario_logado')==false) {
			redirect('login');
		}
	}
}
