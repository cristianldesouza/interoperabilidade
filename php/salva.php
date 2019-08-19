<?php
include 'funcoes.php';

session_start();

if (isset($_POST)) {
    $nome = $_POST['nome'];
    $telefone = $_POST['telefone'];
    $sexo = $_POST['sexo'];
    $email = $_POST['e-mail'];

    salvaPessoa($nome, $telefone, $sexo, $email);
} else {
    echo "Não foi possível salvar a pessoa no banco de dadox";
}


//echo "<script>window.location='../index.html'; alert('$nome, sua mensagem foi enviada com sucesso! Estaremos retornando em breve');</script>";
header("Location: ../index.html");




