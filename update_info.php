<?php include "dbconnect.php"; ?>
<?php
var_dump($_POST);
$useremail = $_POST['useremail'];
$phone = $_POST['phone'];
$addr = $_POST['addr'];
$postal = $_POST['postal'];

$sql = "UPDATE `project_user` SET `phone` = '$phone', `addr` = '$addr', `postal` = '$postal' 
        WHERE `project_user`.`email` = '$useremail';";
$result = $db->query($sql);
?>
<?php
header("Location: login.php");
?>