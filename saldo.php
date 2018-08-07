<?php 
    $saldo = substr_replace($_GET['saldo'], ',', -2, 0); 
    $aReceber = substr_replace($_GET['areceber'], ',', -2, 0);
?>
<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="estilo.css">
    </head>
    <body>
        <h2>Desafio Suporte</h2>
        <div class="row">
            <div class="col-75">
                <div class="container">
                    <div class="row">
                        <div class="col-50">     
                            <h3>Compra Realizada com sucesso!</h3>   
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
                        </div>          
                    </div>     
                </div>
            </div>
        </div>
    </body>
</html>
