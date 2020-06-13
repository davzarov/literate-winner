<?php

class Menu {

    private $pdo;
    public $menu_codigo;
    public $menu_descripcion;
    public $menu_enlace;

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
                ->prepare("SELECT * FROM menu");
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Obtener($menu_codigo)
    {
        try {
            $params = array('menu_codigo' => intval($menu_codigo));
            $stm = $this->pdo
                ->prepare(
                    "SELECT * FROM menu
                    WHERE menu_codigo=:menu_codigo");
            $stm->execute($params);
            return $stm->fetch(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Registrar(Menu $data) {
        try {
            $params = array(
                'menu_descripcion' => $data->menu_descripcion,
                'menu_enlace' => $data->menu_enlace);
            $this->pdo
                ->prepare(
                    "INSERT INTO menu (menu_descripcion, menu_enlace)
                    VALUES (:menu_descripcion, :menu_enlace)")
                ->execute($params);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Actualizar(Menu $data) {
        try {
            $params = array(
                'menu_descripcion' => $data->menu_descripcion,
                'menu_enlace' => $data->menu_enlace,
                'menu_codigo' => $data->menu_codigo);
            $this->pdo
                ->prepare(
                    "UPDATE menu
                    SET menu_descripcion=:menu_descripcion, menu_enlace=:menu_enlace
                    WHERE menu_codigo=:menu_codigo;")
                ->execute($params);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Eliminar($menu_codigo) {
        try {
            $params = array(
                'menu_codigo' => intval($menu_codigo));
            $this->pdo
                ->prepare(
                    "DELETE FROM menu
                    WHERE menu_codigo=:menu_codigo")
                ->execute($params);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
}
