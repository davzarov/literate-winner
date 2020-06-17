<?php
    class Persona {

        private $pdo;
        public $persona_codigo;
        public $persona_nombre1;
        public $persona_nombre2;
        public $persona_apellido1;
        public $persona_apellido2;
        public $tipo_persona_codigo;
        public $tipo_documento_codigo;
        public $genero_codigo;
        public $barrio_codigo;

        public function __CONSTRUCT()
        {
            $this->db = new Database;
        }

        public function Listar()
        {
            $this->db->query(
                "SELECT
                    p.persona_codigo,
                    p.persona_nombre1,
                    p.persona_nombre2,
                    p.persona_apellido1,
                    p.persona_apellido2,
                    tp.tipo_persona_descripcion,
                    td.tipo_documento_descripcion,
                    g.genero_descripcion,
                    b.barrio_descripcion
                FROM persona AS p
                INNER JOIN tipo_persona AS tp
                ON p.tipo_persona_codigo=tp.tipo_persona_codigo
                INNER JOIN tipo_documento AS td
                ON p.tipo_documento_codigo=td.tipo_documento_codigo
                INNER JOIN genero AS g
                ON p.genero_codigo=g.genero_codigo
                INNER JOIN barrio AS b
                ON p.barrio_codigo=b.barrio_codigo"
            );
            return $this->db->resultSet();
        }

        public function Obtener($persona_codigo)
        {
            $this->db->query(
                "SELECT * FROM persona
                WHERE persona_codigo=:persona_codigo"
            );
            $this->db->bind(':persona_codigo', intval($persona_codigo));
            return $this->db->result();
        }

        public function Registrar(Persona $data)
        {
            $this->db->query(
                "INSERT INTO persona (
                    persona_nombre1,
                    persona_nombre2,
                    persona_apellido1,
                    persona_apellido2,
                    tipo_persona_codigo,
                    tipo_documento_codigo,
                    genero_codigo,
                    barrio_codigo
                )
                VALUES (
                    :persona_nombre1,
                    :persona_nombre2,
                    :persona_apellido1,
                    :persona_apellido2,
                    :tipo_persona_codigo,
                    :tipo_documento_codigo,
                    :genero_codigo,
                    :barrio_codigo
                )"
            );
            $this->db->bind(':persona_nombre1', $data->persona_nombre1);
            $this->db->bind(':persona_nombre2', $data->persona_nombre2);
            $this->db->bind(':persona_apellido1', $data->persona_apellido1);
            $this->db->bind(':persona_apellido2', $data->persona_apellido2);
            $this->db->bind(':tipo_persona_codigo', intval($data->tipo_persona_codigo));
            $this->db->bind(':tipo_documento_codigo', intval($data->tipo_documento_codigo));
            $this->db->bind(':genero_codigo', intval($data->genero_codigo));
            $this->db->bind(':barrio_codigo', intval($data->barrio_codigo));
            if($this->db->execute()) {
                return true;
            } else {
                return false;
            }
        }

        public function Actualizar(Persona $data)
        {
            $this->db->query(
                "UPDATE persona
                SET
                    persona_nombre1=:persona_nombre1,
                    persona_nombre2=:persona_nombre2,
                    persona_apellido1=:persona_apellido1,
                    persona_apellido2=:persona_apellido2,
                    tipo_persona_codigo=:tipo_persona_codigo,
                    tipo_documento_codigo=:tipo_documento_codigo,
                    genero_codigo=:genero_codigo,
                    barrio_codigo=:barrio_codigo
                WHERE persona_codigo=:persona_codigo"
            );
            $this->db->bind(':persona_codigo', intval($data->persona_codigo));
            $this->db->bind(':persona_nombre1', $data->persona_nombre1);
            $this->db->bind(':persona_nombre2', $data->persona_nombre2);
            $this->db->bind(':persona_apellido1', $data->persona_apellido1);
            $this->db->bind(':persona_apellido2', $data->persona_apellido2);
            $this->db->bind(':tipo_persona_codigo', intval($data->tipo_persona_codigo));
            $this->db->bind(':tipo_documento_codigo', intval($data->tipo_documento_codigo));
            $this->db->bind(':genero_codigo', intval($data->genero_codigo));
            $this->db->bind(':barrio_codigo', intval($data->barrio_codigo));
            if($this->db->execute()) {
                return true;
            } else {
                return false;
            }
        }

        public function Eliminar($persona_codigo)
        {
            $this->db->query(
                "DELETE FROM persona
                WHERE persona_codigo=:persona_codigo"
            );
            $this->db->bind(':persona_codigo', intval($persona_codigo));
            if($this->db->execute()) {
                return true;
            } else {
                return false;
            }
        }
    }