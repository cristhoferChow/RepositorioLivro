<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>  
</head>
<!-- css -->
<style>
body{
    font-family: Arial, Helvetica, sans-serif;
}

.content{
    display: flex;
    justify-content: center;
}
.contato{
    width: 100%;
    max-width: 500px;
}
.form{
    display: flex;
    flex-direction: column;
}
.field {
    padding: 10px;
    margin-bottom: 15px;
    border: 1px solid #DDD;
    border-radius: 5px;
    font-family: Arial, Helvetica, sans-serif;
    font-size: 16px;

}
#field{
    cursor: pointer;
}
.decoration{
    text-decoration: none;
    color: black;
    cursor: pointer;
}
textarea{
    height: 150px;
}
  </style>

<body>
    <section class="content">
        <div class="contato">
            <h3>Cadastro de Livros</h3>
            <form class="form" method="POST">
                <input class="field" type="text" name="name" placeholder="Nome do Livro">
                <input class="field" type="number" name="ano" placeholder="Ano do Livro">
                <input class="field" type="number" name="exemplares" placeholder="Exemplares">
                <input class="field" id="field"type="submit" value="Cadastrar">
                <button class="field"><a href="listar.php" class="decoration">Listar Livros</a></button>
            </form>
        </div>
    </section>
</body>
</html>

<?php

include('conexao.php');

if($_POST){
    $nome = $_POST['name'];
    $ano = $_POST['ano'].'/00/00';
    $exemplares = $_POST['exemplares'];
    $hoje = date('Y/m/d');

    $sql = 'INSERT INTO tb_livro VALUES (null, "'.$nome.'","'.$ano.'","'.$hoje.'",'.$exemplares.')';
    $executa = $GLOBALS['con']->query($sql);

    if($executa){
        echo "<h3 style= 'display: flex; justify-content: center;'>
        Cadastrado com sucesso!</h3>";
    }else{
        echo "<h3 style= 'display: flex; justify-content: center;'>
        Erro ao Cadastrar!</h3>".$GLOBALS['con']->error;
    }

}

?>