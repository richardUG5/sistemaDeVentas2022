<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cliente extends CI_Controller {

	// recuperamos la lista de Clientes
	public function index()
	{
		$lista=$this->cliente_model->listaclientes();
		$data['clientes']=$lista; // array relacional de tabla

		$this->load->view('inc/headersbadmin2');
		$this->load->view('inc/sidebarsbadmin2');		
		$this->load->view('inc/topbarsbadmin2');
		$this->load->view('listaCliente',$data);	//----- aqui creamos y obtemos lista de clientes	
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
		$this->load->view('formularioCliente');		// ----aqui creamos formulario para agragar nuevo cliente
		$this->load->view('inc/creditossbadmin2'); 		
		$this->load->view('inc/footersbadmin2');
		/*$this->load->view('inc/header');
		$this->load->view('formulario');
		$this->load->view('inc/footer');*/
	}


	public function agregarbd()
	{
		//-----BDD tabla-------formularioCliente.php
		$data['nit_ci']=mb_strtoupper($_POST['Nit_Ci'],'UTF-8');
		$data['nombreCliente']=mb_strtoupper($_POST['NombreCliente'],'UTF-8');
		$data['razonSocial']=mb_strtoupper($_POST['RazonSocial'],'UTF-8');
		$data['limiteCredito']=$_POST['LimiteCredito'];
		
		//$data['fechaNacimiento']=$_POST['FechaNac']; // -----aqui
		//$data['telefono']=$_POST['Telefono'];
		//$data['cargo']=mb_strtoupper($_POST['Cargo'],'UTF-8');

		$lista=$this->cliente_model->agregarcliente($data);
		redirect('cliente/index','refresh');

	}
	public function eliminarbd()
	{
		//-----BDD tabla-------formularioCliente.php
		$idcliente=$_POST['idcliente'];
		
		$this->cliente_model->eliminarcliente($idcliente);
		redirect('cliente/index','refresh');

	}


/*// para transaccion --------------------

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

// termina aqui transaccion -------------------------- */

	public function modificar()
	{

		//-----BDD tabla-------formularioCliente.php
		$idcliente=$_POST['idcliente'];		
		$data['infocliente']=$this->cliente_model->recuperarcliente($idcliente);
		
		$this->load->view('inc/headersbadmin2');
		$this->load->view('inc/sidebarsbadmin2');		
		$this->load->view('inc/topbarsbadmin2');
		$this->load->view('formulariomodificarCliente',$data); //---aqui creamos formulario para modificar datos
		$this->load->view('inc/creditossbadmin2'); 		
		$this->load->view('inc/footersbadmin2');
		/*
		$this->load->view('inc/header'); // cabecera de la tabla
		$this->load->view('formulariomodificar',$data); // arreglo o lista de la tabla=data
		$this->load->view('inc/footer'); // pie de la tabla*/
	}

	public function modificarbd()
	{
		$idcliente=$_POST['idcliente'];
		//-----BDD tabla-------formularioCliente.php
		$data['nit_ci']=mb_strtoupper($_POST['Nit_Ci'],'UTF-8');
		$data['nombreCliente']=mb_strtoupper($_POST['NombreCliente'],'UTF-8'); 
		$data['razonSocial']=mb_strtoupper($_POST['RazonSocial'],'UTF-8');
		$data['limiteCredito']=$_POST['LimiteCredito']; 
		//$data['fechaNacimiento']=$_POST['FechaNac']; 
		//$data['telefono']=$_POST['Telefono'];
		//$data['cargo']=mb_strtoupper($_POST['Cargo'],'UTF-8');
		$data['fechaActualizacion']=date("Y-m-d (H:i:s)");

		$this->cliente_model->modificarcliente($idcliente, $data);	

		redirect('cliente/index','refresh'); // cargamos la listaClientes	
	}

	public function deshabilitarbd()
	{
		$idcliente=$_POST['idcliente'];
		//--BDD tabla-----formularioCliente.php
		$data['estado']='0';
		$data['fechaActualizacion']=date("Y-m-d (H:i:s)");
		
		$this->cliente_model->modificarcliente($idcliente, $data);	

		redirect('cliente/index','refresh'); // cargamos la listaClientes	
	}
	// lista de clientes deshabilitados
	public function deshabilitados()
	{
		$lista=$this->cliente_model->listaclientesdeshabilitados();
		$data['clientes']=$lista; // array relacional de tabla

		$this->load->view('inc/headersbadmin2');
		$this->load->view('inc/sidebarsbadmin2');		
		$this->load->view('inc/topbarsbadmin2');
		$this->load->view('listadeshabilitadosClientes',$data);	// ---aqui creamos lista de clientes eliminados
		$this->load->view('inc/creditossbadmin2'); 		
		$this->load->view('inc/footersbadmin2');
		
		/*$this->load->view('inc/header');
		$this->load->view('listadeshabilitados',$data);
		$this->load->view('inc/footer'); */
	}

	public function habilitarbd()
	{
		$idcliente=$_POST['idcliente'];
		//---BDD tabla-----formularioCliente.php
		$data['estado']='1';
		$data['fechaActualizacion']=date("Y-m-d (H:i:s)");
		
		$this->cliente_model->modificarcliente($idcliente, $data);	

		redirect('cliente/deshabilitados','refresh'); // cargamos la listaClientes	
	}
}
