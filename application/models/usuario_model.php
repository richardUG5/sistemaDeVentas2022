<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario_model extends CI_Model {

// begin--------------------------------------------------------------------------------------
    public function listausuarios()
    {
        $this->db->select('u.idUsuario, u.foto, u.nombres, u.primerApellido, u.segundoApellido, u.fechaNacimiento,
        u.telefono, u.login, u.password, u.tipo, u.idComercial, c.idComercial, c.nombreComercial'); // select('*');
        $this->db->from('usuario u'); // tabla
        $this->db->where('u.estado','1'); // estado=1
        $this->db->join('comercial c','u.idComercial=c.idComercial');
        return $this->db->get(); // devolucion del resultado de la consulta
    }

    public function agregarusuario($data)
    {
        $this->db->insert('usuario',$data);
    }
// begin para eliminar usuario definitivamente---------------------------
    public function eliminarusuario($idusuario)
    {
        $this->db->where('idUsuario',$idusuario);
        $this->db->delete('usuario');
    }
// End -----------------------------------------------------------
    public function recuperarusuario($idusuario)
    {
        $this->db->select('u.idUsuario, u.nombres, u.primerApellido, u.segundoApellido, u.fechaNacimiento,
        u.telefono, u.login, u.password, u.tipo, u.idComercial, c.idComercial, c.nombreComercial'); // select('*');
        $this->db->from('usuario u'); // tabla
        $this->db->where('u.idUsuario',$idusuario); 
        // dnd (atributo de BdD [idUsuario=idusuario] esto es variable q recibe)
        $this->db->join('comercial c','u.idComercial=c.idComercial');
        return $this->db->get(); // devolucion del resultado de la consulta
    }

    public function modificarusuario($idusuario, $data)
    {        
        $this->db->where('idUsuario',$idusuario); // hace WHERE idUsuario=idusuario
        // dnd (atributo de BdD [idUsuario=idusuario] esto es variable q recibe)
        $this->db->update('usuario',$data);        
    }

    public function listausuariosdeshabilitados()
    {
        $this->db->select('*'); // select *
        $this->db->from('usuario'); // tabla
        $this->db->where('estado','0'); // estado=0
        return $this->db->get(); // devolucion del resultado de la consulta
    }
// end ---------------------------------------------------------------------------------------

	public function validar($login,$password)
	{
        $this->db->select('*'); //select ('idUsuario,login,tipo')
        $this->db->from('usuario'); //tabla
        $this->db->where('login',$login);
        $this->db->where('password',$password); // en esta linea se usa operador AND
        /*$this->db->where('nota<=',61);  ----filtro PARA ESTUDIANTES CON NOTA MENOR A 61
        $consulta="SELECT FROM usuario WHERE usuario='$usuario' and contraseña='$contraseña'" */ 
        return $this->db->get(); //devolucion del resultado de la consulta
	}

// Begin --------para transaccion -----------------------------------------------------------------

    public function listaClientes()
    {
        $this->db->select('*'); // select *
        $this->db->from('cliente'); // tabla
        // $this->db->where('habilitado','1'); // habilitado=1 ------para auditoria
        return $this->db->get(); // devolucion del resultado de la consulta
    }
    public function listaUsers()
    {
        $this->db->select('*'); // select *
        $this->db->from('usuario'); // tabla
        // $this->db->where('habilitado','1'); // habilitado=1 ------para auditoria
        return $this->db->get(); // devolucion del resultado de la consulta
    }
    public function venderUser($idCliente,$idUsuario,$data)
    {
    	// transaccion unica o atomica
    	$this->db->trans_start(); // transaccion inicia

    	$this->db->insert('usuario',$data);
    	$idUsuario=$this->db->insert_id(); // devuelve la ultima id generada
    	$data2['idCliente']=$idCliente;
    	$data2['idUsuario']=$idUsuario;
    	$this->db->insert('venta',$data2);

    	$this->db->trans_complete(); // transaccion completada con exito

    	/* // manejo de errores
    	if($this->db->trans_status()===FALSE)
    	{
    		return false;
    	}   -----*/			
    }
// End --------------- transaccion aqui-----------------------------------------------------------
}