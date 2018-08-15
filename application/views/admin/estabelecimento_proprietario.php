<form id="formEdit" method="post" action="<?= base_url(); ?>proprietario/edit?id=<?= $proprietario["id"]; ?>"
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
        <h2>Informações do Responsável</h2>
        <button type="button" class="btn btn-primary btn-sm pull-right" id="btn-novo">
            <i class="fa fa-plus"></i> Criar novo usuário com estes dados
        </button>

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
//            alert('Criar novo usuário');
        });
    })
</script>