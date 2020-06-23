<?php
    class Menu {

        private $pdo;
        public $menu_codigo;
        public $menu_descripcion;
        public $menu_enlace;

        public function __CONSTRUCT()
        {
            $this->db = new Database;
        }

        public function Listar()
        {
            $this->db->query("SELECT * FROM menu");
            return $this->db->resultSet();
        }

        public function Obtener($menu_codigo)
        {
            $this->db->query(
                "SELECT * FROM menu
                WHERE menu_codigo=:menu_codigo"
            );
            $this->db->bind(':menu_codigo', intval($menu_codigo));
            return $this->db->result();
        }

        public function Registrar(Menu $data)
        {
            $this->db->query(
                "INSERT INTO menu (menu_descripcion, menu_enlace)
                VALUES (:menu_descripcion, :menu_enlace)"
            );
            $this->db->bind(':menu_descripcion', $data->menu_descripcion);
            $this->db->bind(':menu_enlace', $data->menu_enlace);
            if($this->db->execute()) {
                return true;
            } else {
                return false;
            }
        }

        public function Actualizar(Menu $data)
        {
            $this->db->query(
                "UPDATE menu
                SET menu_descripcion=:menu_descripcion, menu_enlace=:menu_enlace
                WHERE menu_codigo=:menu_codigo"
            );
            $this->db->bind(':menu_descripcion', $data->menu_descripcion);
            $this->db->bind(':menu_enlace', $data->menu_enlace);
            $this->db->bind(':menu_codigo', intval($data->menu_codigo));
            if($this->db->execute()) {
                return true;
            } else {
                return false;
            }
        }

        public function Eliminar($menu_codigo)
        {
            $this->db->query(
                "DELETE FROM menu
                WHERE menu_codigo=:menu_codigo"
            );
            $this->db->bind(':menu_codigo', intval($menu_codigo));
            if($this->db->execute()) {
                return true;
            } else {
                return false;
            }
        }
    }