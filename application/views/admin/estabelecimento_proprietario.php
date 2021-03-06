<form id="formEdit" method="post" class="formNewUser" action="<?= base_url(); ?>proprietario/edit?id=<?= $proprietario["id"]; ?>"
      data-parsley-validate>
    <?php if ($error = $this->session->flashdata('alerta')): ?>
        <div class="alert alert-danger alert-dismissible fade in" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                        aria-hidden="true">×</span>
            </button>
            <strong><?= $this->session->flashdata('alerta'); ?></strong>
        </div>
    <?php elseif($error = $this->session->flashdata('sucesso')): ?>
        <div class="alert alert-success alert-dismissible fade in" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                        aria-hidden="true">×</span>
            </button>
            <strong><?= $this->session->flashdata('sucesso'); ?></strong>
        </div>
    <?php endif; ?>

    <div class="x_title">
        <h2>Informações do Responsável</h2>
        <?php if(!$usuario_cadastrado): ?>
            <button type="button" class="btn btn-primary btn-sm pull-right" id="btn-novo">
                <i class="fa fa-plus"></i> Criar novo usuário com estes dados
            </button>
        <?php else:?>
            <button type="button" class="btn btn-primary btn-sm pull-right" id="btn-novo" disabled>
                <i class="fa fa-plus"></i> Já existe usuário com este email
            </button>
        <?php endif; ?>

        <div class="clearfix"></div>
    </div>

    <div class="col-md-6 col-sm-6 col-xs-12 form-group">
        <label for="fullname">Nome Completo * :</label>
        <input type="text" id="fullname" class="form-control" name="nome" data-parsley-trigger="change"
               value="<?= $proprietario["name"]; ?>" required disabled />
    </div>

    <div class="col-md-6 col-sm-6 col-xs-12 form-group">
        <label for="email">Email* :</label>
        <input type="email" id="email" class="form-control" name="email"
               data-parsley-trigger="change" value="<?= $proprietario["email"]; ?>" required disabled />
    </div>

    <div class="col-md-6 col-sm-6 col-xs-12 form-group">
        <label for="contato">Contato* :</label>
        <input type="text" data-inputmask="'mask': '99999999999'" id="contato"
               class="form-control" name="contato" data-parsley-trigger="change"
               value="<?= $proprietario["phone"]; ?>" required disabled />
    </div>

    <div class="col-md-6 col-sm-6 col-xs-12 form-group">
        <label for="whatsapp">Contato WhatsApp* :</label>
        <input type="text" id="whatsapp" data-inputmask="'mask': '99999999999'"
               class="form-control" name="whatsapp" data-parsley-trigger="change"
               value="<?= $proprietario["messenger_phone"]; ?>" required disabled />
    </div>
</form>

<script type="text/javascript">
    $(document).ready(function () {
        var base_url = "<?= base_url() ?>";

        $("#formEdit").on("click", "#btn-novo", function () {
            newUser();
        });

        var dataNewUser = {
            estabelecimento: "<?= $estabelecimento['id']; ?>",
            nome: "<?= $proprietario['name']; ?>",
            email: "<?= $proprietario['email']; ?>",
            perfil: "CLIENTE",
            status: false
        };

        function newUser() {
            // var urlForm = base_url + "proprietario/novo_usuario?nome="+dadosNewUser["nome"]+"&email="+dadosNewUser["email"]+"&perfil=CLIENTE";
            // var urlForm = base_url + "proprietario/novo_usuario/";
            var urlForm = base_url + "usuario/novo/";
            $.ajax({
                url: urlForm,
                method: "post",
                data: dataNewUser,
                beforeSend: function () {
                    $(".tab-content .alert").hide();
                    $("#btn-novo").html("<i class='fa fa-circle-o-notch fa-spin fa-1x fa-fw'></i> Cadastrando novo usuário");
                },
                success: function (data) {
                    $(".tab-content .alert").addClass("alert-success").show();
                    $(".tab-content .alert strong").html("Dados atualizados com sucesso!");
                    $("#btn-novo").attr("disabled", "disabled").html("<i class='fa fa-plus'></i> Já existe usuário com este email");
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

        // $("#formEdit").on("click", "#btn-novo", function () {
        //     var urlForm = base_url + "usuario/novo";
        //     $.ajax({
        //         url: urlForm,
        //         method: "POST",
        //         data: $("#formEdit").serialize(),
        //         success: function (data) {
        //             $(".tab-content .alert").addClass("alert-success").show();
        //             $(".tab-content .alert strong").html("Usuário criado com sucesso!");
        //             setTimeout(function() {
        //                 $(".tab-content .alert-success").hide();
        //             }, 3000)
        //         },
        //         error: function () {
        //             $(".tab-content .alert").addClass("alert-error").show();
        //             $(".tab-content .alert strong").html("Ocorreu um erro ao tentar processar a requisição. Por favor, tente novamente!");
        //         }
        //     });
        // });
    })
</script>