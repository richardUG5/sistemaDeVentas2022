<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios extends CI_Controller {
	
	public function index()
	{
		$data['msg']=$this->uri->segment(3);

		if ($this->session->userdata('login')) 
		{
			// El user ya esta logueado
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
	public function validar()
    {
        $login=$_POST['login'];
        $password=md5($_POST['password']); // encriptamos contraseña

        $consulta=$this->usuario_model->validar($login,$password);

        if ($consulta->num_rows()>0) // si la cantidad de filas es mayor a cero
            {
                // Tenemos una validacion efectiva
                foreach ($consulta->result() as $row) 
                {
                    $this->session->set_userdata('idusuario',$row->idUsuario);
                    $this->session->set_userdata('login',$row->login); // -----vista login
                    $this->session->set_userdata('tipo',$row->tipo);
                    redirect('usuarios/panel','refresh'); //redireccionamos 
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
               $this->session->sess_destroy(); // destruimos la session              
               redirect('usuarios/index/1','refresh');               
        }




	public function prueba()
	{
		$query=$this->db->get('empleados');
		$execonsulta=$query->result();
		print_r($execonsulta);
	}
}
