<?php

class Alumno_Personal_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function get_alumno_personal() {
        $sql = "SELECT *
                FROM alumno_personal u
                ORDER BY u.curp";

        $query = $this->db->query($sql);
        return $query->result_array();
    }

    public function get_alumno_personal_by_email($value) {
        $sql = "SELECT u.* FROM alumno_personal u WHERE email='$value' LIMIT 1";
        $query = $this->db->query($sql);
        return $query->row_array();
    }

    public function get_alumnos_personales($id_curp) {
        $sql = "SELECT *               
                FROM alumno_personal 
                WHERE curp='$id_curp'
                LIMIT 1;";
        $query = $this->db->query($sql);
        return $query->row_array();
    }

    public function add_alumno_personal($curp) {
        $this->db->insert('alumno_personal', $alumno_personal);
        //$id_escuela = $this->db->insert_id();

       // $nuevo = $this->get_escuela($id_escuela);
        return 'ok';
    }

    public function update_alumno_personal($curp) {
        $where = "id_curp = $id_curp";
        $sql = $this->db->update_string('curp', $curp, $where);
        $this->db->query($sql);

        $datos = $this->get_alumno_personal($id_curp);
        return $datos;
    }

    public function del_alumno_personal($id_curp) {
        $sql = "DELETE FROM alumno_personal WHERE curp = $id_curp LIMIT 1";
        $this->db->query($sql);
        $count = $this->db->affected_rows();
        return $count;
    }

}
