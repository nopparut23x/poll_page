<?php
$url = "poll";
require_once 'header.php'; 
$id = $_GET['id'];
$sql = "SELECT COUNT(*) AS count FROM reserve WHERE poll_id = $id ";
$result = mysqli_query($db->db,$sql);
foreach($result as $row);
$where = array(
    'poll_id' => $_GET['id']
);
$log = $db->selectwhere('poll', $where);
foreach($log as $row2);
$log_ask = $db->selectwhere('ask', $where);
if(isset($_GET['reset'])){
    $where_de = array(
        'poll_id' => $_GET['reset']
    );
    $delete = $db->delete('reserve', $where_de);
    $delete2 = $db->delete('reserve_items', $where_de);
    if($delete){
        alert('คืนค่าเรียบร้อย');
        redirect("report.php?id={$_GET['reset']}");
    }
}

?>
<body>
    <center>
        <img src="<?php echo $row2['img'] ?>" alt="" style="width:512px; height:512px;">
    </center>
    <h2>ทำเเบบสำรวจทั้งหมด <?php echo $row['count'] ?> คน</h2>
    <center>
    <p><b>(<?php echo $row2['poll_name'] ?>)</b> </p>
    </center>
    <br>
<br><br>
    <div class="d-fixed">
    

    <?php
foreach($log_ask as $row_ask){
    $where_ans = array(
        'ask_id' => $row_ask['ask_id']
    );
    $log_ans = $db->selectwhere('ans', $where_ans);

    
?>
<div class="box-fixed boxsm">
    <div class="form-report">


<center>
<b><p>คำถาม <?php echo $row_ask['ask_name'] ?> </p></b>
<br>
</center>
<?php foreach($log_ans as $row_ans){ 
        $sql2 = "SELECT COUNT(*) as sum_count FROM reserve_items WHERE ans_id = {$row_ans['ans_id']}";
        $result2 = mysqli_query($db->db, $sql2);
        foreach($result2 as $sum);
     if($sum['sum_count'] == 0){
        $total_cut = 0;
     }else{
        $total = $sum['sum_count'] / $row['count'] * 100;
        $total_cut = round($total, 2);
     }
  
    ?>
<p><b>คำตอบ </b><?php echo $row_ans['ans_text'] ?> จำนวนการตอบ <?php echo $sum['sum_count'] ?> คน สรุปเป็นเปอเซ็น <b><?php  echo $total_cut."%"?></b>  </p>
<?php } ?>
<br>

    </div>
</div>
<br>
<?php } echo "</div>"; ?>
</body>
</html>