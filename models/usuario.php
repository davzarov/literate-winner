<?php
    class Usuario {

        private $pdo;
        public $usuario_codigo;
        public $usuario_login;
        public $usuario_password;

        public function __CONSTRUCT()
        {
            $this->db = new Database;
        }

        public function Listar()
        {
            $this->db->query("SELECT * FROM usuario");
            return $this->db->resultSet();
        }

        public function Obtener($usuario_codigo)
        {
            $this->db->query(
                "SELECT * FROM usuario
                WHERE usuario_codigo=:usuario_codigo"
            );
            $this->db->bind(':usuario_codigo', intval($usuario_codigo));
            return $this->db->result();
        }

        public function ExisteUsuario($usuario_login)
        {
            $this->db->query(
                "SELECT * FROM usuario
                WHERE usuario_login=usuario_login"
            );
            $this->db->bind(':usuario_login', $usuario_login);
            $this->db->execute();
            if($this->db->rowCount() > 0) {
                return true;
            } else {
                return false;
            }
        }

        public function Autenticar($usuario_login, $usuario_password)
        {
            $this->db->query(
                "SELECT * FROM usuario
                WHERE usuario_login=usuario_login"
            );
            $this->db->bind(':usuario_login', $usuario_login);
            $usuario = $this->db->result();
            if(password_verify($usuario_password, $usuario->usuario_password)) {
                return $usuario;
            } else {
                return false;
            }
        }

        public function Registrar(Usuario $data)
        {
            $this->db->query(
                "INSERT INTO usuario (usuario_login, usuario_password)
                VALUES (:usuario_login, :usuario_password)"
            );
            $this->db->bind(':usuario_login', $data->usuario_login);
            $this->db->bind(':usuario_password', password_hash($data->usuario_password, PASSWORD_BCRYPT));
            if($this->db->execute()) {
                return true;
            } else {
                return false;
            }
        }

        public function Actualizar(Usuario $data)
        {
            $this->db->query(
                "UPDATE usuario
                SET usuario_login=:usuario_login, usuario_password=:usuario_password
                WHERE usuario_codigo=:usuario_codigo"
            );
            $this->db->bind(':usuario_login', $data->usuario_login);
            $this->db->bind(':usuario_password', password_hash($data->usuario_password, PASSWORD_BCRYPT));
            $this->db->bind(':usuario_codigo', $data->usuario_codigo);
            if($this->db->execute()) {
                return true;
            } else {
                return false;
            }
        }

        public function Eliminar($usuario_codigo)
        {
            $this->db->query(
                "DELETE FROM usuario
                WHERE usuario_codigo=:usuario_codigo"
            );
            $this->db->bind(':usuario_codigo', intval($usuario_codigo));
            if($this->db->execute()) {
                return true;
            } else {
                return false;
            }
        }
    }