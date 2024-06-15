<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Identity_model extends CI_Model {

   public function getIdentity()
   {
      return $this->db->get('identity')->row();
   }

   public function uploadImage(){
      $config = [
         'upload_path'     => './images/favicon',
         'encrypt_name'    => TRUE,
         'allowed_types'   => 'jpg|jpeg|gif|png|JPG|PNG',
         'max_size'        => '1000',
         'max_width'       => 0,
         'max_height'      => 0,
         'overwrite'       => true,
         'file_ext_tolower'=> true
      ];

      $this->load->library('upload', $config);

      if(!$this->upload->do_upload('photo')){
         $data['error_string'] = 'Upload error: '.$this->upload->display_errors('',''); 
         exit();
      }
      return $this->upload->data('file_name');
   }

   public function deleteImage($fileName){
      if(file_exists("./images/favicon/$fileName")){
         unlink("./images/favicon/$fileName");
      }
   }

}

/* End of file Identity_model.php */
