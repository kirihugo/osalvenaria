<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página de Login</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <div class="login-container">
        <h1>Login</h1>
        <form id="loginForm">
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="senha">Senha:</label>
                <input type="password" id="senha" name="senha" required>
            </div>
            <button type="submit">Entrar</button>
            <p id="msgLogin" style="color: red;"></p>
        </form>
        <a href="cadastro.html">Ir para Cadastro</a>
        <a href="indexx.php">Ir para tela inical</a>
    </div>

    <script>
        $(document).ready(function() {
            $('#loginForm').on('submit', function(e) {
                e.preventDefault(); // Previne o envio tradicional do formulário
                
                $.ajax({
                    url: './controladora/processar-login.php',
                    type: 'POST',
                    data: $(this).serialize(),
                    success: function(response) {
                        if (response === 'success') {
                            window.location.href = 'index.php'; // Redireciona para o index.php após login bem-sucedido
                        } else {
                            $('#msgLogin').text('Usuário ou senha inválidos.');
                        }
                    },
                    error: function() {
                        $('#msgLogin').text('Erro no servidor. Tente novamente mais tarde.');
                    }
                });
            });
        });
    </script>
</body>
</html>
