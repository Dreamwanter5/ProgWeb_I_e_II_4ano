const app = {
    formData: {
        nome: '',
        cpf: '',
        email: '',
        senha: '',
        confirmarSenha: '',
        telefone: '',
        rua: '',
        numero: '',
        bairro: '',
        cidade: '',
        estado: '',
        cep: ''
    },
    errors: {},
    valid: {},
    validarNome() {
        if (this.formData.nome.length == 0) {
            this.errors.nome = "O nome é obrigatório";
            this.valid.nome = ""
        }
        else {
            this.errors.nome = '';
            this.valid.nome = "Nome válido."
        }
    },
    validarSenha() {
        if (this.formData.senha.length < 6) {
            this.errors.senha = "Digite uma senha que tenha 6 caracteres";
            this.valid.senha = ""
        }
        else {
            this.errors.senha = '';
            this.valid.senha = "Senha Válida."
        }
    },
    validarConfirmarSenha() {
        if (this.formData.confirmarSenha == this.formData.senha) {
            this.valid.confirmarSenha = "Senha válida";
            this.errors.confirmarSenha = ""
        }
        else {
            this.valid.confirmarSenha = '';
            this.errors.confirmarSenha = "As senhas não são iguais."
        }
    },
    validarTelefone() {
        if (this.formData.telefone.length < 11) {
            this.errors.telefone = "Um telefone válido é obrigatório";
            this.valid.telefone = ""
        }
        else {
            this.errors.telefone = '';
            this.valid.telefone = "Telefone válido."
        }
    },
    validarCpf() {
        if (this.formData.cpf.length < 11) {
            this.errors.cpf = "Digite um CPF válido";
            this.valid.cpf = ""
        }
        else {
            this.errors.cpf = '';
            this.valid.cpf = "CPF Válido."
        }
    },
    validarDatadenascimento() {

        const dataSelecionada = new Date(this.formData.datadenascimento);
        const dataAtual = new Date();

        if (dataSelecionada > dataAtual) {
            this.errors.datadenascimento = "Data de nascimento inválida";
            this.valid.datadenascimento = ""
        }
        else {
            this.errors.datadenascimento = '';
            this.valid.datadenascimento = "Data de nascimento Válido."
        }
    },
    validarRua() {
        if (this.formData.rua.length == 0) {
            this.errors.rua = "Digite um endereço válido";
            this.valid.rua = ""
        }
        else {
            this.errors.rua = '';
            this.valid.rua = "Endereço Válido."
        }
    },
    validarNumero() {
        if (this.formData.numero.length == 0) {
            this.errors.numero = "Digite um número válido";
            this.valid.numero = ""
        }
        else {
            this.errors.numero = '';
            this.valid.numero = "Numero Válido."
        }
    },
    validarBairro() {
        if (this.formData.bairro.length == 0) {
            this.errors.bairro = "Digite um bairro válido";
            this.valid.bairro = ""
        }
        else {
            this.errors.bairro = '';
            this.valid.bairro = "bairro Válido."
        }
    },
    validarCidade() {
        if (this.formData.cidade.length == 0) {
            this.errors.cidade = "Digite uma cidade válido";
            this.valid.cidade = ""
        }
        else {
            this.errors.cidade = '';
            this.valid.cidade = "cidade Válido."
        }
    },
    validarEstado() {
        if (this.formData.estado.length == 0) {
            this.errors.estado = "Digite um estado válido";
            this.valid.estado = ""
        }
        else {
            this.errors.estado = '';
            this.valid.estado = "estado Válido."
        }
    },
    validarCep() {
        if (this.formData.cep.length < 8) {
            this.errors.cep = "Digite um cep válido";
            this.valid.cep = "";
            console.log(this.buscarCep());
            return false
        }
        else {
            this.errors.cep = '';
            this.valid.cep = "cep Válido.";
            this.buscarCep();
            return true
        }
    },
    validarTermo() {
        if (this.formData.termo == false) {
            this.errors.termo = "Você deve aceitar os termos"
            this.valid.termo = ""
            return false; 
        }
        else {
            this.errors.termo = ""
            return true;
        }
    },
    enviarFormulário(){
        if (this.validarNome() && this.validarCpf() && this.validarEmail() && this.validarSenha() && this.validarConfirmarSenha() && this.validarTelefone()) 
            {alert("Tudo é válido")}
    },
    async buscarCep(){
        const response = await fetch (`https://viacep.com.br/ws/${this.formData.cep}/json/`);
        
        if (response.ok){
            const json = await response.json();
            this.formData.cidade = json.localidade;
            this.formData.estado = json.uf;
            this.formData.rua = json.logradouro;
            this.formData.bairro = json.bairro;
            this.formData.numero = json.complemento
        }
    }

}



document.addEventListener("DOMContentLoaded", () => {
    PetiteVue.createApp({
        app
    }).mount();
})
