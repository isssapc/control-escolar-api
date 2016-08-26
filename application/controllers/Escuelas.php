<?php

class Escuelas extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('escuela_model');
    }

    public function index_post() {
        $escuela = $this->post('usuario');
        $nuevo = $this->escuela_model->add_usuario($escuela);
        $this->response($nuevo);
    }

    public function index_get() {
        $nuevo = $this->escuela_model->get_usuarios();
        $this->response($nuevo);
    }

    public function one_get($id_escuela) {
        $escuela = $this->escuela_model->get_usuario($id_escuela);
        $this->response($escuela);
    }

    public function remove_delete($id_escuela) {
        $nuevo = $this->escuela_model->del_usuario($id_escuela);
        $this->response($nuevo);
    }

    public function update_put($id_escuela) {
        $escuela = $this->post('usuario');
        $nuevo = $this->escuela_model->update_usuario($id_escuela, $escuela);
        $this->response($nuevo);
    }
  

}
