<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Lista de Busqueda</title>
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      margin: 0;
      padding: 0;
      background-color: #f8f9fa;
    }
    .table-container {
      margin-top: 50px;
    }
    footer {
      background-color: #343a40;
      color: white;
      padding: 20px 0;
    }
    footer img {
      width: 45px;
      height: 45px;
      border-radius: 50%;
    }
  </style>
</head>
<body>

<div class="container table-container">
  <h2 class="text-center">Lista de Busqueda</h2>
    <form method="post" action="busqueda.php" class="form-inline justify-content-center mb-4">
    <input class="form-control mr-sm-2 w-25" type="search" placeholder="Buscar por nombre o DNI" aria-label="Buscar" name="buscar">

    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
    </form>

  <div class="d-flex justify-content-center mb-4">
    <form action="listapersona.php" class="mr-2">
      <button type="submit" class="btn btn-info">Personas</button>
    </form>
    <form action="listardeporte.php" class="mr-2">
      <button type="submit" class="btn btn-info">Deportes</button>
    </form>
    <form action="realiza.php" class="mr-2">
      <button type="submit" class="btn btn-info">Filtrado por Deportes</button>
    </form>
    <form action="deportemaspracticado.php" class="mr-2">
      <button type="submit" class="btn btn-info">Deporte más Practicado</button>
    </form>
    <form action="listarelaciones.php" class="mr-2">
      <button type="submit" class="btn btn-info">Relaciones</button>
    </form>
    <div class="dropdown">
      <button class="btn btn-success dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> + </button>
      <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
        <a class="dropdown-item" href="agregarpersona.php">Persona</a>
        <a class="dropdown-item" href="agregardeporte.php">Deporte</a>
        <a class="dropdown-item" href="agregarrelacion.php">Relacion</a>
      </div>
    </div>
    
  </div>


  <table class="table table-bordered table-hover">
    <thead class="thead-dark">
      <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>DNI</th>
        <th>Edad</th>
        <th>Género</th>
        <th>Deporte</th>
        <th>Descripción</th>
        <th>Categoría</th>
      </tr>
    </thead>
    <tbody>
      <?php
$formBuscar = $_POST["buscar"];
$db_host = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "desafio";

$link = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

if (!$link) {
    die("Error: no se puede conectar a MYSQL." . PHP_EOL .
        "Error de depuración: " . mysqli_connect_errno() . PHP_EOL .
        "Error de depuración: " . mysqli_connect_error() . PHP_EOL);
}

$consulta = "SELECT p.nombre AS nombre_persona, p.id_persona, p.dni, p.edad, p.genero, d.nombre AS nombre_deporte, d.descripcion, d.categoria 
             FROM persona p
             JOIN realiza r ON p.id_persona = r.id_persona
             JOIN deporte d ON r.id_deporte = d.id_deporte
             WHERE p.dni = '$formBuscar' OR p.nombre LIKE '%$formBuscar%'";




$resultado = mysqli_query($link, $consulta);

if (!$resultado) {
    die("Error en la consulta SQL: " . mysqli_error($link));
}


if (mysqli_num_rows($resultado)) {

    while ($row = mysqli_fetch_row($resultado)) {
      echo "<tr>";
          echo "<td>$row[0]</td>";
          echo "<td>$row[1]</td>";
          echo "<td>$row[2]</td>";
          echo "<td>$row[3]</td>";
          echo "<td>$row[4]</td>";
          echo "<td>$row[5]</td>";
          echo "<td>$row[6]</td>";
          echo "<td>$row[7]</td>";
      echo "</tr>";
    }
} else {
    echo "No se encontraron deportes para el DNI o Nombre especificado.";
}


mysqli_free_result($resultado);
mysqli_close($link);
      ?>
    </tbody>
  </table>
</div>

<footer class="text-center">
  <div class="container">
    <div class="row">
      <div class="col">
        <img src="imagen.jpeg" alt="Imagen de perfil" class="img-thumbnail rounded-circle">
        <p class="mb-0">Desarrollador: Franco Asevey</p>
        <p class="mb-0">Materia: Programacion 3</p>
        <p class="mb-0">Carrera: Tecnicatura Superior en Desarrollo de Software</p>
        <p class="mb-0">Mes: Mayo - Año: 2024</p>
      </div>
    </div>
  </div>
</footer>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
