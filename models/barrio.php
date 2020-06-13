<?php

class Barrio {

    private $pdo;
    public $barrio_codigo;
    public $barrio_descripcion;
    public $ciudad_codigo;

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
                    "SELECT b.barrio_codigo, b.barrio_descripcion, c.ciudad_descripcion
                    FROM barrio AS b
                    INNER JOIN ciudad AS c
                    ON b.ciudad_codigo=c.ciudad_codigo");
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Obtener($barrio_codigo)
    {
        try {
            $params = array('barrio_codigo' => intval($barrio_codigo));
            $stm = $this->pdo
                ->prepare(
                    "SELECT * FROM barrio
                    WHERE barrio_codigo=:barrio_codigo");
            $stm->execute($params);
            return $stm->fetch(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Registrar(Barrio $data) {
        try {
            $params = array(
                'barrio_descripcion' => $data->barrio_descripcion,
                'ciudad_codigo' => intval($data->ciudad_codigo));
            $this->pdo
                ->prepare(
                    "INSERT INTO barrio (ciudad_codigo, barrio_descripcion)
                    VALUES (:ciudad_codigo, :barrio_descripcion)")
                ->execute($params);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Actualizar(Barrio $data) {
        try {
            $params = array(
                'barrio_codigo' => intval($data->barrio_codigo),
                'barrio_descripcion' => $data->barrio_descripcion,
                'ciudad_codigo' => intval($data->ciudad_codigo));
            $this->pdo
                ->prepare(
                    "UPDATE barrio
                    SET ciudad_codigo=:ciudad_codigo, barrio_descripcion=:barrio_descripcion
                    WHERE barrio_codigo=:barrio_codigo;")
                ->execute($params);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Eliminar($barrio_codigo) {
        try {
            $params = array(
                'barrio_codigo' => intval($barrio_codigo));
            $this->pdo
                ->prepare(
                    "DELETE FROM barrio
                    WHERE barrio_codigo=:barrio_codigo")
                ->execute($params);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
}
