<?php
include 'funcoes.php';

session_start();

if (isset($_POST)){
    $nome = $_POST['nome'];
    $telefone = $_POST['telefone'];
    $sexo = $_POST['sexo'];
    $email = $_POST['e-mail'];

    geraXML($nome, $telefone, $sexo, $email);
}