<!-- page content -->
<div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Estabelecimento</h3>
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
                    <h2>Dados do Responsável</h2>
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
                    <form id="demo-form" method="post" action="<?= base_url(); ?>estabelecimento/incluir" data-parsley-validate>
                      
                      <div class="col-md-6 col-sm-6 col-xs-12 form-group">
                          <label for="fullname">Nome Completo * :</label>
                          <input type="text" id="fullname" class="form-control" name="nome" required />
                      </div>
                      
                      <div class="col-md-6 col-sm-6 col-xs-12 form-group">
                          <label for="email">Email* :</label>
                          <input type="email" id="email" class="form-control" name="email" data-parsley-trigger="change" required />
                      </div>

                    <div class="col-md-6 col-sm-6 col-xs-12 form-group">
                        <label for="contato">Contato* :</label>
                        <input type="text" data-inputmask="'mask': '99999999999'" id="contato" class="form-control" name="contato" data-parsley-trigger="change" required />
                    </div>

                    <div class="col-md-6 col-sm-6 col-xs-12 form-group">
                        <label for="whatsapp">Contato WhatsApp* :</label>
                        <input type="text" id="whatsapp" data-inputmask="'mask': '99999999999'" class="form-control" name="whatsapp" data-parsley-trigger="change" required />
                    </div>
<br/>

                    <div class="x_title">
                    <h2>Informações do Estabelecimento</h2>
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

                       <div class="col-md-12 col-sm-12 col-xs-12 form-group">
                      <label>Tipo Pessoa *:</label>
                      <p>
                        Física:
                        <input type="radio" class="flat" name="tipopessoa" id="pf" value="01" checked="" required /> Jurídica:
                        <input type="radio" class="flat" name="tipopessoa" id="pj" value="02" />
                      </p>
                      </div>

                    <div class="col-md-4 col-sm-4 col-xs-12 form-group">
                        <label for="cpfcnpj">CPF/CNPJ* :</label>
                        <input type="text" id="cpfcnpj" data-inputmask="'mask': '99999999999999'" class="form-control" name="cpfcnpj" data-parsley-trigger="change" required />
                    </div>

                    <div class="col-md-4 col-sm-4 col-xs-12 form-group">
                        <label for="razaosocial">Razão Social* :</label>
                        <input type="text" id="razaosocial" class="form-control" name="razaosocial" data-parsley-trigger="change" required />
                    </div>

                    <div class="col-md-4 col-sm-4 col-xs-12 form-group">
                        <label for="ie">Incrição Estadual/Municipal* :</label>
                        <input type="text" id="ie" data-inputmask="'mask': '99999999999'" class="form-control" name="inscricao" data-parsley-trigger="change" required />
                    </div>

                    <div class="col-md-6 col-sm-6 col-xs-12 form-group">
                        <label for="fantasia">Nome Fantasia* :</label>
                        <input type="text" id="fantasia" class="form-control" name="fantasia" data-parsley-trigger="change" required />
                    </div>
                     
                    <div class="col-md-6 col-sm-6 col-xs-12 form-group">
                        <label for="heard"> Categoria*:</label>
                        <select id="categoria" placeholder="categoria..." name="categoria" class="form-control" required>
                        <option value=""></option>
                        <?php foreach ($categorias as $cat) { ?>
                          <option value="<?= $cat->code; ?>"> <?= $cat->name; ?> </option>
                        <?php } ?>
                        </select>
                    </div>


                    <div class="col-md-4 col-sm-4 col-xs-12 form-group">
                        <label for="cep">CEP* :</label>
                        <input type="text" id="cep" data-inputmask="'mask': '99999999'" class="form-control" name="cep" data-parsley-trigger="change" required />
                    </div>

                    <div class="col-md-4 col-sm-4 col-xs-12 form-group">
                        <label for="endereco">Endereço* :</label>
                        <input type="text" id="endereco" class="form-control" name="endereco" data-parsley-trigger="change" required />
                    </div>
                    
                    <div class="col-md-4 col-sm-4 col-xs-12 form-group">
                        <label for="numero">Número* :</label>
                        <input type="text" id="numero" data-inputmask="'mask': '99999'" class="form-control" name="numero" data-parsley-trigger="change" required />
                    </div>
                    <div class="col-md-12 col-sm-12 col-xs-12 form-group">
                        <label for="complemento">Complemeto* :</label>
                        <input type="text" id="complemento" class="form-control" name="complemento" data-parsley-trigger="change" required />
                    </div>

                     <div class="col-md-6 col-sm-6 col-xs-12 form-group">
                        <label for="emailcomercial">Email Comercial* :</label>
                        <input type="text" id="emailcomercial" class="form-control" name="emailcomercial" data-parsley-trigger="change" required />
                    </div>

                    <div class="col-md-6 col-sm-6 col-xs-12 form-group">
                        <label for="contatocomercial">Contato Comercial* :</label>
                        <input type="text" data-inputmask="'mask': '99999999999'" id="contatocomercial" class="form-control" name="contatocomercial" data-parsley-trigger="change" required />
                    </div> 

                    <div class="x_title">
                    <h2>Taxas Stone </h2>
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
                    <!-- Taxas Stones -->
                     <div class="col-md-2 col-sm-4 col-xs-12 form-group">
                        <label for="txdebitost">Taxa Débito Stone* :</label>
                        <input type="text" id="txdebitost" class="form-control" value="2" name="txdebitost" data-parsley-trigger="change" required />
                    </div>

                    <div class="col-md-3 col-sm-4 col-xs-12 form-group">
                        <label for="txcreditost">Taxa Crédito Avista Stone* :</label>
                        <input type="text" id="txcreditost" class="form-control" value="2.44" name="txcreditost" data-parsley-trigger="change" required />
                    </div> 

                     <div class="col-md-3 col-sm-2 col-xs-12 form-group">
                        <label for="txst26">Taxa Crédito Stone(2x-6x)* :</label>
                        <input type="text" id="txst26" class="form-control" name="txst26" value="2.85" data-parsley-trigger="change" required />
                    </div>

                    <div class="col-md-3 col-sm-2 col-xs-12 form-group">
                        <label for="txst712">Taxa Crédito Stone(7x-12x)* :</label>
                        <input type="text" id="txst712" class="form-control" name="txst712" value="3.22" data-parsley-trigger="change" required />
                    </div>

                  </div>

                  <div class="x_title">
                    <h2>Taxas Masterpay </h2>
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
                    
                    <!-- Taxas Masterpay -->
                    <div class="col-md-3 col-sm-2 col-xs-12 form-group">
                        <label for="txdebitomp">Taxa Débito Masterpay* :</label>
                        <input type="text" id="txdebitomp" class="form-control" value="4" name="txdebitomp" data-parsley-trigger="change" required />
                    </div>

                    <div class="col-md-3 col-sm-2 col-xs-12 form-group">
                        <label for="txcreditomp">Taxa Crédito Avista Masterpay* :</label>
                        <input type="text" id="txcreditomp" class="form-control" value="4.88" name="txcreditomp" data-parsley-trigger="change" required />
                    </div> 

                     <div class="col-md-3 col-sm-2 col-xs-12 form-group">
                        <label for="txmp26">Taxa Crédito Masterpay(2x-6x)* :</label>
                        <input type="text" id="txmp26" class="form-control" name="txmp26" value="5.70" data-parsley-trigger="change" required />
                    </div>

                    <div class="col-md-3 col-sm-2 col-xs-12 form-group">
                        <label for="txmp712">Taxa Crédito Masterpay(7x-12x)* :</label>
                        <input type="text" id="txmp712" class="form-control" name="txmp712" value="6.44" data-parsley-trigger="change" required />
                    </div>

                  </div>

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