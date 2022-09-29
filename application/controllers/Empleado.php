<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// importamos libreria-------------------------
//require FCPATH.'vendor/autoload.php';

//use PhpOffice\PhpSpreadsheet\Spreadsheet;
//use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
// hasta aqui ------------------------------------

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

// Begin --------------- para transaccion ----------------------------------------------------------
/*
	public function vender()
	{
		//-----BDD tabla-------formulario.php
		$data['infoclientes']=$this->usuario_model->listaClientes();
		
		$this->load->view('inc/headersbadmin2'); // archivos de cabecera
		$this->load->view('inc/sidebarsbadmin2');		
		$this->load->view('inc/topbarsbadmin2');
		$this->load->view('venderform',$data);		  // formulario para venta
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
*/
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

	//-- para reportes  Clase 4-VII-2022  desde aqui-------------------------------
	public function reportepdf()
	{
	    if($this->session->userdata('tipo')=='admin')
	    {
	        $lista=$this->empleado_model->listaempleados();
	        $lista=$lista->result();
	                        
	        $this->pdf = new Pdf();
	        $this->pdf->AddPage('P'); //AddPage('P=hoja horizontal L=Hoja vertical')
	        $this->pdf->AliasNbPages();
	        $this->pdf->SetTitle("Lista de empleados");
	        $this->pdf->SetLeftMargin(15);
	        $this->pdf->SetRightMargin(15);
	        //$this->pdf->SetFillColor(210,210,210);

	        $this->pdf->SetFillColor(125,127,124);
			$this->pdf->SetTextColor(0,1,51);


	        $this->pdf->SetFont('Arial','BU',11);
	        $this->pdf->Cell(10);
	        $this->pdf->Cell(150,10,'LISTA DE EMPLEADOS',0,0,'C',1);

	        $this->pdf->Ln(15);

	        $this->pdf->SetFont('Arial','B',10);
	        // SetFont([Family:Arial,Courier,Times,Symbol],[Style: ''=por defecto/regular, B=bold=Negrilla I=italic=Cursiva U=Underline=subrayado], size=tamaño=11)

/* cell(ancho,alto,impresion, borde (0=sin borde, 1=borde total y TBLR=TopBottomLeftRight), ln)*/
			// para atributos de la tabla
	        $this->pdf->Cell(10,5,'Nro','TBLR',0,'L',1);
	        $this->pdf->Cell(35,5,'NOMBRE','TBLR',0,'L',1);
	        $this->pdf->Cell(25,5,'APELLIDO1','TBLR',0,'L',1);
	        $this->pdf->Cell(25,5,'APELLIDO2','TBLR',0,'L',1);
	        $this->pdf->Cell(27,5,'FECHA_NAC','TBLR',0,'L',1);
	        $this->pdf->Cell(25,5,'TELEFONO','TBLR',0,'L',1);
	        $this->pdf->Cell(35,5,'CARGO','TBLR',0,'L',1);
	        $this->pdf->Ln(5); // hace salto de linea

	        $this->pdf->SetFont('Courier','',10); // Letras cursivas del reporte

	        $num=1;

	        foreach($lista as $row) 
	        {
	            $Nombre=$row->nombre;
	            $Apellido1=$row->primerApellido;
	            $Apellido2=$row->segundoApellido;
	            $Fecha_Nac=$row->fechaNacimiento;
	            $Telefono=$row->telefono;
	            $Cargo=$row->cargo;
	            
	            $this->pdf->Cell(10,5,$num,'TBLR',0,'L',0);
	            $this->pdf->Cell(35,5,$Nombre,'TBLR',0,'L',0);
	            $this->pdf->Cell(25,5,$Apellido1,'TBLR',0,'L',0);
	            $this->pdf->Cell(25,5,$Apellido2,'TBLR',0,'L',0);
	            $this->pdf->Cell(27,5,$Fecha_Nac,'TBLR',0,'L',0);
	            $this->pdf->Cell(25,5,$Telefono,'TBLR',0,'L',0);
	            $this->pdf->Cell(35,5,$Cargo,'TBLR',0,'L',0);
	            
	            $this->pdf->Ln(5); // hace salto de linea

	            $num++;
	        }

			$this->pdf->Output("reporte5.pdf","I"); // I:muestra en Navegador y D: deescarga directo
	    }
	    else
	    {
	        redirect('usuarios/panel','refresh');
	    }
	} 
	// Clase 4-VII-2022  hasta aqui-------------------------------
}