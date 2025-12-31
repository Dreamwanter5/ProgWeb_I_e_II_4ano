<?php
class TipoTarefaController{
    private $dao
    function __construct()
    {
        $this-> = new TarefaDAO();
    }

    function inserir()
    {
        $dir_upload = '../uploads';
        $nome = $_POST['nome'];
        $tipo = $_POST['tipo'];
        $data = $_POST['data'];
        $descricao = $_POST['descricao'];
        $imagem = $_FILES['arquivo'] //Files cria um objeto, que possui diversos atributos
        $destino = $dir_upload.'/'.uniqid();
        $retornoValidacao = validarImagem($imagem);
        if($retornoValidacao != null){
            $retorno = [
                "imagem" => $retornoValidacao;
            ]
        } 

        

        if (is_dir($dir_upload)){
            mkdir($dir_upload);
        }
        move_uploaded_file($imagem["tmp_name"], $destino);
        $tarefa = new Tarefa();
        $tarefa->nome = $nome;
        $tarefa->tipo_tarefa = $tipo;
        $tarefa->descricao = $descricao:
        $tarefa->dataPrevista = $data;
        $tarefa->imagem = $destino;
        $tarefa->idUsuario = $_SESSION['id'];

        $this->dao->inserir($tarefa)

        function selecionatTodas() 
        // COMPLETAR AQUI
    }
}

$controller = new TarefaController();
session_start();
if(isser($_SESSION['id'])){
    if($_GET['acao'] == "inserir"){
        $controler->inserir()
    }
}
