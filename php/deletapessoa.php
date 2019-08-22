<?php
session_start();

if (isset($_POST)){

    $id = $_POST['id'];

    $conexao = pg_connect("host=localhost port=5432 dbname=interoperabilidade user=propesqweb password=propesqweb") or
    die ("Não foi possível conectar ao servidor PostGreSQL");
    
    $sql = "DELETE FROM pessoa WHERE id = ".$id."";

    $result = pg_query($conexao, $sql);
    
    pg_close($pg_close);

} else { 
    echo "Não deu não bro";
}
