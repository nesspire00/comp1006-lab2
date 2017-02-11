<!DOCTYPE html>
<html lang="en">

<head>
    <title>COMP1006 - Lab 2 / Edit Club</title>
    <meta charset="utf-8"/>
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css"/>
    <link rel="stylesheet" href="css/bootstrap-theme.min.css" type="text/css"/>
</head>

<body>

<?php

$club_id = null;

if (!is_numeric($_GET['club_id'])) {

    echo '<h1>Error! Invalid club_id</h1>';
}

if (is_numeric($_GET['club_id'])) {
    $club_id = $_GET['club_id'];

    $conn = new PDO('mysql:host=sql.computerstudi.es;dbname=gc200348171', 'gc200348171', 'PLACE FOR PASSWORD');

    $sql = "SELECT club_name, ground FROM clubs WHERE club_id = :club_id";
    $cmd = $conn->prepare($sql);
    $cmd->bindParam(':club_id', $club_id, PDO::PARAM_INT);
    $cmd->execute();
    $club = $cmd->fetch();

    $club_name = $club['club_name'];
    $ground = $club['ground'];

    $conn = null;
}
?>

<h1 style="margin: 15px;"> Edit Club: </h1>

<form method="post" action="save_club.php">

    <fieldset class="form-group">
        <label for="club_name" class="col-sm-1"> Club Name: </label>
        <input name="club_name" id="club_name" value="<?php echo $club_name; ?>"/>
    </fieldset>

    <fieldset class="form-group">
        <label for="ground" class="col-sm-1"> Club Ground: </label>
        <input name="ground" id="ground" value="<?php echo $ground; ?>"/>
    </fieldset>

    <input name="club_id" id="club_id" value="<?php echo $club_id; ?>" type="hidden"/>

    <button class="btn btn-success col-sm-offset-1">Save Changes</button>

</form>

<script src="js/jquery-3.1.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>