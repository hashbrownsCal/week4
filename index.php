<?php
require("database.php");
$query = 'SELECT * FROM todoitems';
$statement = $db->prepare($query);
$statement->execute();
$results = $statement->fetchAll();
$statement->closeCursor();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Week 4 Todo List Application</title>
    <link rel="stylesheet" href = "main.css">
</head>

<body>
    <header>
        <h1>ToDo List</h1>
    </header>

    <section>
    <?php
        if (empty($results)) {
            echo "No to do list items exist yet.";
        }
    ?>
        <table>
            <?php foreach ($results as $result) : ?>
                <tr>
                    <td>    
                        <?php echo $result['Title']; ?>
                        <br>
                        <?php echo $result['Description']; ?>
                    </td>
                    <td><form action = "delete_task.php" method = "POST">
                        <input type = "hidden" name="num" value="<?php echo $result['ItemNum']; ?>">
                        <input type = "submit" value="X">
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>        
    </section>

    <section>
        <h2>Add Item</h2>
        <form action="add_task.php" method="POST">
            <label for = 'newtitle'>Title:</label>
            <input type = "text" id = 'newtitle' name ='newtitle'>
            <label for = 'newdes'>Description:</label>
            <input type = "text" id = 'newdes' name ='newdes'>
            <input type = "submit" value="Add Item">
        </form>
    </section>
</body>

</html>