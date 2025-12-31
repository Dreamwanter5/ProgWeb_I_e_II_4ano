function enviarDados(event) {
    event.preventDefault();
}

function validarSenha() {
    const inputSenha = document.getElementById("senha");
    const senha = inputSenha.value;
    const inputConfirmSenha = document.getElementById("confirmarSenha");
    const confirmSenha = inputConfirmSenha.value;

    if (senha.length < 6) {
        inputSenha.classList.add('is-invalid');
        document.getElementById("erroSenha").innerText = "A senha deve possuir no mínimo 6 caracteres"
        return false;
    }
    else if (senha != confirmSenha){
        inputConfirmSenha.classList.add('is-invalid');
        document.getElementById("erroConfirmSenha").innerText = "Deve ser igual à senha!"
        return false;
    }
    else {
        document.getElementById("erroSenha").innerText = "";
        inputSenha.classList.remove("is-invalid");
        document.getElementById("erroConfirmSenha").innerText = "";
        inputConfirmSenha.classList.remove("is-invalid");
        return true;
    }
}

function validarNome() {
    const inputNome = document.getElementById("nome");
    const nome = inputNome.value;

    if (nome === "") {
        inputNome.classList.add('is-invalid');
        document.getElementById("erroNome").innerText = "Favor inserir seu nome!";
        console.log ("Nome invalido");
        return false;
    } 
    else {
        inputNome.classList.remove('is-invalid');
        inputNome.classList.add('is-valid');
        document.getElementById("erroNome").innerText = "";
        return false;
    }
}

function validarCPF() {
    const inputCpf = document.getElementById("cpf");
    const Cpf = inputCpf.value;

    if (Cpf.length < 11) {
        inputCpf.classList.add('is-invalid');
        document.getElementById("erroCpf").innerText = "Insira seu Cpf!";
        console.log ("Cpf invalido");
        return false;
    } 
    else {
        inputCpf.classList.remove('is-invalid');
        inputCpf.classList.add('is-valid');
        document.getElementById("erroCpf").innerText = "";
        return false;
    }
}

function validarEmail() {
    const inputEmail = document.getElementById("email");
    const email = inputEmail.value;

    if (email === "" || !email.includes("@")) { 
        inputEmail.classList.add('is-invalid');
        document.getElementById("erroEmail").innerText = "Insira um e-mail válido!";
        console.log ("email invalido");
        return false;
    } 
    else {
        inputEmail.classList.remove('is-invalid');
        inputEmail.classList.add('is-valid');
        document.getElementById("erroEmail").innerText = "";
        return true;
    }
}

function validarTelefone() {
    const inputTelefone = document.getElementById("telefone");
    const telefone = inputTelefone.value;

    if (telefone === "") {
        inputTelefone.classList.add('is-invalid');
        document.getElementById("erroTelefone").innerText = "Favor, inserir um número existente";
        console.log ("Número de Telefone invalido");
        return false;
    } 
    else {
        inputTelefone.classList.remove('is-invalid');
        inputTelefone.classList.add('is-valid');
        document.getElementById("erroTelefone").innerText = "";
        return false;
    }
}

function validarData() {
    const inputData = document.getElementById("dataNascimento");
    const data = document.getElementById("dataNascimento").value;
    const newdate = new Date(data);

    if (newdate > new Date()) {
        inputData.classList.add("is-invalid");
        document.getElementById("erroDataNascimento").innerText = "Coloque uma data plausível.";
        console.log("data inválida.")
        return false;
    }
}

//Validação de endereços

function validarRua() {
    const inputRua = document.getElementById("rua");
    const Rua = inputRua.value;

    if (Rua === "") {
        inputRua.classList.add('is-invalid');
        document.getElementById("erroRua").innerText = "Favor, preencher este campo!";
        console.log ("Rua invalida");
        return false;
    } 
    else {
        inputRua.classList.remove('is-invalid');
        inputRua.classList.add('is-valid');
        document.getElementById("erroRua").innerText = "";
        return false;
    }
}

function validarNumero() {
    const inputnumero = document.getElementById("numero");
    const numero = inputnumero.value;

    if (numero === "") {
        inputnumero.classList.add('is-invalid');
        document.getElementById("erroNumero").innerText = "Favor, preencher este campo!";
        console.log ("Número de numero invalido");
        return false;
    } 
    else {
        inputnumero.classList.remove('is-invalid');
        inputnumero.classList.add('is-valid');
        document.getElementById("erroNumero").innerText = "";
        return false;
    }
}

function validarBairro() {
    const inputBairro = document.getElementById("Bairro");
    const Bairro = inputBairro.value;

    if (Bairro === "") {
        inputBairro.classList.add('is-invalid');
        document.getElementById("erroBairro").innerText = "Favor, preencher este campo!";
        console.log ("Número de Bairro invalido");
        return false;
    } 
    else {
        inputBairro.classList.remove('is-invalid');
        inputBairro.classList.add('is-valid');
        document.getElementById("erroBairro").innerText = "";
        return false;
    }
}

function validarCidade() {
    const inputCidade = document.getElementById("Cidade");
    const Cidade = inputCidade.value;

    if (Cidade === "") {
        inputCidade.classList.add('is-invalid');
        document.getElementById("erroCidade").innerText = "Favor, preencher este campo!";
        console.log ("Número de Cidade invalido");
        return false;
    } 
    else {
        inputCidade.classList.remove('is-invalid');
        inputCidade.classList.add('is-valid');
        document.getElementById("erroCidade").innerText = "";
        return false;
    }
}

function validarEstado() {
    const inputEstado = document.getElementById("Estado");
    const Estado = inputEstado.value;

    if (Estado === "") {
        inputEstado.classList.add('is-invalid');
        document.getElementById("erroEstado").innerText = "Favor selecionar um estado!";
        console.log ("Número de Estado invalido");
        return false;
    } 
    else {
        inputEstado.classList.remove('is-invalid');
        inputEstado.classList.add('is-valid');
        document.getElementById("erroEstado").innerText = "";
        return false;
    }
}

function validarCep() {
    const inputCep = document.getElementById("Cep");
    const Cep = inputCep.value;

    if (Cep.length < 8) {
        inputCep.classList.add('is-invalid');
        document.getElementById("erroCep").innerText = "Insira um CEP válido... BOBO!";
        console.log ("Número de Cep invalido");
        return false;
    } 
    else {
        inputCep.classList.remove('is-invalid');
        inputCep.classList.add('is-valid');
        document.getElementById("erroCep").innerText = "";
        return false;
    }
}

function validarTermos() {
    const inputTermos = document.getElementById("Termos");
    const Termos = inputTermos.value;

    if (Termos.checked) {
        inputTermos.classList.add('is-invalid');
        document.getElementById("erroTermos").innerText = "Você deve concordar com os termos e condições.";
        console.log ("Termos invalido");
        return false;
    } 
    else {
        inputTermos.classList.remove('is-invalid');
        inputTermos.classList.add('is-valid');
        document.getElementById("erroTermos").innerText = "";
        return false;
    }
}

