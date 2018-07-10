<!-- page content -->
<div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Bancos</h3>
              </div>

              <div class="title_right">
                <div class="col-md-8 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Consultar...">
                    <span class="input-group-btn">
                      <button class="btn btn-default" type="button">Pesquisar</button>
                    </span>
                  </div>
                </div>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Incluir Dados Bancários</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
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
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                    </button>
                    <strong><?= $this->session->flashdata('alerta'); ?></strong>
                  </div>
                  <?php endif; ?>

                    <br />

                        <!-- start form for validation -->
                    <form id="demo-form" method="post" action="<?= base_url(); ?>banco/incluir" data-parsley-validate>
                      
                      <div class="col-md-12 col-sm-12 col-xs-12 form-group">
                          <label for="fullname">Estabelecimento* :</label>
                          <select id="estabelecimento" placeholder="estabelecimento..." name="estabelecimento" class="form-control" required>
                                <option value=""></option>
                                <?php foreach ($estabelecimentos as $item) { ?>
                                    <option value="<?= $item->id; ?>"> <?= $item->comercial_name; ?></option>
                                <?php } ?>
                         </select>
                      </div>

                      <div class="col-md-4 col-sm-4 col-xs-12 form-group">
                          <label for="banco">Banco* :</label>
                          <select id="banco" placeholder="banco..." name="banco" class="form-control" required>
                                <option value=""></option>
                                <option value="001-Banco do Brasil S.A.">001–Banco do Brasil S.A.</option>
                                <option value="341-Banco Itaú S.A.">341–Banco Itaú S.A.</option>
                                <option value="033-Banco Santander (Brasil) S.A.">033–Banco Santander (Brasil) S.A.</option>
                                <option value="356-Banco Real S.A. (antigo)">356–Banco Real S.A. (antigo)</option>
                                <option value="652-Itaú Unibanco Holding S.A.">652–Itaú Unibanco Holding S.A.</option>
                                <option value="237-Banco Bradesco S.A.">237–Banco Bradesco S.A.</option>
                                <option value="745-Banco Citibank S.A.">745–Banco Citibank S.A.</option>
                                <option value="399-HSBC Bank Brasil S.A. – Banco Múltiplo">399–HSBC Bank Brasil S.A. – Banco Múltiplo</option>
                                <option value="104-Caixa Econômica Federal">104–Caixa Econômica Federal</option>
                                <option value="389-Banco Mercantil do Brasil S.A.">389–Banco Mercantil do Brasil S.A.</option>
                                <option value="453-Banco Rural S.A.">453–Banco Rural S.A.</option>
                                <option value="422-Banco Safra S.A.">422–Banco Safra S.A.</option>
                                <option value="633-Banco Rendimento S.A.">633–Banco Rendimento S.A.</option>
                                <option value="004 – Banco do Nordeste do Brasil S.A.">004 – Banco do Nordeste do Brasil S.A.</option>
                                
                         </select>
                      </div>
                      
                      <div class="col-md-4 col-sm-4 col-xs-12 form-group">
                          <label for="tipo">Tipo Conta* :</label>
                          <select id="tipo" placeholder="tipo da conta..." name="tipo" class="form-control" required>
                                <option value=""></option>
                                <option value="CC">CONTA CORRENTE</option>
                                <option value="CP">CONTA POUPANÇA</option>
                         </select>
                      </div>

                      <div class="col-md-2 col-sm-2 col-xs-12 form-group">
                          <label for="agencia">Agência* :</label>
                          <input type="text" id="agencia" class="form-control" name="agencia" data-parsley-trigger="change" required />
                      </div>

                    <div class="col-md-4 col-sm-4 col-xs-12 form-group">
                        <label for="conta">Conta* :</label>
                        <input type="text" id="conta" class="form-control" name="conta" data-parsley-trigger="change" required />
                    </div>
                   
                    <br/>

                  <br/>

                  <div style="text-align: right">
                      <button type="submit" class="btn btn-primary">Salvar</button>
                  </div>

                   </form>
        
                  </div>
                </div>
              </div>
            </div>
          </div>

</div>
        <!-- /page content -->