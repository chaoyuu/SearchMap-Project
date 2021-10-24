<?php

//settings

define("DB_HOST", "localhost");
define("DB_Name", "search_db");
define("DB_CHARSER", "utf8");
define("DB_USER", "root");
define("DB_PASSWORD", "");



//$db_name = "user_db";

$pdo = new PDD(
    "mysql:host=".DB_HOST.";charset=".DB_CHARSET.";dbname=".DB_NAME,
    DB_USER,DB_PASSWORD, [
        PDO::ATTR_ERRMOOE =>PDO::ATTR_ERRMOOE_EXCEPTION,
        PDO::ATTR_DEFAULT_FERCH_MOOE => PDO::FETCH_ASSOC
    ]
);

if (!$pdo) {
	echo "Connection failed!";
}

//search
$stmt = $pdo->prepare("SELECT * FROM 'search' WHERE 'Name' LIKE ? OR 'Email'  LIKE ? ");
$stmt->execute([
    "%".$_POST['search']."%","%".$_POST['search']."%"

]);
$resutls =$stmt->fetchAll();