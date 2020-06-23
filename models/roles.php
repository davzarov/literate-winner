<?php
    class Rol {

        private $pdo;
        public $rol_codigo;
        public $rol_descripcion;
        public $usuario_codigo;
        public $persona_codigo;

        public function __CONSTRUCT()
        {
            $this->db = new Database;
        }

        public function Listar()
        {
            $this->db->query(
                "SELECT
                    r.rol_codigo,
                    r.rol_descripcion,
                    u.usuario_login,
                    p.persona_nombre1,
                    p.persona_apellido1
                FROM roles AS r
                INNER JOIN usuario AS u
                ON r.usuario_codigo=u.usuario_codigo
                INNER JOIN persona AS p
                ON r.persona_codigo=p.persona_codigo"
            );
            return $this->db->resultSet();
        }

        public function Obtener($rol_codigo)
        {
            $this->db->query(
                "SELECT * FROM roles
                WHERE rol_codigo=:rol_codigo"
            );
            $this->db->bind(':rol_codigo', intval($rol_codigo));
            return $this->db->result();
        }

        public function Registrar(Rol $data)
        {
            $this->db->query(
                "INSERT INTO roles (rol_descripcion, usuario_codigo, persona_codigo)
                VALUES (:rol_descripcion, :usuario_codigo, :persona_codigo)"
            );
            $this->db->bind(':rol_descripcion', $data->rol_descripcion);
            $this->db->bind(':usuario_codigo', intval($data->usuario_codigo));
            $this->db->bind(':persona_codigo', intval($data->persona_codigo));
            if($this->db->execute()) {
                return true;
            } else {
                return false;
            }
        }

        public function Actualizar(Rol $data)
        {
            $this->db->query(
                "UPDATE roles
                SET
                    rol_descripcion=:rol_descripcion,
                    usuario_codigo=:usuario_codigo,
                    persona_codigo=:persona_codigo
                WHERE rol_codigo=:rol_codigo"
            );
            $this->db->bind(':rol_codigo', intval($data->rol_codigo));
            $this->db->bind(':rol_descripcion', $data->rol_descripcion);
            $this->db->bind(':usuario_codigo', intval($data->usuario_codigo));
            $this->db->bind(':persona_codigo', intval($data->persona_codigo));
            if($this->db->execute()) {
                return true;
            } else {
                return false;
            }
        }

        public function Eliminar($rol_codigo)
        {
            $this->db->query(
                "DELETE FROM roles
                WHERE rol_codigo=:rol_codigo"
            );
            $this->db->bind(':rol_codigo', intval($rol_codigo));
            if($this->db->execute()) {
                return true;
            } else {
                return false;
            }
        }
    }