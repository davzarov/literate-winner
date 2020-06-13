<?php

class Pais {

    private $pdo;
    public $pais_codigo;
    public $pais_descripcion;

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
                ->prepare("SELECT * FROM pais");
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Obtener($pais_codigo)
    {
        try {
            $params = array('pais_codigo' => intval($pais_codigo));
            $stm = $this->pdo
                ->prepare(
                    "SELECT * FROM pais
                    WHERE pais_codigo=:pais_codigo");
            $stm->execute($params);
            return $stm->fetch(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Registrar(Pais $data) {
        try {
            $params = array(
                'pais_descripcion' => $data->pais_descripcion);
            $this->pdo
                ->prepare(
                    "INSERT INTO pais (pais_descripcion)
                    VALUES (:pais_descripcion)")
                ->execute($params);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Actualizar(Pais $data) {
        try {
            $params = array(
                'pais_descripcion' => $data->pais_descripcion,
                'pais_codigo' => $data->pais_codigo);
            $this->pdo
                ->prepare(
                    "UPDATE pais
                    SET pais_descripcion=:pais_descripcion
                    WHERE pais_codigo=:pais_codigo;")
                ->execute($params);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Eliminar($pais_codigo) {
        try {
            $params = array(
                'pais_codigo' => intval($pais_codigo));
            $this->pdo
                ->prepare(
                    "DELETE FROM pais
                    WHERE pais_codigo=:pais_codigo")
                ->execute($params);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
}
