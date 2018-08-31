<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Check_session {
        var $CI;
        public function __construct()
        {
            $this->CI =& get_instance(); 
        }

        public function validate() {
            $uri = $_SERVER['REQUEST_URI'];
            if (strpos($uri, 'private') !== false) {            
                if ($this->CI->session->has_userdata('user_id')) {
                    return;
                } else {
                    redirect('users/index');
                }                
            } else {
                return;
            }
        }
}