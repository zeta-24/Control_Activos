<?php
class auditoria extends CI_Controller{

	public function __construct() {
        parent::__construct();
        $this ->load->model('model_auditoria');
        $this ->load->model('model_login');
        $this->load->library(array('session','form_validation'));
        $this->load->helper(array('url','form'));
        $this->load->database('default');
     }

     
    public function obtenerSede(){
        $data['sedes'] = $this->model_auditoria->obtener_sede();
        $this->load->view('vistas/auditoria',$data);
    }

    public function obtenerEdificios(){
         $options = "";
        if($this->input->post('sede'))
        {
            $sede = $this->input->post('sede');
            $edificios = $this->model_auditoria->obtener_edificios($sede);
            $cont=0;
            if(!$edificios){
            ?>
                <option value="0">No hay edificios</option>
            <?php
            return;
            }
            ?>
                <option value="0">Seleccione un edificio</option>
            <?php
            foreach($edificios as $fila)
            {$cont++;
            ?>
                <option value="<?=$fila->id?>"><?=$fila->nombre?></option>
            <?php
            }      

        }
    }

     public function obtenerPisos(){
         $options = "";
        if($this->input->post('edificio'))
        {
            $edificio = $this->input->post('edificio');
            $pisos = $this->model_auditoria->obtener_pisos($edificio);
            $cont=0;
            if(!$pisos){
            ?>
                <option value="0">No hay pisos</option>
            <?php
                return;
            }
            ?>
                <option value="0">Seleccione un piso</option>
            <?php
            foreach($pisos as $fila)
            {$cont++;
            ?>
                <option value="<?=$fila->id?>"><?=$fila->nombre?></option>
            <?php
            }

        }
    }

     public function obtenerSalas(){
         $options = "";
        if($this->input->post('piso'))
        {
            $piso = $this->input->post('piso');
            $salas = $this->model_auditoria->obtener_salas($piso);
            $cont=0;
            if(!$salas){
            ?>
                <option value="0">No hay salas</option>

            <?php
                return;
            }
            ?>
             <option value="0">Seleccione una sala</option>
            <?php
            foreach($salas as $fila)
            {$cont++;
            ?>
                <option value="<?=$fila->id?>"><?=$fila->nombre?></option>
            <?php
            }

        }
    }


    public function prueba(){
        
        $this->load->view('vistas/prueba');
    }
    

	public function crear(){
		/*$data['sede'] = $_POST['slSedes'];
        $data['edificio'] = $_POST['slEdificios'];
        $data['piso'] = $_POST['slPisos'];
        $data['sala'] = $_POST['slSalas'];*/
        $data['estado'] = 0;
        $data['fecha'] = date('Y-m-d');;
        $data['comentario'] = null;
        $data['idUsuario'] = $this->session->userdata('idUser');
        $data['idSala'] = $_POST['slSalas'];
        $data['activos'] = $this->model_auditoria->crear_auditoria($data);
		$this->load->view('vistas/auditoria',$data);
	}

///////////////////////////////////////LOGIN////////////////////////////////////////
    public function principal(){
       if($this->session->userdata('is_logged_in')!=true){
            $data['user'] = $_POST['inputUsuario'];
            $data['pass'] = $_POST['inputPass'];
            $query = $this->model_login->login($data);

        
        if($query){ //Si el usuario fue validado correctamente
            $sedes = $this->model_auditoria->obtener_sede();
            foreach($query->result() as $row){
                $data = array(
                'username' => $data['user'],
                'is_logged_in' => true,
                'idUser' => $row->id,
                'sede' => $sedes
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
     else{
        $sedes = $this->model_auditoria->obtener_sede();
        $allSedes = array(
              'sede' => $sedes
            );
        $this->load->view('vistas/principal',$allSedes);
     }

    }
//////////////////////////////////////////////////////////////////////////////////

    public function eliminarAuditoria(/*$id*/){
        $id = $this->input->post('id');
        $this->model_auditoria->borrar_auditoria($id);
       // $this->load->view('vistas/principal');
        redirect(base_url().'index.php/auditoria/principal','refresh');
    }

    public function realizarAuditoria(){
        $datos = $this->input->post('TableData');
        $comentario = $this->input->post('comentarioAuditoria');
        $this->model_auditoria->reailizar_auditoria($datos,$comentario);
        redirect(base_url().'index.php/auditoria/principal','refresh');
    }

     public function guardarAuditoria(){
        $datos = $this->input->post('TableData');
        $comentario = $this->input->post('comentarioAuditoria');
        $this->model_auditoria->guardar_auditoria($datos,$comentario);
        redirect(base_url().'index.php/auditoria/principal','refresh');
    }

    public function historial(){
        $data['auditorias'] = $this->model_auditoria->obtener_auditorias();
        $this->load->view('vistas/historial',$data);
    }

    public function auditorias($id){
        $data['activos'] = $this->model_auditoria->obtener_activos($id);
        $this->load->view('vistas/auditoria_completa',$data);
    }

}