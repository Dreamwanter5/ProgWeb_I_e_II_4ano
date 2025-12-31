<?php

class BaseDAO
{
    private $connection;

    function __construct()
    {
        $connection_string =
            "mysql:host=localhost;dbname=progweb;
            port=3306";
        $db_user = "root";
        //$db_pass="dbadmin";
        $this->connection = new PDO(
            $connection_string,
            $db_user
            //,$db_pass
        );
        $this->connection->setAttribute(
            PDO::ATTR_ERRMODE,
            PDO::ERRMODE_EXCEPTION
        );
    }

    public function executaComParametros(
        $sql,
        $parametros
    ) {
        $stmt = $this->connection->prepare($sql);
        foreach ($parametros as $chave => $valor) {
            $stmt->bindValue($chave, $valor);
        }
        $stmt->execute();
    }
}
