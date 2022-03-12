<?php

defined('BASEPATH') or exit('No direct script access allowed');

class AdminModel extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    function iniciarSesionAdministrador($rut, $dv, $password)
    {
        $sql = "SELECT * FROM  administrador where rut = " . $rut . " and dv = '" . $dv . "' and clave = '" . $password . "' ";
        $resultado = $this->db->query($sql)->result();
        return $resultado;
    }


    /* /////////////////////////////// INICIO CRUD EMPRESA /////////////////////////////// */
    function addEmpresa($nombre)
    {
        $sql = "insert into empresa (nombre) values ('" . $nombre . "') ";
        $resultado = $this->db->query($sql);
        return $resultado;
    }

    function editarEstadoEmpresa($id, $estado)
    {
        $sql = "update empresa set estado = '" . $estado . "' where id = " . $id;
        $resultado = $this->db->query($sql);
        return $resultado;
    }

    function editarNombreEmpresa($id, $nombre)
    {
        $sql = "update empresa set nombre = '" . $nombre . "' where id = " . $id;
        $resultado = $this->db->query($sql);
        return $resultado;
    }

    function getEmpresa()
    {
        $sql = "select * from empresa";
        $resultado = $this->db->query($sql);
        return $resultado;
    }
    /* \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\ FIN CRUD EMPRESA \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\ */

    /* /////////////////////////////// INICIO CRUD CARGO /////////////////////////////// */
    function addCargo($nombre)
    {
        $sql = "insert into cargo (nombre) values ('" . $nombre . "') ";
        $resultado = $this->db->query($sql);
        return $resultado;
    }

    function editarEstadoCargo($id, $estado)
    {
        $sql = "update cargo set estado = '" . $estado . "' where id = " . $id;
        $resultado = $this->db->query($sql);
        return $resultado;
    }

    function editarNombreCargo($id, $nombre)
    {
        $sql = "update cargo set nombre = '" . $nombre . "' where id = " . $id;
        $resultado = $this->db->query($sql);
        return $resultado;
    }

    function getCargo()
    {
        $sql = "select * from cargo";
        $resultado = $this->db->query($sql);
        return $resultado;
    }
    /* \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\ FIN CRUD CARGO \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\ */

    /* /////////////////////////////// INICIO CRUD CARGA MASIVA /////////////////////////////// */
    function addUsuario($arregloInsert)
    {
        //$this->db->trans_begin();


        $rutError = array();
        $rutOk = array();
        $rutExistente = array();
        foreach ($arregloInsert as $key => $value) {

            $sql = "SELECT count(*) as CANTIDAD from usuario where rut = '" . $value["rut"] . "'";
            $resultado = $this->db->query($sql)->result();
            $cantidad = $resultado[0]->CANTIDAD;
            if ($cantidad == 0) {
                $sql = "insert into usuario (rut,dv,nombre,edad,clave,cargo,empresa,fecha_creacion) 
                values (" . $value["rut"] . ",
                        '" . $value["dv"] . "',
                        '" . $value["nombre"] . "',
                        " . $value["edad"] . ",
                        '" . $value["clave"] . "',
                        " . $value["cargo"] . ",
                        " . $value["empresa"] . ",
                        now()) ";
                $resultado = $this->db->query($sql);
                if ($resultado == "1") {
                    array_push($rutOk, $value["rut"] . "-" . $value["dv"]);
                } else {
                    array_push($rutError, $value["rut"] . "-" . $value["dv"]);
                }
                //echo "resultado: " . $resultado . "<br>";
            } else {
                array_push($rutExistente, $value["rut"] . "-" . $value["dv"]);
            }
        }
        return array("ok" => $rutOk, "error" => $rutError, "existe" => $rutExistente);
    }

    /* \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\ FIN CRUD CARGO \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\ */

    function getUsuario()
    {
        $sql = "select us.id,us.rut,us.dv,us.nombre, us.edad, us.clave, ca.nombre as cargo,em.nombre as empresa, us.estado , us.fecha_creacion from usuario us,cargo ca, empresa em where us.cargo = ca.id and us.empresa = em.id";
        $resultado = $this->db->query($sql);
        return $resultado;
    }

    function editarEstadoUsuario($id, $estado)
    {
        $sql = "update usuario set estado = '" . $estado . "' where id = " . $id;
        $resultado = $this->db->query($sql);
        return $resultado;
    }
}
