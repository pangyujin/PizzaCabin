<?php
@$db = new mysqli('localhost','f34ee','f34ee','f34ee');

if ($db->connect_error){
	echo "Database is not online"; 
	exit;
}

if (!$db->select_db ("f34ee")) {
  exit("<p>Unable to locate the f34ee database</p>");
}
?>