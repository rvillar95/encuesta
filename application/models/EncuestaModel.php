<?php

defined('BASEPATH') or exit('No direct script access allowed');

class EncuestaModel extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    function enviarBarrat($test, $idUsuario)
    {
        $hora = $this->session->userdata("hora");
        $idToken = $hora["idToken"];
        $sql = "SELECT count(*) as CANTIDAD from resultado_barrat where usuario = " . $idUsuario . " and token = " . $idToken;
        $resultado = $this->db->query($sql)->result();
        $cantidad = $resultado[0]->CANTIDAD;
        if ($cantidad == 0) {
            $resultadoBarrat = 0;
            for ($i = 1; $i < 31; $i++) {
                $resultadoBarrat += $test["$i"];
            }
            //echo "El resultado es: ".$resultadoBarrat;
            //exit();
            $resu1 = !isset($test["1"]) ? "0" : $test["1"];
            $resu2 = !isset($test["2"]) ? "0" : $test["2"];
            $resu3 = !isset($test["3"]) ? "0" : $test["3"];
            $resu4 = !isset($test["4"]) ? "0" : $test["4"];
            $resu5 = !isset($test["5"]) ? "0" : $test["5"];
            $resu6 = !isset($test["6"]) ? "0" : $test["6"];
            $resu7 = !isset($test["7"]) ? "0" : $test["7"];
            $resu8 = !isset($test["8"]) ? "0" : $test["8"];
            $resu9 = !isset($test["9"]) ? "0" : $test["9"];
            $resu10 = !isset($test["10"]) ? "0" : $test["10"];
            $resu11 = !isset($test["11"]) ? "0" : $test["11"];
            $resu12 = !isset($test["12"]) ? "0" : $test["12"];
            $resu13 = !isset($test["13"]) ? "0" : $test["13"];
            $resu14 = !isset($test["14"]) ? "0" : $test["14"];
            $resu15 = !isset($test["15"]) ? "0" : $test["15"];
            $resu16 = !isset($test["16"]) ? "0" : $test["16"];
            $resu17 = !isset($test["17"]) ? "0" : $test["17"];
            $resu18 = !isset($test["18"]) ? "0" : $test["18"];
            $resu19 = !isset($test["19"]) ? "0" : $test["19"];
            $resu20 = !isset($test["20"]) ? "0" : $test["20"];
            $resu21 = !isset($test["21"]) ? "0" : $test["21"];
            $resu22 = !isset($test["22"]) ? "0" : $test["22"];
            $resu23 = !isset($test["23"]) ? "0" : $test["23"];
            $resu24 = !isset($test["24"]) ? "0" : $test["24"];
            $resu25 = !isset($test["25"]) ? "0" : $test["25"];
            $resu26 = !isset($test["26"]) ? "0" : $test["26"];
            $resu27 = !isset($test["27"]) ? "0" : $test["27"];
            $resu28 = !isset($test["28"]) ? "0" : $test["28"];
            $resu29 = !isset($test["29"]) ? "0" : $test["29"];
            $resu30 = !isset($test["30"]) ? "0" : $test["30"];
            $sql = "INSERT INTO resultado_barrat (usuario, 
            token,
        resultado_1,
        resultado_2,
        resultado_3,
        resultado_4,
        resultado_5,
        resultado_6,
        resultado_7,
        resultado_8,
        resultado_9,
        resultado_10,
        resultado_11,
        resultado_12,
        resultado_13,
        resultado_14,
        resultado_15,
        resultado_16,
        resultado_17,
        resultado_18,
        resultado_19,
        resultado_20,
        resultado_21,
        resultado_22,
        resultado_23,
        resultado_24,
        resultado_25,
        resultado_26,
        resultado_27,
        resultado_28,
        resultado_29,
        resultado_30,
        resultado) VALUES (
            " . $idUsuario . ",
            " . $idToken . ",
            " . $resu1 . ",
            " . $resu2 . ",
            " . $resu3 . ",
            " . $resu4 . ",
            " . $resu5 . ",
            " . $resu6 . ",
            " . $resu7 . ",
            " . $resu8 . ",
            " . $resu9 . ",
            " . $resu10 . ",
            " . $resu11 . ",
            " . $resu12 . ",
            " . $resu13 . ",
            " . $resu14 . ",
            " . $resu15 . ",
            " . $resu16 . ",
            " . $resu17 . ",
            " . $resu18 . ",
            " . $resu19 . ",
            " . $resu20 . ",
            " . $resu21 . ",
            " . $resu22 . ",
            " . $resu23 . ",
            " . $resu24 . ",
            " . $resu25 . ",
            " . $resu26 . ",
            " . $resu27 . ",
            " . $resu28 . ",
            " . $resu29 . ",
            " . $resu30 . ",
            " . $resultadoBarrat . "
        )";
        } else {
            return "repetido";
        }
        $resultado = $this->db->query($sql);
        return $resultado;
    }

    function enviarWonderlic($test, $idUsuario)
    {

        $hora = $this->session->userdata("hora");
        $idToken = $hora["idToken"];
        $resultado15 = "";
        $resultado26 = "";
        $resultado31 = "";
        $resultado37 = "";
        $resultado46 = "";
        $respuestasCorrectas = array(
            "1" => "4", "2" => "4", "3" => "4", "4" => "3", "5" => "7", "6" => "1", "7" => "4", "8" => "243", "9" => "3", "10" => "1", "11" => "4", "12" => "1", "13" => "4", "14" => "1", "15" => "1,4", "16" => "2", "17" => "H", "18" => "1",
            "19" => "3", "20" => "3", "21" => "3", "22" => "40", "23" => "1", "24" => "15-21", "25" => "1", "26" => "1,2", "27" => "3", "28" => "3", "29" => "3", "30" => "1", "31" => "1", "32" => "3", "33" => "4", "34" => "3", "35" => "3", "36" => "2 seg.",
            "37" => "1,3", "38" => "2100", "39" => "V", "40" => "3", "41" => "2", "42" => "5", "43" => "80", "44" => "3-15", "45" => "10", "46" => "1,5", "47" => "60", "48" => "3", "49" => "4", "50" => "175"
        );
        if (isset($test["15"])) {
            if (count($test["15"]) > 0) {
                foreach ($test["15"] as $key => $value) {
                    $resultado15 .= $value . ",";
                }
                $resultado15 = substr($resultado15, 0, -1);
            }
        } else {
            $resultado15 = "0";
        }
        if (isset($test["26"])) {
            if (count($test["26"]) > 0) {
                foreach ($test["26"] as $key => $value) {
                    $resultado26 .= $value . ",";
                }
                $resultado26 = substr($resultado26, 0, -1);
            }
        } else {
            $resultado26 = "0";
        }
        if (isset($test["31"])) {
            if (count($test["31"]) > 0) {
                foreach ($test["31"] as $key => $value) {
                    $resultado31 .= $value . ",";
                }
                $resultado31 = substr($resultado31, 0, -1);
            }
        } else {
            $resultado31 = "0";
        }
        if (isset($test["37"])) {
            if (count($test["37"]) > 0) {
                foreach ($test["37"] as $key => $value) {
                    $resultado37 .= $value . ",";
                }
                $resultado37 = substr($resultado37, 0, -1);
            }
        } else {
            $resultado37 = "0";
        }
        if (isset($test["46"])) {
            if (count($test["46"]) > 0) {
                foreach ($test["46"] as $key => $value) {
                    $resultado46 .= $value . ",";
                }
                $resultado46 = substr($resultado46, 0, -1);
            }
        } else {
            $resultado46 = "0";
        }

        $resultadoWonderlic = 0;
        for ($i = 1; $i < 51; $i++) {
            if ($i != 15 && $i != 26 && $i != 31 && $i != 37 && $i != 46) {
                //echo "paso en ".$i." <br>";
                if (isset($test["$i"])) {
                    if (strtoupper(trim($respuestasCorrectas[$i])) == strtoupper(trim($test["$i"]))) {
                        $resultadoWonderlic++;
                    }
                }
            } else if ($i == 15) {
                if (strtoupper($respuestasCorrectas[$i]) == strtoupper($resultado15)) {
                    $resultadoWonderlic++;
                }
            } else if ($i == 26) {
                if (strtoupper($respuestasCorrectas[$i]) == strtoupper($resultado26)) {
                    $resultadoWonderlic++;
                }
            } else if ($i == 31) {
                if (strtoupper($respuestasCorrectas[$i]) == strtoupper($resultado31)) {
                    $resultadoWonderlic++;
                }
            } else if ($i == 37) {
                if (strtoupper($respuestasCorrectas[$i]) == strtoupper($resultado37)) {
                    $resultadoWonderlic++;
                }
            } else if ($i == 46) {
                if (strtoupper($respuestasCorrectas[$i]) == strtoupper($resultado46)) {
                    $resultadoWonderlic++;
                }
            }
        }
        //echo "El resultado es: " . $resultadoWonderlic;
        //exit();

        $resu1 = !isset($test["1"]) ? "0" : $test["1"];
        $resu2 = !isset($test["2"]) ? "0" : $test["2"];
        $resu3 = !isset($test["3"]) ? "0" : $test["3"];
        $resu4 = !isset($test["4"]) ? "0" : $test["4"];
        $resu5 = !isset($test["5"]) || $test["5"] == "" ? "0" : $test["5"];
        $resu6 = !isset($test["6"]) ? "0" : $test["6"];
        $resu7 = !isset($test["7"]) ? "0" : $test["7"];
        $resu8 = !isset($test["8"]) || $test["8"] == "" ? "0" : $test["8"];
        $resu9 = !isset($test["9"]) ? "0" : $test["9"];
        $resu10 = !isset($test["10"]) ? "0" : $test["10"];
        $resu11 = !isset($test["11"]) ? "0" : $test["11"];
        $resu12 = !isset($test["12"]) ? "0" : $test["12"];
        $resu13 = !isset($test["13"]) ? "0" : $test["13"];
        $resu14 = !isset($test["14"]) ? "0" : $test["14"];
        $resu16 = !isset($test["16"]) ? "0" : $test["16"];
        $resu17 = !isset($test["17"]) || $test["17"] == "" ? "0" : $test["17"];
        $resu18 = !isset($test["18"]) ? "0" : $test["18"];
        $resu19 = !isset($test["19"]) ? "0" : $test["19"];
        $resu20 = !isset($test["20"]) ? "0" : $test["20"];
        $resu21 = !isset($test["21"]) ? "0" : $test["21"];
        $resu22 = !isset($test["22"]) || $test["22"] == "" ? "0" : $test["22"];
        $resu23 = !isset($test["23"]) ? "0" : $test["23"];
        $resu24 = !isset($test["24"]) || $test["24"] == "" ? "0" : $test["24"];
        $resu25 = !isset($test["25"]) ? "0" : $test["25"];
        $resu27 = !isset($test["27"]) ? "0" : $test["27"];
        $resu28 = !isset($test["28"]) ? "0" : $test["28"];
        $resu29 = !isset($test["29"]) || $test["29"] == "" ? "0" : $test["29"];
        $resu30 = !isset($test["30"]) ? "0" : $test["30"];
        $resu32 = !isset($test["32"]) ? "0" : $test["32"];
        $resu33 = !isset($test["33"]) ? "0" : $test["33"];
        $resu34 = !isset($test["34"]) ? "0" : $test["34"];
        $resu35 = !isset($test["35"]) ? "0" : $test["35"];
        $resu36 = !isset($test["36"]) || $test["36"] == "" ? "0" : $test["36"];
        $resu38 = !isset($test["38"]) || $test["38"] == "" ? "0" : $test["38"];
        $resu39 = !isset($test["39"]) || $test["39"] == "" ? "0" : $test["39"];
        $resu40 = !isset($test["40"]) ? "0" : $test["40"];
        $resu41 = !isset($test["41"]) ? "0" : $test["41"];
        $resu42 = !isset($test["42"]) ? "0" : $test["42"];
        $resu43 = !isset($test["43"]) || $test["43"] == "" ? "0" : $test["43"];
        $resu44 = !isset($test["44"]) || $test["44"] == "" ? "0" : $test["44"];
        $resu45 = !isset($test["45"]) || $test["45"] == "" ? "0" : $test["45"];
        $resu47 = !isset($test["47"]) || $test["47"] == "" ? "0" : $test["47"];
        $resu48 = !isset($test["48"]) ? "0" : $test["48"];
        $resu49 = !isset($test["49"]) ? "0" : $test["49"];
        $resu50 = !isset($test["50"]) || $test["50"] == "" ? "0" : $test["50"];
        $sql = "SELECT count(*) as CANTIDAD from resultado_wonderlic where usuario = " . $idUsuario . " and token = " . $idToken;
        $resultado = $this->db->query($sql)->result();
        $cantidad = $resultado[0]->CANTIDAD;



        if ($cantidad == 0) {
            $sql = "INSERT INTO resultado_wonderlic (usuario,
            token, 
        resultado_1,
        resultado_2,
        resultado_3,
        resultado_4,
        resultado_5,
        resultado_6,
        resultado_7,
        resultado_8,
        resultado_9,
        resultado_10,
        resultado_11,
        resultado_12,
        resultado_13,
        resultado_14,
        resultado_15,
        resultado_16,
        resultado_17,
        resultado_18,
        resultado_19,
        resultado_20,
        resultado_21,
        resultado_22,
        resultado_23,
        resultado_24,
        resultado_25,
        resultado_26,
        resultado_27,
        resultado_28,
        resultado_29,
        resultado_30,
        resultado_31,
        resultado_32,
        resultado_33,
        resultado_34,
        resultado_35,
        resultado_36,
        resultado_37,
        resultado_38,
        resultado_39,
        resultado_40,
        resultado_41,
        resultado_42,
        resultado_43,
        resultado_44,
        resultado_45,
        resultado_46,
        resultado_47,
        resultado_48,
        resultado_49,
        resultado_50,
        resultado) VALUES (
            " . $idUsuario . ",
            " . $idToken . ",
            '" . $resu1 . "',
            '" . $resu2 . "',
            '" . $resu3 . "',
            '" . $resu4 . "',
            '" . $resu5 . "',
            '" . $resu6 . "',
            '" . $resu7 . "',
            '" . $resu8 . "',
            '" . $resu9 . "',
            '" . $resu10 . "',
            '" . $resu11 . "',
            '" . $resu12 . "',
            '" . $resu13 . "',
            '" . $resu14 . "',
            '" . $resultado15 . "',
            '" . $resu16 . "',
            '" . $resu17 . "',
            '" . $resu18 . "',
            '" . $resu19 . "',
            '" . $resu20 . "',
            '" . $resu21 . "',
            '" . $resu22 . "',
            '" . $resu23 . "',
            '" . $resu24 . "',
            '" . $resu25 . "',
            '" . $resultado26 . "',
            '" . $resu27 . "',
            '" . $resu28 . "',
            '" . $resu29 . "',
            '" . $resu30 . "',
            '" . $resultado31 . "',
            '" . $resu32 . "',
            '" . $resu33 . "',
            '" . $resu34 . "',
            '" . $resu35 . "',
            '" . $resu36 . "',
            '" . $resultado37 . "',
            '" . $resu38 . "',
            '" . $resu39 . "',
            '" . $resu40 . "',
            '" . $resu41 . "',
            '" . $resu42 . "',
            '" . $resu43 . "',
            '" . $resu44 . "',
            '" . $resu45 . "',
            '" . $resultado46 . "',
            '" . $resu47 . "',
            '" . $resu48 . "',
            '" . $resu49 . "',
            '" . $resu50 . "',
            " . $resultadoWonderlic . "
        )";

            $update = "update inicio_token set wonderlic_fecha_termino_usuario = now() where id = " . $idToken;
            $this->db->query($update);

            $resultado = $this->db->query($sql);
            return $resultado;
        } else {
            return "repetido";
        }
    }

    function enviarAlerta($test, $idUsuario)
    {
        $hora = $this->session->userdata("hora");
        $idToken = $hora["idToken"];
        $sql = "SELECT count(*) as CANTIDAD from resultado_alerta where usuario = " . $idUsuario . " and token = " . $idToken;
        $resultado = $this->db->query($sql)->result();
        $cantidad = $resultado[0]->CANTIDAD;
        $respuestasCorrectas = array(
            "1" => "c", "2" => "a", "3" => "d", "4" => "b", "5" => "e", "6" => "a", "7" => "c", "8" => "e", "9" => "d", "10" => "b", "11" => "b", "12" => "b", "13" => "e", "14" => "b", "15" => "b", "16" => "c", "17" => "e", "18" => "d",
            "19" => "b", "20" => "d", "21" => "b", "22" => "a", "23" => "a", "24" => "c", "25" => "a", "26" => "c", "27" => "b", "28" => "d", "29" => "a", "30" => "d", "31" => "c", "32" => "e", "33" => "d", "34" => "d", "35" => "e", "36" => "e"
        );
        $resultadoAlerta = 0;
        for ($i = 1; $i < 37; $i++) {
            if (isset($test["$i"])) {
                if ($respuestasCorrectas[$i] == $test["$i"]) {
                    $resultadoAlerta++;
                }
            }
        }
        //echo "el resultado es: " . $resultadoAlerta;
        //exit();
        if ($cantidad == 0) {
            $resu1 = !isset($test["1"]) ? "0" : $test["1"];
            $resu2 = !isset($test["2"]) ? "0" : $test["2"];
            $resu3 = !isset($test["3"]) ? "0" : $test["3"];
            $resu4 = !isset($test["4"]) ? "0" : $test["4"];
            $resu5 = !isset($test["5"]) ? "0" : $test["5"];
            $resu6 = !isset($test["6"]) ? "0" : $test["6"];
            $resu7 = !isset($test["7"]) ? "0" : $test["7"];
            $resu8 = !isset($test["8"]) ? "0" : $test["8"];
            $resu9 = !isset($test["9"]) ? "0" : $test["9"];
            $resu10 = !isset($test["10"]) ? "0" : $test["10"];
            $resu11 = !isset($test["11"]) ? "0" : $test["11"];
            $resu12 = !isset($test["12"]) ? "0" : $test["12"];
            $resu13 = !isset($test["13"]) ? "0" : $test["13"];
            $resu14 = !isset($test["14"]) ? "0" : $test["14"];
            $resu15 = !isset($test["15"]) ? "0" : $test["15"];
            $resu16 = !isset($test["16"]) ? "0" : $test["16"];
            $resu17 = !isset($test["17"]) ? "0" : $test["17"];
            $resu18 = !isset($test["18"]) ? "0" : $test["18"];
            $resu19 = !isset($test["19"]) ? "0" : $test["19"];
            $resu20 = !isset($test["20"]) ? "0" : $test["20"];
            $resu21 = !isset($test["21"]) ? "0" : $test["21"];
            $resu22 = !isset($test["22"]) ? "0" : $test["22"];
            $resu23 = !isset($test["23"]) ? "0" : $test["23"];
            $resu24 = !isset($test["24"]) ? "0" : $test["24"];
            $resu25 = !isset($test["25"]) ? "0" : $test["25"];
            $resu26 = !isset($test["26"]) ? "0" : $test["26"];
            $resu27 = !isset($test["27"]) ? "0" : $test["27"];
            $resu28 = !isset($test["28"]) ? "0" : $test["28"];
            $resu29 = !isset($test["29"]) ? "0" : $test["29"];
            $resu30 = !isset($test["30"]) ? "0" : $test["30"];
            $resu31 = !isset($test["31"]) ? "0" : $test["31"];
            $resu32 = !isset($test["32"]) ? "0" : $test["32"];
            $resu33 = !isset($test["33"]) ? "0" : $test["33"];
            $resu34 = !isset($test["34"]) ? "0" : $test["34"];
            $resu35 = !isset($test["35"]) ? "0" : $test["35"];
            $resu36 = !isset($test["36"]) ? "0" : $test["36"];


            $sql = "INSERT INTO resultado_alerta (usuario, 
            token,
        imagen_1,
        imagen_2,
        imagen_3,
        imagen_4,
        imagen_5,
        imagen_6,
        imagen_7,
        imagen_8,
        imagen_9,
        imagen_10,
        imagen_11,
        imagen_12,
        imagen_13,
        imagen_14,
        imagen_15,
        imagen_16,
        imagen_17,
        imagen_18,
        imagen_19,
        imagen_20,
        imagen_21,
        imagen_22,
        imagen_23,
        imagen_24,
        imagen_25,
        imagen_26,
        imagen_27,
        imagen_28,
        imagen_29,
        imagen_30,
        imagen_31,
        imagen_32,
        imagen_33,
        imagen_34,
        imagen_35,
        imagen_36,
        resultado) VALUES (
            " . $idUsuario . ",
            " . $idToken . ",
            '" . $resu1 . "',
            '" . $resu2 . "',
            '" . $resu3 . "',
            '" . $resu4 . "',
            '" . $resu5 . "',
            '" . $resu6 . "',
            '" . $resu7 . "',
            '" . $resu8 . "',
            '" . $resu9 . "',
            '" . $resu10 . "',
            '" . $resu11 . "',
            '" . $resu12 . "',
            '" . $resu13 . "',
            '" . $resu14 . "',
            '" . $resu15 . "',
            '" . $resu16 . "',
            '" . $resu17 . "',
            '" . $resu18 . "',
            '" . $resu19 . "',
            '" . $resu20 . "',
            '" . $resu21 . "',
            '" . $resu22 . "',
            '" . $resu23 . "',
            '" . $resu24 . "',
            '" . $resu25 . "',
            '" . $resu26 . "',
            '" . $resu27 . "',
            '" . $resu28 . "',
            '" . $resu29 . "',
            '" . $resu30 . "',
            '" . $resu31 . "',
            '" . $resu32 . "',
            '" . $resu33 . "',
            '" . $resu34 . "',
            '" . $resu35 . "',
            '" . $resu36 . "',
            " . $resultadoAlerta . "
        )";

            $update = "update inicio_token set alerta_fecha_termino_usuario = now() where id = " . $idToken;
            $this->db->query($update);
            $resultado = $this->db->query($sql);
            return $resultado;
        } else {
            return "repetido";
        }
    }

    function enviarRelacionesInterpersonales($test, $idUsuario)
    {
        $hora = $this->session->userdata("hora");
        $idToken = $hora["idToken"];
        $sql = "SELECT count(*) as CANTIDAD from resultado_relacion where usuario = " . $idUsuario . " and token = " . $idToken;
        $resultado = $this->db->query($sql)->result();
        $cantidad = $resultado[0]->CANTIDAD;
        $trabajoEnequipo = array();
        $cant1 = 0;
        $cant2 = 0;
        $cant3 = 0;
        $cant4 = 0;
        for ($i = 1; $i < 11; $i++) {
            if (isset($test["$i"])) {
                if ($test["$i"] == 1) {
                    $cant1++;
                } else if ($test["$i"] == 2) {
                    $cant2++;
                } else if ($test["$i"] == 3) {
                    $cant3++;
                } else if ($test["$i"] == 4) {
                    $cant4++;
                }
            }
        }
        $trabajoEnequipo["cant1"] = $cant1;
        $trabajoEnequipo["total1"] = $cant1 * 1;
        $trabajoEnequipo["cant2"] = $cant2;
        $trabajoEnequipo["total2"] = $cant2 * 2;
        $trabajoEnequipo["cant3"] = $cant3;
        $trabajoEnequipo["total3"] = $cant3 * 3;
        $trabajoEnequipo["cant4"] = $cant4;
        $trabajoEnequipo["total4"] = $cant4 * 4;
        $trabajoEnequipo["totalfila"] = ($cant1 * 1) + ($cant2 * 2) + ($cant3 * 3) + ($cant4 * 4);
        $trabajoEnequipo["totalposible"] = 40;
        $trabajoEnequipo["porcentajelogro"] = round(((($cant1 * 1) + ($cant2 * 2) + ($cant3 * 3) + ($cant4 * 4)) * 100) / 40);
        // 40  100
        // 19
       // echo "la cantidad de 1: " . $cant1 . " cantidad 2: " . $cant2 . " cantidad 3: " . $cant3 . " cantidad 4: " . $cant4 . "<br>";
      //  echo "<pre>";
      //  print_r($trabajoEnequipo);
      //  echo "</pre>";
        //exit();
        $autoControlEmocional = array();
        $cant1 = 0;
        $cant2 = 0;
        $cant3 = 0;
        $cant4 = 0;
        for ($i = 11; $i < 16; $i++) {
            if (isset($test["$i"])) {
                if ($test["$i"] == 1) {
                    $cant1++;
                } else if ($test["$i"] == 2) {
                    $cant2++;
                } else if ($test["$i"] == 3) {
                    $cant3++;
                } else if ($test["$i"] == 4) {
                    $cant4++;
                }
            }
        }
        $autoControlEmocional["cant1"] = $cant1;
        $autoControlEmocional["total1"] = $cant1 * 1;
        $autoControlEmocional["cant2"] = $cant2;
        $autoControlEmocional["total2"] = $cant2 * 2;
        $autoControlEmocional["cant3"] = $cant3;
        $autoControlEmocional["total3"] = $cant3 * 3;
        $autoControlEmocional["cant4"] = $cant4;
        $autoControlEmocional["total4"] = $cant4 * 4;
        $autoControlEmocional["totalfila"] = ($cant1 * 1) + ($cant2 * 2) + ($cant3 * 3) + ($cant4 * 4);
        $autoControlEmocional["totalposible"] = 20;
        $autoControlEmocional["porcentajelogro"] = round(((($cant1 * 1) + ($cant2 * 2) + ($cant3 * 3) + ($cant4 * 4)) * 100) / 20);
        // 40  100
        // 19
      //  echo "la cantidad de 1: " . $cant1 . " cantidad 2: " . $cant2 . " cantidad 3: " . $cant3 . " cantidad 4: " . $cant4 . "<br>";
      //  echo "<pre>";
      //  print_r($autoControlEmocional);
      //  echo "</pre>";
     
        $empatia = array();
        $cant1 = 0;
        $cant2 = 0;
        $cant3 = 0;
        $cant4 = 0;
        for ($i = 16; $i < 21; $i++) {
            if (isset($test["$i"])) {
                if ($test["$i"] == 1) {
                    $cant1++;
                } else if ($test["$i"] == 2) {
                    $cant2++;
                } else if ($test["$i"] == 3) {
                    $cant3++;
                } else if ($test["$i"] == 4) {
                    $cant4++;
                }
            }
        }
        $empatia["cant1"] = $cant1;
        $empatia["total1"] = $cant1 * 1;
        $empatia["cant2"] = $cant2;
        $empatia["total2"] = $cant2 * 2;
        $empatia["cant3"] = $cant3;
        $empatia["total3"] = $cant3 * 3;
        $empatia["cant4"] = $cant4;
        $empatia["total4"] = $cant4 * 4;
        $empatia["totalfila"] = ($cant1 * 1) + ($cant2 * 2) + ($cant3 * 3) + ($cant4 * 4);
        $empatia["totalposible"] = 20;
        $empatia["porcentajelogro"] = round(((($cant1 * 1) + ($cant2 * 2) + ($cant3 * 3) + ($cant4 * 4)) * 100) / 20);
        // 40  100
        // 19
      //  echo "la cantidad de 1: " . $cant1 . " cantidad 2: " . $cant2 . " cantidad 3: " . $cant3 . " cantidad 4: " . $cant4 . "<br>";
      //  echo "<pre>";
      //  print_r($empatia);
      //  echo "</pre>";
        $toleranciaaotros = array();
        $cant1 = 0;
        $cant2 = 0;
        $cant3 = 0;
        $cant4 = 0;
        for ($i = 21; $i < 26; $i++) {
            if (isset($test["$i"])) {
                if ($test["$i"] == 1) {
                    $cant1++;
                } else if ($test["$i"] == 2) {
                    $cant2++;
                } else if ($test["$i"] == 3) {
                    $cant3++;
                } else if ($test["$i"] == 4) {
                    $cant4++;
                }
            }
        }
        $toleranciaaotros["cant1"] = $cant1;
        $toleranciaaotros["total1"] = $cant1 * 1;
        $toleranciaaotros["cant2"] = $cant2;
        $toleranciaaotros["total2"] = $cant2 * 2;
        $toleranciaaotros["cant3"] = $cant3;
        $toleranciaaotros["total3"] = $cant3 * 3;
        $toleranciaaotros["cant4"] = $cant4;
        $toleranciaaotros["total4"] = $cant4 * 4;
        $toleranciaaotros["totalfila"] = ($cant1 * 1) + ($cant2 * 2) + ($cant3 * 3) + ($cant4 * 4);
        $toleranciaaotros["totalposible"] = 20;
        $toleranciaaotros["porcentajelogro"] = round(((($cant1 * 1) + ($cant2 * 2) + ($cant3 * 3) + ($cant4 * 4)) * 100) / 20);
        // 40  100
        // 19
     //   echo "la cantidad de 1: " . $cant1 . " cantidad 2: " . $cant2 . " cantidad 3: " . $cant3 . " cantidad 4: " . $cant4 . "<br>";
       // echo "<pre>";
     //   print_r($toleranciaaotros);
       // echo "</pre>";
    
        $habilidadescomunicativas = array();
        $cant1 = 0;
        $cant2 = 0;
        $cant3 = 0;
        $cant4 = 0;
        for ($i = 26; $i < 31; $i++) {
            if (isset($test["$i"])) {
                if ($test["$i"] == 1) {
                    $cant1++;
                } else if ($test["$i"] == 2) {
                    $cant2++;
                } else if ($test["$i"] == 3) {
                    $cant3++;
                } else if ($test["$i"] == 4) {
                    $cant4++;
                }
            }
        }
        $habilidadescomunicativas["cant1"] = $cant1;
        $habilidadescomunicativas["total1"] = $cant1 * 1;
        $habilidadescomunicativas["cant2"] = $cant2;
        $habilidadescomunicativas["total2"] = $cant2 * 2;
        $habilidadescomunicativas["cant3"] = $cant3;
        $habilidadescomunicativas["total3"] = $cant3 * 3;
        $habilidadescomunicativas["cant4"] = $cant4;
        $habilidadescomunicativas["total4"] = $cant4 * 4;
        $habilidadescomunicativas["totalfila"] = ($cant1 * 1) + ($cant2 * 2) + ($cant3 * 3) + ($cant4 * 4);
        $habilidadescomunicativas["totalposible"] = 20;
        $habilidadescomunicativas["porcentajelogro"] = round(((($cant1 * 1) + ($cant2 * 2) + ($cant3 * 3) + ($cant4 * 4)) * 100) / 20);
        // 40  100
        // 19
//echo "la cantidad de 1: " . $cant1 . " cantidad 2: " . $cant2 . " cantidad 3: " . $cant3 . " cantidad 4: " . $cant4 . "<br>";
       // echo "<pre>";
        //print_r($habilidadescomunicativas);
       // echo "</pre>";
        $resultadoFinal = array();
        array_push($resultadoFinal,array("fila1"=>$trabajoEnequipo));
        array_push($resultadoFinal,array("fila2"=>$autoControlEmocional));
        array_push($resultadoFinal,array("fila3"=>$empatia));
        array_push($resultadoFinal,array("fila4"=>$toleranciaaotros));
        array_push($resultadoFinal,array("fila5"=>$habilidadescomunicativas));
        //echo "<pre>";
        $resultadoFinal = json_encode($resultadoFinal);
        //echo "</pre>";
        //exit();
        if ($cantidad == 0) {
            $resu1 = !isset($test["1"]) ? "0" : $test["1"];
            $resu2 = !isset($test["2"]) ? "0" : $test["2"];
            $resu3 = !isset($test["3"]) ? "0" : $test["3"];
            $resu4 = !isset($test["4"]) ? "0" : $test["4"];
            $resu5 = !isset($test["5"]) ? "0" : $test["5"];
            $resu6 = !isset($test["6"]) ? "0" : $test["6"];
            $resu7 = !isset($test["7"]) ? "0" : $test["7"];
            $resu8 = !isset($test["8"]) ? "0" : $test["8"];
            $resu9 = !isset($test["9"]) ? "0" : $test["9"];
            $resu10 = !isset($test["10"]) ? "0" : $test["10"];
            $resu11 = !isset($test["11"]) ? "0" : $test["11"];
            $resu12 = !isset($test["12"]) ? "0" : $test["12"];
            $resu13 = !isset($test["13"]) ? "0" : $test["13"];
            $resu14 = !isset($test["14"]) ? "0" : $test["14"];
            $resu15 = !isset($test["15"]) ? "0" : $test["15"];
            $resu16 = !isset($test["16"]) ? "0" : $test["16"];
            $resu17 = !isset($test["17"]) ? "0" : $test["17"];
            $resu18 = !isset($test["18"]) ? "0" : $test["18"];
            $resu19 = !isset($test["19"]) ? "0" : $test["19"];
            $resu20 = !isset($test["20"]) ? "0" : $test["20"];
            $resu21 = !isset($test["21"]) ? "0" : $test["21"];
            $resu22 = !isset($test["22"]) ? "0" : $test["22"];
            $resu23 = !isset($test["23"]) ? "0" : $test["23"];
            $resu24 = !isset($test["24"]) ? "0" : $test["24"];
            $resu25 = !isset($test["25"]) ? "0" : $test["25"];
            $resu26 = !isset($test["26"]) ? "0" : $test["26"];
            $resu27 = !isset($test["27"]) ? "0" : $test["27"];
            $resu28 = !isset($test["28"]) ? "0" : $test["28"];
            $resu29 = !isset($test["29"]) ? "0" : $test["29"];
            $resu30 = !isset($test["30"]) ? "0" : $test["30"];

            $sql = "INSERT INTO resultado_relacion (usuario, 
            token,
            resultado_1,
            resultado_2,
            resultado_3,
            resultado_4,
            resultado_5,
            resultado_6,
            resultado_7,
            resultado_8,
            resultado_9,
            resultado_10,
            resultado_11,
            resultado_12,
            resultado_13,
            resultado_14,
            resultado_15,
            resultado_16,
            resultado_17,
            resultado_18,
            resultado_19,
            resultado_20,
            resultado_21,
            resultado_22,
            resultado_23,
            resultado_24,
            resultado_25,
            resultado_26,
            resultado_27,
            resultado_28,
            resultado_29,
            resultado_30,
            resultado) VALUES (
            " . $idUsuario . ",
            " . $idToken . ",
            " . $resu1 . ",
            " . $resu2 . ",
            " . $resu3 . ",
            " . $resu4 . ",
            " . $resu5 . ",
            " . $resu6 . ",
            " . $resu7 . ",
            " . $resu8 . ",
            " . $resu9 . ",
            " . $resu10 . ",
            " . $resu11 . ",
            " . $resu12 . ",
            " . $resu13 . ",
            " . $resu14 . ",
            " . $resu15 . ",
            " . $resu16 . ",
            " . $resu17 . ",
            " . $resu18 . ",
            " . $resu19 . ",
            " . $resu20 . ",
            " . $resu21 . ",
            " . $resu22 . ",
            " . $resu23 . ",
            " . $resu24 . ",
            " . $resu25 . ",
            " . $resu26 . ",
            " . $resu27 . ",
            " . $resu28 . ",
            " . $resu29 . ",
            " . $resu30 . ",
            '".$resultadoFinal."'
        )";
            $resultado = $this->db->query($sql);
            return $resultado;
        } else {
            return "repetido";
        }
    }

    function enviarDisc($test, $idUsuario)
    {

        $this->db->trans_begin();
        $hora = $this->session->userdata("hora");
        $idToken = $hora["idToken"];
        $sql = "SELECT count(*) as CANTIDAD from resultado_disc where usuario = " . $idUsuario . " and token = " . $idToken;
        //echo $sql;
        $resultado = $this->db->query($sql)->result();
        $cantidad = $resultado[0]->CANTIDAD;

        if ($cantidad == 0) {
            $resultadoJson = array();
            foreach ($test as $key => $value) {
                if ($value != "escorrecto") {
                    if ($value["mas"] != $value["menos"]) {
                        $value["pregunta"] = "$key";
                        $arregloPaso = json_encode($value);
                        array_push($resultadoJson, json_decode($arregloPaso));
                    } else {
                        $this->db->trans_rollback();
                        return array("2", "No se puede seleccionar la misma. (Pregunta N° " . $key . ")");
                    }
                }
            }
            //echo "<pre>";
            ///print_r($resultadoJson);
            //echo "</pre>";
            $resultadoJson = json_encode($resultadoJson);
            $sql = "insert into resultado_disc (usuario,token,resultado) values (" . $idUsuario . "," . $idToken . ",'" . $resultadoJson . "')";
            $resultado = $this->db->query($sql, FALSE);
            if ($this->db->trans_status() === FALSE) {
                $this->db->trans_rollback();
                return "0";
            } else {
                $this->db->trans_commit();
                //$this->db->trans_rollback();
                return "1";
            }
        } else {
            return "repetido";
        }
    }
}
