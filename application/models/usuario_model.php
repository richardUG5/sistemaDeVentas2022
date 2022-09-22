<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario_model extends CI_Model {


	public function validar($login,$password)
	{
        $this->db->select('*'); //select ('idUsuario,login,tipo')
        $this->db->from('usuarios'); //tabla
        $this->db->where('login',$login);
        $this->db->where('password',$password); // operador AND
        /*$this->db->where('nota<=',61);filtro PARA ESTUDIANTES CON NOTA MENOR A 61*/ 
        return $this->db->get(); //devolucion del resultado de la consulta
	}
}