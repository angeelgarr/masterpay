<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function index() {
		if($this->session_verifier()) {
			redirect('dashboard');
		}
	}

	public function autenticar() {
 
			$this->load->model("usuario_model");// chama o modelo usuarios_model
			$email = $this->input->post("email");// pega via post o email que venho do formulario
			$senha = $this->input->post("senha"); // pega via post a senha que venho do formulario
			$usuario = $this->usuario_model->buscaPorEmailSenha($email,$senha); // acessa a função buscaPorEmailSenha do modelo

			if($usuario) {
				$this->session->set_userdata("usuario_logado", $usuario);

				if($usuario['senha_temporaria'] == 1) {
					redirect('login/alterar_senha');
				} else { 	
					redirect('dashboard');
				}
			} else {
				$this->session->set_flashdata('alerta', 'Não foi possível fazer o Login! Verifique seu email e senha.');
				redirect('login');
			}
	}

	public function confirmar_senha() {
		
		$senha_nova = $this->input->post("senha-nova");
		$senha_nova_repete = $this->input->post("senha-nova-repete");
		
		$usuario = $this->session->userdata('usuario_logado');

		if($usuario) {
			if($senha_nova == $senha_nova_repete) {
				
				$user['senha'] = md5($senha_nova);
				$user['senha_temporaria'] = 0;
				
				$this->db->where('id',$usuario['id']);
				$this->db->update('tab_usuario',$user);
				redirect('dashboard');
			} else {
				$this->session->set_flashdata('alerta', 'As senhas fornecedias não coincidem.');
				redirect('login/alterar_senha');	
			}
		} else {
			$this->session->set_flashdata('alerta', 'As informações fornecidas estão incorretas.');
			redirect('login/alterar_senha');
		}
	}

	public function alterar_senha() {
		$this->session_verifier();
		$this->load->view('alterar_senha');
	}

	public function logout() {
		$this->session->unset_userdata('usuario_logado');
		$this->session->sess_destroy();
		redirect('login');
	}

	public function session_verifier() {
		if($this->session->userdata('usuario_logado')==false) {
			$this->load->view('login');
		}
	}
}
