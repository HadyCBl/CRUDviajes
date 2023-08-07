<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
 $servername = "localhost";
$username = "root";
$password = "";
$dbname = "viajes";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("La conexión falló: " . $conn->connect_error);
}

  $nombre = $_POST['nombre'];
  $segundo_nombre = $_POST['segundo_nombre'];
  $apellido = $_POST['apellido'];
  $segundo_apellido = $_POST['segundo_apellido'];
  $telefono = $_POST['telefono'];
  $nacionalidad = $_POST['nacionalidad'];
  $identificacion_personal = $_POST['identificacion'];
  $nombre_viaje = $_POST['nombre_viaje'];
  $origen_vuelo = $_POST['origen_vuelo'];
  $destino_vuelo = $_POST['destino_vuelo'];
  $fecha_salida = $_POST['fecha_salida'];
  $fecha_llegada = $_POST['fecha_llegada'];

  $sql = "INSERT INTO viajeros (nombre, segundo_nombre, apellido, segundo_apellido, telefono, nacionalidad, identificacion_personal, nombre_viaje, origen_vuelo, destino_vuelo, fecha_salida, fecha_llegada) 
          VALUES ('$nombre', '$segundo_nombre', '$apellido', '$segundo_apellido', '$telefono', '$nacionalidad', '$identificacion_personal', '$nombre_viaje', '$origen_vuelo', '$destino_vuelo', '$fecha_salida', '$fecha_llegada')";

if ($conn->query($sql) === TRUE) {
  echo "Datos almacenados correctamente.";

  header("Location: mostrar.php");
  exit; // Asegura que no se ejecuten más instrucciones después de la redirección
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

  $conn->close();
}
?>

