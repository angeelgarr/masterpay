<!-- page content -->
<div class="right_col" role="main">

<!-- <div class="row">
  <div class="x_panel">
      <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
          <span class="count_top"><i class="fa fa-calendar"></i> Data Inicial</span>
          <input type="date" />
      </div>
      <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
          <span class="count_top"><i class="fa fa-calendar"></i> Data Final</span>
          <input type="date" />
      </div>
  </div>
</div> -->

<div class="x_panel">
          <!-- top tiles -->
          <div class="row tile_count">
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-list"></i> Operações</span>
              <div class="count"><?php echo $total_transacoes ?></div>
              <!-- <span class="count_bottom"><i class="green">4% </i> +</span> -->
            </div>
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-money"></i> Total Débito</span>
              <div class="count blue"> <?= number_format($total_debito,2,',','.'); ?></div>
              <!-- <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>3% </i> From last Week</span> -->
            </div>
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-money"></i> Total Crédito Avista</span>
              <div class="count blue"><?= number_format($total_credito_avista,2,',','.'); ?></div>
              <!-- <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>34% </i> From last Week</span> -->
            </div>
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-credit-card"></i> Total Parcelado</span>
              <div class="count blue"><div class="count blue"><?= number_format($total_credito_parcelado,2,',','.'); ?></div></div>
              <!-- <span class="count_bottom"><i class="red"><i class="fa fa-sort-desc"></i>12% </i> From last Week</span> -->
            </div>
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-shopping-cart"></i> Total Vendas</span>
              <div class="count red"><?= number_format($total_vendas,2,',','.'); ?></div>
              <!-- <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>34% </i> From last Week</span> -->
            </div>
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-usd"></i> 
                 <?= $this->session->userdata('usuario_logado')['perfil']=='CLIENTE' ? 'Total Líquido' : 'Tota Lucro' ?>
              </span>
              <div class="count green"><?= number_format($total_liquido_lucro,2,',','.'); ?></div>
              <!-- <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>34% </i> From last Week</span> -->
            </div>
          </div>
          <!-- /top tiles -->
</div>
<br/>
<div class="x_panel">
          <!-- top tiles -->
          <div class="row">
            
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-money"></i> Creditado Ontem</span>
              <div class="count blue"> <?= number_format($total_ontem,2,',','.'); ?></div>
              <!-- <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>3% </i> From last Week</span> -->
            </div>
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-money"></i> Creditado Hoje</span>
              <div class="count blue"><?= number_format($total_hoje,2,',','.'); ?></div>
              <!-- <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>34% </i> From last Week</span> -->
            </div>
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-money"></i> Creditar Amanhã</span>
              <div class="count blue"><div class="count blue"><?= number_format($total_amanha,2,',','.'); ?></div></div>
              <!-- <span class="count_bottom"><i class="red"><i class="fa fa-sort-desc"></i>12% </i> From last Week</span> -->
            </div>
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-money"></i> Mês Atual</span>
              <div class="count green"><?= number_format($total_mes_atual,2,',','.'); ?></div>
              <!-- <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>34% </i> From last Week</span> -->
            </div>
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-money"></i> Mês Seguinte</span>
              <div class="count green"><?= number_format($total_mes_seguinte,2,',','.'); ?></div>
              <!-- <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>34% </i> From last Week</span> -->
            </div>

            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-money"></i> Créditos Futuro</span>
              <div class="count green"><?= number_format($total_pendente,2,',','.'); ?></div>
              <!-- <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>34% </i> From last Week</span> -->
            </div>

          </div>
          <!-- /top tiles -->
</div>
          <br />

          
                <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Transações do Dia</h2>
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
                  <?php 
                          require_once 'Mobile_Detect.php';
                          $detect = new Mobile_Detect; 
                          
                    ?>
                     <table class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th style="text-align: center">Data/Hora Venda</th>
                          <?php if(!$detect->isMobile()) { ?>
                            <th style="text-align: center">Tipo</th>
                          <?php } ?>
                          <?php if(!$detect->isMobile()) { ?>
                             <th style="text-align: center">Bandeira</th>
                          <?php } ?>
                         
                          <?php if(!$detect->isMobile()) { ?>
                            <th style="text-align: center">Autorização</th>
                          <?php } ?>    
                          <?php if(!$detect->isMobile()) { ?>
                            <th style="text-align: center">Valor Bruto (R$)</th>
                          <?php } else { ?>
                            <th style="text-align: center">Valor(R$)</th>   
                          <?php } ?>
                          
                          <?php if(!$detect->isMobile()) { ?>
                            <th style="text-align: center">Valor Liquído (R$)</th>
                          <?php } ?>   

                          <?php if($this->session->userdata('usuario_logado')['perfil']!='CLIENTE') { ?>
                            <?php if(!$detect->isMobile()) { ?>
                              <th>Estabelecimento</th>
                            <?php } else {  ?>
                              <th>Estab.</th>
                            <?php } ?> 
                          <?php } ?>
                          <th style="text-align: center">Status</th>
                        </tr>
                      </thead>

                      <tbody>
                   
                     <?php $totalBruto = 0 ?>
                     <?php $totalLiquido = 0 ?>
                      <?php foreach ($transacoes as $item) { ?>
                        <?php $totalBruto = $totalBruto + $item->value ?>
                        <?php $totalLiquido = $totalLiquido + $item->valor_liquido ?>
                        <tr>
                          <td style="text-align: center"><?= date('d/m/Y H:i:s', strtotime($item->payment_date)); ?></td>
                         
                          <?php if(!$detect->isMobile()) { ?>
                          <td style="text-align: center">
                              <?php if($item->product_name == 'DÉBITO') { ?>
                                <span class="label label-primary">
                                  <?= $item->product_name; ?>
                              </span>
                              <?php } ?>
                              <?php if($item->product_name == 'CRÉDITO À VISTA' or $item->product_name == 'CRÉDITO SEM JUROS' ) { ?>
                                <span class="label label-success">
                                  <?= $item->product_name; ?>
                               </span>
                              <?php } ?>
                              <?php if($item->product_name == 'CANCELAMENTO') { ?>
                                <span class="label label-danger">
                                  ESTORNADA
                               </span>
                              <?php } ?>

                              <?php if($item->product_name == 'PARCELAMENTO SEM JUROS') { ?>
                                <span class="label label-warning">
                                  PARCELADO
                               </span>
                               <?php if($item->parcels > 0) { ?>
                                <span class="label label-warning">
                                  (<?= $item->parcels; ?>x)
                               </span>
                               <?php } ?>
                              <?php } ?>    

                          </td>
                          <?php } ?>


                          <?php if(!$detect->isMobile()) { ?>
                          <td style="text-align: center">
                                  <?php if($item->brand == 'VISA ELECTRON') { ?>
                                    <img width="40" src="<?= base_url(); ?>assets/images/visa.png">
                                  <?php } ?>

                                   <?php if($item->brand == 'VISA') { ?>
                                    <img width="40" src="<?= base_url(); ?>assets/images/visa.png">
                                  <?php } ?>

                                  <?php if($item->brand == 'MAESTRO') { ?>
                                    <img width="40" src="<?= base_url(); ?>assets/images/master.jpg">
                                  <?php } ?>

                                  <?php if($item->brand == 'MASTERCARD') { ?>
                                    <img width="40" src="<?= base_url(); ?>assets/images/master.jpg">
                                  <?php } ?>

                                  <?php if($item->brand == 'ELO DEBITO' or $item->brand == 'ELO CREDITO' ) { ?>
                                    <img width="40" src="<?= base_url(); ?>assets/images/elo.png">
                                  <?php } ?>

                                  <?php if($item->brand == 'HIPERCARD') { ?>
                                    <img width="40" src="<?= base_url(); ?>assets/images/hipercard.jpg">
                                  <?php } ?>

                          </td>
                          <?php } ?> 
                          <?php if(!$detect->isMobile()) { ?>
                          <td style="text-align: center"><?= $item->authorization_number; ?></td>
                          <?php } ?>

                          <td style="text-align: right"><?= number_format($item->value,2,',','.'); ?></td>
                          
                          <?php if(!$detect->isMobile()) { ?>
                            <td style="text-align: right"><?= number_format($item->valor_liquido,2,',','.'); ?></td>
                          <?php } ?>

                          <?php if($this->session->userdata('usuario_logado')['perfil'] !='CLIENTE') { ?>
                              <td><?= $item->comercial_name; ?></td>
                          <?php } ?>
                          <td style="text-align: center">
                          <?php if($item->product_name == 'CANCELAMENTO') { ?>
                            <?php if(!$detect->isMobile()) { ?>  
                              <span class="label label-danger">
                                  ESTORNADA
                               </span>
                            <?php } else { ?>
                              <span class="label label-danger">
                                    <i class="fa fa-thumbs-down"></i>
                               </span>
                            <?php } ?>
                          <?php } else { ?>
                            <?php if(!$detect->isMobile()) { ?>  
                              <span class="label label-success">APROVADA</span>
                            <?php } else { ?>
                              <span class="label label-success"><i class="fa fa-thumbs-up"></i></span>
                            <?php } ?>  
                          <?php } ?>
                          </td>
                        </tr>
                      <?php } ?>

                      </tbody>
                      <tfooter>
                            <tr>
                            <?php if(!$detect->isMobile()) { ?>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            
                                <td style="text-align: right; background-color: #ddd; font-color: #337ab7">
                                    <span style="font-color: #337ab7;font-size: 18px"><?= number_format($totalBruto,2,',','.'); ?></span>
                                </td>
                                <td style="text-align: right; background-color: #ddd; ">
                                    <span style="font-color: #337ab7;font-size: 18px"><?= number_format($totalLiquido,2,',','.'); ?></span>
                                </td>
                              
                                <td></td>
                                <?php if($this->session->userdata('usuario_logado')['perfil'] !='CLIENTE') { ?>
                                <td></td>
                                <?php } ?>
                          <?php } ?>
                            </tr>
                      </tfooter>
                    </table>
                    </div>
                    </div>

<div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Transações por Bandeira e Tipo</h2>
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
                          <th style="text-align: center">BANDEIRA</th>
                          <th style="text-align: center">DÉBITO</th>
                          <th style="text-align: center">CRÉDITO AVISTA</th>
                          <th style="text-align: center">CRÉDITO PARCELADO</th>
                        </tr>
                      </thead>
                      <tbody>

                        <?php foreach ($total_brands as $brand) { ?>
                          <tr>
                            <?php if($brand->brand == 'VISA') { ?>
                              <td style="text-align: center"><img width="40" src="<?= base_url(); ?>assets/images/visa.png"></td>
                              
                              <?php if($brand->product_name == 'DÉBITO') { ?>
                                <td style="text-align: center"><span><?= number_format($brand->total,2,',','.');?></span></td>
                              <?php } else { ?>
                                <td style="text-align: center"><span>0,00</span></td>
                              <?php } ?>

                              <?php if($brand->product_name == 'CRÉDITO À VISTA') { ?>
                                <td style="text-align: center"><span><?= number_format($brand->total,2,',','.'); ?></span></td>
                                <?php } else { ?>
                                <td style="text-align: center"><span>0,00</span></td>
                            <?php } ?>

                              <?php if($brand->product_name == 'CRÉDITO SEM JUROS') { ?>
                                <td style="text-align: center"><span><?= number_format($brand->total,2,',','.'); ?></span></td>
                                <?php } else { ?>
                                <td style="text-align: center"><span>0,00</span></td>
                              <?php } ?>
                            <?php } ?>

                            <?php if($brand->brand == 'VISA ELECTRON') { ?>
                              <td style="text-align: center"><img width="40" src="<?= base_url(); ?>assets/images/electron.png"></td>
                                <td style="text-align: center"><span><?= number_format($brand->total,2,',','.');?></span></td>
                                <td style="text-align: center"><span>0,00</span></td>
                                <td style="text-align: center"><span>0,00</span></td>
                            <?php } ?>

                            <?php if($brand->brand == 'MASTER') { ?>
                              <td style="text-align: center"><img width="40" src="<?= base_url(); ?>assets/images/visa.png"></td>
                              
                              <?php if($brand->product_name == 'DÉBITO') { ?>
                                <td style="text-align: center"><span><?= number_format($brand->total,2,',','.');?></span></td>
                              <?php } else { ?>
                                <td style="text-align: center"><span>0,00</span></td>
                              <?php } ?>

                              <?php if($brand->product_name == 'CRÉDITO À VISTA') { ?>
                                <td style="text-align: center"><span><?= number_format($brand->total,2,',','.'); ?></span></td>
                                <?php } else { ?>
                                <td style="text-align: center"><span>0,00</span></td>
                            <?php } ?>

                              <?php if($brand->product_name == 'CRÉDITO SEM JUROS') { ?>
                                <td style="text-align: center"><span><?= number_format($brand->total,2,',','.'); ?></span></td>
                                <?php } else { ?>
                                <td style="text-align: center"><span>0,00</span></td>
                              <?php } ?>
                            <?php } ?>

                            <?php if($brand->brand == 'MAESTRO') { ?>
                              <td style="text-align: center"><img width="40" src="<?= base_url(); ?>assets/images/maestro.png"></td>
                              
                              <?php if($brand->product_name == 'DÉBITO') { ?>
                                <td style="text-align: center"><span><?= number_format($brand->total,2,',','.');?></span></td>
                              <?php } ?>
                              <td style="text-align: center"><span>0,00</span></td>
                              <td style="text-align: center"><span>0,00</span></td>

                            <?php } ?>

                            <?php if($brand->brand == 'ELO DEBITO') { ?>
                              <td style="text-align: center"><img width="40" src="<?= base_url(); ?>assets/images/elo.png"></td>
                              
                              <?php if($brand->product_name == 'DÉBITO') { ?>
                                <td style="text-align: center"><span><?= number_format($brand->total,2,',','.');?></span></td>
                                <?php } ?>
                                
                                <td style="text-align: center"><span>0,00</span></td>

                                <td style="text-align: center"><span>0,00</span></td>

                            <?php } ?>

                            <?php if($brand->brand == 'HIPERCARD') { ?>
                              <td style="text-align: center"><img width="40" src="<?= base_url(); ?>assets/images/hipercard.jpg"></td>
                              
                              <?php if($brand->product_name == 'DÉBITO') { ?>
                                <td style="text-align: center"><span><?= number_format($brand->total,2,',','.');?></span></td>
                              <?php } else { ?>
                                <td style="text-align: center"><span>0,00</span></td>
                              <?php } ?>

                              <?php if($brand->product_name == 'CRÉDITO À VISTA') { ?>
                                <td style="text-align: center"><span><?= number_format($brand->total,2,',','.'); ?></span></td>
                                <?php } else { ?>
                                <td style="text-align: center"><span>0,00</span></td>
                            <?php } ?>

                              <?php if($brand->product_name == 'CRÉDITO SEM JUROS') { ?>
                                <td style="text-align: center"><span><?= number_format($brand->total,2,',','.'); ?></span></td>
                                <?php } else { ?>
                                <td style="text-align: center"><span>0,00</span></td>
                              <?php } ?>
                            <?php } ?>


                          </tr>
                        <?php } ?>

                        
                      </tbody>
                    </table>

                  </div>
                </div>


                </div>
              </div>

          </div>
