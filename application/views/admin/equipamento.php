<!-- page content -->
<div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Equipamento</h3>
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
                    <h2>Adicionar Equipamento</h2>
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
                    <form id="demo-form" method="post" action="<?= base_url(); ?>equipamento/incluir" data-parsley-validate>
                      
                    <div class="col-md-6 col-sm-6 col-xs-6 form-group">
                        <label for="heard"> Modelo*:</label>
                        <select id="modelo" placeholder="modelo..." name="modelo" class="form-control" required>
                            <option></option>
                            <option value="1-VERIFONE-Vx685">VERIFONE - Vx685</option>
                            <option value="2-VERIFONE-Vx690">VERIFONE - Vx690</option>
                            <option value="3-PAX-S920">PAX - S920</option>
                            <option value="4-PAX-D200">PAX - D200</option>
                            <option value="5-GERTEC-MOBI_PIN10">GERTEC - MOBI_PIN10</option>
                            <option value="6-PAX-D180">PAX - D180</option>
                            <option value="7-PAX-A920">PAX - A920</option>
                            <option value="8-NEXGO-N5">NEXGO - N5</option>
                        </select>
                        
                    </div>

                    <div class="col-md-6 col-sm-6 col-xs-12 form-group">
                        <label for="serie">Número de Série* :</label>
                        <input type="text" id="serie" class="form-control" name="serie" data-parsley-trigger="change" required />
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
                          <th>Número de Série</th>
                          <th>Modelo</th>
                          <th>Tipo</th>
                          <th>Fabricante</th>
                          <th>Status</th>
                          <th>Sincronizado</th>
                        </tr>
                      </thead>

                      <tbody>
                      <?php foreach ($equipamentos as $item) { ?>
                          <tr>
                            <td><?= $item->id; ?></td>
                            <td><?= $item->serial_number; ?></td>
                            <td><?= $item->model_name; ?></td>
                            <td><?= $item->model_type; ?></td>
                            <td><?= $item->model_manufacturer; ?></td>
                            
                            <td>
                              <span class="label <?= $item->status==1? 'label-success': 'label-danger'; ?>">
                                  <?= $item->status==1? 'VINCULADO': 'NÃO VINCULADO'; ?>
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