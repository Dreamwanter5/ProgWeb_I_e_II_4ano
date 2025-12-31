document.getElementById('formCadastro').addEventListener('submit', function(e) {
    e.preventDefault();
    const form = e.target;
    const formData = new FormData(form);

    fetch('../controller/cadastro_usuario.php', {
        method: 'POST',
        body: formData
    })
    .then(resp => resp.text())
    .then(msg => {
        document.getElementById('mensagem').innerText = msg;
        form.reset();
    });
});