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

    


    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Demonstrativo de Transações</h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                               aria-expanded="false"><i class="fa fa-wrench"></i></a>
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
                            <th style="text-align: center">Estabelecimento</th>
                            <th style="text-align: center">Autorização</th>
                            <th style="text-align: center">Valor Venda</th>
                            <th style="text-align: center">Taxa Stone</th>
                            <th style="text-align: center">Lucro Stone</th>
                            <th style="text-align: center">Taxa Maxpay</th>
                            <th style="text-align: center">Lucro Maxpay</th>
                            <th style="text-align: center">Liquido Antes Antec.</th>
                            <th style="text-align: center">Taxa Antecipação</th>
                            <th style="text-align: center">Liquido Após Antec.</th>
                            <th style="text-align: center">Lucro Antecipação</th>

                        </tr>
                        </thead>
                        <tbody>

                        <?php foreach ($demostrativo_transacoes as $item) { ?>
                            <tr>
                                <td><?= $item->comercial_name ?></td>
                                <td><?= $item->numero_autorizacao ?></td>
                                <td style="text-align: right"><?= number_format($item->valor_transacao, 2, ',', '.'); ?></td>
                                <td style="text-align: right"><?= number_format($item->taxa_stone, 2, ',', '.'); ?></td>
                                <td style="text-align: right"><?= number_format($item->valor_stone, 2, ',', '.'); ?></td>
                                <td style="text-align: right"><?= number_format($item->taxa_masterpay, 2, ',', '.'); ?></td>
                                <td style="text-align: right"><?= number_format($item->lucro_masterpay, 2, ',', '.'); ?></td>
                                <td style="text-align: right"><?= number_format($item->liquido_antes_antec, 2, ',', '.'); ?></td>
                                <td style="text-align: right"><?= number_format($item->taxa_antecipacao, 2, ',', '.'); ?></td>
                                <td style="text-align: right"><?= number_format($item->liquido_apos_antec, 2, ',', '.'); ?></td>
                                <td style="text-align: right"><?= number_format($item->lucro_antec, 2, ',', '.'); ?></td>
                                
                            </tr>
                        <?php } ?>

                    </table>
                </div>
            </div>

    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Repartição de Receita da Antecipação</h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                               aria-expanded="false"><i class="fa fa-wrench"></i></a>
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
                            <th style="text-align: center">Período</th>
                            <th style="text-align: center">Valor Antecipação</th>
                            <th style="text-align: center">Valor Investidor</th>
                            <th style="text-align: center">Valor Individual</th>
                            <th style="text-align: center">Valor Maxpay</th>
                        </tr>
                        </thead>
                        <tbody>

                        <?php foreach ($lucro_antecipacao_socios as $item) { ?>
                            <tr>
                                <td><?= $item->periodo_ref ?></td>
                                <td style="text-align: right"><?= number_format($item->lucro_antecipacao, 2, ',', '.'); ?></td>
                                <td style="text-align: right"><?= number_format($item->investidor, 2, ',', '.'); ?></td>
                                <td style="text-align: right"><?= number_format($item->individual, 2, ',', '.'); ?></td>
                                <td style="text-align: right"><?= number_format($item->maxpay, 2, ',', '.'); ?></td>
                            </tr>
                        <?php } ?>

                    </table>
                </div>
            </div>
    </div>                        

</div>

                <style>
                    @media (min-width: 992px) {
                        .sales_today .tile_stats_count {
                            width: 13.666667%;
                        }
                    }
                </style>