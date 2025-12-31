const FormApp = {
    formData: {
        email: '',
        senha: ''
    },
    async autenticar() {
        if (this.formData.email != '' && this.formData.senha != '') {
            const response = await fetch("Controllers/UsuarioController.php?acao=autenticar", {
                method: "POST",
                body: JSON.stringify(this.formData),
                headers: { "Content-Type": "application/json" }

            });
            if (response.ok) {
                window.location.href = "Views/listagem_usuario.php";
            }

        }
    }
}

document.addEventListener("DOMContentLoaded", () => {
    PetiteVue.createApp({ FormApp }).mount();
})