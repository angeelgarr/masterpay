<div class="clearfix"></div>
<div class="x_title">
    <h2><?= $taxa["bandeira"]; ?> - Taxas Stone </h2>
    <div class="clearfix"></div>
</div>

<input type="hidden" name="bandeira" value="<?= $taxa["bandeira"]; ?>" />
<input type="hidden" name="estabelecimento_id" value="<?= $taxa["estabelecimento_id"]; ?>" />

<!-- Taxas Stones -->
<div class="col-md-4 col-sm-4 col-xs-12 form-group">
    <label for="conta">Taxa Débito Stone* :</label>
    <input type="text" id="conta" class="form-control" name="taxa_debito_stone"
           data-parsley-trigger="change" value="<?= $taxa["taxa_debito_stone"]; ?>" readonly/>
</div>

<div class="col-md-4 col-sm-4 col-xs-12 form-group">
    <label for="conta">Taxa Crédito à vista Stone* :</label>
    <input type="text" id="conta" class="form-control" name="taxa_credito_avista_stone"
           data-parsley-trigger="change" value="<?= $taxa["taxa_credito_avista_stone"]; ?>" readonly/>
</div>

<div class="col-md-4 col-sm-4 col-xs-12 form-group">
    <label for="conta">Taxa Crédito Stone(2x-6x)* :</label>
    <input type="text" id="conta" class="form-control" name="taxa_credito26stone"
           data-parsley-trigger="change" value="<?= $taxa["taxa_credito26stone"]; ?>" readonly/>
</div>

<div class="col-md-4 col-sm-4 col-xs-12 form-group">
    <label for="conta">Taxa Crédito Stone(7x-12x)* :</label>
    <input type="text" id="conta" class="form-control" name="taxa_credito712stone"
           data-parsley-trigger="change" value="<?= $taxa["taxa_credito712stone"]; ?>" readonly/>
</div>

<div class="clearfix"></div>
<div class="x_title">
    <h2><?= $taxa["bandeira"]; ?> - Taxas Masterpay </h2>
    <div class="clearfix"></div>
</div>

<!-- Taxas Masterpay -->
<div class="col-md-4 col-sm-4 col-xs-12 form-group">
    <label for="conta">Taxa Débito Masterpay* :</label>
    <input type="text" id="conta" class="form-control" name="taxa_debito_masterpay"
           data-parsley-trigger="change" value="<?= $taxa["taxa_debito_masterpay"]; ?>" required/>
</div>

<div class="col-md-4 col-sm-4 col-xs-12 form-group">
    <label for="conta">Taxa Crédito à vista Masterpay* :</label>
    <input type="text" id="conta" class="form-control" name="taxa_credito_avista_masterpay"
           data-parsley-trigger="change" value="<?= $taxa["taxa_credito_avista_masterpay"]; ?>" required/>
</div>

<div class="col-md-4 col-sm-4 col-xs-12 form-group">
    <label for="agencia">Taxa Crédito Masterpay(2x-6x)* :</label>
    <input type="text" id="agencia" class="form-control" name="taxa_credito26masterpay"
           data-parsley-trigger="change" value="<?= $taxa["taxa_credito26masterpay"]; ?>" required/>
</div>

<div class="col-md-4 col-sm-4 col-xs-12 form-group">
    <label for="conta">Taxa Crédito Masterpay(7x-12x)* :</label>
    <input type="text" id="conta" class="form-control" name="taxa_credito712masterpay"
           data-parsley-trigger="change" value="<?= $taxa["taxa_credito712masterpay"]; ?>" required/>
</div>