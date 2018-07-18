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
        <h2>Taxas Combinadas</h2>
        <div class="clearfix"></div>
    </div>

    <div style="display:none;" class="col-md-12 col-sm-12 col-xs-12 form-group">
        <label for="fullname">Estabelecimento* :</label>
        <input type="text" class="form-control" name="estabelecimento"
               value="<?= $taxa[0]->comercial_name; ?>" readonly disabled/>
    </div>

    <div class="col-md-4 col-sm-4 col-xs-12 form-group">
        <label for="bandeira">Selecione a Bandeira para editar:</label>
        <select id="bandeira" name="bandeira" class="form-control" readonly>
            <option value="">Selecionar bandeira...</option>
            <?php foreach ($taxa as $item): ?>
                <option value="<?= $item->estabelecimento_parametro_id; ?>">
                    <?= $item->bandeira; ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>

    <div id="content-taxa">
    </div>

    <div class="clearfix"></div>
</form>
<script type="text/javascript">
    $(document).ready(function () {
        var base_url = "<?= base_url() ?>";

        function showTaxas(url) {
            $.ajax({
                url: url,
                beforeSend: function () {
                    $("#content-taxa").html("<div class='clearfix'></div><div style='text-align: center; padding: 50px;'><i class='fa fa-circle-o-notch fa-spin fa-3x fa-fw'></i><p>Carregando...</p></div>");
                },
                success: function (data) {
                    $("#content-taxa").html(data);
                    $(".tab-content input").attr("disabled", "disabled");
                },
                error: function () {
                    $("#content-taxa").html("<div class='clearfix'></div><div style='text-align: center; padding: 50px;'><i class='fa fa-circle-o-notch fa-spin fa-3x fa-fw'></i><h4>Ocorreu um erro ao tentar processar a requisição. Por favor, tente novamente.</h4></div>");
                }
            });
        }

        $("#formEdit").on("change", "#bandeira", function () {
            $("#btnEdit").show();
            $("#btnCancel").hide();
            $("#btnSave").hide();

            var id = $(this).val();
            $("#formEdit").attr("action", ""+base_url+"taxa/edit?id=" + id);
            if (id) {
                var url = base_url + "taxa/view?id=" + id;
                showTaxas(url);
            }
        });
    })
</script>

<style>
    #bandeira {
        background-color: #fff;
    }
</style>