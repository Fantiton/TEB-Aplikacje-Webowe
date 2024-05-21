<?php 
    $con = mysqli_connect("localhost","root","","filcel-notatki");
    if(isset($_POST['title'])){
        echo 'tworzenie';
        $sql = 'SELECT * FROM notatki ORDER BY id asc';
        $res = $con->query($sql); 
        if($res){ 
            $lastId = 0;
            while ($row=$res->fetch_assoc()) {
                if ($row['title'] == $_POST['title']) {
                    $error = 'title';
                    break;
                }
                $lastId = $row['id'];    
            } 
            $sql2 = 'INSERT INTO notatki (id, title, content, category) VALUES ("", "' . $_POST['title'] . '", "' . $_POST['note'] . '", "' . $_POST['category'] . '")';
            $res2 = $con->query($sql2);
            if ($res2) {
                echo 'Sukces!';
                header('location: read.php?id=' . ($lastId + 1));
            }else {
                echo 'ŁUPS! Coś poszło nie tak 😭';
            }
        }
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
            <label class="createLabel">Tytuł: </label></br>
            <input type="text" id="titleInput" name="title" placeholder="Notatka" required></br>
            <label class="createLabel">Kategoria: </label></br>
            <input type="text" id="catInput" name="category" placeholder="Lista Zakupowa"><br>
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