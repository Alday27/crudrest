<?php
include("conexion.php");

$mensaje = "";
$platillo = null;

if (isset($_POST["buscar"])) {
    $id = $_POST["id"];
    $nombre_buscar = $_POST["nombre_buscar"];

    if ($id != "") {
        $resultado = mysqli_query($conexion, "SELECT * FROM platillos WHERE id=$id");
    } else {
        $resultado = mysqli_query($conexion, 
            "SELECT * FROM platillos WHERE nombre LIKE '%$nombre_buscar%' LIMIT 1");
    }

    $platillo = mysqli_fetch_assoc($resultado);
}

if (isset($_POST["actualizar"])) {
    $id = $_POST["id"];
    $nombre = $_POST["nombre"];
    $categoria = $_POST["categoria"];
    $precio = $_POST["precio"];

    $sql = "UPDATE platillos 
            SET nombre='$nombre', categoria='$categoria', precio=$precio
            WHERE id=$id";

    if (mysqli_query($conexion, $sql)) {
        $mensaje = "✅ Platillo actualizado correctamente";
    } else {
        $mensaje = "❌ Error al actualizar";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar platillo</title>

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
            color: #1b5e20;
            margin-bottom: 15px;
        }

        .dato {
            background: #e8f5e9;
            padding: 10px;
            border-radius: 10px;
            margin-bottom: 10px;
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

    <h3>✏️ Editar Platillo</h3>

    <?php if ($mensaje != "") { ?>
        <div class="alert alert-info text-center"><?php echo $mensaje; ?></div>
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

        <form method="post">
            <input type="hidden" name="id" value="<?php echo $platillo["id"]; ?>">

            <div class="mb-3">
                <label class="form-label">Nombre</label>
                <input type="text" name="nombre" class="form-control"
                       value="<?php echo $platillo["nombre"]; ?>" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Categoría</label>
                <input type="text" name="categoria" class="form-control"
                       value="<?php echo $platillo["categoria"]; ?>" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Precio</label>
                <input type="number" step="0.01" name="precio" class="form-control"
                       value="<?php echo $platillo["precio"]; ?>" required>
            </div>

            <button type="submit" name="actualizar" class="btn btn-naranja w-100">
                Guardar Cambios
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
