<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carga Nueva Persona</title>
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
        <h2 class="text-center mb-4">Cargar Nueva Persona</h2>
        <form method="post" action="agregarpersona.php">
            <div class="form-group row">
                <label for="nombre" class="col-sm-3 col-form-label">Nombre:</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="nombre" name="nombre" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="dni" class="col-sm-3 col-form-label">DNI:</label>
                <div class="col-sm-9">
                    <input type="number" class="form-control" id="dni" name="dni" min="1" max="100000000000" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="edad" class="col-sm-3 col-form-label">Edad:</label>
                <div class="col-sm-9">
                    <input type="number" class="form-control" id="edad" name="edad"  min="1" max="250" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="genero" class="col-sm-3 col-form-label">Género:</label>
                <div class="col-sm-9">
                    <select class="form-control" id="genero" name="genero" required>
                        <option value="" disabled selected>Seleccione un género</option>
                        <option value="masculino">Masculino</option>
                        <option value="femenino">Femenino</option>
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
