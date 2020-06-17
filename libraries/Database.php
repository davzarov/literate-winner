<?php
    /*
     * Clase Database
     * Gestiona las conexiones con el servidor de Base de Datos (PDO)
     * Enlaza parámetros con valores
     * Retorna Result y ResultSets
     */
    class Database {
        private $host = DB_HOST;
        private $user = DB_USER;
        private $pass = DB_PASS;
        private $dbname = DB_NAME;
        private $charset = DB_CHARSET;

        private $pdo;
        private $error;
        private $stmt;

        public function __CONSTRUCT()
        {
            // Construímos el string de la fuente de datos
            $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->dbname . ';charset=' . $this->charset;
            // Atributos de conexión
            $options = array(
                PDO::ATTR_PERSISTENT => true,
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
            );
            // Creamos una nueva instancia de PDO
            try {
                $this->pdo = new PDO($dsn, $this->user, $this->pass, $options);
            } catch (PDOException $e) {
                // Interceptamos errores
                $this->error = $e->getMessage();
            }
        }
        // Construimos sentencias preparadas con el query
        public function query($query)
        {
            $this->stmt = $this->pdo->prepare($query);
        }
        // Enlazamos los valores
        public function bind($param, $value, $type=null)
        {
            if(is_null($type)) {
                switch (true) {
                    case is_int($value):
                        $type = PDO::PARAM_INT;
                        break;
                    case is_bool($value):
                        $type = PDO::PARAM_BOOL;
                        break;
                    case is_null($null):
                        $type = PDO::PARAM_NULL;
                        break;
                    default:
                        $type = PDO::PARAM_STR;
                        break;
                }
            }
            $this->stmt->bindValue($param, $value, $type);
        }
        // Ejecutamos la sentencia preparada
        public function execute()
        {
            return $this->stmt->execute();
        }
        // Obtenemos un resultado como 'Objeto'
        public function result()
        {
            $this->execute();
            return $this->stmt->fetch(PDO::FETCH_OBJ);
        }
        // Obtenemos un resultado como un array de 'Objeto'
        public function resultSet()
        {
            $this->execute();
            return $this->stmt->fetchAll(PDO::FETCH_OBJ);
        }
        // Obtenemos el conteo de filas retornadas
        public function rowCount()
        {
            return $this->stmt->rowCount();
        }
        // Obtenemos el último ID insertado
        public function lastInsertId()
        {
            return $this->pdo->lastInsertId();
        }
    }
