<?php
$serverName = "localhost"; 
$userName = "root"; 
$pwd = ""; 
$nameDB = "dssv"; 

$conn = mysqli_connect($serverName, $userName, $pwd, $nameDB);

if ($conn === false){
    die("Kết nối thất bại: " . mysqli_connect_error()); 
}
echo "Kết nối thành công";
?>