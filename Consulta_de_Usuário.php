<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Consulta Cliente</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <style>
        body{
            margin: auto;
            display: table;
            background-color:#87CEEB;
        }
    </style>
</head>
<body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>
<div class="container text-center">
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
  <div class="container-fluid">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse text-center" id="navbarCollapse">
      <ul class="navbar-nav me-auto mb-2 mb-md-0">
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="formulario.php">Novo Produto</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="formulario_user.php">Novo Usuário</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="consulta_adm.php">Consulta - Tabela de Cervejas</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="tabela_user.php">Consulta - Tabela de Usuários</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="sair.php">Sair</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
<div class="container text-center">
<br>
<br>
<br>
    <br>
    <h3> Lista de Usuários </h3>
    <br>
    <?php
    echo "<script>
        function excluir(id){
            if (confirm ('Deseja realmente excluir este usuário?')){
            location.href='excluir_user.php?id='+id;
            }
        }
    </script>";
     $con = mysqli_connect("localhost","root","","projetoint");
     $sql = "select * from usuario ORDER BY nome ASC";    
     $rs = mysqli_query($con,$sql);    
     if(mysqli_num_rows($rs) > 0){

    ?>
    <input id="myInput" type="text" placeholder="Search..">
        <br><br>
     <div class="table-responsive-sm">
        <table table class="table table-striped">
            <tr>
                <th>Nome</th>
                <th>Login</th>
                <th>Perfil</th>
                <th>Atualizar</th>
                <th>Excluir</th>
            <tr>               
        <?php        
        while($linha = mysqli_fetch_array($rs)){
        ?>
            <tbody id="myTable">
            <tr>
                <td><?php echo $linha["nome"]; ?></td>
                <td><?php echo $linha["login"]; ?></td>
                <td><?php echo $linha["perfil"]; ?></td>
                <td><a href="editar_user.php?id=<?php echo base64_encode($linha["iduser"]); ?>">
                    <i class='bi bi-pencil-fill'></i> 
                    <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-pencil-fill' viewBox='0 0 16 16'>
                    <path d='M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z'/>
                    </svg>
                </a></td>
                <td><a href="#" onclick="excluir(<?php echo ($linha["iduser"]); ?>)">
                    <i class="bi bi-person-x-fill"></i>
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-x-fill" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm6.146-2.854a.5.5 0 0 1 .708 0L14 6.293l1.146-1.147a.5.5 0 0 1 .708.708L14.707 7l1.147 1.146a.5.5 0 0 1-.708.708L14 7.707l-1.146 1.147a.5.5 0 0 1-.708-.708L13.293 7l-1.147-1.146a.5.5 0 0 1 0-.708z"/>
                    </svg>
                </a></td>
        </tr>
        <?php } ?>
        </tbody>
        </table>
        </div>
        <?php
     }else{
        echo "Não existe produto cadastrado";     
    }
     mysqli_close($con);
     ?>
    </div>
    </body>
    </html>
