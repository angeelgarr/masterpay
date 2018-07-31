<!-- top navigation -->
<div class="top_nav">
    <div class="nav_menu">
        <nav>
            <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
            </div>

            <?php
            $usuario = explode(" ", $this->session->userdata('usuario_logado')['nome']);
            ?>

            <ul class="nav navbar-nav navbar-right">
                <li class="">
                    <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown"
                       aria-expanded="false">
                        <img src="<?= base_url(); ?>assets/images/user.png" alt="">
                        <?= $usuario[0] ?>
                        <span class=" fa fa-angle-down"></span>
                    </a>
                    <ul class="dropdown-menu dropdown-usermenu pull-right">
                        <!-- <li><a href="javascript:;"> Profile</a></li>
                        <li>
                          <a href="javascript:;">
                            <span class="badge bg-red pull-right">50%</span>
                            <span>Settings</span>
                          </a>
                        </li> -->
                        <li><a href="javascript:;" data-toggle="modal" data-target="#modal-alterar-senha">Alterar senha</a></li>
                        <li><a href="<?= base_url(); ?>login/logout"><i class="fa fa-sign-out pull-right"></i> Log
                                Out</a></li>
                    </ul>
                </li>

                <li role="presentation" class="dropdown">
                    <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown"
                       aria-expanded="false">
                        <i class="fa fa-envelope-o"></i>
                        <span class="badge bg-green">1</span>
                    </a>
                    <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
                        <li>
                            <a>
                                <span class="image"><img src="<?= base_url(); ?>assets/images/user.png"
                                                         alt="Profile Image"/></span>
                                <span>
                          <span> <?= $usuario[0] ?></span>
                          <span class="time">3 mins</span>
                        </span>
                                <span class="message">
                          Bem vindo à MaxPay. Negócios Inteligente!
                        </span>
                            </a>
                        </li>

                        <!-- <li>
                          <div class="text-center">
                            <a>
                              <strong>See All Alerts</strong>
                              <i class="fa fa-angle-right"></i>
                            </a>
                          </div>
                        </li> -->
                    </ul>
                </li>
            </ul>
        </nav>
    </div>
</div>
<!-- /top navigation -->

<!-- Modal -->
<div class="modal fade" id="modal-alterar-senha" tabindex="-1" role="dialog" aria-labelledby="modalAlterarSenhaLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="modalAlterarSenhaLabel">Alterar Senha</h4>
            </div>
            <div class="modal-body">
                <form method="post" class="form-signin" action="<?= base_url(); ?>login/atualizar_senha">
                    <div class="form-group">
                        <label for="inputPassword">Nova senha</label>
                        <input type="password" id="inputPassword" class="form-control" name="senha-nova" placeholder="Nova senha"
                        required/>
                    </div>
                    <div class="form-group">
                        <label for="inputPasswordRepeat">Repetir senha</label>
                        <input type="password" id="inputPasswordRepeat" class="form-control" name="senha-nova-repete"
                               placeholder="Repetir Senha" required/>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                        <button type="submit" class="btn btn-primary">Salvar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>