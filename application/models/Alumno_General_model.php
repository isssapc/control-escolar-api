<?php

class Alumno_General_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function get_alumno_general() {
        $sql = "SELECT *
                FROM alumno_general u
                ORDER BY u.escuela, u.curp, u.nombre, u.num_control, u.sexo, u.fecha_nac, u.tipo_sangre, u.enfermedad, u.escuela_def, u.estatus";

        $query = $this->db->query($sql);
        return $query->result_array();
    }

    public function get_alumno_general_by_email($value) {
        $sql = "SELECT u.* FROM alumno_general u WHERE email='$value' LIMIT 1";
        $query = $this->db->query($sql);
        return $query->row_array();
    }

    public function get_alumnos_generales($id_escuela, $id_curp) {
        $sql = "SELECT *               
                FROM alumno_general 
                WHERE escuela='$id_escuela' and curp='$id_curp'
                LIMIT 1;";
        $query = $this->db->query($sql);
        return $query->row_array();
    }

    public function add_alumno_general($escuela, $curp) {
        $this->db->insert('escuela', $escuela);
        //$id_escuela = $this->db->insert_id();

       // $nuevo = $this->get_escuela($id_escuela);
        return 'ok';
    }

    public function update_alumno_general($id_escuela, $escuela) {
        $where = "id_escuela = $id_escuela";
        $sql = $this->db->update_string('escuela', $escuela, $where);
        $this->db->query($sql);

        $datos = $this->get_alumno_general($id_escuela);
        return $datos;
    }

    public function del_alumno_general($id_escuela, $id_curp) {
        $sql = "DELETE FROM alumno_general WHERE escuela = $id_escuela and curp = $id_curp LIMIT 1";
        $this->db->query($sql);
        $count = $this->db->affected_rows();
        return $count;
    }

}
