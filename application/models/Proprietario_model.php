<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Proprietario_model extends CI_Model
{
    public function buscaPorId($id)
    {
        return $this->db->get_where("tab_proprietario", array(
            "id" => $id
        ))->row_array();
    }

    public function atualizarPorId($id)
    {
        $this->db->where('id', $id);
        $dados['name'] = $this->input->post('nome');
        $dados['email'] = $this->input->post('email');
        $dados['messenger_phone'] = $this->input->post('contato');
        $dados['phone'] = $this->input->post('whatsapp');

        if ($this->db->update('tab_proprietario', $dados)) {
            return $this->session->set_flashdata('alerta', 'Proprietário atualizado com sucesso!');
            redirect('estabelecimento/listar');
        } else {
            $this->session->set_flashdata('alerta', 'Ocorreu um erro ao tentar atualizar proprietário!');
            redirect('estabelecimento/listar');
        }
    }
}
