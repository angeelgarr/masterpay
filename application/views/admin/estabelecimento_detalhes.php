<div class="modal-header">
    <h3 class="modal-title" id="modal">Detalhes do Estabelecimento</h3>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<div class="modal-body">
    <div class="" role="tabpanel" data-example-id="togglable-tabs">
        <ul id="tab-detalhes" class="nav nav-tabs bar_tabs" role="tablist">
            <li role="presentation" class="active">
                <a href="#tab_content1" id="responsavel-tab" role="tab" data-toggle="tab" aria-expanded="true">Dados do
                    Responsável</a>
            </li>
            <li role="presentation" class="">
                <a href="#tab_content2" role="tab" id="estabelecimento-tab" data-toggle="tab" aria-expanded="false">Informações
                    do Estabelecimento</a>
            </li>
            <li role="presentation" class="">
                <a href="#tab_content3" role="tab" id="banco-tab" data-toggle="tab" aria-expanded="false">Banco</a>
            </li>
            <li role="presentation" class="">
                <a href="#tab_content4" role="tab" id="taxas-tab" data-toggle="tab" aria-expanded="false">Taxas
                    Combinadas</a>
            </li>
            <li role="presentation" class="">
                <a href="#tab_content5" role="tab" id="equipamentos-tab" data-toggle="tab" aria-expanded="false">Equipamentos</a>
            </li>

            <li role="presentation" class="">
                <a href="#tab_content6" role="tab" id="vendedor-tab" data-toggle="tab" aria-expanded="false">Vendedor</a>
            </li>
            <li role="presentation" class="">
                <a href="#tab_content7" role="tab" id="observacao-tab" data-toggle="tab" aria-expanded="false">Observação</a>
            </li>
        </ul>
        <div id="tab-content" class="tab-content">
            <div class="alert alert-dismissible fade in" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                            aria-hidden="true">×</span>
                </button>
                <strong></strong>
            </div>

            <div role="tabpanel" class="tab-pane fade active in" id="tab_content1"
                 aria-labelledby="responsavel-tab">
                <!-- Exibir Dados do Responsável -->
            </div>

            <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="estabelecimento-tab">
                <!-- Exibir Dados do Estabelecimento -->
            </div>

            <div role="tabpanel" class="tab-pane fade" id="tab_content3" aria-labelledby="banco-tab">
                <!-- Exibir Dados do Banco -->
            </div>

            <div role="tabpanel" class="tab-pane fade" id="tab_content4" aria-labelledby="taxas-tab">
                <!-- Exibir Dados das Taxas -->
            </div>

            <div role="tabpanel" class="tab-pane fade" id="tab_content5" aria-labelledby="equipamentos-tab">
                <!-- Exibir Dados dos Equipamentos -->
            </div>

            <div role="tabpanel" class="tab-pane fade" id="tab_content6" aria-labelledby="vendedor-tab">
                <!-- Exibir Dados do Vendedor -->
            </div>

            <div role="tabpanel" class="tab-pane fade" id="tab_content7" aria-labelledby="observacao-tab">
                <!-- Exibir Observação sobre alterações -->
            </div>
        </div>
    </div>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
    <button type="button" id="btnCancel" class="btn btn-secondary">Cancelar</button>
    <button type="button" id="btnEdit" class="btn btn-primary">Editar</button>
    <button type="submit" id="btnSave" class="btn btn-primary" style="display: none;">Salvar</button>
</div>

<script type="text/javascript">
    $(document).ready(function () {
        function enableEdit() {
            $(".tab-content input, .tab-content select, .tab-content radio, .tab-content textarea").removeAttr("disabled");
            $("#btnSave, #btnCancel").show();
            $("#btnEdit").hide();
        }

        function disableEdit() {
            $(".tab-content input, .tab-content select, .tab-content radio, .tab-content textarea").attr("disabled", "disabled");
            $("#btnEdit").show();
            $("#btnCancel, #btnSave").hide();
        }

        $(".modal-footer").on("click", "#btnEdit", function () {
            enableEdit();
        });

        $(".modal-footer").on("click", "#btnCancel", function () {
            disableEdit();
        });

        $(".modal-footer").on("click", "#btnSave", function () {
            saveData();
        });

        function showContent(url, tab_content) {
            $.ajax({
                url: url,
                beforeSend: function () {
                    $("#tab-content .alert").hide();
                    $("#tab-content .tab-pane").html("");
                    $(tab_content).html("<div class='clearfix'></div><div style='text-align: center; padding: 50px;'><i class='fa fa-circle-o-notch fa-spin fa-3x fa-fw'></i><p>Carregando...</p></div>");
                },
                success: function (data) {
                    $(tab_content).html(data);
                    disableEdit();
                    $("#bandeira, #equipamento").removeAttr("disabled");
                },
                error: function () {
                    $(tab_content).html("<div class='clearfix'></div><div style='text-align: center; padding: 50px;'><i class='fa fa-circle-o-notch fa-spin fa-3x fa-fw'></i><h4>Ocorreu um erro ao tentar processar a requisição. Por favor, tente novamente!</h4></div>");
                }
            });
        }

        function showResponsavel(id) {
            var url = base_url + "proprietario/view?id=" + id;
            showContent(url, "#tab_content1");
        }
        showResponsavel(<?= $estabelecimento["owner_id"]; ?>);

        $("#tab-detalhes").on("click", "#responsavel-tab", function () {
            var url = base_url + "proprietario/view?id=" + <?= $estabelecimento["owner_id"]; ?>;
            showContent(url, "#tab_content1");
        });

        $("#tab-detalhes").on("click", "#estabelecimento-tab", function () {
            var url = base_url + "estabelecimento/view?id=" + <?= $estabelecimento["id"]; ?>;
            showContent(url, "#tab_content2");
        });

        $("#tab-detalhes").on("click", "#banco-tab", function () {
            var url = base_url + "banco/view?id=" + <?= $estabelecimento["id"]; ?>;
            showContent(url, "#tab_content3");
        });

        $("#tab-detalhes").on("click", "#taxas-tab", function () {
            var url = base_url + "taxa/consultaTaxas?id=" + <?= $estabelecimento["id"]; ?>;
            showContent(url, "#tab_content4");
        });

        $("#tab-detalhes").on("click", "#equipamentos-tab", function () {
            var url = base_url + "equipamento/consultaEquipamentos?id=" + <?= $estabelecimento["id"]; ?>;
            showContent(url, "#tab_content5");
        });

        $("#tab-detalhes").on("click", "#vendedor-tab", function () {
            var url = base_url + "vendedor/consultaVendedor?id=" + <?= $estabelecimento["id"]; ?>;
            showContent(url, "#tab_content6");
        });

        $("#tab-detalhes").on("click", "#observacao-tab", function () {
            var url = base_url + "observacao/view?id=" + <?= $estabelecimento["id"]; ?>;
            showContent(url, "#tab_content7");
        });

        function saveData() {
            var urlForm = $("#formEdit").attr("action");
            $.ajax({
                url: urlForm,
                method: "POST",
                data: $(".tab-pane form").serialize(),
                success: function (data) {
                    $(".tab-content .alert").addClass("alert-success").show();
                    $(".tab-content .alert strong").html("Dados atualizados com sucesso!");
                    setTimeout(function() {
                        $(".tab-content .alert-success").hide();
                    }, 3000)
                },
                error: function () {
                    $(".tab-content .alert").addClass("alert-error").show();
                    $(".tab-content .alert strong").html("Ocorreu um erro ao tentar processar a requisição. Por favor, tente novamente!");
                }
            });
        }
    })
</script>

<style>
    @media (min-width: 992px) {
        .modal-lg {
            /*width: 960px;*/
            width: 1070px;
        }
    }

    .tab-content .alert {
        display: none;
    }
</style>