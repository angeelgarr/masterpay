<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Estabelecimentos_model extends CI_Model
{
    public function buscaPorId($id) {
        return $this->db->get_where("tab_estabelecimento", array(
            "id" => $id
        ))->row_array();
    }

    public function buscaPorIdProprietario($id) {
        return $this->db->get_where("tab_estabelecimento", array(
            "owner_id" => $id
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
        $dados['faturamento'] = $this->input->post('faturamento');

        if ($this->db->update('tab_estabelecimento', $dados)) {
            $this->session->set_flashdata('alerta', 'Estabelecimento atualizado com sucesso!');
            redirect('estabelecimento/listar');
        } else {
            $this->session->set_flashdata('alerta', 'Ocorreu um erro ao tentar atualizar estabelecimento!');
            redirect('estabelecimento/listar');
        }
    }


    public function atualizarVendedor($id)
    {
        $this->db->where('id',$id);
        $dados['vendedor_id'] = $this->input->post('vendedor');

        if ($this->db->update('tab_estabelecimento', $dados)) {
            $this->session->set_flashdata('alerta', 'Vendedor atualizado com sucesso!');
            redirect('estabelecimento/listar');
        } else {
            $this->session->set_flashdata('alerta', 'Ocorreu um erro ao tentar atualizar vendedor!');
            redirect('estabelecimento/listar');
        }
    }

    
    public function atualizarAntecipacao($idestabelecimento,$taxa) {
        $temAntecipacao = $this->db->get_where("tab_parametros_antecipacao", array(
            "estabelecimento_id" => $idestabelecimento
        ))->row_array();

        $dados = $this->calcularTaxasAntecipacao($idestabelecimento,$taxa);

        if($temAntecipacao) {
            $this->db->where('estabelecimento_id',$idestabelecimento);
            $this->db->update('tab_parametros_antecipacao',$dados);
        } else {
            $this->db->insert('tab_parametros_antecipacao',$dados);
        }
    }

    private function calcularTaxasAntecipacao($idestabelecimento,$taxa){
        
        $rate = $taxa/100;
		
        $dados['taxa_credito_avista'] = round(100 * (97-(round(97 / $rate * (1-pow(1+$rate,-1)),2)))/97,2);;
        $dados['taxa2parcelas'] = round(100 * (97-(round(48.50 / $rate * (1-pow(1+$rate,-2)),2)))/97,2);
        $dados['taxa3parcelas'] = round(100 * (97-(round(32.333 / $rate * (1-pow(1+$rate,-3)),2)))/97,2);
        $dados['taxa4parcelas'] = round(100 * (97-(round(24.25 / $rate * (1-pow(1+$rate,-4)),2)))/97,2);
        $dados['taxa5parcelas'] = round(100 * (97-(round(19.40 / $rate * (1-pow(1+$rate,-5)),2)))/97,2);
        $dados['taxa6parcelas'] = round(100 * (97-(round(16.166 / $rate * (1-pow(1+$rate,-6)),2)))/97,2);
        $dados['taxa7parcelas'] = round(100 * (97-(round(13.857 / $rate * (1-pow(1+$rate,-7)),2)))/97,2);
        $dados['taxa8parcelas'] = round(100 * (97-(round(12.125 / $rate * (1-pow(1+$rate,-8)),2)))/97,2);
        $dados['taxa9parcelas'] = round(100 * (97-(round(10.77 / $rate * (1-pow(1+$rate,-9)),2)))/97,2);
        $dados['taxa10parcelas'] = round(100 * (97-(round(9.7 / $rate * (1-pow(1+$rate,-10)),2)))/97,2);
        $dados['taxa11parcelas'] = round(100 * (97-(round(8.818 / $rate * (1-pow(1+$rate,-11)),2)))/97,2);
        $dados['taxa12parcelas'] = round(100 * (97-(round(8.083 / $rate * (1-pow(1+$rate,-12)),2)))/97,2);
        $dados['estabelecimento_id'] = $idestabelecimento;

        return $dados;

    }
}
