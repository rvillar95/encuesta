<?php 
//echo phpinfo();
?>
<div class="container">
    <br>
    <div class="row">
        <div class="col-md-4 offset-md-4" style="background-color: greenyellow; border-radius: 5%; padding:10px;">
            <h3 style="text-align: center; padding:10px;">Inicio de Sesion</h3>
            <div class="form-group">
                <label for="rut">Rut</label>
                <input type="text" name="rut" id="rut" class="form-control" maxlength="12" placeholder="RUT" autocomplete="off">
            </div>
            <div class="form-group">
                <label for="clave">Clave</label>
                <input type="password" class="form-control" id="clave" placeholder="**************">
            </div>
            <button class="btn btn-primary" style="float:right;" id="btnIngresar">Ingresar</button>
        </div>
    </div>
</div>
<!--script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script!-->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="<?php echo base_url(); ?>lib/js/jquery-rut.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script>
    $("#btnIngresar").click(function(e) {
        e.preventDefault();
        let rut = $("#rut").val();
        let password = $("#clave").val();
        if (rut != "") {
            if (password != "") {
                $.ajax({
                    url: "iniciarSesionAdministrador",
                    type: "POST",
                    dataType: "json",
                    data: {
                        rut,
                        password
                    }
                }).then(function(msg) {
                    console.log(msg);
                    if (msg.msg == "administrador") {
                        toastr.success("Inicio de sesion correcto.");
                        setTimeout(() => {
                            location.href = "panel_administrador";
                        }, 2000);
                    } else if (msg.msg == "inactivo") {
                        toastr.error("El usuario se encuentra bloqueado, comunicarse con el Administrador a cargo.");
                    } else if (msg.msg == "nada") {
                        toastr.error("El usuario no existe o la clave es incorrecta.");
                    }
                });
            } else {
                $("#clave").focus();
                toastr.error("Por favor ingrese su clave.");
            }
        } else {
            $("#rut").focus();
            toastr.error("Por favor ingrese su rut.");
        }
    });

    $("#rut").rut({
        useThousandsSeparator: true,
        validateOn: 'blur',
        formatOn: 'keyup'
    }).on('rutInvalido', function(e) {
        if ($.trim($(this).val()).length > 0) {
            toastr.error("", "El rut " + $(this).val() + " es invalido.");
        }
        $(this).val("");
        rutValido = false;
        $("#rut").css("border", "1px solid red");
    }).on('rutValido', function(e) {
        $("#rut").css("border", "1px solid green");
        rutValido = true;
    });
    var clave1 = $("#claveCliente1").val(),
        clave2 = $("#claveCliente2").val();

    $("#claveCliente1").keyup(function(e) {
        e.preventDefault();
        if ($("#claveCliente1").val().length > 3) {
            $("#claveCliente1").css("border", "1px solid green");
        } else {
            $("#claveCliente1").css("border", "1px solid red");
        }
    });
</script>
</body>

</html>