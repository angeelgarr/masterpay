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
              <span class="count_top"><i class="fa fa-list"></i> Transações</span>
              <div class="count"><?php echo $total_transacoes ?></div>
              <!-- <span class="count_bottom"><i class="green">4% </i> +</span> -->
            </div>

            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-money"></i> Total Vendas</span>
              <div class="count blue"><?= number_format($total_vendas,2,',','.'); ?></div>
              <!-- <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>3% </i> From last Week</span> -->
            </div>

            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-money"></i> Receita de Taxas</span>
              <div class="count green"><?= number_format($total_liquido_lucro,2,',','.'); ?></div>
              <!-- <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>3% </i> From last Week</span> -->
            </div>

            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-money"></i> Receita de Aluguel</span>
              <div class="count green"><?= number_format($lucros_total_aluguel,2,',','.'); ?></div>
              <!-- <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>34% </i> From last Week</span> -->
            </div>
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-money"></i> Receita Total</span>
              <div class="count blue"><?= number_format($receita_total,2,',','.'); ?></div>
              <!-- <span class="count_bottom"><i class="red"><i class="fa fa-sort-desc"></i>12% </i> From last Week</span> -->
            </div>
            
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
            <span class="count_top"><i class="fa fa-shopping-cart"></i> Ticket Médio</span>
              <div class="count red"><?= number_format($ticket_medio,2,',','.'); ?></div>
              <!-- <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>34% </i> From last Week</span> -->
            </div>

          </div>
          <!-- /top tiles -->
</div>
<br/>


<div class="x_panel">
          <!-- top tiles -->
          <div class="row tile_count">

          <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-money"></i> Transações Hoje</span>
              <div class="count blue"><?= number_format($total_transacoes_dia,2,',','.'); ?></div>
              <!-- <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>3% </i> From last Week</span> -->
            </div>

            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-money"></i> Vendas Hoje</span>
              <div class="count blue"><?= number_format($total_vendas_dia,2,',','.'); ?></div>
              <!-- <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>3% </i> From last Week</span> -->
            </div>

            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-money"></i> Lucro Taxas Hoje</span>
              <div class="count blue"><?= number_format($total_lucro_dia_taxas,2,',','.'); ?></div>
              <!-- <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>3% </i> From last Week</span> -->
            </div>

            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-money"></i> Lucro Antec. Hoje </span>
              <div class="count green"><?= number_format($total_lucro_dia_antecipacao,2,',','.'); ?></div>
              <!-- <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>3% </i> From last Week</span> -->
            </div>

            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-money"></i> Lucro Aluguel Hoje </span>
              <div class="count green"><?= number_format($total_lucro_aluguel_dia,2,',','.'); ?></div>
              <!-- <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>3% </i> From last Week</span> -->
            </div>

            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-money"></i>Lucro Total Hoje </span>
              <div class="count green"><?= number_format($total_lucro_dia_geral,2,',','.'); ?></div>
              <!-- <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>34% </i> From last Week</span> -->
            </div>
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-money"></i> Ticket Médio Hoje</span>
              <div class="count blue"><?= number_format($ticket_medio_dia,2,',','.'); ?></div>
              <!-- <span class="count_bottom"><i class="red"><i class="fa fa-sort-desc"></i>12% </i> From last Week</span> -->
            </div>
          </div>
          <!-- /top tiles -->
</div>


<br/>
<div class="x_panel">
          <!-- top tiles -->
          <div class="row">
              <?php foreach ($lucros_por_mes as $item) { ?>
               
                  <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
                      <?php if($item->mes == 'May') { ?>
                        <span class="count_top"><i class="fa fa-calendar"></i> Maio </span>
                      <?php } ?>

                      <?php if($item->mes == 'June') { ?>
                        <span class="count_top"><i class="fa fa-calendar"></i> Junho</span>
                      <?php } ?>

                      <?php if($item->mes == 'July') { ?>
                        <span class="count_top"><i class="fa fa-calendar"></i> Julho</span>
                      <?php } ?>

                      <?php if($item->mes == 'Agust') { ?>
                        <span class="count_top"><i class="fa fa-calendar"></i> Agosto</span>
                      <?php } ?>

                      <?php if($item->mes == 'September') { ?>
                        <span class="count_top"><i class="fa fa-calendar"></i>Setembro</span>
                      <?php } ?>

                      <?php if($item->mes == 'October') { ?>
                        <span class="count_top"><i class="fa fa-calendar"></i>Outubro</span>
                      <?php } ?>

                      <div class="count blue"><?= number_format($item->valor,2,',','.'); ?></div>
                      <!-- <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>3% </i> From last Week</span> -->
                    </div>
              <?php } ?> 

          </div> 
          <!-- /top tiles -->
</div>
          <br />

          
      <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Vendas Por Periodo</h2>
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
                     <table id="datatable" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                           <th style="text-align: center">Periodo Referência</th>
                            <th style="text-align: center">Estabelecimento</th>
                            <th style="text-align: center">Valor Bruto</th>
                            <th style="text-align: center">Valor Lucro</th>
                        </tr>
                      </thead>
                      <tbody>
                   
                      <?php foreach ($vendas_por_periodo as $item) { ?>
                        <tr>
                            <td><?= $item->periodo_ref ?></td>
                            <td><?= $item->comercial_name ?></td>
                            <td style="text-align: right"><?= number_format($item->valor_bruto,2,',','.'); ?></td>
                            <td style="text-align: right"><?= number_format($item->valor_lucro,2,',','.'); ?></td>
                        </tr>
                      <?php } ?>
                    
                    </table>
                    </div>
                    </div>




<div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Lucro Antecipação Por Periodo</h2>
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
                
                     <table id="datatable" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                           <th style="text-align: center">Periodo Referência</th>
                            <th style="text-align: center">Estabelecimento</th>
                            <th style="text-align: center">Valor Bruto</th>
                            <th style="text-align: center">Valor Lucro</th>
                        </tr>
                      </thead>
                      <tbody>
                   
                      <?php foreach ($lucro_antecipacao_por_periodo as $item) { ?>
                        <tr>
                            <td><?= $item->periodo_ref ?></td>
                            <td><?= $item->comercial_name ?></td>
                            <td style="text-align: right"><?= number_format($item->valor_bruto,2,',','.'); ?></td>
                            <td style="text-align: right"><?= number_format($item->valor_lucro,2,',','.'); ?></td>
                        </tr>
                      <?php } ?>
                    
                    </table>
                    </div>
                    </div>





<div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>TOP 10 Estabelecimento em Lucros</h2>
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
                          <th style="text-align: left">Estabelecimento</th>
                          <th style="text-align: right">Lucro</th>
                        </tr>
                      </thead>
                      <tbody>

                        <?php foreach ($maiores_lucros as $item) { ?>
                          <tr>
                            <td style="text-align: left"><?= $item->comercial_name ?></td>
                            <td style="text-align: right"><?= number_format($item->valor,2,',','.'); ?></td>
                          </tr>
                        <?php } ?>
                        
                      </tbody>
                    </table>

                  </div>
                </div>



                </div>
              </div>


<div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>TOP 10 Estabelecimento em Vendas</h2>
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
                          <th style="text-align: left">Estabelecimento</th>
                          <th style="text-align: right">Lucro</th>
                        </tr>
                      </thead>
                      <tbody>

                        <?php foreach ($maiores_estabelecimento as $item) { ?>
                          <tr>
                            <td><?= $item->comercial_name ?></td>
                            <td style="text-align: right"><?= number_format($item->valor,2,',','.'); ?></td>
                          </tr>
                        <?php } ?>
                        
                      </tbody>
                    </table>

                  </div>
                </div>

                </div>
              </div>

          </div>
