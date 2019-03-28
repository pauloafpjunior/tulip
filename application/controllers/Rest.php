<?php
use Restserver\Libraries\REST_Controller;
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

class Rest extends REST_Controller {

    public function __construct()
    {
        header('Access-Control-Allow-Origin: *');
        header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
        parent::__construct();
    }

    public function organizations_get() {
        $query = $this->input->get('q');
        if (!$query) {
            $this->response($this->organizations_model->getAll(), 200);    
        } 
        $this->response($this->organizations_model->getAll($query), 200);    
    }

    public function bulletins_get() {
        $query = $this->input->get('q');
        $org_id = $this->input->get('org_id');
        if ($org_id && is_numeric($org_id)) {
            if (!$query) {                
                $this->response($this->bulletins_model->getAll($org_id, true), 200);
            } else {
                $this->response($this->bulletins_model->search($org_id, $query), 200);
            }
        } else {
            $this->response([], 404);
        }
    }

    public function sections_get() {
        $bul_id = $this->input->get('bul_id');
        if ($bul_id && is_numeric($bul_id)) {
            $this->response($this->sections_model->getAll($bul_id), 200);
        } else {
            $this->response([], 404);
        }
    }

    
}