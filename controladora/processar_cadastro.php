<?php
require "../repositorio/conexao.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $senha = password_hash($_POST["senha"], PASSWORD_DEFAULT); // Criptografa a senha

    $query = "INSERT INTO usuario (nome, email, senha) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("sss", $nome, $email, $senha);



    if ($stmt->execute()) {
        echo 'success'; // Retorna 'success' após cadastro bem-sucedido
    } else {
        echo 'error'; // Retorna 'error' se o cadastro falhar
    }
}
?>
