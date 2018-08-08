<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Taxa extends CI_Controller {

    public function __construct() {
        parent::__construct();
        
        $this->load->model('log_model');
    }
    
    public function index() {
		$id = $this->input->post('estabelecimento');
		$this->db->select('*');
		$dados['estabelecimentos'] = $this->db->get('tab_estabelecimento')->result();
		
		$this->db->select('*');
		if($id == null) {
			$this->db->where('estabelecimento_id', 3);
			$id = 3;
		} else {
			$this->db->where('estabelecimento_id', $id);
		}
		$this->db->limit(4,0);
		$dados['taxas'] = $this->db->get('tab_estabelecimento_parametro')->result();
	
		$this->load->view('includes/header');
		$this->load->view('includes/side_menu');
		$this->load->view('includes/top_menu');
		
        $this->load->view('admin/editar_taxas',$dados);
        
        $this->load->view('includes/footer');
	}

    public function consultaTaxas() {
        $this->session_verifier();
        $id = $this->input->get("id");
        $this->load->model("taxa_model", "taxa");
        $taxa = $this->taxa->buscaPorIdEstabelecimento($id);

        $dados = array("taxa" => $taxa);

        $this->load->view('admin/estabelecimento_taxa', $dados);
    }

    public function view() {
        $this->session_verifier();
        $id = $this->input->get("id");
        $this->load->model("taxa_model", "taxa");
        $taxa = $this->taxa->buscaPorIdTaxa($id);

        $usuario = $this->session->userdata('usuario_logado');
        $this->log_model->registrar_acao($usuario,
										'ESTABELECIMENTO/CONSULTAR/ABA TAXAS',
										'SELECT',
                                    $id);
                                    
        $dados = array("taxa" => $taxa);

        $this->load->view('admin/detalhes_taxa', $dados);
    }

    public function edit() {
        $this->session_verifier();

        $this->load->model("taxa_model", "taxa");
        
        $idestabelecimento = $this->input->post('estabelecimento_id');
        $usuario = $this->session->userdata('usuario_logado');
        $this->log_model->registrar_acao($usuario,
										'ESTABELECIMENTO/CONSULTAR/ABA TAXAS/EDITAR TAXAS',
										'SELECT',
                                    $idestabelecimento);

        $this->taxa->atualizarPorIdEstabelecimento();
    }

	public function session_verifier() {
		if($this->session->userdata('usuario_logado')==false) {
			redirect('login');
		}
	}
}
