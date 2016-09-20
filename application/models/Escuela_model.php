<?php

class Escuela_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function get_escuelas() {
        $sql = "SELECT *
                FROM escuela u
                ORDER BY u.nombre_escuela";

        $query = $this->db->query($sql);
        return $query->result_array();
    }

    public function get_escuela_by_email($value) {
        $sql = "SELECT u.* FROM escuela u WHERE email='$value' LIMIT 1";
        $query = $this->db->query($sql);
        return $query->row_array();
    }

    public function get_escuela($id_escuela) {
        $sql = "SELECT *               
                FROM escuela 
                WHERE escuela='$id_escuela'
                LIMIT 1;";
        $query = $this->db->query($sql);
        return $query->row_array();
    }

    public function add_escuela($escuela) {
        $this->db->insert('escuela', $escuela);
        //$id_escuela = $this->db->insert_id();
        // $nuevo = $this->get_escuela($id_escuela);
        return 'ok';
    }

    public function update_escuela($id_escuela, $escuela) {

        $where = "escuela = '$id_escuela'";
        $sql = $this->db->update_string('escuela', $escuela, $where);
        $this->db->query($sql);

        $datos = $this->get_escuela($id_escuela);
        return $datos;
    }

    public function del_escuela($id_escuela) {
        $sql = "DELETE FROM escuela WHERE escuela = '$id_escuela' LIMIT 1";
        $this->db->query($sql);
        $count = $this->db->affected_rows();
        return $count;
    }

}
