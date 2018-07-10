<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model {

	public function calcula_ticket_medio() {
		$this->db->select('sum(ttp.value)/count(*)  as ticket');
		$this->db->where_not_in('product_name','CANCELAMENTO');
		return $this->db->get('tab_transacao_processada ttp')->row_array();
	}

	public function ticket_medio_por_estabelecimento() {
		$this->db->select('sum(ttp.value)/count(*)  as ticket, tte.comercial_name');
		$this->db->where('tte.id=ttp.estabelecimento_id');
		$this->db->where_not_in('product_name','CANCELAMENTO');
		$this->db->group_by('tte.comercial_name');
		$this->db->order_by('ticket', 'DESC');
		return $this->db->get('tab_transacao_processada ttp, tab_estabelecimento tte')->result();
	}

	public function maiores_estabelecimento() {
		$this->db->select('sum(ttp.value) as valor, te.comercial_name');
		$this->db->where('ttp.estabelecimento_id=te.id');
		//$this->db->where('te.status', 1);
		$this->db->group_by('te.comercial_name');
		$this->db->order_by('valor','DESC');
		$this->db->limit(10);
		return $this->db->get('tab_transacao_processada ttp, tab_estabelecimento te')->result();
	}

	
	public function vendas_por_periodo() {
		$this->db->select('DATE_FORMAT(ttr.data_transacao,'."'%m/%Y'".') as periodo_ref,tte.comercial_name,sum(ttr.valor_transacao) as valor_bruto,sum(ttr.lucro_masterpay) as valor_lucro');
		$this->db->where('ttr.estabelecimento_id=tte.id');
		$this->db->group_by('periodo_ref, tte.comercial_name');
		$this->db->order_by('periodo_ref asc, valor_bruto desc');
		return $this->db->get('tab_transacao_repasse ttr, tab_estabelecimento tte ')->result();
	}

	public function maiores_lucros() {
		$this->db->select('te.comercial_name, sum(ttr.lucro_masterpay) as valor');
		$this->db->where('te.id=ttr.estabelecimento_id');
		$this->db->group_by('te.comercial_name');
		$this->db->order_by('valor','DESC');
		$this->db->limit(5);
		return $this->db->get('tab_transacao_repasse ttr, tab_estabelecimento te')->result();
	}

	public function lucros_por_mes() {
		$this->db->select('MONTHNAME(ttr.data_transacao) as mes, sum(ttr.lucro_masterpay) as valor');
		$this->db->group_by('mes');
		$this->db->order_by('mes','DESC');
		$this->db->limit(6);
		return $this->db->get('tab_transacao_repasse ttr')->result();
	}
	
	public function lucros_total_aluguel() {
		$this->db->select('SUM(tce.valor*tce.quantidade) as valor');
		return $this->db->get('tab_controle_aluguel_equipamento tce')->row_array();
	}
}
