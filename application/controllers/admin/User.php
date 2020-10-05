<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

    public function __construct()
	{
		parent::__construct();
        $this->load->model('Sa_model');

        $level=$this->session->userdata('role');
        $action='get';
        $access = $this->Master_model->cek_akses('set_user',$level,$action);
        if($access==0){
            $text = $this->alert->danger('You do not have access');
			$this->session->set_flashdata('message', $text);
			redirect("welcome/dashboard");
		}
	}

	public function header(){
		if($this->session->userdata('isLogin')==TRUE){
			$this->load->view('master/header');
		}else{
			redirect('/welcome/login', 'refresh');
		}
		
	}

	public function footer(){
			$this->load->view('master/footer');
	}
	
	public function manage_user()
	{
        $this->load->model('tabel/Sa_t', 'sa_tabel');
        $data_master=$this->sa_tabel->manage_user();

        //print_r($data_master);
        $this->header();

        $this->load->view('master/master_list',
            [
                'data_detail'=>$data_master['data_detail'],
                'data_isi'=>$data_master['data_isi'],
            ]
        );
        $this->load->model('form/Sa_f', 'sa_form');

		$data_master=$this->sa_form->manage_user_filter();
		
		$this->load->view('master/master_filter',
			[
				'data_detail'=>$data_master['form_detail'],
				'data_isi'=>$data_master['data_isi'],
				'data_filter'=>$this->session->userdata('user_filter')['role'].",".$this->session->userdata('user_filter')['user_status'],
				// 'data_master'=>$data_masters,
            ]);
            
        $this->footer();
		
    }

	public function index()
	{
        $this->load->model('tabel/Sa_t', 'sa_tabel');
        $data_master=$this->sa_tabel->user_list();

        //print_r($data_master);
        $this->header();
        $this->load->view('master/master_list',
            [
                'data_detail'=>$data_master['data_detail'],
                'data_isi'=>$data_master['data_isi'],
            ]
        );
		$this->footer();
    }

	public function user_log_login($username)
	{
        $this->load->model('tabel/Sa_t', 'sa_tabel');
        $data_master=$this->sa_tabel->user_log_login($username);

        //print_r($data_master);
        $this->header();
        $this->load->view('master/master_list',
            [
                'data_detail'=>$data_master['data_detail'],
                'data_isi'=>$data_master['data_isi'],
            ]
        );
		$this->footer();
    }

    public function user_delete($username){
        $this->Master_model->delete_query(['username' => $username],'user');
        $text = $this->alert->success('success Hapus Data User');
        $this->session->set_flashdata('message', $text);
        redirect('admin/user/manage_user');
    }

    public function json_user_list(){
       
        $this->load->model('datatable/Master_dt', 'Master_dt');
        
        header('Content-Type: application/json');
        echo $this->Master_dt->json_master('user');
    
    }

    public function json_user_log_login($username){
       
        $this->load->model('datatable/Sa_dt', 'sa_dt');
        
        header('Content-Type: application/json');
        echo $this->sa_dt->json_user_log_login($username);
    
    }

    public function json_manage_user(){
       
        $this->load->model('datatable/Sa_dt', 'sa_dt');
        
        header('Content-Type: application/json');
        echo $this->sa_dt->json_manage_user();
    
    }

    public function user_update($username)
	{
        $this->load->model('form/Sa_f', 'sa_form');

        $data_master=$this->sa_form->user_update($username);
        $data_masters=get_object_vars($this->Master_model->master_get(['username' => $username],'user'));

		$this->header();
        $this->load->view('master/master_form',
            [
                'data_detail'=>$data_master['form_detail'],
                'data_isi'=>$data_master['data_isi'],
                'data_master'=>$data_masters,
                'status'=>'update',
            ]
        );
		$this->footer();
    }

    public function user_update_action($username){
        $this->form_validation->set_rules('username','username','xss_clean');
        $this->form_validation->set_rules('password','password','xss_clean');
		$this->form_validation->set_rules('user_status','user_status','xss_clean');
        $this->form_validation->set_rules('role','role','xss_clean');
        if(($this->form_validation->run() == TRUE)){
            $cek_=$this->Master_model->master_get(['username'=>$this->input->post('username',TRUE)],'user');
            if($cek_){
                $data = array(
                    'username' => $this->input->post('username',TRUE),
                    //'password' => md5($this->input->post('password',TRUE)),
                    'user_status' => $this->input->post('user_status',TRUE),
                    'role' => $this->input->post('role',TRUE),
                    'update_at' => date('Y-m-d H:i:s'),
                );
                if($cek_->password != $this->input->post('password',TRUE)){
                    $data['password']=md5($this->input->post('password',TRUE));
                }
                $this->Master_model->insert_history('Update','user',json_encode($data));
                $this->Master_model->update_query(['username'=>$username], $data, 'user');
                $text = $this->alert->success('success Update : user');
                $this->session->set_flashdata('message', $text);
                redirect("admin/user/manage_user");

            }else{
                $text = $this->alert->warning('Username not found');
		        $this->session->set_flashdata('message', $text);
		        redirect("admin/user/user_add");
            }

        }else{
			$this->user_update($username);
		}
    }

    public function user_add_action(){
        $this->form_validation->set_rules('username','username','xss_clean');
        $this->form_validation->set_rules('password','password','xss_clean');
		$this->form_validation->set_rules('user_status','user_status','xss_clean');
		$this->form_validation->set_rules('role','role','xss_clean');
		if(($this->form_validation->run() == TRUE)){
            $cek_=$this->Master_model->master_get(['username'=>$this->input->post('username',TRUE)],'user');
            if($cek_){
                $text = $this->alert->warning('Duplicate username');
		        $this->session->set_flashdata('message', $text);
		        redirect("admin/user/user_add");
            }
            $data = array(
				'username' => $this->input->post('username',TRUE),
				'password' => md5($this->input->post('password',TRUE)),
				'user_status' => $this->input->post('user_status',TRUE),
				'role' => $this->input->post('role',TRUE),
				'create_at' => date('Y-m-d H:i:s'),
            );
        $this->Master_model->insert_history('Insert','user',json_encode($data));
		$this->Master_model->insert_query('user',$data);
		$text = $this->alert->success('success add : user');
		$this->session->set_flashdata('message', $text);
		redirect("admin/user/manage_user");

		}else{
			$this->user_add();
		}
    }

    public function user_add(){
        $this->load->model('form/Sa_f', 'sa_form');
		$data_master=$this->sa_form->user_add();
		$this->header();
        $this->load->view('master/master_form',
            [
                'data_detail'=>$data_master['form_detail'],
                'data_isi'=>$data_master['data_isi'],
                'status'=>'',
            ]
        );
		$this->footer();
    }

    public function manage_user_filter(){
        $role=$this->input->post('role',TRUE);
		$user_status=$this->input->post('user_status',TRUE);
		$this->session->set_userdata(
			array(
				'user_filter' => array(
					'user_status'=>$user_status,	
					'role'=>$role,	
				)
			)
		);
		redirect('admin/user/manage_user', 'refresh');
    }

}
