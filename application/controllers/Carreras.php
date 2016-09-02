<?php

class Grupos extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('grupo_model');
    }

    public function index_post() {
        $grupo = $this->post('grupo');
        $nuevo = $this->grupo_model->add_grupo($grupo);
        $this->response($nuevo);
    }

    public function index_get() {
        $grupos = $this->grupo_model->get_grupos();
        $this->response($grupos);
    }

    public function one_get($escuela, $carrera, $turno, $semestre, $grupo) {
        $dgrupo = $this->grupo_model->get_grupo($escuela, $carrera, $turno, $semestre, $grupo);
        $this->response($dgrupo);
    }

    public function remove_delete($id_grupo) {
        $nuevo = $this->grupo_model->del_grupo($id_grupo);
        $this->response($nuevo);
    }

    public function update_put($id_grupo) {
        $grupo = $this->post('grupo');
        $nuevo = $this->grupo_model->update_grupo($id_grupo, $grupo);
        $this->response($nuevo);
    }

    public function hola_get() {
        $sql = "SELECT u.* FROM grupo u";
        $query = $this->db->query($sql);
        $this->response($query->result_array());
    }

}
