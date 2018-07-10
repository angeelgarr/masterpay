<!-- page content -->
<div class="right_col" role="main">

<!-- <div class="row">
  <div class="x_panel">
      <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
          <span class="count_top"><i class="fa fa-calendar"></i> Data Inicial</span>
          <input type="date" />
      </div>
      <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
          <span class="count_top"><i class="fa fa-calendar"></i> Data Final</span>
          <input type="date" />
      </div>
  </div>
</div> -->

    <div class="x_panel">
        <div class="row">
          <button onclick="load_chart();">Exibir Gráfico</button>
            <canvas id="chart-bar"></canvas> 
        </div>
    </div>
</div>

<script type="text/javascript">

function load_chart(){
  //Define a URL para obtenção dos dados para gerar o gráfico
  var url_data = '<?= base_url()?>dashboard/criar_grafico';

    var container = $('#chart-bar');
    var tarefas;
    //Define a variável que irá receber as opções de configuração do gráfico
    var options;
    $.ajax({
      type: 'GET',
      url: url_data,
      dataType: 'json',

      success: function(data) {
        var myBarChart = new Chart(container, {
          type: 'bar',
          data: data.tarefas,
          options: data.opcoes
        });
      },
      error: function() {
        alert("Ocorreu um erro ao processar a solicitação.");
        return false;
      }
    });

  }

</script>