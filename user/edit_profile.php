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
        'age' => $_POST['age'],
        'sex' => $_POST['sexs'],
        'education' => $_POST['education'],
        'pro' => $_POST['pro'],
        'orher' => $_POST['orher'],
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

    <label for="sex">เพศ</label>
    <select id="sex" name="sexs" required>
        <option value="ชาย" <?php echo $row['sex'] == 'ชาย'?"selected":""; ?>>ชาย</option>
        <option value="หญิง" <?php echo $row['sex'] == 'หญิง'?"selected":""; ?>>หญิง</option>
        <option value="อื่นๆ"  <?php echo $row['sex'] == 'อื่นๆ'?"selected":""; ?>>อื่นๆ</option>
    </select>
    <br><br>
    <label for="edu">การศึกษา</label>
    <select id="edu" name="education" required>
    <option value="ม.3" <?php echo $row['education'] == 'ม.3'?"selected":""; ?>>ม.3</option>
    <option value="ม.6" <?php echo $row['education'] == 'ม.6'?"selected":""; ?>>ม.6</option>
    <option value="ปวช." <?php echo $row['education'] == 'ปวช.'?"selected":""; ?>>ปวช.</option>
    <option value="ปวส." <?php echo $row['education'] == 'ปวส.'?"selected":""; ?>>ปวส.</option>
    <option value="ป.ตรี" <?php echo $row['education'] == 'ป.ตรี'?"selected":""; ?>>ป.ตรี</option>
    <option value="ป.โท" <?php echo $row['education'] == 'ป.โท'?"selected":""; ?>>ป.โท</option>
    <option value="ป.เอก" <?php echo $row['education'] == 'ป.เอก'?"selected":""; ?>>ป.เอก</option>
    </select>
    <br><br>
    <label for="age_">ช่วงอายุ</label>
    <select id="age_" name="age" required>
    <option value="ต่ำกว่า 18 ปี"  <?php echo $row['age'] == 'ต่ำกว่า 18 ปี'?"selected":""; ?>>ต่ำกว่า 18 ปี</option>
    <option value="20ปี ถึ ง30ปี" <?php echo $row['age'] == '20ปี ถึง 30ปี'?"selected":""; ?>>20ปี ถึง 30ปี</option>
    <option value="30ปี ถึง 40ปี" <?php echo $row['age'] == '30ปี ถึง 40ปี'?"selected":""; ?> >30ปี ถึง 40ปี</option>
    <option value="50 ปีถึง 60ปี" <?php echo $row['age'] == '50ปี ถึง 60ปี'?"selected":""; ?> >50ปี ถึง 60ปี</option>
    <option value="มากกว่า 60ปี" <?php echo $row['age'] == 'มากกว่า 60ปี'?"selected":""; ?> >มากกว่า 60ปี</option>
    </select>
    <br><br>
    <label for="or">อาชีพ</label>
    <select id="or" name="orher" required>
    <option value="รับราชการ"<?php echo $row['orher'] == 'รับราชการ'?"selected":""; ?>>รับราชการ</option>
    <option value="นักศึกษา"<?php echo $row['orher'] == 'นักศึกษา'?"selected":""; ?>>นักศึกษา</option>
    <option value="ช่างยนตร์" <?php echo $row['orher'] == 'ช่างยนตร์'?"selected":""; ?>>ช่างยนตร์</option>
    <option value="หมอ" <?php echo $row['orher'] == 'หมอ'?"selected":""; ?>>หมอ</option>
    <option value="นักโปรเเกรมเมอร์" <?php echo $row['orher'] == 'นักโปรเเกรมเมอร์'?"selected":""; ?>>นักโปรเเกรมเมอร์</option>
    </select>
    <br><br>
    <label for="pro">รายได้</label>
    <select id="pro" name="pro" required>
    <option value="ต่ำกว่า 10000 บาท ต่อเดือน" <?php echo $row['pro'] == 'ต่ำกว่า 10000 บาท ต่อเดือน'?"selected":""; ?>>ต่ำกว่า 10000บาท ต่อเดือน</option>
    <option value="10000 บาท ต่อเดือน" <?php echo $row['pro'] == '10000 บาท ต่อเดือน'?"selected":""; ?>>10000 บาท ต่อเดือน</option>
    <option value="12000 บาท ต่อเดือน" <?php echo $row['pro'] == '12000 บาท ต่อเดือน'?"selected":""; ?>>12000 บาท ต่อเดือน</option>
    <option value="15000 บาท ต่อเดือน" <?php echo $row['pro'] == '15000 บาท ต่อเดือน'?"selected":""; ?>>15000 บาท ต่อเดือน</option>
    <option value="18000 บาท ต่อเดือน" <?php echo $row['pro'] == '18000 บาท ต่อเดือน'?"selected":""; ?>>18000 บาท ต่อเดือน</option>
    <option value="มากกว่า 30000 บาท ต่อเดือน" <?php echo $row['pro'] == '15000 บาท ต่อเดือน'?"selected":""; ?>>มากกว่า 30000 บาท ต่อเดือน</option>
    </select>
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