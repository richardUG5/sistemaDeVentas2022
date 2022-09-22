
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class producto_model extends CI_Model {
	
	public function listaproductos()
	{
		$this->db->select('*'); // select *
		$this->db->from('productos'); // tabla
		$this->db->where('habilitado','1');
		return $this->db->get(); // devolucion del resultado de la consulta
	}

	public function agregarproducto($data)
	{
		$this->db->insert('productos',$data);
	}
	
	public function eliminarproducto($idproducto)
	{
		$this->db->where('idProducto',$idproducto);
		$this->db->delete('productos');
	}

	public function recuperarproducto($idproducto)
	{
		$this->db->select('*'); // select *
		$this->db->from('productos'); // tabla
		$this->db->where('idProducto',$idproducto); 
		
		return $this->db->get(); // devolucion del resultado de la consulta
	}

	public function modificarproducto($idproducto, $data)
	{
		
		$this->db->where('idProducto',$idproducto); 
		
		$this->db->update('productos',$data);		
	}

	public function listaproductosdeshabilitados()
	{
		$this->db->select('*'); // select *
		$this->db->from('productos'); // tabla
		$this->db->where('habilitado','0'); // habilitado=0
		return $this->db->get(); // devolucion del resultado de la consulta
	}
}
