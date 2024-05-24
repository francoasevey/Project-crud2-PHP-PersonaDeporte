<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Procesar Carga Nuevo Deporte</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            margin: 0;
            padding: 0;
            background-color: #f8f9fa;
        }
        .table-container {
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        table {
            border-collapse: collapse;
            width: 100%;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #dee2e6;
            padding: 12px;
            text-align: left;
        }
        th {
            background-color: #e9ecef;
        }
        footer {
            margin-top: 50px;
        }
        .fixed-bottom {
            position: fixed;
            bottom: 0;
            width: 100%;
            background-color: #f8f9fa;
            padding: 10px 0;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2 class="card-title text-center mt-5"><strong>Procesar Carga Nuevo Deporte</strong></h2>
        <div class="d-flex justify-content-center mt-4">
            <div class="table-container">
                <?php
                if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['nombre']) && isset($_POST['descripcion']) && isset($_POST['categoria'])) {
                    $formName = $_POST["nombre"];
                    $formDescripcion = $_POST["descripcion"];
                    $formCategoria = $_POST["categoria"];

                    $db_host = "localhost"; 
                    $db_user = "root";
                    $db_pass = "";
                    $db_name = "desafio";
        
                    $link = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

                    if (!$link) {
                        echo "Error: no se puede conectar a MYSQL." .PHP_EOL;
                        echo "<br>";
                        echo "error de depuracion: " . mysqli_connect_errno() . PHP_EOL;
                        echo "<br>";
                        echo "error de depuracion: " .mysqli_connect_error() . PHP_EOL;
                        exit();
                    }

                    echo "<p class='text-success'>¡Conexión exitosa a MYSQL! La base de datos $db_name está lista.</p>";
                    echo "<p>Información del host: " . mysqli_get_host_info($link)." </p>";

                    $consulta = "INSERT INTO deporte (nombre, descripcion, categoria ) VALUES ('$formName', '$formDescripcion', '$formCategoria' )";

                    if (!mysqli_query($link, $consulta)) {
                        echo "<p class='text-danger'>Error: La consulta SQL tiene problemas, verificar.</p> <br>";
                        echo "<p>$consulta</p>";
                        exit();
                    }
                    echo "<p class='text-success'>Datos insertados correctamente en la base de datos $db_name.</p>";
                    ?>

                    <strong>Los siguientes datos han sido insertados en la base de datos:</strong>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Descripcion</th>
                                <th>Categoria</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                echo "<tr>";
                                echo "<td>$formName</td>";
                                echo "<td>$formDescripcion</td>";
                                echo "<td>$formCategoria</td>";
                                echo "</tr>";
                                mysqli_close($link);
                            ?>
                        </tbody>
                    </table>
                    <?php
                } else {
                    echo "<p class='text-danger'>No se han recibido datos del formulario.</p>";
                    header("Location: formulariodeporte.php");
                    exit();
                }
                ?>
                <div class="d-flex justify-content-center mt-4">
                    <form action="listardeporte.php">
                        <input type="submit" value="Volver al Listado" class="btn btn-primary">
                    </form>
                </div>
            </div>
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
