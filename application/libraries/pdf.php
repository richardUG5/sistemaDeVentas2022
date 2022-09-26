<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
    require_once APPPATH."/third_party/fpdf/fpdf.php";
    class Pdf extends FPDF {		
		
        public function Header(){
            //si se requiere agregar una imagen
            //$this->Image('ruta de la imagen',x,y,ancho,alto);

            $ruta=base_url()."uploads/emp2.png";
            //$this->Image($ruta,0,0,211,297);
            $this->Image($ruta,50,70,100,100);

            $this->SetFont('Arial','B',10);
            $this->Cell(30);
            $this->Cell(120,10,'SISTEMA WEB DE VENTAS PARA UNA TIENDA COMERCIAL DE CERAMICA',0,0,'C');
            $this->Ln('10');
       }

	   public function Footer(){
           $this->SetY(-15);
           $this->SetFont('Arial','I',7);

           $this->Cell(0,10,'Pag. '.$this->PageNo().'/{nb}',0,0,'R');

      }
}
?>