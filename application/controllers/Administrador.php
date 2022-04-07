<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Administrador extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("adminModel");
        $this->load->library('excel');
        $this->load->library("pdfgenerator");
    }

    public function panel_administrador()
    {
        if ($this->session->userdata("administrador") != null) {
            $this->load->view('template/headerAdmin');
            $this->load->view('administrador/index');
            $this->load->view('template/footer');
        } else {
            $this->load->view('template/header');
            $this->load->view('index');
            $this->load->view('template/footer');
        }
    }

    public function descargarPDF()
    {
        //$html = $this->input->post("html2");
        //echo ;
        //$this->pdfgenerator->generate($html);
        $this->pdfgenerator->generate("<div>hola</div>");
    }


    public function detalle_encuesta()
    {
        if ($this->session->userdata("administrador") != null) {
            if (isset($_GET["token"])) {
                $token = $_GET["token"];
                $resultado = $this->adminModel->detalle_encuesta($token);
            //    if ($this->session->userdata("administrador")[0]->id == 1) {
            //        echo "<pre>";
           //         print_r($resultado);
//                    echo "</pre>";
                  //  exit();
                //}
                //echo "<pre>";
                //print_r($this->session->userdata("administrador")[0]->id);
                //echo "</pre>";
                //exit();
                $this->load->view('template/headerAdmin');
                $this->load->view('administrador/detalleEncuesta', array("resultado" => $resultado));
                $this->load->view('template/footer');
            }
        } else {
            $this->load->view('template/header');
            $this->load->view('index');
            $this->load->view('template/footer');
        }
    }

    public function carga_masiva()
    {
        if ($this->session->userdata("administrador") != null) {
            $this->load->view('template/headerAdmin');
            $this->load->view('administrador/cargaMasiva');
            $this->load->view('template/footer');
        } else {
            $this->load->view('template/header');
            $this->load->view('index');
            $this->load->view('template/footer');
        }
    }

    public function iniciarSesionAdministrador()
    {
        $rut = $this->input->post("rut");
        $password = $this->input->post("password");
        $partes = explode("-", str_replace(".", "", $rut));
        $user = $this->adminModel->iniciarSesionAdministrador($partes[0], $partes[1], $password);
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

    /* /////////////////////////////// INICIO CRUD EMPRESA /////////////////////////////// */
    public function addEmpresa()
    {
        if ($this->session->userdata("administrador") != null) {
            $nombre = $this->input->post("nombre");
            $resultado = $this->adminModel->addEmpresa($nombre);
            if ($resultado == "1") {
                echo json_encode(array("resultado" => 1, "mensaje" => "Empresa agregada con exito."));
            } else {
                echo json_encode(array("resultado" => 0, "mensaje" => "Error al agregar empresa."));
            }
        } else {
            $this->load->view('template/header');
            $this->load->view('index');
            $this->load->view('template/footer');
        }
    }

    public function editarEstadoEmpresa()
    {
        if ($this->session->userdata("administrador") != null) {
            $id = $this->input->post("id");
            $estado = $this->input->post("estado");
            $resultado = $this->adminModel->editarEstadoEmpresa($id, $estado);
            if ($resultado == "1") {
                echo json_encode(array("resultado" => 1, "mensaje" => "Estado de empresa editado con exito."));
            } else {
                echo json_encode(array("resultado" => 0, "mensaje" => "Error al editar el estado de la empresa."));
            }
        } else {
            $this->load->view('template/header');
            $this->load->view('index');
            $this->load->view('template/footer');
        }
    }

    public function editarNombreEmpresa()
    {
        if ($this->session->userdata("administrador") != null) {
            $id = $this->input->post("id");
            $nombre = $this->input->post("nombre");
            $resultado = $this->adminModel->editarNombreEmpresa($id, $nombre);
            if ($resultado == "1") {
                echo json_encode(array("resultado" => 1, "mensaje" => "Nombre de empresa editado con exito."));
            } else {
                echo json_encode(array("resultado" => 0, "mensaje" => "Error al editar el nombre de la empresa."));
            }
        } else {
            $this->load->view('template/header');
            $this->load->view('index');
            $this->load->view('template/footer');
        }
    }

    public function getEmpresa()
    {
        if ($this->session->userdata("administrador") != null) {
            $draw = intval($this->input->get("draw"));
            $start = intval($this->input->get("start"));
            $length = intval($this->input->get("length"));
            $books = $this->adminModel->getEmpresa();
            $data = array();

            foreach ($books->result() as $r) {
                if ($r->estado == "A") {
                    $estado = '<span class="badge badge-success">Activo</span>';
                    $btnAcciones = '<button type="button" style="margin:2px" value="' . $r->id . ',I" id="btnEditarEstadoEmpresa" class="btn btn-outline-danger btn-sm">Desactivar</button> <button type="button" value="' . $r->id . ',' . $r->nombre . '" id="btnEditarNombreEmpresa" style="margin:2px" class="btn btn-outline-info btn-sm">Editar Nombre</button>';
                } else {
                    $estado = '<span class="badge badge-danger">Desactivado</span>';
                    $btnAcciones = '<button type="button"  style="margin:2px" value="' . $r->id . ',A" id="btnEditarEstadoEmpresa" class="btn btn-outline-success btn-sm">Activar</button> <button type="button" value="' . $r->id . ',' . $r->nombre . '" id="btnEditarNombreEmpresa" style="margin:2px" class="btn btn-outline-info btn-sm">Editar Nombre</button>';
                }
                $data[] = array(
                    $r->id,
                    $r->nombre,
                    $estado,
                    $btnAcciones
                );
            }
            $output = array(
                "draw" => $draw,
                "recordsTotal" => $books->num_rows(),
                "recordsFiltered" => $books->num_rows(),
                "data" => $data
            );
            echo json_encode($output);
            exit();
        } else {
            $this->load->view('template/header');
            $this->load->view('index');
            $this->load->view('template/footer');
        }
    }
    /* \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\ FIN CRUD EMPRESA \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\ */

    /* /////////////////////////////// INICIO CRUD CARGO /////////////////////////////// */
    public function addCargo()
    {
        if ($this->session->userdata("administrador") != null) {
            $nombre = $this->input->post("nombre");
            $resultado = $this->adminModel->addCargo($nombre);
            if ($resultado == "1") {
                echo json_encode(array("resultado" => 1, "mensaje" => "Cargo agregado con exito."));
            } else {
                echo json_encode(array("resultado" => 0, "mensaje" => "Error al agregar cargo."));
            }
        } else {
            $this->load->view('template/header');
            $this->load->view('index');
            $this->load->view('template/footer');
        }
    }

    public function editarEstadoCargo()
    {
        if ($this->session->userdata("administrador") != null) {
            $id = $this->input->post("id");
            $estado = $this->input->post("estado");
            $resultado = $this->adminModel->editarEstadoCargo($id, $estado);
            if ($resultado == "1") {
                echo json_encode(array("resultado" => 1, "mensaje" => "Estado de cargo editado con exito."));
            } else {
                echo json_encode(array("resultado" => 0, "mensaje" => "Error al editar el estado del cargo."));
            }
        } else {
            $this->load->view('template/header');
            $this->load->view('index');
            $this->load->view('template/footer');
        }
    }

    public function editarNombreCargo()
    {
        if ($this->session->userdata("administrador") != null) {
            $id = $this->input->post("id");
            $nombre = $this->input->post("nombre");
            $resultado = $this->adminModel->editarNombreCargo($id, $nombre);
            if ($resultado == "1") {
                echo json_encode(array("resultado" => 1, "mensaje" => "Nombre del cargo editado con exito."));
            } else {
                echo json_encode(array("resultado" => 0, "mensaje" => "Error al editar el nombre del cargo."));
            }
        } else {
            $this->load->view('template/header');
            $this->load->view('index');
            $this->load->view('template/footer');
        }
    }

    public function getCargo()
    {
        if ($this->session->userdata("administrador") != null) {
            $draw = intval($this->input->get("draw"));
            $start = intval($this->input->get("start"));
            $length = intval($this->input->get("length"));
            $books = $this->adminModel->getCargo();
            $data = array();

            foreach ($books->result() as $r) {
                if ($r->estado == "A") {
                    $estado = '<span class="badge badge-success">Activo</span>';
                    $btnAcciones = '<button type="button" style="margin:2px" value="' . $r->id . ',I" id="btnEditarEstadoCargo" class="btn btn-outline-danger btn-sm">Desactivar</button> <button type="button" value="' . $r->id . ',' . $r->nombre . '" id="btnEditarNombreCargo" style="margin:2px" class="btn btn-outline-info btn-sm">Editar Nombre</button>';
                } else {
                    $estado = '<span class="badge badge-danger">Desactivado</span>';
                    $btnAcciones = '<button type="button"  style="margin:2px" value="' . $r->id . ',A" id="btnEditarEstadoCargo" class="btn btn-outline-success btn-sm">Activar</button> <button type="button" value="' . $r->id . ',' . $r->nombre . '" id="btnEditarNombreCargo" style="margin:2px" class="btn btn-outline-info btn-sm">Editar Nombre</button>';
                }
                $data[] = array(
                    $r->id,
                    $r->nombre,
                    $estado,
                    $btnAcciones
                );
            }
            $output = array(
                "draw" => $draw,
                "recordsTotal" => $books->num_rows(),
                "recordsFiltered" => $books->num_rows(),
                "data" => $data
            );
            echo json_encode($output);
            exit();
        } else {
            $this->load->view('template/header');
            $this->load->view('index');
            $this->load->view('template/footer');
        }
    }
    /* \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\ FIN CRUD CARGO \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\ */
    public function insertUsuarios()
    {
        if ($this->session->userdata("administrador") != null) {
            if (isset($_FILES["file"]["name"])) {
                $user = $this->session->userdata("administrador");
                $path = $_FILES["file"]["tmp_name"];
                $object = PHPExcel_IOFactory::load($path);
                $contOk = 0;
                $contError = 0;
                $arregloInsert = array();
                foreach ($object->getWorksheetIterator() as $worksheet) {
                    $highestRow = $worksheet->getHighestRow();
                    $highestColumn = $worksheet->getHighestColumn();
                    for ($row = 2; $row <= $highestRow; $row++) {
                        $nombre = $worksheet->getCellByColumnAndRow(0, $row)->getValue();
                        $rut = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
                        $correo = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
                        $edad = $worksheet->getCellByColumnAndRow(3, $row)->getValue();
                        $cargo = $worksheet->getCellByColumnAndRow(4, $row)->getValue();
                        $empresa = $worksheet->getCellByColumnAndRow(5, $row)->getValue();
                        //$apellidos = $worksheet->getCellByColumnAndRow(4, $row)->getValue();


                        if (strpos($rut, '-')) {
                            $partesRut = explode('-', $rut);
                            $rut = $partesRut[0];
                            $dv = $partesRut[1];
                            $clave = substr($rut, -6);
                            $data = array(
                                'rut'        =>    strip_tags($rut),
                                'dv'            =>    strip_tags($dv),
                                'nombre'                =>    strip_tags($nombre),
                                'edad'        =>    strip_tags($edad),
                                'clave'            =>    strip_tags($clave),
                                'cargo' => strip_tags($cargo),
                                'empresa' => strip_tags($empresa),
                                'fecha_creacion' => 'now()',
                                'correo' => strip_tags($correo)
                            );
                            array_push($arregloInsert, $data);
                        }
                    }
                    $respuesta = $this->adminModel->addUsuario($arregloInsert);
                    echo json_encode($respuesta);
                }
            }
        } else {
            $this->load->view('template/header');
            $this->load->view('index');
            $this->load->view('template/footer');
        }
    }

    public function getUsuario()
    {
        if ($this->session->userdata("administrador") != null) {
            $draw = intval($this->input->get("draw"));
            $start = intval($this->input->get("start"));
            $length = intval($this->input->get("length"));
            $books = $this->adminModel->getUsuario();
            $data = array();

            foreach ($books->result() as $r) {
                $resultado = $this->adminModel->revisionEncuestas($r->id);


                if ($r->estado == "A") {
                    $estado = '<span class="badge badge-success">Activo</span>';
                    if ($resultado) {
                        $btnAcciones = '<button type="button" style="margin:2px" value="' . $r->id . ',I" id="btnEditarEstadoUsuario" class="btn btn-outline-danger btn-sm">Desactivar</button>
                                        <button type="button"  style="margin:2px" value="' . $r->id . '" id="verCuestionarios" class="btn btn-outline-success btn-sm">Ver Cuestionarios</button>';
                    } else {
                        $btnAcciones = '<button type="button" style="margin:2px" value="' . $r->id . ',I" id="btnEditarEstadoUsuario" class="btn btn-outline-danger btn-sm">Desactivar</button>';
                    }
                } else if ($r->estado == "I") {
                    $estado = '<span class="badge badge-danger">Desactivado</span>';
                    if ($resultado) {
                        $btnAcciones = '<button type="button"  style="margin:2px" value="' . $r->id . ',A" id="btnEditarEstadoUsuario" class="btn btn-outline-success btn-sm">Activar</button>
                                        <button type="button"  style="margin:2px" value="' . $r->id . '" id="verCuestionarios" class="btn btn-outline-success btn-sm">Ver Cuestionarios</button>';
                    } else {
                        $btnAcciones = '<button type="button"  style="margin:2px" value="' . $r->id . ',A" id="btnEditarEstadoUsuario" class="btn btn-outline-success btn-sm">Activar</button>';
                    }
                } else if ($r->estado == "F") {
                    $estado = '<span class="badge badge-primary">Finalizado</span>';

                    if ($resultado) {
                        $btnAcciones = '<button type="button"  style="margin:2px" value="' . $r->id . ',A" id="btnEditarEstadoUsuario" class="btn btn-outline-info btn-sm">Activar</button>
                                        <button type="button"  style="margin:2px" value="' . $r->id . '" id="verCuestionarios" class="btn btn-outline-success btn-sm">Ver Cuestionarios</button>';
                    } else {
                        $btnAcciones = '<button type="button"  style="margin:2px" value="' . $r->id . ',A" id="btnEditarEstadoUsuario" class="btn btn-outline-info btn-sm">Activar</button>';
                    }
                } else if ($r->estado == "C") {
                    $estado = '<span class="badge badge-info">En Curso</span>';

                    if ($resultado) {
                        $btnAcciones = '<button type="button"  style="margin:2px" value="' . $r->id . ',A" id="btnEditarEstadoUsuario" class="btn btn-outline-info btn-sm">Activar</button>
                                        <button type="button"  style="margin:2px" value="' . $r->id . '" id="verCuestionarios" class="btn btn-outline-success btn-sm">Ver Cuestionarios</button>';
                    } else {
                        $btnAcciones = '<button type="button"  style="margin:2px" value="' . $r->id . ',A" id="btnEditarEstadoUsuario" class="btn btn-outline-info btn-sm">Activar</button>';
                    }
                }
                $data[] = array(
                    $r->id,
                    $r->rut,
                    $r->dv,
                    $r->nombre,
                    $r->correo,
                    $r->edad,
                    $r->clave,
                    $r->cargo,
                    $r->empresa,
                    $r->fecha_creacion,
                    $estado,
                    $btnAcciones
                );
            }
            $output = array(
                "draw" => $draw,
                "recordsTotal" => $books->num_rows(),
                "recordsFiltered" => $books->num_rows(),
                "data" => $data
            );
            echo json_encode($output);
            exit();
        } else {
            $this->load->view('template/header');
            $this->load->view('index');
            $this->load->view('template/footer');
        }
    }

    public function editarEstadoUsuario()
    {
        if ($this->session->userdata("administrador") != null) {
            $id = $this->input->post("id");
            $estado = $this->input->post("estado");
            $resultado = $this->adminModel->editarEstadoUsuario($id, $estado);
            if ($resultado == "1") {
                echo json_encode(array("resultado" => 1, "mensaje" => "Estado del usuario editado con exito."));
            } else {
                echo json_encode(array("resultado" => 0, "mensaje" => "Error al editar el estado del usuario."));
            }
        } else {
            $this->load->view('template/header');
            $this->load->view('index');
            $this->load->view('template/footer');
        }
    }

    public function getTokens()
    {
        if ($this->session->userdata("administrador") != null) {
            $id = $this->input->post("id");
            $resultado = $this->adminModel->getTokens($id);

            if (count($resultado) > 0) {
                echo json_encode(array("resultado" => 1, "mensaje" => $resultado));
            } else {
                echo json_encode(array("resultado" => 0, "mensaje" => "No existen cuestionarios realizados."));
            }
        } else {
            $this->load->view('template/header');
            $this->load->view('index');
            $this->load->view('template/footer');
        }
    }
}
