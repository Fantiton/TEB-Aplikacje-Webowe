<?php 
    $con = mysqli_connect("localhost","root","","filcel-notatki");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Tatnik</title>
</head>
<body>
    <div id="search">
        <form action="index.php" method="post">
            <input name="search" id="searchInput" type="text" placeholder="Search...">
            <input id="searchsubmit" type="submit" value="Search">
        </form>
    </div>
    <div id="main">
        <div id="createButton">
            <a class="fullLink" href="create.php">
                <img id="createButtonIcon" src="img/add.png">
            </a>
        </div>
    <?php 
        if (!isset($_POST['search']) || $_POST['search'] == '') {
            $sql = "SELECT * FROM notatki ORDER BY id desc";
            $res = mysqli_query($con, $sql);
            if($res->num_rows > 0) {
                while($row = mysqli_fetch_assoc($res)) {
                    echo '
                        <div class="noteLink">
                            <a class="fullLink" href="read.php?id=' . $row['id'] . '" class="note">
                                <img class="noteLinkIcon" src="img/noteIcon.png"><br>
                                ' . $row['title'] . '
                            </a>
                        </div>
                    ';
                }    
            }
        }else{
            $sql = "SELECT * FROM notatki WHERE title LIKE '%" . $_POST['search'] . "%' ORDER BY id desc";
            $res = $con->query($sql);
            if ($res->num_rows>0) {
                while ($row=$res->fetch_assoc()) {
                    echo '
                    <div class="noteLink">
                        <a class="fullLink" href="read.php?id=' . $row['id'] . '" class="note">
                            <img class="noteLinkIcon" src="img/noteIcon.png"><br>
                            ' . $row['title'] . '
                        </a>
                    </div>
                    ';
                }
            }
            echo $sql;
        }
    ?>
    </div>
</body>
</html>
<?php 
    mysqli_close($con);
?>