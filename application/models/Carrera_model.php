<?php

class Carrera_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function get_carreras() {
        $sql = "SELECT *
                FROM carrera g
                ORDER BY g.escuela, g.carrera";

        $query = $this->db->query($sql);
        return $query->result_array();
    }

    public function get_carrera_by_email($value) {
        $sql = "SELECT u.* FROM carrera u WHERE email='$value' LIMIT 1";
        $query = $this->db->query($sql);
        return $query->row_array();
    }

    public function get_carrera($escuela, $carrera) {
        $sql = "SELECT *               
                FROM carrera 
                WHERE escuela='$escuela' and carrera='$carrera'
                LIMIT 1;";
        $query = $this->db->query($sql);
        return $query->row_array();
    }

    public function add_carrera($escuela, $carrera) {
        $this->db->insert('escuela', 'carrera', $escuela, $carrera);
        $id_carrera = $this->db->insert_id();

        $nuevo = $this->get_carrera($id_carrera);
        return $nuevo;
    }

    public function update_grupo($id_carrera, $carrera) {

        $where = "id_carrera = $id_carrera";
        $sql = $this->db->update_string('carrera', $carrera, $where);
        $this->db->query($sql);

        $datos = $this->get_grupo($id_carrera);
        return $datos;
    }

    public function del_carrera($id_carrera) {
        $sql = "DELETE FROM carrera WHERE id_carrera = $id_carrera LIMIT 1";
        $this->db->query($sql);
        $count = $this->db->affected_rows();
        return $count;
    }

}
