<?php
// 只處理上傳的，不處理顯示的

echo $_POST['name'];
echo "<br>";
if (!empty($_FILES['img']['tmp_name'])) {
    echo $_FILES['img']['tmp_name'];
    echo "<br>";
    echo $_FILES['img']['name'];
    echo "<br>";
    echo $_FILES['img']['type'];
    echo "<br>";
    echo $_FILES['img']['size'];
    // 更改檔名，不會跟別人撞名，容納規範
    // 炸開黨名 年月日時間 隨機數字 .附檔名
    $tmp=explode(".",$_FILES['img']['name']);
    $subname=".".end($tmp);
    $filename=date("YmdHis").rand(10000,99999).$subname;
    move_uploaded_file($_FILES['img']['tmp_name'], "../imgs/" . $filename);
    // move_uploaded_file參數，從哪邊搬到哪邊
    // 從tmp搬到外面的img資料夾裡面

    // hearder("location:../upload.php?img=".$filename);
    // 如何顯示上傳的檔案，一次性顯示GET不用刪除，
    // SESSION/COOKIE還要刪除???
}else{
    header("location:../upload.php?err=上傳失敗");
}
