<?php
$url = "type";
require_once 'header.php';
$log = $db->select('type');
if(isset($_GET['del'])){
    $where = array(
        'type_id' => $_GET['del'],
    );
    $delete = $db->delete('type', $where);
    if($delete){
        alert('ลบเรียบร้อย');
        redirect('type.php');
    }
}
?>
<body>
    <h2>ประเภทเเบบสำรวจ</h2>
    <a class="a-out" href="type_add.php">เพิ่มประเภทเเบบสำรวจ</a>
    <br>
    <br>
<div class="d-fixed">
    <?php
    foreach($log as $row){
    ?>
    <div class="box-fixed boxsm">
        <div class="form-content">


    <center>
    <p><b>ประเภท</b> <?php echo $row['type_name'] ?></p>
    </center>
    <div class="btn-between">
    <a href="type_edit.php?id=<?php echo $row['type_id'] ?>">เเก้ไข</a>
    <a href="?del=<?php echo $row['type_id'] ?>">ลบ</a>
    </div>
    </div>
    </div>
<?php } ?>
    </div>
</body>
</html>