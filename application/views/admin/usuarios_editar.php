<?php
require_once 'Mobile_Detect.php';
$detect = new Mobile_Detect;
?>
<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Editar Usuários</h3>
            </div>
        </div>

        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Editar
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
                            <form id="formEdit" method="post" action="<?= base_url(); ?>usuario/editar/<?= $usuario["usuario_id"]; ?>"
                                  data-parsley-validate>

                                <div class="row">
                                    <div class="col-md-4 col-sm-6 col-xs-12 form-group">
                                        <label for="estabelecimento"> Estabelecimento*:</label>
                                        <select id="estabelecimento" name="estabelecimento" class="form-control"
                                                required>
                                            <option value="">Selecione um estabelecimento...</option>
                                            <?php foreach ($estabelecimentos as $estabelecimento) { ?>
                                                <option value="<?= $estabelecimento->id; ?>" <?= $estabelecimento->id == $usuario["estabelecimento_id"] ? 'selected' : '' ?>> <?= $estabelecimento->comercial_name; ?> </option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 col-sm-6 col-xs-12 form-group">
                                        <label for="nome">Nome Completo * :</label>
                                        <input type="text" id="nome" class="form-control" name="nome"
                                               data-parsley-trigger="change"
                                               value="<?= $usuario["nome"]; ?>" required/>
                                    </div>

                                    <div class="col-md-6 col-sm-6 col-xs-12 form-group">
                                        <label for="email">Email* :</label>
                                        <input type="email" id="email" class="form-control" name="email"
                                               data-parsley-trigger="change" value="<?= $usuario["email"]; ?>"
                                               required/>
                                    </div>

                                    <div class="col-md-2 col-sm-6 col-xs-12 form-group">
                                        <label for="perfil">Perfil do Usuário* :</label>
                                        <select id="perfil" placeholder="Perfil do usuário..." name="perfil"
                                                class="form-control" required>
                                            <option value="">Selecione um perfil...</option>
                                            <option value="ADMINISTRADOR" <?= $usuario["perfil"] == 'ADMINISTRADOR' ? 'selected' : '' ?>>
                                                ADMINISTRADOR
                                            </option>
                                            <option value="CLIENTE" <?= $usuario["perfil"] == 'CLIENTE' ? 'selected' : '' ?>>
                                                CLIENTE
                                            </option>
                                            <option value="GESTOR" <?= $usuario["perfil"] == 'GESTOR' ? 'selected' : '' ?>>
                                                GESTOR
                                            </option>
                                        </select>
                                    </div>

                                    <div class="col-md-6 col-sm-6 col-xs-12 form-group">
                                        <label for="conta">Status* :</label>
                                        <div class="btn-group btn-group-toggle form-control" data-toggle="buttons">
                                            <label class="btn btn-default <?= $usuario["status"] == 1 ? 'active' : ''; ?>">
                                                <input type="radio" name="status" value="true"
                                                       autocomplete="off" <?= $usuario["status"] == 1 ? 'checked' : ''; ?> />
                                                Ativo
                                            </label>
                                            <label class="btn btn-default <?= $usuario["status"] == 0 ? 'active' : ''; ?>">
                                                <input type="radio" name="status" value="false"
                                                       autocomplete="off" <?= $usuario["status"] == 0 ? 'checked' : ''; ?> />
                                                Inativo
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12 form-group">
                                        <input type="submit" class="btn btn-primary pull-right" value="Salvar"/>
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