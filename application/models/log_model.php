<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Log_model extends CI_Model
{
    public function registrar_acao($usuario,$sistema,$acao,$estabelecimento) {
        $data['acao'] = $acao;
        $data['sistema'] = $sistema;
        $data['acao'] = $acao;
        $data['usuario'] = $usuario['email'];
        $data['data_hora'] = date('Y-m-d H:i:s');
        $data['estabelecimento'] = $estabelecimento;

        $this->db->insert('tab_log_transacao_usuario',$data);

    }
}
