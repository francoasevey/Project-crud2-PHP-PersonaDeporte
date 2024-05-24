<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Listar Deportes por Personas</title>
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
  <h2 class="text-center">Listar Deportes por Personas</h2>
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
    <form method="GET" class="mr-2">
      <select name="deporte" class="form-control" onchange="this.form.submit()">
          <?php
          $db_host = "localhost"; 
          $db_user = "root";
          $db_pass = "";
          $db_name = "desafio";

          $link = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

          if (!$link) {
              echo "Error: no se puede conectar a MYSQL." . PHP_EOL;
              echo "<br>";
              echo "error de depuración: " . mysqli_connect_errno() . PHP_EOL;
              echo "<br>";
              echo "error de depuración: " . mysqli_connect_error() . PHP_EOL;
              exit();
          }

          $consulta = "SELECT * FROM deporte";
          if (!($resultado = mysqli_query($link, $consulta))) {
              echo "<p>Error: La consulta SQL tiene un problema, verificar.</p> <br>";
              echo "<p>$consulta</p>";
              exit();
          }
          ?>
          <option value="">Selecciona un Deporte</option>
          <?php foreach ($resultado as $deporte) : ?>
              <option value="<?php echo $deporte['id_deporte']; ?>"
               <?php 
                if(isset($_GET['deporte']) && $_GET['deporte'] == $deporte['id_deporte']) echo 'selected';
                ?>>
                <?php echo $deporte['nombre']; ?>
              </option>
          <?php endforeach; ?>
      </select>
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
        <th>Nombre</th>
        <th>Edad</th>
        <th>Deporte</th>
        <th>Categoria</th>
      </tr>
    </thead>
    <tbody>
    <h2 class="text-center">Personas que realizan un deporte</h2>

    <?php
    if (isset($_GET['deporte']) && $_GET['deporte'] != '') {
        $id_realiza = $_GET['deporte'];

        $db_host = "localhost"; 
        $db_user = "root";
        $db_pass = "";
        $db_name = "desafio";

        $link = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

        if (!$link) {
            echo "Error: no se puede conectar a MYSQL." . PHP_EOL;
            echo "<br>";
            echo "error de depuración: " . mysqli_connect_errno() . PHP_EOL;
            echo "<br>";
            echo "error de depuración: " . mysqli_connect_error() . PHP_EOL;
            exit();
        }

        $consulta = "SELECT persona.nombre AS nombre_persona, persona.edad, deporte.nombre , deporte.categoria  AS nombre_deporte 
            FROM persona 
            INNER JOIN realiza ON persona.id_persona = realiza.id_persona 
            INNER JOIN deporte ON realiza.id_deporte = deporte.id_deporte 
            WHERE deporte.id_deporte = $id_realiza";

        if (!($resultado = mysqli_query($link, $consulta))) {
            echo "<p>Error: La consulta SQL tiene un problema, verificar.</p> <br>";
            echo "<p>$consulta</p>";
            exit();
        }

        if (mysqli_num_rows($resultado) > 0) {
            
            while ($row = mysqli_fetch_row($resultado)) {
              echo "<tr>";
              echo "<td>$row[0]</td>";
              echo "<td>$row[1]</td>";
              echo "<td>$row[2]</td>";
              echo "<td>$row[3]</td>";
              echo "</tr>";
            }
        } else {
            echo '<p class="text-center">No hay personas que realizan este deporte.</p>';
        }
        mysqli_free_result($resultado);
        mysqli_close($link);
    
    } else {
      echo '<p class="text-center">Selecciona un deporte para ver las personas que lo practican.</p>';
  }
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
