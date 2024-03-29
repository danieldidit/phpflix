<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Deleting Movie...</title>
        <!-- Bootstrap CDN -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
              integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
              crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
                integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
                crossorigin="anonymous"></script>
        <!-- Google Font -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Exo+2&display=swap" rel="stylesheet">
        <!-- Custom CSS -->
        <link href="css/styles.css" rel="stylesheet">
    </head>
    <body>
        <?php
        // get the movieId PF value from the URL using the $_GET array
        if (isset($_GET['movieId'])) {
            if (is_numeric($_GET['movieId'])) {
            // movieId in URL is a number so proceed with delete request
            $movieId = $_GET['movieId'];

            // connect to the db using db.php file
            //require 'db.php'; -- NOT WORKING
            $db = new PDO('mysql:host=172.31.22.43;dbname=Daniel200352106', 'Daniel200352106', 'sEmIhvPPaS');

            // Set up the SQL DELETE command
            $sql = "DELETE FROM movies WHERE movieId = :movieId";
            $cmd = $db->prepare($sql);
            $cmd->bindParam(':movieId', $movieId, PDO::PARAM_INT);

            // execute the deletion
            $cmd->execute();

            // disconnect
            $db = null;

            // show message to the user
            echo '<h1>Movie Deleted</h1>
                <a href="movies.php" class="alert alert-info">Back To Movie List</a>';

            }
            else { // We have a movieId but it's not a number
                echo "Invalid Movie";
                }
            }
        else { // movieId is missing
            echo "Invalid Movie";
        }

        ?>
    </body>
</html>