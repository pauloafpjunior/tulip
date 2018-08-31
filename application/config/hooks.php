<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$hook['post_controller_constructor'][] = array(
    "class"    => "Check_session",// any name of class that you want
    "function" => "validate",// a method of class
    "filename" => "Check_session.php",// where the class declared
    "filepath" => "hooks"// this is location inside application folder
);;