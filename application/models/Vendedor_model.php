<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Vendedor_model extends CI_Model {

    public function buscarVendedores(){
        $this->db->select('*');
        $this->db->from('tab_vendedor');

        $dados = $this->db->get()->result();
        return $dados;
    }

    public function cadastrarVendedor()
    {
        $vendedor['nome']               = $this->input->post("nome");
        $vendedor['email']              = $this->input->post("email");
        $vendedor['phone']             = $this->input->post("phone");
        $vendedor['status']             = $this->input->post("status") == "true" ? true : false;

        if ($this->db->insert('tab_vendedor',$vendedor)) {
            return true;
        } else {
            return false;
        }
    }

    public function editarVendedorPorId($id)
    {
        $this->db->where('id', $id);
        $vendedor['nome']               = $this->input->post("nome");
        $vendedor['email']              = $this->input->post("email");
        $vendedor['phone']             = $this->input->post("phone");
        $vendedor['status']             = $this->input->post("status") == "true" ? true : false;

        if ($this->db->update('tab_vendedor', $vendedor)) {
            $this->session->set_flashdata('sucesso', 'Vendedor atualizado com sucesso!');
            redirect('vendedor');
        } else {
            $this->session->set_flashdata('alerta', 'Ocorreu um erro ao tentar atualizar vendedor!');
            redirect('vendedor');
        }
    }

    public function buscarVendedorPorId($id)
    {
        $this->db->where('id', $id);
        $this->db->select('*');
        $this->db->from('tab_vendedor');

        $dados = $this->db->get()->row_array();
        return $dados;
    }

    public function buscaPorEmail($email){
        $this->db->where("email", $email);
        $vendedor = $this->db->get("tab_vendedor")->row_array();
        return $vendedor;
    }
}