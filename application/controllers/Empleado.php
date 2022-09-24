<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// importamos libreria-------------------------
require FCPATH.'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
// hasta aqui ------------------------------------

class Empleado extends CI_Controller {

	// recuperamos la lista de empleados
	public function index()
	{
		if($this->session->userdata('tipo')=='admin')
        {
			$lista=$this->empleado_model->listaempleados();
			$data['empleados']=$lista; // array relacional de tabla

			$fechaprueba='2022-07-28 11:17:04';
			$data['fechatest']=formatearFecha($fechaprueba);

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
		else
		{
			redirect('usuarios/panel','refresh'); //redireccionamos 
		}
	}

	// creamos metodo listaxlsx para reporte en excel
public function listaxlsx()
{
	$lista=$this->empleado_model->listaempleados();
	$lista=$lista->result();
	// creamos cabecera del reporte con sus atributos
	header('Content-Type: application/vnd.ms-excel');
	header('Content-Disposition: attachment;filename="ListaDeEmpleados.xlsx"');
	$spreadsheet = new Spreadsheet();
	$sheet = $spreadsheet->getActiveSheet();

	$sheet->setCellValue('A1', 'ID');
	$sheet->setCellValue('B1', 'Nombre');
	$sheet->setCellValue('C1', 'Apellidos');
	$sheet->setCellValue('D1', 'Telefono');
	$sheet->setCellValue('E1', 'Cargo');
// hasta aqui cabecera

// aqui construimos el contenido para el reporte en excel, es decir CUERPO
	$sn=2; // aqui se crea indice ejemplo A2, B2, C2 ...... A3, B3, C3 ...... An
	foreach ($lista as $row) 
	{
		$sheet->setCellValue('A'.$sn,$row->idEmpleado);
		$sheet->setCellValue('B'.$sn,$row->nombre);
		$sheet->setCellValue('C'.$sn,$row->apellidos);
		$sheet->setCellValue('D'.$sn,$row->telefono);
		$sheet->setCellValue('E'.$sn,$row->cargo);
		$sn++;
	}
// resultado a mostrar para descargar
	$writer = new Xlsx($spreadsheet);
	$writer->save("php://output");
}


	// hasta aqui

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
		$data['nombre']=$_POST['Nombre'];
		$data['apellidos']=$_POST['Apellidos'];
		$data['telefono']=$_POST['Telefono'];
		$data['cargo']=$_POST['Cargo'];


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
		$data['nombre']=$_POST['Nombre'];
		$data['apellidos']=$_POST['Apellidos'];
		$data['telefono']=$_POST['Telefono'];
		$data['cargo']=$_POST['Cargo'];
		
		$nombrearchivo=$idempleado.".jpg";

		// Ruta donde se guardan los archivos
		$config['upload_path']='./uploads';
		//Nombre del archivo
		$config['file_name']=$nombrearchivo;
		$direccion="./uploads/".$nombrearchivo;

		if(file_exists($direccion))
		{
			unlink($direccion); // para borrar archivo
		}
		
		// Tipos de archivos permitidos
		$config['allowed_types']='jpg';
		$this->load->library('upload',$config);

		if(!$this->upload->do_upload())
		{
			$data['error']=$this->upload->display_errors(); 
		}
		else
		{
			$data['foto']=$nombrearchivo;
		}

		$this->empleado_model->modificarempleado($idempleado, $data);	
		$this->upload->data();
		redirect('empleado/index','refresh'); // cargamos la lista	
	}

	public function deshabilitarbd()
	{
		$idempleado=$_POST['idempleado'];
		//-----BDD tabla-------formulario.php
		$data['habilitado']='0';
		
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
		$data['habilitado']='1';
		
		$this->empleado_model->modificarempleado($idempleado, $data);	

		redirect('empleado/deshabilitados','refresh'); // cargamos la lista	
	}

	//-- Clase 4-VII-2022  desde aqui-------------------------------
	public function reportepdf()
	{
	    if($this->session->userdata('tipo')=='admin')
	    {
	        $lista=$this->empleado_model->listaempleados();
	        $lista=$lista->result();
	                        
	        $this->pdf = new Pdf();
	        $this->pdf->AddPage();
	        $this->pdf->AliasNbPages();
	        $this->pdf->SetTitle("Lista de empleados");
	        $this->pdf->SetLeftMargin(15);
	        $this->pdf->SetRightMargin(15);
	        $this->pdf->SetFillColor(210,210,210);
	        $this->pdf->SetFont('Arial','B',11);
	        $this->pdf->Cell(10);
	        $this->pdf->Cell(150,10,'LISTA DE EMPLEADOS',0,0,'C',1);
	        //ANCHO/ALTO/TEXTO/BORDE/ORDEN SIG CELDA/IZQCENTRODERECHA FILL0=N0 1=SI
	        //ORDEN SIG CELDA 0 DERECHA .... 1 SIG LINEA ..... 2 DEBAJO

	        $this->pdf->Ln(15);

	        $this->pdf->Cell(10,5,'Nro','TBLR',0,'L',1);
	        $this->pdf->Cell(40,5,'NOMBRE','TBLR',0,'L',1);
	        $this->pdf->Cell(40,5,'APELLIDOS','TBLR',0,'L',1);
	        $this->pdf->Cell(25,5,'TELEFONO','TBLR',0,'L',1);
	        $this->pdf->Cell(40,5,'CARGO','TBLR',0,'L',1);
	        
	        $this->pdf->Ln(5); // hace salto de linea

	        $this->pdf->SetFont('Arial','',10);
	        $num=1;

	        foreach($lista as $row) 
	        {
	            $Nombre=$row->nombre;
	            $Apellidos=$row->apellidos;
	            $Telefono=$row->telefono;
	            $Cargo=$row->cargo;
	            
	            $this->pdf->Cell(10,5,$num,'TBLR',0,'L',0);
	            $this->pdf->Cell(40,5,$Nombre,'TBLR',0,'L',0);
	            $this->pdf->Cell(40,5,$Apellidos,'TBLR',0,'L',0);
	            $this->pdf->Cell(25,5,$Telefono,'TBLR',0,'L',0);
	            $this->pdf->Cell(40,5,$Cargo,'TBLR',0,'L',0);
	            
	            $this->pdf->Ln(5); // hace salto de linea

	            $num++;
	        }

			$this->pdf->Output("reporte5.pdf","I");
	    }
	    else
	    {
	        redirect('usuarios/panel','refresh');
	    }
	}
	// Clase 4-VII-2022  hasta aqui-------------------------------

	// para fotografia-----------------------
	public function subirfoto()
	{
		//-----BDD tabla-------formulario.php
		$data['idempleado']=$_POST['idempleado'];

		$this->load->view('inc/headersbadmin2'); // cabecera
		$this->load->view('inc/sidebarsbadmin2');		
		$this->load->view('inc/topbarsbadmin2');
		$this->load->view('subirform',$data);		// contenido
		$this->load->view('inc/creditossbadmin2'); 		
		$this->load->view('inc/footersbadmin2'); // pie	
	}

	public function subir()
	{
		$idempleado=$_POST['idempleado'];
		$nombrearchivo=$idempleado.".jpg";

		//Ruta donde se guardan los ficheros
		$config['upload_path']='./uploads/empleados/';
		//Nombre del archivo
		$config['file_name']=$nombrearchivo;

		//Reemplazar los archivos
		$direccion="./uploads/empleados/".$nombrearchivo;
		unlink($direccion);

		//Tipos de archivos permitidos
		$config['allowed_types']='jpg'; // 'gif|jpg|png' se puede usar los tres en uno
		$this->load->library('upload',$config);

		if (!$this->upload->do_upload()) 
		{
			//Si hay algun error, pasaremos a la vista
			$data['error1']=$this->upload->display_errors();
		}
		else
		{
			$data['foto1']=$nombrearchivo;
			$this->empleado_model->modificarempleado($idempleado, $data);
			$this->upload->data();
		}

		redirect('empleado/index','refresh');

	}

	// hasta aqui ---------------------------------------
}