<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario extends CI_Controller {

    public function __construct() {
        parent::__construct();
        
        $this->load->model('log_model');
    }

    public function index() {
//        $this->output->enable_profiler(TRUE);
        $this->session_verifier();

        $this->load->model('usuario_model', 'usuarios');
        $usuarios = $this->usuarios->buscarUsuarios();

        $dados = array('usuarios' => $usuarios);
        // registro de log
        $usuario = $this->session->userdata('usuario_logado');
        
        $this->log_model->registrar_acao($usuario,
										'USUARIO/CONSULTAR',
										'SELECT',
									$usuario['estabelecimento_id']);

        $this->load->view('includes/header');
        $this->load->view('includes/side_menu');
        $this->load->view('includes/top_menu');

        $this->load->view('admin/usuarios', $dados);

        $this->load->view('includes/footer');
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
        $this->email->subject('Sua conta Maxpay foi criada');

        $dados = array(
            "senhatemp" => $senhatemp,
            "nome" => $nome
        );

        $this->email->message($this->load->view('email_novocadastro', $dados, TRUE));

        if(!$this->email->send()) {
//            $this->session->set_flashdata('error',$this->email->print_debugger());
            $this->session->set_flashdata('alerta','Erro ao enviar email com senha temporária!');
            redirect('usuario');
        }
    }

    public function novo()
    {
        $this->session_verifier();

        if($this->input->post()) {
            $this->load->model('usuario_model', 'usuario');

            if($this->usuario->buscaPorEmail($this->input->post("email"))){
                $this->session->set_flashdata('alerta', 'Já existe usuário cadastrado com este email!');
                redirect('usuario/novo');
            } else {
                $senhatemp = $this->gerar_senha_temp();
                if($this->usuario->cadastrarUsuario($senhatemp)) {
                    $this->enviar_email($this->input->post("nome"), $this->input->post("email"), $senhatemp);
                    $this->session->set_flashdata('sucesso', 'Usuário cadastrado com sucesso!');

                    redirect('usuario');
                } else {
                    $this->session->set_flashdata('alerta', 'Ocorreu um erro ao tentar cadastrar usário!');
                    redirect('usuario');
                }
            }
        } else {
            $this->load->model('estabelecimentos_model', 'estabelecimentos');
            $estabelecimentos = $this->estabelecimentos->buscarEstabelecimentos();

            $dados = array("estabelecimentos" => $estabelecimentos);

            $this->load->view('includes/header');
            $this->load->view('includes/side_menu');
            $this->load->view('includes/top_menu');

            $this->load->view('admin/usuarios_cadastro', $dados);

            $this->load->view('includes/footer');
        }
    }

    public function editar($id)
    {
        $this->session_verifier();
        $this->load->library('user_agent');

        if($this->input->post()) {
            $this->load->model('usuario_model', 'usuario');

            $usuario = $this->usuario->buscaPorEmail($this->input->post("email"));

            if($id != $usuario["id"] && $this->input->post("email") == $usuario["email"]){
                $this->session->set_flashdata('alerta', 'Já existe usuário cadastrado com este email!');
                redirect($this->agent->referrer());
            } else {
                $this->usuario->editarUsuarioPorId($id);
               
                $user = $this->session->userdata('usuario_logado');
                $this->log_model->registrar_acao($user,
										'USUARIO/CONSULTAR/EDITAR',
										'UPDATE',
                                        $usuario['estabelecimento_id']);
            }
        } else {
            $this->load->model('usuario_model', 'usuario');
            $usuario = $this->usuario->buscarUsuarioPorId($id);

            $this->load->model('estabelecimentos_model', 'estabelecimentos');
            $estabelecimentos = $this->estabelecimentos->buscarEstabelecimentos();

            $dados = array(
                "usuario" => $usuario,
                "estabelecimentos" => $estabelecimentos
            );

            $this->load->view('includes/header');
            $this->load->view('includes/side_menu');
            $this->load->view('includes/top_menu');

            $this->load->view('admin/usuarios_editar', $dados);

            $this->load->view('includes/footer');
        }
    }

    public function session_verifier() {
        if($this->session->userdata('usuario_logado')==false) {
            redirect('login');
        }
    }
}