<?php
include_once("../classes/Cliente.php");
include_once("../classes/Animal.php");

if(isset($_POST['idClienteDeletar'])){
    $objCliente = new Cliente();
    $objCliente->deletar($_POST['idClienteDeletar']);
}

if(isset($_POST['idAnimalDeletar'])){
    $objAnimal = new Animal();
    $objAnimal->deletar($_POST['idAnimalDeletar']);
}

