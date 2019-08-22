<?php
    include 'php/funcoes.php';

    $pessoas = listaPessoas();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Interoperabilidade</title>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="js/jquery.mask.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    
    
    <script src="js/main.js"></script>
    <link rel="stylesheet" href="css/main.css">
</head>
<body>
    <div class="container main">
        <div class="my-table">
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Telefone</th>
                    <th scope="col">Sexo</th>
                    <th scope="col">E-mail</th>
                    <th scope="col">Visualizar</th>
                  </tr>
                </thead>
                <tbody>
                    <?php
                        foreach($pessoas as $pessoa) {
                            echo "
                            <tr>
                                <th scope='row'>".$pessoa['id']."</th>
                                <td>".$pessoa['nome']."</td>
                                <td>".$pessoa['telefone']."</td>
                                <td>".$pessoa['sexo']."</td>
                                <td>".$pessoa['email']."</td>
                                <td>
                                    <button type='button' class='btn btn-outline-info' onclick='geraXML(event)' >XML</button>  
                                    <button type='button' class='btn btn-outline-dark' onclick='gerarJSON(event)'>JSON</button>
                                    <button type='button' class='btn btn-outline-danger' onclick='deletarPessoa(event)'>X</button>
                                </td>

                            </tr>
                            ";
                        }
                    ?>
                </tbody>
              </table>
        </div>

        <div class="botao-container">
            <button type="button" id="troca-troca" class="btn btn-primary botaozao">Adicionar Pessoa</button>
        </div>
    </div>
</body>
<script>
    $(document).ready(() => {
        $("#troca-troca").on('click', trocaPagina);
    });

    function trocaPagina() {
        window.location.replace("index.html"); 
    }

    
    function deletarPessoa(e) {
        let coluna = e.target.parentNode.parentNode; 

        let id = coluna.children[0].innerText;
        
        $.ajax({
            url: "php/deletapessoa.php",
            type: "POST",
            data: "id="+id+"",
            dataType: "html"

        }).done(function(resposta) {
            window.location.reload();

        }).fail(function(jqXHR, textStatus ) {
            console.log("Request failed: " + textStatus);

        }).always(function() {
            
        });
    }

    function geraXML(e) {
        let coluna = e.target.parentNode.parentNode; 
        
        let nome = coluna.children[1].innerText;
        let telefone = coluna.children[2].innerText;
        let sexo = coluna.children[3].innerText;
        let email = coluna.children[4].innerText;
        
        $.ajax({
            url: "php/geraxml.php",
            type: "POST",
            data: "nome="+nome+"&telefone="+telefone+"&sexo="+sexo+"&email="+email+"",
            dataType: "html"

        }).done(function(resposta) {
            alert(resposta);

        }).fail(function(jqXHR, textStatus ) {
            console.log("Request failed: " + textStatus);

        }).always(function() {
            
        });
    }

    function gerarJSON(e) {
        let coluna = e.target.parentNode.parentNode; 
        
        let nome = coluna.children[1].innerText;
        let telefone = coluna.children[2].innerText;
        let sexo = coluna.children[3].innerText;
        let email = coluna.children[4].innerText;
        
        $.ajax({
            url: "php/gerajson.php",
            type: "POST",
            data: "nome="+nome+"&telefone="+telefone+"&sexo="+sexo+"&email="+email+"",
            dataType: "html"

        }).done(function(resposta) {
            alert(resposta);

        }).fail(function(jqXHR, textStatus ) {
            console.log("Request failed: " + textStatus);

        }).always(function() {
            
        });
    }
</script>
</html>