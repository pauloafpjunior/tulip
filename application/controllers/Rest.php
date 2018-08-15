<?php
use Restserver\Libraries\REST_Controller;
defined('BASEPATH') OR exit('No direct script access allowed');
// This can be removed if you use __autoload() in config.php OR use Modular Extensions
/** @noinspection PhpIncludeInspection */
//To Solve File REST_Controller not found
require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

class Rest extends REST_Controller {
    public function organizations_get() {
        $query = $this->input->get('q');
        if (!$query) {
            $this->response($this->organizations_model->getAll(), 200);    
        } 
        $this->response($this->organizations_model->getAll($query), 200);    
    }

    public function bulletins_get() {
        $org_id = $this->input->get('org_id');
        if ($org_id && is_numeric($org_id)) {
            $this->response($this->bulletins_model->getAll($org_id), 200);
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