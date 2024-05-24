<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar Persona</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            margin: 0;
            padding: 0;
            background-color: #f8f9fa;
        }
        .table-container {
            padding: 20px;
            overflow-x: auto;
            background-color: #ffffff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            margin-top: 20px;
        }
        th {
            background-color: #f2f2f2;
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
        .card-title {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2 class="card-title text-center"><strong>Modificar Persona</strong></h2>
        <div class="d-flex justify-content-center">
            <div class="table-container">
                <?php
                $formID = $_POST["id"];
                $formName = $_POST["name"];
                $formDNI = $_POST["dni"];
                $formEdad = $_POST["edad"];
                $formGenero = $_POST["genero"];

                $db_host = "localhost"; 
                $db_user = "root";
                $db_pass = "";
                $db_name = "desafio";

                $link = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

                if (!$link) {
                    echo "<div class='alert alert-danger' role='alert'>";
                    echo "Error: no se puede conectar a MYSQL." . PHP_EOL;
                    echo "<br>Error de depuración: " . mysqli_connect_errno() . PHP_EOL;
                    echo "<br>Error de depuración: " . mysqli_connect_error() . PHP_EOL;
                    echo "</div>";
                    exit();
                }

                $consulta = "UPDATE persona SET nombre='$formName', dni='$formDNI', edad='$formEdad', genero='$formGenero' WHERE id_persona='$formID'";
                if (!mysqli_query($link, $consulta)){
                    echo "<div class='alert alert-danger' role='alert'>";
                    echo "Error: La consulta SQL tiene un problema, verificar.<br>";
                    echo "$consulta";
                    echo "</div>";
                    exit();
                }
                echo "<div class='alert alert-success' role='alert'>";
                echo "Los siguientes datos de la persona han sido editados en la base de datos.";
                echo "</div>";
                mysqli_close($link);
                ?>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>DNI</th>
                            <th>Edad</th>
                            <th>Género</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><?php echo $formName; ?></td>
                            <td><?php echo $formDNI; ?></td>
                            <td><?php echo $formEdad; ?></td>
                            <td><?php echo $formGenero; ?></td>
                        </tr>
                    </tbody>
                </table>
                <div class="d-flex justify-content-center">
                    <form action="listapersona.php" class="mr-2">
                        <input type="submit" value="Volver al Listado" class="btn btn-primary">
                    </form>
                </div>
            </div>
        </div>
    </div>
    <footer class="text-center fixed-bottom">
        <div class="container">
            <div class="row">
                <div class="col">
                    <img src="imagen.jpeg" alt="Imagen de perfil" class="img-thumbnail rounded-circle">
                    <p class="mb-0">Desarrollador: Franco Asevey</p>
                    <p class="mb-0">Materia: Programacion 3</p>
                    <p class="mb-0">Carrera: Tecnicatura Superior en Desarrollo de Software</p>
                    <p class="mb-0">Año: 2024</p>
                </div>
            </div>
        </div>
    </footer>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
