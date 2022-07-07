<?php
include_once("../classes/Cliente.php");
include_once("../classes/Animal.php");
//Get
if (isset($_GET['rota'])) {
    switch ($_GET['rota']) {
        case "cadastrar_cliente":
            include("../include/cadastrarCliente.php");
            break;

        case "visualizar_cliente":
            include("../include/visualizarCliente.php");
            break;

        case "editar_cliente":
            include("../include/editarCliente.php");
            break;

        case "cadastrar_animal":
            include("../include/cadastrarAnimal.php");
            break;

        case "visualizar_animal":
            include("../include/visualizarAnimal.php");
            break;

        case "editar_animal":
            include("../include/editarAnimal.php");
            break;

        case "logout":
            $_SESSION["administrador"] = false;
            session_destroy();
            echo " <script>document.location.href='../index.html'</script>";
            break;
    }
}


//Post
if (isset($_POST['formCadastrarCliente'])) {
    $objCliente = new Cliente();
    $objCliente->setEmail($_POST['emailCliente']);
    $objCliente->setNome($_POST['nomeCliente']);
    $objCliente->setCPF($_POST['cpfCliente']);
    $objCliente->setTelefone($_POST['telefoneCliente']);
    $objCliente->setRua($_POST['ruaCliente']);
    $objCliente->setCidade($_POST['cidadeCliente']);
    $objCliente->setEstado($_POST['estadoCliente']);

    $objCliente->cadastrar();
} else if (isset($_POST['formEditarCliente'])) {
    $objCliente = new Cliente();
    $objCliente->setNome($_POST['nomeCliente']);
    $objCliente->setCPF($_POST['cpfCliente']);
    $objCliente->setEmail($_POST['emailCliente']);
    $objCliente->setID($_POST['idCliente']);
    $objCliente->editar();
} else if (isset($_POST['formEditarAnimal'])) {
    $objAnimal = new Animal();
    $objAnimal->setNome($_POST['nomeAnimal']);
    $objAnimal->setIdCliente($_POST['idClienteAnimal']);
    $objAnimal->setId($_POST['idAnimal']);
    $objAnimal->editar();
}
