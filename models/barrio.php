<?php
    class Barrio {

        private $pdo;
        public $barrio_codigo;
        public $barrio_descripcion;
        public $ciudad_codigo;

        public function __CONSTRUCT()
        {
            $this->db = new Database;
        }

        public function Listar()
        {
            $this->db->query(
                "SELECT b.barrio_codigo, b.barrio_descripcion, c.ciudad_descripcion
                FROM barrio AS b
                INNER JOIN ciudad AS c
                ON b.ciudad_codigo=c.ciudad_codigo"
            );
            return $this->db->resultSet();
        }

        public function ListarPorCiudad($ciudad_codigo)
        {
            $this->db->query(
                "SELECT * FROM barrio
                WHERE ciudad_codigo=:ciudad_codigo"
            );
            $this->db->bind(':ciudad_codigo', intval($ciudad_codigo));
            return $this->db->resultSet();
        }

        public function Obtener($barrio_codigo)
        {
            $this->db->query(
                "SELECT * FROM barrio
                WHERE barrio_codigo=:barrio_codigo"
            );
            $this->db->bind(':barrio_codigo', intval($barrio_codigo));
            return $this->db->result();
        }

        public function Registrar(Barrio $data)
        {
            $this->db->query(
                "INSERT INTO barrio (ciudad_codigo, barrio_descripcion)
                VALUES (:ciudad_codigo, :barrio_descripcion)"
            );
            $this->db->bind(':ciudad_codigo', intval($data->ciudad_codigo));
            $this->db->bind(':barrio_descripcion', $data->barrio_descripcion);
            if($this->db->execute()) {
                return true;
            } else {
                return false;
            }
        }

        public function Actualizar(Barrio $data)
        {
            $this->db->query(
                "UPDATE barrio
                SET ciudad_codigo=:ciudad_codigo, barrio_descripcion=:barrio_descripcion
                WHERE barrio_codigo=:barrio_codigo"
            );
            $this->db->bind(':barrio_codigo', intval($data->barrio_codigo));
            $this->db->bind(':barrio_descripcion', $data->barrio_descripcion);
            $this->db->bind(':ciudad_codigo', intval($data->ciudad_codigo));
            if($this->db->execute()) {
                return true;
            } else {
                return false;
            }
        }

        public function Eliminar($barrio_codigo)
        {
            $this->db->query(
                "DELETE FROM barrio
                WHERE barrio_codigo=:barrio_codigo"
            );
            $this->db->bind(':barrio_codigo', intval($barrio_codigo));
            if($this->db->execute()) {
                return true;
            } else {
                return false;
            }
        }
    }