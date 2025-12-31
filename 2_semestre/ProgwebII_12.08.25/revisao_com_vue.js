const app = {
    // Formulário Data
    formData: {
        nome: "",
        email: "",
        dataNascimento: "",
        senha: "",
        confirmarSenha: ""
    },
    errors: {},
    validarSenha(){
        if(this.formData.senha.length < 8) {
            this.errors.senha = "A senha tem que possuir no mínimo 8 caracteres" 
            alert('não está válido');
            return false;
        }
        else {
            this.errors.senha = "";
            return true;
        }
    },
    confirmSenha(){
        if(this.formData.senha === this.formData.confirmarSenha){
            this.errors.confirmSenha = "As senhas devem coincidir"
            alert('não está igual')
            return false;
        }
        else {
            this.errors.confirmSenha = "";
            return true;
        }
    }
    
}

document.addEventListener("DOMContentLoaded" , () => {
    PetiteVue.createApp({
        app
    }).mount()
})