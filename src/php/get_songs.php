<?php
$db = new SQLite3('../app.db');

if (isset($_GET['genre']) && !empty($_GET['genre'])) {
    $genre = $_GET['genre'];
    $query = 'SELECT * FROM songs WHERE genre = ' . "'" . $genre . "'";
    $stmt = $db->query($query);
} else {
    $stmt = $db->query("SELECT * FROM songs");
}

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
