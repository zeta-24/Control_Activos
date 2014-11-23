<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class model_login extends CI_Model{

	function model_login() {
 		parent::__construct(); //llamada al constructor de Model.
 	}

 	function login($data){
		$this->db->where('usuario',$data['user']);
		$this->db->where('pass',$data['pass']);
		$query = $this->db->get('usuario');

		if($query->num_rows()==1){
			return $query;
		}
		else{
			$this->session->set_flashdata('usuario_incorrecto','Los datos introducidos son incorrectos');
            redirect(base_url().'index.php/ctrLogin/login','refresh');
		}
		
	}

	function valid_user_ajax($username){ 
           
    $this->db->where('usuario', $username);
    $query = $this->db->get('usuario');
         
         if($query->num_rows() ==1){
               
             echo $query->num_rows();
             
             }
  }

 }