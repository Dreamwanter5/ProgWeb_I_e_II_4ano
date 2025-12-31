const FormApp = {
    formData: {
        nome: "",
        email: "",
        senha: "",
        data: ""
    },
    errors: {
    },
    validarData() {
        let retorno = true;
        const dataSelecionada = new Date(
            this.formData.data
        );
        const dataAtual = new Date();

        if (dataSelecionada > dataAtual) {
            this.errors.data = "Selecione uma data válida"
            retorno = false;
        }

        return retorno;
    },
    async enviarRequisicao() {
        if (this.validarData()) {
            const response = await fetch("http://localhost/progweb/Controllers/UsuarioController.php",
                {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json"
                    },
                    body: JSON.stringify(this.formData)
                }
            )
            alert("Usuário Cadastrado com sucesso");
        }
    }
}

document.addEventListener('DOMContentLoaded', () => {
    PetiteVue.createApp({ FormApp }).mount();
})
