<?php
$url = "poll";

require_once 'header.php';
if(!empty($_GET['id'])){
    $_SESSION['id'] =  $_GET['id'];
}
$where_edit = array(
    'poll_id' =>  $_SESSION['id']
);
$log_edit = $db->selectwhere('poll', $where_edit);
foreach($log_edit as $row);

$log_ask = $db->selectwhere('ask', $where_edit);
$where_e = array(
    'type_id' => $row['type_id']
);
$log_e = $db->selectwhere('type', $where_e);
foreach($log_e as $row_e);
if(isset($_POST['poll_name'])){
    if(!empty($_FILES['img']['name'])){
        $file = $db->upload($_FILES['img'], $path = 'assets/img');
    }else{
        $file = $row['img'];
    }
    $fields = array(
        'poll_name' => $_POST['poll_name'],
        'img' => $file,
        'type_id' => $_POST['type'],
    );
    $log = $db->update('poll',$fields,$where_edit);
    if($log){
        alert('เเก้ไขเรียบร้อย');
        redirect("poll.php");
    }
}
$log2 = $db->select('type');
if(isset($_GET['del_ans'])){
    $where_d = array(
        'ans_id' => $_GET['del_ans']
    );
    $delete = $db->delete('ans', $where_d);
    if($delete){
        alert('ลบเรียบร้อย');
        redirect("poll_edit.php?id={$_SESSION['id']}");
    }
}
if(isset($_GET['del_ask'])){
    $where_d = array(
        'ask_id' => $_GET['del_ask']
    );
    $delete = $db->delete('ask', $where_d);
    $delete = $db->delete('ans', $where_d);
    if($delete){
        alert('ลบเรียบร้อย');
        redirect("poll_edit.php?id={$_SESSION['id']}");
    }
}

?>
<body>
<div class="d-fixed jcc">
        <div class="box-fixed boxset-form">
            <div class="form-style">
    <h2>เเก้ไขเเบบสอบสำรวจ</h2>
    <form  method="post" enctype="multipart/form-data">
        <center>
            <label for="img">รูปเเบบสำรวจ</label>
            <input type="file" name="img"  >
        </center>
    <p>ชื่อ</p>
    <input type="text" name="poll_name" placeholder="ชื่อ" required value="<?php echo $row['poll_name'] ?>">
    <br>
    <label for="type">ประเภทเเบบสำรวจ</label>
    <select name="type">
<option value="<?php echo $row_e['type_id'] ?>"><?php echo $row_e['type_name'] ?></option>
<?php
foreach($log2 as $row2){
    if($row_e['type_id'] == $row2['type_id']){}else{
?>
<option value="<?php echo $row2['type_id'] ?>"><?php echo $row2['type_name'] ?></option>
<?php } }?>
    </select>
        <br><br>
        <button type="submit">
        เเก้ไขเเบบสำรวจ
        </button>  
        <br>
    </form>
    </div>
        </div>
    </div>
<br>
    <hr>
<h2>คำถามเเละคำตอบ</h2>
<a class="a-out" href="ask_add.php?id=<?php echo $_SESSION['id'] ?>">เพิ่มคำถามเเละคำตอบ</a>
<br>
<br>
<div class="d-fixed">
<?php
foreach($log_ask as $row_ask){
    $where_ans = array(
        'ask_id' => $row_ask['ask_id']
    );
    $log_ans = $db->selectwhere('ans', $where_ans);
    
?>
<div class="box-fixed" style="width:100%;">
    <div class="form-report">
<center>
<p><b>คำถาม </b><?php echo $row_ask['ask_name'] ?> <a href="?del_ask=<?php echo $row_ask['ask_id'] ?>">›ลบคำถาม‹</a></p>
<br>
</center>
<?php foreach($log_ans as $row_ans){ ?>
<p><b>คำตอบ </b><?php echo $row_ans['ans_text'] ?> <a href="?del_ans=<?php echo $row_ans['ans_id'] ?>">›ลบคำตอบ‹</a></p>

<?php } ?>
</div>
<?php echo "</div>"; } ?>
</div>
</body>
</html>