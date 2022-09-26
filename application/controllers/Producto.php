<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Producto extends CI_Controller {
	
	public function index()
	{
		$lista=$this->producto_model->listaproductos();
		$data['productos']=$lista;

		$this->load->view('inc/headersbadmin2');
		$this->load->view('inc/sidebarsbadmin2');		
		$this->load->view('inc/topbarsbadmin2');
		$this->load->view('listaP',$data);		// ----- aqui
		$this->load->view('inc/creditossbadmin2'); 		
		$this->load->view('inc/footersbadmin2');

		/*$this->load->view('inc/header'); // cabecera de la tabla
		$this->load->view('listaP',$data); // lista de la tabla
		$this->load->view('inc/footer'); // pie de la tabla */
	}
	public function agregar()
	{
		$this->load->view('inc/headersbadmin2');
		$this->load->view('inc/sidebarsbadmin2');		
		$this->load->view('inc/topbarsbadmin2');
		$this->load->view('formularioP');		
		$this->load->view('inc/creditossbadmin2'); 		
		$this->load->view('inc/footersbadmin2');
		/*$this->load->view('inc/header');
		$this->load->view('formularioP');
		$this->load->view('inc/footer');*/
	}


	public function agregarbd()
	{
		//-----BDD tabla-------formularioP.php
		$data['nombre']=strtoupper($_POST['Nombre'], 'UTF-8');
		$data['descripcion']=strtoupper($_POST['Descripcion'], 'UTF-8');
		$data['color']=mb_strtoupper($_POST['Color'], 'UTF-8');
		$data['unidadMedida']=$_POST['UnidadMedida'];
		$data['precio']=$_POST['Precio'];

		//$data['fechaRegistro']=$_POST['FechaRegistro'];
		//$data['fechaActualizacion']=$_POST['FechaActualizacion'];

		$lista=$this->producto_model->agregarproducto($data);
		redirect('producto/index','refresh');

	}
	public function eliminarbd()
	{
		//-----BDD tabla-------formulario.php
		$idproducto=$_POST['idproducto'];
		
		$this->producto_model->eliminarproducto($idproducto);
		redirect('producto/index','refresh');

	}

	public function modificar()
	{
		//-----BDD tabla-------formulario.php
		$idproducto=$_POST['idproducto'];		
		$data['infoproducto']=$this->producto_model->recuperarproducto($idproducto);

		$this->load->view('inc/headersbadmin2');
		$this->load->view('inc/sidebarsbadmin2');		
		$this->load->view('inc/topbarsbadmin2');
		$this->load->view('formulariomodificarP',$data);		
		$this->load->view('inc/creditossbadmin2'); 		
		$this->load->view('inc/footersbadmin2');
		
		/* $this->load->view('inc/header'); // cabecera de la tabla
		$this->load->view('formulariomodificarP',$data); // arreglo o lista de la tabla=data
		$this->load->view('inc/footer'); // pie de la tabla */
	}

	public function modificarbd()
	{
		$idproducto=$_POST['idproducto'];
		//-----BDD tabla-------formulario.php
		$data['nombre']=mb_strtoupper($_POST['Nombre'], 'UTF-8');
		$data['descripcion']=mb_strtoupper($_POST['Descripcion'], 'UTF-8');
		$data['color']=mb_strtoupper($_POST['Color'], 'UTF-8');
		$data['unidadMedida']=$_POST['UnidadMedida'];
		$data['precio']=$_POST['Precio'];
		//$data['fechaRegistro']=$_POST['FechaRegistro'];
		$data['fechaActualizacion']=date("Y-m-d (H:i:s)");

		$this->producto_model->modificarproducto($idproducto, $data);	

		redirect('producto/index','refresh'); // cargamos la lista	
	}

	public function deshabilitarbd()
	{
		$idproducto=$_POST['idproducto'];
		//-----BDD tabla-------formulario.php
		$data['estado']='0';
		$data['fechaActualizacion']=date("Y-m-d (H:i:s)");
		
		$this->producto_model->modificarproducto($idproducto, $data);	

		redirect('producto/index','refresh'); // cargamos la lista	
	}
	// lista de empleados deshabilitados
	public function deshabilitados()
	{
		$lista=$this->producto_model->listaproductosdeshabilitados();
		$data['productos']=$lista; // array relacional de tabla productos

		$this->load->view('inc/headersbadmin2');
		$this->load->view('inc/sidebarsbadmin2');		
		$this->load->view('inc/topbarsbadmin2');
		$this->load->view('listadeshabilitadosP',$data);		
		$this->load->view('inc/creditossbadmin2'); 		
		$this->load->view('inc/footersbadmin2');

		/*$this->load->view('inc/header');
		$this->load->view('listadeshabilitadosP',$data); // 
		$this->load->view('inc/footer'); */
	}

	public function habilitarbd()
	{
		$idproducto=$_POST['idproducto'];
		//-----BDD tabla-------formulario.php
		$data['estado']='1';
		$data['fechaActualizacion']=date("Y-m-d (H:i:s)");
		
		$this->producto_model->modificarproducto($idproducto, $data);	

		redirect('producto/deshabilitados','refresh'); // cargamos la lista	
	}
}
