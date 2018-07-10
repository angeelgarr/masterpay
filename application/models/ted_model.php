<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ted_model extends CI_Model {

    public function total_ted_dia() {

		$this->db->select('tcc.total_geral as valor,tcc.status, tte.comercial_name, tte.national_id, tb.codigo, tb.agencia, tb.conta, tb.tipo_conta');
		$this->db->where('tcc.estabelecimento_id = tte.id');
		$this->db->where('tb.estabelecimento_id=tte.id');
		$this->db->where('date_format(tcc.dia_repasse,'."'%Y%m%d'".') = date_format(CURRENT_DATE,'."'%Y%m%d'".')');
		$this->db->order_by('valor','DESC');
		return $this->db->get('tab_conta_corrente_transacao as tcc,tab_estabelecimento as tte, tab_banco as tb')->result();

	}

	public function total_ted_amanha() {

		$this->db->select('sum(ttr.liquido_cliente) as valor, tb.descricao, tb.codigo');
		$this->db->where('ttr.estabelecimento_id = tb.estabelecimento_id');
		$this->db->where('ttr.status','PENDENTE');
		$this->db->where('date_format(ttr.data_repasse,'."'%Y%m%d'".') = date_format(CURRENT_DATE+1,'."'%Y%m%d'".')');
		$this->db->group_by('tb.descricao, tb.codigo');
		$this->db->order_by('valor','DESC');
		return $this->db->get('tab_transacao_repasse as ttr, tab_banco as tb')->result();

	}
	
	public function total_ted_mes() {
		$this->db->select('sum(ttr.liquido_cliente) as valor, tb.descricao, tb.codigo');
		$this->db->where('ttr.estabelecimento_id = tb.estabelecimento_id');
		$this->db->where('ttr.status','PENDENTE');
		$this->db->where('date_format(ttr.data_repasse,'."'%Y%m'".') = date_format(CURRENT_DATE,'."'%Y%m'".')');
		$this->db->group_by('tb.descricao, tb.codigo');
		$this->db->order_by('valor','DESC');
		return $this->db->get('tab_transacao_repasse as ttr, tab_banco as tb')->result();

	}

	public function total_ted_mes_seguinte() {
		$this->db->select('sum(ttr.liquido_cliente) as valor, tb.descricao, tb.codigo');
		$this->db->where('ttr.estabelecimento_id = tb.estabelecimento_id');
		$this->db->where('ttr.status','PENDENTE');
		$this->db->where('date_format(ttr.data_repasse,'."'%Y%m'".') = date_format(date_add(CURRENT_DATE, INTERVAL 1 MONTH),'."'%Y%m'".')');
		$this->db->group_by('tb.descricao, tb.codigo');
		$this->db->order_by('valor','DESC');
		return $this->db->get('tab_transacao_repasse as ttr, tab_banco as tb')->result();
	}

	public function total_historico_ted() {
		$this->db->select('sum(cc.total_geral) as valor , tb.descricao, tb.codigo');
		$this->db->where('cc.estabelecimento_id=tb.estabelecimento_id');
		$this->db->group_by('tb.descricao, tb.codigo');
		$this->db->order_by('valor','DESC');
		return $this->db->get('tab_conta_corrente_transacao as cc, tab_banco as tb')->result();
	}
}
