<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Comercial_model extends CI_Model {
	
	public function listaComerciales()
	{
		$this->db->select('*'); // select *
		$this->db->from('comercial'); // tabla
		$this->db->where('estado','1'); // estado=1
		return $this->db->get(); // devolucion del resultado de la consulta
	}

	public function agregarcomercial($data) 
	{
		$this->db->insert('comercial',$data);
	}

	public function eliminarcomercial($idcomercial)
	{
		$this->db->where('idComercial',$idcomercial);
		$this->db->delete('comercial');
	}
	public function recuperarcomercial($idcomercial)
	{
		$this->db->select('*'); // select *
		$this->db->from('comercial'); // tabla
		$this->db->where('idComercial',$idcomercial); // hace WHERE idComercial=idcomercial
		// dnd (atributo de BdD [idComercial=idcomercial] esto es variable q recibe)
		return $this->db->get(); // devolucion del resultado de la consulta
	}

	public function modificarcomercial($idcomercial, $data)
	{
		
		$this->db->where('idComercial',$idcomercial); // hace WHERE idComercial=idcomercial
		// dnd (atributo de BdD [idComercial=idcomercial] esto es variable q recibe)
		$this->db->update('comercial',$data);		
	}

	public function listacomercialesdeshabilitados()
	{
		$this->db->select('*'); // select *
		$this->db->from('comercial'); // tabla
		$this->db->where('estado','0'); // estado=0
		return $this->db->get(); // devolucion del resultado de la consulta
	}
}