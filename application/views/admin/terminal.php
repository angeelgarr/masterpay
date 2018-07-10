<!-- page content -->
<div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Terminal</h3>
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
                    <h2>Adicionar Terminal</h2>
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
                    <form id="demo-form" method="post" action="<?= base_url(); ?>terminal/incluir" data-parsley-validate>
                      
                    <div class="col-md-6 col-sm-6 col-xs-6 form-group"> 
                        <label for="merchant">Estabelecimento*:</label>
                        <select id="merchant" placeholder="modelo..." name="merchant" class="form-control" required>
                            <?php foreach($estabelecimento as $item) { ?>
                            <option value="<?= $item->merchant; ?>"><?= $item->comercial_name; ?></option>
                            <?php } ?>
                        </select>
                        
                    </div>

                    <div class="col-md-6 col-sm-6 col-xs-6 form-group"> 
                        <label for="heard">Número Serial*:</label>
                        <select id="modelo" placeholder="modelo..." name="modelo" class="form-control" required>
                            <?php foreach($equipamentos as $item) { ?>
                            <option value="<?= $item->serial_number; ?>"><?= $item->serial_number; ?></option>
                            <?php } ?>
                        </select>
                        
                    </div>

                    <div class="col-md-12 col-sm-12 col-xs-12 form-group">
                        <label for="profile"> Tipo de Comunicação*:</label>
                        <select id="profile" placeholder="comunicação..." name="profile" class="form-control" required>
                        <option value="S920_LYRA_WIFI_GPRS">S920_LYRA_WIFI_GPRS</option>
                        <option value="AVATEK_GPRS">AVATEK_GPRS</option>
                        <option value="S920_WIFI">S920_WIFI</option>
                        <option value="S920_VECTO_GPRS_WIFI">S920_VECTO_GPRS_WIFI</option>
                        <option value="S920_KORE_WIFI_GPRS">S920_KORE_WIFI_GPRS</option>
                        <option value="S920_LINK_WIFI_GPRS_VPN">S920_LINK_WIFI_GPRS_VPN</option>
                        <option value="S920_AVATEK_WIFI_GPRS">S920_AVATEK_WIFI_GPRS</option>
                        <option value="S920_AVATEK_WIFI_GPRS_PARC_JUROS">S920_AVATEK_WIFI_GPRS_PARC_JUROS</option>
                        <option value="S920_LYRA_WIFI_GPRS">S920_LYRA_WIFI_GPRS</option>
                        </select>
                    </div>

                  <br/>

                  <div style="text-align: right">
                      <button type="submit" class="btn btn-primary">Salvar</button>
                  </div>
                   </form>
                  </br>

                   <table id="datatable-buttons" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>ID</th>
                          <th>Merchant</th>
                          <th>Código Lógico</th>
                          <th>Número Serial</th>
                          <th>Status</th>
                          <th>Sincronizado</th>
                        </tr>
                      </thead>

                      <tbody>

                      <?php foreach ($terminal as $item) { ?>
                          <tr>
                            <td><?= $item->id; ?></td>
                            <td><?= $item->merchant; ?></td>
                            <td><?= $item->specific_id; ?></td>
                            <td><?= $item->serial_number; ?></td>
                            <td>
                              <span class="label <?= $item->status==1? 'label-success': 'label-danger'; ?>">
                                  <?= $item->status==1? 'ATIVO': 'INATIVO'; ?>
                              </span>
                            </td>

                            <td>
                              <span class="label <?= $item->sincronizado==1? 'label-success': 'label-danger'; ?>">
                                  <?= $item->sincronizado==1? 'SIM': 'NÃO'; ?>
                              </span>
                            </td>
                          </tr>
                        <?php } ?>

                      </tbody>
                    </table>        

                  </div>
                </div>
              </div>
            </div>
          </div>


</div>
        <!-- /page content -->