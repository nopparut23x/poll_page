<?php
$url = "type";
require_once 'header.php';
if(isset($_POST['type'])){
    $fields = array(
        'type_name' => $_POST['type'],
    );
    $log = $db->insert('type', $fields);
    $id_insert = $db->db->insert_id;
    if($log){
        alert('เพิ่มประเภทเเบบสำรวจเรียบร้อย');
        redirect("type.php");
    }
}
?>
<body>
<div class="d-center">
        <div class="box-fixed boxset-form">
            <div class="form-style">
    <h2>เพิ่มเเบบสอบสำรวจ</h2>
    <form  method="post" enctype="multipart/form-data">
    <p>ชื่อ</p>
    <input type="text" name="type" placeholder="ชื่อ" required >
    <br><br>
        <button type="submit">
        เพิ่มประเภทเเบบสำรวจ
        </button>  
        <br>
    </form>
    </div>
        </div>
    </div>
</body>
</html>