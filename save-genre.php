<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <title>Saving Genre..</title>
    </head>
    <body>
        <?php
        // Get form input
        $name = $_POST['name'];

        // Connect
        $db = new PDO('mysql:host=172.31.22.43;dbname=Daniel200352106', 'Daniel200352106', 'sEmIhvPPaS');
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Set up SQP and command object
        $sql = "INSERT INTO genres (name) VALUES (:name)";
        $cmd = $db->prepare($sql);

        // Bind the parameter to insert the form input into the name param
        $cmd->bindParam(':name', $name, PDO::PARAM_STR, 100);

        // Execute the save operation
        $cmd->execute();

        // Disconnect
        $db = null;

        // Show confirmation
        echo "Genre Saved";
        ?>
    </body>
</html>