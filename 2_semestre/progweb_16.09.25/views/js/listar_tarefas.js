const app = {
    tarefas: [],
    async carregarTarefas(){
        const response = await fetch("../controller/TarefaController?acao=selecionarTodas");
        const Json = await response.json()
    }

    // Falta editar aqui
    // A tarefa Controller e a TarefaDAO
}