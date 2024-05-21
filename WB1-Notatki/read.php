<?php 
    $con = mysqli_connect("localhost", "root", "", "filcel-notatki");
    if (!isset($_GET['id'])) {
        header('location: index.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Katka</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div id="centered">
    <?php 

    $sql = 'SELECT * FROM notatki WHERE id = ' . $_GET['id'];
    $res = $con->query($sql);
    if ($res) {
        while ($row = $res->fetch_assoc()) { 
            echo '
            <form action="edit.php?id=' . $_GET['id'] . '" method="post">
                <label class="createLabel">Tytuł: </label></br>
                <input type="text" id="titleInput" name="title" value="' . $row['title'] . '" required"></br>
                <label class="createLabel">Kategoria: </label></br>
                <input type="text" id="catInput" name="category" value="' . $row['category'] . '"></br>
                <label class="createLabel">Notatka: </label></br>
                <textarea id="noteInput" name="note">' . $row['content'] . '</textarea></br>
                <input class="createSubmit" type="submit" value="Zapisz ">
                <button class="createSubmit"><a href="index.php" class="fullLink">Wyjdź</a></button>
                <button class="createSubmit"><a href="delete.php?id=' . $_GET['id'] . '" class="fullLink">Usuń</a></button>
            </form>
            ';
        }
    }
    ?>
    </div>
</body>
</html>
<?php 
    mysqli_close($con);
?>