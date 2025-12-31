const app = {
    formData: {
        nome: '',
        tipo: '', 
        dataPrevista: '',
        descricao: '',
        imagem: null
    },
    tiposTarefa: [],
    uploadImagem(e){
        this.formData.imagem = e.target.files[0];
    },
    async carregarTipoTarefa() {
        // OLHAMOS EM REFERÊNCIA AO ARQUIVO QUE ESTÁ ABERTO E VAI UTILIZAR ESTE JS
        // NESTE CASO O CADASTRO_TAREFA.PHP
        const response = await fetch('../controller/TipoTarefasControler.php?acao=listarTodos');
        if(response.ok){
            const json = await response.json();
            this.tiposTarefa = json;
        }
    },
    async cadastrarTarefa(){
        const formData = new FormData();
        formData.append("nome", this.formData.nome);
        formData.append("tipo", this.formData.tipo);
        formData.append("data", this.formData.dataPrevista);
        formData.append("descricao", this.formData.descricao);
        formData.append("arquivo", this.formData.imagem);

        const response = await fetch("../controller/TarefaController.php?acao=inserir", {
            method: "POST",
            body: formData
        })

        if(!response.ok){
            const json = await response.json();
            if(json.imagem){
                this.errors.imagem = json.imagem;
            }
        }
    }
}
// O nome abaixo equivale a variavel que se iniciou no começo do código
document.addEventListener("DOMContetLoaded", () => {
    PetiteVue.createApp({
        app
    }).mount()
})
