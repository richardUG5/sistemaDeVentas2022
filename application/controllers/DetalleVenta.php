<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DetalleVenta extends CI_Controller {
	
	public function index()
	{
		$lista=$this->detalleventa_model->listadetalleventas();
		$data['detalleventas']=$lista;

		$this->load->view('inc/headersbadmin2');
		$this->load->view('inc/sidebarsbadmin2');		
		$this->load->view('inc/topbarsbadmin2');
		$this->load->view('listaDetalleVenta',$data);
		$this->load->view('inc/creditossbadmin2'); 		
		$this->load->view('inc/footersbadmin2');

		/*$this->load->view('inc/header'); // cabecera de la tabla
		$this->load->view('listaP',$data); // lista de la tabla
		$this->load->view('inc/footer'); // pie de la tabla */
	}
	public function agregar()
	{
		$lista=$this->venta_model->listaVentas(); // pediente
		$data['ven']=$lista;

		$listau=$this->producto_model->listaProductos(); // pendiente
		$data['pro']=$listap;

		$this->load->view('inc/headersbadmin2');
		$this->load->view('inc/sidebarsbadmin2');		
		$this->load->view('inc/topbarsbadmin2');
		$this->load->view('formularioDetalleVenta',$data);		
		$this->load->view('inc/creditossbadmin2'); 		
		$this->load->view('inc/footersbadmin2');
		/*$this->load->view('inc/header');
		$this->load->view('formularioP');
		$this->load->view('inc/footer');*/
	}

	public function agregarbd()
	{
		//-----BDD tabla-------formularioP.php		
		$data['idVenta']=$_POST['idVenta'];
		$data['idProducto']=$_POST['idProducto'];
		$data['cantidad']=$_POST['Cantidad'];
		$data['precioUnitario']=$_POST['Precio'];		

		//$data['fechaRegistro']=$_POST['FechaRegistro'];
		//$data['fechaActualizacion']=$_POST['FechaActualizacion'];

		$lista=$this->venta_model->agregarventa($data);
		redirect('venta/index','refresh');
	}
	public function modificar()
	{
		//-----BDD tabla-------formulario.php
		$idventa=$_POST['idventa'];		
		$data['infoventa']=$this->venta_model->recuperarventa($idventa);

		$lista=$this->cliente_model->listaClientes();
		$data['cli']=$lista;

		$listau=$this->usuario_model->listaUsuarios();
		$data['usu']=$listau;

		$this->load->view('inc/headersbadmin2');
		$this->load->view('inc/sidebarsbadmin2');		
		$this->load->view('inc/topbarsbadmin2');
		$this->load->view('formulariomodificarVenta',$data);		
		$this->load->view('inc/creditossbadmin2'); 		
		$this->load->view('inc/footersbadmin2');
		
		/* $this->load->view('inc/header'); // cabecera de la tabla
		$this->load->view('formulariomodificarP',$data); // arreglo o lista de la tabla=data
		$this->load->view('inc/footer'); // pie de la tabla */
	}

	public function modificarbd()
	{
		$idventa=$_POST['idventa'];
		//-----BDD tabla-------formulario.php
		$data['fechaVenta']=$_POST['Fecha'];
		$data['total']=$_POST['Total'];
		$data['idCliente']=$_POST['idCliente'];
		$data['idUsuario']=$_POST['idUsuario'];

		$data['fechaActualizacion']=date("Y-m-d (H:i:s)");

		$this->venta_model->modificarventa($idventa, $data);	

		redirect('venta/index','refresh'); // cargamos la lista	
	}
	public function deshabilitarbd()
	{
		$idventa=$_POST['idventa'];
		//-----BDD tabla-------formulario.php
		$data['estado']='0';
		$data['fechaActualizacion']=date("Y-m-d (H:i:s)");
		
		$this->venta_model->modificarventa($idventa, $data);	

		redirect('venta/index','refresh'); // cargamos la lista	
	}
	// lista de productos deshabilitados
	public function deshabilitados()
	{
		$lista=$this->venta_model->listaventasdeshabilitados();
		$data['ventas']=$lista; // array relacional de tabla productos

		$this->load->view('inc/headersbadmin2');
		$this->load->view('inc/sidebarsbadmin2');		
		$this->load->view('inc/topbarsbadmin2');
		$this->load->view('listadeshabilitadosVentas',$data);		
		$this->load->view('inc/creditossbadmin2'); 		
		$this->load->view('inc/footersbadmin2');

		/*$this->load->view('inc/header');
		$this->load->view('listadeshabilitadosP',$data); // 
		$this->load->view('inc/footer'); */
	}

	public function habilitarbd()
	{
		$idventa=$_POST['idventa'];
		//-----BDD tabla-------formulario.php
		$data['estado']='1';
		$data['fechaActualizacion']=date("Y-m-d (H:i:s)");
		
		$this->venta_model->modificarventa($idventa, $data);	

		redirect('venta/deshabilitados','refresh'); // cargamos la lista	
	}
	//---------------para reportes  desde aqui-------------------------------
	public function reportepdf()
	{
	    if($this->session->userdata('tipo')=='admin')
	    {
	        $lista=$this->venta_model->listaventas();
	        $lista=$lista->result();
	                        
	        $this->pdf = new Pdf();
	        $this->pdf->AddPage('P'); //AddPage('P=hoja horizontal L=Hoja vertical')
	        $this->pdf->AliasNbPages();
	        $this->pdf->SetTitle("Lista de ventas");
	        $this->pdf->SetLeftMargin(15);
	        $this->pdf->SetRightMargin(15);
	        //$this->pdf->SetFillColor(210,210,210);

	        $this->pdf->SetFillColor(125,127,124);
			$this->pdf->SetTextColor(0,1,51);


	        $this->pdf->SetFont('Arial','BU',11);
	        $this->pdf->Cell(10);
	        $this->pdf->Cell(150,10,'LISTA DE VENTAS',0,0,'C',1);

	        $this->pdf->Ln(15);

	        $this->pdf->SetFont('Arial','B',10);
	        // SetFont([Family:Arial,Courier,Times,Symbol],[Style: ''=por defecto/regular, B=bold=Negrilla I=italic=Cursiva U=Underline=subrayado], size=tamaño=11)

/* cell(ancho,alto,impresion, borde (0=sin borde, 1=borde total y TBLR=TopBottomLeftRight), ln)*/
			// para atributos de la tabla
	        $this->pdf->Cell(10,5,'Nro','TBLR',0,'L',1);	        	        	        
	        $this->pdf->Cell(35,5,'FECHA VENTA','TBLR',0,'L',1);
	        $this->pdf->Cell(35,5,'TOTAL','TBLR',0,'L',1);
	        $this->pdf->Cell(35,5,'CLIENTE','TBLR',0,'L',1);
	        $this->pdf->Cell(35,5,'USUARIO','TBLR',0,'L',1);
	        
	        $this->pdf->Ln(5); // hace salto de linea

	        $this->pdf->SetFont('Courier','',10); // Letras cursivas del reporte

	        $num=1;

	        foreach($lista as $row) 
	        {	// Variable -----BD-------------------------------
	            $Fecha=$row->fechaVenta;
	            $Total=$row->total;
	            $Cliente=$row->nit_ci;
	            $Usuario=$row->nombres;
	            
	            $this->pdf->Cell(10,5,$num,'TBLR',0,'L',0);	            
	            $this->pdf->Cell(35,5,$Fecha,'TBLR',0,'L',0);
	            $this->pdf->Cell(35,5,$Total,'TBLR',0,'L',0);
	            $this->pdf->Cell(35,5,$Cliente,'TBLR',0,'L',0);
	            $this->pdf->Cell(35,5,$Usuario,'TBLR',0,'L',0);
	            	            
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