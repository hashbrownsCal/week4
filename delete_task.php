<?php
$num = filter_input(INPUT_POST, 'num', FILTER_VALIDATE_INT);

require_once('database.php');
$query = 'DELETE FROM todoitems WHERE ItemNum = :num';
$statement = $db->prepare($query);
$statement->bindValue(':num', $num);
$success = $statement->execute();
$statement->closeCursor();

include('index.php');
?>