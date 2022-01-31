<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8"/>
        <title>Saving Movie Details...</title>
    </head>
    <body>
        <?php
        // capture form inputs from POST array and store each one in a variable
        $title = $_POST['title'];
        $rating = $_POST['rating'];
        $releaseYear = $_POST['releaseYear'];
        $genreId = $_POST['genreId'];
        $ok = true;

        // Input validation checking - must have no errors before saving - validate each field individually
        // Makes sure field isn't empty
        if (empty($title)) {
            echo "Title is required<br />";

            // this makes the input not valid
            $ok = false;
        }

        if (empty($rating)) {
            echo "Rating is required<br />";
            $ok = false;
        }

        if (empty($releaseYear)) {
            echo "Release Year is required<br />";
            $ok = false;
        }

        // Makes sure field is numeric
        else {
            if (!is_numeric($releaseYear)) {
                echo "Release Year must be numeric";
                $ok = false;
            }
            else {
                // Makes sure fields greater than 1900
                if ($releaseYear < 1900) {
                    echo "Release Year must be 1900 or greater";
                    $ok = false;
                }
            }
        }

        //If $ok is still true, all inputs are valid
        if ($ok == true) {

            // connect to the db using our credentials using the PDO library
            //5 values required: dbtype / server address / db name / username / password
            $db = new PDO('mysql:host=172.31.22.43;dbname=Daniel200352106', 'Daniel200352106', 'sEmIhvPPaS');

            // set up an SQL INSERT command with placeholders for our three values ( : <-- represents parameters)
            $sql = "INSERT INTO movies (title, rating, releaseYear, genreId) VALUES (:title, :rating, :releaseYear, :genreId)";

            // create a command object using our db connection & SQL command from above
            // in java syntax is $db.prepare($sql); -> is same as .
            $cmd = $db->prepare($sql);

            // populate each field with the matching value from the variables
            $cmd->bindParam(':title', $title, PDO::PARAM_STR, 100);
            $cmd->bindParam(':rating', $rating, PDO::PARAM_STR, 10);
            $cmd->bindParam(':releaseYear', $releaseYear, PDO::PARAM_INT); /* PARAM_INT max length is
            predefined*/
            $cmd->bindParam(':genreId', $genreId, PDO::PARAM_INT);

            // execute the command to save the movie permanently to our db table
            $cmd->execute();

            // disconnect
            $db = null;

            //show a confirmation message
            echo "Movie Saved";
        }
        ?>
    </body>
</html>