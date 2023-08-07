<!DOCTYPE html>
<html>
<head>
  <title>Datos del Viajero</title>
  <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
<div class="container">
    <h1>Formulario de Viajero</h1>
    <a href="mostrar.php" class="ver_btn">Ver Viajeros</a> 
    <h1>
     
    </h1>
    <form action="guardar_datos.php" method="post">
      <label for="nombre">Nombre:</label>
      <input type="text" id="nombre" name="nombre" required maxlength="50">

      <label for="segundo_nombre">Segundo Nombre:</label>
      <input type="text" id="segundo_nombre" name="segundo_nombre" maxlength="50">

      <label for="apellido">Apellido:</label>
      <input type="text" id="apellido" name="apellido" required maxlength="50">

      <label for="segundo-apellido">Segundo Apellido:</label>
      <input type="text" id="segundo-apellido" name="segundo_apellido" maxlength="50">

      <label for="telefono">Número de Teléfono:</label>
      <input type="tel" id="telefono" name="telefono" required maxlength="50">

      <label for="nacionalidad">Nacionalidad:</label>
      <input type="text" id="nacionalidad" name="nacionalidad" required maxlength="50">

      <label for="identificacion">Identificación Personal:</label>
      <input type="text" id="identificacion" name="identificacion" required maxlength="50">

      <div class="viaje-info">
        <h2>Información del Viaje</h2>
        <label for="nombre-viaje">Nombre del Viaje:</label>
        <input type="text" id="nombre-viaje" name="nombre_viaje" required maxlength="50">

        <label for="origen-vuelo">Origen del Vuelo:</label>
        <input type="text" id="origen-vuelo" name="origen_vuelo" required maxlength="50">

        <label for="destino-vuelo">Destino del Vuelo:</label>
        <input type="text" id="destino-vuelo" name="destino_vuelo" required maxlength="50">

        <label for="fecha-salida">Fecha de Salida:</label>
        <input type="date" id="fecha-salida" name="fecha_salida" required>

        <label for="fecha-llegada">Fecha de Llegada:</label>
        <input type="date" id="fecha-llegada" name="fecha_llegada" required>
      </div>

      <button type="submit">Enviar</button>
    </form>
  </div>
</body>
</html>
