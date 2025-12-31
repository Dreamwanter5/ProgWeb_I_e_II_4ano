const app = {
    formData: {
        nome: "",
        email: "",
        data_nascimento: "",
        senha: "",
        confirmarSenha: ""
    },
    // Porque não usamos document getElementById aqui? ele estava com sucesso registrando no banco de dados ou não fizemos o teste? É possível trabalhar com os dados dessa forma?
    // Seção de validações
    errors: {},
    validarNome() {
        if (this.formData.nome.trim() === "") {
            this.errors.nome = "Favor inserir seu nome";
            return false;
        } else {
            this.errors.nome = "";
            return true;
        }
    },

    validarSenha() {
        if (this.formData.senha.length < 8) {
            this.errors.senha = "A senha deve possuir no mínimo 8 caracteres"
            return false;
        }
        else {
            this.errors.senha = "";
            return true;
        }
    },
    validarConfirmacao(){
        if(this.formData.senha != this.formData.confirmarSenha){
            this.errors.erroConfirmar = "As senhas devem coincidir";
            return false;
        } else {
            this.errors.erroConfirmar = "";
            return true;
        }

    },
    //Por sugestão ao corrigir o código vi essa implementação do regex, quero saber mais sobre
    validarEmail() {
        const email = this.formData.email.trim();
        const regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (email === "") {
            this.errors.email = "Favor inserir seu e-mail";
            return false;
        } else if (!regex.test(email)) {
            this.errors.email = "E-mail inválido!";
            return false;
        } else {
            this.errors.email = "";
            return true;
        }
    },

    validarDataNascimento() {
        //Houve uma sugestão de incrementar a nulificação das horas, isso é necessário?
        const data = this.formData.data_nascimento;
        if (!data) {
            this.errors.data_nascimento = "Favor inserir sua data de nascimento";
            return false;
        }
        const dataSelecionada = new Date(data);
        const hoje = new Date();
        hoje.setHours(0,0,0,0);
        if (dataSelecionada >= hoje) {
            this.errors.data_nascimento = "Escolha uma data anterior à data atual!";
            return false;
        } else {
            this.errors.data_nascimento = "";
            return true;
        }
    },

    // Fim sessão de validações

    //Preciso alterar aqui no futuro para eu debuggar com o meu próprio tipo de código ..... 21.09 - Feito!
    async cadastrar() {
        const response = await fetch('http://localhost/Programacao_web/2_semestre/progweb_16.09.25/controller/UsuarioController.php', {
            method: "POST",
            body: JSON.stringify(this.formData),
            headers: {
                "content-type": "application/json"
            }
        });

        let responseBody;
        let isJson = false;
        try {
            responseBody = await response.clone().json();
            isJson = true;
        } catch (e) {
            responseBody = await response.text();
        }

        if (response.ok) {
            if (isJson && responseBody.mensagem) {
                alert(responseBody.mensagem);
            } else {
                alert("Usuário cadastrado com sucesso!");
            }
            window.location.href = "login_usuario.php";
        } else {
            if (isJson && responseBody.email) {
                this.errors.email = responseBody.email;
            } else if (isJson && responseBody.mensagem) {
                alert(responseBody.mensagem);
            } else {
                alert(responseBody);
            }
        }
    }
}

document.addEventListener("DOMContentLoaded", () => {
    PetiteVue.createApp(app).mount();
});