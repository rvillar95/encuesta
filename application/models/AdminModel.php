<?php

defined('BASEPATH') or exit('No direct script access allowed');

class AdminModel extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
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

    function getTokens($id)
    {
        $sql = "select * from inicio_token where usuario = " . $id;
        //echo $sql;
        return $this->db->query($sql)->result();
    }

    function detalle_encuesta($token)
    {
        $getAlerta = "select * from resultado_alerta where token = " . $token;
        $getBarrat = "select * from resultado_barrat where token = " . $token;
        $getDisc = "select * from resultado_disc where token = " . $token;
        $getRelacion = "select * from resultado_relacion where token = " . $token;
        $getWonderlic = "select * from resultado_wonderlic where token = " . $token;
        $getDatosUsuario = "SELECT us.*,sa.nombre as nombreempresa, car.nombre as nombrecargo FROM inicio_token ini, usuario us, cargo car, empresa sa WHERE  ini.usuario = us.id and us.empresa = sa.id and us.cargo = car.id and ini.id = " . $token;
        $selectAlerta = $this->db->query($getAlerta)->result();
        $selectBarrat = $this->db->query($getBarrat)->result();
        $selectDisc = $this->db->query($getDisc)->result();
        $selectRelacion = $this->db->query($getRelacion)->result();
        $selectWonderlic = $this->db->query($getWonderlic)->result();
        $selectUsuario = $this->db->query($getDatosUsuario)->result();

        if (count($selectDisc) > 0) {
            # code...

            $disc = json_decode($selectDisc[0]->resultado);
            //echo "<pre>";
            //print_r($disc);
            //echo "</pre>";

            $dominante = array("1" => "rapido", "2" => "decidido", "3" => "franco", "4" => "decisivo", "5" => "atrevido", "6" => "aceptaRiesgos", "7" => "dominante", "8" => "impaciente", "9" => "insistente", "10" => "valeroso", "11" => "osado", "12" => "independiente", "13" => "competitivo", "14" => "ideasfirmes", "15" => "tenaz", "16" => "audaz", "17" => "autosuficiente", "18" => "resuelto", "19" => "agresivo", "20" => "hablaDirecto", "21" => "persistente", "22" => "energico", "23" => "vigoroso", "24" => "exigente", "25" => "leAgradaDiscutir", "26" => "directo", "27" => "inquieto", "28" => "pionero");
            $influyente = array("1" => "entusiasta", "2" => "receptivo", "3" => "amigable", "4" => "elocuente", "5" => "comunicativo", "6" => "ingenioso", "7" => "expresivo", "8" => "extrovertido", "9" => "encantador", "10" => "anima", "11" => "alegre", "12" => "estimulante", "13" => "alegre", "14" => "alentador", "15" => "popular", "16" => "promotor", "17" => "sociable", "18" => "vivaz", "19" => "impetuoso", "20" => "detratofacil", "21" => "animado", "22" => "impulsivo", "23" => "sociable", "24" => "cautivadora", "25" => "desenvuelto", "26" => "jovial", "27" => "elocuente", "28" => "espontaneo");
            $estable = array("1" => "apacible", "2" => "bondadoso", "3" => "tranquilo", "4" => "tolerante", "5" => "moderado", "6" => "ameno", "7" => "sensible", "8" => "constante", "9" => "complaciente", "10" => "pacifico", "11" => "atento", "12" => "gentil", "13" => "considerado", "14" => "obediente", "15" => "calmado", "16" => "leal", "17" => "paciente", "18" => "adaptable", "19" => "amistoso", "20" => "compasivo", "21" => "generoso", "22" => "tranquilo", "23" => "tolerante", "24" => "contento", "25" => "comedido", "26" => "ecuanime", "27" => "amable", "28" => "colaborador");
            $conciensudo = array("1" => "logico", "2" => "cauteloso", "3" => "preciso", "4" => "controlado", "5" => "concienzudo", "6" => "investigadora", "7" => "cuidadoso", "8" => "precavido", "9" => "discreto", "10" => "perfeccionista", "11" => "reservado", "12" => "perceptivo", "13" => "sagaz", "14" => "obediente", "15" => "reflexivo", "16" => "analitico", "17" => "certero", "18" => "prevenido", "19" => "discerniente", "20" => "cauto", "21" => "evaluador", "22" => "cuidaDetalles", "23" => "sistematico", "24" => "apegadoNormas", "25" => "leAgradaDiscutir", "26" => "preciso", "27" => "cuidadoso", "28" => "prudente");
            $contadorMenos = 0;
            $contadorMas = 0;
            foreach ($dominante as $key => $value) {
                foreach ($disc as $key2 => $value2) {
                    if ($key == $value2->pregunta) {
                        if (isset($value2->mas)) {
                            if ($value2->mas == $value && $key != 16) {
                                //echo "paso MAS en: " . $key . " " . $value . "<br>";
                                $contadorMas++;
                            }
                        }

                        if (isset($value2->menos)) {
                            if ($value2->menos == $value) {
                                //echo "paso Menos en: " . $key . " " . $value . "<br>";
                                $contadorMenos++;
                            }
                        }
                    }
                }
            }
            //echo "************************</br>";
            //echo "Mas: " . $contadorMas . " </br>";
            //echo "Menos: " . $contadorMenos . " </br>";
            $resultadoD = $contadorMas - $contadorMenos;
            //echo "Total: " . $resultadoD . " </br>";
            $contadorMenos = 0;
            $contadorMas = 0;
            foreach ($influyente as $key => $value) {
                foreach ($disc as $key2 => $value2) {
                    if ($key == $value2->pregunta) {
                        if (isset($value2->mas)) {
                            if ($value2->mas == $value && $key != 16) {
                                //echo "paso MAS en: " . $key . " " . $value . "<br>";
                                $contadorMas++;
                            }
                        }

                        if (isset($value2->menos)) {
                            if ($value2->menos == $value) {
                                //echo "paso Menos en: " . $key . " " . $value . "<br>";
                                $contadorMenos++;
                            }
                        }
                    }
                }
            }
            //echo "************************</br>";
            //echo "Mas: " . $contadorMas . " </br>";
            //echo "Menos: " . $contadorMenos . " </br>";
            $resultadoI = $contadorMas - $contadorMenos;
            //echo "Total: " . $resultadoI . " </br>";
            $contadorMenos = 0;
            $contadorMas = 0;
            foreach ($estable as $key => $value) {
                foreach ($disc as $key2 => $value2) {
                    if ($key == $value2->pregunta) {
                        if (isset($value2->mas)) {
                            if ($value2->mas == $value && $key != 16) {
                                //echo "paso MAS en: " . $key . " " . $value . "<br>";
                                $contadorMas++;
                            }
                        }

                        if (isset($value2->menos)) {
                            if ($value2->menos == $value) {
                                //echo "paso Menos en: " . $key . " " . $value . "<br>";
                                $contadorMenos++;
                            }
                        }
                    }
                }
            }
            //echo "************************</br>";
            //echo "Mas: " . $contadorMas . " </br>";
            //echo "Menos: " . $contadorMenos . " </br>";
            $resultadoS = $contadorMas - $contadorMenos;
            //echo "Total: " . $resultadoS . " </br>";
            $contadorMenos = 0;
            $contadorMas = 0;
            foreach ($conciensudo as $key => $value) {
                foreach ($disc as $key2 => $value2) {
                    if ($key == $value2->pregunta) {
                        if (isset($value2->mas)) {
                            if ($value2->mas == $value && $key != 16) {
                                //echo "paso MAS en: " . $key . " " . $value . "<br>";
                                $contadorMas++;
                            }
                        }

                        if (isset($value2->menos)) {
                            if ($value2->menos == $value) {
                                //echo "paso Menos en: " . $key . " " . $value . "<br>";
                                $contadorMenos++;
                            }
                        }
                    }
                }
            }
            //echo "************************</br>";
            //echo "Mas: " . $contadorMas . " </br>";
            //echo "Menos: " . $contadorMenos . " </br>";
            $resultadoC = $contadorMas - $contadorMenos;
            //echo "Total: " . $resultadoC . " </br>";
            $arregloD = array(-29, -8, -4, -1, 1);
            $arregloI = array(-29, -8, -4, -2, 1);
            $arregloS = array(-29, -11, -7, -4, 1);
            $arregloC = array(-29, -6, -3, -1, 2);
            $totalD = 0;
            $totalI = 0;
            $totalS = 0;
            $totalC = 0;
            foreach ($arregloD as $key => $value) {
                //echo "if ( " . $value . " > " . $resultadoD . " )<br>";
                if ($value < $resultadoD) {
                    $totalD++;
                }
            }
            foreach ($arregloI as $key => $value) {
                if ($value < $resultadoI) {
                    $totalI++;
                }
            }
            foreach ($arregloS as $key => $value) {
                if ($value < $resultadoS) {
                    $totalS++;
                }
            }
            foreach ($arregloC as $key => $value) {
                if ($value < $resultadoC) {
                    $totalC++;
                }
            }

            $segmento = $totalD . $totalI . $totalS . $totalC;
            //echo "SEGMENTO: " . $totalD . " - " . $totalI . " - " . $totalS . " - " . $totalC;
            //echo "SEGMENTO: " . $segmento;
            $getSegmento = "select per.descripcion from segmento_disc seg, perfil_disc per where seg.perfil = per.id and seg.codigo = " . $segmento;
            $getSegmento = $this->db->query($getSegmento)->result();
            //print_r($getSegmento[0]->descripcion);

            //exit();
            if ($this->session->userdata("administrador")[0]->id == 1) {
               // echo "<pre>";
              //  print_r($selectRelacion);
                //print_r(json_encode($selectRelacion[0]->resultado));
              //  echo "</pre>";
              //  echo count($selectRelacion);
               
             //   exit();
            }
            if (count($selectRelacion) > 0) {
                $arreglo = array("segmento" => $getSegmento[0]->descripcion, "alerta" => json_encode($selectAlerta), "barrat" => json_encode($selectBarrat), "disc" => json_encode($selectDisc), "relacion" => json_encode($selectRelacion[0]->resultado), "wonderlic" => json_encode($selectWonderlic), "usuario" => json_encode($selectUsuario));
            }else{
                $arreglo = array("segmento" => $getSegmento[0]->descripcion, "alerta" => json_encode($selectAlerta), "barrat" => json_encode($selectBarrat), "disc" => json_encode($selectDisc), "relacion" => array(), "wonderlic" => json_encode($selectWonderlic), "usuario" => json_encode($selectUsuario));
            }
            
        } else {
            if ($this->session->userdata("administrador")[0]->id == 1) {
               // print_r($selectRelacion);
               // exit();
            }
            if (count($selectRelacion) > 0) {
                $arreglo = array("segmento" => "", "alerta" => json_encode($selectAlerta), "barrat" => json_encode($selectBarrat), "disc" => json_encode($selectDisc), "relacion" => json_encode($selectRelacion[0]->resultado), "wonderlic" => json_encode($selectWonderlic), "usuario" => json_encode($selectUsuario));
            }else{
                $arreglo = array("segmento" => "", "alerta" => json_encode($selectAlerta), "barrat" => json_encode($selectBarrat), "disc" => json_encode($selectDisc), "relacion" => array(), "wonderlic" => json_encode($selectWonderlic), "usuario" => json_encode($selectUsuario));    
            }
        }
        //return json_decode(json_encode($arreglo), true);
        return $arreglo;
    }

    function iniciarSesionAdministrador($rut, $dv, $password)
    {
        $sql = "SELECT * FROM  administrador where rut = " . $rut . " and dv = '" . $dv . "' and clave = '" . $password . "' ";
        $resultado = $this->db->query($sql)->result();
        return $resultado;
    }

    function addToken($id, $token, $rut, $dv, $clave)
    {
        $this->db->trans_begin();
        $sql = "update inicio_token set estado = 'F' where usuario = " . $id;
        $this->db->query($sql, FALSE);
        $sql = "insert into inicio_token (usuario,token,rut,dv,clave) values (" . $id . ",'" . $token . "'," . $rut . ",'" . $dv . "','" . $clave . "') ";
        $this->db->query($sql, FALSE);

        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            return 0;
        } else {
            $this->db->trans_commit();
            return 1;
        }
    }

    function revisionEncuestas($id)
    {
        $sql = "select count(*) as cantidad from inicio_token where usuario = " . $id . " and estado = 'F'";
        $resultado = $this->db->query($sql)->result();
        $cantidad = $resultado[0]->cantidad;
        if ($cantidad > 0) {
            return true;
        } else {
            return false;
        }
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
                //   echo "<pre>";
                // print_r($value);
                //  echo "</pre>";
                $sql = "insert into usuario (rut,dv,nombre,correo,edad,clave,cargo,empresa,fecha_creacion) 
                values (" . $value["rut"] . ",
                        '" . strtoupper($value["dv"]) . "',
                        '" . $value["nombre"] . "',
                        '" . $value["correo"] . "',
                        " . $value["edad"] . ",
                        '" . $value["clave"] . "',
                        " . $value["cargo"] . ",
                        " . $value["empresa"] . ",
                        now()) ";
                // echo $sql;
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
        $sql = "select us.id,us.rut,us.dv,us.nombre,us.correo, us.edad, us.clave, ca.nombre as cargo,em.nombre as empresa, us.estado , us.fecha_creacion from usuario us,cargo ca, empresa em where us.cargo = ca.id and us.empresa = em.id";
        $resultado = $this->db->query($sql);
        return $resultado;
    }

    function editarEstadoUsuario($id, $estado)
    {

        $this->db->trans_begin();

        $sql = "update usuario set estado = '" . $estado . "' where id = " . $id;
        $this->db->query($sql);
        $sql = "SELECT (SELECT DATE_FORMAT(NOW(), '%d%m%Y%H%i%S%u' )) as hora,nombre,correo,concat(rut,'-',dv) as rut , rut as rutcompleto, dv , clave from usuario where id = " . $id;
        $resultado = $this->db->query($sql)->result();
        $correo = $resultado[0]->correo;
        $nombre = $resultado[0]->nombre;
        $rut = $resultado[0]->rut;
        $clave = $resultado[0]->clave;
        $rutCompleto = $resultado[0]->rutcompleto;
        $dv = $resultado[0]->dv;
        $hora = $resultado[0]->hora;
        //echo "el correo es: " . $correo;
        //$tokenEncriptado = $this->encrypts($rutCompleto . "," . $dv . "," . $clave);

        $tokenEncriptado = $this->encrypts($hora);
        $link = base_url() . 'inicio_correo?token=' . $hora;

        if ($estado == "A") {
            try {
                $this->insertaLogUsuario($id, "Activa cuenta y envia correo a rut: " . $rut . " nombre: " . $nombre . " correo: " . $correo, 1);

                $this->load->library('phpmailer_lib');
                $mail = $this->phpmailer_lib->load();
                $mail->isSMTP();
                $mail->Host     = 'mail.aversionalriesgo.cl';
                $mail->SMTPAuth = true;
                $mail->Username = 'contacto@aversionalriesgo.cl';
                $mail->Password = '81G_Dc8Ani$5';
                $mail->SMTPSecure = 'ssl';
                $mail->Port     = 465;

                $mail->setFrom('contacto@aversionalriesgo.cl', 'Test');

                $mail->addAddress($correo);

                $mail->Subject = utf8_decode('Activación de Cuestionarios');

                $mail->isHTML(true);

                $mailContent = utf8_decode('<!DOCTYPE html>
                                <html lang="en">
                                
                                <head>
                                    <meta charset="UTF-8">
                                    <meta name="viewport" content="width=device-width, initial-scale=1.0">
                                </head>
                                <body>
                                    <div style="height: 550px; width: 400px; ">
                                        <b><u>Proyecto PARO 2022 de Enap Refineria Bio-Bio por Ferrostaal</u></b><br>
                                        <p style="padding: 10px; font-family: Verdana;">
                                        Hola ' . $nombre . '!<br>
                                        Mi nombre es Miguel Santa Ana. Soy psicologo encargado de tu evaluacion de aversion al
                                        riesgo y te hago envío de los datos necesarios para que puedas realizar una serie de test, que
                                        en su conjunto pretender determinar una serie de rasgos de tu personalidad.<br><br><br>

                                        <b><u>Datos</u></b><br>
                                        Rut: ' . $rut . '<br>
                                        Clave: ' . $clave . '<br>
                                        Link de Ingreso: <a target="_blank" href="' . $link . '">Haz click Aca</a> <br><br>
                                        
                                        Debes leer cada una de las indicaciones, con el objetivo de contar con la información mas<br>
                                        fiel a tu perfil<br><br>
                                        En esta pagina encontraras 5 test, cada uno de ellos cuenta con sus especificaciones, lee
                                        atentamente cada una de estas especificaciones y no pierdas tiempo en buscar las respuestas
                                        en otros medios.<br><br>
                                        Éxito
                                            <br>
                                            <br>
                                            Mensaje generado automaticamente. Favor no responder a este mensaje.
                                        </p>
                                    </div>
                                </body>
                                </html>');
                $mail->Body = $mailContent;

                // Send email
                if (!$mail->send()) {
                    $this->db->trans_rollback();
                    return 0;
                } else {
                    //$this->generaLog($id, "Envio de Correo para realizar test.");
                    $this->db->trans_commit();
                    $this->addToken($id, $hora, $rutCompleto, $dv, $clave);
                    return 1;
                }
            } catch (\Throwable $th) {
                $this->db->trans_rollback();
                return 0;
            }
        }
        $this->insertaLogUsuario($id, "Desactiva cuenta a rut: " . $rut . " nombre:" . $nombre, 1);

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
}
