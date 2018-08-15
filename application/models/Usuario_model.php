<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario_model extends CI_Model {
    
    public function __construct() {
        parent::__construct();
        
        $this->load->model('log_model');
    }

    public function buscarUsuarios(){
        $this->db->select('tbu.*, tbu.id as usuario_id, tbe.id, tbe.comercial_name, tbe.company_name');
        $this->db->from('tab_usuario as tbu');
        $this->db->join('tab_estabelecimento as tbe', 'tbu.estabelecimento_id=tbe.id', 'inner');

        $dados = $this->db->get()->result();
        return $dados;
    }

    public function cadastrarUsuario($senhatemp)
    {
        $usuario['estabelecimento_id'] = $this->input->post("estabelecimento");
        $usuario['nome']               = $this->input->post("nome");
        $usuario['email']              = $this->input->post("email");
        $usuario['perfil']             = $this->input->post("perfil");
        $usuario['senha']              = md5($senhatemp);
        $usuario['senha_temporaria']   = 1;
        $usuario['status']             = $this->input->post("status") == "true" ? true : false;

        if ($this->db->insert('tab_usuario',$usuario)) {

            $user = $this->session->userdata('usuario_logado');
                    $this->log_model->registrar_acao($user,
                                            'USUARIO/CONSULTAR/NOVO',
                                            'INSERT',
                                            $usuario['estabelecimento_id']);
            return true;
        } else {
            return false;
        }
    }

    public function editarUsuarioPorId($id)
    {
        $this->db->where('tab_usuario.id', $id);
        $usuario['estabelecimento_id'] = $this->input->post("estabelecimento");
        $usuario['nome']               = $this->input->post("nome");
        $usuario['email']              = $this->input->post("email");
        $usuario['perfil']             = $this->input->post("perfil");
        $usuario['status']             = $this->input->post("status") == "true" ? true : false;

        if ($this->db->update('tab_usuario', $usuario)) {
            $user = $this->session->userdata('usuario_logado');
                    $this->log_model->registrar_acao($user,
                                            'USUARIO/CONSULTAR/EDITAR',
                                            'UPDATE',
                                            $usuario['estabelecimento_id']);
            $this->session->set_flashdata('sucesso', 'Usuário atualizado com sucesso!');
            redirect('usuario');
        } else {
            $this->session->set_flashdata('alerta', 'Ocorreu um erro ao tentar atualizar usuário!');
            redirect('usuario');
        }
    }

    public function buscarUsuarioPorId($id)
    {
        $this->db->where('tbu.id', $id);
        $this->db->select('tbu.*, tbu.id as usuario_id, tbe.id, tbe.comercial_name, tbe.company_name');
        $this->db->from('tab_usuario as tbu');
        $this->db->join('tab_estabelecimento as tbe', 'tbu.estabelecimento_id=tbe.id', 'inner');

        $dados = $this->db->get()->row_array();
        return $dados;
    }

    public function buscaPorEmailSenha($email, $senha){
        $this->db->where("email", $email);
        $this->db->where("senha", md5($senha));
        $usuario = $this->db->get("tab_usuario")->row_array();
        return $usuario;
    }

    public function buscaPorEmail($email){
        $this->db->where("email", $email);
        $usuario = $this->db->get("tab_usuario")->row_array();
        return $usuario;
    }

    public function atualizarPorEmail($email, $senhatemp){
        $this->db->where("email", $email);
        $dados['senha'] = md5($senhatemp);
        $dados['senha_temporaria'] = 1;

        if (!$this->db->update('tab_usuario', $dados)) {
            $this->session->set_flashdata('alerta', 'Ocorreu um erro ao tentar atualizar a senha!');
            redirect('login');
        }
    }

    public function atualizaUltimoAcesso($id) {
        $dados['ultimo_acesso'] = date('Y-m-d H:i:s');
        $this->db->where("id",$id);
        $this->db->update('tab_usuario',$dados);
    }
}
