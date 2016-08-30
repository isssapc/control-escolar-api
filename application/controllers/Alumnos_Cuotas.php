<?php

class Alumnos_Cuotas extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('alumno_cuota_model');
    }

    public function index_post() {
        $alumno_cuota = $this->post('alumno_cuota');
        $nuevo = $this->alumno_cuota_model->add_alumno_cuota($alumno_cuota);
        $this->response($nuevo);
    }

    public function index_get() {
        $alumno_cuota = $this->alumno_cuota_model->get_alumnos_cuotas();
        $this->response($alumno_cuota);
    }

    public function one_get($id_escuela, $id_curp) {
        $alumno_cuota = $this->alumno_cuota_model->get_alumno_cuota($id_escuela, $id_curp);
        $this->response($alumno_cuota);
    }

    public function remove_delete($id_escuela, $id_curp) {
        $nuevo = $this->alumno_cuota_model->del_usuario($id_escuela, $id_curp);
        $this->response($nuevo);
    }

    public function update_put($id_escuela, $id_curp) {
        $alumno_cuota = $this->post('usuario');
        $nuevo = $this->alumno_cuota_model->update_usuario($id_escuela, $id_curp);
        $this->response($nuevo);
    }
  

}
