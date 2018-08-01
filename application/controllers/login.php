<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public function index() {
        if($this->session_verifier()) {
            redirect('dashboard');
        } else {
            $this->load->view('login');
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

    public function atualizar_senha() {
        $this->load->library('user_agent');

        $senha_nova = $this->input->post("senha-nova");
        $senha_nova_repete = $this->input->post("senha-nova-repete");

        $usuario = $this->session->userdata('usuario_logado');

        if($senha_nova == $senha_nova_repete) {
            $user['senha'] = md5($senha_nova);

            $this->db->where('id',$usuario['id']);
            $this->db->update('tab_usuario',$user);
            redirect($this->agent->referrer());
        } else {
            $this->session->set_flashdata('alerta', 'As senhas fornecedias não coincidem.');
            redirect($this->agent->referrer());
        }
    }

    public function alterar_senha() {
        $this->load->view('alterar_senha');
    }

    public function recuperar_senha() {
        $this->load->view('recuperar_senha');
    }

    private function gerar_senha_temp() {
        $senhatemp = '';
        $caracteres = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890!@#$%*-";
        $tamanho = strlen($caracteres);

        for ($n = 1; $n <= 10; $n++) {
            $rand = mt_rand(1, $tamanho);
            $senhatemp .= $caracteres[$rand-1];
        }
        return $senhatemp;
    }

    private function enviar_email($nome, $email, $senhatemp) {
        $this->load->library('email');

        // Configuração para o envio do email
        $config['smtp_host'] = 'ssl://smtp.gmail.com';
        $config['smtp_port'] = 465;
        $config['smtp_user'] = 'maxpay.noreply@gmail.com';
        $config['smtp_pass'] = 'y99z15@7*X';
        $config['protocol']  = 'smtp';
        $config['validate'] = TRUE;
        $config['wordwrap'] = TRUE;
        $config['mailtype']  = 'html';
        $config['charset']   = 'utf-8';
        $config['newline']   = "\r\n";

        // Library Email, com os parâmetros de configuração
        $this->email->initialize($config);

        $this->email->from('maxpay.noreply@gmail.com', 'Maxpay'); // Remetente
        $this->email->to($email, $nome); // Destinatário

        // Assunto do email
        $this->email->subject('Email de recuperação de senha');

        $dados = array(
            "senhatemp" => $senhatemp,
            "nome" => $nome
        );

        $this->email->message($this->load->view('email', $dados, TRUE));

        if($this->email->send())
        {
            $this->session->set_flashdata('sucesso','Email enviado com sucesso!');
            redirect('login');
        }
        else
        {
//            $this->session->set_flashdata('error',$this->email->print_debugger());
            $this->session->set_flashdata('alerta','Erro ao enviar email com senha temporária!');
            redirect('login');
        }
    }

    public function nova_senha()
    {
        $email = $this->input->post("email");
        $this->load->model("usuario_model", "usuario");
        $usuario = $this->usuario->buscaPorEmail($email);
        $nome = $usuario["nome"];

        if($usuario) {
            $senhatemp = $this->gerar_senha_temp();
            $this->usuario->atualizarPorEmail($email, $senhatemp);
            $this->enviar_email($nome, $email, $senhatemp);
        } else {
            $this->session->set_flashdata('alerta','Não existe usuário cadastrado com o email informado!');
            redirect('login');
        }
    }

    public function logout() {
        $this->session->unset_userdata('usuario_logado');
        $this->session->sess_destroy();
        redirect('login');
    }

    public function session_verifier() {
        if($this->session->userdata('usuario_logado')==false) {
            return false;
        } else {
            return true;
        }
    }
}
