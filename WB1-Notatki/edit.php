<?php
    $con = mysqli_connect("localhost", "root", "", "filcel-notatki");
    if (!isset($_GET['id'])) {
        header('location: index.php');
    }
    if (!isset($_POST['title'])){
        echo 'moc skibidi toilet jest większa';
    }else{
        $sql = "UPDATE notatki SET id=" . $_GET['id'] . ", title = '" . $_POST['title'] . "', content = '" . $_POST['note'] . "', category = '" . $_POST['category'] . "' WHERE id=" . $_GET['id'];
        $res = $con->query($sql);
        if (!$res) {
            echo 'kaput </br>';
            echo $sql;
        } else{
            header('location: read.php?id=' . $_GET['id']);
        }
    }
?>