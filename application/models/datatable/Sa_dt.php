<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sa_dt extends CI_Model {

    function __construct()
	{
        parent::__construct();
        $this->load->library('datatables');
    }

    function json_manage_user()
	{
        $this->datatables->select('username, password, last_login, create_at, update_at, role, user_status');
        $this->datatables->from('user');
        $this->datatables->like('user_status',$this->session->userdata('user_filter')['user_status']);
        $this->datatables->like('role',$this->session->userdata('user_filter')['role']);
        $this->datatables->add_column('action',
		anchor(
			site_url('admin/user/user_log_login/$1'),'<i class="fa fa-eye"></i>','data-toggle="tooltip" data-html="true" title="History Login" class="btn btn-success"').' '.
		anchor(
			site_url('admin/user/user_delete/$1'),'<i class="fa fa-trash"></i>','data-toggle="tooltip" data-html="true" title="Delete User" class="btn btn-danger" onclick="javasciprt: return confirm(\'Are You Sure Copy $1 ? all your data will be deleted \')"').' '.
        anchor(
			site_url('admin/user/user_update/$1'),'<i class="fa fa-pencil"></i>','data-toggle="tooltip" data-html="true" title="Update" class="btn btn-warning"')
			
		, 'username');
        
        return $this->datatables->generate();
    }

    function json_user_log_login($username)
	{
        $this->datatables->select('tabel,detail_user');
        $this->datatables->from('histori_');
        $this->datatables->where('user_id',$username);
        $this->datatables->where('tabel','log_login');
        
        return $this->datatables->generate();
    }

}