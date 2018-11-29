<?php
SESSION_START();
include_once '../config/database.php';

    $database = new database();
    $db = $database->connect();

    $a = $_POST["username"];
    $b = $_POST["pass"];

    $a = strtoupper($a);

    $query = "SELECT name, pass FROM emp WHERE name = '$a' AND pass = '$b'";
    $result = $db->query($query);

    if ($result -> num_rows > 0)
    {
        $_SESSION["username"]= $a;
        $db->close();
        echo "<script>location.href='../index.php';</script>";
    }
    else
    {
        $_SESSION["alert"]= "Error in Login";
        echo "<script>location.href='../index.php';</script>";
    }
?>