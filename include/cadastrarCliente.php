<?php
if (isset($_SESSION['administrador'])) {
?>

  <div class="container">
    <div class="row">
      <div class="col-10">
        <form method="POST" action="">
          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email</label>
            <input type="email" class="form-control" id="email-cliente" aria-describedby="emailHelp" name="emailCliente">
          </div>
          <div class="mb-3">
            <label for="nome" class="form-label">Nome</label>
            <input type="text" class="form-control" id="nome-cliente" aria-describedby="nomeHelp" name="nomeCliente">
          </div>

          <div class="mb-3">
            <label for="cpf" class="form-label">CPF</label>
            <input type="text" class="form-control" id="cpf-cliente" aria-describedby="cpfHelp" name="cpfCliente">
          </div>

          <div class="mb-3">
            <label for="telefone" class="form-label">Telefone</label>
            <input type="text" class="form-control" id="telefone-cliente" aria-describedby="telefoneHelp" name="telefoneCliente">
          </div>

          <div class="mb-3">
            <label for="rua" class="form-label">Rua</label>
            <input type="text" class="form-control" id="rua-cliente" aria-describedby="ruaHelp" name="ruaCliente">
          </div>

          <div style="display: flex; gap:1rem;">
            <div class="mb-3" style="flex:1">
              <label for="cidade" class="form-label">Cidade</label>
              <input type="text" class="form-control" id="cidade-cliente" aria-describedby="cidadeHelp" name="cidadeCliente">
            </div>
            <div class="mb-3" style="flex:1">
              <label for="estado" class="form-label">Estado</label>
              <input type="text" class="form-control" id="estado-cliente" aria-describedby="estadoHelp" name="estadoCliente">
            </div>
          </div>



          <input type="hidden" name="formCadastrarCliente">
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