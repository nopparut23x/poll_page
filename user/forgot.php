<?php
$url = "profile";
require_once 'header.php';
$where = array(
    'user_id' => $_SESSION['user_id'],
);
$log = $db->selectwhere('users', $where);
foreach($log as $row);

if(isset($_POST['password_o'])){
    $password_o = MD5($_POST['password_o']);
    $password_n = MD5($_POST['password_n']);
    if($row['password'] == $password_o){
        if($_POST['password_n'] == $_POST['password_s']){
                $fields = array(
                    'password' => $password_n
                );
                $update = $db->update('users', $fields , $where);
                if($update){
                    alert('เเก้ไขรหัสผ่านเรียบร้อย');
                    redirect('profile.php');
                }
        }else{
            alert('รหัสผ่านยืนยันไม่ตรงกัน');
            redirect('forgot.php');
        }
    }else{
        alert('รหัสผ่านเดิมไม่ถูกต้อง');
        redirect('forgot.php');
    }
}     
?>
<body>
<div class="d-center">
        <div class="box-fixed boxset-form">
            <div class="form-style">
    <h2>เเก้ไขรหัสผ่าน</h2>
    <form  method="post" enctype="multipart/form-data">
  
    <p>รหัสผ่านเดิม</p>
    <input type="password" name="password_o" placeholder="รหัสผ่านเดิม" required >
    <p>รหัสผ่านใหม่</p>
    <input type="password" name="password_n" placeholder="รหัสผ่านใหม่" required >
    <p>รหัสผ่านยืนยัน</p>
    <input type="password" name="password_s" placeholder="รหัสผ่านยืนยัน" required >
<br><br>
<button type="submit">
    เเก้ไขรหัสผ่าน
</button>  
<br>
    </form>
    </div>
        </div>
    </div>
</body>
</html>