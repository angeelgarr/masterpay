<?php
require_once 'Mobile_Detect.php';
$detect = new Mobile_Detect;
?>
<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Consultar Vendedores</h3>
            </div>
        </div>

        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Vendedores
                            <small>Vendedores Cadastrados</small>
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
                            <table id="datatable" class="table table-striped table-bordered">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nome</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Status</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($vendedores as $vendedor): ?>
                                    <tr>
                                        <td><?= $vendedor->id; ?></td>
                                        <td><?= $vendedor->nome; ?></td>
                                        <td><?= $vendedor->email; ?></td>
                                        <td><?= $vendedor->phone; ?></td>
                                        <td class="text-center">
                                            <span class="label <?= $vendedor->status == 1 ? 'label-success' : 'label-danger'; ?>">
                                                <?= $vendedor->status == 1 ? 'ATIVO' : 'INATIVO'; ?>
                                            </span>
                                        </td>
                                        <td class="text-center"><a href="<?= base_url(); ?>vendedor/editar/<?= $vendedor->id; ?>" class="btn btn-primary btn-sm">Editar</a></td>
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