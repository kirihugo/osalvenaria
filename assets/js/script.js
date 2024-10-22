document.getElementById('loginForm').addEventListener('submit', function(event) {
    event.preventDefault(); // Impede o envio do formulário para fins de validação
    
    const username = document.getElementById('username').value;
    const password = document.getElementById('password').value;

    // Verifique se os campos não estão vazios
    if (username === '' || password === '') {
        alert('Por favor, preencha todos os campos.');
        return;
    }

    // Adicione sua lógica de autenticação aqui
    alert('Login bem-sucedido!');
});