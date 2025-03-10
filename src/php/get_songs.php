<?php
$db = new SQLite3('../app.db');

if (isset($_GET['genre']) && !empty($_GET['genre'])) {
    $genre = $_GET['genre'];
    $stmt = $db->prepare("SELECT * FROM songs WHERE genre = :genre");
    $stmt->bindValue(':genre', $genre, SQLITE3_TEXT);
    $result = $stmt->execute();
} else {
    $stmt = $db->query("SELECT * FROM songs");
}

while ($row = $stmt->fetchArray()) {
    echo '<div class="song">';
    echo '<div class="details">';
    echo '<h3>' . htmlspecialchars($row['name']) . '</h3>';
    echo '<p>' . htmlspecialchars($row['artist']) . '</p>';
    echo '<p>' . htmlspecialchars($row['album']) . '</p>';
    echo '</div>';
    echo '</div>';
}
