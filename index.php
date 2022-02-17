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
        if (!empty($results)) {
            echo "No to do list items exist yet.";
        }
        else { ?>
        <table>
            <?php foreach ($results as $result) : ?>
                <tr>
                    <td><?php echo $result['Title']; ?></td>
                    <td><?php echo $result['Description']; ?></td>
                </tr>
        </table>        
    <?php
        }
    ?>
    </section>

    <section>
        <h2>Add Item</h2>
        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
            <label for = 'newtitle'>Title:</label>
            <input type = "text" id = 'newtitle' name ='newtitle' required>
            <label for = 'newdes'>Description:</label>
            <input type = "text" id = 'newdes' name ='newdes' required>
            <button>Add Item</button>
        </form>
    </section>
</body>

</html>