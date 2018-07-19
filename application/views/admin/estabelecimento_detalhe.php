<form id="formEdit" method="post" action="<?= base_url(); ?>estabelecimento/edit?id=<?= $estabelecimento["id"]; ?>"
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
        <h2>Informações do Estabelecimento</h2>
        <div class="clearfix"></div>
    </div>

    <div class="col-md-12 col-sm-12 col-xs-12 form-group">
        <label for="agencia">Razão Social* :</label>
        <input type="text" id="agencia" class="form-control" name="company_name"
               data-parsley-trigger="change" value="<?= $estabelecimento["company_name"]; ?>"/>
    </div>

    <div class="col-md-12 col-sm-12 col-xs-12 form-group">
        <label for="agencia">Nome Fantasia* :</label>
        <input type="text" id="agencia" class="form-control" name="comercial_name"
               data-parsley-trigger="change" value="<?= $estabelecimento["comercial_name"]; ?>"/>
    </div>

    <div class="col-md-4 col-sm-4 col-xs-12 form-group">
        <label for="conta">Endereço* :</label>
        <input type="text" id="conta" class="form-control" name="address_complement"
               data-parsley-trigger="change" value="<?= $estabelecimento["address_complement"]; ?>"/>
    </div>

    <div class="col-md-4 col-sm-4 col-xs-12 form-group">
        <label for="conta">Número* :</label>
        <input type="text" id="conta" class="form-control" name="address_number"
               data-parsley-trigger="change" value="<?= $estabelecimento["address_number"]; ?>"/>
    </div>

    <div class="col-md-4 col-sm-4 col-xs-12 form-group">
        <label for="conta">Email Comercial* :</label>
        <input type="text" id="conta" class="form-control" name="enterprise_email"
               data-parsley-trigger="change" value="<?= $estabelecimento["enterprise_email"]; ?>"/>
    </div>

    <div class="col-md-4 col-sm-4 col-xs-12 form-group">
        <label for="conta">Contato Whatsapp* :</label>
        <input type="text" id="conta" class="form-control" name="enterprise_messenger_phone"
               data-parsley-trigger="change" value="<?= $estabelecimento["enterprise_messenger_phone"]; ?>"/>
    </div>

    <div class="col-md-4 col-sm-4 col-xs-12 form-group">
        <label for="conta">Contato Comercial* :</label>
        <input type="text" id="conta" class="form-control" name="enterprise_phone"
               data-parsley-trigger="change" value="<?= $estabelecimento["enterprise_phone"]; ?>"/>
    </div>

    <div class="col-md-4 col-sm-4 col-xs-12 form-group">
        <label for="conta">Merchant* :</label>
        <input type="text" id="conta" class="form-control" name="merchant"
               data-parsley-trigger="change" value="<?= $estabelecimento["merchant"]; ?>"/>
    </div>

    <div class="col-md-6 col-sm-6 col-xs-12 form-group">
        <label for="merchant_category_code"> Categoria*:</label>
        <select id="merchant_category_code" name="merchant_category_code" class="form-control">
            <option value=""></option>
            <?php foreach ($categorias as $cat) { ?>
                <option value="<?= $cat->code; ?>" <?= $cat->code == $estabelecimento["merchant_category_code"] ? 'selected' : ''; ?>> <?= $cat->name; ?> </option>
            <?php } ?>
        </select>
    </div>

    <div class="col-md-4 col-sm-4 col-xs-12 form-group">
        <label for="merchant_number">Incrição Estadual/Municipal* :</label>
        <input type="text" id="merchant_number" data-inputmask="'mask': '99999999999'" class="form-control"
               name="merchant_number" data-parsley-trigger="change"
               value="<?= $estabelecimento["merchant_number"]; ?>"/>
    </div>

    <div class="col-md-4 col-sm-4 col-xs-12 form-group">
        <label for="national_id">CPF/CNPJ* :</label>
        <input type="text" id="national_id" data-inputmask="'mask': '99999999999999'"
               class="form-control" name="national_id" data-parsley-trigger="change"
               value="<?= $estabelecimento["national_id"]; ?>"/>
    </div>

    <div class="col-md-4 col-sm-4 col-xs-12 form-group">
        <label>Tipo Pessoa *:</label>
        <p>
            Física: <input type="radio" class="flat" name="national_type" id="pf"
                           value="01" <?= $estabelecimento["national_type"] == "01" ? 'checked' : ''; ?> />
            Jurídica: <input type="radio" class="flat" name="national_type" id="pj"
                             value="02" <?= $estabelecimento["national_type"] == "02" ? 'checked' : ''; ?> />
        </p>
    </div>

    <div class="col-md-4 col-sm-4 col-xs-12 form-group">
        <label for="postal_code">CEP* :</label>
        <input type="text" id="postal_code" data-inputmask="'mask': '99999999'" class="form-control"
               name="postal_code" data-parsley-trigger="change" value="<?= $estabelecimento["postal_code"]; ?>"/>
    </div>

    <div class="col-md-4 col-sm-4 col-xs-12 form-group">
        <label for="conta">Endereço* :</label>
        <input type="text" id="conta" class="form-control" name="street"
               data-parsley-trigger="change" value="<?= $estabelecimento["street"]; ?>"/>
    </div>

    <div class="col-md-4 col-sm-4 col-xs-12 form-group">
        <label for="conta">IDM* :</label>
        <input type="text" id="conta" class="form-control" name="idm"
               data-parsley-trigger="change" value="<?= $estabelecimento["idm"]; ?>"/>
    </div>

    <div class="col-md-4 col-sm-4 col-xs-12 form-group">
        <label for="conta">Taxa Antecipação* :</label>
        <input type="text" id="conta" class="form-control" name="taxa_antecipacao"
               data-parsley-trigger="change" value="<?= $estabelecimento["taxa_antecipacao"]; ?>"/>
    </div>

    <div class="col-md-4 col-sm-4 col-xs-6 form-group">
        <label for="conta">Antecipação: *</label>
        <div class="btn-group btn-group-toggle form-control" data-toggle="buttons">
            <label class="btn btn-default <?= $estabelecimento["antecipa"] == 1 ? 'active' : ''; ?>">
                <input type="radio" name="antecipa" value="true"
                       autocomplete="off" <?= $estabelecimento["antecipa"] == 1 ? 'checked' : ''; ?> /> Sim
            </label>
            <label class="btn btn-default <?= $estabelecimento["antecipa"] == 0 ? 'active' : ''; ?>">
                <input type="radio" name="antecipa" value="false"
                       autocomplete="off" <?= $estabelecimento["antecipa"] == 0 ? 'checked' : ''; ?> /> Não
            </label>
        </div>
    </div>

    <div class="col-md-2 col-sm-2 col-xs-6 form-group">
        <label for="conta">Sincronizado* :</label>
        <div class="btn-group btn-group-toggle form-control" data-toggle="buttons">
            <label class="btn btn-default <?= $estabelecimento["sincronizado"] == 1 ? 'active' : ''; ?>">
                <input type="radio" name="sincronizado" value="true"
                       autocomplete="off" <?= $estabelecimento["sincronizado"] == 1 ? 'checked' : ''; ?> /> Sim
            </label>
            <label class="btn btn-default <?= $estabelecimento["sincronizado"] == 0 ? 'active' : ''; ?>">
                <input type="radio" name="sincronizado" value="false"
                       autocomplete="off" <?= $estabelecimento["sincronizado"] == 0 ? 'checked' : ''; ?> /> Não
            </label>
        </div>
    </div>

    <div class="col-md-4 col-sm-4 col-xs-6 form-group">
        <label for="conta">Status* :</label>
        <div class="btn-group btn-group-toggle form-control" data-toggle="buttons">
            <label class="btn btn-default <?= $estabelecimento["status"] == 1 ? 'active' : ''; ?>">
                <input type="radio" name="status" value="true"
                       autocomplete="off" <?= $estabelecimento["status"] == 1 ? 'checked' : ''; ?> /> Ativo
            </label>
            <label class="btn btn-default <?= $estabelecimento["status"] == 0 ? 'active' : ''; ?>">
                <input type="radio" name="status" value="false"
                       autocomplete="off" <?= $estabelecimento["status"] == 0 ? 'checked' : ''; ?> /> Inativo
            </label>
        </div>
    </div>
</form>

<style>
    .btn-group-toggle.form-control {
        border: 0 none;
        box-shadow: none;
        padding: 0;
    }
</style>

<script type="text/javascript">
    $(document).ready(function () {
        if ($("input.flat")[0]) {
            $(document).ready(function () {
                $('input.flat').iCheck({
                    checkboxClass: 'icheckbox_flat-green',
                    radioClass: 'iradio_flat-green'
                });
            });
        }
        init_InputMask();
        NProgress.done();
    });
</script>