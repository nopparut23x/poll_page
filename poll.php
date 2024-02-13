<?php
$url = "poll";

require_once 'header.php';
$log = $db->select('poll');
if(isset($_GET['del'])){
    $where = array(
        'poll_id' => $_GET['del'],
    );
    $delete = $db->delete('poll', $where);
    if($delete){
        alert('ลบเรียบร้อย');
        redirect('poll.php');
    }
}
?>
<body>
    <h2>เเบบสำรวจ</h2>
    <a class="a-out" href="poll_add.php">เพิ่มเเบบสำรวจ</a>
    <br>
    <br>
<div class="d-fixed">
    <?php
    foreach($log as $row){
        $where = array(
            'type_id' => $row['type_id']
        );
        $log2 = $db->selectwhere('type', $where);
        foreach($log2 as $row2);
    ?>
    <div class="box-fixed">
        <div class="form-content">
    <div class="img-center">
    <center>
        <img src="<?php echo $row['img'] ?>" >
    </center>
    </div>
    <p><b>ชื่อ</b> <?php echo $row['poll_name'] ?></p>
    <p><b>ประเภทเเบบสำรวจ</b> <?php echo $row2['type_name'] ?> </p>

    <a href="poll_edit.php?id=<?php echo $row['poll_id'] ?>">เเก้ไข</a>
    <a href="?del=<?php echo $row['poll_id'] ?>">ลบ</a>
    </div>
    </div>
<?php } ?>
</div>
</body>
</html>