<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Procesar Creación de Relación</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            margin: 0;
            padding: 0;
            background-color: #f8f9fa;
        }
        .container {
            margin-top: 50px;
        }
        footer {
            margin-top: 50px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2 class="card-title text-center mt-5"><strong>Procesar Creación de Relación</strong></h2>
        <div class="d-flex justify-content-center mt-4">
            <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id_persona']) && isset($_POST['id_deporte'])) {
                $id_persona = $_POST["id_persona"];
                $id_deporte = $_POST["id_deporte"];

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

                $consulta = "INSERT INTO realiza (id_persona, id_deporte) VALUES ('$id_persona', '$id_deporte')";

                if (!mysqli_query($link, $consulta)) {
                    echo "<p class='text-danger'>Error al insertar la relación en la base de datos.</p>";
                    exit();
                }
                mysqli_close($link);
                echo "<p class='text-success'>Relación creada exitosamente.</p>";
            } else {
                echo "<p class='text-danger'>No se han recibido datos del formulario.</p>";
                exit();
            }
            ?>
        </div>
        <div class="d-flex justify-content-center mt-4">
            <form action="listarelaciones.php">
                <input type="submit" value="Volver al Listado" class="btn btn-primary">
            </form>
        </div>
    </div>
    <footer class="card-footer text-muted text-center fixed-bottom">
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
