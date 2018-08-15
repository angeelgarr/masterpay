<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Equipamento_model extends CI_Model
{
    public function __construct() {
        parent::__construct();
        
        $this->load->model('log_model');
    }

    public function buscaPorId($id)
    {
        $this->db->select('*');
        $this->db->from('tab_controle_aluguel_equipamento');
        $this->db->join('tab_estabelecimento', 'tab_controle_aluguel_equipamento.estabelecimento_id=tab_estabelecimento.id', 'inner');
        $this->db->where('tab_controle_aluguel_equipamento.estabelecimento_id', $id);

        $dados = $this->db->get()->row_array();

        return $dados;
    }

    public function buscaPorIdEquipamento($id)
    {
        return $this->db->get_where("tab_controle_aluguel_equipamento", array(
            "id" => $id
        ))->row_array();
    }

    public function buscaPorIdEstabelecimento($id)
    {

        $this->db->select('*, tab_controle_aluguel_equipamento.id as controle_aluguel_equipamento_id');
        $this->db->from('tab_controle_aluguel_equipamento');
        $this->db->join('tab_estabelecimento', 'tab_controle_aluguel_equipamento.estabelecimento_id=tab_estabelecimento.id', 'inner');
        $this->db->where('tab_controle_aluguel_equipamento.estabelecimento_id', $id);

        $dados = $this->db->get()->result();

        return $dados;
    }

    public function atualizarPorId($id)
    {
        $this->db->where('id', $id);

        $dados['data_inicio_cobranca'] = $this->input->post('data_inicio_cobranca');
        $dados['quantidade'] = $this->input->post('quantidade');
        $dados['valor'] = $this->input->post('valor');

        if ($this->db->update('tab_controle_aluguel_equipamento', $dados)) {
            $this->session->set_flashdata('alerta', 'Equipamento cadastrado com sucesso!');
            redirect('estabelecimento/listar');
        } else {
            $this->session->set_flashdata('alerta', 'Ocorreu um erro ao tentar atualizar os dados!');
            redirect('estabelecimento/listar');
        }
    }

    public function inserir()
    {
        $dados['data_inicio_cobranca'] = $this->input->post('data_inicio_cobranca');
        $dados['equipamento'] = $this->input->post('equipamento');
        $dados['quantidade'] = $this->input->post('quantidade');
        $dados['valor'] = $this->input->post('valor');
        $dados['estabelecimento_id'] = $this->input->post('id_estabelecimento');

        if($this->db->insert('tab_controle_aluguel_equipamento',$dados)){

            $user = $this->session->userdata('usuario_logado');
                    $this->log_model->registrar_acao($user,
                                            'ESTABELECIMENTO/CONSULTAR/DETALHAR/ABA EQUIPAMENTO/SALVAR EQUIPAMENTO',
                                            'INSERT',
                                            $dados['estabelecimento_id']);

            $this->session->set_flashdata('alerta','Equipamento cadastrado com sucesso!');
            redirect('estabelecimento/listar');
        } else {
            $this->session->set_flashdata('alerta','Ocorreu um erro ao tentar cadastrar esse equipamento!');
            redirect('estabelecimento/listar');
        }
    }
}
