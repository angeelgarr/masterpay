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

    public function transacoesIntervalo($usuario,$limite,$start,$dtInicio,$dtFim) {
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
            $this->db->select('t.*, e.comercial_name');
            $this->db->where('date_format(t.payment_date,'."'%d/%m/%Y'".') >=',$dtInicio);
            $this->db->where('date_format(t.payment_date,'."'%d/%m/%Y'".') <=',$dtFim);
			$this->db->join('tab_estabelecimento as e','t.estabelecimento_id=e.id','inner');
            $this->db->order_by('t.payment_date','DESC');
            $this->db->limit($limite,$start);
            $dados['transacoes'] = $this->db->get('tab_transacao_processada as t');
            $this->lastQuery = $this->db->last_query();
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
        return $this->db->get($from)->result();

    }
}
