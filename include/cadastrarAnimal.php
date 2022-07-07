<?php
if (isset($_SESSION['administrador'])) {
  $_
?>

  <div class="container">
    <div class="row">
      <div class="col-10">
        <form method="POST" action="">
          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Nome do Animal</label>
            <input type="email" class="form-control" id="email-cliente" aria-describedby="emailHelp" name="emailCliente">
          </div>
          <div class="mb-3">
            <label for="nome" class="form-label">Cliente [Dono do Animal]</label>
            <select>
              
            </select>
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