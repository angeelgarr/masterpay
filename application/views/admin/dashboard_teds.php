<!-- page content -->
<div class="right_col" role="main">
<div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
      <?php 
                          require_once 'Mobile_Detect.php';
                          $detect = new Mobile_Detect; 
                    ?>

              <div class="x_panel">
                  <div class="x_title">
                  <?php if(!$detect->isMobile()) { ?>
                    <h2>Histórico de TED's Por Banco</h2>
                  <?php } else {?>
                    <h2>Histórico de TED's</h2>
                  <?php } ?> 
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

                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th style="text-align: left">Banco</th>
                          <th style="text-align: right">Valor</th>
                        </tr>
                      </thead> 
                      <tbody>
                          <?php foreach($total_historico_teds as $item) { ?>
                              <tr>
                                <?php if($item->codigo == '001') { ?>
                                  <td style="text-align: left"><img src="<?= base_url(); ?>assets/images/bb.png"></td>
                              <?php } ?>

                              <?php if($item->codigo == '104') { ?>
                                  <td style="text-align: left"><img src="<?= base_url(); ?>assets/images/cef.png"></td>
                              <?php } ?>

                              <?php if($item->codigo == '033') { ?>
                                  <td style="text-align: left"><img src="<?= base_url(); ?>assets/images/santander.png"></td>
                              <?php } ?>

                              <?php if($item->codigo == '237') { ?>
                                  <td style="text-align: left"><img src="<?= base_url(); ?>assets/images/bradesco.png"></td>
                              <?php } ?>

                              <?php if($item->codigo == '004') { ?>
                                  <td style="text-align: left"><img src="<?= base_url(); ?>assets/images/bnb.png"></td>
                              <?php } ?>

                              <?php if($item->codigo == '341') { ?>
                                  <td style="text-align: left"><img src="<?= base_url(); ?>assets/images/bancoitau.png"></td>
                              <?php } ?>

                                <td style="text-align: right"><span><?= number_format($item->valor,2,',','.');?></span></td>
                              
                              </tr>
                          <?php } ?>
                      </tbody>
                    </table>

                  </div>
            </div>

                <div class="x_panel">
                  <div class="x_title">
                    <h2>TED's Para Hoje</h2>
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

                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th style="text-align: left">Banco</th>
                          <th style="text-align: left">Estabelecimento</th>
                          <?php if(!$detect->isMobile()) { ?>  
                              <th style="text-align: center">CPF/CNPJ</th>
                              <th style="text-align: center">Código Banco</th>
                              <th style="text-align: center">Agência</th>
                              <th style="text-align: center">Conta</th>
                              <th style="text-align: center">Tipo Conta</th>
                          <?php } ?> 
                          <th style="text-align: center">Valor</th>
                          <th style="text-align: center">Status</th>
                        </tr>
                      </thead> 
                      <tbody>
                          <?php foreach($total_teds_hoje as $item) { ?>
                              <tr>
                              <?php if($item->codigo == '001') { ?>
                                <?php if(!$detect->isMobile()) { ?>  
                                  <td style="text-align: left"><img src="<?= base_url(); ?>assets/images/bb.png"></td>
                                <?php } else { ?>
                                  <td style="text-align: left"><img width="70" src="<?= base_url(); ?>assets/images/bb.png"></td>
                                <?php } ?>  
                              <?php } ?>

                              <?php if($item->codigo == '104') { ?>
                                <?php if(!$detect->isMobile()) { ?>  
                                  <td style="text-align: left"><img src="<?= base_url(); ?>assets/images/cef.png"></td>
                                <?php } else { ?>
                                  <td style="text-align: left"><img width="70" src="<?= base_url(); ?>assets/images/cef.png"></td>
                                <?php } ?>  
                              <?php } ?>

                              <?php if($item->codigo == '033') { ?>
                                <?php if(!$detect->isMobile()) { ?>  
                                  <td style="text-align: left"><img src="<?= base_url(); ?>assets/images/santander.png"></td>
                                <?php } else { ?>
                                  <td style="text-align: left"><img width="70" src="<?= base_url(); ?>assets/images/santander.png"></td>
                                <?php } ?>  
                              <?php } ?>

                               <?php if($item->codigo == '237') { ?>
                                <?php if(!$detect->isMobile()) { ?>  
                                  <td style="text-align: left"><img src="<?= base_url(); ?>assets/images/bradesco.png"></td>
                                <?php } else { ?>
                                  <td style="text-align: left"><img width="70" src="<?= base_url(); ?>assets/images/brandesco.png"></td>
                                <?php } ?>  
                              <?php } ?>
                            
                              <?php if($item->codigo == '004') { ?>
                                <?php if(!$detect->isMobile()) { ?>  
                                  <td style="text-align: left"><img src="<?= base_url(); ?>assets/images/bnb.png"></td>
                                <?php } else { ?>
                                  <td style="text-align: left"><img width="70" src="<?= base_url(); ?>assets/images/bnb.png"></td>
                                <?php } ?>  
                              <?php } ?>

                              <?php if($item->codigo == '341') { ?>
                                <?php if(!$detect->isMobile()) { ?>  
                                  <td style="text-align: left"><img src="<?= base_url(); ?>assets/images/bancoitau.png"></td>
                                <?php } else { ?>
                                  <td style="text-align: left"><img width="70" src="<?= base_url(); ?>assets/images/bancoitau.png"></td>
                                <?php } ?>  
                              <?php } ?>

                                <td style="text-align: left"><span><?= $item->comercial_name ?></span></td>

                                <?php if(!$detect->isMobile()) { ?>  
                                  <td style="text-align: center"><span><?= $item->national_id ?></span></td>
                                  <td style="text-align: center"><span><?= $item->codigo ?></span></td>
                                  <td style="text-align: center"><span><?= $item->agencia ?></span></td>
                                  <td style="text-align: center"><span><?= $item->conta ?></span></td>
                                
                                <?php if ($item->tipo_conta == 'CC') { ?>
                                  <td style="text-align: center;"><span class="label label-primary" >CORRENTE</span></td>
                                <?php } else { ?> 
                                  <td style="text-align: center;"><span class="label label-success" >POUPANÇA</span></td>
                                <?php } ?>

                                <?php } ?> 

                                <td style="text-align: right"><span><?= number_format($item->valor,2,',','.');?></span></td>
                              
                                <?php if ($item->status == 1) { ?>
                                  <?php if(!$detect->isMobile()) { ?>  
                                    <td style="text-align: center;"><span class="label label-primary" >PAGO</span></td>
                                  <?php } else { ?>
                                    <td style="text-align: center;"><span class="label label-primary" ><i class="fa fa-thumbs-up"></i></span></td>
                                  <?php } ?>  

                                <?php } else { ?>
                                  <?php if(!$detect->isMobile()) { ?>   
                                     <td style="text-align: center;"><span class="label label-danger" >PENDENTE</span></td>
                                  <?php } else { ?>
                                    <td style="text-align: center;"><span class="label label-danger" ><i class="fa fa-thumbs-down"></i></span></td>
                                  <?php } ?>  
                                <?php } ?>


                              </tr>
                          <?php } ?>
                      </tbody>
                    </table>

                  </div>
            </div>


            <div class="x_panel">
                  <div class="x_title">
                  <?php if(!$detect->isMobile()) { ?>
                    <h2>TED's Por Banco para Amanhã</h2>
                  <?php } else {?>
                    <h2>TED's para Amanhã</h2>
                  <?php } ?> 

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

                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th style="text-align: left">Banco</th>
                          <th style="text-align: right">Valor</th>
                        </tr>
                      </thead> 
                      <tbody>
                          <?php foreach($total_ted_amanha as $item) { ?>
                              <tr>
                                <?php if($item->codigo == '001') { ?>
                                  <td style="text-align: left"><img src="<?= base_url(); ?>assets/images/bb.png"></td>
                              <?php } ?>

                              <?php if($item->codigo == '104') { ?>
                                  <td style="text-align: left"><img src="<?= base_url(); ?>assets/images/cef.png"></td>
                              <?php } ?>

                              <?php if($item->codigo == '033') { ?>
                                  <td style="text-align: left"><img src="<?= base_url(); ?>assets/images/santander.png"></td>
                              <?php } ?>

                              <?php if($item->codigo == '237') { ?>
                                  <td style="text-align: left"><img src="<?= base_url(); ?>assets/images/bradesco.png"></td>
                              <?php } ?>

                              <?php if($item->codigo == '004') { ?>
                                  <td style="text-align: left"><img src="<?= base_url(); ?>assets/images/bnb.png"></td>
                              <?php } ?>

                              <?php if($item->codigo == '341') { ?>
                                  <td style="text-align: left"><img src="<?= base_url(); ?>assets/images/bancoitau.png"></td>
                              <?php } ?>

                                <td style="text-align: right"><span><?= number_format($item->valor,2,',','.');?></span></td>
                              
                              </tr>
                          <?php } ?>
                      </tbody>
                    </table>

                  </div>
            </div>                    


            <div class="x_panel">
                  <div class="x_title">
                    <h2>TED's Para Mês Atual</h2>
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

                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th style="text-align: left">Banco</th>
                          <th style="text-align: right">Valor</th>
                        </tr>
                      </thead> 
                      <tbody>
                          <?php foreach($total_teds_mes as $item) { ?>
                              <tr>
                                <?php if($item->codigo == '001') { ?>
                                  <td style="text-align: left"><img src="<?= base_url(); ?>assets/images/bb.png"></td>
                              <?php } ?>

                              <?php if($item->codigo == '104') { ?>
                                  <td style="text-align: left"><img src="<?= base_url(); ?>assets/images/cef.png"></td>
                              <?php } ?>

                              <?php if($item->codigo == '033') { ?>
                                  <td style="text-align: left"><img src="<?= base_url(); ?>assets/images/santander.png"></td>
                              <?php } ?>

                              <?php if($item->codigo == '237') { ?>
                                  <td style="text-align: left"><img src="<?= base_url(); ?>assets/images/bradesco.png"></td>
                              <?php } ?>

                              <?php if($item->codigo == '004') { ?>
                                  <td style="text-align: left"><img src="<?= base_url(); ?>assets/images/bnb.png"></td>
                              <?php } ?>

                              <?php if($item->codigo == '341') { ?>
                                  <td style="text-align: left"><img src="<?= base_url(); ?>assets/images/bancoitau.png"></td>
                              <?php } ?>

                                <td style="text-align: right"><span><?= number_format($item->valor,2,',','.');?></span></td>
                              
                              </tr>
                          <?php } ?>
                      </tbody>
                    </table>

                  </div>
            </div>


            <div class="x_panel">
                  <div class="x_title">
                  <?php if(!$detect->isMobile()) { ?>
                    <h2>TED's Para Mês Seguinte</h2>
                  <?php } else {?>
                    <h2>TED's Mês Seguinte</h2>
                  <?php } ?> 
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

                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th style="text-align: left">Banco</th>
                          <th style="text-align: right">Valor</th>
                        </tr>
                      </thead> 
                      <tbody>
                          <?php foreach($total_ted_mes_seguinte as $item) { ?>
                              <tr>
                              
                              <?php if($item->codigo == '001') { ?>
                                  <td style="text-align: left"><img src="<?= base_url(); ?>assets/images/bb.png"></td>
                              <?php } ?>

                              <?php if($item->codigo == '104') { ?>
                                  <td style="text-align: left"><img src="<?= base_url(); ?>assets/images/cef.png"></td>
                              <?php } ?>

                              <?php if($item->codigo == '033') { ?>
                                  <td style="text-align: left"><img src="<?= base_url(); ?>assets/images/santander.png"></td>
                              <?php } ?>

                              <?php if($item->codigo == '237') { ?>
                                  <td style="text-align: left"><img src="<?= base_url(); ?>assets/images/bradesco.png"></td>
                              <?php } ?>

                              <?php if($item->codigo == '004') { ?>
                                  <td style="text-align: left"><img src="<?= base_url(); ?>assets/images/bnb.png"></td>
                              <?php } ?>

                              <?php if($item->codigo == '341') { ?>
                                  <td style="text-align: left"><img src="<?= base_url(); ?>assets/images/bancoitau.png"></td>
                              <?php } ?>

                                <td style="text-align: right"><span><?= number_format($item->valor,2,',','.');?></span></td>
                              </tr>
                          <?php } ?>
                      </tbody>
                    </table>

                  </div>
            </div>


        </div>
    </div>
  </div>
</div>
