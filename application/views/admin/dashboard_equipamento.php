<!-- page content -->
<div class="right_col" role="main">

<?php foreach($equipamento as $item) { ?>
      <div class="x_panel">
                <!-- top tiles -->
                <div class="row tile_count">
                  
                  <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
                    <span class="count_top"><i class="fa fa-list"></i> Descrição</span>
                    <div style="font-size: 25px"><?= $item->equipamento ?></div>
                  </div>

                  <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
                    <span class="count_top"><i class="fa fa-money"></i> Valor</span>
                    <div style="font-size: 25px" class="blue"> <?= number_format($item->valor,2,',','.'); ?> </div>
                  </div>

                  <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
                    <span class="count_top"><i class="fa fa-calc"></i> Quantidade</span>
                    <div style="font-size: 25px" class="blue"> <?= $item->quantidade ?> </div>
                  </div>

                  <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
                    <span class="count_top"><i class="fa fa-money"></i> Total</span>
                    <div style="font-size: 25px" class="blue"> <?= number_format($item->valor*$item->quantidade,2,',','.'); ?> </div>
                  </div>

                  <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
                    <span class="count_top"><i class="fa fa-calendar"></i> Início Cobrança </span>
                    <div style="font-size: 25px" class="blue"> <?= date('d/m/Y', strtotime($item->data_inicio_cobranca)); ?> </div>
                  </div>

                  <!-- <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
                    <span class="count_top"><i class="fa fa-calendar"></i> Próxima Cobrança</span>
                    <div style="font-size: 25px" class="blue"> 01/01/2018 </div>
                  </div> -->
                  
              </div>       <!-- /top tiles -->
        </div>
        <div class="x_panel">
        
        <?php if($item->equipamento == 'S920') { ?>
          <div style="text-align: center">
            <img width="250" height="420" src="<?= base_url(); ?>assets/images/s920.png">
        </div>
        <?php } ?>

        <?php if($item->equipamento == 'D200') { ?>
            <img width="250" height="350" src="<?= base_url(); ?>assets/images/d200.png">
        <?php } ?>

      </div>
<?php } ?>
</div>
