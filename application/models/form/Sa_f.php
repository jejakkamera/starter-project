<?php
class Sa_f extends CI_Model{//baku
	function __construct()
	{
		parent::__construct();
        // $this->db = $this->load->database('default', TRUE);
        // $this->nmdb =$this->db1->database;

    }

function manage_user_filter()
    {
        $form_detail=array(
                'action'=> base_url('admin/user/manage_user_filter'),
                'form_detail'=>'User Data Filter',
        );

        $data_isi=array(
            [
                'kode_form'=>'user_status',
                'nama_form'=>'Status',
                'tipe'=>'select',
                'select_data'=>[
                    ['id'=>'enable','value'=>'Enable'],
                    ['id'=>'disable','value'=>'Disable'],
                ],
                'placeholder'=>'live',
                'required'=>'1',
                'readonly'=>'0',
            ],
            [
                'kode_form'=>'role',
                'nama_form'=>'Role',
                'tipe'=>'select',
                'select_data'=>[
                    ['id'=>'s_a','value'=>'Super Admin'],
                    ['id'=>'staff','value'=>'Staff'],
                    ['id'=>'report','value'=>'Report'],
                ],
                'placeholder'=>'live',
                'required'=>'1',
                'readonly'=>'0',
            ],
           
        );

        $data=[
            'form_detail'=>$form_detail,
            'data_isi'=>$data_isi,
        ];
        
        return $data;
    }

function user_add()
    {
        $form_detail=array(
                'action'=> base_url('admin/user/user_add_action'),
                'form_detail'=>'User Data Filter',
        );

        $data_isi=array(
            [
                'kode_form'=>'username',
                'nama_form'=>'Username',
                'tipe'=>'text',
                'placeholder'=>'keuangan_nama',
                'required'=>'1',
                'readonly'=>'0',
            ],
            [
                'kode_form'=>'password',
                'nama_form'=>'Password',
                'tipe'=>'password',
                'placeholder'=>'',
                'required'=>'1',
                'readonly'=>'0',
            ],
            [
                'kode_form'=>'user_status',
                'nama_form'=>'Status',
                'tipe'=>'select',
                'select_data'=>[
                    ['id'=>'enable','value'=>'Enable'],
                    ['id'=>'disable','value'=>'Disable'],
                ],
                'placeholder'=>'live',
                'required'=>'1',
                'readonly'=>'0',
            ],
            [
                'kode_form'=>'role',
                'nama_form'=>'Role',
                'tipe'=>'select',
                'select_data'=>[
                    ['id'=>'s_a','value'=>'Super Admin'],
                    ['id'=>'staff','value'=>'Staff'],
                    ['id'=>'report','value'=>'Report'],
                ],
                'placeholder'=>'live',
                'required'=>'1',
                'readonly'=>'0',
            ],
           
        );

        $data=[
            'form_detail'=>$form_detail,
            'data_isi'=>$data_isi,
        ];
        
        return $data;
    }

function user_update($username)
    {
        $form_detail=array(
                'action'=> base_url('admin/user/user_update_action/'.$username),
                'form_detail'=>'User Data Filter',
        );

        $data_isi=array(
            [
                'kode_form'=>'username',
                'nama_form'=>'Username',
                'tipe'=>'text',
                'placeholder'=>'keuangan_nama',
                'required'=>'1',
                'readonly'=>'0',
            ],
            [
                'kode_form'=>'password',
                'nama_form'=>'Password',
                'tipe'=>'password',
                'placeholder'=>'',
                'required'=>'1',
                'readonly'=>'0',
            ],
            [
                'kode_form'=>'user_status',
                'nama_form'=>'Status',
                'tipe'=>'select',
                'select_data'=>[
                    ['id'=>'enable','value'=>'Enable'],
                    ['id'=>'disable','value'=>'Disable'],
                ],
                'placeholder'=>'live',
                'required'=>'1',
                'readonly'=>'0',
            ],
            [
                'kode_form'=>'role',
                'nama_form'=>'Role',
                'tipe'=>'select',
                'select_data'=>[
                    ['id'=>'s_a','value'=>'Super Admin'],
                    ['id'=>'staff','value'=>'Staff'],
                    ['id'=>'report','value'=>'Report'],
                ],
                'placeholder'=>'live',
                'required'=>'1',
                'readonly'=>'0',
            ],
           
        );

        $data=[
            'form_detail'=>$form_detail,
            'data_isi'=>$data_isi,
        ];
        
        return $data;
    }
}