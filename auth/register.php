<?php
require_once 'header.php';

if(isset($_POST['email'])){
    $where = array(
        'email' => $_POST['email']
    );
    $log5 = $db->selectwhere('users', $where);
    if(!empty($log5)){
        alert('อีเมลนี้ถูกใช้งานเเล้ว');
        redirect('register.php');
    }else{
    $password = MD5($_POST['password']);
        if(!empty($_FILES['img']['name'])){
            $file = $db->upload($_FILES['img'], $path = 'assets/img');
    }
    $fields = array(
        'fname' => $_POST['fname'],
        'lname' => $_POST['lname'],
        'email' => $_POST['email'],
        'password' => $password,
        'usg_status' => 'user',
        'status' => 1,
        'profile' => $file,
        'age' => $_POST['age'],
        'sex' => $_POST['sexs'],
        'education' => $_POST['education'],
        'pro' => $_POST['pro'],
        'orher' => $_POST['orher'],
    );
    $insert = $db->insert('users', $fields);
    if($insert){
        alert('ลงทะเบียนเรียบร้อย');
        redirect('login.php');
    }
     }
     
}
?>
<body>
    <div class="d-center">
        <div class="box-fixed boxset-form">
            <div class="form-register">
            <h2>ลงทะเบียนเข้าใช้งาน</h2>
    <form  method="post" enctype="multipart/form-data">
    <div class="img-profile">
            <img src="../icon\5556468.png" alt="" style="width:200px; height:200px;">
        </div>
        <br>
        <center>
            <label for="img"><strong>อัพโหลดรูปโปรไฟล์</strong></label>
            <input type="file" name="img" required>
        </center>
    <p>ชื่อ</p>
    <input type="text" name="fname" placeholder="ชื่อ" required>
    <p>นามสกุล</p>
    <input type="text" name="lname" placeholder="นามสกุล" required>
    <p>อีเมล</p>
    <input type="email" name="email" placeholder="อีเมล" required>
    <p>รหัสผ่าน</p>
    <input type="password" name="password" placeholder="รหัสผ่าน" required>
    <br><br>
    <label for="sex">เพศ</label>
    <select id="sex" name="sexs" required>
        <option value="ชาย">ชาย</option>
        <option value="หญิง">หญิง</option>
        <option value="อื่นๆ">อื่นๆ</option>
    </select>
    <br><br>
    <label for="edu">การศึกษา</label>
    <select id="edu" name="education" required>
    <option value="ม.3">ม.3</option>
    <option value="ม.6">ม.6</option>
    <option value="ปวช.">ปวช.</option>
    <option value="ปวส.">ปวส.</option>
    <option value="ป.ตรี">ป.ตรี</option>
    <option value="ป.โท">ป.โท</option>
    <option value="ป.เอก">ป.เอก</option>
    </select>
    <br><br>
    <label for="age_">ช่วงอายุ</label>
    <select id="age_" name="age" required>
    <option value="ต่ำกว่า 18 ปี">ต่ำกว่า 18 ปี</option>
    <option value="20ปีถึง30ปี">20ปี ถึง 30ปี</option>
    <option value="30ปีถึง40ปี">30ปี ถึง 40ปี</option>
    <option value="50ปีถึง60ปี">50ปี ถึง 60ปี</option>
    <option value="มากกว่า 60ปี">มากกว่า 60ปี</option>
    </select>
    <br><br>
    <label for="or">อาชีพ</label>
    <select id="or" name="orher" required>
    <option value="รับราชการ">รับราชการ</option>
    <option value="นักศึกษา">นักศึกษา</option>
    <option value="ช่างยนตร์">ช่างยนตร์</option>
    <option value="หมอ">หมอ</option>
    <option value="นักโปรเเกรมเมอร์">นักโปรเเกรมเมอร์</option>
    </select>
    <br><br>
    <label for="pro">รายได้</label>
    <select id="pro" name="pro" required>
    <option value="ต่ำกว่า 10000 บาท ต่อเดือน">ต่ำกว่า 10000บาท ต่อเดือน</option>
    <option value="ต่ำกว่า 10000 บาท ต่อเดือน">10000 บาท ต่อเดือน</option>
    <option value="ต่ำกว่า 12000 บาท ต่อเดือน">12000 บาท ต่อเดือน</option>
    <option value="ต่ำกว่า 15000 บาท ต่อเดือน">15000 บาท ต่อเดือน</option>
    <option value="ต่ำกว่า 18000 บาท ต่อเดือน">18000 บาท ต่อเดือน</option>
    <option value="ต่ำกว่า 30000 บาท ต่อเดือน">มากกว่า 30000 บาท ต่อเดือน</option>
    </select>
<br><br>
<button type="submit">
    ลงทะเบียน
</button>  

<a href="login.php">เข้าสู่ระบบ</a>
    </form>
            </div>
        </div>
    </div>
</body>
</html>