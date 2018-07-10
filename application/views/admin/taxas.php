<!-- page content -->
<div class="right_col" role="main">

<div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Taxas Combinadas <small>Suas Taxas</small></h2>
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
                    <p class="text-muted font-13 m-b-30">
                      <!-- The Buttons extension for DataTables provides a common set of options, API methods and styling to display buttons on a page that will interact with a DataTable. The core library provides the based framework upon which plug-ins can built. -->
                    </p>
                    <table class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>Bandeira</th>
                          <th>Débito</th>
                          <th>Crédito Avista</th>
                          <th>Crédito 2x - 6x</th>
                          <th>Crédito 7x - 12x</th>
                        </tr>
                      </thead>

                      <tbody>

                      <?php foreach ($taxas as $item) { ?>
                          <tr>
                                 <?php if($item->bandeira == 'VISA') { ?>
                                   <td> <img width="40" src="<?= base_url(); ?>assets/images/visa.jpg"> </td>
                                  <?php } ?>

                                  <?php if($item->bandeira == 'MASTERCARD') { ?>
                                    <td><img width="40" src="<?= base_url(); ?>assets/images/master.jpg"></td>
                                  <?php } ?>

                                  <?php if($item->bandeira == 'ELO') { ?>
                                    <td><img width="40" src="<?= base_url(); ?>assets/images/elo.jpg"></td>
                                  <?php } ?>

                                  <?php if($item->bandeira == 'HIPERCARD') { ?>
                                    <td><img width="40" src="<?= base_url(); ?>assets/images/hipercard.jpg"></td>
                                  <?php } ?>

                            <td>
                              <?= $item->taxa_debito_masterpay==0.00 ? 'NÃO SE APLICA' :  number_format($item->taxa_debito_masterpay,2,',','.'); ?>%
                            </td>
                            <td><?= number_format($item->taxa_credito_avista_masterpay,2,',','.'); ?>%</td>
                            <td><?= number_format($item->taxa_credito26masterpay,2,',','.'); ?>%</td>
                            <td><?= number_format($item->taxa_credito712masterpay,2,',','.'); ?>%</td>
                          </tr>
                        <?php } ?>

                      </tbody>
                    </table>
                  </div>
                </div>
              </div>


</div>
        <!-- /page content -->