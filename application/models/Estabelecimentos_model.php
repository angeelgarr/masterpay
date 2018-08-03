<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Estabelecimentos_model extends CI_Model
{
    public function buscaPorId($id) {
        return $this->db->get_where("tab_estabelecimento", array(
            "id" => $id
        ))->row_array();
    }

    public function buscarEstabelecimentos()
    {
        $this->db->select('id, comercial_name, company_name');
        $this->db->from('tab_estabelecimento');

        $dados = $this->db->get()->result();

        return $dados;
    }


    public function atualizarPorId($id)
    {
        $this->db->where('id',$id);
        $dados['comercial_name'] = $this->input->post('comercial_name');
        $dados['company_name'] = $this->input->post('company_name');
        $dados['address_complement'] = $this->input->post('address_complement');
        $dados['address_number'] = $this->input->post('address_number');
        $dados['enterprise_email'] = $this->input->post('enterprise_email');
        $dados['enterprise_messenger_phone'] = $this->input->post('enterprise_messenger_phone');
        $dados['enterprise_phone'] = $this->input->post('enterprise_phone');
        $dados['merchant'] = $this->input->post('merchant');
        $dados['merchant_category_code'] = $this->input->post('merchant_category_code');
        $dados['merchant_number'] = $this->input->post('merchant_number');
        $dados['national_id'] = $this->input->post('national_id');
        $dados['national_type'] = $this->input->post('national_type');
        $dados['postal_code'] = $this->input->post('postal_code');
        $dados['sincronizado'] = $this->input->post('sincronizado') == "true" ? true : false;
        $dados['status'] = $this->input->post('status') == "true" ? true : false;
        $dados['street'] = $this->input->post('street');
        $dados['idm'] = $this->input->post('idm');
        $dados['antecipa'] = $this->input->post('antecipa') == "true" ? true : false;
        $dados['taxa_antecipacao'] = $this->input->post('taxa_antecipacao');

        if ($this->db->update('tab_estabelecimento', $dados)) {
            $this->session->set_flashdata('alerta', 'Estabelecimento atualizado com sucesso!');
            redirect('estabelecimento/listar');
        } else {
            $this->session->set_flashdata('alerta', 'Ocorreu um erro ao tentar atualizar estabelecimento!');
            redirect('estabelecimento/listar');
        }
    }

}
