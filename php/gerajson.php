<?php

if(isset($_POST)){
    $nome = $_POST['nome'];
    $telefone = $_POST['telefone'];
    $sexo = $_POST['sexo'];
    $email = $_POST['e-mail'];

    print json_encode($_POST);
} else {
    echo "Não deu!";
}


