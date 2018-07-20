<form id="formEdit" method="post" action=""
      data-parsley-validate>
    <?php if ($error = $this->session->flashdata('alerta')): ?>
        <div class="alert alert-info alert-dismissible fade in" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                        aria-hidden="true">×</span>
            </button>
            <strong><?= $this->session->flashdata('alerta'); ?></strong>
        </div>
    <?php endif; ?>
    <div class="x_title">
        <h2>Equipamentos</h2>
        <button type="button" class="btn btn-primary btn-sm pull-right" id="btn-novo">
            <i class="fa fa-plus"></i> Novo
        </button>
        <button type="button" class="btn btn-primary btn-sm pull-right" id="btn-edit">
            <i class="fa fa-arrow-left"></i> Voltar
        </button>

        <div class="clearfix"></div>
    </div>

    <div class="col-md-4 col-sm-4 col-xs-12 form-group select-equipamento">
        <label for="equipamento">Selecione o equipamento:</label>
        <select id="equipamento" name="equipamento" class="form-control" readonly>
            <option value="">Selecionar equipamento...</option>
            <?php foreach ($equipamento as $item): ?>
                <option value="<?= $item->controle_aluguel_equipamento_id; ?>">
                    <?= $item->equipamento; ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>

    <div id="content-equipamento">
    </div>

    <div class="clearfix"></div>
</form>


<script type="text/javascript">
    $(document).ready(function () {
        var base_url = "<?= base_url() ?>";
        $("#add-equipamento, #btn-edit").hide();

        function showEquipamento(url) {
            $.ajax({
                url: url,
                beforeSend: function () {
                    $("#content-equipamento").html("<div class='clearfix'></div><div style='text-align: center; padding: 50px;'><i class='fa fa-circle-o-notch fa-spin fa-3x fa-fw'></i><p>Carregando...</p></div>");
                },
                success: function (data) {
                    $("#content-equipamento").html(data);
                },
                error: function () {
                    $("#content-equipamento").html("<div class='clearfix'></div><div style='text-align: center; padding: 50px;'><i class='fa fa-circle-o-notch fa-spin fa-3x fa-fw'></i><h4>Ocorreu um erro ao tentar processar a requisição. Por favor, tente novamente.</h4></div>");
                }
            });
        }

        $("#formEdit").on("click", "#btn-novo", function () {
            $("#btn-edit, #btnSave").show();
            $("#btn-novo, #btnEdit, #btnCancel, .select-equipamento").hide();

            var idEstabelecimento = <?= $id_estabelecimento; ?>;
            $("#formEdit").attr("action", "" + base_url + "equipamento/add");
            var url = base_url + "equipamento/novo?id=" + idEstabelecimento;
            showEquipamento(url);
        });

        $("#formEdit").on("click", "#btn-edit", function () {
            $("#btn-edit").hide();
            $("#equipamento").val("");
            $("#content-equipamento").html("");
            $("#btn-novo, .select-equipamento").show();
            $("#formEdit").removeAttr("action");
        });

        $("#formEdit").on("change", "#equipamento", function () {
            $("#btnEdit").show();
            $("#btnCancel, #btnSave").hide();

            var id = $(this).val();
            $("#formEdit").attr("action", "" + base_url + "equipamento/edit?id=" + id);
            if (id) {
                var url = base_url + "equipamento/view?id=" + id;
                showEquipamento(url);
            }
        });
    })
</script>

<style>
    #equipamento {
        background-color: #fff;
    }
</style>