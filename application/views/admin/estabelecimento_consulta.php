<?php
require_once 'Mobile_Detect.php';
$detect = new Mobile_Detect;
?>
<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Consultar Estabelecimentos</h3>
            </div>
        </div>

        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Estabelecimentos
                            <small>Clientes Cadastrados</small>
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
                        <?php if ($error = $this->session->flashdata('alerta')): ?>
                            <div class="alert alert-info alert-dismissible fade in" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                            aria-hidden="true">×</span>
                                </button>
                                <strong><?= $this->session->flashdata('alerta'); ?></strong>
                            </div>
                        <?php endif; ?>

                        <p class="text-muted font-13 m-b-30">
                            <!-- The Buttons extension for DataTables provides a common set of options, API methods and styling to display buttons on a page that will interact with a DataTable. The core library provides the based framework upon which plug-ins can built. -->
                        </p>

                        <div class="row">
                            <table id="datatable" class="table table-striped table-bordered">
                                <thead>
                                <tr>
                                    <th>ID Maxpay</th>
                                    <th>Nome Fantasia</th>
                                    <th>Responsável</th>
                                    <th>Status <button style="margin-top: 4px" type="button" class="btn btn-xs" data-toggle="tooltip" data-placement="right" title="<?= $ativos ?> clientes ativos"><span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span></button></th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($estabelecimentos as $item): ?>
                                    <tr>
                                        <td><?= $item->idm; ?></td>
                                        <td><?= $item->comercial_name; ?></td>
                                        <td><?= $item->name; ?></td>
                                        <td class="text-center"><?= $item->status == 1 ? '<span class="label label-success">Ativo</span>' : '<span class="label label-danger">Inativo</span>'; ?></td>
                                        <td class="text-center">
                                            <a href="javascript:;" data-target="#modal"
                                               onclick="showDetalhes(<?= $item->id_estabelecimento ?>)"
                                               class="center-block btn btn-info">Detalhar</a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /page content -->

<!-- Modal -->
<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-hidden="false">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-load">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <div class="modal-load-content">
                <i class='fa fa-circle-o-notch fa-spin fa-3x fa-fw'></i>
                <p>Carregando...</p>
            </div>
        </div>
        <div class="modal-content">
        </div>
    </div>
</div>

<script type="text/javascript">
    var base_url = "<?= base_url() ?>";

    function modalShow(url) {
        $("#modal").modal("show");
        $.ajax({
            url: url,
            beforeSend: function () {
                $("#modal .modal-content").hide();
                $("#modal .modal-load").show();
            },
            success: function (data) {
                $("#modal .modal-content").html(data);
                $("#modal .modal-load").hide();
                $("#modal .modal-content").show();
            },
            error: function () {
                $("#modal .modal-load-content").html("<i class='fa fa-circle-o-notch fa-spin fa-3x fa-fw'></i><h4>Ocorreu um erro ao tentar processar a requisição. Por favor, tente novamente!</h4>").css("padding", "50px");
            }
        });
    }

    function showDetalhes(id) {
        var url = base_url + "estabelecimento/detalhar?id=" + id;
        modalShow(url);
    }
</script>

<style>
    .modal-load {
        display: none;
        text-align: center;
        padding: 50px;
        position: relative;
        background-color: #fff;
        -webkit-background-clip: padding-box;
        background-clip: padding-box;
        border: 1px solid #999;
        border: 1px solid rgba(0, 0, 0, .2);
        border-radius: 6px;
        outline: 0;
        -webkit-box-shadow: 0 3px 9px rgba(0, 0, 0, .5);
        box-shadow: 0 3px 9px rgba(0, 0, 0, .5);
    }

    .modal-header .close {
        margin-top: -40px !important;
        padding: 1rem;
        margin: -1rem -1rem -1rem auto;
    }

    .modal-footer {
        clear: left;
    }
</style>