<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Usuario extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model("usuarioModel");
        $this->load->library('excel');
        $this->key = "my32lengthsupersecretnooneknows1";
        $this->iv = "helloworldhellow";
        $this->method = "aes-256-cbc";
    }

    function decrypts($text)
    {
        return openssl_decrypt($text, $this->method, $this->key, 0, $this->iv);
    }

    function encrypts($text)
    {
        return openssl_encrypt($text, $this->method, $this->key, 0, $this->iv);
    }

    public function login_usuario()
    {
        $this->load->view('template/header');
        $this->load->view('login');
        $this->load->view('template/footer');
    }

    public function salir()
    {
        $this->session->sess_destroy();
        $this->load->view('template/header');
        $this->load->view('login');
        $this->load->view('template/footer');
    }

    public function terminoWonderlic()
    {
        if ($this->session->userdata("usuario") != null && $this->session->userdata("hora") != null) {
            $usuario = $this->session->userdata("usuario");
            $hora = $this->session->userdata("hora");
            $idUsuario = $usuario[0]->id;
            $idToken = $hora["idToken"];
            $resultado = $this->usuarioModel->terminoWonderlic($idToken);
            if ($resultado == 1) {
                $this->usuarioModel->insertaLogUsuario($idUsuario, "Termino de Wonderlic por Tiempo", "4");
                //$this->session->sess_destroy();
                $this->load->view('template/headerUsuario');
                $this->load->view('usuario/index');
                $this->load->view('template/footer');
            } else {
                echo json_encode(array("msg" => "0", "mensaje" => "Error al finalizar."));
            }
        } else {
            $this->load->view('template/header');
            $this->load->view('login_usuario');
            $this->load->view('template/footer');
        }
    }

    public function terminoAlerta()
    {
        if ($this->session->userdata("usuario") != null && $this->session->userdata("hora") != null) {
            $usuario = $this->session->userdata("usuario");
            $hora = $this->session->userdata("hora");
            $idUsuario = $usuario[0]->id;
            $idToken = $hora["idToken"];
            $resultado = $this->usuarioModel->terminoAlerta($idToken);
            if ($resultado == 1) {
                $this->usuarioModel->insertaLogUsuario($idUsuario, "Termino de Alerta por Tiempo", "4");
                //$this->session->sess_destroy();
                $this->load->view('template/headerUsuario');
                $this->load->view('usuario/index');
                $this->load->view('template/footer');
            } else {
                echo json_encode(array("msg" => "0", "mensaje" => "Error al finalizar."));
            }
        } else {
            $this->load->view('template/header');
            $this->load->view('login_usuario');
            $this->load->view('template/footer');
        }
    }

    public function terminoCuenta()
    {
        if ($this->session->userdata("usuario") != null && $this->session->userdata("hora") != null) {
            $usuario = $this->session->userdata("usuario");
            $hora = $this->session->userdata("hora");
            $idUsuario = $usuario[0]->id;
            $idToken = $hora["idToken"];
            $resultado = $this->usuarioModel->terminoCuenta($idUsuario, $idToken);
            if ($resultado == 1) {
                $this->usuarioModel->insertaLogUsuario($idUsuario, "Termino de Sesion por Tiempo", "4");
                $this->session->sess_destroy();
                $this->load->view('template/header');
                $this->load->view('login_usuario');
                $this->load->view('template/footer');
            } else {
                echo json_encode(array("msg" => "0", "mensaje" => "Error al finalizar."));
            }
        } else {
            $this->load->view('template/header');
            $this->load->view('login_usuario');
            $this->load->view('template/footer');
        }
    }

    public function inicio_correo()
    {

        if (isset($_GET["token"])) {
            $user = $this->usuarioModel->iniciarSesionUsuarioCorreo($_GET["token"]);
            //print_r($user);
            if ($user != 0) {
                if ($user[0]->estado == "C") {
                    $this->session->set_userdata("usuario", $user);
                    $this->usuarioModel->insertaLogUsuario($user[0]->id, "Inicio de Sesion por Correo", "3");
                    header('Location: panel_usuario');
                }
            } else {
                echo "Token Invalido o ya ocupado. Prueba intentando <a href='" . base_url() . "login_usuario'>Aquí</a>";
            }
        } else {
            $this->load->view('template/header');
            $this->load->view('login');
            $this->load->view('template/footer');
        }
    }

    public function finalizar()
    {
        if ($this->session->userdata("usuario") != null && $this->session->userdata("hora") != null) {
            $usuario = $this->session->userdata("usuario");
            $hora = $this->session->userdata("hora");
            $idUsuario = $usuario[0]->id;
            $idToken = $hora["idToken"];
            $resultado = $this->usuarioModel->finalizar($idUsuario, $idToken);
            if ($resultado == 1) {
                $this->usuarioModel->insertaLogUsuario($idUsuario, "Termino todos los cuestionarios", "5");
                $this->session->sess_destroy();
                $this->load->view('template/header');
                $this->load->view('login');
                $this->load->view('template/footer');
            } else {
                echo json_encode(array("msg" => "0", "mensaje" => "Error al finalizar."));
            }
        } else {
            $this->load->view('template/header');
            $this->load->view('login');
            $this->load->view('template/footer');
        }
    }

    public function iniciarSesionUsuario()
    {
        $rut = $this->input->post("rut");
        $password = $this->input->post("password");
        $partes = explode("-", str_replace(".", "", $rut));
        $user = $this->usuarioModel->iniciarSesionUsuario($partes[0], $partes[1], $password);

        if ($user[0] == "ok") {
            if (count($user[1]) > 0) {

                if ($user[1][0]->estado == "A") {
                    $this->session->set_userdata("usuario", $user[1]);
                    $this->usuarioModel->insertaLogUsuario($user[1][0]->id, "Inicio de Sesion", "2");
                    echo json_encode(array("msg" => "usuario"));
                } else if ($user[1][0]->estado == "I") {
                    echo json_encode(array("msg" => "inactivo"));
                    $this->usuarioModel->insertaLogUsuario($user[1][0]->id, "Intento de Sesion (Usuario Inactivo)", "2");
                }else if ($user[1][0]->estado == "F") {
                    echo json_encode(array("msg" => "final"));
                    $this->usuarioModel->insertaLogUsuario($user[1][0]->id, "Intento de Sesion (Usuario Finalizado)", "2");
                } else {
                    echo json_encode(array("msg" => "error"));
                }
            } else {
                echo json_encode(array("msg" => "nada"));
            }
        } else {
            echo json_encode(array("msg" => "finalizado"));
        }
    }

    public function panel_usuario()
    {
        if ($this->session->userdata("usuario") != null && $this->session->userdata("hora") != null) {
            $usuario = $this->session->userdata("usuario");
            $hora = $this->session->userdata("hora");
            $idToken = $hora["idToken"];
            $this->usuarioModel->insertaLogUsuario($usuario[0]->id, "Entro a Menu", "2");
            $resultado = $this->usuarioModel->estadosCuestionarios($usuario[0]->id);
            
            $this->load->view('template/headerUsuario');
            $this->load->view('usuario/index', $resultado);
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
            $usuario = $this->session->userdata("usuario");
            $this->usuarioModel->insertaLogUsuario($usuario[0]->id, "Entro a Test Barrat", "2");
            $this->load->view('template/headerUsuario');
            $this->load->view('usuario/barrat');
            $this->load->view('template/footer');
        } else {
            $this->load->view('template/header');
            $this->load->view('index');
            $this->load->view('template/footer');
        }
    }

    public function wonderlic()
    {
        if ($this->session->userdata("usuario") != null && $this->session->userdata("hora") != null) {
            $usuario = $this->session->userdata("usuario");
            $hora = $this->session->userdata("hora");
            $idUsuario = $usuario[0]->id;
            $idToken = $hora["idToken"];

            $this->usuarioModel->insertaLogUsuario($idUsuario, "Entro a Test Wonderlic", "2");
            $respuesta = $this->usuarioModel->revisionWonderlic($idToken);
            $resultado = $this->usuarioModel->estadosCuestionarios($idUsuario);
            if (count($respuesta) > 1) {
                $this->load->view('template/headerUsuario');
                $this->load->view('usuario/wonderlic', array("respuesta" => $respuesta[1]));
                $this->load->view('template/footer');
            } else {
                $this->load->view('template/headerUsuario');
                $this->load->view('usuario/index',$resultado);
                $this->load->view('template/footer');
            }
        } else {
            $this->load->view('template/header');
            $this->load->view('index');
            $this->load->view('template/footer');
        }
    }

    public function alerta()
    {
        if ($this->session->userdata("usuario") != null && $this->session->userdata("hora") != null) {
            $usuario = $this->session->userdata("usuario");
            $hora = $this->session->userdata("hora");
            $idUsuario = $usuario[0]->id;
            $idToken = $hora["idToken"];
            $this->usuarioModel->insertaLogUsuario($idUsuario, "Entro a Test Alerta", "2");
            $respuesta = $this->usuarioModel->revisionAlerta($idToken);
            $resultado = $this->usuarioModel->estadosCuestionarios($idUsuario);
            if (count($respuesta) > 1) {
                $this->load->view('template/headerUsuario');
                $this->load->view('usuario/alerta', array("respuesta" => $respuesta[1]));
                $this->load->view('template/footer');
            } else {
                $this->load->view('template/headerUsuario');
                $this->load->view('usuario/index',$resultado);
                $this->load->view('template/footer');
            }
        } else {
            $this->load->view('template/header');
            $this->load->view('index');
            $this->load->view('template/footer');
        }
    }

    public function relacionesInterpersonales()
    {
        if ($this->session->userdata("usuario") != null) {
            $usuario = $this->session->userdata("usuario");
            $this->usuarioModel->insertaLogUsuario($usuario[0]->id, "Entro a Test Relaciones Interpersonales", "2");
            $this->load->view('template/headerUsuario');
            $this->load->view('usuario/relaciones');
            $this->load->view('template/footer');
        } else {
            $this->load->view('template/header');
            $this->load->view('index');
            $this->load->view('template/footer');
        }
    }

    public function disc()
    {
        if ($this->session->userdata("usuario") != null) {
            $usuario = $this->session->userdata("usuario");
            $this->usuarioModel->insertaLogUsuario($usuario[0]->id, "Entro a Test Disc", "2");
            $this->load->view('template/headerUsuario');
            $this->load->view('usuario/disc');
            $this->load->view('template/footer');
        } else {
            $this->load->view('template/header');
            $this->load->view('index');
            $this->load->view('template/footer');
        }
    }
}
