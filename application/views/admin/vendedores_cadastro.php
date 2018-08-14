<?php
require_once 'Mobile_Detect.php';
$detect = new Mobile_Detect;
?>
<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Cadastrar Vendedores</h3>
            </div>
        </div>

        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Novo Vendedor
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
                            <div class="alert alert-danger alert-dismissible fade in" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                            aria-hidden="true">×</span>
                                </button>
                                <strong><?= $this->session->flashdata('alerta'); ?></strong>
                            </div>
                        <?php elseif ($error = $this->session->flashdata('sucesso')): ?>
                            <div class="alert alert-success alert-dismissible fade in" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                            aria-hidden="true">×</span>
                                </button>
                                <strong><?= $this->session->flashdata('sucesso'); ?></strong>
                            </div>
                        <?php endif; ?>

                        <p class="text-muted font-13 m-b-30">
                            <!-- The Buttons extension for DataTables provides a common set of options, API methods and styling to display buttons on a page that will interact with a DataTable. The core library provides the based framework upon which plug-ins can built. -->
                        </p>

                        <div class="row">
                            <form id="formEdit" method="post" action="<?= base_url(); ?>vendedor/novo" data-parsley-validate>
                                <div class="row">
                                    <div class="col-md-6 col-sm-6 col-xs-12 form-group">
                                        <label for="nome">Nome Completo * :</label>
                                        <input type="text" id="nome" class="form-control" name="nome" data-parsley-trigger="change"
                                               value="" required />
                                    </div>

                                    <div class="col-md-6 col-sm-6 col-xs-12 form-group">
                                        <label for="email">Email* :</label>
                                        <input type="email" id="email" class="form-control" name="email"
                                               data-parsley-trigger="change" value="" required />
                                    </div>

                                    <div class="col-md-6 col-sm-6 col-xs-12 form-group">
                                        <label for="phone">Phone* :</label>
                                        <input type="phone" id="phone" class="form-control" name="phone" data-inputmask="'mask': '99999999999'"
                                               data-parsley-trigger="change" value="" required />
                                    </div>

                                    <div class="col-md-6 col-sm-6 col-xs-12 form-group">
                                        <label for="conta">Status* :</label>
                                        <div class="btn-group btn-group-toggle form-control" data-toggle="buttons">
                                            <label class="btn btn-default active">
                                                <input type="radio" name="status" value="true"
                                                       autocomplete="off" checked /> Ativo
                                            </label>
                                            <label class="btn btn-default">
                                                <input type="radio" name="status" value="false"
                                                       autocomplete="off" /> Inativo
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12 form-group">
                                        <input type="submit" class="btn btn-primary pull-right" value="Salvar" />
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /page content -->