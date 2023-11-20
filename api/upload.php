<?php
// api資料夾內的與資料庫有關
// upload只處理上傳的，不處理顯示的


echo $_POST['name'];
// 輸出 POST 請求中的 'name' 參數的值，type=text

echo "<br>";
// xampp/tmp資料夾，暫時存放臨時文件的地方
// 文件被上傳後，在服務端儲存的臨時文件名
// $_FILES['userfile']['tmp_name']
if (!empty($_FILES['img']['tmp_name'])) {
     
    // 輸出上傳的文件的臨時文件名
    echo $_FILES['img']['tmp_name'];
    echo "<br>";
    // 輸出上傳的文件的原始文件名
    echo $_FILES['img']['name'];
    echo "<br>";
    // 輸出上傳的文件的類型
    echo $_FILES['img']['type'];
    echo "<br>";
     // 輸出上傳的文件的大小
    echo $_FILES['img']['size'];
    // 更改檔名，不會跟別人撞名，容納規範
    // 炸開黨名 年月日時間 隨機數字 .附檔名
    $tmp=explode(".",$_FILES['img']['name']);
    // 以第一個參數做分割，img檔名
    $subname=".".end($tmp);
    $filename=date("YmdHis").rand(10000,99999).$subname;
    // rand()..生成一個介於 10000 和 99999 之間的隨機整數
    move_uploaded_file($_FILES['img']['tmp_name'], "../imgs/" . $filename);
    // move_uploaded_file 將上傳的新文件搬移到，參數，從哪邊搬到哪邊
    // 從tmp搬到 外面的img資料夾裡面

    header("location:../upload.php?img=".$filename);
    // api 傳值給前端upload顯示上傳的檔案
    // 一次性顯示GET比較快
    // cookie, session也可以 
    // 但這種一次性傳值session做完還需要unset; post在這邊不適用
    }else{
    header("location:../upload.php?err=上傳失敗");
}
