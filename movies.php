<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <title>Movies</title>
    </head>
    <body>
        <h1>Movies</h1>
        <a href="movie-details.php">Add A New Movie</a>
        <table border="1" width="100%">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Rating</th>
                    <th>Release Year</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $db = new PDO('mysql:host=172.31.22.43;dbname=Daniel200352106', 'Daniel200352106', 'sEmIhvPPaS');
                $sql ="SELECT * FROM movies";

                $cmd = $db->prepare($sql);
                $cmd->execute();
                $movies = $cmd->fetchAll();

                // Loop through the records, new row for each record, new column for each value
                foreach ($movies as $movie) {
                    echo '<tr>
                            <td>' . $movie['title'] . '</td>
                            <td>' . $movie['rating'] . '</td>
                            <td>' . $movie['releaseYear'] . '</td>
                          </tr>';
                }
                $db = null;
                ?>
            </tbody>
        </table>
    </body>
</html>