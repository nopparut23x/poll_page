<?php
$url = "poll";

require_once 'header.php';
$user_where = array(
    'user_id' => $_SESSION['user_id'],
);
$log_user = $db->selectwhere('users', $user_where);
foreach($log_user as $row_user);


if(isset($_GET['filter'])){
    $poll_1 = array(
        'type_id' => $_GET['filter']
    );
    $log = $db->selectwhere('poll', $poll_1);
}else{
    $sql_l = "SELECT * FROM poll WHERE age = '{$row_user['age']}' OR age = '{$row_user['age']}' OR sex = '{$row_user['sex']}' OR education = '{$row_user['education']}' OR pro = '{$row_user['pro']}' OR orher = '{$row_user['orher']}'";
    $log  = mysqli_query($db->db,$sql_l);

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
$type = $db->select('type');
?>
<body>
    <h2>เเบบสำรวจ</h2>
    <div class="dropdown">
        <button>ประเภทเเบบสำรวจ</button>
        <div class="dropdown-content">
        <a href="poll.php">ทั้งหมด</a>
        <?php foreach($type as $ty){ ?>
        <a href="?filter=<?php echo $ty['type_id'] ?>"><?php echo $ty['type_name'] ?></a>
        <?php } ?>
        </div>
    </div>
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
            <div class="box-fixed boxsm" style="width:450px">
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
    <p><b>ช่วงอายุ</b> <?php echo $row['age'] ?> </p>
    <p><b>ประเภทเเบบสำรวจ</b> <?php echo $row2['type_name'] ?> </p>
    <a href="do.php?id=<?php echo $row['poll_id'] ?>">ทำเเบบสำรวจ</a>
    </div>
        </div>
<?php } ?>

    </div>
</body>
</html>