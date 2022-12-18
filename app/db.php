<?php
    $cleardb_url = parse_url(getenv("mysql://b8239eb638aaff:9ea7a2ac@us-cdbr-east-06.cleardb.net/heroku_3aaeb78f9450d07?reconnect=true"));
    $cleardb_server = $cleardb_url["us-cdbr-east-06.cleardb.net"];
    $cleardb_username = $cleardb_url["b8239eb638aaff"];
    $cleardb_password = $cleardb_url["9ea7a2ac"];
    $cleardb_db = substr($cleardb_url["mysql://b8239eb638aaff:9ea7a2ac@us-cdbr-east-06.cleardb.net/heroku_3aaeb78f9450d07?reconnect=true"],1);
    $active_group = 'default';
    $query_builder = TRUE;

    $conn = mysqli_connect($cleardb_server, $cleardb_username, $cleardb_password, $cleardb_db);

if(!$connection) {
    die("Database connection failed");
}
$q = "SET SQL_MODE = 'NO_AUTO_VALUE_ON_ZERO'";
$connection -> query($q);

?>
