<?php ob_start() ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>COMP1006 - Lab 2 / Save Club</title>
    <meta charset="utf-8" />
</head>

<body>

    <?php

        $club_name = $_POST['club_name'];
        $ground = $_POST['ground'];
        $club_id = $_POST['club_id'];

        $ok = true;

        if(empty($club_name)){
            echo 'Club Name is Empty!<br />';
            $ok = false;
        }

        if(empty($ground)){
            echo 'Club Ground is Empty!<br />';
            $ok = false;
        }

        if(empty($club_id)){
            echo 'club_id is invalid';
        }

        if($ok){

        $conn = new PDO('mysql:host=sql.computerstudi.es;dbname=gc200348171', 'gc200348171', 'PLACE FOR PASSWORD');

        $sql = "UPDATE clubs SET club_name = :club_name, ground = :ground WHERE club_id = :club_id";


        $cmd = $conn->prepare($sql);

        $cmd -> bindParam(':club_name', $club_name, PDO::PARAM_STR, 50);
        $cmd -> bindParam(':ground', $ground, PDO::PARAM_STR, 50);
        $cmd -> bindParam(':club_id', $club_id, PDO::PARAM_INT);

        $cmd->execute();

        header('location:show-clubs.php');

        $conn = null;
        }
    ?>

</body>
</html>
<?php ob_flush(); ?>