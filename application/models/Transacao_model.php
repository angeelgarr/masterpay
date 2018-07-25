<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transacao_model extends CI_Model {

    public $lastQuery = '';

    public function transacoes($usuario,$limite,$start) {
        if($usuario['perfil']=='CLIENTE') {
            $this->db->select('t.*');
			$this->db->where('e.id',$usuario['estabelecimento_id']);
			$this->db->join('tab_estabelecimento as e','t.estabelecimento_id=e.id','inner');
            $this->db->order_by('t.payment_date','DESC');
            $this->db->limit($limite,$start);
            $dados['transacoes'] = $this->db->get('tab_transacao_processada as t');
            $this->lastQuery = $this->db->last_query();
		} else {
			$this->db->select('t.*, e.comercial_name');
			$this->db->join('tab_estabelecimento as e','t.estabelecimento_id=e.id','inner');
            $this->db->order_by('t.payment_date','DESC');
            $this->db->limit($limite,$start);
            $dados['transacoes'] = $this->db->get('tab_transacao_processada as t');
            $this->lastQuery = $this->db->last_query();
        }
        return $dados;
    }

    public function transacoes_hoje($usuario) {
        
        //$datahoje = date('d/m/Y');

        if($usuario['perfil']=='CLIENTE') {
            $this->db->select('t.*');
            $this->db->where('e.id',$usuario['estabelecimento_id']);
            //$this->db->where('date_format(t.payment_date,'."'%d/%m/%Y'".')',$datahoje);
            $this->db->where('date_format(t.payment_date,'."'%Y%m%d'".') = date_format(CURRENT_DATE,'."'%Y%m%d'".')');
            $this->db->join('tab_estabelecimento as e','t.estabelecimento_id=e.id','inner');
            $this->db->order_by('t.payment_date','DESC');
            $dados['transacoes'] = $this->db->get('tab_transacao_processada as t');
		} else {
            $this->db->select('t.*, e.comercial_name');
            $this->db->where('date_format(t.payment_date,'."'%Y%m%d'".') = date_format(CURRENT_DATE,'."'%Y%m%d'".')');
			$this->db->join('tab_estabelecimento as e','t.estabelecimento_id=e.id','inner');
            $this->db->order_by('t.payment_date','DESC');
            $dados['transacoes'] = $this->db->get('tab_transacao_processada as t');
        }
        return $dados;
    }

    public function transacoesIntervalo($usuario,$limite,$start,$dtInicio,$dtFim,$textSearch="") {
        if($usuario['perfil']=='CLIENTE') {
            $this->db->select('t.*');
            $this->db->where('e.id',$usuario['estabelecimento_id']);
            $this->db->where('date_format(t.payment_date,'."'%d/%m/%Y'".') >=',$dtInicio);
            $this->db->where('date_format(t.payment_date,'."'%d/%m/%Y'".') <=',$dtFim);
           
			$this->db->join('tab_estabelecimento as e','t.estabelecimento_id=e.id','inner');
            $this->db->order_by('t.payment_date','DESC');
            $this->db->limit($limite,$start);
            $dados['transacoes'] = $this->db->get('tab_transacao_processada as t');
            $this->lastQuery = $this->db->last_query();
		} else {
            if($dtInicio == "" && $dtFim == "") {
                $this->db->select('t.*, e.comercial_name');
                $this->db->like('product_name', $textSearch);
                $this->db->or_like('brand', $textSearch);
                $this->db->or_like('FORMAT(value, 2, \'de_DE\')', $textSearch);
                $this->db->or_like('FORMAT(valor_liquido, 2, \'de_DE\')', $textSearch);
                $this->db->or_like('authorization_number', $textSearch);
                $this->db->or_like('comercial_name', $textSearch);
                $this->db->join('tab_estabelecimento as e','t.estabelecimento_id=e.id','inner');
                $this->db->order_by('t.payment_date','DESC');
                $this->db->limit($limite,$start);
                $dados['transacoes'] = $this->db->get('tab_transacao_processada as t');
                $this->lastQuery = $this->db->last_query();
            } else {
                $this->db->select('t.*, e.comercial_name');
                $this->db->group_start();
                    $this->db->like('product_name', $textSearch);
                    $this->db->or_like('brand', $textSearch);
                    $this->db->or_like('FORMAT(value, 2, \'de_DE\')', $textSearch);
                    $this->db->or_like('FORMAT(valor_liquido, 2, \'de_DE\')', $textSearch);
                    $this->db->or_like('authorization_number', $textSearch);
                    $this->db->or_like('comercial_name', $textSearch);
                $this->db->group_end();
                $this->db->group_start();
                    $this->db->where('date_format(t.payment_date,'."'%d/%m/%Y'".') >=',$dtInicio);
                    $this->db->where('date_format(t.payment_date,'."'%d/%m/%Y'".') <=',$dtFim);
                $this->db->group_end();
                $this->db->join('tab_estabelecimento as e','t.estabelecimento_id=e.id','inner');
                $this->db->order_by('t.payment_date','DESC');
                $this->db->limit($limite,$start);
                $dados['transacoes'] = $this->db->get('tab_transacao_processada as t');
                $this->lastQuery = $this->db->last_query();
            }
        }
        return $dados;
    }

    public function getTotalRows() {
        $sql = explode('LIMIT', $this->lastQuery);
        $query = $this->db->query($sql[0]);
        $result = $query->result();
        return count($result);
    }

    public function repasses($usuario,$limite,$start) {

        if($usuario['perfil']=='CLIENTE') {
			$this->db->select('r.id,r.valor_transacao,r.liquido_cliente,r.data_transacao,r.data_repasse,r.status');
            $this->db->where('e.id',$usuario['estabelecimento_id']);
            $this->db->join('tab_estabelecimento as e', 'e.id=r.estabelecimento_id');
            $this->db->order_by('r.data_repasse','DESC');
            $this->db->limit($limite,$start);
            $dados['repasses'] = $this->db->get('tab_transacao_repasse as r');
            $this->lastQuery = $this->db->last_query();
		} else {
            $this->db->select('*');
            $this->db->order_by('r.data_repasse','DESC');
            $this->db->limit($limite,$start);
            $dados['repasses'] = $this->db->get('tab_transacao_repasse as r');
            $this->lastQuery = $this->db->last_query();
        }
        return $dados;
    }

<<<<<<< HEAD
    public function demostrativo_transacoes() {
        $select = 'te.comercial_name, tr.numero_autorizacao,
                    tr.valor_transacao, tr.taxa_stone,
                    tr.valor_stone,tr.taxa_masterpay,tr.lucro_masterpay, tr.taxa_antecipacao,
                    tr.valor_transacao - (tr.valor_transacao*(tr.taxa_masterpay/100)) as liquido_antes_antec,
                    (tr.valor_transacao - (tr.valor_transacao*(tr.taxa_masterpay/100)))-((tr.valor_transacao - (tr.valor_transacao*(tr.taxa_masterpay/100)))*tr.taxa_antecipacao/100) as liquido_apos_antec,
                    (tr.valor_transacao - (tr.valor_transacao*(tr.taxa_masterpay/100))) * (tr.taxa_antecipacao/100) as lucro_antec';
        
        $from = 'tab_transacao_repasse tr, 
                 tab_estabelecimento te';
             
        $where = 'tr.estabelecimento_id=te.id     
                and te.antecipa=1
                and tr.taxa_antecipacao > 0';

        $this->db->select($select);
        $this->db->where($where);
        $this->db->order_by('tr.valor_transacao','DESC');
        return $this->db->get($from)->result();

    }

    public function lucro_antecipacao_socios() {
		$select = 'DATE_FORMAT(tr.data_transacao,'."'%m/%Y'".') as periodo_ref, 
					sum(tr.lucro_antecipacao) as lucro_antecipacao,
                    SUM(tr.lucro_antecipacao)*0.6 as investidor,
                    (SUM(tr.lucro_antecipacao)*0.6)/3 as individual,
					SUM(tr.lucro_antecipacao)*0.4 as maxpay';
		$this->db->select($select);
		$this->db->group_by('periodo_ref');
		$this->db->order_by('periodo_ref','DESC');
		return $this->db->get('tab_transacao_repasse tr')->result();
	}
=======
    public function repassesIntervalo($usuario,$limite,$start,$dtInicio,$dtFim,$textSearch="") {

        if($usuario['perfil']=='CLIENTE') {
            $this->db->select('r.id,r.valor_transacao,r.liquido_cliente,r.data_transacao,r.data_repasse,r.status');
            $this->db->where('e.id',$usuario['estabelecimento_id']);
            $this->db->join('tab_estabelecimento as e', 'e.id=r.estabelecimento_id');
            $this->db->order_by('r.data_repasse','DESC');
            $this->db->limit($limite,$start);
            $dados['repasses'] = $this->db->get('tab_transacao_repasse as r');
            $this->lastQuery = $this->db->last_query();
        } else {
            if($dtInicio == "" && $dtFim == "") {
                $this->db->select('*');
                $this->db->like('FORMAT(valor_transacao, 2, \'de_DE\')', $textSearch);
                $this->db->or_like('FORMAT(liquido_cliente, 2, \'de_DE\')', $textSearch);
                $this->db->or_like('status', $textSearch);
                $this->db->order_by('r.data_repasse','DESC');
                $this->db->limit($limite,$start);
                $dados['repasses'] = $this->db->get('tab_transacao_repasse as r');
                $this->lastQuery = $this->db->last_query();
            } else {
                $this->db->select('*');
                $this->db->group_start();
                    $this->db->like('FORMAT(valor_transacao, 2, \'de_DE\')', $textSearch);
                    $this->db->or_like('FORMAT(liquido_cliente, 2, \'de_DE\')', $textSearch);
                    $this->db->or_like('status', $textSearch);
                $this->db->group_end();
                $this->db->group_start();
                    $this->db->or_group_start();
                        $this->db->where('date_format(data_transacao,'."'%d/%m/%Y'".') >=',$dtInicio);
                        $this->db->where('date_format(data_transacao,'."'%d/%m/%Y'".') <=',$dtFim);
                    $this->db->group_end();
                    $this->db->or_group_start();
                        $this->db->where('date_format(data_repasse,'."'%d/%m/%Y'".') >=',$dtInicio);
                        $this->db->where('date_format(data_repasse,'."'%d/%m/%Y'".') <=',$dtFim);
                    $this->db->group_end();
                $this->db->group_end();
                $this->db->order_by('r.data_repasse','DESC');
                $this->db->limit($limite,$start);
                $dados['repasses'] = $this->db->get('tab_transacao_repasse as r');
                $this->lastQuery = $this->db->last_query();
            }
        }
        return $dados;
    }
>>>>>>> 733efb9bba6647a5c8f0ac0244103d525cac6847
}
