<?php

class TipoDocumento {

    private $pdo;
    public $tipo_documento_codigo;
    public $tipo_documento_descripcion;

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
                ->prepare("SELECT * FROM tipo_documento");
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Obtener($tipo_documento_codigo)
    {
        try {
            $params = array('tipo_documento_codigo' => intval($tipo_documento_codigo));
            $stm = $this->pdo
                ->prepare(
                    "SELECT * FROM tipo_documento
                    WHERE tipo_documento_codigo=:tipo_documento_codigo");
            $stm->execute($params);
            return $stm->fetch(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Registrar(TipoDocumento $data) {
        try {
            $params = array(
                'tipo_documento_descripcion' => $data->tipo_documento_descripcion);
            $this->pdo
                ->prepare(
                    "INSERT INTO tipo_documento (tipo_documento_descripcion)
                    VALUES (:tipo_documento_descripcion)")
                ->execute($params);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Actualizar(TipoDocumento $data) {
        try {
            $params = array(
                'tipo_documento_descripcion' => $data->tipo_documento_descripcion,
                'tipo_documento_codigo' => $data->tipo_documento_codigo);
            $this->pdo
                ->prepare(
                    "UPDATE tipo_documento
                    SET tipo_documento_descripcion=:tipo_documento_descripcion
                    WHERE tipo_documento_codigo=:tipo_documento_codigo;")
                ->execute($params);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Eliminar($tipo_documento_codigo) {
        try {
            $params = array(
                'tipo_documento_codigo' => intval($tipo_documento_codigo));
            $this->pdo
                ->prepare(
                    "DELETE FROM tipo_documento
                    WHERE tipo_documento_codigo=:tipo_documento_codigo")
                ->execute($params);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
}
