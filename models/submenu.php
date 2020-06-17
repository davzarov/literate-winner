<?php
    class Submenu {

        private $pdo;
        public $submenu_codigo;
        public $submenu_descripcion;
        public $submenu_enlace;
        public $menu_codigo;

        public function __CONSTRUCT()
        {
            $this->db = new Database;
        }

        public function Listar()
        {
            $this->db->query(
                "SELECT
                    s.submenu_codigo,
                    s.submenu_descripcion,
                    s.submenu_enlace,
                    m.menu_descripcion
                FROM submenu AS s
                INNER JOIN menu AS m
                ON s.menu_codigo=m.menu_codigo"
            );
            return $this->db->resultSet();
        }

        public function Obtener($submenu_codigo)
        {
            $this->db->query(
                "SELECT * FROM submenu
                WHERE submenu_codigo=:submenu_codigo"
            );
            $this->db->bind(':submenu_codigo', intval($submenu_codigo));
            return $this->db->result();
        }

        public function Registrar(Submenu $data)
        {
            $this->db->query(
                "INSERT INTO submenu (menu_codigo, submenu_descripcion, submenu_enlace)
                VALUES (:menu_codigo, :submenu_descripcion, :submenu_enlace)"
            );
            $this->db->bind(':submenu_descripcion', $data->submenu_descripcion);
            $this->db->bind(':submenu_enlace', $data->submenu_enlace);
            $this->db->bind(':menu_codigo', intval($data->menu_codigo));
            if($this->db->execute()) {
                return true;
            } else {
                return false;
            }
        }

        public function Actualizar(Submenu $data)
        {
            $this->db->query(
                "UPDATE submenu
                SET
                    menu_codigo=:menu_codigo,
                    submenu_descripcion=:submenu_descripcion,
                    submenu_enlace=:submenu_enlace
                WHERE submenu_codigo=:submenu_codigo"
            );
            $this->db->bind(':submenu_codigo', intval($data->submenu_codigo));
            $this->db->bind(':submenu_descripcion', $data->submenu_descripcion);
            $this->db->bind(':submenu_enlace', $data->submenu_enlace);
            $this->db->bind(':menu_codigo', intval($data->menu_codigo));
            if($this->db->execute()) {
                return true;
            } else {
                return false;
            }
        }

        public function Eliminar($submenu_codigo)
        {
            $this->db->query(
                "DELETE FROM submenu
                WHERE submenu_codigo=:submenu_codigo"
            );
            $this->db->bind(':submenu_codigo', intval($submenu_codigo));
            if($this->db->execute()) {
                return true;
            } else {
                return false;
            }
        }
    }