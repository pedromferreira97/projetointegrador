<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cadastro de Novos Clientes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<style>
body{
    margin: auto;
    display: table;
    background-color:#00ace6;
}
.parent-container {
    position: relative;
}
#container{
    width: 400px;
            height: 300px;
            background-color:  #b3d9ff;
            position: absolute;
            margin: auto;
            max-width: 100%;
            max-height: 100%;
            overflow: auto;
        }
        #topo{
            width: 960px;
            float: left;
            height: 40px;
            padding: 10px;
        }
</style>
<script>
    function limpa_formulário_cep() {
            //Limpa valores do formulário de cep.
            document.getElementById('rua').value=("");
            document.getElementById('bairro').value=("");
            document.getElementById('cidade').value=("");
            document.getElementById('uf').value=("");
    }

    function meu_callback(conteudo) {
        if (!("erro" in conteudo)) {
            //Atualiza os campos com os valores.
            document.getElementById('rua').value=(conteudo.logradouro);
            document.getElementById('bairro').value=(conteudo.bairro);
            document.getElementById('cidade').value=(conteudo.localidade);
            document.getElementById('uf').value=(conteudo.uf);
        } //end if.
        else {
            //CEP não Encontrado.
            limpa_formulário_cep();
            alert("CEP não encontrado.");
        }
    }
        
    function pesquisacep(valor) {

        //Nova variável "cep" somente com dígitos.
        var cep = valor.replace(/\D/g, '');

        //Verifica se campo cep possui valor informado.
        if (cep != "") {

            //Expressão regular para validar o CEP.
            var validacep = /^[0-9]{8}$/;

            //Valida o formato do CEP.
            if(validacep.test(cep)) {

                //Preenche os campos com "..." enquanto consulta webservice.
                document.getElementById('rua').value="...";
                document.getElementById('bairro').value="...";
                document.getElementById('cidade').value="...";
                document.getElementById('uf').value="...";

                //Cria um elemento javascript.
                var script = document.createElement('script');

                //Sincroniza com o callback.
                script.src = 'https://viacep.com.br/ws/'+ cep + '/json/?callback=meu_callback';

                //Insere script no documento e carrega o conteúdo.
                document.body.appendChild(script);

            } //end if.
            else {
                //cep é inválido.
                limpa_formulário_cep();
                alert("Formato de CEP inválido.");
            }
        } //end if.
        else {
            //cep sem valor, limpa formulário.
            limpa_formulário_cep();
        }
    };
    </script>
<h3 class="text-center">
<br> <i class="bi bi-person-plus-fill"></i>
<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-plus-fill" viewBox="0 0 16 16">
  <path d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
  <path fill-rule="evenodd" d="M13.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5z"/>
</svg> 
Novo usuário 
<i class="bi bi-person-plus-fill"></i>
<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-plus-fill" viewBox="0 0 16 16">
  <path d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
  <path fill-rule="evenodd" d="M13.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5z"/>
</svg> </h3>
<div class="container" width="70%" height="100%">
    <form class="text-center col-md-6 offset-md-3" action="cadastro_user.php" method="post">
    Nome: </br>
    <input type="text" name="nome" id="nome" required/>
    <br> <br>
    Login: </br>
    <input type="login" name="login" id="login"/>
    <br> <br>
    Senha: <br>
    <input type="password" name="senha" id="senha" required/>
    <br> <br>
    Perfil: <br>
    <select name="perfil" id="perfil">
        <option value="">Selecione</option>         
        <option value="adm">Admin</option>
        <option value="user">Usuário</option>
    </select>
    <br><br>
    Endereço: <br>
    CEP:<br>
    <input name="cep" type="text" id="cep" value=""maxlength="9" onblur="pesquisacep(this.value);"><br><br>
    Rua:<br>
    <input name="rua" type="text" id="rua">
    <br><br>
    Bairro:<br>
    <input name="bairro" type="text" id="bairro">
    <br><br>
    Cidade:<br>
    <input name="cidade" type="text" id="cidade">
    <br><br>
    Estado:<br>
    <input name="uf" type="text" id="uf">
    <br><br>
    <input class="text-white btn btn-info btn-sm" type="submit" value="Cadastrar Usuário"/>
    <input class="text-white btn btn-danger btn-sm" type="reset" value="Limpar Campos"/>
    </form>
    </div>
    <div class="text-center" id="topo">    
            <p><a class="text-white btn btn-secondary btn-sm" href="index.php"> Voltar </a></p>
        </div>
        <br>
        <br>
<?php include_once 'rodape.php';?>
