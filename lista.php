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
                                    <button type='button' class='btn btn-outline-info' onclick='trocaFormato()' >XML</button>  
                                    <button type='button' class='btn btn-outline-dark'>JSON</button>
                                    <button type='button' class='btn btn-outline-danger'>X</button>
                                </td>

                            </tr>
                            ";
                        }
                    ?>
                </tbody>
              </table>
        </div>
        <textarea class="display"  readonly="readonly">
            <?php
                
            ?>
        </textarea>
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

    function trocaFormato(e) {
        console.log(this);
    }
</script>
</html>