<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Taxa_model extends CI_Model
{
    public function buscaPorId($id)
    {
        $this->db->select('*');
        $this->db->from('tab_estabelecimento_parametro');
        $this->db->join('tab_estabelecimento', 'tab_estabelecimento_parametro.estabelecimento_id=tab_estabelecimento.id', 'inner');
        $this->db->where('tab_estabelecimento_parametro.estabelecimento_id', $id);

        $dados = $this->db->get()->row_array();

        return $dados;
    }

    public function buscaPorIdTaxa($id)
    {
        $dados = $this->db->get_where("tab_estabelecimento_parametro", array(
            "id" => $id
        ))->row_array();

        return $dados;
    }

    public function buscaPorIdEstabelecimento($id)
    {

        $this->db->select('*, tab_estabelecimento_parametro.id as estabelecimento_parametro_id');
        $this->db->from('tab_estabelecimento_parametro');
        $this->db->join('tab_estabelecimento', 'tab_estabelecimento_parametro.estabelecimento_id=tab_estabelecimento.id', 'inner');
        $this->db->where('tab_estabelecimento_parametro.estabelecimento_id', $id);

        $dados = $this->db->get()->result();

        return $dados;
    }

    public function atualizarPorIdEstabelecimento()
    {
        $bandeira = $this->input->post('bandeira');
        $idestabelecimento = $this->input->post('estabelecimento_id');

        if($bandeira == 'VISA' || $bandeira == 'MASTERCARD') {
            $this->db->where_in('bandeira', ['VISA', 'MASTERCARD']);
        } elseif($bandeira == 'ELO' || $bandeira == 'HIPERCARD') {
            $this->db->where_in('bandeira', ['ELO', 'HIPERCARD']);
        }
        $this->db->where('estabelecimento_id', $idestabelecimento);

        $dados['taxa_credito26masterpay'] = $this->input->post('taxa_credito26masterpay');
//        $dados['taxa_credito26stone'] = $this->input->post('taxa_credito26stone');
        $dados['taxa_credito712masterpay'] = $this->input->post('taxa_credito712masterpay');
//        $dados['taxa_credito712stone'] = $this->input->post('taxa_credito712stone');
        $dados['taxa_credito_avista_masterpay'] = $this->input->post('taxa_credito_avista_masterpay');
//        $dados['taxa_credito_avista_stone'] = $this->input->post('taxa_credito_avista_stone');
        $dados['taxa_debito_masterpay'] = $this->input->post('taxa_debito_masterpay');
//        $dados['taxa_debito_stone'] = $this->input->post('taxa_debito_stone');

        if ($this->db->update('tab_estabelecimento_parametro', $dados)) {
            $this->session->set_flashdata('alerta', 'Taxas atualizadas com sucesso!');
            redirect('estabelecimento/listar');
        } else {
            $this->session->set_flashdata('alerta', 'Ocorreu um erro ao tentar atualizar taxas!');
            redirect('estabelecimento/listar');
        }
    }

    public function atualizarPorIdCopy($id)
    {
        $this->db->where('id', $id);

        $dados['taxa_credito26masterpay'] = $this->input->post('taxa_credito26masterpay');
        $dados['taxa_credito26stone'] = $this->input->post('taxa_credito26stone');
        $dados['taxa_credito712masterpay'] = $this->input->post('taxa_credito712masterpay');
        $dados['taxa_credito712stone'] = $this->input->post('taxa_credito712stone');
        $dados['taxa_credito_avista_masterpay'] = $this->input->post('taxa_credito_avista_masterpay');
        $dados['taxa_credito_avista_stone'] = $this->input->post('taxa_credito_avista_stone');
        $dados['taxa_debito_masterpay'] = $this->input->post('taxa_debito_masterpay');
        $dados['taxa_debito_stone'] = $this->input->post('taxa_debito_stone');

//        $this->db->where('tab_banco.estabelecimento_id',$id);

        if ($this->db->update('tab_estabelecimento_parametro', $dados)) {
            $this->session->set_flashdata('alerta', 'Taxas atualizadas com sucesso!');
            redirect('estabelecimento/listar');
        } else {
            $this->session->set_flashdata('alerta', 'Ocorreu um erro ao tentar atualizar taxas!');
            redirect('estabelecimento/listar');
        }
    }
}
