<?php

class Escuelas extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('escuela_model');
    }

    public function index_post() {
        $escuela = $this->post('escuela');
        $nuevo = $this->escuela_model->add_escuela($escuela);
        $this->response($nuevo);
    }

    public function index_get() {
        $escuela = $this->escuela_model->get_escuelas();
        $this->response($escuela);
    }

    public function one_get($id_escuela) {
        $escuela = $this->escuela_model->get_escuela($id_escuela);
        $this->response(["Resultado"=>$escuela, "saludo"=>"hola"]);
    }

    public function remove_delete($id_escuela) {
        $nuevo = $this->escuela_model->del_usuario($id_escuela);
        $this->response($nuevo);
    }

    public function update_put($id_escuela) {
        $escuela = $this->put('escuela');
        $nuevo = $this->escuela_model->update_escuela($id_escuela, $escuela);
        $this->response($nuevo);
    }
  

}
