<?php
$ini = parse_ini_file('config.ini');
$host = $ini['mysql.host'];
$user = $ini['mysql.user'];
$pass = $ini['mysql.pass'];
$db = $ini['mysql.db'];
$port = $ini['mysql.port'];
function getConnection(){
    $link = mysqli_connect($host, $user, $pass, $db, $port);
    return $link;
}

function close($link){
    return mysqli_close($link);
}
?>