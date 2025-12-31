const FormApp = {
    formData: {
        nome: "",
        email: "",
        senha: ""
    },
    mensagemRetorno: '',
    statusRetorno: '',
    errors: {
    },
    
    validarSenha() {
        if (this.formData.senha.length < 8) {
            this.errors.senha = "Digite no mínimo 8 caracteres"
            return false;
        }
        delete this.errors.senha; 
        return true;
    },
    async enviarRequisicao() {
    if (this.validarSenha()) {
        try {
            const response = await fetch(
                "../../../Controllers/usuarioController.php?acao=inserir",
                {
                    method: "POST",
                    headers: { "Content-Type": "application/json" },
                    body: JSON.stringify(this.formData)
                }
            );
            
            if (!response.ok) {
                const errorData = await response.json();
                throw new Error(errorData.mensagem || "Erro no cadastro");
            }
            
            const dados = await response.json();
            this.mensagemRetorno = dados.mensagem;
            this.statusRetorno = "success";
            
            setTimeout(() => {
                location.href = "login.html";
            }, 2000);
            
        } catch (error) {
            this.mensagemRetorno = error.message;
            this.statusRetorno = "error";
            console.error("Erro no cadastro:", error);
        }
    }
}
}

document.addEventListener('DOMContentLoaded', () => {
    PetiteVue.createApp({ FormApp }).mount();
})
