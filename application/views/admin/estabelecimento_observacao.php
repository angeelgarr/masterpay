<form id="formEdit" method="post" action="<?= base_url(); ?>observacao/edit?id=<?= $observacao["id"]; ?>"
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
        <h2>Observação</h2>
        <div class="clearfix"></div>
    </div>

    <div class="col-md-6 col-sm-6 col-xs-12 form-group">
        <label for="lastmodified">Última atualização:</label>
        <input type="text" id="lastmodified" class="form-control" name="nome" data-parsley-trigger="change"
               value="<?= $observacao["data"]; ?>" readonly disabled />
    </div>

    <div class="col-md-12 col-sm-12 col-xs-12 form-group">
        <label for="observation">Observação:</label>
        <textarea id="observation" name="observacao" class="form-control" disabled><?= $observacao["observacao"]; ?></textarea>
    </div>

    <input type="hidden" name="id_estabelecimento" value="<?= $estabelecimento_id; ?>" />
</form>