<?php
include_once('../classes/Cliente.php');
include_once('../classes/Animal.php');
if (isset($_SESSION['administrador'])) {
  $objCliente = new Cliente();
  $objAnimal = new Animal();
  $objCliente->selecionarClientes();
  $objAnimal->selecionarAnimais();
?>

  <div class="container">
    <div class="row">
      <div class="col-10">
        <form method="POST" action="">

        <div class="mb-3">
            <label class="form-label">Animal - Cliente</label><br/>
            <select name="fkIdAnimal" class="select-cliente">
              <?php
              $retorno2 = $objCliente->retornoBD->fetch_object();
              while ($retorno = $objAnimal->retornoBD->fetch_object()) {
                echo '<option value="' . $retorno->id . '">'. $retorno->nome . ' - ' . $retorno2->nome_cliente . '</option>';
              }
              ?>
            </select>
          </div>
          <div class="mb-3">
            <label class="form-label">Data</label>
            <input type="text" class="form-control" name="dataConsulta">
          </div>
          <div class="mb-3">
            <label class="form-label">Hora</label>
            <input type="text" class="form-control" name="horaConsulta">
          </div>

          



          <input type="hidden" name="formCadastrarConsulta">
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