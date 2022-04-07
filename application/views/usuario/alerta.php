<?php

//$hora = $this->session->userdata("hora");
//print_r($respuesta);


?>
<main>
    <div class="container py-4">
        <h1 class="mt-5 center" style=" text-align: center">Test de Alerta</h1>
    </div>
</main>
<?php if (isset($respuesta["fechaFinAlerta"])) { ?>
    <div style="position: fixed; top:100px; right:5px; z-index: 1; background-color: white;">
        <section>
            <p style="color:black; margin:0px; padding:5px;"><b>
                    Tiempo Alerta<br>
                    <span id="hoursalerta"></span> horas / <span id="minutesalerta"></span> minutos / <span id="secondsalerta"></span> segundos
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
                <h5 class="modal-title"><b><u>INSTRUCCIONES
                        </u></b></h5>
                <!--button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button-->
            </div>
            <div class="modal-body">
                <p>A continuación encontrará una serie de imágenes en las cuales existe una situación peligrosa o de riesgo. Usted debe observar cada una de las imágenes que se presentan y elegir de entre las personas u objetos señalados con las letras A, B, C, D o E, el único elemento que resulta ser peligroso o bien podría llegar a serlo.</p>

                <p> La tetra designada, puede indicar un objeto que debe ser alejado del lugar, un objeto que puede encontrarse defectuoso, un elemento que puede ser peligroso producto de otras personas o cosas; o simplemente, personas que efectúan acciones equivocadas las cuáles pueden llegar a ser peligrosas.</p>


                <p> Analicemos el siguiente ejemplo: como usted puede observar, la persona de la imagen se encuentra con la mano colocada en el borde del baúl, el cual no posee ningún soporte para la tapa. Por lo tanto, usted debe marcar con una “X" bajo la letra B en su hoja de respuestas, ya que esa es la acción insegura de la
                    imágen.
                </p>

                <p>La prueba está conformada por un total de 36 imágenes, contando con un tiempo de 6 minutos para contestar. El tiempo es corto, por ende debe intentar no dedicar mucho tiempo a cada una de ellas. </p>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Acepto</button>
            </div>
        </div>
    </div>
</div>


<div class="container">
    <form method="post" id="formulario">
        <div class="row">
            <div class="col-md-4" style="margin-bottom:25px;">
                <h5 style="position:absolute;">1</h5>
                <img style="margin-left:30px;" src="<?php echo base_url(); ?>lib/img/alerta/1.jpg" class="img-fluid" alt="Responsive image"></br>
                <div style="margin-left:30px;" class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="1" value="a">
                    <label class="form-check-label">A</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="1" value="b">
                    <label class="form-check-label">B</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="1" value="c">
                    <label class="form-check-label">C</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="1" value="d">
                    <label class="form-check-label">D</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="1" value="e">
                    <label class="form-check-label">E</label>
                </div>
            </div>
            <div class="col-md-4" style="margin-bottom:25px;">
                <h5 style="position:absolute;">2</h5>
                <img style="margin-left:30px;" src="<?php echo base_url(); ?>lib/img/alerta/2.jpg" class="img-fluid" alt="Responsive image"></br>
                <div style="margin-left:30px;" class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="2" value="a">
                    <label class="form-check-label">A</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="2" value="b">
                    <label class="form-check-label">B</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="2" value="c">
                    <label class="form-check-label">C</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="2" value="d">
                    <label class="form-check-label">D</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="2" value="e">
                    <label class="form-check-label">E</label>
                </div>
            </div>
            <div class="col-md-4" style="margin-bottom:25px;">
                <h5 style="position:absolute;">3</h5>
                <img style="margin-left:30px;" src="<?php echo base_url(); ?>lib/img/alerta/3.jpg" class="img-fluid" alt="Responsive image"></br>
                <div style="margin-left:30px;" class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="3" value="a">
                    <label class="form-check-label">A</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="3" value="b">
                    <label class="form-check-label">B</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="3" value="c">
                    <label class="form-check-label">C</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="3" value="d">
                    <label class="form-check-label">D</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="3" value="e">
                    <label class="form-check-label">E</label>
                </div>
            </div>
            <div class="col-md-4" style="margin-bottom:25px;">
                <h5 style="position:absolute;">4</h5>
                <img style="margin-left:30px;" src="<?php echo base_url(); ?>lib/img/alerta/4.jpg" class="img-fluid" alt="Responsive image"></br>
                <div style="margin-left:30px;" class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="4" value="a">
                    <label class="form-check-label">A</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="4" value="b">
                    <label class="form-check-label">B</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="4" value="c">
                    <label class="form-check-label">C</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="4" value="d">
                    <label class="form-check-label">D</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="4" value="e">
                    <label class="form-check-label">E</label>
                </div>
            </div>
            <div class="col-md-4" style="margin-bottom:25px;">
                <h5 style="position:absolute;">5</h5>
                <img style="margin-left:30px;" src="<?php echo base_url(); ?>lib/img/alerta/5.jpg" class="img-fluid" alt="Responsive image"></br>
                <div style="margin-left:30px;" class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="5" value="a">
                    <label class="form-check-label">A</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="5" value="b">
                    <label class="form-check-label">B</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="5" value="c">
                    <label class="form-check-label">C</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="5" value="d">
                    <label class="form-check-label">D</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="5" value="e">
                    <label class="form-check-label">E</label>
                </div>
            </div>
            <div class="col-md-4" style="margin-bottom:25px;">
                <h5 style="position:absolute;">6</h5>
                <img style="margin-left:30px;" src="<?php echo base_url(); ?>lib/img/alerta/6.jpg" class="img-fluid" alt="Responsive image"></br>
                <div style="margin-left:30px;" class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="6" value="a">
                    <label class="form-check-label">A</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="6" value="b">
                    <label class="form-check-label">B</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="6" value="c">
                    <label class="form-check-label">C</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="6" value="d">
                    <label class="form-check-label">D</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="6" value="e">
                    <label class="form-check-label">E</label>
                </div>
            </div>
            <div class="col-md-4" style="margin-bottom:25px;">
                <h5 style="position:absolute;">7</h5>
                <img style="margin-left:30px;" src="<?php echo base_url(); ?>lib/img/alerta/7.jpg" class="img-fluid" alt="Responsive image"></br>
                <div style="margin-left:30px;" class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="7" value="a">
                    <label class="form-check-label">A</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="7" value="b">
                    <label class="form-check-label">B</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="7" value="c">
                    <label class="form-check-label">C</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="7" value="d">
                    <label class="form-check-label">D</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="7" value="e">
                    <label class="form-check-label">E</label>
                </div>
            </div>
            <div class="col-md-4" style="margin-bottom:25px;">
                <h5 style="position:absolute;">8</h5>
                <img style="margin-left:30px;" src="<?php echo base_url(); ?>lib/img/alerta/8.jpg" class="img-fluid" alt="Responsive image"></br>
                <div style="margin-left:30px;" class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="8" value="a">
                    <label class="form-check-label">A</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="8" value="b">
                    <label class="form-check-label">B</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="8" value="c">
                    <label class="form-check-label">C</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="8" value="d">
                    <label class="form-check-label">D</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="8" value="e">
                    <label class="form-check-label">E</label>
                </div>
            </div>
            <div class="col-md-4" style="margin-bottom:25px;">
                <h5 style="position:absolute;">9</h5>
                <img style="margin-left:30px;" src="<?php echo base_url(); ?>lib/img/alerta/9.jpg" class="img-fluid" alt="Responsive image"></br>
                <div style="margin-left:30px;" class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="9" value="a">
                    <label class="form-check-label">A</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="9" value="b">
                    <label class="form-check-label">B</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="9" value="c">
                    <label class="form-check-label">C</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="9" value="d">
                    <label class="form-check-label">D</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="9" value="e">
                    <label class="form-check-label">E</label>
                </div>
            </div>
            <div class="col-md-4" style="margin-bottom:25px;">
                <h5 style="position:absolute;">10</h5>
                <img style="margin-left:30px;" src="<?php echo base_url(); ?>lib/img/alerta/10.jpg" class="img-fluid" alt="Responsive image"></br>
                <div style="margin-left:30px;" class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="10" value="a">
                    <label class="form-check-label">A</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="10" value="b">
                    <label class="form-check-label">B</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="10" value="c">
                    <label class="form-check-label">C</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="10" value="d">
                    <label class="form-check-label">D</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="10" value="e">
                    <label class="form-check-label">E</label>
                </div>
            </div>
            <div class="col-md-4" style="margin-bottom:25px;">
                <h5 style="position:absolute;">11</h5>
                <img style="margin-left:30px;" src="<?php echo base_url(); ?>lib/img/alerta/11.jpg" class="img-fluid" alt="Responsive image"></br>
                <div style="margin-left:30px;" class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="11" value="a">
                    <label class="form-check-label">A</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="11" value="b">
                    <label class="form-check-label">B</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="11" value="c">
                    <label class="form-check-label">C</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="11" value="d">
                    <label class="form-check-label">D</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="11" value="e">
                    <label class="form-check-label">E</label>
                </div>
            </div>
            <div class="col-md-4" style="margin-bottom:25px;">
                <h5 style="position:absolute;">12</h5>
                <img style="margin-left:30px;" src="<?php echo base_url(); ?>lib/img/alerta/12.jpg" class="img-fluid" alt="Responsive image"></br>
                <div style="margin-left:30px;" class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="12" value="a">
                    <label class="form-check-label">A</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="12" value="b">
                    <label class="form-check-label">B</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="12" value="c">
                    <label class="form-check-label">C</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="12" value="d">
                    <label class="form-check-label">D</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="12" value="e">
                    <label class="form-check-label">E</label>
                </div>
            </div>
            <div class="col-md-4" style="margin-bottom:25px;">
                <h5 style="position:absolute;">13</h5>
                <img style="margin-left:30px;" src="<?php echo base_url(); ?>lib/img/alerta/13.jpg" class="img-fluid" alt="Responsive image"></br>
                <div style="margin-left:30px;" class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="13" value="a">
                    <label class="form-check-label">A</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="13" value="b">
                    <label class="form-check-label">B</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="13" value="c">
                    <label class="form-check-label">C</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="13" value="d">
                    <label class="form-check-label">D</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="13" value="e">
                    <label class="form-check-label">E</label>
                </div>
            </div>
            <div class="col-md-4" style="margin-bottom:25px;">
                <h5 style="position:absolute;">14</h5>
                <img style="margin-left:30px;" src="<?php echo base_url(); ?>lib/img/alerta/14.jpg" class="img-fluid" alt="Responsive image"></br>
                <div style="margin-left:30px;" class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="14" value="a">
                    <label class="form-check-label">A</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="14" value="b">
                    <label class="form-check-label">B</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="14" value="c">
                    <label class="form-check-label">C</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="14" value="d">
                    <label class="form-check-label">D</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="14" value="e">
                    <label class="form-check-label">E</label>
                </div>
            </div>
            <div class="col-md-4" style="margin-bottom:25px;">
                <h5 style="position:absolute;">15</h5>
                <img style="margin-left:30px;" src="<?php echo base_url(); ?>lib/img/alerta/15.jpg" class="img-fluid" alt="Responsive image"></br>
                <div style="margin-left:30px;" class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="15" value="a">
                    <label class="form-check-label">A</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="15" value="b">
                    <label class="form-check-label">B</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="15" value="c">
                    <label class="form-check-label">C</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="15" value="d">
                    <label class="form-check-label">D</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="15" value="e">
                    <label class="form-check-label">E</label>
                </div>
            </div>
            <div class="col-md-4" style="margin-bottom:25px;">
                <h5 style="position:absolute;">16</h5>
                <img style="margin-left:30px;" src="<?php echo base_url(); ?>lib/img/alerta/16.jpg" class="img-fluid" alt="Responsive image"></br>
                <div style="margin-left:30px;" class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="16" value="a">
                    <label class="form-check-label">A</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="16" value="b">
                    <label class="form-check-label">B</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="16" value="c">
                    <label class="form-check-label">C</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="16" value="d">
                    <label class="form-check-label">D</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="16" value="e">
                    <label class="form-check-label">E</label>
                </div>
            </div>
            <div class="col-md-4" style="margin-bottom:25px;">
                <h5 style="position:absolute;">17</h5>
                <img style="margin-left:30px;" src="<?php echo base_url(); ?>lib/img/alerta/17.jpg" class="img-fluid" alt="Responsive image"></br>
                <div style="margin-left:30px;" class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="17" value="a">
                    <label class="form-check-label">A</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="17" value="b">
                    <label class="form-check-label">B</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="17" value="c">
                    <label class="form-check-label">C</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="17" value="d">
                    <label class="form-check-label">D</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="17" value="e">
                    <label class="form-check-label">E</label>
                </div>
            </div>
            <div class="col-md-4" style="margin-bottom:25px;">
                <h5 style="position:absolute;">18</h5>
                <img style="margin-left:30px;" src="<?php echo base_url(); ?>lib/img/alerta/18.jpg" class="img-fluid" alt="Responsive image"></br>
                <div style="margin-left:30px;" class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="18" value="a">
                    <label class="form-check-label">A</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="18" value="b">
                    <label class="form-check-label">B</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="18" value="c">
                    <label class="form-check-label">C</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="18" value="d">
                    <label class="form-check-label">D</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="18" value="e">
                    <label class="form-check-label">E</label>
                </div>
            </div>
            <div class="col-md-4" style="margin-bottom:25px;">
                <h5 style="position:absolute;">19</h5>
                <img style="margin-left:30px;" src="<?php echo base_url(); ?>lib/img/alerta/19.jpg" class="img-fluid" alt="Responsive image"></br>
                <div style="margin-left:30px;" class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="19" value="a">
                    <label class="form-check-label">A</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="19" value="b">
                    <label class="form-check-label">B</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="19" value="c">
                    <label class="form-check-label">C</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="19" value="d">
                    <label class="form-check-label">D</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="19" value="e">
                    <label class="form-check-label">E</label>
                </div>
            </div>
            <div class="col-md-4" style="margin-bottom:25px;">
                <h5 style="position:absolute;">20</h5>
                <img style="margin-left:30px;" src="<?php echo base_url(); ?>lib/img/alerta/20.jpg" class="img-fluid" alt="Responsive image"></br>
                <div style="margin-left:30px;" class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="20" value="a">
                    <label class="form-check-label">A</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="20" value="b">
                    <label class="form-check-label">B</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="20" value="c">
                    <label class="form-check-label">C</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="20" value="d">
                    <label class="form-check-label">D</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="20" value="e">
                    <label class="form-check-label">E</label>
                </div>
            </div>
            <div class="col-md-4" style="margin-bottom:25px;">
                <h5 style="position:absolute;">21</h5>
                <img style="margin-left:30px;" src="<?php echo base_url(); ?>lib/img/alerta/21.jpg" class="img-fluid" alt="Responsive image"></br>
                <div style="margin-left:30px;" class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="21" value="a">
                    <label class="form-check-label">A</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="21" value="b">
                    <label class="form-check-label">B</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="21" value="c">
                    <label class="form-check-label">C</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="21" value="d">
                    <label class="form-check-label">D</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="21" value="e">
                    <label class="form-check-label">E</label>
                </div>
            </div>
            <div class="col-md-4" style="margin-bottom:25px;">
                <h5 style="position:absolute;">22</h5>
                <img style="margin-left:30px;" src="<?php echo base_url(); ?>lib/img/alerta/22.jpg" class="img-fluid" alt="Responsive image"></br>
                <div style="margin-left:30px;" class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="22" value="a">
                    <label class="form-check-label">A</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="22" value="b">
                    <label class="form-check-label">B</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="22" value="c">
                    <label class="form-check-label">C</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="22" value="d">
                    <label class="form-check-label">D</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="22" value="e">
                    <label class="form-check-label">E</label>
                </div>
            </div>
            <div class="col-md-4" style="margin-bottom:25px;">
                <h5 style="position:absolute;">23</h5>
                <img style="margin-left:30px;" src="<?php echo base_url(); ?>lib/img/alerta/23.jpg" class="img-fluid" alt="Responsive image"></br>
                <div style="margin-left:30px;" class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="23" value="a">
                    <label class="form-check-label">A</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="23" value="b">
                    <label class="form-check-label">B</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="23" value="c">
                    <label class="form-check-label">C</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="23" value="d">
                    <label class="form-check-label">D</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="23" value="e">
                    <label class="form-check-label">E</label>
                </div>
            </div>
            <div class="col-md-4" style="margin-bottom:25px;">
                <h5 style="position:absolute;">24</h5>
                <img style="margin-left:30px;" src="<?php echo base_url(); ?>lib/img/alerta/24.jpg" class="img-fluid" alt="Responsive image"></br>
                <div style="margin-left:30px;" class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="24" value="a">
                    <label class="form-check-label">A</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="24" value="b">
                    <label class="form-check-label">B</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="24" value="c">
                    <label class="form-check-label">C</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="24" value="d">
                    <label class="form-check-label">D</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="24" value="e">
                    <label class="form-check-label">E</label>
                </div>
            </div>
            <div class="col-md-4" style="margin-bottom:25px;">
                <h5 style="position:absolute;">25</h5>
                <img style="margin-left:30px;" src="<?php echo base_url(); ?>lib/img/alerta/25.jpg" class="img-fluid" alt="Responsive image"></br>
                <div style="margin-left:30px;" class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="25" value="a">
                    <label class="form-check-label">A</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="25" value="b">
                    <label class="form-check-label">B</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="25" value="c">
                    <label class="form-check-label">C</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="25" value="d">
                    <label class="form-check-label">D</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="25" value="e">
                    <label class="form-check-label">E</label>
                </div>
            </div>
            <div class="col-md-4" style="margin-bottom:25px;">
                <h5 style="position:absolute;">26</h5>
                <img style="margin-left:30px;" src="<?php echo base_url(); ?>lib/img/alerta/26.jpg" class="img-fluid" alt="Responsive image"></br>
                <div style="margin-left:30px;" class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="26" value="a">
                    <label class="form-check-label">A</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="26" value="b">
                    <label class="form-check-label">B</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="26" value="c">
                    <label class="form-check-label">C</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="26" value="d">
                    <label class="form-check-label">D</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="26" value="e">
                    <label class="form-check-label">E</label>
                </div>
            </div>
            <div class="col-md-4" style="margin-bottom:25px;">
                <h5 style="position:absolute;">27</h5>
                <img style="margin-left:30px;" src="<?php echo base_url(); ?>lib/img/alerta/27.jpg" class="img-fluid" alt="Responsive image"></br>
                <div style="margin-left:30px;" class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="27" value="a">
                    <label class="form-check-label">A</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="27" value="b">
                    <label class="form-check-label">B</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="27" value="c">
                    <label class="form-check-label">C</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="27" value="d">
                    <label class="form-check-label">D</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="27" value="e">
                    <label class="form-check-label">E</label>
                </div>
            </div>
            <div class="col-md-4" style="margin-bottom:25px;">
                <h5 style="position:absolute;">28</h5>
                <img style="margin-left:30px;" src="<?php echo base_url(); ?>lib/img/alerta/28.jpg" class="img-fluid" alt="Responsive image"></br>
                <div style="margin-left:30px;" class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="28" value="a">
                    <label class="form-check-label">A</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="28" value="b">
                    <label class="form-check-label">B</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="28" value="c">
                    <label class="form-check-label">C</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="28" value="d">
                    <label class="form-check-label">D</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="28" value="e">
                    <label class="form-check-label">E</label>
                </div>
            </div>
            <div class="col-md-4" style="margin-bottom:25px;">
                <h5 style="position:absolute;">29</h5>
                <img style="margin-left:30px;" src="<?php echo base_url(); ?>lib/img/alerta/29.jpg" class="img-fluid" alt="Responsive image"></br>
                <div style="margin-left:30px;" class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="29" value="a">
                    <label class="form-check-label">A</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="29" value="b">
                    <label class="form-check-label">B</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="29" value="c">
                    <label class="form-check-label">C</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="29" value="d">
                    <label class="form-check-label">D</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="29" value="e">
                    <label class="form-check-label">E</label>
                </div>
            </div>
            <div class="col-md-4" style="margin-bottom:25px;">
                <h5 style="position:absolute;">30</h5>
                <img style="margin-left:30px;" src="<?php echo base_url(); ?>lib/img/alerta/30.jpg" class="img-fluid" alt="Responsive image"></br>
                <div style="margin-left:30px;" class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="30" value="a">
                    <label class="form-check-label">A</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="30" value="b">
                    <label class="form-check-label">B</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="30" value="c">
                    <label class="form-check-label">C</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="30" value="d">
                    <label class="form-check-label">D</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="30" value="e">
                    <label class="form-check-label">E</label>
                </div>
            </div>
            <div class="col-md-4" style="margin-bottom:25px;">
                <h5 style="position:absolute;">31</h5>
                <img style="margin-left:30px;" src="<?php echo base_url(); ?>lib/img/alerta/31.jpg" class="img-fluid" alt="Responsive image"></br>
                <div style="margin-left:30px;" class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="31" value="a">
                    <label class="form-check-label">A</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="31" value="b">
                    <label class="form-check-label">B</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="31" value="c">
                    <label class="form-check-label">C</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="31" value="d">
                    <label class="form-check-label">D</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="31" value="e">
                    <label class="form-check-label">E</label>
                </div>
            </div>
            <div class="col-md-4" style="margin-bottom:25px;">
                <h5 style="position:absolute;">32</h5>
                <img style="margin-left:30px;" src="<?php echo base_url(); ?>lib/img/alerta/32.jpg" class="img-fluid" alt="Responsive image"></br>
                <div style="margin-left:30px;" class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="32" value="a">
                    <label class="form-check-label">A</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="32" value="b">
                    <label class="form-check-label">B</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="32" value="c">
                    <label class="form-check-label">C</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="32" value="d">
                    <label class="form-check-label">D</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="32" value="e">
                    <label class="form-check-label">E</label>
                </div>
            </div>
            <div class="col-md-4" style="margin-bottom:25px;">
                <h5 style="position:absolute;">33</h5>
                <img style="margin-left:30px;" src="<?php echo base_url(); ?>lib/img/alerta/33.jpg" class="img-fluid" alt="Responsive image"></br>
                <div style="margin-left:30px;" class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="33" value="a">
                    <label class="form-check-label">A</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="33" value="b">
                    <label class="form-check-label">B</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="33" value="c">
                    <label class="form-check-label">C</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="33" value="d">
                    <label class="form-check-label">D</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="33" value="e">
                    <label class="form-check-label">E</label>
                </div>
            </div>
            <div class="col-md-4" style="margin-bottom:25px;">
                <h5 style="position:absolute;">34</h5>
                <img style="margin-left:30px;" src="<?php echo base_url(); ?>lib/img/alerta/34.jpg" class="img-fluid" alt="Responsive image"></br>
                <div style="margin-left:30px;" class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="34" value="a">
                    <label class="form-check-label">A</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="34" value="b">
                    <label class="form-check-label">B</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="34" value="c">
                    <label class="form-check-label">C</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="34" value="d">
                    <label class="form-check-label">D</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="34" value="e">
                    <label class="form-check-label">E</label>
                </div>
            </div>
            <div class="col-md-4" style="margin-bottom:25px;">
                <h5 style="position:absolute;">35</h5>
                <img style="margin-left:30px;" src="<?php echo base_url(); ?>lib/img/alerta/35.jpg" class="img-fluid" alt="Responsive image"></br>
                <div style="margin-left:30px;" class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="35" value="a">
                    <label class="form-check-label">A</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="35" value="b">
                    <label class="form-check-label">B</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="35" value="c">
                    <label class="form-check-label">C</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="35" value="d">
                    <label class="form-check-label">D</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="35" value="e">
                    <label class="form-check-label">E</label>
                </div>
            </div>
            <div class="col-md-4" style="margin-bottom:25px;">
                <h5 style="position:absolute;">36</h5>
                <img style="margin-left:30px;" src="<?php echo base_url(); ?>lib/img/alerta/36.jpg" class="img-fluid" alt="Responsive image"></br>
                <div style="margin-left:30px;" class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="36" value="a">
                    <label class="form-check-label">A</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="36" value="b">
                    <label class="form-check-label">B</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="36" value="c">
                    <label class="form-check-label">C</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="36" value="d">
                    <label class="form-check-label">D</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="36" value="e">
                    <label class="form-check-label">E</label>
                </div>
            </div>
        </div>
        <input type="hidden" name="respuesta" value="escorrecto" />
        <input class="btn btn-info btn-large" type="submit" id="enviar" style="float:right;" value="Terminar Cuestionario" />
    </form>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
<script src="<?php echo base_url(); ?>lib/js/jquery-rut.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script>
    let pasoFinal = false;
    $(document).ready(function() {
        console.log("Instrucciones");
        $("#modalInstrucciones").modal("show");
    });
    $('#formulario').on('submit', function(event) {
        event.preventDefault();
        $.ajax({
            url: "enviarAlerta",
            method: "POST",
            data: new FormData(this),
            contentType: false,
            cache: false,
            dataType: 'json',
            processData: false,
            success: function(data) {
                console.log(data);
                if (data.resultado == 1) {
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
        const DATE_TARGET = new Date('<?php echo $respuesta["fechaFinAlerta"]; ?>');
        // DOM for render
        const SPAN_DAYS = document.querySelector('span#days');
        const SPAN_HOURS = document.querySelector('span#hoursalerta');
        const SPAN_MINUTES = document.querySelector('span#minutesalerta');
        const SPAN_SECONDS = document.querySelector('span#secondsalerta');
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
                    terminoAlerta();
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

    function terminoAlerta() {
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