<?php
$title = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_STRING);
$des = filter_input(INPUT_POST, 'des', FILTER_SANITIZE_STRING);

require_once('database.php');
$query = 'DELETE FROM todoitems WHERE Title = :title, Description = :des';
$statement = $db->prepare($query);
$statement->bindValue(':title', $title);
$statement->bindValue(':des', $des);
$success = $statement->execute();
$statement->closeCursor();

include('index.php');
?>