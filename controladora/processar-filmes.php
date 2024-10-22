<?php
require "../repositorio/conexao.php";
require "../modelo\Catalogo.php";
require "../repositorio\CatalogoRepositorio.php";

//if (isset($_POST['cadastro'])){ ou
if ($_SERVER["REQUEST_METHOD"]=="POST"){
    $nome = $_POST["nome"];
    $genero = $_POST["genero"];
    $sinopse = $_POST["sinopse"];
    $imagem = $_FILES['imagem']['name'];

    $_SESSION['usuario'] = $_POST['usuario'];
    $_SESSION['nomeusuario'] = $_POST['nomeusuario'];
    
    $filme = new Filme(0,
        $genero,
        $nome,
        $sinopse,
        $imagem
    );

    $filmeRepositorio = new FilmeRepositorio($conn);
    if (isset($_FILES['imagem']) && ($_FILES['imagem']['error'] == 0)){
        $filme->setImagem(uniqid() . $_FILES['imagem']['name']);
        move_uploaded_file($_FILES['imagem']['tmp_name'], $filme->getImagemDiretorio());
    }
    $sucess = $filmeRepositorio->cadastrar($filme);
    if ($sucess){
        $codcad = rand(0, 1000000);
        echo "<form id='redirectForm' action='../visao/admin.php' method='POST'>";
        echo "<input type='hidden' name='codigo' value={'$codcad'}>";

        echo "<input type='hidden' name='nomeusuario' value=".$_SESSION['nomeusuario'].">";
        echo "<input type='hidden' name='usuario' value=".$_SESSION['usuario'].">";
       
        echo "</form>";
        echo "<script>document.getElementById('redirectForm').submit();</script>";


       // header("Location: ../visao/admin.php?codcad=$codigo");
      //  exit();
    }else{
        echo "erro ao cadastrar produto";
    }}
