<?php

class Estatus_Escolar extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('alumnos/estatus_escolar_model');
    }

    public function index_post() {
        $estatus_escolar = $this->post('estatus_escolar');
        $nuevo = $this->estatus_escolar_model->add_estatus_escolar($estatus_escolar);
        $this->response($nuevo);
    }

    public function index_get() {
        $estatus_escolar = $this->estatus_escolar_model->get_estatus_escolar();
        $this->response($estatus_escolar);
    }

    public function one_get($id_curp) {
        $estatus_escolar = $this->estatus_escolar_model->get_alumnos_personales($id_curp);
        $this->response($estatus_escolar);
    }

    public function remove_delete($id_curp) {
        $nuevo = $this->estatus_escolar_model->del_usuario($id_curp);
        $this->response($nuevo);
    }

    public function update_put($id_curp) {
        $estatus_escolar = $this->post('usuario');
        $nuevo = $this->estatus_escolar_model->update_usuario($id_curp);
        $this->response($nuevo);
    }
  

}
