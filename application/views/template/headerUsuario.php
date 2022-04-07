<!doctype html>

<html lang="en">



<head>

    <!-- Required meta tags -->

    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">



    <!-- Bootstrap CSS -->

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet">

    <link href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap4.min.css" rel="stylesheet">

    <script src="<?php echo base_url(); ?>lib/js/cuenta-regresiva.js"></script>

    <title>Panel Usuario</title>



</head>
<?php $hora = $this->session->userdata("hora");
//print_r($hora);
?>


<body>

    <nav class="navbar navbar-expand-lg fixed-top navbar-light bg-light">
        <a class="navbar-brand" href="panel_usuario">Cuestionarios</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                <li class="nav-item active">
                    <a class="nav-link" href="panel_usuario">Inicio <span class="sr-only">(current)</span></a>
                </li>
            </ul>
            <form class="form-inline my-2 my-lg-0">
                <span class="badge badge-success"><?php echo "Fecha Inicio: " . $hora["fecha_inicio"]; ?></span>&nbsp;&nbsp;
                <span class="badge badge-danger"><?php echo "Fecha Termino: " . $hora["fecha_termino"]; ?></span>
            </form>
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="salir"><b>Salir</b> <span class="sr-only">(current)</span></a>
                </li>
            </ul>
        </div>
    </nav><br>
    <br><br>

    <div style="position: fixed; top:45px; right:5px; z-index: 1; background-color: white;" id="contador">
        <section>
            <p style="color:black; margin:0px; padding:5px;"><b>
                    Tiempo Cuestionario<br>
                    <span id="hours"></span> horas / <span id="minutes"></span> minutos / <span id="seconds"></span> segundos
                </b>
            </p>
        </section>
    </div>
  

    <script>
        document.addEventListener('DOMContentLoaded', () => {

            //===
            // VARIABLES
            //===
            const DATE_TARGET = new Date('<?php echo $hora["fecha_termino"]; ?>');
            // DOM for render
            const SPAN_DAYS = document.querySelector('span#days');
            const SPAN_HOURS = document.querySelector('span#hours');
            const SPAN_MINUTES = document.querySelector('span#minutes');
            const SPAN_SECONDS = document.querySelector('span#seconds');
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
                // console.log(DURATION);
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
                    eliminarSession();

                }
            }

            //===
            // INIT
            //===
            updateCountdown();
            // Refresh every second
            setInterval(updateCountdown, MILLISECONDS_OF_A_SECOND);
        });

        function eliminarSession() {
            window.location.href = "terminoCuenta";
        }
    </script>

    