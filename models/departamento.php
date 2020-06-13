<?php

class Departamento {

    private $pdo;
    public $departamento_codigo;
    public $departamento_descripcion;
    public $pais_codigo;

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
                ->prepare(
                    "SELECT d.departamento_codigo, d.departamento_descripcion, p.pais_descripcion
                    FROM departamento AS d
                    INNER JOIN pais AS p
                    ON d.pais_codigo=p.pais_codigo");
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Obtener($departamento_codigo)
    {
        try {
            $params = array('departamento_codigo' => intval($departamento_codigo));
            $stm = $this->pdo
                ->prepare(
                    "SELECT * FROM departamento
                    WHERE departamento_codigo=:departamento_codigo");
            $stm->execute($params);
            return $stm->fetch(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Registrar(Departamento $data) {
        try {
            $params = array(
                'departamento_descripcion' => $data->departamento_descripcion,
                'pais_codigo' => intval($data->pais_codigo));
            $this->pdo
                ->prepare(
                    "INSERT INTO departamento (pais_codigo, departamento_descripcion)
                    VALUES (:pais_codigo, :departamento_descripcion)")
                ->execute($params);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Actualizar(Departamento $data) {
        try {
            $params = array(
                'departamento_codigo' => intval($data->departamento_codigo),
                'departamento_descripcion' => $data->departamento_descripcion,
                'pais_codigo' => intval($data->pais_codigo));
            $this->pdo
                ->prepare(
                    "UPDATE departamento
                    SET pais_codigo=:pais_codigo, departamento_descripcion=:departamento_descripcion
                    WHERE departamento_codigo=:departamento_codigo;")
                ->execute($params);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Eliminar($departamento_codigo) {
        try {
            $params = array(
                'departamento_codigo' => intval($departamento_codigo));
            $this->pdo
                ->prepare(
                    "DELETE FROM departamento
                    WHERE departamento_codigo=:departamento_codigo")
                ->execute($params);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
}
