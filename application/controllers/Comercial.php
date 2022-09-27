<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Comercial extends CI_Controller {

	// recuperamos la lista de Tiendas
	public function index()
	{
		$lista=$this->comercial_model->listacomerciales();
		$data['comerciales']=$lista; // array relacional de tabla

		$this->load->view('inc/headersbadmin2');
		$this->load->view('inc/sidebarsbadmin2');		
		$this->load->view('inc/topbarsbadmin2');
		$this->load->view('listaComercial',$data);	//----- aqui	
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
		$this->load->view('formularioComercial');		// ----aqui
		$this->load->view('inc/creditossbadmin2'); 		
		$this->load->view('inc/footersbadmin2');
		/*$this->load->view('inc/header');
		$this->load->view('formulario');
		$this->load->view('inc/footer');*/
	}
	public function agregarbd()
	{
		//-----BDD tabla-------formularioComercial.php		
		$data['nombreComercial']=mb_strtoupper($_POST['NombreComercial'],'UTF-8');
		$data['telefono']=mb_strtoupper($_POST['Telefono'],'UTF-8');
		$data['direccion']=mb_strtoupper($_POST['Direccion'],'UTF-8');	

		$lista=$this->comercial_model->agregarcomercial($data);
		redirect('comercial/index','refresh');
	}
	public function eliminarbd()
	{
		//-----BDD tabla-------formularioComercial.php
		$idcomercial=$_POST['idcomercial'];
		
		$this->comercial_model->eliminarcomercial($idcomercial);
		redirect('comercial/index','refresh');
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
		//-----BDD tabla-------formularioComercial.php
		$idcomercial=$_POST['idcomercial'];		
		$data['infocomercial']=$this->comercial_model->recuperarcomercial($idcomercial);
		
		$this->load->view('inc/headersbadmin2');
		$this->load->view('inc/sidebarsbadmin2');		
		$this->load->view('inc/topbarsbadmin2');
		$this->load->view('formulariomodificarComercial',$data); //---aqui
		$this->load->view('inc/creditossbadmin2'); 		
		$this->load->view('inc/footersbadmin2');
		/*
		$this->load->view('inc/header'); // cabecera de la tabla
		$this->load->view('formulariomodificar',$data); // arreglo o lista de la tabla=data
		$this->load->view('inc/footer'); // pie de la tabla*/
	}
	public function modificarbd()
	{
		$idcomercial=$_POST['idcomercial'];
		//-----BDD tabla-------formularioComercial.php
		$data['nombreComercial']=mb_strtoupper($_POST['NombreComercial'],'UTF-8'); 
		$data['telefono']=mb_strtoupper($_POST['Telefono'],'UTF-8');
		$data['direccion']=mb_strtoupper($_POST['Direccion'],'UTF-8');
		
		$data['fechaActualizacion']=date("Y-m-d (H:i:s)");

		$this->comercial_model->modificarcomercial($idcomercial, $data);
		redirect('comercial/index','refresh'); // cargamos la listaClientes	
	}
	public function deshabilitarbd()
	{
		$idcomercial=$_POST['idcomercial'];
		//--BDD tabla-----formularioComercial.php
		$data['estado']='0';
		$data['fechaActualizacion']=date("Y-m-d (H:i:s)");
		
		$this->comercial_model->modificarcomercial($idcomercial, $data);
		redirect('comercial/index','refresh'); // cargamos la listaComercial
	}
	// lista de tiendas deshabilitados
	public function deshabilitados()
	{
		$lista=$this->comercial_model->listacomercialesdeshabilitados();
		$data['comerciales']=$lista; // array relacional de tabla

		$this->load->view('inc/headersbadmin2');
		$this->load->view('inc/sidebarsbadmin2');		
		$this->load->view('inc/topbarsbadmin2');
		$this->load->view('listadeshabilitadosComerciales',$data);	// ---aqui
		$this->load->view('inc/creditossbadmin2'); 		
		$this->load->view('inc/footersbadmin2');
		
		/*$this->load->view('inc/header');
		$this->load->view('listadeshabilitados',$data);
		$this->load->view('inc/footer'); */
	}
	public function habilitarbd()
	{
		$idcomercial=$_POST['idcomercial'];
		//---BDD tabla-----formularioComercial.php
		$data['estado']='1';
		$data['fechaActualizacion']=date("Y-m-d (H:i:s)");
		
		$this->comercial_model->modificarcomercial($idcomercial, $data);
		redirect('comercial/deshabilitados','refresh'); // cargamos la listaTiendas	
	}
	//-- para reportes  Clase 4-VII-2022  desde aqui-------------------------------
	public function reportepdf()
	{
	    if($this->session->userdata('tipo')=='admin')
	    {
	        $lista=$this->comercial_model->listacomerciales();
	        $lista=$lista->result();
	                        
	        $this->pdf = new Pdf();
	        $this->pdf->AddPage('P'); //AddPage('P=hoja horizontal L=Hoja vertical')
	        $this->pdf->AliasNbPages();
	        $this->pdf->SetTitle("Lista comerciales");
	        $this->pdf->SetLeftMargin(15);
	        $this->pdf->SetRightMargin(15);
	        //$this->pdf->SetFillColor(210,210,210);

	        $this->pdf->SetFillColor(125,127,124);
			$this->pdf->SetTextColor(0,1,51);


	        $this->pdf->SetFont('Arial','BU',11);
	        $this->pdf->Cell(10);
	        $this->pdf->Cell(150,10,'LISTA COMERCIALES',0,0,'C',1);

	        $this->pdf->Ln(15);

	        $this->pdf->SetFont('Arial','B',10);
	        // SetFont([Family:Arial,Courier,Times,Symbol],[Style: ''=por defecto/regular, B=bold=Negrilla I=italic=Cursiva U=Underline=subrayado], size=tamaño=11)

/* cell(ancho,alto,impresion, borde (0=sin borde, 1=borde total y TBLR=TopBottomLeftRight), ln)*/
			// para atributos de la tabla
	        $this->pdf->Cell(10,5,'Nro','TBLR',0,'L',1);	        
	        $this->pdf->Cell(35,5,'NOMBRE','TBLR',0,'L',1);
	        $this->pdf->Cell(35,5,'TELEFONO','TBLR',0,'L',1);
	        $this->pdf->Cell(70,5,'DIRECCION','TBLR',0,'L',1);	        
	        $this->pdf->Ln(5); // hace salto de linea

	        $this->pdf->SetFont('Courier','',10); // Letras cursivas del reporte

	        $num=1;

	        foreach($lista as $row) 
	        {	// Variable -----BD------
	            
	            $Nombre=$row->nombreComercial;
	            $Telefono=$row->telefono;
	            $Direccion=$row->direccion;
	            
	            $this->pdf->Cell(10,5,$num,'TBLR',0,'L',0);	            
	            $this->pdf->Cell(35,5,$Nombre,'TBLR',0,'L',0);
	            $this->pdf->Cell(35,5,$Telefono,'TBLR',0,'L',0);
	            $this->pdf->Cell(70,5,$Direccion,'TBLR',0,'L',0);
	            
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