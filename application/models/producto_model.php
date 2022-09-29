<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class producto_model extends CI_Model {
	
	public function listaproductos()
	{

		$this->db->select('p.idProducto,p.descripcion,p.color,p.precioBase,p.estado,p.idCategoria,p.idMedida,c.idCategoria
		,c.nombreCategoria,m.idMedida,m.unidadMedida'); // select *'); // select *
		$this->db->from('producto p'); // tabla
		$this->db->where('p.estado','1');
		$this->db->join('categoria c','p.idCategoria=c.idCategoria');
		$this->db->join('medida m','p.idMedida=m.idMedida');
		return $this->db->get(); // devolucion del resultado de la consulta
	}

	public function agregarproducto($data)
	{
		$this->db->insert('producto',$data);
	}
// para eliminar usuario definitivamente---------------------------
	public function eliminarproducto($idproducto)
	{
		$this->db->where('idProducto',$idproducto);
		$this->db->delete('producto');
	}
// End -----------------------------------------------------------
	public function recuperarproducto($idproducto)
	{
		$this->db->select('p.idProducto,p.descripcion,p.color,p.precioBase,p.idCategoria,p.idMedida,c.idCategoria
		,c.nombreCategoria,m.idMedida,m.unidadMedida'); // select *
		$this->db->from('producto p');
		$this->db->where('p.idProducto',$idproducto); 
		$this->db->join('categoria c','p.idCategoria=c.idCategoria');
		$this->db->join('medida m','p.idMedida=m.idMedida');
		return $this->db->get(); // devolucion del resultado de la consulta
	}

	public function modificarproducto($idproducto, $data)
	{		
		$this->db->where('idProducto',$idproducto);		
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