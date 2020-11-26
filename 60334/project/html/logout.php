<?php

function destroy_session_and_data()
{
session_start();
$_SESSION = array();
setcookie(session_name(), '', time() - 2592000, '/');
session_destroy();
header("Location: post_table.php");
}


$_SESSION['username'] = $email;
$_SESSION['password'] = $hashpwd;
$_SESSION['forename'] = $row[4];
$_SESSION['surname'] = $row[5];

destroy_session_and_data();


?>