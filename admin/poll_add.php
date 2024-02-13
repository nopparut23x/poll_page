<?php

$url = "poll";
require_once 'header.php';
if(isset($_POST['poll_name'])){
    if(!empty($_FILES['img']['name'])){
        $file = $db->upload($_FILES['img'], $path = 'assets/img');
    }
    $fields = array(
        'poll_name' => $_POST['poll_name'],
        'img' => $file,
        'type_id' => $_POST['type'],
        'age' => $_POST['age'],
        'sex' => $_POST['sexs'],
        'education' => $_POST['education'],
        'pro' => $_POST['pro'],
        'orher' => $_POST['orher'],
    );
    $log = $db->insert('poll', $fields);
    $id_insert = $db->db->insert_id;
    if($log){
        redirect("ask_add.php?id=$id_insert");
    }
}
$type = $db->select('type');
?>
<body>
<div class="d-center">
        <div class="box-fixed boxset-form">
            <div class="form-style">
    <h2>เพิ่มเเบบสอบสำรวจ</h2>
    <form  method="post" enctype="multipart/form-data">
        <center>
            <label for="img">รูปเเบบสำรวจ</label>
            <input type="file" name="img" required >
        </center>
    <p>ชื่อ</p>
    <input type="text" name="poll_name" placeholder="ชื่อ" required >
    <br>
    <label for="type">ประเภทเเบบสำรวจ</label>
    <select name="type">
     <?php
     foreach($type as $row){
        ?>
        <option value="<?php echo $row['type_id'] ?>"><?php echo $row['type_name'] ?></option>
     <?php }
     ?>
    </select>
        <br><br>
    <label for="sex">เพศ</label>
    <select id="sex" name="sexs" required>
        <option value="ชาย">ชาย</option>
        <option value="หญิง">หญิง</option>
        <option value="ทุกเพศ">ทุกเพศ</option>
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
<br>
<br>

        <button type="submit">
        เพิ่มเเบบสำรวจ
        </button>  
        <br>
    </form>
    </div>
        </div>
    </div>
</body>
</html>