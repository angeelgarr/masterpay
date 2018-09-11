<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

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

	public function __construct() {
		parent::__construct();
		
		$this->load->model('log_model');
	}

	public function index()
	{
		$this->session_verifier();

		$this->load->model('dashboard_model');
		$this->load->model('transacao_model');

		$data['total_transacoes'] 			= $this->dashboard_model->total_transacoes()['total'];
		$data['total_debito'] 	  			= $this->dashboard_model->total_debito()['total_debito'];
		$data['total_credito_parcelado'] 	= $this->dashboard_model->total_credito_parcelado()['total_credito_parcelado'];
		$data['total_credito_avista'] 	  	= $this->dashboard_model->total_credito_avista()['total_credito_avista'];
		$data['total_vendas'] 	  			= $this->dashboard_model->total_vendas()['total_vendas'];
		$data['total_liquido_lucro'] 		= $this->dashboard_model->total_liquido_lucro()['total_liquido_lucro'];
		$data['total_brands']				= $this->dashboard_model->total_por_bandeira();

		$data['total_hoje']					= $this->dashboard_model->total_pago_hoje()['total_hoje'];
		$data['total_ontem']				= $this->dashboard_model->total_pago_ontem()['total_ontem'];
		$data['total_amanha']				= $this->dashboard_model->total_pago_amanha()['total_amanha'];
		$data['total_pendente']				= $this->dashboard_model->total_pagamento_pendente()['total_pendente'];

		$data['total_mes_atual']				= $this->dashboard_model->total_mes_atual()['total_mes_atual'];
		$data['total_mes_seguinte']				= $this->dashboard_model->total_mes_seguinte()['total_mes_seguinte'];

		$data['agenda_semana']					= $this->dashboard_model->agenda_semana();
		$usuario = $this->session->userdata('usuario_logado');

		$this->log_model->registrar_acao($usuario,
										'DASHBOARD',
										'SELECT',
									$usuario['estabelecimento_id']);

		$data['transacoes'] = $this->transacao_model->transacoes_hoje($usuario)['transacoes']->result();

		$this->load->view('includes/header');
		$this->load->view('includes/side_menu');
		$this->load->view('includes/top_menu');
		$this->load->view('admin/dashboard', $data);
		$this->load->view('includes/footer');
	}


	public function teds()
	{
		$this->session_verifier();

		$this->load->model('ted_model');
		
		$data['total_teds_hoje'] 			= $this->ted_model->total_ted_dia();
		$data['total_teds_mes'] 			= $this->ted_model->total_ted_mes();
		$data['total_ted_mes_seguinte']		= $this->ted_model->total_ted_mes_seguinte();
		$data['total_historico_teds']		= $this->ted_model->total_historico_ted();
		$data['total_ted_amanha']			= $this->ted_model->total_ted_amanha();


		$usuario = $this->session->userdata('usuario_logado');

		$this->log_model->registrar_acao($usuario,
										'ADMINISTRATIVO/TEDs',
										'SELECT',
									$usuario['estabelecimento_id']);

		$this->load->view('includes/header');
		$this->load->view('includes/side_menu');
		$this->load->view('includes/top_menu');
		$this->load->view('admin/dashboard_teds', $data);
		$this->load->view('includes/footer');
	}

	public function admin()
	{
		$this->session_verifier();

		$this->load->model('admin_model');
		$this->load->model('dashboard_model');
		$this->load->model('transacao_model');
		
		$data['ticket_medio']				= $this->admin_model->calcula_ticket_medio()['ticket'];
		$data['total_liquido_lucro'] 		= $this->dashboard_model->total_liquido_lucro()['total_liquido_lucro'];
		$data['vendas_por_periodo']			= $this->admin_model->vendas_por_periodo();
        $data['transacoes_por_dia']		    = $this->admin_model->transacoes_por_dia();
		$data['maiores_lucros']				= $this->admin_model->maiores_lucros();
		$data['maiores_estabelecimento']	= $this->admin_model->maiores_estabelecimento();
		$data['lucros_por_mes']				= $this->admin_model->lucros_por_mes();
		$data['lucros_total_aluguel']	    = $this->admin_model->lucros_total_aluguel()['valor'];

		$data['total_transacoes'] 			= $this->dashboard_model->total_transacoes()['total'];
		$data['total_vendas'] 	  			= $this->dashboard_model->total_vendas()['total_vendas'];

		$data['lucro_antecipacao_por_periodo'] 	  			= $this->admin_model->lucro_antecipacao_por_periodo();

		$data['receita_total']				= $data['total_liquido_lucro']+$data['lucros_total_aluguel'];

		// informações do dia

		$data['total_vendas_dia'] 	  	    	= $this->admin_model->total_vendas_dia()['total_vendas_dia'];
		$data['ticket_medio_dia']				= $this->admin_model->ticket_medio_dia()['ticket_medio_dia'];
		$data['total_lucro_dia_taxas']      	= $this->admin_model->total_lucro_dia_taxas()['total_lucro_dia_taxas'];
		$data['total_lucro_dia_antecipacao']    = $this->admin_model->total_lucro_dia_antecipacao()['total_lucro_dia_antecipacao'];
		$data['total_lucro_dia_geral']			= $this->admin_model->total_lucro_dia_geral()['total_lucro_dia_geral'];
		$data['total_lucro_aluguel_dia']		= $this->admin_model->total_lucro_aluguel_dia()['total_lucro_aluguel_dia'];
		$data['total_transacoes_dia']			= $this->admin_model->total_transacoes_dia()['total_transacoes_dia'];

		$data['total_lucro_dia_geral']          = $data['total_lucro_dia_geral'] + $data['total_lucro_aluguel_dia'];

		$usuario = $this->session->userdata('usuario_logado');

		$this->log_model->registrar_acao($usuario,
										'ADMINISTRATIVO/DASHBOARD ADMIN',
										'SELECT',
									$usuario['estabelecimento_id']);

		$this->load->view('includes/header');
		$this->load->view('includes/side_menu');
		$this->load->view('includes/top_menu');
		$this->load->view('admin/dashboard_admin', $data);
		$this->load->view('includes/footer');
	}

	public function graficos()
	{
		$this->session_verifier();
		
		$usuario = $this->session->userdata('usuario_logado');

		$this->log_model->registrar_acao($usuario,
										'ADMINISTRATIVO/GRAFICO',
										'SELECT',
									$usuario['estabelecimento_id']);

		$this->load->view('includes/header');
		$this->load->view('includes/side_menu');
		$this->load->view('includes/top_menu');
		$this->load->view('admin/dashboard_graficos');
		$this->load->view('includes/footer');
	}

	public function criar_grafico() {
		
		$this->load->model('admin_model');
		$lucros_por_mes			= $this->admin_model->lucros_por_mes();
		

		$dados['tarefas'] = array(
			"labels" => array("Janeiro", "Fevereiro", "Março", "Abril", "Maio", "Junho", "Julho", "Agosto","Setembro","Outubro","Novembro","Dezembro"),
			"datasets" => array(
				array(
					"label" => "Tempo gasto em tarefas diárias",
					"data" => array(0,0,0,0,$lucros_por_mes[0]->valor,$lucros_por_mes[1]->valor,$lucros_por_mes[2]->valor,$lucros_por_mes[3]->valor,0,0,0,0),
					"backgroundColor" => array('rgba(255, 99, 132, 0.2)',
											   'rgba(54, 162, 235, 0.2)',
											   'rgba(255, 206, 86, 0.2)',
											   'rgba(75, 192, 192, 0.2)',
											   'rgba(153, 102, 255, 0.2)',
											   'rgba(255, 159, 64, 0.2)',
											   'rgba(255, 192, 83, 0.2)',
											   'rgba(255, 192, 83, 0.2)',
											   'rgba(255, 192, 83, 0.2)',
											   'rgba(255, 192, 83, 0.2)',
											   'rgba(255, 192, 83, 0.2)',
											   'rgba(255, 192, 83, 0.2)'),
					"borderColor" => array('rgba(255,99,132,1)','rgba(54, 162, 235, 1)','rgba(255, 206, 86, 1)','rgba(75, 192, 192, 1)','rgba(153, 102, 255, 1)','rgba(255, 159, 64, 1)'),
					"borderWidth" => 1
				)
			)
		);
		$dados['opcoes'] = array(
			"title" => array(
				"display" => true,
				"text" => "Lucro por Mês"
			)
		);
		echo json_encode($dados);
	}

	public function session_verifier() {
		if($this->session->userdata('usuario_logado')==false) {
			redirect('login');
		}
	}
}
