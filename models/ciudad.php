<?php

class Ciudad {

    private $pdo;
    public $ciudad_codigo;
    public $ciudad_descripcion;
    public $departamento_codigo;

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
                    "SELECT c.ciudad_codigo, c.ciudad_descripcion, d.departamento_descripcion
                    FROM ciudad AS c
                    INNER JOIN departamento AS d
                    ON c.departamento_codigo=d.departamento_codigo");
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Obtener($ciudad_codigo)
    {
        try {
            $params = array('ciudad_codigo' => intval($ciudad_codigo));
            $stm = $this->pdo
                ->prepare(
                    "SELECT * FROM ciudad
                    WHERE ciudad_codigo=:ciudad_codigo");
            $stm->execute($params);
            return $stm->fetch(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Registrar(Ciudad $data)
    {
        try {
            $params = array(
                'ciudad_descripcion' => $data->ciudad_descripcion,
                'departamento_codigo' => intval($data->departamento_codigo));
            $this->pdo
                ->prepare(
                    "INSERT INTO ciudad (departamento_codigo, ciudad_descripcion)
                    VALUES (:departamento_codigo, :ciudad_descripcion)")
                ->execute($params);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Actualizar(Ciudad $data)
    {
        try {
            $params = array(
                'ciudad_codigo' => intval($data->ciudad_codigo),
                'ciudad_descripcion' => $data->ciudad_descripcion,
                'departamento_codigo' => intval($data->departamento_codigo));
            $this->pdo
                ->prepare(
                    "UPDATE ciudad
                    SET departamento_codigo=:departamento_codigo, ciudad_descripcion=:ciudad_descripcion
                    WHERE ciudad_codigo=:ciudad_codigo;")
                ->execute($params);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Eliminar($ciudad_codigo)
    {
        try {
            $params = array(
                'ciudad_codigo' => intval($ciudad_codigo));
            $this->pdo
                ->prepare(
                    "DELETE FROM ciudad
                    WHERE ciudad_codigo=:ciudad_codigo")
                ->execute($params);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
}
