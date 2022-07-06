<?php
include('./classes/Conexao.php');

if (isset($_POST['email'])) {
    //se existir criar secao e redirecionar isset($_SESSION['administrador']
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $sql = "select * from usuarios WHERE email='$email' AND senha='$senha';";

    $objConexao = new Conexao();
    $conexaoBD = $objConexao->getConexao();

    $retorno = $conexaoBD->query($sql)->num_rows;

    $isUser = $retorno > 0;

    if ($isUser) {
        session_start();
        $_SESSION["administrador"] = true;
        echo" <script>document.location.href='./produto/admin.php'</script>";
    } else {
        echo "<script>alert('Usuario inexistente!')</script>";
        echo" <script>document.location.href='./index.html'</script>";
    }
}
?>