<?php
require_once 'header.php';
if(isset($_POST['email'])){
    $password = MD5($_POST['password']);
    $where = array(
        'email' => $_POST['email'],
        'password' => $password
    );
    $log = $db->selectwhere('users', $where);
    if(!empty($log)){
        foreach($log as $row);
        $_SESSION['user_id'] = $row['user_id'];
        switch($row['status']){
            case"1":
                switch($row['usg_status']){
                    case"user":
                        alert('เข้าสู่ระบบผู้ใช้งาน');
                        redirect('../user');
                    break;
                    case"admin":
                        alert('เข้าสู่ระะบบผู้จัดการ');
                        redirect('../admin');
                    break;
                }
                break;
                case"0":
                    alert('บัญชีของคุณถูกระงับ');
                    redirect('login.php');
                    break;
        }
    }else{
        $where2 = array(
            'email' => $_POST['email'],
        );
        $log2 = $db->selectwhere('users',$where2);
        if(!empty($log2)){
            alert('อีเมลหรือรหัสผ่านไม่ถูกต้อง');
            redirect('login.php');
        }else{
            alert('ยังไม่มีบัญชีเข้าใช้งาน');
            redirect('login.php');
        }
    }
}
?>
<body>
<div class="d-center">
    <div class="box-fixed boxset-form">
        <div class="form-style">    
        <h2>เข้าสู่ระบบ</h2>
        <div class="img-profile">
            <img src="../icon\5556468.png" alt="" >
        </div>
    <form method="post">
        <p>อีเมล</p>
        <input type="email" name="email" required placeholder="อีเมล">
        <p>รหัสผ่าน</p>
        <input type="password" name="password" required placeholder="รหัสผ่าน">
        <br><br>
        <button type="submit">
            เข้าสู่ระบบ
        </button>
        <a href="register.php">ลงทะเบียน</a>
    </form>
        </div>
    </div>
</div>
</body>
</html>