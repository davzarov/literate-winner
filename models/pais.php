<?php
    class Pais {

        private $pdo;
        public $pais_codigo;
        public $pais_descripcion;

        public function __CONSTRUCT()
        {
            $this->db = new Database;
        }

        public function Listar()
        {
            $this->db->query("SELECT * FROM pais");
            return $this->db->resultSet();
        }

        public function Obtener($pais_codigo)
        {
            $this->db->query(
                "SELECT * FROM pais
                WHERE pais_codigo=:pais_codigo"
            );
            $this->db->bind(':pais_codigo', intval($pais_codigo));
            return $this->db->result();
        }

        public function Registrar(Pais $data)
        {
            $this->db->query(
                "INSERT INTO pais (pais_descripcion)
                VALUES (:pais_descripcion)"
            );
            $this->db->bind(':pais_descripcion', $data->pais_descripcion);
            if($this->db->execute()) {
                return true;
            } else {
                return false;
            }
        }

        public function Actualizar(Pais $data)
        {
            $this->db->query(
                "UPDATE pais
                SET pais_descripcion=:pais_descripcion
                WHERE pais_codigo=:pais_codigo"
            );
            $this->db->bind(':pais_descripcion', $data->pais_descripcion);
            $this->db->bind(':pais_codigo', $data->pais_codigo);
            if($this->db->execute()) {
                return true;
            } else {
                return false;
            }
        }

        public function Eliminar($pais_codigo)
        {
            $this->db->query(
                "DELETE FROM pais
                WHERE pais_codigo=:pais_codigo"
            );
            $this->db->bind(':pais_codigo', intval($pais_codigo));
            if($this->db->execute()) {
                return true;
            } else {
                return false;
            }
        }
    }