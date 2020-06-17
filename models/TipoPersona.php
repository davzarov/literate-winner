<?php
    class TipoPersona {

        private $pdo;
        public $tipo_persona_codigo;
        public $tipo_persona_descripcion;

        public function __CONSTRUCT()
        {
            $this->db = new Database;
        }

        public function Listar()
        {
            $this->db->query("SELECT * FROM tipo_persona");
            return $this->db->resultSet();
        }

        public function Obtener($tipo_persona_codigo)
        {
            $this->db->query(
                "SELECT * FROM tipo_persona
                WHERE tipo_persona_codigo=:tipo_persona_codigo"
            );
            $this->db->bind(':tipo_persona_codigo', intval($tipo_persona_codigo));
            return $this->db->result();
        }

        public function Registrar(TipoPersona $data)
        {
            $this->db->query(
                "INSERT INTO tipo_persona (tipo_persona_descripcion)
                VALUES (:tipo_persona_descripcion)"
            );
            $this->db->bind(':tipo_persona_descripcion', $data->tipo_persona_descripcion);
            if($this->db->execute()) {
                return true;
            } else {
                return false;
            }
        }

        public function Actualizar(TipoPersona $data)
        {
            $this->db->query(
                "UPDATE tipo_persona
                SET tipo_persona_descripcion=:tipo_persona_descripcion
                WHERE tipo_persona_codigo=:tipo_persona_codigo"
            );
            $this->db->bind(':tipo_persona_descripcion', $data->tipo_persona_descripcion);
            $this->db->bind(':tipo_persona_codigo', $data->tipo_persona_codigo);
            if($this->db->execute()) {
                return true;
            } else {
                return false;
            }
        }

        public function Eliminar($tipo_persona_codigo)
        {
            $this->db->query(
                "DELETE FROM tipo_persona
                WHERE tipo_persona_codigo=:tipo_persona_codigo"
            );
            $this->db->bind(':tipo_persona_codigo', intval($tipo_persona_codigo));
            if($this->db->execute()) {
                return true;
            } else {
                return false;
            }
        }
    }