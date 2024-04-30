<?php 
    $con = mysqli_connect("localhost","root","","filcel-notatki");
    if(!isset($_POST['title'])){

    }else{
        $sql = 'SELECT * FROM notatki ORDER BY id asc';
        $res = $con->query($sql); 
        if($res->num_rows > 0){ 
            while ($row=$res->fetch_assoc()) {
                if ($row['title'] == $_POST['title']) {
                    $error = 'title';
                    break;
                }
                $lastId = $row['id'];    
            } 
        }
        $sql2 = 'INSERT INTO notatki (id, title, content) VALUES ("", "' . $_POST['title'] . '", "' . $_POST['note'] . '")';
        $res2 = $con->query($sql2);
        header('location: read.php?id=' . $lastId + 1);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Tatkik</title>
</head>
<body>
    <div id="centered">
        <form action="create.php" method="post">
            <label class="createLabel">Tytół: </label></br>
            <input type="text" id="titleInput" name="title" placeholder="Notatka" required></br>
            <label class="createLabel">Notatka: </label></br>
            <textarea id="noteInput" name="note" value="" placeholder="Moje Notatki"></textarea></br>
            <input class="createSubmit" type="submit" value="Stwórz ">
        </form>
    </div>
</body>
</html>
<?php 
    mysqli_close($con);
?>