<?php

class Genero {

    private $pdo;
    public $genero_codigo;
    public $genero_descripcion;

    public function __CONSTRUCT()
    {
        try {
            $this->pdo = Database::Conectar();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Listar()
    {
        try {
            $stm = $this->pdo
                ->prepare("SELECT * FROM genero");
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Obtener($genero_codigo)
    {
        try {
            $params = array('codigo' => intval($genero_codigo));
            $stm = $this->pdo
                ->prepare("SELECT * FROM genero WHERE genero_codigo=:codigo");
            $stm->execute($params);
            return $stm->fetch(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Registrar(Genero $data)
    {
        try {
            $params = array('descripcion' => $data->genero_descripcion);
            $this->pdo
                ->prepare("INSERT INTO genero (genero_descripcion) VALUES (:descripcion)")
                ->execute($params);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Actualizar(Genero $data)
    {
        try {
            $params = array(
                'descripcion' => $data->genero_descripcion,
                'codigo' => $data->genero_codigo);
            $this->pdo
                ->prepare(
                    "UPDATE genero
                    SET genero_descripcion=:descripcion
                    WHERE genero_codigo=:codigo;")
                ->execute($params);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Eliminar($genero_codigo)
    {
        try {
            $params = array('codigo' => intval($genero_codigo));
            $this->pdo
                ->prepare("DELETE FROM genero WHERE genero_codigo=:codigo")
                ->execute($params);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
}
