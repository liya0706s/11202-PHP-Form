<?php
// api資料夾內的與資料庫有關
// upload只處理上傳的，不處理顯示的
include_once "../db.php";

// echo $_POST['desc'];
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
    $tmp = explode(".", $_FILES['img']['name']);
    // 以第一個參數點點做分割，explode()陣列
    // 炸開黨名 變成陣列中兩個元素 pic.jpg 
    $subname = "." . end($tmp);
    // end($tmp) 函數用於取得陣列 $tmp 的最後一個元素
    $filename = date("YmdHis") . rand(10000, 99999) . $subname;
    // rand()..生成一個介於 10000 和 99999 之間的隨機整數
    move_uploaded_file($_FILES['img']['tmp_name'], "../imgs/" . $filename);
    // move_uploaded_file 將上傳的新文件搬移到，參數，從哪邊搬到哪邊，檔名帶入方便管理
    // move_uploaded_file(file, dest)

    // mime types(檔案類型):
    // .docs -> application/vnd.openxmlformats-officedocument.wordprocessingml.document
    // .xlsx -> application/vnd.openxmlformats-officedocument.spreadsheetml.sheet
    // .pptx -> application/vnd.openxmlformats-officedocument.presentationml.presentation
    // .pdf -> application/pdf
    // .png -> image/png
    // .webp -> image/webp
    // .jpg/.jpeg -> image/jpeg
    跟資料講要哪種檔案類型，轉換成好辨識的type，在管理的頁面可以對應的png檔

    switch ($_FILES['img']['type']) {
        case "";
            $type = "";
        break;
        case "";
            $type = "";
        break;
        case "";
            $type = "";
        break;
        case "";
            $type = "";
        break;
        case "";
        case "";
        case "";
        case "";
        case "";
            $type=$_FILES[''][''];
        break;
        default:
            $type="other";
    }


    $file = [
        'name' => $filename,
        'type' => $_FILES['img']['type'],
        'size' => $_FILES['img']['size'],
        'desc' => $_POST['desc']];

    // include_once會有$pdo抓設定好的資料
    // id會自動增加不用田
    // create_at有屬性 current_timestamp()
    insert('files', $file);

    header("location:../manage.php");
    // header("location:../upload.php?img=".$filename);
    // api 傳值給前端upload顯示上傳的檔案
    // 一次性顯示GET比較快
    // cookie, session也可以 
    // 但這種一次性傳值session做完還需要unset; post在這邊不適用
} else {
    header("location:../upload.php?err=上傳失敗");
}
