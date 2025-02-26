<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>CRUD Operation on SQLite3 Database using PHP</title>
</head>

<body>
    <form method="POST">
        <a href="index.php">Back</a>
        <p>
            <label for="name">name:</label>
            <input type="text" id="name" name="name">
        </p>
        <p>
            <label for="dni">dni:</label>
            <input type="number" id="dni" name="dni">
        </p>

        <input type="submit" name="save" value="Save">
    </form>
    <?php
    if (isset($_POST['save'])) {
        include 'dbconfig.php';

        $name = $_POST['name'];
        $dni = $_POST['dni'];
        $sql = "INSERT INTO users(name,dni) VALUES ('$name' , $dni)";
        $db->exec($sql);

        header('location: index.php');
    }
    ?>
</body>

</html>