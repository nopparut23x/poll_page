<?php
$url = "type";
require_once 'header.php';
$where = array(
    'type_id' => $_GET['id']
);
$log = $db->selectwhere('type', $where);
foreach($log as $row);
if(isset($_POST['type'])){
    $fields = array(
        'type_name' => $_POST['type'],
    );
    $log = $db->update('type', $fields, $where);
    if($log){
        alert('เเก้ไขประเภทเเบบสำรวจเรียบร้อย');
        redirect("type.php");
    }
}
?>
<body>
<div class="d-center">
        <div class="box-fixed boxset-form">
            <div class="form-style">
    <h2>เเก้ไขเเบบสอบสำรวจ</h2>
    <form  method="post" enctype="multipart/form-data">
    <p>ชื่อ</p>
    <input type="text" name="type" placeholder="ชื่อ" required value="<?php echo $row['type_name'] ?>">
    <br><br>
        <button type="submit">
        เเก้ไขประเภทเเบบสำรวจ
        </button>  
        <br>
    </form>
    </div>
        </div>
    </div>
</body>
</html>