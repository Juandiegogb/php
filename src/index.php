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
                <select name="genre" id="genre">
                    <option value="" hidden>Select genre</option>
                    <?php
                    include('php/dbconfig.php');
                    $query = 'SELECT DISTINCT genre FROM songs';
                    $result = $db->query($query);
                    while ($row = $result->fetchArray()) {
                        echo '<option value="' . htmlspecialchars($row['genre']) . '">' . htmlspecialchars($row['genre']) . '</option>';
                    }
                    ?>
                </select>
            </div>
        </div>
        <i id="login" class="fa-solid fa-right-to-bracket" title="Login"></i>
    </nav>

    <main id="songs">

        <?php

        try {
            include('php/dbconfig.php');
            $stmt = $db->query("SELECT * FROM songs");

            while ($row = $stmt->fetchArray()) {
                $title = htmlspecialchars($row['name']);
                $path = htmlspecialchars($row['path']);

                echo '<div class="song" onclick="playSong(\'' . $path . '\', \'' . $title . '\')">';
                echo '<div class="details">';
                echo '<h3>' . htmlspecialchars($row['name']) . '</h3>';
                echo '<p>' . htmlspecialchars($row['artist']) . '</p>';
                echo '<p>' . htmlspecialchars($row['album']) . '</p>';
                echo '</div>';
                echo '</div>';
            }
        } catch (PDOException $e) {
            echo "Error en la conexión: " . $e->getMessage();
        }
        ?>

    </main>
    <div id="audio_player">
        <p id="song_title">Select a song to play</p>
        <audio id="player" controls>
            <source id="audio_source" src="" type="audio/mpeg">
            Your browser does not support the audio element.
        </audio>
    </div>


    <footer>
        <p>Develop by José Mateus & Juan Diego Garzón 2025</p>
    </footer>

    <script>
        document.getElementById('genre').addEventListener('change', function() {
            let genre = this.value;
            fetch('php/get_songs.php?genre=' + encodeURIComponent(genre))
                .then(response => response.text())
                .then(data => {
                    document.getElementById('songs').innerHTML = data;
                })
                .catch(error => console.error('Error:', error));
        });

        function playSong(path, title) {
            let player = document.getElementById('player');
            let source = document.getElementById('audio_source');
            let songTitle = document.getElementById('song_title');

            source.src = path;
            player.load();
            player.play();
            songTitle.textContent = title;
        }
    </script>

</body>

</html>