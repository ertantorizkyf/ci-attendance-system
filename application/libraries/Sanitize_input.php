<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sanitize_input {

	public function string_sanitize($string){
    return ucwords(strtolower($string));
	}

  public function phone_sanitize($phone){
    return str_replace(array(' ', '(', ')' ,'-', '+'),'', trim($phone));
	}

}
?>
