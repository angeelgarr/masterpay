<form id="demo-form" method="post" action="<?= base_url(); ?>banco/edit?id=<?= $banco["id"]; ?>"
      data-parsley-validate>
    <div class="modal-body">
        <?php if ($error = $this->session->flashdata('alerta')): ?>
            <div class="alert alert-info alert-dismissible fade in" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                            aria-hidden="true">×</span>
                </button>
                <strong><?= $this->session->flashdata('alerta'); ?></strong>
            </div>
        <?php endif; ?>

        <div class="x_title">
            <h2>Taxas Combinadas</h2>
            <div class="clearfix"></div>
        </div>

        <div class="col-md-12 col-sm-12 col-xs-12 form-group">
            <label for="fullname">Estabelecimento* :</label>
            <input type="text" class="form-control" name="estabelecimento"
                   value="<?= $banco["comercial_name"]; ?>" readonly disabled/>
        </div>

        <div class="col-md-4 col-sm-4 col-xs-12 form-group">
            <label for="banco">Banco* :</label>
            <select id="banco" placeholder="banco..." name="banco" class="form-control" required>
                <option value="<?= $banco["codigo"]; ?><?= $banco["descricao"]; ?>"><?= $banco["codigo"]; ?>
                    –<?= $banco["descricao"]; ?></option>
                <option value="001-Banco do Brasil S.A.">001–Banco do Brasil S.A.</option>
                <option value="341-Banco Itaú S.A.">341–Banco Itaú S.A.</option>
                <option value="033-Banco Santander (Brasil) S.A.">033–Banco Santander (Brasil)
                    S.A.
                </option>
                <option value="356-Banco Real S.A. (antigo)">356–Banco Real S.A. (antigo)</option>
                <option value="652-Itaú Unibanco Holding S.A.">652–Itaú Unibanco Holding S.A.
                </option>
                <option value="237-Banco Bradesco S.A.">237–Banco Bradesco S.A.</option>
                <option value="745-Banco Citibank S.A.">745–Banco Citibank S.A.</option>
                <option value="399-HSBC Bank Brasil S.A. – Banco Múltiplo">399–HSBC Bank Brasil S.A.
                    – Banco Múltiplo
                </option>
                <option value="104-Caixa Econômica Federal">104–Caixa Econômica Federal</option>
                <option value="389-Banco Mercantil do Brasil S.A.">389–Banco Mercantil do Brasil
                    S.A.
                </option>
                <option value="453-Banco Rural S.A.">453–Banco Rural S.A.</option>
                <option value="422-Banco Safra S.A.">422–Banco Safra S.A.</option>
                <option value="633-Banco Rendimento S.A.">633–Banco Rendimento S.A.</option>
                <option value="004-Banco do Nordeste do Brasil S.A.">004-Banco do Nordeste do
                    Brasil S.A.
                </option>
            </select>
        </div>

        <div class="col-md-4 col-sm-4 col-xs-12 form-group">
            <label for="tipo">Tipo Conta* :</label>
            <select id="tipo" placeholder="tipo da conta..." name="tipo" class="form-control"
                    required>
                <option value="<?= $banco["tipo_conta"]; ?>"><?= $banco["tipo_conta"]; ?></option>
                <option value="CC">CONTA CORRENTE</option>
                <option value="CP">CONTA POUPANÇA</option>
            </select>
        </div>

        <div class="col-md-2 col-sm-2 col-xs-12 form-group">
            <label for="agencia">Agência* :</label>
            <input type="text" id="agencia" class="form-control" name="agencia"
                   data-parsley-trigger="change" value="<?= $banco["agencia"]; ?>" required/>
        </div>

        <div class="col-md-4 col-sm-4 col-xs-12 form-group">
            <label for="conta">Conta* :</label>
            <input type="text" id="conta" class="form-control" name="conta"
                   data-parsley-trigger="change" value="<?= $banco["conta"]; ?>" required/>
        </div>
    </div>
</form>