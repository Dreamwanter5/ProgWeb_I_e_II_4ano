function enviarDados(event) {
    event.preventDefault();
}

function validarSenha() {
    const inputSenha = document.getElementById("senha");
    const senha = inputSenha.value;

    if (senha.length < 8) {
        inputSenha.classList.add('is-invalid');
        document.getElementById("erroSenha").innerText = "A senha deve possuir no mínimo 8 caracteres"
        return false;
    }
    else {
        document.getElementById("erroSenha").innerText = "";
        inputSenha.classList.remove("is-invalid");
        return true;
    }
}