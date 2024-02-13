<?php
$url = "poll";
require_once 'header.php';
$status = 0;

if(isset($_POST['save'])){
    if(isset($_POST['ask'])){
        $fields = array(
            'ask_name' => $_POST['ask'],
            'poll_id' => $_GET['id'],
        );
        $insert = $db->insert('ask', $fields);
        $insert_id = $db->db->insert_id;
        $_SESSION['id'] = $insert_id;
        $_SESSION['ask_name'] = $_POST['ask'];
     }
     $status = 1;
     if(isset($_POST['ans'])){
        $fields_ans = array(
            'ans_text' => $_POST['ans'],
            'poll_id' => $_GET['id'],
            'ask_id' => $_SESSION['id'],
        );
        $insert_ans = $db->insert('ans', $fields_ans);
     }
}
?>
<body>
<div class="d-center">
        <div class="box-fixed boxset-form">
            <div class="form-style">
    <h2>เพิ่มคำถามเเละคำตอบ</h2>
    <form method="post">
        <?php echo $status == 1?"<a href='ask_add.php?id={$_GET['id']}'>เพิ่มคำถาม</a>":""; ?>
        <p>คำถาม</p>
        <input type="text" name="ask<?php echo $status == 1?"disabled":""; ?>" <?php echo $status == 1?"disabled":" required"; ?>   placeholder="คำถาม"  <?php echo $status == 1?"value='{$_SESSION['ask_name']}'":""; ?>>
        <p>คำตอบ</p>
        <input type="text" name="ans" required placeholder="คำตอบ">
        <br><br>
        <button type="submit" name="save">
            เพิ่ม
        </button>
        <?php echo $status == 1?"<a href='poll.php'>เสร็จสิ้น</a>":""; ?>
    </form>
    </div>
        </div>
    </div>
</body>
</html>