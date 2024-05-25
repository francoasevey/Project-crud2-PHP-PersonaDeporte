<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carga Nuevo Deporte</title>
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
        <h2 class="text-center mb-4">Cargar Nuevo Deporte</h2>
        <form method="post" action="agregardeporte.php">
            <div class="form-group row">
                <label for="nombre" class="col-sm-3 col-form-label">Nombre:</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="nombre" name="nombre" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="descripcion" class="col-sm-3 col-form-label">Descripcion:</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="descripcion" name="descripcion" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="categoria" class="col-sm-3 col-form-label">Categoria:</label>
                <div class="col-sm-9">
                    <select class="form-control" id="categoria" name="categoria" required>
                        <option value="" disabled selected>Seleccione una categoria</option>
                        <option value="profesional">Profesional</option>
                        <option value="amateur">Amateur</option>
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
                    <form action="listardeporte.php" class="mr-2">
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
