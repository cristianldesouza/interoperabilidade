<?php

if(isset($_POST)) {
    $xmlCliente = $_POST['xml'];
    
    XMLvalidate($xmlCliente);
} else {
    header("HTTP/1.1 404 Faltou o conteúdo meu parceiro");
}


function XMLvalidate($xmlCliente) {
    libxml_use_internal_errors(true);

    $objDom = new DomDocument();

    $objDom->loadXML($xmlCliente);

    if (!$objDom->schemaValidate("validator.xml")) {

        $arrayAllErrors = libxml_get_errors();
       
        header("HTTP/1.1 406 Faz esse xml direito, ramelao");
       
    } else {        
        $cliente = simplexml_load_string($xmlCliente)->cliente;
        
        $id = $cliente['id'];
        $nome = $cliente->nome;
        $sqlCliente = "INSERT INTO cliente (id, nome) VALUES ('".$id."', '".$nome."')";
        $sqlEndereco = "INSERT INTO endereco (cliente, principal, rua, numero, complemento, cidade, estado) VALUES ";
        
        executeQuery($sqlCliente);

        foreach($cliente->enderecos as $enderecos) {
            $principal = $enderecos->endereco['principal'];
            $rua = $enderecos->endereco->rua;
            $numero = $enderecos->endereco->numero;
            $complemento = $enderecos->endereco->complemento;
            $cidade = $enderecos->endereco->cidade;
            $estado = $enderecos->endereco->estado;

            $sqlEndereco .= "(".$id.", '".$principal."', '".$rua."', '".$numero."', '".$complemento."', '".$cidade."', '".$estado."');";
            executeQuery($sqlEndereco);
            
        }
        header("HTTP/1.1 200 tudo certo, meu parceiro!");
    }
    
}  

function executeQuery($sql) {
    $conexao = pg_connect("host=localhost port=5432 dbname=interoperabilidade user=postgres password=123456") or
    header("HTTP/1.1 406 Não foi possível conextar ao banco");

    $result = pg_query($conexao, $sql);

    pg_close($conexao);
}