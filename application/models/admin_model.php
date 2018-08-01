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
		$this->db->select('DATE_FORMAT(ttr.data_transacao,'."'%m/%Y'".') as periodo_ref,tte.comercial_name,sum(ttr.valor_transacao) as valor_bruto,COALESCE(sum(ttr.lucro_masterpay),0)+COALESCE( sum(ttr.lucro_antecipacao),0) as valor_lucro');
		$this->db->where('ttr.estabelecimento_id=tte.id');
		$this->db->group_by('periodo_ref, tte.comercial_name');
		$this->db->order_by('periodo_ref desc, valor_bruto desc');
		return $this->db->get('tab_transacao_repasse ttr, tab_estabelecimento tte ')->result();
	}

    public function transacoes_por_dia() {
        $this->db->select('DATE_FORMAT(tr.data_transacao,'."'%m/%Y'".') as periodo, sum(tr.valor_transacao) total_vendas, sum(lucro_masterpay) as lucro_taxas, COALESCE(sum(lucro_antecipacao),0) as lucro_antecipacao');
        $this->db->group_by('periodo');
        $this->db->order_by('periodo asc');
        $this->db->limit(10);
        return $this->db->get('tab_transacao_repasse tr')->result();
    }

	public function lucro_antecipacao_por_periodo() {
		$this->db->select('DATE_FORMAT(ttr.data_transacao,'."'%m/%Y'".') as periodo_ref,tte.comercial_name,sum(ttr.valor_transacao) as valor_bruto, sum(ttr.lucro_antecipacao) as valor_lucro');
		$this->db->where('ttr.estabelecimento_id=tte.id');
		$this->db->where('tte.antecipa=1');
		$this->db->group_by('periodo_ref, tte.comercial_name');
		$this->db->order_by('periodo_ref desc, valor_bruto desc');
		return $this->db->get('tab_transacao_repasse ttr, tab_estabelecimento tte ')->result();
	}

	public function maiores_lucros() {
		$this->db->select('te.comercial_name, COALESCE(sum(ttr.lucro_masterpay),0)+COALESCE( sum(ttr.lucro_antecipacao),0) as valor');
		$this->db->where('te.id=ttr.estabelecimento_id');
		$this->db->group_by('te.comercial_name');
		$this->db->order_by('valor','DESC');
		$this->db->limit(10);
		return $this->db->get('tab_transacao_repasse ttr, tab_estabelecimento te')->result();
	}

	public function lucros_por_mes() {
		$this->db->select('MONTHNAME(ttr.data_transacao) as mes, COALESCE(sum(ttr.lucro_masterpay),0)+COALESCE( sum(ttr.lucro_antecipacao),0) as valor');
		$this->db->group_by('mes');
		$this->db->order_by('mes','DESC');
		$this->db->limit(6);
		return $this->db->get('tab_transacao_repasse ttr')->result();
	}
	
	public function lucros_total_aluguel() {
		$this->db->select('SUM(tce.valor*tce.quantidade) as valor');
		$this->db->where('te.id=tce.estabelecimento_id');
		$this->db->where('te.status','1');
		return $this->db->get('tab_controle_aluguel_equipamento tce, tab_estabelecimento te')->row_array();
	}

	public function total_vendas_dia() {
		$this->db->select('SUM(tp.value) as total_vendas_dia');
		$this->db->where('date_format(tp.payment_date,'."'%Y%m%d'".') = date_format(current_date,'."'%Y%m%d'".')');
		return $this->db->get('tab_transacao_processada tp')->row_array();
	}

	public function total_transacoes_dia() {
		$this->db->select('count(*) as total_transacoes_dia');
		$this->db->where('date_format(tp.payment_date,'."'%Y%m%d'".') = date_format(current_date,'."'%Y%m%d'".')');
		return $this->db->get('tab_transacao_processada tp')->row_array();
	}

	public function ticket_medio_dia() {
		$this->db->select('SUM(tp.value)/count(*) as ticket_medio_dia');
		$this->db->where('date_format(tp.payment_date,'."'%Y%m%d'".') = date_format(current_date,'."'%Y%m%d'".')');
		return $this->db->get('tab_transacao_processada tp')->row_array();
	}

	public function total_lucro_dia_taxas() {
		$this->db->select('sum(tr.lucro_masterpay) as total_lucro_dia_taxas');
		$this->db->where('date_format(tr.data_transacao,'."'%Y%m%d'".') = date_format(current_date,'."'%Y%m%d'".')');
		return $this->db->get('tab_transacao_repasse tr')->row_array();
	}

	public function total_lucro_dia_antecipacao() {
		$this->db->select('COALESCE(sum(tr.lucro_antecipacao),0) as total_lucro_dia_antecipacao');
		$this->db->where('date_format(tr.data_transacao,'."'%Y%m%d'".') = date_format(current_date,'."'%Y%m%d'".')');
		return $this->db->get('tab_transacao_repasse tr')->row_array();
	}

	public function total_lucro_dia_geral() {
		$this->db->select('sum(tr.lucro_masterpay)+COALESCE(sum(tr.lucro_antecipacao),0) as total_lucro_dia_geral');
		$this->db->where('date_format(tr.data_transacao,'."'%Y%m%d'".') = date_format(current_date,'."'%Y%m%d'".')');
		return $this->db->get('tab_transacao_repasse tr')->row_array();
	}
	
	public function total_lucro_aluguel_dia() {
		$this->db->select('sum(tc.valor) as total_lucro_aluguel_dia');
		$this->db->where('date_format(tc.data_pagamento,'."'%Y%m%d'".') = date_format(current_date,'."'%Y%m%d'".')');
		return $this->db->get('tab_controle_aluguel_item tc')->row_array();
	}
}
