<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Check_session {
        public function validate() {
            $uri = $_SERVER['REQUEST_URI'];
            if (strpos($uri, 'private') !== true) {            
                return;
     
            } else {
                $session = $this->CI->session;
                if(!$session['user_id']) {
                    redirect("users/index");
                }
                return;
            }
        }
}