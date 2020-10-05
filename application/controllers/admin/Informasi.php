<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Informasi extends CI_Controller {


    public function __construct()
	{
		parent::__construct();
		$this->load->model('sa_model');

        $level=$this->session->userdata('role');
        $action='get';
        $access = $this->Master_model->cek_akses('crud_informasi',$level,$action);
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
    
    public function index(){
        $this->header();
        $data_text = $this->Master_model->master_get(['id'=>1], 'informasi_text');
        $data_file = $this->db->get('informasi_file')->result_array();
        $data_gambar = $this->db->get('informasi_gambar')->result_array();
        $this->load->view('informasi/informasi',
            [
                'data_text' => $data_text,
                'action_text' => base_url('admin/informasi/input_text'),
                'data_file' => $data_file,
                'action_file' => base_url('admin/informasi/input_file'),
                'data_gambar' => $data_gambar,
                'action_gambar' => base_url('admin/informasi/input_gambar'),
            ]
        );
        $this->footer();
        
    }

    public function input_text(){

        $level=$this->session->userdata('role');
        $action='post';
        $access = $this->Master_model->cek_akses('crud_informasi',$level,$action);
        if($access==0){
            $text = $this->alert->danger('You do not have access');
			$this->session->set_flashdata('message', $text);
			redirect("welcome/dashboard");
		}
        
        $input_text=$this->input->post('input_text',TRUE);    
        $this->Master_model->update_query(['id'=>1], ['text' =>$input_text], 'informasi_text');
        $text = $this->alert->success('Data successfully Added');
				$this->session->set_flashdata('message', $text);
        return redirect("admin/informasi");
    }


    public function input_file(){

        $level=$this->session->userdata('role');
        $action='post';
        $access = $this->Master_model->cek_akses('crud_informasi',$level,$action);
        if($access==0){
            $text = $this->alert->danger('You do not have access');
			$this->session->set_flashdata('message', $text);
			redirect("welcome/dashboard");
		}

        $config['upload_path']          = './assets/informasi/';
		$config['allowed_types']        = 'pdf';

		$this->load->library('upload', $config);
		if ( ! $this->upload->do_upload('file'))
		{
            $text = $this->alert->danger('Data failed Added');
				$this->session->set_flashdata('message', $text);
            return redirect("admin/informasi");
		}
		else
		{
            $data['nama_berkas'] = $this->upload->data("file_name");

			$data2 =array(
				"file" => $data['nama_berkas']
			);
            $this->Master_model->insert_query('informasi_file',$data2);
            $text = $this->alert->success('Data successfully Added');
				$this->session->set_flashdata('message', $text);
            return redirect("admin/informasi");

          }

}

public function hapus_file($id){
        $level=$this->session->userdata('role');
        $action='delete';
        $access = $this->Master_model->cek_akses('crud_informasi',$level,$action);
        if($access==0){
            $text = $this->alert->danger('You do not have access');
			$this->session->set_flashdata('message', $text);
			redirect("welcome/dashboard");
        }
        
    $data_file = $this->Master_model->master_get(['id'=>$id], 'informasi_file');
    $this->Master_model->delete_query(['id'=> $id],'informasi_file');
    unlink("./assets/informasi/$data_file->file");
    $text = $this->alert->warning('Data successfully Delete');
				$this->session->set_flashdata('message', $text);
    return redirect("admin/informasi");
}

public function input_gambar(){
        $level=$this->session->userdata('role');
        $action='post';
        $access = $this->Master_model->cek_akses('crud_informasi',$level,$action);
        if($access==0){
            $text = $this->alert->danger('You do not have access');
			$this->session->set_flashdata('message', $text);
			redirect("welcome/dashboard");
        }
        
        $config['upload_path']          = './assets/informasi/';
        $config['allowed_types']        = 'gif|jpg|png';
        
        $var_name=array('php','PHP','Php','pHP','Php','js','JS','Js','batch');
        $path_parts_skpi= pathinfo($_FILES["file"]["name"]);
        $extension = $path_parts_skpi['extension'];

        if(in_array($extension,$var_name)){
            $this->Master_model->insert_history('Upload','informasi_gambar',$extension);
            $text = $this->alert->warning('File Not allowed');
            $this->session->set_flashdata('message', $text);
            redirect('admin/Informasi');
        }

		$this->load->library('upload', $config);
		if ( ! $this->upload->do_upload('file'))
		{
            $text = $this->alert->danger('Data failed Added');
				$this->session->set_flashdata('message', $text);
            return redirect("admin/informasi");
		}
		else
		{
            $data['nama_berkas'] = $this->upload->data("file_name");

			$data2 =array(
				"file" => $data['nama_berkas']
			);
            $this->Master_model->insert_query('informasi_gambar',$data2);
            $text = $this->alert->success('Data successfully Added');
				$this->session->set_flashdata('message', $text);
            return redirect("admin/informasi");

          }
}

public function hapus_gambar($id){
        $level=$this->session->userdata('role');
        $action='delete';
        $access = $this->Master_model->cek_akses('crud_informasi',$level,$action);
        if($access==0){
            $text = $this->alert->danger('You do not have access');
			$this->session->set_flashdata('message', $text);
			redirect("welcome/dashboard");
        }
        
    $data_file = $this->Master_model->master_get(['id'=>$id], 'informasi_gambar');
    $this->Master_model->delete_query(['id'=> $id],'informasi_gambar');
    unlink("./assets/informasi/$data_file->file");
    $text = $this->alert->warning('Data successfully Delete');
				$this->session->set_flashdata('message', $text);
    return redirect("admin/informasi");
}

}