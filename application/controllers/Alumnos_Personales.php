<?php

class Alumnos_Personales extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('alumno_personal_model');
    }

    public function index_post() {
        $alumno_personal = $this->post('alumno_personal');
        $nuevo = $this->alumno_personal_model->add_alumno_personal($alumno_personal);
        $this->response($nuevo);
    }

    public function index_get() {
        $alumno_personal = $this->alumno_personal_model->get_alumno_personal();
        $this->response($alumno_personal);
    }

    public function one_get($id_curp) {
        $alumno_personal = $this->alumno_personal_model->get_alumnos_personales($id_curp);
        $this->response($alumno_personal);
    }

    public function remove_delete($id_curp) {
        $nuevo = $this->alumno_personal_model->del_usuario($id_curp);
        $this->response($nuevo);
    }

    public function update_put($id_curp) {
        $alumno_personal = $this->post('usuario');
        $nuevo = $this->alumno_personal_model->update_usuario($id_curp);
        $this->response($nuevo);
    }
  

}
