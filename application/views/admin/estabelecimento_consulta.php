<!-- page content -->
<div class="right_col" role="main">
<?php 
      require_once 'Mobile_Detect.php';
      $detect = new Mobile_Detect; 
?>
<div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Estabelecimentos <small>Clientes Cadastrados</small></h2>
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
                          <th>ID Maxpay</th>
                          <?php if(!$detect->isMobile()) { ?>
                          <th>Nome Fantasia</th>
                          
                          <?php } else {?>
                            <th>Fantasia</th>
                          <?php }?> 

                          <?php if(!$detect->isMobile()) { ?>
                            <th>Responsável</th>
                          <?php } ?>

                          <?php if(!$detect->isMobile()) { ?>  
                            <th>Data/Hora Inclusão</th>
                          <?php } ?> 

                          <th>Status</th>
                          <?php if(!$detect->isMobile()) { ?>
                          <th>Sincronizado?</th>
                          <th>Data Sincronismo</th>
                          <th>Banco</th>
                          <th>Agencia</th>
                          <th>Conta</th>
                          <?php } ?>
                        </tr>
                      </thead>

                      <tbody>
                      <?php foreach ($estabelecimentos as $item) { ?>
                        
                        <tr>
                          <td><?= $item->idm; ?></td>
                          <td><?= $item->comercial_name; ?></td>
                          <?php if(!$detect->isMobile()) { ?>
                          <td><?= $item->name; ?></td>
                          <?php } ?>

                          <?php if(!$detect->isMobile()) { ?>
                            <td><?= date('d/m/Y H:i:s', strtotime($item->data_inclusao)); ?></td>
                          <?php } ?> 
                          
                          <td>
                              <span class="label <?= $item->status==1? 'label-success': 'label-danger'; ?>">
                              
                              <?php if(!$detect->isMobile()) { ?>  
                                <?= $item->status==1? 'ATIVO': 'INATIVO'; ?>
                              <?php } else { ?>
                                <?= $item->status==1? '<i class="fa fa-thumbs-up"></i>': '<i class="fa fa-thumbs-down"></i>'; ?>
                              <?php } ?>

                              </span>
                          </td>
                        <?php if(!$detect->isMobile()) { ?>
                          <td>
                              <span class="label <?= $item->sincronizado==1? 'label-success': 'label-danger'; ?>">
                                  <?= $item->sincronizado==1? 'SIM': 'NÃO'; ?>
                              </span>
                          </td>
                          
                            <td><?= date('d/m/Y H:i:s', strtotime($item->data_sincronismo)); ?></td>
                            <td><?= $item->descricao ?></td>
                            <td><?= $item->agencia ?></td>
                            <td><?= $item->conta ?></td>
                          <?php } ?>
                        </tr>
                      <?php } ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>


</div>
        <!-- /page content -->