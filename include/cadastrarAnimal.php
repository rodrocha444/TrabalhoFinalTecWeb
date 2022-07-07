<?php
include_once('../classes/Cliente.php');
if (isset($_SESSION['administrador'])) {
  $objCliente = new Cliente();
  $objCliente->selecionarClientes();
?>

  <div class="container">
    <div class="row">
      <div class="col-10">
        <form method="POST" action="">
          <div class="mb-3">
            <label class="form-label">Nome do Animal</label>
            <input type="text" class="form-control" id="nome-animal" name="nomeAnimal">
          </div>
          <div class="mb-3">
            <label for="nome" class="form-label">Cliente (ID - Nome)</label><br/>
            <select name="idClienteAnimal" class="select-cliente">
              <?php
              while ($retorno = $objCliente->retornoBD->fetch_object()) {
                echo '<option value="' . $retorno->id_cliente . '">'. $retorno->id_cliente . ' - ' . $retorno->nome_cliente . '</option>';
              }
              ?>
            </select>
          </div>



          <input type="hidden" name="formCadastrarAnimal">
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