<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Medida_model extends CI_Model {
	
	public function listaMedidas()
	{
		$this->db->select('*'); // select *
		$this->db->from('medida'); // tabla
		$this->db->where('estado','1'); // estado=1
		return $this->db->get(); // devolucion del resultado de la consulta
	}
	public function agregarmedida($data) 
	{
		$this->db->insert('medida',$data);
	}
	public function eliminarmedida($idmedida)
	{
		$this->db->where('idMedida',$idmedida); // donde idMedida=idmedida
		$this->db->delete('medida');
	}
	public function recuperarmedida($idmedida)
	{
		$this->db->select('*'); // select *
		$this->db->from('medida'); // tabla
		$this->db->where('idMedida',$idmedida); // hace WHERE idMedida=idmedida
		// dnd (atributo de BdD [idMedida=idmedida] esto es variable q recibe)
		return $this->db->get(); // devolucion del resultado de la consulta
	}
	public function modificarmedida($idmedida, $data)
	{		
		$this->db->where('idMedida',$idmedida); // hace WHERE idMedida=idmedida
		// dnd (atributo de BdD [idMedida=idmedida] esto es variable q recibe)
		$this->db->update('medida',$data);		
	}
	public function listamedidasdeshabilitados()
	{
		$this->db->select('*'); // select *
		$this->db->from('medida'); // tabla medida
		$this->db->where('estado','0'); //donde estado=0
		return $this->db->get(); // devolucion del resultado de la consulta
	}
}