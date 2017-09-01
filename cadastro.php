<?php

require_once "conexao.php";

?>

<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Cadastro Tri-quadra</title>
</head>
<body>

<div id="cadastro">
    <form method="post" action="?go=cadastrar">
        <table id="cad_table">

            <tr>
                <td>Nome:</td>
                <td><input type="text" name="nome" id="nome" class="txt"></td>
            </tr>

            <tr>
                <td>Email:</td>
                <td><input type="text" name="email" id="nome" class="txt"></td>
            </tr>

            <tr>
                <td>Usuario:</td>
                <td><input type="text" name="usuario" id="nome" class="txt"></td>
            </tr>

            <tr>
                <td>Senha:</td>
                <td><input type="password" name="senha" id="nome" class="txt"></td>
            </tr>

            <tr>
                <td colspan="2"><input type="submit" value="cadastrar" id="bntcad"></td>

            </tr>

        </table>

    </form>


</div>

</body>
</html>

<?php
        //pega do formulario
    if (@$_GET['go'] == 'cadastrar'){
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $user = $_POST['usuario'];
        $pwd = $_POST['senha'];

        //if, verifica se ja os campos estao preencidos
        if(empty($nome)){
        echo "<script>alert('O campo nome deve ser preenchido.'); history.back();</script>";
        }elseif(empty($email)){
            echo "<script>alert('O campo email deve ser preenchido.'); history.back();</script>";
        }elseif(empty($user)){
            echo "<script>alert('O campo usuario deve ser preenchido.'); history.back();</script>";
        }elseif(empty($pwd)){
            echo "<script>alert('O campo senha deve ser preenchido.'); history.back();</script>";
        }else{
            //verifica se ja existe o usuario, se não cadastra
            $query1 = mysql_num_rows(mysql_query("SELECT * FROM usuario WHERE usuario = '$user'"));
            if ($query1 == 1){
                echo "<script>alert('usuario ja existe.'); history.back();</script>";
            }else{
                mysql_query("INSERT INTO usuario (nome, email, usuario, senha) value ('$nome','$email','$user','$pwd')");
                echo "<script>alert('usuario ja cadastrado com sucesso.');</script>";
                header("location: cadastro.php");
            }
        }
    }


?>