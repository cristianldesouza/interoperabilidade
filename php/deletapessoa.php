<?php
session_start();

include 'funcoes.php';

if (isset($_POST)){
    $pessoaID = $_POST['id'];
    deletaPessoa($pessoaID);
} else {
    echo "Não deu bro!";
}