<?php

class Usuario {

    private $pdo;
    public $usuario_codigo;
    public $usuario_login;
    public $usuario_password;

    public function __CONSTRUCT()
    {
        try {
            $this->pdo = Database::Conectar();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Listar()
    {
        try {
            $stm = $this->pdo
                ->prepare("SELECT * FROM usuario");
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Obtener($usuario_codigo)
    {
        try {
            $params = array('usuario_codigo' => intval($usuario_codigo));
            $stm = $this->pdo
                ->prepare(
                    "SELECT * FROM usuario
                    WHERE usuario_codigo=:usuario_codigo");
            $stm->execute($params);
            return $stm->fetch(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Registrar(Usuario $data) {
        try {
            $params = array(
                'usuario_login' => $data->usuario_login,
                'usuario_password' => password_hash($data->usuario_password, PASSWORD_BCRYPT));
            $this->pdo
                ->prepare(
                    "INSERT INTO usuario (usuario_login, usuario_password)
                    VALUES (:usuario_login, :usuario_password)")
                ->execute($params);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Actualizar(Usuario $data) {
        try {
            $params = array(
                'usuario_login' => $data->usuario_login,
                'usuario_password' => password_hash($data->usuario_password, PASSWORD_BCRYPT),
                'usuario_codigo' => $data->usuario_codigo);
            $this->pdo
                ->prepare(
                    "UPDATE usuario
                    SET usuario_login=:usuario_login, usuario_password=:usuario_password
                    WHERE usuario_codigo=:usuario_codigo;")
                ->execute($params);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Eliminar($usuario_codigo) {
        try {
            $params = array(
                'usuario_codigo' => intval($usuario_codigo));
            $this->pdo
                ->prepare(
                    "DELETE FROM usuario
                    WHERE usuario_codigo=:usuario_codigo")
                ->execute($params);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
}
