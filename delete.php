<?php
if(isset($_GET["id"])){
$id = $_GET["id"];
include "connect.php";
$sql = "DELETE FROM dssv WHERE id=$id";
$conn->query($sql);
header("location: index.php");
exit;
}
?>