<!-- page content -->
<div class="right_col" role="main">
    <?php
    require_once 'Mobile_Detect.php';
    $detect = new Mobile_Detect;
    ?>
    <div class="col-md-25 col-sm-32 col-xs14">
        <div class="x_panel">
            <div class="x_title">
                <h2>Transações
                    <small>Últimas Transações</small>
                </h2>
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
                <p class="text-muted font-13 m-b-30">
                    <!-- The Buttons extension for DataTables provides a common set of options, API methods and styling to display buttons on a page that will interact with a DataTable. The core library provides the based framework upon which plug-ins can built. -->
                </p>

                <div class="row">
                    <form method="post" action="<?= base_url(); ?>menu/transacoesIntervalo">
                        <div class='col-sm-2'>

                            <div class="form-group">
                                <div class='input-group date' id='datainicio'>
                                    <input type="text" name="datainicio" value="<?= $dataInicio; ?>"
                                           class="form-control"/>
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-calendar"></span>
                                      </span>
                                </div>
                            </div>
                        </div>

                        <div class='col-sm-2'>

                            <div class="form-group">
                                <div class='input-group date' id='datafim'>
                                    <input type="text" name="datafim" value="<?= $dataFim; ?>" class="form-control"/>
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-calendar"></span>
                                      </span>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-2">

                            <div class="form-group">
                                <input type="submit" class="btn btn-primary" value="Consultar" class="form-control"/>
                            </div>
                        </div>

                    </form>
                </div>
                <br/>

                <table class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <?php if (!$detect->isMobile()) { ?>
                            <th style="text-align: center">Data/Hora Venda</th>
                        <?php } else { ?>
                            <th style="text-align: center">Data/Hora</th>
                        <?php } ?>

                        <?php if (!$detect->isMobile()) { ?>
                            <th style="text-align: center">Tipo</th>
                            <th style="text-align: center">Bandeira</th>
                            <th style="text-align: center">Autorização</th>
                        <?php } ?>

                        <?php if (!$detect->isMobile()) { ?>
                            <th style="text-align: center">Valor Bruto (R$)</th>
                        <?php } else { ?>
                            <th style="text-align: center">Valor(R$)</th>
                        <?php } ?>

                        <?php if (!$detect->isMobile()) { ?>
                            <th style="text-align: center">Valor Liquído (R$)</th>
                        <?php }
                        ?>
                        <?php if ($this->session->userdata('usuario_logado')['perfil'] != 'CLIENTE') { ?>
                            <?php if (!$detect->isMobile()) { ?>
                                <th>Estabelecimento</th>
                            <?php } else { ?>
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

                            <?php if (!$detect->isMobile()) { ?>
                                <td style="text-align: center">
                                    <?php if ($item->product_name == 'DÉBITO') { ?>
                                        <span class="label label-primary">
                                  <?= $item->product_name; ?>
                              </span>
                                    <?php } ?>
                                    <?php if ($item->product_name == 'CRÉDITO À VISTA' or $item->product_name == 'CRÉDITO SEM JUROS') { ?>
                                        <span class="label label-success">
                                  <?= $item->product_name; ?>
                               </span>
                                    <?php } ?>
                                    <?php if ($item->product_name == 'CANCELAMENTO') { ?>
                                        <span class="label label-danger">
                                  ESTORNADA
                               </span>
                                    <?php } ?>

                                    <?php if ($item->product_name == 'PARCELAMENTO SEM JUROS') { ?>
                                        <span class="label label-warning">
                                  PARCELADO
                               </span>
                                    <?php } ?>

                                </td>
                            <?php } ?>
                            <?php if (!$detect->isMobile()) { ?>
                                <td style="text-align: center">
                                    <?php if ($item->brand == 'VISA ELECTRON') { ?>
                                        <img width="40" src="<?= base_url(); ?>assets/images/visa.png">
                                    <?php } ?>

                                    <?php if ($item->brand == 'VISA') { ?>
                                        <img width="40" src="<?= base_url(); ?>assets/images/visa.png">
                                    <?php } ?>

                                    <?php if ($item->brand == 'MAESTRO') { ?>
                                        <img width="40" src="<?= base_url(); ?>assets/images/master.jpg">
                                    <?php } ?>

                                    <?php if ($item->brand == 'MASTERCARD') { ?>
                                        <img width="40" src="<?= base_url(); ?>assets/images/master.jpg">
                                    <?php } ?>

                                    <?php if ($item->brand == 'ELO DEBITO' or $item->brand == 'ELO CREDITO') { ?>
                                        <img width="40" src="<?= base_url(); ?>assets/images/elo.png">
                                    <?php } ?>

                                    <?php if ($item->brand == 'HIPERCARD') { ?>
                                        <img width="40" src="<?= base_url(); ?>assets/images/hipercard.jpg">
                                    <?php } ?>

                                </td>
                                <td style="text-align: center"><?= $item->authorization_number; ?></td>

                            <?php } ?>

                            <td style="text-align: right"><?= number_format($item->value, 2, ',', '.'); ?></td>

                            <?php if (!$detect->isMobile()) { ?>
                                <td style="text-align: right"><?= number_format($item->valor_liquido, 2, ',', '.'); ?></td>
                            <?php } ?>

                            <?php if ($this->session->userdata('usuario_logado')['perfil'] != 'CLIENTE') { ?>
                                <td><?= $item->comercial_name; ?></td>
                            <?php } ?>
                            <td style="text-align: center">
                                <?php if ($item->product_name == 'CANCELAMENTO') { ?>
                                    <?php if (!$detect->isMobile()) { ?>
                                        <span class="label label-danger">
                                  ESTORNADA
                               </span>
                                    <?php } else { ?>
                                        <span class="label label-danger">
                              <i class="fa fa-thumbs-down"></i>
                               </span>
                                    <?php } ?>
                                <?php } else { ?>
                                    <?php if (!$detect->isMobile()) { ?>
                                        <span class="label label-success">APROVADA</span>
                                    <?php } else { ?>
                                        <span class="label label-success">
                              <i class="fa fa-thumbs-up"></i>
                               </span>
                                    <?php } ?>
                                <?php } ?>
                            </td>
                        </tr>
                    <?php } ?>

                    </tbody>
                    <tfooter>
                        <tr>
                            <?php if (!$detect->isMobile()) { ?>
                                <td></td>
                                <td></td>
                                <td></td>
                            <?php } ?>
                            <td></td>


                            <td style="text-align: right; background-color: #ddd; font-color: #337ab7">
                                <span style="font-color: #337ab7;font-size: 18px"><?= number_format($totalBruto, 2, ',', '.'); ?></span>
                            </td>

                            <?php if (!$detect->isMobile()) { ?>
                                <td style="text-align: right; background-color: #ddd; ">
                                    <span style="font-color: #337ab7;font-size: 18px"><?= number_format($totalLiquido, 2, ',', '.'); ?></span>
                                </td>
                            <?php } ?>

                            <?php if ($this->session->userdata('usuario_logado')['perfil'] != 'CLIENTE') { ?>
                                <td></td>
                            <?php } ?>
                            <td></td>
                        </tr>
                    </tfooter>
                </table>
                <ul class="pagination">
                    <?php echo $pagination ?>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- /page content -->