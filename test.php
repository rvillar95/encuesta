<?php




$servername = "localhost";
$username = "vinaratr";
$password = "hPMO{lV8shfQ";
$dbname = "vinaratr_encuesta";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
/*
$sql = "INSERT INTO test ()
VALUES ()";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();*/

$sql = "SELECT * FROM inicio_token where now() > fecha_termino and estado = 'U' ";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while ($row = $result->fetch_assoc()) {
        echo "id: " . $row["id"] . " - fecha: " . $row["usuario"] . " - fecha_uso: " . $row["fecha_uso"] . " - fecha_termino: " . $row["fecha_termino"] . "<br>";
        $sql = "UPDATE inicio_token set estado = 'F' where estado = 'U' and id = " . $row["id"];

        if ($conn->query($sql) === TRUE) {
            echo "Update inicio_token: OK";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        $sql = "insert into log_usuario (usuario,detalle,tipo) values (" . $row["usuario"] . ",'Token desactivado por sistema.',5)";
        if ($conn->query($sql) === TRUE) {
            echo "Insert inicio_token: OK";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        $sql = "UPDATE usuario set estado = 'F', fecha_finalizacion = now() where estado = 'C' and id = " . $row["usuario"];
        if ($conn->query($sql) === TRUE) {
            echo "Update usuario: OK";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        $sql = "insert into log_usuario (usuario,detalle,tipo) values (" . $row["usuario"] . ",'Cuestionario desactivado por sistema.',5)";
        if ($conn->query($sql) === TRUE) {
            echo "Insert inicio_token: OK";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
} else {
    echo "0 results";
}
$conn->close();
