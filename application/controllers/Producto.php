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
		$this->load->view('listaP',$data);
		$this->load->view('inc/creditossbadmin2'); 		
		$this->load->view('inc/footersbadmin2');

		/*$this->load->view('inc/header'); // cabecera de la tabla
		$this->load->view('listaP',$data); // lista de la tabla
		$this->load->view('inc/footer'); // pie de la tabla */
	}
	public function agregar()
	{
		$lista=$this->categoria_model->listaCategorias();
		$data['cat']=$lista;

		$listam=$this->medida_model->listaMedidas();
		$data['med']=$listam;

		$this->load->view('inc/headersbadmin2');
		$this->load->view('inc/sidebarsbadmin2');		
		$this->load->view('inc/topbarsbadmin2');
		$this->load->view('formularioP',$data);		
		$this->load->view('inc/creditossbadmin2'); 		
		$this->load->view('inc/footersbadmin2');
		/*$this->load->view('inc/header');
		$this->load->view('formularioP');
		$this->load->view('inc/footer');*/
	}

	public function agregarbd()
	{
		//-----BDD tabla-------formularioP.php
		$data['descripcion']=mb_strtoupper($_POST['Descripcion'], 'UTF-8');
		$data['color']=mb_strtoupper($_POST['Color'], 'UTF-8');
		$data['precioBase']=$_POST['Precio'];
		$data['idCategoria']=$_POST['idCategoria'];
		$data['idMedida']=$_POST['idMedida'];

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

		$lista=$this->categoria_model->listaCategorias();
		$data['cat']=$lista;

		$listam=$this->medida_model->listaMedidas();
		$data['med']=$listam;

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
		$data['descripcion']=mb_strtoupper($_POST['Descripcion'], 'UTF-8');
		$data['color']=mb_strtoupper($_POST['Color'], 'UTF-8');
		$data['precioBase']=$_POST['Precio'];			
		$data['idCategoria']=$_POST['idCategoria'];
		$data['idMedida']=$_POST['idMedida'];
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
	//---------------para reportes  desde aqui-------------------------------
	public function reportepdf()
	{
	    if($this->session->userdata('tipo')=='admin')
	    {
	        $lista=$this->producto_model->listaproductos();
	        $lista=$lista->result();
	                        
	        $this->pdf = new Pdf();
	        $this->pdf->AddPage('P'); //AddPage('P=hoja horizontal L=Hoja vertical')
	        $this->pdf->AliasNbPages();
	        $this->pdf->SetTitle("Lista de productos");
	        $this->pdf->SetLeftMargin(15);
	        $this->pdf->SetRightMargin(15);
	        //$this->pdf->SetFillColor(210,210,210);

	        $this->pdf->SetFillColor(125,127,124);
			$this->pdf->SetTextColor(0,1,51);


	        $this->pdf->SetFont('Arial','BU',11);
	        $this->pdf->Cell(10);
	        $this->pdf->Cell(150,10,'LISTA DE PRODUCTOS',0,0,'C',1);

	        $this->pdf->Ln(15);

	        $this->pdf->SetFont('Arial','B',10);
	        // SetFont([Family:Arial,Courier,Times,Symbol],[Style: ''=por defecto/regular, B=bold=Negrilla I=italic=Cursiva U=Underline=subrayado], size=tamaño=11)

/* cell(ancho,alto,impresion, borde (0=sin borde, 1=borde total y TBLR=TopBottomLeftRight), ln)*/
			// para atributos de la tabla
	        $this->pdf->Cell(10,5,'Nro','TBLR',0,'L',1);	        	        
	        $this->pdf->Cell(35,5,'DESCRIPCION','TBLR',0,'L',1);
	        $this->pdf->Cell(35,5,'COLOR','TBLR',0,'L',1);
	        $this->pdf->Cell(25,5,'PRECIO','TBLR',0,'L',1);
	        $this->pdf->Cell(35,5,'CATEGORIA','TBLR',0,'L',1);
	        $this->pdf->Cell(35,5,'UNIDAD MEDIDA','TBLR',0,'L',1);
	        
	        $this->pdf->Ln(5); // hace salto de linea

	        $this->pdf->SetFont('Courier','',10); // Letras cursivas del reporte

	        $num=1;

	        foreach($lista as $row) 
	        {	// Variable -----------BD------	            
	            $Descripcion=$row->descripcion;
	            $Color=$row->color;
	            $Precio=$row->precioBase;
	            $Categoria=$row->nombreCategoria;
	            $Medida=$row->unidadMedida;
	            
	            $this->pdf->Cell(10,5,$num,'TBLR',0,'L',0);	            
	            $this->pdf->Cell(35,5,$Descripcion,'TBLR',0,'L',0);
	            $this->pdf->Cell(35,5,$Color,'TBLR',0,'L',0);
	            $this->pdf->Cell(25,5,$Precio,'TBLR',0,'L',0);
	            $this->pdf->Cell(35,5,$Categoria,'TBLR',0,'L',0);
	            $this->pdf->Cell(35,5,$Medida,'TBLR',0,'L',0);
	            	            
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
	// ---------- hasta aqui-------------------------------
}