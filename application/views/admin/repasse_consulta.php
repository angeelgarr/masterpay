<?php
require_once 'Mobile_Detect.php';
$detect = new Mobile_Detect;
?>
<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Consultar Repasses</h3>
            </div>
        </div>

        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Repasses
                            <small>Últimas Repasses</small>
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
                            <div class="col-md-8 col-sm-8 col-xs-12">
                                <form method="post" action="<?= base_url(); ?>menu/repassesIntervalo">
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <div class="input-group date" id="datainicio">
                                                <input type="text" name="datainicio" value="<?= $dataInicio; ?>"
                                                       class="form-control"/>
                                                <span class="input-group-addon">
                                                    <span class="glyphicon glyphicon-calendar"></span>
                                                  </span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <div class="input-group date" id="datafim">
                                                <input type="text" name="datafim" value="<?= $dataFim; ?>"
                                                       class="form-control"/>
                                                <span class="input-group-addon">
                                                    <span class="glyphicon glyphicon-calendar"></span>
                                                  </span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-4">
                                        <input type="text" name="textsearch" value="<?= $textSearch; ?>"
                                               class="form-control">
                                    </div>

                                    <div class="col-sm-2">
                                        <div class="form-group">
                                            <input type="submit" class="btn btn-primary" value="Consultar"
                                                   class="form-control"/>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <div class="row">
                            <table class="table table-striped table-bordered">
                                <thead>
                                <tr>
                                    <?php if (!$detect->isMobile()) { ?>
                                        <th>ID</th>
                                    <?php } ?>

                                    <?php if (!$detect->isMobile()) { ?>
                                        <th>Valor da Venda (R$)</th>
                                    <?php } ?>

                                    <?php if (!$detect->isMobile()) { ?>
                                        <th>Valor Líquido</th>
                                    <?php } else { ?>
                                        <th>Valor</th>
                                    <?php } ?>

                                    <?php if (!$detect->isMobile()) { ?>
                                        <th>Data/Hora Transação</th>
                                    <?php } else { ?>
                                        <th>Data/Hora</th>
                                    <?php } ?>
                                    <th>Data Repasse</th>
                                    <th>Status</th>
                                </tr>
                                </thead>

                                <tbody>

                                <?php foreach ($repasses as $item) { ?>
                                    <tr>
                                        <?php if (!$detect->isMobile()) { ?>
                                            <td><?= $item->id; ?></td>
                                        <?php } ?>

                                        <?php if (!$detect->isMobile()) { ?>
                                            <td style="text-align: right"><?= number_format($item->valor_transacao, 2, ',', '.'); ?></td>
                                        <?php } ?>
                                        <td style="text-align: right"><?= number_format($item->liquido_cliente, 2, ',', '.'); ?></td>
                                        <td style="text-align: center"><?= date('d/m/Y H:i:s', strtotime($item->data_transacao)); ?></td>
                                        <td style="text-align: center"><?= date('d/m/Y', strtotime($item->data_repasse)); ?></td>

                                        <?php if ($item->status == 'PENDENTE') { ?>
                                            <?php if (!$detect->isMobile()) { ?>
                                                <td style="text-align: center"><span
                                                            class="label label-danger">PENDENTE</span></td>
                                            <?php } else { ?>
                                                <td style="text-align: center"><span class="label label-danger">
                                          <i class="fa fa-thumbs-down"></i>
                                        </span></td>
                                            <?php } ?>
                                        <?php } ?>

                                        <?php if ($item->status == 'FILA_COMPENSACAO') { ?>
                                            <?php if (!$detect->isMobile()) { ?>
                                                <td style="text-align: center"><span
                                                            class="label label-primary">FILA COMPENSAÇÃO</span></td>
                                            <?php } else { ?>
                                                <td style="text-align: center">
                                         <span class="label label-primary">
                                         <i class="fa fa-thumbs-o-up"></i>
                                         </span>
                                                </td>
                                            <?php } ?>
                                        <?php } ?>

                                        <?php if ($item->status == 'COMPENSADO') { ?>
                                            <?php if (!$detect->isMobile()) { ?>
                                                <td style="text-align: center"><span
                                                            class="label label-success">COMPENSADO</span>
                                                </td>
                                            <?php } else { ?>
                                                <td style="text-align: center"><span class="label label-success">
                                      <i class="fa fa-thumbs-up"></i></span>
                                                </td>
                                            <?php } ?>
                                        <?php } ?>

                                    </tr>
                                <?php } ?>

                                </tbody>
                            </table>
                        </div>
                        <ul class="pagination">
                            <?php echo $pagination ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /page content -->