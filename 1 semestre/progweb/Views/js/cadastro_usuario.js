const FormApp = {
    formData: {
        nome: "",
        email: "",
        senha: "",
        data_nascimento: ""
    },
    mensagemRetorno: '',
    statusRetorno: '',
    errors: {
    },
    validarData() {
        let retorno = true;
        const dataSelecionada = new Date(
            this.formData.data_nascimento
        );
        const dataAtual = new Date();

        if (dataSelecionada > dataAtual) {
            this.errors.data = "Selecione uma data válida"
            retorno = false;
        }

        return retorno;
    },
    validarSenha() {
        if (this.formData.senha.length < 8) {
            this.errors.senha = "Digite no mínimo 8 caracteres"
            return false;
        }
        return true;
    },
    async enviarRequisicao() {
        if (this.validarData()) {
            try {
                const response = await fetch("../controllers/UsuarioController.php?acao=inserir",
                    {
                        method: "POST",
                        headers: {
                            "Content-Type": "application/json"
                        },
                        body: JSON.stringify(this.formData)
                    }
                )
                const dados = await response.json();
                this.mensagemRetorno = dados.mensagem;

                this.statusRetorno = response.ok ? "success" : "error";

                if (this.statusRetorno == "success") {
                    location.href = "listagem_usuario.html"
                }
            }
            catch (error) {
                this.mensagemRetorno = error.body.mensagem;
                this.statusRetorno = "error";
            }
        }
    }
}

document.addEventListener('DOMContentLoaded', () => {
    PetiteVue.createApp({ FormApp }).mount();
})
