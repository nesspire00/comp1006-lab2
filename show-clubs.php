<!DOCTYPE html>
<html lang="en">
<head>
    <title>COMP1006 - Lab 2 / Show Clubs</title>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css" />
    <link rel="stylesheet" href="css/bootstrap-theme.min.css" type="text/css" />
</head>
<body>
    <h1 style="margin: 15px;">Clubs list: </h1>

    <?php

        $conn = new PDO('mysql:host=sql.computerstudi.es;dbname=gc200348171', 'gc200348171', 'PLACE FOR PASSWORD');
        $sql = "SELECT * FROM clubs";
        $cmd = $conn->prepare($sql);
        $cmd->execute();
        $clubs = $cmd->fetchAll();

        echo '<table class="table table-striped table-hover"><tr><th>ID</th><th>Club Name</th><th>Club Ground</th><th>Edit</th><th>Delete</th></tr>';

        foreach ($clubs as $club){
            echo '<tr><td>' . $club['club_id'] . '</td>
                    <td>' . $club['club_name'] . '</td>
                    <td>' . $club['ground'] . '</td>
                    <td>' . '<a href="edit-club.php?club_id='. $club['club_id'].'" class="btn btn-primary">Edit</a>' . '</td>
                    <td>' . '<a href="delete-club.php?club_id='. $club['club_id'].'" class="btn btn-danger confirmation">Delete</a>' . '</td></tr>';
        }
    ?>

    <script src="js/jquery-3.1.1.min.js"></script>
    <script src="js/app.js" ></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>