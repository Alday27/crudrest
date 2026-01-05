<?php
include("conexion.php");


$busqueda = "";
if (isset($_GET["buscar"])) {
    $busqueda = $_GET["busqueda"];
    $sql = "SELECT * FROM platillos 
            WHERE nombre LIKE '%$busqueda%' 
            OR categoria LIKE '%$busqueda%'";
} else {
    $sql = "SELECT * FROM platillos";
}

$resultado = mysqli_query($conexion, $sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Consultar platillos</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: #fff9c4;
            min-height: 100vh;
            font-family: Arial, sans-serif;
        }

        .contenedor {
            max-width: 1100px;
            margin: 40px auto;
            background: white;
            border-radius: 25px;
            box-shadow: 0 12px 30px rgba(0,0,0,0.3);
            padding: 30px;
        }

        .header {
            text-align: center;
            margin-bottom: 25px;
        }

        .header img {
            width: 120px;
            margin-bottom: 10px;
        }

        h2 {
            color: #1b5e20;
            margin-bottom: 10px;
        }

        table thead {
            background: #4caf50;
            color: white;
        }

        table tbody tr:hover {
            background: #e8f5e9;
        }

        .btn-naranja {
            background: orange;
            color: white;
            font-weight: bold;
        }

        .btn-naranja:hover {
            background: darkorange;
        }
    </style>
</head>

<body>

<div class="contenedor">

    <div class="header">
        <img src="img/chef.jpg" alt="Chef">
        <h2>📋 Menú del Restaurante</h2>
        <p>Consulta los platillos disponibles</p>
    </div>

    <form method="get" class="row mb-4 justify-content-center">
        <div class="col-md-6">
            <input type="text" name="busqueda" class="form-control"
                   placeholder="Buscar por nombre o categoría"
                   value="<?php echo $busqueda; ?>">
        </div>
        <div class="col-md-2">
            <button type="submit" name="buscar" class="btn btn-naranja w-100">
                Buscar
            </button>
        </div>
    </form>

    <div class="table-responsive">
        <table class="table table-bordered text-center align-middle">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Platillo</th>
                    <th>Categoría</th>
                    <th>Precio</th>
                </tr>
            </thead>
            <tbody>
                <?php if (mysqli_num_rows($resultado) > 0) { ?>
                    <?php while ($fila = mysqli_fetch_assoc($resultado)) { ?>
                    <tr>
                        <td><?php echo $fila["id"]; ?></td>
                        <td><?php echo $fila["nombre"]; ?></td>
                        <td><?php echo $fila["categoria"]; ?></td>
                        <td>$<?php echo number_format($fila["precio"], 2); ?></td>
                    </tr>
                    <?php } ?>
                <?php } else { ?>
                    <tr>
                        <td colspan="4">No se encontraron platillos</td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>


    <div class="text-center mt-4">
        <a href="index.php" class="btn btn-naranja px-4">
            ⬅ Volver al menú
        </a>
    </div>

</div>

</body>
</html>

<?php mysqli_close($conexion); ?>
