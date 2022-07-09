<?php
include_once("../classes/Consulta.php");
if (isset($_SESSION['administrador'])) {
?>

    <?php
    $objConsulta = new Consulta();

    $objConsulta->selecionarConsultas();


    if ($objConsulta->retornoBD != null) {
    ?>
        <br />
        <div class="row">
            <div class="col-12">
                <table class="table table-striped table-hover">
                    <tr>
                        <th width="5%">#</th>
                        <th width="25%">Animal</th>
                        <th width="25%">Cliente</th>
                        <th width="10%">Data</th>
                        <th width="10%">Hora</th>
                    </tr>

                    <?php

                    while ($retorno = $objConsulta->retornoBD->fetch_object()) {
                        echo '<tr><td>' . $retorno->id . '</td><td>' .
                            $retorno->nome . '</td><td>' .
                            $retorno->nome_cliente . '</td><td>' .
                            $retorno->data . '</td><td>' .
                            $retorno->hora . '</td>';

                    }

                    ?>
                </table>
            </div>
        </div>
<?php
    }
} else {
    header("Location: ../index.php");
}
?>