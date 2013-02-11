<?php
class Upload extends CI_Controller
{
   public function __construct()
   {
      parent::__construct();
	  $this->load->model(array('files_model','mkategori'));
      $this->load->database();
      $this->load->helper('url');
   }
 
 public function index()
   {
      $isi['isi']='form_upload';
	$this->load->view('template_admin',$isi);
	
   }
   
   
   function home(){
		$isi['isi']='tengah';
		$this->load->view('template_admin',$isi);
	}
	
  function view_doc(){
		$data['data_doc']=$this->files_model->tampil_data();
		$data['isi']='view_file';
		$this->load->view('template_admin',$data);
		
		//$this->load->view('Guest_view',$data);
	}
	
   public function upload_file()
{
   $status = "";
   $msg = "";
   $file_element_name = 'userfile';
 
   if (empty($_POST['title']))
   {
      $status = "error";
      $msg = "Please enter a title";
   }
 
   if ($status != "error")
   {
      $config['upload_path'] = 'upload';
      $config['allowed_types'] = 'gif|jpg|png|doc|txt';
      $config['max_size']  = 1024 * 8;
      $config['encrypt_name'] = TRUE;
 
      $this->load->library('upload', $config);
 
      if (!$this->upload->do_upload($file_element_name))
      {
         $status = 'error';
         $msg = $this->upload->display_errors('', '');
      }
      else
      {
         $data = $this->upload->data();
         $file_id = $this->files_model->insert_file($data['file_name'], $_POST['title']);
         if($file_id)
         {
            $status = "success";
            $msg = "File successfully uploaded";
         }
         else
         {
            unlink($data['full_path']);
            $status = "error";
            $msg = "Something went wrong when saving the file, please try again.";
         }
      }
      @unlink($_FILES[$file_element_name]);
   }
   echo json_encode(array('status' => $status, 'msg' => $msg));
}

public function files()
{
   $files = $this->files_model->get_files();
   $this->load->view('files', array('files' => $files));
}


public function delete_file($file_id)
{
   if ($this->files_model->delete_file($file_id))
   {
      $status = 'success';
      $msg = 'File successfully deleted';
   }
   else
   {
      $status = 'error';
      $msg = 'Something went wrong when deleteing the file, please try again';
   }
   echo json_encode(array('status' => $status, 'msg' => $msg));
   redirect('upload/view_doc');
}


	
}
?>