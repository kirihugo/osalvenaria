<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página de Login</title>


  <link href="assets/img/logo1.jpg" rel="logo">
  <link href="assets/img/logo1.jpg" rel="logo">


  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <link rel="stylesheet" href="assets/css/main.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>

<header id="header" class="header d-flex align-items-center sticky-top">
    <div class="container-fluid position-relative d-flex align-items-center justify-content-between">

      <a href="index.html" class="logo d-flex align-items-center me-auto me-xl-0">

        <i class="bi bi-camera"></i>
        <h1 class="sitename">O.S. Alvenaria</h1>
      </a>

      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="index.html" >Home<br></a></li>
          <li><a href="services.html">Serviços</a></li>
          <li><a href="contact.html">Contatos</a></li>
          <li><a href="login.php" class="active">Login</a></li>
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>

      <div class="header-social-links">
        <a href="https://www.facebook.com/profile.php?id=61566599551247" class="facebook"><i class="bi bi-facebook"></i></a>
        <a href="https://www.instagram.com/santos.alvenaria?utm_source=ig_web_button_share_sheet&igsh=ZDNlZDc0MzIxNw==" class="instagram"><i class="bi bi-instagram"></i></a>
      </div>

    </div>
  </header>

    <div class="login-container">
        <form id="loginForm">
        <h1>Login</h1>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="senha">Senha:</label>
                <input type="password" id="senha" name="senha" required>
            </div>
            <button type="submit" class="formulario-button">Entrar</button>
            <p id="msgLogin" style="color: red;"></p>
            <a href="cadastro.html">Ir para Cadastro</a>
            <br>
            <a href="index.html">Ir para tela inicial</a>
        </form>
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
     <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>


  <div id="preloader">
    <div class="line"></div>
  </div>


  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>

  
  <script src="assets/js/main.js"></script>

</body>
</html>
