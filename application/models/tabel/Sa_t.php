<?php
class Sa_t extends CI_Model{//baku
	function __construct()
	{
        parent::__construct();
        $this->load->library('Master_lib');
    }

    function manage_user()
    {
            $data_detail=array(
                'link_json'=>base_url('admin/user/json_manage_user'),
                'header'=>'User List',
                'tabel_detail'=>'User List',

                'button_name'=>'Tambah User',
                'button_action_link'=>base_url('admin/user/user_add/'),
                'button_icon'=>'fa fa-plus',
            );

            $data_isi=array(
                [
                    'code_nama'=>'username',
                    'nama'=>'Username',
                    'orderable'=>'1',
                ],
                [
                    'code_nama'=>'last_login',
                    'nama'=>'Last Login',
                    'orderable'=>'1',
                ],
                [
                    'code_nama'=>'role',
                    'nama'=>'Role',
                    'orderable'=>'1',
                ],
                [
                    'code_nama'=>'user_status',
                    'nama'=>'Status',
                    'orderable'=>'1',
                ],
                [
                    'code_nama'=>'action',
                    'nama'=>'Action',
                    'orderable'=>'0',
                ],
            );

            
		$data_isi=$this->master_lib->master_list($data_isi);
     
        $data_kirim=array(
			'data_isi'=>$data_isi,
			'data_detail'=>$data_detail,
        );
        return $data_kirim;
    }

    function user_list()
    {
            $data_detail=array(
                'link_json'=>base_url('admin/user/json_user_list'),
                'header'=>'User List',
                'tabel_detail'=>'User List',
            );

            $data_isi=array(
                [
                    'code_nama'=>'username',
                    'nama'=>'Username',
                    'orderable'=>'1',
                ],
                [
                    'code_nama'=>'last_login',
                    'nama'=>'Last Login',
                    'orderable'=>'1',
                ],
                [
                    'code_nama'=>'role',
                    'nama'=>'Role',
                    'orderable'=>'1',
                ],
                [
                    'code_nama'=>'user_status',
                    'nama'=>'Status',
                    'orderable'=>'1',
                ],
            );

            
		$data_isi=$this->master_lib->master_list($data_isi);
     
        $data_kirim=array(
			'data_isi'=>$data_isi,
			'data_detail'=>$data_detail,
        );
        return $data_kirim;
    }
    
    function user_log_login($username)
    {
            $data_detail=array(
                'link_json'=>base_url('admin/user/json_user_log_login/'.$username),
                'header'=>'User List',
                'tabel_detail'=>'User List',

                'button_name2'=>'List User',
                'button_action_link2'=>base_url('admin/user/manage_user'),
                'button_icon2'=>'fa fa-arrow-left',
            );

            $data_isi=array(
                [
                    'code_nama'=>'tabel',
                    'nama'=>'Info',
                    'orderable'=>'1',
                ],
                [
                    'code_nama'=>'detail_user',
                    'nama'=>'Detail Login',
                    'orderable'=>'1',
                ],
            );

            
		$data_isi=$this->master_lib->master_list($data_isi);
     
        $data_kirim=array(
			'data_isi'=>$data_isi,
			'data_detail'=>$data_detail,
        );
        return $data_kirim;
    }

}