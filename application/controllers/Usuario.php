<?php

defined('BASEPATH') or exit('No direct script access allowed');



class Usuario extends CI_Controller

{

    public function __construct()

    {

        parent::__construct();

        $this->load->model("usuarioModel");

        $this->load->library('excel');
    }



    public function login_usuario()

    {

       

            $this->load->view('template/header');

            $this->load->view('login');

            $this->load->view('template/footer');
   

         
    }

    public function iniciarSesionUsuario()
    {




        $rut = $this->input->post("rut");

        $password = $this->input->post("password");

        $partes = explode("-", str_replace(".", "", $rut));

        $user = $this->usuarioModel->iniciarSesionUsuario($partes[0], $partes[1], $password);

        if (count($user) > 0) {

            if ($user[0]->estado == "A") {

                $this->session->set_userdata("usuario", $user);

                echo json_encode(array("msg" => "usuario"));
            } else if ($user[0]->estado == "I") {

                echo json_encode(array("msg" => "inactivo"));
            } else {

                echo json_encode(array("msg" => "error"));
            }
        } else {

            echo json_encode(array("msg" => "nada"));
        }
    }



public function panel_usuario(){


    if ($this->session->userdata("usuario") != null) {

        $this->load->view('template/headerUsuario');

        $this->load->view('usuario/index');

        $this->load->view('template/footer');

    } else {

        $this->load->view('template/header');

        $this->load->view('login');

        $this->load->view('template/footer');

    }





}




public function barrat()

{

    if ($this->session->userdata("usuario") != null) {

        $this->load->view('template/header');

        $this->load->view('usuario/barrat');

        $this->load->view('template/footer');

    } else {

        $this->load->view('template/header');

        $this->load->view('index');

        $this->load->view('template/footer');

    }

}





}
