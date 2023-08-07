<?php
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "viajes";

    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("La conexión falló: " . $conn->connect_error);
    }

    $id = $_GET['id'];

    // Verificar si se envió el formulario de actualización
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update'])) {
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

        $sql = "UPDATE viajeros GET 
                nombre = '$nombre',
                segundo_nombre = '$segundo_nombre',
                apellido = '$apellido',
                segundo_apellido = '$segundo_apellido',
                telefono = '$telefono',
                nacionalidad = '$nacionalidad',
                identificacion_personal = '$identificacion_personal',
                nombre_viaje = '$nombre_viaje',
                origen_vuelo = '$origen_vuelo',
                destino_vuelo = '$destino_vuelo',
                fecha_salida = '$fecha_salida',
                fecha_llegada = '$fecha_llegada'
                WHERE id = '$id'";

        if ($conn->query($sql) === TRUE) {
            echo "Registro actualizado correctamente.";
        } else {
            echo "Error al actualizar el registro: " . $conn->error;
        }
    }

    // Obtener los datos del registro actual
    $sql_select = "SELECT * FROM viajeros WHERE id = '$id'";
    $result = $conn->query($sql_select);
    $row = $result->fetch_assoc();

    $conn->close();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Actualizar Viajero</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <div class="container">
        <h1>Formulario de Viajero</h1>
        <a href="mostrar.php" class="ver_btn">Ver Viajeros</a>
        <h1>

        </h1>
        <form action="guardar_datos.php" method="post">
            <!-- Resto de campos del formulario con valores prellenados -->
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" required maxlength="50" value="<?php echo $row['nombre']; ?>">

            <label for="segundo_nombre">Segundo Nombre:</label>
            <input type="text" id="segundo_nombre" name="segundo_nombre" maxlength="50"
                value="<?php echo $row['segundo_nombre']; ?>">

            <label for="apellido">Apellido:</label>
            <input type="text" id="apellido" name="apellido" required maxlength="50"
                value="<?php echo $row['apellido']; ?>">

            <label for="segundo-apellido">Segundo Apellido:</label>
            <input type="text" id="segundo-apellido" name="segundo_apellido" maxlength="50"
                value="<?php echo $row['segundo_apellido']; ?>">

            <label for="telefono">Número de Teléfono:</label>
            <input type="tel" id="telefono" name="telefono" required maxlength="50"
                value="<?php echo $row['telefono']; ?>">

            <label for="nacionalidad">Nacionalidad:</label>
            <input type="text" id="nacionalidad" name="nacionalidad" required maxlength="50"
                value="<?php echo $row['nacionalidad']; ?>">

            <label for="identificacion">Identificación Personal:</label>
            <input type="text" id="identificacion" name="identificacion" required maxlength="50"
                value="<?php echo $row['identificacion_personal']; ?>">


            <div class="viaje-info">
                <h2>Información del Viaje</h2>
                <label for="nombre-viaje">Nombre del Viaje:</label>
                <input type="text" id="nombre-viaje" name="nombre_viaje" required maxlength="50"
                    value="<?php echo $row['nombre_viaje']; ?>">

                <!-- Solo mostrar los siguientes campos, sin valores prellenados -->
                <label for="origen-vuelo">Origen del Vuelo:</label>
                <input type="text" id="origen-vuelo" name="origen_vuelo" required 
                   >
                <label for="destino-vuelo">Destino del Vuelo:</label>
                <input type="text" id="destino-vuelo" name="destino_vuelo" required 
                    value="<?php echo $row['destino_vuelo']; ?>">

                <label for="fecha-salida">Fecha de Salida:</label>
                <input type="date" id="fecha-salida" name="fecha_salida" required
                    value="<?php echo $row['fecha_salida']; ?>">

                <label for="fecha-llegada">Fecha de Llegada:</label>
                <input type="date" id="fecha-llegada" name="fecha_llegada" required
                    value="<?php echo $row['fecha_llegada']; ?>">
            </div>

            <button type="submit">Enviar</button>
        </form>
    </div>
</body>

</html>