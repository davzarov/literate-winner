<?php

class Submenu {

    private $pdo;
    public $submenu_codigo;
    public $submenu_descripcion;
    public $submenu_enlace;
    public $menu_codigo;

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
                        s.submenu_codigo,
                        s.submenu_descripcion,
                        s.submenu_enlace,
                        m.menu_descripcion
                    FROM submenu AS s
                    INNER JOIN menu AS m
                    ON s.menu_codigo=m.menu_codigo");
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Obtener($submenu_codigo)
    {
        try {
            $params = array('submenu_codigo' => intval($submenu_codigo));
            $stm = $this->pdo
                ->prepare(
                    "SELECT * FROM submenu
                    WHERE submenu_codigo=:submenu_codigo");
            $stm->execute($params);
            return $stm->fetch(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Registrar(Submenu $data) {
        try {
            $params = array(
                'submenu_descripcion' => $data->submenu_descripcion,
                'submenu_enlace' => $data->submenu_enlace,
                'menu_codigo' => intval($data->menu_codigo));
            $this->pdo
                ->prepare(
                    "INSERT INTO submenu (menu_codigo, submenu_descripcion, submenu_enlace)
                    VALUES (:menu_codigo, :submenu_descripcion, :submenu_enlace)")
                ->execute($params);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Actualizar(Submenu $data) {
        try {
            $params = array(
                'submenu_codigo' => intval($data->submenu_codigo),
                'submenu_descripcion' => $data->submenu_descripcion,
                'submenu_enlace' => $data->submenu_enlace,
                'menu_codigo' => intval($data->menu_codigo));
            $this->pdo
                ->prepare(
                    "UPDATE submenu
                    SET
                        menu_codigo=:menu_codigo,
                        submenu_descripcion=:submenu_descripcion,
                        submenu_enlace=:submenu_enlace
                    WHERE submenu_codigo=:submenu_codigo;")
                ->execute($params);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Eliminar($submenu_codigo) {
        try {
            $params = array(
                'submenu_codigo' => intval($submenu_codigo));
            $this->pdo
                ->prepare(
                    "DELETE FROM submenu
                    WHERE submenu_codigo=:submenu_codigo")
                ->execute($params);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
}
