<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $especie = strtolower($_POST['especie']); // Convertimos a minúsculas para evitar problemas de comparación
    $jaula_id = $_POST['jaula_id'];

    // Lista de combinaciones de especies que no pueden convivir
    $combinaciones_no_permitidas = [
        ['mono', 'leon'],
        ['tigre', 'gacela'],
        ['serpiente', 'conejo']
        // Puedes añadir más combinaciones según las necesidades
    ];

    // Verificar las especies ya alojadas en la jaula
    $query = "SELECT especie FROM animales WHERE jaula_id = $jaula_id";
    $result = $conn->query($query);

    $especies_en_jaula = [];
    while ($row = $result->fetch_assoc()) {
        $especies_en_jaula[] = strtolower($row['especie']); // Convertimos a minúsculas para evitar problemas de comparación
    }

    // Verificar si la nueva especie es compatible con las especies existentes
    $conflicto = false;
    foreach ($especies_en_jaula as $especie_existente) {
        foreach ($combinaciones_no_permitidas as $combinacion) {
            if ((in_array($especie, $combinacion)) && (in_array($especie_existente, $combinacion))) {
                $conflicto = true;
                break 2; // Salimos de ambos bucles
            }
        }
    }

    if ($conflicto) {
        echo "Error: No se pueden alojar $especie y otra especie incompatible en la misma jaula.";
    } else {
        $sql = "INSERT INTO animales (nombre, especie, jaula_id) VALUES ('$nombre', '$especie', $jaula_id)";
        if ($conn->query($sql) === TRUE) {
            echo "Nuevo animal añadido exitosamente.";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Añadir Animal - ZOO CBA</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <div class="navbar">
            <span class="brand-title">ZOO CBA</span>
            <button class="hamburger-menu" onclick="toggleMenu()">☰</button>
        </div>
        <nav id="menu" class="nav-links">
            <a href="add_cage.php">Añadir Nueva Jaula</a>
            <a href="add_animal.php">Añadir Animal</a>
            <a href="view_animals.php">Consultar Animales por Jaula</a>
        </nav>
    </header>
    <main>
        <h2>Añadir un Nuevo Animal</h2>
        <form method="post" action="">
            Nombre del Animal: <input type="text" name="nombre" required><br>
            Especie del Animal: <input type="text" name="especie" required><br>
            ID de la Jaula: <input type="number" name="jaula_id" required><br>
            <input type="submit" value="Añadir Animal">
        </form>
    </main>

    <script>
        function toggleMenu() {
            var menu = document.getElementById('menu');
            if (menu.style.display === 'block') {
                menu.style.display = 'none';
            } else {
                menu.style.display = 'block';
            }
        }
    </script>
</body>
</html>
