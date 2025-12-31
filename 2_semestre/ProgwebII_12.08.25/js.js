function enviarDados(event){
    event.preventDefault();
    console.log("Formulário enviado!");
    // O event preventDefault() previne o comportamento padrão do formulário, que é recarregar a página.
   
    // agora começa o processo padrão para pegar os dados do formulário e colocar no JS
    const inputSenha = document.getElementById("senha");
    const senha = document.getElementById("senha").value;

    // Verificar se a senha tem mais que 8 caractéres
    if(senha.length < 8){
        // "Classlist" pega toda as classes que estão no input do html
        //Interessante pensar que assim você consegue adicionar uma característica mutativa dos inputs baseado em respostas do JS
        inputSenha.classList.add("is-invalid");
        // adicionando uma mensagem de erro para o usuário
        document.getElementById("erroSenha").innerText = "A senha deve ter no mínimo 8 caracteres.";
        return false;
    }
    else {
        document.getElementById("erroSenha").innerText = "";
        inputSenha.classList.remove("is-invalid");
    }

    // Confirmar senha
    const inputConfirmarSenha = document.getElementById("confirmSenha");
    const confirmarSenha = document.getElementById("confirmSenha").value;
    if(confirmarSenha !== senha){
        inputConfirmarSenha.classList.add("is-invalid");
        document.getElementById("erroConfirmarSenha").innerText = "As senhas não são iguais.";
        return false;
    }
    else {
        document.getElementById("erroConfirmarSenha").innerText = "";
        inputConfirmarSenha.classList.remove("is-invalid");
        // return true;
    }

    // Confirmar data
    // Quando data é inserida, ela é recebida em formato de string, isso faz com que ela não reconheça e não seja suscetível a parâmetros de comparação
    // Em razão disto, precisa-se colocá-la no formato de data, usando o "newdate" que cria uma "new" Date com "D" maiúsculo, para dizer sobre a data.
    
    const inputData = document.getElementById("data_nascimento");
    const data = document.getElementById("data_nascimento").value;
    const newdate = new Date(data);
    if (newdate > new Date()) {
        inputData.classList.add("is-invalid");
        document.getElementById("erroData").innerText = "Coloque uma data plausível.";
        return false;
    }
}
