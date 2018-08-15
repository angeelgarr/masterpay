<!-- sidebar menu -->
<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
    <div class="menu_section">
        <h3>MENU GERAL</h3>
        <ul class="nav side-menu">

            <li><a href="<?= base_url(); ?>dashboard"><i class="fa fa-bar-chart-o"></i> Dashboard </a>
            </li>

            <?php if ($this->session->userdata('usuario_logado')['perfil'] == 'ADMINISTRADOR'): ?>
                <li><a><i class="fa fa-user"></i> Vendedores <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="<?= base_url(); ?>vendedor">Consultar</a></li>
                        <li><a href="<?= base_url(); ?>vendedor/novo">Cadastrar</a></li>
                    </ul>
                </li>
            <?php endif; ?>

            <?php if ($this->session->userdata('usuario_logado')['perfil'] == 'ADMINISTRADOR'): ?>
                <li><a><i class="fa fa-user"></i> Usuários <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="<?= base_url(); ?>usuario">Consultar</a></li>
                        <li><a href="<?= base_url(); ?>usuario/novo">Cadastrar</a></li>
                    </ul>
                </li>
            <?php endif; ?>

            <?php if ($this->session->userdata('usuario_logado')['perfil'] == 'ADMINISTRADOR'
                || $this->session->userdata('usuario_logado')['perfil'] == 'GESTOR'
            ) { ?>

                <li><a><i class="fa fa-users"></i> Administrativo <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="<?= base_url(); ?>dashboard/teds">Controle de TED's</a></li>
                        <li><a href="<?= base_url() ?>dashboard/admin">Dashboard Admin</a></li>
                        <li><a href="<?= base_url() ?>demonstrativo">Demonstrativo Antecipação</a></li>
                        <!-- <li><a href="<?= base_url() ?>dashboard/graficos">Gráficos</a></li> -->
                    </ul>
                </li>
            <?php } ?>

            <?php if ($this->session->userdata('usuario_logado')['perfil'] == 'ADMINISTRADOR') { ?>
            <li><a><i class="fa fa-bank"></i> Estabelecimento <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    <!-- <li><a href="<?= base_url() ?>estabelecimento">Incluir Loja</a></li> -->
                    <!-- <li><a href="<?= base_url() ?>menu/bancos">Incluir Banco</a></li>  -->
                    <li><a href="<?= base_url() ?>estabelecimento/listar">Consultar</a></li>
                </ul>
                <?php } ?>

                <?php if ($this->session->userdata('usuario_logado')['perfil'] != 'GESTOR') { ?>
            <li><a><i class="fa fa-shopping-cart"></i> Vendas <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    <!-- <li><a href="index.html">Dashboard</a></li> -->
                    <li><a href="<?= base_url(); ?>menu/transacoes">Consultar Transações</a></li>
                </ul>
            </li>
        <?php } ?>

            <?php if ($this->session->userdata('usuario_logado')['perfil'] == 'CLIENTE'
                || $this->session->userdata('usuario_logado')['perfil'] == 'ADMINISTRADOR'
            ) { ?>
                <li><a><i class="fa fa-usd"></i> Pagamentos <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="<?= base_url(); ?>menu/repasses">Consultar Repasses</a></li>

                        <?php if ($this->session->userdata('usuario_logado')['perfil'] == 'ADMINISTRADOR') { ?>
                            <li><a href="<?= base_url(); ?>menu/compensacao">Consultar Pagamentos</a></li>
                        <?php } ?>
                        <!-- <li><a href="form_advanced.html">Dashboard</a></li> -->
                    </ul>
                </li>
            <?php } ?>

            <!-- <?php if ($this->session->userdata('usuario_logado')['perfil'] == 'CLIENTE') { ?>
                  <li><a><i class="fa fa-refresh"></i> Antecipação <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a a href="<?= base_url(); ?>antecipacao">Solicitar</a></li>
                       <li><a href="#">Antecipação Automática</a></li>
                      <li><a href="typography.html">Administrativo</a></li>

                    </ul>
                  </li>
                  <?php } ?> -->
            <?php if ($this->session->userdata('usuario_logado')['perfil'] == 'CLIENTE') { ?>
                <li><a><i class="fa fa-pencil-square-o"></i> Contratos <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <!-- <li><a href="<?= base_url() ?>taxa">Editar Taxas Combinadas</a></li> -->
                        <li><a href="<?= base_url() ?>menu/taxas">Taxas Combinadas</a></li>
                        <li><a href="<?= base_url() ?>menu/aluguel">Equipamento Escolhido</a></li>
                        <!-- <li><a href="#">Suporte Oferecido</a></li> -->
                    </ul>
                </li>
            <?php } ?>
            <!-- <li><a><i class="fa fa-tasks"></i>Serviços <span class="fa fa-chevron-down"></span></a>
              <ul class="nav child_menu">
                <li><a href="#">Solicitar Bobina</a></li>
                <li><a href="#">Solicitar Equipamento</a></li>
                <li><a href="#">Solicitar DIRF</a></li>
              </ul>
            </li> -->
            <!-- <?php if ($this->session->userdata('usuario_logado')['perfil'] != 'CLIENTE') { ?>
                      <li><a><i class="fa fa-bar-chart-o"></i> Terminais <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                          <li><a href="<?= base_url() ?>equipamento">Físico</a></li>
                          <li><a href="<?= base_url() ?>terminal">Lógico</a></li>
                        </ul>
                      </li>
                  <?php } ?> -->


            </li>

        </ul>
    </div>

</div>
<!-- /sidebar menu -->

<!-- /menu footer buttons -->
<div class="sidebar-footer hidden-small">
    <a data-toggle="tooltip" data-placement="top" title="Settings">
        <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
    </a>
    <a data-toggle="tooltip" data-placement="top" title="FullScreen">
        <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
    </a>
    <a data-toggle="tooltip" data-placement="top" title="Lock">
        <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
    </a>
    <a data-toggle="tooltip" data-placement="top" title="Logout" href="<?= base_url(); ?>login/logout">
        <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
    </a>
</div>
<!-- /menu footer buttons -->
</div>
</div>