function validaUsuario(formUser)
{

    if(formUser.CAMPO_NOMECOMPLETO.value.length == 0){

        alert("É necessário preencher o campo 'Nome Completo'");


    }else if(formUser.CAMPO_NOMEUSUARIO.value.length == 0){

        alert("É necessário preencher o campo 'Nome de Usuario'");



    }else if(formUser.CAMPO_EMAIL.value.length == 0){

        alert("É necessário preencher o campo 'E-mail'");

    }else if(formUser.CAMPO_NASCIMENTODIA.value.length == 0 || formUser.CAMPO_NASCIMENTOMES.value.length == 0 || formUser.CAMPO_NASCIMENTOANO.value.length == 0){

        alert("É necessário preencher o campo 'Data de nascimento'");

    }else if(!formUser.CAMPO_SEXO[0].checked && !formUser.CAMPO_SEXO[1].checked){

        alert("É necessário preencher o campo 'Sexo'");

    }else if(formUser.CAMPO_SENHA.value.length == 0){

        alert("É necessário preencher o campo 'Senha'");

    }else if(formUser.CAMPO_SENHA.value.length != formUser.CAMPO_SENHAREPETIDA.value.length){

        alert("A senha e a repetição de senha não possuem valores idênticos");

    }else{

        formUser.submit();

      
        
    }
    return FALSE;

}