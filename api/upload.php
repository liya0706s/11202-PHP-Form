<?php
// api資料夾內的與資料庫有關
// upload只處理上傳的，不處理顯示的

// echo $_POST['name'];
// 輸出 POST 請求中的 'name' 參數的值，input type="text"
// echo "<br>";
// xampp/tmp資料夾，暫時存放臨時文件的地方
// 文件被上傳後，在服務端儲存的臨時文件名
// $_FILES['userfile']['tmp_name']
if (!empty($_FILES['img']['tmp_name'])) {
     
    // 輸出上傳的文件的臨時文件名
    // echo $_FILES['img']['tmp_name'];
    // echo "<br>";
    // echo $_FILES['img']['name'];
    // echo "<br>";
    // echo $_FILES['img']['type'];
    // echo "<br>";
    // echo $_FILES['img']['size'];

    // 更改檔名，不會跟別人撞名，容納規範
    $tmp=explode(".",$_FILES['img']['name']);
    // 以第一個參數點點做分割，explode()陣列
    // 炸開黨名 變成陣列中兩個元素 pic.jpg 
    $subname=".".end($tmp);
    // end($tmp) 函數用於取得陣列 $tmp 的最後一個元素
    $filename=date("YmdHis").rand(10000,99999).$subname;
    // rand()..生成一個介於 10000 和 99999 之間的隨機整數
    move_uploaded_file($_FILES['img']['tmp_name'], "../imgs/" . $filename);
    // move_uploaded_file 將上傳的新文件搬移到，參數，從哪邊搬到哪邊名字也要帶入確認不撞名
    // move_uploaded_file(file, dest)

    header("location:../manage.php");
    // header("location:../upload.php?img=".$filename);
    // api 傳值給前端upload顯示上傳的檔案
    // 一次性顯示GET比較快
    // cookie, session也可以 
    // 但這種一次性傳值session做完還需要unset; post在這邊不適用
    }else{
    header("location:../upload.php?err=上傳失敗");
}

// 假設 $_FILES['img']['name'] 的值是 "example_file.jpg"，
// 那麼 explode(".", $_FILES['img']['name']) 會產生以下的陣列：
// Array
// (
//     [0] => example_file
//     [1] => jpg
// )
// 陣列中的第一個元素是 "example_file"，第二個元素是 "jpg"。
// 這樣你就能夠從這個陣列中取得檔案的副檔名，而在這個例子中，副檔名是 "jpg"。