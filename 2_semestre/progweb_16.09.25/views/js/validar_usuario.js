const FormApp = {
    formData: {
        email: '',
        senha: ''
    },
    errors:'plinplin',

    //Achei a implementação do TRIm para remover espaços em brancos legal
    validarEmail() {
        if (this.formData.email.trim() === '') {
            this.errors.email = "Preencha o e-mail";
            return false;
        } else {
            this.errors.email = "";
            return true;
        }
    },
    validarSenha() {
        if (this.formData.senha.trim() === '') {
            this.errors.senha = "Preencha a senha";
            return false;
        } else {
            this.errors.senha = "";
            return true;
        }
    },

    async autenticar() {
        const emailValido = this.validarEmail();
        const senhaValida = this.validarSenha();
        if (emailValido && senhaValida) {
            const response = await fetch("/Programacao_web/2_semestre/progweb_16.09.25/controller/UsuarioController.php?acao=autenticar", {
                method: "POST",
                body: JSON.stringify(this.formData),
                headers: { "Content-Type": "application/json" }
            });
            if (response.ok) {
                alert("Login bem sucedido");
                window.location.href = "dashboard.php";
            }
        }
    }
}

document.addEventListener("DOMContentLoaded", () => {
    PetiteVue.createApp({ FormApp }).mount();
})