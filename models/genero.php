<?php
    class Genero {

        private $pdo;
        public $genero_codigo;
        public $genero_descripcion;

        public function __CONSTRUCT()
        {
            $this->db = new Database;
        }

        public function Listar()
        {
            $this->db->query("SELECT * FROM genero");
            return $this->db->resutlSet();
        }

        public function Obtener($genero_codigo)
        {
            $this->db->query(
                "SELECT * FROM genero
                WHERE genero_codigo=:genero_codigo"
            );
            $this->db->bind(':genero_codigo', intval($genero_codigo));
            return $this->db->result();
        }

        public function Registrar(Genero $data)
        {
            $this->db->query(
                "INSERT INTO genero (genero_descripcion)
                VALUES (:genero_descripcion)"
            );
            $this->db->bind(':genero_descripcion', $data->genero_descripcion);
            if($this->db->execute()) {
                return true;
            } else {
                return false;
            }
        }

        public function Actualizar(Genero $data)
        {
            $this->db->query(
                "UPDATE genero
                SET genero_descripcion=:genero_descripcion
                WHERE genero_codigo=:genero_codigo"
            );
            $this->db->bind(':genero_descripcion', $data->genero_descripcion);
            $this->db->bind(':genero_codigo', $data->genero_codigo);
            if($this->db->execute()) {
                return true;
            } else {
                return false;
            }
        }

        public function Eliminar($genero_codigo)
        {
            $this->db->query(
                "DELETE FROM genero
                WHERE genero_codigo=:genero_codigo"
            );
            $this->db->bind(':genero_codigo', intval($genero_codigo));
            if($this->db->execute()) {
                return true;
            } else {
                return false;
            }
        }
    }