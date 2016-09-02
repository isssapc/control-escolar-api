<?php

class Carreras extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('grupo_model');
    }

    public function index_post() {
        $carrera = $this->post('carrera');
        $nuevo = $this->grupo_model->add_carrera($carrera);
        $this->response($nuevo);
    }

    public function index_get() {
        $carreras = $this->grupo_model->get_carreras();
        $this->response($grupos);
    }

    public function one_get($escuela, $carrera) {
        $dcarrera = $this->grupo_model->get_carrera($escuela, $carrera);
        $this->response($dgrupo);
    }

    public function remove_delete($id_carrera) {
        $nuevo = $this->grupo_model->del_carrera($id_carrera);
        $this->response($nuevo);
    }

    public function update_put($id_carrera) {
        $carrera = $this->post('carrera');
        $nuevo = $this->grupo_model->update_carrera($id_carrera, $carrera);
        $this->response($nuevo);
    }

    public function hola_get() {
        $sql = "SELECT u.* FROM carrera u";
        $query = $this->db->query($sql);
        $this->response($query->result_array());
    }

}
