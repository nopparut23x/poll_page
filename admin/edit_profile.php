<?php
$url = "profile";
require_once 'header.php';
$where = array(
    'user_id' => $_SESSION['user_id'],
);
$log = $db->selectwhere('users', $where);
foreach($log as $row);

if(isset($_POST['fname'])){
        if(!empty($_FILES['img']['name'])){
            $file = $db->upload($_FILES['img'], $path = 'assets/img');
    }else{
        $file = $row['profile'];
    }
    $fields = array(
        'fname' => $_POST['fname'],
        'lname' => $_POST['lname'],
        'email' => $_POST['email'],
        'profile' => $file,
    );
    $update = $db->update('users', $fields, $where);
    if($update){
        alert('เเก้ไขข้อมูลส่วนตัวเรียบร้อย');
        redirect('profile.php');
    }
     }
     
?>
<body>
    <div class="d-center">
        <div class="box-fixed boxset-form">
            <div class="form-profile">
            <h2>เเก้ไขข้อมูลส่วนตัว</h2>
    <form  method="post" enctype="multipart/form-data">
        <center>
            <label for="img">โปรไฟล์</label>
            <input type="file" name="img" >
        </center>
    <p>ชื่อ</p>
    <input type="text" name="fname" placeholder="ชื่อ" required value="<?php echo $row['fname'] ?>">
    <p>นามสกุล</p>
    <input type="text" name="lname" placeholder="นามสกุล" required value="<?php echo $row['lname'] ?>">
    <p>อีเมล</p>
    <input type="email" name="email" placeholder="อีเมล" required value="<?php echo $row['email'] ?>">
<br><br>
<button type="submit">
    เเก้ไขข้อมูลส่วนตัว
</button>  
<br>
    </form>
            </div>
        </div>
    </div>
</body>
</html>