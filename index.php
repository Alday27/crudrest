<?php
include("conexion.php");
$resultado = mysqli_query($conexion, "SELECT * FROM platillos LIMIT 5");
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Menú Principal - Restaurante Chef</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #fff9c4;
            display: flex;
            min-height: 100vh;
        }

        
        .sidebar {
            width: 260px;
            background: linear-gradient(180deg, #1b5e20, #4caf50);
            padding: 25px;
            color: white;
        }

        .sidebar h3 {
            margin-bottom: 20px;
        }

        .sidebar button {
            width: 100%;
            margin-bottom: 12px;
            padding: 12px;
            border-radius: 12px;
            border: none;
            background: orange;
            color: white;
            font-weight: bold;
        }

        .sidebar button:hover {
            background: darkorange;
        }

        /* CONTENIDO */
        .contenido {
            flex: 1;
            padding: 40px;
        }

        .card {
            border-radius: 20px;
            box-shadow: 0 12px 30px rgba(0,0,0,0.3);
            padding: 25px;
        }

        h2 {
            color: #1b5e20;
            margin-bottom: 10px;
        }

        table thead {
            background: #4caf50;
            color: white;
        }
    </style>
</head>

<body>


<div class="sidebar">
    <h3>🍽️ CRUD Restaurante</h3>

    <form action="agregar.php"><button>Agregar Platillo</button></form>
    <form action="consultar.php"><button>Consultar Menú</button></form>
    <form action="editar.php"><button>Editar Platillo</button></form>
    <form action="eliminar.php"><button>Eliminar Platillo</button></form>
</div>

<div class="contenido">

    <div class="card">

        <h2>Bienvenido al menu CRUD del restaurante CHEF</h2>
        <p>Este sistema permite administrar el menú del restaurante de forma sencilla.</p>

        <hr>

        <h5>📋 Vista previa del menú</h5>

        <table class="table table-bordered text-center align-middle mt-3">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Platillo</th>
                    <th>Categoría</th>
                    <th>Precio</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($fila = mysqli_fetch_assoc($resultado)) { ?>
                <tr>
                    <td><?php echo $fila["id"]; ?></td>
                    <td><?php echo $fila["nombre"]; ?></td>
                    <td><?php echo $fila["categoria"]; ?></td>
                    <td>$<?php echo number_format($fila["precio"], 2); ?></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>

        <p class="text-center text-muted">
            solo se muestran   algunos platillos.  
             debes usar <b>Consultar Menú</b> para ver todos.
        </p>

    </div>

</div>

</body>
</html>

<?php mysqli_close($conexion); ?>
