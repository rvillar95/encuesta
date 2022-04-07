<?php

$usuario = $this->session->userdata("usuario");


?>



<div class="container py-4">
    <?php if ($resultado == "ok") { ?>
        <button type="button" class="btn btn-danger btn-lg btn-block" id="finalizar">FINALIZAR CUESTIONARIO</button>
        <br>
    <?php } ?>
    
    <div class="row align-items-md-stretch">
        <div class="col-md-6">
            <div class="h-100 p-5 text-white bg-info rounded-3">
                <h2>Diagnóstico de Personalidad DISC</h2>
                <p>Mide su comportamiento y sus emociones en relación a cuatro dimensiones de la personalidad (Decisión, Influencia, Serenidad, Cumplimiento),
                    Este test consta de 28 preguntas.</p>
                <?php
                if (isset($tipo)) {
                    if ($tipo["disc"] > 0) {
                ?>

                        <a class="btn btn-danger" disabled href="#"> Test Realizado </a>
                    <?php
                    } else {
                    ?>
                        <a class="btn btn-outline-light" href="disc"> Realizar Test </a>
                <?php
                    }
                }
                ?>
            </div>
        </div>
        <div class="col-md-6">
            <div class="h-100 p-5 bg-light border rounded-3">
                <h2>Diagnóstico de Wonderlic</h2>
                <p> Esta es una prueba de su capacidad para resolver problemas,<br> Consta de 50 preguntas y de 12 minutos para realizar.</p>


                <?php
                if (isset($tipo)) {
                    if ($tipo["wonderlic"] > 0) {
                ?>

                        <a class="btn btn-danger" disabled href="#"> Test Realizado </a>
                    <?php
                    } else {
                    ?>
                        <a class="btn btn-outline-secondary" href="wonderlic"> Realizar Test </a>
                <?php
                    }
                }
                ?>
            </div>
        </div>

        <div class="col-md-6">
            <div class="h-100 p-5 bg-light border rounded-3">
                <h2>Diagnóstico de Barrat</h2>
                <p>Esta es una prueba para medir algunas de las formas en que usted actúa y piensa, <br> Consta de 30 preguntas.</p>

                <?php
                if (isset($tipo)) {
                    if ($tipo["barrat"] > 0) {
                ?>

                        <a class="btn btn-danger" disabled href="#"> Test Realizado </a>
                    <?php
                    } else {
                    ?>
                        <a class="btn btn-outline-secondary" href="barrat"> Realizar Test </a>
                <?php
                    }
                }
                ?>

            </div>
        </div>
        <div class="col-md-6">
            <div class="h-100 p-5 text-white bg-info rounded-3">
                <h2>Diagnóstico de propensión al Riesgo ALERTA </h2>
                <p>Esta es una prueba que mide su Impulsividad, locus de control y propensión al riesgo, consta de 36 preguntas y de 6 minutos para realizarla </p>

                <?php
                if (isset($tipo)) {
                    if ($tipo["alerta"] > 0) {
                ?>

                        <a class="btn btn-danger" disabled href="#"> Test Realizado </a>
                    <?php
                    } else {
                    ?>
                        <a class="btn btn-outline-light" href="alerta"> Realizar Test </a>
                <?php
                    }
                }
                ?>
            </div>
        </div>
        <div class="col-md-6">
            <div class="h-100 p-5 text-white bg-info rounded-3">
                <h2>Relaciones Interpersonales Conductores</h2>
                <p>... </p>

                <?php
                if (isset($tipo)) {
                    if ($tipo["relacion"] > 0) {
                ?>

                        <a class="btn btn-danger" disabled href="#"> Test Realizado </a>
                    <?php
                    } else {
                    ?>
                        <a class="btn btn-outline-light" href="relacionesInterpersonales"> Realizar Test </a>
                <?php
                    }
                }
                ?>
            </div>
        </div>



    </div>
</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script src="<?php echo base_url(); ?>lib/js/jquery-rut.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>






<script>
    $("#finalizar").click(function(e) {
        e.preventDefault();
        $.ajax({
            url: 'finalizar',
            type: 'POST',
            dataType: 'json'
        }).then(function(msg) {

        });
        toastr.success("Cerrando Sesión");
        setTimeout(() => {
            window.location.href = "login_usuario";
        }, 1000);
        // window.location.href = "login_usuario";
    });
</script>