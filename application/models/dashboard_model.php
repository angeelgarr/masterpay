<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard_model extends CI_Model {

    public function total_transacoes() {
		$usuario = $this->session->userdata('usuario_logado');

		if($usuario['perfil']=='CLIENTE') {
			$this->db->select('count(*) as total, t.product_name');
			$this->db->where('t.estabelecimento_id',$usuario['estabelecimento_id']);
			$this->db->where_not_in('t.product_name','CANCELAMENTO');
			$total = $this->db->get('tab_transacao_processada as t')->row_array();
		} else {
			$this->db->select('count(*) as total, t.product_name');
			$this->db->where_not_in('t.product_name','CANCELAMENTO');
			$total = $this->db->get('tab_transacao_processada as t')->row_array();
        }
        return $total;
	}
	
	public function total_debito() {
		$usuario = $this->session->userdata('usuario_logado');

		if($usuario['perfil']=='CLIENTE') {
			$this->db->select('sum(t.value) as total_debito, t.product_name');
			$this->db->where('t.estabelecimento_id',$usuario['estabelecimento_id']);
			$this->db->where_not_in('t.product_name','CANCELAMENTO');
			$this->db->where('t.product_name','DÉBITO');
			
			$total = $this->db->get('tab_transacao_processada as t')->row_array();
		} else {
			$this->db->select('sum(t.value) as total_debito, t.product_name');
			$this->db->where('t.product_name','DÉBITO');
			$this->db->where_not_in('t.product_name','CANCELAMENTO');
			$total = $this->db->get('tab_transacao_processada as t')->row_array();
        }
        return $total;
	}

	public function total_credito_parcelado() {
		$usuario = $this->session->userdata('usuario_logado');
		$tipos = array('PARCELAMENTO SEM JUROS','CRÉDITO SEM JUROS');
		if($usuario['perfil']=='CLIENTE') {
			$this->db->select('sum(t.value) as total_credito_parcelado, t.product_name');
			$this->db->where('t.estabelecimento_id',$usuario['estabelecimento_id']);
			$this->db->where_in('t.product_name',$tipos);
			$this->db->where_not_in('t.product_name','CANCELAMENTO');
			$total = $this->db->get('tab_transacao_processada as t')->row_array();
		} else {
			$this->db->select('sum(t.value) as total_credito_parcelado');
			$this->db->where_in('t.product_name',$tipos);
			$this->db->where_not_in('t.product_name','CANCELAMENTO');
			$total = $this->db->get('tab_transacao_processada as t')->row_array();
        }
        return $total;
	}

	public function total_credito_avista() {
		$usuario = $this->session->userdata('usuario_logado');
		
		if($usuario['perfil']=='CLIENTE') {
			$this->db->select('sum(t.value) as total_credito_avista,t.product_name');
			$this->db->where('t.estabelecimento_id',$usuario['estabelecimento_id']);
			$this->db->where_in('t.product_name','CRÉDITO À VISTA');
			$this->db->where_not_in('t.product_name','CANCELAMENTO');
			$total = $this->db->get('tab_transacao_processada as t')->row_array();
		} else {
			$this->db->select('sum(t.value) as total_credito_avista, t.product_name');
			$this->db->where_in('t.product_name','CRÉDITO À VISTA');
			$this->db->where_not_in('t.product_name','CANCELAMENTO');
			$total = $this->db->get('tab_transacao_processada as t')->row_array();
        }
        return $total;
	}

	public function total_vendas() {
		$usuario = $this->session->userdata('usuario_logado');
		
		if($usuario['perfil']=='CLIENTE') {
			$this->db->select('sum(t.value) as total_vendas, t.product_name');
			$this->db->where('t.estabelecimento_id',$usuario['estabelecimento_id']);
			$this->db->where_not_in('t.product_name','CANCELAMENTO');
			$total = $this->db->get('tab_transacao_processada as t')->row_array();
		} else {
			$this->db->select('sum(t.value) as total_vendas, t.product_name');
			$this->db->where_not_in('t.product_name','CANCELAMENTO');
			$total = $this->db->get('tab_transacao_processada as t')->row_array();
        }
        return $total;
	}

	public function total_liquido_lucro() {
		$usuario = $this->session->userdata('usuario_logado');
		
		if($usuario['perfil']=='CLIENTE') {
			$this->db->select('sum(t.valor_liquido) as total_liquido_lucro, t.product_name');
			$this->db->where('t.estabelecimento_id',$usuario['estabelecimento_id']);
			$this->db->where_not_in('t.product_name','CANCELAMENTO');
			$total = $this->db->get('tab_transacao_processada as t')->row_array();
		} else {
			$this->db->select('sum(r.lucro_masterpay) as total_liquido_lucro, t.product_name');
			$this->db->join('tab_transacao_processada as t', 't.id=r.transacao_pagamento_processado_id');
			$this->db->where_not_in('t.product_name','CANCELAMENTO');
			$total = $this->db->get('tab_transacao_repasse as r')->row_array();
        }
        return $total;
	}

	public function total_por_bandeira() {
		$usuario = $this->session->userdata('usuario_logado');

		if ($usuario['perfil']=='CLIENTE') {
			$this->db->select('sum(t.value) as total, t.product_name, t.brand');
			$this->db->where_not_in('t.product_name','CANCELAMENTO');
			$this->db->where('t.estabelecimento_id',$usuario['estabelecimento_id']);
			$this->db->group_by(array('product_name','brand'));
			$total = $this->db->get('tab_transacao_processada as t')->result();

		} else {
			$this->db->select('sum(t.value) as total, t.product_name, t.brand');
			$this->db->where_not_in('t.product_name','CANCELAMENTO');
			$this->db->group_by(array('product_name','brand'));
			$total = $this->db->get('tab_transacao_processada as t')->result();
		}
		return $total;
	}

	public function total_pago_hoje() {
		$usuario = $this->session->userdata('usuario_logado');
		if ($usuario['perfil']=='CLIENTE') {
			$this->db->select('sum(tcc.total_geral) as total_hoje');
			$this->db->where('tcc.status',1);
			$this->db->where('date_format(tcc.data_confirmacao,'."'%Y%m%d'".') = date_format(CURRENT_DATE,'."'%Y%m%d'".')');
			$this->db->where('tcc.estabelecimento_id', $usuario['estabelecimento_id']);
			$total = $this->db->get('tab_conta_corrente_transacao as tcc')->row_array();
		} else {
			$this->db->select('sum(tcc.total_geral) as total_hoje');
			$this->db->where('tcc.status',1);
			$this->db->where('date_format(tcc.data_confirmacao,'."'%Y%m%d'".') = date_format(CURRENT_DATE,'."'%Y%m%d'".')');
			$total = $this->db->get('tab_conta_corrente_transacao as tcc')->row_array();
		}
		return $total;
	}

	public function total_pago_ontem() {
		$usuario = $this->session->userdata('usuario_logado');
		if ($usuario['perfil']=='CLIENTE') {
			$this->db->select('sum(tcc.total_geral) as total_ontem');
			$this->db->where('tcc.status',1);
			$this->db->where('date_format(tcc.data_confirmacao,'."'%Y%m%d'".') = date_format(CURRENT_DATE-1,'."'%Y%m%d'".')');
			$this->db->where('tcc.estabelecimento_id', $usuario['estabelecimento_id']);
			$total = $this->db->get('tab_conta_corrente_transacao as tcc')->row_array();
		} else {
			$this->db->select('sum(tcc.total_geral) as total_ontem');
			$this->db->where('tcc.status',1);
			$this->db->where('date_format(tcc.data_confirmacao,'."'%Y%m%d'".') = date_format(CURRENT_DATE-1,'."'%Y%m%d'".')');
			$total = $this->db->get('tab_conta_corrente_transacao as tcc')->row_array();
		}
		return $total;
	}

	public function total_pago_amanha() {
		$usuario = $this->session->userdata('usuario_logado');
		if ($usuario['perfil']=='CLIENTE') {
			$this->db->select('sum(tcc.liquido_cliente) as total_amanha');
			$this->db->where('tcc.status','PENDENTE');
			$this->db->where('date_format(tcc.data_repasse,'."'%Y%m%d'".') = date_format(CURRENT_DATE+1,'."'%Y%m%d'".')');
			$this->db->where('tcc.estabelecimento_id', $usuario['estabelecimento_id']);
			$total = $this->db->get('tab_transacao_repasse as tcc')->row_array();
		} else {
			$this->db->select('sum(tcc.liquido_cliente) as total_amanha');
			$this->db->where('tcc.status','PENDENTE');
			$this->db->where('date_format(tcc.data_repasse,'."'%Y%m%d'".') = date_format(CURRENT_DATE+1,'."'%Y%m%d'".')');
			//$this->db->where('date_format(tcc.data_confirmacao,'."'%Y%m%d'".') = date_format(CURRENT_DATE+1,'."'%Y%m%d'".')');
			$total = $this->db->get('tab_transacao_repasse as tcc')->row_array();
		}
		return $total;
	}

	public function total_pagamento_pendente() {
		$usuario = $this->session->userdata('usuario_logado');
		if ($usuario['perfil']=='CLIENTE') {
			$this->db->select('sum(tcc.liquido_cliente) as total_pendente');
			$this->db->where('tcc.status','PENDENTE');
			$this->db->where('tcc.estabelecimento_id', $usuario['estabelecimento_id']);
			$total = $this->db->get('tab_transacao_repasse as tcc')->row_array();
		} else {
			$this->db->select('sum(tcc.liquido_cliente) as total_pendente');
			$this->db->where('tcc.status','PENDENTE');
			$total = $this->db->get('tab_transacao_repasse as tcc')->row_array();
		}
		return $total;
	}

	public function total_mes_seguinte() {
		$usuario = $this->session->userdata('usuario_logado');
		if ($usuario['perfil']=='CLIENTE') {
			$this->db->select('sum(tcc.liquido_cliente) as total_mes_seguinte');
			$this->db->where('tcc.status','PENDENTE');
			$this->db->where('tcc.estabelecimento_id', $usuario['estabelecimento_id']);
			$this->db->where('date_format(tcc.data_repasse,'."'%Y%m'".') = date_format(date_add(CURRENT_DATE, INTERVAL 1 MONTH),'."'%Y%m'".')');
			$total = $this->db->get('tab_transacao_repasse as tcc')->row_array();
		} else {
			$this->db->select('sum(tcc.liquido_cliente) as total_mes_seguinte');
			$this->db->where('tcc.status','PENDENTE');
			$this->db->where('date_format(tcc.data_repasse,'."'%Y%m'".') = date_format(date_add(CURRENT_DATE, INTERVAL 1 MONTH),'."'%Y%m'".')');
			$total = $this->db->get('tab_transacao_repasse as tcc')->row_array();
		}
		return $total;
	}

	public function total_mes_atual() {
		$usuario = $this->session->userdata('usuario_logado');
		if ($usuario['perfil']=='CLIENTE') {
			$this->db->select('sum(tcc.liquido_cliente) as total_mes_atual');
			$this->db->where('tcc.status','PENDENTE');
			$this->db->where('tcc.estabelecimento_id', $usuario['estabelecimento_id']);
			$this->db->where('date_format(tcc.data_repasse,'."'%Y%m'".') = date_format(CURRENT_DATE,'."'%Y%m'".')');
			$total = $this->db->get('tab_transacao_repasse as tcc')->row_array();
		} else {
			$this->db->select('sum(tcc.liquido_cliente) as total_mes_atual');
			$this->db->where('tcc.status','PENDENTE');
			$this->db->where('date_format(tcc.data_repasse,'."'%Y%m'".') = date_format(CURRENT_DATE,'."'%Y%m'".')');
			$total = $this->db->get('tab_transacao_repasse as tcc')->row_array();
		}
		return $total;
	}
	
}
