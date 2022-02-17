<?php
$newtitle = filter_input(INPUT_POST, 'newtitle', FILTER_SANITIZE_STRING);
$newdes = filter_input(INPUT_POST, 'newdes', FILTER_SANITIZE_STRING);

require_once('database.php');
$query = 'INSERT INTO todoitems (Title, Description)
VALUES (:newtitle, :newdes)';
$statement = $db->prepare($query);
$statement->bindValue(':newtitle',$newtitle);
$statement->bindValue(':newdes',$newdes);
$statement->execute();
$statement->closeCursor();

include('index.php');
?>