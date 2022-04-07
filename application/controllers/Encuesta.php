<?php

defined('BASEPATH') or exit('No direct script access allowed');



class Encuesta extends CI_Controller
{

    public function __construct()

    {
        parent::__construct();
        $this->load->model("encuestaModel");
    }



    public function enviarBarrat()
    {
        if ($this->session->userdata("usuario") != null) {
            if ($_POST["respuesta"] == "escorrecto") {
                $user = $this->session->userdata("usuario");
                $idUsuario = $user[0]->id;
                $resultado = $this->encuestaModel->enviarBarrat($_POST, $idUsuario);
                if ($resultado == "1") {
                    echo json_encode(array("resultado" => 1, "mensaje" => "Test finalizado, muchas gracias."));
                } else if ($resultado == "repetido") {
                    echo json_encode(array("resultado" => 0, "mensaje" => "Usted ya realizo este test con anterioridad."));
                } else {
                    echo json_encode(array("resultado" => 0, "mensaje" => "Error al finalizar el test, comuníquese con el administrador."));
                }
            }
        } else {
            $this->load->view('template/header');
            $this->load->view('index');
            $this->load->view('template/footer');
        }
    }

    public function enviarWonderlic()
    {
        if ($this->session->userdata("usuario") != null) {
            if ($_POST["respuesta"] == "escorrecto") {

                $user = $this->session->userdata("usuario");
                $idUsuario = $user[0]->id;
                $resultado = $this->encuestaModel->enviarWonderlic($_POST, $idUsuario);
                if ($resultado == "1") {
                    echo json_encode(array("resultado" => 1, "mensaje" => "Test finalizado, muchas gracias."));
                } else if ($resultado == "repetido") {
                    echo json_encode(array("resultado" => 0, "mensaje" => "Usted ya realizo este test con anterioridad."));
                } else {
                    echo json_encode(array("resultado" => 0, "mensaje" => "Error al finalizar el test, comuníquese con el administrador."));
                }
            }
        } else {
            $this->load->view('template/header');
            $this->load->view('index');
            $this->load->view('template/footer');
        }
    }

    public function enviarAlerta()
    {
        if ($this->session->userdata("usuario") != null) {
            if ($_POST["respuesta"] == "escorrecto") {
                $user = $this->session->userdata("usuario");
                $idUsuario = $user[0]->id;
                $resultado = $this->encuestaModel->enviarAlerta($_POST, $idUsuario);
                if ($resultado == "1") {
                    echo json_encode(array("resultado" => 1, "mensaje" => "Test finalizado, muchas gracias."));
                } else if ($resultado == "repetido") {
                    echo json_encode(array("resultado" => 0, "mensaje" => "Usted ya realizo este test con anterioridad."));
                } else {
                    echo json_encode(array("resultado" => 0, "mensaje" => "Error al finalizar el test, comuníquese con el administrador."));
                }
            }
        } else {
            $this->load->view('template/header');
            $this->load->view('index');
            $this->load->view('template/footer');
        }
    }

    public function enviarRelacionesInterpersonales()
    {
        if ($this->session->userdata("usuario") != null) {
            if ($_POST["respuesta"] == "escorrecto") {
                $user = $this->session->userdata("usuario");
                $idUsuario = $user[0]->id;
                $resultado = $this->encuestaModel->enviarRelacionesInterpersonales($_POST, $idUsuario);
                if ($resultado == "1") {
                    echo json_encode(array("resultado" => 1, "mensaje" => "Test finalizado, muchas gracias."));
                } else if ($resultado == "repetido") {
                    echo json_encode(array("resultado" => 0, "mensaje" => "Usted ya realizo este test con anterioridad."));
                } else {
                    echo json_encode(array("resultado" => 0, "mensaje" => "Error al finalizar el test, comuníquese con el administrador."));
                }
            }
        } else {
            $this->load->view('template/header');
            $this->load->view('index');
            $this->load->view('template/footer');
        }
    }

    public function enviarDisc()
    {
        if ($this->session->userdata("usuario") != null) {
            if ($_POST["respuesta"] == "escorrecto") {
                //echo "<pre>";
                //print_r($_POST);
                //echo "</pre>";
                $user = $this->session->userdata("usuario");
                $idUsuario = $user[0]->id;
                $resultado = $this->encuestaModel->enviarDisc($_POST, $idUsuario);
                if (count($resultado) == 2) {
                    echo json_encode(array("resultado" => 0, "mensaje" => $resultado[1]));
                } else {
                    if ($resultado == "1") {
                        echo json_encode(array("resultado" => 1, "mensaje" => "Test finalizado, muchas gracias."));
                    } else if ($resultado == "repetido") {
                        echo json_encode(array("resultado" => 0, "mensaje" => "Usted ya realizo este test con anterioridad."));
                    } else {
                        echo json_encode(array("resultado" => 0, "mensaje" => "Error al finalizar el test, comuníquese con el administrador."));
                    }
                }
            }
        } else {
            $this->load->view('template/header');
            $this->load->view('index');
            $this->load->view('template/footer');
        }
    }

    public function revisionWonderlic()
    {
        if ($this->session->userdata("usuario") != null) {
            $idToken  = $this->input->post("idToken");
            $respuesta = $this->encuestaModel->revisionWonderlic($idToken);
            if (count($respuesta) > 1) {
                $this->load->view('template/headerUsuario');
                $this->load->view('usuario/wonderlic', array("respuesta" => $respuesta[1]));
                $this->load->view('template/footer');
                //echo json_encode(array("msg" => "ok", "horario" => $respuesta[1]));
            } else {
                echo json_encode(array("msg" => "error", "mensaje" => "panel_usuario"));
            }
        } else {
            $this->load->view('template/header');
            $this->load->view('index');
            $this->load->view('template/footer');
        }
    }
}
