<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario_model extends CI_Model {

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
}
