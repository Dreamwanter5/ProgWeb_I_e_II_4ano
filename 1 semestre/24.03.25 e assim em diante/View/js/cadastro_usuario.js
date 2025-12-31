// Json é rpresentar dados em formato de Javascript 
const FormApp = {
    init: function () {
        this.cacheElements();
        this.bindEvents();
    }
}

function enviar_dados(){
    e.preventDefault(); // Previne o comportamento padrão do formulário mostrado pelo navegador
    var nome = document.getElementById('nome').value;
    var email = document.getElementById('email').value;
    var senha = document.getElementById('senha').value;
    var confirmar_senha = document.getElementById('confirmar_senha').value;

    const usuario = {
        "nome": nome,
        "email": email,
        "senha": senha,
        "confirmar_senha": confirmar_senha
    };

    console.log(usuario);

    if (nome == "" || email == "" || senha == "" || confirmar_senha == "") {
        alert("Preencha todos os campos!");
        return;
    }

    if (senha != confirmar_senha) {
        alert("As senhas não coincidem!");
        return;
    }

    // Aqui você pode adicionar o código para enviar os dados para o servidor
    alert("Dados enviados com sucesso!");
}

async function enviarRequisicao(usuario, validarData) {
    if (validarData()) {
        const response = await fetch('http://localhost:8080/usuario', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(usuario)
        });

        if (response.ok) {
            alert("Usuário cadastrado com sucesso!");
        } else {
            alert("Erro ao cadastrar usuário!");
        }
    } else {
        alert("Preencha todos os campos corretamente!");
    }
}