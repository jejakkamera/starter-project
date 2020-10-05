<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Master_dt extends CI_Model {

    function __construct()
	{
        parent::__construct();
        $this->load->library('datatables');
    }

    function json_master($tabel)
	{
        $data = $this->db->list_fields($tabel);
        $coloum = implode(",",$data);

        $this->datatables->select($coloum);
		$this->datatables->from($tabel);
        return $this->datatables->generate();
    }

    

}
