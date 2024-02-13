<?php
$url = "poll";

require_once 'header.php';
$type = $db->select('type');

if(isset($_GET['filter'])){
    $poll_1 = array(
        'type_id' => $_GET['filter']
    );
    $log = $db->selectwhere('poll', $poll_1);
}else{
    $log = $db->select('poll');
}

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
    <div class="dropdown">
        <button>› › ประเภทเเบบสำรวจ ‹ ‹</button>
        <div class="dropdown-content">
        <a href="poll.php">ทั้งหมด</a>
        <?php foreach($type as $ty){ ?>
        <a href="?filter=<?php echo $ty['type_id'] ?>"><?php echo $ty['type_name'] ?></a>
        <?php } ?>
        </div>
    </div>
    <br>
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
        <div class="box-fixed boxsm">
        <div class="form-content">
    <div class="img-center">
    <center>
        <img src="<?php echo $row['img'] ?>" >
    </center>
    </div>
    <p><b>ชื่อ</b> <?php echo $row['poll_name'] ?></p>
    <p><b>ประเภทเเบบสำรวจ</b> <?php echo $row2['type_name'] ?> </p>
    <p><b>เพศ</b> <?php echo $row['sex'] ?> </p>
    <p><b>อาชีพ</b> <?php echo $row['orher'] ?> </p>
    <p><b>รายได้</b> <?php echo $row['pro'] ?> </p>
    <p><b>การศึกษา</b> <?php echo $row['education'] ?> </p>
    <p><b>ประเภทเเบบสำรวจ</b> <?php echo $row2['type_name'] ?> </p>
    <a href="report.php?id=<?php echo $row['poll_id'] ?>">ดูรายงานผลทำเเบบสำรวจ</a>
    <div class="btn-between">
    <a href="poll_edit.php?id=<?php echo $row['poll_id'] ?>">เเก้ไข</a>
    <a href="?del=<?php echo $row['poll_id'] ?>">ลบ</a>
    </div>
    </div>
    </div>

<?php } ?>
</div> 
</body>
</html>