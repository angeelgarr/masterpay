<div class="clearfix"></div>
<div class="x_title">
    <h2><?= $equipamento["equipamento"]; ?></h2>
    <div class="clearfix"></div>
</div>

<div class="col-md-4 col-sm-4 col-xs-12 form-group">
    <label for="data_inicio_cobranca">Data de início da cobrança* :</label>
    <input type="date" id="data_inicio_cobranca" class="form-control" name="data_inicio_cobranca"
           data-parsley-trigger="change" value="<?= $equipamento["data_inicio_cobranca"]; ?>" disabled />
</div>

<div class="col-md-4 col-sm-4 col-xs-12 form-group">
    <label for="quantidade">Quantidade* :</label>
    <input type="number" id="quantidade" class="form-control" name="quantidade" min="1"
           data-parsley-trigger="change" value="<?= $equipamento["quantidade"]; ?>" disabled />
</div>

<div class="col-md-4 col-sm-4 col-xs-12 form-group">
    <label for="valor">Valor* :</label>
    <input type="text" id="valor" class="form-control" name="valor"
           data-parsley-trigger="change" value="<?= $equipamento["valor"]; ?>" disabled />
</div>