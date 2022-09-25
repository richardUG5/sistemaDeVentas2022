<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Empleado extends CI_Controller {

	// recuperamos la lista de empleados
	public function index()
	{
		$lista=$this->empleado_model->listaempleados();
		$data['empleados']=$lista; // array relacional de tabla

		$this->load->view('inc/headersbadmin2');
		$this->load->view('inc/sidebarsbadmin2');		
		$this->load->view('inc/topbarsbadmin2');
		$this->load->view('lista',$data);		
		$this->load->view('inc/creditossbadmin2'); 		
		$this->load->view('inc/footersbadmin2');
		/*$this->load->view('inc/header');
		$this->load->view('lista',$data);
		$this->load->view('inc/footer');*/
	}

	public function guest()
	{
		if($this->session->userdata('tipo')=='guest')
        {
			$fechaprueba='2022-07-28 11:17:04';
			$data['fechatest']=formatearFecha($fechaprueba);

			$this->load->view('inc/headersbadmin2');
			$this->load->view('inc/sidebarsbadmin2');		
			$this->load->view('inc/topbarsbadmin2');
			$this->load->view('panelguest');		
			$this->load->view('inc/creditossbadmin2'); 		
			$this->load->view('inc/footersbadmin2');
			/*$this->load->view('inc/header');
			$this->load->view('lista',$data);
			$this->load->view('inc/footer');*/
		}
	}

	public function agregar()
	{
		$this->load->view('inc/headersbadmin2');
		$this->load->view('inc/sidebarsbadmin2');		
		$this->load->view('inc/topbarsbadmin2');
		$this->load->view('formulario');		
		$this->load->view('inc/creditossbadmin2'); 		
		$this->load->view('inc/footersbadmin2');
		/*$this->load->view('inc/header');
		$this->load->view('formulario');
		$this->load->view('inc/footer');*/
	}


	public function agregarbd()
	{
		//-----BDD tabla-------formulario.php
		$data['nombre']=mb_strtoupper($_POST['Nombre'],'UTF-8');
		$data['primerApellido']=mb_strtoupper($_POST['Apellido1'],'UTF-8');
		$data['segundoApellido']=mb_strtoupper($_POST['Apellido2'],'UTF-8');
		$data['fechaNacimiento']=$_POST['FechaNac']; // -----aqui
		$data['telefono']=$_POST['Telefono'];
		$data['cargo']=mb_strtoupper($_POST['Cargo'],'UTF-8');

		$lista=$this->empleado_model->agregarempleado($data);
		redirect('empleado/index','refresh');

	}
	public function eliminarbd()
	{
		//-----BDD tabla-------formulario.php
		$idempleado=$_POST['idempleado'];
		
		$this->empleado_model->eliminarempleado($idempleado);
		redirect('empleado/index','refresh');

	}


// para transaccion --------------------

	public function vender()
	{
		//-----BDD tabla-------formulario.php
		$data['infoclientes']=$this->usuario_model->listaClientes();

		$this->load->view('inc/headersbadmin2'); // archivos de cabecera
		$this->load->view('inc/sidebarsbadmin2');		
		$this->load->view('inc/topbarsbadmin2');
		$this->load->view('venderform',$data);		  // contenido
		$this->load->view('inc/creditossbadmin2'); 		
		$this->load->view('inc/footersbadmin2'); // archivos de pie

	}

	public function venderbd()
	{
		//-----BDD tabla-------formulario.php
		$data['nombre']=$_POST['Nombre'];
		//$data['apellidos']=$_POST['Apellidos'];
		$data['telefono']=$_POST['Telefono'];
		$data['cargo']=$_POST['Cargo'];
		$idCliente=$_POST['idCliente'];

		$this->usuario_model->venderEmpleado($idCliente,$data);

		redirect('empleado/index','refresh');
	}

// termina aqui transaccion --------------------------




	public function modificar()
	{

		//-----BDD tabla-------formulario.php
		$idempleado=$_POST['idempleado'];		
		$data['infoempleado']=$this->empleado_model->recuperarempleado($idempleado);
		
		$this->load->view('inc/headersbadmin2');
		$this->load->view('inc/sidebarsbadmin2');		
		$this->load->view('inc/topbarsbadmin2');
		$this->load->view('formulariomodificar',$data);		
		$this->load->view('inc/creditossbadmin2'); 		
		$this->load->view('inc/footersbadmin2');
		/*
		$this->load->view('inc/header'); // cabecera de la tabla
		$this->load->view('formulariomodificar',$data); // arreglo o lista de la tabla=data
		$this->load->view('inc/footer'); // pie de la tabla*/
	}

	public function modificarbd()
	{
		$idempleado=$_POST['idempleado'];
		//-----BDD tabla-------formulario.php
		$data['nombre']=mb_strtoupper($_POST['Nombre'],'UTF-8');
		$data['primerApellido']=mb_strtoupper($_POST['Apellido1'],'UTF-8'); 
		$data['segundoApellido']=mb_strtoupper($_POST['Apellido2'],'UTF-8'); 
		$data['fechaNacimiento']=$_POST['FechaNac']; 
		$data['telefono']=$_POST['Telefono'];
		$data['cargo']=mb_strtoupper($_POST['Cargo'],'UTF-8');
		$data['fechaActualizacion']=date("Y-m-d (H:i:s)");

		$this->empleado_model->modificarempleado($idempleado, $data);	

		redirect('empleado/index','refresh'); // cargamos la lista	
	}

	public function deshabilitarbd()
	{
		$idempleado=$_POST['idempleado'];
		//-----BDD tabla-------formulario.php
		$data['estado']='0';
		$data['fechaActualizacion']=date("Y-m-d (H:i:s)");
		
		$this->empleado_model->modificarempleado($idempleado, $data);	

		redirect('empleado/index','refresh'); // cargamos la lista	
	}
	// lista de empleados deshabilitados
	public function deshabilitados()
	{
		$lista=$this->empleado_model->listaempleadosdeshabilitados();
		$data['empleados']=$lista; // array relacional de tabla

		$this->load->view('inc/headersbadmin2');
		$this->load->view('inc/sidebarsbadmin2');		
		$this->load->view('inc/topbarsbadmin2');
		$this->load->view('listadeshabilitados',$data);		
		$this->load->view('inc/creditossbadmin2'); 		
		$this->load->view('inc/footersbadmin2');
		
		/*$this->load->view('inc/header');
		$this->load->view('listadeshabilitados',$data);
		$this->load->view('inc/footer'); */
	}

	public function habilitarbd()
	{
		$idempleado=$_POST['idempleado'];
		//-----BDD tabla-------formulario.php
		$data['estado']='1';
		$data['fechaActualizacion']=date("Y-m-d (H:i:s)");
		
		$this->empleado_model->modificarempleado($idempleado, $data);	

		redirect('empleado/deshabilitados','refresh'); // cargamos la lista	
	}
}
