<?php

class Alumnos_Generales extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('alumno_general_model');
    }

    public function index_post() {
        $alumno_general = $this->post('alumno_general');
        $nuevo = $this->alumno_general_model->add_alumno_general($alumno_general);
        $this->response($nuevo);
    }

    public function index_get() {
        $alumno_general = $this->alumno_general_model->get_alumno_general();
        $this->response($alumno_general);
    }

    public function one_get($id_escuela, $id_curp) {
        $alumno_general = $this->alumno_general_model->get_alumnos_generales($id_escuela, $id_curp);
        $this->response($alumno_general);
    }

    public function remove_delete($id_escuela, $id_curp) {
        $nuevo = $this->alumno_general_model->del_usuario($id_escuela, $id_curp);
        $this->response($nuevo);
    }

    public function update_put($id_escuela, $id_curp) {
        $escuela = $this->post('usuario');
        $nuevo = $this->alumno_general_model->update_usuario($id_escuela, $id_curp);
        $this->response($nuevo);
    }
  

}
