<?php

class Estatus_Escolar_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function get_estatus_escolar() {
        $sql = "SELECT *
                FROM alumno_escuela u
                ORDER BY u.escuela, u.curp";

        $query = $this->db->query($sql);
        return $query->result_array();
    }

    public function get_estatus_escolar_by_email($value) {
        $sql = "SELECT u.* FROM estatus_escolar u WHERE email='$value' LIMIT 1";
        $query = $this->db->query($sql);
        return $query->row_array();
    }

    public function get_alumnos_personales($id_curp) {
        $sql = "SELECT *               
                FROM estatus_escolar 
                WHERE curp='$id_curp'
                LIMIT 1;";
        $query = $this->db->query($sql);
        return $query->row_array();
    }

    public function add_estatus_escolar($curp) {
        $this->db->insert('estatus_escolar', $estatus_escolar);
        //$id_escuela = $this->db->insert_id();

       // $nuevo = $this->get_escuela($id_escuela);
        return 'ok';
    }

    public function update_estatus_escolar($curp) {
        $where = "id_curp = $id_curp";
        $sql = $this->db->update_string('curp', $curp, $where);
        $this->db->query($sql);

        $datos = $this->get_estatus_escolar($id_curp);
        return $datos;
    }

    public function del_estatus_escolar($id_curp) {
        $sql = "DELETE FROM estatus_escolar WHERE curp = $id_curp LIMIT 1";
        $this->db->query($sql);
        $count = $this->db->affected_rows();
        return $count;
    }

}
