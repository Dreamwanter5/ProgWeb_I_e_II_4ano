<?php
require 'baseDAO.php';
require '../model/tipoTarefa.php';
class TipoTarefaDAO extends BaseDAO{
    function selecionarTodas(){
        $sql = 'SELECT id, nome FROM tipos_tarefa';
        $stmt = $this->executar($sql);
        $resultado = $stmt->fetchColumn(PDO::FETCH_ASSOC);
        return $resultado;
    }
}