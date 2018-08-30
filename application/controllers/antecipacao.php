<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Antecipacao extends CI_Controller {

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
    
     
    public function index() {
		$this->session_verifier();

		$usuario = $this->session->userdata('usuario_logado');

		$this->load->view('includes/header');
		$this->load->view('includes/side_menu');
		$this->load->view('includes/top_menu');
		
        $this->load->view('admin/antecipacao');
        
        $this->load->view('includes/footer');
	}
	
	public function vp() {
		$taxa = 0.035;
		$nper = 1;
		$pmt  = 97;
		
		$result = round(100 * (97-(round($pmt / $taxa * (1-pow(1+$taxa,-$nper)),2)))/97,2);

		echo $result;
	}

	public function vp2() {
		$this->load->model('Estabelecimentos_model','loja');
		$this->loja->atualizarAntecipacao(8,5);
	}

	public function session_verifier() {
		if($this->session->userdata('usuario_logado')==false) {
			redirect('login');
		}
	}
}
