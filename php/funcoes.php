<?php

function salvaPessoa($nome, $telefone, $sexo, $email) {
    $conexao = pg_connect("host=localhost port=5432 dbname=interoperabilidade user=propesqweb password=propesqweb") or
    die ("Não foi possível conectar ao servidor PostGreSQL");

    

    $result = pg_query($conexao, "INSERT INTO pessoa (nome, telefone, sexo, email) VALUES ('".$nome."', '".$telefone."', '".$sexo."', '".$email."')");

    pg_close($pg_close);
}

function deletaPessoa($pessoaID) {

    $conexao = pg_connect("host=localhost port=5432 dbname=interoperabilidade user=propesqweb password=propesqweb") or
    die ("Não foi possível conectar ao servidor PostGreSQL");
    
    $sql = "DELETE FROM pessoa WHERE id = ".$pessoaID."";

    $result = pg_query($conexao, $sql);
    
    pg_close($pg_close);
}


function listaPessoas() {
    $conexao = pg_connect("host=localhost port=5432 dbname=interoperabilidade user=propesqweb password=propesqweb") or
    die ("Não foi possível conectar ao servidor PostGreSQL");


    $result = pg_query($conexao, "SELECT * FROM pessoa");
    $pessoa = array();
    while($linha = pg_fetch_array($result)){
        $pessoa[$linha['id']]['id'] = $linha['id'];
        $pessoa[$linha['id']]['nome'] = $linha['nome'];
        $pessoa[$linha['id']]['telefone'] = $linha['telefone'];
        $pessoa[$linha['id']]['sexo'] = $linha['sexo'];
        $pessoa[$linha['id']]['email'] = $linha['email'];
    }

    pg_close($pg_close);

    return $pessoa;
}

function geraXML($nome, $telefone, $sexo, $email) {
    //inicializar encoding do xml
    $dom = new DOMDocument("1.0", "ISO-8859-1");

    //remover os espaços em branco
    $dom->preserveWhiteSpace = false;

    //gerar código
    $dom->formatOutput = true;

    //criar nó principal
    $root = $dom->createElement("cadastro");

    //elemento filho
    $pessoa = $dom->createElement("pessoa");

    //setando atributos de "pessoa"
    $nome = $dom->createElement("nome", $nome);
    $telefone = $dom->createElement("telefone", $telefone);
    $sexo = $dom->createElement("sexo", $sexo);
    $email = $dom->createElement("email", $email);

    //adiciona os nós na pessoa
    $pessoa->appendChild($nome);
    $pessoa->appendChild($telefone);
    $pessoa->appendChild($sexo);
    $pessoa->appendChild($email);


    //adiciona campos ao nó principal
    $root->appendChild($pessoa);
    $dom->appendChild($root);

    //salva xml
    //$dom->save("contatos.xml");

    //cabeçalho
    header("Content-Type: text/xml");

    //imprime o xml na tela
    print $dom->saveXML();
}