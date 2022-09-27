<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class empleado_model extends CI_Model {
	
	public function listaempleados()
	{
		$this->db->select('*'); // select *
		$this->db->from('empleado'); // tabla
		$this->db->where('estado','1'); // estado=1
		return $this->db->get(); // devolucion del resultado de la consulta
	}

	public function agregarempleado($data)
	{
		$this->db->insert('empleado',$data);
	}

	public function eliminarempleado($idempleado)
	{
		$this->db->where('idEmpleado',$idempleado);
		$this->db->delete('empleado');
	}
	public function recuperarempleado($idempleado)
	{
		$this->db->select('*'); // select *
		$this->db->from('empleado'); // tabla
		$this->db->where('idEmpleado',$idempleado); // hace WHERE idEmpleado=idempleado
		// dnd (atributo de BdD [idEmpleado=idempleado] esto es variable q recibe)
		return $this->db->get(); // devolucion del resultado de la consulta
	}

	public function modificarempleado($idempleado, $data)
	{
		
		$this->db->where('idEmpleado',$idempleado); // hace WHERE idEmpleado=idempleado
		// dnd (atributo de BdD [idEmpleado=idempleado] esto es variable q recibe)
		$this->db->update('empleado',$data);		
	}

	public function listaempleadosdeshabilitados()
	{
		$this->db->select('*'); // select *
		$this->db->from('empleado'); // tabla
		$this->db->where('estado','0'); // estado=0
		return $this->db->get(); // devolucion del resultado de la consulta
	}
}