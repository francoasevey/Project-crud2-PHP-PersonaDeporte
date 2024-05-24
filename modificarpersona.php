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
    <div class="container">
        <h2 class="card-title text-center mt-4 mb-4"><strong>Modificar Personas</strong></h2>
        <div class="d-flex justify-content-center">
            <div class="table-container">
                <?php
                if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id'])) {
                    $formID = $_POST["id"];
                    $db_host = "localhost"; 
                    $db_user = "root";
                    $db_pass = "";
                    $db_name = "desafio";
      
                    $link = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

                    if (!$link) {
                        echo "<div class='alert alert-danger' role='alert'>";
                        echo "Error: no se puede conectar a MYSQL." .PHP_EOL;
                        echo "<br>";
                        echo "Error de depuración: " . mysqli_connect_errno() . PHP_EOL;
                        echo "<br>";
                        echo "Error de depuración: " . mysqli_connect_error() . PHP_EOL;
                        echo "</div>";
                        exit();
                    }

                    $consulta = "SELECT * FROM persona WHERE id_persona='$formID'";
                    if (!($resultado = mysqli_query($link, $consulta))) {
                        echo "<div class='alert alert-danger' role='alert'>";
                        echo "Error: La consulta SQL tiene un problema, verificar.<br>";
                        echo "$consulta";
                        echo "</div>";
                        exit();
                    }
                    $row = mysqli_fetch_row($resultado);
                } else {
                    echo "<div class='alert alert-warning' role='alert'>";
                    echo "No se han recibido datos del formulario.";
                    echo "</div>";
                    header("Location: listapersona.php");
                    exit();
                }
                ?>

                <form method="post" action="editarpersona.php">
                    <div class="form-group row">
                        <label for="id" class="col-sm-3 col-form-label">ID:</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="id" name="id" readonly value="<?php echo $row[0] ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="name" class="col-sm-3 col-form-label">Nombre:</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="name" name="name" required value="<?php echo $row[1] ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="dni" class="col-sm-3 col-form-label">DNI:</label>
                        <div class="col-sm-9">
                            <input type="number" class="form-control" id="dni" name="dni" required value="<?php echo $row[2] ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="edad" class="col-sm-3 col-form-label">Edad:</label>
                        <div class="col-sm-9">
                            <input type="number" class="form-control" id="edad" name="edad" required value="<?php echo $row[3] ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="genero" class="col-sm-3 col-form-label">Género:</label>
                        <div class="col-sm-9">
                            <select class="form-control" id="genero" name="genero" required>
                                <option value="masculino" <?php echo ($row[4] == 'masculino') ? 'selected' : ''; ?>>Masculino</option>
                                <option value="femenino" <?php echo ($row[4] == 'femenino') ? 'selected' : ''; ?>>Femenino</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-12 text-center">
                            <button type="submit" class="btn btn-primary">Procesar</button>
                        </div>
                    </div>
                </form>

                <div class="d-flex justify-content-center">
                    <form action="listapersona.php" class="mr-2">
                        <input type="submit" value="Volver al Listado" class="btn btn-secondary">
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
