<?php

class TipoPersona {

    private $pdo;
    public $tipo_persona_codigo;
    public $tipo_persona_descripcion;

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
                ->prepare("SELECT * FROM tipo_persona");
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Obtener($tipo_persona_codigo)
    {
        try {
            $params = array('tipo_persona_codigo' => intval($tipo_persona_codigo));
            $stm = $this->pdo
                ->prepare(
                    "SELECT * FROM tipo_persona
                    WHERE tipo_persona_codigo=:tipo_persona_codigo");
            $stm->execute($params);
            return $stm->fetch(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Registrar(TipoPersona $data) {
        try {
            $params = array(
                'tipo_persona_descripcion' => $data->tipo_persona_descripcion);
            $this->pdo
                ->prepare(
                    "INSERT INTO tipo_persona (tipo_persona_descripcion)
                    VALUES (:tipo_persona_descripcion)")
                ->execute($params);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Actualizar(TipoPersona $data) {
        try {
            $params = array(
                'tipo_persona_descripcion' => $data->tipo_persona_descripcion,
                'tipo_persona_codigo' => $data->tipo_persona_codigo);
            $this->pdo
                ->prepare(
                    "UPDATE tipo_persona
                    SET tipo_persona_descripcion=:tipo_persona_descripcion
                    WHERE tipo_persona_codigo=:tipo_persona_codigo;")
                ->execute($params);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Eliminar($tipo_persona_codigo) {
        try {
            $params = array(
                'tipo_persona_codigo' => intval($tipo_persona_codigo));
            $this->pdo
                ->prepare(
                    "DELETE FROM tipo_persona
                    WHERE tipo_persona_codigo=:tipo_persona_codigo")
                ->execute($params);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
}
