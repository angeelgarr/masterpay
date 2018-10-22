<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Observacao extends CI_Controller {
    public function view() {
        $this->session_verifier();
        $id_estabelecimento = $this->input->get("id");
        $this->load->model('observacao_model', 'observacao');
        $observacao = $this->observacao->buscaPorId($id_estabelecimento);

        $dados = array(
            "observacao" => $observacao,
            "estabelecimento_id" => $id_estabelecimento
        );

        $this->load->view('admin/estabelecimento_observacao', $dados);
    }

    public function edit() {
        $this->output->enable_profiler(TRUE);
        $this->session_verifier();
        $id = $this->input->get("id");

        $this->load->model("observacao_model", "observacao");

        if($id){
            $this->observacao->atualizarPorId($id);
        } else {
            $this->observacao->cadastrarObservacao();
        }
    }

	public function session_verifier() {
		if($this->session->userdata('usuario_logado')==false) {
			redirect('login');
		}
	}
}
