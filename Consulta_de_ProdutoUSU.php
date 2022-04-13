<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Consulta de Cervejas</title>
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
<div class="container text-center">
<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
  <div class="container-fluid">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse text-center" id="navbarCollapse">
      <ul class="navbar-nav me-auto mb-2 mb-md-0">
      <li class="nav-item">
          <a class="nav-link" href="painel.php">Página Inicial</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="consulta.php">Consulta - Tabela de Cervejas</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="sair.php">Sair</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
    <br>
    <br>
    <br>
    <br>
    <h3> Lista de Produtos </h3>
    <br>
    <?php
    echo "<script>
        function excluir(id){
            if (confirm ('Deseja realmente excluir este produto?')){
            location.href='excluir.php?id='+id;
            }
        }
    </script>";
     $con = mysqli_connect("localhost","root","","projetoint");
     $sql = "select * from cervejas ORDER BY nome ASC";    
     $rs = mysqli_query($con,$sql);    
     if(mysqli_num_rows($rs) > 0){

    ?>
        <div class="table-responsive">
        <table table class="table table-striped">
            <tr>
                <th>Nome</th>
                <th>País</th>
                <th>Nota</th>
                <th>Tipo</th>
                <th>Comentário</th>                
            <tr>               
        <?php        
        while($linha = mysqli_fetch_array($rs)){
        ?>
            <tr>
                <td><?php echo $linha["nome"]; ?></td>
                <td><?php echo $linha["pais"]; ?></td>
                <td><?php echo $linha["nota"]; ?></td>
                <td><?php echo $linha["tipo"]; ?></td>
                <td><?php echo $linha["comentario"]; ?></td>
        </tr>
        <?php } ?>
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
