<?php
include 'funcoes.php';

if (isset($_POST)) {
    $nome = $_POST['nome'];
    $telefone = $_POST['telefone'];
    $sexo = $_POST['sexo'];
    $email = $_POST['e-mail'];

    salvaPessoa($nome, $telefone, $sexo, $email);
} else {
    echo "erro!";
}




