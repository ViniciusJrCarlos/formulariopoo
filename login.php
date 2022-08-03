 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <script type="text/javascript" src="validaUsuario.js"></script>
</head>
<body>
    <form action="?action=createUser" method="POST" name="formUser">

        <br>
        Nome Completo: <input type="text" name="CAMPO_NOMECOMPLETO" value="<?php if(isset($_POST['CAMPO_NOMECOMPLETO'])){echo $_POST['CAMPO_NOMECOMPLETO'];}?>" />
        <br><br>
        Nome Usuário: <input type="text" name="CAMPO_NOMEUSUARIO" value="<?php if(isset($_POST['CAMPO_NOMEUSUARIO'])){echo $_POST['CAMPO_NOMEUSUARIO'];}?>" />
        <br><br>
        E-Mail: <input type="text" name="CAMPO_EMAIL" value="<?php if(isset($_POST['CAMPO_EMAIL'])){echo $_POST['CAMPO_EMAIL'];}?>" />
        <br><br>
        Data de Nascimento: <input type="text" name="CAMPO_NASCIMENTODIA" value="<?php if(isset($_POST['CAMPO_NASCIMENTODIA'])){echo $_POST['CAMPO_NASCIMENTODIA'];}?>" size="20" />&nbsp;
        <input type="text" name="CAMPO_NASCIMENTOMES" value="<?php if(isset($_POST['CAMPO_NASCIMENTOMES'])){echo $_POST['CAMPO_NASCIMENTOMES'];}?>" size="10"  />&nbsp;
        <input type="text" name="CAMPO_NASCIMENTOANO" value="<?php if(isset($_POST['CAMPO_NASCIMENTOANO'])){echo $_POST['CAMPO_NASCIMENTOANO'];}?>" size="20" />
        <br><br>
              Sexo: <input type="radio" name="CAMPO_SEXO" value="M" <?php if(isset($_POST['CAMPO_SEXO']) == "M") {echo "checked";} ?> >Masculino
              &nbsp;<input type="radio" name="CAMPO_SEXO" value="F" <?php if(isset($_POST['CAMPO_SEXO']) == "F") {echo "checked";} ?> >Feminino
        <br><br>
        Senha: <input type="password" name="CAMPO_SENHA" value="" >
        <br><br>
        Repita a Senha: <input type="password" name="CAMPO_SENHAREPETIDA" value="" >
        <br><br>
        <input type="RESET" value="Limpar">&nbsp;
        <input type="button" onClick="validaUsuario(document.forms['formUser']); return FALSE;" value="Cadastrar">

    </form>
</body>
</html>
