<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Banco_model extends CI_Model
{
    public function buscaPorId($id)
    {
        $this->db->select('*');
        $this->db->from('tab_banco');
        $this->db->join('tab_estabelecimento', 'tab_banco.estabelecimento_id=tab_estabelecimento.id', 'inner');
        $this->db->where('tab_banco.estabelecimento_id', $id);

        $banco = $this->db->get()->row_array();

        return $banco;
    }

    public function atualizarPorId($id)
    {
        $this->db->where('tab_banco.estabelecimento_id', $id);
        $banco = explode("-", $this->input->post('banco'));
        $dados['codigo'] = $banco[0];
        $dados['descricao'] = $banco[1];
        $dados['agencia'] = $this->input->post('agencia');
        $dados['conta'] = $this->input->post('conta');
        $dados['data_inclusao'] = date('Y-m-d H:i:s');
        $dados['tipo_conta'] = $this->input->post('tipo');
        $dados['idcartao'] = $this->input->post('idcartao');

        if($id) {
            if ($this->db->update('tab_banco', $dados)) {
                $this->session->set_flashdata('alerta', 'Banco atualizado com sucesso!');
                redirect('estabelecimento/listar');
            } else {
                $this->session->set_flashdata('alerta', 'Ocorreu um erro ao tentar atualizar banco!');
                redirect('estabelecimento/listar');
            }
        } else {
            $dados['estabelecimento_id'] = $this->input->post('id_estabelecimento');

            if($this->db->insert('tab_banco',$dados)){
                $this->session->set_flashdata('alerta','Banco cadastrado com sucesso!');
                redirect('estabelecimento/listar');
            } else {
                $this->session->set_flashdata('alerta','Ocorreu um erro ao tentar cadastrar o banco!');
                redirect('estabelecimento/listar');
            }
        }
    }
}
