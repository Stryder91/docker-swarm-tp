<?php
    try {
        $db = new PDO('pgsql:host=database;dbname=docker_swarm;', 'root', '');
        $database = ($db->query('SELECT * FROM Persons'))->fetchAll(PDO::FETCH_OBJ);
    } catch (PDOException $e) {
        print "Error!: " . $e->getMessage() . "<br/>";
        die();
    }
?>

<html>
    <body>
        <?php foreach($database as $row): ?>
            <h1>Welcome <?= $row->LastName ?></h1>
        <?php endforeach; ?>
    </body>
</html>
