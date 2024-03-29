<?php
// api資料夾內的與資料庫有關
// upload只處理上傳的，不處理顯示的
include_once "../db.php";

// echo $_POST['desc'];
// 輸出 POST 請求中的 'name' 參數的值，input type="text"
// echo "<br>";

// 文件被上傳後，在服務端儲存的臨時文件名
// $_FILES['userfile']['tmp_name']  'userfile'是input type file 的name
if (!empty($_FILES['img']['tmp_name'])) {
    // 如果tmp_name不是空的，代表上傳成功
    $tmp = explode(".", $_FILES['img']['name']);
    $subname = "." . end($tmp);
    // end($tmp) 函數用於取得陣列 $tmp 陣列中的最後一個元素
    $filename = date("YmdHis") . rand(10000, 99999) . $subname;
    move_uploaded_file($_FILES['img']['tmp_name'], "../imgs/" . $filename);

    // mime types(檔案類型):
    // .docs -> application/vnd.openxmlformats-officedocument.wordprocessingml.document
    // .xlsx -> application/vnd.openxmlformats-officedocument.spreadsheetml.sheet
    // .pptx -> application/vnd.openxmlformats-officedocument.presentationml.presentation
    // .pdf -> application/pdf
    // .png -> image/png
    // .webp -> image/webp
    // .jpg/.jpeg -> image/jpeg
    // 跟資料講檔案類型判斷，轉換成好辨識的type，在管理manage的頁面可以有對應的圖示

    switch ($_FILES['img']['type']) {
        case "application/vnd.openxmlformats-officedocument.wordprocessingml.document":
            $type = "msword";
            break;
        case "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet":
            $type = "msexcel";
            break;
        case "application/vnd.openxmlformats-officedocument.presentationml.presentation":
            $type = "msppt";
            break;
        case "application/pdf":
            $type = "pdf";
            break;
        case "image/webp":
        case "image/jpeg":
        case "image/png":
        case "image/gif":
        case "image/bmp":
            $type = $_FILES['img']['type'];
            break;
        default:
            $type = "other";
    }


    $file = [
        'name' => $filename,
        'type' => $type,
        'size' => $_FILES['img']['size'],
        'desc' => $_POST['desc']
    ];

    // id會自動增加不用填
    // create_at有屬性 current_timestamp()
    insert('files', $file);

    header("location:../manage.php");
    // header("location:../upload.php?img=".$filename);
    // api 傳值給前端upload顯示上傳的檔案
    // 一次性顯示GET比較快cookie, session也可以 
    // 但這種一次性傳值session做完還需要unset; post在這邊不適用
} else {
    header("location:../upload.php?err=上傳失敗");
}
