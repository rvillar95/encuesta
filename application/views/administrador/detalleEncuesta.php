<?php

//echo "<pre>";
//print_r($resultado);
//echo "</pre>";
$disc = json_decode($resultado["disc"]);
//echo ;
//exit();
if (count($disc) > 0) {
    $disc = json_decode($disc[0]->resultado);
} else {
    $disc = '';
}

//if ($this->session->userdata("administrador")[0]->id == 1) {
    // echo "<pre>";
    // print_r($resultado);
    // echo "</pre>";
    if (count($resultado["relacion"]) > 0) {
        $relacion = json_decode($resultado["relacion"]);
       // echo "aaaaa";
    } else {
        $relacion = '';
    }
    if ($relacion != '') {
        //print_r(json_decode($relacion));
    }


    //exit();
//}

$segmento = $resultado["segmento"];
//echo "<pre>";
//print_r($segmento);
//echo "</pre>";
$barrat =  isset($resultado["barrat"]) ? $resultado["barrat"] : "[]";
//if (count($resultado["relacion"]) > 0) {
//$resultado = 
//}else{
//$resultado = array();
//}
//$relacion =  isset($resultado["relacion"]) ? $resultado["relacion"] : "[]";
//print_r($relacion);

?>

<button class="btn btn-success" id="btnDescarga">DESCARGAR PDF</button>
<div class="row" id="html">

    <div class="container">
        <div class="col-md-12" id="datos"></div>
        <div class="col-md-12" id="barrat"></div>
        <div class="col-md-12" id="alerta"></div>
        <div class="col-md-12" id="wonderlic"></div>
        <div class="col-md-12" id="relaciones"></div>
        <div class="col-md-12" id="disc"></div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+parseInt(j7jyWK8fNQe+parseInt(A12Hb8AhRq26LrZ/JpcUGGOn+parseInt(Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
<script src="<?php echo base_url(); ?>lib/js/jquery-rut.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap4.min.js"></script>
<!--script type="text/javascript" src="<?php echo base_url(); ?>lib/js/jspdf.debug.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>lib/js/html2pdf.js"></script-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js" integrity="sha512-GsLlZN/3F2ErC5ifS5QtgpiJtWd43JWSuIgh7mbzZ8zBps+dvLusV+eNQATqgA/HdeKFVgA5v3S/cIrLF7QnIg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    $("#btnDescarga").click(function(e) {
        e.preventDefault();
        console.log();
        html2pdf(document.getElementById("html").innerHTML);
    });


    let usuario = JSON.parse('<?php print_r($resultado["usuario"]); ?>');
    //console.table(usuario);
    let filaUsuario = '<h1>Datos Usuario</h1>';
    filaUsuario += '<table class="table table-hover">';
    filaUsuario += '    <tr>';
    filaUsuario += '        <td>Nombre:</td>';
    filaUsuario += '        <td>' + usuario[0].nombre + '</td>';
    filaUsuario += '    </tr>';
    filaUsuario += '    <tr>';
    filaUsuario += '        <td>Rut:</td>';
    filaUsuario += '        <td>' + usuario[0].rut + '-' + usuario[0].dv + '</td>';
    filaUsuario += '    </tr>';
    filaUsuario += '    <tr>';
    filaUsuario += '        <td>Correo:</td>';
    filaUsuario += '        <td>' + usuario[0].correo + '</td>';
    filaUsuario += '    </tr>';
    filaUsuario += '    <tr>';
    filaUsuario += '        <td>Empresa:</td>';
    filaUsuario += '        <td>' + usuario[0].nombreempresa + '</td>';
    filaUsuario += '    </tr>';
    filaUsuario += '    <tr>';
    filaUsuario += '        <td>Cargo:</td>';
    filaUsuario += '        <td>' + usuario[0].nombrecargo + '</td>';
    filaUsuario += '    </tr>';
    filaUsuario += '</table>';
    $("#datos").empty();
    $("#datos").append(filaUsuario);
    let barrat = JSON.parse('<?php print_r($barrat); ?>');
    //console.log(barrat);
    if (barrat.length > 0) {


        let sumaBarrat = parseInt(barrat[0].resultado);
        //sumaBarrat = parseInt(barrat[0].resultado_1) + parseInt(barrat[0].resultado_2) + parseInt(barrat[0].resultado_3) + parseInt(barrat[0].resultado_4) + parseInt(barrat[0].resultado_5) + parseInt(barrat[0].resultado_6) + parseInt(barrat[0].resultado_7) + parseInt(barrat[0].resultado_8) + parseInt(barrat[0].resultado_9) + parseInt(barrat[0].resultado_10) + parseInt(barrat[0].resultado_11) + parseInt(barrat[0].resultado_12) + parseInt(barrat[0].resultado_13) + parseInt(barrat[0].resultado_14) + parseInt(barrat[0].resultado_15) + parseInt(barrat[0].resultado_16) + parseInt(barrat[0].resultado_17) + parseInt(barrat[0].resultado_18) + parseInt(barrat[0].resultado_19) + parseInt(barrat[0].resultado_20) + parseInt(barrat[0].resultado_21) + parseInt(barrat[0].resultado_22) + parseInt(barrat[0].resultado_23) + parseInt(barrat[0].resultado_24) + parseInt(barrat[0].resultado_25) + parseInt(barrat[0].resultado_26) + parseInt(barrat[0].resultado_27) + parseInt(barrat[0].resultado_28) + parseInt(barrat[0].resultado_29) + parseInt(barrat[0].resultado_30);
        // console.log("la suma es: " + sumaBarrat);
        let cumple = '';
        let Nocumple = '';
        let fila = '';
        fila += '<h1 style="margin:0px;">Test de barrat</h1>';
        fila += '<p>La escala de impulsividad del test Barratt es un cuestionario auto administrado de 30 preguntas que ayuda a determinar si, y hasta qué punto una persona puede tener un trastorno de control de impulsos o la impulsividad patológica</p>';
        fila += '<p>Tu resultado es: ' + sumaBarrat + '</p>';
        fila += '<table class="table table-hover">';
        if (sumaBarrat >= 30 && sumaBarrat <= 50) {
            fila += '   <tr class="table-success">';
        } else {
            fila += '   <tr>';
        }
        fila += '       <td>30 a 50</td>';
        fila += '       <td>Moderada</td>';
        fila += '   </tr>';
        if (sumaBarrat >= 51 && sumaBarrat <= 60) {
            fila += '   <tr class="table-success">';
        } else {
            fila += '   <tr>';
        }
        fila += '       <td>51 a 60</td>';
        fila += '       <td>Alta</td>';
        fila += '   </tr>';
        if (sumaBarrat >= 61 && sumaBarrat <= 80) {
            fila += '   <tr class="table-success">';
        } else {
            fila += '   <tr>';
        }
        fila += '       <td>61 a 80</td>';
        fila += '       <td>Muy alta</td>';
        fila += '   </tr>';
        fila += '</table>';
        $("#barrat").empty();
        $("#barrat").append(fila);
    }
    let alerta = JSON.parse('<?php print_r($resultado["alerta"]); ?>');
    if (alerta.length > 0) {


        let resultadoAlerta = alerta[0].resultado;
        let filaAlerta = '';
        filaAlerta += '<h1>Diagnóstico de propensión al <br>Riesgo ALERTA</h1>';
        filaAlerta += '<!--div style="background-color:#2c324d; "><h5 style="color:white; padding:3px;">Descripción del test Mide impulsividad, locus de control y propensión al riesgo</h5></div-->';
        filaAlerta += '<p>El test de ALERTA es usado como instrumento de evaluación psicológica en procesos de selección de personal, relacionado con la reducción de los índices de accidentabilidad dentro del marco de la prevención de riesgos. Pretende medir la capacidad para percibir la existencia de una situación peligrosa o la necesidad de una acción determinada de cuidado.</p>';
        filaAlerta += '<div>';
        filaAlerta += '<table class="table table-hover">';
        filaAlerta += '     <tr>';
        if (resultadoAlerta >= 0 && resultadoAlerta <= 15) {
            filaAlerta += '         <td><div style="width:40px; height:40px; background-color:black; border-radius:50%; text-align: center;"></div></td>';
        } else {
            filaAlerta += '         <td></td>';
        }
        if (resultadoAlerta >= 16 && resultadoAlerta <= 20) {
            filaAlerta += '         <td><div style="width:40px; height:40px; background-color:black; border-radius:50%; text-align: center;"></div></td>';
        } else {
            filaAlerta += '         <td></td>';
        }
        if (resultadoAlerta >= 21 && resultadoAlerta <= 25) {
            filaAlerta += '         <td><div style="width:40px; height:40px; background-color:black; border-radius:50%; text-align: center;"></div></td>';
        } else {
            filaAlerta += '         <td></td>';
        }
        if (resultadoAlerta >= 26 && resultadoAlerta <= 30) {
            filaAlerta += '         <td><div style="width:40px; height:40px; background-color:black; border-radius:50%; text-align: center;"></div></td>';
        } else {
            filaAlerta += '         <td></td>';
        }
        if (resultadoAlerta >= 31 && resultadoAlerta <= 36) {
            filaAlerta += '         <td><div style="width:40px; height:40px; background-color:black; border-radius:50%; text-align: center;"></div></td>';
        } else {
            filaAlerta += '         <td></td>';
        }
        filaAlerta += '     </tr>';
        filaAlerta += '     <tr>';
        filaAlerta += '         <td><b>Muy Poco Alerta</b></td>';
        filaAlerta += '         <td><b>Poco Alerta</b></td>';
        filaAlerta += '         <td><b>Normal</b></td>';
        filaAlerta += '         <td><b>Alerta</b></td>';
        filaAlerta += '         <td><b>Muy Alerta</b></td>';
        filaAlerta += '     </tr>';
        filaAlerta += '</table>';
        filaAlerta += '</div>';
        filaAlerta += '<div>';
        if (resultadoAlerta >= 0 && resultadoAlerta <= 15) {
            filaAlerta += '<table class="table table-hover">';
            filaAlerta += '     <tr>';
            filaAlerta += '         <td>Muy poco Alerta<br>0 - 15</td>';
            filaAlerta += '         <td>No presenta capacidad para percibir la existencia de situaciones o condiciones peligrosas, dificilmente podrá determinar acciones de cuidado.  </td>';
            filaAlerta += '     </tr>';
            filaAlerta += '</table>';
        }
        if (resultadoAlerta >= 16 && resultadoAlerta <= 20) {
            filaAlerta += '<table class="table table-hover">';
            filaAlerta += '     <tr>';
            filaAlerta += '         <td>Poco Alerta<br>16 - 20</td>';
            filaAlerta += '         <td>Presenta poca capacidad para percibir la existencia de situaciones o condiciones peligrosas, ocacionalmente podrá determinar acciones de cuidado.  </td>';
            filaAlerta += '     </tr>';
            filaAlerta += '</table>';
        }
        if (resultadoAlerta >= 21 && resultadoAlerta <= 25) {
            filaAlerta += '<table class="table table-hover">';
            filaAlerta += '     <tr>';
            filaAlerta += '         <td>Normal<br>21 - 25</td>';
            filaAlerta += '         <td>Cuenta con la capacidad para percibir la existencia de situaciones o condiciones peligrosas, habitualmente podrá determinar acciones de cuidado. </td>';
            filaAlerta += '     </tr>';
            filaAlerta += '</table>';
        }
        if (resultadoAlerta >= 26 && resultadoAlerta <= 30) {
            filaAlerta += '<table class="table table-hover">';
            filaAlerta += '     <tr>';
            filaAlerta += '         <td>Alerta<br>26 - 30</td>';
            filaAlerta += '         <td>Presenta buena capacidad para percibir la existencia de situaciones o condiciones peligrosas, es muy probable que pueda determinar acciones de cuidado o preventivas.  </td>';
            filaAlerta += '     </tr>';
            filaAlerta += '</table>';
        }
        if (resultadoAlerta >= 31 && resultadoAlerta <= 36) {
            filaAlerta += '<table class="table table-hover">';
            filaAlerta += '     <tr>';
            filaAlerta += '         <td>Muy Alerta<br>31 - 36</td>';
            filaAlerta += '         <td>Cuenta con una alta capacidad para percibir la existencia de situaciones o condiciones peligrosas, habitualmente podrá determinar acciones de cuidado o preventivas.  </td>';
            filaAlerta += '     </tr>';
            filaAlerta += '</table>';
        }
        filaAlerta += '</div><br><br><br><br>';
        $("#alerta").empty();
        $("#alerta").append(filaAlerta);
    }
    let wonderlic = JSON.parse('<?php print_r($resultado["wonderlic"]); ?>');
    //console.table(wonderlic);
    if (wonderlic.length > 0) {


        let resultadoWonderlic = wonderlic[0].resultado;
        //console.log(resultadoWonderlic);

        let filaWonderlic = '<h1>Test Wonderlic</h1>';
        filaWonderlic += '<p>El test Wonderlic mide la capacidad de lógica y de razonamiento. De ese modo, brinda una estimación de la inteligencia en personas adultas. Evalúa las habilidades del sujeto para resolver problemas, ya sean de tipo lógico, matemático o verbal</p>';
        filaWonderlic += '<p>Tu resultado es: ' + resultadoWonderlic + '</p>';
        filaWonderlic += '<table class="table table-hover">';
        filaWonderlic += '  <thead>';
        filaWonderlic += '      <th>Rango Puntajes</th>';
        filaWonderlic += '      <th>Potencial Laboral </th>';
        filaWonderlic += '      <th>Potencial Académico</th>';
        filaWonderlic += '      <th>Potencial entrenamiento</th>';
        filaWonderlic += '  </thead>';
        if (resultadoWonderlic >= 28) {
            filaWonderlic += '   <tr class="table-success">';
            filaWonderlic += '      <td>Sobre 28</td>';
            filaWonderlic += '      <td>Nivel Gerencial superior, solo el 17%, superior de la población puntúa dentro de este rango </td>';
            filaWonderlic += '      <td>El promedio de los graduados de carreras complejas de la universidad es de coeficiente intelectual de 120 y el puntaje Wonderlic es de 29. La tendencia central para este tipo de estudiantes graduados es de puntaje equivalente a 30 </td>';
            filaWonderlic += '      <td>Capaz de manejar y sintetizar la información fácilmente; puede inferir información y conclusiones a partir de situaciones laborales aplicadas </td>';
            filaWonderlic += '  </tr>';
        }

        if (resultadoWonderlic >= 24 && resultadoWonderlic <= 27) {
            filaWonderlic += '   <tr class="table-success">';
            filaWonderlic += '      <td>24 a 27</td>';
            filaWonderlic += '      <td>Potencial gerencial y posiciones de jefaturas de nivel superior; maneja información, analiza y toma decisiones a partir de un número limitado de alternativas</td>';
            filaWonderlic += '      <td>Promedio de estudiates que se gradúa de la universidad; el puntaje promedio para los estudiantes universitarios graduados es de puntaje Wonderlic de 24  y coeficiente intelectual de 115</td>';
            filaWonderlic += '      <td>Individuos sobre el promedio; Capaces de aprender mucho por si mismos, pueden ser entrenados con el tradicional formato académico.</td>';
            filaWonderlic += '  </tr>';
        }

        if (resultadoWonderlic >= 21 && resultadoWonderlic <= 23) {
            filaWonderlic += '   <tr class="table-success">';
            filaWonderlic += '      <td>21 a 23</td>';
            filaWonderlic += '      <td>Jefatura en general y supervisores de primera linea; capaces de entrenar a otros para posiciones rutinarias; manejan información, sin embargo, podrían requerir ayuda en la toma de decisiones.</td>';
            filaWonderlic += '      <td>Las medias para egresados de enseñanza media con nivel académico medio a superior son de coeficiente intelectual de 110 y puntaje Wonderlic de 21. Poseen una probabilidad mayor al promedio de tener éxito en estudios superiores técnicos o profesionales. </td>';
            filaWonderlic += '      <td>Capaz de aprender rutinas rápidamente; pueden ser entrenados con una combinación de materias escritas y experiencias prácticas en el puesto de trabajo.</td>';
            filaWonderlic += '  <br><br><br><br></tr>';
        }

        if (resultadoWonderlic >= 16 && resultadoWonderlic <= 20) {
            filaWonderlic += '   <tr class="table-success" style="margin-top:20px;">';
            filaWonderlic += '      <td>16 a 20</td>';
            filaWonderlic += '      <td>Trabajos rutinarios de oficina; pueden utilizar equipamiento estandarizado; si se les da tiempo suficiente pueden ejecutar trabajos que incluyan rutinas más prolongadas y con mayor número de pasos.</td>';
            filaWonderlic += '      <td>Probablemente pasarán asignaturas con un menor grado de exigencia académica; La tendencia central para alumnos de enseñanza media es de 16 en el Wonderlic y coeficiente intelectual de 100</td>';
            filaWonderlic += '      <td>Son exitosos en ambientes elementales y podrían beneficiarse de enfoques de enseñanza programada o dirigida; es importante permitirles un tiempo suficiente de entrenamiento y experiencia práctica en el puesto de trabajo. </td>';
            filaWonderlic += '  </tr>';
        }

        if (resultadoWonderlic >= 10 && resultadoWonderlic <= 15) {
            filaWonderlic += '   <tr class="table-success">';
            filaWonderlic += '      <td>10 a 15</td>';
            filaWonderlic += '      <td>Operan equipos de procesamiento simple; en un tiempo más o menos amplio pueden aprender una rutina de trabajo con limitado número de pasos. Ante una situación de contigencia tendrán dificultades para saber como solucionar problemas.</td>';
            filaWonderlic += '      <td>Tienen poca probabilida de superar el 4to medio con un adecuado nivel académico.</td>';
            filaWonderlic += '      <td>Necesitan ser explícitamente “enseñados” acerca de la mayoría de lo que deben aprender; el enfoque de aprendizaje más exitoso es la utilización de programas de aprendices; podrían beneficiarse de entrenamientos basados en materiales escritos.</td>';
            filaWonderlic += '  </tr>';
        }

        if (resultadoWonderlic < 10) {
            filaWonderlic += '   <tr class="table-success">';
            filaWonderlic += '      <td>Bajo 10</td>';
            filaWonderlic += '      <td>Utilizan herramientas y equipos extremadamente simples; reparación de muebles; asistentes electrónicos; carpintería simple, trabajo doméstico</td>';
            filaWonderlic += '      <td>Coeficiente intelectual entre 75 y 80 y el putaje de 9 en Wonderlic. Es equivalete a la tendencia central de un séptimo básico.</td>';
            filaWonderlic += '      <td>Baja probabilidad de beneficiarse a partir de entornos de entendimiento formal; se obtiene éxito en la utilización de herramientas sencillas bajo supervisión permanente.</td>';
            filaWonderlic += '  </tr>';
        }

        filaWonderlic += '</table><br><br><br>';
        $("#wonderlic").empty();
        $("#wonderlic").append(filaWonderlic);
    }
    <?php

    if ($relacion != '') {
        //print_r(json_decode($relacion));

    ?>
        let resultadoRelaciones = JSON.parse('<?php print_r($relacion); ?>');

    <?php } else { ?>

        let resultadoRelaciones = [];

    <?php
    }
    ?>
    //console.table(resultadoRelaciones);
    //console.log(resultadoRelaciones[0].fila1.cant1);
    //console.log(resultadoRelaciones);
    //console.log(resultadoRelaciones[3]);
    //console.log(resultadoRelaciones[4]);
    if (resultadoRelaciones.length > 0) {


        let porcentajeFinal = (resultadoRelaciones[4].fila5.porcentajelogro + resultadoRelaciones[0].fila1.porcentajelogro + resultadoRelaciones[1].fila2.porcentajelogro + resultadoRelaciones[3].fila4.porcentajelogro) / 4;

        let filaRelaciones = '';
        filaRelaciones += '<h1>Relaciones  Interpersonales</h1>';
        filaRelaciones += '<table class="table table-hover">';
        filaRelaciones += ' <thead>';
        filaRelaciones += '     <th>Sumatoria</td>';
        filaRelaciones += '     <th>1. Totalmente en Desacuerdo</td>';
        filaRelaciones += '     <th>2. En Desacuerdo</td>';
        filaRelaciones += '     <th>3. De Acuerdo</td>';
        filaRelaciones += '     <th>4.Totalmente de Acuerdo</td>';
        filaRelaciones += '     <th>Puntaje Total</td>';
        filaRelaciones += '     <th>Porcentaje Logro</td>';
        filaRelaciones += ' </thead>';
        filaRelaciones += ' <tr>';
        filaRelaciones += '     <td>Trabajo en Equipo</td>';
        filaRelaciones += '     <td>' + resultadoRelaciones[0].fila1.total1 + '</td>';
        filaRelaciones += '     <td>' + resultadoRelaciones[0].fila1.total2 + '</td>';
        filaRelaciones += '     <td>' + resultadoRelaciones[0].fila1.total3 + '</td>';
        filaRelaciones += '     <td>' + resultadoRelaciones[0].fila1.total4 + '</td>';
        filaRelaciones += '     <td>' + resultadoRelaciones[0].fila1.totalfila + '</td>';
        filaRelaciones += '     <td>' + resultadoRelaciones[0].fila1.porcentajelogro + '%</td>';
        filaRelaciones += ' </tr>';
        filaRelaciones += ' <tr>';
        filaRelaciones += '     <td>Autocontrol Emocional</td>';
        filaRelaciones += '     <td>' + resultadoRelaciones[1].fila2.total1 + '</td>';
        filaRelaciones += '     <td>' + resultadoRelaciones[1].fila2.total2 + '</td>';
        filaRelaciones += '     <td>' + resultadoRelaciones[1].fila2.total3 + '</td>';
        filaRelaciones += '     <td>' + resultadoRelaciones[1].fila2.total4 + '</td>';
        filaRelaciones += '     <td>' + resultadoRelaciones[1].fila2.totalfila + '</td>';
        filaRelaciones += '     <td>' + resultadoRelaciones[1].fila2.porcentajelogro + '%</td>';
        filaRelaciones += ' </tr>';
        filaRelaciones += ' <tr>';
        filaRelaciones += '     <td>Tolerancia a Otros</td>';
        filaRelaciones += '     <td>' + resultadoRelaciones[3].fila4.total1 + '</td>';
        filaRelaciones += '     <td>' + resultadoRelaciones[3].fila4.total2 + '</td>';
        filaRelaciones += '     <td>' + resultadoRelaciones[3].fila4.total3 + '</td>';
        filaRelaciones += '     <td>' + resultadoRelaciones[3].fila4.total4 + '</td>';
        filaRelaciones += '     <td>' + resultadoRelaciones[3].fila4.totalfila + '</td>';
        filaRelaciones += '     <td>' + resultadoRelaciones[3].fila4.porcentajelogro + '%</td>';
        filaRelaciones += ' </tr>';
        filaRelaciones += ' <tr>';
        filaRelaciones += '     <td>Habilidades Comunicacionales</td>';
        filaRelaciones += '     <td>' + resultadoRelaciones[4].fila5.total1 + '</td>';
        filaRelaciones += '     <td>' + resultadoRelaciones[4].fila5.total2 + '</td>';
        filaRelaciones += '     <td>' + resultadoRelaciones[4].fila5.total3 + '</td>';
        filaRelaciones += '     <td>' + resultadoRelaciones[4].fila5.total4 + '</td>';
        filaRelaciones += '     <td>' + resultadoRelaciones[4].fila5.totalfila + '</td>';
        filaRelaciones += '     <td>' + resultadoRelaciones[4].fila5.porcentajelogro + '%</td>';
        filaRelaciones += ' </tr>';
        filaRelaciones += ' <tr>';
        filaRelaciones += '     <td>Porcentaje Final</td>';
        filaRelaciones += '     <td>' + porcentajeFinal + '%</td>';
        if (porcentajeFinal >= 75) {
            filaRelaciones += '     <td style="background-color:green; color:black;">Aprobado</td>';
        } else {
            filaRelaciones += '     <td style="background-color:red; color:black;">Reprobado</td>';
        }


        filaRelaciones += ' </tr>';
        filaRelaciones += '</table>';
        $("#relaciones").empty();
        $("#relaciones").append(filaRelaciones);
    }
    let disc = '<?php echo $segmento; ?>';
    let filaDisc = '<h1>DISC</h1>';
    filaDisc += disc;
    $("#disc").append(filaDisc);
</script>