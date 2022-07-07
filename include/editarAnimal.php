<?php
include_once("../classes/Animal.php");
if (isset($_SESSION['administrador'])) {
    $objAnimal = new Animal();
    if (isset($_GET['id'])) {
        $objAnimal->selecionarPorId($_GET['id']);
    }
    $retorno = $objAnimal->retornoBD->fetch_object();
?>

    <div class="container">
        <div class="row">
            <div class="col-10">
                <form method="POST" action="">
                    <div class="mb-3">
                        <label class="form-label">Nome</label>
                        <input type="text" class="form-control" id="nome-animal" name="nomeAnimal" value="<?php echo $retorno->nome; ?>">
                        <div id="nomeHelp" class="form-text"></div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">ID Cliente</label>
                        <input type="text" class="form-control" id="id-cliente-animal" name="idClienteAnimal" value="<?php echo $retorno->id_cliente; ?>">
                        <div id="idClienteHelp" class="form-text"></div>
                    </div>

                    <input type="hidden" value="<?php echo $retorno->id; ?>" name="idAnimal">
                    <input type="hidden" name="formEditarAnimal">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>


            </div>
        </div>
    </div>
<?php

} else {
    header("Location:../index.html");
}
?>