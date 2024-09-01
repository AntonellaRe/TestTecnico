<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $ubicacion = $_POST['ubicacion'];

    $sql = "INSERT INTO jaulas (ubicacion) VALUES ('$ubicacion')";

    if ($conn->query($sql) === TRUE) {
        echo "Nueva jaula añadida exitosamente.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
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
    <title>Añadir Jaula - ZOO CBA</title>
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
        <h2>Añadir una Nueva Jaula</h2>
        <form method="post" action="">
            Ubicación de la Jaula: <input type="text" name="ubicacion" required>
            <input type="submit" value="Añadir Jaula">
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
