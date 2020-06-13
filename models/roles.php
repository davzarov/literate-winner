<?php

class Rol {

    private $pdo;
    public $rol_codigo;
    public $rol_descripcion;
    public $usuario_codigo;
    public $persona_codigo;

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
                ->prepare(
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
                    ON r.persona_codigo=p.persona_codigo");
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Obtener($rol_codigo)
    {
        try {
            $params = array('rol_codigo' => intval($rol_codigo));
            $stm = $this->pdo
                ->prepare(
                    "SELECT * FROM roles
                    WHERE rol_codigo=:rol_codigo");
            $stm->execute($params);
            return $stm->fetch(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Registrar(Rol $data) {
        try {
            $params = array(
                'rol_descripcion' => $data->rol_descripcion,
                'usuario_codigo' => intval($data->usuario_codigo),
                'persona_codigo' => intval($data->persona_codigo));
            $this->pdo
                ->prepare(
                    "INSERT INTO roles (rol_descripcion, usuario_codigo, persona_codigo)
                    VALUES (:rol_descripcion, :usuario_codigo, :persona_codigo)")
                ->execute($params);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Actualizar(Rol $data) {
        try {
            $params = array(
                'rol_codigo' => intval($data->rol_codigo),
                'rol_descripcion' => $data->rol_descripcion,
                'usuario_codigo' => intval($data->usuario_codigo),
                'persona_codigo' => intval($data->persona_codigo));
            $this->pdo
                ->prepare(
                    "UPDATE roles
                    SET
                        rol_descripcion=:rol_descripcion,
                        usuario_codigo=:usuario_codigo,
                        persona_codigo=:persona_codigo
                    WHERE rol_codigo=:rol_codigo;")
                ->execute($params);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Eliminar($rol_codigo) {
        try {
            $params = array(
                'rol_codigo' => intval($rol_codigo));
            $this->pdo
                ->prepare(
                    "DELETE FROM roles
                    WHERE rol_codigo=:rol_codigo")
                ->execute($params);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
}
