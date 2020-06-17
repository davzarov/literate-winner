<?php
    class Ciudad {

        private $pdo;
        public $ciudad_codigo;
        public $ciudad_descripcion;
        public $departamento_codigo;

        public function __CONSTRUCT()
        {
            $this->db = new Database;
        }

        public function Listar()
        {
            $this->db->query(
                "SELECT c.ciudad_codigo, c.ciudad_descripcion, d.departamento_descripcion
                FROM ciudad AS c
                INNER JOIN departamento AS d
                ON c.departamento_codigo=d.departamento_codigo"
            );
            return $this->db->resultSet();
        }

        public function Obtener($ciudad_codigo)
        {
            $this->db->query(
                "SELECT * FROM ciudad
                WHERE ciudad_codigo=:ciudad_codigo"
            );
            $this->db->bind(':ciudad_codigo', intval($ciudad_codigo));
            return $this->db->result();
        }

        public function Registrar(Ciudad $data)
        {
            $this->db->query(
                "INSERT INTO ciudad (departamento_codigo, ciudad_descripcion)
                VALUES (:departamento_codigo, :ciudad_descripcion)"
            );
            $this->db->bind(':ciudad_descripcion', $data->ciudad_descripcion);
            $this->db->bind(':departamento_codigo', intval($data->departamento_codigo));
            if($this->db->execute()) {
                return true;
            } else {
                return false;
            }
        }

        public function Actualizar(Ciudad $data)
        {
            $this->db->query(
                "UPDATE ciudad
                SET departamento_codigo=:departamento_codigo, ciudad_descripcion=:ciudad_descripcion
                WHERE ciudad_codigo=:ciudad_codigo"
            );
            $this->db->bind(':ciudad_codigo', intval($data->ciudad_codigo));
            $this->db->bind(':ciudad_descripcion', $data->ciudad_descripcion);
            $this->db->bind(':departamento_codigo', intval($data->departamento_codigo));
            if($this->db->execute()) {
                return true;
            } else {
                return false;
            }
        }

        public function Eliminar($ciudad_codigo)
        {
            $this->db->query(
                "DELETE FROM ciudad
                WHERE ciudad_codigo=:ciudad_codigo"
            );
            $this->db->bind(':ciudad_codigo', intval($ciudad_codigo));
            if($this->db->execute()) {
                return true;
            } else {
                return false;
            }
        }
    }