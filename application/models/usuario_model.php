<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario_model extends CI_Model {


	public function validar($login,$password)
	{
        $this->db->select('*'); //select ('idUsuario,login,tipo')
        $this->db->from('usuario'); //tabla
        $this->db->where('login',$login);
        $this->db->where('password',$password); // operador AND
        /*$this->db->where('nota<=',61);filtro PARA ESTUDIANTES CON NOTA MENOR A 61
        $consulta="SELECT FROM usuario WHERE usuario='$usuario' and contraseña='$contraseña'" */ 
        return $this->db->get(); //devolucion del resultado de la consulta
	}

// para transaccion -----------------------

    public function listaClientes()
    {
        $this->db->select('*'); // select *
        $this->db->from('cliente'); // tabla
        // $this->db->where('habilitado','1'); // habilitado=1 ------para auditoria
        return $this->db->get(); // devolucion del resultado de la consulta
    }

    public function venderEmpleado($idCliente,$data)
    {
    	// transaccion unica o atomica
    	$this->db->trans_start(); // transaccion inicia

    	$this->db->insert('empleado',$data);
    	$idEmpleado=$this->db->insert_id(); // devuelve la ultima id generada
    	$data2['idCliente']=$idCliente;
    	$data2['idEmpleado']=$idEmpleado;
    	$this->db->insert('venta',$data2);

    	$this->db->trans_complete(); // transaccion completada

    	/* // manejo de errores
    	if($this->db->trans_status()===FALSE)
    	{
    		return false;
    	}   -----*/
			
    }

//termina transaccion aqui

}