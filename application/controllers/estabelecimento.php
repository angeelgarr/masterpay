<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Estabelecimento extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->session_verifier();

		$this->db->select('*');
		$data['categorias'] =  $this->db->get('tab_categoria')->result();

		$this->load->view('includes/header');
		$this->load->view('includes/side_menu');
		$this->load->view('includes/top_menu');
		
        $this->load->view('admin/estabelecimento',$data);
        
        $this->load->view('includes/footer');
    }
    
    public function incluir() {

		$this->session_verifier();
		//proprietario
        $owner['name'] = $this->input->post('nome');
        $owner['email'] = $this->input->post('email');
        $owner['phone'] = $this->input->post('contato');
        $owner['messenger_phone'] = $this->input->post('whatsapp');

		$this->db->insert('tab_proprietario',$owner);

		$data['owner_id'] = $this->db->insert_id();
		$data['national_type'] = $this->input->post('tipopessoa');
		$data['national_id'] = $this->input->post('cpfcnpj');
		$data['company_name'] = $this->input->post('razaosocial');
		$data['comercial_name']  = $this->input->post('fantasia');
		$data['merchant_category_code'] = $this->input->post('categoria');
		$data['merchant_number'] = $this->input->post('inscricao');
		$data['postal_code'] = $this->input->post('cep');
		$data['street'] = $this->input->post('endereco');
		$data['address_number'] = $this->input->post('numero');
		$data['address_complement'] = $this->input->post('complemento');
		$data['enterprise_email'] = $this->input->post('emailcomercial');
		$data['enterprise_phone'] = $this->input->post('contatocomercial');
		$data['status'] = true;
		$data['data_inclusao'] = date('Y-m-d H:i:s');

		$this->db->insert('tab_estabelecimento',$data);
		
		$id_estabelecimento = $this->db->insert_id();
		$taxas['estabelecimento_id'] = $id_estabelecimento;
		$taxas['taxa_credito26masterpay'] = $this->input->post('txmp26');
		$taxas['taxa_credito26stone'] = $this->input->post('txst26');
		$taxas['taxa_credito712masterpay'] = $this->input->post('txmp712');
		$taxas['taxa_credito712stone'] = $this->input->post('txst712');
		$taxas['taxa_credito_avista_masterpay'] = $this->input->post('txcreditomp');
		$taxas['taxa_credito_avista_stone'] = $this->input->post('txcreditost');
		$taxas['taxa_debito_masterpay'] = $this->input->post('txdebitomp');
		$taxas['taxa_debito_stone'] = $this->input->post('txdebitost');

		$this->db->insert('tab_estabelecimento_parametro',$taxas);

		$data['estabelecimento_parametro_id'] = $this->db->insert_id();

		$this->db->where('id',$id_estabelecimento);
        if($this->db->update('tab_estabelecimento',$data)){
			$this->session->set_flashdata('alerta','Estalecimento cadastrado com sucesso!');
			redirect('estabelecimento');
		} else {
			$this->session->set_flashdata('alerta','Ocorreu um erro ao tentar cadastrar esse estabelecimento!');
			redirect('estabelecimento');
		}
	}
	
	public function listar() {

		$this->session_verifier();
		$this->db->select('*');
		$this->db->join('tab_proprietario','tab_estabelecimento.owner_id=tab_proprietario.id','inner');
		$this->db->join('tab_banco','tab_estabelecimento.id=tab_banco.estabelecimento_id','left');
		
		$dados['estabelecimentos'] = $this->db->get('tab_estabelecimento')->result();

		$this->load->view('includes/header');
		$this->load->view('includes/side_menu');
		$this->load->view('includes/top_menu');
		
        $this->load->view('admin/estabelecimento_consulta', $dados);
        
        $this->load->view('includes/footer');
	}

	public function session_verifier() {
		if($this->session->userdata('usuario_logado')==false) {
			redirect('login');
		}
	}
}
