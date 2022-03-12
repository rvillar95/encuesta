<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{



    public function __construct()
    {
        parent::__construct();
        $this->load->model("indexModel");
    }

    public function index()
    {
        $this->load->view('template/header');
        $this->load->view('index');
        $this->load->view('template/footer');
    }

    public function iniciarSesionAdministrador()
    {
        $rut = $this->input->post("rut");
        $password = $this->input->post("password");
        $partes = explode("-", str_replace(".", "", $rut));
        $user = $this->indexModel->iniciarSesionAdministrador($partes[0], $partes[1], $password);
        if (count($user) > 0) {
            if ($user[0]->estado == "A") {
                $this->session->set_userdata("administrador", $user);
                echo json_encode(array("msg" => "administrador"));
            } else if ($user[0]->estado == "I") {
                echo json_encode(array("msg" => "inactivo"));
            } else {
                echo json_encode(array("msg" => "error"));
            }
        } else {
            echo json_encode(array("msg" => "nada"));
        }
    }
}
