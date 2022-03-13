<?php



defined('BASEPATH') or exit('No direct script access allowed');



class UsuarioModel extends CI_Model

{



    public function __construct()

    {

        parent::__construct();

    }



    function iniciarSesionUsuario($rut, $dv, $password)

    {

        $sql = "SELECT * FROM  usuario where rut = " . $rut . " and dv = '" . $dv . "' and clave = '" . $password . "' ";

        $resultado = $this->db->query($sql)->result();

        return $resultado;

    }




}

