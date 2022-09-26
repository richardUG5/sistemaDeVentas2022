<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Categoria extends CI_Controller {

	// recuperamos la lista de Clientes
	public function index()
	{
		$lista=$this->categoria_model->listacategorias();
		$data['categorias']=$lista; // array relacional de tabla

		$this->load->view('inc/headersbadmin2');
		$this->load->view('inc/sidebarsbadmin2');		
		$this->load->view('inc/topbarsbadmin2');
		$this->load->view('listaCategoria',$data);	//----- aqui	
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
		$this->load->view('formularioCategoria');		// ----aqui
		$this->load->view('inc/creditossbadmin2'); 		
		$this->load->view('inc/footersbadmin2');
		/*$this->load->view('inc/header');
		$this->load->view('formulario');
		$this->load->view('inc/footer');*/
	}


	public function agregarbd()
	{
		//-----BDD tabla-----------------------------formularioCategoria.php
		
		$data['nombreCategoria']=mb_strtoupper($_POST['NombreCategoria'],'UTF-8');

		//$data['razonSocial']=mb_strtoupper($_POST['RazonSocial'],'UTF-8');
		//$data['limiteCredito']=$_POST['LimiteCredito'];		
		//$data['fechaNacimiento']=$_POST['FechaNac']; // -----aqui
		//$data['telefono']=$_POST['Telefono'];
		//$data['cargo']=mb_strtoupper($_POST['Cargo'],'UTF-8');

		$lista=$this->categoria_model->agregarcategoria($data);
		redirect('categoria/index','refresh');

	}
	public function eliminarbd()
	{
		//-----BDD tabla---------formularioCategoria.php
		$idcategoria=$_POST['idcategoria'];
		
		$this->categoria_model->eliminarcategoria($idcliente);
		redirect('categoria/index','refresh');

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

		//-----BDD tabla-------formularioCategoria.php
		$idcategoria=$_POST['idcategoria'];		
		$data['infocategoria']=$this->categoria_model->recuperarcategoria($idcategoria);
		
		$this->load->view('inc/headersbadmin2');
		$this->load->view('inc/sidebarsbadmin2');		
		$this->load->view('inc/topbarsbadmin2');
		$this->load->view('formulariomodificarCategoria',$data); //---aqui
		$this->load->view('inc/creditossbadmin2'); 		
		$this->load->view('inc/footersbadmin2');
		/*
		$this->load->view('inc/header'); // cabecera de la tabla
		$this->load->view('formulariomodificar',$data); // arreglo o lista de la tabla=data
		$this->load->view('inc/footer'); // pie de la tabla*/
	}

	public function modificarbd()
	{
		$idcategoria=$_POST['idcategoria'];
		//-----BDD tabla-------formularioCliente.php
		//$data['nit_ci']=mb_strtoupper($_POST['Nit_Ci'],'UTF-8');

		$data['nombreCategoria']=mb_strtoupper($_POST['NombreCategoria'],'UTF-8'); 
		
		//$data['razonSocial']=mb_strtoupper($_POST['RazonSocial'],'UTF-8');
		//$data['limiteCredito']=$_POST['LimiteCredito']; 
		//$data['fechaNacimiento']=$_POST['FechaNac']; 
		//$data['telefono']=$_POST['Telefono'];
		//$data['cargo']=mb_strtoupper($_POST['Cargo'],'UTF-8');

		$data['fechaActualizacion']=date("Y-m-d (H:i:s)");

		$this->categoria_model->modificarcategoria($idcategoria, $data);	

		redirect('categoria/index','refresh'); // cargamos la listaCategoria	
	}

	public function deshabilitarbd()
	{
		$idcategoria=$_POST['idcategoria'];
		//--BDD tabla-----formularioCategoria.php
		$data['estado']='0';
		$data['fechaActualizacion']=date("Y-m-d (H:i:s)");
		
		$this->categoria_model->modificarcategoria($idcategoria, $data);	

		redirect('categoria/index','refresh'); // cargamos la listaCategorias	
	}
	// lista de categorias deshabilitados
	public function deshabilitados()
	{
		$lista=$this->categoria_model->listacategoriasdeshabilitados();
		$data['categorias']=$lista; // array relacional de tabla

		$this->load->view('inc/headersbadmin2');
		$this->load->view('inc/sidebarsbadmin2');		
		$this->load->view('inc/topbarsbadmin2');
		$this->load->view('listadeshabilitadosCategorias',$data);	// ---aqui
		$this->load->view('inc/creditossbadmin2'); 		
		$this->load->view('inc/footersbadmin2');
		
		/*$this->load->view('inc/header');
		$this->load->view('listadeshabilitados',$data);
		$this->load->view('inc/footer'); */
	}

	public function habilitarbd()
	{
		$idcategoria=$_POST['idcategoria'];
		//---BDD tabla-----formularioCategoria.php
		$data['estado']='1';
		$data['fechaActualizacion']=date("Y-m-d (H:i:s)");
		
		$this->categoria_model->modificarcategoria($idcategoria, $data);	

		redirect('categoria/deshabilitados','refresh'); // cargamos la listaCategorias	
	}

	//-- para reportes  Clase 4-VII-2022  desde aqui-------------------------------
	public function reportepdf()
	{
	    if($this->session->userdata('tipo')=='admin')
	    {
	        $lista=$this->categoria_model->listacategorias();
	        $lista=$lista->result();
	                        
	        $this->pdf = new Pdf();
	        $this->pdf->AddPage('P'); //AddPage('P=hoja horizontal L=Hoja vertical')
	        $this->pdf->AliasNbPages();
	        $this->pdf->SetTitle("Lista de categorias");
	        $this->pdf->SetLeftMargin(15);
	        $this->pdf->SetRightMargin(15);
	        //$this->pdf->SetFillColor(210,210,210);

	        $this->pdf->SetFillColor(125,127,124);
			$this->pdf->SetTextColor(0,1,51);


	        $this->pdf->SetFont('Arial','BU',11);
	        $this->pdf->Cell(10);
	        $this->pdf->Cell(150,10,'LISTA DE CATEGORIAS',0,0,'C',1);

	        $this->pdf->Ln(15);

	        $this->pdf->SetFont('Arial','B',10);
	        // SetFont([Family:Arial,Courier,Times,Symbol],[Style: ''=por defecto/regular, B=bold=Negrilla I=italic=Cursiva U=Underline=subrayado], size=tamaño=11)

/* cell(ancho,alto,impresion, borde (0=sin borde, 1=borde total y TBLR=TopBottomLeftRight), ln)*/
			// para atributos de la tabla
	        $this->pdf->Cell(10,5,'Nro','TBLR',0,'L',1);
	        //$this->pdf->Cell(35,5,'NIT/CI','TBLR',0,'L',1);
	        $this->pdf->Cell(35,5,'NOMBRE','TBLR',0,'L',1);
	        //$this->pdf->Cell(35,5,'RAZONSOCIAL','TBLR',0,'L',1);
	        //$this->pdf->Cell(35,5,'LIMITECREDITO','TBLR',0,'L',1);
	        //$this->pdf->Cell(25,5,'TELEFONO','TBLR',0,'L',1);
	        //$this->pdf->Cell(35,5,'CARGO','TBLR',0,'L',1);
	        $this->pdf->Ln(5); // hace salto de linea

	        $this->pdf->SetFont('Courier','',10); // Letras cursivas del reporte

	        $num=1;

	        foreach($lista as $row) 
	        {	// Variable -----BD------
	            //$NitCi=$row->nit_ci;

	            $Nombre=$row->nombreCategoria;

	            //$RazonSocial=$row->razonSocial;
	            //$LimiteCredito=$row->limiteCredito;
	            //$Fecha_Nac=$row->fechaNacimiento;
	            //$Telefono=$row->telefono;
	            //$Cargo=$row->cargo;
	            
	            $this->pdf->Cell(10,5,$num,'TBLR',0,'L',0);
	            //$this->pdf->Cell(35,5,$NitCi,'TBLR',0,'L',0);

	            $this->pdf->Cell(35,5,$Nombre,'TBLR',0,'L',0);

	            //$this->pdf->Cell(35,5,$RazonSocial,'TBLR',0,'L',0);
	            //$this->pdf->Cell(35,5,$LimiteCredito,'TBLR',0,'L',0);

	            //$this->pdf->Cell(27,5,$Fecha_Nac,'TBLR',0,'L',0);
	            //$this->pdf->Cell(25,5,$Telefono,'TBLR',0,'L',0);
	            //$this->pdf->Cell(35,5,$Cargo,'TBLR',0,'L',0);
	            
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
