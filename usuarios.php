<?php
    include_once("OpenConexaoClass.php"); //exemplo do livro bancodedados.php
    include_once("Utils.php");
    include_once("usuariosClass.php");
    //include_once("/usuarios.php")

    if(isset($_REQUEST["action"]) && $_REQUEST["action"] == "createUser")
    {

        $newUser = new Usuario();
        $errorMsg = FALSE;

        $utils = new Utils();
        $database = $utils->getDatabaseConnection();
        $database->connect();

        $database->executeCommand("SELECT * FROM usuarios_poo  WHERE USERNAME = '".$_POST["CAMPO_NOMEUSUARIO"]."'");

        $qtdOfSameUserName = $database->getAffectedRows();

        if(!$newUser->setFullName($_POST["CAMPO_NOMECOMPLETO"]))
        {
            $errorMsg = "'Nome completo' deve possuir entre 5 e 64 caracteres";
            
        }
        else if(!$newUser->setUserName($_POST["CAMPO_NOMEUSUARIO"]))
        {

            $errorMsg = "'Nome de usuário' deve possuir entre 3 e 16 caracteres";

        }    
        else if($qtdOfSameUserName > 0)
        {

            $errorMsg = "O nome de usuário escolhido já existe. ";

        }
        else if(!$newUser->setEmail($_POST["CAMPO_EMAIL"]))
        {
            $errorMsg = "Endereço de e-mail inválido ";

        }
        else if(!$newUser->setBirthday((int)$_POST["CAMPO_NASCIMENTODIA"],(int)$_POST["CAMPO_NASCIMENTOMES"],(int)$_POST["CAMPO_NASCIMENTOANO"]))
        {

            $errorMsg = "Data de nascimento inválida";

        }
        else if(!$newUser->setSex($_POST["CAMPO_SEXO"]))
        {

            $errorMsg = " É necessário preencher o campo 'Sexo'";

        }
        else if(!$newUser->setPasswordHash($_POST["CAMPO_SENHA"]))
        {

            $errorMsg = "'Senha' deve possuir entre 5 e 16 caracteres";

        }
        if($errorMsg == FALSE)
        {

            //salva o registro no banco de dados

            $sql = "INSERT INTO usuarios_poo (FULLNAME, USERNAME, EMAIL, BIRTHDAY, SEX, PASSWORD_HASH) VALUES 
            (
                '".$newUser->getFullName()."',
                '".$newUser->getUserName()."',
                '".$newUser->getEmail()."',
                '".date("Y-m-d", $newUser->getBirthday())."',
                '".$newUser->getSex()."',
                '".$newUser->getPasswordHash()."'

            )"; 

            $database->executeCommand($sql);

            if($database->getAffectedRows() == 1)
            {

                echo "Usuário criado com Sucesso!";
                exit();
            }
            else
            {
                    echo $database->getError();
            }
        }
        else
        {

           echo "<b>".$errorMsg."</b><br>";     

           $database->disconnect();

        }
    }

?>