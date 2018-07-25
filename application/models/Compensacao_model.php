<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Compensacao_model extends CI_Model
{

    public $lastQuery = '';

    public function compensacoes($limite, $start)
    {
        $this->db->select('c.id,c.status,c.dia_repasse,c.data_confirmacao, c.total_credito,c.total_debito,c.total_geral,e.comercial_name,c.valor_desconto');
        $this->db->join('tab_estabelecimento as e', 'c.merchant=e.merchant', 'inner');
        $this->db->order_by('c.status', 'ASC');
        $this->db->order_by('c.data_confirmacao', 'ASC');
        $this->db->limit($limite, $start);
        $dados['contas'] = $this->db->get('tab_conta_corrente_transacao as c');
        $this->lastQuery = $this->db->last_query();

        return $dados;
    }

    public function compensacoesIntervalo($limite, $start, $dtInicio, $dtFim, $textSearch = "")
    {
        $status = NULL;
        if(strtolower($textSearch) == "pago") {
            $status = 1;
        } else if(strtolower($textSearch) == "pendente"){
            $status = 0;
        }

        if ($dtInicio == "" && $dtFim == "") {
            $this->db->select('c.id,c.status,c.dia_repasse,c.data_confirmacao, c.total_credito,c.total_debito,c.total_geral,e.comercial_name,c.valor_desconto');
            $this->db->like('FORMAT(c.total_credito, 2, \'de_DE\')', $textSearch);
            $this->db->or_like('FORMAT(c.total_debito, 2, \'de_DE\')', $textSearch);
            $this->db->or_like('FORMAT(c.valor_desconto, 2, \'de_DE\')', $textSearch);
            $this->db->or_like('FORMAT(c.total_geral, 2, \'de_DE\')', $textSearch);
            $this->db->or_like('e.comercial_name', $textSearch);
            if($status) {
                $this->db->or_where( 'c.status', $status);
            }
            $this->db->join('tab_estabelecimento as e', 'c.merchant=e.merchant', 'inner');
            $this->db->order_by('c.status', 'ASC');
            $this->db->order_by('c.data_confirmacao', 'ASC');
            $this->db->limit($limite,$start);
            $dados['contas'] = $this->db->get('tab_conta_corrente_transacao as c');
            $this->lastQuery = $this->db->last_query();
        } else {
            $this->db->select('c.id,c.status,c.dia_repasse,c.data_confirmacao, c.total_credito,c.total_debito,c.total_geral,e.comercial_name,c.valor_desconto');
            $this->db->group_start();
                $this->db->like('FORMAT(c.total_credito, 2, \'de_DE\')', $textSearch);
                $this->db->or_like('FORMAT(c.total_debito, 2, \'de_DE\')', $textSearch);
                $this->db->or_like('FORMAT(c.valor_desconto, 2, \'de_DE\')', $textSearch);
                $this->db->or_like('FORMAT(c.total_geral, 2, \'de_DE\')', $textSearch);
                $this->db->or_like('e.comercial_name', $textSearch);
                if($status) {
                    $this->db->or_where( 'c.status', $status);
                }
            $this->db->group_end();
            $this->db->group_start();
                $this->db->or_group_start();
                    $this->db->where('date_format(c.dia_repasse,'."'%d/%m/%Y'".') >=',$dtInicio);
                    $this->db->where('date_format(c.dia_repasse,'."'%d/%m/%Y'".') <=',$dtFim);
                $this->db->group_end();
                $this->db->or_group_start();
                    $this->db->where('date_format(c.data_confirmacao,'."'%d/%m/%Y'".') >=',$dtInicio);
                    $this->db->where('date_format(c.data_confirmacao,'."'%d/%m/%Y'".') <=',$dtFim);
                $this->db->group_end();
            $this->db->group_end();
            $this->db->join('tab_estabelecimento as e', 'c.merchant=e.merchant', 'inner');
            $this->db->order_by('c.status', 'ASC');
            $this->db->order_by('c.data_confirmacao', 'ASC');
            $this->db->limit($limite,$start);
            $dados['contas'] = $this->db->get('tab_conta_corrente_transacao as c');
            $this->lastQuery = $this->db->last_query();
        }
        return $dados;
    }

    public function getTotalRows()
    {
        $sql = explode('LIMIT', $this->lastQuery);
        $query = $this->db->query($sql[0]);
        $result = $query->result();
        return count($result);
    }
}
