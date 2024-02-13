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
if(isset($_POST['save'])){
    $fields = array(
        'poll_id' => $_SESSION['id'],
        'user_id' => $_SESSION['user_id'],
    );
    $insert = $db->insert('reserve', $fields);
   $insert_id = $db->db->insert_id;
   foreach($_POST['ans'] as $key => $value){
    $fields2 = array(
        'ans_id' => $value,
        'ask_id' => $key,
        're_id' => $insert_id,
        'poll_id' => $_SESSION['id'],
    );
    $insert2 = $db->insert('reserve_items', $fields2);

   }
   if($insert2){
    alert('ส่งเเบบสำรวจเรียบร้อย');
    redirect("report.php?id={$_SESSION['id']}");
}
}
?>
<body>

    <h2>เเบบสอบสำรวจ</h2>
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
<form method="post">
<p><b>คำถาม </b> <?php echo $row_ask['ask_name'] ?></p>
<br>
<?php foreach($log_ans as $key => $row_ans){ ?>
    <input type="radio" name="ans[<?php echo $row_ask['ask_id'] ?>]" id="ans<?php echo $row_ans['ans_id'] ?>" value="<?php echo $row_ans['ans_id'] ?>" required>
    <label for="ans<?php echo $row_ans['ans_id'] ?>"><?php echo $row_ans['ans_text'] ?></label>
<?php } ?>
</div>
<?php echo "</div>"; } ?>
<br><br>
</div>
<center>
<button class="btn" type="submit" name="save">
    ส่งเเบบสำรวจ
</button>
</center>
</form>

</body>
</html>