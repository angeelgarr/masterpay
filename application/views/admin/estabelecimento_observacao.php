<form id="formEdit" method="post" action="<?= base_url(); ?>observacao/add"
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

    <div class="col-md-12 col-sm-12 col-xs-12 form-group">
        <label for="observation">Nova Observação:</label>
        <textarea id="observation" name="observacao" class="form-control" disabled></textarea>
    </div>

    <input type="hidden" name="id_estabelecimento" value="<?= $estabelecimento_id; ?>" />
</form>

<table id="datatable" class="table table-striped table-bordered">
    <thead>
    <tr>
        <th>Usuário</th>
        <th>Data/Hora</th>
        <th>Observação</th>
    </tr>
    </thead>
    <tbody>
        <?php foreach ($observacoes as $item): ?>
            <tr>
                <td><?= $item->usuario; ?></td>
                <td><?= $item->data; ?></td>
                <td><?= $item->observacao; ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>