<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $jaula_id = $_POST['jaula_id'];

    $sql = "SELECT * FROM animales WHERE jaula_id = $jaula_id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<h2>Animales en la Jaula ID $jaula_id:</h2>";
        while($row = $result->fetch_assoc()) {
            echo "ID: " . $row["id"]. " - Nombre: " . $row["nombre"]. " - Especie: " . $row["especie"]. "<br>";
        }
    } else {
        echo "No hay animales en esta jaula.";
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
    <title>Consultar Animales por Jaula - ZOO CBA</title>
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
        <h2>Consultar Animales por Jaula</h2>
        <form method="post" action="">
            ID de la Jaula: <input type="number" name="jaula_id" required>
            <input type="submit" value="Consultar">
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
