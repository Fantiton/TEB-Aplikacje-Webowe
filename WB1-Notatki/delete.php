<?php 
    if (!isset($_GET['id'])) {
        header('location: index.php');
    } else{
        echo 'usuwanie...';

        $con = new mysqli("localhost", "root", "", "filcel-notatki");
        $sql = 'DELETE FROM notatki WHERE id = ' . $_GET['id'];
        $res = $con->query($sql);
        if ($res) {
            mysqli_close($con);
            header('location: index.php');
        } else{
            echo 'Nie udało się usunąć notatki <br>
            <a href="index.php">Wróć na stronę główną</a>
            ';
        }

    }
