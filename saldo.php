<?php 
    session_start();
    $saldo = substr_replace($_SESSION['saldo'], ',', -2, 0); 
    $aReceber = substr_replace($_SESSION['aReceber'], ',', -2, 0);

    $saldoRecebedor1 = substr_replace($_SESSION['saldoReceberdor1'], ',', -2, 0); 
    $aReceberRecebedor1 = substr_replace($_SESSION['aReceberRecebedor1'], ',', -2, 0);

    $saldoRecebedor2 = substr_replace($_SESSION['saldoRecebedor2'], ',', -2, 0); 
    $aReceberRecebedor2 = substr_replace($_SESSION['aReceberRecebedor2'], ',', -2, 0);

?>
<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="estilo.css">
    </head>
    <body>
        <h2>Desafio Suporte - Compra Realizada com sucesso!</h2>
        <div class="row">
            <div class="col-75">
                <div class="container">
                    <div class="row">
                        <div class="col-50">     
                            <h3>Marketplace</h3><br>
                            <div class="row">
                                <div class="col-50">
                                    <label for="saldodisponivel">Saldo Disponivel</label>
                                    <label type="text" id="saldodisponivel" name="saldodisponivel">R$ <?php echo $saldo ?></label>
                                </div>
                                <div class="col-50">
                                    <label for="saldoreceber">Saldo a Receber</label>
                                    <label type="text" id="saldoreceber" name="saldoreceber">R$ <?php echo $aReceber ?><label>
                            </div>
                        </div>     
                        <div class="col-50">     
                            <h3>Recebedor 1</h3>
                            <div class="row">
                                <div class="col-50">
                                    <label for="saldodisponivel">Saldo Disponivel</label>
                                    <label type="text" id="saldodisponivel" name="saldodisponivel">R$ <?php echo $saldoRecebedor1 ?></label>
                                </div>
                                <div class="col-50">
                                    <label for="saldoreceber">Saldo a Receber</label>
                                    <label type="text" id="saldoreceber" name="saldoreceber">R$ <?php echo $aReceberRecebedor1 ?><label>
                            </div>
                        </div>     
                        <div class="col-50">     
                            <h3>Recebedor 2</h3>
                            <div class="row">
                                <div class="col-50">
                                    <label for="saldodisponivel">Saldo Disponivel</label>
                                    <label type="text" id="saldodisponivel" name="saldodisponivel">R$ <?php echo $saldoRecebedor2 ?></label>
                                </div>
                                <div class="col-50">
                                    <label for="saldoreceber">Saldo a Receber</label>
                                    <label type="text" id="saldoreceber" name="saldoreceber">R$ <?php echo $aReceberRecebedor2 ?><label>
                            </div>
                        </div>          
                    </div>     
                </div>
            </div>
        </div>
        <?php session_destroy(); ?>
    </body>
</html>
