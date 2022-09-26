<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Categoria_model extends CI_Model {
	
	public function listaCategorias()
	{
		$this->db->select('*'); // select *
		$this->db->from('categoria'); // tabla
		$this->db->where('estado','1'); // estado=1
		return $this->db->get(); // devolucion del resultado de la consulta
	}

	public function agregarcategoria($data) 
	{
		$this->db->insert('categoria',$data);
	}

	public function eliminarcategoria($idcategoria)
	{
		$this->db->where('idCategoria',$idcategoria); // donde idCategoria=idcategoria
		$this->db->delete('categoria');
	}
	public function recuperarcategoria($idcategoria)
	{
		$this->db->select('*'); // select *
		$this->db->from('categoria'); // tabla
		$this->db->where('idCategoria',$idcategoria); // hace WHERE idCliente=idcliente
		// dnd (atributo de BdD [idCategoria=idcategoria] esto es variable q recibe)
		return $this->db->get(); // devolucion del resultado de la consulta
	}

	public function modificarcategoria($idcategoria, $data)
	{		
		$this->db->where('idCategoria',$idcategoria); // hace WHERE idCategoria=idcategoria
		// dnd (atributo de BdD [idCliente=idcliente] esto es variable q recibe)
		$this->db->update('categoria',$data);		
	}

	public function listacategoriasdeshabilitados()
	{
		$this->db->select('*'); // select *
		$this->db->from('categoria'); // tabla categoria
		$this->db->where('estado','0'); //donde estado=0
		return $this->db->get(); // devolucion del resultado de la consulta
	}
}
