<?php

    if(isset($_REQUEST['action']) && $_REQUEST['action'] == 'cadastrar')
    {

        $servidor = 'localhost';
        $usuario = 'root';
        $senha = '';
        $banco = 'integracao';


        $link = mysqli_connect($servidor, $usuario, $senha, $banco)
        or die ('Não foi possivel conectar: '.mysqli_error($link));

        $campo_usuario = addslashes($_POST['CAMPO_USUARIO']);
        $campo_senha = md5($_POST['CAMPO_SENHA']);

        $sql = "INSERT INTO usuarios_poo (USERNAME, PASSWORD_HASH)";
        $sql .= "VALUES('".$campo_usuario."', '".$campo_senha."')";
        $result = mysqli_query($link, $sql);

        if($result)
        echo "Usuário cadastrado com sucesso!";

        mysqli_close($link);




    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro - Usuários </title>
</head>
<body>
    <form action="?action=cadastrar" method="post">

        Nome de Usuário: <input type="text" name="CAMPO_USUARIO"><br>
        Senha: <input type="password" name="CAMPO_SENHA"><br>
        <input type="submit" value="cadastrar">
    </form>
</body>
</html>