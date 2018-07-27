<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Controle de Acesso | Alterar Senha</title>

    <!-- Bootstrap -->
    <link href="<?= base_url(); ?>assets/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?= base_url(); ?>assets/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="<?= base_url(); ?>assets/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="<?= base_url(); ?>assets/vendors/animate.css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="<?= base_url(); ?>assets/build/css/custom.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="<?= base_url(); ?>assets/css/login.css" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">

    <!-- favicon -->
    <link rel="apple-touch-icon" sizes="57x57" href="<?= base_url(); ?>assets/images/favicon/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="<?= base_url(); ?>assets/images/favicon/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="<?= base_url(); ?>assets/images/favicon/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="<?= base_url(); ?>assets/images/favicon/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="<?= base_url(); ?>assets/images/favicon/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="<?= base_url(); ?>assets/images/favicon/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="<?= base_url(); ?>assets/images/favicon/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="<?= base_url(); ?>assets/images/favicon/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="<?= base_url(); ?>assets/images/favicon/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"
          href="<?= base_url(); ?>assets/images/favicon/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?= base_url(); ?>assets/images/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="<?= base_url(); ?>assets/images/favicon/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?= base_url(); ?>assets/images/favicon/favicon-16x16.png">
    <link rel="manifest" href="<?= base_url(); ?>assets/images/favicon/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="<?= base_url(); ?>assets/images/favicon/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">

</head>

<body class="text-center">
<div class="content_login">
    <div class="row">
        <div class="col-md-6 col-sm-6 col-xs-12" style="padding: 30px;">
            <form method="post" class="form-signin" action="<?= base_url(); ?>login/confirmar_senha">
                <img src="<?= base_url(); ?>assets/images/maxpay_logo-02.png" alt="" width="320">
                <h1 class="font-weight-normal">Alterar Senha</h1>
                <?php if ($error = $this->session->flashdata('alerta')): ?>
                    <div class="alert alert-danger alert-dismissible fade in" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                    aria-hidden="true">×</span>
                        </button>
                        <strong><?= $this->session->flashdata('alerta'); ?></strong>
                    </div>
                <?php endif; ?>
                <label for="inputEmail" class="sr-only">Seu E-mail</label>
                <input type="email" id="inputEmail" class="form-control" name="email"
                       value="<?= $this->session->userdata('usuario_logado')['email'] ?>" disabled="true"/>
                <label for="inputPassword" class="sr-only">Sua senha</label>
                <input type="password" id="inputPassword" class="form-control" name="senha-nova" placeholder="Sua senha"
                       required/>
                <label for="inputPasswordRepeat" class="sr-only">Repetir senha</label>
                <input type="password" id="inputPasswordRepeat" class="form-control" name="senha-nova-repete"
                       placeholder="Repetir Senha" required/>

                <div class="col-md-6 col-sm-6 col-xs-8 col-md-offset-3 col-sm-offset-3 col-xs-offset-2">
                    <button class="btn btn-lg btn-primary btn-block" type="submit">Entrar</button>
                </div>

                <div class="clearfix"></div>

                <div class="separator copy">
                    <p class="text-muted">&copy; 2018 Todos os Direitos Reservado. Masterpay! Sua forma de pagamento
                        inteligente</p>
                </div>
            </form>
        </div>

        <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="content_site text-left">
                <img src="<?= base_url(); ?>assets/images/maxpay_logo-white.png" alt="" width="232" height="65">
                <p>A melhor máquina de cartão, gestão do seu negócio, relatório em tempo real.</p>
                <a class="btn btn-default btn-lg" href="//www.maxpay.com.br"> Ir para o site </a>
            </div>
        </div>
    </div>
</div>
</body>
</html>
