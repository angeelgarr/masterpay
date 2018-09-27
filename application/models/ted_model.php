<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ted_model extends CI_Model {

    public function total_ted_dia() {

		$this->db->select('tcc.total_geral as valor,tcc.status, tte.comercial_name, tte.national_id, tb.codigo, tb.agencia, tb.conta, tb.tipo_conta');
		$this->db->where('tcc.estabelecimento_id = tte.id');
		$this->db->where('tb.estabelecimento_id=tte.id');
		$this->db->where('tcc.status','0');
		$this->db->order_by('valor','DESC');
		$query1 = $this->db->get('tab_conta_corrente_transacao as tcc,tab_estabelecimento as tte, tab_banco as tb')->result();


		$this->db->select('tcc.total_geral as valor,tcc.status, tte.comercial_name, tte.national_id, tb.codigo, tb.agencia, tb.conta, tb.tipo_conta');
		$this->db->where('tcc.estabelecimento_id = tte.id');
		$this->db->where('tb.estabelecimento_id=tte.id');
		$this->db->where('date_format(tcc.data_confirmacao,'."'%Y%m%d'".') = date_format(CURRENT_DATE,'."'%Y%m%d'".')');
		$this->db->order_by('valor','DESC');
		$query2 = $this->db->get('tab_conta_corrente_transacao as tcc,tab_estabelecimento as tte, tab_banco as tb')->result();			

		$query = array_merge($query1,$query2);

		return $query;

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

	public function ted_pre_pago() {
        $this->db->select('tb.id, tb.agencia, ROUND(tc.total_geral, 2) as total, tb.conta');
        $this->db->where('tb.codigo','999');
        $this->db->where('tc.status = 0');
        $this->db->where('tb.estabelecimento_id = te.id');
        $this->db->where('tc.estabelecimento_id = te.id');
        return $this->db->get('tab_banco as tb, tab_estabelecimento as  te, tab_conta_corrente_transacao as tc')->result();
    }
}
