<form id="formEdit" method="post" action="<?= base_url(); ?>estabelecimento/editVendedor?id=<?= $estabelecimento['id']; ?>"
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
        <h2>Informações do Vendedor</h2>
        <div class="clearfix"></div>
    </div>

    <div class="col-md-4 col-sm-4 col-xs-12 form-group">
        <label for="vendedor">Selecione o Vendedor para editar:</label>
        <select id="vendedor" name="vendedor" class="form-control" required>
            <option value="">Selecionar vendedor...</option>
            <?php foreach ($vendedores as $vendedor): ?>
                <?php if(!is_null($vendedor->nome)) { ?>
                    <option value="<?= $vendedor->id; ?>" <?= $vendedor->id == $estabelecimento['vendedor_id'] ? 'selected' : ''; ?>>
                        <?= $vendedor->nome; ?>
                    </option>
                <?php } ?>
            <?php endforeach; ?>
        </select>
    </div>
</form>