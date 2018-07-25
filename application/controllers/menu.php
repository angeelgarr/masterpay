<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu extends CI_Controller
{

    public function transacoes()
    {
//        $this->output->enable_profiler(TRUE);
        $this->session_verifier();
        $this->load->model('transacao_model', 'transacao');
        $usuario = $this->session->userdata('usuario_logado');

        $this->session->dataInicio = "";
        $this->session->dataFim = "";
        $this->session->textSearch = "";

        $this->load->library('pagination');
        $config['base_url'] = base_url() . 'menu/transacoes';
        $config['uri_segment'] = 3;
        $config['per_page'] = 8;

        //pagination style
        $config['first_link'] = '|<<';
        $config['prev_link'] = '<';
        $config['next_link'] = '>';
        $config['last_link'] = '>>|';

        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a href="#">';
        $config['cur_tag_close'] = '</a></li>';

        $page = $this->uri->segment(3, 0);

        $transacoes = $this->transacao->transacoes($usuario, $config['per_page'], $page)['transacoes']->result();
        $config['total_rows'] = $this->transacao->getTotalRows();

        $this->pagination->initialize($config);

        $pagination = $this->pagination->create_links();

        $dados = array(
            "transacoes" => $transacoes,
            "pagination" => $pagination,
            "textSearch" => "",
            "dataInicio" => "",
            "dataFim" => ""
        );

        $this->load->view('includes/header');
        $this->load->view('includes/side_menu');
        $this->load->view('includes/top_menu');

        $this->load->view('admin/transacoes_consulta', $dados);

        $this->load->view('includes/footer');
    }

    public function transacoesIntervalo()
    {
        $this->session_verifier();
        $this->load->model('transacao_model', 'transacao');
        $usuario = $this->session->userdata('usuario_logado');

        $textSearch = $this->input->post('textsearch');

        if ($this->input->post('textsearch')) {
            $this->session->textSearch = $this->input->post('textsearch');
            $textSearch = $this->session->textSearch;
            if (!$this->input->post('datainicio')) {
                $this->session->dataInicio = "";
            }
            if (!$this->input->post('datafim')) {
                $this->session->dataFim = "";
            }
        } else {
            if(is_null($this->input->post('textsearch'))) {
                $textSearch = $this->session->textSearch;
            } else {
                $textSearch = "";
            }
        }

        if ($this->input->post('datainicio')) {
            $this->session->dataInicio = $this->input->post('datainicio');
            $dtInicio = $this->session->dataInicio;
            if (!$this->input->post('textsearch')) {
                $this->session->textSearch = "";
            }
            if (!$this->input->post('datafim')) {
                $this->session->dataFim = "";
            }
        } else {
            if(is_null($this->input->post('datainicio'))) {
                $dtInicio = $this->session->dataInicio;
            } else {
                $dtInicio = "";
            }
        }

        if ($this->input->post('datafim')) {
            $this->session->dataFim = $this->input->post('datafim');
            $dtFim = $this->session->dataFim;
            if (!$this->input->post('textsearch')) {
                $this->session->textSearch = "";
            }
            if (!$this->input->post('datainicio')) {
                $this->session->dataInicio = "";
            }
        } else {
            if(is_null($this->input->post('datafim'))) {
                $dtFim = $this->session->dataFim;
            } else {
                $dtFim = "";
            }
        }

        if($textSearch == "" && $dtInicio == "" && $dtFim == "") {
            redirect('menu/transacoes');
        }

		$this->load->library('pagination');
		$config['base_url'] = base_url() . 'menu/transacoesIntervalo';
		$config['uri_segment'] = 3;
		$config['per_page'] = 8;

		//pagination style
		$config['first_link'] = '|<<';
		$config['prev_link'] = '<';
		$config['next_link'] = '>';
		$config['last_link'] = '>>|';

		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="active"><a href="#">';
		$config['cur_tag_close'] = '</a></li>';

		$page = $this->uri->segment(3, 0);

        $transacoes = $this->transacao->transacoesIntervalo($usuario, $config['per_page'], $page, $dtInicio, $dtFim, $textSearch)['transacoes']->result();

		$config['total_rows'] = $this->transacao->getTotalRows();

		$this->pagination->initialize($config);

        $pagination = $this->pagination->create_links();

        $dados = array(
            "transacoes" => $transacoes,
            "pagination" => $pagination,
            "textSearch" => $textSearch,
            "dataInicio" => $dtInicio,
            "dataFim" => $dtFim
        );

		$this->load->view('includes/header');
		$this->load->view('includes/side_menu');
		$this->load->view('includes/top_menu');

        $this->load->view('admin/transacoes_consulta', $dados);

        $this->load->view('includes/footer');
	}

    public function repasses()
    {
        $this->session_verifier();
        $this->load->model('transacao_model', 'transacao');
        $usuario = $this->session->userdata('usuario_logado');

        $this->session->dataInicio = "";
        $this->session->dataFim = "";
        $this->session->textSearch = "";

        $this->load->library('pagination');
        $config['base_url'] = base_url() . 'menu/repasses';
        $config['uri_segment'] = 3;
        $config['per_page'] = 8;

        //pagination style
        $config['first_link'] = '|<<';
        $config['prev_link'] = '<';
        $config['next_link'] = '>';
        $config['last_link'] = '>>|';

        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a href="#">';
        $config['cur_tag_close'] = '</a></li>';

        $page = $this->uri->segment(3, 0);

        $repasses = $this->transacao->repasses($usuario, $config['per_page'], $page)['repasses']->result();

        $config['total_rows'] = $this->transacao->getTotalRows();

        $this->pagination->initialize($config);

        $pagination = $this->pagination->create_links();

        $dados = array(
            "repasses" => $repasses,
            "pagination" => $pagination,
            "textSearch" => "",
            "dataInicio" => "",
            "dataFim" => ""
        );

        $this->load->view('includes/header');
        $this->load->view('includes/side_menu');
        $this->load->view('includes/top_menu');

        $this->load->view('admin/repasse_consulta', $dados);

        $this->load->view('includes/footer');

    }

    public function repassesIntervalo()
    {
        $this->session_verifier();
        $this->load->model('transacao_model', 'transacao');
        $usuario = $this->session->userdata('usuario_logado');

        $textSearch = $this->input->post('textsearch');

        if ($this->input->post('textsearch')) {
            $this->session->textSearch = $this->input->post('textsearch');
            $textSearch = $this->session->textSearch;
            if (!$this->input->post('datainicio')) {
                $this->session->dataInicio = "";
            }
            if (!$this->input->post('datafim')) {
                $this->session->dataFim = "";
            }
        } else {
            if(is_null($this->input->post('textsearch'))) {
                $textSearch = $this->session->textSearch;
            } else {
                $textSearch = "";
            }
        }

        if ($this->input->post('datainicio')) {
            $this->session->dataInicio = $this->input->post('datainicio');
            $dtInicio = $this->session->dataInicio;
            if (!$this->input->post('textsearch')) {
                $this->session->textSearch = "";
            }
            if (!$this->input->post('datafim')) {
                $this->session->dataFim = "";
            }
        } else {
            if(is_null($this->input->post('datainicio'))) {
                $dtInicio = $this->session->dataInicio;
            } else {
                $dtInicio = "";
            }
        }

        if ($this->input->post('datafim')) {
            $this->session->dataFim = $this->input->post('datafim');
            $dtFim = $this->session->dataFim;
            if (!$this->input->post('textsearch')) {
                $this->session->textSearch = "";
            }
            if (!$this->input->post('datainicio')) {
                $this->session->dataInicio = "";
            }
        } else {
            if(is_null($this->input->post('datafim'))) {
                $dtFim = $this->session->dataFim;
            } else {
                $dtFim = "";
            }
        }

        if($textSearch == "" && $dtInicio == "" && $dtFim == "") {
            redirect('menu/repasses');
        }

        $this->load->library('pagination');
        $config['base_url'] = base_url() . 'menu/repassesIntervalo';
        $config['uri_segment'] = 3;
        $config['per_page'] = 8;

        //pagination style
        $config['first_link'] = '|<<';
        $config['prev_link'] = '<';
        $config['next_link'] = '>';
        $config['last_link'] = '>>|';

        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a href="#">';
        $config['cur_tag_close'] = '</a></li>';

        $page = $this->uri->segment(3, 0);

        $repasses = $this->transacao->repassesIntervalo($usuario, $config['per_page'], $page, $dtInicio, $dtFim, $textSearch)['repasses']->result();

        $config['total_rows'] = $this->transacao->getTotalRows();

        $this->pagination->initialize($config);

        $pagination = $this->pagination->create_links();

        $dados = array(
            "repasses" => $repasses,
            "pagination" => $pagination,
            "textSearch" => $textSearch,
            "dataInicio" => $dtInicio,
            "dataFim" => $dtFim
        );

        $this->load->view('includes/header');
        $this->load->view('includes/side_menu');
        $this->load->view('includes/top_menu');

        $this->load->view('admin/repasse_consulta', $dados);

        $this->load->view('includes/footer');
    }

    public function compensacao()
    {
        $this->session_verifier();
        $this->load->model('compensacao_model', 'compensacao');

        $this->session->dataInicio = "";
        $this->session->dataFim = "";
        $this->session->textSearch = "";

        $this->load->library('pagination');
        $config['base_url'] = base_url() . 'menu/compensacao';
        $config['uri_segment'] = 3;
        $config['per_page'] = 8;

        //pagination style
        $config['first_link'] = '|<<';
        $config['prev_link'] = '<';
        $config['next_link'] = '>';
        $config['last_link'] = '>>|';

        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a href="#">';
        $config['cur_tag_close'] = '</a></li>';

        $page = $this->uri->segment(3, 0);

        $contas = $this->compensacao->compensacoes($config['per_page'], $page)['contas']->result();

        $config['total_rows'] = $this->compensacao->getTotalRows();

        $this->pagination->initialize($config);

        $pagination = $this->pagination->create_links();

        $dados = array(
            "contas" => $contas,
            "pagination" => $pagination,
            "textSearch" => "",
            "dataInicio" => "",
            "dataFim" => ""
        );

        $this->load->view('includes/header');
        $this->load->view('includes/side_menu');
        $this->load->view('includes/top_menu');

        $this->load->view('admin/compensacao', $dados);

        $this->load->view('includes/footer');
    }

    public function compensacaoIntervalo()
    {
        $this->session_verifier();
        $this->load->model('compensacao_model', 'compensacao');

        $textSearch = $this->input->post('textsearch');

        if ($this->input->post('textsearch')) {
            $this->session->textSearch = $this->input->post('textsearch');
            $textSearch = $this->session->textSearch;
            if (!$this->input->post('datainicio')) {
                $this->session->dataInicio = "";
            }
            if (!$this->input->post('datafim')) {
                $this->session->dataFim = "";
            }
        } else {
            if(is_null($this->input->post('textsearch'))) {
                $textSearch = $this->session->textSearch;
            } else {
                $textSearch = "";
            }
        }

        if ($this->input->post('datainicio')) {
            $this->session->dataInicio = $this->input->post('datainicio');
            $dtInicio = $this->session->dataInicio;
            if (!$this->input->post('textsearch')) {
                $this->session->textSearch = "";
            }
            if (!$this->input->post('datafim')) {
                $this->session->dataFim = "";
            }
        } else {
            if(is_null($this->input->post('datainicio'))) {
                $dtInicio = $this->session->dataInicio;
            } else {
                $dtInicio = "";
            }
        }

        if ($this->input->post('datafim')) {
            $this->session->dataFim = $this->input->post('datafim');
            $dtFim = $this->session->dataFim;
            if (!$this->input->post('textsearch')) {
                $this->session->textSearch = "";
            }
            if (!$this->input->post('datainicio')) {
                $this->session->dataInicio = "";
            }
        } else {
            if(is_null($this->input->post('datafim'))) {
                $dtFim = $this->session->dataFim;
            } else {
                $dtFim = "";
            }
        }

        if($textSearch == "" && $dtInicio == "" && $dtFim == "") {
            redirect('menu/compensacao');
        }

        $this->load->library('pagination');
        $config['base_url'] = base_url() . 'menu/compensacaoIntervalo';
        $config['uri_segment'] = 3;
        $config['per_page'] = 8;

        //pagination style
        $config['first_link'] = '|<<';
        $config['prev_link'] = '<';
        $config['next_link'] = '>';
        $config['last_link'] = '>>|';

        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a href="#">';
        $config['cur_tag_close'] = '</a></li>';

        $page = $this->uri->segment(3, 0);

        $contas = $this->compensacao->compensacoesIntervalo($config['per_page'], $page, $dtInicio, $dtFim, $textSearch)['contas']->result();

        $config['total_rows'] = $this->compensacao->getTotalRows();

        $this->pagination->initialize($config);

        $pagination = $this->pagination->create_links();

        $dados = array(
            "contas" => $contas,
            "pagination" => $pagination,
            "textSearch" => $textSearch,
            "dataInicio" => $dtInicio,
            "dataFim" => $dtFim
        );

        $this->load->view('includes/header');
        $this->load->view('includes/side_menu');
        $this->load->view('includes/top_menu');

        $this->load->view('admin/compensacao', $dados);

        $this->load->view('includes/footer');
    }


    public function bancos()
    {
        $this->session_verifier();

        $usuario = $this->session->userdata('usuario_logado');

        $this->session_verifier();
        $this->db->select('*');
        $dados['estabelecimentos'] = $this->db->get('tab_estabelecimento')->result();

        $this->load->view('includes/header');
        $this->load->view('includes/side_menu');
        $this->load->view('includes/top_menu');

        $this->load->view('admin/banco', $dados);

        $this->load->view('includes/footer');
    }

    public function aluguel()
    {
        $this->session_verifier();

        $usuario = $this->session->userdata('usuario_logado');

        $this->db->select('*');
        $this->db->where('estabelecimento_id', $usuario['estabelecimento_id']);
        $dados['equipamento'] = $this->db->get('tab_controle_aluguel_equipamento')->result();

        $this->load->view('includes/header');
        $this->load->view('includes/side_menu');
        $this->load->view('includes/top_menu');

        $this->load->view('admin/dashboard_equipamento', $dados);

        $this->load->view('includes/footer');
    }

    public function taxas()
    {
        $this->session_verifier();

        $usuario = $this->session->userdata('usuario_logado');

        if ($usuario['perfil'] == 'CLIENTE') {
            $this->db->select('*');
            $this->db->where('e.id', $usuario['estabelecimento_id']);
            $this->db->join('tab_estabelecimento as e', 'e.id=p.estabelecimento_id');
            $dados['taxas'] = $this->db->get('tab_estabelecimento_parametro as p')->result();
        } else {
            $this->db->select('*');
            $dados['taxas'] = $this->db->get('tab_estabelecimento_parametro')->result();
        }

        $this->load->view('includes/header');
        $this->load->view('includes/side_menu');
        $this->load->view('includes/top_menu');

        $this->load->view('admin/taxas', $dados);

        $this->load->view('includes/footer');

    }

    public function session_verifier()
    {
        if ($this->session->userdata('usuario_logado') == false) {
            redirect('login');
        }
    }
}
