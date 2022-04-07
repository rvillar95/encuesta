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
        $sql = "SELECT * FROM  usuario where rut = " . $rut . " and dv = '" . strtoupper($dv) . "' and clave = '" . $password . "' ";
        $resultado = $this->db->query($sql)->result();
        $idUsuario = $resultado[0]->id;


        $sql = "SELECT count(*) as cantidad,usuario,id  FROM  inicio_token where id = (select max(id) from inicio_token where usuario = " . $idUsuario . " and now() < fecha_termino) ";

        $resultado = $this->db->query($sql)->result();
        $cantidad = $resultado[0]->cantidad;
        $idUsuario = $resultado[0]->usuario;
        $idToken = $resultado[0]->id;
        if ($cantidad > 0) {
            $select = "select fecha_uso, concat(DATE_FORMAT(fecha_termino,'%m/%d/%Y'),' ',time_format(fecha_termino,'%h:%i %p')) as fecha_termino from inicio_token where id = " . $idToken;
            $resultado = $this->db->query($select)->result();
            $hora = $resultado[0]->fecha_uso;
            $fecha_termino = $resultado[0]->fecha_termino;
            $arreglo = array("idToken" => $idToken, "fecha_inicio" => $hora, "fecha_termino" => $fecha_termino);
            $this->session->set_userdata("hora", $arreglo);
            $sql = "SELECT * FROM  usuario where id =  " . $idUsuario;
            $resultado = $this->db->query($sql)->result();
            return array("ok", $resultado);
        } else {
            return array("error", $idUsuario);
        }
    }

    function terminoCuenta($idUsuario, $idToken)
    {

        $this->db->trans_begin();

        $update = "UPDATE inicio_token set estado = 'F' where id = " . $idToken;
        $this->db->query($update, FALSE);

        $update = "UPDATE usuario set fecha_finalizacion = now() , estado = 'F' where id = " . $idUsuario;
        $this->db->query($update, FALSE);

        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            return 0;
        } else {
            $this->db->trans_commit();
            return 1;
        }
    }

    function terminoWonderlic($idToken)
    {
        $this->db->trans_begin();

        $update = "UPDATE inicio_token set wonderlic_fecha_termino_usuario = now() where id = " . $idToken;
        $this->db->query($update, FALSE);

        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            return 0;
        } else {
            $this->db->trans_commit();
            return 1;
        }
    }

    function terminoAlerta($idToken)
    {
        $this->db->trans_begin();

        $update = "UPDATE inicio_token set alerta_fecha_termino_usuario = now() where id = " . $idToken;
        $this->db->query($update, FALSE);

        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            return 0;
        } else {
            $this->db->trans_commit();
            return 1;
        }
    }

    function iniciarSesionUsuarioCorreo($token)
    {
        $this->db->trans_begin();
        $sql = "SELECT count(*) as cantidad,usuario,id  FROM  inicio_token where id = (select max(id) from inicio_token where token='" . $token . "' and estado in ('A','U')) ";

        $resultado = $this->db->query($sql)->result();
        $cantidad = $resultado[0]->cantidad;
        $idUsuario = $resultado[0]->usuario;
        $idToken = $resultado[0]->id;
        if ($cantidad > 0) {
            $update = "UPDATE inicio_token set estado = 'U' , fecha_uso = now(), fecha_termino = ADDTIME(now(), '01:30:00') where id = " . $idToken . " and estado = 'A' ";
            $this->db->query($update, FALSE);

            $update1 = "update usuario set estado = 'C' , fecha_inicio = now() where id = " . $idUsuario . " and estado = 'A'";
            $this->db->query($update1, FALSE);

            $select = "select fecha_uso, concat(DATE_FORMAT(fecha_termino,'%m/%d/%Y'),' ',time_format(fecha_termino,'%h:%i %p')) as fecha_termino from inicio_token where id = " . $idToken;
            $resultado = $this->db->query($select)->result();
            $hora = $resultado[0]->fecha_uso;
            $fecha_termino = $resultado[0]->fecha_termino;
            $arreglo = array("idToken" => $idToken, "fecha_inicio" => $hora, "fecha_termino" => $fecha_termino);
            $this->session->set_userdata("hora", $arreglo);
            $sql = "SELECT * FROM  usuario where id =  " . $idUsuario;
            $resultado = $this->db->query($sql)->result();
            if ($this->db->trans_status() === FALSE) {
                $this->db->trans_rollback();
                return 0;
            } else {
                $this->db->trans_commit();
                return $resultado;
            }
        } else {
            return 0;
        }
    }

    function estadosCuestionarios($id)
    {
        $hora = $this->session->userdata("hora");
        $idToken = $hora["idToken"];
        $sql = "SELECT count(*) as cantidad  FROM  resultado_barrat where usuario =  " . $id . " and token =" . $idToken;
        $resultado = $this->db->query($sql)->result();
        $barrat = $resultado[0]->cantidad;
        $sql = "SELECT count(*) as cantidad  FROM  resultado_relacion where usuario =  " . $id . " and token =" . $idToken;
        $resultado = $this->db->query($sql)->result();
        $relacion = $resultado[0]->cantidad;
        $sql = "SELECT count(*) as cantidad  FROM  resultado_disc where usuario =  " . $id . " and token =" . $idToken;
        $resultado = $this->db->query($sql)->result();
        $disc = $resultado[0]->cantidad;
        $sql = "SELECT count(*) as cantidad  FROM  resultado_alerta where usuario =  " . $id . " and token =" . $idToken;
        $resultado = $this->db->query($sql)->result();
        $alerta = $resultado[0]->cantidad;
        $sql = "SELECT count(*) as cantidad  FROM  resultado_wonderlic where usuario =  " . $id . " and token =" . $idToken;
        $resultado = $this->db->query($sql)->result();
        $wonderlic = $resultado[0]->cantidad;
        $suma = $barrat + $relacion + $disc + $alerta + $wonderlic;
        if ($suma == 5) {
            return array("resultado" => "ok");
        } else {
            return array("resultado" => "error", "tipo" => array("barrat" => $barrat, "relacion" => $relacion, "disc" => $disc, "alerta" => $alerta, "wonderlic" => $wonderlic));
        }
    }

    function finalizar($idUsuario, $idToken)
    {
        $this->db->trans_begin();
        $update1 = "update usuario set estado = 'F' , fecha_finalizacion = now() where id = " . $idUsuario;
        $update2 = "update inicio_token set estado = 'F' where id = " . $idToken;
        $this->db->query($update1, FALSE);
        $this->db->query($update2, FALSE);
        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            return 0;
        } else {
            $this->db->trans_commit();
            return 1;
        }
    }

    function insertaLogUsuario($id, $detalle, $tipo)
    {
        $sql = "insert into log_usuario (usuario,detalle,tipo) values (" . $id . ",'" . $detalle . "'," . $tipo . ")";
        $resultado = $this->db->query($sql);
        return $resultado;
    }


    function revisionWonderlic($idToken)
    {
        $sql = "SELECT wonderlic_fecha_inicio,wonderlic_fecha_termino_usuario from inicio_token where id = " . $idToken;
        $resultado = $this->db->query($sql)->result();
        $fecha = $resultado[0]->wonderlic_fecha_inicio;
        $wonderlic_fecha_termino_usuario = $resultado[0]->wonderlic_fecha_termino_usuario;
        if ($fecha == "0000-00-00 00:00:00" && $wonderlic_fecha_termino_usuario == "0000-00-00 00:00:00") {
            $update = "UPDATE inicio_token set  wonderlic_fecha_inicio = now(), wonderlic_fecha_termino = ADDTIME(now(), '00:12:00') where id = " . $idToken;
            $this->db->query($update);
            $sql = "SELECT wonderlic_fecha_inicio , concat(DATE_FORMAT(wonderlic_fecha_termino,'%m/%d/%Y'),' ',time_format(wonderlic_fecha_termino,'%h:%i %p')) as wonderlic_fecha_termino from inicio_token where id = " . $idToken;
            $resultado = $this->db->query($sql)->result();
            $fechaInicio = $resultado[0]->wonderlic_fecha_inicio;
            $fechaTermino = $resultado[0]->wonderlic_fecha_termino;
            $hora = $this->session->userdata("hora");
            $hora["fechaInicioWonderlic"] = $fechaInicio;
            $hora["fechaFinWonderlic"] = $fechaTermino;
            $this->session->set_userdata("hora", $hora);
            return array("1", $hora);
        } else {
            $sql = "SELECT count(*) as cantidad from inicio_token where  now() < wonderlic_fecha_termino and id = " . $idToken;
            $resultado = $this->db->query($sql)->result();
            $cantidad = $resultado[0]->cantidad;
            if ($cantidad == 1) {
                $hora = $this->session->userdata("hora");
                unset($hora["fechaInicioWonderlic"]);
                unset($hora["fechaFinWonderlic"]);
                $sql = "SELECT wonderlic_fecha_inicio , concat(DATE_FORMAT(wonderlic_fecha_termino,'%m/%d/%Y'),' ',time_format(wonderlic_fecha_termino,'%h:%i %p')) as wonderlic_fecha_termino, wonderlic_fecha_termino_usuario from inicio_token where id = " . $idToken;
                $resultado = $this->db->query($sql)->result();
                $fechaInicio = $resultado[0]->wonderlic_fecha_inicio;
                $fechaTermino = $resultado[0]->wonderlic_fecha_termino;
                $wonderlic_fecha_termino_usuario = $resultado[0]->wonderlic_fecha_termino_usuario;

                if ($wonderlic_fecha_termino_usuario == "0000-00-00 00:00:00") {
                    $hora["fechaInicioWonderlic"] = $fechaInicio;
                    $hora["fechaFinWonderlic"] = $fechaTermino;
                    $this->session->set_userdata("hora", $hora);
                    return array("1", $hora);
                } else {
                    return array("0");
                }
            } else {
                return array("0");
            }
        }
    }

    function revisionAlerta($idToken)
    {
        $sql = "SELECT alerta_fecha_inicio,alerta_fecha_termino_usuario from inicio_token where id = " . $idToken;
        $resultado = $this->db->query($sql)->result();
        $fecha = $resultado[0]->alerta_fecha_inicio;
        $alerta_fecha_termino_usuario = $resultado[0]->alerta_fecha_termino_usuario;

        if ($fecha == "0000-00-00 00:00:00" && $alerta_fecha_termino_usuario == "0000-00-00 00:00:00") {
            $update = "UPDATE inicio_token set  alerta_fecha_inicio = now(), alerta_fecha_termino = ADDTIME(now(), '00:06:00') where id = " . $idToken;
            $this->db->query($update);
            $sql = "SELECT alerta_fecha_inicio , concat(DATE_FORMAT(alerta_fecha_termino,'%m/%d/%Y'),' ',time_format(alerta_fecha_termino,'%h:%i %p')) as alerta_fecha_termino from inicio_token where id = " . $idToken;
            $resultado = $this->db->query($sql)->result();
            $fechaInicio = $resultado[0]->alerta_fecha_inicio;
            $fechaTermino = $resultado[0]->alerta_fecha_termino;
            $hora = $this->session->userdata("hora");
            $hora["fechaInicioAlerta"] = $fechaInicio;
            $hora["fechaFinAlerta"] = $fechaTermino;
            $this->session->set_userdata("hora", $hora);

            return array("1", $hora);
        } else {
            $sql = "SELECT count(*) as cantidad from inicio_token where  now() < alerta_fecha_termino and id = " . $idToken;
            $resultado = $this->db->query($sql)->result();
            $cantidad = $resultado[0]->cantidad;
            //echo $cantidad;
            //exit();
            if ($cantidad == 1) {
                $hora = $this->session->userdata("hora");
                unset($hora["fechaInicioAlerta"]);
                unset($hora["fechaFinAlerta"]);
                $sql = "SELECT alerta_fecha_inicio , concat(DATE_FORMAT(alerta_fecha_termino,'%m/%d/%Y'),' ',time_format(alerta_fecha_termino,'%h:%i %p')) as alerta_fecha_termino, alerta_fecha_termino_usuario from inicio_token where id = " . $idToken;
                $resultado = $this->db->query($sql)->result();
                $fechaInicio = $resultado[0]->alerta_fecha_inicio;
                $fechaTermino = $resultado[0]->alerta_fecha_termino;
                $alerta_fecha_termino_usuario = $resultado[0]->alerta_fecha_termino_usuario;
                if ($alerta_fecha_termino_usuario == "0000-00-00 00:00:00") {
                    $hora["fechaInicioAlerta"] = $fechaInicio;
                    $hora["fechaFinAlerta"] = $fechaTermino;
                    $this->session->set_userdata("hora", $hora);
                    //echo "paso";
                    // exit();
                    return array("1", $hora);
                } else {
                    return array("0");
                }
            } else {
                // echo "paso";
                // exit();
                return array("0");
            }
        }
    }
}
