<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class model_auditoria extends CI_Model{

	function model_auditoria() {
 		parent::__construct(); //llamada al constructor de Model.
          $this->load->helper('date');
 	}
 

     function obtener_sede(){
     	$sedes = $this->db->get('sede');
     	return $sedes->result();
     }

     function obtener_edificios($id){
		$this->db->where('idSede',$id);
     	$edificios = $this->db->get('edificio');
     	return $edificios->result();
     }

      function obtener_pisos($id){
		$this->db->where('idEdificio',$id);
     	$pisos = $this->db->get('piso');
     	return $pisos->result();
     }

     function obtener_salas($id){
		$this->db->where('idPiso',$id);
     	$salas = $this->db->get('sala');
     	return $salas->result();
     }

     function crear_auditoria($data){
          $this->db->insert('auditoria', $data); 
          $id = $this->db->insert_id();
          $this->session->set_userdata('idAuditoria', $id);
         // echo $this->session->userdata('idAuditoria');
          if($this->db->affected_rows() == 0){
               return 'Error al realizar la inserción de la auditoria';
          }else{
               $this->db->select('id,nombreActivo, estado,codigo');
               $this->db->where('idSala',$data['idSala']);
               $query = $this->db->get('activo');
               return $query->result();
          }
     }

     function borrar_auditoria($id){
          $this->db->where('id', $id);
          $this->db->delete('auditoria'); 
     }

     function reailizar_auditoria($data,$comment){
          $this->db->insert_batch('auditoria-activo', $data);

          $id = $data[0]['idAuditoria'];
          $this->db->set('estado', 1);
          $this->db->set('comentario', $comment);
          $this->db->where('id', $id);
          $this->db->update('auditoria');

     }


     function guardar_auditoria($data,$comment){
          $this->db->insert_batch('auditoria-activo', $data);

          $id = $data[0]['idAuditoria'];
          $this->db->set('comentario', $comment);
          $this->db->where('id', $id);
          $this->db->update('auditoria');

     }

      function obtener_auditorias(){
         $this->db->select('auditoria.id, auditoria.estado, auditoria.fecha, sala.nombre AS sala, piso.nombre AS piso, edificio.nombre AS edificio, sede.nombre AS sede');
         $this->db->from('auditoria');
         $this->db->join('sala', 'sala.id = auditoria.idSala');
         $this->db->join('piso', 'piso.id = sala.idPiso');
         $this->db->join('edificio', 'edificio.id = piso.idEdificio');
         $this->db->join('sede', 'sede.id = edificio.idSede');
         $this->db->distinct();
         $query = $this->db->get(); 

         if($query){
               return $query->result();
         }else{
               return "No hay auditorías";
         }
     }

     function obtener_activos($id){
          /*$this->db->select('auditoria-activo.calCualitativa, auditoria-activo.calCuantitativa, auditoria-activo.estado AS est, auditoria-activo.comentario AS comentarioAA, activo.id, activo.estado, activo.nombreActivo, auditoria.comentario');
          $this->db->from('auditoria');
          $this->db->where('auditoria.id',$id);
          $this->db->join('auditoria-activo', 'auditoria-activo.idAuditoria = auditoria.id');
          $this->db->join('activo', 'activo.id = auditoria-activo.idActivo');
          $this->db->distinct();
          $query = $this->db->get();*/
          $this->db->like('auditoria-activo.idAuditoria',$id);
          $this->db->select('auditoria-activo.calCualitativa, auditoria-activo.calCuantitativa, auditoria-activo.estado AS est, auditoria-activo.comentario AS comentarioAA, activo.id, activo.estado, activo.nombreActivo, auditoria.comentario');
          $this->db->from('auditoria-activo');
          $this->db->join('auditoria', 'auditoria.id = auditoria-activo.idAuditoria');
          $this->db->join('activo', 'activo.id = auditoria-activo.idActivo');
          $this->db->distinct();
          $query = $this->db->get();
          if($query){
               return $query->result();
         }else{
               return "No hay auditorías";
         }
     }

}