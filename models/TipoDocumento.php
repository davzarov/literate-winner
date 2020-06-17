<?php
    class TipoDocumento {

        private $pdo;
        public $tipo_documento_codigo;
        public $tipo_documento_descripcion;

        public function __CONSTRUCT()
        {
            $this->db = new Database;
        }

        public function Listar()
        {
            $this->db->query("SELECT * FROM tipo_documento");
            return $this->db->resultSet();
        }

        public function Obtener($tipo_documento_codigo)
        {
            $this->db->query(
                "SELECT * FROM tipo_documento
                WHERE tipo_documento_codigo=:tipo_documento_codigo"
            );
            $this->db->bind(':tipo_documento_codigo', intval($tipo_documento_codigo));
            return $this->db->result();
        }

        public function Registrar(TipoDocumento $data)
        {
            $this->db->query(
                "INSERT INTO tipo_documento (tipo_documento_descripcion)
                VALUES (:tipo_documento_descripcion)"
            );
            $this->db->bind(':tipo_documento_descripcion', $data->tipo_documento_descripcion);
            if($this->db->execute()) {
                return true;
            } else {
                return false;
            }
        }

        public function Actualizar(TipoDocumento $data)
        {
            $this->db->query(
                "UPDATE tipo_documento
                SET tipo_documento_descripcion=:tipo_documento_descripcion
                WHERE tipo_documento_codigo=:tipo_documento_codigo"
            );
            $this->db->bind(':tipo_documento_descripcion', $data->tipo_documento_descripcion);
            $this->db->bind(':tipo_documento_codigo', $data->tipo_documento_codigo);
            if($this->db->execute()) {
                return true;
            } else {
                return false;
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