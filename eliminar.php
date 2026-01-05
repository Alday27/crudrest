<?php
include("conexion.php");

$mensaje = "";
$platillo = null;

/* Buscar platillo */
if (isset($_POST["buscar"])) {
    $id = $_POST["id"];
    $nombre_buscar = $_POST["nombre_buscar"];

    if ($id != "") {
        $resultado = mysqli_query($conexion, "SELECT * FROM platillos WHERE id=$id");
    } else {
        $resultado = mysqli_query(
            $conexion,
            "SELECT * FROM platillos WHERE nombre LIKE '%$nombre_buscar%' LIMIT 1"
        );
    }

    $platillo = mysqli_fetch_assoc($resultado);
}

/* Eliminar platillo */
if (isset($_POST["eliminar"])) {
    $id = $_POST["id"];

    $sql = "DELETE FROM platillos WHERE id=$id";
    if (mysqli_query($conexion, $sql)) {
        $mensaje = "🗑️ Platillo eliminado correctamente";
    } else {
        $mensaje = "❌ Error al eliminar el platillo";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Eliminar platillo</title>

    <!-- Bootstrap -->
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
            max-width: 550px;
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
            color: #b71c1c;
            margin-bottom: 15px;
        }

        .dato {
            background: #ffebee;
            padding: 10px;
            border-radius: 10px;
            margin-bottom: 10px;
        }

        .btn-rojo {
            background: #d32f2f;
            color: white;
            font-weight: bold;
        }

        .btn-rojo:hover {
            background: #b71c1c;
        }
    </style>
</head>

<body>

<div class="card">

    <img src="img/chef.jpg" class="logo" alt="Chef">

    <h3>🗑️ Eliminar Platillo</h3>

    <?php if ($mensaje != "") { ?>
        <div class="alert alert-warning text-center">
            <?php echo $mensaje; ?>
        </div>
    <?php } ?>


    <?php if (!$platillo && $mensaje == "") { ?>
    <form method="post">
        <label class="form-label">Buscar por ID</label>
        <input type="number" name="id" class="form-control mb-2">

        <p class="text-center text-muted">o</p>

        <label class="form-label">Buscar por Nombre</label>
        <input type="text" name="nombre_buscar" class="form-control mb-3">

        <button type="submit" name="buscar" class="btn btn-success w-100">
            Buscar Platillo
        </button>
    </form>
    <?php } ?>

    
    <?php if ($platillo) { ?>
        <div class="dato"><b>ID:</b> <?php echo $platillo["id"]; ?></div>
        <div class="dato"><b>Nombre:</b> <?php echo $platillo["nombre"]; ?></div>
        <div class="dato"><b>Categoría:</b> <?php echo $platillo["categoria"]; ?></div>
        <div class="dato"><b>Precio:</b> $<?php echo $platillo["precio"]; ?></div>

        <form method="post" class="mt-3">
            <input type="hidden" name="id" value="<?php echo $platillo["id"]; ?>">
            <button type="submit" name="eliminar" class="btn btn-rojo w-100">
                Eliminar Definitivamente
            </button>
        </form>
    <?php } ?>

    <a href="index.php" class="btn btn-link mt-3">
        ⬅ Volver al menú
    </a>

</div>

</body>
</html>

<?php mysqli_close($conexion); ?>
