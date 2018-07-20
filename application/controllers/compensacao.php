<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Compensacao extends CI_Controller {

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
    
     
    public function confirmar($param)
	{
		 $this->session_verifier();
		 $conta['status'] = true;
		 $conta['data_confirmacao'] = date('Y-m-d H:i:s');
		 $this->db->where('id',$param);
		 $this->db->update('tab_conta_corrente_transacao',$conta);

		 $data['status'] = 'COMPENSADO';
		 $this->db->where('conta_corrente_id',$param);
		 $this->db->update('tab_transacao_repasse',$data);

		 $this->db->select('c.id,c.status,c.dia_repasse,c.data_confirmacao, c.total_credito,c.total_debito,c.total_geral,e.comercial_name,c.valor_desconto');
		 $this->db->join('tab_estabelecimento as e','c.merchant=e.merchant','inner');
		 $this->db->order_by('c.status','ASC');
		 $this->db->order_by('c.data_confirmacao','DESC');
		 $dados['contas'] = $this->db->get('tab_conta_corrente_transacao as c')->result();
	
		 $this->load->view('includes/header');
		 $this->load->view('includes/side_menu');
		 $this->load->view('includes/top_menu');
			
		 $this->load->view('admin/compensacao',$dados);
			
		 $this->load->view('includes/footer');
	}
	
	public function detalhar($id) {
		$this->session_verifier();
		$this->session->unset_userdata("repasses");
		$usuario = $this->session->userdata('usuario_logado');
		$repasses = '';
		$output = '';
		if($usuario['perfil']=='CLIENTE') {
			$this->db->select('r.id,r.valor_transacao,r.liquido_cliente,r.data_transacao,r.data_repasse,r.status');
			$this->db->where('e.id',$usuario['estabelecimento_id']);
			$this->db->where('r.conta_corrente_id',$id);
            $this->db->join('tab_estabelecimento as e', 'e.id=r.estabelecimento_id');
            $this->db->order_by('r.data_repasse','DESC');
			$repasses = $this->db->get('tab_transacao_repasse as r')->result();
		} else {
			$this->db->select('*');
			$this->db->where('r.conta_corrente_id',$id);
            $this->db->order_by('r.data_repasse','DESC');
			$repasses = $this->db->get('tab_transacao_repasse as r')->result();
		}

		$output .= '<table class="table table-striped ">';
        $output .= '              <thead>';
        $output .= '              <tr>';
        $output .= '                   <th>ID</th>';
        $output .= '                  <th>Valor da Venda (R$)</th>';
        $output .= '                  <th>Valor Liquído</th>';
        $output .= '                  <th>Data/Hora Transação</th>';
        $output .= '                  <th>Data Repasse</th>';
        $output .= '                  <th>Status</th>';
        $output .= '                </tr>';
        $output .= '              </thead>';
                            
        $output .= '              <tbody>';
                      
                      foreach ($repasses as $item) {
		$output .= '<tr>';
        $output .= '<td>'. $item->id.'</td>';
        $output .= '<td style="text-align: right">'. number_format($item->valor_transacao,2,',','.').'</td>';
        $output .= '<td style="text-align: right">'. number_format($item->liquido_cliente,2,',','.').'</td>';
        $output .= '<td style="text-align: center">'. date('d/m/Y H:i:s', strtotime($item->data_transacao)).'</td>';
        $output .= '<td style="text-align: center">'. date('d/m/Y', strtotime($item->data_repasse)).'</td>';
                            
                            if($item->status == 'PENDENTE') {
		$output .= '<td style="text-align: center"><span class="label label-danger">PENDENTE</span></td>';
        }

                            if($item->status == 'FILA_COMPENSACAO') {
		$output .= '<td style="text-align: center"><span class="label label-primary">FILA COMPENSAÇÃO</span></td>';
                            }

                            if($item->status == 'COMPENSADO') {
		$output .= '<td style="text-align: center"><span class="label label-success">COMPENSADO</span></td>';
                            }

		$output .= '</tr>';
                }

		$output .= '</tbody>';
		$output .= '</table>';
		echo $output;
	
	}

	public function session_verifier() {
		if($this->session->userdata('usuario_logado')==false) {
			redirect('login');
		}
	}
}
