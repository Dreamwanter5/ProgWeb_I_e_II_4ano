<?php
require-once '../dao/tipoTarefaDAO.php';
class TipoTarefaController
{
    private $dao;

    function__construct()
    {
        $this->dao = new TipoTarefaDAO();
    }

    function selecionarTodas(){
        $cadastrados = $this->dao->selecionarTodas();

        echo json_encode($cadastrados);
    }
}

$controller = new TipoTarefaController();
if($_GET['acao'] == 'listarTodos'){
    $controller->selecionarTodas;
}