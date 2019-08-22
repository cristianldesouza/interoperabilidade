<?php

$nome = $_POST['nome'];
$telefone = $_POST['telefone'];
$sexo = $_POST['sexo'];
$email = $_POST['e-mail'];

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


