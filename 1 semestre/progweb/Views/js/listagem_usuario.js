const App = {
    usuarios: [],
    filtro: '',
    async carregarUsuarios() {
        const response = await fetch("http://localhost/progweb/Controllers/UsuarioController.php?acao=listar_todos");
        const json = await response.json();
        this.usuarios = json;
    },
    async filtrarUsuarios() {
        if (this.filtro != '') {
            const response = await fetch(`http://localhost/progweb/Controllers/UsuarioController.php?acao=filtrar&filtro=${this.filtro}`);
            const resposta = await response.json();
            this.usuarios = resposta;
        }
        else {
            this.carregarUsuarios();
        }
    },
    async removerUsuarios($id) {
        await fetch(`http://localhost/progweb/Controllers/UsuarioController.php?acao=deletar&id=${$id}`);
        this.carregarUsuarios();
        this.filtro = '';
    }
}
document.addEventListener("DOMContentLoaded", () => {
    PetiteVue.createApp({ App }).mount();
})