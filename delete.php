<?php
if(isset($_GET["kitap_id"])){
    $kitap_id = $_GET["kitap_id"];

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "library_registrationdb";

    $connect = new mysqli($servername, $username, $password, $dbname); //create connection

    $sql = "DELETE FROM kitapkaydıtablo WHERE kitap_id=$kitap_id";
    $result = $connect->query($sql);
}

header("location: index.php");
exit;

?>
