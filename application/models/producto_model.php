
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class producto_model extends CI_Model {
	
	public function listaproductos()
	{
		$this->db->select('*'); // select *
		$this->db->from('producto'); // tabla
		$this->db->where('estado','1');
		return $this->db->get(); // devolucion del resultado de la consulta
	}

	public function agregarproducto($data)
	{
		$this->db->insert('producto',$data);
	}
	
	public function eliminarproducto($idproducto)
	{
		$this->db->where('idProducto',$idproducto);
		$this->db->delete('producto');
	}

	public function recuperarproducto($idproducto)
	{
		$this->db->select('*'); // select *
		$this->db->from('producto'); // tabla
		$this->db->where('idProducto',$idproducto); 
		
		return $this->db->get(); // devolucion del resultado de la consulta
	}

	public function modificarproducto($idproducto, $data)
	{
		
		$this->db->where('idProducto',$idproducto);

		//$this->db->UPDATE productos SET fechaActualizacion=CURRENT_TIMESTAMP; 
		
		$this->db->update('producto',$data);

	}

	public function listaproductosdeshabilitados()
	{
		$this->db->select('*'); // select *
		$this->db->from('producto'); // tabla
		$this->db->where('estado','0'); // estado=0
		return $this->db->get(); // devolucion del resultado de la consulta
	}
}
