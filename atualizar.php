<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
  <div class="container-fluid">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse text-center" id="navbarCollapse">
      <ul class="navbar-nav me-auto mb-2 mb-md-0">
      <li class="nav-item">
          <a class="nav-link" aria-current="page" href="painel.php">Página Inicial</a>
        </li>
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
<?php
include_once 'topo.php'; 
$id = $_POST["id"];
$nome = $_POST["nome"];
$pais = $_POST["pais"];
$nota = $_POST["nota"];
$tipo = $_POST["tipo"];
$comentario = $_POST["comentario"];

include_once 'conexao.php';
$sql = "UPDATE cervejas SET nome ='".$nome."',
pais = '".$pais."',
nota = '".$nota."',
tipo = '".$tipo."',
comentario = '".$comentario."' WHERE idcerveja =".$id;

$rs = mysqli_query($con,$sql);
if ($rs){
    $msg = "<h4 class='text-center'>Produto atualizado com sucesso!</h4>";
} else {
    $msg = "Erro ao atualizar!";
}

mysqli_close($con);
echo "<script>alert('".$msg."');
location.href='consulta_adm.php';
</script>";
include_once 'rodape.php';
?>