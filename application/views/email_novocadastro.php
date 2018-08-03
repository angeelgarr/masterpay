<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Maxpay! Sua forma de pagamento inteligente</title>
</head>
<body>
<div style="margin:0;padding:40px;background-color:rgba(0,0,0,0.05);font-family:calibri;">
    <table align="center" border="0" cellpadding="0" cellspacing="0" width="600">
        <tr>
            <td>
                <table align="center" border="0" cellpadding="0" cellspacing="0" width="600">
                    <!-- Logo -->
                    <tr>
                        <td>
                            <a href="https://www.maxpay.com.br/" target="_blank">
                                <img src="<?= base_url(); ?>assets/images/maxpay_logo.png" border="0"
                                     style="image-rendering:pixelated;width:180px;" alt="Maxpay" title="Maxpay">
                            </a>
                        </td>
                    </tr>
                    <!-- #logo -->
                </table>

                <table align="center" border="0" cellpadding="0" cellspacing="0" bgcolor="#fff"
                       style="padding:20px;border: 1px solid #ccc;border-bottom: none;border-radius:4px;width:600px;">
                    <tbody>
                    <tr>
                        <td valign="top" style="width: 600px;">
                            <table align="center" border="0" cellpadding="0" cellspacing="0" style="width:550px">
                                <tbody>
                                <tr>
                                    <td style="font-size:16px;color:#757575;">Prezado(a) <strong><?= $nome; ?>,</strong></td>
                                </tr>
                                <tr>
                                    <td style="font-size:14px;color:#757575;padding-top:10px;padding-bottom:10px;">
                                        Segue abaixo suas credenciais de acesso ao portal MaxPay.
                                    </td>
                                </tr>
                                <tr>
                                    <td style="font-size:14px;color:#757575;padding-top:10px;padding-bottom:10px;">
                                        Esta é sua senha temporária: <strong><?= $senhatemp; ?></strong>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="font-size:14px;color:#757575;padding-top:10px;padding-bottom:10px;">
                                        Acesse o link abaixo informando seu email e a senha temporária e siga os passos para
                                        concluir o processo.
                                    </td>
                                </tr>
                                <tr>
                                    <td align="center">
                                        <a href="<?= base_url(); ?>login "
                                           style="background:#1b75bc;border-radius:4px;color:#fff;display:inline-block;font-size:14px;font-weight:300;line-height:40px;text-align:center;text-decoration:none;width:160px;text-transform:uppercase;">Primeiro acesso</a>
                                    </td>
                                </tr>
                                <tr style="height: 10px;"></tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                    </tbody>
                </table>

                <table align="center" border="0" cellpadding="0" cellspacing="0" style="width:600px;">
                    <tr>
                        <td align="center" style="font-size:12px;color:#878787;padding:40px 40px 0;">
                            Não responda a este email, pois esta é uma mensagem automática. Se precisar de ajuda ou quiser entrar em contato conosco, acesse os links abaixo.</td>
                    </tr>
                    <tr>
                        <td align="center" style="font-size:14px;color:#878787;padding:20px 0 10px;">
                            <a href="//www.maxpay.com.br">www.maxpay.com.br</a>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <table align="center" border="0" cellpadding="0" cellspacing="0"
                                   style="width:100%; position: relative;">
                                <tbody>
                                <tr align="center" style="height: 30px;">
                                    <td>
                                        <a href="https://www.maxpay.com.br/entre-em-contato/">Contato</a> |
                                        <a href="https://www.maxpay.com.br/solicite-sua-maxpay/">Peça já a sua</a> |
                                        <a href="https://portal.maxpay.com.br/">Acessar conta</a>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                </table>

                <table align="center" border="0" cellpadding="0" cellspacing="0"
                       style="width:600px; border-collapse: collapse;">
                    <tbody>
                    <tr>
                        <td>
                            <table border="0" cellpadding="0" cellspacing="0"
                                   style="width:600px; border-collapse: collapse;">
                                <tbody>
                                <tr>
                                    <td align="center" style="padding: 10px 0; font-size: 14px;">
                                        <p>&copy; 2018 Todos os Direitos Reservado. Maxpay! Sua forma de pagamento
                                            inteligente.</p>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </td>
        </tr>
    </table>
</div>
</body>
</html>
