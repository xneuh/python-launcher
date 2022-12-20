<?php
    $server = "localhost";
    $username = "root";
    $password = "";
    $dbName = "license";
    $conn = mysqli_connect($server, $username, $password, $dbName);

    $key = $_GET["key"];
    $type = $_GET["type"];
    $hwid = $_GET["hwid"];

    if ($type == "CheckLicense") {
        $sql = "SELECT `key`, hwid FROM licenses WHERE `key` = '$key'";
        $res = $conn->query($sql);
    
        if ($res->num_rows > 0) {
            $row = $res->fetch_assoc();
            if($row["hwid"] == $hwid) {
                echo($row["hwid"]);
            } else {
                if($row["hwid"] == "None") {
                    $sqlKey = "UPDATE licenses SET hwid = '$hwid' WHERE `key` = '$key'";
                    $keyRes = $conn->query($sqlKey);
                    echo("Successfully Binded Key to your HWID");
                }else {
                    echo("Key is not binded to your HWID");
                }
            }
        } else {
            echo("Key is incorrect");
        }
    }
?>