<?php

//$hora = $this->session->userdata("hora");
print_r($respuesta);


?>
<main>
    <div class="container py-4">
        <h1 class="mt-5 center" style=" text-align: center">Wonderlic</h1>
    </div>
</main>
<?php if (isset($respuesta["fechaFinWonderlic"])) { ?>
    <div style="position: fixed; top:100px; right:5px; z-index: 1; background-color: white;" id="contadorwonderlic">
        <section>
            <p style="color:black; margin:0px; padding:5px;"><b>
                    Tiempo Wonderlic<br>
                    <span id="hourswonderlic"></span> horas / <span id="minuteswonderlic"></span> minutos / <span id="secondswonderlic"></span> segundos
                </b>
            </p>
        </section>
    </div>
<?php
} else {
    echo "paso";
}
?>
<div class="modal" id="modalInstrucciones" tabindex="-1">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><b>LEA ESTA PÁGINA CUIDADOSAMENTE Y SIGA LAS INSTRUCCIONES EXACTAMENTE.
                        NO LEA OTRAS PÁGINAS HASTA QUE NO SE LE INDIQUE QUE DEBE HACERLO.
                        LOS PROBLEMAS DEBEN RESOLVERSE SIN LA AYUDA DE CALCULADORAS U OTROS DISPOSITIVOS QUE FACILITEN LA SOLUCIÓN DE PROBLEMAS.
                    </b></h5>
                <!--button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button-->
            </div>
            <div class="modal-body">
                <p>Esta es una prueba de su capacidad para resolver problemas. La prueba se compone de preguntas de varios tipos. A continuación mostramos un ejemplo de pregunta y su correspondiente respuesta: </p>

                <p> <u><b>Ejemplo N º 1 </b></u> </p>
                COSECHAR es lo opuesto de:<br>
                1) obtener 2) alentar 3) continuar 4) existir 5) sembrar </p>

                <p> La respuesta correcta es “sembrar”. La palabra correcta tiene el número 5). Por lo tanto, el número 5 se escribe en la hoja de respuesta en el casillero Nº 1 de los ejemplos. </p>

                <p> <u><b>Ejemplo N º 2</b></u></p>
                Responda usted mismo la siguiente pregunta:<br>
                El papel se vende a 23 centavos el cuaderno. ¿Cuánto costarán 4 cuadernos? </p>

                <p> La respuesta correcta es 92 centavos. Debe escribirse “92 c” en la hoja de respuesta en el casillero Nº 2 de los ejemplos. </p>

                <p> <u><b> Ejemplo N º 3</b></u></p>
                CASA/CAZA ¿Cuál es la relación entre el significado de estas palabras?<br>
                1) similar 2) opuesto 3) ni similar ni opuesto </p>

                <p> La respuesta correcta es “ni similar ni opuesto”, que es la respuesta número 3; todo lo que usted debe hacer es escribir el número “3” en la hoja de respuesta en el casillero Nº 3 de los ejemplos. </p>

                <p> Esta prueba se compone de 50 preguntas. Probablemente usted no tendrá tiempo de responder a todas ellas, pero aún así debe intentarlo. Después de que el examinador le indique que puede comenzar, tendrá exactamente 12 minutos para responder a tantas preguntas como pueda. No se apresure, porque podrá cometer errores y es necesario obtener la máxima cantidad de respuestas correctas. Las preguntas serán cada vez más difíciles y le recomendamos que las conteste en el orden en que aparecen. No se demore demasiado en un problemas. Una vez que la prueba comience, el examinador no responderá a ninguna consulta.
                </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Acepto</button>
            </div>
        </div>
    </div>
</div>

<div class="container ">
    <form method="post" id="formulario">
        <div class="form-group">
            <label for="">1.- AMARGO es lo opuesto de:</label><br>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="1" value="1">
                <label class="form-check-label">1.- ácido</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="1" value="2">
                <label class="form-check-label">2.- penetrante</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="1" value="3">
                <label class="form-check-label">3.- agudo</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="1" value="4">
                <label class="form-check-label">4.- dulce</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="1" value="5">
                <label class="form-check-label">5.- agrio</label>
            </div>
        </div>
        <div class="form-group">
            <label for="">2.- El sexto mes del año es:</label><br>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="2" value="1">
                <label class="form-check-label">1.- octubre</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="2" value="2">
                <label class="form-check-label">2.- agosto</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="2" value="3">
                <label class="form-check-label">3.- mayo</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="2" value="4">
                <label class="form-check-label">4.- junio</label>
            </div>
        </div>
        <div class="form-group">
            <label for="">3.- En el siguiente grupo de palabras, ¿cuál de ellas difiere de las otras?</label><br>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="3" value="1">
                <label class="form-check-label">1.- canela</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="3" value="2">
                <label class="form-check-label">2.- ajo</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="3" value="3">
                <label class="form-check-label">3.- perejil</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="3" value="4">
                <label class="form-check-label">4.- tabaco</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="3" value="5">
                <label class="form-check-label">5.- menta</label>
            </div>
        </div>
        <div class="form-group">
            <label for="">4.- <b>CABELLO/CABEZA</b> ¿Cuál es la relación entre los significados de estas palabras?</label><br>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="4" value="1">
                <label class="form-check-label">1.- son similares</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="4" value="2">
                <label class="form-check-label">2.- son opuestos</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="4" value="3">
                <label class="form-check-label">3.- ni similares ni opuestos</label>
            </div>
        </div>
        <div class="form-group">
            <label for="">5.- Examine los números que se muestran a continuación. ¿cuál deberá ser el siguiente número?<br>
                49 - 42 - 35 - 28 - 21 - 14</label><br>
            <input type="number" class="form-control" name="5">
        </div>
        <div class="form-group">
            <label for="">6.- En el siguiente grupo de palabras, ¿cuál de ellas difiere de las otras?</label><br>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="6" value="1">
                <label class="form-check-label">1.- liviano</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="6" value="2">
                <label class="form-check-label">2.- amplio</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="6" value="3">
                <label class="form-check-label">3.- masivo</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="6" value="4">
                <label class="form-check-label">4.- voluminoso</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="6" value="5">
                <label class="form-check-label">5.- inmenso</label>
            </div>
        </div>
        <div class="form-group">
            <label for="">7.- <b>FIEL</b> es lo opuesto de:</label><br>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="7" value="1">
                <label class="form-check-label">1.- verdadero</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="7" value="2">
                <label class="form-check-label">2.- leal</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="7" value="3">
                <label class="form-check-label">3.- firme</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="7" value="4">
                <label class="form-check-label">4.- infiel</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="7" value="5">
                <label class="form-check-label">5.- seguro</label>
            </div>
        </div>
        <div class="form-group">
            <label for="">8.- La arena se vende a $ 0.085 el kilogramo. ¿Cuánto dinero se ahorra comprando una bolsa de 100 kg. por $ 8.257?</label><br>
            <input type="number" class="form-control" name="8">
        </div>
        <div class="form-group">
            <label for="">9.- <b>IMPEDIR/IMPONER</b> ¿Cuál es la relación entre los significados de estas palabras?</label><br>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" value="1" name="9">
                <label class="form-check-label">1.- son similares</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" value="2" name="9">
                <label class="form-check-label">2.- son opuestos</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" value="3" name="9">
                <label class="form-check-label">3.- ni similares ni opuestos</label>
            </div>
        </div>
        <div class="form-group">
            <label for="">10.- ¿Cuál es la relación entre los significados de las siguientes oraciones?<br><b>NO ES ORO TODO LO QUE RELUCE</b><br>
                <b>LAS APARIENCIAS ENGAÑAN</b>
            </label><br>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" value="1" name="10">
                <label class="form-check-label">1.- son similares</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" value="2" name="10">
                <label class="form-check-label">2.- son opuestos</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" value="3" name="10">
                <label class="form-check-label">3.- ni similares ni opuestos</label>
            </div>
        </div>
        <div class="form-group">
            <label for="">11.- <b>LIMPIAR</b> es lo puesto de:</label><br>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" value="1" name="11">
                <label class="form-check-label">1.- desinfectar</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" value="2" name="11">
                <label class="form-check-label">2.- raspar</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" value="3" name="11">
                <label class="form-check-label">3.- frotar</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" value="4" name="11">
                <label class="form-check-label">4.- ensuciar</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" value="5" name="11">
                <label class="form-check-label">5.- lavar</label>
            </div>
        </div>
        <div class="form-group">
            <label for="">12.- Suponga que las dos primeras oraciones son ciertas. ¿Qué se puede decir de la tercera?<br><b>LA GUITARRA ESTA AFINADA CON EL PIANO</b><br>
                <b>EL PIANO ESTA AFINADO CON EL VIOLIN</b><br>
                <b>EL VIOLIN ESTA AFINADO CON LA GUITARRA</b>
            </label><br>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" value="1" name="12">
                <label class="form-check-label">1.- es cierta</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" value="2" name="12">
                <label class="form-check-label">2.- es falsa</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" value="3" name="12">
                <label class="form-check-label">3.- no se puede decir nada</label>
            </div>
        </div>
        <div class="form-group">
            <label for="">13.- En el siguiente grupo de palabras, ¿cuál de ellas difiere de las otras?</label><br>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" value="1" name="13">
                <label class="form-check-label">1.- disparejo</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" value="2" name="13">
                <label class="form-check-label">2.- inadecuado</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" value="3" name="13">
                <label class="form-check-label">3.- inconsistente</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" value="4" name="13">
                <label class="form-check-label">4.- uniforme</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" value="5" name="13">
                <label class="form-check-label">5.- opuesto</label>
            </div>
        </div>
        <div class="form-group">
            <label for="">14.- Suponga que las dos primeras oraciones son ciertas. ¿Qué se puede decir de la tercera?<br><b>ESTAS NIÑAS SON PERSONAS NORMALES</b><br>
                <b>TODAS LAS PERSONAS NORMALES SON ACTIVAS</b><br>
                <b>ESTAS NIÑAS SON ACTIVAS</b>
            </label><br>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" value="1" name="14">
                <label class="form-check-label">1.- es cierta</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" value="2" name="14">
                <label class="form-check-label">2.- es falsa</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" value="3" name="14">
                <label class="form-check-label">3.- no se puede decir nada</label>
            </div>
        </div>
        <div class="form-group">
            <label for="">15.- Dos de los siguientes proverbios tienen un sentido similar. ¿Cuáles son ellos?</label><br>
            <div class="form-check">
                <input class="form-check-input" id="pregunta15" type="checkbox" name="15[1]" value="1">
                <label class="form-check-label">
                    1.- <b>AL MAL TIEMPO, BUENA CARA</b>
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="15[2]" value="2">
                <label class="form-check-label">
                    2.- <b>AL PAN, PAN Y AL VINO, VINO</b>
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="15[3]" value="3">
                <label class="form-check-label">
                    3.- <b>DE TAL PALO, TAL ASTILLA</b>
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="15[4]" value="4">
                <label class="form-check-label">
                    4.- <b>A FALTA DE PAN, BUENAS SON LAS TORTAS</b>
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="15[5]" value="5">
                <label class="form-check-label" for="exampleRadios2">
                    5.- <b>QUIEN MAL ANDA, MAL ACABA</b>
                </label>
            </div>
        </div>
        <div class="form-group">
            <label for="">16.- TRIUNFAR es lo opuesto de:</label><br>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="16" value="1">
                <label class="form-check-label">1.- conquistar</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="16" value="2">
                <label class="form-check-label">2.- perder</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="16" value="3">
                <label class="form-check-label">3.- ganar</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="16" value="4">
                <label class="form-check-label">4.- vencer</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="16" value="5">
                <label class="form-check-label">5.- dominar</label>
            </div>
        </div>
        <div class="form-group">
            <label for="">17.- Ordene las siguientes palabras de modo que formen una oración cierta. Luego escriba como respuesta la primera letra de la segunda palabra.<br><b>“DE COSTAL OTRO HARINA ES”</b></label><br>
            <input type="text" name="17" class="form-control">
        </div>
        <div class="form-group">
            <label for="">18.- <b>ATACAR</b> es lo opuesto de:</label><br>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="18" value="1">
                <label class="form-check-label">1.- ayudar</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="18" value="2">
                <label class="form-check-label">2.- asaltar</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="18" value="3">
                <label class="form-check-label">3.- combatir</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="18" value="4">
                <label class="form-check-label">4.- sitiar</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="18" value="5">
                <label class="form-check-label">5.- embestir</label>
            </div>
        </div>
        <div class="form-group">
            <label for="">19.- <b>ILICITO/ILITERARTO</b>. ¿Cuál es la relación entre los significados de estas palabras?</label><br>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="19" value="1">
                <label class="form-check-label">1.- son similares</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="19" value="2">
                <label class="form-check-label">2.- son opuestos</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="19" value="3">
                <label class="form-check-label">3.- ni similares ni opuestos</label>
            </div>
        </div>
        <div class="form-group">
            <label for="">20.- ¿Qué relación existe entre los significados de las siguientes oraciones?<br>
                <b>NO HAY MAL QUE POR BIEN NO VENGA.</b><br>
                <b>MAL DE MUCHOS CONSUELO DE TONTOS</b>
            </label><br>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="20" value="1">
                <label class="form-check-label">1.- son similares</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="20" value="2">
                <label class="form-check-label">2.- son opuestos</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="20" value="3">
                <label class="form-check-label">3.- ni similares ni opuestos</label>
            </div>
        </div>
        <div class="form-group">
            <label for="">21.- <b>IDEA/IDEAL.</b> ¿Cuál es la relación entre los significados de estas palabras?</label><br>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="21" value="1">
                <label class="form-check-label">1.- son similares</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="21" value="2">
                <label class="form-check-label">2.- son opuestos</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="21" value="3">
                <label class="form-check-label">3.- ni similares ni opuestos</label>
            </div>
        </div>
        <div class="form-group">
            <label for="">22.- Un muchacho tiene 15 años y su hermana tiene el doble de su edad. Cuando el muchacho cumpla los 25 años ¿qué edad tendrá su hermana?</label><br>
            <input type="number" class="form-control" name="22">
        </div>
        <div class="form-group">
            <label for="">23.- ¿Cuál es la relación entre los sentidos de las siguientes oraciones?<br>
                <b>EN ARCA ABIERTA, HASTA EL JUSTO PECA</b><br>
                <b>LA OCASIÓN HACE AL LADRON</b>
            </label><br>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="23" value="1">
                <label class="form-check-label">1.- son similares</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="23" value="2">
                <label class="form-check-label">2.- son opuestos</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="23" value="3">
                <label class="form-check-label">3.- ni similares ni opuestos</label>
            </div>
        </div>
        <div class="form-group">
            <label for="">24.- La siguiente figura geométrica puede cortase con una línea recta y dividirse en dos partes que puedan ensamblarse para formar un cuadrado perfecto. Dibuja esa línea uniendo dos número y luego escriba esos número como respuesta.<br><img src="<?php echo base_url(); ?>lib/img/pregunta24.jpg" /></label><br>
            <input type="text" class="form-control" name="24" placeholder="Separa los numeros por un guión. Ejemplo: 7-9">
        </div>
        <div class="form-group">
            <label for="">25.- <b>BENEFICIO/BENEVOLO.</b> ¿Cuál es la relación entre los significados de estas palabras?</label><br>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="25" value="1">
                <label class="form-check-label">1.- son similares</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="25" value="2">
                <label class="form-check-label">2.- son opuestos</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="25" value="3">
                <label class="form-check-label">3.- ni similares ni opuestos</label>
            </div>
        </div>
        <div class="form-group">
            <label for="">26.- Dos de los siguientes proverbios tienen sentidos similares. ¿Cuáles son ellos?</label><br>
            <div class="form-check">
                <input class="form-check-input" id="pregunta26" type="checkbox" name="26[1]" value="1">
                <label class="form-check-label" for="exampleRadios1">
                    1.- <b>LA PACIENCIA ES LA MADRE DE TODAS LAS VIRTUDES</b>
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="26[2]" value="2">
                <label class="form-check-label" for="exampleRadios2">
                    2.- <b>MAS VALE MAÑA QUE FUERZA</b>
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="26[3]" value="3">
                <label class="form-check-label" for="exampleRadios2">
                    3.- <b>OJOS QUE NO VEN, CORAZON QUE NO SIENTE</b>
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="26[4]" value="4">
                <label class="form-check-label" for="exampleRadios2">
                    4.- <b>NO PUEDES JUZGAR AL CABALLO POR EL ARNES</b>
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="26[5]" value="5">
                <label class="form-check-label" for="exampleRadios2">
                    5.- <b>DIME CON QUIEN ANDAS Y TE DIRE QUIEN ERES</b>
                </label>
            </div>
        </div>
        <div class="form-group">
            <label for="">27.- Suponga que las dos primeras oraciones son ciertas. ¿Qué se puede decir de la tercera?<br><b>LOS GRANDES HOMBRES SON IMPORTANTES</b><br>
                <b>YO SOY IMPORTANTE</b><br>
                <b>YO SOY UN GRAN HOMBRE</b>
            </label><br>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="27" value="1">
                <label class="form-check-label">1.- son similares</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="27" value="2">
                <label class="form-check-label">2.- son opuestos</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="27" value="3">
                <label class="form-check-label">3.- ni similares ni opuestos</label>
            </div>
        </div>
        <div class="form-group">
            <label for="">28.- <b>ORGULLOSO</b> es lo opuesto de:</label><br>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="28" value="1">
                <label class="form-check-label">1.- reservado</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="28" value="2">
                <label class="form-check-label">2.- altivo</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="28" value="3">
                <label class="form-check-label">3.- humilde</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="28" value="4">
                <label class="form-check-label">4.- desdeñado</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="28" value="5">
                <label class="form-check-label">5.- arrogante</label>
            </div>
        </div>
        <div class="form-group">
            <label for="">29.- En 66 días, un muchacho ahorró $ 1.98 ¿Cuál es el promedio ahorrado por día?</label><br>
            <input type="number" class="form-control" name="29">
        </div>
        <div class="form-group">
            <label for="">30.- <b>LASTIMERO/LASTIMOSO.</b> ¿Cuál es la relación entre los significados de estas palabras?</label><br>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="30" value="1">
                <label class="form-check-label">1.- son similares</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="30" value="2">
                <label class="form-check-label">2.- son opuestos</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="30" value="3">
                <label class="form-check-label">3.- ni similares ni opuestos</label>
            </div>
        </div>
        <div class="form-group">
            <label for="">31.- Entre los cinco nombres de las dos columnas siguientes. ¿Cuántos son exactamente iguales?</label><br>
            <div class="form-check">
                <input class="form-check-input" id="pregunta31" type="checkbox" name="31[1]" value="1">
                <label class="form-check-label">
                    1.- <b>WATERHOUSE H.I. &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;WATERHOUSE H.I. </b>
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="31[2]" value="2">
                <label class="form-check-label">
                    2.- <b>LINDQUIST W.C. &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;LUNDQUIST W.C.</b>
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="31[3]" value="3">
                <label class="form-check-label">
                    3.- <b>POLLAUR A.S. &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;POLLAUF A.S.</b>
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="31[4]" value="4">
                <label class="form-check-label">
                    4.- <b>ROSENFELD F.E.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ROSENFIELD F.E. </b>
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="31[5]" value="5">
                <label class="form-check-label">
                    5.- <b>SIVERTSEN P.B. &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;SIVERTSEN B.P. </b>
                </label>
            </div>
        </div>
        <div class="form-group">
            <label for="">32.- ¿Cuál es la relación entre los significados de las siguientes oraciones?<br><b>NO HAY PEOR CIEGO QUE EL QUE NO QUIERE VER</b><br>
                <b>EN EL PAIS DE LOS CIEGOS EL TUERTO ES REY</b>
            </label><br>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="32" value="1">
                <label class="form-check-label">1.- son similares</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="32" value="2">
                <label class="form-check-label">2.- son opuestos</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="32" value="3">
                <label class="form-check-label">3.- ni similares ni opuestos</label>
            </div>
        </div>
        <div class="form-group">
            <label for="">33.- <b>APELAR</b> es lo opuesto de:</label><br>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="33" value="1">
                <label class="form-check-label">1.- suplicar</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="33" value="2">
                <label class="form-check-label">2.- implorar</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="33" value="3">
                <label class="form-check-label">3.- rogar</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="33" value="4">
                <label class="form-check-label">4.- negar</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="33" value="5">
                <label class="form-check-label">5.- invocar</label>
            </div>
        </div>
        <div class="form-group">
            <label for="">34.- En el siguiente grupo de número, ¿cuál de ellos representa el valor más pequeño?</label><br>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="34" value="1">
                <label class="form-check-label">a).- 10</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="34" value="2">
                <label class="form-check-label">b).- 3</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="34" value="3">
                <label class="form-check-label">c).- 0.8</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="34" value="4">
                <label class="form-check-label">d).- 0.88</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="34" value="5">
                <label class="form-check-label">e).- 0.96</label>
            </div>
        </div>
        <div class="form-group">
            <label for="">35.- Suponga que las dos primeras oraciones son ciertas. ¿Qué se puede decir de la tercera?<br>
                <b>SE APLAUDE A LOS GRANDES HOMBRES. </b>
                <b>YO SOY APLAUDIDO. </b>
                <b>YO SOY UN GRAN HOMBRE.</b>
            </label><br>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="35" value="1">
                <label class="form-check-label">1.- es cierta</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="35" value="2">
                <label class="form-check-label">2.- es falsa</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="35" value="3">
                <label class="form-check-label">3.- no se puede decir nada</label>
            </div>
        </div>
        <div class="form-group">
            <label for="">36.- Un reloj daba la hora exacta al mediodía del lunes. A las 8 de la noche del día martes, atrasaba 128 segundos. ¿Cuánto se atrasa cada media hora?</label><br>
            <input type="text" class="form-control" name="36" placeholder="Define el tiempo y define el valor. Ejemplo '20 seg.' '2 hr.' '3 min.'">
        </div>
        <div class="form-group">
            <label for="">37.- Dos de los siguientes proverbios tienen sentidos opuestos. ¿Cuáles son?</label><br>
            <div class="form-check">
                <input class="form-check-input" id="pregunta37" type="checkbox" name="37[1]" value="1">
                <label class="form-check-label">
                    1.- <b>NO POR MADRUGAR SE AMANECE MAS TEMPRANO </b>
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="37[2]" value="2">
                <label class="form-check-label">
                    2.- <b>MAS VALE PAJARO EN MANO QUE CIEN VOLANDO</b>
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="37[3]" value="3">
                <label class="form-check-label">
                    3.- <b>AL QUE MADRUGA, DIOS LO AYUDA</b>
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="37[4]" value="4">
                <label class="form-check-label">
                    4.- <b> UNA GOLONDRINA NO HACE VERANO</b>
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="37[5]" value="5">
                <label class="form-check-label">
                    5.- <b> EL CASADO, CASA QUIERE</b>
                </label>
            </div>
        </div>
        <div class="form-group">
            <label for="">38.- Un tren recorre 70 m. en 0.1 segundo. A esa misma velocidad ¿cuántos metros recorrerá en 3 segundos?</label><br>
            <input type="number" class="form-control" name="38">
        </div>
        <div class="form-group">
            <label for="">39.- Ordene las siguientes palabras para que formen una oración. Si la oración es cierta, escriba una “V”. Si es falsa, escriba una “F”.<br><b>
                    “CUERPOS ABAJO LOS HACIA CAEN”</b>
            </label><br>
            <input type="text" class="form-control" name="39">
        </div>
        <div class="form-group">
            <label for="">40.- Suponga que las dos primeras oraciones son ciertas. ¿Qué se puede decir de la tercera?<br>
                <b>MARIA LLAMO A GABRIELA.</b><br>
                <b>GABRIELA LLAMO A JOSEFA.</b><br>
                <b>MARIA NO LLAMO A JOSEFA.</b>
            </label><br>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="40" value="1">
                <label class="form-check-label">1.- es cierta</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="40" value="2">
                <label class="form-check-label">2.- es falsa</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="40" value="3">
                <label class="form-check-label">3.- no se puede decir nada</label>
            </div>
        </div>
        <div class="form-group">
            <label for="">41.- En la siguiente serie de números, uno de ellos no corresponde a la secuencia establecida por lo otros. ¿Cuál debería ser el número?</label><br>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="41" value="1">
                <label class="form-check-label">a).- 1/16</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="41" value="2">
                <label class="form-check-label">b).- 1/8</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="41" value="3">
                <label class="form-check-label">c).- ¼</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="41" value="4">
                <label class="form-check-label">d).- ½</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="41" value="5">
                <label class="form-check-label">e).- 1</label>
            </div>
        </div>
        <div class="form-group">
            <label for="">42.- <b>PEDIR</b> es lo opuesto de:</label><br>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="42" value="1">
                <label class="form-check-label">1.- solicitar</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="42" value="2">
                <label class="form-check-label">2.- ansiar</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="42" value="3">
                <label class="form-check-label">3.- exigir</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="42" value="4">
                <label class="form-check-label">4.- preguntar</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="42" value="5">
                <label class="form-check-label">5.- rechazar</label>
            </div>
        </div>
        <div class="form-group">
            <label for="">43.- Si el alambre se vende a $ 0.0125 por metro. ¿Cuántos metros se pueden comprar con un peso?</label><br>
            <input type="number" class="form-control" name="43">
        </div>
        <div class="form-group">
            <label for="">44.- La siguiente figura geométrica puede cortarse con una línea recta y dividirse en dos partes que pueden ensamblarse para formar un cuadrado perfecto. Dibuje esa línea uniendo dos números, y luego escriba esos dos números como respuesta.<br><img src="<?php echo base_url(); ?>lib/img/pregunta44.jpg" /></label><br>
            <input type="text" class="form-control" placeholder="Separa los numeros por un guión. Ejemplo: 7-9" name="44">
        </div>
        <div class="form-group">
            <label for="">45.- Al imprimir un artículo de 21.000 palabras, un impresor decide dos tamaños de letra. Usando el más grande, una página imprime 1.200 palabras. Utilizando el más pequeño, la página contiene 1.500 palabras. El artículo debe ocupar 16 páginas completas en la revista. ¿Cuántas páginas pueden imprimirse usando letras grandes?</label><br>
            <input type="number" class="form-control" name="45">
        </div>
        <div class="form-group">
            <label for="">46.- Dos de los siguientes proverbios tienen sentidos opuestos. ¿Cuáles son? </label><br>
            <div class="form-check">
                <input class="form-check-input" id="pregunta46" type="checkbox" name="46[1]" value="1">
                <label class="form-check-label">
                    1.- <b>POR LA CASA SE CONOCE AL DUEÑO</b>
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="46[2]" value="2">
                <label class="form-check-label">
                    2.- <b>NUNCA DIGAS: DE ESTA AGUA NO BEBERE</b>
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="46[3]" value="3">
                <label class="form-check-label">
                    3.- <b>MAS VALE SOLO QUE MAL ACOMPAÑADO</b>
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="46[4]" value="4">
                <label class="form-check-label">
                    4.- <b>AGUA QUE NO HAZ DE BEBER, DÉJALA CORRER</b>
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="46[5]" value="5">
                <label class="form-check-label">
                    5.- <b>AUNQUE LA MONA SE VISTA DE SEDA, MONA SE QUEDA</b>
                </label>
            </div>
        </div>
        <div class="form-group">
            <label for="">47.- Un bodeguero compra un cajón de fruta con 14 docenas y paga $ 4.50. Sabe que 4 docenas se arruinarán antes de venderlas. ¿A que precio debe vender cada docena en buen estado para ganar 1/3 del costo total?</label><br>
            <input type="number" class="form-control" name="47">
        </div>
        <div class="form-group">
            <label for="">48.- Suponga que las dos primeras oraciones son ciertas. ¿Qué se puede decir de la tercera?</label><br>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="48" value="1">
                <label class="form-check-label">1.- es cierta</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="48" value="2">
                <label class="form-check-label">2.- es falsa</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="48" value="3">
                <label class="form-check-label">3.- no se puede decir nada</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="48" value="4">
                <label class="form-check-label">4.- </label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="48" value="5">
                <label class="form-check-label">5.- </label>
            </div>
        </div>
        <div class="form-group">
            <label for="">49.- ¿Cuál deberá ser el siguiente número en esta serie?</label><br>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="49" value="1">
                <label class="form-check-label">a).- 2</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="49" value="2">
                <label class="form-check-label">b).- 1</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="49" value="3">
                <label class="form-check-label">c).- 0.5</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="49" value="4">
                <label class="form-check-label">d).- 0.125</label>
            </div>
        </div>
        <div class="form-group">
            <label for="">50.- Tres hombres forman una sociedad y acuerdan dividir las ganancias en partes iguales. El señor X invierte $ 4.500, el señor Y invierte $ 4.500; y el señor Z invierte $ 1.000. Si las ganancias son de $ 1.500. ¿cuánto dinero de menos recibirá el señor X que si las ganancias se dividiesen en proporción a las cantidades invertidas?</label><br>
            <input type="number" class="form-control" name="50">
        </div>
        <input type="hidden" name="respuesta" value="escorrecto">
        <input class="btn btn-info btn-large" type="submit" id="enviar" style="float:right;" value="Terminar Cuestionario" />
    </form>
</div>

<!--script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
<script src="<?php echo base_url(); ?>lib/js/jquery-rut.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
<script src="<?php echo base_url(); ?>lib/js/jquery-rut.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script>
    let pasoFinal = false;
    $(document).ready(function() {
        $("#modalInstrucciones").modal("show");
    });

    $('#formulario').on('submit', function(event) {
        event.preventDefault();
        console.log("Instrucciones");
        $.ajax({
            url: "enviarWonderlic",
            method: "POST",
            data: new FormData(this),
            contentType: false,
            cache: false,
            dataType: 'json',
            processData: false,
            success: function(data) {
                console.log(data);

                if (data.resultado == 2) {
                    toastr.error(data.mensaje);
                    $(data.idpregunta).focus();
                } else if (data.resultado == 1) {
                    toastr.success(data.mensaje);
                    setTimeout(() => {
                        window.location.href = "panel_usuario";
                    }, 2000);
                } else {
                    toastr.error(data.mensaje);
                }
            }
        });
    });

    document.addEventListener('DOMContentLoaded', () => {


        //===
        // VARIABLES
        //===
        const DATE_TARGET = new Date('<?php echo $respuesta["fechaFinWonderlic"]; ?>');
        // DOM for render
        const SPAN_DAYS = document.querySelector('span#days');
        const SPAN_HOURS = document.querySelector('span#hourswonderlic');
        const SPAN_MINUTES = document.querySelector('span#minuteswonderlic');
        const SPAN_SECONDS = document.querySelector('span#secondswonderlic');
        // Milliseconds for the calculations
        const MILLISECONDS_OF_A_SECOND = 1000;
        const MILLISECONDS_OF_A_MINUTE = MILLISECONDS_OF_A_SECOND * 60;
        const MILLISECONDS_OF_A_HOUR = MILLISECONDS_OF_A_MINUTE * 60;
        const MILLISECONDS_OF_A_DAY = MILLISECONDS_OF_A_HOUR * 24

        //===
        // FUNCTIONS
        //===

        /**
         * Method that updates the countdown and the sample
         */
        function updateCountdown() {
            // Calcs
            const NOW = new Date()
            const DURATION = DATE_TARGET - NOW;
            console.log(DURATION);
            //const REMAINING_DAYS = Math.floor(DURATION / MILLISECONDS_OF_A_DAY);
            const REMAINING_HOURS = Math.floor((DURATION % MILLISECONDS_OF_A_DAY) / MILLISECONDS_OF_A_HOUR);
            const REMAINING_MINUTES = Math.floor((DURATION % MILLISECONDS_OF_A_HOUR) / MILLISECONDS_OF_A_MINUTE);
            const REMAINING_SECONDS = Math.floor((DURATION % MILLISECONDS_OF_A_MINUTE) / MILLISECONDS_OF_A_SECOND);
            // Thanks Pablo Monteserín (https://pablomonteserin.com/cuenta-regresiva/)

            // Render
            //SPAN_DAYS.textContent = REMAINING_DAYS;
            SPAN_HOURS.textContent = REMAINING_HOURS;
            SPAN_MINUTES.textContent = REMAINING_MINUTES;
            SPAN_SECONDS.textContent = REMAINING_SECONDS;
            if (DURATION < 0) {
                //console.log("****************************** paso ******************************");
                if (!pasoFinal) {
                    terminoWonderlic();
                }


            }
        }

        //===
        // INIT
        //===
        updateCountdown();
        // Refresh every second
        setInterval(updateCountdown, MILLISECONDS_OF_A_SECOND);
    });

    function terminoWonderlic() {
        $('#enviar').click();
        pasoFinal = true;
        toastr.success("Guardando informacion");
        setTimeout(() => {
            window.location.href = "panel_usuario";
        }, 2000);

    }
</script>
</body>

</html>