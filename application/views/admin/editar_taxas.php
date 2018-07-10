<!-- page content -->
<div class="right_col" role="main">

<div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Taxas Combinadas <small>Editar Taxas</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#">Settings 1</a>
                          </li>
                          <li><a href="#">Settings 2</a>
                          </li>
                        </ul>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                  
                  <form id="demo-form" method="post" action="<?= base_url(); ?>taxa" data-parsley-validate>
                      
                      <div class="col-md-12 col-sm-12 col-xs-12 form-group">
                        <label for="fullname">Estabelecimento* :</label>
                          <select onchange="submit()" id="estabelecimento" name="estabelecimento" class="form-control" required>
                            <option value=""></option>
                            <?php foreach ($estabelecimentos as $item) { ?>
                            <option value="<?= $item->id; ?>"> <?= $item->comercial_name; ?></option>
                            <?php } ?>
                        </select>
                        </div>

                    <table class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>Bandeira</th>
                          <th style="text-align: center">Débito</th>
                          <th style="text-align: center">Crédito Avista</th>
                          <th style="text-align: center">Crédito 2x - 6x</th>
                          <th style="text-align: center">Crédito 7x - 12x</th>
                        </tr>
                      </thead>

                      <tbody>
                      
                      <?php foreach ($taxas as $item) { ?>
                          <tr>
                                 <?php if($item->bandeira == 'VISA') { ?>
                                   <td style="text-align: center"> <img width="40" src="<?= base_url(); ?>assets/images/visa.jpg"> </td>
                                  <?php } ?>

                                  <?php if($item->bandeira == 'MASTERCARD') { ?>
                                    <td style="text-align: center"><img width="40" src="<?= base_url(); ?>assets/images/master.jpg"></td>
                                  <?php } ?>

                                  <?php if($item->bandeira == 'ELO') { ?>
                                    <td style="text-align: center"><img width="40" src="<?= base_url(); ?>assets/images/elo.jpg"></td>
                                  <?php } ?>

                                  <?php if($item->bandeira == 'HIPERCARD') { ?>
                                    <td style="text-align: center"><img width="40" src="<?= base_url(); ?>assets/images/hipercard.jpg"></td>
                                  <?php } ?>

                            <td style="text-align: center"><input style="text-align: center" type="text" name="<?=$item->bandeira?>DEBITO" value="<?= number_format($item->taxa_debito_masterpay,2,',','.'); ?>%"</td>
                            <td style="text-align: center"><input style="text-align: center" type="text" name="<?=$item->bandeira?>CREDITOAVISTA" value="<?= number_format($item->taxa_credito_avista_masterpay,2,',','.'); ?>%"</td>
                            <td style="text-align: center"><input style="text-align: center" type="text" name="<?=$item->bandeira?>CREDITO26" value="<?= number_format($item->taxa_credito26masterpay,2,',','.'); ?>%"</td>
                            <td style="text-align: center"><input style="text-align: center" type="text" name="<?=$item->bandeira?>CREDITO712" value="<?= number_format($item->taxa_credito712masterpay,2,',','.'); ?>%"</td>
                          </tr>
                        <?php } ?>
                            
                      </tbody>
                    </table>
                  
                  <div style="text-align: right">
                      <button type="submit" class="btn btn-primary">Salvar</button>
                  </div>

                    </form>
                  </div>
                </div>
              </div>
</div>
        <!-- /page content -->
<script type="text/javascript">
      function carregarTaxas(estabelecimento){
        alert(estabelecimento);
      }
</script>