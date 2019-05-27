<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UangMuka_M extends CI_Model {

    var $API = "";
    var  $headers = array('X-Nim :1701988');

    function __construct() {
		parent::__construct();
		$this->API="https://api.akhmad.id/uaspromnet/uangmuka";
	}

    public function get()
    {
        $this->curl->option(CURLOPT_HTTPHEADER, $this->headers);
        $data = json_decode($this->curl->simple_get($this->API))->data;

        return $data;
    }
    
}

?>