<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ZOO CBA</title>
    <link rel="stylesheet" href="styles.css"> <!-- Enlazamos el archivo CSS -->
    <!-- Agregar un ícono a la pestaña -->
    <link rel="icon" href= imagenes/zoo_icon.php type="image/png"> <!-- Reemplaza con tu icono de zoo -->
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
        <h1>Bienvenido al Sistema de Gestión del Zoológico</h1>
        <p>Seleccione una opción del menú para comenzar.</p>
    </main>

    <script>
        // Función para mostrar/ocultar el menú de hamburguesa
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
