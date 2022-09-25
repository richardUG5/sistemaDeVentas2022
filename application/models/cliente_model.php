
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cliente_model extends CI_Model {
	
	public function listaClientes()
	{
		$this->db->select('*'); // select *
		$this->db->from('clientes'); // tabla
		// $this->db->where('habilitado','1'); // habilitado=1 ------para auditoria
		return $this->db->get(); // devolucion del resultado de la consulta
	}

/*	public function agregarempleado($data)
	{
		$this->db->insert('empleados',$data);
	}

	public function eliminarempleado($idempleado)
	{
		$this->db->where('idEmpleado',$idempleado);
		$this->db->delete('empleados');
	}
	public function recuperarempleado($idempleado)
	{
		$this->db->select('*'); // select *
		$this->db->from('empleados'); // tabla
		$this->db->where('idEmpleado',$idempleado); // hace WHERE idEmpleado=idempleado
		// dnd (atributo de BdD [idEmpleado=idempleado] esto es variable q recibe)
		return $this->db->get(); // devolucion del resultado de la consulta
	}

	public function modificarempleado($idempleado, $data)
	{
		
		$this->db->where('idEmpleado',$idempleado); // hace WHERE idEmpleado=idempleado
		// dnd (atributo de BdD [idEmpleado=idempleado] esto es variable q recibe)
		$this->db->update('empleados',$data);		
	}

	public function listaempleadosdeshabilitados()
	{
		$this->db->select('*'); // select *
		$this->db->from('empleados'); // tabla
		$this->db->where('habilitado','0'); // habilitado=0
		return $this->db->get(); // devolucion del resultado de la consulta
	}

	*/
}
