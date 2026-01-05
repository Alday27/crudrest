<?php
include("conexion.php");

$mensaje = "";

if (isset($_POST["crear"])) {
    $nombre = $_POST["nombre"];
    $categoria = $_POST["categoria"];
    $precio = $_POST["precio"];

    $sql = "INSERT INTO platillos (nombre, categoria, precio)
            VALUES ('$nombre', '$categoria', $precio)";

    if (mysqli_query($conexion, $sql)) {
        $mensaje = "✅ Platillo agregado correctamente";
    } else {
        $mensaje = "❌ Error al agregar platillo";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Agregar platillo</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: #fff9c4;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            font-family: Arial, sans-serif;
        }

        .card {
            width: 100%;
            max-width: 520px;
            padding: 30px;
            border-radius: 25px;
            box-shadow: 0 12px 30px rgba(0,0,0,0.3);
        }

        .logo {
            width: 120px;
            display: block;
            margin: 0 auto 15px;
        }

        h3 {
            text-align: center;
            color: #1b5e20;
            margin-bottom: 5px;
        }

        .descripcion {
            text-align: center;
            color: #555;
            margin-bottom: 20px;
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

<div class="card">

    <img src="img/chef.jpg" class="logo" alt="Chef">

    <h3>➕ Agregar Platillo</h3>
    <p class="descripcion">
        Registra un nuevo platillo en el menú del restaurante
    </p>

    <?php if ($mensaje != "") { ?>
        <div class="alert alert-info text-center"><?php echo $mensaje; ?></div>
    <?php } ?>

    <form method="post">

        <div class="mb-3">
            <label class="form-label">Nombre del platillo</label>
            <input type="text" name="nombre" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Categoría</label>
            <input type="text" name="categoria" class="form-control" required>
        </div>

        <div class="mb-4">
            <label class="form-label">Precio</label>
            <input type="number" step="0.01" name="precio" class="form-control" required>
        </div>

        <button type="submit" name="crear" class="btn btn-naranja w-100">
            Guardar Platillo
        </button>
    </form>

    <div class="text-center mt-3">
        <a href="index.php" class="btn btn-link">
            ⬅ Volver al menú
        </a>
    </div>

</div>

</body>
</html>

<?php mysqli_close($conexion); ?>
