<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Observacao_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('log_model');
    }

    public function buscaPorId($id)
    {
        // registro de log
        $usuario_logado = $this->session->userdata('usuario_logado');
        $this->log_model->registrar_acao($usuario_logado,
            'ESTABELECIMENTO/CONSULTAR/DETALHAR/ABA OBSERVAÇÃO',
            'SELECT',
            $id);

        return $this->db->get_where("tab_observacao", array(
            "estabelecimento_id" => $id
        ))->row_array();
    }

    public function atualizarPorId($id)
    {
        $this->db->where('id', $id);
        $dados['observacao'] = $this->input->post('observacao');

        if ($this->db->update('tab_observacao', $dados)) {
            $usuario = $this->session->userdata('usuario_logado');
            $this->log_model->registrar_acao($usuario,
                'ESTABELECIMENTO/CONSULTAR/DETALHAR/EDITAR OBSERVAÇÃO',
                'UPDATE',
                $this->input->post("id_estabelecimento"));
            return $this->session->set_flashdata('alerta', 'Campo observação atualizado com sucesso!');
//            redirect('estabelecimento/listar');
            return true;
        } else {
            $this->session->set_flashdata('alerta', 'Ocorreu um erro ao tentar atualizar campo observação!');
//            redirect('estabelecimento/listar');
            return false;
        }
    }

    public function cadastrarObservacao()
    {
        $dados['observacao'] = $this->input->post("observacao");
        $dados['estabelecimento_id'] = $this->input->post("id_estabelecimento");

        if ($this->db->insert('tab_observacao',$dados)) {
            $usuario = $this->session->userdata('usuario_logado');
            $this->log_model->registrar_acao($usuario,
                'ESTABELECIMENTO/CONSULTAR/DETALHAR/CRIAR OBSERVAÇÃO',
                'INSERT',
                $this->input->post("id_estabelecimento"));
            $this->session->set_flashdata('sucesso', 'Campo observação cadastrado com sucesso!');
//            redirect('estabelecimento/listar');
            return true;
        } else {
            $this->session->set_flashdata('alerta', 'Ocorreu um erro ao tentar adicionar campo observação!');
            return false;
        }
    }
}
