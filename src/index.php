<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Library</title>
    <link rel="stylesheet" href="styles/index.css">
    <script src="https://kit.fontawesome.com/7df5eab600.js" crossorigin="anonymous"></script>
</head>

<body>

    <nav>
        <div class="app_name">
            <img class="icon" src="img/logo.svg" alt="">
            <h1>BeatsCloud</h1>
        </div>
        <div class="search_container">
            <div class="search_bar">
                <i class="fa-solid fa-magnifying-glass"></i>
                <input type="text" placeholder="Search songs">
            </div>
            <div class="genre_filter">
                <select name="" id="">
                    <option value="" hidden>Select genre</option>
                    <option value="">Salsa</option>
                    <option value="">Vallenato</option>
                </select>
            </div>
        </div>
        <i id="login" class="fa-solid fa-right-to-bracket" title="Login"></i>
    </nav>

    <main>

        <?php

        try {
            include('php/dbconfig.php');
            $stmt = $db->query("SELECT * FROM songs");
            echo '<div class="song">';
            while ($row = $stmt->fetchArray()) {
                echo '<div class="details">';
                echo '<h3>' . htmlspecialchars($row['name']) . '</h3>';
                echo '<p>' . htmlspecialchars($row['artist']) . '</p>';
                echo '<p>' . htmlspecialchars($row['album']) . '</p>';
                echo '</div>';
            }
            echo '</div>';
        } catch (PDOException $e) {
            echo "Error en la conexión: " . $e->getMessage();
        }
        ?>

    </main>

    <footer>
        <p>Develop by José Mateus & Juan Diego Garzón 2025</p>
    </footer>


</body>

</html>