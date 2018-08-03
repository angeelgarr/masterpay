<?php
require_once 'Mobile_Detect.php';
$detect = new Mobile_Detect;
?>
<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Consultar Pagamentos</h3>
            </div>
        </div>

        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Pagamentos
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
                                <form method="post" action="<?= base_url(); ?>menu/compensacaoIntervalo">
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
                                        <th style="text-align: center;">Data Repasse</th>
                                    <?php } ?>
                                    <th style="text-align: center;">Data Confirmação</th>
                                    <?php if (!$detect->isMobile()) { ?>
                                        <th style="text-align: center;">Total Crédito</th>
                                        <th style="text-align: center;">Total Débito</th>
                                    <?php } ?>
                                    <th style="text-align: center;">Descontos</th>
                                    <th style="text-align: center;">Total Geral</th>
                                    <?php if (!$detect->isMobile()) { ?>
                                        <th style="text-align: center;">Estabelecimento</th>
                                    <?php } else { ?>
                                        <th style="text-align: center;">Estab.</th>
                                    <?php } ?>
                                    <th style="text-align: center;">Status</th>
                                    <?php if (!$detect->isMobile()) { ?>
                                        <th style="text-align: center;">Ações</th>
                                    <?php } ?>
                                </tr>
                                </thead>

                                <tbody>

                                <?php foreach ($contas as $item) { ?>
                                    <tr>
                                        <?php if (!$detect->isMobile()) { ?>
                                            <td style="text-align: center;"><?= date('d/m/Y', strtotime($item->dia_repasse)); ?></td>
                                        <?php } ?>
                                        <?php if ($item->data_confirmacao != null) { ?>
                                            <td style="text-align: center;"><?= date('d/m/Y H:i:s', strtotime($item->data_confirmacao)); ?></td>
                                        <?php } else { ?>
                                            <td style="text-align: center;">-</td>
                                        <?php } ?>
                                        <?php if (!$detect->isMobile()) { ?>
                                            <td style="text-align: right;"><?= number_format($item->total_credito, 2, ',', '.'); ?></td>
                                            <td style="text-align: right;"><?= number_format($item->total_debito, 2, ',', '.'); ?></td>
                                        <?php } ?>
                                        <td style="text-align: right;color: red;"><?= number_format($item->valor_desconto, 2, ',', '.'); ?></td>
                                        <td style="text-align: right;"><?= number_format($item->total_geral, 2, ',', '.'); ?></td>
                                        <td style="text-align: center;"><?= $item->comercial_name; ?></td>
                                        <td style="text-align: center;">
                              <span class="label <?= $item->status == 1 ? 'label-success' : 'label-danger'; ?>">
                              <?php if (!$detect->isMobile()) { ?>
                                  <?= $item->status == 1 ? 'PAGO' : 'PENDENTE'; ?>
                              <?php } else { ?>
                                  <?= $item->status == 1 ? '<i class="fa fa-thumbs-up"></i>' : '<i class="fa fa-thumbs-down"></i>'; ?>
                              <?php } ?>
                              </span>
                                        </td>
                                        <?php if (!$detect->isMobile()) { ?>
                                            <?php if ($item->status == 0) { ?>
                                                <td style="text-align: center;">
                                                
                                                    <a href="<?= base_url('compensacao/confirmar/' . $item->id); ?>"
                                                       onclick="return confirm('Deseja realmente confirmar o pagamento do item selecionado?');">
                                                        <span class="label label-primary">CONFIRMAR</span>
                                                    </a>
                                                

                                                    <a href="#" id="<?= $item->id ?>"
                                                       onclick="showModal(<?= $item->id ?>);">
                                                        <span class="label label-warning">DETALHAR</span>
                                                    </a>

                                                </td>
                                            <?php } else { ?>
                                                <td style="text-align: center;">
                                                    <a href="#" id="<?= $item->id ?>"
                                                       onclick="showModal(<?= $item->id ?>);">
                                                        <span class="label label-warning">DETALHAR</span>
                                                    </a>
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


<div class="modal fade bs-example-modal-lg" id="detail_modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg"
         style="overflow-y: scroll; max-height:85%;  margin-top: 50px; margin-bottom:50px;">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">Transações</h4>
            </div>
            <div class="modal-body">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
            </div>

        </div>
    </div>
</div>

<script type="text/javascript">

    function showModal(param) {
        $.ajax({
            url: '<?= base_url()?>compensacao/detalhar/' + param,
            method: "POST",
            success: function (data) {
                $('.modal-body').html(data);
                $('#detail_modal').modal('show');
            }
        });
    }

</script>