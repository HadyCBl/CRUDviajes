<!DOCTYPE html>
<html>
<head>

  <link rel="stylesheet" type="text/css" href="styletable.css">
</head>
<body>
  <div class="container">
    <h1>Lista de Viajeros</h1>
    <a href="index.php" class="ver_btn">Inicio</a> 

    <!-- Formulario de búsqueda -->
    <form action="" method="post">
      <label for="search">Buscar:</label>
      <input type="text" id="search" name="search" placeholder="Ingrese el nombre del viajero...">
      <button type="submit">Buscar</button>
    </form>

  

    <table>
      <thead>
        <tr>
          <th>Nombre</th>
          <th>Segundo Nombre</th>
          <th>Apellido</th>
          <th>Segundo Apellido</th>
          <th>Teléfono</th>
          <th>Nacionalidad</th>
          <th>Identificación Personal</th>
          <th>Nombre del Viaje</th>
          <th>Origen del Vuelo</th>
          <th>Destino del Vuelo</th>
          <th>Fecha de Salida</th>
          <th>Fecha de Llegada</th>
          <th>Acciones</th> 
          <th>Nuevo Vuelo</th>

        </tr>
      </thead>
      <tbody>
        <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "viajes";

        $conn = new mysqli($servername, $username, $password, $dbname);
        if ($conn->connect_error) {
          die("La conexión falló: " . $conn->connect_error);
        }

        // Procesar la búsqueda si se envió el formulario
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['search'])) {
          $search = $_POST['search'];
          $sql = "SELECT * FROM viajeros WHERE nombre LIKE '%$search%' OR apellido LIKE '%$search%'";
        } else {
          $sql = "SELECT * FROM viajeros";
        }

        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>".$row['nombre']."</td>";
            echo "<td>".$row['segundo_nombre']."</td>";
            echo "<td>".$row['apellido']."</td>";
            echo "<td>".$row['segundo_apellido']."</td>";
            echo "<td>".$row['telefono']."</td>";
            echo "<td>".$row['nacionalidad']."</td>";
            echo "<td>".$row['identificacion_personal']."</td>";
            echo "<td>".$row['nombre_viaje']."</td>";
            echo "<td>".$row['origen_vuelo']."</td>";
            echo "<td>".$row['destino_vuelo']."</td>";
            echo "<td>".$row['fecha_salida']."</td>";
            echo "<td>".$row['fecha_llegada']."</td>";
            // Agregar botones de eliminar y actualizar en la nueva columna "Acciones"
            echo "<td>";
            echo "<a href='eliminar.php?id=".$row['id']."'>Eliminar</a> | ";
            echo "<a href='actualizar.php?id=".$row['id']."'>Actualizar</a>";
            echo "</td>";
            echo "<td><a href='nuevo_reg.php?id=".$row['id']."'>+</a></td>";
            echo "</tr>";
          }
        } else {
          echo "<tr><td colspan='13'>No se encontraron resultados.</td></tr>";
        }

        $conn->close();
        ?>
      </tbody>
    </table>
  </div>
</body>
</html>
