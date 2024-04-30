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
    if ($res->num_rows > 0) {
        while ($row = $res->fetch_assoc()) { 
            echo '
            <form action="edit.php?id=' . $_GET['id'] . '" method="post">
                <input type="text" id="titleInput" name="title" value="' . $row['title'] . '" required"></br>
                <textarea id="noteInput" name="note">' . $row['content'] . '</textarea></br>
                <input class="createSubmit" type="submit" value="Zapisz ">
                <button class="createSubmit"><a href="index.php" class="fullLink">Wyjdź</a></button>
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