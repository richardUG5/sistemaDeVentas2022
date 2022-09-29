<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios extends CI_Controller {
	
	public function index()
	{
		$data['msg']=$this->uri->segment(3);

		if ($this->session->userdata('login')) 
		{
			// El usuario ya esta logueado
            redirect('usuarios/panel','refresh');
		}
		else
		{
			// usuario no esta logueado
            $this->load->view('inc/header');
            $this->load->view('login',$data);
            $this->load->view('inc/footer');
		}		
	}
    // desde aqui ----------------------------------------------------------------------------------

    // recuperamos la lista de usuarios
    public function index1()
    {
        $lista=$this->usuario_model->listausuarios();
        $data['usuarios']=$lista; // array relacional de tabla

        $this->load->view('inc/headersbadmin2');
        $this->load->view('inc/sidebarsbadmin2');       
        $this->load->view('inc/topbarsbadmin2');
        $this->load->view('listaUsuario',$data);    // aqui   
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
        $lista=$this->comercial_model->listaComerciales();
        $data['com']=$lista;

        $this->load->view('inc/headersbadmin2');
        $this->load->view('inc/sidebarsbadmin2');       
        $this->load->view('inc/topbarsbadmin2');
        $this->load->view('formularioUsuario',$data); // aqui
        $this->load->view('inc/creditossbadmin2');      
        $this->load->view('inc/footersbadmin2');
        /*$this->load->view('inc/header');
        $this->load->view('formulario');
        $this->load->view('inc/footer');*/
    }


    public function agregarbd()
    {
        //-----BDD tabla-------formulario.php
        //$data['foto']=$_POST['Foto'];
        $data['nombres']=mb_strtoupper($_POST['Nombres'],'UTF-8');
        $data['primerApellido']=mb_strtoupper($_POST['Apellido1'],'UTF-8');
        $data['segundoApellido']=mb_strtoupper($_POST['Apellido2'],'UTF-8');
        $data['fechaNacimiento']=$_POST['FechaNac']; // -----aqui
        $data['telefono']=$_POST['Telefono'];
        $data['login']=$_POST['Login'];
        $data['password']=$_POST['Password'];
        $data['tipo']=$_POST['Tipo'];
        $data['idComercial']=$_POST['idComercial'];

        $lista=$this->usuario_model->agregarusuario($data);
        redirect('usuarios/index1','refresh');
    }
/* para eliminar definitivamente-------------------------------------
    public function eliminarbd()
    {
        //-----BDD tabla-------formulario.php
        $idusuario=$_POST['idusuario'];
        
        $this->usuario_model->eliminarusuario($idusuario);
        redirect('usuarios/index1','refresh');
    } */

// Begin para transaccion -------------------------------------------------
    public function vender()
    {
        //-----BDD tabla-------formulario.php
        $data['infoclientes']=$this->usuario_model->listaClientes();
        $data['infousuarios']=$this->usuario_model->listaUsers();

        $this->load->view('inc/headersbadmin2'); // archivos de cabecera
        $this->load->view('inc/sidebarsbadmin2');       
        $this->load->view('inc/topbarsbadmin2');
        $this->load->view('venderform',$data);        // contenido
        $this->load->view('inc/creditossbadmin2');      
        $this->load->view('inc/footersbadmin2'); // archivos de pie
    }
    public function venderbd()
    {
        //-----BDD tabla-------formulario.php
        $data['nombres']=$_POST['Nombres'];
        $data['primerApellido']=$_POST['PrimerApellido'];
        $data['telefono']=$_POST['Telefono'];
        $idCliente=$_POST['idCliente'];
        $idUsuario=$_POST['idUsuario'];

        $this->usuario_model->venderUser($idCliente,$idUsuario,$data);
        redirect('usuarios/index1','refresh');
    }
// End ------termina aqui transaccion ----------------------------------

    public function modificar()
    {
        //-----BDD tabla-------formulario.php
        $idusuario=$_POST['idusuario'];       
        $data['infousuario']=$this->usuario_model->recuperarusuario($idusuario);

        $lista=$this->comercial_model->listaComerciales();
        $data['com']=$lista;
        
        $this->load->view('inc/headersbadmin2');
        $this->load->view('inc/sidebarsbadmin2');       
        $this->load->view('inc/topbarsbadmin2');
        $this->load->view('formulariomodificarUsuario',$data);     
        $this->load->view('inc/creditossbadmin2');      
        $this->load->view('inc/footersbadmin2');
        /*
        $this->load->view('inc/header'); // cabecera de la tabla
        $this->load->view('formulariomodificar',$data); // arreglo o lista de la tabla=data
        $this->load->view('inc/footer'); // pie de la tabla*/
    }

    public function modificarbd()
    {
        $idusuario=$_POST['idusuario'];
        //-----BDD tabla-------formulario.php
        //$data['foto']=$_POST['Foto'];
        $data['nombres']=mb_strtoupper($_POST['Nombres'],'UTF-8');
        $data['primerApellido']=mb_strtoupper($_POST['Apellido1'],'UTF-8'); 
        $data['segundoApellido']=mb_strtoupper($_POST['Apellido2'],'UTF-8'); 
        $data['fechaNacimiento']=$_POST['FechaNac']; 
        $data['telefono']=$_POST['Telefono'];
        $data['login']=$_POST['Login'];
        $data['password']=$_POST['Password'];
        $data['tipo']=$_POST['Tipo'];
        $data['idComercial']=$_POST['idComercial'];

        $data['fechaActualizacion']=date("Y-m-d (H:i:s)");

        $this->usuario_model->modificarusuario($idusuario, $data);
        redirect('usuarios/index1','refresh'); // cargamos la lista  
    }

    public function deshabilitarbd()
    {
        $idusuario=$_POST['idusuario'];
        //-----BDD tabla-------formulario.php
        $data['estado']='0';
        $data['fechaActualizacion']=date("Y-m-d (H:i:s)");
        
        $this->usuario_model->modificarusuario($idusuario, $data);
        redirect('usuarios/index1','refresh'); // cargamos la lista  
    }
    // lista de usuarios deshabilitados
    public function deshabilitados()
    {
        $lista=$this->usuario_model->listausuariosdeshabilitados();
        $data['usuarios']=$lista; // array relacional de tabla

        $this->load->view('inc/headersbadmin2');
        $this->load->view('inc/sidebarsbadmin2');       
        $this->load->view('inc/topbarsbadmin2');
        $this->load->view('listadeshabilitadosUsuarios',$data);  // aqui
        $this->load->view('inc/creditossbadmin2');      
        $this->load->view('inc/footersbadmin2');
        
        /*$this->load->view('inc/header');
        $this->load->view('listadeshabilitados',$data);
        $this->load->view('inc/footer'); */
    }

    public function habilitarbd()
    {
        $idusuario=$_POST['idusuario'];
        //-----BDD tabla-------formulario.php
        $data['estado']='1';
        $data['fechaActualizacion']=date("Y-m-d (H:i:s)");
        
        $this->usuario_model->modificarusuario($idusuario, $data);
        redirect('usuarios/deshabilitados','refresh'); // cargamos la lista 
    }

    //-- para reportes  Clase 4-VII-2022  desde aqui-------------------------------
    public function reportepdf()
    {
        if($this->session->userdata('tipo')=='admin')
        {
            $lista=$this->usuario_model->listausuarios();
            $lista=$lista->result();
                            
            $this->pdf = new Pdf();
            $this->pdf->AddPage('P'); //AddPage('P=hoja horizontal L=Hoja vertical')
            $this->pdf->AliasNbPages();
            $this->pdf->SetTitle("Lista de usuarios");
            $this->pdf->SetLeftMargin(15);
            $this->pdf->SetRightMargin(15);
            //$this->pdf->SetFillColor(210,210,210);

            $this->pdf->SetFillColor(125,127,124);
            $this->pdf->SetTextColor(0,1,51);


            $this->pdf->SetFont('Arial','BU',11);
            $this->pdf->Cell(10);
            $this->pdf->Cell(150,10,'LISTA DE USUARIOS',0,0,'C',1);

            $this->pdf->Ln(15);

            $this->pdf->SetFont('Arial','B',10);
            // SetFont([Family:Arial,Courier,Times,Symbol],[Style: ''=por defecto/regular, B=bold=Negrilla I=italic=Cursiva U=Underline=subrayado], size=tamaño=11)

/* cell(ancho,alto,impresion, borde (0=sin borde, 1=borde total y TBLR=TopBottomLeftRight), ln)*/
            // para atributos de la tabla
            $this->pdf->Cell(10,5,'Nro','TBLR',0,'L',1);
            $this->pdf->Cell(35,5,'NOMBRES','TBLR',0,'L',1);
            $this->pdf->Cell(25,5,'APELLIDO1','TBLR',0,'L',1);
            $this->pdf->Cell(25,5,'APELLIDO2','TBLR',0,'L',1);
            $this->pdf->Cell(27,5,'FECHA_NAC','TBLR',0,'L',1);
            $this->pdf->Cell(25,5,'TELEFONO','TBLR',0,'L',1);
            $this->pdf->Cell(35,5,'LOGIN','TBLR',0,'L',1);
            $this->pdf->Cell(35,5,'PASSWORD','TBLR',0,'L',1);
            $this->pdf->Cell(35,5,'TIPO','TBLR',0,'L',1);
            $this->pdf->Ln(5); // hace salto de linea

            $this->pdf->SetFont('Courier','',10); // Letras cursivas del reporte

            $num=1;

            foreach($lista as $row) 
            {   // Variable -----------BD-----------
                $Nombres=$row->nombres;
                $Apellido1=$row->primerApellido;
                $Apellido2=$row->segundoApellido;
                $Fecha_Nac=$row->fechaNacimiento;
                $Telefono=$row->telefono;
                $Login=$row->login;
                $Password=$row->password;
                $Tipo=$row->tipo;
                
                $this->pdf->Cell(10,5,$num,'TBLR',0,'L',0);
                $this->pdf->Cell(35,5,$Nombres,'TBLR',0,'L',0);
                $this->pdf->Cell(25,5,$Apellido1,'TBLR',0,'L',0);
                $this->pdf->Cell(25,5,$Apellido2,'TBLR',0,'L',0);
                $this->pdf->Cell(27,5,$Fecha_Nac,'TBLR',0,'L',0);
                $this->pdf->Cell(25,5,$Telefono,'TBLR',0,'L',0);
                $this->pdf->Cell(35,5,$Login,'TBLR',0,'L',0);
                $this->pdf->Cell(35,5,$Password,'TBLR',0,'L',0);
                $this->pdf->Cell(35,5,$Tipo,'TBLR',0,'L',0);
                
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

    // hasta aqui ------------------------------------------------------------------------------------

	public function validar()
    {
        $login=$_POST['login'];
        $password=md5($_POST['password']); // encriptamos contraseña

        $consulta=$this->usuario_model->validar($login,$password);

        if ($consulta->num_rows()>0) // si la cantidad de filas es mayor a cero
            {
                // Tenemos una validacion efectiva o exitosa
                foreach ($consulta->result() as $row) 
                {
                    $this->session->set_userdata('idusuario',$row->idUsuario);
                    $this->session->set_userdata('login',$row->login); // -----vista login
                    $this->session->set_userdata('tipo',$row->tipo);
                    redirect('producto/index','refresh'); //redireccionamos producto dsd inicio session
                }                        
            }
            else
            {
                // no hay validacion efectiva y redirigimos a login
                redirect('usuarios/index/2','refresh');
            }
        }
        public function panel()
        {
               if($this->session->userdata('login'))
                {
                    if($this->session->userdata('tipo')=="admin")
                    {
                        // cargo panel admin --- usuario ya sta logueado
                        redirect('empleado/index','refresh');
                    }
                    else
                    {
                        // cargo panel guest = invitado
                    	redirect('empleado/guest','refresh');            
                    }
                        
                }
                else
                {
                        // usuario no esta logueado
                       redirect('usuarios/index/3','refresh');
                } 
        }

        public function logout()
        {
               $this->session->sess_destroy(); // destruimos la session o  cerramos sesion            
               redirect('usuarios/index/1','refresh');               
        }

	public function prueba()
	{
		$query=$this->db->get('empleados');
		$execonsulta=$query->result();
		print_r($execonsulta);
	}
}