<?php
class ctrLogin extends CI_Controller{

	 public function __construct() {
        parent::__construct();
        $this ->load->model('model_login');
        $this->load->library(array('session','form_validation'));
        $this->load->helper(array('url','form'));
        $this->load->database('default');
     }

	public function login(){
		$this->session->unset_userdata('is_logged_in');
		$this->load->view('vistas/login');
	}

	public function principal(){
		$data['user'] = $_POST['inputUsuario'];
     	$data['pass'] = $_POST['inputPass'];
     	$query = $this->model_login->login($data);
     	if($query){ //Si el usuario fue validado correctamente

			foreach($query->result() as $row){
				$data = array(
				'username' => $data['user'],
				'is_logged_in' => true,
				'idUser' => $row->id
				);
			$this->session->set_userdata($data);
			$this->load->view('vistas/principal',$data);
			}
		}
		else{
			$msjValidate['msjValidate']=1;
			$this->load->view('vistas/login',$msjValidate);
		}

	}

	public function historial(){
		$this->load->view('vistas/historial');
	}

}