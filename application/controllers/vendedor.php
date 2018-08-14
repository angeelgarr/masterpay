<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Vendedor extends CI_Controller {
    public function index() {
//        $this->output->enable_profiler(TRUE);
        $this->session_verifier();

        $this->load->model('vendedor_model', 'vendedores');
        $vendedores = $this->vendedores->buscarVendedores();

        $dados = array('vendedores' => $vendedores);

        $this->load->view('includes/header');
        $this->load->view('includes/side_menu');
        $this->load->view('includes/top_menu');

        $this->load->view('admin/vendedores', $dados);

        $this->load->view('includes/footer');
    }

    public function novo()
    {
        $this->session_verifier();

        if($this->input->post()) {
            $this->load->model('vendedor_model', 'vendedor');

            if($this->vendedor->buscaPorEmail($this->input->post("email"))){
                $this->session->set_flashdata('alerta', 'Já existe vendedor cadastrado com este email!');
                redirect('vendedor/novo');
            } else {
                if($this->vendedor->cadastrarVendedor()) {
                    $this->session->set_flashdata('sucesso', 'Vendedor cadastrado com sucesso!');
                    redirect('vendedor');
                } else {
                    $this->session->set_flashdata('alerta', 'Ocorreu um erro ao tentar cadastrar vendedor!');
                    redirect('vendedor');
                }
            }
        } else {
            $this->load->view('includes/header');
            $this->load->view('includes/side_menu');
            $this->load->view('includes/top_menu');

            $this->load->view('admin/vendedores_cadastro');

            $this->load->view('includes/footer');
        }
    }

    public function editar($id)
    {
        $this->session_verifier();
        $this->load->library('user_agent');

        if($this->input->post()) {
            $this->load->model('vendedor_model', 'vendedor');

            $vendedor = $this->vendedor->buscaPorEmail($this->input->post("email"));

            if($id != $vendedor["id"] && $this->input->post("email") == $vendedor["email"]){
                $this->session->set_flashdata('alerta', 'Já existe vendedor cadastrado com este email!');
                redirect($this->agent->referrer());
            } else {
                $this->vendedor->editarVendedorPorId($id);
            }
        } else {
            $this->load->model('vendedor_model', 'vendedor');
            $vendedor = $this->vendedor->buscarVendedorPorId($id);

            $dados = array("vendedor" => $vendedor);

            $this->load->view('includes/header');
            $this->load->view('includes/side_menu');
            $this->load->view('includes/top_menu');

            $this->load->view('admin/vendedores_editar', $dados);

            $this->load->view('includes/footer');
        }
    }

    public function session_verifier() {
        if($this->session->userdata('usuario_logado')==false) {
            redirect('login');
        }
    }
}