<?php

class Grupo_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function get_grupos() {
        $sql = "SELECT *
                FROM grupo g
                ORDER BY g.escuela, g.carrera, g.turno, g.semestre, g.grupo";

        $query = $this->db->query($sql);
        return $query->result_array();
    }

    public function get_grupo_by_email($value) {
        $sql = "SELECT u.* FROM grupo u WHERE email='$value' LIMIT 1";
        $query = $this->db->query($sql);
        return $query->row_array();
    }

    public function get_grupo($escuela, $carrera, $turno, $semestre, $grupo) {
        $sql = "SELECT *               
                FROM grupo 
                WHERE escuela='$escuela' and carrera='$carrera' and turno='$turno' and semestre='$semestre' and grupo='$grupo'
                LIMIT 1;";
        $query = $this->db->query($sql);
        return $query->row_array();
    }

    public function add_grupo($grupo) {
        $this->db->insert('grupo', $grupo);
        $id_grupo = $this->db->insert_id();

        $nuevo = $this->get_grupo($id_grupo);
        return $nuevo;
    }

    public function update_grupo($id_grupo, $grupo) {

        $where = "id_grupo = $id_grupo";
        $sql = $this->db->update_string('grupo', $grupo, $where);
        $this->db->query($sql);

        $datos = $this->get_grupo($id_grupo);
        return $datos;
    }

    public function del_grupo($id_grupo) {
        $sql = "DELETE FROM grupo WHERE id_grupo = $id_grupo LIMIT 1";
        $this->db->query($sql);
        $count = $this->db->affected_rows();
        return $count;
    }

}
