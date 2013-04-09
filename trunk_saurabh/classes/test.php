<?php
ini_set('display_erros','1');
require_once 'PDOConnect.class.php';

$db = DBConnection::connect();
$db->insert("users","email, password","ashwani@ashwani.com , ashwani@321");
  


?>
