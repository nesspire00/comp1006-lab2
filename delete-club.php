<?php ob_start() ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>COMP1006 - Lab2 / Detele Club</title>
    <meta charset="utf-8" />
</head>

<body>

    <?php
    $club_id = null;

    if(!empty($_GET['club_id'])){
        if(is_numeric($_GET['club_id'])){
            $club_id = $_GET['club_id'];
        }
    }

    if(!empty($club_id)){

        $conn = new PDO('mysql:host=sql.computerstudi.es;dbname=gc200348171', 'gc200348171', 'PLACE FOR PASSWORD');

        $sql = "DELETE FROM clubs WHERE club_id = :club_id";
        $cmd = $conn -> prepare($sql);
        $cmd -> bindParam(':club_id', $club_id, PDO::PARAM_INT);

        $cmd -> execute();

        $conn = null;
    }

    header('location:show-clubs.php');

    ?>

</body>

</html>
<?php ob_flush(); ?>