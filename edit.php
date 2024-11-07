<?php
    include("connect.php");
    $id = $_GET['id'];
    if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    //GET METHOD
    //Gán dữ liệu vào các thẻ input
    if (!isset($_GET["id"])) {
    header("location: index.php");
    exit;
    }
    $sql = "SELECT * FROM dssv WHERE id='$id'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    if (!$row) {
    header("location: index.php");
    exit;
    }
    $fullname = $row["hovaten"];
    $gioitinh = $row["gioitinh"];
    $email = $row["email"];
    $SDT = $row["SDT"];
    } 
    else{
    //POST METHOD
    //Xử lý sửa dữ liệu khi người dùng nhấn nút Cập nhật
    $fullname = $_POST['fullname'];
    $gioitinh = $_POST['gioitinh'];
    $email = $_POST['email'];
    $SDT = $_POST['SDT'];
    $sql = "UPDATE dssv SET hovaten='$fullname', gioitinh='$gioitinh', 
    email='$email', SDT='$SDT' WHERE id='$id'";
    $result = $conn->query($sql);
    if(!$result){
    die("Lỗi kết nối: " . $conn->connect_error);
    }
    header("location: index.php");
    exit;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style.css">
    <title>Sửa</title>
</head>
<body>
    <div class="container">
        <h3 class="title">Sửa sinh viên</h3>
        <form method="post">
            <div>
                <label>Mã sinh viên</label>
                <input type="text" name="id" id="id" disabled value="<?php echo $id; ?>">
            </div>
            <div>
                <label for="fullname">Họ và tên</label>
                <input type="text" name="fullname" value="<?php echo $fullname; ?>">
            </div>
            <div>
                <label for=" email">Email</label>
                <input type="email" name="email" value="<?php echo $email; ?>">
            </div>
            <div>
                <label for="gioitinh">Giới tính</label>
                <input type="text" name="gioitinh" value="<?php echo $gioitinh; ?>">
            </div>
            <div>
                <label for="SDT">Điện thoại</label>
                <input type="text" name="SDT" value="<?php echo $SDT; ?>">
            </div>
            <input type="submit" name="submit" value="Cập nhật">
            <a href="index.php"><input type="button" value="Hủy" class="cancel"></a>
        </form>
    </div>
</body>
</html>
