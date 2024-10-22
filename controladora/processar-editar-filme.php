<?php
require_once "../repositorio/conexao.php";
require '../repositorio/CatalogoRepositorio.php';
require '../modelo/Catalogo.php';
// ...
$filmesRepositorio = new FilmeRepositorio($conn);

if (isset($_POST['editar'])){
  $filme = new Filme($_POST['id'], 
  $_POST['genero'], $_POST['nome'], $_POST['sinopse']);

  //se a imagem foi carregada
  if (isset($_FILES['imagem']['name']) && ($_FILES['imagem']['error'] == 0)){
      $testeImagem = true;
      $filme->setImagem(uniqid() . $_FILES['imagem']['name']);
      move_uploaded_file($_FILES['imagem']['tmp_name'], $filme->getImagemDiretorio());
  }elseif ($_FILES['imagem']['error'] == UPLOAD_ERR_NO_FILE){
    $filme->setImagem('');
  }


  $imagem = $_FILES['imagem']['name'];
  $imagemError = $_FILES['imagem']['error'];
  
  $filmesRepositorio->atualizarFilme($filme);
//  header("Location: ../visao/admin.php?codedit=$codigo");
  $nomeusuario = $_POST['nomeusuario'];
  $usuario = $_POST['usuario'];
  echo "<form id='redirectForm' action='../visao/admin.php?imagemNome={$imagem}&testeError={$imagemError}&teste={$teste}' method='POST'>";
  echo "<input type='hidden' name='id' value='{$_POST['id']}'>";
  echo "<input type='hidden' name='genero' value='{$_POST['genero']}'>";
  echo "<input type='hidden' name='nome' value='{$_POST['nome']}'>";
  echo "<input type='hidden' name='nomeusuario' value='{$nomeusuario}'>";
  echo "<input type='hidden' name='usuario' value='{$usuario}'>";
  echo "<input type='hidden' name='sinopse' value='{$_POST['sinopse']}'>";
  echo "</form>";
  echo "<script>document.getElementById('redirectForm').submit();</script>";
}