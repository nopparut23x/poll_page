<?php
if(empty($_SESSION['user_id'])){
    header("Location:../");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="config/style.css">
</head>
<body>
    <div class="sidebar">
        <h2>ระบบเเบบสำรวจออนไลน์</h2>
        <h4>วิทยาลัยเทคนิคชัยภูมิ</h4>
        <ul>
            <li><a class="<?php echo $url == 'profile' ?"active":""; ?>" href="profile.php"><img src="" alt="">&nbsp;<span>ข้อมูลส่วนตัว</span></a></li>
            <li><a class="<?php echo $url == 'type' ?"active":""; ?>" href="type.php"><img src="" alt="">&nbsp;<span>ประเภทเเบบสำรวจ</span></a></li>
            <li><a class="<?php echo $url == 'poll' ?"active":""; ?>" href="poll.php"><img src="" alt="">&nbsp;<span>เเบบสำรวจ</span></a></li>
            <li><a class="btn-logout" href="logout.php" onclick="return confirm('คุณต้องการออกจากระบบ')"><img src="" alt="">&nbsp;<span>ออกจากระบบ</span></a></li>
             
        </ul>
    </div>
</body>
</html>