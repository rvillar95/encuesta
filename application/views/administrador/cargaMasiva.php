<div class="container">
    <div class="jumbotron jumbotron-fluid shadow-lg p-3 mb-5 bg-white rounded">
        <div class="container">
            <h1 class="display-4">Modulo de Carga Masiva</h1>
            <p class="lead">Aca podras realizar la carga de los usuarios por medio de excel.</p>
        </div>
    </div>
    <div class="container">
        <div class="accordion" id="accordionExample">
            <div class="card">
                <div class="card-header" id="headingOne">
                    <h2 class="mb-0">
                        <button class="btn btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            Modulo Empresa
                        </button>
                    </h2>
                </div>
                <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                    <div class="card-body" style="padding-left:0px; padding-right:0px;">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-4" style="padding:0px;">
                                    <div class="col-md-12 form-group">
                                        <label for="nombreEmpresa">Ingrese el nombre de la Empresa</label>
                                        <input type="text" class="form-control" id="nombreEmpresa">
                                        <button id="btnAddEmpresa" class="btn btn-primary" style="margin-top:10px;">Agregar Empresa</button>
                                    </div>
                                </div>
                                <div class="col-md-8" style="padding:0px;">
                                    <div class="col-md-12">
                                        <div class="table-responsive">
                                            <table class="table responsive table-striped tablaEmpresa " width="100%">
                                                <thead>
                                                    <th>#</th>
                                                    <th>NOMBRE</th>
                                                    <th>ESTADO</th>
                                                    <th>ACCION</th>
                                                </thead>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header" id="headingTwo">
                    <h2 class="mb-0">
                        <button class="btn btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            Modulo Cargo
                        </button>
                    </h2>
                </div>
                <div id="collapseTwo" class="collapse " aria-labelledby="headingTwo" data-parent="#accordionExample">
                    <div class="card-body" style="padding-left:0px; padding-right:0px;">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-4" style="padding:0px;">
                                    <div class="col-md-12 form-group">
                                        <label for="nombreCargo">Ingrese el nombre del Cargo</label>
                                        <input type="text" class="form-control" id="nombreCargo">
                                        <button id="btnAddCargo" class="btn btn-primary" style="margin-top:10px;">Agregar Cargo</button>
                                    </div>
                                </div>
                                <div class="col-md-8" style="padding:0px;">
                                    <div class="col-md-12">
                                        <div class="table-responsive">
                                            <table class="table table-striped tablaCargo " width="100%">
                                                <thead>
                                                    <th>#</th>
                                                    <th>NOMBRE</th>
                                                    <th>ESTADO</th>
                                                    <th>ACCION</th>
                                                </thead>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container" style="margin-top:10px;">
        <div class="row">
            <div class="col-md-12">
                <div class="alert alert-success" id="alertaPositiva" style="display:none;" role="alert">
                    A simple success alert—check it out!
                </div>
                <div class="alert alert-danger" id="alertaNegativa" style="display:none;" role="alert">
                    A simple danger alert—check it out!
                </div>
                <div class="alert alert-warning" id="alertaRepite" style="display:none;" role="alert">
                    A simple warning alert—check it out!
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <form method="post" id="import_form" enctype="multipart/form-data">
                    <div class="input-group">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" name="file" id="file" required accept=".xls, .xlsx">
                            <label class="custom-file-label" for="inputGroupFile04">Elegir el archivo</label>
                        </div>
                        <div class="input-group-append">
                            <input type="submit" id="imp" name="import" value="Importar Profesores" class="btn btn-outline-secondary" />
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="row" style="margin-top:10px">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table class="table table-striped tablaUsuario " width="100%">
                        <thead>
                            <th>#</th>
                            <th>RUT</th>
                            <th>DV</th>
                            <th>NOMBRE</th>
                            <th>EDAD</th>
                            <th>CLAVE</th>
                            <th>CARGO</th>
                            <th>EMPRESA</th>
                            <th>CREACION</th>
                            <th>ESTADO</th>
                            <th>ACCION</th>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal" id="modalNombreEmpresa" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="">Ingrese el nuevo nombre de la empresa</label>
                            <input type="text" id="nombreEmpresaEditar" class="form-control">
                            <input type="hidden" id="idEmpresa" class="form-control">
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary" id="editarNombreEmpresa">Editar</button>
            </div>
        </div>
    </div>
</div>

<div class="modal" id="modalNombreCargo" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="">Ingrese el nuevo nombre del cargo</label>
                            <input type="text" id="nombreCargoEditar" class="form-control">
                            <input type="hidden" id="idCargo" class="form-control">
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary" id="editarNombreCargo">Editar</button>
            </div>
        </div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
<script src="<?php echo base_url(); ?>lib/js/jquery-rut.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap4.min.js"></script>

<script>
    tablaEmpresa();
    tablaCargo();
    tablaUsuario();
    $('#import_form').on('submit', function(event) {
        event.preventDefault();
        $.ajax({
            url: "insertUsuarios",
            method: "POST",
            data: new FormData(this),
            contentType: false,
            cache: false,
            dataType: 'json',
            processData: false,
            success: function(data) {
                console.log(data);
                $("#alertaPositiva").empty();
                $("#alertaNegativa").empty();
                $("#alertaRepite").empty();
                $("#alertaPositiva").css("display", "none");
                $("#alertaNegativa").css("display", "none");
                $("#alertaRepite").css("display", "none");
                let filaPositiva = '<p><b>Los siguientes ruts se insertaron de manera correcta:<b></p>';
                if (data.ok.length > 0) {
                    data.ok.forEach(element => {
                        filaPositiva += "<li>" + element + "</li>";
                    });
                    $("#alertaPositiva").append(filaPositiva);
                    $("#alertaPositiva").css("display", "block");
                }

                let filaError = '<p><b>Los siguientes ruts tienen datos incorrectos:<b></p>';
                if (data.error.length > 0) {
                    $("#alertaNegativa").empty();
                    data.error.forEach(element => {
                        filaError += "<li>" + element + "</li>";
                    });
                    $("#alertaNegativa").append(filaError);
                    $("#alertaNegativa").css("display", "block");
                }

                let filaRepetidos = '<p><b>Los siguientes ruts ya se encuentran registrados:<b></p>';
                if (data.existe.length > 0) {
                    $("#alertaRepite").empty();
                    data.existe.forEach(element => {
                        filaRepetidos += "<li>" + element + "</li>";
                    });
                    $("#alertaRepite").append(filaRepetidos);
                    $("#alertaRepite").css("display", "block");
                }
                tablaUsuario();
            }
        });
    });
    /* /////////////////////////  FUNCIONES EMPRESA /////////////////////////*/
    $("#btnAddEmpresa").click(function(e) {
        e.preventDefault();
        let nombre = $("#nombreEmpresa").val();
        if (nombre != "") {
            $.ajax({
                url: 'addEmpresa',
                type: 'POST',
                dataType: 'json',
                data: {
                    nombre
                }
            }).then(function(msg) {
                if (msg.resultado == "1") {
                    toastr.success(msg.mensaje);
                    $("#nombreEmpresa").val('');
                    tablaEmpresa();
                } else {
                    toastr.error(msg.mensaje);
                }

            });
        } else {
            toastr.error("Por favor ingresa el nombre de la empresa.");
        }
    });

    $("body").on("click", "#btnEditarEstadoEmpresa", function(e) {
        e.preventDefault();
        let partes = $(this).val().split(',');
        let id = partes[0];
        let estado = partes[1];
        $.ajax({
            url: 'editarEstadoEmpresa',
            type: 'POST',
            dataType: 'json',
            data: {
                id,
                estado
            }
        }).then(function(msg) {
            if (msg.resultado == "1") {
                toastr.success(msg.mensaje);
                tablaEmpresa();
            } else {
                toastr.error(msg.mensaje);
            }

        });
    });

    $("#editarNombreEmpresa").click(function(e) {
        e.preventDefault();
        let id = $("#idEmpresa").val();
        let nombre = $("#nombreEmpresaEditar").val();
        if (id != "") {
            if (nombre != "") {
                $.ajax({
                    url: 'editarNombreEmpresa',
                    type: 'POST',
                    dataType: 'json',
                    data: {
                        id,
                        nombre
                    }
                }).then(function(msg) {
                    if (msg.resultado == "1") {
                        toastr.success(msg.mensaje);
                        tablaEmpresa();
                        $("#modalNombreEmpresa").modal("hide");
                    } else {
                        toastr.error(msg.mensaje);
                    }

                });
            } else {
                $("#nombreEmpresaEditar").focus();
                toastr.error("Ingrese el nombre nuevo de la empresa.");
            }
        } else {
            toastr.error("Error al obtener datos de la empresa.");
        }
    })

    $("body").on("click", "#btnEditarNombreEmpresa", function(e) {
        e.preventDefault();
        let partes = $(this).val().split(',');
        let id = partes[0];
        let nombre = partes[1];
        $("#idEmpresa").val(id);
        $("#nombreEmpresaEditar").val(nombre);
        $("#modalNombreEmpresa").modal("show");
    });

    function tablaEmpresa() {
        $('.tablaEmpresa').DataTable().clear().destroy();
        $('.tablaEmpresa').DataTable({
            responsive: true,
            language: {
                "sProcessing": "Procesando...",
                "sLengthMenu": "Registros _MENU_ ",
                "sZeroRecords": "No se encontraron resultados",
                "sEmptyTable": "Ningún dato disponible en esta tabla =(",
                "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
                "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
                "sInfoPostFix": "",
                "sSearch": "Buscar:",
                "sUrl": "",
                "sInfoThousands": ",",
                "sLoadingRecords": "Cargando...",
                "oPaginate": {
                    "sFirst": "Primero",
                    "sLast": "Último",
                    "sNext": "Siguiente",
                    "sPrevious": "Anterior"
                },
                "oAria": {
                    "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
                    "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                },
                "buttons": {
                    "copy": "Copiar",
                    "colvis": "Visibilidad"
                }
            },
            "ajax": {
                url: "getEmpresa",
                type: 'GET'
            }
        });
    }

    /* \\\\\\\\\\\\\\\\\\\\\\\\\  FUNCIONES EMPRESA \\\\\\\\\\\\\\\\\\\\\\\\\ */

    /* /////////////////////////  FUNCIONES CARGO /////////////////////////*/

    $("#btnAddCargo").click(function(e) {
        e.preventDefault();
        let nombre = $("#nombreCargo").val();
        if (nombre != "") {
            $.ajax({
                url: 'addCargo',
                type: 'POST',
                dataType: 'json',
                data: {
                    nombre
                }
            }).then(function(msg) {
                if (msg.resultado == "1") {
                    toastr.success(msg.mensaje);
                    $("#nombreCargo").val('');
                    tablaCargo();
                } else {
                    toastr.error(msg.mensaje);
                }

            });
        } else {
            toastr.error("Por favor ingresa el nombre del cargo.");
        }
    });

    $("body").on("click", "#btnEditarEstadoCargo", function(e) {
        e.preventDefault();
        let partes = $(this).val().split(',');
        let id = partes[0];
        let estado = partes[1];
        $.ajax({
            url: 'editarEstadoCargo',
            type: 'POST',
            dataType: 'json',
            data: {
                id,
                estado
            }
        }).then(function(msg) {
            if (msg.resultado == "1") {
                toastr.success(msg.mensaje);
                tablaCargo();
            } else {
                toastr.error(msg.mensaje);
            }

        });
    });

    $("#editarNombreCargo").click(function(e) {
        e.preventDefault();
        let id = $("#idCargo").val();
        let nombre = $("#nombreCargoEditar").val();
        if (id != "") {
            if (nombre != "") {
                $.ajax({
                    url: 'editarNombreCargo',
                    type: 'POST',
                    dataType: 'json',
                    data: {
                        id,
                        nombre
                    }
                }).then(function(msg) {
                    if (msg.resultado == "1") {
                        toastr.success(msg.mensaje);
                        tablaCargo();
                        $("#modalNombreCargo").modal("hide");
                    } else {
                        toastr.error(msg.mensaje);
                    }

                });
            } else {
                $("#nombreCargoEditar").focus();
                toastr.error("Ingrese el nombre nuevo del cargo.");
            }
        } else {
            toastr.error("Error al obtener datos del cargo.");
        }
    })

    $("body").on("click", "#btnEditarNombreCargo", function(e) {
        e.preventDefault();
        let partes = $(this).val().split(',');
        let id = partes[0];
        let nombre = partes[1];
        $("#idCargo").val(id);
        $("#nombreCargoEditar").val(nombre);
        $("#modalNombreCargo").modal("show");
    });

    function tablaCargo() {
        $('.tablaCargo').DataTable().clear().destroy();
        $('.tablaCargo').DataTable({
            language: {
                "sProcessing": "Procesando...",
                "sLengthMenu": "Registros _MENU_ ",
                "sZeroRecords": "No se encontraron resultados",
                "sEmptyTable": "Ningún dato disponible en esta tabla =(",
                "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
                "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
                "sInfoPostFix": "",
                "sSearch": "Buscar:",
                "sUrl": "",
                "sInfoThousands": ",",
                "sLoadingRecords": "Cargando...",
                "oPaginate": {
                    "sFirst": "Primero",
                    "sLast": "Último",
                    "sNext": "Siguiente",
                    "sPrevious": "Anterior"
                },
                "oAria": {
                    "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
                    "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                },
                "buttons": {
                    "copy": "Copiar",
                    "colvis": "Visibilidad"
                }
            },
            "ajax": {
                url: "getCargo",
                type: 'GET'
            }
        });
    }

    /* \\\\\\\\\\\\\\\\\\\\\\\\\  FUNCIONES CARGO \\\\\\\\\\\\\\\\\\\\\\\\\ */

    function tablaUsuario() {
        $('.tablaUsuario').DataTable().clear().destroy();
        $('.tablaUsuario').DataTable({
            language: {
                "sProcessing": "Procesando...",
                "sLengthMenu": "Registros _MENU_ ",
                "sZeroRecords": "No se encontraron resultados",
                "sEmptyTable": "Ningún dato disponible en esta tabla =(",
                "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
                "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
                "sInfoPostFix": "",
                "sSearch": "Buscar:",
                "sUrl": "",
                "sInfoThousands": ",",
                "sLoadingRecords": "Cargando...",
                "oPaginate": {
                    "sFirst": "Primero",
                    "sLast": "Último",
                    "sNext": "Siguiente",
                    "sPrevious": "Anterior"
                },
                "oAria": {
                    "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
                    "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                },
                "buttons": {
                    "copy": "Copiar",
                    "colvis": "Visibilidad"
                }
            },
            "ajax": {
                url: "getUsuario",
                type: 'GET'
            }
        });
    }

    
    $("body").on("click", "#btnEditarEstadoUsuario", function(e) {
        e.preventDefault();
        let partes = $(this).val().split(',');
        let id = partes[0];
        let estado = partes[1];
        $.ajax({
            url: 'editarEstadoUsuario',
            type: 'POST',
            dataType: 'json',
            data: {
                id,
                estado
            }
        }).then(function(msg) {
            if (msg.resultado == "1") {
                toastr.success(msg.mensaje);
                tablaUsuario();
            } else {
                toastr.error(msg.mensaje);
            }

        });
    });

    
</script>