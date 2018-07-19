<form id="formEdit" method="post" action="<?= base_url(); ?>banco/edit?id=<?= $banco["id"]; ?>"
      data-parsley-validate>
    <?php if ($error = $this->session->flashdata('alerta')): ?>
        <div class="alert alert-info alert-dismissible fade in" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                        aria-hidden="true">×</span>
            </button>
            <strong><?= $this->session->flashdata('alerta'); ?></strong>
        </div>
    <?php endif; ?>

    <div class="x_title">
        <h2>Informações do Banco</h2>
        <div class="clearfix"></div>
    </div>

    <div class="col-md-4 col-sm-4 col-xs-12 form-group">
        <label for="banco">Banco* :</label>
        <select id="banco" placeholder="banco..." name="banco" class="form-control" required>
            <option value="001-Banco do Brasil S.A." <?= $banco["codigo"] == '001' ? 'selected' : ''; ?>>001–Banco
                do Brasil S.A.
            </option>
            <option value="341-Banco Itaú S.A." <?= $banco["codigo"] == '341' ? 'selected' : ''; ?>>341–Banco Itaú
                S.A.
            </option>
            <option value="033-Banco Santander (Brasil) S.A." <?= $banco["codigo"] == '033' ? 'selected' : ''; ?>>
                033–Banco Santander (Brasil)
                S.A.
            </option>
            <option value="356-Banco Real S.A. (antigo)" <?= $banco["codigo"] == '356' ? 'selected' : ''; ?>>
                356–Banco Real S.A. (antigo)
            </option>
            <option value="652-Itaú Unibanco Holding S.A." <?= $banco["codigo"] == '652' ? 'selected' : ''; ?>>
                652–Itaú Unibanco Holding S.A.
            </option>
            <option value="237-Banco Bradesco S.A." <?= $banco["codigo"] == '237' ? 'selected' : ''; ?>>237–Banco
                Bradesco S.A.
            </option>
            <option value="745-Banco Citibank S.A." <?= $banco["codigo"] == '745' ? 'selected' : ''; ?>>745–Banco
                Citibank S.A.
            </option>
            <option value="399-HSBC Bank Brasil S.A. – Banco Múltiplo" <?= $banco["codigo"] == '399' ? 'selected' : ''; ?>>
                399–HSBC Bank Brasil S.A.
                – Banco Múltiplo
            </option>
            <option value="104-Caixa Econômica Federal" <?= $banco["codigo"] == '104' ? 'selected' : ''; ?>>
                104–Caixa Econômica Federal
            </option>
            <option value="389-Banco Mercantil do Brasil S.A." <?= $banco["codigo"] == '389' ? 'selected' : ''; ?>>
                389–Banco Mercantil do Brasil
                S.A.
            </option>
            <option value="453-Banco Rural S.A." <?= $banco["codigo"] == '453' ? 'selected' : ''; ?>>453–Banco Rural
                S.A.
            </option>
            <option value="422-Banco Safra S.A." <?= $banco["codigo"] == '422' ? 'selected' : ''; ?>>422–Banco Safra
                S.A.
            </option>
            <option value="633-Banco Rendimento S.A." <?= $banco["codigo"] == '633' ? 'selected' : ''; ?>>633–Banco
                Rendimento S.A.
            </option>
            <option value="004-Banco do Nordeste do Brasil S.A." <?= $banco["codigo"] == '004' ? 'selected' : ''; ?>>
                004-Banco do Nordeste do
                Brasil S.A.
            </option>
        </select>
    </div>

    <div class="col-md-4 col-sm-4 col-xs-12 form-group">
        <label for="tipo">Tipo Conta* :</label>
        <select id="tipo" placeholder="tipo da conta..." name="tipo" class="form-control"
                required>
            <option value="CC" <?= $banco["tipo_conta"] == 'CC' ? 'selected' : ''; ?>>CONTA CORRENTE</option>
            <option value="CP" <?= $banco["tipo_conta"] == 'CP' ? 'selected' : '' ?>>CONTA POUPANÇA</option>
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

    <input type="hidden" name="id_estabelecimento" value="<?= $id_estabelecimento; ?>" />
</form>