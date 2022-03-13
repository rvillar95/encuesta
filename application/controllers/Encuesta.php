<?php

defined('BASEPATH') or exit('No direct script access allowed');



class Administrador extends CI_Controller

{

    public function __construct()

    {

        parent::__construct();

        $this->load->model("adminModel");

        $this->load->library('excel');

    }



    public function panel_administrador()

    {

        if ($this->session->userdata("usuario") != null) {

            $this->load->view('template/headerUser');

            $this->load->view('usuario/index');

            $this->load->view('template/footer');

        } else {

            $this->load->view('template/header');

            $this->load->view('index');

            $this->load->view('template/footer');

        }

    }



}

