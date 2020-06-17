<?php
    class Departamento {

        private $pdo;
        public $departamento_codigo;
        public $departamento_descripcion;
        public $pais_codigo;

        public function __CONSTRUCT()
        {
            $this->db = new Database;
        }

        public function Listar()
        {
            $this->db->query(
                "SELECT d.departamento_codigo, d.departamento_descripcion, p.pais_descripcion
                FROM departamento AS d
                INNER JOIN pais AS p
                ON d.pais_codigo=p.pais_codigo"
            );
            return $this->db->resultSet();
        }

        public function Obtener($departamento_codigo)
        {
            $this->db->query(
                "SELECT * FROM departamento
                WHERE departamento_codigo=:departamento_codigo"
            );
            $this->db->bind(':departamento_codigo', intval($departamento_codigo));
            return $this->db->result();
        }

        public function Registrar(Departamento $data)
        {
            $this->db->query(
                "INSERT INTO departamento (pais_codigo, departamento_descripcion)
                VALUES (:pais_codigo, :departamento_descripcion)"
            );
            $this->db->bind(':departamento_descripcion', $data->departamento_descripcion);
            $this->db->bind(':pais_codigo', intval($data->pais_codigo));
            if($this->db->execute()) {
                return true;
            } else {
                return false;
            }
        }

        public function Actualizar(Departamento $data)
        {
            $this->db->query(
                "UPDATE departamento
                SET pais_codigo=:pais_codigo, departamento_descripcion=:departamento_descripcion
                WHERE departamento_codigo=:departamento_codigo"
            );
            $this->db->bind(':departamento_codigo', intval($data->departamento_codigo));
            $this->db->bind(':departamento_descripcion', $data->departamento_descripcion);
            $this->db->bind(':pais_codigo', intval($data->pais_codigo));
            if($this->db->execute()) {
                return true;
            } else {
                return false;
            }
        }

        public function Eliminar($departamento_codigo)
        {
            $this->db->query(
                "DELETE FROM departamento
                WHERE departamento_codigo=:departamento_codigo"
            );
            $this->db->bind(':departamento_codigo', intval($departamento_codigo));
            if($this->db->execute()) {
                return true;
            } else {
                return false;
            }
        }
    }