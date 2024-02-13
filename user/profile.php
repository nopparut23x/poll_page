<?php
$url = "profile";
require_once 'header.php';
$where = array(
    'user_id' => $_SESSION['user_id'],
);
$log = $db->selectwhere('users', $where);
foreach($log as $row);
?>
<body>
<div class="d-center">
        <div class="box-fixed boxset-form">
            <div class="form-profile">
    <h2>ข้อมูลส่วนตัว</h2>
    <div class="img-profile">
    <center>
        <img src="<?php echo $row['profile'] ?>" >
    </center>
    </div>
    <p><b>ชื่อ : </b><?php echo $row['fname'] ?></p>
    <p><b>นามสกุล : </b><?php echo $row['lname'] ?></p>
    <p><b>อีเมล : </b><?php echo $row['email'] ?></p>
    <p><b>เพศ : </b><?php echo $row['sex']; ?></p>
    <p><b>การศึกษา : </b><?php echo $row['education']; ?></p>
    <p><b>รายได้ : </b><?php echo $row['pro']; ?></p>
    <p><b>อาชีพ : </b><?php echo $row['orher']; ?></p>
    <p><b>ช่วงอายุ : </b><?php echo $row['age']; ?></p>
    <a href="edit_profile.php">เเก้ไขข้อมูลส่วนตัว</a>
    <a href="forgot.php">เเก้ไขรหัสผ่าน</a>
    </div>
        </div>
    </div>
</body>


</html>

