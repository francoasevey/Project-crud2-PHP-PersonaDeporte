<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Nueva Relacion</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body{
            margin: 0;
            padding: 0;
        }
        .form-container {
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 10px;
            background-color: #f9f9f9;
        }
        footer {
            margin-top: 50px;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="form-container">
        <h2 class="text-center mb-4">Crear Nueva Relación</h2>
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

        $personas = mysqli_query($link, "SELECT id_persona, nombre FROM persona");
        $deportes = mysqli_query($link, "SELECT id_deporte, nombre FROM deporte");
        ?>
        <form method="post" action="crearrelacion.php">
            <div class="form-group row">
                <label for="id_persona" class="col-sm-3 col-form-label">Persona:</label>
                <div class="col-sm-9">
                    <select class="form-control" id="id_persona" name="id_persona" required>
                        <option value="" disabled selected>Seleccione una persona</option>
                        <?php while ($row = mysqli_fetch_assoc($personas)) : ?>
                            <option value="<?php echo $row['id_persona']; ?>">
                                <?php echo $row['nombre']; ?>
                            </option>
                        <?php endwhile; ?>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="id_deporte" class="col-sm-3 col-form-label">Deporte:</label>
                <div class="col-sm-9">
                    <select class="form-control" id="id_deporte" name="id_deporte" required>
                        <option value="" disabled selected>Seleccione un deporte</option>
                        <?php while ($row = mysqli_fetch_assoc($deportes)) : ?>
                            <option value="<?php echo $row['id_deporte']; ?>">
                                <?php echo $row['nombre']; ?>
                            </option>
                        <?php endwhile; ?>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-12 text-center">
                    <button type="submit" class="btn btn-primary">Crear Relación</button>
                </div>
            </div>
        </form>
        <div class="d-flex justify-content-center">
            <form action="listarelaciones.php" class="mr-2">
                <input type="submit" value="Volver al Listado" class="btn btn-primary">
            </form>
        </div>
    </div>
</div>
<footer class="card-footer text-muted text-center">
    <div class="container">
        <div class="row">
            <div class="col">
                <img src="imagen.jpeg" alt="Imagen de perfil" class="img-thumbnail rounded-circle" style="width: 45px; height: 45px;">
                <p class="mb-0">Desarrollador: Franco Asevey</p>
                <p class="mb-0">Materia: Programación 3</p>
                <p class="mb-0">Carrera: Tecnicatura Superior en Desarrollo de Software</p>
                <p class="mb-0">Año: 2024</p>
            </div>
        </div>
    </div>
</footer>
</body>
</html>
