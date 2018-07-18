<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Proprietario extends CI_Controller {
    public function view() {
//        $this->output->enable_profiler(TRUE);
        $this->session_verifier();
        $id = $this->input->get("id");
        $this->load->model("proprietario_model", "proprietario");
        $proprietario = $this->proprietario->buscaPorId($id);

        $dados = array("proprietario" => $proprietario);

        $this->load->view('admin/estabelecimento_proprietario', $dados);
    }

    public function edit() {
        $this->session_verifier();
        $id = $this->input->get("id");

        $this->load->model("proprietario_model", "proprietario");
        $this->proprietario->atualizarPorId($id);
    }

	public function session_verifier() {
		if($this->session->userdata('usuario_logado')==false) {
			redirect('login');
		}
	}
}
