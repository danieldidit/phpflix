<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <title>Genres></title>
    </head>
    <body>
        <?php
        // Connect
        $db = new PDO('mysql:host=172.31.22.43;dbname=Daniel200352106', 'Daniel200352106', 'sEmIhvPPaS');
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Set up SQL query to fetch the genres from the genre table in the db
        $sql = "SELECT * FROM genres";
        $cmd = $db->prepare($sql);

        // Execute the query and store the results
        $cmd->execute();
        $genres = $cmd->fetchAll();

        //Wrap Loop in <ul></ul>
        echo '<ul>';

        // Loop through the data and display each record. $genres: the whole dataset. $genre: current record in loop
        foreach ($genres as $genre) {
            echo '<li>' . $genre['name'] . '</li>';
        }
        // Closes <ul>
        echo '</ul>';

        // Disconnect

        $db = null;
        ?>
    </body>
</html>