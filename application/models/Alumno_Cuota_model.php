<?php

class Alumno_Cuota_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function get_alumnos_cuotas() {
        $sql = "SELECT *
                FROM alumno_cuota u
                ORDER BY u.escuela, u.curp";

        $query = $this->db->query($sql);
        return $query->result_array();
    }

    public function get_alumno_cuota_by_email($value) {
        $sql = "SELECT u.* FROM alumno_cuota u WHERE email='$value' LIMIT 1";
        $query = $this->db->query($sql);
        return $query->row_array();
    }

    public function get_alumno_cuota($id_escuela, $id_curp) {
        $sql = "SELECT *               
                FROM alumno_cuota 
                WHERE escuela='$id_escuela' and curp='$id_curp'
                LIMIT 1;";
        $query = $this->db->query($sql);
        return $query->row_array();
    }

    public function add_alumno_cuota($escuela, $curp) {
        $this->db->insert('alumno_cuota', $alumno_cuota);
        //$id_escuela = $this->db->insert_id();

       // $nuevo = $this->get_escuela($id_escuela);
        return 'ok';
    }

    public function update_alumno_cuota($escuela, $curp) {
        $where = "id_escuela = $id_escuela and id_curp = $id_curp";
        $sql = $this->db->update_string('escuela', 'curp', $escuela, $curp, $where);
        $this->db->query($sql);

        $datos = $this->get_alumno_cuota($id_escuela, $id_curp);
        return $datos;
    }

    public function del_alumno_cuota($id_escuela, $id_curp) {
        $sql = "DELETE FROM alumno_cuota WHERE escuela = $id_escuela and curp = $id_curp LIMIT 1";
        $this->db->query($sql);
        $count = $this->db->affected_rows();
        return $count;
    }

}
